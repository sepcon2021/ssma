<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Documentos</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ Tops</a>
        </div>
    </div>

    <div class="wrap_document_format">
        <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
                <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
                <p>TOP</p>
                <p>Tarjeta de Observación Preventiva</p>
            </div>

            <div class="wrap_document_format_head_code">
                <p>PSPC-110-X-PR-002-FR-001</p>
                <p>Revisión: 2</p>
                <p>Emisión: 31/05/2021</p>
                <p>Página: 1 de 1</p>
            </div>

        </div>
        <div class="wrap_document_format_body">
            <form class="general_form" action="" id="formDigital">

                <input type="hidden" id="nombre" name="nombre">
                <input type="hidden" id="usuario" name="usuario">

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


                <div class="box_format" id="box_ubicacion">

                </div>

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Fase</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="fase" id="fase">
                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
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
                        <label for="">Horario</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="horario" id="horario">
                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                            <option value="1">Mañana (6:30 a 12:30 horas)</option>
                            <option value="2">Tarde (12:31 a 18:30 horas)</option>
                            <option value="3">Noche (18:31 a 24:00 horas)</option>
                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="horario_error"></p>
                    </div>

                </div>

                <div class="box_format">
                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Fecha</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="date" name="fecha_registro" id="fecha_registro">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="fecha_registro_error"></p>
                    </div>
                </div>

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Observación</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="observacion" id="observacion">
                            <option value="" disabled selected hidden>Seleccionar </option>
                            <option value="01">Acto sub estándar</option>
                            <option value="02">Condición sub estándar</option>
                            <option value="03">Acto Seguro</option>
                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="observacion_error"></p>
                    </div>

                </div>


                <div class="box_format" id="box_observacion_detalle">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label id="observacion_title" for=""></label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="observacion_detalle" id="observacion_detalle">
                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="observacion_detalle_error"></p>
                    </div>

                </div>

                <div class="box_format" id="box_otros">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Otros (En caso haya pulsado OTROS en la sección superior rellenar este
                            espacio)</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="otros" id="otros">
                    </div>
                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="otros_error"></p>
                    </div>
                </div>

                <div class="box_format" id="box_relacionado">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Relacionado</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="relacionado" id="relacionado">
                        </select>
                    </div>
                </div>

                <div class="box_format" id="box_tipo_epp">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Tipo de EPP</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="tipo_epp" id="tipo_epp">
                            <option value="" disabled selected hidden>Seleccionar </option>
                            <option value="01"> GUANTE </option>
                            <option value="02"> LENTES </option>
                            <option value="03"> RESPIRADOR </option>
                            <option value="04"> FILTRO/CARTUCHO </option>
                            <option value="05"> CALZADO </option>
                            <option value="06"> CARETA </option>
                            <option value="07"> CASCO </option>
                            <option value="08"> ROPA </option>
                            <option value="09"> BARBIQUEJO </option>
                            <option value="10"> ARNES </option>
                            <option value="11"> CAPOTIN </option>
                            <option value="12"> AUDITIVO </option>
                            <option value="13"> CHALECO </option>
                        </select>
                    </div>

                </div>

                <div class="box_format" id="box_condicion_epp">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Condición de EPP</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="condicion_epp" id="condicion_epp">
                            <option value="" disabled selected hidden>Seleccionar </option>
                            <option value="01"> NO USO EPP </option>
                            <option value="02"> USO INCORRECTO DE EPP </option>
                            <option value="03"> EPP EN MAL ESTADO </option>
                            <option value="04"> EPP INADECUADO </option>
                        </select>
                    </div>

                </div>

                <div class="box_format" id="box_puesto_observado">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Puesto del observado</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="puesto_observado" id="puesto_observado">
                    </div>
                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="puesto_observado_error"></p>
                    </div>
                    
                </div>



                <div class="box_format" id="box_tiempo_trabajo">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Tiempo en el proyecto de la persona observada
                        </label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="tiempo_trabajo" id="tiempo_trabajo">
                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                            <option value="1">1-2 meses</option>
                            <option value="2">3-5 meses</option>
                            <option value="3">6-8 meses</option>
                            <option value="4">9 meses a más</option>
                        </select>

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="tiempo_trabajo_error"></p>
                    </div>

                </div>


                <div class="box_format" id="box_edad_observada">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Edad de la persona observada
                        </label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="edad_observada" id="edad_observada">

                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                            <option value="1">20-30 años</option>
                            <option value="3">41- 50 a más</option>
                            <option value="2">31-40 años</option>


                        </select>

                    </div>
                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="edad_observada_error"></p>
                    </div>
                </div>



                <div class="box_format" id="box_lesion">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Partes de cuerpo expuestas a lesión
                        </label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="lesion" id="lesion">
                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                            <option value="1">Ojos</option>
                            <option value="2">Cara</option>
                            <option value="3">Hombros</option>
                            <option value="4">Pecho</option>
                            <option value="5">Brazos</option>
                            <option value="6">Manos</option>
                            <option value="7">Dedos</option>
                            <option value="8">Espalda</option>
                            <option value="9">Piernas</option>
                            <option value="10">Pie</option>
                            <option value="11">Oído</option>
                            <option value="12">Sistema respiratorio</option>
                            <option value="14">Cabeza</option>
                            <option value="13">Cuerpo completo</option>
                        </select>

                    </div>
                </div>


                <div class="box_format" id="box_obstaculo">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Obstaculos
                        </label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="obstaculo" id="obstaculo">


                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                            <option value="1">No se encuentra disponible</option>
                            <option value="2">No está de acuerdo que es riesgo</option>
                            <option value="3">No está consciente del riesgo</option>
                            <option value="4">Malas condiciones de trabajo</option>
                            <option value="5">Distraído</option>
                            <option value="6">No entiende la instrucción dada</option>
                            <option value="7">No hay control de la supervisión</option>
                            <option value="8">Condición del equipo/Instalación</option>
                            <option value="9">Desconoce el procedimiento</option>
                            <option value="10">Presión del tiempo</option>
                            <option value="11">Entrenamiento pobre</option>
                            <option value="12">No es cómodo</option>
                            <option value="13">Presión de la supervisión</option>
                            <option value="14">No requiere</option>
                            <option value="15">Falta de motivación</option>
                            <option value="16">Cansancio</option>
                            <option value="17">Otros </option>


                        </select>

                    </div>
                </div>


                <div class="box_format" id="box_retroalimentacion">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">¿Se realizó la retroalimentación?</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div>
                        <div class="item_format">
                            <input type="radio" name="retroalimentacion" id="retroalimentacions" value="1"><label
                                for="retroalimentacions"> Si</label>

                        </div>
                        <div class="item_format">
                            <input type="radio" name="retroalimentacion" id="retroalimentacionn" value="0"><label
                                for="retroalimentacionn"> No</label>

                        </div>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="retroalimentacion_error"></p>
                    </div>

                </div>


                <div class="box_format" id="box_cambio">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">¿Se logró el cambio?</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div>
                        <div class="item_format">
                            <input type="radio" name="cambio" id="cambios" value="1"><label for="cambios"> Si</label>

                        </div>
                        <div class="item_format">
                            <input type="radio" name="cambio" id="cambion" value="0"><label for="cambion"> No</label>

                        </div>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="cambio_error"></p>
                    </div>

                </div>


                <div class="box_format" id="box_reincidente">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">¿Personal reincidente?</label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div>
                        <div class="item_format">
                            <input type="radio" name="reincidente" id="reincidentes" value="1"><label
                                for="reincidentes"> Si</label>

                        </div>
                        <div class="item_format">
                            <input type="radio" name="reincidente" id="reincidenten" value="0"><label
                                for="reincidenten"> No</label>

                        </div>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="reincidente_error"></p>
                    </div>

                </div>


                <div class="box_format" id="box_breve_descripcion">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Breve descripción de la observación preventiva:
                        </label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <textarea class="item_format_input" name="breve_descripcion" id="breve_descripcion" cols="30"
                            rows="30"></textarea>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="breve_descripcion_error"></p>
                    </div>

                </div>

                <div class="box_format" id="box_medida_correctiva">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">¿Qué medidas correctivas se tomarón?
                        </label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <textarea class="item_format_input" name="medida_correctiva" id="medida_correctiva" cols="30"
                            rows="10"></textarea>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="medida_correctiva_error"></p>
                    </div>

                </div>



                <div class="box_format" id="box_potencial">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">¿Cuál es el potencial de pérdida?
                        </label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="potencial" id="potencial">


                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                            <option value="01">Potencial alto</option>
                            <option value="02">Potencial medio</option>
                            <option value="03">Potencial bajo</option>


                        </select>

                    </div>


                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="potencial_error"></p>
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
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Evidencia
                        </label>
                    </div>

                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <div class="container_photo">
                            <input type="file" id="file-input" name="files[]" accept="image/png , image/jpeg" multiple>
                            <label id="container_photo_label" for="file-input">Escoger archivos</label>
                            <div id="images"></div>
                        </div>
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
<script src="<?php echo constant('URL'); ?>public/js/top_new.js?<?php echo constant('VERSION'); ?>"></script>


