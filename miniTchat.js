setInterval(function () {
    $.get("affichage_donne.php", function (htmlMessage) {
        $('#actu').html(htmlMessage);

    })

}, 2000)

//Déclaration de la fonction storeMessage

function storeMessage(event, form) {
    //
    event.preventDefault();

    //Remplacement de Envoyer par En cours
    $(form).find('#btnEnvoyerChat').text('En cours..');

    //
    $.post({
        url: $(form).attr('action'),
        data: $(form).serialize(),
        success: function (error) {
            if (error) {
                alert(error);
            }

	        document.querySelector('[name="message"]').value = "" 
            
            $(form).find('#btnEnvoyerChat').text('Envoyer');
        }
    })
}
