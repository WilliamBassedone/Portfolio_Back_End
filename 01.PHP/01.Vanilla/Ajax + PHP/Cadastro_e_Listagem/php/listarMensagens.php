<?php
include("config.php");
$sql = "SELECT * FROM tb_mensagens ORDER BY data_msg DESC";
$sql = $pdo->query($sql);
?>

<table width="100%" border="1px">
    <thead>
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Mensagem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $mensagem) {
        ?>
                <tr align="center">
                    <td><?php echo $mensagem["id"] . "<br />"; ?></td>
                    <td><?php echo $mensagem["nome"] . "<br />"; ?></td>
                    <td><?php echo $mensagem["msg"] . "<br />"; ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>