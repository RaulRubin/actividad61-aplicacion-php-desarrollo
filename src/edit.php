<?php 
include_once("config.php");

if (isset($_POST['modifica'])) {
    $idpersonaje = $mysqli->real_escape_string($_POST['idpersonaje']);
    $raza = $mysqli->real_escape_string($_POST['raza']);
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $primera_aparicion = $mysqli->real_escape_string($_POST['primera_aparicion']);
    $primer_juego = $mysqli->real_escape_string($_POST['primer_juego']);
    $ultima_aparicion = $mysqli->real_escape_string($_POST['ultima_aparicion']);
    $ultimo_juego = $mysqli->real_escape_string($_POST['ultimo_juego']);

    if (empty($raza) || empty($nombre) || empty($primera_aparicion) || empty($primer_juego) || empty($ultima_aparicion) || empty($ultimo_juego)) {
        echo "<p style='color: red;'>Por favor, complete todos los campos.</p>";
    } else {
        $mysqli->query("UPDATE Super_Mario SET raza='$raza', nombre='$nombre', primera_aparicion='$primera_aparicion', primer_juego='$primer_juego', ultima_aparicion='$ultima_aparicion', ultimo_juego='$ultimo_juego' WHERE id=$idpersonaje");
        $mysqli->close();
        header("Location: index.php");
        exit;
    }
}

$idpersonaje = isset($_GET['id']) ? $mysqli->real_escape_string($_GET['id']) : 0;
$resultado = $mysqli->query("SELECT * FROM Super_Mario WHERE id = $idpersonaje");
$fila = $resultado->fetch_assoc();
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Personaje - Super Mario</title>
</head>
<body>
<div>
    <header>
        <h1>Editar Personaje</h1>
    </header>

    <main>
        <form action="edit.php" method="post">
            <label>Raza: <input type="text" name="raza" value="<?php echo htmlspecialchars($fila['raza']); ?>" required></label><br>
            <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($fila['nombre']); ?>" required></label><br>
            <label>Primera Aparición: <input type="number" name="primera_aparicion" value="<?php echo htmlspecialchars($fila['primera_aparicion']); ?>" required></label><br>
            <label>Primer Juego: <input type="text" name="primer_juego" value="<?php echo htmlspecialchars($fila['primer_juego']); ?>" required></label><br>
            <label>Última Aparición: <input type="number" name="ultima_aparicion" value="<?php echo htmlspecialchars($fila['ultima_aparicion']); ?>" required></label><br>
            <label>Último Juego: <input type="text" name="ultimo_juego" value="<?php echo htmlspecialchars($fila['ultimo_juego']); ?>" required></label><br>
            <input type="hidden" name="idpersonaje" value="<?php echo $idpersonaje; ?>">
            <input type="submit" name="modifica" value="Guardar">
            <button type="button" onclick="location.href='index.php'">Cancelar</button>
        </form>
    </main>
    
    <footer>
        Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>

