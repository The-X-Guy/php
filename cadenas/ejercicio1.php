<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    
    echo "1. Dada la cadena de abajo, indicar cuántas veces aparece cada vocal usando funciones para cadenas PHP.";
    $cadena = "El abecedario es algo largo y detallarlo es exhaustivamente es costoso";

    // Inicialización de contadores
    $contadores = array(0, 0, 0, 0, 0); // (a, e, i, o, u)

    // Conteo de vocales
    for ($j = 0; $j < strlen($cadena); $j++) {
        if ($cadena[$j] == "a") $contadores[0]++;
        if ($cadena[$j] == "e") $contadores[1]++; 
        if ($cadena[$j] == "i") $contadores[2]++;
        if ($cadena[$j] == "o") $contadores[3]++;
        if ($cadena[$j] == "u") $contadores[4]++;
    }

    // Impresión de resultados
    echo "La cadena es: $cadena<br><br>";
    echo "El conteo de vocales es:<br>";

    $vocales = array("a", "e", "i", "o", "u");
    for ($i = 0; $i < count($vocales); $i++) {
        echo "\tLa letra $vocales[$i] aparece $contadores[$i] veces.<br>";
    }

    //--------------------------------------------------------------------
    // Para contar las letras en la cadena con funciones de cadena:
    // echo "La letra a ha sido encontrada str_count($cadena, "a") veces";
?>