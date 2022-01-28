<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Documentos</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ Suspención de trabajo</a>
        </div>
    </div>

    <div class="wrap_document_format">


        <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
                <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
                <p>Suspención de trabajo</p>

            </div>

            <div class="wrap_document_format_head_code">
                <p>PSPC-110-X-PR-014-FR-002</p>
                <p>Revisión: 0</p>
                <p>Emisión: 28/06/19</p>
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
                        <label for="">Lugar</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="lugar" id="lugar">

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="lugar_error"></p>
                    </div>
                </div>


                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Frente de Trabajo / Área / Fase</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="frente_trabajo" id="frente_trabajo">

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="frente_trabajo_error"></p>
                    </div>
                </div>

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Responsable Frente/Área de Trabajo </label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="responsable_trabajo" id="responsable_trabajo">

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="responsable_trabajo_error"></p>
                    </div>
                </div>

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Cargo </label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="cargo_trabajo" id="cargo_trabajo">

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="cargo_trabajo_error"></p>
                    </div>
                </div>



                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Fecha</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="date" name="fecha_trabajo" id="fecha_trabajo">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="fecha_trabajo_error"></p>
                    </div>

                </div>

                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Hora</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="time" name="hora_trabajo" id="hora_trabajo">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="hora_trabajo_error"></p>
                    </div>

                </div>

                <div class="secction">
                    <p>CRITERIOS REFERENCIALES ASOCIADOS A LA SUSPENSIÓN DE TRABAJOS (MARCAR CON "X"):</p>

                </div>

                <div class="box_format">

                    <!--CONTENT ELEMENT-->

                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="item_format">

                                        <input type="checkbox" name="chkOpt1" id="chkOpt1">
                                        <label for="chkOpt1"> CONDUCCIÓN SEGURA </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="item_format">

                                    </div>
                                </td>
                                <td>
                                    <div class="item_format">
                                        <input type="checkbox" name="chkOpt2" id="chkOpt2">
                                        <label for="chkOpt2"> EXCAVACIONES</label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="item_format">

                                        <input type="checkbox" name="chkOpt3" id="chkOpt3">
                                        <label for="chkOpt3"> PERMISO DE TRABAJO Y AST </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="item_format">

                                    </div>
                                </td>
                                <td>
                                    <div class="item_format">


                                        <input type="checkbox" name="chkOpt4" id="chkOpt4">
                                        <label for="chkOpt4"> TRABAJOS EN ALTURA</label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="item_format">

                                        <input type="checkbox" name="chkOpt5" id="chkOpt5">
                                        <label for="chkOpt5"> ESPACIOS CONFINADOS </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="item_format">

                                    </div>
                                </td>
                                <td>
                                    <div class="item_format">

                                        <input type="checkbox" name="chkOpt6" id="chkOpt6">
                                        <label for="chkOpt6"> TRABAJOS EN CALIENTE</label>
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="item_format">

                                        <input type="checkbox" name="chkOpt7" id="chkOpt7">
                                        <label for="chkOpt7"> ENERGÍAS PELIGROSAS </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="item_format">

                                    </div>
                                </td>
                                <td>
                                    <div class="item_format">

                                        <input type="checkbox" name="chkOpt8" id="chkOpt8">
                                        <label for="chkOpt8"> OPERACIONES DE IZAJE</label>
                                    </div>
                                </td>

                            </tr>

                        </tbody>
                    </table>



                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="hora_trabajo_error"></p>
                    </div>

                </div>


                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Otros (Especificar)</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <textarea class="item_format_input item_format_textarea" type="time" name="otros_especificar" id="otros_especificar"></textarea>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="otros_especificar_error"></p>
                    </div>

                </div>

                <div class="secction">
                    <p>DESCRIPCIÓN DE LO OCURRIDO:</p>
                </div>


                <div class="box_format">



                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <textarea class="item_format_input item_format_textarea" type="time" name="ocurrido" id="ocurrido"></textarea>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="ocurrido_error"></p>
                    </div>

                </div>


                <div class="secction">
                    <p>ACCIONES CORRECTIVAS INMEDIATAS TOMADAS:</p>
                </div>



                <div class="box_format">



                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <textarea class="item_format_input item_format_textarea" type="time" name="acciones" id="acciones"></textarea>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="acciones_error"></p>
                    </div>

                </div>

                <div class="secction">
                    <p>DATOS:</p>
                </div>


                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Nivel de riesgo</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input type="radio" name="riesgo" id="riesgoalto" value="1">
                        <label for="riesgoalto" class="fondorojo">ALTO</label>
                    </div>

                    <div class="item_format">
                        <input type="radio" name="riesgo" id="riesgomedio" value="2">
                        <label for="riesgomedio" class="fondoamarillo">MEDIO</label>
                    </div>


                    <div class="item_format">
                        <input type="radio" name="riesgo" id="riesgobajo" value="3">
                        <label for="riesgobajo" class="fondoverde">BAJO</label>
                    </div>


                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="otros_especificar_error"></p>
                    </div>

                </div>


                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Tiempo de Duración de la suspención </label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="duracion" id="duracion">

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="duracion_error"></p>
                    </div>
                </div>


                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Nombres del Jefe Directo / Cargo </label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="nombre_jefe" id="nombre_jefe">

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="nombre_jefe_error"></p>
                    </div>
                </div>


                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">N° personas en el frente / Área de Trabajo </label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="number" name="numero_personas" id="numero_personas">

                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="numero_personas_error"></p>
                    </div>
                </div>

                <div class="secction">
                    <p>OBSERVACIONES:</p>
                </div>

                <div class="box_format">

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <textarea class="item_format_input item_format_textarea" name="observaciones" id="observaciones"></textarea>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="observaciones_error"></p>
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

<script src="<?php echo constant('URL'); ?>public/js/suspencion_new.js?<?php echo constant('VERSION'); ?>"></script>