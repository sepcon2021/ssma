<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?php echo constant('URL') ?>public/img/logo.png" />
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/popup.css">
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/seguridad.css">
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/prueba.css?<?php echo constant('VERSION'); ?>">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />

	<title>Control Documentario SSMA - Inspección Planeada de Seguridad</title>
</head>

<body>
	<?php require 'views/header.php'; ?>




	<div id="wrap">
		<div class="page">
			<div class="cabeceraDoc">
				<div class="logo"> <img src="<?php echo constant('URL') ?>public/img/logo.png" alt=""> </div>
				<div class="titulo">
				<p>INSPECCIÓN DE EXTINTORES</p>
				</div>
				<div class="formato">
					<p>PSPC-110-X-PR-001-FR-012</p>
					<p>Revisión: 0</p>
					<p>Emisión: 17/05/2019</p>
					<p>Página: 1 de 1</p>
				</div>
			</div>
			<form method="POST" id="formulario" name="formulario">


				<div class="manyInput">
					<div>
						<label for="sede">Tipo de Inspección: </label>
						<select id="id_tipo_inspeccion" name="id_tipo_inspeccion" id="id_tipo_inspeccion" class="w100p">
							<option value="-1">Elegir</option>
							<option value="1">Informal</option>
							<option value="2">Planeada</option>
						</select>
					</div>
				</div>

				<div class="manyInput">
					<div class="w60p">
						<label for="lista_proyecto">Proyecto</label>
						<select name="sede" id="lista_proyecto" class="w90p">
						</select>
					</div>
				</div>

				<div class="manyInput">
					<div class="w35p">
						<label for="lista_area">Área</label>
						<select name="id_area" id="lista_area" class="w100p">
						</select>
					</div>
				</div>


				<div class="manyInput">
					<div class="w60p">
						<label for="lugar_inspeccion">Lugar de inspección</label>
						<input id="lugar_inspeccion" type="text" name="lugar_inspeccion" id="lugar_inspeccion" class="w90p">
					</div>

					<div class="w35p">
						<label for="fecha">Fecha</label>
						<input id="fecha" type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . " - 2 days")); ?>" class="w80p">
					</div>
				</div>


				<div class="manyInput">
					<div class="w60p">
						<label for="inspeccionado_por">Inspeccionado por</label>
						<input readonly id="inspeccionado_por" type="text" name="inspeccionado_por" id="inspeccionado_por" class="w90p" value="<?php echo $this->nombres; ?>">
					</div>
				</div>



				<div class="manyInput">
					<div class="w60p">
						<label for="responsable_area">Responsable del área</label>
						<select name="dni_propietario" class="dni_propietario"></select>
					</div>
				</div>



				<div>
					<table class="tablaConBordes w100p">
						<tbody>
							<tr>
								<td class="w30p">
									<p>(1) MAL UBICADO </p>
								</td>
								<td class="w30p">
									<p>(6) COLGADOR AUSENTE O INADECUADO</p>
								</td>
								<td class="w40p">
									<p>(11) ABRAZADERA O SUJETADOR DE MANGUERA DAÑADA, INADECUADA O AUSENTE</p>
								</td>
							</tr>

							<tr>
								<td class="w30p">
									<p>(2) ACCESO OBSTRUIDO </p>
								</td>
								<td class="w30p">
									<p>(7) SIN PASADOR Y/O PRECINTO DE SEGURIDAD</p>
								</td>
								<td class="w40p">
									<p>(12) TOBERA, PISTON O PISTOLA: DAÑADO O AUSENTE</p>
								</td>
							</tr>

							<tr>
								<td class="w30p">
									<p>(3) EXTINTOR NO NUMERADO</p>
								</td>
								<td class="w30p">
									<p>(8) MANOMETRO CON PRESIÓN INADEACUADA / DAÑADO</p>
								</td>
								<td class="w40p">
									<p>(13) CILINDRO, BOTELLA O CARTUCHO IMPULSOR EN MAL ESTADO</p>
								</td>
							</tr>

							<tr>
								<td class="w30p">
									<p>(4) PICTOGRAMA DE CLASE DE FUEGO (NTP 350.021) CARECE O ES ILEGIBLE</p>
								</td>
								<td class="w30p">
									<p>(9) MANIJA DE ACERO, PALANCA DE ACTIVACIÓN O PISTOLA DAÑADA O AUSENTE</p>
								</td>
								<td class="w40p">
									<p>(14) PINTURA DETERIORADA DEL CILINDRO, BOTELLA O CARTUCHO</p>
								</td>
							</tr>

							<tr>
								<td class="w30p">
									<p>(5) ETIQUETA DE RECARGA CARECE O ES ILEGIBLE</p>
								</td>
								<td class="w30p">
									<p>(10) MANGUERA DAÑADA O AUSENTE</p>
								</td>
								<td class="w40p">
									<p>(15) Otros. Especifique :</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div>
					<table class="tablaConBordes w100p">
						<tbody>
							<tr>
								<td class="w30p center">
									<p>Bueno = v</p>
								</td>
								<td class="w30p center">
									<p>Defectuoso = X</p>
								</td>
								<td class="w40p center">
									<p>No aplicable = NA</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>



				<table class="tablaConBordes w100p" id="tablaClasificacion">
					<thead>
						<tr>
							<th class="secction w5p center">
								<p>N°</p>
							</th>

							<th class="secction   w20p center">
								<p>Ubicación</p>
							</th>



							<th class="secction   w20p center">
								<p>Condición</p>
							</th>

							<th class="secction   w6p center">
								<p>Clasificación</p>
							</th>

							<th class="secction   w20p center">
								<p>Acción correctiva</p>
							</th>

							<th class="secction   w10p center">
								<p>Responsable</p>
							</th>


							<th class="secction   w5p center">
								<p>Fecha de cumplimiento</p>
							</th>

							<th class="secction   w20p center">
								<p>Seguimiento</p>
							</th>
							<th class="secction   w20p center">
								<p>Evidencia</p>
							</th>
						</tr>

					</thead>
					<tbody class="tbody-data">
					<?php
						for ($i = 1; $i < 20; $i++) {

							$fecha = date("Y-m-d");

							echo '<tr>
						<td class="w5p">1</td>
						<td class="w20p">
							<textarea name="ubicacion" id="ubicacion" class="ubicacion w90p"></textarea>
						</td>
						<td class="w20p">
							<textarea name="condicion" id="condicion" class="condicion w90p"></textarea>
						</td>
						<td class="w5p">
							<select name="calificacion" id="calificacion" class="calificacion w90p">
								<option value="1">A</option>
								<option value="2">B</option>
								<option value="3">C</option>
							</select>
						</td>
						<td class="w20p">
							<textarea name="accion_correctiva" id="accion_correctiva" class="accion_correctiva w90p"></textarea>
						</td>
						<td class="w10p">
							<select name="dni_propietario" class="dni_propietario w90p">
							</select>
						</td>
						<td class="w5p">
							<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="' . $fecha . '" class="fecha_cumplimiento w80p">
						</td>
						<td class="w20p">
							<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
						</td>
						<td>
						<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
						<button class="agregarEvidencia">Agregar</button>
					</td>
					</tr>';
						}
						?>
					</tbody>
				</table>


				<table class="tablaConBordes w100p">
					<thead>
						<tr>
							<th>Clasificación de las condiciones sub estándar:</th>
							<th>OBSERVACIONES</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="w50p">(A) Mayor: Se considera que el peligro encontrado, podría ocasionar daños mayores, o tiene un potencial de pérdida alto, por lo tanto existe un plazo máximo de levantamiento de la observación de 24 horas</td>
							<td>
								<textarea name="observacion_uno" id="observacion_uno" cols="30" rows="4"></textarea>
							</td>
						</tr>
						<tr>
							<td class="w50p">(B) Serio: Se considera que el peligro encontrado, podría ocasionar daños regulares, o tiene un potencial de pérdida medio, por lo tanto existe un plazo máximo de levantamiento de la observación encontrada de 72 horas o 3 días.</td>
							<td>
								<textarea name="observacion_dos" id="observacion_dos" cols="30" rows="4"></textarea>
							</td>
						</tr>
						<tr>
							<td class="w50p">(C) Menor: Se considera que el peligro encontrado, podría ocasionar daños menores, o tiene un potencial de pérdida bajo, por lo tanto existe un plazo máximo de levantamiento de la observación encontrada de 14 días.</td>
							<td>
								<textarea name="observacion_tres" id="observacion_tres" cols="30" rows="4"></textarea>
							</td>
						</tr>
					</tbody>
				</table>


				<div class="buttonsPage">
					<button type="submit" id="btnRegister"> <i class="far fa-calendar-check"></i> Registrar</button>
					<button type="reset" id="btnCancel"><i class="fas fa-ban"></i> Cancelar</button>
				</div>


			</form>
		</div>
	</div>


	<!-- ESTE ES EL POPUP  -->
	<div class="popup" id="popup-1">
		<div class="overlay"></div>
		<div class="content">
			<div id="conten-data">
				<input type="hidden" id="nombre_supervisor">
				<input type="hidden" id="dni_supervisor">
				<input type="hidden" id="id_documento">

				<div class="content-move">

					<form class="div-popup" method="POST" id="formpopup">

						<input type="hidden" id="idFila">
						<div class="field">
							<p class="p-popup">Subir archivos</p class="p-popup">
							<p>*Los archivos son opcionales</p>
						</div>

						<div id="drop-zone">
							<div id="clickHereMultifile"> Click aquí<i class="fa fa-upload"></i>
								<input type="file" name="files[]" id="file" multiple />
							</div>
							<div id='filename'></div>
						</div>



						<!-- ACTUALIZAMOS EL DOCUMENTO CON EL SUPERVISOR ASIGNADO Y FECHA DE CONTRATO-->
						<div class="center div-top">
							<button class="buttonDeletePopup clickPopup-close" type="submit" id="btnUpdateDocumento">Cancelar</button>
							<button class="buttonAdd" type="submit" id="btnUpdateDocumento">Agregar</button>
						</div>

					</form>

				</div>
			</div>

			<div class="loader"></div>


		</div>
	</div>

	<div class="floatingActionButton"> <a href="<?php echo constant('URL') ?>panel"><i class="fas fa-home"></i></a> </div>
	<div class="mensaje msj_info"> <span>Datos ingresados correctamente</span> </div>


	<script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
	<script src="<?php echo constant('URL'); ?>public/js/funciones.js?<?php echo constant('VERSION'); ?>"></script>
	<script src="<?php echo constant('URL'); ?>public/js/inspeccionExtintor.js?<?php echo constant('VERSION'); ?>"></script>
	<script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>