<?php
// Incluir configuración de la base de datos
include_once("config.php");

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Super Mario - Personajes</title>
</head>
<body>
<div>
	<header>
		<h1>Super Mario - Personajes</h1>
	</header>

	<main>
	<ul>
		<li><a href="index.html">Inicio</a></li>
		<li><a href="add.html">Agregar Personaje</a></li>
	</ul>
	<h2>Lista de Personajes</h2>
	<table border="1">
	<thead>
		<tr>
			<th>Raza</th>
			<th>Nombre</th>
			<th>Primera Aparición</th>
			<th>Primer Juego</th>
			<th>Última Aparición</th>
			<th>Último Juego</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
// Ejecutar consulta a la base de datos
$resultado = $mysqli->query("SELECT * FROM Super_Mario ORDER BY raza, nombre");

// Verificar si la consulta fue exitosa
if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}

// Verificar si hay registros
if ($resultado->num_rows > 0) {
	while ($fila = $resultado->fetch_assoc()) {
		echo "<tr>\n";
		echo "<td>" . htmlspecialchars($fila['raza']) . "</td>\n";
		echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>\n";
		echo "<td>" . htmlspecialchars($fila['primera_aparicion']) . "</td>\n";
		echo "<td>" . htmlspecialchars($fila['primer_juego']) . "</td>\n";
		echo "<td>" . htmlspecialchars($fila['ultima_aparicion']) . "</td>\n";
		echo "<td>" . htmlspecialchars($fila['ultimo_juego']) . "</td>\n";
		echo "<td>
				<a href='edit.php?id=" . urlencode($fila['id']) . "'>Editar</a> | 
				<a href='delete.php?id=" . urlencode($fila['id']) . "' onclick='return confirm(\"¿Está segur@ que desea eliminar el personaje?\")'>Eliminar</a>
			  </td>\n";
		echo "</tr>\n";
	}
} else {
	echo "<tr><td colspan='7'>No hay personajes registrados</td></tr>\n";
}

// Cerrar la conexión
$mysqli->close();
?>
	</tbody>
	</table>
	</main>
	<footer>
    	Created by the IES Miguel Herrero team &copy; 2025
   	</footer>
</div>
</body>
</html>
