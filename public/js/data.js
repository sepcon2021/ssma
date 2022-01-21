$(document).ready(function() {

    getListaProyecto();

    getListaAreaObservada();

    getListaTiempoTrabajo();

    getListaEdad();

    getListaHorario();

    getListaLesion();

    getListaObstaculo();

    getListaPeriodo();

    getListaInspeccion();

    /**
     * 
     * AGREGAMOS EL SELECT EN FUNCION DE lista_area con lista_ubicacion
     * 
     */



    function getListaProyecto() {


        var lista_selection_proyectos = '<option value="" disabled selected hidden>Seleccionar proyecto</option>';

        $.each(JSON.parse(LISTA_PROYECTO2), function(indexInArray, valueOfElement) {



            lista_selection_proyectos += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_proyecto_top').html(lista_selection_proyectos);

    }



    $('#lista_proyecto_top').on('change', function() {
        
        var idProyecto = $('#lista_proyecto_top').val();
        getListaArea(idProyecto);

    });



    function getListaArea(idProyecto) {

        var lista_selection = '<option value="" disabled selected hidden>Seleccionar área</option>';

        $.each(JSON.parse(LISTA_AREA2), function(indexInArray, valueOfElement) {


            if (valueOfElement.idProyecto == idProyecto) {
                lista_selection += "<option value=" + valueOfElement.id + " idproyecto=" + valueOfElement.idProyecto + ">" + valueOfElement.nombre + "</option>";
            }


        });

        $('#lista_area_top').html(lista_selection);

    }

    
    $('#lista_area_top').on('change', function() {
        
        var idArea = $('#lista_area_top').val();
        var idProyecto = $('#lista_area_top').find('option:selected').attr('idproyecto')

        if(idProyecto == 9 ){

            getListaUbicacion(idArea);

        }

    });


    function getListaUbicacion(idArea) {

        var lista_selection = '<option value="" disabled selected hidden>Seleccionar ubicación</option>';

        $.each(JSON.parse(LISTA_UBICACION), function(indexInArray, valueOfElement) {


            if (valueOfElement.id == idArea) {
                lista_selection += "<option value=" + valueOfElement.id + " >" + valueOfElement.nombre + "</option>";
            }


        });

        var contenido =`
        <label for="observado_lugar" class="obligatorio">Ubicación</label> 
        <select id="listaUbicacion" class="w75p"> ${lista_selection} </select>
        <input type="hidden" name="observado_lugar" id="observado_lugar" class="w95p">
        `

        $('#ubicacion').html(contenido);

        listenChangeUbicacion();

    }
    function listenChangeUbicacion() {
       
    $('#listaUbicacion').on('change', function() {
        
        var ubicacion = '';

        $( "#listaUbicacion option:selected" ).each(function() {
            ubicacion += $( this ).text() + " ";
          });

          $("#observado_lugar").val(ubicacion);
    }); 
    }



    function getListaAreaObservada() {


        var lista_selection = '<option value="" disabled selected hidden> Seleccionar la fase observada</option>';


        $.each(JSON.parse(LISTA_AREA_OBSERVADA2), function(indexInArray, valueOfElement) {


            lista_selection += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_area_observada').html(lista_selection);

    }





    function getListaTiempoTrabajo() {


        var lista_selection = '<option value="1000"> Seleccionar Tiempo en el proyecto</option>';

        $.each(JSON.parse(LISTA_TIEMPO_TRABAJO), function(indexInArray, valueOfElement) {


            lista_selection += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_tiempo_trabajo').html(lista_selection);

    }

    function getListaEdad() {


        var lista_selection = '<option value="1000"> Seleccionar Edad</option>';

        $.each(JSON.parse(LISTA_EDAD), function(indexInArray, valueOfElement) {


            lista_selection += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_edad').html(lista_selection);

    }

    function getListaHorario() {


        var lista_selection = '<option value="-1"> Seleccionar Horario</option>';

        $.each(JSON.parse(LISTA_HORARIO), function(indexInArray, valueOfElement) {


            lista_selection += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_horario').html(lista_selection);

    }



    function getListaLesion() {


        var lista_selection = '<option value="-1"> Seleccionar Lesión</option>';

        $.each(JSON.parse(LISTA_LESION), function(indexInArray, valueOfElement) {


            lista_selection += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_lesion').html(lista_selection);

    }

    function getListaObstaculo() {


        var lista_selection = '<option value="-1"> Seleccionar Obstáculo</option>';

        $.each(JSON.parse(LISTA_OBSTACULO), function(indexInArray, valueOfElement) {


            lista_selection += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });


        $('#lista_obstaculo').html(lista_selection);

    }


    function getListaPeriodo() {

        var lista_selection = '';

        console.log(LISTA_PERIODO);

        $.each(JSON.parse(LISTA_PERIODO), function(indexInArray, valueOfElement) {


            console.log(valueOfElement.id + " - " + valueOfElement.nombre);
            lista_selection += "<option value=" + valueOfElement.id + ">" + valueOfElement.nombre + "</option>";

        });




        $('#idPeriodo').html(lista_selection);
    }

    function getListaInspeccion() {
        var lista_selection = '';

        $.each(JSON.parse(LISTA_INSPECCION), function(indexInArray, valueOfElement) {


            lista_selection += "<option value=" + valueOfElement.idPeriodo + ">" + valueOfElement.nombre + "</option>";

        });


        $('#idInspeccion').html(lista_selection);
    }

    $('#lista_area_observada').on('change', function() {
        
        var IDPROYECTO = 9;

        var idProyecto = $('#lista_proyecto_top').val();
        var idFase = $('#lista_area_observada').val();

        if(idProyecto == IDPROYECTO ){
            
            listaReponsableByProyectoByFase(idProyecto,idFase);

        }else{

            listaReponsableByProyecto(idProyecto);
        }
    });

    function listaReponsableByProyectoByFase(idProyecto,idFase){

        var htmlDesplegable = `<option value="" disabled="" selected="" hidden="">Seleccionar</option>`;

        $.post(RUTA + 'responsable/listaReponsableByProyectoByFase', { idProyecto : idProyecto , idFase : idFase }, function (data, textStatus, xhr) {

            data.forEach((responsable) => {

                htmlDesplegable += `<option value="${responsable.dni}">${responsable.nombres}</option>`;
                
            });

            $(".dni_propietario").html(htmlDesplegable);


        }, "json");
    }

    function listaReponsableByProyecto(idProyecto){

        var htmlDesplegable = `<option value="" disabled="" selected="" hidden="">Seleccionar</option>`;


        $.post(RUTA + 'responsable/listaReponsableByProyecto', { idProyecto : idProyecto  }, function (data, textStatus, xhr) {

            data.forEach((responsable) => {

                htmlDesplegable += `<option value="${responsable.dni}">${responsable.nombres}</option>`;

            });

            $(".dni_propietario").html(htmlDesplegable);


        }, "json");
    }

})