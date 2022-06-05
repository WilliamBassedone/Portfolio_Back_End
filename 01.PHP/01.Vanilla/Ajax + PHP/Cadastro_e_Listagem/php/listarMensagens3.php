<?php
include("config.php");
$id = $_GET["id"];
$sql = "SELECT * FROM tb_mensagens WHERE id= $id";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $mensagem) {
        $array = array(
            "id" => $mensagem["id"],
            "nome" => $mensagem["nome"],
            "msg" => $mensagem["msg"]
        );
        echo json_encode($array);
    }
}
