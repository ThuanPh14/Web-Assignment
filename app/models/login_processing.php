<?php
// session_start();
require_once '../app/database/UserDAO.php';
/**
 * This class handles login process
 * $_SESSION values include:
 *     'username'
 *     'password'
 *     'confirm_password' (in register only)
 */
class Login_processing
{
    /**
     * This attribute is set to access database table 'user_profile'
     */
    private $userDAO;

    /**
     * Perform initilization for object attribute 
     */
    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    /**
     * Check username / password emptiness (client-side)
     * Check password length (min 8) (client-side)
     * This function does nothing currently
     * This function checks again required fields in @code{$_POST} are set and not empty again
     */
    public function validateLoginInput()
    {
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            return false;
        }

        if (trim($_POST['username']) === '' || trim($_POST['password']) === '') {
            return false;
        }

        return true;
    }

    /**
     * Check username / password emptiness (client-side)
     * Check password length (min 8) (client-side)
     * Check confirm password length (min 8) (client-side)
     * Check password and confirm password match (client-side)
     * Check password matches constraint: at least one special char & digit & upper case & min len 8
     * This function checks again required fields in @code{$_POST} are set and not empty again 
     */
    public function validateRegisterInput()
    {
        if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['confirm_password'])) {
            return false;
        }

        if (trim($_POST['username']) === '' || trim($_POST['password']) === '' || trim($_POST['confirm_password']) === '') {
            return false;
        }

        if (strlen($_POST['password']) < 8 || strlen($_POST['confirm_password']) < 8) {
            return false;
        }

        if ($_POST['password'] !== $_POST['confirm_password']) {
            return false;
        }

        // Check for password constraints (at least one special char & digit & upper case)
        if (
            !preg_match('/[A-Z]/', $_POST['password']) ||
            !preg_match('/[0-9]/', $_POST['password']) ||
            !preg_match('/[^\w]/', $_POST['password'])
        ) {
            return false;
        }

        return true;
    }

    /**
     * Controller uses this method to perform login
     * First call validateLoginInput
     * Then call userDAO->getUser($uname)
     * If return value is false:
     *      Call reLogin($err)
     * Else:
     *      set $_SESSION values
     *      redirect header('Location: home')
     */
    public function login()
    {
        if (!$this->validateLoginInput()) {
            $this->reLogin('Username or password is invalid');
            return;
        }

        $uname = $_POST['username'];
        $pswd = $_POST['password'];

        $user = $this->userDAO->getUser($uname);

        if ($user === false || !password_verify($pswd, $user['user_password'])) {
            $this->reLogin('Username or password is incorrect');
            return;
        }

        // Set session values

        $_SESSION['logged_in'] = $user['user_name'];
        $_SESSION['username'] = $user['user_name'];
        $_SESSION['user_id'] = $user['user_id'];
        // $_SESSION['password'] = $user['user_password']; // Storing password in session is not recommended

        header('Location: ../home');
    }

    /**
     * Controller uses this method to perform register
     * First call validateRegisterInput
     * Then call userDAO->insertUser($uname,$pswd)
     * If return value is false:
     *      Call reLogin($err)
     * Else:
     *      set $_SESSION values
     *      redirect header('Location: home')
     */
    public function register()
    {
        if (!$this->validateRegisterInput()) {
            // $this->reLogin('Invalid username or password. Choose a different one');
            header('Location: login/register?error=Invalid username or password. Choose a different one');
            return;
        }
        
        $uname = $_POST['username'];
        $pswd = $_POST['password'];
        
        $result = $this->userDAO->addUser($uname, $pswd);
        
        if ($result === false) {
            // $this->reLogin('Registration failed');
            header('Location: login/register?error=Registration failed');
            return;
        }

        // Set session values
        // $_SESSION['logged_in'] = $uname;
        // $_SESSION['username'] = $uname;
        // $_SESSION['user_id'] = $user['user_id'];

        header('Location: login');
    }


    /**
     * This function is used to redirect user to login page again with ?error=error_msg in url
     * @param $msg error message
     */
    public function reLogin($msg)
    {
        header('Location: login?error=' . $msg);
    }
}
