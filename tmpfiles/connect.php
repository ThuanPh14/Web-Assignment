<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "CV_STORAGE";
    // Create a new MySQLi object and establish a connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>