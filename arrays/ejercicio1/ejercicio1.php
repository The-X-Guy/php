<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    
    include '../imprimirArray.php';

    // Preparo los ficheros para imprimir el código fuente.
    echo "
        <form action='../../showsource.php' method='post' target='_blank'>
            <input type='hidden' name='filename' value='".__file__."'>
            <input type='hidden' name='file1' value='".realpath('../imprimirArray.php')."'>
            <input type='submit' value='Ver código fuente'>
        </form>";

    echo "<h4>1. Mostrar en pantalla una tabla de 10 x 10 con los números del 1 al 100.</h4>";

    $numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    $tabla = array(array());

    // Cargo los elementos en el array.
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++)
            $tabla[$i][$j] = $numeros[$j] + 10*$i; 
    }

    // Imprimo el array como una tabla HTML.
    imprimirArray(10, 10, $tabla);
?>