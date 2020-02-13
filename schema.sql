CREATE DATABASE kabum_interview CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE kabum_interview;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(32) NOT NULL,
    passkey VARCHAR(128) NOT NULL,
    session_id VARCHAR(64),
    PRIMARY KEY(id)
);

CREATE TABLE clients (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    birthdate VARCHAR(10) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    rg VARCHAR(12) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE addresses (
    id INT NOT NULL AUTO_INCREMENT,
    client_id INT NOT NULL,
    street VARCHAR(255) NOT NULL,
    number INT NOT NULL,
    complement VARCHAR(255),
    district VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state_province VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    zipcode VARCHAR(16) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(client_id) REFERENCES clients(id)
);
