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

        console.log('JSON');
        console.log(json);

        $.post(RUTA + 'instalacionElectrica/insert', json, function (data, textStatus, xhr) {

            if (data.status == 200) {
                mostrarMensaje("msj_correcto", "Envio exitoso");
                $("#formulario").trigger("reset");
            }

        }, "json");

        return false;
    });



    function generarJson(){

        var jsonGeneral = [];

        jsonGeneral.push({
            'sede': $('#lista_proyecto').val(),
            'id_area': $('#lista_area').val(),
            'obra': $('#obra').val(),
            'campamento': $('#campamento').val(),
            'fecha': $('#fecha').val(),
            'dni_responsable' :$('.dni_propietario').val(),
            'informe' :  $('#informe').val(),
            'listaInspecciones': generarListaInspeccionesJson()

        });

        return jsonGeneral;

    }

    function generarListaInspeccionesJson(){
        
        var json = [];

        $('#tablaElectrico tbody tr').each(function (a, b) {
            var estado = $('.estado', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'estado': estado,
                'observacion' :observacion
            });

        });

        $('#tablaAlimentado tbody tr').each(function (a, b) {
            var estado = $('.estado', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'estado': estado,
                'observacion' :observacion
            });

        });

        $('#tablaCircuito tbody tr').each(function (a, b) {
            var estado = $('.estado', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'estado': estado,
                'observacion' :observacion
            });

        });

        $('#tablaPuestaTierra tbody tr').each(function (a, b) {
            var estado = $('.estado', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'estado': estado,
                'observacion' :observacion
            });

        });

        $('#tablaAlimentador tbody tr').each(function (a, b) {
            var estado = $('.estado', b).val();
            var observacion = $('.observacion', b).val();

            json.push({
                'estado': estado,
                'observacion' :observacion
            });

        });

        var estado = `TOTAL  PORTACAMP CAMPAMENTO : ${$("#portcampCampamento").val()},
                      PORTACAMPS ATERRADOS : ${$("#portcampAterrado").val()},
                      PORTACAMPS NO ATERRADOS : ${$("#portcampNoAterrado").val()} `;
        json.push({
            'estado': estado,
            'observacion' : $("#portcampObservacion").val()
        });


        return json;
    }

});

