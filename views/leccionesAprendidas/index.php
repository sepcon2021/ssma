<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3 >Administrador de lecciones aprendidas</h3>
        </div>

    </div>


    <div class="wrap_document_format">


                <input type="hidden" id="usuario_dni" name="usuario_dni">
        <div>

            <div class="item_format">
                <h3 class="titulo" id="nombreAreaEmpresa"></h3>
            </div>
            <div class="item_format">
                <h3 class="titulo" id="nombreProyecto"></h3>
            </div>
            <div class="item_format">

                <form method="POST" id="formCrearCapacitacion" class="w100p item_format">
                    <input type="hidden" name="codigoproyecto" id="codigoproyecto">
                    <input type="hidden" name="idareaempresa" id="idareaempresa">

                    <button type="submit" class="find_dni" id="addRowObs">Crear</button>
                </form>
            </div>
            <br><br>
        </div>

        <table class="styled-table">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Usuario</td>
                    <td>Nombre</td>
                    <td>Registro</td>
                    <td>pdf</td>
                    <td></td>
                </tr>
            </thead>
            <tbody id="listLeccion">
            </tbody>
        </table>
    </div>


    
    <!-- ESTE ES EL POPUP  -->
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content scroll1">

            <div class="popup_content">

                <div class="contenidoRepuesta item_format_rigth">
			        <img class="clickPopup-close" src="public/img/cancel.png">
		        </div>

                <div>
                    <h3>Lección aprendida</h3>
                </div>

                <form class="div-popup" method="POST" id="formpopup">
                <input type="hidden" id="usuario" name="usuario">


                    <div class="box_format">

                        <!--TITLE ELEMENT-->

                        <div class="item_format">
                            <label for="">Detalle de la publicación</label>
                        </div>

                        <!--CONTENT ELEMENT-->

                        <div class="item_format">
                            <textarea class="item_format_textarea" name="nombre" id="nombre"></textarea>
                        </div>

                        <!-- ERRROR ELEMENT -->
                        <div class="item_format">
                            <p class="error_message" id="nombre_error"></p>
                        </div>

                    </div>


                    <div class="box_format">
                        <!--TITLE ELEMENT-->
                        <div class="item_format">
                            <label for="">Documentos
                            </label>
                        </div>

                        <!--CONTENT ELEMENT-->
                        <div class="item_format">
                            <div class="container_photo">
                                <input type="file" id="file-input" name="files[]" accept="image/png , image/jpeg , application/pdf"
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

<script src="<?php echo constant('URL'); ?>public/js/leccionesAprendidas.js?<?php echo constant('VERSION'); ?>"></script>