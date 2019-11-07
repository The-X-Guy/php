<?php
    function imprimirArray ($filas, $columnas, $arr) {
        echo "<table>";
            for ($i = 0; $i < $filas; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $columnas; $j++)
                    if ($arr[$i][$j] == "L")
                        echo "<td style='padding: 10px; font-weight: bolder; color:#40cf19;'>".$arr[$i][$j]."</td>";
                    else
                        echo "<td style='padding: 10px; font-weight: bolder; color:#b02323;'>".$arr[$i][$j]."</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>