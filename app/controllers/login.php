<?php

class login extends Controller
{
    public function index()
    {
        $this->view('header', ['page_title' => 'Login', 'css' => '<link rel="stylesheet" href="/CV-Template/public/css/style-login-form.css">']);
        if (isset($_SESSION['logged_in'])) {
            header('Location: /CV-Template/public/home');
            exit();
        }
        $this->view('login/index');
    }

    public function register()
    {
        $this->view('header', ['page_title' => 'Register', 'css' => '<link rel="stylesheet" href="/CV-Template/public/css/style-login-form.css">']);
        if (isset($_SESSION['logged_in'])) {
            header('Location: /CV-Template/public/home');
            exit();
        }
        $this->view('login/register');
    }

    public function processLogin()
    {
        if (!($_SERVER['REQUEST_METHOD'] == 'POST'))
            return;

        if (isset($_SESSION['logged_in'])) {
            header('Location: /CV-Template/public/home');
            exit();
        }

        // Header
        $this->view('header', ['page_title' => 'Login', 'css' => '<link rel="stylesheet" href="/CV-Template/public/css/style-login-form.css">']);

        //Include model
        require_once '../app/models/login_processing.php';

        //Create model instance
        $login_handler = new Login_processing;

        //Call login
        $login_handler->login();
    }
    public function processRegister()
    {
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
            header('Location: /CV-Template/public/home');
            exit();
        }

        if (isset($_SESSION['logged_in'])) {
            header('Location: /CV-Template/public/home');
            exit();
        }

        // Header
        $this->view('header', ['page_title' => 'Register', 'css' => '<link rel="stylesheet" href="/CV-Template/public/css/style-login-form.css">']);

        //Include model
        require_once '../app/models/login_processing.php';

        //Create model instance
        $login_handler = new Login_processing;
        //Call register
        $login_handler->register();
    }
}
