$(function() {

    $("#btnRegister").on('click', function(event) {
        event.preventDefault();

        $("#formIPERC").trigger('submit');

        return false

    });

    //enviar formulario
    $("#formIPERC").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
        var str = $(this).serialize();

        //console.log(str)

        if (checkInputs()) {

            $.post(RUTA + 'iperc/saveDocumentIpercWeb', str, function(data, textStatus, xhr) {
                mostrarMensaje("msj_correcto", "Registrado Correctamente");
                $("#formIPERC").trigger("reset");
            });

        }




        return false;
    });



    $("input:radio[name='riesgo1']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 0) {

            $("#comentario1-message").fadeIn();

        } else {

            $("#comentario1-message").hide();
        }

    });


    $("input:radio[name='riesgo2']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 0) {

            $("#comentario2-message").fadeIn();

        } else {

            $("#comentario2-message").hide();
        }

    });


    $("input:radio[name='riesgo3']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 0) {

            $("#comentario3-message").fadeIn();
        } else {

            $("#comentario3-message").hide();
        }

    });



    $("input:radio[name='riesgo4']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 1) {

            $("#comentario4-message").fadeIn();
        } else {

            $("#comentario4-message").hide();
        }
    });


    $("input:radio[name='riesgo5']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 1) {

            $("#comentario5-message").fadeIn();
        } else {

            $("#comentario5-message").hide();
        }

    });

    $("input:radio[name='riesgo6']").click(function() {

        var idTopObservacionDetalle = $(this).val();

        if (idTopObservacionDetalle == 1) {

            $("#comentario6-message").fadeIn();
        } else {

            $("#comentario6-message").hide();
        }

    });


    $("input:radio[name='riesgo7']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 1) {

            $("#comentario7-message").fadeIn();
        } else {

            $("#comentario7-message").hide();
        }

    });


    $("input:radio[name='riesgo8']").click(function() {

        var idTopObservacionDetalle = $(this).val();

        if (idTopObservacionDetalle == 1) {

            $("#comentario8-message").fadeIn();
        } else {

            $("#comentario8-message").hide();
        }

    });

    $("input:radio[name='riesgo9']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 1) {

            $("#comentario9-message").fadeIn();
        } else {

            $("#comentario9-message").hide();
        }

    });

    $("input:radio[name='riesgo10']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 1) {

            $("#comentario10-message").fadeIn();
        } else {

            $("#comentario10-message").hide();
        }
    });

    $("input:radio[name='riesgo11']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 1) {

            $("#comentario11-message").fadeIn();
        } else {

            $("#comentario11-message").hide();
        }
    });

    $("input:radio[name='riesgo12']").click(function() {

        var idTopObservacionDetalle = $(this).val();

        if (idTopObservacionDetalle == 1) {

            $("#comentario12-message").fadeIn();
        } else {

            $("#comentario12-message").hide();
        }

    });


    $("input:radio[name='riesgo13']").click(function() {

        var idTopObservacionDetalle = $(this).val();

        if (idTopObservacionDetalle == 0) {

            $("#comentario13-message").fadeIn();
        } else {

            $("#comentario13-message").hide();
        }

    });


    $("input:radio[name='riesgo14']").click(function() {

        var idTopObservacionDetalle = $(this).val();


        if (idTopObservacionDetalle == 0) {

            $("#comentario14-message").fadeIn();
        } else {

            $("#comentario14-message").hide();
        }
    });

    $("input:radio[name='riesgo15']").click(function() {

        var idTopObservacionDetalle = $(this).val();
        if (idTopObservacionDetalle == 0) {

            $("#comentario15-message").fadeIn();
        } else {

            $("#comentario15-message").hide();
        }

    });


    $("input:radio[name='riesgo16']").click(function() {

        var idTopObservacionDetalle = $(this).val();

        if (idTopObservacionDetalle == 0) {

            $("#comentario16-message").fadeIn();
        } else {

            $("#comentario16-message").hide();
        }

    });


})





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
const empresa = document.getElementById('empresa');
const nombre_tarea = document.getElementById('nombre_tarea');


const riesgo1 = document.getElementsByName('riesgo1');
const riesgo2 = document.getElementsByName('riesgo2');
const riesgo3 = document.getElementsByName('riesgo3');
const riesgo4 = document.getElementsByName('riesgo4');
const riesgo5 = document.getElementsByName('riesgo5');
const riesgo6 = document.getElementsByName('riesgo6');
const riesgo7 = document.getElementsByName('riesgo7');
const riesgo8 = document.getElementsByName('riesgo8');
const riesgo9 = document.getElementsByName('riesgo9');
const riesgo10 = document.getElementsByName('riesgo10');
const riesgo11 = document.getElementsByName('riesgo11');
const riesgo12 = document.getElementsByName('riesgo12');
const riesgo13 = document.getElementsByName('riesgo13');
const riesgo14 = document.getElementsByName('riesgo14');
const riesgo15 = document.getElementsByName('riesgo15');
const riesgo16 = document.getElementsByName('riesgo16');




const riesgo_critico1 = document.getElementsByName('riesgo_critico1');
const riesgo_critico2 = document.getElementsByName('riesgo_critico2');
const riesgo_critico3 = document.getElementsByName('riesgo_critico3');
const riesgo_critico4 = document.getElementsByName('riesgo_critico4');
const riesgo_critico5 = document.getElementsByName('riesgo_critico5');
const riesgo_critico6 = document.getElementsByName('riesgo_critico6');
const riesgo_critico7 = document.getElementsByName('riesgo_critico7');
const riesgo_critico8 = document.getElementsByName('riesgo_critico8');
const riesgo_critico9 = document.getElementsByName('riesgo_critico9');



const riesgo_manos1 = document.getElementsByName('riesgo_manos1');
const riesgo_manos2 = document.getElementsByName('riesgo_manos2');
const riesgo_manos3 = document.getElementsByName('riesgo_manos3');



const riesgo_covid1 = document.getElementsByName('riesgo_covid1');
const riesgo_covid2 = document.getElementsByName('riesgo_covid2');
const riesgo_covid3 = document.getElementsByName('riesgo_covid3');
const riesgo_covid4 = document.getElementsByName('riesgo_covid4');
const riesgo_covid5 = document.getElementsByName('riesgo_covid5');
const riesgo_covid6 = document.getElementsByName('riesgo_covid6');
const riesgo_covid7 = document.getElementsByName('riesgo_covid7');


//GET ELEMENT riesgo


var countQuestions = 1;


function checkInputs() {
    var resultForm = true;

    const ubicacionValue = ubicacion.value.trim();
    const empresaValue = empresa.value.trim();
    const nombreTareaValues = nombre_tarea.value.trim();


    if (ubicacionValue === '') {
        resultForm = false;
        setErrorFor(ubicacion, 'Es necesario ingresar la ubicación');
    } else {
        setSuccessFor(ubicacion);
    }

    if (empresaValue === '') {
        resultForm = false;

        setErrorFor(empresa, 'Es necesario ingresar la empresa');
    } else {
        setSuccessFor(empresa);
    }



    if (nombreTareaValues === '') {
        resultForm = false;

        setErrorFor(nombre_tarea, 'Es necesario ingresar el nombre de la tarea');
    } else {
        setSuccessFor(nombre_tarea);
    }




    /**
     * VAMOS A VALIDAR CADA CHECK -> RIESGO
     */


    console.log(countQuestions);

    if (riesgo1[0].checked || riesgo1[1].checked) {


        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;
        setErrorForCheck(countQuestions);
    }


    if (riesgo2[0].checked || riesgo2[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo3[0].checked || riesgo3[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo4[0].checked || riesgo4[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo5[0].checked || riesgo5[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo6[0].checked || riesgo6[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo7[0].checked || riesgo7[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo8[0].checked || riesgo8[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {

        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    //
    console.log(countQuestions);

    if (riesgo9[0].checked || riesgo9[1].checked) {


        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;
        setErrorForCheck(countQuestions);
    }


    if (riesgo10[0].checked || riesgo10[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo11[0].checked || riesgo11[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo12[0].checked || riesgo12[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo13[0].checked || riesgo13[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo14[0].checked || riesgo14[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo15[0].checked || riesgo15[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo16[0].checked || riesgo16[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {

        resultForm = false;

        setErrorForCheck(countQuestions);
    }

    /**
     * RIESGO CRITICO
     * 
     */



    console.log(countQuestions);

    if (riesgo_critico1[0].checked || riesgo_critico1[1].checked) {


        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;
        setErrorForCheck(countQuestions);
    }


    if (riesgo_critico2[0].checked || riesgo_critico2[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_critico3[0].checked || riesgo_critico3[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_critico4[0].checked || riesgo_critico4[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_critico5[0].checked || riesgo_critico5[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_critico6[0].checked || riesgo_critico6[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_critico7[0].checked || riesgo_critico7[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_critico8[0].checked || riesgo_critico8[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {

        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    //
    console.log(countQuestions);

    if (riesgo_critico9[0].checked || riesgo_critico9[1].checked) {


        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;
        setErrorForCheck(countQuestions);
    }


    /**
     * 
     * RIESGOS MANOS
     */



    console.log(countQuestions);

    if (riesgo_manos1[0].checked || riesgo_manos1[1].checked) {


        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;
        setErrorForCheck(countQuestions);
    }


    if (riesgo_manos2[0].checked || riesgo_manos2[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_manos3[0].checked || riesgo_manos3[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }

    /**
     * 
     * RIESGO COVID
     * 
     */



    console.log(countQuestions);

    /*if (riesgo_covid1[0].checked || riesgo_covid1[1].checked) {


        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;
        setErrorForCheck(countQuestions);
    }*/


    if (riesgo_covid2[0].checked || riesgo_covid2[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_covid3[0].checked || riesgo_covid3[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_covid4[0].checked || riesgo_covid4[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_covid5[0].checked || riesgo_covid5[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_covid6[0].checked || riesgo_covid6[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
    }


    if (riesgo_covid7[0].checked || riesgo_covid7[1].checked) {

        setSuccessForCheck(countQuestions);

    } else {
        resultForm = false;

        setErrorForCheck(countQuestions);
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