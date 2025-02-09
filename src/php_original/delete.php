<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");

/*Obtiene el id del datos a eliminar a partir de la URL. Transacción de datos utilizando el método: GET
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET.
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/


$id = $_GET['id'];

echo "Estamos en el borrado\n";

//Realiza el borrado del registro: delete.
$result = $mysqli->query("DELETE FROM empleados WHERE id = $id");

//Cierra la conexión de base de datos previamente abierta
$mysqli->close();

//Redirige a la página principal: index.php
header("Location:index.php");
?>