<?php
// INICIANDO A SESSÃO
session_start();

// INCLUSÃO
require "config.php";
require "funcoes.php";

// ARRAYS
$usuarios = array();
$patentes = array();

// SQL - CONSULTAS
$sql = "SELECT id FROM usuarios";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    $usuarios = $sql->fetchAll();
    foreach ($usuarios as $chave => $usuario) {
        $usuarios[$chave]["filhos"] = calcular_cadastros($usuario["id"], $limite);
    }
}

$sql = "SELECT * FROM patentes ORDER BY min DESC";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    $patentes = $sql->fetchAll();
}

// SQL - ATUALIZAÇÃO DE PATENTES
foreach ($usuarios as $usuario) {
    foreach ($patentes as $patente) {
        if (intval($usuario["filhos"]) >= intval($patente["min"])) {
            $sql = "UPDATE usuarios SET patente = :patente WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":patente", $patente["id"]);
            $sql->bindValue(":id", $usuario["id"]);
            $sql->execute();
            break;
        }
    }
}