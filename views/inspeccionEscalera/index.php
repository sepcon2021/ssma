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
                    <p>INSPECCIÓN DE ESCALERAS FIJAS Y PORTÁTILES</p>
                </div>
                <div class="formato">
                    <p>Código: PSPC-110-X-PR-001-FR-044</p>
                    <p>Revisión: 0</p>
                    <p>Emisión: 10/08/2021</p>
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
                        <label for="supervisor">Supervisor</label>
						<select name="dni_propietario" class="dni_propietario" id="dni_propietario" class="w100p"></select>
                    </div>
                </div>

                <div class="manyInput">

                    <div class="w35p">
                        <label for="empresa">Empresa</label>
                        <input id="empresa" type="text" name="empresa" id="empresa" class="w90p">
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w10p">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . " - 2 days")); ?>" class="w100p">
                    </div>
                </div>




                <table class="tablaConBordes w100p" id="tablaClasificacion">
                    <thead>
                        <tr>

                            <th class="secction w5p center">
                                <p>ID</p>
                            </th>
                            <th class="secction w20p center">
                                <p>CODIGO</p>
                            </th>

                            <th class="secction w20p center">
                                <p>TIPO</p>
                            </th>

                            <th class="secction w20p center">
                                <p>CONDICION</p>
                            </th>

                            <th class="secction w30p center">
                                <p>COMENTARIOS</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <?php
                        for ($i = 1; $i < 20; $i++) {

                            echo '
                            <tr>
                                <td class="center w5p">' . $i . '</td>

                                <td class="w20p">
                                    <textarea name="codigo" id="codigo" class="codigo w90p"></textarea>
                                </td>

                                <td class="w20p">
                                    <select name="tipo" id="tipo" class="tipo w90p">
                                        <option value="4">Seleccionar</option>
                                        <option value="1">Escalera Fija</option>
                                        <option value="2">Escalera Tijera</option>
                                        <option value="3">Escalera Lineal</option>
                                    </select>
                                </td>

                                <td class="w20p">
                                    <select name="condicion" id="condicion" class="condicion w90p">
                                        <option value="4">Seleccionar</option>
                                        <option value="1">Operativo</option>
                                        <option value="2">Para mantenimiento</option>
                                        <option value="3">Para ser desechado</option>
                                    </select>
                                </td>

                                <td class="w30p">
                                    <textarea name="comentario" id="comentario" class="comentario w90p"></textarea>
                                </td>
                            </tr>';
                        }
                        ?>
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
    <script src="<?php echo constant('URL'); ?>public/js/inspeccionEscalera.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>