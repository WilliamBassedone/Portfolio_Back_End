<?php

include "contato.class.php";
$contato = new Contato();

if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];

    $contato->editar($nome, $id);

    header("Location: index.php");
}
