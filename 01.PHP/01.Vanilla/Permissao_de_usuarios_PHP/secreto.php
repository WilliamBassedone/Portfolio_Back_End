<?php
session_start();

require "config.php";
require "classes/usuarios.class.php";

if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit;
}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION["logado"]);

if ($usuarios->temPermissao("SECRET") == false) {
    header("LOCATION: index.php");
    exit;
}
?>

<h1>Pagina Secreta</h1>