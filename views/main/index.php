<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control Documentario SSMA</title>

  <link rel="stylesheet"
    href="<?php echo constant('URL') ?>public/css/login/login.css?<?php echo constant('VERSION'); ?>">

  <link rel="shortcut icon" type="image/png" href="<?php echo constant('URL') ?>public/img/logo.png" />
</head>

<body>
  <div id="contenedor">
    <div id="slide">
      <img id="slide_imagen" src="public/img/seguridad_logo.svg" alt="">
    </div>
    <div id="inicio_sesion">

      <div id="inicio_sesion_uno"></div>
      <div id="inicio_sesion_dos">
        <div id="inicio_sesion_dos_top">

        </div>
        <div id="inicio_sesion_dos_bottom">

          <div class="inicio_sesion_box_top">
            <h1 id="inicio_sesion_titulo">Bienvenido a la plataforma de SSMA</h1>
          </div>
          <div class="inicio_sesion_box_top">
            <p id="inicio_sesion_subtitulo">Documento Nacional de Identificación(DNI)</p>

          </div>
          <div class="inicio_sesion_box_top">
            <input type="text" id="inicio_sesion_dni" class="inicio_sesion_dni" placeholder="DNI">
            <p id="inicio_sesion_box_error"></p>
          </div>
          <br>

          <div class="inicio_sesion_box_top">
            <input type="password" id="inicio_sesion_password" class="inicio_sesion_dni" placeholder="Contraseña">
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

  <script src="<?php echo constant('URL'); ?>public/js/pruebsfetch.js"></script>
  <script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
  <script src="<?php echo constant('URL'); ?>public/js/funciones.js?<?php echo constant('VERSION'); ?>"></script>
  <script src="<?php echo constant('URL'); ?>public/js/login/login.js?<?php echo constant('VERSION'); ?>"></script>

</body>

</html>