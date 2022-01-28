$(function () {

    goHome()

    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

    var nombres = data.result[0].nombres;
    var apellidos = data.result[0].apellidos;
    var usuario = data.result[0].usuario;

    $("#nombres").val(`${nombres} ${apellidos}`);
    $("#usuario").val(usuario);

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


        $.post(RUTA + 'suspencion/grabarDocumentoWebNew', str, function (data, textStatus, xhr) {
            $(".wrap_load").hide();
            $(".wrap_sucess").show();

            if(data.state){
                $(".wrap_sucess").html(`   <div class="wrap_document_detail">
                <div class="item_format">
                    <h3>Documentos</h3>
                </div>
                <div class="item_format">
                    <a class="home_document" href="#">Inicio</a> <a href="#">/ Lista de verificación de visitas gerenciales                    </a>
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

            }else{
                $(".wrap_sucess").html(`No fue exitoso`);
            }
        })

    });



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


    function answerValidateCampos() {

        let listCampos = [
            { "campo": "proyecto", "tipo": SELECT },
            { "campo": "lugar", "tipo": INPUT },
            { "campo": "frente_trabajo", "tipo": INPUT },
            { "campo": "responsable_trabajo", "tipo": INPUT },
            { "campo": "cargo_trabajo", "tipo": INPUT },
            { "campo": "fecha_trabajo", "tipo": INPUT },
            { "campo": "hora_trabajo", "tipo": INPUT },
            { "campo": "otros_especificar", "tipo": INPUT },
            { "campo": "ocurrido", "tipo": INPUT },
            { "campo": "acciones", "tipo": INPUT },
            { "campo": "duracion", "tipo": INPUT },
            { "campo": "nombre_jefe", "tipo": INPUT },
            { "campo": "numero_personas", "tipo": INPUT },
            { "campo": "observaciones", "tipo": INPUT }
        ];

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