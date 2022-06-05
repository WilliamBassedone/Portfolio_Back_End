<?php
header('Access-Control-Allow-Origin: *');
//
require_once 'vendor/autoload.php';
//
use Firebase\JWT\JWT;
//
$pdo = new PDO("mysql:dbname=jwt;host=localhost", "root", "");
//
$login = 'williambassedone@outlook.com';
$senhaTexto = '123456';
//
$sql = 'SELECT * FROM usuario WHERE login = ?;';
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $login);
$stm->execute();
//
$usuario = $stm->fetch(\PDO::FETCH_ASSOC);
//
if (password_verify($senhaTexto, $usuario['senha'])) {
    echo 'Bearer ' . JWT::encode(['user' => $usuario['login']], 'minha_chave_secreta');
} else {
    echo 'Senha inválida';
}
