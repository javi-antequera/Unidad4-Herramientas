<?php 
    use Monolog\Logger;
    use util\LogFactory;

    include_once('../util/LogFactory.php');
    include_once "Dulces.php";
    class Bollo extends Dulces{        
        /**
         * relleno
         *
         * @var mixed
         */
        private $relleno;
        private Logger $log;         
        /**
         * __construct
         *
         * @param  mixed $nombre
         * @param  mixed $numero
         * @param  mixed $precio
         * @param  mixed $relleno
         * @return void
         */
        public function __construct($nombre,$numero,$precio,$relleno){
            parent::__construct($nombre,$numero,$precio);
            $this->log = LogFactory::getLogger();
            $this->relleno=$relleno;
        }        
        /**
         * muestraResumen
         *
         * @return void
         */
        public function muestraResumen(){
            parent:: muestraResumen();
            $this->log->info("El relleno es: $this->relleno ",[]);
            echo "<br>Relleno: $this->relleno";
        }
    }
?>