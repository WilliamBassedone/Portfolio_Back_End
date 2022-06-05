$(document).ready(function () {

    $("#form").bind("submit", function (e) {

        e.preventDefault();

        var vTxt = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "ex3_ajax.php",
            data: vTxt,
            dataType: "json",
            success: function (json) {
                if (json.status == "ok") {
                    alert("Deu certo");
                } else {
                    alert("Deu errado");
                }
            }
        });

    });

});