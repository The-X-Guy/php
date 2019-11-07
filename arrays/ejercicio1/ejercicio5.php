<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    
    include '../ordenar.php';

    // Preparo los ficheros para imprimir el código fuente.
    echo "
        <form action='../../showsource.php' method='post' target='_blank'>
            <input type='hidden' name='filename' value='".__file__."'>
            <input type='hidden' name='file1' value='".realpath('../ordenar.php')."'>
            <input type='submit' value='Ver código fuente'>
        </form>";
   
    echo "
        <h4>5. Dados 10 números enteros por teclado, se pide:</h4>
        <ul>
            <li>Cuántos de esos números son pares.</li>
            <li>Cuál es el valor del número máximo.</li>
            <li>Cuál es el valor del número mínimo.</li>
        </ul>
    ";

    // Pedir datos.
    echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
    for ($i = 1; $i <= 10; $i++)
        echo "Introduce el número ".$i.": <input type='number' name='numero".$i."'><br>";
    echo "<input type='submit' name='submit'></form>";

    if ($_POST) {
        $numeros = array();

        // Guardar datos.
        for ($i = 0; $i < 10; $i++)
            array_push($numeros, $_POST['numero'.($i+1)]);

        // Extraer numeros pares.
        $pares = array();
        for ($i = 0; $i < 10; $i++) {
            if ($numeros[$i]%2 == 0)
            array_push($pares, $numeros[$i]);
        }

        // Ordenar de mayor a menor.
        $ordenados = ordenarMayorMenor($numeros);

        // Imprimir resultados.
        echo "<p>Hay ".(count($pares)-1)." números pares</p>";
        echo "<p>El número mayor es ".$ordenados[0]."</p>";
        echo "<p>El número menor es ".$ordenados[9]."</p>";
    }

?>