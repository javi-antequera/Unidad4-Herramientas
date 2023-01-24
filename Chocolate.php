<?php 
    include_once "Dulces.php";
    class Chocolate extends Dulces{
        private $porcentajeCacao;
        private $peso;
        public function __construct($nombre,$numero,$precio,$porcentajeCacao,$peso){
            parent::__construct($nombre,$numero,$precio);
            $this->porcentajeCacao=$porcentajeCacao;
            $this->peso=$peso;
        }
        public function muestraResumen(){
            parent:: muestraResumen();
            echo "<br>Porcentaje de Cacao: $this->porcentajeCacao %";
            echo "<br>Peso: $this->peso g";
        }
    }
?>