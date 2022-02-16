$(function () {

    var IDEXAMEN = sessionStorage.getItem('idExamen');

    var CODIGO_PROYECTO = sessionStorage.getItem('codigoproyecto');

    var listaPreguntas = [];

    var listaEtiquetasValidacion =  [{nombre : "area",idtipopregunta : 1}];

    var notaAprobatoria = 0;

    const ALTERNATIVA = 1;
    const RESPUESTA = 2;
    // Sección para traer contenido del examen


    
    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

    var internal = data.result[0].internal;
    var dni = data.result[0].dni;




    var contenidoHtml = "";

    $.post(RUTA + 'formulario/listaPreguntaByIdExamenRegistro', { idExamen: IDEXAMEN ,idProyecto : CODIGO_PROYECTO}, function (data, textStatus, xhr) {

        if (data.status == 200) {

            $(".header_exam").append(contenidoCabecera(data.contenido));


            contenidoHtml = crearHtmlPregunta(data.contenido);
            $("#contenido-pregunta").append(contenidoHtml);



        }


        registrarExamen();

    }, "json");





    function crearHtmlPregunta(contenido) {

        var htmlPregunta = "";
        var index = 1;

        notaAprobatoria = contenido.examen.nota;
        htmlPregunta += contenidoEstatico(contenido);
        listaPreguntas = contenido.examen.listaPreguntas;

        contenido.examen.listaPreguntas.forEach(pregunta => {

            //htmlPregunta += contenidoPregunta(pregunta, index);
            htmlPregunta += tipoAlternativaHtml(pregunta,index);

            //var data = ["pregunta" + pregunta.id , pregunta.idtipopregunta];
            var data = {nombre : ("pregunta" + pregunta.id),idtipopregunta : pregunta.idtipopregunta };

            //listaEtiquetasValidacion.push("pregunta" + pregunta.id);
            listaEtiquetasValidacion.push(data);
            index++;
        });

        return htmlPregunta;
    }


    function contenidoCabecera(contenido) {

        return `
        <div class="bordes">
        
        <div class="item_format">
        <h2> ${contenido.examen.tema} </h2>
        </div>
        <br>
        
        <div class="item_format">
        <h5>Mes : </h5>
        <p> ${getMonth()}</p>
        </div>

        <div class="item_format">
        <h5>Proyecto/Sede : </h5>
        <p> ${contenido.examen.nombreProyecto}</p>
        </div>

        <div class="item_format">
        <h5>Cliente : </h5>
        <p> ${contenido.examen.cliente} </p>
        </div> 

        <div class="item_format">
        <h5>Facilitador : </h5>
        <p>${contenido.examen.facilitador}</p>
        </div>
        <br>
        <br>

    </div>`;

    }

    function tipoAlternativaHtml(pregunta,index) {



        var htmlAlternativa = ``;

        if(pregunta.idtipopregunta == ALTERNATIVA){

            htmlAlternativa = contenidoPregunta(pregunta, index);

        }
        if(pregunta.idtipopregunta ==  RESPUESTA){
            htmlAlternativa =  contenidoRespuestaHtml(pregunta,index);
        }
        return htmlAlternativa;
    }

    function contenidoRespuestaHtml(pregunta,index){
        return `<div class="contenido item_format" > 
        <div class="bordes item_format">
        <h4>${index}. ${pregunta.nombre} </h4> 
        <div> <textarea class="comentario item_format" name="pregunta${pregunta.id}" id="pregunta${pregunta.id}" placeholder="Comentarios"></textarea>  </div>
        
        <div class="error_message item_format" id="pregunta${pregunta.id}_message">
        <p>Marca una alternativa</p>
        </div>
        
        </div> 
        </div>`
    }


    function contenidoPregunta(pregunta, index) {

        return `<div class="contenido" > 
        <br>
        <div class="bordes">
        <h4 class="item_format">  `+ index + `.` + pregunta.nombre + ` </h4> 
        <div> 
        <br> 
        <div id="listaAlternativa`+ pregunta.id + `"> 
        `+ crearHtmlAlternativa(pregunta) + `
        </div> 
        </div>

        <div class="error_message item_format" id="pregunta`+ pregunta.id + `_message">
        <p>Marca una alternativa</p>
        </div>

        </div> 
        </div>`;


    }

    function crearHtmlAlternativa(pregunta) {
        var htmlAlternativa = "";


        pregunta.alternativa.forEach(alternativa => {


            htmlAlternativa += contenidoAlternativa(alternativa, pregunta);

        });


        return htmlAlternativa;
    }

    function contenidoAlternativa(alternativa, pregunta) {

        return ' <div class="item_format"> ' +

            '<input class="radioRespuesta" type="radio" name="pregunta' + pregunta.id + '" id="radio' + alternativa.id + '"  idalternativa="' + alternativa.id + '" value="' + alternativa.id + '" > ' +
            '<label >' + alternativa.nombre + '</label> ' +
            '</div>';
    }






    function contenidoEstatico(contenido) {

        return `
        <div class="contenido">


    <input type="hidden" name="idexamen" value="${IDEXAMEN}">
    <input type="hidden" name="dni" value="${dni}">


    <div class=" contenido">
        <div class="bordes">
            <h4 class="item_format">Área</h4>
            
            <div class="item_format">
                <input type="radio" name="area" id="area1" value="1">
                <label for="area1">Obras Civiles</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area2" value="2">
                <label for="area2">Piping</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area3" value="3">
                <label for="area3">Precom/com</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area4" value="4">
                <label for="area4">Contratista</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area5" value="5">
                <label for="area5">Mantenimiento de Equipos Mecánicos</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area6" value="6">
                <label for="area6">Logistica - Operadores, Rigger y Andamieros</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area7" value="7">
                <label for="area7">Mantenimiento y Habilitación de Campamento</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area8" value="8">
                <label for="area8">Oficina</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area9" value="9">
                <label for="area9">SSMA - Seguridad y Salud</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area10" value="10">
                <label for="area10">Calidad</label>
            </div>
            
            <div class="item_format">
                <input type="radio" name="area" id="area11" value="11">
                <label for="area11">Electricidad e Instrumentación</label>
            </div>
            
            
            <div class="error_message item_format" id="area_message">
                <p>Marca una alternativa</p>
            </div>
        </div>
    </div>
</div>
        `;
    }


    function listaArea(contenido) {
        var htmlSelect =  ` `;
        contenido.listaArea.forEach(area => {
            htmlSelect += `<br> 
            <input type="radio" name="area" id="area`+area.id+`" value="`+area.id+`"> 
            <label for="area`+area.id+`"> `+area.nombre+`</label> `;
        });
        return htmlSelect;
    }


    function registrarExamen() {

        $("#button_send_form").on('click', function (event) {

            $("#button_send_form").prop("disabled", false);


            event.preventDefault();


            if (validateFormulario()) {

                //Iniciamos con el load de carga
                //document.getElementsByClassName('load')[0].innerHTML = '<div class="loader"></div>';
                //$("form").hide(0);

                
                $(".wrap_document").hide();
                $(".wrap_load").html(`    
                    <div class="wrap_load_container"><div class="loader"></div></div>
                    <div class="wrap_load_message"><p>Espere unos segundos </p></div>
                `);
        
                $(".wrap_load").show();


                var firmaTrabajador = document.getElementById("firma");

                $.post('public/inc/upload-sing.inc.php', { img: firmaTrabajador.toDataURL() }, function (data) {

                    $('#nombreFirmaTrabajador').val(data);

                    $("#formDigital").trigger('submit');


                });
            }else{
                alert("Es obligatorio llenar todos los campos");
            }






            return false;

        });


        //enviar formulario
        $("#formDigital").on('submit', function (event) {
            event.preventDefault();

            console.log($(this).serializeArray())

            var listaRespuestas = $(this).serializeArray();

            var arrayRespuesta = [];

            var jsonFormulario = "";


            arrayRespuesta.push({
                idexamen: listaRespuestas[1]["value"].trim(),
                dni: listaRespuestas[2]["value"].trim(),
                idarea: listaRespuestas[3]["value"].trim(),
                nota: calcularNota(listaRespuestas),
                //comentario: listaRespuestas[(listaRespuestas.length - 1)]["value"],
                firma: listaRespuestas[0]["value"],
                listaRespuestas: convertRespuestaToArray(listaRespuestas)
            });

            INFO = new FormData();
            jsonFormulario = JSON.stringify(arrayRespuesta);


            enviarFormulario(jsonFormulario, arrayRespuesta);

            return false;
        });
    }

    function enviarFormulario(jsonFormulario, arrayRespuesta) {


        $.post(RUTA + 'registroExamen/verificarRegistro', { dniTrabajador: arrayRespuesta[0].dni, idExamen : IDEXAMEN}, function (data, textStatus, xhr) {


            if (data.status == 200) {

                $.post(RUTA + 'registroExamen/insertExamen', { data: jsonFormulario }, function (data, textStatus, xhr) {


                    $(".wrap_load").hide();
                    $(".wrap_sucess").show();


                    if (data.status == 200) {

                        if (arrayRespuesta[0].nota > notaAprobatoria) {
                            //$(".wrap_sucess").html(`<div class="contenido">  <div class="succesMessage"> <h3>El formulario fue enviado con éxito</h3> <br> <h3>Nota</h3> <br> <h1> ` + arrayRespuesta[0].nota + ` </h1> </div> </div> `);
                           // $(".respuesta").append(``)
                           $(".wrap_sucess").html(answerExamen(arrayRespuesta));
                           goHome()

                        } else {
                            //$(".wrap_sucess").html(`<div class="contenido">  <div class="succesMessage"> <h3>El formulario fue enviado con éxito</h3> <br> <h3>Nota</h3> <br> <h1> ` + arrayRespuesta[0].nota + ` </h1>  <br> <button type="submit" class="buttonInicio" id="btnInicio"> Volver a rendir examen </button> </div> </div>`);
                            //$(".respuesta").append()
                            $(".wrap_sucess").html(answerExamen(arrayRespuesta));
                            goHome()
                            //regresarInicio()
                        }
                    } else {
                        
                        $(".wrap_sucess").html(answerExamen(arrayRespuesta));
                        goHome()
                        //$(".wrap_sucess").html(`<div class="contenido">  <div class="succesMessage"> <h3` + data.contenido + ` </h3> <br> <button type="submit"  class="buttonInicio" id="btnInicio"> Volver a rendir examen </button> </div> </div> `);
                        //$(".respuesta").append(` `);
                        //regresarInicio()

                    }

                }, "json");


            } else {

                $.post(RUTA + 'registroExamen/updateExamen', { data: jsonFormulario }, function (data, textStatus, xhr) {

                    $(".wrap_load").hide();
                    $(".wrap_sucess").show();

                    if (data.status == 200) {




                        if (arrayRespuesta[0].nota > notaAprobatoria) {

                            //$(".wrap_sucess").html(`<div class="contenido">  <div class="succesMessage"> <h3>El formulario fue enviado con éxito</h3> <br> <h3>Nota</h3> <br> <h1> ` + arrayRespuesta[0].nota + ` </h1> </div> </div>`)
                            $(".wrap_sucess").html(answerExamen(arrayRespuesta));
                            goHome()
                        } else {
                            //$(".wrap_sucess").html(`<div class="contenido">  <div class="succesMessage"> <h3>El formulario fue enviado con éxito</h3> <br> <h3>Nota</h3> <br> <h1> ` + arrayRespuesta[0].nota + ` </h1>  <br> <button type="submit" class="buttonInicio" id="btnInicio"> Volver a rendir examen </button> </div> </div>`)
                            $(".wrap_sucess").html(answerExamen(arrayRespuesta));
                            goHome()
                            //regresarInicio()
                        }
                    } else {

                        //$(".wrap_sucess").html(` <div class="contenido">  <div class="succesMessage"> <h3` + data.contenido + ` </h3> <br> <button type="submit"  class="buttonInicio" id="btnInicio"> Volver a rendir examen </button> </div> </div> `);
                        $(".wrap_sucess").html(answerExamen(arrayRespuesta));
                        goHome()
                        //regresarInicio()

                    }

                }, "json");
            }

        }, "json");

    }

    function answerExamen(arrayRespuesta){
        return `   <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Examenes</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ Lista</a>
        </div>
    </div>
    <div class="wrap_sucess_content">
        <div>
            <img class="wrap_sucess_img" src="public/img/clapping.png" alt="">
        </div>
        <div>

                <h3>El formulario fue enviado con éxito</h3> <br> <h3>Nota</h3> <br> <h1> ${arrayRespuesta[0].nota} </h1> 
        </div>
        <div >
            <button class="wrap_sucess_home home_document">Inicio</button>
        </div>
    </div>`;
    }



    function regresarInicio() {


        $("#btnInicio").on('click', function (event) {

            event.preventDefault();

            //window.location.href = RUTA;
            window.location.replace(RUTA + 'dashboard');

            return false;

        });
    }


    function calcularNota(listaRespuestas) {
        //Desde aca empieza el array con las respuestas acerca del examen
        var INICIO_PREGUNTA = 4;
        var nota = 0;

        const RESPUESTA_CORRECTA = 1;

        listaPreguntas.forEach(pregunta => {

            if(pregunta.idtipopregunta == ALTERNATIVA ){

                pregunta.alternativa.forEach(data =>{
                
                    if(data.respuesta == RESPUESTA_CORRECTA & data.id == listaRespuestas[INICIO_PREGUNTA]["value"] ){
                        
                        nota += pregunta.puntaje;
    
                    }
                });
    
            }

            INICIO_PREGUNTA++;

        })

        return nota;
    }


    function convertRespuestaToArray(listaRespuestas) {
        //Desde aca empieza el array con las respuestas acerca del examen
        var index = 4;
        var listaRespuestaArray = [];

        listaPreguntas.forEach(pregunta => {

            listaRespuestaArray.push({
                idPregunta: pregunta.id, respuesta: listaRespuestas[index]["value"]
            });

            index++;

        })


        return listaRespuestaArray;
    }


    /**************************************************************************** */
    /************* FUNCIONES PARA VALIDAR CHECKS   ****************************** */
    /**************************************************************************** */
    /**************************************************************************** */

    function validateFormulario() {



        var validarFormulario = true;


        listaEtiquetasValidacion.forEach((value) => {

            if(value.idtipopregunta == 1){

                $('input[type=radio][name=' + value.nombre + ']').change(function () {
                    setChangeErrorCheck(value.nombre)
                });
    
    
    
                if (!validateCheck(value.nombre)) {
    
                    validarFormulario = false;
                }
            }

            if(value.idtipopregunta == 2){

                $('#'+value.nombre).change(function () {
                    setChangeErrorCheck(value.nombre)
                });
    
    
    
                if (!validateCampo(value.nombre)) {
    
                    validarFormulario = false;
                }

            }



        });

        if (isCanvasBlank()) {

            validarFormulario = false;
        }






        return validarFormulario;
    }


    function isCanvasBlank() {

        var canvas = document.getElementById("firma");

        const context = canvas.getContext('2d');

        const pixelBuffer = new Uint32Array(
            context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
        );

        var resultado = !pixelBuffer.some(color => color !== 0);

        if (resultado) {

            document.getElementById("firmaMessage").innerHTML = "Ingresar firma";

        }


        return resultado;
    }


    function validateCampo(etiqueta){

        var resultForm = true;


        const campo = document.getElementById(etiqueta);
        const campoValue = campo.value.trim();
    
        if (campoValue === '') {
            resultForm = false;
            setErrorForCheck(etiqueta);
        }
        return resultForm;
    }


    function validateCheck(idEtiqueta) {

        var resultForm = false;


        const etiqueta = document.getElementsByName(idEtiqueta);

        etiqueta.forEach((value) => {
            if (value.checked) {
                resultForm = true;
            }
        });

        if (!resultForm) {

            setErrorForCheck(idEtiqueta)

        }

        return resultForm;
    }


    function setErrorForCheck(etiqueta) {

        const message = document.getElementById(etiqueta + '_message');
        message.style.visibility = 'visible';
        message.scrollIntoView();

    }

    function setChangeErrorCheck(etiqueta) {
        const message = document.getElementById(etiqueta + '_message');
        message.style.visibility = 'hidden';
    }




    function getMonth() {
        var arrayMonths = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Dicimebre'];
        var day = new Date();

        return arrayMonths[day.getMonth()]
    }

    goHome();

    function goHome(){
        $(".home_document").on("click", function () {

            var result = confirm("¿Quieres volver al inicio?");
    
            if (result) {
                $.post(RUTA + 'administradorExamen/renderDashboardFormulario', function (data, textStatus, xhr) {
                    $(".mainpage").html(data);
                });
            }
    
        });
    }



});





