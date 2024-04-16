<!DOCTYPE html>
<html>
<head>
    <title>Tablero de Escaleras y Serpientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="titulo"><h1>Inicio del Juego</h1></div>

    <div id="contenedor">
        <form action="tablero.php" method="post">
            <label for="jugador1">Nombre del Jugador 1:</label>
            <input type="text" id="jugador1" name="jugador1" required><br><br>
            <button type="submit">Iniciar Juego</button>
        </form>
    </div>

</body>
</html>
