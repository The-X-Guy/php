<?php
    //Fran Gálvez.
    // Generación de una matriz de números aleatorios.

    // $filas -> nº de filas del array.
    // $columnas -> nº de columnas del array.
    // $lim_inf -> límite inferior del rango de números a generar.
    // $lim_sup -> límite superior del rango de números a generar.

    function generarArrayAleatorios ($filas, $columnas, $lim_inf, $lim_sup) {
        $aleatorios = array(array());
        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++)
                $aleatorios[$i][$j] = rand($lim_inf, $lim_sup);
        }
        return $aleatorios;
    }
?>