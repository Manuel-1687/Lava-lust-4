CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    username VARCHAR(100) NOT NULL
);

INSERT INTO users (firstname, lastname, email, username)
SELECT 'Juan', 'Dela Cruz', 'juan@example.com', 'juandelacruz'
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'juandelacruz');

INSERT INTO users (firstname, lastname, email, username)
SELECT 'Maria', 'Santos', 'maria@example.com', 'mariasantos'
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'mariasantos');

INSERT INTO users (firstname, lastname, email, username)
SELECT 'Pedro', 'Garcia', 'pedro@example.com', 'pedrogarcia'
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'pedrogarcia');

INSERT INTO users (firstname, lastname, email, username)
SELECT 'Ana', 'Reyes', 'ana@example.com', 'anareyes'
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'anareyes');

INSERT INTO users (firstname, lastname, email, username)
SELECT 'Jose', 'Mendoza', 'jose@example.com', 'josemendoza'
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'josemendoza');

SELECT id, firstname, lastname, email, username FROM users;