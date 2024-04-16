<!DOCTYPE html>
<html>

<head>
    <title>Tablero de Escaleras y Serpientes</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <?php  // Mostrar los nombres de los jugadores en el título
    echo "<div class='titulo'><h1>Tablero de Escaleras y Serpientes</h1></div>";
    ?>

    <?php
    $tiroacumulado = 0;
    $dado = 0;
    $filacomienzo = 0;
    if (isset($_POST['valor'])) {
        $dado = rand(1, 12);
        $tiroacumulado = $valoranterior + $dado;


        switch ($tiroacumulado) {
            case '10':
                $tiroacumulado = 29;
                $mesaje = "¡¡FELICIDADES!! EN CASILLA 10 HAY UNA ESCALERA, SUBES A LA CASILLA 29";
                $alerta = 1;
                break;
            case '74':
                $tiroacumulado = 95;
                $mesaje = "¡¡FELICIDADES!! EN CASILLA 74 HAY UNA ESCALERA, SUBES A LA CASILLA 95";
                $alerta = 1;
                break;
            case '45':
                $tiroacumulado = 64;
                $mesaje = "¡¡FELICIDADES!! EN CASILLA 45 HAY UNA ESCALERA, SUBES A LA CASILLA 64";
                $alerta = 1;
                break;
            case '36':
                $tiroacumulado = 3;
                $mesaje = "¡¡MALA TIRADA!! EN CASILLA 36 HAY UNA SERPIENTE, BAJAS A LA CASILLA 3";
                $alerta = 1;
                break;
            case '71':
                $tiroacumulado = 52;
                $mesaje = "¡¡MALA TIRADA!! EN CASILLA 71 HAY UNA SERPIENTE, BAJAS A LA CASILLA 52";
                $alerta = 1;
                break;
            case '98':
                $tiroacumulado = 41;
                $mesaje = "¡¡MALA TIRADA!! EN CASILLA 98 HAY UNA SERPIENTE, BAJAS A LA CASILLA 41";
                $alerta = 1;
                break;

            default:
                if ($dado > 0) {
                    $mensaje = "HAS AVANZADO $dado CASILLAS";
                } else {
                    $mensaje = "HAS AVANZADO $dado CASILLAS";
                }
                $alerta = 1;
                break;
        }
    }
    ?>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-6 mt-2">

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Obtener los nombres de los jugadores desde el formulario
                            $jugador1 = $_POST["jugador1"];
                            echo "<div class='titulo2'><h2>Jugador 1: $jugador1 </h2></div>";
                        }
                        ?>

                        <form action="tablero.php" method="$_POST">
                            <div class="col-3">
                                <label class="form-label" for="valor">POSICION</label><input class="form-control" type="text" id="valor" name="valor" min="1" max="10" value="<?php $tiroacumulado ?>" required>
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="dado">DADO</label><input class="form-control" type="text" id="dado" name="dado" min="1" max="10" value="<?php $dado ?>" required>
                                <input type="hidden" name="Notirada">
                            </div>
                            <div class="col-3 mt-3">
                                <input type="submit" id="enviar" name="enviar" class="btn btn-warning" value="LANZAR DADO">
                            </div>
                            <div class="row mt-2">
                                <div class="col-4 mt-3">
                                    <a href="tablero.php" id="enviar" name="enviar" class="btn btn-danger">REINICIAR JUEGO</a>
                                </div>
                            </div>



                        </form>

                    </div>

                </div>

            </div>



            <div class="row">
                <div class="col-6 mt-4">
                    <?php
                    if ($dado > 0) {
                    ?>
                        <div style="border:solid">
                            <?php
                            if ($tiroacumulado < 100) {
                            ?>
                                <h1>TIRO</h1>
                                <h1><?php $dado ?></h1>
                                <h2><?php $mensaje ?></h2>
                        </div>
                    <?php } else {
                    ?>
                        <h1>FELICITACIONAS ERES EL GANADOR!!</h1>

                </div>
        <?php
                            }
                        }
        ?>

            </div>

            <div class="col-5 mb-5 mt--10">

                <?php


                // Verificar si se han enviado los nombres de los jugadores
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    // Mostrar el tablero del juego
                    echo "<table>";

                    $filas = 10;
                    $columnas = 10;
                    $numero = 100; // Comenzar desde el número 1
                    $direccion = 1; // Cambiar la dirección de conteo

                    // Generar el tablero con números del 1 al 100 de abajo hacia arriba
                    for ($i = $filas - 1; $i >= 0; $i--) {
                        echo "<tr>";
                        for ($j = 0; $j < $columnas; $j++) {
                            $color = ($i + $j) % 2 == 0 ? "marron" : "amarillo-palido";
                            echo "<td class='$color'><span class='numero'>$numero</span></td>";
                            $numero -= $direccion;
                        }
                        $numero -= 10 - $direccion;
                        $direccion *= -1; // Cambiar dirección de conteo
                        echo "</tr>";
                    }

                ?>
                    <img src="/images/serpiente1.png" alt="Serpiente" class="serpiente1">
                    <img src="/images/serpiente1.png" alt="Serpiente" class="serpiente2">
                    <img src="/images/serpiente1.png" alt="Serpiente" class="serpiente3">
                    <img src="/images/esccalera1.png" alt="Escalera" class="escalera1">
                    <img src="/images/esccalera1.png" alt="Escalera" class="escalera2">
                    <img src="/images/esccalera1.png" alt="Escalera" class="escalera3">

                <?php

                    echo "</table>";

                    // Mostrar las fichas de los jugadores


                }
                ?>

            </div>
        </div>

    </div>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>