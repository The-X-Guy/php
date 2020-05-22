<html>
</body>
    <p>Dado un array numérico de N posiciones entre 100 y 1500, y con valores entre 150 y 500:</p>
    <ul>
        <li>Cargar el array.</li>
        <li>POO: metodo descarga para grabar el array en un fichero.</li>
        <li>Sscar a pantalla los registros entre 100 y 150 del fichero.</li>
    </ul>
    <form action = '<?php $_SERVER['PHP_SELF']?>' method='post'>
        <input type = 'submit' value = 'Calcular'>
    </form>
</body>
</html>
<?php
    include 'lib.php';
    $numeros = new Fichero();
    $numeros_arr = $numeros->numeros;
    print_r($numeros_arr);

    $numeros->descarga();

    echo "<p>Valores en las posiciones 100 y 150.</p>";
    print_r($numeros->imprimir());

?>