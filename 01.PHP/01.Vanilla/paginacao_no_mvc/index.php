<?php

session_start();

require "config.php";
require "routers.php";

// CARREGAMENTO AUTOMÁTICO DE CLASSES UTILIZANDO spl_autoload_register
spl_autoload_register(function ($class) {
    // SE EXISTIR O ARQUIVO QUE ESTÁ NA VARIÁVEL $class NAS PASTAS, CONTROLLERS, CORE E MODELS, ELE VAIR REQUERER ESSE ARQUIVO PARA INSTÂNCIAR A CLASSE
    if (file_exists('controllers/' . $class . '.php')) {
        require 'controllers/' . $class . '.php';
    } else if (file_exists('models/' . $class . '.php')) {
        require 'models/' . $class . '.php';
    } else if (file_exists('core/' . $class . '.php')) {
        require 'core/' . $class . '.php';
    }
});

$core = new Core();
$core->run();
