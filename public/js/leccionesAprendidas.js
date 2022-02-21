$(function(){

    loadListEvaluaciones();

    function loadListEvaluaciones(){
        let htmlContent = ``;

        $.ajax({
            url: RUTA + 'leccionesAprendidas/getListLecciones',
            type: "POST",
            contentType: false,
            processData: false,
            success: function (list) {
                list.contenido.forEach((lecciones)=>{
                    htmlContent+= `
                    <tr>
                        <td>${lecciones.id}</td>
                        <td>${lecciones.usuario}</td>
                        <td>${lecciones.nombre}</td>
                        <td>${lecciones.registro}</td>
                        <td>${manyPDFs(lecciones.url_pdf)}</td>
                        <td> <button class="delete" value="${lecciones.id}">Eliminar</button> </td>
                    </tr>
                    `;
                });

                $("#listLeccion").html(htmlContent);
            }
        });
    }


    $("#listLeccion").on("click", ".delete", function (event) {
        event.preventDefault();

        let html = $(this);
        let id = $(this).val();

        $.post(RUTA + 'leccionesAprendidas/deleteLeccion', {id : id}, function (data, textStatus, xhr) {
            html.parent().parent().remove();
        });

        return false;
    })

    function manyPDFs(listaPDF){
        let pdfHtml = ``;
        let list = listaPDF.split(",")

        list.forEach(pdf => {
            pdfHtml += `<a href="${RUTA}public/file/${pdf}" target="_blank">${pdf}</a> <br>`
        })

        return pdfHtml;
    }


    var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));
    var usuario = data.result[0].dni;

    //$("#nombres").val(`${nombres} ${apellidos}`);
    $("#usuario_dni").val(usuario);

    const SELECT = 1;
    const DATE = 2;
    const INPUT = 3;

    

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
        $("#usuario").val(usuario);

        return false;

    })


    // 5. LUEGO DE LLENAR TODOS LOS CAMPOS VAMOS A AGREGAR LA OBSERVACION REALIZADA Y VA SER AÑADIDO A LA TABLA PRINCIPAL


    $("#popup_send_form").click(function (event) {
        event.preventDefault();

        if (answerValidateCamposPopUp()) {
            $("#formpopup").trigger('submit');
        }

        return false;
    });



    // 7. Enviamos el formulario con la imagen en memoria para que sea almacenado en un directorio de imagenes

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
            url: RUTA + 'leccionesAprendidas/insertLeccion',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {

                loadListEvaluaciones();

                $(".popup_load").hide();
                $(".popup_content").show();
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
    |                   VALIDATE CAMPOS               |
    |                                                 |
    |_________________________________________________|         

    */

    function answerValidateCamposPopUp() {

        let listCampos = [{ "campo": "nombre", "tipo": SELECT }
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




})