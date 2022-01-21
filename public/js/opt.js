$(function() {

    $("#btnRegister").on('click', function(event) {
        event.preventDefault();

        $("#formOPT").trigger('submit');

        return false

    });

    //enviar formulario
    $("#formOPT").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
        var str = $(this).serialize();


        var recomendaciones = getTableRecomendaciones();
        var observaciones = getTableObservaciones();
        var Observadores = getTableObservadores();
        /* var seguimiento = getTableSeguimiento();*/





        if (checkInputs() && recomendaciones.length > 0 && observaciones.length > 0 && observaciones.length > 0) {


            var data = str + '&data_observacion=' + observaciones +
                '&data_recomendacion=' + recomendaciones +
                '&data_observadores=' + Observadores;



            $.post(RUTA + 'opt/saveDocumentOptWeb', data, function(data, textStatus, xhr) {

                //   setAfterSubmitForm();

                mostrarMensaje("msj_correcto", "Registrado Correctamente");
                $("#formOPT").trigger("reset");
            });

        } else {

            $('.page').animate({ scrollTop: 0 }, 'slow');

        }


        return false;
    });




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





    /** 
     * 
     * 
     * VALIDAR EL FORMULARIO ANTES DE REGISTRAR 
     * 
     * 
     * 
     * 
     * */

    const ubicacion = document.getElementById('ubicacion');
    const nombre = document.getElementById('nombre_equipo_observador');
    //const tiempo_trabajo = document.getElementById('tiempo_trabajo');
    const departamento = document.getElementById('departamento');
    const guardia = document.getElementById('guardia');

    const ocupacion = document.getElementById('ocupacion');
    const tarea = document.getElementById('tarea');

    //const notificacion_previa = document.getElementById('notificacion_previa');

    const razon_opt = document.getElementById('razon_opt');


    //GET ELEMENT riesgo


    var countQuestions = 1;


    function checkInputs() {
        var resultForm = true;

        const ubicacionValue = ubicacion.value.trim();
        const nombreValue = nombre.value.trim();
        const tiempoTrabajoValues = tiempo_trabajo.value.trim();
        //const departamentoValues = departamento.value.trim();
        const guardiaValues = guardia.value.trim();
        const ocupacionValues = ocupacion.value.trim();
        const tareaValues = tarea.value.trim();

        //const notificacion_previaValues = notificacion_previa.value.trim();
        const razon_optValues = razon_opt.value.trim();


        if (ubicacionValue === '') {
            resultForm = false;
            setErrorFor(ubicacion, 'Es necesario ingresar la ubicación');
        } else {
            setSuccessFor(ubicacion);
        }

        if (nombreValue === '') {
            resultForm = false;

            setErrorFor(nombre, 'Es necesario ingresar el nombre ');
        } else {
            setSuccessFor(nombre);
        }



        if (tiempoTrabajoValues === '') {
            resultForm = false;

            setErrorFor(tiempo_trabajo, 'Es necesario ingresar el tiempo en el trabajo actual ');
        } else {
            setSuccessFor(tiempo_trabajo);
        }





        if (guardiaValues === '') {
            resultForm = false;

            setErrorFor(guardia, 'Es necesario ingresar la guardia');
        } else {
            setSuccessFor(guardia);
        }



        if (ocupacionValues === '') {
            resultForm = false;

            setErrorFor(ocupacion, 'Es necesario ingresar la ocupación');
        } else {
            setSuccessFor(ocupacion);
        }




        if (tareaValues === '') {
            resultForm = false;

            setErrorFor(tarea, 'Es necesario ingresar la tarea');
        } else {
            setSuccessFor(tarea);
        }


        if (razon_optValues === '') {
            resultForm = false;

            setErrorFor(razon_opt, 'Es necesario ingresar la razón');
        } else {
            setSuccessFor(razon_opt);
        }


        //INICIALIZAR EL CONTADOR
        countQuestions = 1;

        return resultForm;



    }

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        formControl.className = 'form-control error';
        small.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.className = 'form-control success';
    }


    /** CHECKS ITEMS  */
    function setErrorForCheck(index) {
        const message = document.getElementById('message' + index);
        message.className = 'message error';
        countQuestions++;
    }

    function setSuccessForCheck(index) {
        const message = document.getElementById('message' + index);
        message.className = 'message success';
        countQuestions++;
    }


    function setAfterSubmitForm() {
        for (i = 1; i < 22; i++) {
            const message = document.getElementById('message' + i);
            message.className = 'message afterSubmit';
        }

        const areaInput = area.parentElement;
        areaInput.className = 'form-control reset';

        const codigoInput = codigo.parentElement;
        codigoInput.className = 'form-control reset';



    }





})