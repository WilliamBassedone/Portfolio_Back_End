<?php

require "environment.php";

$config = array();

$url = explode("/", $_SERVER["REQUEST_URI"]);
if (ENVIRONMENT == "development") {
    define("BASE_URL", DIRECTORY_SEPARATOR . "paginacao_no_mvc" . DIRECTORY_SEPARATOR);
    $config["dbname"] = "paginacaomvc";
    $config["host"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
}
if (ENVIRONMENT == "production") {
    define("BASE_URL", "http://meusite.com.br");
    $config["dbname"] = "";
    $config["host"] = "";
    $config["dbuser"] = "";
    $config["dbpass"] = "";
}

$dbname = $config["dbname"];
$host = $config["host"];
$dbuser = $config["dbuser"];
$dbpass = $config["dbpass"];

global $db;

try {
    $db = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
    exit;
}
