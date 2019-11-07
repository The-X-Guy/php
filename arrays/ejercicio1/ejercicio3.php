<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    
    // Preparo los ficheros para imprimir el código fuente.
    echo "
        <form action='../../showsource.php' method='post' target='_blank'>
            <input type='hidden' name='filename' value='".__file__."'>
            <input type='submit' value='Ver código fuente'>
        </form>";

    function potencias($base, $exp) {
        return pow($base, $exp);
    }

    echo "<h4>3. Mostrar una tabla que contenga las 4 primeras potencias de los números del 1 al 4, invocando a una función, que a su vez invoque a la función pow().</h4>";
    
    $potencia = array(
        array(1, 1, 1, 1),
        array(2, 2, 2, 2),
        array(3, 3, 3, 3),
        array(4, 4, 4, 4)
    );

    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++)
            $potencia[$i][$j] = potencias($potencia[$i][$j], $j);

    }

    echo "<table style='padding: 5px;'>";
    echo 
        "<tr>
            <th>Potencias de 1&nbsp;&nbsp;</th>
            <th>Potencias de 2&nbsp;&nbsp;</th>
            <th>Potencias de 3&nbsp;&nbsp;</th>
            <th>Potencias de 4&nbsp;&nbsp;</th>
        </tr>
        ";
    for ($i = 0; $i < 4; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 4; $j++) 
           echo "<td>".($j+1)."^".($i+1)."=".$potencia[$i][$j]."</td>";
        echo "<tr>";
    }
?>