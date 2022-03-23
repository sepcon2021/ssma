import { ajaxPost } from "../helpers/ajax.js";
import state from "../helpers/state_http.js";

export default function EvaluacionCargaUsuario() {
  return `
<div class="competenciadetail_cargausuario">

  <div id="competenciadetail_cargausuario_header" class="item_format_rigth">
    <button type="submit" id="button_cargarusuario" class="competencia_detail_button">Cargar usuarios</button>
    <button type="submit" id="button_downloadformat" class="competencia_detail_button">Descargar formato</button>
  </div>


  <div id="competenciadetail_cargausuario_content">

    <div id="table_evaluador">
      <div id="comptencia_content_table">
        <table class="styled-table">
          <thead>
            <tr class="active-row">
              <th>Id</th>
              <th>Nombre</th>
              <th>Cargo</th>
              <th>DNI</th>
            </tr>
            <thead>
            <tbody id="table_evaluador_data">

          <tbody>
        </table>
      </div>
    </div>
    <br><br>
      <h2> Evaluados</h2>
    
    <div id="table_evaluado">

      <div id="comptencia_content_table">
        <table class="styled-table">
          <thead>
            <tr class="active-row">
              <th>Id</th>
              <th>Nombre</th>
              <th>Cargo</th>
              <th>DNI</th>
            </tr>
            <thead>
            <tbody id="table_evaluado_data">

          <tbody>
        </table>
      </div>

    </div>

  </div>


  <!-- MODAL -->
  <div id="myModal" class="modal">
    <!-- MODAL CONTENT -->
    <div class="modal-content-inventario">
      <div class="div-align-start item_format">
        <i class="fa-solid fa-angle-left  close"></i>
        <p class="subTitle"><h3>Archivo</h3></p>
      </div>

      <div id="modalContentRegister">
        <form action="" id="modalContentRegisterForm">
          <!--CONTENT ELEMENT-->
          <input type="hidden" name="idGroup" 
          value="${localStorage.getItem("idGroup")}">
          <div class="item_format">
            <div class="container_photo">
              <input type="file" id="file-input" name="files[]"
                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" multiple>
              <label id="container_photo_label" for="file-input">Escoger archivos</label>
              <div id="images"></div>
            </div>
          </div>
          <br><br>

          <div class="item_format_rigth ">
          <button type="submit" id="modalContentButtonForm" class="button_send_form_general">Subir</button>
          </div>
        </form>
      </div>
      <div id="modalContentLoad" class="modalContent"></div>
      <div id="modalContentMessage" class="modalContent"> </div>

    </div>
  </div>
</div>
  `;
}

export function eventTableGeneral() {
  var modal = document.getElementById("myModal");

  document
    .querySelector("#button_cargarusuario")
    .addEventListener("click", (event) => {
      console.log("event");
      modal.style.display = "block";
      loadFile();
    });

  document.getElementsByClassName("close")[0].onclick = function () {
    modal.style.display = "none";
  };

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };

  document
    .querySelector("#button_downloadformat")
    .addEventListener("click", (event) => {
      event.preventDefault();
      window.location.href = "public/img/formato_usuario.xlsx";
    });
}

function loadFile() {
  let fileInput = document.getElementById("file-input");
  let imageContainer = document.getElementById("images");

  document.getElementById("file-input").addEventListener("change", eventPrueba);

  function eventPrueba() {
    let list = fileInput.files;
    console.log(list[0]);
    for (let i of fileInput.files) {
      let reader = new FileReader();
      let figure = document.createElement("figure");
      let figCap = document.createElement("figCaption");

      figCap.innerText = i.name;
      figure.appendChild(figCap);
      reader.onload = () => {
        let img = document.createElement("img");
        img.setAttribute("src", reader.result);
        figure.insertBefore(img, figCap);
      };
      imageContainer.appendChild(figure);
      reader.readAsDataURL(i);
    }
  }
}

export function sendForm() {
  document
    .getElementById("modalContentRegisterForm")
    .addEventListener("submit", (event) => {
      event.preventDefault();
      hiddenHtmlForm(true);
      loadHtmlGeneral(true);

      let formData = new FormData(event.target);
      ajaxPost({
        url: RUTA + "evaluacion/insertBulkUsuario",
        body: formData,
        cbSuccess: (data) => {
          loadHtmlGeneral(false);
          const listUsuario = data.result[0].success_message;
          drawHtmlUsuario(listUsuario);
          document.getElementById("modalContentRegisterForm").reset();
          MessageHttp(data);
        },
      });
    });
}

function drawHtmlUsuario(listUsuario) {
  let htmlEvaluador = ``,
    htmlEvaluado = ``;
  listUsuario.forEach((usuario) => {
    if (usuario.idTipoUsuario == 1) {
      htmlEvaluador += `
      <tr>
        <td>${usuario.dni}</td>
        <td>${usuario.usuario}</td>
        <td>${usuario.descripcionCargo}</td>
        <td>${usuario.descripcionCostos}</td>
      </tr>
      `;
    }
    if (usuario.idTipoUsuario == 2) {
      htmlEvaluado += `
      <tr>
        <td>${usuario.dni}</td>
        <td>${usuario.usuario}</td>
        <td>${usuario.descripcionCargo}</td>
        <td>${usuario.descripcionCostos}</td>
      </tr>
      `;
    }
  });

  document.getElementById(
    "competenciadetail_cargausuario_content"
  ).innerHTML = `

    <br><br>
<div class="item_format"> <h2> Evaluadores</h2> </div>
<br>
      <div id="table_evaluador">
      <div id="comptencia_content_table">
        <table class="styled-table">
          <thead>
            <tr class="active-row">
              <th>Id</th>
              <th>Nombre</th>
              <th>Cargo</th>
              <th>DNI</th>
            </tr>
            <thead>
            <tbody id="table_evaluador_data">
            ${htmlEvaluador}
          <tbody>
        </table>
      </div>
    </div>

      <br><br>
<div class="item_format"> <h2> Evaluados</h2> </div>
<br>
    <div id="table_evaluado">

      <div id="comptencia_content_table">
        <table class="styled-table">
          <thead>
            <tr class="active-row">
              <th>Id</th>
              <th>Nombre</th>
              <th>Cargo</th>
              <th>DNI</th>
            </tr>
            <thead>
            <tbody id="table_evaluado_data">${htmlEvaluado}
          <tbody>
        </table>
      </div>

    </div>
  `;

  //table_evaluado_data

  //document.getElementById("table_evaluado_data").innerHTML = htmlEvaluado;

  //document.getElementById("table_evaluador_data").innerHTML = htmlEvaluador;
}

export function loadInitUsuario() {
  //competenciadetail_cargausuario_content;
  loadHtml(true);
  var formData = new FormData();
  formData.append("idGroup", localStorage.getItem("idGroup"));

  ajaxPost({
    url: RUTA + "evaluacion/listCargaUsuario",
    body: formData,
    cbSuccess: (data) => {
      loadHtml(false);

      const listUsuario = data.result[0].success_message;
      if (listUsuario.length > 0) {
        drawHtmlUsuario(listUsuario);
      } else {
        emptyListHtml();
      }
    },
  });
}

function emptyListHtml() {
  document.getElementById(
    "competenciadetail_cargausuario_content"
  ).innerHTML = `
  
  <div class="competencia_content_load competencia_content_empty">
    <div>
    <div><i class="fa-solid fa-box-open fa-2x"></i></div>
  <div>Aun no contamos con usuarios</div>
  </div>
  </div>


    

`;
}

function loadHtml(stateData) {
  document.getElementById("competenciadetail_cargausuario_content").innerHTML =
    stateData
      ? `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`
      : ``;
}

function loadHtmlGeneral(stateData) {
  document.getElementById("modalContentLoad").innerHTML = stateData
    ? `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`
    : ``;
}

function hiddenHtmlForm(stateData) {
  document.getElementById("modalContentRegister").hidden = stateData;
}

function MessageHttp(posts) {
  let html = ``;
  if (posts.status == state.HTTP_STATE_OK) {
    html = `<div class="competencia_content_succes_popup">

    
        <div>
        <div> <i class="fa-solid fa-check fa-2x"></i> </div>
        <br><br>
        <div><h3>Actualización exitosa</h3>   </div>
        </div>
        </div>`;
  } else if (posts.status == state.HTTP_STATE_FAIL) {
    html = `          <div> Error
        </div>`;
  }
  document.getElementById("modalContentMessage").innerHTML = html;
}
