<?php

namespace src\tests;

include_once("../autoload.php");

use src\Pasteleria;
use PHPUnit\Framework\TestCase;

class PasteleriaTest extends TestCase
{    
    /**
     * testIncluirCliente
     *
     * @return void
     */
    public function testIncluirCliente()
    {
        $pasteleria = new \Pasteleria("Pastelería");
        $pasteleria->incluirCliente("Moya",1);
        $this->assertSame("Moya", $pasteleria->getClientes()[0]->getNombre());
    }
    
    /**
     * testIncluirTarta
     *
     * @return void
     */
    public function testIncluirTarta()
    {
        $pasteleria = new \Pasteleria("Pastelería");
        $pasteleria->incluirTarta("Feliz Cumpleaños",2,32,["Nata","Chocolate","Crema"],3,1,4);
        $this->assertSame("Feliz Cumpleaños", $pasteleria->getProductos()[0]->getNombre());
    }
}