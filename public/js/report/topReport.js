function htmlTopReport(json,proyecto,fecha_inicio,fecha_fin){

    let htmlContent = ``;
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

    htmlContent = `
    <div class="container_reporte scroll1">
    <div class="container_reporte_content">
        <div class="container_report_content_head">
                <div class="item_format">
                    <h3>Reportes</h3>
                </div>
                <div class="item_format">
                    <a class="home_reporte" href="#">Inicio</a> <a href="#">/ Tops</a>
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
        </div>
    </div>
    <div class="container_reporte_sucess">

    </div>
    <div class="container_reporte_load">

    </div>
</div>
    `;

    return htmlContent;

}

function convertListPhotoToHtml(list){

    let listPhoto = list.split(",")
    let htmlPhoto = ``;

    listPhoto.forEach(element => {
        htmlPhoto += `<img class="img_report" src="${RUTA}public/photos/${element}">`
    });

    return htmlPhoto;

}

