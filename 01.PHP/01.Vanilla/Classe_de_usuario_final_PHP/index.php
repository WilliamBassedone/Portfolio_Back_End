<?php

require "usuario.php";


/* CADASTRANDO USUÁRIO  */

// $usuario = new Usuario();
$usuario->setEmail("william@outlook.com");
$usuario->setSenha("123");
$usuario->setNome("William");
$usuario->salvar();
echo "Usuário criado com sucesso!";
/* ---------------------------------------------------------- */ 

/* LISTANDO INFORMAÇÕES DO USUÁRIO */
$usuario = new Usuario(1);
echo "Meu nome é: " . $usuario->getNome();
/* ---------------------------------------------------------- */ 

/* ATUALIZANDO INFORMAÇÕES DO USUÁRIO */
$usuario = new Usuario(1);
$usuario->setNome("Fulano");
$usuario->salvar();
echo "Usuário alterado com sucesso!";
/* ---------------------------------------------------------- */ 

/* DELETANDO USUÁRIO */ 
$usuario = new Usuario(1);
$usuario->delete(1);
echo "Usuário deletado com sucesso!";