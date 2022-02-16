function htmlTopReportSeguimiento(json, proyecto,nombreDocumento) {

    let list = ``;
    let amount = 1;

    json.contenido.forEach(accion => {

        list += `<tr class="active-row">
        <td>`+ accion.id + `</td>
        <td><a href="`+RUTA+`/public/photos/`+ accion.foto + `"  target="_blank">imagen</a></td>
        <td>`+ accion.peligroRiesgo + `</td>
        <td><a href="`+RUTA+`/`+ accion.hallazgo + `"  target="_blank">pdf</a></td>
        <td>`+ accion.accionPropuesta + `</td>
        <td>`+ accion.responsable + `</td>
        <td>`+ accion.fechaInicio + `</td>
        <td> `+ accion.fechaCompromiso + `</td>
        <td> `+ accion.fechaCumplimiento + `</td>
        <td>`+ accion.plazo + `</td>
        <td>`+ accion.frenteTrabajo + `</td>
        <td>`+ tipoEstado(accion.estado) + `</td>
        <td>`+ accion.comentario + `</td>
        <td>`+ listaEvidencia(accion.evidencia) + `</td>
        <td> <button value="`+ accion.id + `" class="detalle">detalle</button></td>
        </tr>`;

        amount++;

    });

    htmlTable = `
    <div>
        <div></div>
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
                    <th>Fecha compromiso</th>
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
            ${list}
            </tbody>
        </table>
    </div> `;

    return contentBody(proyecto, htmlTable,nombreDocumento)


}


function htmlSeguridadSeguimiento(json, proyecto,nombreDocumento) {


    let list = ``;
    let amount = 1;

    json.contenido.forEach(accion => {

        list += `<tr class="active-row">
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

        amount++;

    });

    htmlTable = `
    <div>
        <div></div>
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
            ${list}
            </tbody>
        </table>
    </div> `;

    return contentBody(proyecto, htmlTable,nombreDocumento)

}


function answerRiesgo(data){
    let answer = ""
    if(data == 1){
        answer = "Alto"
    }
    if(data == 2){
        answer = "Medio"
    }
    if(data == 3){
        answer = "Bajo"
    }
    return answer;
}


function answerBinary(data){
    if(data == 1){
        return "Si"
    }else{
        return "No"
    }
}


function typeAnswer(data){
    let answer = ""
    if(data == 1){
        answer = "Bueno"
    }
    if(data == 2){
        answer = "Require correción"
    }
    if(data == 3){
        answer = "Sin verificar"
    }
    return answer;
}

function contentBody(proyecto, htmlTable,nombreDocumento) {
    return `


    <div class="container_reporte scroll1">
    <div class="container_reporte_content">
        <div class="container_report_content_head">
                <div class="item_format">
                    <h3>Administrador seguimiento</h3>
                </div>
                <div class="item_format">
                    <a class="home_reporte" href="#">Inicio</a> <a href="#">/ ${nombreDocumento}</a>
                </div>
        </div>
        <div class="container_report_content_body">

            <br>
            <div class="box_format">

            <!--TITLE ELEMENT-->
            <div class="item_format">
                <label for="">Proyecto : ${proyecto}</label>
            </div>

            <br>
                <!--CONTENT ELEMENT-->
                <div class="item_format">
                    <button class="button_report_download" id="button_report_download">Descargar</button>

                </div>
                <!-- ERRROR ELEMENT -->
                <div class="item_format">
                    <p class="error_message" id="proyecto_error"></p>
                </div>
            </div>


            <br>
            ${htmlTable}
        </div>
    </div>
    <div class="container_reporte_sucess">

    </div>
    <div class="container_reporte_load">

    </div>
</div>



<div class="popup" id="popup-1">
		<div class="overlay"></div>
		<div class="content scroll1">
			<div class="popup_content">
				<div class="contenidoRepuesta">
					<img class="clickPopup-close" src="public/img/cancel.png">
				</div>
				<div class="boxPopup" id="title">
					<h1 id="item"></h1>
					<div id="estado"></div>
				</div>


				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Hallazgo</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
						<img id="hallazgo" src="public/img/pdf.png">
					</div>

				</div>
				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Peligro riesgo</label>
						<label for="">Evidencia</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
						<div id="foto"></div>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Acción propuesta</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="accion_propuesta"></p>
					</div>

				</div>


				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Fecha inicio</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="fecha_inicio"></p>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Fecha cumplimiento</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="fecha_cumplimiento"></p>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Plazo</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="plazo"></p>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Frente de trabajo</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="frente_trabajo"></p>
					</div>

				</div>


				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Comentarios</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="comentario"></p>
					</div>

				</div>

				
				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Avance / evidencia</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<div id="evidencia"></div>
					</div>

				</div>

				<div class="box_format">

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<table id="tablaSeguimiento" class="styled-table"></table>
					</div>

				</div>
			</div>
		</div>
	</div>

    `;
}

function convertListPhotoToHtml(list) {

    let listPhoto = list.split(",")
    let htmlPhoto = ``;

    listPhoto.forEach(element => {
        htmlPhoto += `<img class="img_report" src="${RUTA}public/photos/${element}">`
    });

    return htmlPhoto;

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

 
 function listaEvidencia(lista) {

    var documentos =  ` `;

    lista.forEach(evidencia => {

        documentos += `<a href="`+RUTA+`/public/file/` + evidencia.nombre + `"  target="_blank">`+evidencia.nombre+`</a> <br>`;
    });

    return documentos;
}