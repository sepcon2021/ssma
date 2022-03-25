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
        <td>${usuario.id}</td>
        <td>${usuario.usuarioEvaluador}</td>
        <td>${usuario.usuarioEvaluado}</td>
        <td>${
          usuario.firmaEvaluador == ""
            ? "<div class='redEstado'>Pendiente</div>"
            : "<div class='greenEstado'>Finalizado</div>"
        }</td>
        <td>${
          usuario.firmaEvaluado == ""
            ? "<div class='redEstado'>Pendiente</div>"
            : "<div class='greenEstado'>Finalizado</div>"
        } </td>

        <td> <button class="botton_download" ><i class="fa-solid fa-download"></i></button></td>
      </tr>
      `;

    index++;
  });

  document.getElementById("competenciadetail_seguimiento_content").innerHTML = `

  <div class="div_aling_start item_format">
    <div class="item_format w40p">
        <input  class="w80p" type="search" name="keyWordValue" id="keyWordValue" class="w20p">
    <button id="buttonSearchProduct"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>

    <button id="competencia_detail_download" class="competencia_detail_button"><i class="fa-solid fa-arrow-down"></i> Reporte </button>
  </div>

  <br><br>

    <div id="table_evaluador">
      <div id="comptencia_content_table">
        <table class="styled-table">
          <thead>
            <tr class="active-row">
              <th>Id</th>
              <th>Evaluador</th>
              <th>Evaluado</th>
              <th>Estado evaluador</th>
              <th>Estado evaluado</th>
              <th>PDF</th>
            </tr>
            <thead>
            <tbody id="table_seguimiento">
            ${html}
          <tbody>
        </table>
      </div>
    </div>

    <div id="download_report"></div>
  `;

  downloadReport();
  pruebaBotton();
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

function downloadReport() {
  document.getElementById("competencia_detail_download").onclick = function (
    event
  ) {
    event.preventDefault();

    document.getElementById("table_evaluador").hidden = true;
    loadHtml("download_report", true);

    let formData = new FormData();
    formData.append("idGroup", localStorage.getItem("idGroup"));

    ajaxPost({
      url: RUTA + "evaluacion/downloadReporte",
      body: formData,
      cbSuccess: (data) => {
        const url = data.result[0].success_message;
        window.location.href = url;
        document.getElementById("table_evaluador").hidden = false;
        loadHtml("download_report", false);
      },
    });
  };
}

function pruebaBotton() {
  var myTable = document.getElementById("table_seguimiento");
  myTable.addEventListener(
    "click",
    function (e) {
      var button = e.target;
      var cell = button.parentNode;
      var row = cell.parentNode;
      var rowFirstCellText = row.querySelector("td").innerHTML;

      let formData = new FormData();
      formData.append("id", rowFirstCellText);

      document.getElementById("table_evaluador").hidden = true;
      loadHtml("download_report", true);

      ajaxPost({
        url: RUTA + "evaluacion/downloadPdfReport",
        body: formData,
        cbSuccess: (data) => {
          const url = data.result[0].success_message;
          //window.location.href = url;
          window.open(url, "_blank");
          document.getElementById("table_evaluador").hidden = false;
          loadHtml("download_report", false);
        },
      });
    },
    false
  );
}
