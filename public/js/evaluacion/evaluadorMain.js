import { ajax, ajaxNormal, ajaxPost } from "../helpers/ajax.js";
import EvaluacionEvento, {
  createEvento,
  eventTableGeneralEvento,
  initEvaluacionEvento,
} from "./evaluacionEvento.js";

export default function EvaluadorMain() {
  return `
    <div class="competencia container_documento scroll1">

  <div id="competencia_header" >
    <div id="competencia_header_title" class="item_format"> <h3 class="title_content">Administrador de evaluación por competencias</h3></div>
  </div>

  <div id="competencia_content">

  </div>

</div>
  `;
}

export function initMainEvento() {
  document.getElementById(
    "competencia_content"
  ).innerHTML = `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`;

  ajax({
    url: RUTA + "proyecto/getListSede",
    cbSuccess: (posts) => {
      let html = ``;
      let content = ``;
      const listGroup = posts.result[0].success_message;
      if (listGroup.length > 0) {
        listGroup.forEach((element) => {
          html += `
          <option value="${element.id}">${element.nombre}</option>
          `;
        });

        content = createTableHtml(html);
      } else {
        content = emptyTable();
      }

      document.getElementById("competencia_content").innerHTML = content;
      openViewEvento();
    },
  });
}

function createTableHtml(html) {
  return `             <div id="comptencia_content_table" >
                <div class="item_format"><h3>Proyecto / Sede</h3></div>
                <div class="item_format">
                  <select class="item_format_select" name="proyecto" id="proyecto">
                  ${html}
                  </select> 
                </div>

                <div class="item_format_rigth"> <button class="button_send_form_estandar" id="button_buscar">Buscar</button> </div>
              </div>`;
}

function emptyTable() {
  return `
  <div class="competencia_content_empty">
  <div>
    <div><i class="fa-solid fa-box-open fa-2x"></i></div>
  <div>No existen proyectos disponibles</div>
  </div>
</div>
  
  `;
}

function openViewEvento() {
  document.getElementById("button_buscar").onclick = function () {
    let nombreProyecto =
      document.getElementById("proyecto").options[
        document.getElementById("proyecto").selectedIndex
      ].text;

    let idProyecto = document.getElementById("proyecto").value;
    localStorage.setItem("idProyecto", idProyecto);
    localStorage.setItem("nombreProyecto", nombreProyecto);

    document.querySelector(".mainpage").innerHTML = EvaluacionEvento();
    initEvaluacionEvento();
    createEvento();
    eventTableGeneralEvento();
  };
}
