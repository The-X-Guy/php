<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    include 'array.php';

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='hidden' name='file1' value='".realpath('array.php')."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    $nombres = array("Juan", "María", "Jose", "Claudia");
    $sexo = array("M", "F", "M", "F");

    echo "<h3>10. Dados dos array con nombres y sexo, sacar los nombre de las mujeres.</h3>";
    echo "<h4>Nombres</h4>";
    imprimirArray($nombres);
    echo "<h4>Sexo</h4>";
    imprimirArray($sexo);
    echo "<br>";
    for ($i = 0; $i < count($nombres); $i++) {
        if ($sexo[$i] == "F")
            echo "Nombre: ".$nombres[$i].". Sexo: ".$sexo[$i]."<br>";
    }

    echo "<br><h3>11. Al igual que el anterior, pero meter los nombres en un nuevo array</h4>";
    $mujeres = array();
    for ($i = 0; $i < count($nombres); $i++) {
        if ($sexo[$i] == "F")
            $mujeres[] = $nombres[$i];
    }
    imprimirArray($mujeres);
?>