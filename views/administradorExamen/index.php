<div class="wrap_document scroll1">

    <div class="wrap_document_detail">
        <div class="item_format">
            <h3 >Capacitaciones</h3>
        </div>
        <div class="item_format">
            <a class="home_document" href="#">Inicio</a> <a href="#">/ Formulario</a>
        </div>
    </div>


    <div class="wrap_document_format">
        <div>

            <div class="item_format">
                <h3 class="titulo" id="nombreAreaEmpresa"></h3>
            </div>
            <div class="item_format">
                <h3 class="titulo" id="nombreProyecto"></h3>
            </div>
            <div class="item_format">

                <form method="POST" id="formCrearCapacitacion" class="w100p item_format">
                    <input type="hidden" name="codigoproyecto" id="codigoproyecto">
                    <input type="hidden" name="idareaempresa" id="idareaempresa">
                    <select class="item_format_select" name="idTipo" id="idTipo">
                        <option value="2"> Orientación(Inducción Inicial)</option>
                        <option value="3"> Charlas diarias</option>
                        <option value="4"> Capacitación Interna</option>
                        <option value="5"> Capacitación Externa</option>
                        <option value="6"> Entrenamiento</option>
                        <option value="7"> Simulacro</option>
                        <option value="8"> Otros</option>
                    </select>
                    <button type="submit" class="find_dni" id="botonEnviar">Crear</button>
                </form>
            </div>
            <br><br>
        </div>

        <table class="styled-table">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Nombre</td>
                    <td>Fecha</td>
                </tr>
            </thead>
            <tbody id="listaExamen">
            </tbody>
        </table>
    </div>



</div>

<script src="<?php echo constant('URL'); ?>public/js/administradorExamen.js?<?php echo constant('VERSION'); ?>"></script>