<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/seguimiento.css?v1.0.3">
<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/prueba.css?v1.0.3">
<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/popup.css?v1.0.5">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />



<div class="container_documento scroll1">

	<div id="container_documento_titulo">
		<h3>Panel seguimiento</h3>

	</div>
	<div class="wrap center">

		<!--
<ul class="tabs">
	<li><a href="#tab4">Actualizar</span></a></li>
</ul>
-->

		<div class="secciones">

			<article id="tab4">

			</article>
		</div>


	</div>


	<!-- ESTE ES EL POPUP  -->
	<div class="popup" id="popup-1">
		<div class="overlay"></div>
		<div class="content scroll1">
			<div class="popup_content">
				<div class="contenidoRepuesta">
					<img class="clickPopup-close" src="public/img/cancel.png">
				</div>
				<div class="boxPopup" id="title">
					<h1 id="item"></h1>
					<div id="estado"></div>
				</div>


				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Hallazgo</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
						<img id="hallazgo" src="public/img/pdf.png">
					</div>

				</div>
				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Peligro riesgo</label>
						<label for="">Evidencia</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
						<div id="foto"></div>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Acción propuesta</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="accion_propuesta"></p>
					</div>

				</div>


				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Fecha inicio</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="fecha_inicio"></p>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Fecha cumplimiento</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="fecha_cumplimiento"></p>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Plazo</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="plazo"></p>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Frente de trabajo</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="frente_trabajo"></p>
					</div>

				</div>


				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Comentarios</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<p id="comentario"></p>
					</div>

				</div>

				
				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Avance / evidencia</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<div id="evidencia"></div>
					</div>

				</div>

				<div class="box_format">

					<!--CONTENT ELEMENT-->
					<div class="item_format">
					<table id="tablaSeguimiento" class="styled-table"></table>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>



<script src="<?php echo constant('URL'); ?>public/js/seguimientodashboard.js?v1.0.53"></script>