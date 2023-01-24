<?php
    include_once "Cliente.php";
    include_once "Tarta.php";
    include_once "Bollo.php";
    include_once "Chocolate.php";
    class Pasteleria{
    private $nombre;
    private $productos = array();
    private $numProductos;
    private $clientes = array();
    private $numClientes;

    public function __construct($nombre)
    {
        $this->$nombre=$nombre;
    }
    public function getClientes()
    {
        return $this->clientes;
    }
    public function getProductos()
    {
        return $this->productos;
    }
    private function incluirProducto(Dulces $dulce){
        array_push($this->productos,$dulce);
        $this->numProductos=$this->numProductos+1;
        return $this;
    }
    public function incluirTarta($nombre,$numero,$precio,$numPisos,$rellenos,$minC,$maxC){
        $tarta = new Tarta($nombre,$numero,$precio,$numPisos, $rellenos, $minC, $maxC);
        $this->incluirProducto($tarta);
        $this->numProductos=$this->numProductos+1;
        return $this;
    }
    public function incluirBollo($nombre,$numero,$precio,$relleno){
        $bollo = new Bollo($nombre,$numero,$precio,$relleno);
        $this->incluirProducto($bollo);
        $this->numProductos=$this->numProductos+1;
        return $this;
    }
    public function incluirChocolate($nombre,$numero,$precio,$porcentajeCacao,$peso){
        $chocolate = new Chocolate($nombre,$numero,$precio,$porcentajeCacao,$peso);
        $this->incluirProducto($chocolate);
        $this->numProductos=$this->numProductos+1;
        return $this;
    }
    public function incluirCliente($nombre,$numero){
        $cliente = new Cliente($nombre,$numero);
        array_push($this->clientes,$cliente);
        $this->numClientes=$this->numClientes+1;
        return $this;
    }
    public function listarProductos(){
        echo "Número de productos: $this->numProductos <br>";
        $listadoProd =  [];
        foreach($this->productos as $p){
            array_push($listadoProd,$p->nombre);
        }
        foreach($listadoProd as $p){
            echo "<li> $p </li>";
        }
    }
    public function listarClientes(){
        echo "Número de clientes: $this->numClientes <br>";
        $listadoCli =  [];
        foreach($this->clientes as $c){
            array_push($listadoCli,$c->nombre);
        }
        foreach($listadoCli as $c){
            echo "<li> $c </li>";
        }
    }
    public function comprarClienteProducto($numeroCliente,$numeroDulce){
        $existeDulce = false;
        $existeCliente = false;
            foreach ($this->getClientes() as $cliente) {
                if ($cliente->getNumero() == $numeroCliente) {
                    $cli = $cliente;
                    $existeCliente = true;
                }
            }
            if (!$existeCliente) {
                echo "Cliente no encontrado";
            }
            foreach ($this->getProductos() as $dulce) {
                if ($dulce->getNumero() == $numeroDulce) {
                    $pro = $dulce;
                    $existeDulce = true;
                    if ($cli->comprar($pro)) {
                        echo "Compra realizada";
                    } else {
                        echo "No se ha realizado la compra";
                    }
                }
            }
            if (!$existeDulce) {
                echo "Este dulce no existe";
            }
    }
    
}
    
?>