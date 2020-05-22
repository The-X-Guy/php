<?php
    if (file_exists("vecinos.txt"))
       unlink("vecinos.txt");
       
    echo "
        <h4>Teniendo un array multidimensional con los vecinos de una urbanización, teniendo: 2 fases, 2 portales, 2 plantas, 3 casas.</h4>
        <p>Se pide:</p>
        <ul>
            <li>Volcar el contenido de la fase 1, portal 2 a un array unidimensional llamado vecinos.</li>
            <li>Pasarlo todo a un array unidimensional.</li>
            <li>Volcar el contenido a un fichero de texto.</li>
        </ul>
    ";

    $urb = array (
        "fase 1" => array (
            "portal 1" => array (
                "piso 1" => array(
                    "casa 1" => "David Segura Gil",
                    "casa 2" => "Miguel Ángel Martin Gallardo",
                    "casa 3" => "Ian Gil Diaz"
                ),
                "piso 2" => array(
                    "casa 1" => "Naiara Marquez Alvarez",
                    "casa 2" => "Esther Alonso Serrano",
                    "casa 3" => "Andrés Rodriguez Ortiz"
                )
            ),
            "portal 2" => array (
                "piso 1" => array(
                    "casa 1" => "Carolina Rodriguez Gomez",
                    "casa 2" => "Marti Aguilar Ortiz",
                    "casa 3" => "Carolina Marquez Iglesias"
                ),
                "piso 2" => array(
                    "casa 1" => "Lola Rubio Saez",
                    "casa 2" => "Cristina Molina Mendez",
                    "casa 3" => "César Gallardo Navarro"
                )
            ),
        ),
        "fase 2" => array (
            "portal 1" => array (
                "piso 1" => array(
                    "casa 1" => "Alicia Roca Martin",
                    "casa 2" => "Santiago Vidal Cano",
                    "casa 3" => "Sergio Carrasco Pascual"
                ),
                "piso 2" => array(
                    "casa 1" => "Lorena Cabrera Ortega",
                    "casa 2" => "Raquel Rubio Morales",
                    "casa 3" => "Valeria Santos Iglesias"
                )
            ),
            "portal 2" => array (
                "piso 1" => array(
                    "casa 1" => "Paula Nuñez Vargas",
                    "casa 2" => "Valentina Medina Castillo",
                    "casa 3" => "Eduardo Peña Gil"
                ),
                "piso 2" => array(
                    "casa 1" => "Lorena Soler Velasco",
                    "casa 2" => "Celia Calvo Mendez",
                    "casa 3" => "Carlota Herrera Molina"
                )
            ),
        ),
    );
    
    // Imprimo los datos.
    echo "<h4>Imprimo los datos:</h4>";
    foreach ($urb as $fase => $portal) {
        foreach ($portal as $portal => $piso) {
            foreach ($piso as $piso => $casa) {
                foreach ($casa as $casa => $vecino) {
                    echo "
                        <ul>
                            <li>Nombre: $vecino.</li>
                            <li>Fase: $fase.</li>
                            <li>Portal: $portal.</li>
                            <li>Piso: $piso.</li>
                            <li>Casa: $casa.</li> 
                        </ul>
                    ";
                }
            }
        }
    }


    // Volcar datos de la fase 1, portal 2 a un array unidimensional.
    echo "<h4>1. Volcar el contenido de la fase 1, portal 2 a un array unidimensional llamado vecinos.</h4>";
    $aux = $urb["fase 1"]["portal 2"];
    $vecinos = array();
    foreach ($aux as $piso => $casa) {
        foreach ($casa as $casa => $vecino)
            array_push($vecinos, "$vecino, $piso, $casa");
    }
    print_r($vecinos);

    // Lo paso todo a un array unidimensional.
    echo "<h4>2. Pasarlo todo a un array unidimensional.</h4>";
    $datos = array();
    foreach ($urb as $fase => $portal) {
        foreach ($portal as $portal => $piso) {
            foreach ($piso as $piso => $casa) {
                foreach ($casa as $casa => $vecino) {
                    array_push($datos, "$vecino, $fase, $portal, $piso, $casa");
                }
            }
        }
    }
    print_r($datos);

    // Inserto los datos en un fichero de texto para descargar.ç// Preparo el fichero vecinos.txt
    foreach ($urb as $fase => $portal) {
        foreach ($portal as $portal => $piso) {
            foreach ($piso as $piso => $casa) {
                foreach ($casa as $casa => $vecino) {
                    file_put_contents("vecinos.txt", "\n\nNombre: $vecino \n\tFase: $fase \n\tPortal: $portal \n\tPiso: $piso \n\tCasa: $casa", FILE_APPEND);
                }
            }
        }
    }
    echo "
        <h4>3. Volcar el contenido a un fichero de texto.</h4>
        <form action='download.php' method='post'>
            <input hidden name='filename' value='vecinos.txt'>
            <input type='submit' name='descarga' value='Descargar'>
        </form>
    ";
?>