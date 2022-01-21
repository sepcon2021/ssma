<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Documentario SSMA - Tarjetas TOP</title>
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
                    <p>Check List de Vehiculos</p>
                </div>

                <div class="formato">
                    <p>PSPC-110-X-PR-003-FR-002</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 31/05/19</p>
                    <p>Página: 1 de 1</p>
                </div>
            </div>
            
            <form method="POST" id="formChecklist">
                
                <div class="manyInput">
                    
                    <div class="flex1 divGray">
                        <label for="fecha" class="fondoblanco">Fecha: </label>
                        <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d");?>">	
                    </div>

                    <div class="flex2 divGray">
                        <label for="obra" class="fondoblanco">Obra / Fase : </label>
                        <input type="text" name="obra" id="obra" class="w75p">	
                    </div>

                    <div class="flex2 divGray">
                        <label for="proyecto" class="fondoblanco">Capacidad : </label>
                        <input type="text" name="capacidad" id="capacidad" class="w75p">	
                    </div>


                </div>

                <div class="manyInput">
                    
                    <div class="flex2 divGray">
                        <label for="proyecto" class="fondoblanco">Modelo : </label>
                        <input type="text" name="modelo" id="modelo" class="w75p">	
                    </div>
                    <div class="flex2 divGray">
                        <label for="cliente" class="fondoblanco">Licencia de conducir :</label>
                        <input type="text" name="licencia_conducir" id="licencia_conducir" class="w85p">	
                    </div>

                    <div class="flex2 divGray">
                        <label for="cliente" class="fondoblanco">Marca :</label>
                        <input type="text" name="marca" id="marca" class="w85p">	
                    </div>

            
                

                </div>

                <div class="manyInput">
                  
                    <div class="flex2 divGray">
                        <label for="tipo_vehiculo" class="fondoblanco">Tipo de Vehiculo :</label>
                        <input type="text" name="tipo_vehiculo" id="tipo_vehiculo" class="w70p">	
                    </div>


                    <div class="flex1 divGray">
                        <label for="placa" class="fondoblanco">Placa : </label>
                        <input type="text" name="placa" id="placa" class="w70p">	
                    </div>



                </div>




                <div class="secction center">
                   
                <table class="tablaConBordes w100p">
                    
                    <tbody>
                             <tr>
                                <td  class="w35p">Articulos para revisar</td>
                                <td class="w20p center"> Bien</td>
                                <td class="w20p center"> No Bien</td>
                                <td class="w20p center"> NA</td>
                                <td class="w35p">Observaciones</td>
                            </tr>
                    </tbody>
                    </table>
                
                </div>



              


                <div >
                    <table class="tablaConBordes w100p">
                        <tbody>


                            <tr>
                               
                               
                                <td class="w35p" >Documentos </td>
                                
                                <td class="w10p center">
                                    <input type="radio" name="chkpt01" id="chkpt01s" value="1"><label for="chkpt01s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt01" id="chkpt01n" value="-1"><label for="chkpt01n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt01" id="chkpt01na" value="-1"><label for="chkpt01na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion01" id="observacion01" class="w75p">	
                                </td>


                            </tr>
                            
                            <tr>


                            <td class="w35p" >Tarjeta de propiedad </td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt02" id="chkpt02s" value="1"><label for="chkpt02s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt02" id="chkpt02n" value="-1"><label for="chkpt02n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt02" id="chkpt02na" value="-1"><label for="chkpt02na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion02" id="observacion02" class="w75p">	
                                </td>



                            </tr>

                            <tr>
                            <td class="w35p" >SOAT </td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt03" id="chkpt03s" value="1"><label for="chkpt03s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt03" id="chkpt03n" value="-1"><label for="chkpt03n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt03" id="chkpt03na" value="-1"><label for="chkpt03na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion03" id="observacion03" class="w75p">	
                                </td>



                            </tr>

                            <tr>
                                
                            <td class="w35p" >Espejos </td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt04" id="chkpt04s" value="1"><label for="chkpt04s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt04" id="chkpt04n" value="-1"><label for="chkpt04n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt04" id="chkpt04na" value="-1"><label for="chkpt04na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion04" id="observacion04" class="w75p">	
                                </td>


                            </tr>

                            <tr>
                            <td class="w35p" >Nivel de aceite,nivel de agua </td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt05" id="chkpt05s" value="1"><label for="chkpt05s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt05" id="chkpt05n" value="-1"><label for="chkpt05n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt05" id="chkpt05na" value="-1"><label for="chkpt05na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion05" id="observacion05" class="w75p">	
                                </td>



                            </tr>

                            <tr>
                            <td class="w35p" >Combustible </td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt06" id="chkpt06s" value="1"><label for="chkpt06s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt06" id="chkpt06n" value="-1"><label for="chkpt06n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt06" id="chkpt06na" value="-1"><label for="chkpt06na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion06" id="observacion06" class="w75p">	
                                </td>


                            </tr>

                           


                            <tr>
                            
                            <td class="w35p" >Luces (emergencia,direccionales,altas,bajas,etc.)</td>
                                
                                <td class="w10p center">
                                    <input type="radio" name="chkpt09" id="chkpt09s" value="1"><label for="chkpt09s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt09" id="chkpt09n" value="-1"><label for="chkpt09n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt09" id="chkpt09na" value="-1"><label for="chkpt09na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion09" id="observacion09" class="w75p">	
                                </td>



                            </tr>


                             
                            <td class="w35p" >Luces (circulina,pertiga,neblineros)</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt10" id="chkpt10s" value="1"><label for="chkpt10s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt10" id="chkpt10n" value="-1"><label for="chkpt10n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt10" id="chkpt10na" value="-1"><label for="chkpt10na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion10" id="observacion10" class="w75p">	
                                </td>




                            </tr>


                            <tr>
                            
                            <td class="w35p" >Frenos</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt11" id="chkpt11s" value="1"><label for="chkpt11s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt11" id="chkpt11n" value="-1"><label for="chkpt11n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt11" id="chkpt11na" value="-1"><label for="chkpt11na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion11" id="observacion11" class="w75p">	
                                </td>



                            </tr>


                            <tr>
                            
                            <td class="w35p" >Alarma de retroceso</td>
                                
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt12" id="chkpt12s" value="1"><label for="chkpt12s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt12" id="chkpt12n" value="-1"><label for="chkpt12n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt12" id="chkpt12na" value="-1"><label for="chkpt12na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion12" id="observacion12" class="w75p">	
                                </td>



                            </tr>

                            <tr>
                            
                            <td class="w35p" >Extintor de incendios</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt13" id="chkpt13s" value="1"><label for="chkpt13s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt13" id="chkpt13n" value="-1"><label for="chkpt13n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt13" id="chkpt13na" value="-1"><label for="chkpt13na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion13" id="observacion13" class="w75p">	
                                </td>


                            </tr>

                            <tr>
                            
                            <td class="w35p" >Botiquin</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt14" id="chkpt14s" value="1"><label for="chkpt14s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt14" id="chkpt14n" value="-1"><label for="chkpt14n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt14" id="chkpt14na" value="-1"><label for="chkpt14na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion14" id="observacion14" class="w75p">	
                                </td>


                            </tr>


                            <tr>
                            
                            <td class="w35p" >Botiquin</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt15" id="chkpt15s" value="1"><label for="chkpt15s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt15" id="chkpt15n" value="-1"><label for="chkpt15n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt15" id="chkpt15na" value="-1"><label for="chkpt15na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion15" id="observacion15" class="w75p">	
                                </td>

                            </tr>


                            <tr>
                            
                            <td class="w35p" >Indicadores (tablero de consola)</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt16" id="chkpt16s" value="1"><label for="chkpt16s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt16" id="chkpt16n" value="-1"><label for="chkpt16n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt16" id="chkpt16na" value="-1"><label for="chkpt16na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion16" id="observacion16" class="w75p">	
                                </td>


                            </tr>


                            <tr>
                            
                            <td class="w35p" >Presion de aceite del motor</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt17" id="chkpt17s" value="1"><label for="chkpt17s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt17" id="chkpt17n" value="-1"><label for="chkpt17n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt17" id="chkpt17na" value="-1"><label for="chkpt17na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion17" id="observacion17" class="w75p">	
                                </td>

                            </tr>


                            <tr>
                            
                            <td class="w35p" >Cable bateria</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt18" id="chkpt18s" value="1"><label for="chkpt18s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt18" id="chkpt18n" value="-1"><label for="chkpt18n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt18" id="chkpt18na" value="-1"><label for="chkpt18na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion18" id="observacion18" class="w75p">	
                                </td>
                               

                            </tr>


                            <tr>
                            
                            <td class="w35p" >Cable remolque</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt19" id="chkpt19s" value="1"><label for="chkpt19s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt19" id="chkpt19n" value="-1"><label for="chkpt19n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt19" id="chkpt19na" value="-1"><label for="chkpt19na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion19" id="observacion19" class="w75p">	
                                </td>


                            </tr>

                            <tr>
                            
                            <td class="w35p" >Inflado de neumaticos</td>
                            
                            <td class="w10p center">
                                    <input type="radio" name="chkpt20" id="chkpt20s" value="1"><label for="chkpt20s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt20" id="chkpt20n" value="-1"><label for="chkpt20n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt20" id="chkpt20na" value="-1"><label for="chkpt20na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion20" id="observacion20" class="w75p">	
                                </td>

                            </tr>


                            <tr>
                            
                            <td class="w35p" >Gata</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt21" id="chkpt21s" value="1"><label for="chkpt21s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt21" id="chkpt21n" value="-1"><label for="chkpt21n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt21" id="chkpt21na" value="-1"><label for="chkpt21na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion21" id="observacion21" class="w75p">	
                                </td>

                            </tr>

                            <tr>
                            
                            <td class="w35p" >Tacos de seguridad</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt22" id="chkpt22s" value="1"><label for="chkpt22s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt22" id="chkpt22n" value="-1"><label for="chkpt22n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt22" id="chkpt22na" value="-1"><label for="chkpt22na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion22" id="observacion22" class="w75p">	
                                </td>

                            </tr>



                            <tr>
                            
                            <td class="w35p" >]Llaves de ruedas,herramientas</td>
                            
                            <td class="w10p center">
                                    <input type="radio" name="chkpt23" id="chkpt23s" value="1"><label for="chkpt23s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt23" id="chkpt23n" value="-1"><label for="chkpt23n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt23" id="chkpt23na" value="-1"><label for="chkpt23na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion23" id="observacion23" class="w75p">	
                                </td>

                            </tr>


                            <tr>
                            
                            <td class="w35p" >Conos</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt24" id="chkpt24s" value="1"><label for="chkpt24s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt24" id="chkpt24n" value="-1"><label for="chkpt24n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt24" id="chkpt24na" value="-1"><label for="chkpt24na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion24" id="observacion24" class="w75p">	
                                </td>
                            </tr>

                            <tr>
                            
                            <td class="w35p" >Cinturon de seguridad</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt25" id="chkpt25s" value="1"><label for="chkpt25s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt25" id="chkpt25n" value="-1"><label for="chkpt25n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt25" id="chkpt25na" value="-1"><label for="chkpt25na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion25" id="observacion25" class="w75p">	
                                </td>

                            </tr>



                            <tr>
                            
                            <td class="w35p" >Llanta de repuesto</td>
                                
                                  
                            <td class="w10p center">
                                    <input type="radio" name="chkpt26" id="chkpt26s" value="1"><label for="chkpt26s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt26" id="chkpt26n" value="-1"><label for="chkpt26n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt26" id="chkpt26na" value="-1"><label for="chkpt26na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion26" id="observacion26" class="w75p">	
                                </td>
                            
                            </tr>

                            


                            <tr>
                            
                            <td class="w35p" >Claxon</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt28" id="chkpt28s" value="1"><label for="chkpt28s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt28" id="chkpt28n" value="-1"><label for="chkpt28n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt28" id="chkpt28na" value="-1"><label for="chkpt28na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion28" id="observacion28" class="w75p">	
                                </td>

                            </tr>

                            <tr>
                            
                            <td class="w35p" >Faros</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt29" id="chkpt29s" value="1"><label for="chkpt29s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt29" id="chkpt29n" value="-1"><label for="chkpt29n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt29" id="chkpt29na" value="-1"><label for="chkpt29na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion29" id="observacion29" class="w75p">	
                                </td>


                            </tr>

                            <tr>
                            
                            <td class="w35p" >Kit contra derrames</td>
                                
                            <td class="w10p center">
                                    <input type="radio" name="chkpt30" id="chkpt30s" value="1"><label for="chkpt30s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt30" id="chkpt30n" value="-1"><label for="chkpt30n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt30" id="chkpt30na" value="-1"><label for="chkpt30na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion30" id="observacion30" class="w75p">	
                                </td>
                            </tr>

                            <tr>
                            
                            <td class="w35p" >Otros</td>
                            <td class="w10p center">
                                    <input type="radio" name="chkpt31" id="chkpt31s" value="1"><label for="chkpt31s"> </label>
                                </td>
                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt31" id="chkpt31n" value="-1"><label for="chkpt31n"> </label>
                                </td>

                                <td class="w10p center"> 
                                    <input type="radio" name="chkpt31" id="chkpt31na" value="-1"><label for="chkpt31na"> </label>
                                </td>

                                
                                <td class="w35p" >
                                <input type="text" name="observacion31" id="observacion31" class="w75p">	
                                </td>
                                

                            </tr>
                            
                        </tbody>
                    </table>
                </div>


                  
                <div class="manyInput">
                   
                    <div class="flex2 divGray">
                        <label for="semana" class="fondoblanco"></label>
                        <input type="text" name="obervaciones_generales" id="observaciones_generales" class="w70p">	
                    </div>

                
                    
                </div>


                <div class="center">
                   
                <table class="tablaConBordes">
                    <tbody>
           

                            <tr>
                                <td  class="w35p">Informes de daños : Cualquier daño a este equiopo que se presente al inicio de este dia de trabajo,se anota en el espacio</td>
                               
                                <td><textarea name="observacion0" id="observacion0" cols="30" rows="4"></textarea></td>
                            </tr>
                           
                    </tbody>

                    </table>
                </div>



<!--
                <div class="secction center">
                   
                <table class="tablaConBordes w100p">
                    
                    <tbody>
                            
                            
                            <tr>
                               
                                <td  class="w50p">Firma del conductor </td>
                                <td class="w50p">Firma del inspector</td>
                                
                            </tr>

                            
                            
                            <tr>
                                
                                <td class="w50p">
                                <input type="text" name="observacion_docu_01" id="observacion_docu_01" >	
                                </td>


                                <td class="w50p">
                                <input type="text" name="observacion_docu_01" id="observacion_docu_01" >	
                                </td>


                                </tr>
                           

                    


                    </tbody>

                    </table>
                
                </div>
-->



    

               
                <div class="manyInput">
                    <div class="flex1 divGray">
                        <label for="realizado" class="fondoblanco">Realizado por : </label>

                        <input type="text" name="elaborado" id="elaborado" class="w80p" value="<?php echo $this->nombres;?>">	

                    </div>
                </div>
                <div class="buttonsPage">
                    <button type="submit" id="btnRegister"> <i class="far fa-calendar-check"></i> Registrar</button>
                    <button type="reset" id="btnCancel"><i class="fas fa-ban"></i> Cancelar</button>	
                </div>

            </form>    
        </div>
    </div>
    
    <div class="floatingActionButton">
        <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a>
    </div>

    <div class="mensaje msj_info">
        <span>Datos ingresados correctamente</span>
    </div>

    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
    <script src="<?php echo constant('URL');?>public/js/checklist.js"></script>
</body>
</html>