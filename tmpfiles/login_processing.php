<?php
    function validateLogin($user_username, $user_password) {
        include_once 'connect.php';
        // Database connection details
        // Prepare the SQL query
        $sql = "SELECT * FROM user_profiles WHERE user_name = '$user_username'";
        // Execute the query
        $result = $conn->query($sql);
        $conn->close();
        // Check if a user with the given email exists
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($user_password, $user['user_password'])) {
                // Password is correct
                return true;
            } else {
                // Password is incorrect
                return false;
            }
        } else {
            // User with the given email does not exist
            return false;
        }
        // Close the database connection
    }
?>
<?php
session_start();
if (empty($_POST['username'])){
    header("Location: login.php?error=Username is required");
    exit();
}
else if(empty($_POST['password'])){
    header("Location: login.php?error=Password is required");
    exit();
}
$_SESSION['login_username'] = $_POST['username'];
$_SESSION['login_password']  = $_POST['password'];
// if (isset($_SESSION['login_username']) && isset($_SESSION['login_password'])) {
//     $save_username = $_SESSION['login_username'];
//     $save_password = $_SESSION['login_password'];
// } else {
//     $save_username = '';
//     $save_password = '';
// }

if (isset($_POST['username']) && isset($_POST['password'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    if (validateLogin($email, $password)) {
        setcookie("user_email", $email, time() + (86400 * 30), "/"); // Set cookie for 30 days
        $_SESSION['logged_in'] = $email;
        # reset form
        $_SESSION['login_username'] = '';
        $_SESSION['login_password'] = '';

        header("Location: home.php");
        exit();
    } else {
        header("Location: login.php?error=Incorrect username or password!");
        exit();
    }
} else {
    header("Location: login.php?error=Incorrect username or password!");
    exit();
}
?>