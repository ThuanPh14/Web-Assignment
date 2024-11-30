<?php
// session_start();
require_once '../app/database/UserCVDAO.php';
/**
 * This class handles login process
 * $_SESSION values include:
 *     'username'
 *     'password'
 *     'confirm_password' (in register only)
 */
class CV_processing
{
    private $userCVDao;

    public function __construct()
    {
        $this->userCVDao = new UserCVDAO;
    }

    public function saveNewCV()
    {
        $json = file_get_contents('php://input');
        $cv_name = json_decode(file_get_contents('php://input'), true)['cvName'];
        $user_id = $_SESSION['user_id'];

        return $this->userCVDao->createCV($user_id, $cv_name, $json);
    }

    /**
     * Save an edited CV
     * @param int $id CV ID
     * @return bool
     */
    public function saveEditCV($id)
    {
        $json = file_get_contents('php://input');

        return $this->userCVDao->updateCVJSONData($id, $json);
    }

    /**
     * Get all CVs of user with user_id
     * @param int $user_id User ID
     * @return array associative array of CVs
     */
    public function getCVList($user_id)
    {
        return $this->userCVDao->getUserCVs($user_id);
    }


    /**
     * Get CV by ID
     * @param int $cv_id CV ID
     * @return array|false
     */
    public function getCVByID($cv_id)
    {
        return $this->userCVDao->getCVByID($cv_id);
    }

    public function getCVBySharedID($shared_id)
    {
        return $this->userCVDao->getCVBySharedID($shared_id);
    }

    public function getAllowedUsersByCVId($cv_id)
    {
        return $this->userCVDao->getAllowedUsersByCVId($cv_id);
    }

    public function addAllowedUser($cv_id, $user_name)
    {
        return $this->userCVDao->addAllowedUser($cv_id, $user_name);
    }

    public function deleteCV($cv_id)
    {
        return $this->userCVDao->deleteCV($cv_id);
    }

    /**
     * Update Image for an existing CV
     * @param int $cv_id CV ID
     * @return bool
     */
    public function updateCVImage($cv_id)
    {
        if (!$this->getCVByID($cv_id))
            return false;

        if (!isset($_FILES['file']))
            return false;


        $file = $_FILES['file'];
        // Perform file validation, e.g., check file type, size, etc.
        // Assuming 'uploads' is a directory in your server
        $file_ext = explode('.', $file['name']);
        $file_path = $_SERVER["DOCUMENT_ROOT"] . '/CV-Template/app/models/uploads/userCVImageAtID_' . $cv_id . ".$file_ext[1]";
        if (move_uploaded_file($file['tmp_name'], $file_path)) {   
            return $this->userCVDao->updateCVImage($cv_id, $file_path);
        }

        //Folder directory ko duoc em

        return false;
    }

    public function getCVImage($image_path) {
        $type = pathinfo($image_path, PATHINFO_EXTENSION);
        $data = file_get_contents($image_path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    public function updateCVSharingSettings($cv_id, $sharing_option, $allowed_users)
    {
        return $this->userCVDao->updateCVSharingSettings($cv_id, $sharing_option, $allowed_users);
    }
}
