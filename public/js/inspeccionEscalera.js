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

        $.post(RUTA + 'inspeccionEscalera/insert', json, function (data, textStatus, xhr) {

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
            'dni_responsable' : $("#dni_propietario").val(),
            'empresa': $('#empresa').val(),
            'fecha': $('#fecha').val(),
            'listaInspecciones': generarListaInspeccionesJson()

        });

        return jsonGeneral;

    }

    function generarListaInspeccionesJson(){
        
        var json = [];

        $('#tablaClasificacion tr').each(function (a, b) {
            var codigo = $('.codigo', b).val();
            var tipo = $('.tipo', b).val();
            var condicion = $('.condicion', b).val();
            var comentario = $('.comentario', b).val();

            if (codigo != undefined) {

                if (codigo.length > 0) {

                    json.push({
                        'codigo': codigo,
                        'tipo': tipo,
                        'condicion' : condicion,
                        'comentario' : comentario
                    });
                }
            }



        });

        return json;
    }

});

