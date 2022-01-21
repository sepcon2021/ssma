$(document).ready(function () {

    getListaProyecto();

    getListaAreaObservada();


    function getListaProyecto() {


        var lista_selection_proyectos = '<option value="" disabled selected hidden>Seleccionar proyecto</option>';

        $.each(JSON.parse(LISTA_PROYECTO2), function (indexInArray, valueOfElement) {



            lista_selection_proyectos += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_proyecto').html(lista_selection_proyectos);

    }



    $('#lista_proyecto').on('change', function () {

        var idProyecto = $('#lista_proyecto').val();
        console.log('PRUEBA')
        console.log(idProyecto);
        getListaArea(idProyecto);

    });



    function getListaArea(idProyecto) {

        var lista_selection = '<option value="" disabled selected hidden>Seleccionar área</option>';

        $.each(JSON.parse(LISTA_AREA2), function (indexInArray, valueOfElement) {


            if (valueOfElement.idProyecto == idProyecto) {
                lista_selection += "<option value=" + valueOfElement.id + " idproyecto=" + valueOfElement.idProyecto + ">" + valueOfElement.nombre + "</option>";
            }


        });

        $('#lista_area').html(lista_selection);

    }


    function getListaAreaObservada() {


        var lista_selection = '<option value="" disabled selected hidden> Seleccionar la fase observada</option>';


        $.each(JSON.parse(LISTA_AREA_OBSERVADA2), function (indexInArray, valueOfElement) {


            lista_selection += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_area_observada').html(lista_selection);

    }


    $('#lista_proyecto').on('change', function () {

        var idProyecto = $('#lista_proyecto').val();

        console.log('LISTEN');

        var htmlDesplegable = `<option value="" disabled="" selected="" hidden="">Seleccionar</option>`;


        $.post(RUTA + 'responsable/listaReponsableByProyecto', { idProyecto : idProyecto  }, function (data, textStatus, xhr) {

            data.forEach((responsable) => {

                htmlDesplegable += `<option value="${responsable.dni}">${responsable.nombres}</option>`;

            });

            $(".dni_propietario").html(htmlDesplegable);


        }, "json");

    });


})