<?php

include "../usuarios.php";

$usuario = new Usuarios();

echo $usuario->listarUsuarios();
