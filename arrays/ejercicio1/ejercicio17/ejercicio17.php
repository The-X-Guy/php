<!-- Alumno: Fran Gálvez. 2º ASIR. -->
<?php

    // Abro una sesión.
    session_start();

    // Deshabilito la impresión de errores.
    error_reporting(0);

    // Importo las librerías necesarias.
    include 'imprimirArray.php';
    
    if (!isset($_SESSION['asientos'])) {
        // Creo el array para almacenar los datos.
        $_SESSION['asientos'] = array(array());

        //Defino el tamaño del array como constantes.
        define ("FILAS", 25);
        define ("COLUMNAS", 4);

        // Inserto datos en el array.
        // R -> Reservado.
        // L -> Libre.
        for ($i = 0; $i < FILAS; $i++) {
            for ($j = 0; $j < COLUMNAS; $j++)
                $_SESSION['asientos'][$i][$j] = "L";
                // En un comienzo, todos los asientos están libres.
        }
    }

    //---------------------------------------------------------------------
    // Función para decodificar los índices de la posición dado un asiento.

    // Si el número de asiente no es múltiplo de 4:
    // -> El número de fila es el cociente de la división entera del número de asiento entre 4.
    // -> El número de columna es el módulo del número de asiento entre 4 menos 1.

    // Si el número de asiento sí es múltiplo de 4:
    // -> El número de fila es el cociente de la división entera del número de siento entre 4 menos 1.
    // -> El número de columna es el módulo del número de asiento entre 4 mas 3.

    function decodeArrayPosition ($asiento) {
        if ($asiento%4 != 0) {
            $fila = intdiv($asiento, 4);
            $columna = ($asiento%4) - 1;
            // print_r(array($fila, $columna));
            return array($fila, $columna);
        } else {
            $fila = intdiv($asiento, 4) - 1;
            $columna = ($asiento%4) + 3;
            // print_r(array($fila, $columna));
            return array($fila, $columna);
        }
    }
    //------------------------------------------------------------------------

    // Defino la plantilla HTML.
    echo "
        <form action='../../../showsource.php' method='post' target='_blank'>
            <input type='hidden' name='filename' value='".__file__."'>
            <input type='hidden' name='file1' value='".realpath('imprimirArray.php')."'>
            <input type='submit' value='Ver código fuente'>
        </form>
        <h2>17. Programa de reserva de asientos de un avión.</h2>
        <p>El siguiente programa se encarga de realizar reservas de en un avión, indicando los asientos que se desean reservar.</p>
        <p>Los asientos están distrbuídos en 25 filas, y cada fila tiene 4 asientos.</p>
        <p>Si los asientos están libres, se reservan y su indicador cambia y a pasa a ser una <strong>R</strong>.</p>
        <p>La layenda es la siguiente:</p>
        <ul>
            <li style='font-weight: bolder; color:#b02323;'>R -- Reservado.</li>
            <li style='font-weight: bolder; color:#40cf19;'>L -- Libre.</li>
        </ul>
        <p>Hay 100 asientos para reservar.</p>
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <label>Indica el número de asiento a reservar: </label><input type='number' name='asiento_r' min=1 max=100>
            <input type='submit' name='reservar' value='Realizar reserva'><br>
        </form>
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <label>Indica el número de asiento que quieres cancerlar: </label><input type='number' name='asiento_c' min=1 max=100>
            <input type='submit' name='cancelar' value='Cancelar reserva'><br>
        </form>
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <label>Ver asientos disponibles: </label><input type='submit' name='ver' value='Consultar'>
        </form>
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <label><strong>DEPURACIÓN: borrar todas las reservas: </strong></label><input type='submit' name='borrar' value='Borrar reservas'>
        </form>
    ";

    if ($_POST) {
        if ($_POST['reservar']) {
            $asiento_r = $_POST['asiento_r'];
            if ($asiento_r == "") {
                echo "<p><strong>Error: tienes que introducir el asiento que quieres reservar.</strong></p>";
            } else {
                // Obtengo los índices del asiento a reservar
                $indices = decodeArrayPosition($asiento_r);

                // Consulto si el asiento está reservado.
                if ($_SESSION['asientos'][$indices[0]][$indices[1]] == "R")
                    echo "<p><strong>Error: el asiento ya está reservado. Compruébalo e instántalo de nuevo.</strong></p>";
                else {
                    // Si el asiento no está reservado, procedo a su reserva.
                    $_SESSION['asientos'][$indices[0]][$indices[1]] = "R";
                    echo "<p><strong>La reserva se ha realizado correctamente.</strong></p>";
                    imprimirArray(25, 4, $_SESSION['asientos']);
                }
            }
        }

        if ($_POST['ver'])
            imprimirArray(25, 4, $_SESSION['asientos']);
        
        if ($_POST['borrar']) {
            session_destroy();
            session_start();
            echo "<p><strong>Reservas borradas correctamente.</strong></p>";
        }

        if ($_POST['cancelar']) {
            $asiento_c = $_POST['asiento_c'];
            if ($asiento_c == "") {
                echo "<p><strong>Error: tienes que introducir el asiento que quieres cancelar.</strong></p>";
            } else {
                // Obtengo los índices del asiento a cancelar.
                $indices = decodeArrayPosition($asiento_c);

                // Consulto si el asiento está libre.
                if ($_SESSION['asientos'][$indices[0]][$indices[1]] == "L")
                    echo "<p><strong>Error: la reserva no existe. Compruébalo e instántalo de nuevo.</strong></p>";
                else {
                    // Si el asiento está reservado, procedo a su cancelación.
                    $_SESSION['asientos'][$indices[0]][$indices[1]] = "L";
                    echo "<p><strong>La reserva se ha cancelado correctamente.</strong></p>";
                    imprimirArray(25, 4, $_SESSION['asientos']);
                }
            }
        }
    }
?>