CREATE database IF NOT EXISTS tetuan_league;
--  SCRIPTS DE CREACION DE TABLA
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    usser VARCHAR(50),
    passwd VARCHAR(255),
    bloqueado BOOLEAN,
    partidos INT,
    goles INT,
    asistencias INT,
    faltas INT,
    intentos INT, 
    edad INT,
    nombre VARCHAR(50),
    ape1 VARCHAR(50),
    ape2 VARCHAR(50)
);

-- Si no quieres volver a crear la bbss pon esto para actualizar los cambios
ALTER TABLE `usuarios` 
ADD `id_usuario` INT NOT NULL AUTO_INCREMENT FIRST, 
ADD PRIMARY KEY (`id_usuario`);

-- Tabla Noticia
CREATE TABLE IF NOT EXISTS noticias (
    id_noticia INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(70),
    contenido TEXT,
    fecha DATETIME,
    visible BOOLEAN
);
-- SCRIPT DE INSERCION
INSERT INTO `usuarios`
(`email`, `usser`, `passwd`, `bloqueado`, `partidos` , `goles`, `asistencias`, `faltas`, `intentos`, `edad`, `nombre`, `ape1`, `ape2`)
VALUES
('root@gmail.com', 'root', 'root', 0, NULL, NULL, NULL, 0, 35, 'Administrador', 'Sistema', ''),
('ana@gmail.com', 'ana', 'ana123', 0, 4, 2, 7, 0, 28, 'Ana', 'García', 'López'),
('juan@gmail.com', 'juan', 'juan123', 0, 0, 5, 2, 1, 32, 'Juan', 'Pérez', 'Martín'),
('maria@gmail.com', 'maria', 'maria123', 0, 2, 3, 8, 0, 25, 'María', 'Sánchez', 'Ruiz'),
('carlos@gmail.com', 'carlos', 'carlos123', 1, 4, 1, 0, 3, 41, 'Carlos', 'Fernández', 'Gómez'),
('laura@gmail.com', 'laura', 'laura123', 0, 0, 1, 4, 0, 29, 'Laura', 'Díaz', 'Navarro');

INSERT INTO `noticias`
(`titulo`, `autor`, `contenido`, `fecha`, `visible`)
VALUES
('pepe la lia', 'pepe', 'pepe la ha liado esta mañana', NOW(), true);

