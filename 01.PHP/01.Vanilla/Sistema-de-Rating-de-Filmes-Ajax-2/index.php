<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sistema de Rating de Filmes</title>
</head>

<body>
    <?php
    include "config.php";
    $sql = "SELECT * FROM filmes";
    $sql = $pdo->query($sql);
    $cont = 0;
    if ($sql->rowCount() > 0) {
        foreach ($sql->fetchAll() as $key => $filme) {
            ?>
            <fieldset>
                <strong><?php echo $filme["titulo"]; ?></strong>
                <img src="assets/images/star.png" data-id=<?php echo $filme["id"]; ?> data-nota="1" alt="star">
                <img src="assets/images/star.png" data-id=<?php echo $filme["id"]; ?> data-nota="2" alt="star">
                <img src="assets/images/star.png" data-id=<?php echo $filme["id"]; ?> data-nota="3" alt="star">
                <img src="assets/images/star.png" data-id=<?php echo $filme["id"]; ?> data-nota="4" alt="star">
                <img src="assets/images/star.png" data-id=<?php echo $filme["id"]; ?> data-nota="5" alt="star">
                <div class="media<?php echo $filme["id"]; ?>">Média: <?php echo $filme["media"]; ?></div>
            </fieldset>
        <?php

        }
    }
    ?>
    <script src="assets/js/jquery-3.1.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>