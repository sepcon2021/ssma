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
                    <p>INSPECCIÓN ALMACÉN DE PRODUCTOS QUÍMICOS</p>
                </div>
                <div class="formato">
                    <p>CÓDIGO: PSPC-110-X-PR-001-FR-044</p>
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
                        <label for="responsable_taller">Responsable</label>
                        <!--<input id="responsable_taller" type="text" name="responsable_taller" id="responsable_taller" class="w90p">-->
                        <select  name="dni_propietario" class="dni_propietario w90p"></select>
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w60p">
                        <label for="lugar">Lugar de inspección</label>
                        <input id="lugar" type="text" name="lugar" id="lugar" class="w90p">
                    </div>
                </div>

                <div class="manyInput">
                    <div class="w35p">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . " - 2 days")); ?>" class="w80p">
                    </div>
                </div>



                <table class="tablaConBordes w100p" id="tablaClasificacion">
                    <thead>
                        <tr>
                            <th class="w5p center">
                                <p>ITEM</p>
                            </th>

                            <th class="w20p center">
                                <p>DESCRIPCIÓN</p>
                            </th>

                            <th class="w10p center">
                                <p> ALMACÉN DE PRODUCTOS QUÍMICOS</p>
                            </th>

                            <th class="w10p center">
                                <p>PIT DE HIDROCARBUROS</p>
                            </th>

                            <th class="w50p center">
                                <p>OBSERVACIONES</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody-data">
                        <tr>
                            <td class="w5p">1</td>
                            <td class="w20p">¿Cuenta con acceso controlado y debidamente señalizado?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">2</td>
                            <td class="w20p">¿Se cuenta con las señaléticas de seguridad y números de emergencia?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">3</td>
                            <td class="w20p">¿El almacén es de uso exclusivo para productos químicos/hidrocarburos?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">4</td>
                            <td class="w20p">¿Área de facil acceso para transporte, manipulación y apilamiento de lo productos?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="w5p">5</td>
                            <td class="w20p">¿Los accesos no presentan obstáculos para evacuación en casos de emergencia?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="w5p">6</td>
                            <td class="w20p">Techo o trampa de grasa con material impermeable</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">7</td>
                            <td class="w20p">¿Cuenta con ventilación e ilumación adecuada?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">8</td>
                            <td class="w20p">¿Cuentan con anaqueles suficientemente estables y firmes, de forma que no exista el riesgo de derrumbamiento del anaquel?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">9</td>
                            <td class="w20p">En caso de requerir sistema de contención ¿es adecuado para contener un derrame y cubre el 110 % del volúmen del recipiente de mayor capacidad?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">10</td>
                            <td class="w20p">¿Se cuenta con el listado físico o electrónico de los productos químicos?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="w5p">11</td>
                            <td class="w20p">¿Se dispone del procedimiento para el manejo de productos químicos?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>


                        
                        <tr>
                            <td class="w5p">12</td>
                            <td class="w20p">¿Se disponen las hojas de seguridas (SDS) legibles de todos los productos químicos almacenados?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">13</td>
                            <td class="w20p">Los productos químicos almacenados ¿Están debidamente identificados y rotulados?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="w5p">14</td>
                            <td class="w20p">Los productos químicos almacenados ¿Están debidamente identificados y rotulados?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">15</td>
                            <td class="w20p">En el interior o cercano al lugar de almacenamiento, ¿Se cuenta con extintor (es) con inspección actualizada?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">16</td>
                            <td class="w20p">¿Cuenta con lava ojos y con tarjeta de inspección actualizada?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">17</td>
                            <td class="w20p">¿Se dispone de kit antiderrame y listado de componentes?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        
                        <tr>
                            <td class="w5p">18</td>
                            <td class="w20p">¿Se cuenta con recipientes identificados para la disposición de residuos peligrosos y no peligrosos?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="w5p">19</td>
                            <td class="w20p">El personal ¿Cuenta con EPPs adecuados para la manipulación de los productos químicos?</td>
                            <td class="w10p">
                                <select name="almacen_producto" id="almacen_producto" class="almacen_producto w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>
                            <td class="w10p">
                                <select name="pit_hidrocarburo" id="pit_hidrocarburo" class="pit_hidrocarburo w90p">
                                    <option value="4">Seleccionar</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N.A</option>
                                </select>
                            </td>

                            <td class="w50p">
                                <textarea name="observacion" id="observacion" class="observacion w90p"></textarea>
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
    <script src="<?php echo constant('URL'); ?>public/js/productoQuimico.js?<?php echo constant('VERSION'); ?>"></script>
    <script src="<?php echo constant('URL'); ?>public/js/compartido.js?<?php echo constant('VERSION'); ?>"></script>


</body>

</html>