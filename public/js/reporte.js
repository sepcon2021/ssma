$(function () {


    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

    var nombres = data.result[0].nombres;
    var apellidos = data.result[0].apellidos;
    var usuario = data.result[0].internal;


    const SELECT = 1;
    const DATE = 2;
    const INPUT = 3;


 

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

        let proyecto = getProyecto(formJson[1].value);
        let fecha_inicio = formJson[2].value;
        let fecha_fin = formJson[3].value;

        
        $.ajax({
            url: RUTA + 'reporte/getReportGeneral',
            type: "POST",
            data: form,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                $(".wrap_load").hide();

                $(".mainpage").html(htmlTopReport(data,proyecto,fecha_inicio,fecha_fin));
                downloadReport( formJson);
                goHome();

            }
        });


    });

    function downloadReport(formJson) {

        $("#button_report_download").on('click', function (event) {

            let formatoReporte = $("#formato_reporte").val();

            $(".container_reporte_content").hide();
            $(".container_reporte_load").html(`    
                <div class="wrap_load_container"><div class="loader"></div></div>
                <div class="wrap_load_message"><p>Espere unos segundos </p></div>
            `);

            $(".container_reporte_load").show();

            $.post(RUTA + 'reporte/getReportGeneralExcel', {
                tipo_documento : formJson[0].value,
                proyecto : formJson[1].value,
                fecha_inicio : formJson[2].value,
                fecha_fin : formJson[3].value,
                formato_reporte : formatoReporte
            }, function (data) {


                $(".container_reporte_load").hide();
                $(".container_reporte_content").show();

                event.preventDefault();
                window.location.href = data.result;
                goHome();

            }, "json");

        });
    }



    function goHome(){
        
        $(".home_reporte").on("click",function(){
    
            var result = confirm("¿Quieres volver al inicio?");
    
            if(result)  {
                $.post(RUTA + 'reporte/render', function (data, textStatus, xhr) {
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


    function answerValidateCampos() {

        let listCampos = [
            { "campo": "tipo_documento", "tipo": SELECT },
            { "campo": "proyecto", "tipo": SELECT },
            { "campo": "fecha_inicio", "tipo": DATE },
            { "campo": "fecha_fin", "tipo": DATE }];

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

    function getProyecto(id){

        let result = '';
        const LISTA_PROYECTO2 = [{"id":1,"nombre":"WHCP 21","detalle":""},{"id":3,"nombre":"Pucallpa","detalle":""},{"id":4,"nombre":"Lurin","detalle":""},{"id":5,"nombre":"Lima","detalle":""},{"id":6,"nombre":"20PP03 L. Relaves Este / 00679","detalle":""},{"id":7,"nombre":"Full Flow flare - Shut dow","detalle":""},{"id":8,"nombre":"Sistema contra incendios","detalle":""},{"id":9,"nombre":"Obras Electromecánicas Varias","detalle":""},{"id":100,"nombre":"Todos los proyectos","detalle":""}];
        
        LISTA_PROYECTO2.forEach( proyecto => {
            if (proyecto.id == id){
                result =  proyecto.nombre;
            }
        });
    
        return result;
    }


});