$(function() {

    $("#btnRegister").on('click', function(event) {
        event.preventDefault();

        $("#formChecklist").trigger('submit');

        return false

    });

    //enviar formulario
    $("#formChecklist").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
        var str = $(this).serialize();

        console.log('new text')
        console.log(RUTA);
        console.log(str);




        $.post(RUTA + 'proof/grabarDocumento', str, function(data, textStatus, xhr) {
            //console.log(str);
            console.log('We are going to print something')

            console.log(data);
            console.log(textStatus);
            console.log(xhr);

            mostrarMensaje("msj_correcto", "Registrado Correctamente");
            $("#formChecklist").trigger("reset");
        });

        return false;
    });
})