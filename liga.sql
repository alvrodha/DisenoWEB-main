CREATE DATABASE IF NOT EXISTS 'tetuan_legue';
USE 'tetuan_legue';

CREATE TABLE equipos (
    id_equipo INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL,
    puntos INT DEFAULT 0,
    partidos_ganados INT DEFAULT 0,
    partidos_empatados INT DEFAULT 0,
    partidos_perdidos INT DEFAULT 0,
    goles_favor INT DEFAULT 0,
    goles_contra INT DEFAULT 0
);

CREATE TABLE jugadores (
    id_jugador INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL,
    ape1 VARCHAR(35) NOT NULL,
    ape2 VARCHAR(35),
    fecha_nac DATE,
    posicion VARCHAR(50),
    numero_camiseta INT,
    id_equipo INT,
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo)
);

CREATE TABLE fechas (
    id_fecha INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL
);

CREATE TABLE partidos (
    id_partido INT PRIMARY KEY AUTO_INCREMENT,
    id_equipo_local INT,
    id_equipo_visitante INT,
    goles_local INT DEFAULT 0,
    goles_visitante INT DEFAULT 0,
    id_fecha INT,
    FOREIGN KEY (id_equipo_local) REFERENCES equipos(id_equipo),
    FOREIGN KEY (id_equipo_visitante) REFERENCES equipos(id_equipo),
    FOREIGN KEY (id_fecha) REFERENCES fechas(id_fecha)
);

CREATE TABLE goles (
    id_gol INT PRIMARY KEY AUTO_INCREMENT,
    id_partido INT,
    id_jugador INT,
    minuto INT NOT NULL,
    FOREIGN KEY (id_partido) REFERENCES partidos(id_partido),
    FOREIGN KEY (id_jugador) REFERENCES jugadores(id_jugador)
);

CREATE TABLE asistencias (
    id_asistencia INT PRIMARY KEY AUTO_INCREMENT,
    id_partido INT,
    id_jugador INT,
    minuto INT NOT NULL,
    FOREIGN KEY (id_partido) REFERENCES partidos(id_partido),
    FOREIGN KEY (id_jugador) REFERENCES jugadores(id_jugador)
);

CREATE TABLE tarjetas (
    id_tarjeta INT PRIMARY KEY AUTO_INCREMENT,
    id_partido INT NOT NULL,
    id_jugador INT NOT NULL,
    tipo ENUM('AMARILLA', 'ROJA') NOT NULL,
    minuto INT NOT NULL,
    FOREIGN KEY (id_partido) REFERENCES partidos(id_partido),
    FOREIGN KEY (id_jugador) REFERENCES jugadores(id_jugador)
);
