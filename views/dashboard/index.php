<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet"
    href="<?php echo constant('URL') ?>public/css/panelresponsive/panelresponsive.css?<?php echo constant('VERSION'); ?>">
  <link rel="stylesheet"
    href="<?php echo constant('URL') ?>public/css/panelresponsive/menulateral.css?<?php echo constant('VERSION'); ?>">
  <link rel="stylesheet"
    href="<?php echo constant('URL') ?>public/css/panelresponsive/header.css?<?php echo constant('VERSION'); ?>">
  <link rel="stylesheet"
    href="<?php echo constant('URL') ?>public/css/documento/container_documento.css?<?php echo constant('VERSION'); ?>">
  <link rel="stylesheet"
    href="<?php echo constant('URL') ?>public/css/documento/general_format.css?<?php echo constant('VERSION'); ?>">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/prueba.css?<?php echo constant('VERSION'); ?>">
  <link rel="stylesheet"
    href="<?php echo constant('URL') ?>public/css/seguimiento.css?<?php echo constant('VERSION'); ?>">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>font/css/all.min.css">
  <link rel="stylesheet"
    href="<?php echo constant('URL') ?>public/css/evaluacion.css?<?php echo constant('VERSION'); ?>">

  <link rel="shortcut icon" type="image/png" href="<?php echo constant('URL') ?>public/img/logo.png" />

  <title>Control Documentario SSMA</title>
</head>

<body>


  <div class="contenedor">

    <div class="header">
      <div id="header_buscador">
        <img id="header_buscador_menu" src="public/img/menu.png" alt="">
      </div>

      <div id="header_logo">
        <!--<img id="header_logo_empresa" src="public/img/logo.png" alt="logo" />-->
        <h2>SSMA</h2>
      </div>

      <div id="header_usuario">


        <div id="notification" class="notification-desactive">
          <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
          <span class="amount_notification">3</span>
        </div>

        <div class="circle" id="circle">
          <p id="header_usuario_inicial"> J</p>
          <div id="header_cerrar_sesion">


          </div>
        </div>

        <div id="header_usuario_datos">
          <!-- <div>
            <p id="header_usuario_apellido">Nombre apellidos</p>
          </div>
          <div>
            <p id="header_usuario_cargo">Cargo de trabajo</p>
          </div>

          <div>
            <button class="cerrar_sesion">Cerrar sesión</button>
          </div>-->
        </div>

      </div>
    </div>

    <div class="sidebar">

      <div class="sidebar__title">

        <div class="sidebar__img">
          <!-- <img id="sidebar_logo_empresa" src="public/img/logo2.png" alt="logo" />-->
          <p>SSMA</p>
        </div>

        <div class="sidebar_box_close">
          <img id="sidebar_close" src="public/img/cerrar.png" alt="">
        </div>

      </div>

      <div class="sidebar__menu">
      </div>


    </div>
    <div class="mainpage item">
    </div>
  </div>


  <!-- POPUP  -->
  <div class="popup_notificacion" id="popup-2">
    <div class="overlay"></div>
    <div class="content scroll1">

      <div class="popup_content">
        <div class="align_center">
          <h3>Notificación</h3>
        </div>
        <div class="align_center">
          <img class="notificacion_icon" src="public/img/notificacion.svg" alt="">
        </div>
        <br>
        <div class="align_center">
          <p>Nuevas lecciones aprendidas fueron publicadas</p>
        </div>
        <div class="align_center">
          <button class="notificacion_button">Ver</button>
        </div>
      </div>


      <div class="popup_load">

      </div>

      <div class="popup_sucess">

      </div>

    </div>
  </div>

  <script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
  <script src="<?php echo constant('URL'); ?>public/js/funciones.js?<?php echo constant('VERSION'); ?>"></script>
  <script
    src="<?php echo constant('URL'); ?>public/js/panelresponsive/panelresponsive.js?<?php echo constant('VERSION'); ?>"
    type="module"></script>


</body>

</html>