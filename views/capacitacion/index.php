<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/prueba.css?<?php echo constant('VERSION'); ?>">

    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/popup.css?<?php echo constant('VERSION'); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/capacitacion.css?<?php echo constant('VERSION'); ?>">

    <title>Control Documentario SSMA - Capacitaciones</title>

</head>

<body>


    <form action="" id="formPrueba">
        <div class="container">
            <input type="file" id="file-input" name="files[]" accept="image/png , image/jpeg" multiple>
            <label for="file-input">Escoger archivos</label>
            <p id="num-of-files">Número de archivos</p>
            <div id="images"></div>
        </div>
        <button id="enviar_prueba" type="submit">enviar</button>
    </form>

    <script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/funciones.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/capacitacion.js"></script>
</body>

</html>