<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
        <form action='../../showsource.php' method='post' target='_blank'>
            <input type='hidden' name='filename' value='".__file__."'>
            <input type='submit' value='Ver código fuente'>
        </form>";
    
    echo "<h4> 2. Ídem al anterior pero colorear las filas alternando gris y blanco. Además, el tamaño será una constante.</h4>";

    $numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    $tabla = array(array());

    // Se define el tamño como una constante.
    define("TAM", 10);

    // Cargo los elementos en el array.
    for ($i = 0; $i < TAM; $i++) {
        for ($j = 0; $j < 10; $j++)
            $tabla[$i][$j] = $numeros[$j] + 10*$i; 
    }

    // Imprimo el array.
    echo "<table>";
    for ($i = 0, $row = 0; $i < TAM; $i++, $row++) {
        if ($row%2 == 0) echo "<tr style='background-color: lightgray;'>";
        else echo "<tr>";
        for ($j = 0; $j < 10; $j++)
            echo "<td>".$tabla[$i][$j]."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>