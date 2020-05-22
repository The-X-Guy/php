<?php
    error_reporting(0);

    function farenheit($c) {
        return $c*(9/5)+32;
    }

    function calculo($a, $b, $c) {
        return 3*$a-farenheit($c)/2*$b+1;
    }
    // Genero el fichero con los datos aleatorios. 
    $datos = fopen("datos.dat", "w+");
    for ($i = 0; $i < 80; $i++) {
        $linea = rand(-40, 50)." ".rand(-40, 50)." ".rand(-40, 50)."\n";
        fwrite($datos, $linea);
    }
    fclose($datos);

    // Conecto con la base de datos.
    $mysqli = new mysqli("localhost", "root", "");
    echo "<strong>Conexión con el servidor.</strong></br>";
    if ($mysqli->connect_errno) {
        die("Se ha producido un error conectando con la base de datos: ".$this->connect_errno."</br>");
    } else
        echo "La conexión con el servidor de bases de datos se ha realizado correctamente.</br>";
    
    // Creación de la base de datos
    if (!$mysqli->query("create database if not exists METEOROLOGIA"))
        die("Error creando la base de datos METEOROLOGIA: ".$mysqli->error."</br>");
    else {
        echo "La base de datos METEOROLOGIA se ha creado correctamente.</br>";
        $mysqli->query("use METEOROLOGIA");
    }

    // Creación de la tabla
    echo "<br><strong>Creación de la tabla.</strong></br>";
    $sql = "create table if not exists ALERTA (id int(3) primary key, a int(3), b int(3), c int(3))";
    if (!$mysqli->query($sql))
        die("Error creando la tabla ALERTA: ".$mysqli->error."</br>");
    else
        echo "La tabla ALERTA se ha creado correctamente.</br>";
    
    // Borro los datos previos de la tabla ALERTA
    $mysqli->query("delete from ALERTA");

    // Discrimino los datos.
    $datos = fopen("datos.dat", "r");
    $id = 0;
    while (!feof($datos)) {
        $linea = fgets($datos);
        if ($linea != null){
            $valores = explode(" ", $linea);
            if ((($valores[0] < -10) || ($valores[0] > 20)) || (($valores[1] < -5) || ($valores[1] > 10)) || (($valores[2] < -30) || ($valores[2] > 40))) {
                $sql = "insert into ALERTA (id, a, b, c) values (".$id++.",".$valores[0].",".$valores[1].",".$valores[2].")";
                $mysqli->query($sql);
            }
            
        }
    }
    fclose($datos);
    
    // Imprimo el contenido de la tabla ALERTA.
    echo "</br><string>Contenido de la tabla ALERTA.</strong></br></br>";
    echo "
        <table style='border-collapse: collapse'>
            <tr>
                <th style='border: 1px solid black; padding: 4px'>id</th>
                <th style='border: 1px solid black; padding: 4px'>a</th>
                <th style='border: 1px solid black; padding: 4px'>b</th>
                <th style='border: 1px solid black; padding: 4px'>c</th>
            <tr>
    ";
    $sql = "select * from ALERTA";
    $res = $mysqli->query($sql);

    while ($rows = $res->fetch_assoc()) {
        echo "
            <tr>
                <td style='border: 1px solid black; padding: 4px'>".$rows["id"]."</td>
                <td style='border: 1px solid black; padding: 4px'>".$rows["a"]."</td>
                <td style='border: 1px solid black; padding: 4px'>".$rows["b"]."</td>
                <td style='border: 1px solid black; padding: 4px'>".$rows["c"]."</td>
            </tr>
        ";
    }
    echo "</table>";

    // Vuelvo a discriminar los datos.
    $datos = fopen("datos.dat", "r");
    $resultado = array();
    while (!feof($datos)) {
        $linea = fgets($datos);
        $valores = explode(" ", $linea);
        if ((($valores[0] > -10) && ($valores[0] < 20)) && (($valores[1] > -5) && ($valores[1] < 10)) && (($valores[2] > -30) && ($valores[2] < 40))) {
            array_push($resultado, calculo($valores[0], $valores[1], $valores[2]));
        }
    }
    sort($resultado);
    echo "
        </br><table>
            <tr>
                <th>Resultados</th>
            </tr>
    ";
    foreach ($resultado as $valor) {
        echo "<tr>";
        echo "<td>".$valor."</td>";
        echo "</tr>";
    }
    fclose($datos);
?>