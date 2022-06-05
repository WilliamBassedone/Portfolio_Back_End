<?php

/*


    O que é Base64?
    De acordo com o site Base64.Guru a base64 é um algoritmo que é capaz de transformar dado conteúdo em uma sequência de letras, dígitos e símbolos.

    Calma! Vamos entender o seguinte; todo tipo de dado na informática é formato a partir de bits, certo? Ou seja, formado a partir de sequências binárias. Assim como dados binários a Base64 também é uma sequência, a diferença que é esta sequência não se limita apenas a 0 e 1 e sim, um alfabeto inteiro formado por 64 caracteres.

    Então entender Base64 não é tão complicado. Um exemplo prático seria este; imagine que em apocalipse zumbi a internet tenha parado de funcionar mas ainda é possível usar a linha telefônica. Neste cenário, por algum motivo você precisa enviar uma foto que tirou do seu celular para uma base militar que está a 500 km de você, e aí?

    Você pode converter a imagem da foto em uma sequência binária e ir ditando para os militares esta sequência, ou, pode converter a mesma imagem em uma base64 e ditar uma sequência muito menor do que a binária.

    A grande vantagem de se fazer esta conversão é que toda a informação da imagem é preservada. Ao anexar uma imagem em um e-mail por exemplo, é comum que os pixels sofram alterações, seja devido a otimizações ou seja pelo principio de empacotamento e desempacotamento regido pelo nosso amigo TCP/IP.

    Vantagens de usar Base64

    Em desenvolvimento Web, a base64 é útil em duas situações; quando preciso armazenar arquivos em um banco de dados aonde podemos substituir o formato Blob por um Base64, e quanto estamos desenvolvendo sites com imagens pequenas.
    
    Usar base64 em sites pode ser interessante para reduzir a quantidade de requisições exigidas pela sua página, aliviando de alguma forma o uso de recursos do seu servidor.

    Embora alguns sites também apliquem Base64 em imagens grandes, isso acaba não revertendo em algo vantajoso, mas em alguns casos o uso da Base64 é proposital pois desta forma os visitantes não conseguem salvar as imagens, servindo como se fosse uma “pseudo-criptografia”, uma proteção contra o download indevido ou não autorizado da imagem.

    Script PHP para converter imagens em Base64
    O PHP possui uma função específica para trabalhar com Base64, basta usar a função base64_encode() para codificar e adivinha só, para decodificar usamos a base64_decode().

    Exemplo de codificação para Base64 abaixo:

*/

// Imagem a ser convertida
$img = file_get_contents('https://www.blogson.com.br/wp-content/uploads/2018/11/cropped-blogson-o-blog-do-prof-anderson.png');

// Codifica / Converte a imagem para base64
$data = base64_encode($img);

// Mostra o resultado
echo $data;

/*

    Como exibir uma imagem Base64 com HTML?
    Para exibir uma imagem Base64 em seu site basta usar a tag <img> acrescentando a ela o atributo src=”data:image/png;base64, ” ficando assim;

    Exemplo abaixo:

*/

?>
<hr />
<img src="data:image/png;base64, <?php echo $data; ?>" />