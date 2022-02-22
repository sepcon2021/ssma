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
        <td>${element.fechaInspeccion}</td>
        <td>${element.inspeccionRealizada}</td>
        <td>${element.tipoInspeccion}</td>
        <td>${element.condicionActo}</td>
        <td>${element.descripcionCondicionActo}</td>
        <td>${convertListPhotoToHtml(element.evidenciaEncontrada)}</td>
        <td>${element.accionCorrectiva}</td>
        <td>${element.clasificacion}</td>
        <td>${element.diasImplementacion}</td>   
        <td>${element.fechaImplementacion}</td> 
        <td>${element.responsableEjecucion}</td>
        <td></td>
        <td>${element.comentariosAdicionales}</td>
        <td>${element.area}</td>
        <td>${element.ubicacion}</td>
        <td>${element.tipoCondicionActo}</td>
        <td>${element.responsableArea}</td>
    </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr>
                        <th width="20px">item</th>
                        <th width="140px">proyecto</th>
                        <th width="140px">fecha de la inspeccion</th>
                        <th width="140px">inspección realizada por</th>
                        <th width="90px">tipo de inspección </th>
                        <th width="90px">condición o acto subestandar </th>
                        <th width="20px">decripción del acto u conción sub estandar encontrado</th>
                        <th width="20px">evidencia de lo encontrado</th>
                        <th width="140px">acción correctiva</th>
                        <th width="20px">clasificación</th>
                        <th width="250px">dias de implementación</th>
                        <th width="250px">fecha de implementación</th>
                        <th width="20px">responsable de la ejecución</th>
                        <th width="150px">evidencia de la acción correctiva</th>
                        <th width="150px">comentarios adicionales</th>
                        <th width="150px">área</th>
                        <th width="150px">ubicación</th>
                        <th width="180px">tipo de condición o acto sub estandar</th>
                        <th width="240px">responsable del área</th>
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

function htmlPtar(json, proyecto, fecha_inicio, fecha_fin,nombreDocumento){

    let list = ``;
    let amount = 1;

    json.result.forEach(element => {

        list += `<tr>
                    <td></td>
                    <td>${element.proyecto}</td>
                    <td>${element.area}</td>
                    <td>${element.ubicacion}</td>
                    <td>${element.usuario}</td>
                    <td>${element.fase}</td>
                    <td>${element.cliente}</td> 
                    <td>${element.semana}</td>
                    <td>${element.registro}</td>

                    <td>${element.observacionPt1}</td>
                    <td>${element.observacionPt2}</td>
                    <td>${element.observacionPt3}</td>
                    <td>${element.observacionPt4}</td>
                    <td>${element.observacionPt5}</td>
                    <td>${element.observacionPt6}</td>
                    <td>${element.observacionPt7}</td>
                    <td>${element.observacionPt8}</td>
                    <td>${element.observacionPt9}</td>
                    <td>${element.observacionPt10}</td>
                    <td>${element.observacionPt11}</td>

                    <td>${element.observacionAst1}</td>
                    <td>${element.observacionAst2}</td>
                    <td>${element.observacionAst3}</td>
                    <td>${element.observacionAst4}</td>
                    <td>${element.observacionAst5}</td>
                    <td>${element.observacionAst6}</td>
                    <td>${element.observacionAst7}</td>
                    <td>${element.observacionAst8}</td>
                    <td>${element.observacionAst9}</td>
                    <td>${element.observacionAst10}</td>
                    <td>${element.observacionAst11}</td>
                    <td>${element.observacionAst12}</td>

                    <td>${element.observacionAstDetalle10}</td>
                    <td>${element.observacionAstDetalle11}</td>
                    <td>${element.observacionAstDetalle12}</td>


                </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr>
                    <th width="20px"> item </th>
                    <th width="100px"> Proyecto</th>
                    <th width="100px"> Área </th>
                    <th width="100px"> Ubicación</th>
                    <th width="100px"> Usuario </th>
                    <th width="100px"> Fase </th>
                    <th width="50px"> Cliente </th>
                    <th width="50px"> Semana </th>
                    <th width="100px"> registro </th>

                    <th width="100px"> Datos generales y/o tarea a realizar mal llenados o incompletos.	 </th>
                    <th width="100px"> No se cuenta con los procedimientos, instructivos u otros documentos
                    operativos aplicables a los trabajos a ejecutar. </th>
                    <th width="100px"> Mala o incompleta selección de equipos contra incendio.	 </th>
                    <th width="100px"> Mala o incompleta selección del EPP.	 </th>
                    <th width="100px"> Lista de verificación incompleta o mal llenada.	 </th>
                    <th width="100px"> No se realizó prueba de explosividad /No se firmó.	 </th>
                    <th width="100px"> Mal efectuada y/o incompleta comprobación del equipo a entregar.	 </th>
                    <th width="100px"> No tomó conocimiento el Sup o Resp del área colindante (de ser necesario).	 </th>
                    <th width="100px"> Firmas no autorizadas y/o incompletas en PT.	 </th>
                    <th width="100px"> No se registró hora de apertura/cierre del PT por los responsables.	 </th>
                    <th width="100px"> No se cerró adecuadamente el PT (según aplique).	 </th>

                    <th width="100px"> Datos generales y/o tarea a realizar mal llenados o incompletos.	 </th>
                    <th width="100px"> Análisis Seguro de Trabajo (o similar) faltante.	 </th>
                    <th width="100px"> Descripción de las etapas de la tarea mal elaboradas o faltantes.	</th>
                    <th width="100px"> Firmas incompletas de trabajadores involucrados en la tarea.	 </th>
                    <th width="100px"> No coincide número de personas de PT y AST.	 </th>
                    <th width="100px"> Valoración no adecuada o incorrecta de la Severidad / Probabilidad al
                    peligro/aspecto asociado </th>
                    <th width="100px"> Peligros / aspectos mal identificados o insuficientes.	 </th>
                    <th width="100px"> Descripción de medidas de control no apropiadas para el peligro/aspecto y
                    riesgo/impacto asociado a la tarea. </th>
                    <th width="100px"> Medidas de control no implementadas o insuficientes.	 </th>
                    <th width="100px"> Otros </th>
                    <th width="100px"> Otros </th>
                    <th width="100px"> Otros </th>

                    <th width="100px"> Otros detalle 1 </th>
                    <th width="100px"> Otros detalle 2 </th>
                    <th width="100px"> Otros detalle 3 </th>

                    </tr>
                </thead>
                <tbody>
                    ${list}
                </tbody>
            </table>
    `;

    return contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable);
}


function htmlGerencial(json, proyecto, fecha_inicio, fecha_fin,nombreDocumento){

    let list = ``;
    let amount = 1;

    json.result.forEach(element => {

        list += `<tr>
                    <td></td> 
                    <td>${element.usuario }</td> 
                    <td>${element.proyecto }</td> 
                    <td>${element.razonsocial }</td> 
                    <td>${element.ruc }</td> 
                    <td>${element.domicilio }</td> 
                    <td>${element.acteconomica }</td> 
                    <td>${element.responsable1 }</td> 
                    <td>${element.numeroTrabajadores}</td> 
                    <td>${element.areasinspeccion }</td> 
                    <td>${element.fechainspeccion}</td> 
                    <td>${element.responsableInspeccion }</td> 
                    <td>${element.tipoInspeccion }</td> 
                    <td>${element.otros }</td> 
                    <td>${element.notas }</td> 
                    <td>${element.visita }</td> 

                    <td>${typeAnswer(element.saludOcupacional1)}</td> 
                    <td>${element.saludOcupacionalDetalle1 }</td> 
                    <td>${typeAnswer(element.saludOcupacional2)}</td> 
                    <td>${element.saludOcupacionalDetalle2 }</td> 
                    <td>${typeAnswer(element.saludOcupacional3)}</td> 
                    <td>${element.saludOcupacionalDetalle3 }</td> 
                    <td>${typeAnswer(element.saludOcupacional4)}</td> 
                    <td>${element.saludOcupacionalDetalle4 }</td> 
                    <td>${typeAnswer(element.saludOcupacional5)}</td> 
                    <td>${element.saludOcupacionalDetalle5 }</td> 
                    <td>${typeAnswer(element.saludOcupacional6)}</td> 
                    <td>${element.saludOcupacionalDetalle6 }</td> 
                    <td>${typeAnswer(element.saludOcupacional7)}</td> 
                    <td>${element.saludOcupacionalDetalle7 }</td> 
                    <td>${typeAnswer(element.saludOcupacional8)}</td> 
                    <td>${element.saludOcupacionalDetalle8 }</td> 
                    <td>${typeAnswer(element.seguridad1)}</td> 
                    <td>${element.seguridadDetalle1 }</td> 
                    <td>${typeAnswer(element.seguridad2)}</td> 
                    <td>${element.seguridadDetalle2 }</td> 
                    <td>${typeAnswer(element.seguridad3)}</td> 
                    <td>${element.seguridadDetalle3 }</td> 
                    <td>${typeAnswer(element.seguridad4 )}</td> 
                    <td>${element.seguridadDetalle4 }</td> 
                    <td>${typeAnswer(element.seguridad5)}</td> 
                    <td>${element.seguridadDetalle5 }</td> 
                    <td>${typeAnswer(element.seguridad6)}</td> 
                    <td>${element.seguridadDetalle6 }</td> 
                    <td>${typeAnswer(element.seguridad7)}</td> 
                    <td>${element.seguridadDetalle7 }</td> 
                    <td>${typeAnswer(element.seguridad8 )}</td> 
                    <td>${element.seguridadDetalle8 }</td> 
                    <td>${typeAnswer(element.seguridad9)}</td> 
                    <td>${element.seguridadDetalle9 }</td> 
                    <td>${typeAnswer(element.seguridad10 )}</td> 
                    <td>${element.seguridadDetalle10 }</td> 
                    <td>${typeAnswer(element.seguridad11 )}</td> 
                    <td>${element.seguridadDetalle11 }</td> 
                    <td>${typeAnswer(element.medioAmbiente1)}</td> 
                    <td>${element.medioAmbienteDetalle1 }</td> 
                    <td>${typeAnswer(element.medioAmbiente2 )}</td> 
                    <td>${element.medioAmbienteDetalle2 }</td> 
                    <td>${typeAnswer(element.medioAmbiente3 )}</td> 
                    <td>${element.medioAmbienteDetalle3 }</td> 
                    <td>${typeAnswer(element.medioAmbiente4 )}</td> 
                    <td>${element.medioAmbienteDetalle4 }</td> 
                    <td>${typeAnswer(element.medioAmbiente5)}</td> 
                    <td>${element.medioAmbienteDetalle5}</td> 

                    
                    <td>${element.conclusiones }</td> 
                    <td>${element.responsabletrabajo }</td> 
                    <td>${element.responsablecargo }</td> 
                    <td>${element.fecharegistro}</td> 

                </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr>
                        <th rowspan="2"></th>
                        <th rowspan="2">Usuario</th>
                        <th rowspan="2">Proyecto</th>
                        <th rowspan="2">Razón Social</th>
                        <th rowspan="2">RUC</th>
                        <th rowspan="2">Domicilio</th>
                        <th rowspan="2">Tipo de actividad económica</th>
                        <th rowspan="2">Responsables de las áreas inspeccionadas</th>
                        <th rowspan="2">Nro de trabajadores en el Proyecto / Sede</th>
                        <th rowspan="2">Areas inspeccionadas</th>
                        <th rowspan="2">Fechas de inspección</th>
                        <th rowspan="2">Responsable de la inspección</th>
                        <th rowspan="2">Tipo de inspección</th>
                        <th rowspan="2">Otros</th>
                        <th rowspan="2">Notas</th>
                        
                        <th rowspan="2">B. OBJETIVO (VISITA DE LA INSPECCIÓN INTERNA)</th>
                        <th colspan="48">C. RESULTADOS DE LA INSPECCIÓN:</th>
                        <th rowspan="2">D. CONCLUSIONES Y RECOMENDACIONES</th>
                        <th colspan="3">E. RESPONSABLE DEL REGISTRO</th>
                    </tr>
                    <tr>

                        <th >Ord./Limp. Comedor	</th>
                        <th> detalle</th>
                        <th >Ord./Limp. Cocina	</th>
                        <th> detalle</th>
                        <th >Aseo y uso de EPP del Personal de Catering	 </th>
                        <th> detalle</th>
                        <th>Limp. Depósito / Alimentos / Agua Potable	 </th>
                        <th> detalle</th>
                        <th>Calidad de Alimentación	 </th>
                        <th> detalle</th>
                        <th>Hig./Ord./Limp. Consultorio Médico	 </th>
                        <th> detalle</th>
                        <th>Cantidad / Surtido de Medicamentos	 </th>
                        <th> detalle</th>
                        <th>Ord./Limp. Dormitorios	 </th>
                        <th> detalle</th>
                        <th> Las Políticas son las vigentes y están disponibles.	</th>
                        <th> detalle</th>
                        <th> Se realiza la Inducción Inicial para Visitantes	</th>
                        <th> detalle</th>
                        <th>Se realiza el Analisis de Riesgo/Permiso de Trabajo/Charla Diaria para todas las Actividades	 </th>
                        <th> detalle</th>
                        <th>Se evidencia el llenado de Tarjetas TOP	 </th>
                        <th> detalle</th>
                        <th> Los Planes de Emergencia / MEDEVAC están actualizados y disponibles.	</th>
                        <th> detalle</th>
                        <th>Estado y adecuado uso de EPP por los Trabajadores	 </th>
                        <th> detalle</th>

                        <th> Señal./Ord./Limp. Campamento / Talleres/Areas Operativas.	</th>
                        <th> detalle</th>

                        <th> Señal./Ord./Limp. Área de Trabajo	</th>
                        <th> detalle</th>

                        <th>Estado de Extintores, Botiquines, Camillas,Lava ojos	 </th>
                        <th> detalle</th>
                        <th>Estado de Máquinas / Herramientas	 </th>
                        <th> detalle</th>

                        <th>Estado y uso de Protectores / Guardas de los Equipos	 </th>
                        <th> detalle</th>

                        <th> Estado de los depósitos de residuos	</th>
                        <th> detalle</th>

                        <th>Clasificación / Segregación de los Residuos	 </th>
                        <th> detalle</th>

                        <th>Tratamiento / Descarga de Aguas Residuales	 </th>
                        <th> detalle</th>
                        <th>La Disposición de equipos de emergencia para derrames	 </th>
                        <th> detalle</th>

                        <th>Depósitos de combustibles y lubricantes	 </th>
                        <th> detalle</th>

                        <th>Responsable Frente/Área de Trabajo  </th>
                        <th> Cargo </th>
                        <th> Fecha</th>

                    </tr>

                </thead>
                <tbody>
                    ${list}
                </tbody>
            </table>
    `;

    return contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable);
}


function htmlSuspencion(json, proyecto, fecha_inicio, fecha_fin,nombreDocumento){

    let list = ``;
    let amount = 1;
    

    console.log("Data")
    console.log(json.result);

    json.result.forEach(element => {

        list += `<tr>
                    <td>${element.proyecto }</td> 
                    <td>${element.fase }</td> 
                    <td>${element.responsable }</td> 
                    <td>${element.cargo }</td> 
                    <td>${element.fecha }</td> 
                    <td>${element.hora }</td> 
                    
                    <td>${answerBinary(element.conduccion)}</td> 
                    <td>${answerBinary(element.ptar )}</td> 
                    <td>${answerBinary(element.confinados)}</td> 
                    <td>${answerBinary(element.energias )}</td> 
                    <td>${answerBinary(element.excavaciones )}</td> 
                    <td>${answerBinary(element.altura )}</td> 
                    <td>${answerBinary(element.caliente)}</td> 
                    <td>${answerBinary(element.izaje)}</td> 

                    <td>${element.otros}</td> 
                    <td>${element.descripcion }</td> 
                    <td>${element.acciones }</td> 
                    
                    <td>${answerRiesgo(element.riesgo)}</td> 

                    <td>${element.duracion}</td> 
                    <td>${element.jefe}</td> 
                    <td>${element.numeroPersonas}</td> 
                    <td>${element.observaciones}</td> 
                    <td>${element.usuario}</td> 
                    <td>${element.registro}</td> 

                </tr>`;

        amount++;

    });

    htmlTable = `
                <table id="topsTableNuevo" class="styled-table">
                <thead>
                    <tr>
                        <th>Proyecto</th>
                        <th>Fase</th>
                        <th> Responsable</th>
                        <th>Cargo</th>
                        <th>Fecha</th>
                        <th>Hora</th>

                        <th>CONDUCCIÓN SEGURA </th>
                        <th>PERMISO DE TRABAJO Y AST </th>
                        <th>ESPACIOS CONFINADOS</th>
                        <th>ENERGÍAS PELIGROSAS </th>
                        <th>EXCAVACIONES</th>
                        <th>TRABAJOS EN ALTURA</th>
                        <th>TRABAJOS EN CALIENTE </th>
                        <th>OPERACIONES DE IZAJE</th>

                        <th>Otros</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                        <th>Riesgo</th>
                        <th>Tiempo de duración de la suspención </th>
                        <th>Nombres del Jefe Directo / Cargo</th>
                        <th>N° personas en el frente / Área de Trabajo</th>
                        <th>Observaciones</th>
                        <th>Usuario</th>
                        <th>registro</th>

                    </tr>

                </thead>
                <tbody>
                    ${list}
                </tbody>
            </table>
    `;

    return contentBody(proyecto, fecha_inicio, fecha_fin,nombreDocumento, htmlTable);
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

        console.log("size");
        console.log(element.length);
        if(element.length != 0){
            htmlPhoto += `<img class="img_report" src="${RUTA}public/photos/${element}">`
        }
    });

    return htmlPhoto;

}