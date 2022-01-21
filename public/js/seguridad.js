$(document).ready(function () {


    escucharCambiosFile();

    var other_selected = "";

    //radios group
    $("#rgObser label").on('click', function (event) {

        id_obser = $(this).prev('input').attr('id');
        data_obser = $(this).prev('input').val();

        $(this).parent().children('span').remove();

        $("#divActIns, #divConIns, #divActSeg, #divRelac, #divOtros, #divTipEpp, #divConEpp").hide();

        $('input[name=rbacsues],input[name=rbcosues],input[name=rbactseg],input[name=rbrelac],input[name=rbtipepp],input[name=rgconepp]').parent().children('span').remove();
        $('input[name=rbacsues],input[name=rbcosues],input[name=rbactseg],input[name=rbrelac],input[name=rbtipepp],input[name=rgconepp]').prop('checked', false);

        switch (id_obser) {
            case 'rbObser01':
                $("#divActIns").fadeIn();
                $("#divActSeg").hide();
                $("#divCalificacion").fadeIn();
                $('#descripcionObservacion').text('Acción correctiva');
                $('#hideCalificaion').html(``);
                sw = true;
                break;
            case 'rbObser02':
                $("#divConIns").fadeIn();
                $("#divActSeg").hide();
                $("#divCalificacion").fadeIn();
                $('#descripcionObservacion').text('Acción correctiva');
                $('#hideCalificaion').html(``);
                sw = true;
                break;
            case 'rbObser03':
                $("#divActSeg").fadeIn();
                $("#divCalificacion").hide();
                $('#descripcionObservacion').text('Descripción');

                $('#hideCalificaion').html(`
                <input type="hidden" name="acto_seguro" id="acto_seguro" value="01">
                <input type="hidden" class="clasificacion" name="clasificacion" value="4">
                `);
                break;
        }
    });



    $("#divActIns label, #divConIns label, #divActSeg label").on('click', function (event) {
        other_selected = $(this).text();

        if (other_selected == "OTROS") {
            $("#divOtros").fadeIn();
        } else {
            $("#divOtros").hide();
        }

    });






    $("#btnRegister").on('click', function (event) {
        event.preventDefault();
        $("#formSeguridad").trigger('submit');

        return false
    });
    //enviar formulario
    $("#formSeguridad").on('submit', function (event) {
        /* Act on the event */
        event.preventDefault();


        var str = $("#formSeguridad").serialize();
        var idSeguridad = '';


        $.post(RUTA + 'seguridad/grabarDocumentoWeb', str, function (data, textStatus, xhr) {
            idSeguridad = data;

        })
            .always(function () {

                var ary = [];

                $('#tablaClasificacion tr').each(function (a, b) {

                    if ($('.tipo', b).val() != undefined) {


                        var tipo = $('.tipo', b).val();
                        var condicion = $('.condicion', b).val();
                        var clasificacion = $('.clasificacion', b).val();
                        var correctiva = $('.correctiva', b).val();
                        var responsable = $('.responsable', b).val();
                        var cumplimiento = $('.cumplimiento', b).val();
                        var seguimiento = $('.seguimiento', b).val();
                        var evidencia = $('.evidencia', b).val();
                        var dni = $('.responsable', b).attr("dniResponsable");

                        ary.push({
                            tipo: tipo,
                            Condicion: condicion,
                            Clasificacion: clasificacion,
                            Correctiva: correctiva,
                            Responsable: responsable,
                            Cumplimiento: cumplimiento,
                            Seguimiento: seguimiento,
                            Evidencia: evidencia,
                            iddoc: idSeguridad,
                            dni: dni
                        });

                    }
                });


                //eventualmente se lo vamos a enviar por PHP por ajax de una forma bastante simple 
                //y además convertiremos el array en json para evitar cualquier incidente con compatibilidades.

                INFO = new FormData();
                aInfo = JSON.stringify(ary);


                INFO.append('data', aInfo);


                $.ajax({
                    data: INFO,
                    type: 'POST',
                    url: RUTA + 'seguridad/grabarDetalles',
                    processData: false,
                    contentType: false,
                    success: function (r) {
                        mostrarMensaje("msj_correcto", "Registrado Correctamente");
                        $("#formSeguridad").trigger("reset");

                        var trs = $("#tablaClasificacion tr").length;
                        for (i = 1; i < trs; i++) {
                            $("#tablaClasificacion tr:last").remove();
                        }

                    }
                });
            });

        return false;
    });

    $("#btnFoto").on('click', function (event) {
        event.preventDefault();

        $("#image_file").trigger('click');

        return false;
    });



    $("#image_file").on("change", function (event) {

        if (-1 != $.inArray($("#image_file")[0].files[0].type, ["image/jpeg", "image/jpg", "image/png"])) {
            var populateImg = new FileReader();
            //EL METODO peviewImg se encuentra en funciones con la 
            populateImg.onload = previewImg;
            populateImg.readAsDataURL($("#image_file")[0].files[0]);
            $("#ruta_foto").val($("#image_file")[0].files[0].name);

        }
    });



    /**
     * 
     * INICIAMOS EL PROCESO DEL POP UP PARA AGREGAR UNA NUEVA OBSERVACION A LA TABLA PRINCIPAL DE OBSERVACIONES
     * 
     */



    // 1. CLICK SOBRE agregar observacion



    $('#addRowObs').on('click', function (event) {
        event.preventDefault();
        $("#popup-1").addClass("active");
        $(".loader").hide();

        escucharCambiosFile();

        return false;

    })

    // 3. DAMOS CLICK SOBRE EL BOTON agregar imagen 

    $(".uploadPhoto").on('click', function (event) {
        event.preventDefault();
        $("#image_file2").trigger('click');
        return false;
    });

    // 4. CARGAMOS LA IMAGEN PREVIA EN UN src

    $("#image_file2").on("change", function (event) {

        if (-1 != $.inArray($("#image_file2")[0].files[0].type, ["image/jpeg", "image/jpg", "image/png"])) {
            var populateImg = new FileReader();
            populateImg.onload = previewImgPopUp;
            populateImg.readAsDataURL($("#image_file2")[0].files[0]);
            $("#ruta_foto").val($("#image_file2")[0].files[0].name);

        }
    });

    // 5. LUEGO DE LLENAR TODOS LOS CAMPOS VAMOS A AGREGAR LA OBSERVACION REALIZADA Y VA SER AÑADIDO A LA TABLA PRINCIPAL


    $("#btnUpdateDocumento").click(function (event) {
        event.preventDefault();

        $("#formpopup").trigger('submit');

        return false;
    });



    // 7. Enviamos el formulario con la imagen en memoria para que sea almacenado en un directorio de imagenes

    $("#formpopup").on('submit', function (event) {

        event.preventDefault();
        var arrayFormulario = $("#formpopup").serializeArray();
        console.log('Formulario');
        console.log(arrayFormulario);

        var nombreResponsable = '';
        $(".dni_propietario option:selected").each(function () {
            nombreResponsable += $(this).text() + " ";
        });

        $(".loader").show();
        $("#formpopup").hide();

        $.ajax({
            url: RUTA + 'seguridad/guardarArchivos',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {

                $("#formpopup").show();
                $(".loader").hide();
                $('#filename').html("");


                var listaArchivo = '';
                if (data.length > 0) {

                    JSON.parse(data).lista.forEach(archivo => {
                        listaArchivo += (archivo + ',');
                    });
                }


                arrayFormulario.push({ "name": "listaArchivo", "value": listaArchivo });
                arrayFormulario.push({ "name": "nombreResponsable", "value": nombreResponsable });
                arrayFormulario.push({ "name": "nombreCondicion", "value": other_selected });


                $("table .tbody-data").append(cadenaHtml(arrayFormulario));
                $("#formpopup").trigger("reset");
                $('#img_preview_popup').attr('src', 'public/img/noimagen.jpg')
                $("#popup-1").removeClass("active");
                $('#hideCalificaion').html(``);


                $("#divActIns").hide();
                $("#divConIns").hide();
                $("#divActSeg").hide();

            }
        });

        return false;
    });


    // 8. Cerramos el popup
    $(".clickPopup-close").click(function () {

        $("#popup-1").removeClass("active");
        $("#formpopup").trigger("reset");

    });


    // 9. Creamos el row de la tabla principal
    function cadenaHtml(arrayFormulario) {

        var idTipo = arrayFormulario[0]['value'];
        var condicion = arrayFormulario[1]['value'];
        var idClasificacion = arrayFormulario[2]['value'];
        var accionCorrectiva = arrayFormulario[3]['value'];
        var dniResponsable = arrayFormulario[4]['value'];
        var fechaCumplimiento = arrayFormulario[5]['value'];
        var seguimiento = arrayFormulario[6]['value'];
        var listaArchivo = arrayFormulario[7]['value'];
        var nombreResponsable = arrayFormulario[8]['value'];
        var nombreCondicion = actoSeguro(arrayFormulario);


        var cadena =
            `<tr> 
        <td> 
       <select  class="tipo w80p" id="sede" class="w75p"> 
       <option value="-1" class="oculto">Seleccione Opción</option>
       <option value="1"  ${tipo(1, idTipo)} >Acto Subestándar </option>
       <option value="2"  ${tipo(2, idTipo)} >Condicion Subestándar</option>
       <option value="3"  ${tipo(3, idTipo)} >Acto seguro</option>
       </select>
        </td> 
         <td> 
        <input type="text" class="condicion w100p"  value="${nombreCondicion}" readonly>
         </td> 

        <td>
        <select  class="clasificacion w80p" id="clasificacion" class="w75p"> 
        <option value="-1" class="oculto">Seleccione Opción</option>
        <option value="1"  ${tipo(1, idClasificacion)} >A</option>
        <option value="2"  ${tipo(2, idClasificacion)} >B</option>
        <option value="3"  ${tipo(3, idClasificacion)} >C</option>
        <option value="4"  ${tipo(4, idClasificacion)} >NA</option>
        </select>
        </td>



         <td> 
          <input type="text" class="correctiva w100p" value="${accionCorrectiva}" readonly>
         </td> 
         <td> 
          <input type="text" class="responsable w100p"  dniResponsable="${dniResponsable}" value="${nombreResponsable}" readonly>
         </td> 
        <td> 
           <input type="date" class="cumplimiento w100p"  value="${fechaCumplimiento}" readonly>
        </td> 
       <td> 
          <input type="text" class="seguimiento w100p"  value="${seguimiento}" readonly>
        </td> 
          <td> 
          <input type="text" class="evidencia"   value="${listaArchivo}" readonly>
        </td> 
          <td> 
         <button class="buttonDelete"> Eliminar </button>
        </td> 
        </tr> `;

        return cadena;
    }

    function actoSeguro(arrayFormulario) {
        var idTipoObservacion = 3;
        var data = arrayFormulario[9]['value'];
        if (idTipoObservacion == arrayFormulario[0]['value']) {
            data = '';
        }

        return data;
    }

    // 10.Eliminar una row de la tabla 

    $(".tablaConBordes").on("click", ".buttonDelete", function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        return false;

    })




    function escucharCambiosFile() {


        var dropZoneId = "drop-zone";
        var buttonId = "clickHereMultifile";
        var mouseOverClass = "mouse-over";
        var dropZone = $("#" + dropZoneId);
        var inputFile = dropZone.find("input");
        var finalFiles = {};

        var ooleft = dropZone.offset().left;
        var ooright = dropZone.outerWidth() + ooleft;
        var ootop = dropZone.offset().top;
        var oobottom = dropZone.outerHeight() + ootop;

        document.getElementById(dropZoneId).addEventListener("dragover", function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropZone.addClass(mouseOverClass);
            var x = e.pageX;
            var y = e.pageY;

            if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
                inputFile.offset({
                    top: y - 15,
                    left: x - 100
                });
            } else {
                inputFile.offset({
                    top: -400,
                    left: -400
                });
            }

        }, true);

        if (buttonId != "") {
            var clickZone = $("#" + buttonId);

            var oleft = clickZone.offset().left;
            var oright = clickZone.outerWidth() + oleft;
            var otop = clickZone.offset().top;
            var obottom = clickZone.outerHeight() + otop;

            $("#" + buttonId).mousemove(function (e) {
                var x = e.pageX;
                var y = e.pageY;

                if (!(x < oleft || x > oright || y < otop || y > obottom)) {
                    inputFile.offset({
                        top: y - 15,
                        left: x - 160
                    });
                } else {
                    inputFile.offset({
                        top: -400,
                        left: -400
                    });
                }
            });
        }

        document.getElementById(dropZoneId).addEventListener("drop", function (e) {
            $("#" + dropZoneId).removeClass(mouseOverClass);
        }, true);


        inputFile.on('change', function (e) {
            finalFiles = {};
            $('#filename').html("");
            var fileNum = this.files.length,
                initial = 0,
                counter = 0;

            $.each(this.files, function (idx, elm) {
                finalFiles[idx] = elm;
            });

            for (initial; initial < fileNum; initial++) {
                counter = counter + 1;
                $('#filename').append('<div id="file_' + initial + '"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;">' + counter + '</strong></span> ' + this.files[initial].name + '&nbsp;&nbsp;</div>');
            }
        });
    }

    function tipo(id, idTipo) {

        var selected = ``;

        if (id == idTipo) {
            selected = `selected`;
        }
        return selected;
    }


    $('#lista_proyecto').on('change', function () {

        var idProyecto = $('#lista_proyecto').val();
        var htmlDesplegable = `<option value="" disabled="" selected="" hidden="">Seleccionar</option>`;

        $.post(RUTA + 'responsable/listaReponsableByProyecto', { idProyecto : idProyecto}, function (data, textStatus, xhr) {

            data.forEach((responsable) => {

                htmlDesplegable += `<option value="${responsable.dni}">${responsable.nombres}</option>`;
                
            });

            $(".dni_propietario").html(htmlDesplegable);


        }, "json");


    });


})