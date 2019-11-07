<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    if ($_POST['e_factorial']) {
            $n = 1;
            while ($n < 10) {
                $e = 1 / factorial($n);
                $n++;
            }
            echo $e;
        }

        function factorial ($n) {
            $resultado = 1;
            while ($n > 1) {
                $resultado *= $n;
                $n--;
            }
            return $resultado;
        }
?>