
<div class="wrap_document scroll1">

	<div class="wrap_document_detail">
		<div class="item_format">
			<h1>Administrador seguimiento</h1>
		</div>
	</div>

	<div class="wrap_document_format">
		<form class="general_form" action="" id="formDigital">
			<div class="box_format">
				<!--TITLE ELEMENT-->
				<div class="item_format">
					<label for="">Documento</label>
				</div>
				<!--CONTENT ELEMENT-->
				<div class="item_format">

					<select class="item_format_select" name="tipo_documento" id="tipo_documento">
						<option value="" disabled="" selected="" hidden=""> Seleccionar</option>

						<option value=1>Tarjetas Top </option>
						<option value=2>Inspección Planeada de Seguridad </option>

					</select>
				</div>
				<!-- ERRROR ELEMENT -->
				<div class="item_format">
					<p class="error_message" id="proyecto_error"></p>
				</div>
			</div>


			<div class="box_format">
				<!--TITLE ELEMENT-->
				<div class="item_format">
					<label for="">Proyecto</label>
				</div>
				<!--CONTENT ELEMENT-->
				<div class="item_format">
					<select class="item_format_select" name="proyecto" id="proyecto">
						<option value="" disabled="" selected="" hidden=""> Seleccionar</option>
						<option value="100"> Todos los proyectos </option>
						<option value="1">WHCP 21</option>
						<option value="3">Pucallpa</option>
						<option value="4">Lurin</option>
						<option value="5">Lima</option>
						<option value="6">20PP03 L. Relaves Este / 00679</option>
						<option value="7">Full Flow flare - Shut dow</option>
						<option value="8">Sistema contra incendios</option>
						<option value="9">Obras Electromecánicas Varias</option>
					</select>
				</div>
				<!-- ERRROR ELEMENT -->
				<div class="item_format">
					<p class="error_message" id="proyecto_error"></p>
				</div>
			</div>


			<div class="box_format item_format_rigth">
				<button type="submit" class="button_find_report" id="button_send_form">Buscar</button>
			</div>



		</form>


	</div>

</div>

<div class="wrap_load"></div>

<div class="wrap_sucess"></div>


<script src="<?php echo constant('URL'); ?>public/js/adminseguimientodetalle.js?<?php echo constant('VERSION'); ?>"></script>
<script src="<?php echo constant('URL'); ?>public/js/adminseguimiento.js?<?php echo constant('VERSION'); ?>"></script>