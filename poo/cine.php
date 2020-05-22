<?php
    echo "<h4>Programa que muestra el estado de los asientos de un cine.</h4>";
    
    // Defino un array para las butacas de la sala
    $cine = array(array());

    // Defino el tamaño del array de forma leatoria
    $filas = rand(5, 15);
    $columnas = rand(5, 15);

    // Defino las posibles opciones
    $opciones = ["Reservado", "Ocupado", "Libre"];

    // Genero y relleno el array
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++)
            $cine[$i][$j] = $opciones[rand(0, 2)];
    }

    // Imprimo el array
    echo "<table>";
    for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columnas; $j++) {
            switch ($cine[$i][$j]) {
                case "Reservado":
                    echo "<td style='padding:4px; background-color: orange; color:white;'>".$cine[$i][$j]."</td>";
                    break;
                case "Ocupado":
                    echo "<td style='padding:4px; background-color: red; color:white;'>".$cine[$i][$j]."</td>";
                    break;
                case "Libre":
                    echo "<td style='padding:4px; background-color: green; color:white;'>".$cine[$i][$j]."</td>";
                    break;
            }
        }
        echo "</tr>";  
    }
    echo "</table>";
?>