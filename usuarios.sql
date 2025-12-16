CREATE DATABASE IF NOT EXISTS `tetuan_usuarios`;
USE `tetuan_usuarios`;

CREATE TABLE IF NOT EXISTS usuarios (
    usuario_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    usser VARCHAR(50) NOT NULL,
    passwd VARCHAR(50) NOT NULL
);

INSERT INTO usuarios (email, usser, passwd)
VALUES ('root@gmail.com', 'root', 'root');