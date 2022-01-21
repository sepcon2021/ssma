$(function () {


    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

    var nombres = data.result[0].nombres;
    var apellidos = data.result[0].apellidos;
    var usuario = data.result[0].internal;

    $("#nombres").val(`${nombres} ${apellidos}`);
    $("#internal").val(usuario);

    const LISTA_AREA2 = '[{"id":1,"idProyecto":5,"nombre":"Of. Administrativa San Borja Norte"},{"id":2,"idProyecto":5,"nombre":"Of. Administrativa Aviación"},{"id":3,"idProyecto":4,"nombre":"Ingreso"},{"id":4,"idProyecto":4,"nombre":"Zona de descarga"},{"id":5,"idProyecto":4,"nombre":"Oficinas"},{"id":6,"idProyecto":6,"nombre":"TMF Línea "},{"id":7,"idProyecto":6,"nombre":"Plataforma San Antonio"},{"id":8,"idProyecto":6,"nombre":"Estación éste"},{"id":9,"idProyecto":6,"nombre":"Estación oeste"},{"id":10,"idProyecto":6,"nombre":"Crucé vía nacional"},{"id":11,"idProyecto":6,"nombre":"Oficinas administrativas"},{"id":12,"idProyecto":3,"nombre":"Ingreso"},{"id":13,"idProyecto":3,"nombre":"Comedor"},{"id":14,"idProyecto":3,"nombre":"Oficinas administrativas"},{"id":15,"idProyecto":3,"nombre":"Almacén principal"},{"id":16,"idProyecto":3,"nombre":"Almacén de productos químicos"},{"id":17,"idProyecto":3,"nombre":"Habitaciones"},{"id":18,"idProyecto":3,"nombre":"Cocina"},{"id":19,"idProyecto":3,"nombre":"Pit de combustible"},{"id":20,"idProyecto":3,"nombre":"Taller de mantenimiento"},{"id":21,"idProyecto":3,"nombre":"Taller de servicios generales"},{"id":22,"idProyecto":3,"nombre":"Almacén de gases"},{"id":23,"idProyecto":3,"nombre":"Taller de pintura"},{"id":24,"idProyecto":3,"nombre":"Taller de soldadura"},{"id":25,"idProyecto":3,"nombre":"Planta de tratamiento de aguas"},{"id":26,"idProyecto":1,"nombre":"Km 0 Norte"},{"id":27,"idProyecto":1,"nombre":"Km 0 Sur"},{"id":28,"idProyecto":1,"nombre":"Area Consignada"},{"id":29,"idProyecto":1,"nombre":"AreaNo consignada"},{"id":30,"idProyecto":1,"nombre":"Taller C1"},{"id":31,"idProyecto":1,"nombre":"Campamento C6"},{"id":32,"idProyecto":6,"nombre":"Planta de Concreto"},{"id":33,"idProyecto":7,"nombre":"Km 0 Norte"},{"id":34,"idProyecto":7,"nombre":"Km 0 Sur"},{"id":35,"idProyecto":7,"nombre":"Area Consignada"},{"id":36,"idProyecto":7,"nombre":"Area No consignada"},{"id":37,"idProyecto":7,"nombre":"Taller C1"},{"id":38,"idProyecto":7,"nombre":"Campamento C6"},{"id":39,"idProyecto":7,"nombre":"Planta de Concreto"},{"id":40,"idProyecto":8,"nombre":"Km 0 Norte"},{"id":41,"idProyecto":8,"nombre":"Km 0 Sur"},{"id":42,"idProyecto":8,"nombre":"Area Consignada"},{"id":43,"idProyecto":8,"nombre":"AreaNo consignada"},{"id":44,"idProyecto":8,"nombre":"Taller C1"},{"id":45,"idProyecto":8,"nombre":"Campamento C6"},{"id":46,"idProyecto":8,"nombre":"Planta de Concreto"},{"id":47,"idProyecto":9,"nombre":"Km 0 Norte"},{"id":48,"idProyecto":9,"nombre":"Km 0 Sur"},{"id":50,"idProyecto":9,"nombre":"Area No consignada"},{"id":51,"idProyecto":9,"nombre":"Taller C1"},{"id":52,"idProyecto":9,"nombre":"Campamento C6"},{"id":53,"idProyecto":9,"nombre":"Planta de Concreto"},{"id":55,"idProyecto":9,"nombre":"EB4"},{"id":56,"idProyecto":9,"nombre":"Nuevo Flare"}]';


    const SELECT = 1;
    const DATE = 2;
    const INPUT = 3;


    $('#proyecto').on('change', function () {

        let proyecto = $('#proyecto').val();
        getListaArea(proyecto);
        loadResponsable(proyecto);

    });

    function getListaArea(idProyecto) {

        var lista_selection = '<option value="" disabled selected hidden>Seleccionar área</option>';

        $.each(JSON.parse(LISTA_AREA2), function (indexInArray, valueOfElement) {

            if (valueOfElement.idProyecto == idProyecto) {
                lista_selection += "<option value=" + valueOfElement.id + " idproyecto=" + valueOfElement.idProyecto + ">" + valueOfElement.nombre + "</option>";
            }
        });

        $('#area').html(lista_selection);

    }


    function loadResponsable(proyecto) {
        var htmlDesplegable = `<option value="" disabled="" selected="" hidden="">Seleccionar</option>`;
        $.post(RUTA + 'responsable/listaReponsableByProyecto', { idProyecto: proyecto }, function (data, textStatus, xhr) {
            data.forEach((responsable) => {
                htmlDesplegable += `<option value="${responsable.dni}">${responsable.nombres}</option>`;
            });
            $("#responsable_accion").html(htmlDesplegable);
        }, "json");
    }




    /*
    __________________________________________________
    |                                                 |
    |                   PHOTO SECTION                 |
    |                                                 |
    |_________________________________________________|         

    */

    let fileInput = document.getElementById("file-input");
    let imageContainer = document.getElementById("images");


    $("#file-input").on("change", function () {
        console.log("prueba");
        preview();
    });

    function preview() {

        imageContainer.innerHTML = "";

        for (i of fileInput.files) {
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figCaption");

            figCap.innerText = i.name;
            figure.appendChild(figCap);
            reader.onload = () => {
                let img = document.createElement("img");
                img.setAttribute("src", reader.result);
                figure.insertBefore(img, figCap);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }

    }



    /*
    __________________________________________________
    |                                                 |
    |                   SEND DOCUMENT                 |
    |                                                 |
    |_________________________________________________|         

    */
    $("#button_send_form").on('click', function (event) {
        event.preventDefault();

        console.log(answerValidateCampos());

        if (answerValidateCampos()) {
            $("#formDigital").trigger('submit');
        } else {
            alert("Es obligatorio llenar todos los campos")
        }
    });

    $("#formDigital").submit(function (e) {
        e.preventDefault();

        $(".wrap_document").hide();
        $(".wrap_load").html(`    
            <div class="wrap_load_container"><div class="loader"></div></div>
            <div class="wrap_load_message"><p>Espere unos segundos estamos enviando el documento</p></div>
        `);

        $(".wrap_load").show();


        var str = $(this).serialize();


        var recomendaciones = getTableRecomendaciones();
        var observaciones = getTableObservaciones();
        var Observadores = getTableObservadores();
     
        
        var data = str + '&data_observacion=' + observaciones +
        '&data_recomendacion=' + recomendaciones +
        '&data_observadores=' + Observadores;

        /*
        $.ajax({
            url: RUTA + 'opt/saveDocumentOptWebNew',
            type: "POST",
            data: data,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(data) {
                $(".wrap_load").hide();
                $(".wrap_sucess").show();

                $(".wrap_sucess").html(`   <div class="wrap_document_detail">
                <div class="item_format">
                    <h3>Documentos</h3>
                </div>
                <div class="item_format">
                    <a class="home_document" href="#">Inicio</a> <a href="#">/ Tops</a>
                </div>
            </div>
            <div class="wrap_sucess_content">
                <div>
                    <img class="wrap_sucess_img" src="public/img/clapping.png" alt="">
                </div>
                <div>
                    <p class="wrap_sucess_message">Felicidades el documento 
                        fue enviado con éxito</p>
                </div>
                <div >
                    <button class="wrap_sucess_home home_document">Inicio</button>
                </div>
            </div>`);

                goHome();
            }
        });*/


        $.post(RUTA + 'opt/saveDocumentOptWebNew', data, function(data, textStatus, xhr) {

            $(".wrap_load").hide();
            $(".wrap_sucess").show();

            $(".wrap_sucess").html(`   <div class="wrap_document_detail">
            <div class="item_format">
                <h3>Documentos</h3>
            </div>
            <div class="item_format">
                <a class="home_document" href="#">Inicio</a> <a href="#">/ Observación planeada de tarea</a>
            </div>
        </div>
        <div class="wrap_sucess_content">
            <div>
                <img class="wrap_sucess_img" src="public/img/clapping.png" alt="">
            </div>
            <div>
                <p class="wrap_sucess_message">Felicidades el documento 
                    fue enviado con éxito</p>
            </div>
            <div >
                <button class="wrap_sucess_home home_document">Inicio</button>
            </div>
        </div>`);

            goHome();

        });


    });

    goHome();


    function goHome(){
        
        $(".home_document").on("click",function(){
    
            var result = confirm("¿Quieres volver al inicio?");
    
            if(result)  {
                $.post(RUTA + 'documento/render', function (data, textStatus, xhr) {
                    $(".mainpage").html(data);
                });
            } 
    
        });
        }



        /*
    __________________________________________________
    |                                                 |
    |                   EXTRACT TABLE                 |
    |                                                 |
    |_________________________________________________|         

    */

    

    function getTableObservaciones() {

        var ary = [];

        $('.tablaObservaciones tr').each(function(a, b) {

            if ($('.pasos', b).val().length > 0 && $('.observaciones', b).val().length > 0) {

                var pasos = $('.pasos', b).val();
                var observaciones = $('.observaciones', b).val();

                ary.push({
                    pasos: pasos,
                    observaciones: observaciones
                });
            }
        });


        //eventualmente se lo vamos a enviar por PHP por ajax de una forma bastante simple 
        //y además convertiremos el array en json para evitar cualquier incidente con compatibilidades.

        INFO = new FormData();
        aInfo = JSON.stringify(ary);


        return aInfo;


    }



    function getTableRecomendaciones() {

        var ary = [];



        $('.tablaRecomendaciones tr').each(function(a, b) {


            if ($('.acciones', b).val().length > 0) {

                var acciones = $('.acciones', b).val();
                var responsable = $('.responsable', b).val();
                var fecha = $('.fecha', b).val();

                ary.push({
                    acciones: acciones,
                    responsable: responsable,
                    fecha: fecha
                });

            }
        });


        //eventualmente se lo vamos a enviar por PHP por ajax de una forma bastante simple 
        //y además convertiremos el array en json para evitar cualquier incidente con compatibilidades.

        INFO = new FormData();
        aInfo = JSON.stringify(ary);


        return aInfo;


    }



    function getTableObservadores() {

        var ary = [];

        $('.tablaObservadores tr').each(function(a, b) {

            if ($('.nombre', b).val().length > 0) {

                var nombre = $('.nombre', b).val();
                /* var firma = $('.firma', b).val();*/

                ary.push({
                    nombre: nombre,
                    /*  firma: firma*/
                });

            }

        });


        //eventualmente se lo vamos a enviar por PHP por ajax de una forma bastante simple 
        //y además convertiremos el array en json para evitar cualquier incidente con compatibilidades.

        INFO = new FormData();
        aInfo = JSON.stringify(ary);


        return aInfo;


    }




    /*
    __________________________________________________
    |                                                 |
    |                   VALIDATE CAMPOS               |
    |                                                 |
    |_________________________________________________|         

    */

    function answerValidateCamposPopUp() {

        let listCampos = [{ "campo": "observacion", "tipo": SELECT },
        { "campo": "observacion_detalle", "tipo": SELECT },
        { "campo": "detalle", "tipo": INPUT },
        { "campo": "clasificacion", "tipo": SELECT },
        { "campo": "accion_correctiva", "tipo": INPUT },
        { "campo": "responsable_accion", "tipo": SELECT },
        { "campo": "fecha_cumplimiento", "tipo": DATE },
        { "campo": "seguimiento", "tipo": INPUT },
        ];

        if (validateCampos(listCampos) > 0) {
            return false;
        } else {
            return true;
        }
    }

    function answerValidateCampos() {

        let listCampos = [
            { "campo": "proyecto", "tipo": SELECT },
            { "campo": "area", "tipo": SELECT },
            { "campo": "ubicacion", "tipo": INPUT },
            { "campo": "fase", "tipo": SELECT },
            { "campo": "nombre_equipo_observado", "tipo": INPUT },
            { "campo": "tiempo_trabajo", "tipo": SELECT },
            { "campo": "tiempo_trabajo_actual", "tipo": INPUT },
            { "campo": "guardia", "tipo": INPUT },
            { "campo": "ocupacion", "tipo": INPUT },
            { "campo": "tarea", "tipo": INPUT },
            { "campo": "fecha_incidente", "tipo": DATE },
            { "campo": "razon", "tipo": INPUT },
            { "campo": "responsable_accion", "tipo": SELECT },
            { "campo": "riesgo_critico", "tipo": SELECT },
            { "campo": "pet", "tipo": SELECT },

            { "campo": "responsable_area", "tipo": INPUT }];

        if (validateCampos(listCampos) > 0) {
            return false;
        } else {
            return true;
        }
    }

    function validateCampos(listCampos) {
        let AMOUNT_EMPTY_CAMPOS = 0;

        listCampos.forEach((element) => {
            if (element.tipo == SELECT) {
                AMOUNT_EMPTY_CAMPOS += validateSelect(element.campo);
                changeClassErrorSelect(element.campo);
            }
            if (element.tipo == DATE) {
                AMOUNT_EMPTY_CAMPOS += validateDate(element.campo);
                changeClassErrorDate(element.campo);
            }
            if (element.tipo == INPUT) {
                AMOUNT_EMPTY_CAMPOS += validateInput(element.campo);
                changeClassErrorInput(element.campo);
            }
        });

        return AMOUNT_EMPTY_CAMPOS;

    }




    //Validate SELECT

    function validateSelect(name) {

        let VACIO = null;
        let cantidad = 0;

        if ($(`#${name}`).val() == VACIO) {
            $(`#${name}_error`).text("Campo obligatorio");
            $(`#${name}`).addClass("item_format_select_error");

            cantidad = 1;
        }

        return cantidad;
    }

    function changeClassErrorSelect(name) {

        $(`#${name}`).on("click", function (event) {
            event.preventDefault();
            $(`#${name}`).removeClass("item_format_select_error");
            $(`#${name}_error`).text("");
        });

    }

    // Validate DATE

    function validateDate(name) {

        let VACIO = "";
        let cantidad = 0;


        if ($(`#${name}`).val() == VACIO) {
            $(`#${name}_error`).text("Campo obligatorio");
            $(`#${name}`).addClass("item_format_select_error");
            cantidad = 1;
        }

        return cantidad;
    }

    function changeClassErrorDate(name) {

        $(`#${name}`).on("change", function (event) {
            event.preventDefault();
            $(`#${name}`).removeClass("item_format_select_error");
            $(`#${name}_error`).text("");
        });

    }


    // Validate  INPUT || TEXTAREA 

    function validateInput(name) {

        let VACIO = "";
        let cantidad = 0;

        if ($(`#${name}`).val() == VACIO) {
            $(`#${name}_error`).text("Campo obligatorio");
            $(`#${name}`).addClass("item_format_select_error");
            cantidad = 1;
        }
        return cantidad;
    }

    function changeClassErrorInput(name) {

        $(`#${name}`).on("change", function (event) {
            event.preventDefault();
            $(`#${name}`).removeClass("item_format_select_error");
            $(`#${name}_error`).text("");
        });

    }


});