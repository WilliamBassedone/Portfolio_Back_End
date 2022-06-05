<?php


$token = $_SERVER['HTTP_AUTHORIZATION'];

$tokenDecodificado = base64_decode($token);

$usuario = str_replace('token', '', $tokenDecodificado);

// ACESSAR O BANCO
// VERIFICAR QUE O USUÁRIO EXISTE

echo $usuario;