-- Create database
CREATE DATABASE testdb;

USE testdb;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL
);

-- Insert sample users
INSERT INTO users (username) VALUES ('admin');
INSERT INTO users (username) VALUES ('test');
