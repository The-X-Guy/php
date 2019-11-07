<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    include '../generarArrayAleatorios.php';
    include '../imprimirArray.php';

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='hidden' name='file1' value='".realpath('../generarArrayAleatorios.php')."'>
        <input type='hidden' name='file2' value='".realpath('../imprimirArray.php')."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    echo "<h4>9. Dada una matriz de números aleatorios, se calcula su traspuesta.</h4>";
    
    // Generación de una matriz de 2x4.
    $numeros = generarArrayAleatorios(2, 4, -10, 10);

    // Impresión de la matriz.
    echo "<p>La matriz generada es: </p>";
    imprimirArray(2, 4, $numeros);

    // Impresión de la matriz traspuesta.
    echo "<p>La matriz traspuesta es: </p><table>";
    for ($i = 0; $i < 4; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 2; $j++)
            echo "<td style='padding: 10px;'>".$numeros[$j][$i]."</td>";
        echo "</tr>";
    }
    echo "</table>";

?>