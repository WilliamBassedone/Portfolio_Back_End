<?php
require "config.php";
if (!empty($_POST["email"])) {
    //
    $email = addslashes($_POST["email"]);
    //
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        // CAPTURANDO ID DO USUÁRIO
        $sql = $sql->fetch();
        $id = $sql["id"];
        // GERANDO TOKEN
        $token = md5(time() . rand(0, 99999) . rand(0, 99999));
        // CADASTRANDO TOKEN NO BANCO DE DADOS
        $sql =  "INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id);
        $sql->bindValue(":hash", $token);
        $sql->bindValue(":expirado_em", date("Y-m-d H:i", strtotime("+2 months")));
        $sql->execute();
        // ENVIO DE E-MAIL
        $link = "http://localhost/35.projeto_esqueci_a_senha/redefinir.php?token=" . $token;
        $para = $email;
        $assunto = utf8_decode("Redefinição de senha");
        $corpo = utf8_decode("Clique no link para redefinir sua senha:\r\n") . $link;
        $headers = "From:williambassedone94@gmail.com";
        if (mail($para, $assunto, $corpo, $headers)) {
            echo "E-mail enviado com sucesso para $para com sucesso!";
        } else {
            echo "Falha no envio do e-mail";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form action="" method="POST">
        <label>Qual seu e-email?</label><br />
        <input type="email" name="email" /><br /><br />
        <input type="submit" value="Enviar" />
    </form>
</body>

</html>