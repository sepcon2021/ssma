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
  //backEvaluacionGeneral();
}

function typeContentHtml(index) {
  switch (index) {
    case 0:
      document.getElementById("competenciaDetalle_content").innerHTML =
        EvaluacionDescripcion();
      fillForm();
      listenForm();
      // backEvaluacionGeneral();

      break;
    case 1:
      document.getElementById("competenciaDetalle_content").innerHTML =
        EvaluacionCargaUsuario();
      loadInitUsuario();
      eventTableGeneral();
      sendForm();
      //backEvaluacionGeneral();

      break;
    case 2:
      document.getElementById("competenciaDetalle_content").innerHTML =
        EvaluacionSeguimiento();
      init();
      //backEvaluacionGeneral();

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
  };
}
