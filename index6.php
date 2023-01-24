<?php
//Al hacerla abstracta, NO permite instanciar objetos de la clase Dulces
    include("Pasteleria.php");  
    $pasteleria = new Pasteleria("Pastelitos");
    $pasteleria->incluirCliente("Moya",2);
    $pasteleria->listarClientes();
?>