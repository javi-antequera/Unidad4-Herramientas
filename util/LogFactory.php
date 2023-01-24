<?php
namespace util;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PhpParser\Node\Return_;
use Psr\Log\LoggerInterface;

include_once("../vendor/autoload.php");

class LogFactory{
    public static function getLogger (string $canal = "miLog"): LoggerInterface{
        $log = new Logger($canal);
        $log->pushHandler(new StreamHandler("log/miLog.log", Logger::DEBUG));

        return $log;
    }
}
?>