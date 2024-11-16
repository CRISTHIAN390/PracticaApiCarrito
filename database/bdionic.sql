create database bdionic;
use bdionic;

CREATE TABLE cliente (
    idcliente INT AUTO_INCREMENT PRIMARY KEY,  
    apellidos VARCHAR(255) NOT NULL,            
    nombres VARCHAR(255) NOT NULL,               
    edad INT,                                 
    dni VARCHAR(08) NOT NULL,               
    estado INT
);

INSERT INTO cliente (apellidos, nombres, edad, dni, estado) 
VALUES ('Pérez', 'Juan', 30, '12345678', 1);
INSERT INTO cliente (apellidos, nombres, edad, dni, estado) 
VALUES ('Gómez', 'Ana', 25, '87654321', 1);
INSERT INTO cliente (apellidos, nombres, edad, dni, estado) 
VALUES ('Rodríguez', 'Carlos', 40, '23456789', 1);
INSERT INTO cliente (apellidos, nombres, edad, dni, estado) 
VALUES ('Martínez', 'Lucía', 22, '34567890', 1);
INSERT INTO cliente (apellidos, nombres, edad, dni, estado) 
VALUES ('Lopez', 'Pedro', 35, '45678901', 1);

