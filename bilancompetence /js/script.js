$(document).ready(function () {
    $("button").click(function () {

// Ajax appelle bouton click
        $.ajax({
            url: "dbco.php",
            succes: function (response) {
                $('mes_citations').html(response);
            }

        }).done(function (result) {

            $(".mes_citations").hide().html(result).fadeIn();


//Nouvelle citation

            $("button").html("Nouvelle Citation");

// s'il y a une erreur //
        }).fail(function (err) {
            $("mes_citations").html(err);
            console.log(err);
        });
    });
});