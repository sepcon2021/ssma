<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/verification-checks.css">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/riesgos.css">
	<title>Control Documentario SSMA - IPERC</title>
</head>

<body>
	<?php require 'views/header.php'; ?>
		<div id="wrap">
			<div class="page">
				<div class="cabeceraDoc">
					<div class="logo"> <img src="<?php echo constant('URL')?>public/img/logo.png" alt=""> </div>
					<div class="titulo">
						<p>RIESGOS CRÍTICOS</p>
					</div>
					<div class="formato">
						<p></p>
						<p>Revisión: 0</p>
						<p>Emisión: </p>
						<p>Página:</p>
					</div>
				</div>
				<form method="POST" id="form-riesgo">
					<div id="container0">
						<div>
							<div class="manyInput">
								<div class="flex1">
									<label for="sede">Inspeccionado por : </label>
									<p>
										<?php echo $this->nombres ?>
									</p>
								</div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px form-control">
									<label for="lista_proyecto" class="obligatorio">Proyecto :</label>
									<select name="idProyecto" id="lista_proyecto" class="w75p"> </select>
									<small>Error message</small>

								</div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px   form-control">
									<div class="inputentry mb15px">
										<label for="lista_area" class="obligatorio">Área :</label>
										<select name="idArea" id="lista_area" class="w75p"> </select>
										<small>Error message</small>

									</div>
								</div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px">
									<div class="inputentry mb15px   form-control">
										<label for="lista_area_observada">Área Observada:</label>
										<select name="idAreaObservada" id="lista_area_observada" class="w75p"> </select>
										<small>Error message</small>
									</div>
								</div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px  form-control">
									<label for="ubicacion_tarea_auditada" class="obligatorio">Ubicación de la tarea auditada</label>
									<input type="text" name="ubicacion_tarea_auditada" id="ubicacion_tarea_auditada" class="w95p"> <small>Error message</small> </div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px form-control">
									<label for="tarea_auditada" class="obligatorio">Descripción de la Tarea Auditada </label>
									<input type="text" name="tarea_auditada" id="tarea_auditada" class="w70p"> <small>Error message</small> </div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px form-control">
									<label for="lider_auditoria" class="obligatorio">APELLIDOS Y NOMBRES DEL LIDER DE AUDITORIA </label>
									<input type="text" name="lider_auditoria" id="lider_auditoria" class="w70p"> <small>Error message</small> </div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px  form-control">
									<label for="participantes" class="obligatorio">APELLIDOS Y NOMBRES DE LOS PARTICIPANTES </label>
									<input type="text" name="participantes" id="participantes" class="w70p"> <small>Error message</small> </div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px  form-control">
									<label for="empresa" class="obligatorio">EMPRESA </label>
									<input type="text" name="empresa" id="empresa" class="w70p"> <small>Error message</small> </div>
							</div>
							<div class="manyInput">
								<div class="flex1">
									<label for="sede">Fecha: </label>
									<input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d");?>" class="w30p"> </div>
							</div>
						</div>
						<div class="buttonsPage">
							<button id="button_next0"> Siguiente</button>
						</div>
					</div>
					<div id="container1">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 1 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p>1.- Aislamiento, bloqueo y etiquetado de Energías</p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo11_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 1.1 Personal calificado, autorizado y acreditado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo11_display" name="riesgo11" id="riesgo11s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo11_display" name="riesgo11" id="riesgo11n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo11_display" name="riesgo11" id="riesgo11na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo11_display">
											<p>Comentario</p>
											<textarea name="riesgo11_comments" id="riesgo11_comments"> </textarea> <small>Error message </span>
											
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo12_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 1.2 Identificación de toda las fuentes de energía (aguas arriba y aguas abajo) de los equipos o circuitos a intervenor </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo12_display" name="riesgo12" id="riesgo12s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo12_display" name="riesgo12" id="riesgo12n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo12_display" name="riesgo12" id="riesgo12na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo12_display">
											<p>Comentario</p>
											<textarea name="riesgo12_comments" id="riesgo12_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo13_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 1.3 Comunicar y obtener los permisos para el bloqueo de los circuitos o equipos a intervenir </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo13_display" name="riesgo13" id="riesgo13s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo13_display" name="riesgo13" id="riesgo13n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo13_display" name="riesgo13" id="riesgo13na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo13_display">
											<p>Comentario</p>
											<textarea name="riesgo13_comments" id="riesgo13_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo14_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 1.4 Aislar y bloquear la fuente de energía principal de los equipos o circuitos a intervenir </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo14_display" name="riesgo14" id="riesgo14s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo14_display" name="riesgo14" id="riesgo14n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo14_display" name="riesgo14" id="riesgo14na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo14_display">
											<p>Comentario</p>
											<textarea name="riesgo14_comments" id="riesgo14_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo15_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 1.5 Realizar la prueba de arranque verificando la ausencia de energía </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo15_display" name="riesgo15" id="riesgo15s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo15_display" name="riesgo15" id="riesgo15n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo15_display" name="riesgo15" id="riesgo15na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo15_display">
											<p>Comentario</p>
											<textarea name="riesgo15_comments" id="riesgo15_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo16_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 1.6 Colocar tarjetas y candados de bloqueo personal </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo16_display" name="riesgo16" id="riesgo16s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo16_display" name="riesgo16" id="riesgo16n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo16_display" name="riesgo16" id="riesgo16na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo16_display">
											<p>Comentario</p>
											<textarea name="riesgo16_comments" id="riesgo16_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo17_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 1.7 Eliminar o drenar las energía acumuladas de ser necesario </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo17_display" name="riesgo17" id="riesgo17s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo17_display" name="riesgo17" id="riesgo17n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo17_display" name="riesgo17" id="riesgo17na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo17_display">
											<p>Comentario</p>
											<textarea name="riesgo17_comments" id="riesgo17_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back1"> Atrás</button>
							<button id="button_next1"> Siguiente</button>
						</div>
					</div>
					<div id="container2">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p>2.- Trabajo en Espacios Confinados</p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
												<div id="riesgo21_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i>
												
												2.1 Identificar. Purgar, aislar y bloquear todas la fuentes de energía de ingreso y salida del espacio confinado. LOTO </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo21_display" name="riesgo21" id="riesgo21s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo21_display" name="riesgo21" id="riesgo21n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo21_display" name="riesgo21" id="riesgo21na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo21_display">
											<p>Comentario</p>
											<textarea name="riesgo21_comments" id="riesgo21_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo22_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 2.2 Demarcar el espacio confinado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo22_display" name="riesgo22" id="riesgo22s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo22_display" name="riesgo22" id="riesgo22n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo22_display" name="riesgo22" id="riesgo22na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo22_display">
											<p>Comentario</p>
											<textarea name="riesgo22_comments" id="riesgo22_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo23_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 2.3 Monitorear la atmosfera antes y durante la realización de la tarea, considerando las mediciones en diferentes niveles </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo23_display" name="riesgo23" id="riesgo23s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo23_display" name="riesgo23" id="riesgo23n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo23_display" name="riesgo23" id="riesgo23na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo23_display">
											<p>Comentario</p>
											<textarea name="riesgo23_comments" id="riesgo23_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo24_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 2.4 Asegurar comunicación entre el personal que se encuentra dentro del espacio confinado, supervisor, respuesta a emergencia y vigía. </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo24_display" name="riesgo24" id="riesgo24s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo24_display" name="riesgo24" id="riesgo24n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo24_display" name="riesgo24" id="riesgo24na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo24_display">
											<p>Comentario</p>
											<textarea name="riesgo24_comments" id="riesgo24_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo25_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 2.5 Personal acreditado y vigía calificado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo25_display" name="riesgo25" id="riesgo25s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo25_display" name="riesgo25" id="riesgo25n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo25_display" name="riesgo25" id="riesgo25na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo25_display">
											<p>Comentario</p>
											<textarea name="riesgo25_comments" id="riesgo25_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo26_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 2.6 Registro de control de ingreso y salida del espacio confinado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo26_display" name="riesgo26" id="riesgo26s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo26_display" name="riesgo26" id="riesgo26n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo26_display" name="riesgo26" id="riesgo26na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo26_display">
											<p>Comentario</p>
											<textarea name="riesgo26_comments" id="riesgo26_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo27_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 2.7 En las tuberías que ingresan a un espacio confinado que lleve gas, líquido u otros materiales deben ser cerradas, clausuradas o desconectadas, si la condición no lo permite se debe usar doble bloqueo y purgar</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo27_display" name="riesgo27" id="riesgo27s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo27_display" name="riesgo27" id="riesgo27n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo27_display" name="riesgo27" id="riesgo27na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo27_display">
											<p>Comentario</p>
											<textarea name="riesgo27_comments" id="riesgo27_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo28_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 2.8 Elaborar el permiso escrito para trabajos de alto riesgo (PETAR) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo28_display" name="riesgo28" id="riesgo28s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo28_display" name="riesgo28" id="riesgo28n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo28_display" name="riesgo28" id="riesgo28na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo28_display">
											<p>Comentario</p>
											<textarea name="riesgo28_comments" id="riesgo28_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back2"> Atrás</button>
							<button id="button_next2"> Siguiente</button>
						</div>
					</div>
					<div id="container3">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 3.- Trabajo con izaje o cargas suspendidas </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo31_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.1 Operador acreditado para el tipo de equipo a utilizar </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo31_display" name="riesgo31" id="riesgo31s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo31_display" name="riesgo31" id="riesgo31n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo31_display" name="riesgo31" id="riesgo31na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo31_display">
											<p>Comentario</p>
											<textarea name="riesgo31_comments" id="riesgo31_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo32_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.2 Personal alejado del área de influencia de la carga suspendida </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo32_display" name="riesgo32" id="riesgo32s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo32_display" name="riesgo32" id="riesgo32n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo32_display" name="riesgo32" id="riesgo32na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo32_display">
											<p>Comentario</p>
											<textarea name="riesgo32_comments" id="riesgo32_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo33_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.3 Maniobrista o rigger certificado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo33_display" name="riesgo33" id="riesgo33s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo33_display" name="riesgo33" id="riesgo33n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo33_display" name="riesgo33" id="riesgo33na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo33_display">
											<p>Comentario</p>
											<textarea name="riesgo33_comments" id="riesgo33_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo34_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.4 Inspección Pre-Uso del equipo, accesorios y elementos de izaje </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo34_display" name="riesgo34" id="riesgo34s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo34_display" name="riesgo34" id="riesgo34n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo34_display" name="riesgo34" id="riesgo34na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo34_display">
											<p>Comentario</p>
											<textarea name="riesgo34_comments" id="riesgo34_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo35_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.5 Inspección del área de trabajo </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo35_display" name="riesgo35" id="riesgo35s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo35_display" name="riesgo35" id="riesgo35n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo35_display" name="riesgo35" id="riesgo35na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo35_display">
											<p>Comentario</p>
											<textarea name="riesgo35_comments" id="riesgo35_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo36_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.6 Área de maniobra demarcada </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo36_display" name="riesgo36" id="riesgo36s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo36_display" name="riesgo36" id="riesgo36n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo36_display" name="riesgo36" id="riesgo36na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo36_display">
											<p>Comentario</p>
											<textarea name="riesgo36_comments" id="riesgo36_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo37_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.7 Verificar la tabla de carga del equipo de izaje </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo37_display" name="riesgo37" id="riesgo37s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo37_display" name="riesgo37" id="riesgo37n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo37_display" name="riesgo37" id="riesgo37na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo37_display">
											<p>Comentario</p>
											<textarea name="riesgo37_comments" id="riesgo37_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo38_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.8 Plan de izaje y/o Permiso de izaje crítico (cuando corresponda) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo38_display" name="riesgo38" id="riesgo38s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo38_display" name="riesgo38" id="riesgo38n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo38_display" name="riesgo38" id="riesgo38na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo38_display">
											<p>Comentario</p>
											<textarea name="riesgo38_comments" id="riesgo38_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo39_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.9 Comunicación efectiva entre operador y rigger </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo39_display" name="riesgo39" id="riesgo39s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo39_display" name="riesgo39" id="riesgo39n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo39_display" name="riesgo39" id="riesgo39na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo39_display">
											<p>Comentario</p>
											<textarea name="riesgo39_comments" id="riesgo39_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
																						<div id="riesgo310_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 3.10 Limites de seguridad de las grúas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo310_display" name="riesgo310" id="riesgo310s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo310_display" name="riesgo310" id="riesgo310n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo310_display" name="riesgo310" id="riesgo310na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo310_display">
											<p>Comentario</p>
											<textarea name="riesgo310_comments" id="riesgo310_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back3"> Atrás</button>
							<button id="button_next3"> Siguiente</button>
						</div>
					</div>
					<div id="container4">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 4.- Trabajo en Altura o desnivel o cargas suspendidas </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo41_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.1 Sistemas de protección certificado contra caídas, inspeccionadas y adecuadamente instaladas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo41_display" name="riesgo41" id="riesgo41s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo41_display" name="riesgo41" id="riesgo41n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo41_display" name="riesgo41" id="riesgo41na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo41_display">
											<p>Comentario</p>
											<textarea name="riesgo41_comments" id="riesgo41_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo42_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.2 Demarcación e inspección de niveles inferiores y superiores según aplique aplique </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo42_display" name="riesgo42" id="riesgo42s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo42_display" name="riesgo42" id="riesgo42n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo42_display" name="riesgo42" id="riesgo42na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo42_display">
											<p>Comentario</p>
											<textarea name="riesgo42_comments" id="riesgo42_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo43_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.3 Plataformas normadas y andamios normados e inspeccionados </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo43_display" name="riesgo43" id="riesgo43s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo43_display" name="riesgo43" id="riesgo43n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo43_display" name="riesgo43" id="riesgo43na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo43_display">
											<p>Comentario</p>
											<textarea name="riesgo43_comments" id="riesgo43_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo44_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.4 Escaleras portátiles con registro de inspección y mantenimiento adecuadamente aseguradas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo44_display" name="riesgo44" id="riesgo44s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo44_display" name="riesgo44" id="riesgo44n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo44_display" name="riesgo44" id="riesgo44na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo44_display">
											<p>Comentario</p>
											<textarea name="riesgo44_comments" id="riesgo44_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo45_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.5 Personal calificado y acreditado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo45_display" name="riesgo45" id="riesgo45s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo45_display" name="riesgo45" id="riesgo45n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo45_display" name="riesgo45" id="riesgo45na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo45_display">
											<p>Comentario</p>
											<textarea name="riesgo45_comments" id="riesgo45_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo46_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.6 Permiso Escrito de Trabajo de Alto Riesgo (PETAR) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo46_display" name="riesgo46" id="riesgo46s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo46_display" name="riesgo46" id="riesgo46n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo46_display" name="riesgo46" id="riesgo46na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo46_display">
											<p>Comentario</p>
											<textarea name="riesgo46_comments" id="riesgo46_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo47_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.7 Sistema de protección certificados contra caídas, inspeccionados y adecuadamente instalados. </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo47_display" name="riesgo47" id="riesgo47s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo47_display" name="riesgo47" id="riesgo47n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo47_display" name="riesgo47" id="riesgo47na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo47_display">
											<p>Comentario</p>
											<textarea name="riesgo47_comments" id="riesgo47_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo48_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.8 Barreras rígidas señalizadas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo48_display" name="riesgo48" id="riesgo48s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo48_display" name="riesgo48" id="riesgo48n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo48_display" name="riesgo48" id="riesgo48na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo48_display">
											<p>Comentario</p>
											<textarea name="riesgo48_comments" id="riesgo48_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo49_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.9 Plataformas y pisos de trabajo asegurados, barabdas removidas aseguradas. </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo49_display" name="riesgo49" id="riesgo49s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo49_display" name="riesgo49" id="riesgo49n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo49_display" name="riesgo49" id="riesgo49na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo49_display">
											<p>Comentario</p>
											<textarea name="riesgo49_comments" id="riesgo49_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo410_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.10 Vigía de "Open Hole" (permanente mientras se implementan barreras rigidas) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo410_display" name="riesgo410" id="riesgo410s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo410_display" name="riesgo410" id="riesgo410n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo410_display" name="riesgo410" id="riesgo410na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo410_display">
											<p>Comentario</p>
											<textarea name="riesgo410_comments" id="riesgo410_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo411_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.11 Establecer rutas de evacuación </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo411_display" name="riesgo411" id="riesgo411s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo411_display" name="riesgo411" id="riesgo411n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo411_display" name="riesgo411" id="riesgo411na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo411_display">
											<p>Comentario</p>
											<textarea name="riesgo411_comments" id="riesgo411_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class=" container-question tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo412_message" class="w60p item message" > 
												<i class="fas fa-exclamation-circle"></i>
												<i class="fas fa-check-circle"></i> 4.12 Personal calificado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo412_display" name="riesgo412" id="riesgo412s" value="1" checked  > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo412_display" name="riesgo412" id="riesgo412n" value="0"> No </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo412_display" name="riesgo412" id="riesgo412na" value="-1"> NA </div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo412_display">
											<p>Comentario</p>
											<textarea name="riesgo412_comments" id="riesgo412_comments"> </textarea> <small>Error message </span>
										</div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back4"> Atrás</button>
							<button id="button_next4"> Siguiente</button>
						</div>
					</div>
					<div id="container5">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 5.- Controles Covid19 (Nueva Normalidad) </p>
							</div>
						</div>
						<div class="box-checklist">

								<tr>
									<td class="w100p">
										<div class="container-question  tablaConBordes">
											<div class=" w100p container-content">

												<div id="riesgo51_message" class="w60p item message">
													<i class="fas fa-exclamation-circle"></i>
													<i class="fas fa-check-circle"></i> 5.1 Se utilizan barreras físicas para trabajos a menos de 1 m </div>
												<div class="w10p center item">
													<input type="radio" id_commentario="#riesgo51_display" name="riesgo51" id="riesgo51s" value="1" checked > Si </div>
												<div class="w10p center item">
													<input type="radio" id_commentario="#riesgo51_display" name="riesgo51" id="riesgo51n" value="0"> No</div>
												<div class="w10p center item">
													<input type="radio" id_commentario="#riesgo51_display" name="riesgo51" id="riesgo51na" value="-1"> NA</div>
											</div>
											<!--INSERT DATA -->
											<div class="container-comments form-control" id="riesgo51_display">
												<p>Comentario</p>
												<textarea name="riesgo51_comments" id="riesgo51_comments"> </textarea>
												<small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo52_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 5.2 Se mantiene distanciamiento 2m como mínimo. </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo52_display" name="riesgo52" id="riesgo52s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo52_display" name="riesgo52" id="riesgo52n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo52_display" name="riesgo52" id="riesgo52na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo52_display">
											<p>Comentario</p>
											<textarea name="riesgo52_comments" id="riesgo52_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo53_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 5.3 Se utiliza la protección respiratoria (mascarilla Kn95) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo53_display" name="riesgo53" id="riesgo53s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo53_display" name="riesgo53" id="riesgo53n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo53_display" name="riesgo53" id="riesgo53na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo53_display">
											<p>Comentario</p>
											<textarea name="riesgo53_comments" id="riesgo53_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo54_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 5.4 Se lavan/desinfectan las manos de manera frecuente </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo54_display" name="riesgo54" id="riesgo54s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo54_display" name="riesgo54" id="riesgo54n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo54_display" name="riesgo54" id="riesgo54na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo54_display">
											<p>Comentario</p>
											<textarea name="riesgo54_comments" id="riesgo54_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo55_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 5.5 Se limpia/desinfectan las herramientas y equipos </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo55_display" name="riesgo55" id="riesgo55s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo55_display" name="riesgo55" id="riesgo55n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo55_display" name="riesgo55" id="riesgo55na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo55_display">
											<p>Comentario</p>
											<textarea name="riesgo55_comments" id="riesgo55_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo56_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 5.6 Se limpió/desinfectó el vehículo </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo56_display" name="riesgo56" id="riesgo56s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo56_display" name="riesgo56" id="riesgo56n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo56_display" name="riesgo56" id="riesgo56na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo56_display">
											<p>Comentario</p>
											<textarea name="riesgo56_comments" id="riesgo56_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo57_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 5.7 Se respeta el aforo del vehículo </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo57_display" name="riesgo57" id="riesgo57s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo57_display" name="riesgo57" id="riesgo57n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo57_display" name="riesgo57" id="riesgo57na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo57_display">
											<p>Comentario</p>
											<textarea name="riesgo57_comments" id="riesgo57_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back5"> Atrás</button>
							<button id="button_next5"> Siguiente</button>
						</div>
					</div>
					<div id="container6">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 6.- Trabajo en excavaciones y zanjas </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo61_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.1 Líneas de servicio enterradas o empotradas identificadas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo61_display" name="riesgo61" id="riesgo61s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo61_display" name="riesgo61" id="riesgo61n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo61_display" name="riesgo61" id="riesgo61na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo61_display">
											<p>Comentario</p>
											<textarea name="riesgo61_comments" id="riesgo61_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo62_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.2 El diseño del sistema de contención de tierra, esta realizado por el ingeniero especilista (Geotecnía) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo62_display" name="riesgo62" id="riesgo62s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo62_display" name="riesgo62" id="riesgo62n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo62_display" name="riesgo62" id="riesgo62na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo62_display">
											<p>Comentario</p>
											<textarea name="riesgo62_comments" id="riesgo62_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo63_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.3 El Material producto de la excavación esta apilado a una distancia equivalga a la mitad de la profundidad de la excavación o mayor seun corresponda</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo63_display" name="riesgo63" id="riesgo63s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo63_display" name="riesgo63" id="riesgo63n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo63_display" name="riesgo63" id="riesgo63na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo63_display">
											<p>Comentario</p>
											<textarea name="riesgo63_comments" id="riesgo63_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo64_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.4 Para trabajos en taludes o cerca de excavaciones mayores o iguales a 1.2 m de profundidad se usa sistema de prevencion y detención de caídas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo64_display" name="riesgo64" id="riesgo64s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo64_display" name="riesgo64" id="riesgo64n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo64_display" name="riesgo64" id="riesgo64na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo64_display">
											<p>Comentario</p>
											<textarea name="riesgo64_comments" id="riesgo64_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo65_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.5 Todos los días y cada vez que las condiciones cambien, el Supervisor realiza una inpección documentada a todas las excavaciones </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo65_display" name="riesgo65" id="riesgo65s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo65_display" name="riesgo65" id="riesgo65n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo65_display" name="riesgo65" id="riesgo65na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo65_display">
											<p>Comentario</p>
											<textarea name="riesgo65_comments" id="riesgo65_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo66_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.6 Evaluar la cercanía a las instalaciones eléctricas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo66_display" name="riesgo66" id="riesgo66s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo66_display" name="riesgo66" id="riesgo66n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo66_display" name="riesgo66" id="riesgo66na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo66_display">
											<p>Comentario</p>
											<textarea name="riesgo66_comments" id="riesgo66_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo67_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.7 Durante las excavaciones eliminar los objetos que puedan caer </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo67_display" name="riesgo67" id="riesgo67s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo67_display" name="riesgo67" id="riesgo67n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo67_display" name="riesgo67" id="riesgo67na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo67_display">
											<p>Comentario</p>
											<textarea name="riesgo67_comments" id="riesgo67_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo68_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.8 Están las excavaciones y zanjas apropiadamente identificadas con señales, advertencias y barreras Están las barreras flexibles a 6 pies (1,8 m) de los bordes de las zanjas y excavaciones </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo68_display" name="riesgo68" id="riesgo68s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo68_display" name="riesgo68" id="riesgo68n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo68_display" name="riesgo68" id="riesgo68na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo68_display">
											<p>Comentario</p>
											<textarea name="riesgo68_comments" id="riesgo68_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo69_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.9 Se asegura el proyecto de que ningún empleado tenga permitido transitar bajo cargas que están siendo manejadas por equipos de izaje o excavación </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo69_display" name="riesgo69" id="riesgo69s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo69_display" name="riesgo69" id="riesgo69n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo69_display" name="riesgo69" id="riesgo69na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo69_display">
											<p>Comentario</p>
											<textarea name="riesgo69_comments" id="riesgo69_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo610_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.10 Durante las operaciones de limpieza y desbroce ¿Consideró el proyecto y se aseguró de cumplir con todos requisitos legales medioambientales tales como mallas para la retención de sedimentos, protección contra derrames o control del polvo? </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo610_display" name="riesgo610" id="riesgo610s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo610_display" name="riesgo610" id="riesgo610n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo610_display" name="riesgo610" id="riesgo610na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo610_display">
											<p>Comentario</p>
											<textarea name="riesgo610_comments" id="riesgo610_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo611_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.11 Antes de comenzar la excavación ¿Se aseguró el Supervisor Responsable y la Persona Competente de que se hayan tomado las medidas de seguridad requeridas? </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo611_display" name="riesgo611" id="riesgo611s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo611_display" name="riesgo611" id="riesgo611n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo611_display" name="riesgo611" id="riesgo611na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo611_display">
											<p>Comentario</p>
											<textarea name="riesgo611_comments" id="riesgo611_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo612_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 6.12 Si se produce un hallazgo arqueológico de interés inesperado ¿Asegura el procedimiento del proyecto la suspensión de los trabajos hasta que un individuo calificado pueda evaluar su importancia? </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo612_display" name="riesgo612" id="riesgo612s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo612_display" name="riesgo612" id="riesgo612n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo612_display" name="riesgo612" id="riesgo612na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo612_display">
											<p>Comentario</p>
											<textarea name="riesgo612_comments" id="riesgo612_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back6"> Atrás</button>
							<button id="button_next6"> Siguiente</button>
						</div>
					</div>
					<div id="container7">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 7.- Trabajos en caliente </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo71_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.1 Inspección previa del área de trabajo y lugares adyacentes </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo71_display" name="riesgo71" id="riesgo71s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo71_display" name="riesgo71" id="riesgo71n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo71_display" name="riesgo71" id="riesgo71na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo71_display">
											<p>Comentario</p>
											<textarea name="riesgo71_comments" id="riesgo71_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo72_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.2 Personal calificado y acreditado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo72_display" name="riesgo72" id="riesgo72s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo72_display" name="riesgo72" id="riesgo72n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo72_display" name="riesgo72" id="riesgo72na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo72_display">
											<p>Comentario</p>
											<textarea name="riesgo72_comments" id="riesgo72_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo73_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.3 Permiso Escrito de Trabajo de Alto Riesgo (PETAR) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo73_display" name="riesgo73" id="riesgo73s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo73_display" name="riesgo73" id="riesgo73n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo73_display" name="riesgo73" id="riesgo73na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo73_display">
											<p>Comentario</p>
											<textarea name="riesgo73_comments" id="riesgo73_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo74_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.4 Inspeccionar los equipos de soldadura y oxicorte </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo74_display" name="riesgo74" id="riesgo74s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo74_display" name="riesgo74" id="riesgo74n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo74_display" name="riesgo74" id="riesgo74na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo74_display">
											<p>Comentario</p>
											<textarea name="riesgo74_comments" id="riesgo74_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo75_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.5 Demarcar el área de trabajo y según sea necesario arriba y abajo </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo75_display" name="riesgo75" id="riesgo75s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo75_display" name="riesgo75" id="riesgo75n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo75_display" name="riesgo75" id="riesgo75na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo75_display">
											<p>Comentario</p>
											<textarea name="riesgo75_comments" id="riesgo75_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo76_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.6 Monitoreo de atmosfera en tanques, estanques, recipientes o Sistemas de tuberías que contengan o hayancontenido líquidos o gases inflamables </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo76_display" name="riesgo76" id="riesgo76s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo76_display" name="riesgo76" id="riesgo76n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo76_display" name="riesgo76" id="riesgo76na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo76_display">
											<p>Comentario</p>
											<textarea name="riesgo76_comments" id="riesgo76_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo77_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.7 Equipos aterrados </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo77_display" name="riesgo77" id="riesgo77s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo77_display" name="riesgo77" id="riesgo77n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo77_display" name="riesgo77" id="riesgo77na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo77_display">
											<p>Comentario</p>
											<textarea name="riesgo77_comments" id="riesgo77_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo78_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.8 Cables de puesta a tierra (masa) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo78_display" name="riesgo78" id="riesgo78s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo78_display" name="riesgo78" id="riesgo78n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo78_display" name="riesgo78" id="riesgo78na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo78_display">
											<p>Comentario</p>
											<textarea name="riesgo78_comments" id="riesgo78_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo79_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.9 EPP especifico para trabajos en caliente </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo79_display" name="riesgo79" id="riesgo79s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo79_display" name="riesgo79" id="riesgo79n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo79_display" name="riesgo79" id="riesgo79na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo79_display">
											<p>Comentario</p>
											<textarea name="riesgo79_comments" id="riesgo79_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo710_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.10 Extintores mínimo de 9 Kg polivalente según el tipo de material combustible </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo710_display" name="riesgo710" id="riesgo710s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo710_display" name="riesgo710" id="riesgo710n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo710_display" name="riesgo710" id="riesgo710na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo710_display">
											<p>Comentario</p>
											<textarea name="riesgo710_comments" id="riesgo710_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo711_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 7.11 Vigía para trabajos en caliente y permanecer en el área 30 min despues de haber concluido el trabajo </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo711_display" name="riesgo711" id="riesgo711s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo711_display" name="riesgo711" id="riesgo711n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo711_display" name="riesgo711" id="riesgo711na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo711_display">
											<p>Comentario</p>
											<textarea name="riesgo711_comments" id="riesgo711_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back7"> Atrás</button>
							<button id="button_next7"> Siguiente</button>
						</div>
					</div>
					<div id="container8">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 8.- Herramientas manuales, eléctricas y Equipos Estacionarios </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo81_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.1 Están implementados los seguros del fabricante en las herramientas eléctricas manuales (pulidoras, sierras, etc.) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo81_display" name="riesgo81" id="riesgo81s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo81_display" name="riesgo81" id="riesgo81n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo81_display" name="riesgo81" id="riesgo81na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo81_display">
											<p>Comentario</p>
											<textarea name="riesgo81_comments" id="riesgo81_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo82_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.2 Están implementados los seguros del fabricante en las herramientas eléctricas estacionarias (esmeriladora de banco, sierras de mesa) </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo82_display" name="riesgo82" id="riesgo82s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo82_display" name="riesgo82" id="riesgo82n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo82_display" name="riesgo82" id="riesgo82na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo82_display">
											<p>Comentario</p>
											<textarea name="riesgo82_comments" id="riesgo82_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo83_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.3. Están las manillas en su lugar en las herramientas manuales </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo83_display" name="riesgo83" id="riesgo83s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo83_display" name="riesgo83" id="riesgo83n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo83_display" name="riesgo83" id="riesgo83na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo83_display">
											<p>Comentario</p>
											<textarea name="riesgo83_comments" id="riesgo83_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo84_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.4. Funcionan adecuadamente los interruptores de presión on/off Seguro Hombre Muerto </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo84_display" name="riesgo84" id="riesgo84s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo84_display" name="riesgo84" id="riesgo84n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo84_display" name="riesgo84" id="riesgo84na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo84_display">
											<p>Comentario</p>
											<textarea name="riesgo84_comments" id="riesgo84_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo85_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.5. Funciona adecuadamente el dispositivo GFCI </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo85_display" name="riesgo85" id="riesgo85s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo85_display" name="riesgo85" id="riesgo85n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo85_display" name="riesgo85" id="riesgo85na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo85_display">
											<p>Comentario</p>
											<textarea name="riesgo85_comments" id="riesgo85_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo86_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.6. Están implementados los seguros del fabricante para proteger a los empleados de las partes rotatorias de los equipos estacionarios </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo86_display" name="riesgo86" id="riesgo86s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo86_display" name="riesgo86" id="riesgo86n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo86_display" name="riesgo86" id="riesgo86na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo86_display">
											<p>Comentario</p>
											<textarea name="riesgo86_comments" id="riesgo86_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo87_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.7. Vuelven a su posición segura las herramientas eléctricas estacionarias con hojas o brocas operadas manualmente si se sueltan accidentalmente? </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo87_display" name="riesgo87" id="riesgo87s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo87_display" name="riesgo87" id="riesgo87n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo87_display" name="riesgo87" id="riesgo87na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo87_display">
											<p>Comentario</p>
											<textarea name="riesgo87_comments" id="riesgo87_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo88_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.8. ¿Se mantienen en buena condición los generadores y transformadores para soldadura </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo88_display" name="riesgo88" id="riesgo88s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo88_display" name="riesgo88" id="riesgo88n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo88_display" name="riesgo88" id="riesgo88na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo88_display">
											<p>Comentario</p>
											<textarea name="riesgo88_comments" id="riesgo88_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo89_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.9. Se protegen todos los componentes rotatorios </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo89_display" name="riesgo89" id="riesgo89s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo89_display" name="riesgo89" id="riesgo89n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo89_display" name="riesgo89" id="riesgo89na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo89_display">
											<p>Comentario</p>
											<textarea name="riesgo89_comments" id="riesgo89_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo810_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 8.10. Prohíbe el proyecto el empalme de cables (es decir, se extenderán o repararán los cables usando los accesorios correctos)? </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo810_display" name="riesgo810" id="riesgo810s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo810_display" name="riesgo810" id="riesgo810n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo810_display" name="riesgo810" id="riesgo810na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo810_display">
											<p>Comentario</p>
											<textarea name="riesgo810_comments" id="riesgo810_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back8"> Atrás</button>
							<button id="button_next8"> Siguiente</button>
						</div>
					</div>
					<div id="container9">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 9.- Operación con Equipo pesado, liviano móvil </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo91_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.1 Personal acreditado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo91_display" name="riesgo91" id="riesgo91s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo91_display" name="riesgo91" id="riesgo91n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo91_display" name="riesgo91" id="riesgo91na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo91_display">
											<p>Comentario</p>
											<textarea name="riesgo91_comments" id="riesgo91_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo92_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.2 Verificación pre operacional de operadores/ vehículos y equipos moviles </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo92_display" name="riesgo92" id="riesgo92s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo92_display" name="riesgo92" id="riesgo92n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo92_display" name="riesgo92" id="riesgo92na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo92_display">
											<p>Comentario</p>
											<textarea name="riesgo92_comments" id="riesgo92_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo93_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.3 Uso de cinturón de seguridad de todos los ocupantes </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo93_display" name="riesgo93" id="riesgo93s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo93_display" name="riesgo93" id="riesgo93n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo93_display" name="riesgo93" id="riesgo93na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo93_display">
											<p>Comentario</p>
											<textarea name="riesgo93_comments" id="riesgo93_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo94_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.4 El conductor/ operador debe estar en condiciones apropiadas para operar el equipo y cumplir con la politica de manejo de fatiga </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo94_display" name="riesgo94" id="riesgo94s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo94_display" name="riesgo94" id="riesgo94n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo94_display" name="riesgo94" id="riesgo94na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo94_display">
											<p>Comentario</p>
											<textarea name="riesgo94_comments" id="riesgo94_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo95_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.5 Sistema de comunicación y/o autorización con el operador de equipo/ personal de la zona cercana </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo95_display" name="riesgo95" id="riesgo95s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo95_display" name="riesgo95" id="riesgo95n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo95_display" name="riesgo95" id="riesgo95na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo95_display">
											<p>Comentario</p>
											<textarea name="riesgo95_comments" id="riesgo95_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo96_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.6 Control de acceso al área de trabajo </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo96_display" name="riesgo96" id="riesgo96s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo96_display" name="riesgo96" id="riesgo96n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo96_display" name="riesgo96" id="riesgo96na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo96_display">
											<p>Comentario</p>
											<textarea name="riesgo96_comments" id="riesgo96_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo97_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.7 Realizar LOTO en los equipo cuando están en labores de mantenimiento. Aplicación de cierre perimetral al equipo. </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo97_display" name="riesgo97" id="riesgo97s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo97_display" name="riesgo97" id="riesgo97n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo97_display" name="riesgo97" id="riesgo97na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo97_display">
											<p>Comentario</p>
											<textarea name="riesgo97_comments" id="riesgo97_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo98_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.8 Al parquearse el vehículo o equipo aplicar sistema de freno parqueo/ cuñas (tacos) cuando se requiera. </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo98_display" name="riesgo98" id="riesgo98s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo98_display" name="riesgo98" id="riesgo98n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo98_display" name="riesgo98" id="riesgo98na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo98_display">
											<p>Comentario</p>
											<textarea name="riesgo98_comments" id="riesgo98_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo99_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 9.9 Las vías son mantenidas y la altura del muro de seguridad no deberá ser menor a 3/4 partes del diámetro del neumático del vehículo más grande que circule por la vía </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo99_display" name="riesgo99" id="riesgo99s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo99_display" name="riesgo99" id="riesgo99n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo99_display" name="riesgo99" id="riesgo99na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo99_display">
											<p>Comentario</p>
											<textarea name="riesgo99_comments" id="riesgo99_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back9"> Atrás</button>
							<button id="button_next9"> Siguiente</button>
						</div>
					</div>
					<div id="container10">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 10. Trabajo con/cerca de energía y partes móviles </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo101_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 10.1 Identificar puntos de atrapamiento, corte, abrasión o proyección </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo101_display" name="riesgo101" id="riesgo101s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo101_display" name="riesgo101" id="riesgo101n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo101_display" name="riesgo101" id="riesgo101na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo101_display">
											<p>Comentario</p>
											<textarea name="riesgo101_comments" id="riesgo101_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo102_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 10.2 Identificar todas las potenciales fuentes de energía </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo102_display" name="riesgo102" id="riesgo102s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo102_display" name="riesgo102" id="riesgo102n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo102_display" name="riesgo102" id="riesgo102na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo102_display">
											<p>Comentario</p>
											<textarea name="riesgo102_comments" id="riesgo102_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo103_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 10.3 Guardas de protección implementadas y en buen estados alrededor de las piezas móviles y fuentes de energía potencialmente peligrosas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo103_display" name="riesgo103" id="riesgo103s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo103_display" name="riesgo103" id="riesgo103n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo103_display" name="riesgo103" id="riesgo103na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo103_display">
											<p>Comentario</p>
											<textarea name="riesgo103_comments" id="riesgo103_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo104_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 10.4 Señalizar para identificar las fuentes de energía </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo104_display" name="riesgo104" id="riesgo104s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo104_display" name="riesgo104" id="riesgo104n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo104_display" name="riesgo104" id="riesgo104na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo104_display">
											<p>Comentario</p>
											<textarea name="riesgo104_comments" id="riesgo104_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo105_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 10.5 Dispositivos de enclavamiento o paradas de emergencia </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo105_display" name="riesgo105" id="riesgo105s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo105_display" name="riesgo105" id="riesgo105n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo105_display" name="riesgo105" id="riesgo105na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo105_display">
											<p>Comentario</p>
											<textarea name="riesgo105_comments" id="riesgo105_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back10"> Atrás</button>
							<button id="button_next10"> Siguiente</button>
						</div>
					</div>
					<div id="container11">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 11. Trabajo con Tuberías de HDPE </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo111_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 11.1 Los equipos, elementos, herramientas y/o accesorios aprobados para el traslado / manipulación </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo111_display" name="riesgo111" id="riesgo111s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo111_display" name="riesgo111" id="riesgo111n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo111_display" name="riesgo111" id="riesgo111na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo111_display">
											<p>Comentario</p>
											<textarea name="riesgo111_comments" id="riesgo111_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo112_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 11.2 Personal calificado y acreditado </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo112_display" name="riesgo112" id="riesgo112s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo112_display" name="riesgo112" id="riesgo112n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo112_display" name="riesgo112" id="riesgo112na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo112_display">
											<p>Comentario</p>
											<textarea name="riesgo112_comments" id="riesgo112_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo113_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 11.3 Permiso Escrito de Trabajo de alto Riesgo (PETAR) y formatos del estándar según apliquen </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo113_display" name="riesgo113" id="riesgo113s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo113_display" name="riesgo113" id="riesgo113n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo113_display" name="riesgo113" id="riesgo113na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo113_display">
											<p>Comentario</p>
											<textarea name="riesgo113_comments" id="riesgo113_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo114_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 11.4 Demarcar y colocar barreras a las zonas de "línea de fuego" </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo114_display" name="riesgo114" id="riesgo114s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo114_display" name="riesgo114" id="riesgo114n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo114_display" name="riesgo114" id="riesgo114na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo114_display">
											<p>Comentario</p>
											<textarea name="riesgo114_comments" id="riesgo114_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo115_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 11.5 Vigía de seguridad permanente y función especifica </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo115_display" name="riesgo115" id="riesgo115s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo115_display" name="riesgo115" id="riesgo115n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo115_display" name="riesgo115" id="riesgo115na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo115_display">
											<p>Comentario</p>
											<textarea name="riesgo115_comments" id="riesgo115_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo116_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 11.6 Altura máxima de apilamiento de tuberías de HDPE </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo116_display" name="riesgo116" id="riesgo116s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo116_display" name="riesgo116" id="riesgo116n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo116_display" name="riesgo116" id="riesgo116na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo116_display">
											<p>Comentario</p>
											<textarea name="riesgo116_comments" id="riesgo116_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo117_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 11.7 Establecer zonas de seguridad para la descarga y manipulación de tuberias </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo117_display" name="riesgo117" id="riesgo117s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo117_display" name="riesgo117" id="riesgo117n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo117_display" name="riesgo117" id="riesgo117na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo117_display">
											<p>Comentario</p>
											<textarea name="riesgo117_comments" id="riesgo117_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo118_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 11.8 Asegurar comunicación </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo118_display" name="riesgo118" id="riesgo118s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo118_display" name="riesgo118" id="riesgo118n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo118_display" name="riesgo118" id="riesgo118na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo118_display">
											<p>Comentario</p>
											<textarea name="riesgo118_comments" id="riesgo118_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back11"> Atrás</button>
							<button id="button_next11"> Siguiente</button>
						</div>
					</div>
					<div id="container12">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 12. Trabajos en circuitos energizados </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo121_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 12.1 Personal electricista calificado y con acreditación vigente. </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo121_display" name="riesgo121" id="riesgo121s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo121_display" name="riesgo121" id="riesgo121n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo121_display" name="riesgo121" id="riesgo121na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo121_display">
											<p>Comentario</p>
											<textarea name="riesgo121_comments" id="riesgo121_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo122_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 12.2 EPP en buen estado de acuerdo a nivel de tensión y categoría indicado en los estudios de arco eléctrico. </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo122_display" name="riesgo122" id="riesgo122s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo122_display" name="riesgo122" id="riesgo122n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo122_display" name="riesgo122" id="riesgo122na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo122_display">
											<p>Comentario</p>
											<textarea name="riesgo122_comments" id="riesgo122_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo123_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 12.3 Asistencia de 2 personas para todo trabajo de diagnostico a mas de 250V hasta 600V </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo123_display" name="riesgo123" id="riesgo123s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo123_display" name="riesgo123" id="riesgo123n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo123_display" name="riesgo123" id="riesgo123na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo123_display">
											<p>Comentario</p>
											<textarea name="riesgo123_comments" id="riesgo123_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo124_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 12.4 Uso de herramientas aisladas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo124_display" name="riesgo124" id="riesgo124s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo124_display" name="riesgo124" id="riesgo124n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo124_display" name="riesgo124" id="riesgo124na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo124_display">
											<p>Comentario</p>
											<textarea name="riesgo124_comments" id="riesgo124_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo125_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 12.5 Completar toda la documentación </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo125_display" name="riesgo125" id="riesgo125s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo125_display" name="riesgo125" id="riesgo125n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo125_display" name="riesgo125" id="riesgo125na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo125_display">
											<p>Comentario</p>
											<textarea name="riesgo125_comments" id="riesgo125_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back12"> Atrás</button>
							<button id="button_next12"> Siguiente</button>
						</div>
					</div>
					<div id="container13">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 13. Trabajos con cerca con sustancias Químicas </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo131_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 13.1 Ficha de datos de Seguridad (FDS) aprobada por HBP </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo131_display" name="riesgo131" id="riesgo131s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo131_display" name="riesgo131" id="riesgo131n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo131_display" name="riesgo131" id="riesgo131na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo131_display">
											<p>Comentario</p>
											<textarea name="riesgo131_comments" id="riesgo131_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo132_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 13.2 Etiquetado y rotulado del producto </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo132_display" name="riesgo132" id="riesgo132s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo132_display" name="riesgo132" id="riesgo132n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo132_display" name="riesgo132" id="riesgo132na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo132_display">
											<p>Comentario</p>
											<textarea name="riesgo132_comments" id="riesgo132_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo133_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 13.3 Manipulación, transporte de acuerdo a la FDS </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo133_display" name="riesgo133" id="riesgo133s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo133_display" name="riesgo133" id="riesgo133n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo133_display" name="riesgo133" id="riesgo133na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo133_display">
											<p>Comentario</p>
											<textarea name="riesgo133_comments" id="riesgo133_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo134_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 13.4 Uso de EPP de acuerdo a la FDS </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo134_display" name="riesgo134" id="riesgo134s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo134_display" name="riesgo134" id="riesgo134n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo134_display" name="riesgo134" id="riesgo134na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo134_display">
											<p>Comentario</p>
											<textarea name="riesgo134_comments" id="riesgo134_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo135_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 13.5 Consideraciones de compatibilidad para el almacenamiento </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo135_display" name="riesgo135" id="riesgo135s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo135_display" name="riesgo135" id="riesgo135n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo135_display" name="riesgo135" id="riesgo135na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo135_display">
											<p>Comentario</p>
											<textarea name="riesgo135_comments" id="riesgo135_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo136_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 13.6 Asegurar la implementación de sensores de gases fijos y/o detectores portátiles </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo136_display" name="riesgo136" id="riesgo136s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo136_display" name="riesgo136" id="riesgo136n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo136_display" name="riesgo136" id="riesgo136na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo136_display">
											<p>Comentario</p>
											<textarea name="riesgo136_comments" id="riesgo136_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo137_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 13.7 Conocimiento del personal para la manipulación y transporte de la sustancia química </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo137_display" name="riesgo137" id="riesgo137s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo137_display" name="riesgo137" id="riesgo137n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo137_display" name="riesgo137" id="riesgo137na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo137_display">
											<p>Comentario</p>
											<textarea name="riesgo137_comments" id="riesgo137_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo138_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 13.8 Respuesta a Emergencias de acuerdo a la FDS </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo138_display" name="riesgo138" id="riesgo138s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo138_display" name="riesgo138" id="riesgo138n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo138_display" name="riesgo138" id="riesgo138na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo138_display">
											<p>Comentario</p>
											<textarea name="riesgo138_comments" id="riesgo138_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back13"> Atrás</button>
							<button id="button_next13"> Siguiente</button>
						</div>
					</div>
					<div id="container14">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 2 Identificación y Controles Críticos</p>
							</div>
							<div class="secction center">
								<p> 14. Ingreso a áreas restringidas sin Autorización </p>
							</div>
						</div>
						<div class="box-checklist">
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo141_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 14.1 Evaluar el área a demarcar: condiciones generadas por el trabajo, áreas afectadas, etc </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo141_display" name="riesgo141" id="riesgo141s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo141_display" name="riesgo141" id="riesgo141n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo141_display" name="riesgo141" id="riesgo141na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo141_display">
											<p>Comentario</p>
											<textarea name="riesgo141_comments" id="riesgo141_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo142_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 14.2 Visibilidad de la demarcación </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo142_display" name="riesgo142" id="riesgo142s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo142_display" name="riesgo142" id="riesgo142n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo142_display" name="riesgo142" id="riesgo142na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo142_display">
											<p>Comentario</p>
											<textarea name="riesgo142_comments" id="riesgo142_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo143_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 14.3 Autorización de ingreso a áreas demarcadas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo143_display" name="riesgo143" id="riesgo143s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo143_display" name="riesgo143" id="riesgo143n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo143_display" name="riesgo143" id="riesgo143na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo143_display">
											<p>Comentario</p>
											<textarea name="riesgo143_comments" id="riesgo143_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo144_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 14.4 Control de ingreso y salida de área restringidas demarcadas y señalizadas </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo144_display" name="riesgo144" id="riesgo144s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo144_display" name="riesgo144" id="riesgo144n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo144_display" name="riesgo144" id="riesgo144na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo144_display">
											<p>Comentario</p>
											<textarea name="riesgo144_comments" id="riesgo144_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo145_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 14.5 Inspección regular del área demarcada y señalizada </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo145_display" name="riesgo145" id="riesgo145s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo145_display" name="riesgo145" id="riesgo145n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo145_display" name="riesgo145" id="riesgo145na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo145_display">
											<p>Comentario</p>
											<textarea name="riesgo145_comments" id="riesgo145_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo146_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 14.6 Retiro de demarcación al final del trabajo </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo146_display" name="riesgo146" id="riesgo146s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo146_display" name="riesgo146" id="riesgo146n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo146_display" name="riesgo146" id="riesgo146na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo146_display">
											<p>Comentario</p>
											<textarea name="riesgo146_comments" id="riesgo146_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
							<tr>
								<td class="w100p">
									<div class="container-question  tablaConBordes">
										<div class=" w100p container-content">
											<div id="riesgo147_message" class="w60p item message"> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-check-circle"></i> 14.7 Dentro de las área restringidas temporales se prohíbe el uso de celular </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo147_display" name="riesgo147" id="riesgo147s" value="1" checked > Si </div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo147_display" name="riesgo147" id="riesgo147n" value="0"> No</div>
											<div class="w10p center item">
												<input type="radio" id_commentario="#riesgo147_display" name="riesgo147" id="riesgo147na" value="-1"> NA</div>
										</div>
										<!--INSERT DATA -->
										<div class="container-comments form-control" id="riesgo147_display">
											<p>Comentario</p>
											<textarea name="riesgo147_comments" id="riesgo147_comments"> </textarea> <small>Error message </small> </div>
										<!-- INSERT DATA 2 -->
									</div>
								</td>
							</tr>
						</div>
						<div class="buttonsPage">
							<button id="button_back14"> Atrás</button>
							<button id="button_next14">Siguiente </button>
						</div>
					</div>
					<div id="container15">
						<div class="cabecera-container">
							<div class="secction center">
								<p>Sección 3 Evaluación de Riesgos y Controles Críticos</p>
							</div>
							<div>
								<p> Descripción de los Hallazgos (asociado a la tarea observada) </p>
							</div>
						</div>
						<div>
							<div class="manyInput">
								<div class="inputentry mb15px">
									<label for="fortalezas_acciones" class="obligatorio">FORTALEZAS / ACCIONES A TOMAR </label>
									<input type="text" name="fortalezas_acciones" id="fortalezas_acciones" class="w70p"> </div>
							</div>
							<div class="manyInput">
								<div class="flex1">
									<label for="fecha_cumplimiento">FECHA DE CUMPLIMIENTO </label>
									<input type="date" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo date("Y-m-d");?>" class="w30p"> </div>
							</div>
							<div class="manyInput">
								<div class="inputentry mb15px">
									<label for="responsable" class="obligatorio">RESPONSABLE </label>
									<input type="text" name="responsable" id="responsable" class="w70p"> </div>
							</div>
							<div class="manyInput">
								<div id="contenidoJefe"></div>
							</div>

						</div>
						<div class="buttonsPage">
							<button id="button_back15"> Atrás</button>
							<button id="button_next15"> Enviar Formulario </button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="floatingActionButton"> <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a> </div>
		<div class="mensaje msj_info"> <span>Datos ingresados correctamente</span> </div>
		<script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
		<script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
		<script src="<?php echo constant('URL');?>public/js/riesgos.js?v1.0.10"></script>
		<script src="<?php echo constant('URL');?>public/js/data2.js"></script>
</body>

</html>