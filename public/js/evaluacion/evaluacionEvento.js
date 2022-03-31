import evaluacionAdminDetail from "../evaluacion/evaluacionAdminDetail.js";

import { ajax, ajaxNormal, ajaxPost } from "../helpers/ajax.js";
import EvaluacionAdmin, {
  createGroup,
  initEvaluacionAdmin,
} from "./evaluacionAdmin.js";
import EvaluadorMain, { initMainEvento } from "./evaluadorMain.js";

export default function EvaluacionEvento() {
  return `
  <div class="competencia container_documento scroll1">

    <div id="competencia_header" >
        <div id="competencia_header_title" class="item_format">
          <a id="back_evaluacion_general" href="#"> <i class="fa-solid fa-angle-left back-kardex fa-xl"></i> </a>
          <h3 class="title_content">Eventos</h3>
        </div>
        <div id="competencia_header_add" class="item_format_rigth">
          <button id="competencia_header_add_button" class="button_send_form_upload"> <i class="fa-solid fa-plus"></i>Crear</button>
        </div>
    </div>

    <div class="item_format">Administrador/ ${localStorage.getItem(
      "nombreProyecto"
    )}</div>

    <div id="competencia_content">
    </div>

  </div>



  
  <!-- MODAL -->
  <div id="myModal" class="modal">
    <!-- MODAL CONTENT -->
    <div class="modal-content-inventario">
      <div class="div-align-start item_format">
        <i class="fa-solid fa-angle-left  close"></i>
        <h3 class="subtitle_content">Crear evento</h3>
      </div>

      <div id="modalContentRegister">
          <div class="item_format"><label> Nombre</label></div>
          <div class="item_format"><input type="text" name="nombre_evento" id="nombre_evento" class="w80p"></div>
          <br><br><br><br><br><br><br><br>
          <div class="item_format_rigth"><button id="button_add_evento" class="button_send_form_upload">Agregar</button></div>
          
      </div>

      <div id="modalContentLoad" class="modalContent"></div>
      <div id="modalContentMessage" class="modalContent"> </div>

    </div>
  </div>
</div>


  `;
}

export function initEvaluacionEvento() {
  document.getElementById(
    "competencia_content"
  ).innerHTML = `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`;

  let formData = new FormData();
  formData.append("idProyecto", localStorage.getItem("idProyecto"));

  ajaxPost({
    url: RUTA + "evaluacion/getListEvento",
    body: formData,
    cbSuccess: (posts) => {
      let html = ``;
      let content = ``;
      const listGroup = posts.result[0].success_message;
      if (listGroup.length > 0) {
        listGroup.forEach((element) => {
          html += `
        <tr>
                  <td>${element.id}</td>
          <td>${element.nombre}</td>
          <td>${element.registro}</td>
        </tr>
          `;
        });

        content = createTableHtml(html);

        document.getElementById("competencia_content").innerHTML = content;
        listenGroup();
      } else {
        content = emptyTable();
        document.getElementById("competencia_content").innerHTML = content;
      }

      backEvaluacionGeneral();
    },
  });
}

function createTableHtml(html) {
  return `             <div id="comptencia_content_table" >
                <table class="styled-table">
                  <thead>
                    <tr class="active-row">
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>fecha</th>
                    </tr>
                    <thead>
                    <tbody id="competencia_content_table_rows">
                    ${html}
                  <tbody>
                </table>
              </div>`;
}

function emptyTable() {
  return `
  <div class="competencia_content_empty">
  <div>
    <div><i class="fa-solid fa-box-open fa-2x"></i></div>
  <div>Evaluación vacía</div>
  </div>
</div>
  
  `;
}

export function createEvento() {
  document.getElementById("button_add_evento").onclick = function () {
    //loadHtmlGeneral(".mainpage", true);

    hiddenHtmlForm(true);
    loadHtmlGeneralEvento(true);

    let titleEvento = document.getElementById("nombre_evento").value;

    localStorage.setItem("nombreEventoTemp", titleEvento);

    const data = JSON.parse(sessionStorage.getItem("dataTrabajador")),
      dni = data.result[0].dni;

    var formData = new FormData();
    formData.append("idUsuario", dni);
    formData.append("nombre", titleEvento);
    formData.append("carpeta", "");
    formData.append("idProyecto", localStorage.getItem("idProyecto"));

    ajaxPost({
      url: RUTA + "evaluacion/createEvento",
      body: formData,
      cbSuccess: (data) => {
        console.log(data);
        const idEvento = data.result[0].success_message;

        localStorage.setItem("idEvento", idEvento);
        localStorage.setItem("nombre", "");

        document.querySelector(".mainpage").innerHTML = EvaluacionAdmin();
        initEvaluacionAdmin();
        createGroup();
      },
    });
  };
}

function loadHtmlGeneral(etiqueta, status) {
  document.querySelector(etiqueta).innerHTML = status
    ? `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`
    : ``;
}

function listenGroup() {
  document
    .querySelector("#competencia_content_table_rows")
    .addEventListener("click", (event) => {
      event.preventDefault();
      let dataTr = event.target.parentNode;
      localStorage.setItem(
        "idEvento",
        dataTr.querySelectorAll("td")[0].innerText
      );
      localStorage.setItem(
        "nombreEvento",
        dataTr.querySelectorAll("td")[1].innerText
      );
      localStorage.setItem(
        "fechaEvento",
        dataTr.querySelectorAll("td")[2].innerText
      );

      localStorage.setItem(
        "nombreEventoTemp",
        dataTr.querySelectorAll("td")[1].innerText
      );

      document.querySelector(".mainpage").innerHTML = EvaluacionAdmin();
      initEvaluacionAdmin();
      createGroup();
    });
}

function backEvaluacionGeneral() {
  console.log("Prueba");
  document.getElementById("back_evaluacion_general").onclick = function () {
    document.querySelector(".mainpage").innerHTML = EvaluadorMain();
    initMainEvento();
  };
}

export function eventTableGeneralEvento() {
  var modal = document.getElementById("myModal");

  document
    .querySelector("#competencia_header_add_button")
    .addEventListener("click", (event) => {
      console.log("event");
      modal.style.display = "block";
    });

  document.getElementsByClassName("close")[0].onclick = function () {
    modal.style.display = "none";
  };

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}

function loadHtmlGeneralEvento(stateData) {
  document.getElementById("modalContentLoad").innerHTML = stateData
    ? `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`
    : ``;
}

function hiddenHtmlForm(stateData) {
  document.getElementById("modalContentRegister").hidden = stateData;
}
