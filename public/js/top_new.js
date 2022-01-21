$(function () {


    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

    var nombres = data.result[0].nombres;
    var apellidos = data.result[0].apellidos;
    var usuario = data.result[0].usuario;

    $("#nombre").val(`${nombres} ${apellidos}`);
    $("#usuario").val(usuario);

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

    const RELACIONADO = [{ "observacion": "01", "nombre": "TRABAJOS EN ALTURA", "codigo": "01" },
    { "observacion": "01", "nombre": "ANDAMIO", "codigo": "02" },
    { "observacion": "01", "nombre": "TRABAJOS EN CALIENTE", "codigo": "03" },
    { "observacion": "01", "nombre": "TRABAJOS ELECTRICOS", "codigo": "04" },
    { "observacion": "01", "nombre": "EQUIPOS MOVILES", "codigo": "05" },
    { "observacion": "01", "nombre": "ERGONOMIA", "codigo": "06" },
    { "observacion": "01", "nombre": "ESPACIO CONFIANDO", "codigo": "07" },
    { "observacion": "01", "nombre": "EXCAVACION", "codigo": "08" },
    { "observacion": "01", "nombre": "GUARDAS", "codigo": "09" },
    { "observacion": "01", "nombre": "IZAJE", "codigo": "10" },
    { "observacion": "01", "nombre": "EPP", "codigo": "11" },
    { "observacion": "01", "nombre": "TORMENTAS ELECTRICAS", "codigo": "12" },
    { "observacion": "01", "nombre": "MATERIALES PELIGROSOS", "codigo": "13" },
    { "observacion": "01", "nombre": "GESTION DE RESIDUOS", "codigo": "14" },
    { "observacion": "01", "nombre": "AISLAMIENTO DE ENERGIA", "codigo": "15" },
    { "observacion": "01", "nombre": "HERRAMIENTAS", "codigo": "16" },
    { "observacion": "01", "nombre": "NO APLICA", "codigo": "17" }];

    const LISTA_UBICACION = [{ "id": 47, "nombre": "Acopio de residuos", "detalle": "" }, { "id": 47, "nombre": "Almacén central", "detalle": "" }, { "id": 47, "nombre": "Pruebas hidrostáticas", "detalle": "" }, { "id": 47, "nombre": "Taller de carpintería", "detalle": "" }, { "id": 47, "nombre": "Taller de fierrería", "detalle": "" }, { "id": 47, "nombre": "Taller de piping-estructuras", "detalle": "" }, { "id": 47, "nombre": "Taller de pintura y granallado", "detalle": "" }, { "id": 47, "nombre": "Almacén piping", "detalle": "" }, { "id": 47, "nombre": "Laboratorío qa/qc", "detalle": "" }, { "id": 47, "nombre": "Taller de pintura ssma", "detalle": "" }, { "id": 47, "nombre": "Generador eléctrico", "detalle": "" }, { "id": 47, "nombre": "Otros", "detalle": "" }, { "id": 48, "nombre": "Taller de mantenimiento", "detalle": "" }, { "id": 48, "nombre": "Pit de combustible", "detalle": "" }, { "id": 48, "nombre": "Pit de lubricantes", "detalle": "" }, { "id": 48, "nombre": "Almacén de productos químicos", "detalle": "" }, { "id": 48, "nombre": "Acopio temporal de residuos-mant", "detalle": "" }, { "id": 48, "nombre": "Acopio de residuos", "detalle": "" }, { "id": 48, "nombre": "Almacén 1", "detalle": "" }, { "id": 48, "nombre": "Almacén 2", "detalle": "" }, { "id": 48, "nombre": "Almacén de productos químicos", "detalle": "" }, { "id": 48, "nombre": "Acopio de tuberías", "detalle": "" }, { "id": 48, "nombre": "Generador de mantenimiento", "detalle": "" }, { "id": 48, "nombre": "Otros", "detalle": "" }, { "id": 50, "nombre": "Slug catcher", "detalle": "" }, { "id": 50, "nombre": "Siemmens 2", "detalle": "" }, { "id": 50, "nombre": "Criogénicos", "detalle": "" }, { "id": 50, "nombre": "Seal gas", "detalle": "" }, { "id": 50, "nombre": "Flare", "detalle": "" }, { "id": 50, "nombre": "Generador de nitrógeno", "detalle": "" }, { "id": 50, "nombre": "Servicios auxiliares", "detalle": "" }, { "id": 50, "nombre": "Bombeo y almacenamiento ngl", "detalle": "" }, { "id": 50, "nombre": "Servicio b", "detalle": "" }, { "id": 50, "nombre": "Kod", "detalle": "" }, { "id": 50, "nombre": "Otros", "detalle": "" }, { "id": 51, "nombre": "Taller de electricidad e instr.", "detalle": "" }, { "id": 51, "nombre": "Taller de piping", "detalle": "" }, { "id": 52, "nombre": "Oficinas administrativas", "detalle": "" }, { "id": 52, "nombre": "Taller de mantenimiento de campamento", "detalle": "" }, { "id": 52, "nombre": "Carpas", "detalle": "" }, { "id": 52, "nombre": "Generador eléctrico", "detalle": "" }, { "id": 52, "nombre": "Otros", "detalle": "" }, { "id": 53, "nombre": "Almacenes", "detalle": "" }, { "id": 53, "nombre": "Laboratorio", "detalle": "" }, { "id": 53, "nombre": "Planta de concreto", "detalle": "" }, { "id": 53, "nombre": "Poza de concreto", "detalle": "" }, { "id": 53, "nombre": "Taller de fierrería", "detalle": "" }, { "id": 53, "nombre": "Punto de acopio de residuos", "detalle": "" }, { "id": 53, "nombre": "Otros", "detalle": "" }, { "id": 56, "nombre": "Nuevo flare", "detalle": "" }, { "id": 56, "nombre": "Colector", "detalle": "" }, { "id": 55, "nombre": "EB4", "detalle": "" }];

    const ACTO_SUBESTANDAR = "01";
    const CONDICION_SUBESTANDAR = "02";
    const ACTO_SEGURO = "03";
    const OBRAS_ELECTROMECANICA_VARIAS = 9;

    const SELECT = 1;
    const DATE = 2;
    const INPUT = 3;


    //Method to initialize every variables
    init();


    function init() {

        $("wrap_sucess").hide();
        $("wrap_load").hide();
        

        $("#box_observacion_detalle").hide();
        $("#box_otros").hide();
        $("#box_relacionado").hide();
        $("#box_tipo_epp").hide();
        $("#box_condicion_epp").hide();
        $("#box_puesto_observado").hide();
        $("#box_tiempo_trabajo").hide();
        $("#box_edad_observada").hide();
        $("#box_lesion").hide();
        $("#box_obstaculo").hide();
        $("#box_retroalimentacion").hide();
        $("#box_cambio").hide();
        $("#box_reincidente").hide();
        $("#box_breve_descripcion").hide();
        $("#box_medida_correctiva").hide();
        $("#box_potencial").hide();
        $("#box_responsable").hide();
    }

    $('#proyecto').on('change', function () {

        let proyecto = $('#proyecto').val();
        getListaArea(proyecto);

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

    $('#area').on('change', function () {

        let proyecto = $('#proyecto').val();
        let area = $('#area').val();
        getUbicacion(proyecto, area);
    });


    // Do a exception when you selected to OBRAS_ELECTROMECANICA_VARIAS
    // Show a list names while other proyects you show a input
    function getUbicacion(proyecto, area) {

        var htmlUbicacion = ``;

        if (proyecto == OBRAS_ELECTROMECANICA_VARIAS) {

            var listUbicacion = `<option value="" disabled selected hidden>Seleccionar ubicación</option>`;

            LISTA_UBICACION.forEach((data) => {
                if (data.id == area) {
                    listUbicacion += `<option value="${data.id}" > ${data.nombre} </option>`;
                }
            });

            htmlUbicacion = `                    
    
            <!--TITLE ELEMENT-->
            
            <div class="item_format">
                <label for="">Ubicación</label>
            </div>
            
            <!--CONTENT ELEMENT-->
            
            <div class="item_format">
                
                <select class="item_format_select" name="select_ubicacion" id="select_ubicacion">
                    ${listUbicacion}
                </select>

            </div>

            <!-- AGREGAMOS UN HIDDEN PARA GUARDAR EL NOMBRE DE LA UBICACION -->
            <input type="hidden" name="ubicacion" id="ubicacion">
            `;


        } else {

            htmlUbicacion = `                    
    
            <!--TITLE ELEMENT-->
            
            <div class="item_format">
                <label for="">Ubicación</label>
            </div>
            
            <!--CONTENT ELEMENT-->
            
            <div class="item_format">
                <input class="item_format_input" type="text" name="ubicacion" id="ubicacion">
            </div>
            
            `;

        }

        $("#box_ubicacion").html(htmlUbicacion);

        listenChangeUbicacion();
    }

    //Listen change in list ubicacion
    function listenChangeUbicacion() {

        $('#select_ubicacion').on('change', function () {

            var ubicacion = '';

            $("#select_ubicacion option:selected").each(function () {
                ubicacion += $(this).text() + " ";
            });

            $("#ubicacion").val(ubicacion);
        });
    }





    $('#observacion').on('change', function () {

        let observacion = $('#observacion').val();
        showBoxObservacion(observacion);
        getListObservacionDetail(observacion);
        observacionTitle(observacion);
        getListRelacionado(observacion);

    });

    function showBoxObservacion(observacion) {

        if (observacion == ACTO_SUBESTANDAR) {


            $("#box_observacion_detalle").show();
            $("#box_otros").hide();
            $("#box_relacionado").show();
            $("#box_tipo_epp").hide();
            $("#box_condicion_epp").hide();
            $("#box_puesto_observado").show();
            $("#box_tiempo_trabajo").show();
            $("#box_edad_observada").show();
            $("#box_lesion").show();
            $("#box_obstaculo").show();
            $("#box_retroalimentacion").show();
            $("#box_cambio").show();
            $("#box_reincidente").show();
            $("#box_breve_descripcion").show();
            $("#box_medida_correctiva").show();
            $("#box_potencial").show();
            $("#box_responsable").show();
        }
        if (observacion == CONDICION_SUBESTANDAR) {

            $("#box_observacion_detalle").show();
            $("#box_otros").hide();
            $("#box_relacionado").show();
            $("#box_tipo_epp").hide();
            $("#box_condicion_epp").hide();
            $("#box_puesto_observado").hide();
            $("#box_tiempo_trabajo").hide();
            $("#box_edad_observada").hide();
            $("#box_lesion").hide();
            $("#box_obstaculo").hide();
            $("#box_retroalimentacion").hide();
            $("#box_cambio").hide();
            $("#box_reincidente").hide();
            $("#box_breve_descripcion").show();
            $("#box_medida_correctiva").show();
            $("#box_potencial").show();
            $("#box_responsable").show();


        }
        if (observacion == ACTO_SEGURO) {

            $("#box_observacion_detalle").show();
            $("#box_otros").hide();
            $("#box_relacionado").hide();
            $("#box_tipo_epp").hide();
            $("#box_condicion_epp").hide();
            $("#box_puesto_observado").hide();
            $("#box_tiempo_trabajo").hide();
            $("#box_edad_observada").hide();
            $("#box_lesion").hide();
            $("#box_obstaculo").hide();
            $("#box_retroalimentacion").hide();
            $("#box_cambio").hide();
            $("#box_reincidente").hide();
            $("#box_breve_descripcion").show();
            $("#box_medida_correctiva").hide();
            $("#box_potencial").hide();
            $("#box_responsable").hide();

        }
    }

    function getListObservacionDetail(observacion) {

        var lista_selection = '<option value="" disabled selected hidden>Seleccionar observación detalle</option>';

        OBSERVACION_DETALLE.forEach((data) => {

            if (data.observacion == observacion) {

                lista_selection += `<option value="${data.codigo}"> ${data.nombre}</option>`;

            }
        });

        $('#observacion_detalle').html(lista_selection);

    }



    $('#observacion_detalle').on('change', function () {

        let observacion = $('#observacion').val();
        let observacionDetalle = $('#observacion_detalle').val();

        showInputOtros(observacion, observacionDetalle)

    });

    function showInputOtros(observacion, observacionDetalle) {

        if (
            (observacion == ACTO_SUBESTANDAR && observacionDetalle == "18") ||
            (observacion == CONDICION_SUBESTANDAR && observacionDetalle == "17") ||
            (observacion == ACTO_SEGURO && observacionDetalle == "08")
        ) {
            $("#box_otros").show();
        } else {
            $("#box_otros").hide();

        }
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

    function getListRelacionado(observacion) {

        var lista_selection = '<option value="" disabled selected hidden>Seleccionar</option>';

        RELACIONADO.forEach((data) => {

            if (observacion != ACTO_SEGURO) {
                $("#box_relacionado").show();
                lista_selection += `<option value="${data.codigo}"> ${data.nombre}</option>`;

            } else {
                $("#box_relacionado").hide();
            }
        });

        $('#relacionado').html(lista_selection);

    }

    $('#relacionado').on('change', function () {

        let observacion = $('#relacionado').val();

        if (observacion == 11) {
            $("#box_condicion_epp").show();
            $("#box_tipo_epp").show();
        } else {
            $("#box_condicion_epp").hide();
            $("#box_tipo_epp").hide();
        }

    });


    $('#fase').on('change', function () {

        let proyecto = $('#proyecto').val();
        let fase = $('#fase').val();

        console.log("prueba");
        console.log(proyecto);
        console.log(fase);

        if (proyecto == OBRAS_ELECTROMECANICA_VARIAS) {

            loadResponsableByFase(proyecto, fase);

        } else {

            loadResponsable(proyecto);
        }


    });



    function loadResponsableByFase(proyecto, fase) {

        var htmlDesplegable = `<option value="" disabled="" selected="" hidden="">Seleccionar</option>`;


        $.post(RUTA + 'responsable/listaReponsableByProyectoByFase', { idProyecto: proyecto, idFase: fase }, function (data, textStatus, xhr) {

            data.forEach((responsable) => {

                htmlDesplegable += `<option value="${responsable.dni}">${responsable.nombres}</option>`;

            });

            $("#responsable_accion").html(htmlDesplegable);


        }, "json");
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


    // PHOTO SECTION


    let fileInput = document.getElementById("file-input");
	let imageContainer = document.getElementById("images");


	$("#file-input").on("change",function(){
		console.log("prueba");
		preview();
	});

	function preview(){

		imageContainer.innerHTML = "";

		for (i of fileInput.files){
			let reader = new FileReader();
			let figure =document.createElement("figure");
			let figCap = document.createElement("figCaption");

			figCap.innerText = i.name;
			figure.appendChild(figCap);
			reader.onload= ()=> {
				let img = document.createElement("img");
				img.setAttribute("src",reader.result);
				figure.insertBefore(img,figCap);
			}
			imageContainer.appendChild(figure);
			reader.readAsDataURL(i);
		}

	}



    // SEND DOCUMENT

    $("#button_send_form").on('click', function (event) {
        event.preventDefault();

        console.log(answerValidateCampos());

        if(answerValidateCampos()){
            $("#formDigital").trigger('submit');
        }else{
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

        $.ajax({
            url: RUTA + 'top/guardarWebNew',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(data) {
                $(".wrap_load").hide();
                $(".wrap_sucess").show();

                if(data.state){
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
                }else{
                    $(".wrap_sucess").html(`No fue exitoso`);
                }

                goHome();
            }
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


    //Section validate campos

    function answerValidateCampos(){

        let listCampos = [{ "campo": "proyecto", "tipo": SELECT },
        { "campo": "area", "tipo": SELECT },
        { "campo": "fase", "tipo": SELECT },
        { "campo": "horario", "tipo": SELECT },
        { "campo": "fecha_registro", "tipo": DATE },
        { "campo": "observacion", "tipo": SELECT }];

        console.log($(`#observacion`).val());
        
        if($(`#observacion`).val() == ACTO_SUBESTANDAR){

            listCampos = listCampos.concat([
            { "campo": "observacion_detalle", "tipo": SELECT },
            { "campo": "relacionado", "tipo": SELECT },
            { "campo": "puesto_observado", "tipo": INPUT },
            { "campo": "tiempo_trabajo", "tipo": SELECT },
            { "campo": "edad_observada", "tipo": SELECT },
            { "campo": "breve_descripcion", "tipo": INPUT },
            { "campo": "medida_correctiva", "tipo": INPUT },
            { "campo": "potencial", "tipo": SELECT },
            { "campo": "responsable_accion", "tipo": SELECT },

            ]);


        }
        if($(`#observacion`).val() == CONDICION_SUBESTANDAR){
            listCampos = listCampos.concat([
            { "campo": "observacion_detalle", "tipo": SELECT },
            { "campo": "relacionado", "tipo": SELECT },
            { "campo": "breve_descripcion", "tipo": INPUT },
            { "campo": "medida_correctiva", "tipo": INPUT },
            { "campo": "potencial", "tipo": SELECT },
            { "campo": "responsable_accion", "tipo": SELECT },
    
            ]);
        }
        if($(`#observacion`).val() == ACTO_SEGURO){

            listCampos = listCampos.concat([
            { "campo": "observacion_detalle", "tipo": SELECT },
            { "campo": "breve_descripcion", "tipo": INPUT }
            ]);
        }

        console.log(listCampos);


        if(validateCampos(listCampos) > 0){
            return false;
        }else{
            return true;
        }
    }

    function validateCampos(listCampos) {
        let AMOUNT_EMPTY_CAMPOS = 0;

        listCampos.forEach((element) => {
            if (element.tipo == SELECT) {
                AMOUNT_EMPTY_CAMPOS +=  validateSelect(element.campo);
                changeClassErrorSelect(element.campo);
            }
            if (element.tipo == DATE) {
                AMOUNT_EMPTY_CAMPOS +=  validateDate(element.campo);
                changeClassErrorDate(element.campo);
            }
            if (element.tipo == INPUT) {
                AMOUNT_EMPTY_CAMPOS +=  validateInput(element.campo);
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