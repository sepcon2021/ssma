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
                    <div class="item_format">
                        <div class="item_format">${manyPDFs(lecciones.url_pdf)}</div>
                        <div class="item_format"> ${lecciones.nombre} </div>

                    </div>
                    <br><br><br><br>
                    `;
                });

                $("#tableGeneral").html(htmlContent);

                afterLoadPDf();
            }
        });
    }

    function manyPDFs(listaPDF){
        let pdfHtml = ``;
        let list = listaPDF.split(",")

        list.forEach(pdf => {

            if(pdf != ""){
                pdfHtml += `<div>
                <div>
                    <iframe class="miniPDF"  width="200px" height="200px" src="${RUTA}public/file/${pdf}" target="_blank">
                        ${pdf}</iframe>
                </div>
                <div><button class="preview subtitlePDF" value="${RUTA}public/file/${pdf}" >${pdf}</button></div>
                </div> <br>`
            }
        })

        return pdfHtml;
    }





    
        /*
    __________________________________________________
    |                                                 |
    |                   POP UP                        |
    |                                                 |
    |_________________________________________________|         

    */

    
    function afterLoadPDf(){


        $('.preview').on('click', function (event) {
            event.preventDefault();
            $("#popup-1").addClass("active");

            $("#previewPDF").attr('src',$(this).val()+"#toolbar=0");
            
    
            return false;
    
        })
    
    }



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


})