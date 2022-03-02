<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/grideditar.css?<?php echo constant('VERSION'); ?>">

<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3 id="title_form"></h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Lista </a> <a href="#">/ formulario</a>
        </div>
    </div>


    <div class="wrap_document_format">



        <header class="headerExamen">
        </header>

        <div id="listaPreguntas">

        </div>


        <div class="item_format">

            <div id="buttonAgregarPregunta" class="button-style">
                <img class="icon_plus" src="public/img/plus.png">
            </div>
        </div>


    </div>



<!-- ESTE ES EL POPUP  -->
<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content scroll1">

        <div class="popup_content">


            <div class="contenidoRepuesta item_format_rigth">
                <img class="clickPopup-close" src="public/img/cancel.png">
            </div>

            <form method="POST" id="examen">
                <div class="campo">
                    <h4>Firma del trabajador</h4>
                </div>
                <div class="campo item_format">
                    <label>Nombre del facilitador</label>
                </div>

                <div class="campo item_format">
                    <input type="text" name="nombreFacilitador" id="nombreFacilitador" class="w50p">
                </div>

                <input type="hidden" name="urlImagen" id="urlImagen">

                <div class="campo item_format">
                    <label>Firma</label>

                </div>

                <div class="campo item_format">

                    <div>
                        <canvas class="firmaBordes" id="firma" width="300" height="250"></canvas>
                        <span id="firmado" class="oculto"></span>
                    </div>
                    <p id="firmaMessage"></p>


                </div>

                <div class="campo item_format">
                    <button type="button" class="button-blue" id="draw-clearBtn">Borrar firma </button>

                </div>

                <div class="campo item_format_rigth">
                    <button type="submit" id="btnRegisterFirma" class="button-upload w15p popup_send_form"> Subir firma
                    </button>
                    <!--<button class="buttonDeletePopup clickPopup-close w15p" type="submit" id="btnUpdateDocumento">Cancelar</button>-->
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



<script src="<?php echo constant('URL'); ?>public/js/editar.js?<?php echo constant('VERSION'); ?>"></script>
<script src="<?php echo constant('URL'); ?>public/js/firma.js?<?php echo constant('VERSION'); ?>"></script>
<script src="<?php echo constant('URL'); ?>public/js/firmaMovil.js?<?php echo constant('VERSION'); ?>"></script>