$(function() {

    $("#btnRegister").on('click', function(event) {
        event.preventDefault();

        $("#formSuspencion").trigger('submit');

        return false
    });

    //enviar formulario
    $("#formSuspencion").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
        var str = $(this).serialize();
        $.post(RUTA + 'suspencion/grabarDocumento', str, function(data, textStatus, xhr) {
            mostrarMensaje("msj_correcto", "Registrado Correctamente");
            $("#formIncidencia").trigger("reset");
        });

        return false;
    });


    $('#sede').on('change', function() {
        var nombre_sede = $("#sede  option:selected").html();
        $("#proyecto").val(nombre_sede);
        $("#proyecto").text(nombre_sede);


    });
})