<?php
    // Alumno: Francisco Gálvez.

    // Algoritmo de ordenación burbuja de un array bidimensional.
    // Los dos primeros bucles anidados me dan el objeto a comparar.
    // Los dos siguiente bucles obtienen los indices del resto de alementos a partir de i+1, j+1 de forma secuencial.

    function ordenarArrayBidimensional($n, $fila, $columna) {
        $aux = 0;
        for ($i = 0; $i < $fila; $i++) {
            for ($j = 0; $j < $columna; $j++) {
                for ($k = 0; $k < $fila; $k++) {
                    for ($m = 0; $m < $columna; $m++) {
                        if ($m > $fila && $k > $columna) reset($n);
                        // Cambiar el signo de comparación del if de abajo
                        // según se quiera ordenar de mayor a menor o viceversa.
                        if ($n[$i][$j] > $n[$k][$m]) {
                            $aux = $n[$i][$j];
                            $n[$i][$j] = $n[$k][$m];
                            $n[$k][$m] = $aux;
                        }
                    }
                }
            }
        }
        return $n;
    }
?>