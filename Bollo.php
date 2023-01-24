<?php 
    include_once "Dulces.php";
    class Bollo extends Dulces{
        private $relleno;
        public function __construct($nombre,$numero,$precio,$relleno){
            parent::__construct($nombre,$numero,$precio);
            $this->relleno=$relleno;
        }
        public function muestraResumen(){
            parent:: muestraResumen();
            echo "<br>Relleno: $this->relleno";
        }
    }
?>