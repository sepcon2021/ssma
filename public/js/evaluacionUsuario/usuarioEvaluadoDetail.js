import { ajaxPost } from "../helpers/ajax.js";
import { initUsuarioEvaluado } from "./evaluacionEvaluado.js";

export default function UsuarioEvaluadoDetail(idGrupo, nombre, cargo) {
  const data = JSON.parse(sessionStorage.getItem("dataTrabajador")),
    dni = data.result[0].dni;

  return `<div id="usuarioDetail" class="container_documento scroll1">

  <div id="usuarioDetail_header">
  </div>

  <div id="usuarioDetail_content">
    <div id="usuarioDetail_content_header">

    </div>

    <div id="usuarioDetail_content_body_usuario">
      <div class="item_format">Nombre y apellidos : ${nombre}</div>
      <div class="item_format">Cargo : ${cargo}</div>
    </div>

    <form id="form_evaluador">
      <div id="usuarioDetail_content_body_form">
        <input type="hidden" name="idCompetenciaEvaluacion" id="idCompetenciaEvaluacion" value="${idGrupo}">
                <input type="hidden" name="dniEvaluador" id="dniEvaluador" value="${dni}">

        <div class="wrap_document_format">
          <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
              <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
              <p>EVALUACIÓN DE COMPETENCIAS SSMA</p>
            </div>

            <div class="wrap_document_format_head_code">
              <p>PSPC-110-X-FR-0XX</p>
              <p>Revisión: 0</p>
              <p>Emisión: XX/03/2022</p>
              <p>Pagina: 1 de 1</p>
            </div>

          </div>

          <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
            </div>

            <div class="wrap_document_format_head_title">
            </div>

            <div class="wrap_document_format_head_code">
              <table>
                <tbody>
                  <tr>
                    <td>Excelente</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>Bueno</td>
                    <td>2</td>
                  </tr>

                  <tr>
                    <td>Deficiente</td>
                    <td>1</td>
                  </tr>


                  <tr>
                    <td>No cumple</td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>

          <div class="wrap_document_format_body">
            <form class="general_form" action="" id="formDigital">

              <input type="hidden" id="nombres" name="nombres">
              <input type="hidden" id="internal" name="internal">




              <div class="box_format">
                <!--TITLE ELEMENT-->

                <!--CONTENT ELEMENT-->
                <div class="item_format">
                  <table class="w100p">

                    <thead>

                      <tr>
                        <th colspan="2">Aspecto a evaluar</th>
                        <th>Peso</th>
                        <th>Calificación</th>
                      </tr>
                    </thead>



                    <tbody>
                      <tr>
                        <td rowspan="6" class="w20p">
                          <h2>Nivel de compromiso</h2>
                        </td>
                        <td class="w50p">Finaliza oportunamente las tareas asignadas, sin necesidad de reprocesos.</td>
                        <td class="w10p">20%</td>
                        <td class="w20p"> <select id="compromiso_1" name="compromiso_1">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>

                          </select></td>
                      </tr>
                      <tr>
                        <td>Se autodirige, es decir, no es necesario recordarle continuamente lo que se debe hacer.</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="compromiso_2" name="compromiso_2">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Realiza recomendaciones apropiadas o acertadas.</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="compromiso_3" name="compromiso_3">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Pone su conocimiento y experiencia de format total al servicio de la empresa.</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="compromiso_4" name="compromiso_4">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>
                      <tr>
                        <td>Se enfoca en solucionar los problemas en lugar de buscar culpables..</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="compromiso_5" name="compromiso_5">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Desempeño promedio</td>
                        <td>100%</td>
                        <td><input type="number" readonly="readonly" id="compromiso_total" name="compromiso_total"
                            class="evaluacion_puntaje w30p"></td>
                      </tr>
                    </tbody>

                  </table>
                </div>
                <!-- ERRROR ELEMENT -->
                <div class="item_format">
                  <p class="error_message" id="tipo_inspeccion_error"></p>
                </div>
              </div>


              <div class="box_format">
                <!--TITLE ELEMENT-->

                <!--CONTENT ELEMENT-->
                <div class="item_format">
                  <table class="w100p">

                    <thead>

                      <tr>
                        <th colspan="2">Aspecto a evaluar</th>
                        <th>Peso</th>
                        <th>Calificación</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td rowspan="6" class="w20p">
                          <h2>DESEMPEÑO DE SEGURIDAD</h2>
                        </td>
                        <td class="w50p">Cumple los procedimientos y usa los formatos que corresponden a la empresa</td>
                        <td class="w10p">20%</td>
                        <td class="w20p">
                          <select id="seguridad_1" name="seguridad_1">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>

                        </td>
                      </tr>
                      <tr>
                        <td>Demuestra su liderazgo visible en seguridad.</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="seguridad_2" name="seguridad_2">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Realiza adecuadamente la clasificación de residuos y vela porque los demás también lo hagan
                        </td>
                        <td>20%</td>
                        <td class="w20p"> <select id="seguridad_3" name="seguridad_3">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Implementa o fomenta prácticas de trabajo seguro en su area de trabajo</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="seguridad_4" name="seguridad_4">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>
                      <tr>
                        <td>Realiza observaciones de comportamientos riesgosos e informa oportunamente a la empresa
                          acerca
                          de
                          los peligros y riesgos latentes en su lugar de trabajo</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="seguridad_5" name="seguridad_5">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Desempeño promedio</td>
                        <td>100%</td>
                        <td><input type="number" readonly="readonly" id="seguridad_total" name="seguridad_total"
                            class="evaluacion_puntaje w30p"></td>

                      </tr>
                    </tbody>

                  </table>
                </div>
                <!-- ERRROR ELEMENT -->
                <div class="item_format">
                  <p class="error_message" id="tipo_inspeccion_error"></p>
                </div>
              </div>

              <div class="box_format">
                <!--TITLE ELEMENT-->

                <!--CONTENT ELEMENT-->
                <div class="item_format">
                  <table class="w100p">

                    <thead>

                      <tr>
                        <th colspan="2">Aspecto a evaluar</th>
                        <th>Peso</th>
                        <th>Calificación</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td rowspan="6" class="w20p">
                          <h2>TOLERANCIA AL ESTRÉS</h2>
                        </td>
                        <td class="w50p">Se comunica de forma adecuada con todos sus compañeros.</td>
                        <td class="w10p">20%</td>
                        <td class="w20p">
                          <select id="estres_1" name="estres_1">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Fomenta y practica el respeto hacia todos los trabajadores de la empresa.</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="estres_2" name="estres_2">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Capacidad para interceder en los conflictos que existen dentro de su equipo de trabajo</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="estres_3" name="estres_3">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Sabe trabajar en equipo, integrándose y participando positivamente para alcanzar los
                          objetivos
                          y
                          metas comunes</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="estres_4" name="estres_4">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>
                      <tr>
                        <td>Capacidad de desempeñarse eficientemente en situaciones estresantes y poder sobrellevar las
                          complicaciones</td>
                        <td>20%</td>
                        <td class="w20p"> <select id="estres_5" name="estres_5">
                            <option value="" disabled="" selected="" hidden=""> Puntaje </option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td>Desempeño promedio</td>
                        <td>100%</td>
                        <td><input type="number" readonly="readonly" id="estres_total" name="estres_total"
                            class=" evaluacion_puntaje w30p"></td>
                      </tr>
                    </tbody>

                  </table>
                </div>
                <!-- ERRROR ELEMENT -->
                <div class="item_format">
                  <p class="error_message" id="tipo_inspeccion_error"></p>
                </div>
              </div>



              <div class="box_format">

                <!--TITLE ELEMENT-->

                <div class="item_format">
                  <label for="">Oportunidades de mejora</label>
                </div>

                <!--CONTENT ELEMENT-->

                <div class="item_format">
                  <textarea class="item_format_input item_format_textarea" name="oportunidadMejora" id="oportunidadMejora" cols="30"
                    rows="10"></textarea>
                </div>

                <!-- ERRROR ELEMENT -->
                <div class="item_format">
                  <p class="error_message" id="descripcion_error"></p>
                </div>

              </div>


              <div class="box_format">
                <div class="item_format">
                  <br>
                  <h4>Firma del trabajador</h4>
                  <br>
                </div>
                <div class="item_format">
                  <div>
                    <canvas class="firmaBordes" id="firma" width="240" height="300"></canvas>
                    <span id="firmado" class="oculto"></span>
                  </div>
                </div>
                <div class="item_format">
                  <p id="firmaMessage"></p>

                </div>
                <div class="item_format">
                  <button type="button" class="button-blue" id="draw-clearBtn">Borrar firma </button>
                </div>
              </div>


              <div class="box_format item_format_rigth">
                <button type="submit" id="button_send_form_evaluador">Enviar</button>
              </div>



            </form>
          </div>
        </div>

      </div>
    </form>

  </div>
</div>`;
}

export function initUsuarioEvaluadoDetail() {
  let listCompromiso = [0, 0, 0, 0, 0];
  let listSeguridad = [0, 0, 0, 0, 0];
  let listEstres = [0, 0, 0, 0, 0];

  let listCompromisoEtiqueta = [1, 2, 3, 4, 5];

  listCompromisoEtiqueta.forEach((data) => {
    document.getElementById(`compromiso_${data}`).onchange = function (event) {
      listCompromiso[data - 1] = document.getElementById(
        `compromiso_${data}`
      ).value;
      document.getElementById("compromiso_total").value =
        calculateAverage(listCompromiso).toFixed(2);
    };
  });

  listCompromisoEtiqueta.forEach((data) => {
    document.getElementById(`seguridad_${data}`).onchange = function (event) {
      listSeguridad[data - 1] = document.getElementById(
        `seguridad_${data}`
      ).value;
      document.getElementById("seguridad_total").value =
        calculateAverage(listSeguridad).toFixed(2);
    };
  });

  listCompromisoEtiqueta.forEach((data) => {
    document.getElementById(`estres_${data}`).onchange = function (event) {
      listEstres[data - 1] = document.getElementById(`estres_${data}`).value;
      document.getElementById("estres_total").value =
        calculateAverage(listEstres).toFixed(2);
    };
  });
}

function calculateAverage(list) {
  const suma = funcSuma(list);
  console.log(suma);
  const result = (suma * 20) / 15;
  return result;
}

function funcSuma(list) {
  let sum = 0;
  list.forEach((data) => {
    sum += parseInt(data);
  });
  return sum;
}

export function sendFormEvaluado() {
  document
    .getElementById("form_evaluador")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      var firmaTrabajador = document.getElementById("firma");

      const formDataImg = new FormData();
      formDataImg.append("img", firmaTrabajador.toDataURL());

      const formData = new FormData(event.target);

      loadHtml("usuarioDetail", true);

      ajaxPost({
        url: RUTA + "public/inc/uploadFirmaEvaluacion.php",
        body: formDataImg,
        cbSuccess: (data) => {
          console.log(data.url);

          formData.append("firmaEvaluador", data.url);

          ajaxPost({
            url: RUTA + "evaluacion/updateEvaluador",
            body: formData,
            cbSuccess: (dataJson) => {
              console.log(dataJson);
              usuarioEvaluadorHtml();
            },
          });
        },
      });
    });
}

function loadHtml(etiqueta, stateData) {
  document.getElementById(etiqueta).innerHTML = stateData
    ? `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`
    : ``;
}

function usuarioEvaluadorHtml() {
  document.querySelector(".mainpage").innerHTML = `

<div id="competenciaDetalle"  class="container_documento scroll1">

  <div id="compteneciaDetalle_title" class="item_format">
    <p class="subTitle">Bienvenido</p>
  </div>

  <br><br>
  <div id="competenciaDetalle_tabs">
    <div class="sidebarCompetencia">

      <div class="sidebarCompetencia__menu sidebarCompetencia_position">

        <div class="active">Evaluador</div>
        <div>Evaluado</div>
        <div>Historial</div>
      </div>

    </div>
  </div>

  <div id="competenciaDetalle_content">



  </div>

</div>
`;

  // We need init a default html content
  document.getElementById("competenciaDetalle_content").innerHTML =
    UsuarioEvaluador();
  initUsuarioEvaluado();
}
