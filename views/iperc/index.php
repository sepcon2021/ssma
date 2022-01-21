<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/verification-checks.css">

    <title>Control Documentario SSMA - IPERC</title>
</head>

<body>

<?php require 'views/header.php'; ?>

<div id="wrap">
        <div class="page">
            
            <div class="cabeceraDoc">
                <div class="logo">
                    <img src="<?php echo constant('URL')?>public/img/logo.png" alt="">
                </div>
                <div class="titulo">
                    <p>INSPECCIÓN DE IPERC CONTINUO</p>
                </div>
                <div class="formato">
                    <p>Código:</p>
                    <p>Versión: 0</p>
                    <p>Fecha: 10/04/2021</p>
                </div>
            </div>
            

            <form method="POST" id="formIPERC">

                <div class="manyInput">
                    <div class="flex1">
                                <label for="lista_proyecto">Elaborado por :</label>
                                <p><?php echo $this->nombres?></p>
                    </div>
                
                </div>

                <div class="manyInput">
                    <div class="flex1">
                                <label for="lista_proyecto">Proyecto :</label>
                                <select name="idProyecto" id="lista_proyecto" class="w75p">
                                    <!--  <option value="0" class="oculto">Seleccione ubicacion</option>-->
                                </select>
                    </div>
                
                    <div class="flex1">
                                <label for="lista_area">Área :</label>
                                <select name="idArea" id="lista_area" class="w75p">
                                    <!--  <option value="0" class="oculto">Seleccione ubicacion</option>-->
                                </select>
                    </div>
                </div>

                <div class="manyInput">
                    <div class="flex2 divGray form-control">

                        <label for="ubicacion" class="fondoblanco">Ubicación: </label>
                        <input class="w100p"   type="text" name="ubicacion" id="ubicacion" class="w85p">	
                    
                    								<!-- SHOW ICON IN BOTH CASE ERROR OR SUCCESS  -->
									<i class="fas fa-check-circle"></i>
                					<i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

									<small>Error message</small>
					</div>
                

                    <div class="flex1">
							<label for="lista_area_observada">Área Observada:</label>
							<select name="idAreaObservada" id="lista_area_observada" class="w75p">
								<!--  <option value="0" class="oculto">Seleccione ubicacion</option>-->
							</select>
				</div>

                </div>




                <div class="manyInput">
                    <div class="flex2 divGray form-control" >
                        <label for="empresa" class="fondoblanco">Empresa: </label>
                        <input class="w50p"   type="text" name="empresa" id="empresa" class="w70p">	
                                       								<!-- SHOW ICON IN BOTH CASE ERROR OR SUCCESS  -->
									<i class="fas fa-check-circle"></i>
                					<i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

									<small>Error message</small>
					</div>
 
                </div>


                <div class="manyInput">
                    <div class="flex2 divGray form-control" >
                        <label for="nombre_tarea" class="fondoblanco">Nombre de la tarea o trabajo: </label>
                        <input class="w100p"   type="text" name="nombre_tarea" id="nombre_tarea" class="w70p">	
                                                         								<!-- SHOW ICON IN BOTH CASE ERROR OR SUCCESS  -->
									<i class="fas fa-check-circle"></i>
                					<i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

									<small>Error message</small>
					</div>


                    <div class="flex1 divGray">
                        <label for="fecha" class="fondoblanco">Fecha de Elaboración : </label>
                        <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d");?>">	
                    </div>
                </div>


                <div class="secction center">
                    <p>1. LISTO PARA COMENZAR</p>
                </div>
                <div class="secction center">
                    <p>Si responde “No” a las primeras tres preguntas, NO INICIE EL TRABAJO</p>
                </div>
                
                <div>
							
							<table class="tablaConBordes w100p">
								<tbody>
									<tr>
										<td class="secction w40p center">

                                        <p>Generales</p>
										</td>
										
										<td class="secction   w10p center">
											<p>Si</p>
										</td>

										
										<td class="secction   w10p center">
											<p>No</p>
										</td>

										
										<td class="secction   w40p center">
											<p>Medida de control</p>
										</td>
									</tr>
								</tbody>
							</table>
							
				</div>


                <div>
                    <table class="tablaConBordes w100p">
                        <tbody>

                        <tr>
                                <!--<td class="w40p">¿He realizado este trabajo anteriormente?</td>-->
                                

                                <td class="w40p">
                                            
											
									<div id="message1" class="message">
									
                                    
                                    ¿He realizado este trabajo anteriormente?
									

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

									</div>

                                </td>
                                
                                <td class="w10p center">
                                    <input type="radio" name="riesgo1" id="riesgo1s" value="1"  checked ><label for="riesgo1s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo1" id="riesgo1n" value="0"><label for="riesgo1n"> No</label>
                                </td>

                            
                                
                            <td class="w40p center"> 
                            

                                <p id="comentario1-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>
                            
                                <input class="w100p" type="text" id="comentario1" name="comentario1"><br>
                             
                            
                            </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                               
                                
                                <td class="w40p">
                                            
											
									<div id="message2" class="message">
									
                                    
                                    ¿Poseo las habilidades, los conocimientos o los permisos requeridos?
									

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

									</div>

                                </td>
                                
                                <td class="w10p center">
                                    <input type="radio" name="riesgo2" id="riesgo2s" value="1"  checked ><label for="riesgo2s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo2" id="riesgo2n" value="0"><label for="riesgo2n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center">

                                <p id="comentario2-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p" type="text" id="comentario2" name="comentario2"><br>
                                </td>

                                
                            

                            </tr>
                                                        
                                                        
                            <tr>
                                <td class="w40p"> 
                                    <div id="message3" class="message">
                                ¿Puedo cumplir con las Reglas por la Vida?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo3" id="riesgo3s" value="1"  checked ><label for="riesgo3s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo3" id="riesgo3n" value="0"><label for="riesgo3n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center">
                                <p id="comentario3-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>
 
                                <input class="w100p"   type="text" id="comentario3" name="comentario3"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message4" class="message">
                                ¿Existe alguna evaluación de riesgos o instrucción de trabajo para esta tarea?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo4" id="riesgo4s" value="1"  checked ><label for="riesgo4s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo4" id="riesgo4n" value="0"><label for="riesgo4n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario4-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario4" name="comentario4"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message5" class="message">
                                ¿Se requiere algún permiso para realizar este trabajo?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo5" id="riesgo5s" value="1"  checked ><label for="riesgo5s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo5" id="riesgo5n" value="0"><label for="riesgo5n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario5-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario5" name="comentario5"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message6" class="message">
                                ¿Este trabajo requiere “aislamiento”?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo6" id="riesgo6s" value="1"  checked ><label for="riesgo6s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo6" id="riesgo6n" value="0"><label for="riesgo6n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario6-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario6" name="comentario6"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message7" class="message">
                                ¿Se trata de un espacio confinado?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo7" id="riesgo7s" value="1"  checked ><label for="riesgo7s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo7" id="riesgo7n" value="0"><label for="riesgo7n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario7-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario7" name="comentario7"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message8" class="message">
                                ¿Estoy trabajando en alturas?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo8" id="riesgo8s" value="1"  checked ><label for="riesgo8s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo8" id="riesgo8n" value="0"><label for="riesgo8n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario8-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario8" name="comentario8"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message9" class="message">
                                ¿Estoy realizando una excavación?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo9" id="riesgo9s" value="1"  checked ><label for="riesgo9s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo9" id="riesgo9n" value="0"><label for="riesgo9n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center">
                                <p id="comentario9-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>
 
                                <input class="w100p"   type="text" id="comentario9" name="comentario9"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message10" class="message">
                                ¿He identificado algún impacto ambiental?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo10" id="riesgo10s" value="1"  checked ><label for="riesgo10s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo10" id="riesgo10n" value="0"><label for="riesgo10n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario10-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario10" name="comentario10"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message11" class="message">
                                ¿Existe algún riesgo de lesión en las manos en este trabajo?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo11" id="riesgo11s" value="1"  checked ><label for="riesgo11s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo11" id="riesgo11n" value="0"><label for="riesgo11n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario11-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario11" name="comentario11"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message12" class="message">
                                ¿Se utilizarán productos químicos?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo12" id="riesgo12s" value="1"  checked ><label for="riesgo12s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo12" id="riesgo12n" value="0"><label for="riesgo12n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario12-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario12" name="comentario12"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message13" class="message">
                                ¿El área de trabajo se encuentra ordenada y libre de obstáculos?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo13" id="riesgo13 s" value="1"  checked ><label for="riesgo13s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo13" id="riesgo13 n" value="0"><label for="riesgo13n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario13-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario13" name="comentario13"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message14" class="message">
                                ¿He verificado si podría afectar u obstaculizar a los demás?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo14" id="riesgo14s" value="1"  checked ><label for="riesgo14s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo14" id="riesgo14n" value="0"><label for="riesgo14n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center">
                                <p id="comentario14-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p> 
                                <input class="w100p"   type="text" id="comentario14" name="comentario14"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message15" class="message">
                                ¿Tengo las herramientas adecuadas para este trabajo?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo15" id="riesgo15s" value="1"  checked ><label for="riesgo15s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo15" id="riesgo15n" value="0"><label for="riesgo15n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario15-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario15" name="comentario15"><br>
                                </td>

                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w40p"> 
                                    <div id="message16" class="message">
                                ¿Poseo el Equipo de Protección Personal adecuado? ¿Estoy capacitado para utilizarlo?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                </td>
                                

                                <td class="w10p center">
                                    <input type="radio" name="riesgo16" id="riesgo16s" value="1"  checked ><label for="riesgo16s"> Si</label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="riesgo16" id="riesgo16n" value="0"><label for="riesgo16n"> No</label>
                                </td>

                            
                                
                                <td class="w40p center"> 
                                <p id="comentario16-message" class="campo-obligatorio">Ingresar medida de control de forma obligatoria</p>

                                <input class="w100p"   type="text" id="comentario16" name="comentario16"><br>
                                </td>

                            </tr>  
                            

                            

                        </tbody>
                    </table>
                </div>


                <div class="secction center">
                    <p>2. CONTROL DE RIESGOS CRITICOS</p>
                </div>

                <div>
							
							<table class="tablaConBordes w100p">
								<tbody>
									<tr>
										<td class="secction w60p center">

                                        <p>2.1 RIESGOS CRITICOS</p>
										</td>
										
										<td class="secction   w20p center">
											<p>Si</p>
										</td>

										
										<td class="secction   w20p center">
											<p>No</p>
										</td>
									</tr>
								</tbody>
							</table>
							
				</div>

                
                <div>
                    <table class="tablaConBordes w100p">
                        <tbody>
                        
                                                                    
                               <tr>
                                    <td class="w60p">

                                    <div id="message17" class="message">
                                    
                                    ¿El trabajo cuenta con el ICA respectivo aprobado y este se encuentra en el área de trabajo?


                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>
                                    
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico1" id="riesgo_critico1s" value="1"  checked ><label for="riesgo_critico1s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico1" id="riesgo_critico1n" value="0"><label for="riesgo_critico1n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">

                                    <div id="message18" class="message">
                                    
                                    ¿Requiere un permiso de trabajo de alto riesgo para la labor que realizará?: espacio confinado, trabajo en caliente, excavaciones, armado de 
                                    andamios, riesgo de caída, excavaciones entre otros.


                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>

                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico2" id="riesgo_critico2s" value="1"  checked ><label for="riesgo_critico2s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico2" id="riesgo_critico2n" value="0"><label for="riesgo_critico2n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">

                                    <div id="message19" class="message">
                                    
                                    ¿El personal realizará labores dentro del radio de trabajo o en áreas de tránsito de equipos pesados?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>

                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico3" id="riesgo_critico3s" value="1"  checked ><label for="riesgo_critico3s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico3" id="riesgo_critico3n" value="0"><label for="riesgo_critico3n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">

                                    <div id="message20" class="message">
                                    
                                    ¿El trabajo se realizara cerca o al borde de: un talud, presa de relaves, cuerpos de agua con más de 1.50 m. de profundidad?


                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>
                                    
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico4" id="riesgo_critico4s" value="1"  checked ><label for="riesgo_critico4s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico4" id="riesgo_critico4n" value="0"><label for="riesgo_critico4n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">

                                    <div id="message21" class="message">
                                    
                                    ¿El trabajo contempla la posibilidad que el personal tenga contacto con sustancia química, inflamable o explosiva? ¿Existe la posibilidad de una 
                                    descarga no controlada?


                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>

                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico5" id="riesgo_critico5s" value="1"  checked ><label for="riesgo_critico5s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico5" id="riesgo_critico5n" value="0"><label for="riesgo_critico5n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">

                                    <div id="message22" class="message">
                                    
                                    ¿El trabajo requiere retirar la guarda de algún equipo mientras este se encuentre en funcionamiento?


                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>
                                    
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico6" id="riesgo_critico6s" value="1"  checked ><label for="riesgo_critico6s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico6" id="riesgo_critico6n" value="0"><label for="riesgo_critico6n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">

                                    <div id="message23" class="message">
                                    
                                    ¿Realizará excavaciones o perforaciones de más de 0.30 m. cerca o en plantas, instalaciones o líneas eléctricas?


                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>
                                    
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico7" id="riesgo_critico7s" value="1"  checked ><label for="riesgo_critico7s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico7" id="riesgo_critico7n" value="0"><label for="riesgo_critico7n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">

                                    <div id="message24" class="message">
                                    
                                    ¿El personal realizara trabajos en plataformas o alturas de 1.50 metros o mayores, que no estén protegidas con barandas?


                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>
                                    
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico8" id="riesgo_critico8s" value="1"  checked ><label for="riesgo_critico8s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico8" id="riesgo_critico8n" value="0"><label for="riesgo_critico8n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">

                                    <div id="message25" class="message">
                                    
                                    ¿Realizará maniobras de izaje de estructuras?

                                    
                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    </td>
                                    
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_critico9" id="riesgo_critico9s" value="1"  checked ><label for="riesgo_critico9s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_critico9" id="riesgo_critico9n" value="0"><label for="riesgo_critico9n"> No</label>
                                    </td>


                                    


                                </tr>
        
        

                        </tbody>
                    </table>
                </div>



                <div>
							
							<table class="tablaConBordes w100p">
								<tbody>
									<tr>
										<td class="secction w60p center">

                                        <p>2.2 CONTROL DE RIESGOS PARA MANOS</p>
										</td>
										
										<td class="secction   w20p center">
											<p>Si</p>
										</td>

										
										<td class="secction   w20p center">
											<p>No</p>
										</td>
									</tr>
								</tbody>
							</table>
							
				</div>

                
                <div>
                    <table class="tablaConBordes w100p">
                        
                        <tbody>
                        
                            <tr>
                                

                                <td class="w60p">
                                
                                <div id="message26" class="message">

                                ¿La tarea conlleva a exponer las manos a la línea de fuego (golpeado por objetos en movimiento ej.golpear con martillo)?
                                
                                
                                                                    
                                <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                </div>
                                </td>
                                
                                
                                <td class="w20p center">
                                    <input type="radio" name="riesgo_manos1" id="riesgo_manos1s" value="1"  checked ><label for="riesgo_manos1s"> Si</label>
                                </td>
                                <td class="w20p center"> 
                                    <input type="radio" name="riesgo_manos1" id="riesgo_manos1n" value="0"><label for="riesgo_manos1n"> No</label>
                                </td>

                            
                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w60p">
                                <div id="message27" class="message">

                                ¿La tarea conlleva a exponer las manos en puntos de atricción y/o atrapamiento (atrapado entre, ej. colocar mano entre marco y la puerta)?
                                <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                </div>
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="riesgo_manos2" id="riesgo_manos2s" value="1"  checked ><label for="riesgo_manos2s"> Si</label>
                                </td>
                                <td class="w20p center"> 
                                    <input type="radio" name="riesgo_manos2" id="riesgo_manos2n" value="0"><label for="riesgo_manos2n"> No</label>
                                </td>

                            
                                
                            

                            </tr>
                            
                            
                            <tr>
                                <td class="w60p">
                                <div id="message28" class="message">


                                ¿La tarea conlleva a exponer las manos a bordes filosos y/o cortantes: La tarea conlleva a manipular cuchillas y/o herramientas punzocortantes?
                                <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                </div>
                                
                                </td>
                                <td class="w20p center">
                                    <input type="radio" name="riesgo_manos3" id="riesgo_manos3s" value="1"  checked ><label for="riesgo_manos3s"> Si</label>
                                </td>
                                <td class="w20p center"> 
                                    <input type="radio" name="riesgo_manos3" id="riesgo_manos3n" value="0"><label for="riesgo_manos3n"> No</label>
                                </td>

                            
                                
                            

                            </tr>
        
        
                        
                        </tbody>
                    </table>
                </div>




                <div>
							
							<table class="tablaConBordes w100p">
								<tbody>
									<tr>
										<td class="secction w60p center">

                                        <p>2.3 CONTROLES COVID 19</p>
										</td>
										
										<td class="secction   w20p center">
											<p>Si</p>
										</td>

										
										<td class="secction   w20p center">
											<p>No</p>
										</td>
									</tr>
								</tbody>
							</table>
							
				</div>

                
                <div>
                    <table class="tablaConBordes w100p">
                        
                        <tbody>



                                <tr>
                                    <td class="w60p">
                                    <div id="message29" class="message">
                                    ¿Se mantiene distanciamiento 2 m como mínimo?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid2" id="riesgo_covid2s" value="1"  checked ><label for="riesgo_covid2s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_covid2" id="riesgo_covid2n" value="0"><label for="riesgo_covid2n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">
                                    <div id="message30" class="message">
                                    ¿Se utiliza la protección respiratoria (mascarilla KN95)?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid3" id="riesgo_covid3s" value="1"  checked ><label for="riesgo_covid3s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_covid3" id="riesgo_covid3n" value="0"><label for="riesgo_covid3n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">
                                    <div id="message31" class="message">
                                    ¿Se lavan/desinfectan las manos de manera frecuente?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid4" id="riesgo_covid4s" value="1"  checked ><label for="riesgo_covid4s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_covid4" id="riesgo_covid4n" value="0"><label for="riesgo_covid4n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">
                                    <div id="message32" class="message">
                                    ¿Se limpia/desinfectan las herramientas y equipos?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid5" id="riesgo_covid5s" value="1"  checked ><label for="riesgo_covid5s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_covid5" id="riesgo_covid5n" value="0"><label for="riesgo_covid5n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">
                                    <div id="message33" class="message">
                                    ¿Se limpió/desinfectó el vehículo/Equipo?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid6" id="riesgo_covid6s" value="1"  checked ><label for="riesgo_covid6s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_covid6" id="riesgo_covid6n" value="0"><label for="riesgo_covid6n"> No</label>
                                    </td>


                                    


                                </tr>


                                <tr>
                                    <td class="w60p">
                                    <div id="message34" class="message">
                                    ¿Se respeta el aforo del vehículo/Equipo?

                                    <i class="fas fa-exclamation-circle"></i><i class="fas fa-check-circle"></i>

                                    </div>
                                    </td>
                                    <td class="w20p center">
                                        <input type="radio" name="riesgo_covid7" id="riesgo_covid7s" value="1"  checked ><label for="riesgo_covid7s"> Si</label>
                                    </td>
                                    <td class="w20p center"> 
                                        <input type="radio" name="riesgo_covid7" id="riesgo_covid7n" value="0"><label for="riesgo_covid7n"> No</label>
                                    </td>


                                    


                                </tr>
                                                                    
                        
                        </tbody>
                    </table>
                </div>
                
                <div id="contenidoJefe"></div>


                <div class="buttonsPage">
                    <button type="submit" id="btnRegister"> <i class="far fa-calendar-check"></i> Registrar</button>
                    <button type="reset" id="btnCancel"><i class="fas fa-ban"></i> Cancelar</button>	
                </div>
        </form>    

        <div class="floatingActionButton">
        <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a>
    </div>

    <div class="mensaje msj_info">
        <span>Datos ingresados correctamente</span>
    </div>
    </div>
</div>


    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/funciones.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL');?>public/js/iperc.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL');?>public/js/data2.js?<?php echo constant('VERSION'); ?>"></script>

</body>

</html>