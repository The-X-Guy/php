<?php

    // Deshabilito la impresión de errores.
    error_reporting(0);

    include 'operaciones.php';

    echo "
        <h4>Selecciona la operación a realizar:</h4>
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <input type='radio' name='operaciones' value='suma'>Suma.<br>
            <input type='radio' name='operaciones' value='resta'>Resta.<br>
            <input type='radio' name='operaciones' value='multiplicacion'>Multiplicación..<br>
            <input type='radio' name='operaciones' value='division'>División.<br>
            <div>
                <label>Primer operando: </label>
                <input type='number' name='op1'>
            </div>
            <div>
                <label>Segundo operando: </label>
                <input type='number' name='op2'>
            </div>
            <input type='submit' name='enviar' value='Calcular'><br>
        </form>
    ";

    if ($_POST['enviar']) {
        // Obtengo los datos del formulario.
        $operacion = $_POST['operaciones'];
        $op1 = $_POST['op1'];
        $op2 = $_POST['op2'];

        // Control de errores.
        $errores = false;
        if ($operacion == "division" && $op2 == 0) {
            echo "<script>alert('Error: no se puede dividir entre cero. El segundo operando deber ser distinto de cero.')</script>";
            $errores = true;
        }
        if (empty($operacion)) {
            echo "<script>alert('Error: ninguna opción seleccionada')</script>";
            $errores = true;
        }

        // Si no hubo errores, continuo la ejecución.
        if (!$errores) {
            $objeto = new operaciones($op1, $op2);
            $res = 0;
            $simbolo = "";

            // Discriminación de las opciones y ejecución.
            switch($operacion) {
                case "suma":
                    $res = $objeto->sumar();
                    $simbolo = "+";
                    break;
                case "resta":
                    $res = $objeto->restar();
                    $simbolo = "-";
                    break;
                case "multiplicacion":
                    $res = $objeto->multiplicar();
                    $simbolo = "*";
                    break;
                case "division":
                    $res = $objeto->dividir();
                    $simbolo = "/";
                    break;
            }

            // Añado los nuevos atributos al objeto.
            $objeto->resultado = $res;
            $objeto->simbolo = $simbolo;

            //Imprimo los resultados.
            echo $objeto;
        } 
    }
?>