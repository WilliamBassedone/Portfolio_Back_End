<?php

/*
1 - PÁGINA 0 -> 10 POSTS, PÁGINA 11 -> 10 POSTS, PÁGINA 21 -> 10 POSTS
2 - QUANTIDADE DE PÁGINAS:  1000 / 10 POR PÁGINA = 100 PÁGINAS
*/

try {
    $dsn = "mysql:dbname=blog_1;host=localhost";
    $dbuser = "root";
    $dbpass = "";
    $pdo = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    die($e->getMessage());
}

// 1.BUSCANDO O TOTAL DE REGISTROS DO BANCO DE DADOS DA TABELA POSTS 
$qt_por_pagina = 50;
$total = 0;
$sql = "SELECT COUNT(*) as c FROM posts";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql["c"];

// 2.CALCULO PARA DIVISÃO DE POSTS POR PÁGINA
$paginas = $total / $qt_por_pagina;
$pg = 1;
if (isset($_GET["p"]) && !empty($_GET["p"])) {
    $pg = addslashes($_GET["p"]);
}
$p = ($pg - 1) * $qt_por_pagina;

// 3.BUSCANDO DADOS DO BANCO DE DADOS COM LIMITAÇÃO
$sql = "SELECT * FROM posts LIMIT $p, $qt_por_pagina";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $item) {
        echo $item["id"] . " - " . $item["titulo"] . "<br>";
        echo $item["corpo"];
        echo "<hr>";
    }
}

// 4.LINKS DE PÁGINAÇÃO
for ($q = 0; $q < $paginas; $q++) {
    echo '<a href="./?p=' . ($q + 1) . '">[ ' . ($q + 1) . ' ]</a>';
}
