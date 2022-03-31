import { ajaxPost } from "../helpers/ajax.js";
import { isCanvasBlank } from "../validate/validate.js";
import { initUsuarioEvaluado } from "./evaluacionEvaluado.js";
import EvaluacionUsuario, {
  initEvaluacionUsuario,
} from "./evaluacionUsuario.js";

export default function UsuarioEvaluadoDetail(dataform) {
  console.log(dataform);
  const { nombre } = dataform;
  console.log(dataform);
  const data = JSON.parse(sessionStorage.getItem("dataTrabajador")),
    dni = data.result[0].dni,
    nombreEvaluado = data.result[0].nombres + " " + data.result[0].apellidos,
    cargo = data.result[0].dcargo;

  const listCompromiso = [
    dataform["compromiso1"],
    dataform["compromiso2"],
    dataform["compromiso3"],
    dataform["compromiso4"],
    dataform["compromiso5"],
  ];

  const listEstres = [
    dataform["estres1"],
    dataform["estres2"],
    dataform["estres3"],
    dataform["estres4"],
    dataform["estres5"],
  ];

  const listSeguridad = [
    dataform["seguridad1"],
    dataform["seguridad2"],
    dataform["seguridad3"],
    dataform["seguridad4"],
    dataform["seguridad5"],
  ];

  const averageCompromiso = calculateAverage(listCompromiso).toFixed(2),
    averageSeguridad = calculateAverage(listSeguridad).toFixed(2),
    averageEstres = calculateAverage(listEstres).toFixed(2);

  return `<div id="usuarioDetail" class="container_documento scroll1">

  <div id="usuarioDetail_header">
  </div>

  <div id="usuarioDetail_content">
    <div id="usuarioDetail_content_header" class="item_format">

      <a href="#/dashboard/kardex"> <i class="fa-solid fa-angle-left back-kardex fa-xl"></i> </a>
      <h3 class="title_content">Evaluación</h3>

    </div>
    <div class="item_format">Evaluado / Evaluación</div>

    <br><br>


    <form id="form_evaluador">
      <div id="usuarioDetail_content_body_form">
        <input type="hidden" name="idCompetenciaEvaluacion" id="idCompetenciaEvaluacion" value="${
          dataform.id
        }">
        <input type="hidden" name="dniEvaluado" id="dniEvaluado" value="${dni}">

        <div class="wrap_document_format">
          <div class="wrap_document_format_head">

            <div class="wrap_document_format_head_icon">
              <img class="enterprise_logo" src="public/img/logo.png" alt="">
            </div>

            <div class="wrap_document_format_head_title">
              <p>EVALUACIÓN DE COMPETENCIAS SSMA</p>
            </div>

            <div class="wrap_document_format_head_code">
              <p>PSPC-100-X-PR-010-FR-001</p>
              <p>Revisión: 0</p>
              <p>Emisión: 09/03/2022</p>
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


          
          <div class="wrap_document_format_head">
            <div class="w50p item_format">Nombres y apellidos :${nombreEvaluado} </div>
            <div class="w30p item_format">Cargo : ${cargo}</div>
            <div class="w20p">DNI : ${dni}</div>
          </div>



          <div class="wrap_document_format_body">
            <form class="general_form" action="" id="formDigital">

              <input type="hidden" id="nombres" name="nombres">
              <input type="hidden" id="internal" name="internal">




              <div>
                <!--TITLE ELEMENT-->

                <!--CONTENT ELEMENT-->
                <div>
                  <table class="table_form_evaluacion w100p">

                    <thead>

                      <tr>
                        <th colspan="2" class="aspecto_evaluar">Aspecto a evaluar</th>
                        <th class="aspecto_evaluar">Peso</th>
                        <th class="aspecto_evaluar">Calificación</th>
                      </tr>
                    </thead>



                    <tbody>
                      <tr>
                        <td rowspan="6" class="w20p">
                          <h3 class="w80p">NIVEL DE COMPROMISO</h3>
                        </td>
                        <td class="item_align_form">Finaliza oportunamente las tareas asignadas, sin necesidad de
                          reprocesos.</td>
                        <td class="w10p">20%</td>
                        <td class="w20p"> ${dataform["compromiso1"]}</td>
                      </tr>
                      <tr>
                        <td class="item_align_form">Se autodirige, es decir, no es necesario recordarle continuamente lo
                          que se debe hacer.</td>
                        <td>20%</td>
                        <td class="w20p"> ${dataform["compromiso2"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form">Realiza recomendaciones apropiadas o acertadas.</td>
                        <td>20%</td>
                        <td class="w20p"> ${dataform["compromiso3"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form">Pone su conocimiento y experiencia de format total al servicio de la
                          empresa.</td>
                        <td>20%</td>
                        <td class="w20p"> ${dataform["compromiso4"]}</td>
                      </tr>
                      <tr>
                        <td class="item_align_form">Se enfoca en solucionar los problemas en lugar de buscar culpables.
                        </td>
                        <td>20%</td>
                        <td class="w20p"> ${dataform["compromiso5"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form desempeño_promedio">Desempeño promedio</td>
                        <td class="desempeño_promedio">100%</td>
                        <td><input value="${averageCompromiso.trim()}" type="number" readonly="readonly"
                            id="compromiso_total" name="compromiso_total" class="evaluacion_puntaje w30p"></td>
                      </tr>
                    </tbody>

                  </table>
                </div>
                <!-- ERRROR ELEMENT -->

              </div>


              <div>
                <!--TITLE ELEMENT-->

                <!--CONTENT ELEMENT-->
                <div>
                  <table class="table_form_evaluacion w100p">

                    <thead>

                      <tr>
                        <th colspan="2" class="aspecto_evaluar">Aspecto a evaluar</th>
                        <th class="aspecto_evaluar">Peso</th>
                        <th class="aspecto_evaluar">Calificación</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td rowspan="6" class="w20p">
                          <h3 class="w80p">DESEMPEÑO DE SEGURIDAD</h3>
                        </td>
                        <td class="item_align_form">Cumple los procedimientos y usa los formatos que corresponden a la
                          empresa</td>
                        <td class="w10p">20%</td>
                        <td class="w20p">
                          ${dataform["seguridad1"]}

                        </td>
                      </tr>
                      <tr>
                        <td class="item_align_form">Demuestra su liderazgo visible en seguridad.</td>
                        <td>20%</td>
                        <td class="w20p">${dataform["seguridad2"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form">Realiza adecuadamente la clasificación de residuos y vela porque los
                          demás también lo hagan</td>
                        <td>20%</td>
                        <td class="w20p"> ${dataform["seguridad3"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form">Implementa o fomenta prácticas de trabajo seguro en su area de
                          trabajo</td>
                        <td>20%</td>
                        <td class="w20p"> ${dataform["seguridad4"]}</td>
                      </tr>
                      <tr>
                        <td class="item_align_form">Realiza observaciones de comportamientos riesgosos e informa
                          oportunamente a la empresa
                          acerca de los peligros y riesgos latentes en su lugar de trabajo</td>
                        <td>20%</td>
                        <td class="w20p">${dataform["seguridad5"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form desempeño_promedio">Desempeño promedio</td>
                        <td class="desempeño_promedio">100%</td>
                        <td><input value="${averageSeguridad}" type="number" readonly="readonly" id="seguridad_total"
                            name="seguridad_total" class="evaluacion_puntaje w30p"></td>

                      </tr>
                    </tbody>

                  </table>
                </div>
                <!-- ERRROR ELEMENT -->

              </div>

              <div>
                <!--TITLE ELEMENT-->

                <!--CONTENT ELEMENT-->
                <div>
                  <table class="table_form_evaluacion w100p">

                    <thead>

                      <tr>
                        <th colspan="2" class="aspecto_evaluar">Aspecto a evaluar</th>
                        <th class="aspecto_evaluar">Peso</th>
                        <th class="aspecto_evaluar">Calificación</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td rowspan="6" class="w20p">
                          <h3 class="w80p">TOLERANCIA AL ESTRÉS</h3>
                        </td>
                        <td class="item_align_form">Se comunica de forma adecuada con todos sus compañeros.</td>
                        <td class="w10p">20%</td>
                        <td class="w20p">
                          ${dataform["estres1"]}
                        </td>
                      </tr>
                      <tr>
                        <td class="item_align_form">Fomenta y practica el respeto hacia todos los trabajadores de la
                          empresa.</td>
                        <td>20%</td>
                        <td class="w20p"> ${dataform["estres2"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form">Capacidad para interceder en los conflictos que existen dentro de su
                          equipo de trabajo</td>
                        <td>20%</td>
                        <td class="w20p">${dataform["estres3"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form">Sabe trabajar en equipo, integrándose y participando positivamente
                          para alcanzar los
                          objetivos
                          y
                          metas comunes</td>
                        <td>20%</td>
                        <td class="w20p">${dataform["estres4"]}</td>
                      </tr>
                      <tr>
                        <td class="item_align_form">Capacidad de desempeñarse eficientemente en situaciones estresantes
                          y poder sobrellevar las
                          complicaciones</td>
                        <td>20%</td>
                        <td class="w20p">${dataform["estres5"]}</td>
                      </tr>

                      <tr>
                        <td class="item_align_form desempeño_promedio">Desempeño promedio</td>
                        <td class="desempeño_promedio">100%</td>
                        <td><input value="${averageEstres}" type=" number" readonly="readonly" id="estres_total"
                            name="estres_total" class=" evaluacion_puntaje w30p"></td>
                      </tr>
                    </tbody>

                  </table>
                </div>
                <!-- ERRROR ELEMENT -->

              </div>



              <div class="box_format">

                <!--TITLE ELEMENT-->

                <div class="item_format">
                  <label for="">
                    <h4>Oportunidades de mejora</h4>
                  </label>
                </div>

                <!--CONTENT ELEMENT-->

                <div class="item_format">
                  <textarea class="item_format_input item_format_textarea" name="oportunidadMejora"
                    id="oportunidadMejora" cols="30" rows="10" readonly>${
                      dataform.oportunidadMejora
                    }</textarea>
                </div>



              </div>





              <div class="align_items_space">

                <div>
                  <div class="border_firma"><img src="firmas/${
                    dataform.firmaEvaluador
                  }"></div>
                  <div> Firma del evaluador</div>
                  <div>${dataform["usuarioEvaluado"]}</div>
                                    <div>${dataform["dni"]}</div>
                  <div>${dataform["descripcionCargo"]}</div>

                </div>

                <div class="box_format">
                  <div class="item_format">
                    <br>
                    <h4>Firma</h4>
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
              </div>


              <div class="box_format">

                <!--TITLE ELEMENT-->

                <div class="item_format">
                  <label for="">
                    <h4>Importante :</h4>
                  </label>
                </div>

                <!--CONTENT ELEMENT-->

                <div class="item_format">
                  <h4>AL FIRMAR ESTA FICHA, USTED ES RESPONSABLE DE LA EVALUACIONES Y CON ELLO A SU CONTENIDO, EL CUAL
                    SERÁ
                    USADO POR LA DIRECCIÓN DEL PROYECTO PARA LOS FINES QUE CONSIDERE CONVENIENTE</h4>
                </div>



              </div>


              <div class="box_format item_format_rigth">
                <button type="submit" id="button_send_form_evaluador" class="button_send_form_general">Enviar</button>
              </div>



          </div>






    </form>
  </div>
</div>

</div>
</form>

</div>
</div>`;
}

export function initUsuarioEvaluadoDetail() {}

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

      const dataformImg = new FormData();
      dataformImg.append("img", firmaTrabajador.toDataURL());

      const dataform = new FormData(event.target);

      if (!isCanvasBlank()) {
        loadHtml("usuarioDetail", true);

        ajaxPost({
          url: RUTA + "public/inc/uploadFirmaEvaluacion.php",
          body: dataformImg,
          cbSuccess: (data) => {
            console.log(data.url);

            dataform.append("firmaEvaluado", data.url);
            dataform.append("estado", 2);

            ajaxPost({
              url: RUTA + "evaluacion/updateEvaluado",
              body: dataform,
              cbSuccess: (dataJson) => {
                console.log(dataJson);
                usuarioEvaluadorHtml();
              },
            });
          },
        });
      } else {
        alert("Es necesario ingresar firma");
      }
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
  document.querySelector(".mainpage").innerHTML = EvaluacionUsuario();
  initEvaluacionUsuario();
}
