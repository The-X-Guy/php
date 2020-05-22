<?php
    // Deshabilito la impresión de errores.
    error_reporting(0);

    include 'funciones.php';

    echo "<h3>Programa que calcula las soluciones de una ecuación de segundo grado, de la forma ax<sup>2</sup> + bx + c = 0.<br> A continuación, calcula las soluciones de dicha ecuación y la suma de las mismas.</h3>";
    echo "
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <h4>Introduce los términos de la primera ecuación:</h4>
            <div>
                <label>Introduce el término <em>a</em>: </label>
                <input type='number' name='a1'>
            </div>
            <div>
                <label>Introduce el término <em>b</em>: </label>
                <input type='number' name='b1'>
            </div>
            <div>
                <label>Introduce el término <em>c</em>: </label>
                <input type='number' name='c1'>
            </div>
            <h4>Introduce los términos de la segunda ecuación:</h4>
            <div>
                <label>Introduce el término <em>a</em>: </label>
                <input type='number' name='a2'>
            </div>
            <div>
                <label>Introduce el término <em>b</em>: </label>
                <input type='number' name='b2'>
            </div>
            <div>
                <label>Introduce el término <em>c</em>: </label>
                <input type='number' name='c2'>
            </div>
            <div>
                <input type='submit' name='enviar' value='Calcular'>
            </div>
        </form>
    ";

    if ($_POST['enviar']) {
        // Defino una variable para el control de errores
        $errores = false;

        // Almaceno los datos del formulario
        $a1 = $_POST['a1'];
        $b1 = $_POST['b1'];
        $c1 = $_POST['c1'];
        $a2 = $_POST['a2'];
        $b2 = $_POST['b2'];
        $c2 = $_POST['c2'];

        // Si es igual a cero, se incrementa el contador de errores.
        if ($a1 == 0 || $a2 == 0) {
            echo "<script>alert('Error: el primer término tiene que ser distinto de cero.')</script>";
            $errores = true;
        }

        // Código a ejecutar si no se han producido errores.
        if (!$errores) {
            // Creo los objetos.
            $ec1 = new ecuacion($a1, $b1, $c1);
            $ec2 = new ecuacion($a2, $b2, $c2);

            // Calculo las soluciones.
            $res_ec1 = $ec1->calcular();
            $res_ec2 = $ec2->calcular();

            // Añado las soluciones a los objetos creados como nuevos atributos.
            $ec1->x1 = $res_ec1[0];
            $ec1->x2 = $res_ec1[1];
            $ec2->x1 = $res_ec2[0];
            $ec2->x2 = $res_ec2[1]; 

            // DEPURACIÍON: imprimir objetos.
            // print_r($ec1);
            // print_r($ec2);

            // Imprimo la suma de ambas ecuaciones.
            echo $ec1->sumar($ec2);

            
            // Imprimo la ecuación y sus resultados.
            echo $ec1;
            echo $ec2;     

        }
    }
?>