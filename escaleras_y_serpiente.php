<!DOCTYPE html>
<html>
<head>
    <title>Tablero de Damas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="titulo"><h1>Tablero de Escaleras y Serpientes</h1></div>

    <div id="contenedor">
        <table>
            <?php
            $filas = 10;
            $columnas = 10;
            $numero = 100;
            $direccion = 1;

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
            <!-- <img src="/images/serpiente1.png" alt="Serpiente" class="serpiente1">
            <img src="/images/serpiente1.png" alt="Serpiente" class="serpiente2">
            <img src="/images/serpiente1.png" alt="Serpiente" class="serpiente3"> -->


        </table>
    </div>

</body>
</html>