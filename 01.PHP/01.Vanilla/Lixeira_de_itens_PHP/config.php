<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_lixeiradeitens;host=localhost", "root", "");
} catch (PDOException $e) {
	echo "ERRO: " . $e->getMessage();
	exit;
}
