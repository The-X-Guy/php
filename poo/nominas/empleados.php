<?php
    class nominas {
        private $nombre;
        private $bruto;
        private $hijos;
        private $cat;
        private $comision;
        private $retenciones;
        private $extra_hijos;

        // Contructor para crear el objeto.
        function __construct ($retenciones, $neto, $extra_hijos = 0) {
            $this->nombre = $_POST["nombre"]; 
            $this->bruto = $_POST["bruto"];
            $this->hijos = $_POST["hijos"];
            // Si no existen hijos, no se calcula la cuanía extra.
            if ($extra_hijos != 0) $this->extra_hijos = $extra_hijos;
            $this->cat = $_POST["cat"];
            $this->comision = $_POST["comision"];
            $this->retenciones = $retenciones;
            $this->neto = $neto;
        } 

        // Función para imprimir el objeto.
        function imprimir() {
            echo "
                <h4>La nómina de $this->nombre es:</h4>
                <ul>
                    <li>Categoría: $this->cat.</li>
                    <li>Sueldo bruto: $this->bruto.</li>
                    <li>Número de hijos: $this->hijos.</li>
                    <li>Retenciones: $this->retenciones.</li>
                    <li>Comisiones: $this->comision.</li>
                    <li>Sueldo neto: $this->neto.</li>";
            // Si hay hijos, se imprime la cuantía correspondiente.
            if ($this->extra_hijos != 0) echo "<li>Extra por hijos: $this->extra_hijos.</li>";
            echo "</ul>";
        }
    }
?>