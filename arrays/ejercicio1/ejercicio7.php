<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    
    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    echo "
    <h4>5. Dados 10 números enteros por teclado, se leen dos mas y se indica si éstos están entre los anteriores.</h4>
    ";

    // Pedir datos.
    echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
    for ($i = 1; $i <= 10; $i++)
        echo "Introduce el número ".$i.": <input type='number' name='numero".$i."'><br>";
    echo "<h4>Introduce los dos números a buscar:</h4>";
    for ($i = 1; $i <= 2; $i++)
        echo "Introduce el número ".$i.": <input type='number' name='buscar".$i."'><br>";
    echo "<input type='submit' name='submit'></form>";

    if ($_POST) {
        function buscar($arr, $n) {
            for ($i = 0; $i < count($arr); $i++)
               if ($arr[$i] == $n) return true;
            return false;
        }

        $numeros = array();
        $buscar = array();

        // Guardar datos.
        for ($i = 0; $i < 10; $i++)
            array_push($numeros, $_POST['numero'.($i+1)]);
        for ($i = 0; $i < 2; $i++)
            array_push($buscar, $_POST['buscar'.($i+1)]);

        $existe = (buscar($numeros, $buscar[0]))?" sí":" no";
        echo "El número ".$buscar[0].$existe." está entre los 10 números dados.<br>";

        $existe1 = (buscar($numeros, $buscar[1]))?" sí":" no";
        echo "El número ".$buscar[1].$existe1." está entre los 10 números dados.";
    
    }
?>