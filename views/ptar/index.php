<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Documentos</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ PTAR</a>
        </div>
    </div>


    <div class="wrap_document_format">
        <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
                <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
                <p>Auditoría de Permiso de Trabajo y Análisis Seguro de Trabajo</p>

            </div>

            <div class="wrap_document_format_head_code">
                <p>PSPC-110-X-PR-003-FR-002</p>
                <p>Revisión: 0</p>
                <p>Emisión: 31/05/19</p>
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


                <div class="box_format" >
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Cliente</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="cliente" id="cliente">
                    </div>
                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="cliente_error"></p>
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

                <div class="box_format" >
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Semana auditada</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <input class="item_format_input" type="text" name="semana_auditada" id="semana_auditada">
                    </div>
                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="semana_auditada_error"></p>
                    </div>
                </div>



                <div class="secction center">
                    <p>OBSERVACIONES PT:</p>
                </div>
                <div>
                    <table class="tablaConBordes w100p">
                        <tbody>
                            <tr>
                                <td>Datos generales y/o tarea a realizar mal llenados o incompletos.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt01" id="chkpt01s" value="1"><label for="chkpt01s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt01" id="chkpt01n" value="-1"><label for="chkpt01n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>No se cuenta con los procedimientos, instructivos u otros documentos </br> operativos aplicables a los trabajos a ejecutar.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt02" id="chkpt02s" value="1"><label for="chkpt02s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt02" id="chkpt02n" value="-1"><label for="chkpt02n"> Si</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Mala o incompleta selección de equipos contra incendio.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt03" id="chkpt03s" value="1"><label for="chkpt03s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt03" id="chkpt03n" value="-1"><label for="chkpt03n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Mala o incompleta selección del EPP.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt04" id="chkpt04s" value="1"><label for="chkpt04s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt04" id="chkpt04n" value="-1"><label for="chkpt04n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Lista de verificación incompleta o mal llenada.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt05" id="chkpt05s" value="1"><label for="chkpt05s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt05" id="chkpt05n" value="-1"><label for="chkpt05n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>No se realizó prueba de explosividad /No se firmó.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt06" id="chkpt06s" value="1"><label for="chkpt06s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt06" id="chkpt06n" value="-1"><label for="chkpt06n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Mal efectuada y/o incompleta comprobación del equipo a entregar.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt07" id="chkpt07s" value="1"><label for="chkpt07s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt07" id="chkpt07n" value="-1"><label for="chkpt07n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>No tomó conocimiento el Sup o Resp del área colindante (de ser necesario).</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt08" id="chkpt08s" value="1"><label for="chkpt08s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt08" id="chkpt08n" value="-1"><label for="chkpt08n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Firmas no autorizadas y/o incompletas en PT.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt09" id="chkpt09s" value="1"><label for="chkpt09s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt09" id="chkpt09n" value="-1"><label for="chkpt09n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>No se registró hora de apertura/cierre del PT por los responsables.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt10" id="chkpt10s" value="1"><label for="chkpt10s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt10" id="chkpt10n" value="-1"><label for="chkpt10n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>No se cerró adecuadamente el PT (según aplique).</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt11" id="chkpt11s" value="1"><label for="chkpt11s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkpt11" id="chkpt11n" value="-1"><label for="chkpt11n"> No</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="secction center">
                    <p>OBSERVACIONES AST:</p>
                </div>
                <div>
                    <table class="tablaConBordes w100p">
                        <tbody>
                            <tr>
                                <td>Datos generales y/o tarea a realizar mal llenados o incompletos.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast01" id="chkast01s" value="1"><label for="chkast01s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast01" id="chkast01n" value="-1"><label for="chkast01n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Análisis Seguro de Trabajo (o similar) faltante.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast02" id="chkast02s" value="1"><label for="chkast02s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast02" id="chkast02n" value="-1"><label for="chkast02n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Descripción de las etapas de la tarea mal elaboradas o faltantes.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast03" id="chkast03s" value="1"><label for="chkast03s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast03" id="chkast03n" value="-1"><label for="hkast03n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Firmas incompletas de trabajadores involucrados en la tarea.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast04" id="chkast04s" value="1"><label for="chkast04s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast04" id="chkast04n" value="-1"><label for="chkast04n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>No coincide número de personas de PT y AST.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast05" id="chkast05s" value="1"><label for="chkast05s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast05" id="chkast05n" value="-1"><label for="chkast05n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Valoración no adecuada o incorrecta de la Severidad / Probabilidad al </br> peligro/aspecto asociado</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast06" id="chkast06s" value="1"><label for="chkast06s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast06" id="chkast06n" value="-1"><label for="chkast06n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Peligros / aspectos mal identificados o insuficientes.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast07" id="chkast07s" value="1"><label for="chkast07s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast07" id="chkast07n" value="-1"><label for="chkast07n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Descripción de medidas de control no apropiadas para el peligro/aspecto y </br> riesgo/impacto asociado a la tarea.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast08" id="chkast08s" value="1"><label for="chkast08s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast08" id="chkast08n" value="-1"><label for="chkast08n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Medidas de control no implementadas o insuficientes.</td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast09" id="chkast09s" value="1"><label for="chkast09s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast09" id="chkast09n" value="-1"><label for="chkast09n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Otros (detallar): <input type="text" name="detast10" id="detast10" class="w80p"></td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast10" id="chkast10s" value="1"><label for="chkast10s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast10" id="chkast10n" value="-1"><label for="chkast10n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Otros (detallar) : <input type="text" name="detast11" id="detast11" class="w80p"></td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast11" id="chkast11s" value="1"><label for="chkast11s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast11" id="chkast11n" value="-1"><label for="chkast11n"> No</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Otros (detallar): <input type="text" name="detast12" id="detast12" class="w80p"></td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast12" id="chkast12s" value="1"><label for="chkast12s"> Si</label>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="chkast12" id="chkast12n" value="-1"><label for="chkast12n"> No</label>
                                </td>
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



</div>

<div class="wrap_load">

</div>

<div class="wrap_sucess">
</div>
<script src="<?php echo constant('URL'); ?>public/js/ptar_new.js?<?php echo constant('VERSION'); ?>"></script>