CREATE TABLE empleados (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  apellido VARCHAR(100) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  edad INT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO empleados (apellido, nombre, edad) VALUES('Coloma', 'Javier', 25);
INSERT INTO empleados (apellido, nombre, edad) VALUES('Oviedo', 'Carmen', 34);
INSERT INTO empleados (apellido, nombre, edad) VALUES('Vargas', 'Pascual', 19);
INSERT INTO empleados (apellido, nombre, edad) VALUES('Donoso', 'Maria', 45);
INSERT INTO empleados (apellido, nombre, edad) VALUES('Celis', 'Manuel', 56);
INSERT INTO empleados (apellido, nombre, edad) VALUES('Palencia', 'Jana', 31);
INSERT INTO empleados (apellido, nombre, edad) VALUES('Zamanillo', 'Pedro', 63);


