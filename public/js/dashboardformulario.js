$(function() {

    const CODIGO_PROYECTO = sessionStorage.getItem('codigoProyecto');

    // Mostrar todas las capacitaciones

    $.post(RUTA + 'dashboardFormulario/listaExamenByFecha', {'codigoproyecto': CODIGO_PROYECTO}, function(data, textStatus, xhr) {

        var tablaExamenes = "";

        if (data.status == 200) {


            data.contenido.forEach(function(examen) {
                
                tablaExamenes +=  ` <tr> 
                    <td> ${examen.id} </td>
                    <td> ${examen.areaEmpresa} </td>
                    <td>  ${examen.tema} </td>
                    <td>  ${examen.fecha} </td>
                    </tr> `;


            });

            $("#listaExamen").append(tablaExamenes);

        }

        vistaPrevia();

    }, "json");



    function vistaPrevia() {


        $("#listaExamen tr").on("click", function (event) {
            event.preventDefault();

            sessionStorage.setItem("idExamen", $(this).find('td').eq(0).text());
            window.location.href = RUTA + "registro";

        });
    }






})