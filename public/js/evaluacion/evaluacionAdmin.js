import evaluacionAdminDetail from "../evaluacion/evaluacionAdminDetail.js";

import { ajax, ajaxNormal, ajaxPost } from "../helpers/ajax.js";

export default function EvaluacionAdmin() {
  return `
 <div class="competencia container_documento scroll1">

  <div id="competencia_header" >
    <div id="competencia_header_title" class="item_format"> <h3 class="title_content">Administrador de evaluación por competencias</h3></div>
    <div id="competencia_header_add" class="item_format_rigth"> <button id="competencia_header_add_button" class="button_send_form_upload">Agregar</button></div>
  </div>

  <div id="competencia_content">

  </div>

</div>
  `;
}

export function initEvaluacionAdmin() {
  document.getElementById(
    "competencia_content"
  ).innerHTML = `<div class="competencia_content_load">
<i class="fas fa-circle-notch fa-spin fa-2x"></i>
</div>`;

  ajax({
    url: RUTA + "evaluacion/getListGroup",
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
          <td>${element.descripcion}</td>
          <td>${element.puestoEvaluador}</td>
          <td>${element.puestoEvaluado}</td>
          <td>${element.registro}</td>
        </tr>
          `;
        });

        content = createTableHtml(html);
      } else {
        content = emptyTable();
      }

      document.getElementById("competencia_content").innerHTML = content;
      listenGroup();
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
                      <th>Descripción</th>
                      <th>Puesto evaluador</th>
                      <th>Puesto evaluado </th>
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

export function createGroup() {
  document.getElementById("competencia_header_add_button").onclick =
    function () {
      loadHtmlGeneral(".mainpage", true);

      const data = JSON.parse(sessionStorage.getItem("dataTrabajador")),
        dni = data.result[0].dni;

      var formData = new FormData();
      formData.append("nombre", "Grupo");
      formData.append("idUsuario", dni);

      ajaxPost({
        url: RUTA + "evaluacion/createGroup",
        body: formData,
        cbSuccess: (data) => {
          console.log(data);
          const idGroup = data.result[0].success_message;
          localStorage.setItem("idGroup", idGroup);
          localStorage.setItem("puestoEvaluado", "");
          localStorage.setItem("descripcion", "");
          localStorage.setItem("puestoEvaluador", "");
          localStorage.setItem("nombre", "");
          ajaxNormal({
            url: RUTA + "evaluacion/renderAdminDetail",
            cbSuccess: (posts) => {
              document.querySelector(".mainpage").innerHTML = posts;
              evaluacionAdminDetail();

              //backEvaluacionGeneral();
            },
          });
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
        "idGroup",
        dataTr.querySelectorAll("td")[0].innerText
      );
      localStorage.setItem(
        "nombre",
        dataTr.querySelectorAll("td")[1].innerText
      );
      localStorage.setItem(
        "descripcion",
        dataTr.querySelectorAll("td")[2].innerText
      );
      localStorage.setItem(
        "puestoEvaluado",
        dataTr.querySelectorAll("td")[3].innerText
      );

      localStorage.setItem(
        "puestoEvaluador",
        dataTr.querySelectorAll("td")[4].innerText
      );
      ajaxNormal({
        url: RUTA + "evaluacion/renderAdminDetail",
        cbSuccess: (posts) => {
          document.querySelector(".mainpage").innerHTML = posts;
          evaluacionAdminDetail();
          //backEvaluacionGeneral();
        },
      });
    });
}
