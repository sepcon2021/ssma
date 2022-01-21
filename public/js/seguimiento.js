$(document).ready(function () {

    var TOP = 1;
    var SEGURIDAD = 2;
    var INCIDENCIA = 3;
    var OPT = 4;
    var IPERC = 5;
    var RIESGOS_CRITICOS = 6;


    const ESTADO_ASIGNADO = 1;
    const ESTADO_ACEPTADO = 2;
    const ESTADO_PROCESO = 3;
    const ESTADO_FINALIZADO = 4;

    var listaEvidenciaGeneral = [];

    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));
    var DNI = data.result[0].dni;

    tabAsignado('');

    $('ul.tabs li a:first').addClass('active');
    $('.secciones article').hide();
    $('.secciones article:first').show();

    $('ul.tabs li a').click(function () {

        $('ul.tabs li a').removeClass('active');
        $(this).addClass('active');
        $('.secciones article').hide();

        var activeTab = $(this).attr('href');

        if (activeTab === "#tab1") {
            tabAsignado('')
        }
        if (activeTab === "#tab2") {
            tabProceso('')

        }
        if (activeTab === "#tab3") {
            tabFinalizado('');

        }
        if (activeTab === "#tab4") {
            tabArchivos('');
        }


        $(activeTab).show();
        return false;
    });





    /*
    __________________________________________________
    |                                                 |
    |                   ASIGNADO                      |
    |                                                 |
    |_________________________________________________|         

    */


    function tabAsignado(mensaje) {

        const ETIQUETA = "tab1";
        document.getElementById(ETIQUETA).innerHTML = "";


        $.ajax({
            type: 'POST',
            url: RUTA + 'seguimiento/listaAccionesPorEstado',
            data: { 'idEstado': ESTADO_ASIGNADO, 'dni': DNI }
        })
            .done(function (jsonAcciones) {
                createContenidoAccionAsignado(jsonAcciones, ETIQUETA, mensaje);
                editarAccionAsignado();
            });
    }

    function editarAccionAsignado() {

        $("#table_espera tr").on("click", function (event) {
            event.preventDefault();
            var idAccion = $(this).find('td').eq(0).text();
            detalleAccion(idAccion)

        });

    }

    function detalleAccion(idAccion) {
        $.ajax({
            type: 'POST',
            url: RUTA + 'seguimiento/detalleAccionPorDocumento',
            data: { 'idAccion': idAccion }
        })
            .done(function (jsonDetalleAccion) {

                let id = jsonDetalleAccion.contenido.detalleSeguimiento.id;
                let idTipoDocumento = jsonDetalleAccion.contenido.detalleSeguimiento.idtipodocumento;

                var htmlAccionDetalle = `
            <div class="contenidoAccion">
                <div class="contenidoCabecera">
                <img id="retroceder" src="public/img/leftarrow.png">
                </div>
                <div id="contenidoDocumento" class="contenidoDocumento">
                ${tipodocumento(id, idTipoDocumento)}
                </div> 
                <div id="contenidoRepuesta" class="contenidoRepuesta">
                        <button id="iniciar">Iniciar</button>
                        <button id="reasignar">Reasignar acción</button>
                </div>
            </div>
            `;

                document.getElementById("tab1").innerHTML = htmlAccionDetalle;

                botonesAccionDetalle(idAccion);
                botonDescargarContenido(jsonDetalleAccion)
            })
            .fail(function () {
                alert('Hubo un errror al cargar las listas_rep')
            });
    }

    function botonDescargarContenido(data) {
        $("#descargarContenido").on("click", function (event) {
            event.preventDefault();
            window.open(data.contenido.documento.url_pdf)
            return false;
        });

    }

    function botonesAccionDetalle(idAccion) {

        const IDESTADO = 2;


        $("#iniciar").on('click', function (event) {
            event.preventDefault();

            document.getElementById("contenidoDocumento").innerHTML = `<div class="load"> <div class="loader"></div></div>`;


            $.ajax({
                type: 'POST',
                url: RUTA + 'seguimiento/actualizarEstadoDocumento',
                data: { 'idEstado': IDESTADO, 'idSeguimiento': idAccion, dni: DNI }
            })
                .done(function (jsonDetalleAccion) {

                    tabAsignado('<div class="exito contenidoExitoStart"><h4>La acción n° ' + idAccion + ' inicio el proceso </h4></div>');

                })
                .fail(function () {
                    alert('Hubo un errror al cargar las listas_rep')
                });

        });


        $("#reasignar").on('click', function (event) {
            event.preventDefault();


            var htmlReasignar = `
            <br><br>
            <div> <h1>Seleccionar proyecto </h1><div>
            <br><br>
            <div>
            
                <select class="item_format_select" name="proyecto" id="proyecto">
                <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                <option value="1">WHCP 21</option>
                <option value="3">Pucallpa</option>
                <option value="4">Lurin</option>
                <option value="5">Lima</option>
                <option value="6">20PP03 L. Relaves Este / 00679</option>
                <option value="7">Full Flow flare - Shut dow</option>
                <option value="8">Sistema contra incendios</option>
                <option value="9">Obras Electromecánicas Varias</option>
                </select>

            </div>
            `;

            document.getElementById("contenidoDocumento").innerHTML = htmlReasignar;
            document.getElementById("contenidoRepuesta").innerHTML = `<button id="buscarPersonal"> Buscar personal </button> `;


            buscarPersonal(idAccion);

    
        });



        $("#retroceder").on('click', function (event) {
            event.preventDefault();
            tabAsignado('');

        });

    }

    function buscarPersonal(idAccion){

        $("#buscarPersonal").on('click', function (event) {

            let proyecto = $("#proyecto").val();

            document.getElementById("contenidoDocumento").innerHTML = `<div class="load"> <div class="loader"></div></div>`;

            $.ajax({
                type: 'POST',
                url: RUTA + 'responsable/listaReponsableByProyecto',
                data: {idProyecto : proyecto}
            })
                .done(function (jsonJefes) {

                    var htmlDesplegable = ``;

                    JSON.parse(jsonJefes).forEach((jefe) => {
                        htmlDesplegable += `<option value="${jefe.dni}">${jefe.nombres}     -       ${jefe.cargo}</option>`
                    });

                    var htmlReasignar = `
                    <br><br>
                    <div> <h1>Seleccionar a un personal </h1><div>
                    <br><br>
                    <div>
                    <select name="personal" id="personal">
                    `+ htmlDesplegable + `
                    </select>
                    </div>
                    `;

                    document.getElementById("contenidoDocumento").innerHTML = htmlReasignar;
                    document.getElementById("contenidoRepuesta").innerHTML = `<button id="enviarAsignacion"> Asignar </button> `;


                    reasignar(idAccion);

                })
                .fail(function () {
                    alert('Hubo un errror al cargar las listas_rep')
                });
        });


    }

    function reasignar(idAccion) {

        $("#enviarAsignacion").on('click', function (event) {

            event.preventDefault();

            var dni = $("#personal").val();

            $("#contenidoRepuesta").hide();

            document.getElementById("contenidoDocumento").innerHTML = `<div class="load"> <div class="loader"></div></div>`;


            $.ajax({
                type: 'POST',
                url: RUTA + 'seguimiento/reasignarSeguimiento',
                data: { 'dniPropietario': dni, 'idSeguimiento': idAccion }
            })
                .done(function (jsonReasignar) {

                    tabAsignado('<div class="exito contenidoExitoStart"> <h4>La acción n° ' + idAccion + ' fue reasignado con éxito </h4></div>');


                })
                .fail(function () {
                    alert('Hubo un errror al cargar las listas_rep')
                });


        });

    }





    /*
    __________________________________________________
    |                                                 |
    |                   PROCESO                       |
    |                                                 |
    |_________________________________________________|         

    */


    function tabProceso(mensaje) {

        listaEvidenciaGeneral = [];
        const ETIQUETA = "tab2";
        document.getElementById(ETIQUETA).innerHTML = "";

        $.ajax({
            type: 'POST',
            url: RUTA + 'seguimiento/listaAccionesPorEstadoProceso',
            data: { 'dni': DNI }
        })
            .done(function (jsonAcciones) {
                createContenidoAccionProceso(jsonAcciones, ETIQUETA, mensaje);
            });
    }


    function createContenidoAccionProceso(jsonAcciones, etiqueta, mensaje) {

        let listaAcciones = ` `;

        jsonAcciones.contenido.forEach(accion => {

            listaAcciones += `<tr class="active-row">
            <td>${accion.id}</td>
            <td>${accion.fecha}</td>
            <td>${accion.fecha_cumplimiento}</td>
            <td>${accion.nombreDocumento}</td>
            </tr>`;
        });

        document.getElementById(etiqueta).innerHTML = `
        <div>
            <div>${mensaje}</div>
            <table id="table_espera" class="styled-table">
                <thead>
                    <tr class="active-row">
                        <th>id</th>
                        <th>fecha </th>
                        <th>fecha cumplimiento</th>
                        <th>Nombre de documento </th>
                    </tr>
                </thead>
                <tbody>
                ${listaAcciones}
                </tbody>
            </table>
        </div> `;

        editarAccionProceso();

    }


    function editarAccionProceso() {

        $("#table_espera tr").on("click", function (event) {
            event.preventDefault();
            var idAccion = $(this).find('td').eq(0).text();
            detalleAccionProceso(idAccion)
        });

    }

    function detalleAccionProceso(idAccion) {
        $.ajax({
            type: 'POST',
            url: RUTA + 'seguimiento/detalleAccionPorDocumento',
            data: { 'idAccion': idAccion }
        })
            .done(function (jsonDetalleAccion) {


                document.getElementById("tab2").innerHTML = contenidoFormulario(jsonDetalleAccion);


                botonesAccionDetalleProceso(jsonDetalleAccion);

                if (jsonDetalleAccion.contenido.detalleSeguimiento.idestado == ESTADO_PROCESO) {
                    escucharCambiosFile();
                }
                botonDescargarContenido(jsonDetalleAccion);

            });
    }



    function contenidoFormulario(jsonDetalleAccion) {

        if (jsonDetalleAccion.contenido.detalleSeguimiento.idestado == ESTADO_ACEPTADO) {

            return contentAceptadoHtml(jsonDetalleAccion);
        }


        if (jsonDetalleAccion.contenido.detalleSeguimiento.idestado == ESTADO_PROCESO) {

            return contentProcessHtml(jsonDetalleAccion,``);
        }

    }

    function cantidadComentarios(data) {
        htmlPlaceholder = '';
        if (data.length == 0) {
            htmlPlaceholder = 'placeholder="Escribir un comentario aquí..."'
        }
        return htmlPlaceholder;
    }

    
    function contentAceptadoHtml(jsonDetalleAccion) {


        return `
        <div class="contenidoAccion">
            <div id="contenidoPrincipal">
                <div class="contenidoCabecera"><img id="retroceder" src="public/img/leftarrow.png"></div>
                <div id="notificacionExito"> </div>
                <div id="contenidoDocumento" class="contenidoDocumento">${tipodocumento(jsonDetalleAccion.contenido.detalleSeguimiento.id, jsonDetalleAccion.contenido.detalleSeguimiento.idtipodocumento)}</div>
                <div id="contenidoFormulario">
                    <form id="formularioFecha" enctype="multipart/form-data">
                        <div class="contenidoRepuestaStart"><h2>Acción propuesta</h2></div>
                        <div class="contenidoRepuestaStart"> <textarea  class="item_format_textarea" name="accion_propuesta"placeholder="Escribir un comentario aquí..."> </textarea></div>
                        <div class="contenidoRepuestaStart"><h2>Ingresar fecha de cumplimiento</h2></div>
                        <input type="hidden" name="idaccion" id="idaccion" value="${jsonDetalleAccion.contenido.detalleSeguimiento.id}" />
                        <div class="contenidoRepuestaStart"><input type="date" name="fecha" id="fecha" value="${jsonDetalleAccion.contenido.detalleSeguimiento.fecha_cumplimiento}" /></div>
                        <br><br>
                        <div  id="contenidoRepuesta" class="contenidoRepuesta"><button type="submit" name="submit" id="iniciarProceso">Iniciar proceso </button></div>
                    </form>
                </div>
            </div>
            <div class="loadProceso" id="loadProceso"></div>
        </div>
        `;

    }

    function contentProcessHtml(jsonDetalleAccion, updateHtml) {


        return `
                    <div class="contenidoAccion">
                        <div id="contenidoPrincipal">
                            <div class="contenidoCabecera"><img id="retroceder" src="public/img/leftarrow.png"></div>
                            <div id="notificacionExito"> ${updateHtml}</div>
                            <div id="contenidoDocumento" class="contenidoDocumento">${tipodocumento(jsonDetalleAccion.contenido.detalleSeguimiento.id, jsonDetalleAccion.contenido.detalleSeguimiento.idtipodocumento)}</div>
                            <div id="archivosCargados">
                                <br><br>
                                <div class="contenidoRepuestaStart">
                                    <h2>Detalles de seguimiento</h2>
                                </div>
                                <div class="contenidoRepuestaStart">
                                    <h4>Acción propuesta</h4>
                                </div>
                                <div class="contenidoRepuestaStart"> <textarea class="item_format_textarea"> ${jsonDetalleAccion.contenido.detalleSeguimiento.accion_propuesta} </textarea> </p>
                                </div>

                                <div class="contenidoRepuestaStart">
                                    <h4>Fecha de inicio</h4>
                                </div>
                                <div class="contenidoRepuestaStart"> 
                                    <input type="date" value="${(jsonDetalleAccion.contenido.detalleSeguimiento.fecha).split(" ")[0]}">
                                </div>
                                <div class="contenidoRepuestaStart">
                                    <h4>Fecha de cumplimiento</h4>
                                </div>
                                <div class="contenidoRepuestaStart"> 
                                    <input type="date" value="${jsonDetalleAccion.contenido.detalleSeguimiento.fecha_cumplimiento}">
                                </div>

                            </div>
                            <div id="contenidoFormulario">
                                <form id="formularioArchivo" enctype="multipart/form-data">
                                    <div class="contenidoRepuestaStart">
                                        <h1>Comentarios y evidencia</h1>
                                        </h1>
                                    </div>
                                    <input type="hidden" name="idaccion" id="idaccion"
                                        value="${jsonDetalleAccion.contenido.detalleSeguimiento.id}" />

                                    <div class="contenidoRepuestaStart">
                                        <textarea class="item_format_textarea" name="comentarios"
                                            ${cantidadComentarios(jsonDetalleAccion.contenido.detalleSeguimiento.comentario)} >${jsonDetalleAccion.contenido.detalleSeguimiento.comentario}</textarea>
                                    </div>

                                    <div class="contenidoRepuestaStart">
                                        <h4>Archivos</h4>
                                        </div>
                                        <div id="listaEvidencia">${listaEvidencia(jsonDetalleAccion.contenido.listaEvidencia)}</div>
                                    <br><br>

                                    <div class="box_format">
                                        <div class="item_format">
                                            <label for="">Evidencia
                                            </label>
                                        </div>
                                        <div class="item_format">
                                            <div class="container_photo">
                                                <input type="file" id="file-input" name="files[]" accept="image/png , image/jpeg" multiple>
                                                <label id="container_photo_label" for="file-input">Escoger archivos</label>
                                                <div id="images"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="contenidoRepuesta" class="contenidoRepuesta">
                                        <button class="subirArchivos" type="submit" name="submit" id="guardarArchivos">Guardar cambio</button>
                                        <button type="submit" id="finalizar">Finalizar acción</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="loadProceso" id="loadProceso"></div>
                    </div>
                    
                `;
    }


    function botonesAccionDetalleProceso(jsonDetalleAccion) {


        console.log(jsonDetalleAccion.contenido.detalleSeguimiento);

        let idAccion = jsonDetalleAccion.contenido.detalleSeguimiento.id;

        $("#iniciarProceso").on('click', function (event) {
            event.preventDefault();
            $("#contenidoPrincipal").hide();
            document.getElementById("loadProceso").innerHTML = `<div class="loader"></div>`;
            $("#formularioFecha").trigger('submit');
        });



        $("#formularioFecha").on('submit', function (event) {
            event.preventDefault();

            var formulario = $(this).serialize();
            var formulario = formulario + '&estado=' + ESTADO_PROCESO + '&dni=' + DNI;

            $.post(RUTA + 'seguimiento/actualizarFechaSeguimiento', formulario, function (response, textStatus, xhr) {

                if (response.status == 200) {

                    let htmlUpdate = `<div class="contenidoExitoStart exito"><h4>El contenido fue actualizado</h4></div>`;

                    jsonDetalleAccion.contenido.detalleSeguimiento.accion_propuesta = response.contenido.accionPropuesta;
                    jsonDetalleAccion.contenido.detalleSeguimiento.fecha_cumplimiento = response.contenido.fechaCumplimiento;
                    document.getElementById("tab2").innerHTML = contentProcessHtml(jsonDetalleAccion, htmlUpdate);
                }

                botonesAccionDetalleProceso(jsonDetalleAccion);
                escucharCambiosFile();

            }, 'json');

            return false;
        });



        $("#guardarArchivos").on('click', function (event) {
            event.preventDefault();
            $("#contenidoPrincipal").hide();
            document.getElementById("loadProceso").innerHTML = ` <div class="loader"></div>`;
            $("#formularioArchivo").trigger('submit');
        });



        $("#formularioArchivo").on('submit', function (event) {
            $.ajax({
                type: 'POST',
                url: RUTA + 'seguimiento/uploadFile',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {

                    let htmlUpdate = `<div class="contenidoExitoStart exito"><h4>El contenido fue actualizado</h4></div>`;

                    jsonDetalleAccion.contenido.listaEvidencia = response.contenido.listaEvidencia;
                    jsonDetalleAccion.contenido.detalleSeguimiento.comentario = response.contenido.comentario;
                    document.getElementById("tab2").innerHTML = contentProcessHtml(jsonDetalleAccion, htmlUpdate);


                    $("#formularioArchivo").trigger("reset");
                    $('#filename').html("");

                    botonesAccionDetalleProceso(jsonDetalleAccion);
                    escucharCambiosFile();

                }
            });

            return false;
        });




        $("#finalizar").on('click', function (event) {
            event.preventDefault();

            $("#contenidoPrincipal").hide();
            document.getElementById("loadProceso").innerHTML = ` <div class="loader"></div>`;

            $.ajax({
                type: 'POST',
                url: RUTA + 'seguimiento/actualizarEstadoDocumento',
                data: { 'idEstado': ESTADO_FINALIZADO, 'idSeguimiento': idAccion, dni: DNI }
            })
                .done(function (jsonDetalleAccion) {
                    tabProceso('<div class="exito contenidoExitoStart"><h4>La acción #' + idAccion + ' fue finalizado </h4></div>');
                });

        });


        $("#retroceder").on('click', function (event) {
            event.preventDefault();
            tabProceso('');
        });

    }




    function escucharCambiosFile() {
        $("#file-input").on("change", function () {

            let fileInput = document.getElementById("file-input");
            let imageContainer = document.getElementById("images");

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
        });
    }




    /*
    __________________________________________________
    |                                                 |
    |                   FINALIZADO                    |
    |                                                 |
    |_________________________________________________|         

    */


    function tabFinalizado(mensaje) {

        //const DNI = '45547517';
        const ETIQUETA = "tab3";

        document.getElementById(ETIQUETA).innerHTML = "";


        $.ajax({
            type: 'POST',
            url: RUTA + 'seguimiento/listaAccionesPorEstado',
            data: { 'idEstado': ESTADO_FINALIZADO, 'dni': DNI }
        })
            .done(function (jsonAcciones) {


                createContenidoAccionFinalizado(jsonAcciones, ETIQUETA, mensaje);

            })
            .fail(function () {
                alert('Hubo un errror al cargar las listas_rep')
            });
    }

    function createContenidoAccionFinalizado(jsonAcciones, etiqueta, mensaje) {

        var listaAcciones = ` `;

        if (jsonAcciones.status == 200) {

            jsonAcciones.contenido.forEach(accion => {
                listaAcciones += `<tr class="active-row">
                <td>`+ accion.id + `</td>
                <td>`+ accion.fecha + `</td>
                <td>`+ accion.fecha_cumplimiento + `</td>
                <td>`+ accion.nombreDocumento + `</td>
                </tr>`;

            });

        }

        var tableAcciones = `
        <div>
            <div>`+ mensaje + `</div>
            <table id="table_espera" class="styled-table">
                <thead>
                    <tr class="active-row">
                        <th>id</th>
                        <th>fecha </th>
                        <th>fecha cumplimiento</th>
                        <th>Nombre de documento </th>
                    </tr>
                </thead>
                <tbody>
                `+ listaAcciones + `
                </tbody>
            </table>
        </div> `;

        document.getElementById(etiqueta).innerHTML = tableAcciones;

        editarAccionFinalizado(etiqueta);


    }



    function editarAccionFinalizado(etiqueta) {

        $("#table_espera tr").on("click", function (event) {
            event.preventDefault();

            var idAccion = $(this).find('td').eq(0).text();

            detalleAccionFinalizado(idAccion, etiqueta)


        });

    }


    function detalleAccionFinalizado(idAccion, etiqueta) {
        $.ajax({
            type: 'POST',
            url: RUTA + 'seguimiento/detalleAccionPorDocumento',
            data: { 'idAccion': idAccion }
        })
            .done(function (jsonDetalleAccion) {

                document.getElementById(etiqueta).innerHTML = contenidoFinalizado(jsonDetalleAccion);
                pruebaAccordion();
                botonDescargarContenido(jsonDetalleAccion)

            })
            .fail(function () {
                alert('Hubo un errror al cargar las listas_rep')
            });
    }


    function contenidoFinalizado(jsonDetalleAccion) {


        return `
                    <div class="contenidoAccion">
                        <div id="contenidoPrincipal">
                            <div class="contenidoCabecera"><img id="retroceder" src="public/img/leftarrow.png"></div>
                            <div id="contenidoDocumento" class="contenidoDocumento">${tipodocumento(jsonDetalleAccion.contenido.detalleSeguimiento.id, jsonDetalleAccion.contenido.detalleSeguimiento.idtipodocumento)}</div>
                            <div id="archivosCargados">
                                <br><br>
                                <div class="contenidoRepuestaStart">
                                    <h2>Detalles de seguimiento</h2>
                                </div>
                                <div class="contenidoRepuestaStart">
                                    <h4>Acción propuesta</h4>
                                </div>
                                <div class="contenidoRepuestaStart"> <textarea class="item_format_textarea" readonly> ${jsonDetalleAccion.contenido.detalleSeguimiento.accion_propuesta} </textarea> </p>
                                </div>

                                <div class="contenidoRepuestaStart">
                                    <h4>Fecha de inicio</h4>
                                </div>
                                <div class="contenidoRepuestaStart"> 
                                    <input type="date" value="${(jsonDetalleAccion.contenido.detalleSeguimiento.fecha).split(" ")[0]}" readonly>
                                </div>
                                <div class="contenidoRepuestaStart">
                                    <h4>Fecha de cumplimiento</h4>
                                </div>
                                <div class="contenidoRepuestaStart"> 
                                    <input type="date" value="${jsonDetalleAccion.contenido.detalleSeguimiento.fecha_cumplimiento}" readonly>
                                </div>

                            </div>
                            <div id="contenidoFormulario">
                                <form id="formularioArchivo" enctype="multipart/form-data">
                                    <div class="contenidoRepuestaStart">
                                        <h1>Comentarios y evidencia</h1>
                                        </h1>
                                    </div>
                                    <input type="hidden" name="idaccion" id="idaccion"
                                        value="${jsonDetalleAccion.contenido.detalleSeguimiento.id}" readonly />

                                    <div class="contenidoRepuestaStart">
                                        <textarea class="item_format_textarea" name="comentarios"
                                            ${cantidadComentarios(jsonDetalleAccion.contenido.detalleSeguimiento.comentario)} readonly >${jsonDetalleAccion.contenido.detalleSeguimiento.comentario}</textarea>
                                    </div>

                                    <div class="contenidoRepuestaStart">
                                        <h4>Archivos</h4>
                                        </div>
                                        <div id="listaEvidencia">${listaEvidencia(jsonDetalleAccion.contenido.listaEvidencia)}</div>
                                    <br><br>


                                    <div class="contenidoRepuestaStart"> <h4>Seguimiento</h4> </div> 
                                    <br>
                                    <div>${listaEstados(jsonDetalleAccion.contenido.listaEstados)} </div>
                                    <br><br>
            
                                </form>
                            </div>
                        </div>


                    </div>
                    
                `;
    }



    function listaEvidencia(lista) {
        let listaTotal = '';
        lista.forEach(evidencia => {
            listaTotal += ('<div  class="contenidoRepuestaStart"><a href="' + RUTA + '/public/photos/' + evidencia + '" target="_blank" rel="noopener noreferrer" >' + evidencia + '</a> </div>');
            listaEvidenciaGeneral.push(evidencia);
        })

        return listaTotal;
    }



    function listaEstados(lista) {

        var listaTotal = ``;
        lista.forEach(estado => {
            listaTotal += (
                `<tr>
                <td>${estado.dni} </td>
                <td>${estado.estado} </td>
                <td>${estado.fecha}</td>
                </tr>`);
        })

       return `<table class="customizeTable">
                            <tbody>${listaTotal}</tbody>
                        </table>`;

    }




    function createContenidoAccionAsignado(jsonAcciones, etiqueta, mensaje) {

        var listaAcciones = ` `;

        if (jsonAcciones.status == 200) {

            jsonAcciones.contenido.forEach(accion => {
                listaAcciones += `<tr class="active-row">
                <td>`+ accion.id + `</td>
                <td>`+ accion.fecha + `</td>
                <td>`+ accion.nombreDocumento + `</td>
                </tr>`;

            });

        }

        var tableAcciones = `
        <div>
            <div>`+ mensaje + `</div>
            <table id="table_espera" class="styled-table">
                <thead>
                    <tr class="active-row">
                        <th>id</th>
                        <th>fecha</th>
                        <th>Nombre de documento </th>
                    </tr>
                </thead>
                <tbody>
                `+ listaAcciones + `
                </tbody>
            </table>
        </div> `;

        document.getElementById(etiqueta).innerHTML = tableAcciones;



    }



    /*
    __________________________________________________
    |                                                 |
    |                   COMUN CODE                    |
    |                                                 |
    |_________________________________________________|         

    */

    function tipodocumento(id, idTipoDocumento) {

        var html = '';

        if (idTipoDocumento == TOP) {
            html = htmlContenido('Top', id);
        } else if (idTipoDocumento == SEGURIDAD) {
            html = htmlContenido('Inspección planeada de seguridad', id);
        } else if (idTipoDocumento == INCIDENCIA) {
            html = htmlContenido('Reporte de incidencias', id);
        } else if (idTipoDocumento == OPT) {
            html = htmlContenido('Observación planeada de tarea (OPT)', id);
        } else if (idTipoDocumento == IPERC) {
            html = htmlContenido('Inspección de IPERC continuo', id);
        } else if (idTipoDocumento == RIESGOS_CRITICOS) {
            html = htmlContenido('Riesgos Críticos', id);
        }

        return html;
    }

    function htmlContenido(tituloDocumento, id) {

        return `
        <button id="accordion" class="accordion"><h2>${tituloDocumento} n° ${id}</h2></button>
        <div class="panel">
            <br><br>
            <div> <img id="descargarContenido" src="public/img/pdf.png"> </div>
        </div>`;


    }




});