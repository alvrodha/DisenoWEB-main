CREATE DATABASE IF NOT EXISTS `tetuan_noticias`;
USE `tetuan_noticias`;

CREATE TABLE IF NOT EXISTS `noticias` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `titulo` VARCHAR(200) NOT NULL,
    `contenido` TEXT NOT NULL,
    `autor` VARCHAR(100) NOT NULL,
    `fecha_publicacion` DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `noticias` (`titulo`, `contenido`, `autor`) VALUES 
('Primera Noticia', 'Contenido de la primera noticia.', 'Admin'),
('Segunda Noticia', 'Contenido de la segunda noticia.', 'Admin');