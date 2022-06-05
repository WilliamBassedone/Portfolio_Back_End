<?php

class homeController extends Controller
{

    public function index()
    {
        // Paginação

        $data = array();

        $items = new Items();

        // De onde começa
        $offset = 0;

        // Limite de registros por página
        $limit = 5;

        // Busca no banco de dados o total de registros, os itens
        $total = $items->getTotal();

        // Determinando o total páginas - links
        $data["paginas"] = ceil($total / $limit);

        // Página inicial
        $data["paginaAtual"] = 1;

        // Recebendo da view a requisição GET, informando a página atual e atualizando a página inicial
        if (!empty($_GET["p"])) {
            $data["paginaAtual"] = intval($_GET["p"]);
        }

        // De onde deve começar
        $offset = ($data["paginaAtual"] * $limit) - $limit;

        // Lista de itens vindo do banco de dados
        $data["lista"] = $items->getList($offset, $limit);

        $this->loadTemplate("home", $data);

    }
}
