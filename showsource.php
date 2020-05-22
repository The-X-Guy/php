<?php
    // Alumno: Fran Gálvez. 2º ASIR. 
    // Esta página permite imprimir el código fuente de un fichero PHP en el navegador.
    
    if ($_POST) {
        foreach ($_POST as $clave => $valor) {
            $source = $valor;
            echo "<u>".substr(strrchr($source, "\\"), 1)."</u><br>";
            echo show_source($source, true)."<br><br>";
        } 
    }
?>