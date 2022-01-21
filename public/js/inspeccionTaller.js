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

        $.post(RUTA + 'inspeccionTaller/insert', json, function (data, textStatus, xhr) {

            console.log(json);

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
            'lugar': $('#lugar_actividad').val(),
            'dni_responsable' : $('.dni_propietario').val(),
            'fecha' : $('#fecha').val(),
            'listaInspecciones': generarListaInspeccionesJson(),

        });

        return jsonGeneral;

    }

    function generarListaInspeccionesJson(){
        
        var json = [];

        $('#tablaInstalacionElectrica tr').each(function (a, b) {
            var calificacion = $('.calificacion', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'calificacion': calificacion,
                'observacion': observacion
            });

        });


        $('#tablaOrdenLimpieza tr').each(function (a, b) {
            var calificacion = $('.calificacion', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'calificacion': calificacion,
                'observacion': observacion
            });

        });

        $('#tablaProteccionContraIncendio tr').each(function (a, b) {
            var calificacion = $('.calificacion', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'calificacion': calificacion,
                'observacion': observacion
            });

        });

        $('#tablaMaterialInflamable tr').each(function (a, b) {
            var calificacion = $('.calificacion', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'calificacion': calificacion,
                'observacion': observacion
            });

        });

        $('#tablaMaquinasEspeciales tr').each(function (a, b) {
            var calificacion = $('.calificacion', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'calificacion': calificacion,
                'observacion': observacion
            });

        });

        return json;
    }


});

