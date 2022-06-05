<?php

// Classe Helper 'Ajudadora'

class Controller {
    // EXEMPLO SEM O USO DE TEMPLATE
    public function loadView($viewName, $viewData = array()) {
        // TRANSFORMA A CHAVE DO ARRAY EM VARIÁVEL E O VALOR VIRA O VALOR DA VARIÁVEL
        extract($viewData); 
        require 'views/' . $viewName . '.php';
    }

    // CHAMA O TEMPLATE
    public function loadTemplate($viewName, $viewData = array()) {
        require 'views/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/' . $viewName . '.php';
    }
}
