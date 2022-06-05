<?php

abstract class ModeloContato
{
    private $email;
    private $nome;

    abstract protected function existeEmail($email);
    abstract public function adicionar($email, $nome);
    abstract public function editar($nome, $email);
    abstract public function excluir($id);
    abstract public function getNome($email);
    abstract public function getAll();
    abstract public function getInfo($id);
}
