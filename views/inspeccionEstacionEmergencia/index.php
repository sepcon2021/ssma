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
					<p>INSPECCIÓN ESTACIÓN DE EMERGENCIA</p>
				</div>
				<div class="formato">
					<p>PSPC-110-X-PR-001-FR-072</p>
					<p>Revisión: 0</p>
					<p>Emisión: 03/06/2021</p>
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
					<div class="w35p">
						<label for="lugar_inspeccion">Lugar de inspección</label>
						<input id="lugar_inspeccion" type="text" name="lugar_inspeccion" id="lugar_inspeccion" class="w100p">
					</div>
				</div>

				<div class="manyInput">

					<div class="w20p">
						<label for="fecha">Estación N°</label>
						<input id="estacion" type="text" name="estacion" id="estacion" class="w90p">
					</div>
				</div>



				<div class="manyInput">
					<div class="w30p">
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



				<table class="tablaConBordes w100p" id="tablaClasificacion">
					<thead>
						<tr>
							<th class="secction w20p center">
								<p>Descripción</p>
							</th>

							<th class="secction  w10p center">
								<p>Condición</p>
							</th>

							<th class="secction   w6p center">
								<p>Clasificación</p>
							</th>

							<th class="secction   w30p center">
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
						<tr>
							<td class="w20p">Hojas de datos MSDS</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>



						</tr>


						<tr>
							<td class="w20p">Guantes de nitrilo</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>



						<tr>
							<td class="w20p">Kit Lavatorio de ojos</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>


						<tr>
							<td class="w20p">Extintor PQS 10 KG</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>


						<tr>
							<td class="w20p">Botiquín</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>


						<tr>
							<td class="w20p">Kit antiderrame</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>


						<tr>
							<td class="w20p">Frazada</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>


						<tr>
							<td class="w20p">Inmovilizador de cabeza</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>



						<tr>
							<td class="w20p">Inmovilizador cervical</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>


						<tr>
							<td class="w20p">Fedulas </td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>

						<tr>
							<td class="w20p">Canastilla y camilla</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>


						<tr>
							<td class="w20p">Megafono</td>
							<td class="w6p">
								<select name="condicion" id="condicion" class="condicion w90p">
									<option value="1">Bueno</option>
									<option value="2">Malo</option>
									<option value="3">Falta</option>
								</select>
							</td>
							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w90p">
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
								<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d"); ?>" class="fecha_cumplimiento w80p">
							</td>

							<td class="w20p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>


							<td>
								<textarea class="archivos" name="archivos" id="archivos" cols="30" rows="10" readonly></textarea>
								<button class="agregarEvidencia">Agregar</button>
							</td>

						</tr>


					</tbody>
				</table>




				<table class="tablaConBordes w100p">
					<thead>
						<tr>
							<th></th>

							<th>Clasificación de las condiciones sub estándar:</th>
						</tr>
					</thead>
					<tbody>
						<tr>

							<td class="w50p">
								<p>(*) En botiquines que se implementen en zonas de trabajo con espejos de agua, se contará con una (1) manta térmica aluminizada.</p>
								<textarea name="observacion" id="observacion" cols="30" rows="4" placeholder="Observaciones"></textarea>
							</td>
							<td class="w50p">
								(A) Mayor: Se considera que el peligro encontrado, podría ocasionar daños mayores, o tiene un potencial de pérdida alto, por lo tanto existe un plazo máximo de levantamiento de la observación de 24 horas <br>
								(B) Serio: Se considera que el peligro encontrado, podría ocasionar daños regulares, o tiene un potencial de pérdida medio, por lo tanto existe un plazo máximo de levantamiento de la observación encontrada de 72 horas o 3 días. <br>
								(C) Menor: Se considera que el peligro encontrado, podría ocasionar daños menores, o tiene un potencial de pérdida bajo, por lo tanto existe un plazo máximo de levantamiento de la observación encontrada de 14 días.
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
	<script src="<?php echo constant('URL'); ?>public/js/inspeccionEstacionEmergencia.js?<?php echo constant('VERSION'); ?>"></script>
	<script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>