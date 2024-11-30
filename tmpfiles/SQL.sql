DROP DATABASE IF EXISTS CV_STORAGE;

CREATE DATABASE IF NOT EXISTS CV_STORAGE;

USE CV_STORAGE;

-- Create a table for user profiles with a JSON column for additional data
CREATE TABLE IF NOT EXISTS user_profiles (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL UNIQUE,
    user_password CHAR(60) NOT NULL,  -- Assuming bcrypt will be used for hashing passwords
    
    FailedAttempts INT DEFAULT 0,
    LockedOutTime DATETIME NULL,
    IsLockedOut BIT DEFAULT 0,
    LastAttemptTime DATETIME NULL
);

-- Create a table for user CVs with a foreign key that references the user_profiles table
CREATE TABLE IF NOT EXISTS user_cv (
    cv_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    cv_data JSON NOT NULL,
    cv_name VARCHAR(255) NOT NULL,
    cv_image VARCHAR(255) NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_public_to_everyone BIT DEFAULT 0,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES user_profiles(user_id)
);

CREATE TABLE IF NOT EXISTS user_cv_access (
    cv_id INT NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    CONSTRAINT pk_cv PRIMARY KEY (cv_id, user_name);
    CONSTRAINT fk_cv FOREIGN KEY (cv_id) REFERENCES user_cv(cv_id)
);
