<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Documentos</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ IPERC</a>
        </div>
    </div>

    <div class="wrap_document_format">
        <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
                <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
                <p>Inspección de IPERC continuo</p>
            </div>

            <div class="wrap_document_format_head_code">
                <p>PSPC-100-X-PR-006-FR-001</p>
                <p>Revisión: 0</p>
                <p>Emisión: 10/04/2021</p>
                <p>Página: 1 de 1</p>
            </div>

        </div>
        <div class="wrap_document_format_body">
            <form class="general_form" action="" id="formDigital">

                <input type="hidden" id="elaborado" name="elaborado">
                <input type="hidden" id="internal" name="internal">

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Proyecto</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="proyecto" id="proyecto">
                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                            <option value="1">WHCP 21</option>
                            <option value="3">Pucallpa</option>
                            <option value="4">Lurin</option>
                            <option value="5">Lima</option>
                            <option value="6">20PP03 L. Relaves Este / 00679</option>
                            <option value="7">Full Flow flare - Shut dow</option>
                            <option value="8">Sistema contra incendios</option>
                            <option value="9">Obras Electromecánicas Varias</option>
                        </select>
                    </div>
                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="proyecto_error"></p>
                    </div>
                </div>

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Area</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="area" id="area">
                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="area_error"></p>
                    </div>
                </div>

                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Ubicación</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="ubicacion" id="ubicacion">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="ubicacion_error"></p>
                    </div>

                </div>

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Fase</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="fase" id="fase">


                            <option value="" disabled="" selected="" hidden=""> Seleccionar la fase observada</option>
                            <option value="1">RRHH</option>
                            <option value="2">Control de Proyecto</option>
                            <option value="3">Obras Civiles</option>
                            <option value="4">Ingeniería</option>
                            <option value="5">Calidad</option>
                            <option value="6">Precom</option>
                            <option value="7">SSMA</option>
                            <option value="8">Campamento</option>
                            <option value="9">Almacén</option>
                            <option value="10">Mantenimiento</option>
                            <option value="11">Operadores de equipo pesado y liviano/rigger</option>
                            <option value="12">Obras mecánicas</option>
                            <option value="13">Tec.Informática</option>
                            <option value="14">Electricidad</option>
                            <option value="15">Contratista</option>
                            <option value="16">Administración</option>


                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="fase_error"></p>
                    </div>
                </div>



                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Empresa</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="empresa"
                            id="empresa">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="empresa_error"></p>
                    </div>

                </div>


                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Nombre de la tarea o trabajo</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="nombre_tarea"
                            id="nombre_tarea">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="nombre_tarea_error"></p>
                    </div>

                </div>

                


                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Fecha de elaboración</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="date" name="fecha_elaboracion" id="fecha_elaboracion">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="fecha_elaboracion_error"></p>
                    </div>

                </div>


                

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Riesgo crítico</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="riesgo_critico" id="riesgo_critico">

                            <option value="" disabled="" selected="" hidden=""> Seleccionar un riesgo crítico</option>
                            <option value="1"> Aislamiento, bloqueo y etiquetado </option>
                            <option value="2"> Trabajos en espacios confinados </option>
                            <option value="3"> Trabajos con izaje o cargas suspendidas </option>
                            <option value="4"> Trabajos en altura o desnivel </option>
                            <option value="5"> Excavaciones y zanjas </option>
                            <option value="6"> Trabajos en caliente </option>
                            <option value="7"> Operación de equipo pesad0 /liviano /móviles </option>
                            <option value="8"> Trabajos con circuitos energizados </option>
                            <option value="9"> Trabajos con/ cerca de energías o partes móviles </option>
                            <option value="10"> Trabajos con/cerca de sustancias quimicas </option>
                            <option value="11"> Trabajos con tuberias de hdpe </option>
                            <option value="12"> Ingreso a áreas restringidas sin autorización </option>
                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="riesgo_critico_error"></p>
                    </div>
                </div>




                <div class="box_format" id="box_responsable">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Asignar responsable de la acción
                        </label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="responsable_accion" id="responsable_accion">

                        </select>

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="responsable_accion_error"></p>
                    </div>


                </div>



                
                <div class="box_format">
               

                    <div class="secction center">
                        <p>1. LISTO PARA COMENZAR</p>
                    </div>
                    <div class="secction center">
                        <p>Si responde “No” a las primeras tres preguntas, NO INICIE EL TRABAJO</p>
                    </div>
    
                    <div>
    
                        <table class="tablaConBordes w100p">
                            <tbody>
                                <tr>
                                    <td class="secction w40p center">
    
                                        <p>Generales</p>
                                    </td>
    
                                    <td class="secction   w10p center">
                                        <p>Si</p>
                                    </td>
    
    
                                    <td class="secction   w10p center">
                                        <p>No</p>
                                    </td>
    
    
                                    <td class="secction   w40p center">
                                        <p>Medida de control</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
    
                    </div>
    
    
                    <div>
                        <table class="tablaConBordes w100p">
                            <tbody>
    
                                <tr>
                                    <!--<td class="w40p">¿He realizado este trabajo anteriormente?</td>-->
    
    
                                    <td class="w40p">
    
    
                                        <div id="message1" class="message">
    
    
                                            ¿He realizado este trabajo anteriormente?
    
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
    
                                    </td>
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo1" id="riesgo1s" value="1"><label for="riesgo1s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo1" id="riesgo1n" value="2"><label for="riesgo1n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
    
    
                                        <p id="comentario1-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario1" name="comentario1"><br>
    
    
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
    
    
                                    <td class="w40p">
    
    
                                        <div id="message2" class="message">
    
    
                                            ¿Poseo las habilidades, los conocimientos o los permisos requeridos?
    
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
    
                                    </td>
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo2" id="riesgo2s" value="1"><label for="riesgo2s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo2" id="riesgo2n" value="2"><label for="riesgo2n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
    
                                        <p id="comentario2-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario2" name="comentario2"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message3" class="message">
                                            ¿Puedo cumplir con las Reglas por la Vida?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo3" id="riesgo3s" value="1"><label for="riesgo3s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo3" id="riesgo3n" value="2"><label for="riesgo3n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario3-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario3" name="comentario3"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message4" class="message">
                                            ¿Existe alguna evaluación de riesgos o instrucción de trabajo para esta tarea?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo4" id="riesgo4s" value="1"><label for="riesgo4s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo4" id="riesgo4n" value="2"><label for="riesgo4n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario4-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario4" name="comentario4"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message5" class="message">
                                            ¿Se requiere algún permiso para realizar este trabajo?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo5" id="riesgo5s" value="1"><label for="riesgo5s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo5" id="riesgo5n" value="2"><label for="riesgo5n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario5-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario5" name="comentario5"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message6" class="message">
                                            ¿Este trabajo requiere “aislamiento”?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo6" id="riesgo6s" value="1"><label for="riesgo6s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo6" id="riesgo6n" value="2"><label for="riesgo6n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario6-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario6" name="comentario6"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message7" class="message">
                                            ¿Se trata de un espacio confinado?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo7" id="riesgo7s" value="1"><label for="riesgo7s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo7" id="riesgo7n" value="2"><label for="riesgo7n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario7-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario7" name="comentario7"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message8" class="message">
                                            ¿Estoy trabajando en alturas?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo8" id="riesgo8s" value="1"><label for="riesgo8s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo8" id="riesgo8n" value="2"><label for="riesgo8n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario8-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario8" name="comentario8"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message9" class="message">
                                            ¿Estoy realizando una excavación?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo9" id="riesgo9s" value="1"><label for="riesgo9s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo9" id="riesgo9n" value="2"><label for="riesgo9n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario9-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario9" name="comentario9"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message10" class="message">
                                            ¿He identificado algún impacto ambiental?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo10" id="riesgo10s" value="1"><label for="riesgo10s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo10" id="riesgo10n" value="2"><label for="riesgo10n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario10-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario10" name="comentario10"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message11" class="message">
                                            ¿Existe algún riesgo de lesión en las manos en este trabajo?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo11" id="riesgo11s" value="1"><label for="riesgo11s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo11" id="riesgo11n" value="2"><label for="riesgo11n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario11-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario11" name="comentario11"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message12" class="message">
                                            ¿Se utilizarán productos químicos?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo12" id="riesgo12s" value="1"><label for="riesgo12s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo12" id="riesgo12n" value="2"><label for="riesgo12n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario12-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario12" name="comentario12"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message13" class="message">
                                            ¿El área de trabajo se encuentra ordenada y libre de obstáculos?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo13" id="riesgo13 s" value="1"><label for="riesgo13s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo13" id="riesgo13 n" value="2"><label for="riesgo13n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario13-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario13" name="comentario13"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message14" class="message">
                                            ¿He verificado si podría afectar u obstaculizar a los demás?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo14" id="riesgo14s" value="1"><label for="riesgo14s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo14" id="riesgo14n" value="2"><label for="riesgo14n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario14-message" class="campo-obligatorio"></p>
                                        <input class="w100p" type="text" id="comentario14" name="comentario14"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message15" class="message">
                                            ¿Tengo las herramientas adecuadas para este trabajo?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo15" id="riesgo15s" value="1"><label for="riesgo15s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo15" id="riesgo15n" value="2"><label for="riesgo15n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario15-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario15" name="comentario15"><br>
                                    </td>
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w40p">
                                        <div id="message16" class="message">
                                            ¿Poseo el Equipo de Protección Personal adecuado? ¿Estoy capacitado para utilizarlo?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo16" id="riesgo16s" value="1"><label for="riesgo16s"> Si</label>
                                    </td>
                                    <td class="w10p center">
                                        <input type="radio" name="riesgo16" id="riesgo16n" value="2"><label for="riesgo16n"> No</label>
                                    </td>
    
    
    
                                    <td class="w40p center">
                                        <p id="comentario16-message" class="campo-obligatorio"></p>
    
                                        <input class="w100p" type="text" id="comentario16" name="comentario16"><br>
                                    </td>
    
                                </tr>
    
    
    
    
                            </tbody>
                        </table>
                    </div>
    
    
                    <div class="secction center">
                        <p>2. CONTROL DE RIESGOS CRITICOS</p>
                    </div>
    
                    <div>
    
                        <table class="tablaConBordes w100p">
                            <tbody>
                                <tr>
                                    <td class="secction w40p center">
    
                                        <p>2.1 RIESGOS CRITICOS</p>
                                    </td>
    
                                    <td class="secction   w5p center">
                                        <p>Si</p>
                                    </td>
    
    
                                    <td class="secction   w5p center">
                                        <p>No</p>
                                    </td>
                                    <td class="secction   w5p center">
                                        <p>NA</p>
                                    </td>
                                    <td class="secction   w50p center">
                                        <p>Comentarios </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
    
                    </div>
    
    
                    <div>
                        <table id="tablaRiesgosCriticos" class="tablaRiesgosCriticos tablaConBordes w100p">
                        </table>
                    </div>
    
    
    
                    <div>
    
                        <table class="tablaConBordes w100p">
                            <tbody>
                                <tr>
                                    <td class="secction w60p center">
    
                                        <p>2.2 CONTROL DE RIESGOS PARA MANOS</p>
                                    </td>
    
                                    <td class="secction   w20p center">
                                        <p>Si</p>
                                    </td>
    
    
                                    <td class="secction   w20p center">
                                        <p>No</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
    
                    </div>
    
    
                    <div>
                        <table class="tablaConBordes w100p">
    
                            <tbody>
    
                                <tr>
    
    
                                    <td class="w60p">
    
                                        <div id="message17" class="message">
    
                                            ¿La tarea conlleva a exponer las manos a la línea de fuego (golpeado por objetos en movimiento ej.golpear con martillo)?
    
    
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
    
    
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_manos1" id="riesgo_manos1s" value="1"><label for="riesgo_manos1s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_manos1" id="riesgo_manos1n" value="2"><label for="riesgo_manos1n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w60p">
                                        <div id="message18" class="message">
    
                                            ¿La tarea conlleva a exponer las manos en puntos de atricción y/o atrapamiento (atrapado entre, ej. colocar mano entre marco y la puerta)?
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_manos2" id="riesgo_manos2s" value="1"><label for="riesgo_manos2s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_manos2" id="riesgo_manos2n" value="2"><label for="riesgo_manos2n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w60p">
                                        <div id="message19" class="message">
    
    
                                            ¿La tarea conlleva a exponer las manos a bordes filosos y/o cortantes: La tarea conlleva a manipular cuchillas y/o herramientas punzocortantes?
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
    
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_manos3" id="riesgo_manos3s" value="1"><label for="riesgo_manos3s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_manos3" id="riesgo_manos3n" value="2"><label for="riesgo_manos3n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
    
                            </tbody>
                        </table>
                    </div>
    
    
    
    
                    <div>
    
                        <table class="tablaConBordes w100p">
                            <tbody>
                                <tr>
                                    <td class="secction w60p center">
    
                                        <p>2.3 CONTROLES COVID 19</p>
                                    </td>
    
                                    <td class="secction   w20p center">
                                        <p>Si</p>
                                    </td>
    
    
                                    <td class="secction   w20p center">
                                        <p>No</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
    
                    </div>
    
    
                    <div>
                        <table class="tablaConBordes w100p">
    
                            <tbody>
                                <tr>
                                    <td class="w60p">
                                        <div id="message20" class="message">
                                            ¿Se mantiene distanciamiento 2 m como mínimo?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid2" id="riesgo_covid2s" value="1"><label for="riesgo_covid2s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid2" id="riesgo_covid2n" value="2"><label for="riesgo_covid2n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w60p">
                                        <div id="message21" class="message">
                                            ¿Se utiliza la protección respiratoria (mascarilla KN95)?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid3" id="riesgo_covid3s" value="1"><label for="riesgo_covid3s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid3" id="riesgo_covid3n" value="2"><label for="riesgo_covid3n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w60p">
                                        <div id="message22" class="message">
                                            ¿Se lavan/desinfectan las manos de manera frecuente?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid4" id="riesgo_covid4s" value="1"><label for="riesgo_covid4s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid4" id="riesgo_covid4n" value="2"><label for="riesgo_covid4n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w60p">
                                        <div id="message23" class="message">
                                            ¿Se limpia/desinfectan las herramientas y equipos?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid5" id="riesgo_covid5s" value="1"><label for="riesgo_covid5s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid5" id="riesgo_covid5n" value="2"><label for="riesgo_covid5n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w60p">
                                        <div id="message24" class="message">
                                            ¿Se limpió/desinfectó el vehículo/Equipo?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid6" id="riesgo_covid6s" value="1"><label for="riesgo_covid6s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid6" id="riesgo_covid6n" value="2"><label for="riesgo_covid6n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
                                <tr>
                                    <td class="w60p">
                                        <div id="message25" class="message">
                                            ¿Se respeta el aforo del vehículo/Equipo?
    
                                            <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>
    
                                        </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid7" id="riesgo_covid7s" value="1"><label for="riesgo_covid7s"> Si</label>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid7" id="riesgo_covid7n" value="2"><label for="riesgo_covid7n"> No</label>
                                    </td>
    
    
    
    
    
                                </tr>
    
    
                            </tbody>
                        </table>
                    </div>
    
    
                </div>



                <div class="box_format item_format_rigth">
                    <button type="submit" id="button_send_form">Enviar</button>
                </div>



            </form>
        </div>
    </div>

</div>

<div class="wrap_load">

</div>

<div class="wrap_sucess">

</div>

<script src="<?php echo constant('URL'); ?>public/js/iperc_new.js?<?php echo constant('VERSION'); ?>"></script>
