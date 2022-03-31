import { ajaxPost } from "../helpers/ajax.js";
import EvaluacionAdmin, {
  createGroup,
  initEvaluacionAdmin,
} from "./evaluacionAdmin.js";
import EvaluacionCargaUsuario, {
  eventTableGeneral,
  loadInitUsuario,
  sendForm,
} from "./evaluacionCargaUsuario.js";
import EvaluacionDescripcion, {
  fillForm,
  listenForm,
} from "./evaluacionDescripcion.js";
import EvaluacionSeguimiento, { init } from "./evaluacionSeguimiento.js";

export default function evaluacionAdminDetail() {
  let tabs = document.querySelector(".sidebarCompetencia");
  let tabHeader = tabs.querySelector(".sidebarCompetencia__menu");
  let tabHeaders = tabHeader.querySelectorAll("div");

  for (let index = 0; index < tabHeaders.length; index++) {
    tabHeaders[index].addEventListener("click", function () {
      tabHeader.querySelector(".active").classList.remove("active");
      tabHeaders[index].classList.add("active");
      typeContentHtml(index);
    });
  }
  // We need init a default html content
  document.getElementById("competenciaDetalle_content").innerHTML =
    EvaluacionDescripcion();
  fillForm();
  listenForm();
  backEvaluacionGeneral();
  deleteGrupo();
}

function typeContentHtml(index) {
  switch (index) {
    case 0:
      document.getElementById("competenciaDetalle_content").innerHTML =
        EvaluacionDescripcion();
      fillForm();
      listenForm();
      backEvaluacionGeneral();
      deleteGrupo();
      break;
    case 1:
      document.getElementById("competenciaDetalle_content").innerHTML =
        EvaluacionCargaUsuario();
      loadInitUsuario();
      eventTableGeneral();
      sendForm();
      deleteGrupo();
      break;
    case 2:
      document.getElementById("competenciaDetalle_content").innerHTML =
        EvaluacionSeguimiento();
      init();
      deleteGrupo();
      break;
    default:
      break;
  }
}

function backEvaluacionGeneral() {
  console.log("Prueba");
  document.getElementById("back_evaluacion_general").onclick = function () {
    document.querySelector(".mainpage").innerHTML = EvaluacionAdmin();
    initEvaluacionAdmin();
    createGroup();
  };
}

function deleteGrupo() {
  document.getElementById("competencia_detail_delete").onclick = function () {
    let formData = new FormData();
    formData.append("idGroup", localStorage.getItem("idGroup"));

    ajaxPost({
      url: RUTA + "evaluacion/deleteGrupo",
      body: formData,
      cbSuccess: (data) => {
        document.querySelector(".mainpage").innerHTML = EvaluacionAdmin();
        initEvaluacionAdmin();
        createGroup();
      },
    });
  };
}
