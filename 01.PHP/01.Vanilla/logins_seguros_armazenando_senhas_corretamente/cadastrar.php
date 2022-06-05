<?php

$pdo = new PDO("mysql:dbname=jwt;host=localhost", "root", "");
//
$login = 'williambassedone@outlook.com';
$senhaTexto = '123456';
$senha = password_hash('123456', PASSWORD_ARGON2ID);
//
$sql = "INSERT INTO usuario (login, senha) VALUES (?, ?);";
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $login);
$stm->bindValue(2, $senha);
$stm->execute();
