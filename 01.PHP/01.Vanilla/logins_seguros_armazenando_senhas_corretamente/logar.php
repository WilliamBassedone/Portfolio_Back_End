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
// echo $usuario['senha'];

if (password_verify($senhaTexto, $usuario['senha'])) {
    echo 'Usuário logado';
} else {
    echo 'Senha inválida';
}
