function htmlTopReport(json, proyecto, fecha_inicio, fecha_fin,nombreDocumento) {

    let list = ``;
    let amount = 1;

    json.result.forEach(element => {

        list += `<tr class="active-row">
        <td>${amount}</td>
        <td>${element.reportado}</td>
        <td>${element.proyecto}</td>
        <td>${element.area}</td>
        <td>${element.observadoLugar}</td>
        <td>${element.fase}</td>
        <td>${element.puestoObservado}</td>
        <td>${element.tiempoProyecto}</td>
        <td>${element.horarioObservacion}</td>
        <td>${element.rangoEdad}</td>
        <td>${element.fecha}</td>
        <td>${element.registro}</td>
        <td class="center">${element.observacion}</td>
        <td>${element.observacionDetalle}</td>    
        <td>${element.relacion}</td>
        <td>${element.otros}</td>
        <td>${element.tipoEpp}</td>
        <td>${element.condicionEpp}</td>
        <td>${element.descripcion}</td>
        <td>${element.medidas}</td>
        <td>${element.potencial}</td>
        <td class="center">${convertListPhotoToHtml(element.fotos)}</td>
        <td>${element.lesion}</td>
        <td>${element.obstaculo}</td>
        <td>${element.observadoCambio}</td>
        <td>${element.observadoRetroalimentacion}</td>
        <td>${element.observadoReincidente}</td>
        <td>${element.observadoComentario}</td>
    </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr class="active-row">
                        <th>ID</th>
                        <th width="90px">Reportado por</th>
                        <th>Proyecto</th>
                        <th>Área</th>
                        <th>Ubicación</th>
                        <th>Área Observada</th>
                        <th>Puesto del observado</th>
                        <th>Tiempo en el proyecto</th>
                        <th>Horario </th>
                        <th>Rango de edad</th>
                        <th>Fecha</th>
                        <th>Registro</th>
                        <th>Tipo de Observación</th>
                        <th>Detalle del Tipo de Observación</th>
                        <th>Relacionado con</th>
                        <th>Otros</th>
                        <th>Tipo de Epp</th>
                        <th>Condición del epp</th>
                        <th class="font_title_big">Descripción de la Observación Acto o condición/Casi Accidente</th>
                        <th class="font_title_big">Acción Inmediata (correctiva)/Que medidas correctivas se tomaron para
                            eliminar el acto o condición sub estandar</th>
                        <th>Potencial del Riesgo</th>
                        <th class="font_title_big">Evidencia de la observación/caso accidente encontrado(registro,imagen o
                            foto,otros)</th>
                        <th>Lesión</th>
                        <th>Obstaculo</th>
                        <th>Cambio observado</th>
                        <th>Retroalimentación </th>
                        <th>Reincidente</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    ${list}
                </tbody>
            </table>
    `;

    return contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable)


}


function htmlSeguridad(json, proyecto, fecha_inicio, fecha_fin,nombreDocumento) {

    let list = ``;
    let amount = 1;

    json.result.forEach(element => {

        list += `<tr class="active-row">
        <td>${amount}</td>
        <td>${element.proyecto}</td>
        <td>${element.areaNombre}</td>
        <td>${element.ubicacion}</td>
        <td>${element.fechaInspeccion}</td>
        <td>${element.registro}</td>
        <td>${element.inspeccionado}</td>
        <td>${element.tipo}</td>
        <td>${element.tipoObservacion}</td>
        <td>${element.condicion}</td>
        <td>${convertListPhotoToHtml(element.fotos)}</td>
        <td>${element.accion}</td>    
        <td>${element.clasificacion}</td>
        <td>${element.diasImplementacion}</td>
        <td>${element.fechaCumplimiento}</td>
        <td>${element.responsable}</td>
        <td>${element.seguimiento}</td>
    </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr>
                        <th width="20px">item</th>
                        <th width="140px">proyecto</th>
                        <th width="140px">área</th>
                        <th width="140px">ubicación</th>
                        <th width="90px">fecha de la inspección </th>
                        <th width="90px">registro </th>
                        <th width="20px">Inspección realizado por</th>
                        <th width="20px">tipo de inspección</th>
                        <th width="140px">tipo de observación</th>
                        <th width="20px">condición o acto subestandar</th>
                        <th width="250px">Evidencia</th>
                        <th width="250px">acción correctiva</th>
                        <th width="20px">clasificación</th>
                        <th width="150px">dias de implementación</th>
                        <th width="150px">fecha de implementación</th>
                        <th width="150px">responsable de la ejecución</th>
                        <th width="150px">seguimiento</th>

                        <th width="180px">evidencia de la acción correctiva</th>
                        <th width="240px">comentarios adicionales</th>
                    </tr>
                </thead>
                <tbody>
                    ${list}
                </tbody>
            </table>
    `;

    return contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable)
}

function htmlIncidencia(json, proyecto, fecha_inicio, fecha_fin,nombreDocumento){

    let list = ``;
    let amount = 1;

    json.result.forEach(element => {

        list += `<tr>
                    <td></td>
                    <td>${element.proyectoNombre}</td>
                    <td>${element.cliente}</td>
                    <td>${element.lugar}</td>
                    <td class="center">${element.fecha}</td>
                    <td class="center">${element.hora}</td>
                    <td>${element.descripcion}</td>
                    <td>${element.elaborado}</td>
                    <td class="center"><a href="${element.urlPdf}" target="_blank">PDF</td>
                </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr>
                        <th width="10px">Item</th>
                        <th width="20px">proyecto</th>
                        <th width="20px">cliente</th>
                        <th width="20px">lugar</th>
                        <th width="20px">fecha incidente</th>
                        <th width="20px">hora</th>
                        <th width="140px">descripción</th>
                        <th width="250px">Elaborado por</th>
                        <th width="20px">PDF</th>
                    </tr>
                </thead>
                <tbody>
                    ${list}
                </tbody>
            </table>
    `;

    return contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable);
}


function htmlOpt(json, proyecto, fecha_inicio, fecha_fin,nombreDocumento){

    let list = ``;
    let amount = 1;

    json.result.forEach(element => {

        list += `<tr>
                    <td></td>
                    <td>${element.opt.usuario_nombres} ${element.opt.usuario_apellidos}</td>
                    <td>${element.opt.proyecto_nombre}</td>
                    <td>${element.opt.area_nombre}</td>
                    <td class="center">${element.opt.ubicacion}</td>
                    <td class="center">${element.opt.area_observada_nombre}</td>
                    <td>${element.opt.tiempo_proyecto}</td>
                    <td>${element.opt.registro}</td>
                    <td>${element.opt.nombre}</td>
                    <td>${element.opt.tiempo_trabajo}</td>
                    <td>${element.opt.guardia}</td>
                    <td>${element.opt.ocupacion}</td>
                    <td>${element.opt.tarea}</td>
                    <td>${element.opt.responsable}</td>
                    <td>${element.opt.riesgoCritico}</td>
                    <td>${element.opt.petLog}</td>
                    <td>${element.opt.razon_opt}</td>
                    <td>${element.opt.oportunidades}</td>

                </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr>
                        <th width="20px">N° </th>
                        <th width="20px">Elaborado por </th>
                        <th width="20px">Proyecto</th>
                        <th width="20px">Área</th>
                        <th width="20px">Ubicación</th>
                        <th width="20px">Área Observada</th>
                        <th width="20px">Tiempo en el proyecto</th>
                        <th width="20px">Fecha</th>
                        <th width="20px">Nombre </th>
                        <th width="20px">Tiempo en el trabajo</th>
                        <th width="20px">Guardia </th>
                        <th width="20px">Ocupación</th>
                        <th width="20px">Tarea</th>
                        <th width="20px">Responsable</th>
                        <th width="20px">Riesgo crítico</th>
                        <th width="20px">Pet Log</th>
                        <th width="20px">Razón de la OPT</th>
                        <th width="20px">Oportunidades</th>
                    </tr>
                </thead>
                <tbody>
                    ${list}
                </tbody>
            </table>
    `;

    return contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable);
}

function htmlIperc(json, proyecto, fecha_inicio, fecha_fin,nombreDocumento){

    let list = ``;
    let amount = 1;

    json.result.forEach(element => {

        list += `<tr>
                    <td></td>
                    <td>${element.nombres_usuario} ${element.apellidos_usuario}</td>
                    <td>${element.nombre_proyecto}</td>
                    <td>${element.nombre_area}</td>
                    <td>${element.area_observada}</td>
                    <td>${element.ubicacion}</td>
                    <td>${element.nombre_tarea}</td> 
                    <td>${element.fecha}</td>
                    <td>${element.registro}</td>
                    <td>${element.empresa}</td>
                    <td>${element.tipoRiesgo}</td>

                </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr>
                    <th width="20px"> item </th>
                    <th width="100px"> Elaborado por </th>
                    <th width="100px"> Proyecto </th>
                    <th width="100px"> Área </th>
                    <th width="100px"> Área Observada</th>
                    <th width="100px"> Ubicación </th>
                    <th width="100px"> Tarea </th>
                    <th width="50px"> fecha </th>
                    <th width="50px"> registro </th>
                    <th width="100px"> Empresa </th>
                    <th width="50px"> Tipo riesgo crítico </th>
                    </tr>
                </thead>
                <tbody>
                    ${list}
                </tbody>
            </table>
    `;

    return contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable);
}


function contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable) {
    return `
    <div class="container_reporte scroll1">
    <div class="container_reporte_content">
        <div class="container_report_content_head">
                <div class="item_format">
                    <h3>Reportes</h3>
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

            <!--TITLE ELEMENT-->
            <div class="item_format">
                <label for="">Fecha : ${fecha_inicio} hasta ${fecha_fin}</label>
            </div>
            <br>
                <!--CONTENT ELEMENT-->
                <div class="item_format">
                    <select class="item_format_select" name="formato_reporte" id="formato_reporte">
                        <option value="1">Formato 1</option>
                        <option value="2">Formato 2</option>
                    </select>

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