<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    error_reporting(0);
    
    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";
    
    echo "<h4>14b. Introducir una cadena y decir si es palíndromo o no.</h4>";
    echo 
        "<form method='post' action=".$_SERVER['PHP_SELF'].">
            <input type='type' name='cadena'>
            <input type='submit' name='submit' value='Calcular'>
        </form>
        ";

    if ($_POST['submit']) {
        $cadena = $_POST['cadena'];
        $invertido = strrev($cadena);

        $resultado = ($cadena == $invertido)?"sí":"no";
        echo "La cadena $cadena $resultado es un palíndromo";
    }
?>