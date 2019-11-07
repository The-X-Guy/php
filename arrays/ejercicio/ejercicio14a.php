<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    error_reporting(0);

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";
    
    echo "<h4>14a.  Introducir una cadena y meter las consonantes en un array y las vocales en otros,
        después unirlas en un nuevo array que tenga primero las consonantes y luego las
        vocales.</h4>";
    echo 
        "<form method='post' action=".$_SERVER['PHP_SELF'].">
            <input type='text' name='cadena'>
            <input type='submit' name='submit' value='Calcular'>
        </form>
        ";

    if ($_POST['submit']) {

        $cadena = $_POST['cadena'];
        $vocales = array();
        $consonantes = array();
        $nuevo = "";
        for ($j = 0; $j < strlen($cadena); $j++) {
            echo var_dump($cadena[$j]);
            switch ($cadena[$j]) {
                case 'a':
                    $vocales[] = $cadena[$j];
                    break;
                case 'e':
                    $vocales[] = $cadena[$j];
                    break;
                case 'i':
                    $vocales[] = $cadena[$j];
                    break;
                case 'o':
                    $vocales[] = $cadena[$j];
                    break;
                case 'u':
                    $vocales[] = $cadena[$j];
                   
                    break;
                case ' ':
                    break;
                default:
                    $consonantes[] = $cadena[$j];
            }
        }
        for ($i = 0; $i < count($consonantes); $i++)
            $nuevo = $nuevo.$consonantes[$i];

        for ($i = 0; $i < count($vocales); $i++)
            $nuevo = $nuevo.$vocales[$i];

        echo "La cadena resultante es $nuevo.";
    }
    
?>