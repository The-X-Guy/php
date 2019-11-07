<?php

// Alumno: Fran Gálvez. 2º ASIR.

// Preparo los ficheros para imprimir el código fuente.
echo "
<form action='../showsource.php' method='post' target='_blank'>
    <input type='hidden' name='filename' value='".__file__."'>
    <input type='submit' value='Ver código fuente'>
</form>";
if($_POST['paresN25']) {
    $numero = $_POST['numero'];
    $suma = 0;
    $aux = 0;
    for ($i = 2, $cont = 1; $cont <= $numero; $cont++) {
        $aux = $i*$cont;
        echo $aux,"<br>";
        $suma += $aux;
    }
    if ($suma> 25)
        echo "La suma de los numeros es mayor de 25";
    else
        echo "La suma de los numero es menor de 25";
} 
?>