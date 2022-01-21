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
                    <p>CHECK LIST ALMACENAMIENTO DE GASES COMPRIMIDOS</p>
                </div>
                <div class="formato">
                    <p>Documento ID: P679-110-X-FR-0034</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 26/02/2021</p>
                </div>
            </div>
            <form method="POST" id="formulario" name="formulario">

                <div class="manyInput">

                    <div class="w60p">
                        <label for="lista_proyecto">Proyecto</label>
                        <select name="sede" id="lista_proyecto" class="w90p">
                        </select>
                    </div>

                    <div class="w35p">
                        <label for="lista_area">Área</label>
                        <select name="id_area" id="lista_area" class="w100p">
                        </select>
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w60p">
                        <label for="lugar">Lugar de inspección</label>
                        <input id="lugar" type="text" name="lugar" id="lugar" class="w90p">
                    </div>

                    <div class="w35p">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . " - 2 days")); ?>" class="w80p">
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w60p">
                        <label for="responsable_taller">Responsable</label>
                        <select  name="dni_propietario" class="dni_propietario w90p"></select>
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w60p">
                        <label for="empresa">Empresa</label>
                        <input id="empresa" type="text" name="empresa" id="empresa" class="w90p">
                    </div>
                </div>


                <table class="tablaConBordes w100p" id="tablaClasificacion">
                    <thead>
                        <tr>
                            <th class="secction w5p center">
                                <p>N°</p>
                            </th>

                            <th class="secction   w20p center">
                                <p>ELEMENTOS A INSPECCIONAR</p>
                            </th>

                            <th class="secction   w10p center">
                                <p> SI | NO | N.A</p>
                            </th>

                            <th class="secction   w60p center">
                                <p>Observación</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <tr>
                            <td class="w5p">1</td>
                            <td class="w20p">¿Los gases comprimidos se acopian en un almacén exclusivo?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">2</td>
                            <td class="w20p">¿Los gases comprimidos se encuentran identificadas de acuerdo al estándar?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">3</td>
                            <td class="w20p">¿El almacén de gases comprimidos se encuentra separado de los otros Almacenes?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">4</td>
                            <td class="w20p">¿El almacén de gases comprimidos se encuentra señalizado?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">5</td>
                            <td class="w20p">¿EL almacén de gases comprimidos, esta construido de acuerdo al estándar?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        
                        <tr>
                            <td class="w5p">6</td>
                            <td class="w20p">¿ Los gases comprimidos se encuentran almacenados en forma vertical?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">7</td>
                            <td class="w20p">¿Existe un encargado del almacén?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">8</td>
                            <td class="w20p">¿Existe extintor en el almacén?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">9</td>
                            <td class="w20p">¿Existe un inventario del almacén de gases comprimidos?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="3">NO</option>
                                    <option value="4">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">10</td>
                            <td class="w20p">¿Los cilindros de gases comprimidos se encuentran en buen estado?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">11</td>
                            <td class="w20p">¿ Se encuentran disponibles las hojas de seguridad de cada uno de los cilindros de gases comprimidos?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">12</td>
                            <td class="w20p">¿La temperatura de almacenaje y condiciones atmósfericas son las adecuadas de acuerdo la hoja MSDS.?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">13</td>
                            <td class="w20p">¿El área de almacenamiento muestra señales de advertencia que indica los peligros del área (Ej: peligro Inflamables, prohibido Fumar?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">14</td>
                            <td class="w20p">¿Los cilindros están y/o asegurados durante su uso en posición vertical y con dispotiviso (cadenas) que aseguren su estabilidad a 1/3 y 2/3 de la altura del cilindro?</td>
                            <td class="w10p">
                                <select name="respuesta" id="respuesta" class="respuesta w90p">
                                    <option value="4">Seleccionar</option><option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w60p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <table class="tablaConBordes w100p">
                    <thead>
                        <tr>
                            <th>Otros a considerar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="observacion_general" id="observacion_general" cols="30" rows="4"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="manyInput">

                    <div id="contenidoJefe"></div>

                </div>
                

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
    <script src="<?php echo constant('URL'); ?>public/js/gasComprimido.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>