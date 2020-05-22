<?php
    class operaciones {
        private $op1;
        private $op2;
        private $resultado;
        private $simbolo;

        public function __construct ($op1, $op2) {
            $this->op1 = $op1;
            $this->op2 = $op2;
        }

        public function __set ($name, $value) {
            $this->$name = $value;
        }

        public function __toString() {
            return $this->op1." ".$this->simbolo." ".$this->op2." = ".$this->resultado;
        }

        public function sumar () {
            return $this->op1 + $this->op2;
        }

        public function restar () {
            return $this->op1 - $this->op2;
        }

        public function multiplicar () {
            return $this->op1 * $this->op2;
        }

        public function dividir () {
            return $this->op1 / $this->op2;
        }
    }
?>