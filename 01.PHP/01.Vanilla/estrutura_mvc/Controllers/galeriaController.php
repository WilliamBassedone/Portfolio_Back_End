<?php

namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class galeriaController extends Controller
{
    public function index()
    {

    }

    public function abrir($id, $titulo) {
        echo "ID: " . $id . "<br />";
        echo "TITULO: " . $titulo . "<br />";
    }

}
