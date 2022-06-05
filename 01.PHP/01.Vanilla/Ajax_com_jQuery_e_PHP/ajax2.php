<?php

// MONTANDO UM ARRAY COM OS DADOS DA SUPERGLOBAL $_POST, TUDO VINDO DO FORMULÁRIO HTML
$resultado = array();
$resultado["usuario"] = $_POST["usuario"];
$resultado["senha"] = $_POST["senha"];
$resultado['quantidade_de_letras_no_nome'] = strlen($_POST['usuario']);
echo json_encode($resultado);

/* ----- DEBUG -----*/
// print_r($_POST);
// print_r($resultado);