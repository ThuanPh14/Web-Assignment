<?php

class share extends Controller {
    public function index() {
        // Check if the 'cv_id' parameter exists in the URL
        if (isset($_GET['shared_id'])) {
            $shared_id = $_GET['shared_id']; // Retrieve the 'shared_id' parameter
            
            $this->view('header', ['page_title' => 'View shared CV', 'css' => '<link rel=stylesheet href="/CV-Template/public/css/form.css">']);
            $this->checkLogin();

            include_once '../app/models/cv_processing.php';
            $cv_processing = new CV_processing;

            $cv = $cv_processing->getCVBySharedID($shared_id ? $shared_id : -1);
            //CV Not Found
            if (!$shared_id || !$cv) {
                return $this->view('share/unauthorized');
            } else {
                $is_public = $cv["is_public_to_everyone"];
                if ($is_public == 0) {
                    $current_user = $_SESSION['username'];
                    $allowed_users = $cv_processing->getAllowedUsersByCVId($cv['cv_id']);

                    // if the current user is not in the allowed users list and the current user is not the owner of the CV
                    if (!in_array($current_user, $allowed_users) && $_SESSION['user_id'] != $cv['user_id']) {
                        return $this->view('share/unauthorized');
                    }
                } else {
                    $cv_image_path = $cv['cv_image'];
                    if ($cv_image_path) {
                        $base64Image = $cv_processing->getCVImage($cv_image_path);
                        $cv['image'] = $base64Image;
                    }
                }
                $this->view('share/index', $cv);
            }
            
        } else {
            echo "No shared ID provided.";
        }
    }
}

?>
