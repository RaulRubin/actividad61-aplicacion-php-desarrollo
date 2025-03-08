CREATE DATABASE IF NOT EXISTS actividad61RRL;
USE actividad61RRL;

CREATE TABLE Super_Mario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  raza VARCHAR(100),
  nombre VARCHAR(100),
  primera_aparicion YEAR,
  primer_juego VARCHAR(150),
  ultima_aparicion YEAR,
  ultimo_juego VARCHAR(150)
);

INSERT INTO Super_Mario (raza, nombre, primera_aparicion, primer_juego, ultima_aparicion, ultimo_juego) 
VALUES ('Humano', 'Mario', 1981, 'Donkey Kong', 2024, 'Mario y Luigi Conexion Fraternal'),
('Humano', 'Luigi', 1983, 'Mario Bros.', 2024, 'Mario y Luigi Conexion Fraternal'),
('Koopa', 'Bowser', 1985, 'Super Mario Bros.', 2024, 'Mario y Luigi Conexion Fraternal'),
('Toad', 'Toad', 1985, 'Super Mario Bros.', 2024, 'Mario y Luigi Conexion Fraternal'),
('Princesa', 'Peach', 1985, 'Super Mario Bros.', 2024, 'Mario y Luigi Conexion Fraternal'),
('Dinosaurio', 'Yoshi', 1990, 'Super Mario World', 2024, 'Mario y Luigi Conexion Fraternal'),
('Fantasma', 'Boo', 1988, 'Super Mario Bros. 3', 2024, 'Mario y Luigi Conexion Fraternal');




