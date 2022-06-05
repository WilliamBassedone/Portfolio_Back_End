<!-- 
    
    Hyper Text Access - Linguagem de configuração = Diretivas

    . Serve para configurar servidores Apache
    . Possibilita a reescrita de URL - Rewrite
    . Possibilita configurar diretivas do PHP
    . Permite bloquear acesso a URL
    . Permite bloquear acesso arquivos
    . Permite bloquear acesso diretórios
    . Redirecionamentos

    Iremos aprender sobre o módulo de reescrita de url - Rewrite

    Pegar o que o usuário digitou na barra de endereço e trocar manipular a informação para que o apache possa endereçar um outro arquivo para processar essa requisição, muito utilizado quando a gente cria URL amigáveis, para não usar uma url com o nome produtos.php por exemplo

-->
<?php

echo 'ADMIN<br>';
echo $_SERVER['REQUEST_URI'];

echo '<pre>';
print_r($_GET);
echo '</pre>';