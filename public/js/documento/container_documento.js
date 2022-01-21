$(function () {

    const TOPS = 'tops';
    const SEGURIDAD = 'seguridad';
    const INCIDENCIA = 'incidencia';
    const OPT = 'opt';
    const IPERC = 'iperc';

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




    });
});