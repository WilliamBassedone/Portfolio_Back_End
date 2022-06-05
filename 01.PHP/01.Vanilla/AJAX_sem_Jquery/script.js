var btn = document.getElementById("btn");

btn.addEventListener("click", function () {
    var ajax = new XMLHttpRequest();

    ajax.open("GET", "lista.php");

    ajax.responseType = "json";

    ajax.send(null);

    ajax.addEventListener("readystatechange", function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            var resposta = ajax.response;
            var lista = document.querySelector(".list");
            for (var i = 0; i < resposta.length; i++) {
                lista.innerHTML += "<li>" + resposta[i] + "</li>";
            }
        }
    });
});

/*

Documentação

Método open():
Métodos de requisição HTTP -> https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Methods

HTTP Status:
https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Status

Método send():

Enviar dados para o servidor
https://developer.mozilla.org/pt-BR/docs/Web/API/XMLHttpRequest/send


onreadystatechange = resposta do servidor

https://developer.mozilla.org/pt-BR/docs/Web/API/XMLHTTPRequest


Método alternativo ao ajax.addEventListener:
ajax.onreadystatechange = function () {}

console.log(ajax.readyState);
console.log(ajax.status);
console.log(ajax.response);
console.log(resposta[i]);

*/