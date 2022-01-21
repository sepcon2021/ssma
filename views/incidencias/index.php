<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Documentos</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ Reporte de incidencias</a>
        </div>
    </div>

    <div class="wrap_document_format">
        <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
                <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
                <p>Reporte preliminar de accidente,incidente y enfermedad ocupacional</p>
            </div>

            <div class="wrap_document_format_head_code">
                <p>PSPC-100-X-PR-006-FR-001</p>
                <p>Revisión: 0</p>
                <p>Emisión: 30/05/2019</p>
                <p>Página: 1 de 1</p>
            </div>

        </div>
        <div class="wrap_document_format_body">
            <form class="general_form" action="" id="formDigital">

                <input type="hidden" id="elaborado" name="elaborado">
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
                        <label for="">TIPIFICACIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL

                        </label>
                    </div>

                </div>

                <div class="box_format">

                    <div>
                        <table class="tablaConBordesExternos w100p">
                            <tbody>
                                <tr>
                                    <td class="w20p center"><input type="checkbox" name="chktip01" id="chktip01"></td>
                                    <td>Daño Material < 500 $</td>
                                    <td class="w20p center"><input type="checkbox" name="chktip09" id="chktip09"></td>
                                    <td>(F.A.C) Caso de Primeros Auxilios</td>
                                </tr>
                                <tr>
                                    <td class="w20p center"><input type="checkbox" name="chktip02" id="chktip02"></td>
                                    <td>Daño Material > 500 $</td>
                                    <td class="w20p center"><input type="checkbox" name="chktip10" id="chktip10"></td>
                                    <td>(M.T.O) Accidente Con Tratamiento Médico</td>
                                </tr>
                                <tr>
                                    <td class="w20p center"><input type="checkbox" name="chktip03" id="chktip03"></td>
                                    <td>Derrame de Hidrocarburos < 2 m3</td>
                                    <td class="w20p center"><input type="checkbox" name="chktip11" id="chktip11"></td>
                                    <td>(R.W.C) Accidente Con Trabajo Restringido</td>
                                </tr>
                                <tr>
                                    <td class="w20p center"><input type="checkbox" name="chktip04" id="chktip04"></td>
                                    <td>Derrame de Hidrocarburos > 2 m3</td>
                                    <td class="w20p center"><input type="checkbox" name="chktip12" id="chktip12"></td>
                                    <td>(L.T.I) Accidente Con Pérdida de Jornada</td>
                                </tr>
                                <tr>
                                    <td class="w20p center"><input type="checkbox" name="chktip05" id="chktip05"></td>
                                    <td>Accidente Vehicular con Herido</td>
                                    <td class="w20p center"><input type="checkbox" name="chktip13" id="chktip13"></td>
                                    <td>(F.T.L) Fatalidad</td>
                                </tr>
                                <tr>
                                    <td class="w20p center"><input type="checkbox" name="chktip06" id="chktip06"></td>
                                    <td>Accidente Vehicular sin Herido</td>
                                    <td class="w20p center"><input type="checkbox" name="chktip14" id="chktip14"></td>
                                    <td>Incidente</td>
                                </tr>
                                <tr>
                                    <td class="w20p center"><input type="checkbox" name="chktip07" id="chktip07"></td>
                                    <td>Accidente Vehicular < 500 $</td>
                                    <td class="w20p center"><input type="checkbox" name="chktip15" id="chktip15"></td>
                                    <td>(E.O) Enfermedad Ocupacional</td>
                                </tr>
                                <tr>
                                    <td class="w20p center"><input type="checkbox" name="chktip08" id="chktip08"></td>
                                    <td>Accidente Vehicular > 500 $ </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <span class="nota">* Los Accidentes Vehiculares con Herido deberán ser clasificados acorde de la
                            gravedad del daño material ( $ ) y gravedad de la lesión (F.A.C, M.T.O, R.W.C, L.T.I,
                            F.T.L)</span>
                    </div>

                </div>



                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">LUGAR Y HORA DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</label>
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
                        <label for="">Fecha</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="date" name="fecha_incidente" id="fecha_incidente">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="fecha_incidente_error"></p>
                    </div>

                </div>

                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Hora</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="time" name="hora_incidente" id="hora_incidente">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="hora_incidente_error"></p>
                    </div>

                </div>





                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Documento Nacional de identificación</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="dni" id="dni">
                        <button id="find_dni">Buscar</button>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="dni_error"></p>
                    </div>

                </div>


                <div class="box_format" id="box_personal">


                </div>


                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">DESCRIPCIÓN Y TOMA DE ACCIÓN
                        </label>
                    </div>

                </div>


                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">DESCRIPCIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</label>
                    </div>
                    <div class="item_format">
                        <label for="">(Incluyendo nombres y cargos de las personas involucradas)</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <textarea class="item_format_input item_format_textarea" name="descripcion" id="descripcion" cols="30"
                            rows="10"></textarea>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="descripcion_error"></p>
                    </div>

                </div>

                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">ACCIONES INMEDIATAS DESPUES DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</label>
                    </div>
                    <div class="item_format">
                        <label for="">(Atención médica, evacuación, reparación de daños materiales, acciones
                            correctivas, etc)</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <textarea class="item_format_input item_format_textarea" name="acciones" id="acciones" cols="30"
                            rows="10"></textarea>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="acciones_error"></p>
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

<script src="<?php echo constant('URL'); ?>public/js/incidencias_new.js?<?php echo constant('VERSION'); ?>"></script>


