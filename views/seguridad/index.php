<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Documentos</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ Inspección planeada de seguridad</a>
        </div>
    </div>

    <div class="wrap_document_format">
        <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
                <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
                <p>Inspección planeada de seguridad</p>
            </div>

            <div class="wrap_document_format_head_code">
                <p>PSPC-110-X-PR-001-FR-007</p>
                <p>Revisión: 0</p>
                <p>Emisión: 17/05/2019</p>
                <p>Página: 1 de 1</p>
            </div>

        </div>
        <div class="wrap_document_format_body">
            <form class="general_form" action="" id="formDigital">

                <input type="hidden" id="nombres" name="nombres">
                <input type="hidden" id="internal" name="internal">

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Tipo de inspección</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="tipo_inspeccion" id="tipo_inspeccion">
                            <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                            <option value="1"> Informal </option>
                            <option value="2"> Planeada </option>
                            <option value="3"> Sistemas de izajes </option>
                            <option value="4"> Almacén/talleres </option>
                            <option value="5"> Almacén de materiales peligrosos </option>
                            <option value="6"> Escaleras portátiles </option>
                            <option value="7"> Sistemas contra incendio </option>
                            <option value="8"> Instalaciones eléctricas </option>
                            <option value="9"> Botiquín de primeros de auxilios </option>
                            <option value="10"> Kit antiderrame </option>
                            <option value="11"> Estación de emergencia </option>
                            <option value="12"> Inspección del sub comité </option>
                            <option value="13"> Oficinas </option>
                            <option value="14"> Herramientas manuales de poder y equipos</option>
                        </select>
                    </div>
                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="tipo_inspeccion_error"></p>
                    </div>
                </div>


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
                        <label for="">Resonsable área</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="responsable_area" id="responsable_area">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="responsable_area_error"></p>
                    </div>

                </div>

                <div class="box_format">

                    <table class="table_oficial">
                        <thead>
                            <tr>
                                <th rowspan="2">Tipo</th>
                                <th rowspan="2">Condición o Practica subestandar/Acto Seguro</th>
                                <th rowspan="2">Detalle</th>
                                <th rowspan="2">Clasificación</th>
                                <th rowspan="2">Acción Correctiva / Detalle</th>
                                <th rowspan="2">Responsable</th>
                                <th rowspan="2">Fecha de cumplimiento</th>
                                <th rowspan="2">Seguimiento</th>
                                <th rowspan="2">Evidencia</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-data">

                        </tbody>
                    </table>
                    <div>
                        <button class="popup_send_form" id="addRowObs">Agregar Observación </button>
                    </div>

                </div>


                <div class="box_format">

                    <table class="table_oficial">
                        <thead>
                            <tr>
                                <th>Clasificación de las condiciones sub estándar:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w50p">(A) Mayor: Se considera que el peligro encontrado, podría ocasionar
                                    daños mayores, o tiene un potencial de pérdida alto, por lo tanto existe un plazo
                                    máximo de levantamiento de la observación de 24 horas</td>

                            </tr>
                            <tr>
                                <td class="w50p">(B) Serio: Se considera que el peligro encontrado, podría ocasionar
                                    daños regulares, o tiene un potencial de pérdida medio, por lo tanto existe un plazo
                                    máximo de levantamiento de la observación encontrada de 72 horas o 3 días.</td>

                            </tr>
                            <tr>
                                <td class="w50p">(C) Menor: Se considera que el peligro encontrado, podría ocasionar
                                    daños menores, o tiene un potencial de pérdida bajo, por lo tanto existe un plazo
                                    máximo de levantamiento de la observación encontrada de 14 días.</td>

                            </tr>
                        </tbody>
                    </table>

                </div>




                <div class="box_format item_format_rigth">
                    <button type="submit" id="button_send_form">Enviar</button>
                </div>



            </form>
        </div>
    </div>


    <!-- ESTE ES EL POPUP  -->
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content scroll1">

            <div class="popup_content">

                <div class="contenidoRepuesta">
			        <img class="clickPopup-close" src="public/img/cancel.png">
		        </div>

                <div>
                    <h3>Observación</h3>
                </div>

                <form class="div-popup" method="POST" id="formpopup">


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


                    <div class="box_format">

                        <!--TITLE ELEMENT-->

                        <div class="item_format">
                            <label for="">Detalle</label>
                        </div>

                        <!--CONTENT ELEMENT-->

                        <div class="item_format">
                            <input class="item_format_input" type="text" name="detalle" id="detalle">
                        </div>

                        <!-- ERRROR ELEMENT -->
                        <div class="item_format">
                            <p class="error_message" id="detalle_error"></p>
                        </div>

                    </div>



                    <div class="box_format">
                        <!--TITLE ELEMENT-->
                        <div class="item_format">
                            <label for="">Clasificación</label>
                        </div>

                        <!--CONTENT ELEMENT-->
                        <div class="item_format">
                            <select class="item_format_select" name="clasificacion" id="clasificacion">
                                <option value="" disabled selected hidden>Seleccionar </option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                            </select>
                        </div>

                        <!-- ERRROR ELEMENT -->
                        <div class="item_format">
                            <p class="error_message" id="clasificacion_error"></p>
                        </div>

                    </div>





                    <div class="box_format">

                        <!--TITLE ELEMENT-->

                        <div class="item_format">
                            <label for="">Acción correctiva</label>
                        </div>

                        <!--CONTENT ELEMENT-->

                        <div class="item_format">
                            <input class="item_format_input" type="text" name="accion_correctiva"
                                id="accion_correctiva">
                        </div>

                        <!-- ERRROR ELEMENT -->
                        <div class="item_format">
                            <p class="error_message" id="accion_correctiva_error"></p>
                        </div>

                    </div>





                    <div class="box_format">
                        <!--TITLE ELEMENT-->
                        <div class="item_format">
                            <label for="">Responsable</label>
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
                            <label for="">Fecha de cumplimiento</label>
                        </div>

                        <!--CONTENT ELEMENT-->
                        <div class="item_format">
                            <input class="item_format_input" type="date" name="fecha_cumplimiento"
                                id="fecha_cumplimiento">
                        </div>

                        <!-- ERRROR ELEMENT -->
                        <div class="item_format">
                            <p class="error_message" id="fecha_cumplimiento_error"></p>
                        </div>
                    </div>


                    <div class="box_format">

                        <!--TITLE ELEMENT-->

                        <div class="item_format">
                            <label for="">Seguimiento</label>
                        </div>

                        <!--CONTENT ELEMENT-->

                        <div class="item_format">
                            <input class="item_format_input" type="text" name="seguimiento" id="seguimiento">
                        </div>

                        <!-- ERRROR ELEMENT -->
                        <div class="item_format">
                            <p class="error_message" id="seguimiento_error"></p>
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
                                <input type="file" id="file-input" name="files[]" accept="image/png , image/jpeg"
                                    multiple>
                                <label id="container_photo_label" for="file-input">Escoger archivos</label>
                                <div id="images"></div>
                            </div>
                        </div>
                    </div>


                    <!-- ACTUALIZAMOS EL DOCUMENTO CON EL SUPERVISOR ASIGNADO Y FECHA DE CONTRATO-->
                    <div class="center div-top">
                        <button class="popup_send_form" type="submit" id="popup_send_form">Agregar Observación</button>
                    </div>

                </form>

            </div>

            <div class="popup_load">

            </div>

            <div class="popup_sucess">

            </div>
        </div>
    </div>



</div>

<div class="wrap_load">

</div>

<div class="wrap_sucess">

</div>

<script src="<?php echo constant('URL'); ?>public/js/seguridad_new.js?<?php echo constant('VERSION'); ?>"></script>
