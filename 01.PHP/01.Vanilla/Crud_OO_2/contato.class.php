<?php

include "classes_abstratas.php";

class Contato extends ModeloContato
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=projeto_crud_oo;localhost", "root", "");
    }

    public function adicionar($email, $nome)
    {
        if ($this->existeEmail($email) == false) {
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    public function editar($nome, $id)
    {
        $sql = 'UPDATE contatos SET nome = :nome WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function getNome($email)
    {
        $sql = "SELECT nome FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
            return $info["nome"];
        } else {
            return "";
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function getInfo($id)
    {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }

    protected function existeEmail($email)
    {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
