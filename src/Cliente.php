<?php
    use \util\DulceNoCompradoException;
class Cliente
{
    public $nombre;
    private $numero;
    private $dulcesComprados = array();
    private $numDulcesComprados;
    private $numPedidosEfectuados;

    public function __construct($nombre, $numero, $numPedidosEfectuados = 0)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->numPedidosEfectuados = $numPedidosEfectuados;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getDulcesComprados()
    {
        return $this->dulcesComprados;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getNumPedidosEfectuados()
    {
        return $this->numPedidosEfectuados;
    }
    public function muestraResumen()
    {
        echo "Nombre: $this->nombre";
        echo "<br>$this->numPedidosEfectuados";
    }    
    /**
     * listaDeDulces
     *
     * @param  mixed $d
     * @return void
     */
    public function listaDeDulces(Dulces $d)
    {
        if (in_array($d, $this->dulcesComprados)) {
            return true;
        } else {
            return false;
        }
    }    
    /**
     * comprar
     *
     * @param  mixed $d
     * @return void
     */
    public function comprar(Dulces $d)
    {
            array_push($this->dulcesComprados, $d);
            $this->numDulcesComprados++;
            $this->numPedidosEfectuados++;
            echo ("Dulce comprado correctamente");
    }    
    /**
     * valorar
     *
     * @param  mixed $d
     * @param  mixed $c
     * @return void
     */
    public function valorar(Dulces $d, String $c)
    {
            if ($this->listaDeDulces($d)) {
                echo $this->getNombre()." comparte su opinión acerca de ".$d->getNombre().": $c";
            } else {
                throw new DulceNoCompradoException("Este producto no se puede valorar ya que no ha sido comprado");
            }
    }    
    /**
     * listarPedidos
     *
     * @return void
     */
    public function listarPedidos()
    {
        foreach ($this->getDulcesComprados() as $dc) {
            echo "<li>".$dc->getNombre()."</li>";
        }
    }

}
?>