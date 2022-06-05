<?php
try {
    $pdo = new PDO("mysql:dbname=sistema_de_comentarios;host=127.0.0.1", "root", "");
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
    exit;
}
