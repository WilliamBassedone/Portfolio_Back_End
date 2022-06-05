$(document).ready(function () {
    processarCadastro();
    // listarMensagens();
    // listarMensagemDeUmUsuario1();
    listarMensagemDeUmUsuario2();

});

// Funções

function processarCadastro() {
    // Cadastrando comentários
    $("#form").bind("submit", function (e) {
        e.preventDefault();
        var dados = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "php/processarCadastro.php",
            data: dados,
            dataType: "json",
            success: function (response) {
                console.log(response.status);
                location.reload();
            },
            error: function () {
                alert("Ocorreu um erro!");
            }
        });
    });
}

function listarMensagens() {
    $.post("php/listarMensagens.php", function (response) {
        $("#comentarios").html(response);
    });
}

function listarMensagemDeUmUsuario1() {
    $.post("php/listarMensagens2.php", function (response) {
        console.log("--- Listando dados de um usuário 1 ---");
        const dado = JSON.parse(response);
        console.log("Id: " + dado[0]);
        console.log("Nome: " + dado.nome);
        console.log("Mensagem: " + dado.msg);
    });
}

function listarMensagemDeUmUsuario2() {
    $.ajax({
        type: "GET",
        url: "php/listarMensagens3.php?id=" + "38",
        dataType: "json",
        success: function (json) {
            console.log("--- Listando dados de um usuário 2 ---");
            console.log(json.id)
            console.log(json.nome)
            console.log(json.msg)
            $("#comentarios").html(json.nome);
        }
    });
}