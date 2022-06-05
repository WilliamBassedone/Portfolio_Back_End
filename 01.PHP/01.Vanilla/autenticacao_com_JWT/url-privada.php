<?php
header('Access-Control-Allow-Origin: *');
//
require_once 'vendor/autoload.php';
//
use Firebase\JWT\JWT;
//
$token = $_SERVER['HTTP_AUTHORIZATION'];
$token = str_replace('Bearer ', '', $token);
$tokenDecodificado = JWT::decode($token, 'minha_chave_secreta', ['HS256']);
// var_dump($tokenDecodificado);
echo $tokenDecodificado->user;

// ACESSAR O BANCO
// VERIFICAR QUE O USUÁRIO EXISTE
