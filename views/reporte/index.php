
<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h1>Reportes</h1>
        </div>
    </div>

    <div class="wrap_document_format">
        <form class="general_form" action="" id="formDigital">
            <div class="box_format">
                <!--TITLE ELEMENT-->
                <div class="item_format">
                    <label for="">Documento</label>
                </div>
                <!--CONTENT ELEMENT-->
                <div class="item_format">

                    <select class="item_format_select" name="tipo_documento" id="tipo_documento">
                        <option value="" disabled="" selected="" hidden=""> Seleccionar</option>

                        <option value=1>Tarjetas Top </option>
                        <option value=2>Inspección Planeada de Seguridad </option>
                        <option value="php/inspecciones.php">Inspección Gerencial </option>
                        <option value="#">Suspención de Trabajos </option>
                        <option value="#">Auditoria PTAR </option>
                        <option value="php/repoincidencia.php">Reporte de Incidencias </option>
                        <option value="php/opt.php">OPT </option>
                        <option value="php/riesgos.php">Riesgos Críticos </option>
                        <option value="php/matriz.php">Matriz Mensual </option>
                        <option value="php/ipercNuevo.php">IPERC</option>
                        <option value="php/InspeccionAlmacen.php">Inspección almacen</option>
                        <option value="php/InspeccionOficina.php">Inspección oficina</option>
                        <option value="php/InspeccionBotiquin.php">Inspección botiquin</option>
                        <option value="php/InspeccionEscalera.php">Inspección de escaleras fijas y portátiles </option>
                        <option value="php/InspeccionExtintor.php">Inspección de extintores </option>
                        <option value="php/InspeccionEstacionEmergencia.php">Inspección de estación de emergencia </option>
                        <option value="php/InspeccionTablero.php">Inspección mensual de tableros electricos </option>

                        <option value="php/InspeccionTaller.php">Inspección de talleres </option>
                        <option value="php/GasComprimido.php">Check list almacenamiento de Gases Comprimidos</option>
                        <option value="php/ProductoQuimico.php">Inspección almacén de productos químicos</option>
                        <option value="php/instalacionElectrica.php">Instalaciones electricas temporales</option>
                        <option value="php/inspeccionDerrame.php">Inspección de Kit Antiderrame</option>
                        <option value="php/inspeccionCamilla.php">Inspección de camillas</option>

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
                    <label for="">Proyecto</label>
                </div>
                <!--CONTENT ELEMENT-->
                <div class="item_format">
                    <select class="item_format_select" name="proyecto" id="proyecto">
                        <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                        <option value="100"> Todos los proyectos </option>
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
                    <label for="">Fecha inicio</label>
                </div>

                <!--CONTENT ELEMENT-->
                <div class="item_format">
                    <input class="item_format_input" type="date" name="fecha_inicio" id="fecha_inicio">
                </div>

                <!-- ERRROR ELEMENT -->
                <div class="item_format">
                    <p class="error_message" id="fecha_inicio_error"></p>
                </div>
            </div>


            <div class="box_format">
                <!--TITLE ELEMENT-->

                <div class="item_format">
                    <label for="">Fecha fin </label>
                </div>

                <!--CONTENT ELEMENT-->
                <div class="item_format">
                    <input class="item_format_input" type="date" name="fecha_fin" id="fecha_fin">
                </div>

                <!-- ERRROR ELEMENT -->
                <div class="item_format">
                    <p class="error_message" id="fecha_fin_error"></p>
                </div>
            </div>




            <div class="box_format item_format_rigth">
                <button type="submit" class="button_find_report" id="button_send_form">Buscar</button>
            </div>



        </form>
    </div>

</div>

<div class="wrap_load">

</div>

<div class="wrap_sucess">

</div>
<script src="<?php echo constant('URL'); ?>public/js/report/topReport.js?<?php echo constant('VERSION'); ?>"></script>
<script src="<?php echo constant('URL'); ?>public/js/reporte.js?<?php echo constant('VERSION'); ?>"></script>