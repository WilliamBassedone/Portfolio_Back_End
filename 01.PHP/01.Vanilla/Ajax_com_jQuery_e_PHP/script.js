$(function () {
    formulario();
});

/* FUNÇÕES - FORMULÁRIO */

function formulario() {

    $('#form').bind('submit', function (e) {
        e.preventDefault();
        var dados = $(this).serialize();

        // ajaxViaGet(dados);
        // ajaxViaPost(dados);
        loginAjax(dados);


    });
}

function ajaxViaGet(dados) {
    $.ajax({
        type: 'GET',
        url: 'ajax1.php',
        data: dados,
        dataType: 'json',
        success: function (json) {
            console.log(json);
        }
    });
}

function ajaxViaPost(dados) {
    $.ajax({
        type: 'POST',
        url: 'ajax2.php',
        data: dados,
        dataType: 'json',
        success: function (json) {
            console.log('Usuário = ' + json.usuario);
            console.log('Senha = ' + json.senha);
            console.log('Quantidade de letras no nome = ' + json.quantidade_de_letras_no_nome);
        }
    });
}

function loginAjax(dados) {
    $.ajax({
        type: 'POST',
        url: 'ajax3.php',
        data: dados,
        dataType: 'json',
        success: function (json) {
            if (json.status == 'ok') {
                alert('Logado');
            } else {
                alert('Erro ao logar');
            }
        }
    });
}