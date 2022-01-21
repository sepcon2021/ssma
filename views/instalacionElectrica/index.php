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
                    <p>INSTALACIONES ELECTRICAS TEMPORALES</p>
                </div>
                <div class="formato">
                    <p>PSPC-110-X-PR-001-FR-033</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 17/05/2019</p>
                    <p>Pagina: 1 de 1</p>
                </div>
            </div>
            <form method="POST" id="formulario" name="formulario">

                <div class="manyInput">
                    <div class="w60p">
                        <label for="inspeccionado_por">Responsable del área inspeccionada</label>
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
                    <div class="w60p">
                        <label for="responsable_taller">Supervisor eléctrico responsable</label>
                        <select name="dni_propietario" class="dni_propietario w90p"></select>
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w60p">
                        <label for="obra">Obra / Fase</label>
                        <input id="obra" type="text" name="obra" id="obra" class="w90p">
                    </div>
                </div>


                <div class="manyInput">
                    <div class="w60p">
                        <label for="campamento">Campamento</label>
                        <input id="campamento" type="text" name="campamento" id="campamento" class="w90p">
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w35p">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . " - 2 days")); ?>" class="w80p">
                    </div>
                </div>

                <table class="tablaConBordes w100p" id="tablaElectrico">
                    <thead>
                        <tr>
                            <th class="w30p center">
                                <p>Elementos a revisar</p>
                            </th>

                            <th class="w20p center">
                                <p>Estado</p>
                            </th>

                            <th class="w50p center">
                                <p> Observaciones</p>
                            </th>

                        </tr>
                        <tr>
                            <th class="w30p center">
                                <p>Tablero eléctrico</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php
                        $listaElementos = ['LLAVE TERMOMAGNETICA', 'DISYUNTOR DIFERENCIAL', 'CUENTA CON DIAGRAMA UNIFILAR', 'CUENTA CON SEÑALIZACIÓN SEGURIDAD', 'CIERRE DEL TABLERO ADECUADO', 'CAJA DE PASE - PROTEGIDA Y CON TAPA'];

                        foreach ($listaElementos as $elemento) {
                            echo
                            '<tr>
                            <td class="w20p">' . $elemento . '</td>
                            <td class="w10p">
                                <select name="estado" id="estado" class="estado w90p">
                                    <option value="3">Seleccionar</option>
                                    <option value="1">BUEN ESTADO</option>
                                    <option value="2">MAL ESTADO</option>
                                </select>
                            </td>
                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>

                <table class="tablaConBordes w100p" id="tablaAlimentador">
                    <thead>
                        <tr>
                            <th class="w30p center">
                            </th>

                            <th class="w20p center">
                            </th>

                            <th class="w50p center">
                            </th>
                        </tr>
                        <tr>
                            <th class="w30p center">
                                <p>Alimentadtor eléctrico</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php
                        $listaElementos = ['PROTECCIÓN  CONTRACORRIENTE', 'MEDIOS DE DESCONEXION' ];

                        foreach ($listaElementos as $elemento) {
                            echo
                            '<tr>
                            <td class="w20p">' . $elemento . '</td>
                            <td class="w10p">
                                <select name="estado" id="estado" class="estado w90p">
                                    <option value="3">Seleccionar</option>
                                    <option value="1">BUEN ESTADO</option>
                                    <option value="2">MAL ESTADO</option>
                                </select>
                            </td>
                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>


                
                <table class="tablaConBordes w100p" id="tablaCircuito">
                    <thead>
                        <tr>
                            <th class="w30p center">
                            </th>

                            <th class="w20p center">
                            </th>

                            <th class="w50p center">
                            </th>
                        </tr>
                        <tr>
                            <th class="w30p center">
                                <p>Circuitos</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php
                        $listaElementos = ['CIRCUITOS DE LUMINARIAS',			
                        'CIRCUITOS DE TOMACORRIENTES'	,		
                        'SEÑALIZACIÓN'		,	
                        'CABLES EXPUESTOS'			
                        ];

                        foreach ($listaElementos as $elemento) {
                            echo
                            '<tr>
                            <td class="w20p">' . $elemento . '</td>
                            <td class="w10p">
                                <select name="estado" id="estado" class="estado w90p">
                                    <option value="3">Seleccionar</option>
                                    <option value="1">BUEN ESTADO</option>
                                    <option value="2">MAL ESTADO</option>
                                </select>
                            </td>
                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>


                                
                <table class="tablaConBordes w100p" id="tablaPuestaTierra">
                    <thead>
                        <tr>
                            <th class="w30p center">
                            </th>

                            <th class="w20p center">
                            </th>

                            <th class="w50p center">
                            </th>
                        </tr>
                        <tr>
                            <th class="w30p center">
                                <p>Puesta a tierra</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php
                        $listaElementos = ['INSTALACIONES TEMPORALES  ATERRADAS','SEÑALIZACIÓN'];

                        foreach ($listaElementos as $elemento) {
                            echo
                            '<tr>
                            <td class="w20p">' . $elemento . '</td>
                            <td class="w10p">
                                <select name="estado" id="estado" class="estado w90p">
                                    <option value="3">Seleccionar</option>
                                    <option value="1">BUEN ESTADO</option>
                                    <option value="2">MAL ESTADO</option>
                                </select>
                            </td>
                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>



                <table class="tablaConBordes w100p" id="tablaCampamento">
                    <thead>
                        <tr>
                            <th class="w30p center">
                                <p>Campamentos</p>
                            </th>

                            <th class="w20p center">
                            </th>

                            <th class="w20p center">
                            <p>Cantidad</p>
                            </th>

                            <th class="w50p center">
                                <p>Observaciones</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <tr>
                            <td rowspan="3" class="w20p">PORTACAMPS ATERRADOS</td>
                            <td class="w10p">
                                <p>TOTAL  PORTACAMP CAMPAMENTO</p>
                            </td>
                            <td>
                                <textarea name="portcampCampamento" id="portcampCampamento" class="portcampCampamento w90p"></textarea>
                            </td>
                            <td rowspan="3"  class="w50p">
                                <textarea name="portcampObservacion" id="portcampObservacion" class="portcampObservacion w90p"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="w10p">
                                <p>PORTACAMPS ATERRADOS</p>
                            </td>
                            <td class="w10p">
                                <textarea name="portcampAterrado" id="portcampAterrado" class="portcampAterrado w90p"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="w10p">
                                <p>PORTACAMPS NO ATERRADOS</p>
                            </td>
                            <td class="w10p">
                                <textarea name="portcampNoAterrado" id="portcampNoAterrado" class="portcampNoAterrado w90p"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <br><br>

                <div class="manyInput">
                    <label for="informe">INFORME DE DAÑOS: Cualquier daño en los equipos que presente al inicio de este dia de trabajo, se anota en el espacio:</label>
                </div>

                <br>
                <div class="manyInput">
                    <div class="w100p">
                        <textarea name="informe" id="informe" cols="30" rows="10" placeholder="Escribir el informe ..."></textarea>
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
    <script src="<?php echo constant('URL'); ?>public/js/instalacionElectrica.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>