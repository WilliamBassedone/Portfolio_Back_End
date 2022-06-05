<?php

$pdo = new PDO("mysql:dbname=jwt;host=localhost", "root", "");
//
$login = 'williambassedone@outlook.com';
$senhaTexto = '123456';

$sql = 'SELECT * FROM usuario WHERE login = ?;';
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $login);
$stm->execute();

$usuario = $stm->fetch(\PDO::FETCH_ASSOC);

if (password_verify($senhaTexto, $usuario['senha'])) {
    $hash = 'token:' . $usuario['login'];
    echo base64_encode($hash);
} else {
    echo 'Senha inválida';
}
