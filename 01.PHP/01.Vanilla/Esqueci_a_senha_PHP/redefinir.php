<?php
require "config.php";
//
if (!empty($_GET["token"])) {
    //
    $token = $_GET["token"];
    // 
    $sql = "SELECT * FROM usuarios_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":hash", $token);
    $sql->execute();
    // VERIFICANDO SE EXISTE ALGUM REGISTRO
    if ($sql->rowCount() > 0) {
        $sql = $sql->fetch();
        if (!empty($_POST["senha"])) {
            // CAPTURANDO ID DO USUÁRIO
            $senha = $_POST["senha"];
            $id = $sql["id_usuario"];
            // ATUALIZANDO A SENHA
            $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":id", $id);
            $sql->execute();
            // INVÁLIDANDO TOKEN
            $sql = "UPDATE usuarios_token SET used = 1 WHERE hash = :hash";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":hash", $token);
            $sql->execute();
            echo "Senha alterada com sucesso!";
            exit;
        }
?>
        <form method="POST">
            <label>Digite a nova senha:</label>
            <input type="password" name="senha" /><br><br>
            <input type="submit" value="Mudar senha" />
        </form>
<?php
    } else {
        echo "Token inválido ou usado!";
    }
}
?>