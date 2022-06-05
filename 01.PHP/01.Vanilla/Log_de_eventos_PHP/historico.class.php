<?php

class Historico
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=projeto_log_eventos;host=localhost", "root", "");
    }

    public function registrar($acao)
    {
        $sql = "INSERT INTO historico SET ip = :ip, data_acao = NOW(), acao = :acao";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":ip", $_SERVER["REMOTE_ADDR"]);
        $sql->bindValue(":acao", $acao);
        $sql->execute();
    }
}
