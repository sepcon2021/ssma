$(function () {

    $("#btnRegister").on('click', function (event) {
        event.preventDefault();
        $("#formulario").trigger('submit');
        return false;
    });

    $("#formulario").on('submit', function (event) {

        event.preventDefault();

        //Enviamos el primer objeto del array
        var json = generarJson()[0];

        $.post(RUTA + 'inspeccionExtintor/insert', json, function (data, textStatus, xhr) {

            if (data.status == 200) {
                mostrarMensaje("msj_correcto", "Envio exitoso");
                $("#formulario").trigger("reset");
            } else {

            }

        }, "json");

        return false;
    });



    function generarJson() {

        var jsonGeneral = [];

        jsonGeneral.push({

            'id_tipo_inspeccion': $('#id_tipo_inspeccion').val(),
            'sede': $('#lista_proyecto').val(),
            'id_area': $('#lista_area').val(),
            'lugar_inspeccion': $('#lugar_inspeccion').val(),
            'fecha': $('#fecha').val(),
            'dni_responsable': $('.dni_propietario').val(),
            'observacion_uno': $('#observacion_uno').val(),
            'observacion_dos': $('#observacion_dos').val(),
            'observacion_tres': $('#observacion_tres').val(),
            'listaInspecciones': generarListaInspeccionesJson()

        });

        return jsonGeneral;

    }

    function generarListaInspeccionesJson() {

        var json = [];

        $('#tablaClasificacion tr').each(function (a, b) {
            var ubicacion = $('.ubicacion', b).val();
            var condicion = $('.condicion', b).val();
            var clasificacion = $('.calificacion', b).val();
            var accion_correctiva = $('.accion_correctiva', b).val();
            var dni_responsable = $('.dni_responsable', b).val();
            var fecha_cumplimiento = $('.fecha_cumplimiento', b).val();
            var seguimiento = $('.seguimiento', b).val();
            var archivos = $('.archivos', b).val();



            if (ubicacion != undefined) {

                if (ubicacion.length > 0) {

                    json.push({
                        'ubicacion': ubicacion,
                        'condicion': condicion,
                        'clasificacion': clasificacion,
                        'accion_correctiva': accion_correctiva,
                        'dni_responsable': dni_responsable,
                        'fecha_cumplimiento': fecha_cumplimiento,
                        'seguimiento': seguimiento,
                        'archivos': archivos

                    });
                }
            }



        });

        return json;
    }


    $("#tablaClasificacion").on("click", ".agregarEvidencia", function (event) {
        event.preventDefault();
        $("#popup-1").addClass("active");
        $(".loader").hide();
        escucharCambiosFile();

        var rowIndex = $(this).parent().parent().index();
        uploadAndUpdateFile(rowIndex);

        return false;

    })


    $(".clickPopup-close").click(function (event) {
        event.preventDefault();
        $("#popup-1").removeClass("active");
        $("#formpopup").trigger("reset");

    });



    function escucharCambiosFile() {


        var dropZoneId = "drop-zone";
        var buttonId = "clickHereMultifile";
        var mouseOverClass = "mouse-over";
        var dropZone = $("#" + dropZoneId);
        var inputFile = dropZone.find("input");
        var finalFiles = {};

        document.getElementById(dropZoneId).addEventListener("dragover", function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropZone.addClass(mouseOverClass);
            var x = e.pageX;
            var y = e.pageY;
            if (true) {
                inputFile.offset({
                    top: y - 15,
                    left: x - 100
                });
            }

        }, true);

        if (buttonId != "") {
            $("#" + buttonId).mousemove(function (e) {
                e.preventDefault();
                var x = e.pageX;
                var y = e.pageY;
                if (true) {
                    inputFile.offset({
                        top: y - 15,
                        left: x - 160
                    });
                }
            });
        }

        document.getElementById(dropZoneId).addEventListener("drop", function (e) {
            e.preventDefault();
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



    function uploadAndUpdateFile(index) {

        $("#btnUpdateDocumento").click(function (event) {
            event.preventDefault();
            $("#formpopup").trigger('submit');
            return false;
        });


        $("#formpopup").on('submit', function (event) {

            event.preventDefault();

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
                    JSON.parse(data).lista.forEach(archivo => {
                        listaArchivo += (archivo + ',');
                    });

                    console.log(listaArchivo);


                    $(`#tablaClasificacion tbody tr:eq(${index}) td:eq(8) textarea.archivos`).html(listaArchivo);


                    $("#formpopup").trigger("reset");
                    $("#popup-1").removeClass("active");
                    event.preventDefault();


                }
            });

            return false;
        });
    }


});

