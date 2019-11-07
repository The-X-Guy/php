<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    echo "<h2>18. Dada una matriz de letras mayúsculas, se cuenta cuanta hay de cada tipo.</h2>";
    echo "<p>Los resultados están al final de la página.</p>";

    // Genera una letra mayúscula de forma aleatoria.
    function generarArrayLetrasAleatoria($filas, $columnas, $A_Z) {
        $letras = array(array());
        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++)
                $letras[$i][$j] = $A_Z[rand(0, 25)];
        }
        return $letras;
    }

    // Función para contar cantidad de letras.
    function contarLetras ($letras, $filas, $columnas, $A_Z) {
        $cantidad = array();
        for ($k = 0, $cont = 0; $k <= 25; $k++) {
            $cont = 0;
            for ($i = 0; $i < $filas; $i++) {
                for ($j = 0; $j < $columnas; $j++)
                    if ($letras[$i][$j] == $A_Z[$k])
                        $cont++;
            }
            $cantidad[$k] = $cont;
        }
        return $cantidad;
    }

    // Defino la cadena de letras.
    $A_Z = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    // Defino el tamaño del array como constantes.
    define ("FILAS", 50);
    define ("COLUMNAS", 20);

    // Importo las librarías necesarias.
    include '../imprimirArray.php';

    // Genero una matriz con 1000 letras mayúsculas aleatorias.
    $letras = generarArrayLetrasAleatoria(FILAS, COLUMNAS, $A_Z);
    imprimirArray(FILAS, COLUMNAS, $letras);

    // Cuento cuantas letras hay de cada una.
    $cantidad = contarLetras($letras, FILAS, COLUMNAS, $A_Z);

    //Imprimo los resultados.
    echo "<ul>";
    for ($i = 0, $cont = 0; $i < count($cantidad); $i++, $cont++) {
        echo "<li>La cantidad de $A_Z[$i] es: $cantidad[$i].</li>";
    }
    echo "</ul>";


?>