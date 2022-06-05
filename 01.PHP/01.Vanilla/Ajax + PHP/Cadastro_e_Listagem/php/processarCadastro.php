<?php

include("config.php");

$array = array("status" => "");

if (isset($_POST["nome"]) && empty($_POST["nome"]) == false) {
    $nome = $_POST["nome"];
    $mensagem = $_POST["mensagem"];
    $sql = $pdo->prepare("INSERT INTO tb_mensagens SET nome = :nome, msg = :msg, data_msg = NOW()");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":msg", $mensagem);
    $sql->execute();
    $array["status"] = "ok";
}

echo json_encode($array);
