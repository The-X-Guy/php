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

    //Calcular 10 numeros aleatorios del 1 al 1000.
    $numeros = arrayEnterosRandom(10);

    //Imprimir los numeros.
    echo "<h3>1. Imprimir 10 números aleatorios entre 1 y 10.</h3>";
    imprimirArray($numeros);

    //Imprimir los números de forma inversa.
    echo "<h3>2. Imprimir el array anterior de forma invertida.</h3>";
    imprimirArray(invertirArray($numeros));

    //Imprimir posiciones pares
    echo "<h3>3. Imprimir sólo las posiciones pares del array.</h3>";
    imprimirArray(posicionesPares($numeros));

    //Imprimir posiciones impares
    echo "<h3>4. Imprimir sólo las posiciones impares del array.</h3>";
    imprimirArray(posicionesImpares($numeros));

    //Sumar pares, impares y decir cual es mayor.
    echo "<h3>5. Se suman los valores de las posiciones pares e impares del array, y se comparan sus resultados.</h3>";
    $suma_pares = sumarElementos(posicionesPares($numeros));
    $suma_impares = sumarElementos(posicionesImpares($numeros));
    $comparar = ($suma_pares > $suma_impares)?"mayor":"menor";
    echo "La suma de los pares ($suma_pares) es $comparar que la suma de los impares ($suma_impares).";

    //Ordenar números y mostrar el mayor y el menor.
    echo "<h3>6. Indicar qué contenido es el mayor y cuál es el menor.</h3>";
    $ordenados = ordenarMayorMenor($numeros);
    $mayor = $ordenados[0];
    $menor = $ordenados[count($ordenados)-1];
    echo "El mayor de los contenidos es $mayor.</br>";
    echo "El menor de los contenidos es $menor.";
?>