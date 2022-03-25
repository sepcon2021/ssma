import { ajaxPost } from "../helpers/ajax.js";
import state from "../helpers/state_http.js";

export default function EvaluacionDescripcion() {
  return `
  
  <div id="competenciaDetalle_content_descripcion">
  <!--competenciaDetalle_content_descripcion => CCD -->
    <div id="CCD_content">

      <div id="CCD_content_updateTitle"></div>
      
      <form id="competenciaDetalle_content_descripcion_form"> 
      <input type="hidden" name="idGroup" id="idGroup">
        <div class="item_format"><label for="Nombre">Nombre</label></div>
        <div class="item_format"><input type="text" name="nombre" id="nombre" class="item_format_select"></div>

        <div class="item_format"><label for="Nombre">Descripción</label></div>
        <div class="item_format">
          <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="item_format_input item_format_textarea w40p"></textarea>
        </div>
        <div class="item_format"><label for="Nombre">Puesto evaluador</label></div>
        <div class="item_format">
          <input type="text" name="puestoEvaluado" id="puestoEvaluado" class="item_format_select">
        </div>

        <div class="item_format"><label for="Nombre">Puesto evaluado</label></div>


                <div class="item_format">
          <input type="text" name="puestoEvaluador" id="puestoEvaluador" class="item_format_select">
        </div>

        <div id="content_button" class="item_format_rigth">

        </div>
     </form>
    </div>

    <div id="CCD_load">
    
    </div>

  </div>
  `;
}

export function fillForm() {
  console.log("Prueba filll");
  const nombre =
      localStorage.getItem("nombre") != null
        ? localStorage.getItem("nombre")
        : "",
    descripcion =
      localStorage.getItem("descripcion") != null
        ? localStorage.getItem("descripcion")
        : "",
    puestoEvaluador =
      localStorage.getItem("puestoEvaluador") != null
        ? localStorage.getItem("puestoEvaluador")
        : "",
    puestoEvaluado =
      localStorage.getItem("puestoEvaluado") != null
        ? localStorage.getItem("puestoEvaluado")
        : "";

  document.getElementById("idGroup").value = localStorage.getItem("idGroup");
  document.getElementById("nombre").value = nombre;
  document.getElementById("descripcion").value = descripcion;
  document.getElementById("puestoEvaluador").value = puestoEvaluador;
  document.getElementById("puestoEvaluado").value = puestoEvaluado;
}

export function listenForm() {
  document
    .getElementById("competenciaDetalle_content_descripcion_form")
    .addEventListener("submit", (event) => {
      event.preventDefault();
      loadHtmlGeneral(true);
      hiddenHtmlForm(true);
      let formData = new FormData(event.target);
      ajaxPost({
        url: RUTA + "evaluacion/updateGroup",
        body: formData,
        cbSuccess: (data) => {
          hiddenHtmlForm(false);
          loadHtmlGeneral(false);

          document.getElementById("CCD_content_updateTitle").innerHTML =
            MessageHttp(data, formData);
        },
      });
    });

  document.getElementById("nombre").onchange = function () {
    addButtonHtml();
  };
  document.getElementById("descripcion").onchange = function () {
    addButtonHtml();
  };
  document.getElementById("puestoEvaluador").onchange = function () {
    addButtonHtml();
  };
  document.getElementById("puestoEvaluado").onchange = function () {
    addButtonHtml();
  };
}

function loadHtmlGeneral(stateData) {
  document.querySelector("#CCD_load").innerHTML = stateData
    ? `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`
    : ``;
}

function hiddenHtmlForm(stateData) {
  document.getElementById("CCD_content").hidden = stateData;
}

function addButtonHtml() {
  document.getElementById(
    "content_button"
  ).innerHTML = `<button  type="submit" id="competenciaDetalle_content_descripcion_form_button" class="button_send_form_general">Actualizar  <i class="fa-solid fa-arrow-right"></i></button>`;
}

function MessageHttp(posts, formData) {
  let html = ``;
  if (posts.status == state.HTTP_STATE_OK) {
    html = `<div class="success_message_descripcion"> <div>Actulización exitosa</div> </div>
       `;

    // Save data

    for (var key of formData.keys()) {
      console.log(key + " - " + formData.get(key));
      localStorage.setItem(key, formData.get(key));
    }

    document.getElementById("content_button").innerHTML = ``;
  } else if (posts.status == state.HTTP_STATE_FAIL) {
    html = `          <div> Error
        </div>`;
  }

  return html;
}
