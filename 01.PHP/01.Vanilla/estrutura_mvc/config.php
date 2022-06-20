<?php

global $db;
require "environment.php";
$config = array();
if (ENVIRONMENT == "development") {
    define("BASE_URL", DIRECTORY_SEPARATOR . "44.CRUD_em_MVC_Editar" . DIRECTORY_SEPARATOR);
    $config["dbname"] = "database";
    $config["host"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
} else {
    define("BASE_URL", DIRECTORY_SEPARATOR . "44.CRUD_em_MVC_Editar" . DIRECTORY_SEPARATOR);
    $config["dbname"] = "database";
    $config["host"] = "host_server";
    $config["dbuser"] = "user_server";
    $config["dbpass"] = "password_server";
}
try {
    $db = new PDO("mysql:dbname=" . $config["dbname"] . ";host=" . $config["host"], $config["dbuser"], $config["dbpass"]);
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
    exit;
}
