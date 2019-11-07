<?php
    // Alumno: Fran Gálvez. 2º ASIR.

    // Preparo los ficheros para imprimir el código fuente.
    echo "
    <form action='../../showsource.php' method='post' target='_blank'>
        <input type='hidden' name='filename' value='".__file__."'>
        <input type='submit' value='Ver código fuente'>
    </form>";

    echo "
        <h4>Dado un vector de números, separados por un esapcio en blanco, se invierte</h2>
        <p>Por ejemplo, 1 2 3 4 5 devuelve 5 4 3 2 1.</p>
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <input type='text' name='vector'>
            <input type='submit'>
        </form>
    ";

    if ($_POST) {
        $invertido_arr = explode(' ', $_POST['vector']);
        $invertido = "";
        for ($i = count($invertido_arr)-1; $i >= 0 ; $i--) {
            $invertido = $invertido.$invertido_arr[$i]." ";
            $invertido = substr_replace($invertido, " ", -1);
        }
        echo $invertido;
    }
?>