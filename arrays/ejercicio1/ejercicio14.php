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

    function copiarArray($arr1, &$arr2, $filas, $columnas) {
        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++) {
                $arr2[$i][$j] = $arr1[$i][$j];
            }
        }
    }

    echo "<h4>14. Dados dos arrays, copiar el contenido de uno en el otro.</h4>";
    
    $arr1 = generarArrayAleatorios(4, 4, -10, 10);
    $arr2 = generarArrayAleatorios(4, 4, -10, 10);
    echo "<h4>El primer array contiene:</h4>";
    imprimirArray(4, 4, $arr1);
    echo "<h4>El segundo array contiene:</h4>";
    imprimirArray(4, 4, $arr2);
    copiarArray ($arr1, $arr2, 4, 4);
    echo "<h4>Tras la copia, el segundo array contiene:</h4>";
    imprimirArray(4, 4, $arr2);
?>