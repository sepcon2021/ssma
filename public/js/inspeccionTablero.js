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

        $.post(RUTA + 'inspeccionTablero/insert', json, function (data, textStatus, xhr) {

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
            'codigo_tag': $('#codigo_tag').val(),
            'ubicacion': $('#ubicacion').val(),
            'fecha': $('#fecha').val(),
            'aprobado' : $("input[name='aprobado']").val(),
            'descripcion' : $('.descripcion').val(),
            'dni_responsable' : $('.dni_propietario').val(),
            'listaInspecciones': generarListaInspeccionesJson(),

        });

        return jsonGeneral;

    }

    function generarListaInspeccionesJson(){
        
        var json = [];

        $('#tablaClasificacion tr').each(function (a, b) {
            var aplica = $('.aplica', b).val();
            var cumple = $('.cumple', b).val();

            json.push({
                'aplica': aplica,
                'cumple': cumple
            });

        });

        return json;
    }


});

