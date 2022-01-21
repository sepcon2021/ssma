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
                    <p>INSPECCIÓN MENSUAL DE TABLEROS ELECTRICOS  </p>
                </div>
                <div class="formato">
                    <p>CÓDIGO: PSPC-110-X-PR-001-FR-71</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 31/05/2021</p>
                    <p>Página: 1 de 1</p>
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

                    <div class="w35p">
                        <label for="codigo_tag">Código / TAG </label>
                        <input id="codigo_tag" type="text" name="codigo_tag" id="codigo_tag" class="w90p">
                    </div>

                    <div class="w60p">
                        <label for="ubicacion">Ubicacion</label>
                        <input id="ubicacion" type="text" name="ubicacion" id="ubicacion" class="w90p">
                    </div>

                </div>

                <div class="manyInput">
                    <div class="w35p">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . " - 2 days")); ?>" class="w80p">
                    </div>
                    <div class="w35p">
                        <input type="radio" name="aprobado" value="1">APROBADO<br>
                        <input type="radio" name="aprobado" value="0"> DESAPROBADO<br>
                    </div>

                </div>




                <table class="tablaConBordes w100p" id="tablaClasificacion">
                    <thead>
                        <tr>

                            <th class="secction w5p center">
                                <p>ITEM</p>
                            </th>
                            <th class="secction w50p center">
                                <p>ELEMENTOS</p>
                            </th>

                            <th class="secction w20p center">
                                <p>APLICA</p>
                            </th>

                            <th class="secction w20p center">
                                <p>CUMPLE</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php

                        $arrayElementos = [
                            'Diferenciales Automáticos 30 mA     ',
                            'Tablero IP 65 Para uso exterior ',
                            'Indicación de máximo voltaje en el exterior     ',
                            'Lámpara de piloto (Indicador de tablero energizado) ',
                            'Botón de parada de emergencia   ',
                            'Panel protector interior (aislante transparente/laminado) 100% cubierto ',
                            'Amperímetro + Selector  ',
                            'Voltímetro + Selector   ',
                            'Tomacorriente + Enchufe blindado 3 Polos + Tierra   ',
                            'Tomacorriente doble hermético + Tierra  ',
                            'Barra de cobre línea a tierra (varilla copperweld 5/8 x 1.5 m.) ',
                            'Carcasa metálica en buen estado ',
                            'Puerta frontal en buen estado   ',
                            'Chapa de cierre y abertura en buen estado   ',
                            'Prensa estopa para asegurado de ingreso de cables   ',
                            'Planos y diagramas unifilares   ',
                            'Señalética (riesgo eléctrico - solo personal autorizado - voltage por tomas)    ',
                            'Tarjeta de personas responsables    ',
                            'Candado de seguridad    ',
                            'Acceso seguro y libre en caso de emergencia ',
                            'Verificacion de pruebas de CGFI (trimestral)    '
                        ];

                        $index = 1;

                        foreach ($arrayElementos as $elemento) {

                            echo '
                            <tr>
                                <td class="center w5p">' . $index . '</td>

                                <td class="w20p">
                                    <p>' . $elemento . '</p>
                                </td>

                                <td class="w20p">
                                    <select name="aplica" id="aplica" class="aplica w90p">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </td>

                                <td class="w20p">
                                    <select name="cumple" id="cumple" class="cumple w90p">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </td>

                            </tr>';

                            $index++;
                        }
                        ?>
                    </tbody>
                </table>



                <table class="tablaConBordes w100p">
                    <thead>
                        <tr>
                            <th class="secction w5p center">
                                <p>OBSERVACIONES</p>
                            </th>
                        </tr>
                    </thead>
                </table>

                <table class="tablaConBordes w100p" id="tablaObservacion">
                    <thead>
                        <tr>
                            <th class="secction w70p center">
                                <p>DESCRIPCIÓN</p>
                            </th>
                            <th class="secction w20p center">
                                <p>RESPONSABLE</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php

                        for($index = 1; $index < 2; $index++) {

                            echo '
                            <tr>
                                <td class="center w50p">
                                    <textarea name="descripcion" id="descripcion" class="descripcion w90p"></textarea>
                                </td>

                                <td class="w50p">
                                <select  name="dni_propietario" class="dni_propietario w90p"></select>
                                </td>

                            </tr>';

                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
                <br>
                <br>

                <table class="tablaConBordes w100p">
                    <thead>
                        <tr>
                            <td class="w100p">
                                <p style="color:red;font-weight:bold;">El responsable a cargo del tablero eléctrico debe asegurar la inspección y su mantenimiento.</p>
                                <p style="color:red;font-weight:bold;">Si un tablero resulta DESAPROBADO, no podrá ser utilizado y se debe colocar la tarjeta roja de FUERA DE SERVICIO</p>
                                <p style="color:red;font-weight:bold;">Retirar la Tarjeta de Fuera de Servicio y usar el tablero, se considera una FALTA GRAVE</p>
                            </td>
                        </tr>
                    </thead>
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
    <script src="<?php echo constant('URL'); ?>public/js/inspeccionTablero.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>