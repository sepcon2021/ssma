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

        $.post(RUTA + 'inspeccionDerrame/insert', json, function (data, textStatus, xhr) {

            if (data.status == 200) {
                mostrarMensaje("msj_correcto", "Envio exitoso");
                $("#formulario").trigger("reset");
            }

        }, "json");

        return false;
    });



    function generarJson() {

        var jsonGeneral = [];

        jsonGeneral.push({
            'sede': $('#lista_proyecto').val(),
            'id_area': $('#lista_area').val(),
            'fecha': $('#fecha').val(),
            'dni_responsable': $('.dni_propietario').val(),
            'observacion': $('#observacion').val(),

            'equipo_otros_uno': $('#equipo_otros_uno').val(),
            'cantidad_otros_uno': $('#cantidad_otros_uno').val(),

            'equipo_otros_dos': $('#equipo_otros_dos').val(),
            'cantidad_otros_dos': $('#cantidad_otros_dos').val(),

            'equipo_otros_tres': $('#equipo_otros_tres').val(),
            'cantidad_otros_tres': $('#cantidad_otros_tres').val(),

            'equipo_otros_cuatro': $('#equipo_otros_cuatro').val(),
            'cantidad_otros_cuatro': $('#cantidad_otros_cuatro').val(),

            'listaInspecciones': generarListaInspeccionesJson()

        });

        return jsonGeneral;

    }

    function generarListaInspeccionesJson() {

        var json = [];

        $('#tablaInspeccionDerrame tbody tr').each(function (a, b) {
            var equipo = $('.equipo', b).val();
            var bandeja_contencion = $('.bandeja_contencion', b).val();
            var panos_absorventes = $('.panos_absorventes', b).val();
            var trapo_industrial = $('.trapo_industrial', b).val();
            var bolsa_plastica = $('.bolsa_plastica', b).val();
            var pala = $('.pala', b).val();

            var pico = $('.pico', b).val();
            var salchicha_absorvente = $('.salchicha_absorvente', b).val();
            var bolsa_propileno = $('.bolsa_propileno', b).val();
            var guantes_nitrilo = $('.guantes_nitrilo', b).val();
            var respirador_media = $('.respirador_media', b).val();

            var otros_uno = $('.otros_uno', b).val();
            var otros_dos = $('.otros_dos', b).val();
            var otros_tres = $('.otros_tres', b).val();
            var otros_cuatro = $('.otros_cuatro', b).val();


            if (equipo != undefined) {

                if (equipo.length > 0) {

                    json.push({
                        'equipo': equipo,
                        'bandeja_contencion': bandeja_contencion,
                        'panos_absorventes': panos_absorventes,
                        'trapo_industrial': trapo_industrial,
                        'bolsa_plastica': bolsa_plastica,
                        'pala': pala,
                        'pico': pico,
                        'salchicha_absorvente': salchicha_absorvente,
                        'bolsa_propileno': bolsa_propileno,
                        'guantes_nitrilo': guantes_nitrilo,
                        'respirador_media': respirador_media,
                        'otros_uno': otros_uno,
                        'otros_dos': otros_dos,
                        'otros_tres': otros_tres,
                        'otros_cuatro': otros_cuatro
                    });
                }

            }



        });


        return json;
    }

});

