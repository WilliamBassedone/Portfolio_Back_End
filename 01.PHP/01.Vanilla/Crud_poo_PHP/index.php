<?php

include 'contato.class.php';

$contato = new Contato();

// ADICIONANDO CONTATO

$contato->adicionar('williambassedone@outlook.com', 'William Bassedone');
$contato->adicionar('sergiobassedone@outlook.com', 'Sergio Bassedone');
$contato->adicionar('fabiabassedone@outlook.com', '');

/*---------------------------------------------------------------------------------*/

// PEGANDO NOME DE DETERMINADO CONTATO

$nome = $contato->getNome('williambassedone@outlook.com');
echo $nome;

/*---------------------------------------------------------------------------------*/

// PEGANDO TODA LISTA DE CONTATOS

$lista = $contato->getAll();
print_r($lista);

/*---------------------------------------------------------------------------------*/

// UPDATE

$contato->editar('Fabia Bassedone', 'fabiabassedone@outlook.com');

/*---------------------------------------------------------------------------------*/

// DELETE

if ($contato->excluir('williambassedone@outlook.com')) {
    echo 'Foi excluído';
}
echo 'Não foi excluído';
