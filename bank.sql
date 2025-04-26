CREATE DATABASE IF NOT EXISTS bank;

USE bank;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    age INT,
    dob DATE,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(50),
    balance DOUBLE DEFAULT 0
);
