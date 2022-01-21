<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3>Documentos</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ Observación planeada de tarea</a>
        </div>
    </div>

    <div class="wrap_document_format">
        <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
                <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
                <p>Observación planeada de tarea</p>
            </div>

            <div class="wrap_document_format_head_code">
                <p>PSPC-100-X-PR-006-FR-001</p>
                <p>Revisión: 0</p>
                <p>Emisión: 10/04/2021</p>
                <p>Página: 1 de 1</p>
            </div>

        </div>
        <div class="wrap_document_format_body">
            <form class="general_form" action="" id="formDigital">

                <input type="hidden" id="elaborado" name="elaborado">
                <input type="hidden" id="internal" name="internal">

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
                        <label for="">Ubicación</label>
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
                        <label for="">Fase</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="fase" id="fase">


                            <option value="" disabled="" selected="" hidden=""> Seleccionar la fase observada</option>
                            <option value="1">RRHH</option>
                            <option value="2">Control de Proyecto</option>
                            <option value="3">Obras Civiles</option>
                            <option value="4">Ingeniería</option>
                            <option value="5">Calidad</option>
                            <option value="6">Precom</option>
                            <option value="7">SSMA</option>
                            <option value="8">Campamento</option>
                            <option value="9">Almacén</option>
                            <option value="10">Mantenimiento</option>
                            <option value="11">Operadores de equipo pesado y liviano/rigger</option>
                            <option value="12">Obras mecánicas</option>
                            <option value="13">Tec.Informática</option>
                            <option value="14">Electricidad</option>
                            <option value="15">Contratista</option>
                            <option value="16">Administración</option>


                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="fase_error"></p>
                    </div>
                </div>



                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Nombre del equipo observado</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="nombre_equipo_observado"
                            id="nombre_equipo_observado">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="nombre_equipo_observado_error"></p>
                    </div>

                </div>

                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Tiempo en el trabajo</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="tiempo_trabajo" id="tiempo_trabajo">


                            <option value="" disabled="" selected="" hidden=""> Seleccionar la fase observada</option>
                            <option value="1">1-2 meses</option>
                            <option value="2">3-5 meses</option>
                            <option value="3">6-8 meses</option>
                            <option value="4">9 meses a más</option>

                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="tiempo_trabajo_error"></p>
                    </div>
                </div>


                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Tiempo en el trabajo actual</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="tiempo_trabajo_actual"
                            id="tiempo_trabajo_actual">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="tiempo_trabajo_actual_error"></p>
                    </div>

                </div>

                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Guardia</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="guardia" id="guardia">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="guardia_error"></p>
                    </div>

                </div>



                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Ocupación</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="ocupacion" id="ocupacion">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="ocupacion_error"></p>
                    </div>

                </div>


                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Tarea</label>

                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="tarea" id="tarea">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="tarea_error"></p>
                    </div>

                </div>

                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Fecha</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="date" name="fecha_incidente" id="fecha_incidente">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="fecha_incidente_error"></p>
                    </div>

                </div>



                <div class="box_format">

                    <!--TITLE ELEMENT-->

                    <div class="item_format">
                        <label for="">Razón para la OPT</label>
                    </div>

                    <!--CONTENT ELEMENT-->

                    <div class="item_format">
                        <input class="item_format_input" type="text" name="razon" id="razon">
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="razon_error"></p>
                    </div>

                </div>

                <div class="box_format" id="box_responsable">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">Asignar responsable de la acción
                        </label>
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
                        <label for="">Riesgo crítico</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="riesgo_critico" id="riesgo_critico">

                            <option value="" disabled="" selected="" hidden=""> Seleccionar un riesgo crítico</option>
                            <option value="1"> Aislamiento, bloqueo y etiquetado </option>
                            <option value="2"> Trabajos en espacios confinados </option>
                            <option value="3"> Trabajos con izaje o cargas suspendidas </option>
                            <option value="4"> Trabajos en altura o desnivel </option>
                            <option value="5"> Excavaciones y zanjas </option>
                            <option value="6"> Trabajos en caliente </option>
                            <option value="7"> Operación de equipo pesad0 /liviano /móviles </option>
                            <option value="8"> Trabajos con circuitos energizados </option>
                            <option value="9"> Trabajos con/ cerca de energías o partes móviles </option>
                            <option value="10"> Trabajos con/cerca de sustancias quimicas </option>
                            <option value="11"> Trabajos con tuberias de hdpe </option>
                            <option value="12"> Ingreso a áreas restringidas sin autorización </option>
                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="riesgo_critico_error"></p>
                    </div>
                </div>



                <div class="box_format">
                    <!--TITLE ELEMENT-->
                    <div class="item_format">
                        <label for="">PET</label>
                    </div>
                    <!--CONTENT ELEMENT-->
                    <div class="item_format">
                        <select class="item_format_select" name="pet" id="pet">

                            <option value="" disabled="" selected="" hidden=""> Seleccionar un pet log</option>
                            <option value="1"> P679-110-X-PR-0001 PETS - Carga y Descarga de Container con Grúa / Camión
                                Grua </option>
                            <option value="2"> P679-110-X-PR-0002 PETS - Conexión de Cables Eléctricos y Comunicación
                                para Equipos e Instalaciones Temporales y Permanentes </option>
                            <option value="3"> P679-110-X-PR-0003 PETS - Excavaciones Manuales y con Rotomartillo en
                                Zonas Temporales </option>
                            <option value="4"> P679-110-X-PR-0004 PETS - Montaje y Desmontaje de Mastil Pararrayo en
                                Instalaciones Temporales </option>
                            <option value="5"> P679-110-X-PR-0005 PETS - Recepción, Traslado y Descarga de Materiales
                                Equipos y Otros de Un Cama Baja </option>
                            <option value="6"> P679-110-X-PR-0006 PETS - Levantamiento y Replanteo Topográfico </option>
                            <option value="7"> P679-110-X-PR-0007 PETS - Abastecimiento de Combustible con surtidor
                                Móvil </option>
                            <option value="8"> P679-110-X-PR-0008 PETS Operación con Equipo de Izaje 29/06/2021
                            </option>
                            <option value="9"> P679-110-X-PR-0009 PETS - Operación y Mantenimiento de Generadores a
                                Diesel </option>
                            <option value="10"> P679-110-X-PR-0010 PETS - Operación de Tractor de Orugas en Ejecución
                                del Proyecto </option>
                            <option value="11"> P679-110-X-PR-0011 PETS - Operación de Volquetes en Ejecución del
                                Proyecto </option>
                            <option value="12"> P679-110-X-PR-0012 PETS - Abastecimiento de Gasohol para Equipos Menores
                                mediante Bidones de Seguridad a Equipos Menores </option>
                            <option value="13"> P679-110-X-PR-0013 PETS - Almacenamiento y Retiro de Productos Químicos
                            </option>
                            <option value="14"> P679-110-X-PR-0014 PETS - Instalación de Sistema Puesta a Tierra
                            </option>
                            <option value="15"> P679-110-X-PR-0015 PETS - Soldadura de Tubería de Acero </option>
                            <option value="16"> P679-110-X-PR-0016 PETS - Procedimiento de Inspección por Ultrasonido
                                Semiautomático - SAUT </option>
                            <option value="17"> P679-110-X-PR-0017 PETS - Revestimiento de Juntas Soldadas </option>
                            <option value="18"> P679-110-X-PR-0018 PETS - Procedimiento de Inspección por líquidos
                                Penetrantes (PT) </option>
                            <option value="19"> P679-110-X-PR-0019 PETS - Curvado de Tuberías </option>
                            <option value="20"> P679-110-X-PR-0020 PETS - Desfile de Tuberías </option>
                            <option value="21"> P679-110-X-PR-0022 PETS Transporte de Personal </option>
                            <option value="22"> P679-110-X-PR-0023 PETS Movimiento de Suelos 29/06/2021 </option>
                            <option value="23"> P679-110-X-PR-0024 PETS Relleno y Compactado </option>
                            <option value="24"> P679-110-X-PR-0025 PETS Fundaciones Obras de Concreto 17/09/2021
                            </option>
                            <option value="25"> P679-110-X-PR-0026 PETS Ensayos de Laboratorio de Suelos </option>
                            <option value="26"> P679-110-X-PR-0027 PETS Procedimiento de Aplicación de Grouting
                            </option>
                            <option value="27"> P679-110-X-PR-0031 PETS Habilitación Montaje Cableado y Conexionado
                                Equipos E&amp;I </option>
                            <option value="28"> P679-110-X-PR-0036 PETS Seguridad en Oficinas </option>
                            <option value="29"> P679-110-X-PR-0037 PETS - Construcción de Tanques Para recuperación de
                                agua Línea 5560 13/09/2021 </option>
                            <option value="30"> P679-110-X-PR-0038 PETS - Apertura De Zanja_Bajado Y Tapado De Tuberia
                            </option>
                            <option value="31"> P679-110-X-PR-0039 PETS - Protección Catódica </option>
                            <option value="32"> P679-110-X-PR-0040 PETS - Proceso de Radiología Industrial Gammagrafia
                                de Juntas Soldadas. </option>
                            <option value="33"> P679-110-X-PR-0041 PETS - Mantenimiento de Equipos </option>
                            <option value="34"> P679-110-X-PR-0042 PETS. Montaje de Spools, Equipos Mecanicos, valvulas
                                y Uniones Bridadas. </option>
                            <option value="35"> P679-110-X-PR-0043 PETS Pruebas Hidrostaticas </option>
                            <option value="36"> P679-110-X-PR-0050 PETS - Trabajos Civiles y Malla y Tierra en Estación
                                Este-Oeste 31/08/2021 </option>
                            <option value="37"> P679-110-X-PR-0051 Revestimiento Interno de la Nueva Línea de Descarga
                                de Relaves </option>
                            <option value="38"> P679-110-X-PR-0053 PETS - Cruce de Vía Regional con Línea de Descarga
                                Este. </option>
                            <option value="39"> P679-110-X-PR-0054 PETS Levantamiento y Replanteo Topográfico MANIFOLD
                                20 </option>
                            <option value="40"> P679-110-X-PR-0055 PETS Operación con equipo de izaje MANIFOLD 20
                            </option>
                            <option value="41"> P679-110-X-PR-0056 PETS Movimiento de Suelos MANIFOLD 20 </option>
                            <option value="42"> P679-110-X-PR-0057 PETS Relleno y compactado MANIFOLD 20 </option>
                            <option value="43"> P679-110-X-PR-0058 PETS - Trabajos Civiles - Banco Ducto - PV19
                            </option>
                            <option value="44"> P679-110-X-PR-0059 PETS - Excavacion Manual para Inspeccion de Tuberia
                                HDPE </option>

                            <option value="49"> P679-110-X-PR-0060 PETS Tramo Intermedio Estación Este Oeste Tie in Hard
                                Road</option>
                            <option value="50"> P679-110-X-PR-0061 PETS Abastecimiento de Agua para Regado de Vías y
                                Plataformas con Camión Cisterna.</option>

                            <option value="45"> P679-300-B-PR-0002 PETS - Apertura de Derecho de Vía </option>
                            <option value="46"> P679-300-C-PR-0031 PETS - Montaje y Desmontaje y Soldadura de
                                Estructuras de Acero </option>
                            <option value="47"> P679-300-E-PR-0002 PETS - Soldadura Exotérmica (CADWELD) </option>
                            <option value="48"> P679-300-X-PR-0002 PETS - Recepción de Inspección de Materiales de
                                Equipos </option>

                        </select>
                    </div>

                    <!-- ERRROR ELEMENT -->
                    <div class="item_format">
                        <p class="error_message" id="pet_error"></p>
                    </div>
                </div>





                
                <div class="box_format">
                    
                <!--OBSERVACIONES  -->



                <div class="secction center">
                    <p>Observación de la Tarea</p>
                </div>


                <div>

                    <table class="tablaConBordes w100p">
                        <tbody>
                            <tr>
                                <td class="secction w50p center">

                                    <p>Pasos</p>
                                </td>

                                <td class="secction   w50p center">
                                    <p>Observaciones</p>
                                </td>



                            </tr>
                        </tbody>
                    </table>

                </div>


                <div>
                    <table class="tablaObservaciones tablaConBordes w100p">
                        <tbody id="body-observaciones">

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>
                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>
                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="pasos w100p" name="pasos"><br>
                                </td>

                                <td class="w50p center">
                                    <input type="text" class="observaciones w100p" name="observaciones"><br>
                                </td>

                            </tr>

                        </tbody>
                    </table>


                </div>






                <div class="secction center">
                    <p>OBSERVACION PLANEADA DE TAREA RESULTADOS</p>
                </div>


                <div class="secction center">
                    <p>Fortalezas - Oportunidad para felicitar</p>
                </div>

                <div>

                    <textarea class="w100p" type="text" id="oportunidades" name="oportunidades">
                    </textarea>

                </div>


                <!-- RECOMENDACIONES -->

                <div class="secction center">
                    <p>Recomendaciones</p>
                </div>

                <div>

                    <table class="tablaConBordes w100p">
                        <tbody>
                            <tr>
                                <td class="secction w50p center">

                                    <p>Acciones</p>
                                </td>
                                <td class="secction   w20p center">
                                    <p>Fecha</p>
                                </td>


                            </tr>
                        </tbody>
                    </table>

                </div>


                <div>
                    <table class="tablaRecomendaciones tablaConBordes w100p">
                        <tbody class="body-recomendaciones">


                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>

                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>


                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>

                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>


                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>

                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>


                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>


                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>

                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="acciones w100p" name="acciones"><br>
                                </td>

                                <td class="w20p center">
                                    <input type="date" name="fecha" class="fecha" >


                            </tr>
                        </tbody>
                    </table>


                </div>



                <!-- OBSERVADORES -->



                <div>

                    <table class="tablaConBordes w100p">
                        <tbody>
                            <tr>
                                <td class="secction w50p center">

                                    <p>Nombre de los Observadores</p>
                                </td>





                            </tr>
                        </tbody>
                    </table>

                </div>


                <div>
                    <table class="tablaObservadores tablaConBordes w100p">
                        <tbody id="body-observadores">

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="nombre w100p" name="nombre"><br>
                                </td>



                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="nombre w100p" name="nombre"><br>
                                </td>



                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="nombre w100p" name="nombre"><br>
                                </td>



                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="nombre w100p" name="nombre"><br>
                                </td>



                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="nombre w100p" name="nombre"><br>
                                </td>




                            </tr>

                            <tr>
                                <td class="w50p center">
                                    <input type="text" class="nombre w100p" name="nombre"><br>
                                </td>



                            </tr>

                        </tbody>
                    </table>


                </div>

                </div>



                <div class="box_format item_format_rigth">
                    <button type="submit" id="button_send_form">Enviar</button>
                </div>



            </form>
        </div>
    </div>

</div>

<div class="wrap_load">

</div>

<div class="wrap_sucess">

</div>


<script src="<?php echo constant('URL'); ?>public/js/opt_new.js?<?php echo constant('VERSION'); ?>"></script>
