$(function () {


    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

    var nombres = data.result[0].nombres;
    var apellidos = data.result[0].apellidos;
    var usuario = data.result[0].internal;

    $("#nombres").val(`${nombres} ${apellidos}`);
    $("#internal").val(usuario);

    const LISTA_AREA2 = '[{"id":1,"idProyecto":5,"nombre":"Of. Administrativa San Borja Norte"},{"id":2,"idProyecto":5,"nombre":"Of. Administrativa Aviación"},{"id":3,"idProyecto":4,"nombre":"Ingreso"},{"id":4,"idProyecto":4,"nombre":"Zona de descarga"},{"id":5,"idProyecto":4,"nombre":"Oficinas"},{"id":6,"idProyecto":6,"nombre":"TMF Línea "},{"id":7,"idProyecto":6,"nombre":"Plataforma San Antonio"},{"id":8,"idProyecto":6,"nombre":"Estación éste"},{"id":9,"idProyecto":6,"nombre":"Estación oeste"},{"id":10,"idProyecto":6,"nombre":"Crucé vía nacional"},{"id":11,"idProyecto":6,"nombre":"Oficinas administrativas"},{"id":12,"idProyecto":3,"nombre":"Ingreso"},{"id":13,"idProyecto":3,"nombre":"Comedor"},{"id":14,"idProyecto":3,"nombre":"Oficinas administrativas"},{"id":15,"idProyecto":3,"nombre":"Almacén principal"},{"id":16,"idProyecto":3,"nombre":"Almacén de productos químicos"},{"id":17,"idProyecto":3,"nombre":"Habitaciones"},{"id":18,"idProyecto":3,"nombre":"Cocina"},{"id":19,"idProyecto":3,"nombre":"Pit de combustible"},{"id":20,"idProyecto":3,"nombre":"Taller de mantenimiento"},{"id":21,"idProyecto":3,"nombre":"Taller de servicios generales"},{"id":22,"idProyecto":3,"nombre":"Almacén de gases"},{"id":23,"idProyecto":3,"nombre":"Taller de pintura"},{"id":24,"idProyecto":3,"nombre":"Taller de soldadura"},{"id":25,"idProyecto":3,"nombre":"Planta de tratamiento de aguas"},{"id":26,"idProyecto":1,"nombre":"Km 0 Norte"},{"id":27,"idProyecto":1,"nombre":"Km 0 Sur"},{"id":28,"idProyecto":1,"nombre":"Area Consignada"},{"id":29,"idProyecto":1,"nombre":"AreaNo consignada"},{"id":30,"idProyecto":1,"nombre":"Taller C1"},{"id":31,"idProyecto":1,"nombre":"Campamento C6"},{"id":32,"idProyecto":6,"nombre":"Planta de Concreto"},{"id":33,"idProyecto":7,"nombre":"Km 0 Norte"},{"id":34,"idProyecto":7,"nombre":"Km 0 Sur"},{"id":35,"idProyecto":7,"nombre":"Area Consignada"},{"id":36,"idProyecto":7,"nombre":"Area No consignada"},{"id":37,"idProyecto":7,"nombre":"Taller C1"},{"id":38,"idProyecto":7,"nombre":"Campamento C6"},{"id":39,"idProyecto":7,"nombre":"Planta de Concreto"},{"id":40,"idProyecto":8,"nombre":"Km 0 Norte"},{"id":41,"idProyecto":8,"nombre":"Km 0 Sur"},{"id":42,"idProyecto":8,"nombre":"Area Consignada"},{"id":43,"idProyecto":8,"nombre":"AreaNo consignada"},{"id":44,"idProyecto":8,"nombre":"Taller C1"},{"id":45,"idProyecto":8,"nombre":"Campamento C6"},{"id":46,"idProyecto":8,"nombre":"Planta de Concreto"},{"id":47,"idProyecto":9,"nombre":"Km 0 Norte"},{"id":48,"idProyecto":9,"nombre":"Km 0 Sur"},{"id":50,"idProyecto":9,"nombre":"Area No consignada"},{"id":51,"idProyecto":9,"nombre":"Taller C1"},{"id":52,"idProyecto":9,"nombre":"Campamento C6"},{"id":53,"idProyecto":9,"nombre":"Planta de Concreto"},{"id":55,"idProyecto":9,"nombre":"EB4"},{"id":56,"idProyecto":9,"nombre":"Nuevo Flare"}]';

    const OBSERVACION_DETALLE = [{ "observacion": "01", "nombre": "Operar equipos sin autorización", "codigo": "01" },
    { "observacion": "01", "nombre": "Operar equipos a velocidad incorrecta", "codigo": "02" },
    { "observacion": "01", "nombre": "Deficiencia en el aislamiento y bloqueo", "codigo": "03" },
    { "observacion": "01", "nombre": "Inutilizar / retirar dispositivos o controles de seguridad", "codigo": "04" },
    { "observacion": "01", "nombre": "Utilizar equipos / herramientas defectuosos", "codigo": "05" },
    { "observacion": "01", "nombre": "Almacenamiento inadecuado", "codigo": "06" },
    { "observacion": "01", "nombre": "Levantamiento incorrecto de equipos, materiales o herramientas", "codigo": "07" },
    { "observacion": "01", "nombre": "Posición inadecuada para la tarea", "codigo": "08" },
    { "observacion": "01", "nombre": "Acerca del EPP (detallar)", "codigo": "09" },
    { "observacion": "01", "nombre": "Uso incorrecto de equipos / materiales", "codigo": "10" },
    { "observacion": "01", "nombre": "Falla de advertir o comunicar", "codigo": "11" },
    { "observacion": "01", "nombre": "Falla de identificar o reconocer", "codigo": "12" },
    { "observacion": "01", "nombre": "Desvío / Incumplimiento del procedimiento", "codigo": "13" },
    { "observacion": "01", "nombre": "Permisos / Check list (no realizado/incompleto)", "codigo": "14" },
    { "observacion": "01", "nombre": "AR/ER (no realizado o incompleto)", "codigo": "15" },
    { "observacion": "01", "nombre": "Transitar bajo la carga suspendida", "codigo": "16" },
    { "observacion": "01", "nombre": "Transitar cerca a vehículos en movimiento", "codigo": "17" },
    { "observacion": "01", "nombre": "Otros", "codigo": "18" },

    { "observacion": "02", "nombre": "Guardas o barreras inadecuadas", "codigo": "01" },
    { "observacion": "02", "nombre": "Herramientas, equipos o materiales defectuosos", "codigo": "02" },
    { "observacion": "02", "nombre": "Área congestionada - accionar restringido", "codigo": "03" },
    { "observacion": "02", "nombre": "Advertencia - Señalética faltante / incorrecta", "codigo": "04" },
    { "observacion": "02", "nombre": "Peligros de incendio y explosión", "codigo": "05" },
    { "observacion": "02", "nombre": "Desorden / Desaseo", "codigo": "06" },
    { "observacion": "02", "nombre": "Exposición a ruido", "codigo": "07" },
    { "observacion": "02", "nombre": "Exposición a la radiación", "codigo": "08" },
    { "observacion": "02", "nombre": "Temperaturas extremas", "codigo": "09" },
    { "observacion": "02", "nombre": "Iluminación inadecuada", "codigo": "10" },
    { "observacion": "02", "nombre": "Ventilación inadecuada", "codigo": "11" },
    { "observacion": "02", "nombre": "Condiciones atmosféricas / ambientales peligrosas", "codigo": "12" },
    { "observacion": "02", "nombre": "EPP incorrectos o deficientes", "codigo": "13" },
    { "observacion": "02", "nombre": "Accesos deficientes / incompletos", "codigo": "14" },
    { "observacion": "02", "nombre": "Estructuras incompletas / mal ubicadas", "codigo": "15" },
    { "observacion": "02", "nombre": "Desvío / Incumplimiento del procedimiento", "codigo": "16" },
    { "observacion": "02", "nombre": "OTROS", "codigo": "17" },

    { "observacion": "03", "nombre": "Trabaja de acuerdo al procedimiento", "codigo": "01" },
    { "observacion": "03", "nombre": "Usar sus EPPs correctamente", "codigo": "02" },
    { "observacion": "03", "nombre": "Mantiene su área de trabajo limpia y ordenada", "codigo": "03" },
    { "observacion": "03", "nombre": "Operar equipos de manera adecuada", "codigo": "04" },
    { "observacion": "03", "nombre": "Uso de herramientas inspeccionadas y en buen estado", "codigo": "05" },
    { "observacion": "03", "nombre": "Carga adecuada", "codigo": "06" },
    { "observacion": "03", "nombre": "Posición adecuada para la tarea", "codigo": "07" },
    { "observacion": "03", "nombre": "OTROS", "codigo": "08" }];


    const ACTO_SUBESTANDAR = "01";
    const CONDICION_SUBESTANDAR = "02";
    const ACTO_SEGURO = "03";

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


    $('#observacion').on('change', function () {

        let observacion = $('#observacion').val();
        getListObservacionDetail(observacion);
        observacionTitle(observacion);

    });


    function getListObservacionDetail(observacion) {

        var lista_selection = '<option value="" disabled selected hidden>Seleccionar observación detalle</option>';

        OBSERVACION_DETALLE.forEach((data) => {

            if (data.observacion == observacion) {

                lista_selection += `<option value="${data.codigo}"> ${data.nombre}</option>`;

            }
        });

        $('#observacion_detalle').html(lista_selection);

    }

    function observacionTitle(observacion) {

        var TITLE = "";

        if (observacion == ACTO_SUBESTANDAR) {
            TITLE = "Acto sub estándar";
        }
        if (observacion == CONDICION_SUBESTANDAR) {
            TITLE = "Condición sub estándar";
        }
        if (observacion == ACTO_SEGURO) {
            TITLE = "Acto Seguro";
        }

        $("#observacion_title").text(TITLE);
    }


    /*
    __________________________________________________
    |                                                 |
    |                   POP UP                        |
    |                                                 |
    |_________________________________________________|         

    */

    $('#addRowObs').on('click', function (event) {
        event.preventDefault();
        $("#popup-1").addClass("active");
        return false;

    })

    $("#popup_send_form").click(function (event) {
        event.preventDefault();

        if (answerValidateCamposPopUp()) {
            $("#formpopup").trigger('submit');
        }

        return false;
    });

    $("#formpopup").on('submit', function (event) {

        event.preventDefault();
        var arrayFormulario = $("#formpopup").serializeArray();


        var nombreResponsable = '';
        $("#responsable_accion option:selected").each(function () {
            nombreResponsable += $(this).text() + " ";
        });


        $(".popup_content").hide();
        $(".popup_load").show();
        $(".popup_load").html(`
        <div class="wrap_load_container"><div class="loader"></div></div>
        <div class="wrap_load_message"><p>Espere unos segundos estamos enviando el documento</p></div>`);

        $.ajax({
            url: RUTA + 'seguridad/guardarArchivos',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {

                $(".popup_load").hide();
                $(".popup_content").show();

                arrayFormulario.push({ "name": "listaArchivo", "value": JSON.parse(data).lista });
                arrayFormulario.push({ "name": "nombreResponsable", "value": nombreResponsable });

                console.log(arrayFormulario);

                var contenidoHtml = cadenaHtml(arrayFormulario);

                $("#tbody-data").append(contenidoHtml);
                $("#formpopup").trigger("reset");
                $("#popup-1").removeClass("active");


            }
        });

        return false;
    });

    // 8. Cerramos el popup
    $(".clickPopup-close").click(function (event) {
        event.preventDefault();
        $("#popup-1").removeClass("active");
        $("#formpopup").trigger("reset");
        return false;
    });


    // 9. Creamos el row de la tabla principal
    function cadenaHtml(arrayFormulario) {

        var observacion = arrayFormulario[0]['value'];
        var observacionDetalle = arrayFormulario[1]['value'];
        var detalle = arrayFormulario[2]['value'];
        var clasificacion = arrayFormulario[3]['value'];
        var accionCorrectiva = arrayFormulario[4]['value'];
        var responsableAccion = arrayFormulario[5]['value'];
        var fechaCumplimiento = arrayFormulario[6]['value'];
        var seguimiento = arrayFormulario[7]['value'];
        var listaArchivo = arrayFormulario[8]['value'];
        var nombreResponsable = arrayFormulario[9]['value'];


        var cadena =
            `<tr> 
        <td> 
       <select  class="tipo w80p" id="sede" class="w75p"> 
       <option value="-1" class="oculto">Seleccione Opción</option>
       <option value="1"  ${tipo("01", observacion)} >Acto Subestándar </option>
       <option value="2"  ${tipo("02", observacion)} >Condicion Subestándar</option>
       <option value="3"  ${tipo("03", observacion)} >Acto seguro</option>
       </select>
        </td> 
        

        <td> 
        <input type="text" class="condicion w100p"  value="${getObservacionDetalle(observacion, observacionDetalle)}" readonly>
         </td> 

         <td> 
         <input type="text" class="detalle w100p"  value="${detalle}" readonly>
          </td>


        <td>
        <select  class="clasificacion w80p" id="clasificacion" class="w75p"> 
        <option value="-1" class="oculto">Seleccione Opción </option>
        <option value="1"  ${tipo(1, clasificacion)} >A</option>
        <option value="2"  ${tipo(2, clasificacion)} >B</option>
        <option value="3"  ${tipo(3, clasificacion)} >C</option>
        <option value="4"  ${tipo(4, clasificacion)} >NA</option>
        </select>
        </td>



         <td> 
          <input type="text" class="correctiva w100p" value="${accionCorrectiva}" readonly>
         </td> 
         <td> 
          <input type="text" class="responsable w100p"  dniResponsable="${responsableAccion}" value="${nombreResponsable}" readonly>
         </td> 
        <td> 
           <input type="date" class="cumplimiento w100p"  value="${fechaCumplimiento}" readonly>
        </td> 
       <td> 
          <input type="text" class="seguimiento w100p"  value="${seguimiento}" readonly>
        </td> 
          <td> 
          <input type="text" class="evidencia"   value="${listaArchivo}" readonly>
        </td> 

        </tr> `;

        return cadena;
    }

    function actoSeguro(arrayFormulario) {
        var idTipoObservacion = 3;
        var data = arrayFormulario[9]['value'];
        if (idTipoObservacion == arrayFormulario[0]['value']) {
            data = '';
        }

        return data;
    }

    function tipo(id, idTipo) {

        var selected = ``;

        if (id == idTipo) {
            selected = `selected`;
        }
        return selected;
    }


    function getObservacionDetalle(observacion, observacionDetalle) {

        let result = '';

        OBSERVACION_DETALLE.forEach((data) => {

            if (data.observacion == observacion && data.codigo == observacionDetalle) {
                result = data.nombre;
            }
        });

        return result;

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


        var str = $("#formDigital").serialize();
        var idSeguridad = '';


        $.post(RUTA + 'seguridad/grabarDocumentoWebNew', str, function (data, textStatus, xhr) {
            idSeguridad = data;

        })
            .always(function () {

                var ary = [];

                $('.table_oficial tr').each(function (a, b) {

                    if ($('.tipo', b).val() != undefined) {


                        var tipo = $('.tipo', b).val();
                        var condicion = $('.condicion', b).val();
                        var detalle = $('.detalle', b).val();
                        var clasificacion = $('.clasificacion', b).val();
                        var correctiva = $('.correctiva', b).val();
                        var responsable = $('.responsable', b).val();
                        var cumplimiento = $('.cumplimiento', b).val();
                        var seguimiento = $('.seguimiento', b).val();
                        var evidencia = $('.evidencia', b).val();
                        var dni = $('.responsable', b).attr("dniResponsable");

                        ary.push({
                            tipo: tipo,
                            Condicion: condicion,
                            Detalle: detalle,
                            Clasificacion: clasificacion,
                            Correctiva: correctiva,
                            Responsable: responsable,
                            Cumplimiento: cumplimiento,
                            Seguimiento: seguimiento,
                            Evidencia: evidencia,
                            iddoc: idSeguridad,
                            dni: dni
                        });

                    }
                });


                //eventualmente se lo vamos a enviar por PHP por ajax de una forma bastante simple 
                //y además convertiremos el array en json para evitar cualquier incidente con compatibilidades.

                INFO = new FormData();
                aInfo = JSON.stringify(ary);


                INFO.append('data', aInfo);

                $.ajax({
                    url: RUTA + 'seguridad/grabarDetallesNew',
                    type: "POST",
                    data: INFO,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        $(".wrap_load").hide();
                        $(".wrap_sucess").show();

                        $(".wrap_sucess").html(`   <div class="wrap_document_detail">
                            <div class="item_format">
                                <h3>Documentos</h3>
                            </div>
                            <div class="item_format">
                                <a class="home_document" href="#">Inicio</a> <a href="#">/ Inspección planeada de seguridad</a>
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
                });


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
            { "campo": "tipo_inspeccion", "tipo": SELECT },
            { "campo": "proyecto", "tipo": SELECT },
            { "campo": "area", "tipo": SELECT },
            { "campo": "ubicacion", "tipo": INPUT },
            { "campo": "fecha_registro", "tipo": DATE },
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