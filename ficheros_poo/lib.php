<?php

// dado un array numerico de N posiciones entre 1000 y 1500, y con valores entre 150 y 500.
// -> Funcion carga que cargue el array.
// -> con POO un metodo descarga y pasar el array a un fichero n1
// -> sacar a pantalla los registros entre 150 y 300.

class Fichero {
    public $numeros = array();
    public $tam = 0;

    public function __construct () {
        $this->tam = rand(1000, 1500);
        for ($i = 0; $i < $this->tam; $i++)
            $this->numeros[$i] = rand(150, 500);
    }

    public function descarga () {
        $f = fopen("n1.dat", "w");
        for ($i = 0; $i < $this->tam; $i++)
            fwrite($f, $this->numeros[$i]."\n");
        fclose($f);
    }

    public function imprimir () {
        $f = fopen("n1.dat", "r");
        $valores = array();
        $cont = 0;
        $val = fgets()
        while ($cont >= 100 && $cont < 150) {

        }
        fclose($f);
        return $valores;
    }
}
?>