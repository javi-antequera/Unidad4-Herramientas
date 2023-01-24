<?php
    class Dulces{
    private $nombre;
    protected $numero;
    private $precio;
    const IVA=21/100;
    
    public function __construct($nombre,$numero,$precio){
        $this->nombre=$nombre;
        $this->numero=$numero;
        $this->precio=$precio;
    }
    public function getPrecioConIva(){
        return $this->precio + $this->precio* $this::IVA;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function muestraResumen(){
        echo "<br>Nombre: <strong>" . $this->nombre . "</strong>"; 
        echo "<br>Nº de dulce: " . $this->getNumero() . ""; 
        echo "<br>Precio: " . $this->getPrecio() . " euros"; 
        echo "<br>Precio IVA incluido: " . $this->getPrecioConIVA() . " euros";
    }
    
}

?>