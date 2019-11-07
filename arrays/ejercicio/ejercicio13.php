<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    error_reporting(0);
    
    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";
    
    echo "<h4>13. Introducir un número y decir si es capicúa o no.</h4>";
    echo 
        "<form method='post' action=".$_SERVER['PHP_SELF'].">
            <input type='number' name='cadena'>
            <input type='submit' name='submit' value='Calcular'>
        </form>
        ";

    if ($_POST['submit']) {
        $num = $_POST['cadena'];
        $invertido = strrev($num);

        $resultado = ($num == $invertido)?"sí":"no";
        echo "El número $num $resultado es capicúa";
    }
?>