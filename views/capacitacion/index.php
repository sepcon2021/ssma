<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h1>Admin formulario</h1>
        </div>
    </div>

    <div class="wrap_document_format">
        <form class="general_form" action="" id="formDigital">

            <div class="box_format">
                <!--TITLE ELEMENT-->
                <div class="item_format">
                    <label for="">proyecto</label>
                </div>
                <!--CONTENT ELEMENT-->
                <div class="item_format">

                    <select class="item_format_select" name="proyecto" id="proyecto">
                        <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                        <option value="1">WHCP21</option>
                        <option value="2">Obras Electromecánicas Varias Malvinas</option>
                        <option value="3">20PP03 L. Relaves Este / 00679</option>
                        <option value="4">Pucallpa</option>
                        <option value="5">Lurin</option>
                        <option value="6">km 13 - LBV - Reemplazo de 04 válvulas</option>
                        <option value="8">Lima</option>
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
                    <label for="">área</label>
                </div>
                <!--CONTENT ELEMENT-->
                <div class="item_format">
                    <select class="item_format_select" name="area_empresa" id="area_empresa">
                        <option value="" disabled="" selected="" hidden=""> Seleccionar</option>
                        <option value="1">Seguridad</option>
                        <option value="2">Salud</option>
                    </select>

                </div>
                <!-- ERRROR ELEMENT -->
                <div class="item_format">
                    <p class="error_message" id="proyecto_error"></p>
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
<script src="<?php echo constant('URL'); ?>public/js/capacitacion_new.js?<?php echo constant('VERSION'); ?>"></script>