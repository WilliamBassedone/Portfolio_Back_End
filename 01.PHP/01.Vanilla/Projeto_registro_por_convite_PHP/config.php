<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_registro_por_convite;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}