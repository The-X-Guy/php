<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    $alumnos = array(
        "Nombre" => "Pepe Pérez Rodríguez",
        "Asignaturas" => array (
            "Matemáticas" => array(4, 7, 8, 9, 7, 9, 5, 6),
            "Lengua" => array(4, 5, 5, 5, 6, 5, 5, 6),
            "Física" => array(4, 7, 8, 9, 7, 9, 8, 8),
            "Informática" => array(4, 7, 8, 9, 7, 9, 2, 5),
            "Francés" => array(4, 7, 8, 9, 7, 9, 5, 6)
        )
    );

    // Calculo la media de cada asignatura
    $medias = array();
    foreach ($alumnos["Asignaturas"] as $asignaturas => $notas) {
        $suma = 0;
        foreach ($notas as $num)
            $suma += $num;
        $suma /= 8;
        array_push($medias, $suma);
    }

    // Calculo la calificación por asignatura
    $calificaciones = array();
    foreach ($medias as $final) {
        if ($final < 5) array_push($calificaciones, "INS");
        else if ($final >=5 && $final < 6) array_push($calificaciones, "SUF");
        else if ($final >=6 && $final < 7) array_push($calificaciones, "BIEN");
        else if ($final >=7 && $final < 9) array_push($calificaciones, "NOT");
        else if ($final >=9 && $final <= 10) array_push($calificaciones, "SOB");
    }

    // Imprimo el boletín de notas.
    echo "
        <h4>Boletín de notas</h4>
        <p>Nombre: ".$alumnos['Nombre']."</p>
        <ul style='list-style-type: none;'>
    ";
    
    $asignaturas = array_keys($alumnos["Asignaturas"]);
    $i = 0;
    foreach ($asignaturas as $nombre) {
        echo "<li>$nombre: $calificaciones[$i]</li>";
        $i++;
    }
        echo "</ul>";

?>