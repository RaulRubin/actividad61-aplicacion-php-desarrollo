<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

/*Comprueba si hemos llegado a esta página PHP a través del formulario de modificaciones. 
En este caso comprueba la información "modifica" procedente del botón Guardae del formulario de Modificaciones
Transacción de datos utilizando el método: POST
*/
if(isset($_POST['modifica'])) {
	$id = $mysqli->real_escape_string($_POST['id']);
	$name = $mysqli->real_escape_string($_POST['name']);
	$surname = $mysqli->real_escape_string($_POST['surname']);
	$age = $mysqli->real_escape_string($_POST['age']);

	echo "Bloque1\n";

	if(empty($name) || empty($surname) || empty($age))	{
		if(empty($name)) {
			echo "<font color='red'>Campo nombre vacío.</font><br/>";
		}

		if(empty($surname)) {
			echo "<font color='red'>Campo apellido vacío.</font><br/>";
		}

		if(empty($age)) {
			echo "<font color='red'>Campo edad vacío.</font><br/>";
		}
	} //fin si
	else 
	{
//Prepara una sentencia SQL para su ejecución. En este caso una modificación de un registro de la BD.	

echo "Bloque2\n";

//Actualiza el registro a modificar: update
$mysqli->query("UPDATE empleados SET nombre = '$name', apellido = '$surname',  edad = '$age' WHERE id = $id");
$mysqli->close();


echo "Bloque3\n";
header("Location: index.php");
	}// fin sino
}//fin si
?>


<?php
/*Obtiene el id del dato a modificar a partir de la URL. Transacción de datos utilizando el método: GET*/
$id = $_GET['id'];

$id = $mysqli->real_escape_string($id);

//Selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT apellido, nombre, edad FROM empleados WHERE id = $id");

//Extrae el registro y lo guarda en el array $fila
//$fila = $resultado->fetch_assoc();
$fila = $resultado->fetch_array();
$surname = $fila['apellido'];
echo "El apellido es: $surname.\n";
$name = $fila['nombre'];
echo "El nombre es: $name.\n";
$age = $fila['edad'];
echo "La edad es: $age.\n";

//Cierra la conexión de base de datos
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Electroshop S.L.</title>
<!--	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
-->
</head>

<body>
<!--	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
-->
<div>
	<header>
		<h1>ELECTROSHOP S.L.</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación trabajador/a</h2>
<!--Formulario de edición. 
Al hacer click en el botón Guardar, llama a esta misma página: edit.php-->
	<form action="edit.php" method="post">
		<div>
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" value="<?php echo $name;?>" required>
		</div>

		<div>
			<label for="surname">Apellido</label>
			<input type="text" name="surname" id="surname" value="<?php echo $surname;?>" required>
		</div>

		<div>
			<label for="age">Edad</label>
			<input type="number" name="age" id="age" value="<?php echo $age;?>" required>
		</div>

		<div >
			<input type="hidden" name="id" value=<?php echo $id;?>>
			<input type="submit" name="modifica" value="Guardar">
			<!--<input type="button" value="Cancelar" onclick="location.href='index.php'">-->
		</div>
	</form>

	</main>	
	<footer>
	Created by the IES Miguel Herrero team &copy; 2024
  	</footer>
</div>
</body>
</html>

