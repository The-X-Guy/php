<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    error_reporting(0);

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    echo "<h4>12. Introducir una cadena y sacar el número de vocales y cuántas hay de cada una, el número de consonantes, el número de palabras y la cadena entera en mayúsculas.</h4>";
    echo 
        "<form method='post' action=".$_SERVER['PHP_SELF'].">
            <input type='text' name='cadena'>
            <input type='submit' name='submit' value='Calcular'>
        </form>
    ";

    if ($_POST['submit']) {
        //Contadores
        $a = 0;
        $e = 0;
        $i = 0;
        $o = 0;
        $u = 0;
        $consonantes = 0;

        $cadena = $_POST['cadena'];
        $mayusculas = "";

        for ($j = 0; $j < strlen($cadena); $j++) {
            switch ($cadena[$j]) {
                case 'a':
                    $a++;
                    break;
                case 'e':
                    $e++;
                    break;
                case 'i':
                    $i++;
                    break;
                case 'o':
                    $o++;
                    break;
                case 'u':
                    $u++;
                    break;
                case ' ':
                    break;
                default:
                    $consonantes++;
            }
            // $ascii = ord($cadena[$j]) + 32;
            // echo $ascii;
            // echo chr($ascii);
        }
        echo "Número de 'a': $a <br>";
        echo "Número de 'e': $e <br>";
        echo "Número de 'i': $i <br>";
        echo "Número de 'o': $o <br>";
        echo "Número de 'u': $u <br>";
        echo "Número de consonantes: $consonantes <br>";
        // echo "Cadena en mayúsculas: $mayusculas <br>";
    }
    
?>