<?php

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$array = array("status" => "");

if ($usuario == "William" && $senha = "123") {
    $array["status"] = "ok";
}

echo json_encode($array);
