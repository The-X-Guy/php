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
    $suma = generarArrayAleatorios(5, 5, 0, 0);

    // Calculo la suma.
    for ($j = 0; $j < 5; $j++) {
        for ($i = 0; $i < 5; $i++) {
            $suma[$i][$j] = $arr1[$i][$j] + $arr2[$i][$j];
        }
    }

    // Imprimo los resultados.
    echo "<h3>3. Generar dos arrays de 5x5 y realizar la suma.</h3>";
    echo "<p>El primer array contiene: </p>";
    imprimirArray(5, 5, $arr1);
    echo "<p>El segundo array contiene: </p>";
    imprimirArray(5, 5, $arr2);
    echo "<p>El array suma contiene: </p>";
    imprimirArray(5, 5, $suma);
?>