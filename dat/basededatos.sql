CREATE database IF NOT EXISTS tetuan_league;

DROP TABLE IF EXISTS estadisticas;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS noticias;

--  SCRIPTS DE CREACION DE TABLA
CREATE TABLE IF NOT EXISTS usuarios (
    email VARCHAR(100),
    `user` VARCHAR(50),
    passwd VARCHAR(255),
    bloqueado BOOLEAN,
    intentos INT,
    edad INT,
    nombre VARCHAR(50),
    ape1 VARCHAR(50),
    ape2 VARCHAR(50),
    CONSTRAINT pk_usuarios PRIMARY KEY (`user`)
);


CREATE TABLE IF NOT EXISTS estadisticas (
   `user` VARCHAR(50),
    goles INT,
    asistencias INT,
    partidos INT,
    nombre_equipo VARCHAR(20),
    CONSTRAINT fk_usuario_estadisticas
        FOREIGN KEY (`user`)
        REFERENCES usuarios(`user`)
        ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS noticias (
    msg TEXT,
    fecha DATETIME,
    autor VARCHAR(50)
);


-- SCRIPT DE INSERCION
INSERT INTO usuarios
(`email`, `user`, `passwd`, `bloqueado`, `intentos`, `edad`, `nombre`, `ape1`, `ape2`)
VALUES
('root@gmail.com', 'root', 'root', 0, 0, 35, 'Administrador', 'Sistema', ''),
('ana@gmail.com', 'ana', 'ana123', 0, 0, 28, 'Ana', 'García', 'López'),
('juan@gmail.com', 'juan', 'juan123', 0, 1, 32, 'Juan', 'Pérez', 'Martín'),
('maria@gmail.com', 'maria', 'maria123', 0, 0, 25, 'María', 'Sánchez', 'Ruiz'),
('carlos@gmail.com', 'carlos', 'carlos123', 1, 3, 41, 'Carlos', 'Fernández', 'Gómez'),
('laura@gmail.com', 'laura', 'laura123', 0, 0, 29, 'Laura', 'Díaz', 'Navarro');


INSERT INTO estadisticas
(`user`, goles, asistencias, partidos, nombre_equipo)
VALUES
('root', 0, 0, 0, 'Admin FC'),
('ana', 5, 7, 12, 'DAW'),
('juan', 10, 4, 15, 'DAM'),
('maria', 3, 9, 11, 'ASIR'),
('carlos', 12, 2, 18, 'FPB'),
('laura', 6, 8, 14, 'COCINA');


