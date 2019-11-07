<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    
    include '../generarArrayAleatorios.php';
    include '../ordenar.php';
    include '../imprimirArray.php';

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='hidden' name='file1' value='".realpath('../generarArrayAleatorios.php')."'>
        <input type='hidden' name='file2' value='".realpath('../ordenar.php')."'>
        <input type='hidden' name='file3' value='".realpath('../imprimirArray.php')."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    echo "<h4>8. Este programa lee una matriz de números enteros aleatorios de tamaño 3x3.</h4>";
    echo "<p>A continuación, se pide un número de fila. El programa devuelve el máximo de esa fila.</p>";
    echo "
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <label>Introduce un número de fila (1-3):</label><input type='number' name='fila'>
            <input type='submit'>
        </form>
    ";
    if ($_POST) {
        // Generación de una matriz de 3x3.
        $aleatorios = generarArrayAleatorios(3, 3, 0, 10);

        echo "<p>El array generado es: </p><table>";
        imprimirArray(3, 3, $aleatorios);

        $fila = $_POST['fila']-1;
        $fila_ordenada = ordenarMayorMenor($aleatorios[$fila]);
        echo "<p>El maximo de la fila es: ".$fila_ordenada[0]."</p>";
    }

?>