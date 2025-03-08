<?php
include_once("config.php");

if (isset($_POST['inserta'])) {
    $raza = $mysqli->real_escape_string($_POST['raza']);
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $primera_aparicion = $mysqli->real_escape_string($_POST['primera_aparicion']);
    $primer_juego = $mysqli->real_escape_string($_POST['primer_juego']);
    $ultima_aparicion = $mysqli->real_escape_string($_POST['ultima_aparicion']);
    $ultimo_juego = $mysqli->real_escape_string($_POST['ultimo_juego']);

    if (empty($raza) || empty($nombre) || empty($primera_aparicion) || empty($primer_juego) || empty($ultima_aparicion) || empty($ultimo_juego)) {
        echo "<div>Todos los campos son obligatorios.</div>";
        echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
    } else {
        if ($mysqli->query("INSERT INTO Super_Mario (raza, nombre, primera_aparicion, primer_juego, ultima_aparicion, ultimo_juego) VALUES ('$raza', '$nombre', '$primera_aparicion', '$primer_juego', '$ultima_aparicion', '$ultimo_juego')")) {
            echo "<div>Registro añadido correctamente</div>";
        } else {
            echo "<div>Error al insertar el registro: " . $mysqli->error . "</div>";
        }
        echo "<a href='index.php'>Ver resultado</a>";
    }
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta personaje</title>
</head>
<body>
<div>
    <header>
        <h1>Super_Mario_Tablas</h1>
    </header>
    <main>
    </main>
    <footer>
        Created by the IES Miguel Herrero team &copy; 2025
    </footer>
</div>
</body>
</html>