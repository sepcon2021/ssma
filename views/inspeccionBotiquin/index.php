<div class="wrap_document scroll1">

	<div class="wrap_document_detail">
		<div class="item_format">
			<h3>Documentos</h3>
		</div>
		<div class="item_format">
			<a class="home_document" href="#">Inicio</a> <a href="#">/ Inspección de botiquines</a>
		</div>
	</div>

	<div class="wrap_document_format">
		<div class="wrap_document_format_head">

			<div class="wrap_document_format_head_icon">
				<img class="enterprise_logo" src="public/img/logo.png" alt="">
			</div>

			<div class="wrap_document_format_head_title">
				<p>Inspección de botiquines</p>
			</div>

			<div class="wrap_document_format_head_code">
				<p>PSPC-110-X-PR-001-FR-012</p>
				<p>Revisión: 0</p>
				<p>Emisión: 17/05/2019</p>
				<p>Página: 1 de 1</p>
			</div>

		</div>
		<div class="wrap_document_format_body">
			<form class="general_form" action="" id="formDigital">

				<input type="hidden" id="nombres" name="nombres">
				<input type="hidden" id="internal" name="internal">

				<div class="box_format">
					<div class="item_format">
						<label for="sede">Tipo de Inspección: </label>
					</div>
				</div>

				<div class="box_format">
					<div class="item_format">
						<select class="item_format_select" name="tipo_inspeccion" id="tipo_inspeccion">
							<option value="-1">Elegir</option>
							<option value="1">Informal</option>
							<option value="2">Planeada</option>
						</select>
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

				<div class="box_format">
					<!--TITLE ELEMENT-->
					<div class="item_format">
						<label for="">Area</label>
					</div>
					<!--CONTENT ELEMENT-->
					<div class="item_format">
						<select class="item_format_select" name="area" id="area">
						</select>
					</div>

					<!-- ERRROR ELEMENT -->
					<div class="item_format">
						<p class="error_message" id="area_error"></p>
					</div>
				</div>

				<div class="box_format">

					<!--TITLE ELEMENT-->

					<div class="item_format">
						<label for="">Lugar inspección</label>
					</div>

					<!--CONTENT ELEMENT-->

					<div class="item_format">
						<input class="item_format_input" type="text" name="lugar_inspeccion" id="lugar_inspeccion">
					</div>

					<!-- ERRROR ELEMENT -->
					<div class="item_format">
						<p class="error_message" id="lugar_inspeccion_error"></p>
					</div>

				</div>

				<div class="box_format">
					<!--TITLE ELEMENT-->

					<div class="item_format">
						<label for="">Fecha</label>
					</div>

					<!--CONTENT ELEMENT-->
					<div class="item_format">
						<input class="item_format_input" type="date" name="fecha_registro" id="fecha_registro">
					</div>

					<!-- ERRROR ELEMENT -->
					<div class="item_format">
						<p class="error_message" id="fecha_registro_error"></p>
					</div>
				</div>

				<div class="box_format">

					<!--TITLE ELEMENT-->

					<div class="item_format">
						<label for="">Resonsable área</label>
					</div>

					<!--CONTENT ELEMENT-->

					<div class="item_format">
						<input class="item_format_input" type="text" name="responsable_area" id="responsable_area">
					</div>

					<!-- ERRROR ELEMENT -->
					<div class="item_format">
						<p class="error_message" id="responsable_area_error"></p>
					</div>

				</div>


				<div class="box_format">
					<div class="item_format">
						<div class="w100p">
							<table class="tablaConBordes w100p">
								<tbody>
									<tr>
										<td class="w50p center">
											<p>BOTIQUIN FIJO</p>
										</td>
										<td class="w50p center">
											<p>BOTIQUIN MOVIL - VEHICULAR</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>



				<div class="box_format">
					<div class="item_format">
						<div id="contenidoCabecera" class="w100p">
							<table class="tablaConBordes w100p">
								<tbody>
									<tr>
										<td class="w25p">
											<p class="item_format">(1) 05 Parche Ocular</p>
										</td>
										<td class="w25p">
											<p class="item_format">(11) 02 Guantes de Examen 7 1/2</p>
										</td>
										<td class="w25p">
										<p class="item_format">(1) 01 Alcohol de 70% de 120 ml</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>

									<tr>
										<td class="w25p">
										<p class="item_format">(2) 01 Cabestrillo talla M</p>
										</td>
										<td class="w25p">
										<p class="item_format">(12) 04 Guantes de Nitrilo</p>
										</td>
										<td class="w25p">
										<p class="item_format">(2) 01 Jabon desinfectante LIQUIDO</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>

									<tr>
										<td class="w25p">
										<p class="item_format">(3) 01 Alcohol 70° x 120 ml</p>
										</td>
										<td class="w25p">
										<p class="item_format">(13) 01 Tijera de trauma punta roma de 3 pulgadas</p>
										</td>
										<td class="w25p">
										<p class="item_format">(3) 01 Algodón por 25 gr.</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>

									<tr>
										<td class="w25p">
										<p class="item_format">(4) 01 Algodón x 50 gr.</p>
										</td>
										<td class="w25p">
										<p class="item_format">(14) 02 Vendas elastica o de Gasa 4"</p>
										</td>
										<td class="w25p">
										<p class="item_format">(4) 03 Gasas esteriles 10 x 10 (paquete)</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>

									<tr>
										<td class="w25p">
										<p class="item_format">(5) 05 Apositos esteriles de Gasa 20 x 10</p>
										</td>
										<td class="w25p">
										<p class="item_format">(15) 10 Paletas Bajalenguas</p>
										</td>
										<td class="w25p">
										<p class="item_format">(5) 10 Bandas adhesivas o curitas</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>

									<tr>
										<td class="w25p">
										<p class="item_format">(6) 10 Venditas (curitas)</p>
										</td>
										<td class="w25p">
										<p class="item_format">(16) 01 Tijera Punta Roma 3"</p>
										</td>
										<td class="w25p">
										<p class="item_format">(6) 01 Esparadrapo de 2.5 x 5 mts</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>
									<tr>
										<td class="w25p">
										<p class="item_format">(7) 02 Esparadrapo 5 x 5 mts.</p>
										</td>
										<td class="w25p">
										<p class="item_format">(17) 01 Cloruro de sodio 1 Lt o agua esteril</p>
										</td>
										<td class="w25p">
										<p class="item_format">(7) 02 Apositos de Gasa esteril</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>

									<tr>
										<td class="w25p">
										<p class="item_format">(8) 10 gasas esteriles fraccionadas 10 x 10 </p>
										</td>
										<td class="w25p">
										<p class="item_format">(18) 05 Bolsas Ziplock 10" y 15"</p>
										</td>
										<td class="w25p">
										<p class="item_format"> (8) 02 Pares de guantes quirurgicos 7 1/2</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>


									<tr>
										<td class="w25p">
										<p class="item_format">(9) Alcohol en gel 120ml</p>
										</td>
										<td class="w25p">
										<p class="item_format">(19) 02 Venda ekastica o de gasa 6"</p>
										</td>
										<td class="w25p">
										<p class="item_format">(9) 02 Venda Elástica 4 x 5 yardas</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>

									<tr>
										<td class="w25p">
										<p class="item_format">(10) 1 mascarilla de RCP - FACE SHIELD</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
										<td class="w25p">
										<p class="item_format">(10) 01 Tijera punta roma (para cortar prendas)</p>
										</td>
										<td class="w25p">
										<p class="item_format"></p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

					</div>
				</div>

				<div class="box_format">
					<div class="item_format">

						<div class="w100p">
							<table class="tablaConBordes w100p">
								<tbody>
									<tr>
										<td class="w50p center">
											<p>CONDICIÓN : BUENO = √ MALO = PONER EL NÚMERO DEL CÓDIGO DE FALLA</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>


				<div class="box_format">

					<table class="table_oficial">
						<thead>
							<tr>
								<th class="secction   w20p center">
									<p>Ubicación</p>
								</th>

								<th class="secction   w20p center">
									<p>Condición</p>
								</th>

								<th class="secction w6p center">
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
						<tbody id="tbody-data">

						</tbody>
					</table>
					<div>
						<button class="popup_send_form" id="addRowObs">Agregar Observación </button>
					</div>

				</div>





				<div class="box_format item_format_rigth">
					<button type="submit" id="button_send_form">Enviar</button>
				</div>



			</form>
		</div>
	</div>



	<!-- ESTE ES EL POPUP  -->
	<div class="popup" id="popup-1">
		<div class="overlay"></div>
		<div class="content scroll1">

			<div class="popup_content">

				<div class="contenidoRepuesta item_format_rigth">
					<img class="clickPopup-close" src="public/img/cancel.png">
				</div>

				<div>
					<h3>Observación</h3>
				</div>

				<form class="div-popup" method="POST" id="formpopup">

					<div class="box_format" id="box_ubicacion">
						<!--TITLE ELEMENT-->
						<div class="item_format">
							<label>Ubicación</label>
						</div>

						<!--CONTENT ELEMENT-->
						<div class="item_format">
							<input class="item_format_input" type="text" name="ubicacion" id="ubicacion">
						</div>

						<!-- ERRROR ELEMENT -->
						<div class="item_format">
							<p class="error_message" id="ubicacion_error"></p>
						</div>

					</div>


					<div class="box_format">

						<!--TITLE ELEMENT-->

						<div class="item_format">
							<label for="">Condicion</label>
						</div>

						<!--CONTENT ELEMENT-->

						<div class="item_format">
							<input class="item_format_input" type="text" name="condicion" id="condicion">
						</div>

						<!-- ERRROR ELEMENT -->
						<div class="item_format">
							<p class="error_message" id="condicion_error"></p>
						</div>

					</div>



					<div class="box_format">
						<!--TITLE ELEMENT-->
						<div class="item_format">
							<label for="">Clasificación</label>
						</div>

						<!--CONTENT ELEMENT-->
						<div class="item_format">
							<select class="item_format_select" name="clasificacion" id="clasificacion">
								<option value="" disabled selected hidden>Seleccionar </option>
								<option value="1">A</option>
								<option value="2">B</option>
								<option value="3">C</option>
							</select>
						</div>

						<!-- ERRROR ELEMENT -->
						<div class="item_format">
							<p class="error_message" id="clasificacion_error"></p>
						</div>

					</div>

					<div class="box_format">
						<!--TITLE ELEMENT-->
						<div class="item_format">
							<label for="">Acción correctiva</label>
						</div>

						<!--CONTENT ELEMENT-->
						<div class="item_format">
							<textarea class="item_format_input item_format_textarea" type="text" name="accion_correctiva" id="accion_correctiva"></textarea>
						</div>

						<!-- ERRROR ELEMENT -->
						<div class="item_format">
							<p class="error_message" id="accion_correctiva_error"></p>
						</div>

					</div>



					<div class="box_format">
						<!--TITLE ELEMENT-->
						<div class="item_format">
							<label for="">Responsable</label>
						</div>

						<!--CONTENT ELEMENT-->
						<div class="item_format">
						<select class="item_format_select" name="responsable_accion" id="responsable_accion">
                            </select>						
						</div>

						<!-- ERRROR ELEMENT -->
						<div class="item_format">
							<p class="error_message" id="responsable_accion_error"></p>
						</div>

					</div>



					<div class="box_format">
						<!--TITLE ELEMENT-->

						<div class="item_format">
							<label for="">Fecha de cumplimiento</label>
						</div>

						<!--CONTENT ELEMENT-->
						<div class="item_format">
							<input class="item_format_input" type="date" name="fecha_cumplimiento" id="fecha_cumplimiento">
						</div>

						<!-- ERRROR ELEMENT -->
						<div class="item_format">
							<p class="error_message" id="fecha_cumplimiento_error"></p>
						</div>
					</div>


					<div class="box_format">

						<!--TITLE ELEMENT-->

						<div class="item_format">
							<label for="">Seguimiento</label>
						</div>

						<!--CONTENT ELEMENT-->

						<div class="item_format">
							<textarea class="item_format_input item_format_textarea" type="text" name="seguimiento" id="seguimiento"> </textarea>
						</div>

						<!-- ERRROR ELEMENT -->
						<div class="item_format">
							<p class="error_message" id="seguimiento_error"></p>
						</div>

					</div>


					<div class="box_format">
						<!--TITLE ELEMENT-->
						<div class="item_format">
							<label for="">Evidencia
							</label>
						</div>

						<!--CONTENT ELEMENT-->
						<div class="item_format">
							<div class="container_photo">
								<input type="file" id="file-input" name="files[]" accept="image/png , image/jpeg" multiple>
								<label id="container_photo_label" for="file-input">Escoger archivos</label>
								<div id="images"></div>
							</div>
						</div>
					</div>


					<!-- ACTUALIZAMOS EL DOCUMENTO CON EL SUPERVISOR ASIGNADO Y FECHA DE CONTRATO-->
					<div class="center div-top">
						<button class="popup_send_form" type="submit" id="popup_send_form">Agregar Observación</button>
					</div>

				</form>

			</div>

			<div class="popup_load">

			</div>

			<div class="popup_sucess">

			</div>
		</div>
	</div>



</div>

<div class="wrap_load">

</div>

<div class="wrap_sucess">

</div>

<script src="<?php echo constant('URL'); ?>public/js/inspeccionBotiquinnew.js?<?php echo constant('VERSION'); ?>"></script>