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
					<p>INSPECCIÓN DE CAMILLAS</p>
				</div>
				<div class="formato">
					<p>PSPC-120-X-PG-001-FR-003</p>
					<p>Revisión: 0</p>
					<p>Emisión: 29/08/2019</p>
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
								<td class="w50p center">
									<p>Marcar lo que corresponda : BUENO (Si están en buenas condiciones para utilizarlos) =  √     MALO (No están en buenas condiciones para realizar el trabajo) = X    </p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<table class="tablaConBordes" id="tablaClasificacion">
					<thead>
						<tr>
							<th class="secction w5p center">
								<p>N°</p>
							</th>

							<th class="secction   w20p center">
								<p>Ubicación</p>
							</th>


							
                            <th class="secction  titlehorizontal w5p center">
                                <p>Condicones de la camilla</p>
                            </th>
							
							<th class="secction titlehorizontal w5p center">
                                <p>Collarín cervical regulable</p>
                            </th>
							<th class="secction titlehorizontal w5p center">
                                <p>Fijador de cabeza</p>
                            </th>
							<th class="secction titlehorizontal w5p center">
                                <p>Ubicación de la camilla disponible</p>
                            </th>
							<th class="secction titlehorizontal w5p center">
                                <p>Señalización de camilla</p>
                            </th>
							<th class="secction titlehorizontal w5p center">
                                <p>Férulas neumaticas de 6 piezas</p>
                            </th>
							<th class="secction titlehorizontal w5p center">
                                <p>Arnés de sujección corporal</p>
                            </th>
							<th class="secction titlehorizontal w5p center">
                                <p>Protección de la camilla</p>
                            </th>

							<th class="secction   titlehorizontal w6p center">
								<p>Clasificación</p>
							</th>

							<th class="secction   w20p center">
								<p>Acción correctiva</p>
							</th>

							<th class="secction titlehorizontal   w5p center">
								<p>Fecha de cumplimiento</p>
							</th>

							<th class="secction   w20p center">
								<p>Seguimiento</p>
							</th>
							
						</tr>

					</thead>
					<tbody class="tbody-data">

						<?php

						for($index = 1 ; $index < 11 ; $index++){

							$fecha =  date("Y-m-d");
							echo '
							
							<tr>
							<td class="w5p">'.$index.'</td>
							<td class="w30p">
								<textarea name="ubicacion" id="ubicacion" class="ubicacion w90p"></textarea>
							</td>


							<td class="w5p">
								<select name="condicion_camilla" id="condicion_camilla" class="condicion_camilla w100p">
									<option value="3"></option>
									<option value="1">√ </option>
									<option value="2">X</option>
								</select>
							</td>
							<td class="w5p">
								<select name="collarin_cervical" id="collarin_cervical" class="collarin_cervical w100p">
									<option value="3"></option>
									<option value="1">√ </option>
									<option value="2">X</option>
								</select>
							</td>
							<td class="w5p">
								<select name="fijador_cabezera" id="fijador_cabezera" class="fijador_cabezera w100p">
								<option value="3"></option>	
								<option value="1">√ </option>
									<option value="2">X</option>
								</select>
							</td>
							<td class="w5p">
								<select name="ubicacion_camilla" id="ubicacion_camilla" class="ubicacion_camilla w100p">
								<option value="3"></option>	
								<option value="1">√ </option>
									<option value="2">X</option>
								</select>
							</td>
							<td class="w5p">
								<select name="senalizacion_camilla" id="senalizacion_camilla" class="senalizacion_camilla w100p">
								<option value="3"></option>	
								<option value="1">√ </option>
									<option value="2">X</option>
								</select>
							</td>
							<td class="w5p">
								<select name="ferula_neumatica" id="ferula_neumatica" class="ferula_neumatica w100p">
								<option value="3"></option>	
								<option value="1">√ </option>
									<option value="2">X</option>
								</select>
							</td>
							<td class="w5p">
								<select name="arnes_sujecion" id="arnes_sujecion" class="arnes_sujecion w100p">
								<option value="3"></option>	
								<option value="1">√ </option>
									<option value="2">X</option>
								</select>
							</td>
							<td class="w5p">
								<select name="proteccion_camilla" id="proteccion_camilla" class="proteccion_camilla w100p">
								<option value="3"></option>	
								<option value="1">√ </option>
									<option value="2">X</option>
								</select>
							</td>


							<td class="w6p">
								<select name="clasificacion" id="clasificacion" class="clasificacion w100p">
									<option value="4"></option>
									<option value="1">A</option>
									<option value="2">B</option>
									<option value="3">C</option>
								</select>
							</td>
							<td class="w25p">
								<textarea name="accion_correctiva" id="accion_correctiva" class="accion_correctiva w90p"></textarea>
							</td>
							<td class="w5p">
							 	<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="'.$fecha.'" class="fecha_cumplimiento w100p"> 
							</td>
							<td class="w25p">
								<textarea name="seguimiento" id="seguimiento" class="seguimiento w90p"></textarea>
							</td>

						</tr>

							';
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
	<script src="<?php echo constant('URL'); ?>public/js/inspeccionCamilla.js?<?php echo constant('VERSION'); ?>"></script>
	<script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>