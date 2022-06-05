<?php
include("config.php");
$sql = "SELECT * FROM tb_mensagens WHERE id= 17";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $mensagem) {
        $array = array(
            $mensagem["id"],
            "nome" => $mensagem["nome"],
            "msg" => $mensagem["msg"]
        );
        echo json_encode($array);
    }
}
