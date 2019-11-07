<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    $idiomas = array ("Inglés", "Francés", "Alemán", "Ruso");
    $niveles = array ("Básico", "Medio", "Perfeccionamiento");
    $num_alumnos = array(
        "20" => array ($idiomas[0], $niveles[0]),
        "5" => array ($idiomas[1], $niveles[2]),
        "14" => array ($idiomas[3], $niveles[1]),
        "6" => array ($idiomas[2], $niveles[2])
    );
?>