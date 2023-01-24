<?php
    use Monolog\Logger;
    use util\LogFactory;

    include_once('../util/LogFactory.php');
include "Dulces.php";
class Tarta extends Dulces{
    public $rellenos=array();
    private $numPisos;
    private $minNumComensales;
    private $maxNumComensales;
    private Logger $log; 
    public function __construct($nombre,$numero,$precio,$rellenos,$numPisos,$minNumComensales,$maxNumComensales){
        parent::__construct($nombre,$numero,$precio);
        $this->log = LogFactory::getLogger();
        $this->rellenos=$rellenos;
        $this->numPisos=$numPisos;
        $this->minNumComensales=$minNumComensales;
        $this->maxNumComensales=$maxNumComensales;
    }
    public function getNumPisos(){
        return $this->numPisos;
    }
    public function muestraComensalesPosibles(){
        if($this->minNumComensales==1 && $this->maxNumComensales==1){
            $this->log->info("Tarta para 1 comensal",[]);
            echo "Para un comensal";
        }else if($this->minNumComensales==$this->maxNumComensales){
            $this->log->info("Tarta para $this->minNumComensales comensales",[]);
            echo "Para $this->minNumComensales comensales";
        }else{
            $this->log->info("Tarta para 1De $this->minNumComensales a $this->maxNumComensales comensales",[]);
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