<?php
// Incluye el archivo de configuración de la base de datos
include_once("config.php");
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Registro de Personajes</title>
</head>
<body>
<div>
    <header>
        <h1>Super Mario - Registro de Personajes</h1>
    </header>
    <main>
 
<?php
// Se comprueba si el formulario ha sido enviado
if(isset($_POST['inserta']))
{
    // Se obtienen los datos del formulario de alta
    $raza = $mysqli->real_escape_string($_POST['raza']);
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $primera_aparicion = $mysqli->real_escape_string($_POST['primera_aparicion']);
    $primer_juego = $mysqli->real_escape_string($_POST['primer_juego']);
    $ultima_aparicion = $mysqli->real_escape_string($_POST['ultima_aparicion']);
    $ultimo_juego = $mysqli->real_escape_string($_POST['ultimo_juego']);

    // Se comprueba si hay campos vacíos
    if(empty($raza) || empty($nombre) || empty($primera_aparicion) || empty($primer_juego) || empty($ultima_aparicion) || empty($ultimo_juego))
    {
        if(empty($raza)) {
            echo "<div>⚠️ Campo raza vacío.</div>";
        }

        if(empty($nombre)) {
            echo "<div>⚠️ Campo nombre vacío.</div>";
        }

        if(empty($primera_aparicion)) {
            echo "<div>⚠️ Campo primera aparición vacío.</div>";
        }

        if(empty($primer_juego)) {
            echo "<div>⚠️ Campo primer juego vacío.</div>";
        }

        if(empty($ultima_aparicion)) {
            echo "<div>⚠️ Campo última aparición vacío.</div>";
        }

        if(empty($ultimo_juego)) {
            echo "<div>⚠️ Campo último juego vacío.</div>";
        }

        // Cierra la conexión y muestra opción para volver atrás
        $mysqli->close();
        echo "<a href='javascript:self.history.back();'>🔙 Volver atrás</a>";
    }
    else
    {
        // Inserta el nuevo personaje en la base de datos
        $query = "INSERT INTO Super_Mario (raza, nombre, primera_aparicion, primer_juego, ultima_aparicion, ultimo_juego) 
                  VALUES ('$raza', '$nombre', '$primera_aparicion', '$primer_juego', '$ultima_aparicion', '$ultimo_juego')";

        if($mysqli->query($query) === TRUE) {
            echo "<div>✅ Personaje añadido correctamente...</div>";
            echo "<a href='index.php'>🌟 Ver personajes</a>";
        } else {
            echo "<div>❌ Error al añadir personaje: " . $mysqli->error . "</div>";
        }

        // Cierra la conexión
        $mysqli->close();
    }
}
?>
 
    </main>
</div>
</body>
</html>
