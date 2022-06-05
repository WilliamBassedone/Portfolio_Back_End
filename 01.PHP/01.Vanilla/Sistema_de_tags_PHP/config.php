<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_tags;host=127.0.0.1", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}