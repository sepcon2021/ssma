<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Capacitación</title>

	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/anexo4.css?<?php echo constant('VERSION'); ?>">


<body>

	<div class="center" id="divDni">
		<div>
			<h2>DNI trabajador </h2>
		</div>
		<div>
			<input class="form-input w45p" type="number" id="dniTrabajador" name="dniTrabajador" autocomplete="empty">
		</div>
		<div>
			<p id="message_trabajador">Dni trabajador incorrecto</p>
		</div>

		<div>
			<button class="btnBuscarDni-min" id="btnBuscarDni">Buscar</button>
		</div>
	</div>

	<div class="load">
		<div class="loader"></div>
	</div>





	<script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
	<script src="<?php echo constant('URL'); ?>public/js/funciones.js?<?php echo constant('VERSION'); ?>"></script>
	<script src="<?php echo constant('URL'); ?>public/js/mainseguimiento.js?<?php echo constant('VERSION'); ?>"></script>







</body>

</html>