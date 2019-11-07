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

    echo "<h4>10. Dada una matriz de números enteros, se calcula la suma de los elementos positivos y los negativos.</h4>";

    // Se genera una matriz de 5x5.
    $numeros = generarArrayAleatorios(5, 5, -10, 10);

    $positivos = 0;
    $negativos = 0;

    // Se imprime el array.
    echo "<p>El array generado es: </p>";
        imprimirArray(5, 5, $numeros);
    
    // Se calcula la suma de los elementos positivos y negativos.
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++)
            if ($numeros[$i][$j] > 0)
                $positivos += $numeros[$i][$j];
            else 
                $negativos += $numeros[$i][$j];
    }

    echo "<p>La suma de los elementos positivos es ".$positivos."</p>";
    echo "<p>La suma de los elementos negativos es ".$negativos."</p>";
?>