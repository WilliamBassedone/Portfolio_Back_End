<?php

namespace Core;

class Core
{
    public function run()
    {
        $url = "/";
        $params = array();

        if (isset($_GET["url"])) {
            $url .= $_GET["url"];
        }

        $url = $this->checkRoutes($url);

        if (!empty($url) && $url != "/") {
            $url = explode("/", $url);

            array_shift($url);

            $currentController = $url[0] . "Controller";

            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = "index";
            }

            if (count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = "HomeController";
            $currentAction = "index";
        }

        $currentController = ucfirst($currentController);

        $prefix = "\Controllers\\";

        if (!file_exists("Controllers/" . $currentController . ".php") || !method_exists($prefix . $currentController, $currentAction)) {
            $currentController = "NotFoundController";
            $currentAction = "index";
        }

        $newController = $prefix . $currentController;

        $c = new $newController();

        call_user_func_array(array($c, $currentAction), $params);
    }

    public function checkRoutes($url)
    {
        global $routes;

        foreach ($routes as $pt => $newurl) {

            // Identifica os argumentos e substitui por regex
            $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);

            // Faz o match da url
            if (preg_match('#^(' . $pattern . ')*$#i', $url, $matches) === 1) {
                array_shift($matches);
                array_shift($matches);

                 // Pega todos os argumentos para associar
                 $itens = array();
                 if (preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
                     $itens = preg_replace('(\{|\})', '', $m[0]);
                 }

                // Faz a associação
                $arg = array();
                foreach ($matches as $key => $match) {
                    $arg[$itens[$key]] = $match;
                }
                // Monta a nova url
                foreach ($arg as $argkey => $argvalue) {
                    $newurl = str_replace(':' . $argkey, $argvalue, $newurl);
                }

                $url = $newurl;

                break;
            }
        }
        return $url;
    }
}


// https://www.devmedia.com.br/iniciando-expressoes-regulares/6557#:~:text=Express%C3%B5es%20Regulares%20s%C3%A3o%20padr%C3%B5es%20de,texto%20ou%20remover%20caracteres%20inv%C3%A1lidos.
