<?php
    use Core\Core;

    session_start();

    //Liberando todos remetentes de requisições
    header("Access-Control-Allow-Origin: *"); 
    //Liberando todos os métodos de requisição
    header("Access-Control-Allow-Methods: *");

    require 'config.php';
    require 'routes.php';
    require 'vendor/autoload.php';

    $c = new Core();
    $c->run();
?>