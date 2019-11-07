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

    echo "
        <h4>11. Dada una matriz de números enteros, se intercambian una fila <em>i</em> por una <em>j</em>.</h4>
        <p>NOTA: <em>i</em> y <em>j</em> deben valer entre 1 y 4.</p>
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <label>Fila <em>i </em>: </label><input type='number' name='filai'><br>
            <label>Fila <em>j </em>: </label><input type='number' name='filaj'><br>
            <input style='margin-top: 5px;' type='submit'>
        </form>
    ";

    if ($_POST) {
        // Las filas a cambiar.
        $fila_ni = $_POST['filai']-1;
        $fila_nj = $_POST['filaj']-1;

        // Se genera una matriz de 4x4.
        $numeros = generarArrayAleatorios(4, 4, -10, 10);

        // Se imprimer el array generado.
        echo "<p>El array generado es: </p>";
        imprimirArray(4, 4, $numeros);

        // Se extraen los elementos de las filas.
        $fila_i = $numeros[$fila_ni];
        $fila_j = $numeros[$fila_nj];

        // Intercambio las filas.
        $numeros[$fila_ni] = $fila_j;
        $numeros[$fila_nj] = $fila_i;

        //Imprimo la matriz.
        echo "<p>El array resultate es: </p>";
        imprimirArray(4, 4, $numeros);


    }
?>