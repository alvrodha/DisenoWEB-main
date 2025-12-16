CREATE DATABASE IF NOT EXISTS `tetuan_noticias`;
USE `tetuan_noticias`;

CREATE TABLE IF NOT EXISTS noticias (
    noticia_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(60) NOT NULL,
    contenido TEXT NOT NULL,
    autor VARCHAR(255) NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    visible BOOLEAN DEFAULT TRUE
);

INSERT INTO noticias (titulo, contenido, autor) VALUES
('Primera Noticia', 'Contenido de la primera noticia.', 'Admin'),
('Segunda Noticia', 'Contenido de la segunda noticia.', 'Admin');