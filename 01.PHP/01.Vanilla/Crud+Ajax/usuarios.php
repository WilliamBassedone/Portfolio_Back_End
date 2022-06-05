<?php
// PREPARE STATEMENT = MONTANDO A QUERY

class Usuarios
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:dbname=projeto_blog_1;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "Falha " . $e->getMessage();
        }
    }

    public function listarUsuarios()
    {
        $array = array();
        $sql = "SELECT * FROM usuarios";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $array = "";
        }
        $json = json_encode($array);
        return $json;
    }

    public function selecionar($id)
    {
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        echo json_encode($array);
    }

    public function inserir($nome, $email, $senha)
    {
        $sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");

        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
    }

    public function atualizar($nome, $email, $senha, $id)
    {
        $sql = $this->db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
        $sql->execute(array($nome, $email, md5($senha), $id));
    }

    public function excluir($id)
    {
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();
    }
}
