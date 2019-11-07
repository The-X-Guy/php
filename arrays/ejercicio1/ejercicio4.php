<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
        <form action='../../showsource.php' method='post' target='_blank'>
            <input type='hidden' name='filename' value='".__file__."'>
            <input type='submit' value='Ver código fuente'>
        </form>";

    $productos = array("Libro", "Cuaderno", "Novela", "Archivador", "Papeplería");
    $cosUni = array(20, 2, 20, 10, 3);
    $preUni = array(25, 3, 30, 15, 5);

    // Captura de datos con formularios.
    echo "
    <h2>4. Una librería comercializa 5 productos, el programa calcula:</h2>
    <ul>
        <li>El monto de dinero invertido.</li>
        <li>El monto de la venta, la ganancia en cada producto y la ganancia total.</li>
    </ul>
    <h4>Introduce las unidades vendidas de cada producto:</h4>
    <form action='".$_SERVER['PHP_SELF']."' method='post'>
        <ul>
            <li><label>".$productos[0].": </label><input type='number' name=".$productos[0]."></li><br>
            <li><label>".$productos[1].": </label><input type='number' name=".$productos[1]."></li><br>
            <li><label>".$productos[2].": </label><input type='number' name=".$productos[2]."></li><br>
            <li><label>".$productos[3].": </label><input type='number' name=".$productos[3]."></li><br>
            <li><label>".$productos[4].": </label><input type='number' name=".$productos[4]."></li><br>
        </ul>
        <input type='submit' name='submit'>
    </form>
    ";

    if ($_POST) {

        // Función que calcula la suma de todos los elementos de un array.
        function sum ($arr) {
            $suma = 0;
            for ($i = 0; $i < count($arr); $i++)
                $suma += $arr[$i];
            return $suma;
        }

        $UnidVend = array();
        $ventas = array();
        $costo = array();
        $ganancia = array();

        echo "<h2>Resumen de ventas</h2>";

        // Almaceno la cantidad de unidades vendidas.
        for ($i = 0; $i < 5; $i++)
            array_push($UnidVend, $_POST[$productos[$i]]);

        // Calculo el total de ventas.
        for ($i = 0; $i < 5; $i++)
            array_push($ventas, $UnidVend[$i]*$preUni[$i]);

        // Calculo el costo total por producto.
        for ($i = 0; $i < 5; $i++)
            array_push($costo, $UnidVend[$i]*$cosUni[$i]);

        // Calculo las ganancias totales por producto.
        for ($i = 0; $i < 5; $i++)
            array_push($ganancia, $ventas[$i]-$costo[$i]);

        // Calculo el total de ventas, costo y ganancias.
        $total_ventas = sum($ventas);
        $total_costo = sum($costo);
        $total_ganancia = sum($ganancia);

        // Imprimo las ventas, el costo, las ganancias y el total en una tabla.
        echo "
            <table style='text-align: center;'>
                <tr>
                    <th>Producto</th>
                    <th>Venta</th>
                    <th>Costo</th>
                    <th>Ganancia</th>
                </tr>
        ";

        // Ventas, costo y ganancias.
        for ($i = 0; $i < 5; $i++) {
            echo "
            <tr>
                <td>".$productos[$i]."</td>
                <td>".$ventas[$i]."</td>
                <td>".$costo[$i]."</td>
                <td>".$ganancia[$i]."</td>
            </tr>
            ";
        }

        echo "
        <tr>
            <td></td>
            <td>---------</td>
            <td>---------</td>
            <td>-------------</td>
        </tr>
        ";

        // Total.
        echo "
        <tr>
            <td></td>
            <td>".$total_ventas."</td>
            <td>".$total_costo."</td>
            <td>".$total_ganancia."</td>
        </tr>
        ";
        echo "</table>";
        
    }
?>