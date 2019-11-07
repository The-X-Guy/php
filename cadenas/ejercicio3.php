<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    echo "3. Dada la cadena de abajo, mostrar la cadena donde todas las a hayan sido sustituídas por el símbolo *. Por ejemplo en lugar de <<El abecedario…>> se habrá de mostrar <<El *beced*rio…>>";
    $cadena = "El abecedario es algo largo y detallarlo es exhaustivamente es costoso";

    echo "La cadena original es: $cadena <br>";
    // Busqueda y sustitucion de a
    for ($i = 0; $i < strlen($cadena); $i++) {
        if ($cadena[$i] == "a")
            $cadena[$i] = "*";
    }
    echo "La cadena modificada es: $cadena";
?>