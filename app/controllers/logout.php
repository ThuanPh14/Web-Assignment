<?php

class logout extends Controller {
    public function index() {
        session_start();
        $_SESSION["logged_in"] = "";
        session_destroy();
        header("Location: home");
    }
}

?>