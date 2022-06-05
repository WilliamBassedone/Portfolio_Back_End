<?php

include "contato.class.php";
$contato = new Contato();

// Adicionando contato

// $contato->adicionar("williambassedone@outlook.com", "William Bassedone");
// $contato->adicionar("sergiobassedone@outlook.com", "Sergio Bassedone");
// $contato->adicionar("fabiabassedone@outlook.com", "Fabia Bassedone");

/*---------------------------------------------------------------------------------*/

// PEGANDO NOME DE DETERMINADO CONTATO

// $nome = $contato->getNome("williambassedone@outlook.com");
// echo $nome;

/*---------------------------------------------------------------------------------*/

// Pegando toda lista de contato

// $lista = $contato->getAll();

// echo "<pre>";
// print_r($lista);
// echo "</pre>";

/*---------------------------------------------------------------------------------*/

// Editando um contato

// $contato->editar("William Pereira Bassedone", "williambassedone@outlook.com");

/*---------------------------------------------------------------------------------*/

// Excluindo um contato

// if ($contato->excluir("williambassedone@outlook.com")) {
//     echo "Contato excluído";
// } else {
//     echo "Contato não excluído";
// }

/*---------------------------------------------------------------------------------*/

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Contatos</h1>

    <a href="adicionar.php">[ ADICIONAR ]</a><br><br>

    <table border="1" width="600">

        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>AÇÕES</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $lista = $contato->getAll();
            foreach ($lista as $contato) :
            ?>
                <tr>
                    <td><?php echo $contato["id"]; ?></td>
                    <td><?php echo $contato["nome"]; ?></td>
                    <td><?php echo $contato["email"]; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $contato['id']; ?>">[ EDITAR ]</a>
                        <a href="excluir.php?id=<?php echo $contato['id']; ?>">[ EXCLUIR ]</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>

        <tfoot>

        </tfoot>

    </table>

</body>

</html>