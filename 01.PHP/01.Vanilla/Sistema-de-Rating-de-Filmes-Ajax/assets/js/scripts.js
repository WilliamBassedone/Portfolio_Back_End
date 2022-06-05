$(function () {
    $('img').on('click', function () {
        let idFilme = $(this).attr('data-id');
        let nota = $(this).attr('data-nota');
        $.ajax({
            type: "POST",
            url: "votar.php",
            data: { idFilme: idFilme, nota: nota },
            dataType: "json",
            success: function (response) {
                let classeDinamica = ".media" + response.id;
                $(classeDinamica).html('Média: ' + response.media);
            },
            error: function () {
                alert("Ocorreu um erro!");
            }
        });
    });
});