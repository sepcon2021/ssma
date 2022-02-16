$(function () {


    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

    var nombres = data.result[0].nombres;
    var apellidos = data.result[0].apellidos;
    var usuario = data.result[0].internal;


    const SELECT = 1;
    const DATE = 2;
    const INPUT = 3;

    const TOP = 1;
    const SEGURIDAD = 2;
    const INSPECCION = 3;
    const OPT = 4;
    const IPERC = 5;
    const PTAR = 6;
    const GERENCIAL = 7;
    const SUSPENCION = 8;



    /*
    __________________________________________________
    |                                                 |
    |                   SEND DOCUMENT                 |
    |                                                 |
    |_________________________________________________|         

    */
    $(".button_find_report").on('click', function (event) {
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
            <div class="wrap_load_message"><p>Espere unos segundos </p></div>
        `);

        $(".wrap_load").show();

        let form = new FormData(this);
        let formJson = $(this).serializeArray();

        let tipoDocumento = formJson[0].value;
        let proyecto = getProyecto(formJson[1].value);


        $.ajax({
            url: RUTA + 'seguimiento/listaAccionDetalle',
            type: "POST",
            data: form,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                $(".wrap_load").hide();

                chooseTypeFormat(data, tipoDocumento, proyecto);
                downloadReport(formJson);
                goHome();

            }
        });


    });

    function chooseTypeFormat(data, typeDocument, proyecto) {

        let contentHTml = ``;

        if (typeDocument == TOP) {
            contentHTml = htmlTopReportSeguimiento(data, proyecto, 'Tops');
        } else if (typeDocument == SEGURIDAD) {
            contentHTml = htmlSeguridadSeguimiento(data, proyecto, 'Inspección planeada de seguridad');
        }


        $(".mainpage").html(contentHTml);

        detalle();

    }

    function downloadReport(formJson) {

        $("#button_report_download").on('click', function (event) {

            $(".container_reporte_content").hide();
            $(".container_reporte_load").html(`    
                <div class="wrap_load_container"><div class="loader"></div></div>
                <div class="wrap_load_message"><p>Espere unos segundos </p></div>
            `);

            $(".container_reporte_load").show();

            $.post(RUTA + 'seguimiento/downloadReport', {
                tipo_documento: formJson[0].value,
                proyecto: formJson[1].value
            }, function (data) {


                $(".container_reporte_load").hide();
                $(".container_reporte_content").show();

                event.preventDefault();
                window.location.href = data.result;
                goHome();

            }, "json");

        });
    }



    function goHome() {

        $(".home_reporte").on("click", function () {

            var result = confirm("¿Quieres volver al inicio?");

            if (result) {
                $.post(RUTA + 'seguimientodashboard/render', function (data, textStatus, xhr) {
                    $(".mainpage").html(data);
                });
            }

        });
    }




    /*
    __________________________________________________
    |                                                 |
    |                   SEGUIMIENTO                   |
    |                                                 |
    |_________________________________________________|         

    */

    function tipoDocumentoLogo(nombre) {

        var imgHtml = '';

        console.log(nombre);

        if (nombre.includes("pdf")) {
            imgHtml = 'src="public/img/pdf.png"'
        }
        if (nombre.includes("xlsx")) {
            imgHtml = 'src="public/img/excel.png"'
        }
        if (nombre.includes("docx")) {
            imgHtml = 'src="public/img/word.png"'
        }
        if (nombre.includes("jpg") || nombre.includes("png")) {
            imgHtml = 'src="public/photos/' + nombre + '"'
        }
        return imgHtml;

    }

    function evidenciaClick(lista) {
        var index = 1;
        lista.forEach(evidencia => {
            $("#" + index).on("click", function (event) {
                event.preventDefault();
                window.open(RUTA + '/public/file/' + evidencia.nombre)
                return false;
            });
            index++;
        });
    }


    // 1. CLICK SOBRE agregar observacion
    function detalle() {

        $("#table_espera").on("click", ".detalle", function (event) {
            event.preventDefault();

            var idSeguimiento = $(this).val();


            $.ajax({
                type: 'POST',
                url: RUTA + 'seguimiento/listaAccionDetalleById',
                data: { "idseguimiento": idSeguimiento }
            })
                .done(function (jsonSeguimientoDetalle) {

                    $("#popup-1").addClass("active");
                    $(".loader").hide();

                    contenidoPopUp(jsonSeguimientoDetalle.contenido[0]);

                })
                .fail(function () {
                    alert('Hubo un errror al cargar las listas_rep')
                });

            return false;
        })

        function contenidoPopUp(jsonSeguimientoDetalle) {

            console.log(jsonSeguimientoDetalle);

            $("#item").text('Item ' + jsonSeguimientoDetalle.id);
            //$("#hallazgo").text(jsonSeguimientoDetalle.hallazgo);
            $("#peligro_riesgo").text(jsonSeguimientoDetalle.peligroRiesgo);
            //$("#foto").text(jsonSeguimientoDetalle.foto);

            document.getElementById("foto").innerHTML = verificarFotoEvidencia(jsonSeguimientoDetalle.foto);
            $("#accion_propuesta").text(jsonSeguimientoDetalle.accionPropuesta);
            $("#responsable").text(jsonSeguimientoDetalle.responsable);
            $("#fecha_inicio").text(jsonSeguimientoDetalle.fechaInicio);
            $("#fecha_cumplimiento").text(jsonSeguimientoDetalle.fechaCumplimiento);
            $("#plazo").text(jsonSeguimientoDetalle.plazo);
            $("#frente_trabajo").text(jsonSeguimientoDetalle.frenteTrabajo);

            //$("#estado").text(jsonSeguimientoDetalle.estado);
            document.getElementById("estado").innerHTML = tipoEstado(jsonSeguimientoDetalle.estado);

            $("#comentario").text(jsonSeguimientoDetalle.comentario);

            document.getElementById("evidencia").innerHTML = tipodocumento(jsonSeguimientoDetalle.evidencia);


            var listaEstadosDetalle = ``;

            jsonSeguimientoDetalle.listaEstados.forEach(seguimientoDetalle => {

                listaEstadosDetalle += `<tr class="active-row">
                <td>`+ seguimientoDetalle.responsable + `</td>
                <td>`+ seguimientoDetalle.estado + `</td>
                <td>`+ seguimientoDetalle.fecha + `</td>
                </tr>`;

            });

            var tableEstados = `
                    <thead>
                        <tr class="active-row">
                            <th>Responsable</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                    `+ listaEstadosDetalle + `
                    </tbody>
                `;


            document.getElementById("tablaSeguimiento").innerHTML = tableEstados;

            botonDescargarContenido(jsonSeguimientoDetalle);

            evidenciaClick(jsonSeguimientoDetalle.evidencia);

        }

        // 8. Cerramos el popup
        $(".clickPopup-close").click(function (event) {
            event.preventDefault();

            $("#popup-1").removeClass("active");

            return false;

        });
    }

    function verificarFotoEvidencia(foto) {

        let listPhoto = foto.split(",")
        let htmlFoto = ``;
        let number = 1;

        listPhoto.forEach((photo) => {
            if (photo.length > 0) {
                htmlFoto = `<img class="fotoEvidencia" src="${RUTA}/public/photos/${photo}"  id="fotoEvidencia" >
                            <a href="${RUTA}/public/photos/${photo}" target="_blank" >evidencia${number} </a>
                `;
                number++;
            }

        });
        return htmlFoto;
    }


    function botonDescargarContenido(jsonSeguimientoDetalle) {

        $("#hallazgo").on("click", function (event) {
            event.preventDefault();
            window.open(jsonSeguimientoDetalle.hallazgo)
            return false;
        });

        $("#fotoEvidencia").on("click", function (event) {
            event.preventDefault();
            window.open(RUTA + '/public/photos/' + jsonSeguimientoDetalle.foto)
            return false;
        });

    }

    function tipoEstado(estado) {

        var htmlEstado = '';

        if (estado.trim() == "Asignado") {
            htmlEstado = '<div class="yellowEstado">' + estado + '</div>';
        }
        if (estado.trim() == "Aceptado" || estado == "Proceso") {
            htmlEstado = '<div class="greenEstado">' + estado + '</div>';
        }
        if (estado.trim() == "Finalizado") {
            htmlEstado = '<div class="redEstado">' + estado + '</div>';
        }


        return htmlEstado;
    }

    /*
    __________________________________________________
    |                                                 |
    |                   VALIDATE CAMPOS               |
    |                                                 |
    |_________________________________________________|         

    */


    function answerValidateCampos() {

        let listCampos = [
            { "campo": "tipo_documento", "tipo": SELECT },
            { "campo": "proyecto", "tipo": SELECT }];

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


    /*
__________________________________________________
|                                                 |
|                   VALIDATE CAMPOS               |
|                                                 |
|_________________________________________________|         

*/

    function getProyecto(id) {

        let result = '';
        const LISTA_PROYECTO2 = [{ "id": 1, "nombre": "WHCP 21", "detalle": "" }, { "id": 3, "nombre": "Pucallpa", "detalle": "" }, { "id": 4, "nombre": "Lurin", "detalle": "" }, { "id": 5, "nombre": "Lima", "detalle": "" }, { "id": 6, "nombre": "20PP03 L. Relaves Este / 00679", "detalle": "" }, { "id": 7, "nombre": "Full Flow flare - Shut dow", "detalle": "" }, { "id": 8, "nombre": "Sistema contra incendios", "detalle": "" }, { "id": 9, "nombre": "Obras Electromecánicas Varias", "detalle": "" }, { "id": 100, "nombre": "Todos los proyectos", "detalle": "" }];

        LISTA_PROYECTO2.forEach(proyecto => {
            if (proyecto.id == id) {
                result = proyecto.nombre;
            }
        });

        return result;
    }


    function tipodocumento(lista){
        var documentos =  ` `;
        var index = 1;
        lista.forEach(evidencia => {
            documentos += `<img class="fotoEvidencia2" id="`+index+`" `+tipoDocumentoLogo(evidencia.nombre)+`>`;
            index++;
        });

        return documentos;
    }


});