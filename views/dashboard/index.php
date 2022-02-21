<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/panelresponsive/panelresponsive.css?<?php echo constant('VERSION'); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/panelresponsive/menulateral.css?<?php echo constant('VERSION'); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/panelresponsive/header.css?<?php echo constant('VERSION'); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/documento/container_documento.css?<?php echo constant('VERSION'); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/documento/general_format.css?<?php echo constant('VERSION'); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/prueba.css?<?php echo constant('VERSION'); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/seguimiento.css?<?php echo constant('VERSION'); ?>">

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
                <div class="circle">
                    <p id="header_usuario_inicial"> J</p>
                </div>

                <div id="header_usuario_datos">
                    <div>
                        <p id="header_usuario_apellido">Nombre apellidos</p>
                    </div>
                    <div>
                        <p id="header_usuario_cargo">Cargo de trabajo</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar">

            <div class="sidebar__title">
                
                <div class="sidebar__img">
                    <img id="sidebar_logo_empresa" src="public/img/logo.png" alt="logo" />
                </div>

                <div class="sidebar_box_close">
                   <img id="sidebar_close" src="public/img/cerrar.png" alt="">
                </div>

            </div>

            <div class="sidebar__menu">
                <div class="active"> Documentos</div>
                <div>Seguimiento</div>
                <div>Admin seguimiento</div>
                <div>Reportes</div>
                <div>Estadística</div>
                <div>Formulario</div>
                <div>Admin formulario</div>
                <div>Admin de lecciones</div>
                <div>Lecciones aprendidas</div>
            </div>


        </div>
        <div class="mainpage item">
        </div>
    </div>


    <script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/funciones.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/panelresponsive/panelresponsive.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>