<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    // Algoritmo de ordenación burbuja de una array unidimensional.

    function ordenarMayorMenor($n) {
        $aux = 0;
        for ($i = 0; $i < count($n); $i++) {
            // Usar < o > según se quiera ordenar.
            for ($j = $i+1; $j < count($n); $j++) {
                if ($n[$j] > $n[$i]) {
                    $aux = $n[$i];
                    $n[$i] = $n[$j];
                    $n[$j] = $aux;
                }
            }
        }
        return $n;
    }
?>