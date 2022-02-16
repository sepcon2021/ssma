$(document).ready(function () {


    tabArchivos('') 

    $('ul.tabs li a:first').addClass('active');
    $('.secciones article').hide();
    $('.secciones article:first').show();

    $('ul.tabs li a').click(function () {

        $('ul.tabs li a').removeClass('active');
        $(this).addClass('active');
        $('.secciones article').hide();

        var activeTab = $(this).attr('href');

        if (activeTab === "#tab4") {
            tabArchivos('');
        }


        $(activeTab).show();
        return false;
    });




    /**
 *  DASHBOARD
 */


    function tabArchivos(mensaje) {

        //const DNI = '45547517';
        const ETIQUETA = "tab4";

        document.getElementById(ETIQUETA).innerHTML = "";


        $.ajax({
            type: 'POST',
            url: RUTA + 'seguimiento/listaAccionDetalle',
            data: {}
        })
            .done(function (jsonAcciones) {


                createContenidoAccionArchivo(jsonAcciones, ETIQUETA, mensaje);

            })
            .fail(function () {
                alert('Hubo un errror al cargar las listas_rep')
            });
    }



    function createContenidoAccionArchivo(jsonAcciones, etiqueta, mensaje) {

        var listaAcciones = ` `;

        if (jsonAcciones.status == 200) {

            jsonAcciones.contenido.forEach(accion => {
                listaAcciones += `<tr class="active-row">
                    <td>`+ accion.id + `</td>
                    <td><a href="`+RUTA+`/public/photos/`+ accion.foto + `"  target="_blank">imagen</a></td>
                    <td>`+ accion.peligroRiesgo + `</td>
                    <td><a href="`+RUTA+`/`+ accion.hallazgo + `"  target="_blank">pdf</a></td>
                    <td>`+ accion.accionPropuesta + `</td>
                    <td>`+ accion.responsable + `</td>
                    <td>`+ accion.fechaInicio + `</td>
                    <td> `+ accion.fechaCumplimiento + `</td>
                    <td>`+ accion.plazo + `</td>
                    <td>`+ accion.frenteTrabajo + `</td>
                    <td>`+ tipoEstado(accion.estado) + `</td>
                    <td>`+ accion.comentario + `</td>
                    <td>`+ listaEvidencia(accion.evidencia) + `</td>
                    <td> <button value="`+ accion.id + `" class="detalle">detalle</button></td>
                    </tr>`;

            });

        }

        var tableAcciones = `
            <div>
                <div>`+ mensaje + `</div>
                <table id="table_espera" class="styled-table">
                    <thead>
                        <tr class="active-row">
                            <th>Item</th>
                            <th>Foto</th>
                            <th>Peligro riesgo</th>
                            <th>Hallazgo</th>
                            <th>Acción propuesta</th>
                            <th>Responsable</th>
                            <th>Fecha inicio</th>
                            <th>Fecha cumplimiento</th>
                            <th>Plazo</th>
                            <th>Frente de trabajo</th>
                            <th>Estado</th>
                            <th>Comentarios</th>
                            <th>Avance / Evidencia</th>
                            <th> detalle </th>
                        </tr>
                    </thead>
                    <tbody>
                    `+ listaAcciones + `
                    </tbody>
                </table>
            </div> `;

        document.getElementById(etiqueta).innerHTML = tableAcciones;

        detalle();


    }


    function listaEvidencia(lista) {

        var documentos =  ` `;

        lista.forEach(evidencia => {

            documentos += `<a href="`+RUTA+`/public/file/` + evidencia.nombre + `"  target="_blank">`+evidencia.nombre+`</a> <br>`;
        });

        return documentos;
    }


    function tipodocumento(lista){
        var documentos =  ` `;
        var index = 1;
        lista.forEach(evidencia => {
            documentos += `<img class="fotoEvidencia2" id="`+index+`" `+tipoDocumentoLogo(evidencia.nombre)+`>`;
            index++;
        });

        return documentos;
    }

    function tipoDocumentoLogo(nombre){

        var imgHtml = '';

        console.log(nombre);

        if(nombre.includes("pdf")){
            imgHtml = 'src="public/img/pdf.png"'
        }
        if(nombre.includes("xlsx")){
            imgHtml = 'src="public/img/excel.png"'
        }
        if(nombre.includes("docx")){
            imgHtml = 'src="public/img/word.png"'
        }
        if(nombre.includes("jpg") || nombre.includes("png")){
            imgHtml = 'src="public/photos/'+nombre+'"'
        }
        return imgHtml;

    }

    function evidenciaClick(lista){
        var index = 1;
        lista.forEach(evidencia => {
            $("#"+index).on("click", function (event) {
                event.preventDefault();
                window.open(RUTA + '/public/file/' + evidencia.nombre)
                return false;
            });
            index++;
        });
    }


    // 1. CLICK SOBRE agregar observacion
    function detalle() {

        $("#table_espera").on("click", ".detalle", function (event) {
            event.preventDefault();

            var idSeguimiento = $(this).val();


            $.ajax({
                type: 'POST',
                url: RUTA + 'seguimiento/listaAccionDetalleById',
                data: {"idseguimiento" : idSeguimiento}
            })
                .done(function (jsonSeguimientoDetalle) {

                    $("#popup-1").addClass("active");
                    $(".loader").hide();

                    contenidoPopUp(jsonSeguimientoDetalle.contenido[0]);

                })
                .fail(function () {
                    alert('Hubo un errror al cargar las listas_rep')
                });

            return false;
        })

        function contenidoPopUp(jsonSeguimientoDetalle){

            console.log(jsonSeguimientoDetalle);

            $("#item").text('Item '+jsonSeguimientoDetalle.id);
            //$("#hallazgo").text(jsonSeguimientoDetalle.hallazgo);
            $("#peligro_riesgo").text(jsonSeguimientoDetalle.peligroRiesgo);
            //$("#foto").text(jsonSeguimientoDetalle.foto);
            
            //document.getElementById("foto").innerHTML = verificarFotoEvidencia(jsonSeguimientoDetalle.foto);
            $("#accion_propuesta").text(jsonSeguimientoDetalle.accionPropuesta);
            $("#responsable").text(jsonSeguimientoDetalle.responsable);
            $("#fecha_inicio").text(jsonSeguimientoDetalle.fechaInicio);
            $("#fecha_cumplimiento").text(jsonSeguimientoDetalle.fechaCumplimiento);
            $("#plazo").text(jsonSeguimientoDetalle.plazo);
            $("#frente_trabajo").text(jsonSeguimientoDetalle.frenteTrabajo);
            
            //$("#estado").text(jsonSeguimientoDetalle.estado);
            document.getElementById("estado").innerHTML = tipoEstado(jsonSeguimientoDetalle.estado);

            $("#comentario").text(jsonSeguimientoDetalle.comentario);

            document.getElementById("evidencia").innerHTML =  tipodocumento(jsonSeguimientoDetalle.evidencia);


            var listaEstadosDetalle = ``;

            jsonSeguimientoDetalle.listaEstados.forEach( seguimientoDetalle =>{

                listaEstadosDetalle += `<tr class="active-row">
                <td>`+ seguimientoDetalle.responsable + `</td>
                <td>`+ seguimientoDetalle.estado + `</td>
                <td>`+ seguimientoDetalle.fecha + `</td>
                </tr>`;

            });

            var tableEstados = `
                    <thead>
                        <tr class="active-row">
                            <th>Responsable</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                    `+ listaEstadosDetalle + `
                    </tbody>
                `;


        document.getElementById("tablaSeguimiento").innerHTML = tableEstados;

        botonDescargarContenido(jsonSeguimientoDetalle);

        evidenciaClick(jsonSeguimientoDetalle.evidencia);

        }

        // 8. Cerramos el popup
        $(".clickPopup-close").click(function (event) {
            event.preventDefault();

            $("#popup-1").removeClass("active");

            return false;

        });
    }

    function verificarFotoEvidencia(foto){

        let listPhoto = foto.split(",")
        let htmlFoto = ``;
        let number = 1;

        listPhoto.forEach((photo) => {
            if(photo.length > 0){
                htmlFoto = `<img class="fotoEvidencia" src="${RUTA}/public/photos/${photo}"  id="fotoEvidencia" >
                            <a href="${RUTA}/public/photos/${photo}" target="_blank" >evidencia${number} </a>
                `;
                number++;
            }
            
        });
        return htmlFoto;
    }


    function botonDescargarContenido(jsonSeguimientoDetalle) {
 
        $("#hallazgo").on("click", function (event) {
            event.preventDefault();
            window.open(jsonSeguimientoDetalle.hallazgo)
            return false;
        });

        $("#fotoEvidencia").on("click", function (event) {
            event.preventDefault();
            window.open(RUTA + '/public/photos/' + jsonSeguimientoDetalle.foto)
            return false;
        });
 
     }

     function tipoEstado(estado){

        var htmlEstado = '';

        if(estado.trim() == "Asignado" ){
            htmlEstado = '<div class="yellowEstado">'+estado+'</div>';
        }
        if(estado.trim() == "Aceptado" || estado == "Proceso"){
            htmlEstado = '<div class="greenEstado">'+estado+'</div>';
        }
        if(estado.trim() == "Finalizado"){
            htmlEstado = '<div class="redEstado">'+estado+'</div>';
        }


        return htmlEstado;
     }

});