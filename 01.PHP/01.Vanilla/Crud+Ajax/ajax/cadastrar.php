<?php

include "../usuarios.php";

$usuario = new Usuarios();

$nome = addslashes($_POST["nome"]);
$email = addslashes($_POST["email"]);
$senha = addslashes($_POST["senha"]);

$usuario->inserir($nome, $email, $senha);

echo json_encode("Cadastrado");