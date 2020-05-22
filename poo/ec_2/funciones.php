<?php
    class ecuacion {
        // Defino los atributos de clase.
        private $a;
        private $b;
        private $c;
        private $atributos = array();

        public function __construct ($a, $b, $c) {
            $this->a = $a;
            $this->b = $b;
            $this->c = $c;
        }

        // Defino un setter para, posteriormente, añadir nuevos atributos al objeto.
        public function __set ($name, $value) {
            $this->atributos[$name] = $value;
        }

        // El método puede imprimir la ecuación y sus soluciones o bien la suma de ambas, si
        // se proporcionan la suma de ambas como argumento.
        public function __toString () {
                // Hallo el signo de b y c para imprimir la ecuación como una cadena bien formateada.
                $signo_b = ($this->b < 0)?"":" + ";
                $signo_c = ($this->c < 0)?"":" + ";
                return "
                    <p>Las soluciones a la ecuación <em>$this->a x<sup>2</sup> $signo_b $this->b x $signo_c $this->c = 0</em>:</p>
                    <ul>
                        <li>x1: ".$this->atributos['x1']."</li>
                        <li>x2: ".$this->atributos['x2']."</li>
                    </ul>
                ";
          
        }

        // Método para calcular las soluciones de la ecuación.
        public function calcular() {
            $a = $this->a;
            $b = $this->b;
            $c = $this->c;

            $discriminante = $b**2 - 4*$a*$c;

            if ($discriminante != 0) {
                if ($discriminante > 0) {
                    $this->atributos['x1'] = ((-1)*$b + sqrt($discriminante))/(2*$a);
                    $this->atributos['x2'] = ((-1)*$b - sqrt($discriminante))/(2*$a);
                } else {
                    $this->atributos['x1'] = "Solución compleja";
                    $this->atributos['x2'] = "Solución compleja";
                }
            } else {
                $this->atributos['x1'] = ((-1)*$b + sqrt($discriminante))/(2*$a);
                $this->atributos['x2']= ((-1)*$b - sqrt($discriminante))/(2*$a);
            }
            return array($this->atributos['x1'], $this->atributos['x2']);
        }

        // Método para sumar ambas ecuaciones.
        public function sumar($ec2) {
            $a = $this->a + $ec2->a;
            $b = $this->b + $ec2->b;
            $c = $this->c + $ec2->c;
            // Hallo el signo de b y c para formatear la salida correctamente.
            $signo_b = ($this->b < 0)?"":" + ";
            $signo_c = ($this->c < 0)?"":" + ";
            return "<p>La suma de las ecuaciones es: <em>$a x<sup>2</sup> $signo_b $b x $signo_c $c = 0</em>.</p>";
        }
    }
?>