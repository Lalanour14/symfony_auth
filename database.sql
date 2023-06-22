-- Active: 1685437430041@@127.0.0.1@3306@symfony_auth

DROP TABLE IF EXISTS message;
DROP TABLE IF EXISTS user;

CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE message (
    id INT PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL,
    id_user INT,
    Foreign Key (id_user) REFERENCES user(id)
);