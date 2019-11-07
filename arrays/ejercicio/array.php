<?php
    // Alumno: Fran Gálvez. 2º ASIR.
    
    function arrayEnterosRandom ($n) {
        $salida = array();
        for($i = 0; $i < $n; $i++)
            $salida[] = (rand(0, 1000));
        return $salida;
    }

    function invertirArray ($arr) {
        $salida = array();
        for ($i = count($arr) - 1; $i >= 0; $i--)
            $salida[] = $arr[$i];
        return $salida; 
    }

   function posicionesPares ($arr) {
       $salida = array();
        for ($i = 1; $i < count($arr); $i+=2)
            $salida[] = $arr[$i]; 
        return $salida;
    }

    function posicionesImpares ($arr) {
        $salida = array();
        for ($i = 0; $i < count($arr); $i+=2)
            $salida[] = $arr[$i]; 
        return $salida;
    }

    function imprimirArray ($arr) {
        for ($i = 0; $i < count($arr); $i++)
            echo "arr[".$i."] = ".$arr[$i]."<br>";
    }
    function sumarElementos ($arr) {
        $suma = 0;
        for ($i = 0; $i < count($arr); $i++)
            $suma += $arr[$i];
        return $suma;
    }

    function ordenarMayorMenor($numeros) {
        $aux = 0;
        for ($i = 0; $i < count($numeros); $i++) {
            for ($j = $i+1; $j < count($numeros); $j++) {
                if ($numeros[$j] > $numeros[$i]) {
                    $aux = $numeros[$i];
                    $numeros[$i] = $numeros[$j];
                    $numeros[$j] = $aux;
                }
            }
        }
        return $numeros;
    }
?>