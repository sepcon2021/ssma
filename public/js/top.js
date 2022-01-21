$(function() {
    var other_selected = "";
    var epp_selected = "";
    var id_obser = "";
    var data_obser = "";
    var sw = false;


    $("#boxPotencial").hide();
    $("#boxMedida").hide();
    $("#box-subestandar").hide();

    $("#btnRegister").on('click', function(event) {
        event.preventDefault();

        if (!verificarCampos(sw, epp_selected, other_selected)) {
            return false;
        };

        $("#formTop").trigger('submit');
        $('.page').animate({ scrollTop: 0 }, 'slow');
    });

    $('#lista_proyecto').on('change', function() {
        
        var idProyecto = $('#lista_proyecto').val();
        tipoEntradaUbicacion(idProyecto);

    });

    function tipoEntradaUbicacion(idProyecto){

        if(idProyecto == 9){

            $("#ubicacion").html(`
            <label for="observado_lugar" class="obligatorio">Ubicación</label> 
            <select id="listaUbicacion" class="w75p"></select>
            <input type="hidden" name="observado_lugar" id="observado_lugar" class="w95p">
            `);


        }else{

            $("#ubicacion").html(`<label for="observado_lugar" class="obligatorio">Ubicación</label>
            <input type="text" name="observado_lugar" id="observado_lugar" class="w95p">`);

        }
        
    }


    //enviar formulario
    $("#formTop").on('submit', function(event) {
        /* Act on the event */

        var str = $(this).serialize();

        $.ajax({
            // URL to move the uploaded image file to server
            url: RUTA + 'top/subirImagen',
            // Request type
            type: "POST",
            // To send the full form data
            data: new FormData(this),
            contentType: false,
            processData: false,
            // UI response after the file upload  

            success: function(data) {
                
                if(data.trim()!="public/img/noimagen.jpg"){

                   str += "&ruta_foto=" + data.trim();

                }else{
                    str += "&ruta_foto=";
                }


                $.post(RUTA + 'top/guardarWeb', str, function(data, textStatus, xhr) {


                    console.log(data);

                    mostrarMensaje("msj_correcto", "Tarjeta Top Registrada");
                    $("#img_preview").attr('src', 'public/img/noimagen.jpg');
                    $("#formTop").trigger("reset");
                });
            }

        });

        return false;
    });



    $("#image_file").on("change", function(event) {
        if (-1 != $.inArray($("#image_file")[0].files[0].type, ["image/jpeg", "image/jpg","image/png"])) {
            var populateImg = new FileReader();
            populateImg.onload = previewImg;
            populateImg.readAsDataURL($("#image_file")[0].files[0]);
        }
    });



    $('#lista_proyecto,#lista_area, #txtFecha, #lista_area_observada ,#lista_horario,#lista_lesion,#lista_obstaculo').change(function() {
        $(this).parent().children('span').remove();
        return false;
    });

    $('#observado_lugar,#txtRepor,#txtFecha,#txtOtros,#txtPreve,#txtCorre').on('keyup', function(event) {
        event.preventDefault();
        /* Act on the event */
        $(this).parent().children('span').remove();
        return false;
    });

    $("#rgacsues label,#rgcosues label,#rgactseg label,#rgtipepp label,#rgconepp label,#rgrelac label,#rgPerdi label,#radio_observado_retroalimentacion label,#radio_observado_cambio label,#radio_observado_reincidente label")
        .on('click', function(event) {
            $(this).parent().children('span').remove();
        });

    //resetar el formulario
    $('#modeltop').on('reset', function(event) {
        $("#divActIns, #divConIns, #divActSeg, #divRelac, #divOtros, #divTipEpp, #divConEpp").hide();

        $('input[name=rbacsues],input[name=rbcosues],input[name=rbactseg],input[name=rbrelac],input[name=rbtipepp],input[name=rgconepp]')
            .prop('checked', false);

        $(".error_obligatorio").remove();

        $("#formtop").fadeOut();
    });


    //radios group
    $("#rgObser label").on('click', function(event) {

        id_obser = $(this).prev('input').attr('id');
        data_obser = $(this).prev('input').val();

        $(this).parent().children('span').remove();

        $("#divActIns, #divConIns, #divActSeg, #divRelac, #divOtros, #divTipEpp, #divConEpp").hide();

        $('input[name=rbacsues],input[name=rbcosues],input[name=rbactseg],input[name=rbrelac],input[name=rbtipepp],input[name=rgconepp]').parent().children('span').remove();
        $('input[name=rbacsues],input[name=rbcosues],input[name=rbactseg],input[name=rbrelac],input[name=rbtipepp],input[name=rgconepp]').prop('checked', false);

        switch (id_obser) {
            case 'rbObser01':
                $("#divActIns, #divRelac").fadeIn();
                $("#box-subestandar").fadeIn();
                
                $("#boxPotencial").fadeIn();
                $("#boxMedida").fadeIn();
                $("#contenidoJefe").fadeIn();

                //contenidoJefe

                sw = true;
                break;
            case 'rbObser02':
                $("#divConIns, #divRelac").fadeIn();
                $("#box-subestandar").hide();

                $("#boxPotencial").fadeIn();
                $("#boxMedida").fadeIn();
                $("#contenidoJefe").fadeIn();

                sw = true;
                break;
            case 'rbObser03':
                $("#divActSeg").fadeIn();
                $("#box-subestandar").hide();

                $("#boxPotencial").hide();
                $("#boxMedida").hide();
                $("#contenidoJefe").hide();

                sw = false;
                break;
        }
    });

    $("input[name=rbObser]").change(function(event) {
        /* Act on the event */
        data_obser = $("input[name=rbObser]:checked").val();
    });

    $("#divActIns label, #divConIns label, #divActSeg label").on('click', function(event) {
        other_selected = $(this).text();

        if (other_selected == "OTROS") {
            $("#divOtros").fadeIn();
        } else {
            $("#divOtros").hide();
        }

    });

    $("#rgrelac label").on('click', function(event) {

        epp_selected = $(this).text();

        if (epp_selected == "Epp") {
            $("#divTipEpp, #divConEpp").fadeIn();
        } else {
            $("#divTipEpp, #divConEpp").hide();
        }
    });

    $("#btnFoto").on('click', function(event) {
        event.preventDefault();

        $("#image_file").trigger('click');

        return false;
    });

    $("#btnCancel").on("click", function(event) {
        event.preventDefault();
        if ($("#ruta_foto").val() != "") {
            $.post(RUTA + 'top/deleteImg', { img: $("#ruta_foto").val() }, function(data, textStatus, xhr) {

            });
        }

        $("#formTop").trigger("reset");
        $("#img_preview").attr('src', 'public/img/noimagen.jpg');

        return false;
    });

    $("#btnPhoto").on("click", function(event) {
        event.preventDefault()

        $("#formTop").trigger('submit');

        return false;
    });


})

function verificarCampos(sw, epp_selected, other_selected) {
    var error_obligatorio = '<span class="error_obligatorio"><i><i class="fas fas-ban"></i> Este campo es obligatorio</i><span>'
    ret = true;

    if ($("#lista_proyecto").val() == "-1") {
        $("#lista_proyecto").parent().children('label').after(error_obligatorio);
        $("#lista_proyecto").focus();
        ret = false;
    }else if ($("#lista_area").val() == "1000") {
        $("#lista_area").parent().children('label').after(error_obligatorio);
        $("#lista_area").focus();
        ret = false;
    }else if ($("#observado_lugar").val() == "") {
        $("#observado_lugar").parent().children('label').after(error_obligatorio);
        $("#observado_lugar").focus();
        ret = false;
    } else if ($("#txtRepor").val() == "") {
        $("#txtRepor").parent().children('label').after(error_obligatorio);
        $("#txtRepor").focus();
        ret = false;
    } else if ($("#lista_area_observada").val() == "-1") {
        $("#lista_area_observada").parent().children('label').after(error_obligatorio);
        $("#lista_area_observada").focus();
        ret = false;
    } else if ($("#lista_horario").val() == "-1") {
        $("#lista_horario").parent().children('label').after(error_obligatorio);
        $("#lista_horario").focus();
        ret = false;
    } else if ($("#txtFecha").val() == "") {
        $("#txtFecha").parent().children('label').after(error_obligatorio);
        $("#txtFecha").focus();
        ret = false;
    } else if ($("input[name=rbObser]:checked").val() == undefined) {
        $("#rgObser").children('label').after(error_obligatorio);
        $("input[name=rbObser]").focus();
        ret = false;
    } else if ($("input[name=rbObser]:checked").val() == "01" && $("input[name=rbacsues]:checked").val() == undefined) {
        $("#rgacsues").children('label').after(error_obligatorio);
        $("#rbacsues01").focus();
        ret = false;
    } else if ($("input[name=rbObser]:checked").val() == "02" && $("input[name=rbcosues]:checked").val() == undefined) {
        $("#rgcosues").children('label').after(error_obligatorio);
        $("#rbcosues01").focus();
        ret = false;
    } else if ($("input[name=rbObser]:checked").val() == "03" && $("input[name=rbactseg]:checked").val() == undefined) {
        $("#rgactseg").children('label').after(error_obligatorio);
        $("#rbactseg01").focus();
        ret = false;
    } else if (sw && $("input[name=rbrelac]:checked").val() == undefined) {
        $("#rgrelac").children('label').after(error_obligatorio);
        $("#rbrelac01").focus();
        ret = false;
    } else if (epp_selected == "Epp" && $("input[name=rbtipepp]:checked").val() == undefined) {
        $("#rgtipepp").children('label').after(error_obligatorio);
        $("#rbtipepp01").focus();
        ret = false;
    } else if (epp_selected == "Epp" && $("input[name=rbconepp]:checked").val() == undefined) {
        $("#rgconepp").children('label').after(error_obligatorio);
        $("#rbconepp01").focus();
        ret = false;
    } else if ($("#txtOtros").val() == "" && other_selected == "OTROS") {
        $("#txtOtros").parent().children('label').after(error_obligatorio);
        $("#txtOtros").focus();
        ret = false;
    } /*else if ($("#txtPreve").val() == "") {
        $("#txtPreve").parent().children('label').after(error_obligatorio);
        $("#txtPreve").focus();
        ret = false;
    } else if ($("input[name=rbPerdi]:checked").val() == undefined) {
        $("#rgPerdi").children('label').after(error_obligatorio);
        $("input[name=rgPerdi]").focus();
        ret = false;
    }

    /*else if ($("#lista_lesion").val() == "-1") {
        $("#lista_lesion").parent().children('label').after(error_obligatorio);
        $("#lista_lesion").focus();
        ret = false;
    } else if ($("#lista_obstaculo").val() == "-1") {
        $("#lista_obstaculo").parent().children('label').after(error_obligatorio);
        $("#lista_obstaculon").focus();
        ret = false;
    } else if ($("input[name=observado_retroalimentacion]:checked").val() == undefined) {
        $("#radio_observado_retroalimentacion").children('label').after(error_obligatorio);
        $("input[name=radio_observado_retroalimentacion]").focus();
        ret = false;
    } else if ($("input[name=observado_cambio]:checked").val() == undefined) {
        $("#radio_observado_cambio").children('label').after(error_obligatorio);
        $("input[name=radio_observado_cambio]").focus();
        ret = false;
    } else if ($("input[name=observado_reincidente]:checked").val() == undefined) {
        $("#radio_observado_reincidente").children('label').after(error_obligatorio);
        $("input[name=radio_observado_reincidente]").focus();
        ret = false;
    }*/
    return ret;
}