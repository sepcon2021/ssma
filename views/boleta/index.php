<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/boleta.css?<?php echo constant('VERSION'); ?>">
    <title>Boletas RRHH</title>

</head>

<body>

    <form action="" id="formBoletas">
        <h2>Reporte de boletas</h2>
        <select name="documentType" id="documentType">
            <option value="1">Mensual</option>
            <option value="2">Quincenal</option>
        </select>

        <select name="year" id="year">
            <option value="2022"> 2022 </option>
            <option value="2021"> 2021 </option>
            <option value="2020"> 2020</option>
        </select>
        <button id="downloadReport"> Descargar</button>
    </form>

    <script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/funciones.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/boleta.js"></script>
</body>

</html>