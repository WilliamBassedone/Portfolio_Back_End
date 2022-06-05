<?php

session_start();

$hash = uniqid(rand());
$options = [
    'cost' => 14,
];
$_SESSION["hash"] = password_hash($hash, PASSWORD_BCRYPT, $options);

if (isset($_SESSION["hash"])) {
    echo "existe<br>";
}

if (password_verify($hash, $_SESSION["hash"])) {
    echo "OK <br>";
    echo $_SESSION["hash"];
} else {
    echo "Falha";
}
