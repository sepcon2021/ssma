<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?php echo constant('URL') ?>public/img/logo.png" />
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/popup.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/seguridad.css">

    <title>Control Documentario SSMA - Inspección Planeada de Seguridad</title>
</head>

<body>
    <?php require 'views/header.php'; ?>




    <div id="wrap">
        <div class="page">
            <div class="cabeceraDoc">
                <div class="logo"> <img src="<?php echo constant('URL') ?>public/img/logo.png" alt=""> </div>
                <div class="titulo">
                    <p> INSPECCIÓN DE  KIT ANTIDERRAME</p>
                </div>
                <div class="formato">
                    <p>PSPC-110-X-PR-001-FR-038</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 17/05/2019</p>
                    <p>Pagina: 1 de 1</p>
                </div>
            </div>
            <form method="POST" id="formulario" name="formulario">

                <div class="manyInput">
                    <div class="w60p">
                        <label for="inspeccionado_por">Inspeccionado por</label>
                        <input readonly id="inspeccionado_por" type="text" name="inspeccionado_por" id="inspeccionado_por" class="w90p" value="<?php echo $this->nombres; ?>">
                    </div>
                </div>
                <div class="manyInput">
                    <div class="w35p">
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
                        <label for="responsable_taller">Responsable de la inspección</label>
                        <select name="dni_propietario" class="dni_propietario w90p"></select>
                    </div>
                </div>



                <div class="manyInput">
                    <div class="w20p">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . " - 2 days")); ?>" class="w80p">
                    </div>
                </div>

                <div class="manyInput">
                    <label for="aviso">Colocar (√ en caso cumpla con la cantidad de materiales en cada kit mencionadas)  y en caso de contenido faltante  colocar la cantidad  con la que se cuenta.</label>
                </div>


                <table class="tablaConBordes w100p" id="tablaInspeccionDerrame">
                    <thead>
                        <tr>
                            <th class="w20p center">
                                <p>Equipos Material para control de derrame:</p>
                            </th>

                            <th class="w5p center">
                                <p>Bandeja de contención </p>
                            </th>

                            <th class="w5p center">
                                <p> Paños absorventes </p>
                            </th>
                            <th class="w5p center">
                                <p>Trapos industriales</p>
                            </th>

                            <th class="w5p center">
                                <p>Bolsas plásticas</p>
                            </th>

                            <th class="w5p center">
                                <p>Pala</p>
                            </th>

                            <th class="w5p center">
                                <p>Pico</p>
                            </th>

                            <th class="w5p center">
                                <p>Salchichas absorventes</p>
                            </th>

                            <th class="w5p center">
                                <p>Bolsas o sacos de polipropileno</p>
                            </th>
                            
                            <th class="w5p center">
                                <p>Guantes de nitrilo</p>
                            </th>
                                                        
                            <th class="w5p center">
                                <p>Respirador de media cara con filtro para vapores orgánicos</p>
                            </th>

                            <th class="w5p center">
                                <p>Otros (especificar):</p>
                                <textarea name="equipo_otros_uno" id="equipo_otros_uno" cols="30" rows="10"></textarea>
                            </th>
                            
                            <th class="w5p center">
                                <p>Otros (especificar):</p>
                                <textarea name="equipo_otros_dos" id="equipo_otros_dos" cols="30" rows="10"></textarea>

                            </th>
                            
                            <th class="w5p center">
                                <p>Otros (especificar):</p>
                                <textarea name="equipo_otros_tres" id="equipo_otros_tres" cols="30" rows="10"></textarea>

                            </th>
                            
                            <th class="w5p center">
                                <p>Otros (especificar):</p>
                                <textarea name="equipo_otros_cuatro" id="equipo_otros_cuatro" cols="30" rows="10"></textarea>
                            </th>
                        </tr>

                        <tr>
                            <th class="w20p center">
                                <p>Cantidad de materiales en cada kit:</p>
                            </th>

                            <th class="w5p center">
                                <p>1 equipos moviles</p>
                            </th>

                            <th class="w5p center">
                                <p> 10 equipos / 20 estación </p>
                            </th>
                            <th class="w5p center">
                                <p>N.A</p>
                            </th>

                            <th class="w5p center">
                                <p>2 equipos /5 estación</p>
                            </th>

                            <th class="w5p center">
                                <p>1</p>
                            </th>

                            <th class="w5p center">
                                <p>1</p>
                            </th>

                            <th class="w5p center">
                                <p>5 equipos /10 estación</p>
                            </th>

                            <th class="w5p center">
                                <p>N.A</p>
                            </th>
                            
                            <th class="w5p center">
                                <p>2 Pares ( estación), 1 par para equipos moviles</p>
                            </th>
                                                        
                            <th class="w5p center">
                                <p>(Solo estación de emergencia 1)</p>
                            </th>

                            <th class="w5p center">
                            <textarea name="cantidad_otros_uno" id="cantidad_otros_uno" cols="30" rows="10"></textarea>
                            </th>
                            
                            <th class="w5p center">
                            <textarea name="cantidad_otros_dos" id="cantidad_otros_dos" cols="30" rows="10"></textarea>
                            </th>
                            
                            <th class="w5p center">
                            <textarea name="cantidad_otros_tres" id="cantidad_otros_tres" cols="30" rows="10"></textarea>
                            </th>
                            
                            <th class="w5p center">
                                <textarea name="cantidad_otros_cuatro" id="cantidad_otros_cuatro" cols="30" rows="10"></textarea>
                            </th>
                        </tr>

                    </thead>
                    <tbody class="tbody-data">
                        <?php

                        for ($index = 1 ; $index < 20 ; $index++) {
                            echo
                            '<tr>
                            <th class="w20p center">
                            <textarea name="equipo" class="equipo" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="bandeja_contencion" class="bandeja_contencion" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="panos_absorventes" class="panos_absorventes" cols="30" rows="10"></textarea>
                            </th>
                            <th class="w5p center">
                            <textarea name="trapo_industrial" class="trapo_industrial" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="bolsa_plastica" class="bolsa_plastica" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="pala" class="pala" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="pico" class="pico" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="salchicha_absorvente" class="salchicha_absorvente" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="bolsa_propileno" class="bolsa_propileno" cols="30" rows="10"></textarea>
                            </th>
                            
                            <th class="w5p center">
                            <textarea name="guantes_nitrilo" class="guantes_nitrilo" cols="30" rows="10"></textarea>
                            </th>
                                                        
                            <th class="w5p center">
                            <textarea name="respirador_media" class="respirador_media" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="otros_uno" class="otros_uno" cols="30" rows="10"></textarea>
                            </th>
                            
                            <th class="w5p center">
                            <textarea name="otros_dos" class="otros_dos" cols="30" rows="10"></textarea>
                            </th>

                            <th class="w5p center">
                            <textarea name="otros_tres" class="otros_tres" cols="30" rows="10"></textarea>
                            </th>


                            <th class="w5p center">
                            <textarea name="otros_cuatro" class="otros_cuatro" cols="30" rows="10"></textarea>
                            </th>

                        </tr>';
                        }
                        ?>
                    </tbody>

                
                </table>

                <div class="manyInput">
                    <label for="observacion">Observaciones</label>
                </div>

                <br>
                <div class="manyInput">
                    <div class="w100p">
                        <textarea name="observacion" id="observacion" cols="30" rows="10" placeholder="Escribir el observacion ..."></textarea>
                    </div>
                </div>
                <br><br>

                <div class="buttonsPage">
                    <button type="submit" id="btnRegister"> <i class="far fa-calendar-check"></i> Registrar</button>
                    <button type="reset" id="btnCancel"><i class="fas fa-ban"></i> Cancelar</button>
                </div>


            </form>
        </div>
    </div>


    <div class="floatingActionButton"> <a href="<?php echo constant('URL') ?>panel"><i class="fas fa-home"></i></a> </div>
    <div class="mensaje msj_info"> <span>Datos ingresados correctamente</span> </div>


    <script src="<?php echo constant('URL'); ?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/funciones.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/inspeccionDerrame.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>