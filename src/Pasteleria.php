<?php
    use Monolog\Logger;
    use util\LogFactory;
    use \util\ClienteNoEncontradoException;
    use \util\DulceNoEncontradoException;

    include_once('../util/LogFactory.php');
    class Pasteleria{    
    /**
     * nombre
     *
     * @var mixed
     */
    private $nombre;    
    /**
     * productos
     *
     * @var array
     */
    private $productos = array();    
    /**
     * numProductos
     *
     * @var mixed
     */
    private $numProductos;    
    /**
     * clientes
     *
     * @var array
     */
    private $clientes = array();    
    /**
     * numClientes
     *
     * @var mixed
     */
    private $numClientes;

    private Logger $log;     
    /**
     * __construct
     *
     * @param  mixed $nombre
     * @return void
     */
    public function __construct($nombre)
    {
        $this->$nombre=$nombre;
        $this->log = LogFactory::getLogger();
    }        
    /**
     * getClientes
     *
     * @return array
     */
    public function getClientes()
    {
        return $this->clientes;
    }    
    /**
     * getProductos
     *
     * @return array
     */
    public function getProductos()
    {
        return $this->productos;
    }    
    /**
     * incluirProducto
     *
     * @param  mixed $dulce
     * @return Pasteleria
     */
    private function incluirProducto(Dulces $dulce){
        array_push($this->productos,$dulce);
        $this->numProductos=$this->numProductos+1;
        return $this;
    }    
    /**
     * incluirTarta
     *
     * @param  mixed $nombre
     * @param  mixed $numero
     * @param  mixed $precio
     * @param  mixed $numPisos
     * @param  mixed $rellenos
     * @param  mixed $minC
     * @param  mixed $maxC
     * @return Pasteleria
     */
    public function incluirTarta($nombre,$numero,$precio,$numPisos,$rellenos,$minC,$maxC){
        $tarta = new Tarta($nombre,$numero,$precio,$numPisos, $rellenos, $minC, $maxC);
        $this->incluirProducto($tarta);
        $this->numProductos=$this->numProductos+1;
        return $this;
    }    
    /**
     * incluirBollo
     *
     * @param  mixed $nombre
     * @param  mixed $numero
     * @param  mixed $precio
     * @param  mixed $relleno
     * @return Pasteleria
     */
    public function incluirBollo($nombre,$numero,$precio,$relleno){
        $bollo = new Bollo($nombre,$numero,$precio,$relleno);
        $this->incluirProducto($bollo);
        $this->numProductos=$this->numProductos+1;
        return $this;
    }    
    /**
     * incluirChocolate
     *
     * @param  mixed $nombre
     * @param  mixed $numero
     * @param  mixed $precio
     * @param  mixed $porcentajeCacao
     * @param  mixed $peso
     * @return Pasteleria
     */
    public function incluirChocolate($nombre,$numero,$precio,$porcentajeCacao,$peso){
        $chocolate = new Chocolate($nombre,$numero,$precio,$porcentajeCacao,$peso);
        $this->incluirProducto($chocolate);
        $this->numProductos=$this->numProductos+1;
        return $this;
    }    
    /**
     * incluirCliente
     *
     * @param  mixed $nombre
     * @param  mixed $numero
     * @return Pasteleria
     */
    public function incluirCliente($nombre,$numero){
        $cliente = new Cliente($nombre,$numero);
        array_push($this->clientes,$cliente);
        $this->numClientes=$this->numClientes+1;
        return $this;
    }    
    /**
     * listarProductos
     *
     * @return void
     */
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
    /**
     * listarClientes
     *
     * @return void
     */
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
    /**
     * comprarClienteProducto
     *
     * @param  mixed $numeroCliente
     * @param  mixed $numeroDulce
     * @return void
     */
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
                $this->log->warning("El cliente no se encuentra",[$cli]);
                throw new ClienteNoEncontradoException("Cliente no encontrado");
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
                $this->log->critical("El dulce no se encuentra",[$pro]);
                throw new DulceNoEncontradoException("Este dulce no existe");
            }
    }
    
}
    
?>