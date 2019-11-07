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
    
    // Defino los arrays.
    $arr1 = generarArrayAleatorios(5, 5, -10, 10);
    $arr2 = generarArrayAleatorios(5, 5, -10, 10);
    $producto = generarArrayAleatorios(5, 5, 0, 0);

    // Calculo el producto.
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            for ($k = 0; $k < 5; $k++)
                $producto[$i][$j] += $arr1[$i][$k] * $arr2[$k][$j];
        }
    }

    echo "<p>La primera matriz es: </p>";
    imprimirArray(5, 5, $arr1);
    echo "<p>La segunda matriz es: </p>";
    imprimirArray(5, 5, $arr2);
    echo "<p>El producto de las matrices es: </p>";
    imprimirArray(5, 5, $producto);
?>