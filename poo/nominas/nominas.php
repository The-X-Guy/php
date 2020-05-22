<?php
    include "empleados.php";
    echo "
        <h3>Cálculo de nóminas.</h3>
        <form action=".$_SERVER['PHP_SELF']." method='post'>
            <div>
                <label>Introduce el nombre del empleado: </label>
                <input name='nombre' type='text'>
            </div>
            <div>
                <label>Introduce el salario bruto: </label>
                <input name='bruto' type='number' min=0>
            </div>
            <div>
                <label>Número de hijos:</label>
                <input name='hijos' type='number' min=0>
            </div>
            <div>
                <label>Categoría: </label>
                <input name='cat' type='number' min=1 max=2>
            </div>
            <div>
                <label>Comisiones: </label>
                <input name='comision' type='number' min=0>
            </div>
            <input type='submit'>
        </form>";

    if ($_POST) {
        $nombre = $_POST["nombre"];
        $bruto = $_POST["bruto"];
        $hijos = $_POST["hijos"];
        $cat = $_POST["cat"];
        $comision = $_POST["comision"];

        // Comprobación de errores.
        $errores = 0;
        if ($nombre == "" || empty($nombre)) {
            echo "Error: Introduce un nombre";
            $errores++;
        }
        if (empty($bruto)) {
            echo "Error: Introduce un sueldo.";
            $errores++;
        }
        if (!isset($hijos)) {
            echo "Error: Introduce el número de hijos.";
            $errores++;
        }
        if (empty($cat) || $cat == 0) {
            echo "Error: introduce la categoría.";
            $errores++;
        }
        if (empty($comision)) {
            echo "Error: introduce las comisiones.";
            $errores++;
        }
        
        // Ejercución.
        if (!$errores) {
            // Declaro variable y objetos.
            $irpf = 0.1;
            $extra_cat = 500;
            $extra_hijos = 0;
            

            // Aplico el procentaje de IRPF según el salario.
            if ($bruto >= 1500 && $bruto < 1699) $irpf = 0.14;
            else if ($bruto >= 1700) $irpf = 0.2;
            
            // Establezco la categoría. Por defecto, la categría es 1
            if ($cat == 2) $extra_cat = 250;
            
            // Calculo las retenciones.
            $retenciones = $bruto*$irpf;

            // Calculo el sueldo neto.
            $neto = (($bruto + $extra_cat + $comision) - $retenciones) + $extra_hijos;
            
            // Si hay hijos, se llama al constructor con todos los datos.
            if ($hijos != 0) {
                $extra_hijos = $hijos*100;
                $nomina = new nominas($retenciones, $neto, $extra_hijos);
            } else {
                // Si no hay hijos, se llama al constructor sin el numero de hijos.
                $nomina = new nominas($retenciones, $neto);
            }
            
            // Imprimo el objeto nómina.
            $nomina->imprimir();
            
        }
    }
?>