<?php

class home extends Controller {
    public function index() {
        $this->view('header', ['page_title' => 'Home']);
        $this->view('home/index');
    }   
}
?>