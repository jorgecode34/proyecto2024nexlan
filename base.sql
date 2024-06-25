/* -------------------------------------->  Cambiar la Base de datos */

CREATE DATABASE proyectoNexlan2024;
USE proyectoNexlan2024;

CREATE TABLE estudiante (
    IDEstudiante INT NOT NULL AUTO_INCREMENT,
    ci VARCHAR(8) UNIQUE NOT NULL,
    pasaporte VARCHAR(20),
    primerNombre VARCHAR(50),
    segundoNombre VARCHAR(50) DEFAULT NULL,
    primerApellido VARCHAR(50),
    segundoApellido VARCHAR(50) DEFAULT NULL,
    calle VARCHAR(100),
    numeroPuerta VARCHAR(10),
    barrio VARCHAR(50),
    localidad VARCHAR(50),
    tel VARCHAR(20),
    email VARCHAR(100),
    pass VARCHAR(50),
    PRIMARY KEY (IDEstudiante, ci)
);

CREATE TABLE clases (
    IDClase INT NOT NULL AUTO_INCREMENT,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    tipo ENUM('Teórico', 'Práctico') NOT NULL,
    duracion INT NOT NULL, -- duración en minutos
    PRIMARY KEY (IDClase)
);