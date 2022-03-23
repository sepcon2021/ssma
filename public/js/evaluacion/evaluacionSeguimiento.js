import { ajaxPost } from "../helpers/ajax.js";

const ETIQUETA_MAIN_CONTAINER = "competenciadetail_seguimiento_content";
export default function EvaluacionSeguimiento() {
  return `<div class="competenciadetail_seguimiento">

  <div id="competenciadetail_seguimiento_header">
  </div>
  <div id="competenciadetail_seguimiento_content">

  </div>

</div>`;
}

export function init() {
  loadHtml(ETIQUETA_MAIN_CONTAINER, true);

  let formData = new FormData();
  formData.append("idGroup", localStorage.getItem("idGroup"));

  ajaxPost({
    url: RUTA + "evaluacion/getListSeguimientoEvaluacion",
    body: formData,
    cbSuccess: (data) => {
      loadHtml(ETIQUETA_MAIN_CONTAINER, false);
      const listUsuario = data.result[0].success_message;
      if (listUsuario.length > 0) {
        drawHtmlUsuario(listUsuario);
      } else {
        emptyListHtml(ETIQUETA_MAIN_CONTAINER);
      }
    },
  });
}

function loadHtml(etiqueta, stateData) {
  document.getElementById(etiqueta).innerHTML = stateData
    ? `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`
    : ``;
}

function drawHtmlUsuario(listUsuario) {
  let html = ``;
  let index = 1;
  listUsuario.forEach((usuario) => {
    html += `
      <tr>
        <td>${index}</td>
        <td>${usuario.usuarioEvaluador}</td>
        <td>${usuario.usuarioEvaluado}</td>
        <td>${usuario.estado == 0 ? "Pendiente" : "Finalizado"}</td>
      </tr>
      `;

    index++;
  });

  document.getElementById("competenciadetail_seguimiento_content").innerHTML = `
    <div id="table_evaluador">
      <div id="comptencia_content_table">
        <table class="styled-table">
          <thead>
            <tr class="active-row">
              <th>Id</th>
              <th>Evaluador</th>
              <th>Evaluado</th>
              <th>Estado</th>
            </tr>
            <thead>
            <tbody id="table_seguimiento">
            ${html}
          <tbody>
        </table>
      </div>
    </div>
  `;
}

function emptyListHtml(etiqueta) {
  document.getElementById(
    etiqueta
  ).innerHTML = `<div class="competencia_content_load competencia_content_empty">

    <div>
    <div><i class="fa-solid fa-box-open fa-2x"></i></div>
    <br>
  <div>Evaluación vacía</div>
  <br><br>
  <div><button id="crearSeguimiento" class="button_send_form_upload">Crear seguimiento</button>
</div>
  </div>


</div>`;

  createSeguimiento();
}

function createSeguimiento() {
  document.getElementById("crearSeguimiento").onclick = function () {
    loadHtml(ETIQUETA_MAIN_CONTAINER, true);

    let formData = new FormData();
    formData.append("idGroup", localStorage.getItem("idGroup"));

    ajaxPost({
      url: RUTA + "evaluacion/createSeguimiento",
      body: formData,
      cbSuccess: (data) => {
        loadHtml(ETIQUETA_MAIN_CONTAINER, false);
        const listUsuario = data.result[0].success_message;
        if (listUsuario.length > 0) {
          drawHtmlUsuario(listUsuario);
        } else {
          emptyListHtml(ETIQUETA_MAIN_CONTAINER);
        }
      },
    });
  };
}
