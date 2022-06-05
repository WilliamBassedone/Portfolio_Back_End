<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_esquecia_senha;host=localhost", "root", "");
} catch (PDOException $e) {
    die($e->getMessage());
}
