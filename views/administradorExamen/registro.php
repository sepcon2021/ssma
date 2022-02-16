<div class="wrap_document scroll1">


    <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Examenes</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ lista </a>
        </div>
    </div>


    <div class="wrap_document_format">
        <form class="general_form" action="" id="formDigital">

            <input type="hidden" name="nombreFirmaTrabajador" id="nombreFirmaTrabajador">

            <div class="header_exam">

            </div>

            <div id="contenido-pregunta">
            </div>


            <div class="contenido">
                <div class="item_format">
                    <br>
                    <h4>Firma del trabajador</h4>
                    <br>
                </div>
                <div class="item_format">
                    <div>
                        <canvas class="firmaBordes" id="firma" width="240" height="300"></canvas>
                        <span id="firmado" class="oculto"></span>
                    </div>
                </div>
                <div class="item_format">
                    <p id="firmaMessage"></p>

                </div>
                <div class="item_format">
                    <button type="button" class="button-blue" id="draw-clearBtn">Borrar firma </button>
                </div>
            </div>

            <div class="box_format item_format_rigth">
                <button type="submit" id="button_send_form"> Registrar Documento </button>
            </div>



        </form>
    </div>

</div>

<div class="wrap_load">

</div>

<div class="wrap_sucess">

</div>
<script src="<?php echo constant('URL'); ?>public/js/firma.js?<?php echo constant('VERSION'); ?>"></script>
<script src="<?php echo constant('URL'); ?>public/js/firmamovil.js?<?php echo constant('VERSION'); ?>"></script>
<script src="<?php echo constant('URL'); ?>public/js/registro.js?<?php echo constant('VERSION'); ?>"></script>