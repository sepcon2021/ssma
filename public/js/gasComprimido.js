$(function () {
    
    $("#btnRegister").on('click', function (event) {
        event.preventDefault();
        $("#formulario").trigger('submit');
        return false;
    });

    $("#formulario").on('submit', function (event) {

        event.preventDefault();

        //Enviamos el primer objeto del array
        var json = generarJson()[0];

        $.post(RUTA + 'gasComprimido/insert', json, function (data, textStatus, xhr) {

            if (data.status == 200) {
                mostrarMensaje("msj_correcto", "Envio exitoso");
                $("#formulario").trigger("reset");
            }else{

            }

        }, "json");

        return false;
    });



    function generarJson(){

        var jsonGeneral = [];

        jsonGeneral.push({
            'sede': $('#lista_proyecto').val(),
            'id_area': $('#lista_area').val(),
            'lugar': $('#lugar').val(),
            'fecha': $('#fecha').val(),
            'empresa': $('#empresa').val(),
            'dni_responsable' :  $('.dni_propietario').val(),
            'observacion_general': $('#observacion_general').val(),
            'listaInspecciones': generarListaInspeccionesJson()

        });

        return jsonGeneral;

    }

    function generarListaInspeccionesJson(){
        var json = [];

        $('#tablaClasificacion tr').each(function (a, b) {
            var respuesta = $('.respuesta', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'respuesta': respuesta,
                'observacion': observacion,

            });

        });

        return json;
    }

});

