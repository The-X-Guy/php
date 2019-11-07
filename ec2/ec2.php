<!doctype html>
<head>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Ecuacion de segundo grado</title>
</head>
<body>
    <div>
    <h3><u>Resultados</u></h3>
    <?php
        function calcularEcuacion ($a, $b, $c) {
            $discriminante = ($b*$b - 4*$a*$c);
            $resultados = array(0, 1);
            if ($discriminante != 0){
                if ($discriminante > 0) {
                    $resultados[0] = number_format(((-1)*$b + sqrt($discriminante)) / (2*$a), 2);
                    $resultados[1] = number_format(((-1)*$b - sqrt($discriminante)) / (2*$a), 2);
                } else {
                    $resultados[0] = "complejo";
                    $resultados[1] = "complejo";
                }
            } else if ($discriminante == 0) {
                $resultados[0] = number_format(((-1)*$b + sqrt($discriminante)) / (2*$a), 2);
                $resultados[1] = $resultados[0];
            }
            return $resultados;
        }

        if($_POST['ecuacion_grado_2']) {

            // Declaro el array donde voy a guardar todos los datos.
            $datos = array(array());
            
            //Cargo los datos del formulario en la matriz, de la forma:
            // array_datos = (
            //     array_ec1(a1, b1, c1);
            //     array_ec2(a2, b2, c2);
            //     .
            //     .
            //     .
            //     array_ecN(aN, bN, cN);
            // )
            for ($i = 0;$i < 10; $i++) {
                for ($j = 0; $j < 3; $j++) 
                    $datos[$i][$j] = $_POST[$i.$j];
            }
            
            // Extracción de cada submatriz para pocesar los datos (a, b, c).
            for ($i = 0; $i < 10; $i++) {
                $terminos = array();
                for ($j = 0, $k = $i, $j = 0; $j < 3; $j++) {
                    $terminos[$j] = $datos[$k][$j];
                }
                $resultado = calcularEcuacion($terminos[0], $terminos[1], $terminos[2]);
                
                // Inserción de resultados (x1, x2).
                for ($k = 0; $k < 2; $k++)
                    array_push($datos[$i], $resultado[$k]);
            }

            // Impresión de todos los datos de la matriz.
            echo "
                <table>
                    <tr>
                        <th>a</th>
                        <th>b</th>
                        <th>c</th>
                        <th>x1</th>
                        <th>x2</th>
                    </tr>
            ";
            
            for ($i = 0;$i < 10; $i++) {
                echo "<tr>";
                // Impresión de los términos (a, b, c).
                for ($j = 0; $j < 3; $j++)
                    echo "<td>".$datos[$i][$j]."</td>"; 
                
                // Impresión de los resultados (x1, x2).
                for ($j = 3; $j < 5; $j++)
                    echo "<td>".$datos[$i][$j]."</td>"; 

                echo "<tr>";
            }
            echo "</table>";
        }
        ?>
        </div>
    </body>
</html>