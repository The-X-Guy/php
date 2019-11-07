<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Deshabilito la muestra de errores.
    error_reporting(0);

    // Inicio una sesión si la variable $_SESSION no está establecida. En este ejercicios, declaro una sesión pero no la cierro. Esto es
    // debido a que si cierro la sesión no se tiene acceso a los datos necesarios. En producción, es totalmente desaconsejable dejar
    // sesiones abiertas.

    if (!isset($_SESSION)) {
        session_start();
    }

    // Defino el tamaño del array como constantes.
    define ("FILAS", 19);
    define ("COLUMNAS", 12);

    // Importo las librerías externas necesarias.
    include '../imprimirArray.php';
    include '../generarArrayAleatorios.php';

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='hidden' name='file1' value='".realpath('../generarArrayAleatorios.php')."'>
        <input type='hidden' name='file2' value='".realpath('../imprimirArray.php')."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    // Defino la plantilla HTML.
    echo "
        <h2>15. Se tiene una empresa con 18 vendedores, cada uno de los cuales vende 10 productos.</h2>
        <p>Un array de 19x11 alamacena la información de los productos vendiddos por cada vendedor.</p>
        <p>Se pide construir un menú que permita:</p>
        <ul>
            <li>Almacenar los ingresos.</li>
            <li>Revisar el total de cada vendedor.</li>
            <li>Obtener los ingresos totales.</li>
        </ul>
        <p><strong>NOTA: </strong>los valores se cargan como números enteros aleatorios entre el 1 y 10 000.</p>
    ";

    echo "
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <label>Pulsa para insertar los ingresos de los vendedores: </label><input type='submit' name='insertar' value='Insertar'><br>
            <label>Pulsa para revisar el total de cada vendedor: </label><input type='submit' name='revisar' value='Revisar'><br>
            <label>Pulsa para obtener los ingresos totales de todos de los vendedores: </label><input type='submit' name='total' value='Total'>    
        </form>

        <form action='".$_SERVER['PHP_SELF']."' method='post'>
           
        </form>

        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            
        </form>
    ";

    if ($_POST['insertar']) {
        // Destruyo la sesión (si existe) para borrar los datos anteriores.
        if (isset($_SESSION)) {
            session_destroy();
            session_start();
        }

        // Defino la matriz y cargo todos los datos.
        $vendedores = array(array());
        $vendedores[0][0] = "";
        for ($i = 1; $i < FILAS; $i++) {
            $vendedores[$i][0] = "<strong>Vendedor ".$i."</strong>";

            for ($j = 1; $j < COLUMNAS; $j++)
                $vendedores[0][$j] = "<strong>Producto ".$j."</strong>";

            for ($j = 1; $j <= COLUMNAS-2; $j++) {
                $vendedores[$i][$j] = rand(1, 10000);
            }
        }

        // Imprimo la matriz de datos.
        echo "<h3>Informe de ingresos.</h3>";
        imprimirArray(19, 11, $vendedores);

        // Almaceno la matriz en una variable de sesión, para ser procesada posteriormente.
        $_SESSION['vendedores'] = $vendedores;
    }

    if ($_POST['revisar']) {
        // Si no existe una sesión, no existen datos predefinidos.
        if (!isset($_SESSION)) {
                echo "<p>ERROR: NO EXISTEN DATOS.</p>";
        } else {
            // Copio los datos cargados anteriormenet en una nueva matriz, y añado la columna "Total de ingresos.".
            $total = $_SESSION['vendedores'];
            $total[0][11] = "<strong>Total de ingresos</strong>";
            $sum = 0;

            // Calculo el total de ingresos por vendedor y los alamceno en la matriz.
            for ($i = 1; $i < FILAS; $i++) {
                for ($j = 1; $j < COLUMNAS; $j++)
                    $sum += $total[$i][$j];
                $total[$i][11] = $sum;
            }

            // Imprimo la matriz.
            echo "<h3>Ingresos totales por vendedor.</h3>";
            imprimirArray(FILAS, COLUMNAS, $total);

            // Almaceno la nueva matriz para ser procesada posteriormente.
            $_SESSION['total'] = $total;
        }
    }

    if ($_POST['total']) {
        // Si no existe una sesión, no existen datos predefinidos.
        if (!isset($_SESSION)) {
            echo "<p>ERROR: NO EXISTEN DATOS.</p>";
        } else {
            $ventas_totales = 0;
            $total = $_SESSION['total'];

            // Calculo el volumen total de ingresos.
            for ($i = 1; $i < FILAS; $i++)
                $ventas_totales += $total[$i][11];

            // Imprimo el total de ingresos.
            echo "<h3>Total de ingresos.</h3>";
            echo "<p>Ingresos totales: $ventas_totales</p>";
            echo "<h4>Tabla resumen.</h4>";
            imprimirArray(FILAS, COLUMNAS, $total);
            
        }
    }
?>