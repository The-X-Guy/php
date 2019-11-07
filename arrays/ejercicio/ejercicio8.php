<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    include 'array.php';

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='hidden' name='file1' value='".realpath('array.php')."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    $arr1 = arrayEnterosRandom(10);
    $arr2 = arrayEnterosRandom(10);
    $arr3 = array();

    for ($i = 0; $i < count($arr1); $i++)
        $arr3[] = $arr1[$i] + $arr2[$i];
    
    echo "<h3>8. Crear 3 arays de 10 posiciones, 2 con números al azar y un tercero donde guardar los resultados de las sumas de sus posiciones.</h3>";
    echo "<h4>Array 1</h4>";
    imprimirArray($arr1);
    echo "<h4>Array 2</h4>";
    imprimirArray($arr2);
    echo "<h4>Array suma</h4>";
    imprimirArray($arr3);
?>