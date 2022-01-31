<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Documentario SSMA</title>

    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/login/login.css?<?php echo constant('VERSION'); ?>">
</head>

<body>
    <div id="contenedor">
        <div id="slide">
            <img id="slide_imagen" src="public/img/seguridad-salud4.jpg" alt="">
        </div>
        <div id="inicio_sesion">

            <div id="inicio_sesion_uno"></div>
            <div id="inicio_sesion_dos">
                <div id="inicio_sesion_dos_top">

                </div>
                <div id="inicio_sesion_dos_bottom">

                    <div class="inicio_sesion_box_top">
                        <h1 id="inicio_sesion_titulo">Bienvenido a Seguridad y Salud
                            Medio Ambiental </h1>
                    </div>
                    <div class="inicio_sesion_box_top">
                        <p id="inicio_sesion_subtitulo">Documento Nacional de Identificación(DNI)</p>
                        
                    </div>
                    <div class="inicio_sesion_box_top">
                        <input type="text" id="inicio_sesion_dni">
                        <p id="inicio_sesion_box_error"></p>
                    </div>


                    <div class="inicio_sesion_box_bottom">
                        <button id="inicio_sesion_button_enviar">Enviar</button>
                    </div>

                </div>
            </div>
            <div id="inicio_sesion_tres"></div>

        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/funciones.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/login/login.js?<?php echo constant('VERSION'); ?>"></script>

</body>

</html>