<?php

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=projeto_rating;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERRO " . $e->getMessage();
    exit;
}