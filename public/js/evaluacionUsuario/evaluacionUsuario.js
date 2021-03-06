import EvaluacionAdmin, {
  initEvaluacionAdmin,
} from "../evaluacion/evaluacionAdmin.js";
import UsuarioEvaluado, { initUsuarioEvaluado } from "./evaluacionEvaluado.js";
import UsuarioEvaluador, { initUsuarioEvaluador } from "./usuarioEvaluador.js";

export default function EvaluacionUsuario() {
  return `<div id="competenciaDetalle"  class="container_documento scroll1">

  <div id="compteneciaDetalle_title" class="item_format">
    <h3 class="title_content">Evaluaciones por competencia</h3>
  </div>

  <br><br>
  <div id="competenciaDetalle_tabs">
    <div class="sidebarCompetencia">

      <div class="sidebarCompetencia__menu sidebarCompetencia_position">

        <div class="active">Evaluador</div>
        <div>Evaluado</div>
      </div>

    </div>
  </div>

  <div id="competenciaDetalle_content">



  </div>

</div>`;
}

export function initEvaluacionUsuario() {
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
  document.getElementById("competenciaDetalle_content").innerHTML = "";
  document.getElementById("competenciaDetalle_content").innerHTML =
    UsuarioEvaluador();
  initUsuarioEvaluador();
}

function typeContentHtml(index) {
  switch (index) {
    case 0:
      document.getElementById("competenciaDetalle_content").innerHTML = "";
      document.getElementById("competenciaDetalle_content").innerHTML =
        UsuarioEvaluador();
      initUsuarioEvaluador();

      break;
    case 1:
      document.getElementById("competenciaDetalle_content").innerHTML = "";
      document.getElementById("competenciaDetalle_content").innerHTML =
        UsuarioEvaluado();
      initUsuarioEvaluado();
      break;
    default:
      break;
  }
}
