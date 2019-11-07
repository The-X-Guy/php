<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    if ($_POST['fact']) {
        $numero = $_POST['numero'];
        $aux = $numero;
        $acum = 1;
        while ($numero > 0) {
            $acum *= $numero;
            $numero--;
        }
        echo $aux,"! = ",$acum; 
    }
?>