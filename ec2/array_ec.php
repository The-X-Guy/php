<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='hidden' name='file1' value='".realpath('ec2.php')."'>
        <input type='submit' value='Ver código fuente'>
    </form>";
?>
<!DOCTYPE html>
    <head>
        <meta lang="es">
        <meta author="Fran Galvez">
        <title>Ecuacion segundo grado</title>
        <link rel="stylesheet" type="text/css" href="./estilos.css">
    </head>
    <body>
        <div>
            <h3><u>Ejercicio ecuación de segundo grado con PHP utilizando matrices multidimensionales.</u></h3>
            <p>
                Dados los términos de 10 ecuaciones de segundo grado, se calcula su resultado
                y se guardan las variables y sus resultados en una matriz bidimensional.
            </p>
            <p>Dicha matriz será volcada en un tabla y mostrada al usuario.</p>
            <p>Introduce todos los datos y pulsa en "Calcular soluciones" en la parte baja de la página.</p><br>
            <p class="nota">NOTA: el término <em>a</em> siempre tiene que ser distinto de cero.</p>
            <p class="nota">NOTA: el programa carece de control de errores, por lo que todos los datos deben ser introducidos como números enteros.</p><br>
            <form action="ec2.php" method="post">
                <?php
                    for ($i = 0;$i < 10; $i++) {
                        echo '<p><strong>Introduce los terminos de la ecuación '.($i+1).'.</strong><p>';
                        for ($j = 0; $j < 3; $j++) 
                            echo '<p class="data">Introduce el término '.($j+1),': <input name="'.$i.$j.'" type="number"><p>';
                    }
                ?>
                <input type="submit" name="ecuacion_grado_2" value="Calcular soluciones">
            </form>
        </div>
    </body>
</html>