<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/

include_once("config.php");

//Consulta de selección. Selecciona todos los usuarios ordenados de manera descendente por el campo id

//$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY name");


//Selecciona todos los registros para proceder a un listado de los mismos: select. Los almacena en una "tabla especial" llamada $resultado. Cada fila es un registro, y cada columna es un campo del mismo.
$resultado = $mysqli->query("SELECT * FROM empleados ORDER BY apellido, nombre");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Electroshop S.L.</title>
	<!--bootstrap-->
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<!--
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	-->	
</head>
<body>
<!--Bootstrap-->	
<!--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
-->
<div>
	<header>
		<h1>ELECTROSHOP S.L.</h1>
	</header>

	<main>
	<ul>
		<li><a href="index.php">Inicio</a></li>
		<li><a href="add.html">Alta</a></li>
	</ul>
	<h2>Recursos humanos</h2>
	<table border="1">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Edad</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbdody>
<?php
/*
A continuación indicamos distintos métodos que leen línea a línea cada fila de la tabla:
mysqli_fetch_array()- Busca una fila de una consulta y devuelve un array asociativo, numérico o ambos
mysqli_fetch_assoc()- Busca una fila de una consulta y devuelve un array asociativo
mysqli_fetch_row() - Busca una fila de una consulta y devuelve un array numérico
Veamos la diferencia entre un array numérico y asosiativo:
ARRAYS CON ÍNDICE
$fila = array();
$fila[0] = "7";
$fila[1] = "Pedro";
$fila[2] = "Zapata";
$fila[3] = "23";
ARRAYS ASOCIATIVO:
$res["id"] = "7";
$res["nombre"] = "Pedro";
$res["apellido"] = "Zapata";
$res["edad"] = "23";
*/
//Genera la tabla de la página inicial
	while($fila = $resultado->fetch_array()) {
		echo "<tr>\n";
		echo "<td>".$fila['nombre']."</td>\n";
		echo "<td>".$fila['apellido']."</td>\n";
		echo "<td>".$fila['edad']."</td>\n";
		echo "<td>";
//En la última columna se añader dos enlaces para editar y modificar el registro correspondiente. Se le pasa por el método GET el id del registro		
		echo "<a href=\"edit.php?id=$fila[id]\">Edición</a>\n";
		echo "<a href=\"delete.php?id=$fila[id]\" onClick=\"return confirm('¿Está segur@ que desea eliminar el registro?')\" >Baja</a></td>\n";
		echo "</td>";
		echo "</tr>\n";
	}
//Cierra la conexión de BD previamente abierta
	$mysql->close();
	?>
	</tbdody>
	</table>
	</main>
	<footer>
    <!--Created by the IES Miguel Herrero team &copy; 2024-->
  	</footer>
</div>
</body>
</html>
