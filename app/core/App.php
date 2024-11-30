<?php
class App
{
    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];

    public function __construct() {
    // Ensure that parseUrl() returns an array, even if empty
    $url = $this->parseUrl() ?? [];

    // Check if the controller exists in the URL
    if (isset($url[0]) && file_exists("../app/controllers/{$url[0]}.php")) {
        $this->controller = $url[0];
        unset($url[0]);
    } else {
        // Set a default controller if not provided or invalid
        $this->controller = 'home'; // Change this to your default controller
    }

    require_once "../app/controllers/{$this->controller}.php";

    $this->controller = new $this->controller;

    // Check if a valid method exists
    if (isset($url[1]) && method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
    } else {
        // Set a default method if not provided or invalid
        $this->method = 'index'; // Change this to your default method
    }

    // Handle remaining URL parameters
    $this->params = $url ? array_values($url) : [];

    // Call the controller's method with parameters
    call_user_func_array([$this->controller, $this->method], $this->params);
}


    public function parseUrl() {
        if (isset($_GET['url']))
        {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
?>