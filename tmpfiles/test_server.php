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

$username = "user";
$plaintext_password = "webAss@101";
$hashed_password = password_hash($plaintext_password, PASSWORD_BCRYPT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO user_profiles (user_name, user_password) VALUES (?, ?);");
$stmt->bind_param("ss", $username, $hashed_password);

// Set parameters and execute
if ($stmt->execute()) {
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Set the Content-Type header to application/json.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = 1;
    $cv_name = "Test_CV";
    $json = file_get_contents("php://input");

    // Prepare the SQL statement with placeholders for the actual values
    $stmt = $conn->prepare("INSERT INTO user_cv(user_id, cv_name, cv_data) VALUES (?, ?, ?)");

    // Bind the actual values to the placeholders, 'i' for integer and 's' for string
    $stmt->bind_param("iss", $user_id, $cv_name, $json);

    // Execute the prepared statement
    if (!$stmt->execute()) {
        echo "ERROR";
        return;
    }

    // If everything is successful
    echo "OK";
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user_id = 1;
    $stmt = $conn->prepare("SELECT cv_data FROM user_cv WHERE user_id = ?");
    $stmt->bind_param("i", $user_id); // 'i' is used for integers

    if (!$stmt->execute()) {
        echo "ERROR";
        return;
    }

    $result = $stmt->get_result();
    $cv_data = $result->fetch_assoc()['cv_data']; // Fetch the data as associative array
    $json_data = substr($cv_data, strlen($cv_data) - 2);
    // If everything is successful, send JSON back. JSON is stored in cv_data column
    echo json_encode('{"key":"test"}'); // This will convert the array to JSON string
}

