<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    // Impresión de un array bidimensional

    function imprimirArray ($filas, $columnas, $arr) {
        echo "<table>";
            for ($i = 0; $i < $filas; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $columnas; $j++)
                    echo "<td style='padding: 10px;'>".$arr[$i][$j]."</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>