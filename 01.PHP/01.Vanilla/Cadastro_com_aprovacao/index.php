<?php

if (isset($_POST["nome"]) && !empty($_POST["nome"])) {
    $nome = addslashes($_POST["nome"]);
    $email = addslashes($_POST["email"]);
    // 
    require "config.php";
    // 
    $pdo->query("INSERT INTO usuarios SET nome = '$nome', email = '$email'");
    $id = $pdo->lastInsertId();
    // 
    $md5 = md5($id);
    //
    $link = "http://localhost/34.projeto_cadastro_com_aprovacao/confirmar.php?h=" . $md5;
    //
    $assunto = utf8_decode("Confirme seu cadastro");
    $msg = "Clique no link abaixo para confirmar seu cadastro:\n\n" . $link;
    $headers = "From:williambassedone94@gmail.com";
    mail($email, $assunto, $msg, $headers);
    //
    echo "<h2>Confirme seu cadastro agora!</h2>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto de cadastro com aprovação</title>
</head>

<body>
    <form action="" method="POST">
        Nome: <br />
        <input type="text" name="nome" /><br><br>
        E-mail: <br />
        <input type="email" name="email" /><br><br>
        <input type="submit" value="Cadastrar" />
    </form>
</body>

</html>