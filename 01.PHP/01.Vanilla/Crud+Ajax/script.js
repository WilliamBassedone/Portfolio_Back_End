$(document).ready(function () {

    $("#form-cadastrar").bind("submit", function (e) {

        e.preventDefault();
        var inputs = $(this).serialize();

        // Cadastrando usuaários
        $.ajax({
            type: "POST",
            url: "../ajax/cadastrar.php",
            data: inputs,
            dataType: "json",
            success: function (json) {
                console.log("Cadastrado");
            }
        });
    });

    // Listando usuários
    $.ajax({
        url: "../ajax/listarUsuarios.php",
        dataType: "json",
        success: function (json) {
            // console.log(json[0].nome);
            // console.log(json.length);

            // var table;
            // for (i = 0; i < json.length; i++) {
            //     table += "<tr>";
            //     table += "<td>" + json[i].id + "</td>";
            //     table += "<td>" + json[i].nome + "</td>";
            //     table += "<td>" + json[i].email + "</td>";
            //     table += "</tr>";
            // }

            var table;
            $.each(json, function (i, item) {
                table += "<tr>";
                table += "<td>" + item.id + "</td>";
                table += "<td>" + item.nome + "</td>";
                table += "<td>" + item.email + "</td>";
                table += "<td><a href='../ajax/editar.php?id=" + item.id + "'>Editar</a></td>";
                table += "<td><a href='../ajax/excluir.phpid=?" + item.id + "'>Excluir</a></td>";
                table += "</tr>";
            });

            $("#registros").html(table);

        }
    });
});