<?php

/*

    TRABALHA EM CIMA DA URL DO BROWSER

    PARA ONDE SERÁ REDIRECIONADO A REQUISIÇÃO DO USUÁRIO

    PONTO DE PARTIDA DA ESTRUTURA MVC

    SERVE PARA IDENTIFICAR O CONTROLLER E A ACTION = FUNÇÕES = MÉTODOS

    USANDO O CONTROLLER GALERIA, NESSE CASO ELE VAI ABRIR TODOS OS ITENS DE GALERIA
        www.meusite.com.br/galeria

    CHAMANDO CONTROLLER GALERIA, E INFORMANDO A ACTION "MÉTODO" ABRIR, ENVIANDO UM PARÂMETRO 123, INDICANDO O EVENTO QUE QUERO VER AS MÍDIAS

        1 = CONTROLLER = galeria
        2 = ACTION = abrir
        3,4,5 = PARÂMETRO = 123
            www.meusite.com.br/galeria/abrir/123

    SE O USUÁRIO ESTIVER ACESSANDO SOMENTE = www.meusite.com.br ,NÃO ESTARÁ ACESSANDO NADA INTERNAMENTE NO SITE, NESSE CASO VAI ABRIR A PÁGINA INICIAL DO SITE QUE USARÁ UM CONTROLLER E ACTION PADRÃO

    CONTROLLER    = home
    ACTION PADRÃO = index

*/

class Core
{

    public function run()
    {

        // SE USUÁRIO NÃO TIVER PASSADO NADA NA URL, SERÁ UTILIZADA A BARRA, INDICANDO QUE ESTÁ ABRINDO A PÁGINA PRINCIPAL.
        $url = '/';

        // VERIFICANDO SE USUÁRIO ENVIOU ALGUMA COISA NA URL, SE ENVIOU É CONCATENADO COM A URL ATUAL.
        if (isset($_GET["url"])) {
            $url .= $_GET["url"];
        }

        // ROTAS PERSONALIZADAS
        $url = $this->checkRoutes($url);

        $params = array();

        // SE ALGUMA COISA FOI ENVIADA E NÃO É SOMENTE UMA BARRA
        if (!empty($url) && $url != '/') {

            // DIVIDINDO A URL A PARTIR DA BARRA E ADICIONANDO OS ELEMENTOS EM UM ARRAY
            $url = explode('/', $url);

            // REMOVENDO O PRIMEIRO ELEMENTO DO ARRAY, POIS COMO NÃO TEM NADA ANTES DA BARRA FICA UM ELEMENTO VAZIO.
            array_shift($url);

            // PEGANDO O PRIMEIRO ELEMENTO DO ARRAY QUE NESSE MOMENTO É O CONTROLLER E CONCATENANDO COM Controller
            // FICA ASSIM  = galeriaController POR EXEMPLO
            $currentController = $url[0] . 'Controller';
            array_shift($url);

            // NESSE MOMENTO A PRIMEIRA POSIÇÃO DO ARRAY É A ACTION
            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url); // SOBRA SOMENTE OS PARÂMETROS
            } else {
                $currentAction = 'index';
            }

            // PARÂMETROS
            if (count($url)) {
                $params = $url;
            }
        } else {
            // SE NÃO FOI ENVIADO NADA É SETADO CONTROLLER PADRÃO E ACTION PADRÃO
            $currentController = 'homeController';
            $currentAction = 'index';
        }


        // VERIFICA SE CONTROLLER E MÉTODO CHAMADOS EXISTEM
        if (!file_exists('controllers/' . $currentController . '.php') || !method_exists($currentController, $currentAction)) {
            $currentController = 'notFoundController';
            $currentAction = 'index';
        }

        // $c = new homeController();
        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);

    }

    private function checkRoutes($url)
    {
        global $routes;

        foreach ($routes as $pt => $newurl) {

            // Identifica os argumentos e substitui por regex
            $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);

            // Faz o match da URL
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
