<?php

class Connection {
    private static $instance = null;
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "CV_STORAGE";

    private function __construct() {
        // Create a new MySQLi object and establish a connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check for connection errors
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
    
    // // Prevent cloning of the instance
    // private function __clone() { }

    // // Prevent unserialization of the instance
    // private function __wakeup() { }
}