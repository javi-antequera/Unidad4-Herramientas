<?php
include "Dulces.php";
class Tarta extends Dulces{
    public $rellenos=array();
    private $numPisos;
    private $minNumComensales;
    private $maxNumComensales;
    public function __construct($nombre,$numero,$precio,$rellenos,$numPisos,$minNumComensales,$maxNumComensales){
        parent::__construct($nombre,$numero,$precio);
        $this->rellenos=$rellenos;
        $this->numPisos=$numPisos;
        $this->minNumComensales=$minNumComensales;
        $this->maxNumComensales=$maxNumComensales;
    }
    public function muestraComensalesPosibles(){
        if($this->minNumComensales==1 && $this->maxNumComensales==1){
            echo "Para un comensal";
        }else if($this->minNumComensales==$this->maxNumComensales){
            echo "Para $this->minNumComensales comensales";
        }else{
            echo "De $this->minNumComensales a $this->maxNumComensales comensales";
        }
    }
    public function muestraResumen(){
        parent:: muestraResumen();
        echo "<br>";
        echo "Rellenos:";
        foreach($this->rellenos as $r){
            echo "<ol>";
            echo "-$r";
            echo"</ol>";
        }
        echo "Pisos: $this->numPisos";
        echo "<br>";
        echo $this->muestraComensalesPosibles(); 
    }
}
?>