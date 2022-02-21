//
// $('#element').donetyping(callback[, timeout=1000])
// Fires callback when a user has finished typing. This is determined by the time elapsed
// since the last keystroke and timeout parameter or the blur event--whichever comes first.
//   @callback: function to be called when even triggers
//   @timeout:  (default=1000) timeout, in ms, to to wait before triggering event if not
//              caused by blur.
// Requires jQuery 1.7+
//
;
(function ($) {
    $.fn.extend({
        donetyping: function (callback, timeout) {
            timeout = timeout || 1e3; // 1 second default timeout
            var timeoutReference,
                doneTyping = function (el) {
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function (i, el) {
                var $el = $(el);
                // Chrome Fix (Use keyup over keypress to detect backspace)
                // thank you @palerdot
                $el.is(':input') && $el.on('keyup keypress paste', function (e) {
                    // This catches the backspace button in chrome, but also prevents
                    // the event from triggering too preemptively. Without this line,
                    // using tab/shift+tab will make the focused element fire the callback.
                    if (e.type == 'keyup' && e.keyCode != 8) return;

                    // Check if timeout has been set. If it has, "reset" the clock and
                    // start over again.
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function () {
                        // if we made it here, our timeout has elapsed. Fire the
                        // callback
                        doneTyping(el);
                    }, timeout);
                }).on('blur', function () {
                    // If we can, fire the event since we're leaving the field
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);

$(function () {


    var IDEXAMENEDITAR = sessionStorage.getItem('idExamenEditar');
    const NOMBRE_PROYECTO = sessionStorage.getItem('nombreProyecto');
    const CODIGO_PROYECTO = sessionStorage.getItem("codigoProyecto");


    $("#title_form").text(`Formulario  n°${IDEXAMENEDITAR}`);


    function listenContenidoCabecera() {

        $('#faseExamen').donetyping(function () {

            var fase = $('#faseExamen').val();


            $.post(RUTA + 'formulario/updateExamenFase', { fase: fase, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });


        $('#facilitadorExamen').donetyping(function () {

            var facilitador = $('#facilitadorExamen').val();


            $.post(RUTA + 'formulario/updateExamenFacilitador', { facilitador: facilitador, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });



        $('#clienteExamen').donetyping(function () {

            var cliente = $('#clienteExamen').val();


            $.post(RUTA + 'formulario/updateExamenCliente', { cliente: cliente, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });


        $('#fechaExamen').change(function () {

            var fecha = $('#fechaExamen').val();
            $.post(RUTA + 'formulario/updateExamenFecha', { fecha: fecha, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });


        $('#duracionExamen').change(function () {

            var duracion = $('#duracionExamen').val();

            $.post(RUTA + 'formulario/updateExamenDuracion', { duracion: duracion, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });


        $('#temaExamen').donetyping(function () {

            var tema = $('#temaExamen').val();

            $.post(RUTA + 'formulario/updateExamenTema', { tema: tema, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });




        $('#horaInicioExamen').change(function () {

            var horaInicio = $('#horaInicioExamen').val();

            $.post(RUTA + 'formulario/updateExamenHoraInicio', { horaInicio: horaInicio, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });



        $('#horaFinExamen').change(function () {

            var horaFin = $('#horaFinExamen').val();

            $.post(RUTA + 'formulario/updateExamenHoraFin', { horaFin: horaFin, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });


        $('#duracionProgramadaExamen').change(function () {

            var duracionProgramada = $('#duracionProgramadaExamen').val();

            $.post(RUTA + 'formulario/updateExamenDuracionProgramada', { duracionProgramada: duracionProgramada, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });



        $('#duracionEfectivaExamen').change(function () {

            var duracionEfectiva = $('#duracionEfectivaExamen').val();

            $.post(RUTA + 'formulario/updateExamenDuracionEfectiva', { duracionEfectiva: duracionEfectiva, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });


        $('#detalleExamen').donetyping(function () {

            var detalle = $('#detalleExamen').val();

            console.log(detalle);

            $.post(RUTA + 'formulario/updateExamenDetalle', { detalle: detalle, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });


        $('#idCurso').change(function () {

            var idCurso = $('#idCurso').val();


            $.post(RUTA + 'formulario/updateExamenIdCurso', { idCurso: idCurso, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });

        $('#idAreaCapacitacion').change(function () {

            var idAreaCapacitacion = $('#idAreaCapacitacion').val();


            $.post(RUTA + 'formulario/updateExamenIdAreaCapacitacion', { idAreaCapacitacion: idAreaCapacitacion, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });









        $('#notaExamen').change(function () {

            var nota = $('#notaExamen').val();

            $.post(RUTA + 'formulario/updateExamenNota', { nota: nota, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });



        $('#temarioA').donetyping(function () {

            var temarioA = $('#temarioA').val();

            $.post(RUTA + 'formulario/updateExamenTemarioA', { temarioA: temarioA, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });

        $('#temarioB').donetyping(function () {

            var temarioB = $('#temarioB').val();

            $.post(RUTA + 'formulario/updateExamenTemarioB', { temarioB: temarioB, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });

        $('#temarioB').donetyping(function () {

            var temarioB = $('#temarioB').val();

            $.post(RUTA + 'formulario/updateExamenTemarioB', { temarioB: temarioB, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });


        $('#observacion').donetyping(function () {

            var observacion = $('#observacion').val();

            $.post(RUTA + 'formulario/updateExamenObservacion', { observacion: observacion, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });


        $('#finalizo').change(function () {

            var finalizo = $('#finalizo').val();


            $.post(RUTA + 'formulario/updateExamenFinalizo', { finalizo: finalizo, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });

        $('#continuara').change(function () {

            var continuara = $('#continuara').val();


            $.post(RUTA + 'formulario/updateExamenContinuara', { continuara: continuara, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });




        $('#fechaContinuacion').change(function () {

            var fechaContinuacion = $('#fechaContinuacion').val();
            $.post(RUTA + 'formulario/updateExamenFechaContinuacion', { fechaContinuacion: fechaContinuacion, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });


        $('#idFirmaFacilitador').change(function () {

            var idFirmaFacilitador = $('#idFirmaFacilitador').val();

            $.post(RUTA + 'formulario/updateExamenFirmaFacilitador', { idFirmaFacilitador: idFirmaFacilitador, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json")

        });


        $('#enviarCorreo').change(function () {

            var enviarCorreo = $('#enviarCorreo').val();
    
    
            $.post(RUTA + 'formulario/updateEnviarCorreo', { enviarCorreo: enviarCorreo, id: IDEXAMENEDITAR }, function (data, textStatus, xhr) {
    
                if (data.status == 200) {
                    console.log(data.contenido);
                }
    
            }, "json");
    
        });
    
    }


    // Sección para traer contenido del examen


    var contenidoHtml = "";

    $.post(RUTA + 'formulario/listaPreguntaByIdExamen', { idExamen: IDEXAMENEDITAR }, function (data, textStatus, xhr) {

        if (data.status == 200) {


            $(".headerExamen").append(contenidoCabecera(data.contenido));


            contenidoHtml = crearHtmlPregunta(data.contenido);
            $("#listaPreguntas").append(contenidoHtml);


            escucharCambiosPregunta();

            eliminarPregunta();

            iterarListaPreguntasEventos(data.contenido);


            listaFirmaFacilitador(data.contenido);

            popUp();

            listenContenidoCabecera();
             
            downloadFile();


        }


    }, "json");



    function iterarListaPreguntasEventos(examen) {


        examen.listaPreguntas.forEach(pregunta => {

            escucharCambiosAlternativa(pregunta.id);

            agregarHtmlAlternativa(pregunta.id);

        });
    }


    function crearHtmlPregunta(examen) {

        var htmlPregunta = "";


        examen.listaPreguntas.forEach(pregunta => {

            htmlPregunta += contenidoPregunta(pregunta);



        });



        return htmlPregunta;
    }

    function contenidoCabecera(examen) {

        return `
 
        
    <div class="item_format">
    <a href="" class="download buttonPdf"> Registro de Asistencia</a>
    <a href="" class="download descargarNotasExcel"> Notas</a>
    <!-- <a href="" class="download buttonDuplicar"> Duplicar</a> -->
    <a href="" class="download buttonEliminar"> Eliminar </a>
</div>

<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Tema</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="text" name="tema" id="temaExamen" value="`+ examen.tema + `">
</div>
</div>



<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Fase</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="text" name="fase" id="faseExamen" value="`+ examen.fase + `">
</div>
</div>

<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Facilitador</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="text" name="facilitador" id="facilitadorExamen" value="`+ examen.facilitador + `">
</div>
</div>

<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Cliente</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="text" name="cliente" id="clienteExamen" value="`+ examen.cliente + `">
</div>
</div>


<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Fecha</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" name="fecha" value="`+ examen.fecha + `" id="fechaExamen">

</div>
</div>


<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Duración</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="number" name="duracion" id="duracionExamen" class="w5p" value="`+ examen.duracion + `">
</div>
</div>


<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Hora inicio</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="time" name="horaInicio" value="`+ examen.horaInicio + `" id="horaInicioExamen">
</div>
</div>

<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Hora fin</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="time" name="horaFin" value="`+ examen.horaFin + `" id="horaFinExamen">
</div>
</div>


<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Duración programada</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="number" name="duracionProgramada" id="duracionProgramadaExamen"
    value="`+ examen.duracionProgramada + `">
</div>
</div>

<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Duración efectiva</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="number" name="duracionEfectiva" id="duracionEfectivaExamen" value="`+ examen.duracionEfectiva + `">
</div>
</div>


<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="">Duración efectiva</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="number" name="duracionEfectiva" id="duracionEfectivaExamen" value="`+ examen.duracionEfectiva + `">
</div>
</div>



<div class="box_format">
<!--TITLE ELEMENT-->
<div class="item_format">
    <label for="">Curso</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <select class="item_format_select" name="idCurso" id="idCurso">
        <option value="1"> Escoger curso</option>
        <option value="2" `+ isSelectValue(value=2, examen.idCurso) + `> Curso audio visual</option>
        <option value="3" `+ isSelectValue(value=3, examen.idCurso) + `> Curso oral</option>
        <option value="4" `+ isSelectValue(value=4, examen.idCurso) + `> Curso teórico</option>
        <option value="5" `+ isSelectValue(value=5, examen.idCurso) + `> Curso práctico</option>
    </select>
</div>

</div>

<div class="box_format">
<!--TITLE ELEMENT-->
<div class="item_format">
    <label for="">Área de capacitación</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <select class="item_format_select" name="idAreaCapacitacion" id="idAreaCapacitacion">
        <option value="1"> Escoger area de capacitacion</option>
        <option value="2" `+ isSelectValue(value=2, examen.idAreaCapacitacion) + `> Seguridad</option>
        <option value="3" `+ isSelectValue(value=3, examen.idAreaCapacitacion) + `> Medio ambiente</option>
        <option value="4" `+ isSelectValue(value=4, examen.idAreaCapacitacion) + `> Otros</option>
        <option value="5" `+ isSelectValue(value=5, examen.idAreaCapacitacion) + `> Salud</option>
        <option value="6" `+ isSelectValue(value=6, examen.idAreaCapacitacion) + `> Calidad</option>
    </select>
</div>

</div>




<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label>Nota aprobatoria</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="number" name="nota" id="notaExamen" value="`+ examen.nota + `">
</div>
</div>


<div class="box_format">
<!--TITLE ELEMENT-->
<div class="item_format">
    <label>Temario</label>
</div>
</div>

<div class="box_format">
<!--CONTENT ELEMENT-->
<div class="item_format">
    <p>a)</p><input class="item_format_input" type="text" name="temarioA" id="temarioA" value="`+ examen.temarioA + `">
</div>
</div>

<div class="box_format">
<!--CONTENT ELEMENT-->
<div class="item_format">
    <p>b)</p><input class="item_format_input" type="text" name="temarioB" id="temarioB" value="`+ examen.temarioB + `">
</div>
</div>


<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label>Observación</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="text" name="observacion" id="observacion" value="`+ examen.observacion + `">
</div>
</div>


<div class="box_format">
<!--TITLE ELEMENT-->
<div class="item_format">
    <label> ¿Finalizo?</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <select class="item_format_select"  name="finalizo" id="finalizo">
        <option value="0" `+ isSelectValue(value=0, examen.finalizo) + `>No</option>
        <option value="1" `+ isSelectValue(value=1, examen.finalizo) + `>Si</option>
    </select>
</div>

</div>


<div class="box_format">
<!--TITLE ELEMENT-->
<div class="item_format">
    <label> ¿Continuara?</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <select class="item_format_select"  name="continuara" id="continuara">
        <option value="0" `+ isSelectValue(value=0, examen.continuara) + `>No</option>
        <option value="1" `+ isSelectValue(value=1, examen.continuara) + `>Si</option>
    </select>
</div>

</div>


<div class="box_format">
<!--TITLE ELEMENT-->

<div class="item_format">
    <label for="titulo">Fecha de continuación</label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <input class="item_format_input" type="date" name="fechaContinuacion" value="`+ examen.fechaContinuacion + `" id="fechaContinuacion">
</div>
</div>



<div class="box_format">
<!--TITLE ELEMENT-->
<div class="item_format">
    <label>Firma del facilitador </label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
<select class="item_format_select"  name="idFirmaFacilitador" id="idFirmaFacilitador"></select>
</div>

</div>


<div class="box_format">
<!--CONTENT ELEMENT-->
<div class="item_format">
    <button class="buttonAdd" id="addRowObs">Agregar firma </button>    </div>

</div>



<div class="box_format">
<!--TITLE ELEMENT-->
<div class="item_format">
    <label> Enviar correo </label>
</div>

<!--CONTENT ELEMENT-->
<div class="item_format">
    <select class="item_format_select"  name="enviarCorreo" id="enviarCorreo">
        <option value="0" `+ isSelectValue(value=0, examen.correo) + `>No</option>
        <option value="1" `+ isSelectValue(value=1, examen.correo) + `>Si</option>
    </select>
</div>

</div>

        `;


    }

    function contenidoPregunta(pregunta) {
        return `
        <div class="contenido"> <div class="bordes">  <div class="pregunta" idpregunta="${pregunta.id}" id="${pregunta.id}">
        <div class="contenidoFinish"><button class="eliminar" idpregunta="${pregunta.id}" id="buttonEliminar${pregunta.id}"> <img class="iconoEliminar" src="public/img/cancel.png" >  </button> </div>
        <!-- <div> <label >Titulo</label> </div> -->
        <div class="item_format" ><input placeholder="Contenido de la pregunta"type="text" class="titulos" idpregunta="${pregunta.id}" name="titulo" id="titulo${pregunta.id}" value="${pregunta.nombre}"> </div>
        <br>
        

        ${tipoAlternativaHtml(pregunta)}
        </div> </div></div>
        `;

    }

    
    function tipoAlternativaHtml(pregunta) {

        var ALTERNATIVA = 1;
        var RESPUESTA = 2;

        var htmlAlternativa = ``;

        if(pregunta.idtipopregunta == ALTERNATIVA){

            htmlAlternativa = `

            <div class="item_format"> 
             <button class="agregarAlternativa" id="buttonAgregarAlternativa${pregunta.id}"> Alternativa</button> 
            </div>
            <br><br> 
            <div id="listaAlternativa${pregunta.id}"> 
            ${crearHtmlAlternativa(pregunta)}
            </div> 
 
            <br><br> 

            <div class="item_format">
            <label for="puntaje">puntaje</label> 
            </div>
            <div class="item_format">
            <input type="number" class="puntaje" idpregunta="${pregunta.id}" name="puntaje" id="puntaje${pregunta.id}" value="${pregunta.puntaje}"> 
            </div>

            <br>   
            <div> 


            </div> `;

        }
        if(pregunta.idtipopregunta ==  RESPUESTA){
            htmlAlternativa =  `
            <div> <textarea class="comentario" placeholder="Comentarios" readonly></textarea> </div>`;
        }
        return htmlAlternativa;
    }

    function crearHtmlAlternativa(pregunta) {
        var htmlAlternativa = "";


        pregunta.alternativa.forEach(alternativa => {


            htmlAlternativa += contenidoAlternativa(alternativa, pregunta);

        });


        return htmlAlternativa;
    }

    function contenidoAlternativa(alternativa, pregunta) {

        return ' <div class="boxAlternativa item_format" id="boxAlternativa' + alternativa.id + '"> ' +

            '<input class="radioRespuesta" type="radio" name="radio' + pregunta.id + '" id="radio' + alternativa.id + '"  idalternativa="' + alternativa.id + '" value="' + alternativa.id + '"  ' + contenidoCheckAvalaible(alternativa.respuesta) + ' > ' +

            '<input placeholder="contenido alternativa" name="alternativa" idpregunta="' + pregunta.id + '" class="alternativa" type="text" idalternativa="' + alternativa.id + '"  id="alternativa' + alternativa.id + '"  value="' + alternativa.nombre + '"  > ' +
            '<button  class="buttonEliminarAlternativa" idalternativa="' + alternativa.id + '" id="buttonEliminar' + alternativa.id + '"> <img class="iconoEliminarAlternativa" src="public/img/cancel.png" > </button> </div>';

    }

    function contenidoCheckAvalaible(respuesta) {

        var contenido = '';

        if (respuesta == 1) {
            contenido = 'checked';
        }

        return contenido;
    }






    // Sección de preguntas 



    $("#buttonAgregarPregunta").on('click', function (event) {
        event.preventDefault();

        var ary = [];

        ary.push({
            nombre: 'Contenido de la pregunta',
            respuesta: 1,
            puntaje: 20,
            idExamen: IDEXAMENEDITAR
        });

        INFO = new FormData();
        aInfo = JSON.stringify(ary);

        $.post(RUTA + 'formulario/insertPregunta', { data: aInfo }, function (data, textStatus, xhr) {

            if (data.status == 200) {

                var contenido =
                `<div class="contenido">
                <div class="bordes">
                    <div class="pregunta" idpregunta="${data.contenido}" id="${data.contenido}">
                        <div class="contenidoFinish"> <button class="eliminar" idpregunta="${data.contenido}" id="buttonEliminar${data.contenido}"> <img class="iconoEliminar" src="public/img/cancel.png" > </button> </div>
                        <br><br>
                        <div class="contenidoFinish">
                            <select name="tipopregunta" id="tipopregunta${data.contenido}">
                                <option value="1">Alternativa</option>
                                <option value="2">Respuesta</option>
                            </select>
                        </div>
                        <div class="item_format">
                        
                        <input placeholder="Contenido de la pregunta" type="text" class="titulos" idpregunta="${data.contenido}" name="titulo"
                            id="titulo${data.contenido}">
                            </div>

                        <br>
                        <div id="tipoContenidoHtml${data.contenido}">
                            <br>
                            <div>
                                <div class="item_format">
                                    <button class="agregarAlternativa" id="buttonAgregarAlternativa${data.contenido}">alternativa</button>
                                </div>
                                <br><br>
                                <div id="listaAlternativa${data.contenido}">
                                </div>
                            </div>
                            <br><br>

                                <div class="item_format">
                                <label for="puntaje">puntaje</label> 
                                </div>
                                <div class="item_format">
                                <input type="number" class="puntaje" idpregunta="${data.contenido}" name="puntaje"
                                id="puntaje${data.contenido}">
                                </div>


                        </div>
                    </div>
                </div>
            </div>`;


                document.getElementById("listaPreguntas").insertAdjacentHTML('beforeend', contenido);

                cambiarTipoPregunta(data);

            }
            escucharCambiosPregunta();

            eliminarPregunta();

            agregarHtmlAlternativa(data.contenido);


        }, "json");



        return false;



    });

    function cambiarTipoPregunta(dataPregunta) {

        var ALTERNATIVA = 1;
        var RESPUESTA = 2;

        $('#tipopregunta'+dataPregunta.contenido).on('change', function (event) {
            event.preventDefault();
            var htmlBody = ``;
            var codigoPregunta = $(this).val();
            console.log(codigoPregunta);

            if(codigoPregunta == ALTERNATIVA){


                $.post(RUTA + 'formulario/updatePreguntaTipo', { idtipopregunta: ALTERNATIVA, idPregunta: dataPregunta.contenido }, function (data, textStatus, xhr) {

                    if (data.status == 200) {
                        htmlBody = htmlAlternativaBody(dataPregunta);
                        document.getElementById("tipoContenidoHtml" + dataPregunta.contenido).innerHTML = htmlBody;
                        agregarHtmlAlternativa(dataPregunta.contenido);
                        eliminarPregunta();

                    }

                }, "json");


            }
            if(codigoPregunta ==  RESPUESTA){

                $.post(RUTA + 'formulario/updatePreguntaTipo', { idtipopregunta: RESPUESTA, idPregunta: dataPregunta.contenido }, function (data, textStatus, xhr) {

                    if (data.status == 200) {
                        htmlBody =  htmlTextoBody(dataPregunta);
                        document.getElementById("tipoContenidoHtml"+dataPregunta.contenido).innerHTML = htmlBody;
                        eliminarPregunta();
        
                    }

                }, "json");


            }


        });
    }

    function htmlAlternativaBody(data){

        return `
        <br> 
        <br> 
        <div> 
        <div class="item_format"> 
         <button class="agregarAlternativa" id="buttonAgregarAlternativa${data.contenido}">alternativa</button> 
        </div> 
        <br><br> 

        <div id="listaAlternativa${data.contenido}"> 
        </div> 
        <br> 
        <br> 
        <div class="item_format">
        <label for="puntaje">puntaje</label> 

        </div>

        <div class="item_format">
        <input type="number" class="puntaje" idpregunta="${data.contenido}" name="puntaje" id="puntaje${data.contenido}"> 

        </div>


        <br> 

        </div> `;
    }
    function htmlTextoBody(data){
        return `
        <textarea class="comentario" placeholder="Comentarios" readonly></textarea> `;
    }



    function eliminarPregunta() {
        $("#listaPreguntas div.pregunta button.eliminar").on('click', function (event) {
            event.preventDefault();


            var idPregunta = $(this).attr('idpregunta');

            $.post(RUTA + 'formulario/eliminarPregunta', { idPregunta: idPregunta }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                    document.getElementById(idPregunta).innerHTML = "";
                }

            }, "json");

            return false;


        });
    }


    function escucharCambiosPregunta() {
        $("#listaPreguntas div.pregunta input.titulos").on('click', function (event) {
            event.preventDefault();


            enviarUpdateTitulo($(this).attr('idpregunta'));

            return false;


        });


        $("#listaPreguntas div.pregunta input.puntaje").on('click', function (event) {
            event.preventDefault();

            enviarUpdatePuntaje($(this).attr('idpregunta'));

            return false;


        });




    }


    function enviarUpdateTitulo(idPregunta) {

        $('#titulo' + idPregunta).donetyping(function () {

            var nombre = $('#titulo' + idPregunta).val();

            $.post(RUTA + 'formulario/updatePreguntaNombre', { nombre: nombre, idPregunta: idPregunta }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });

    }



    function enviarUpdatePuntaje(idPregunta) {

        $('#puntaje' + idPregunta).donetyping(function () {

            var puntaje = $('#puntaje' + idPregunta).val();

            $.post(RUTA + 'formulario/updatePreguntaPuntaje', { puntaje: puntaje, idPregunta: idPregunta }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");
        });

    }


    // Sección alternativa


    function agregarHtmlAlternativa(idPregunta) {

        $("#buttonAgregarAlternativa" + idPregunta).on('click', function (event) {
            event.preventDefault();


            $.post(RUTA + 'formulario/insertAlternativa', { idPregunta: idPregunta, index: 1 }, function (data, textStatus, xhr) {

                if (data.status == 200) {

                    var contenido = ' <div class="item_format" id="boxAlternativa' + data.contenido + '"> ' +

                        '<input class="radioRespuesta" type="radio" name="radio' + idPregunta + '" id="radio' + data.contenido + '"  idalternativa="' + data.contenido + '" value="' + data.contenido + '"  > ' +

                        '<input name="alternativa" idpregunta="' + idPregunta + '" class="alternativa" type="text" idalternativa="' + data.contenido + '"  id="alternativa' + data.contenido + '" > ' +
                        '<button class="buttonEliminarAlternativa" idalternativa="' + data.contenido + '" id="buttonEliminar' + data.contenido + '"> X </button> </div>';

                    document.getElementById("listaAlternativa" + idPregunta).insertAdjacentHTML('beforeend', contenido);
                }


                escucharCambiosAlternativa(idPregunta)

            }, "json");


            return false;
        });
    }




    function escucharCambiosAlternativa(idPregunta) {

        var etiqueta = "#listaAlternativa" + idPregunta + " input.alternativa";


        $(etiqueta).on('click', function (event) {
            event.preventDefault();

            enviarUpdateAlternativa($(this).attr('idalternativa'));

            return false;


        });


        var etiquetaButton = "#listaAlternativa" + idPregunta + " button.buttonEliminarAlternativa";

        $(etiquetaButton).on('click', function (event) {
            event.preventDefault();

            eliminarAlternativa($(this).attr('idalternativa'));

            return false;


        });


        var etiquetaRadio = 'input[type=radio][name=radio' + idPregunta + ']';

        $(etiquetaRadio).change(function () {
            console.log(idPregunta);

            var idAlternativa = this.value;

            updateRepuestaCorrecta(idAlternativa, idPregunta)

        });


    }

    function enviarUpdateAlternativa(idAlternativa) {

        $('#alternativa' + idAlternativa).donetyping(function () {


            var nombre = $('#alternativa' + idAlternativa).val();

            $.post(RUTA + 'formulario/updateAlternativaNombre', { idAlternativa: idAlternativa, nombre: nombre }, function (data, textStatus, xhr) {

                if (data.status == 200) {
                    console.log(data.contenido);
                }

            }, "json");

        });
    }



    function eliminarAlternativa(idAlternativa) {

        $.post(RUTA + 'formulario/eliminarAlternativa', { idAlternativa: idAlternativa }, function (data, textStatus, xhr) {

            if (data.status == 200) {
                console.log(data.contenido);
                document.getElementById("boxAlternativa" + idAlternativa).innerHTML = "";
            }

        }, "json");


    }


    function updateRepuestaCorrecta(idAlternativa, idPregunta) {

        /*$.post(RUTA + 'formulario/updatePreguntaRespuesta', { respuesta: idAlternativa, idPregunta: idPregunta }, function (data, textStatus, xhr) {

            if (data.status == 200) {
                console.log(data.contenido);
            }

        }, "json");*/


        
        $.post(RUTA + 'formulario/updateAlternativaRespuesta', { idAlternativa: idAlternativa , idPregunta: idPregunta }, function (data, textStatus, xhr) {

            if (data.status == 200) {
                console.log(data.contenido);
            }

        }, "json");
    }



    function isSelectValue(valueProyecto, selectValue) {

        var resultado = "";

        if (valueProyecto == selectValue) {
            resultado = "selected";
        }

        return resultado;

    }

    function isFinalizado(value, idExamenFinalizado) {

    }



    $("#buttonVistaPrevia").on("click", function (event) {
        event.preventDefault();
        sessionStorage.setItem("idExamen", IDEXAMENEDITAR);
        window.open(RUTA + "vistaprevia")

    });

    $("#buttonInicio").on("click", function (event) {
        event.preventDefault();
        sessionStorage.setItem("idExamen", IDEXAMENEDITAR);
        window.location.href = RUTA + "administrador";

    });




    function downloadFile() {


        $(".buttonPdf").on("click", function (event) {
            event.preventDefault();

            $.post(RUTA + "evaluaciones/generatePDFByIdExamen", { idExamen: IDEXAMENEDITAR },
                function (data, textStatus, jqXHR) {


                    console.log(data.contenido);

                    if (data.status == 200) {

                        event.preventDefault();
                        window.open(data.contenido)

                    }

                },
                "json"

            )

            return false;

        });



        $(".descargarNotasExcel").on("click", function (event) {
            event.preventDefault();

            $.post(RUTA + "evaluaciones/listaNotas", { idExamen: IDEXAMENEDITAR, codigoProyecto: CODIGO_PROYECTO },
                function (data, textStatus, jqXHR) {


                    console.log(data.contenido);

                    if (data.status == 200) {

                        event.preventDefault();
                        window.open(data.contenido)

                    }

                },
                "json"

            )

            return false;

        });



        $(".buttonEliminar").on("click", function (event) {
            event.preventDefault();

            $.post(RUTA + "formulario/eliminarExamen", { idExamen: IDEXAMENEDITAR },
                function (data, textStatus, jqXHR) {

                    console.log(data.contenido);

                    if (data.status == 200) {

                        event.preventDefault();
                        window.location.href = RUTA + "administrador";

                    }

                },
                "json"

            )

            return false;

        });

    }

    function listaFirmaFacilitador(examen) {

        var contenidoFirmaFacilitador = ` `;

        $.post(RUTA + 'formulario/getListaFirmaFacilitador', {}, function (data, textStatus, xhr) {

            console.log(data);

            if (data.status == 200) {

                data.contenido.forEach(firma => {

                    contenidoFirmaFacilitador += `<option value="` + firma.id + `"  ` + isChecked(firma.id, examen.idFirmaFacilitador) + `>` + firma.nombre + `</option> `;

                });

                $('#idFirmaFacilitador').append(contenidoFirmaFacilitador);

            } else {
                contenidoFirmaFacilitador = `<option value="10000"> No contamos con firmas disponibles</option> `;
                $('#idFirmaFacilitador').append(contenidoFirmaFacilitador);

            }
        }, "json");

    }


    function isChecked(idFirma, idFirmaFacilitador) {

        var value = '';

        if (idFirma == idFirmaFacilitador) {
            value = 'selected="selected"';
        }

        return value;
    }


    function popUp() {



        //Abrimos el pop up
        $('#addRowObs').on('click', function (event) {
            event.preventDefault();
            $("#popup-1").addClass("active");
            $(".loader").hide();

            return false;

        })



        //Cerramos el popup
        $(".clickPopup-close").click(function (event) {
            event.preventDefault();

            $("#popup-1").removeClass("active");
            $("#examen").trigger("reset");

        });

        //Cerramos el popup
        $(".overlay").click(function (event) {
            event.preventDefault();

            $("#popup-1").removeClass("active");
            $("#examen").trigger("reset");

        });

        //Guardamos la firma en el servidor
        $("#btnRegisterFirma").click(function (event) {

            event.preventDefault();

            $("#examen").hide();
            $("#boxLoad").append('<div class="loader"></div>')

            var firmaTrabajador = document.getElementById("firma");

            $.post('public/inc/upload-sing.inc.php', { img: firmaTrabajador.toDataURL() }, function (data) {

                $('#urlImagen').val(data);

                $("#examen").trigger('submit');


            });

        });

        //enviar formulario
        $("#examen").on('submit', function (event) {
            event.preventDefault();

            var formulario = $(this).serialize();

            $.post(RUTA + 'formulario/insertFirmaFacilitador', formulario, function (data) {

                var htmlOpcion = 0;
                $("#boxLoad").hide();


                if (data.status == 200) {


                    $("#respuesta").append('<div> <h2>La firma fue subido con éxito</h2> <br>  <button class="buttonFirmar button-upload"> Volver a firmar </button>  <button class="buttonDeletePopup clickPopup-close" type="submit" id="btnUpdateDocumento">Cerrar</button>  </div>');

                    htmlOpcion = `<option value=" ` + data.contenido.id + `">` + data.contenido.nombreFacilitador + `</option> `;

                } else {

                    $("#respuesta").append('<div> <h2>Volver a intentarlo</h2> <br> <button class="buttonFirmar button-upload"> Volver a firmar </button>  <button class="buttonDeletePopup clickPopup-close" type="submit" id="btnUpdateDocumento">Cerrar</button> </div>');

                }

                $('#idFirmaFacilitador').append(htmlOpcion);
                buttonFirmar();

            });


            return false;
        });


    }


    function buttonFirmar() {
        //Guardamos la firma en el servidor
        $(".buttonFirmar").click(function (event) {

            event.preventDefault();
            $("#examen").trigger("reset");

            document.getElementById("respuesta").innerHTML = "";
            document.getElementById("boxLoad").innerHTML = "";

            $("#examen").show();
            $("#boxLoad").hide();
            $("#boxRespuesta").hide();

        });

        //Cerramos el popup
        $(".clickPopup-close").click(function (event) {
            event.preventDefault();

            $("#popup-1").removeClass("active");
            $("#examen").trigger("reset");

            document.getElementById("respuesta").innerHTML = "";
            document.getElementById("boxLoad").innerHTML = "";

            $("#examen").show();
            $("#boxLoad").hide();
            $("#boxRespuesta").hide();

        });
    }


    $(".buttonDuplicar").on("click", function(event) {
        event.preventDefault();
       
        $.post(RUTA + 'formulario/duplicarFormulario', {idExamen : IDEXAMENEDITAR }, function (data, textStatus, xhr) {

            if (data.status == 200) {

                window.location.replace(RUTA + "administrador");

            
            } else {

            }

        }, "json");

    });


    
    $(".home_document").on("click",function(){
    
        var result = confirm("¿Quieres volver al inicio?");

        if(result)  {
            $.post(RUTA + 'administradorExamen/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });    
        } 

    });

});