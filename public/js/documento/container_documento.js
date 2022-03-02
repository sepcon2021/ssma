$(function () {

    const TOPS = 'tops';
    const SEGURIDAD = 'seguridad';
    const INCIDENCIA = 'incidencia';
    const OPT = 'opt';
    const IPERC = 'iperc';
    const PTAR = 'ptar';
    const GERENCIAL = 'gerencial';
    const SUSPENCION = "suspencion";
    const INSPECCION_BOTIQUIN = "inspeccion_botiquin";


    $(".click_documento").on("click", function () {

        console.log($(this).attr("codigo"));

        if ($(this).attr("codigo") == TOPS) {

            $.post(RUTA + 'top/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });

        }
        if ($(this).attr("codigo") == SEGURIDAD) {

            $.post(RUTA + 'seguridad/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });


        }
        if ($(this).attr("codigo") == INCIDENCIA) {

            $.post(RUTA + 'incidencias/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });

        }
        if ($(this).attr("codigo") == OPT) {

            $.post(RUTA + 'opt/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });



        }
        if ($(this).attr("codigo") == IPERC) {

            $.post(RUTA + 'ipercNuevo/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });


        }
        if ($(this).attr("codigo") == PTAR) {

            $.post(RUTA + 'ptar/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });


        }
        if ($(this).attr("codigo") == GERENCIAL) {

            $.post(RUTA + 'gerencial/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });


        }
        if ($(this).attr("codigo") == SUSPENCION) {

            $.post(RUTA + 'suspencion/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
        }
        if ($(this).attr("codigo") == INSPECCION_BOTIQUIN) {

            $.post(RUTA + 'inspeccionBotiquin/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });
        }



    });
});