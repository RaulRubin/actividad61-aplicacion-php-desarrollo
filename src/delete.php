<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = $mysqli->real_escape_string($_GET['id']);

    if ($mysqli->query("DELETE FROM Super_Mario WHERE id = $id")) {
        echo "<div>Registro borrado correctamente</div>";
    } else {
        echo "<div>Error al borrar el registro: " . $mysqli->error . "</div>";
    }

    $mysqli->close();
} else {
    echo "<div>ID no proporcionado.</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja personaje</title>
</head>
<body>
<div>
    <header>
        <h1>Super_Mario_Tablas</h1>
    </header>
    <main>
        <a href='index.php'>Ver resultado</a>
    </main>
    <footer>
        Created by the IES Miguel Herrero team &copy; 2025
    </footer>
</div>
</body>
</html>
