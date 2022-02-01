$(function() {


    const CODIGO_PROYECTO = sessionStorage.getItem('codigoProyecto');
    const NOMBRE_PROYECTO = sessionStorage.getItem('nombreProyecto');

    const IDAREA_EMPRESA = sessionStorage.getItem('idAreaEmpresa');
    const NOMBRE_AREA_EMPRESA = sessionStorage.getItem('nombreAreaEmpresa');


    $("#nombreProyecto").text(NOMBRE_PROYECTO);

    $("#nombreAreaEmpresa").text( NOMBRE_AREA_EMPRESA);

    $("#codigoproyecto").val(CODIGO_PROYECTO);

    $("#idareaempresa").val(IDAREA_EMPRESA);

    // Mostrar todas las capacitaciones

    $.post(RUTA + 'formulario/listaExamenDetalle', {codigoproyecto :CODIGO_PROYECTO , idAreaEmpresa : IDAREA_EMPRESA}, function(data, textStatus, xhr) {

        var tablaExamenes = "";

        if (data.status == 200) {


            data.contenido.forEach(function(examen) {

                tablaExamenes += `<tr> 
                    <td>` + examen.id + `</td>
                    <td class="w75p">` + examen.tema + `</td>
                    <td>` + examen.fecha + `</td>
                    </tr>`;

            });

            $("#listaExamen").append(tablaExamenes);

        }

        editarExamen();

    }, "json");




    function editarExamen() {

        $("#listaExamen tr").on("click", function (event) {
            event.preventDefault();

            sessionStorage.setItem("idExamenEditar", $(this).find('td').eq(0).text());
            //window.location.href = RUTA + "editar";


            $.post(RUTA + 'administradorExamen/renderEditar', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });

        });

    }


    $("#botonEnviar").on('click', function(event) {
        event.preventDefault();

        $("#formCrearCapacitacion").trigger('submit');

    });


    $("#formCrearCapacitacion").on('submit', function(event) {

        var str = $(this).serialize();

        console.log(str);
        $.post(RUTA + 'formulario/crearFormulario', str, function(data, textStatus, xhr) {

            if (data.status == 200) {

                console.log(data.contenido);
                //Guardamos los datos devueltos por la consulta
                sessionStorage.setItem("idExamenEditar", data.contenido);
                //window.location.replace(RUTA + "formulario");

                //window.location.href = RUTA + "editar";
                $.post(RUTA + 'administradorExamen/renderEditar', function (data, textStatus, xhr) {
                    $(".mainpage").html(data);
                });

            } else {

            }

        }, "json");

        return false;
    });


    $(".home_document").on("click",function(){
    
        var result = confirm("¿Quieres volver al inicio?");

        if(result)  {
            $.post(RUTA + 'capacitacion/render', function (data, textStatus, xhr) {
                $(".mainpage").html(data);
            });    
        } 

    });

})