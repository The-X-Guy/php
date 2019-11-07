<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    include '../imprimirArray.php';
    include '../generarArrayAleatorios.php';
    include '../ordenarArrayBidimensional.php';

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='hidden' name='file1' value='".realpath('../generarArrayAleatorios.php')."'>
        <input type='hidden' name='file1' value='".realpath('../ordenarArrayBidimensional.php')."'>
        <input type='hidden' name='file2' value='".realpath('../imprimirArray.php')."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    echo "<h4>12. Dada una matriz de tamaño 4x3, visualizarla, y a continuación encontrar el mayor y menor elemento y la posición que ocupa.</h4>";

    // Defino el tamaño del array a manipular como una constante.
    // Introducir aquí el tamaño deseado.
    define("FILAS", 4);
    define("COLUMNAS", 3);

    // Genero el array.
    $numeros= generarArrayAleatorios(FILAS, COLUMNAS, -1000, 1000);

    // Imprimo el array.
    echo "<p>El array generado es:</p>";
    imprimirArray(FILAS, COLUMNAS, $numeros);

    // Ordeno los elementos del array y lo imprimo.
    $ordenados = ordenarArrayBidimensional($numeros, FILAS, COLUMNAS);
    echo "<p>El array ordenado es:</p>";
    imprimirArray(FILAS, COLUMNAS, $ordenados);

    $posiciones = array();
    // $pociones[0] y $posiciones[1] son los indices del elemento mayor.
    // $pociones[2] y $posiciones[3] son los indices del elemento menor.

    // Busco los indices del elemento mayor.
    for ($i = 0; $i < FILAS; $i++) {
        for ($j = 0; $j < COLUMNAS; $j++) {
            if ($ordenados[0][0] == $numeros[$i][$j]) {
                array_push($posiciones, $i, $j);
                break;
            }
        }
    }

    // Busco los indices del elemento menor.
    for ($i = 0; $i < FILAS; $i++) {
        for ($j = 0; $j < COLUMNAS; $j++) {
            if ($ordenados[count($ordenados)-1][FILAS-2] == $numeros[$i][$j]) {
                array_push($posiciones, $i, $j);
                break;
            }
        }
    }

    echo "<p>El elemento mayor es ".$ordenados[0][0]." y su posición es ".$posiciones[0].", ".$posiciones[1].".</p>";
    echo "<p>El elemento menor es ".$ordenados[count($ordenados)-1][FILAS-2]." y su posición es ".$posiciones[2].", ".$posiciones[3].".</p>";

?>