<?php

include_once '../app/database/connect.php';

class UserDAO
{
    private $conn;

    public function __construct() {
        // Use a singleton pattern or dependency injection for the database connection
        $this->conn = Connection::getInstance()->getConnection();
    }

    /**
     * Get user by username
     * @param string $uname Username
     * @return array|false Returns an associative array of user data or false if not found
     */
    public function getUser($uname) {
        $stmt = $this->conn->prepare('SELECT user_id, user_name, user_password FROM user_profiles WHERE user_name = ?');
        if (!$stmt) {
            // Handle prepare error, possibly log it
            return false;
        }
    
        $stmt->bind_param('s', $uname);
        
        if (!$stmt->execute()) {
            // Handle execute error, possibly log it
            $stmt->close();
            return false;
        }

        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            $stmt->close();
            return false;
        }
    
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    /**
     * This method inserts a new user with user name and a hased password using password_hash
     * @param $uname username
     * @param $pswd password
     * @return true|false true if success else false
     */
    public function addUser($uname, $pswd) {
        // Hash the password
        $hashedPswd = password_hash($pswd, PASSWORD_DEFAULT);
        
        // Prepare the SQL statement
        $stmt = $this->conn->prepare("INSERT INTO user_profiles (user_name, user_password) VALUES (?, ?)");

        if (!$stmt) {
            // Handle prepare error
            return false;
        }

        // Bind parameters and execute
        $stmt->bind_param('ss', $uname, $hashedPswd);
        $result = $stmt->execute();

        // Close the statement
        $stmt->close();

        return $result;
    }

    /**
     * Increment the failed login attempts for a user
     * @param int $userId The user's ID
     * @return bool Returns true on success or false on failure
     */
    public function incrementFailedAttempts($userId) {
        // Implement the method to increment the failed login attempt count
    }

    /**
     * Lock out the user account
     * @param int $userId The user's ID
     * @return bool Returns true on success or false on failure
     */
    public function lockoutAccount($userId) {
        // Implement the method to lock the user account
    }

    /**
     * Reset the failed login attempts for a user
     * @param int $userId The user's ID
     * @return bool Returns true on success or false on failure
     */
    public function resetFailedAttempts($userId) {
        // Implement the method to reset the failed login attempt count
    }

    /**
     * Verify if the user's account is locked
     * @param int $userId The user's ID
     * @return bool Returns true if the account is locked, false otherwise
     */
    public function isAccountLocked($userId) {
        // Implement the method to check if the user's account is locked
    }
}
