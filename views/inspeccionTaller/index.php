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
                    <p>INSPECCIÓN DE TALLERES</p>
                </div>
                <div class="formato">
                    <p>CÓDIGO: PSPC-110-X-PR-001-FR-069</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 17/05/2019</p>
                    <p>Página: 1 de 1</p>
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
                        <label for="lugar_actividad">Lugar de la actividad </label>
                        <input id="lugar_actividad" type="text" name="lugar_actividad" id="lugar_actividad" class="w90p">
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w60p">
                        <label for="responsable_taller">Responsable del taller</label>
                        <!--<input id="responsable_taller" type="text" name="responsable_taller" id="responsable_taller" class="w90p">-->
                        <select  name="dni_propietario" class="dni_propietario w90p"></select>
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w35p">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . " - 2 days")); ?>" class="w80p">
                    </div>
                </div>



                <table class="tablaConBordes w100p">
                    <thead>
                        <tr>
                            <th class="w100p center">
                                <p>M: Malo R: Regular B: Bueno N/C: No corresponde N/P: No posee </p>
                            </th>
                        </tr>
                    </thead>
                </table>

                <table class="tablaConBordes w100p" id="tablaInstalacionElectrica">
                    <thead>
                        <tr>

                            <th class="secction w30p center">
                                <p>Instalaciones eléctricas</p>
                            </th>
                            <th class="secction w20p center">
                                <p>Calificación</p>
                            </th>

                            <th class="secction w50p center">
                                <p>Observaciones</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php

                        $arrayElementos = [
                            'Estado general',
                            'Estado de tableros eléctricos',
                            'Señalización de tableros eléctricos',
                            'Disyuntor diferencial',
                            'Llaves termicas',
                            'Toma corrientes y fichas',
                            'Puesta a tierra',
                            'Cableado eléctrico',
                        ];

                        $index = 1;

                        foreach ($arrayElementos as $elemento) {

                            echo '
                            <tr>
                                <td class="w30p">
                                    <p>' . $elemento . '</p>
                                </td>

                                <td class="w20p">
                                    <select name="calificacion" id="calificacion" class="calificacion w90p">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Malo</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Bueno</option>
                                        <option value="4">No corresponde</option>
                                        <option value="5">No posee</option>
                                    </select>
                                </td>

                                <td class="w50p">
                                    <textarea name="observacion" id="observacion" class="observacion w100p"></textarea>
                                </td>

                            </tr>';

                            $index++;
                        }
                        ?>
                    </tbody>
                </table>


                <table class="tablaConBordes w100p" id="tablaOrdenLimpieza">
                    <thead>
                        <tr>

                            <th class="secction w30p center">
                                <p>Orden y limpieza</p>
                            </th>
                            <th class="secction w20p center">
                                <p>Calificación</p>
                            </th>

                            <th class="secction w50p center">
                                <p>Observaciones</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php

                        $arrayElementos = [
                            'Pasillos    ',
                            'Escaleras   ',
                            'Accesos ',
                            'Apilado y almacenamiento de materiales  ',
                            'Sectores de trabajo adecuados   ',
                            'Existen baños y/o comedores en condiciones  ',
                            'Iluminación ',
                            'Ventilación ',
                            'Eliminación de desechos ',
                        ];

                        $index = 1;

                        foreach ($arrayElementos as $elemento) {

                            echo '
                            <tr>
                                <td class="w30p">
                                    <p>' . $elemento . '</p>
                                </td>

                                <td class="w20p">
                                    <select name="calificacion" id="calificacion" class="calificacion w90p">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Malo</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Bueno</option>
                                        <option value="4">No corresponde</option>
                                        <option value="5">No posee</option>
                                    </select>
                                </td>


                                <td class="w50p">
                                    <textarea name="observacion" id="observacion" class="observacion w100p"></textarea>
                                </td>

                            </tr>';

                            $index++;
                        }
                        ?>
                    </tbody>
                </table>




                <table class="tablaConBordes w100p" id="tablaProteccionContraIncendio">
                    <thead>
                        <tr>

                            <th class="secction w30p center">
                                <p>Protección contra incendio</p>
                            </th>
                            <th class="secction w20p center">
                                <p>Calificación</p>
                            </th>

                            <th class="secction w50p center">
                                <p>Observaciones</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php

                        $arrayElementos = [
                            'Extintores (Cantidad - capacidad - tipo)    ',
                            'Señalización de extintores  ',
                            'Señalización de salida de emergencias   ',
                        ];

                        $index = 1;

                        foreach ($arrayElementos as $elemento) {

                            echo '
                            <tr>
                                <td class="w30p">
                                    <p>' . $elemento . '</p>
                                </td>

                                <td class="w20p">
                                    <select name="calificacion" id="calificacion" class="calificacion w90p">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Malo</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Bueno</option>
                                        <option value="4">No corresponde</option>
                                        <option value="5">No posee</option>
                                    </select>
                                </td>


                                <td class="w50p">
                                    <textarea name="observacion" id="observacion" class="observacion w100p"></textarea>
                                </td>

                            </tr>';

                            $index++;
                        }
                        ?>
                    </tbody>
                </table>



                <table class="tablaConBordes w100p" id="tablaMaterialInflamable">
                    <thead>
                        <tr>

                            <th class="secction w30p center">
                                <p>Materiales Inflamables (Aceites, solventes, combustibles, pinturas, Prod. Químicos, etc.)</p>
                            </th>
                            <th class="secction w20p center">
                                <p>Calificación</p>
                            </th>

                            <th class="secction w50p center">
                                <p>Observaciones</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php

                        $arrayElementos = [
                            'Aislados (separados de otros materiales)    ',
                            'Identificados y señalizados     ',
                            'Lugar ventilado ',

                        ];

                        $index = 1;

                        foreach ($arrayElementos as $elemento) {

                            echo '
                            <tr>
                                <td class="w30p">
                                    <p>' . $elemento . '</p>
                                </td>

                                <td class="w20p">
                                    <select name="calificacion" id="calificacion" class="calificacion w90p">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Malo</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Bueno</option>
                                        <option value="4">No corresponde</option>
                                        <option value="5">No posee</option>
                                    </select>
                                </td>

                                <td class="w50p">
                                    <textarea name="observacion" id="observacion" class="observacion w100p"></textarea>
                                </td>

                            </tr>';

                            $index++;
                        }
                        ?>
                    </tbody>
                </table>


                <table class="tablaConBordes w100p" id="tablaMaquinasEspeciales">
                    <thead>
                        <tr>

                            <th class="secction w30p center">
                                <p>Maquinas o equipos especiales</p>
                            </th>
                            <th class="secction w20p center">
                                <p>Calificación</p>
                            </th>

                            <th class="secction w50p center">
                                <p>Observaciones</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php

                        $arrayElementos = [
                            'Resguardos en partes en movimiento  ',
                            'Señalización adecuada   ',
                            'Puesta a tierra ',
                            'Toma corrientes y fichas    ',
                            'Iluminación ',
                            'Ubicación adecuada  ',
                        ];

                        $index = 1;

                        foreach ($arrayElementos as $elemento) {

                            echo '
                            <tr>
                                <td class="w30p">
                                    <p>' . $elemento . '</p>
                                </td>

                                <td class="w20p">
                                    <select name="calificacion" id="calificacion" class="calificacion w90p">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Malo</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Bueno</option>
                                        <option value="4">No corresponde</option>
                                        <option value="5">No posee</option>
                                    </select>
                                </td>


                                <td class="w50p">
                                    <textarea name="observacion" id="observacion" class="observacion w100p"></textarea>
                                </td>
                            </tr>';

                            $index++;
                        }
                        ?>
                    </tbody>
                </table>


<!--
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

                        for ($index = 1; $index < 2; $index++) {

                            echo '
                            <tr>
                                <td class="center w50p">
                                    <textarea name="descripcion" id="descripcion" class="descripcion w90p"></textarea>
                                </td>

                                <td class="w50p">
                                    <textarea name="responsable" id="responsable" class="responsable w90p"></textarea>
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
                    -->



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
    <script src="<?php echo constant('URL'); ?>public/js/inspeccionTaller.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>