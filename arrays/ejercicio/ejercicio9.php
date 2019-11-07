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

    $arr = arrayEnterosRandom(10);
    $arr_pares = posicionesPares($arr);
    $arr_impares = posicionesImpares($arr);

    echo "<h3>10. Crear un array y dividirlo en dos nuevos, uno con las posicionres pares y otro con las impares.</h3>";
    echo "<h4>Array</h4>";
    imprimirArray($arr);
    echo "<h4>Array pares</h4>";
    imprimirArray($arr_pares);
    echo "<h4>Array impares</h4>";
    imprimirArray($arr_impares);
?>