<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    echo "2. Dada la cadena de abajo, indicar qué consonantes son las que aparecen y cuántas veces aparecen usando funciones para cadenas PHP.";
    $cadena = "El abecedario es algo largo y detallarlo es exhaustivamente es costoso";

    // Definición de consonantes
    $consonantes = "bcdfghjklmnpqrstvwxyz";

    // Defino el array de resultados
    $resultados = array();

    // Búsqueda, conteo e impresión de los resultados.
    for ($i = 0; $i < strlen($consonantes); $i++) {
        $letra = $consonantes[$i];
        $veces = substr_count($cadena, $consonantes[$i]);
        $aux = ($veces != 1)?"vez":"veces";
        echo "La letra ".$letra." aparece ".$veces." ".$aux.".";
    }

    // // Busqueda de consonantes en la cadena
    // for ($i = 0; $i < strlen($cadena); $i++) {
    //     for ($j = 0; $j < strlen($consonantes); $j++) {
    //         if ($cadena[$i] == $consonantes[$j]) {
    //             $index = $consonantes[$j];
    //             if (isset($resultados[$index])) {
    //                 $resultados[$index]++;
    //             } else {
    //                 $resultados[$index] = 1;
    //             }
    //         }
    //     }
    // }

    // Imprimo los resultados
    // $indices = array_keys($resultados);
    // echo "La cadena es: $cadena<br>";
    // for ($i = 0; $i < count($resultados); $i++) {
    //     $aux = ($resultados[$indices[$i]] != 1)?" veces ":" vez";
    //     echo "La consonante ".$indices[$i]." aparece ".$resultados[$indices[$i]]." ".$aux.".<br>";
    // }

    
?>