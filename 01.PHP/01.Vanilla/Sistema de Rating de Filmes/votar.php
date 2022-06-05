<?php


include "config.php";

$idFilme = addslashes($_POST["idFilme"]);
$nota = addslashes($_POST["nota"]);

if (!empty($idFilme) && !empty($nota)) {

    if ($nota >= 1 && $nota <= 5) {
        $sql = $pdo->prepare("INSERT INTO votos SET id_filme = :id_filme, nota = :nota");
        $sql->bindValue(":id_filme", $idFilme);
        $sql->bindValue(":nota", $nota);
        $sql->execute();

        $sql = "UPDATE filmes SET media = (select (SUM(nota)/COUNT(*)) from votos where votos.id_filme = filmes.id) WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $idFilme);
        $sql->execute();

        $sql = "SELECT * FROM filmes WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $idFilme);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $filme) {
                $array = array(
                    "id" => $filme["id"], 
                    "media" => $filme["media"],
                );
                echo json_encode($array);
            }
        }
    }
}
