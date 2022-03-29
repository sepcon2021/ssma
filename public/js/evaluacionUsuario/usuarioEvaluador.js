import { ajaxPost, ajaxNormal } from "../helpers/ajax.js";
import UsuarioEvaluadorDetail, {
  backUsuarioEvaluador,
  initUsuarioEvaluadorDetail,
  sendFormEvaluador,
} from "./usuarioEvaluadorDetail.js";

const ETIQUETA_MAIN_CONTAINER = "competenciadetail_seguimiento_content";

const data = JSON.parse(sessionStorage.getItem("dataTrabajador")),
  dni = data.result[0].dni;

export default function UsuarioEvaluador() {
  return `<div class="competenciadetail_seguimiento">

  <div id="competenciadetail_seguimiento_header">
  </div>
  <div id="competenciadetail_seguimiento_content">

  </div>

</div>`;
}

export function initUsuarioEvaluador() {
  loadHtml(ETIQUETA_MAIN_CONTAINER, true);

  let formData = new FormData();
  formData.append("dni", dni);
  formData.append("estado", 0);

  ajaxPost({
    url: RUTA + "evaluacion/getListSeguimientoByEvaluador",
    body: formData,
    cbSuccess: (data) => {
      loadHtml(ETIQUETA_MAIN_CONTAINER, false);
      const listUsuario = data.result[0].success_message;
      if (listUsuario.length > 0) {
        drawHtmlUsuario(listUsuario);
        listenGroup();
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
        <td>${usuario.usuarioEvaluado}</td>
        <td>${usuario.descripcionCargo}</td>
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
              <th>Evaluado</th>
              <th>Cargo</th>
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
    <i class="fa-solid fa-box-open fa-2x"></i>
    <br><br>
<p>No cuentas con evaluaciones pendientes</p>
  </div>
</div>`;
}

function listenGroup() {
  document
    .querySelector("#table_seguimiento")
    .addEventListener("click", (event) => {
      event.preventDefault();
      loadHtml(ETIQUETA_MAIN_CONTAINER, true);

      let dataTr = event.target.parentNode;

      const idGrupo = dataTr.querySelectorAll("td")[0].innerText,
        nombre = dataTr.querySelectorAll("td")[1].innerText,
        cargo = dataTr.querySelectorAll("td")[2].innerText;

      document.querySelector(".mainpage").innerHTML = UsuarioEvaluadorDetail(
        idGrupo,
        nombre,
        cargo
      );

      firma();
      initUsuarioEvaluadorDetail();
      sendFormEvaluador();
      backUsuarioEvaluador();
    });
}

/*
		El siguiente codigo en JS Contiene mucho codigo
		de las siguietes 3 fuentes:
		https://stipaltamar.github.io/dibujoCanvas/
		https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
		http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
*/

function firma() {
  // Comenzamos una funcion auto-ejecutable

  // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
  window.requestAnimFrame = (function (callback) {
    return (
      window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function (callback) {
        window.setTimeout(callback, 600 / 60);
        // Retrasa la ejecucion de la funcion para mejorar la experiencia
      }
    );
  })();

  //console.log("Inicio firma");
  // Traemos el canvas mediante el id del elemento html
  var canvas = document.getElementById("firma");
  var ctx = canvas.getContext("2d");

  // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
  var drawText = document.getElementById("draw-dataUrl");
  //var drawImage = document.getElementById("draw-image");
  var clearBtn = document.getElementById("draw-clearBtn");
  var submitBtn = document.getElementById("draw-submitBtn");
  var getIfSing = document.getElementById("firmado");

  clearBtn.addEventListener(
    "click",
    function (e) {
      // Definimos que pasa cuando el boton draw-clearBtn es pulsado
      clearCanvas();
    },
    false
  );
  // Definimos que pasa cuando el boton draw-submitBtn es pulsado

  // Activamos MouseEvent para nuestra pagina
  var drawing = false;
  var mousePos = { x: 0, y: 0 };
  var lastPos = mousePos;
  canvas.addEventListener(
    "mousedown",
    function (e) {
      /*
          Mas alla de solo llamar a una funcion, usamos function (e){...}
          para mas versatilidad cuando ocurre un evento
        */
      var tint = "#000";
      var punta = 1;
      drawing = true;
      lastPos = getMousePos(canvas, e);
      //Vamos a eliminar el mensaje de alerta cuando no ingresa firma
      document.getElementById("firmaMessage").innerHTML = "";
    },
    false
  );
  canvas.addEventListener(
    "mouseup",
    function (e) {
      //Vamos a eliminar el mensaje de alerta cuando no ingresa firma
      document.getElementById("firmaMessage").innerHTML = "";
      drawing = false;
    },
    false
  );
  canvas.addEventListener(
    "mousemove",
    function (e) {
      //Vamos a eliminar el mensaje de alerta cuando no ingresa firma
      document.getElementById("firmaMessage").innerHTML = "";
      mousePos = getMousePos(canvas, e);
    },
    false
  );

  // Activamos touchEvent para nuestra pagina
  canvas.addEventListener(
    "touchstart",
    function (e) {
      mousePos = getTouchPos(canvas, e);
      e.preventDefault(); // Prevent scrolling when touching the canvas
      var touch = e.touches[0];
      var mouseEvent = new MouseEvent("mousedown", {
        clientX: touch.clientX,
        clientY: touch.clientY,
      });
      canvas.dispatchEvent(mouseEvent);
    },
    false
  );
  canvas.addEventListener(
    "touchend",
    function (e) {
      e.preventDefault(); // Prevent scrolling when touching the canvas
      var mouseEvent = new MouseEvent("mouseup", {});
      canvas.dispatchEvent(mouseEvent);
    },
    false
  );
  canvas.addEventListener(
    "touchleave",
    function (e) {
      // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
      e.preventDefault(); // Prevent scrolling when touching the canvas
      var mouseEvent = new MouseEvent("mouseup", {});
      canvas.dispatchEvent(mouseEvent);
    },
    false
  );
  canvas.addEventListener(
    "touchmove",
    function (e) {
      e.preventDefault(); // Prevent scrolling when touching the canvas
      var touch = e.touches[0];
      var mouseEvent = new MouseEvent("mousemove", {
        clientX: touch.clientX,
        clientY: touch.clientY,
      });
      canvas.dispatchEvent(mouseEvent);
    },
    false
  );

  // Get the position of the mouse relative to the canvas
  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    /*
          Devuelve el tamaño de un elemento y su posición relativa respecto
          a la ventana de visualización (viewport).
        */
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top,
    };
  }

  // Get the position of a touch relative to the canvas
  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    console.log(touchEvent);
    /*
          Devuelve el tamaño de un elemento y su posición relativa respecto
          a la ventana de visualización (viewport).
        */
    return {
      x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
      y: touchEvent.touches[0].clientY - rect.top,
    };
  }

  // Draw to the canvas
  function renderCanvas() {
    if (drawing) {
      var tint = "#000";
      var punta = 1;
      //estamos comentando la salida que produce 1
      getIfSing.innerHTML = "";
      ctx.strokeStyle = tint;
      ctx.beginPath();
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.lineWidth = punta;
      ctx.stroke();
      ctx.closePath();
      lastPos = mousePos;
    }
  }

  function clearCanvas() {
    canvas.width = canvas.width;
    //estamos comentando la salida que produce 0
    getIfSing.innerHTML = "";
  }

  // Allow for animation
  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();
}

function startup() {
  var el = document.getElementById("firma");
  el.addEventListener("touchstart", handleStart, false);
  el.addEventListener("touchend", handleEnd, false);
  el.addEventListener("touchcancel", handleCancel, false);
  el.addEventListener("touchmove", handleMove, false);
}

document.addEventListener("DOMContentLoaded", startup);

var ongoingTouches = [];

function handleStart(evt) {
  evt.preventDefault();
  console.log("touchstart.");
  var el = document.getElementById("firma");
  var ctx = el.getContext("2d");
  var touches = evt.changedTouches;

  for (var i = 0; i < touches.length; i++) {
    console.log("touchstart:" + i + "...");
    ongoingTouches.push(copyTouch(touches[i]));
    var color = colorForTouch(touches[i]);
    ctx.beginPath();
    ctx.arc(touches[i].pageX, touches[i].pageY, 4, 0, 2 * Math.PI, false); // a circle at the start
    ctx.fillStyle = color;
    ctx.fill();
    console.log("touchstart:" + i + ".");
  }
}

function handleMove(evt) {
  evt.preventDefault();
  var el = document.getElementById("firma");
  var ctx = el.getContext("2d");
  var touches = evt.changedTouches;

  for (var i = 0; i < touches.length; i++) {
    var color = colorForTouch(touches[i]);
    var idx = ongoingTouchIndexById(touches[i].identifier);

    if (idx >= 0) {
      console.log("continuing touch " + idx);
      ctx.beginPath();
      console.log(
        "ctx.moveTo(" +
          ongoingTouches[idx].pageX +
          ", " +
          ongoingTouches[idx].pageY +
          ");"
      );
      ctx.moveTo(ongoingTouches[idx].pageX, ongoingTouches[idx].pageY);
      console.log(
        "ctx.lineTo(" + touches[i].pageX + ", " + touches[i].pageY + ");"
      );
      ctx.lineTo(touches[i].pageX, touches[i].pageY);
      ctx.lineWidth = 4;
      ctx.strokeStyle = color;
      ctx.stroke();

      ongoingTouches.splice(idx, 1, copyTouch(touches[i])); // swap in the new touch record
      console.log(".");
    } else {
      console.log("can't figure out which touch to continue");
    }
  }
}

function handleEnd(evt) {
  evt.preventDefault();
  log("touchend");
  var el = document.getElementById("firma");
  var ctx = el.getContext("2d");
  var touches = evt.changedTouches;

  for (var i = 0; i < touches.length; i++) {
    var color = colorForTouch(touches[i]);
    var idx = ongoingTouchIndexById(touches[i].identifier);

    if (idx >= 0) {
      ctx.lineWidth = 4;
      ctx.fillStyle = color;
      ctx.beginPath();
      ctx.moveTo(ongoingTouches[idx].pageX, ongoingTouches[idx].pageY);
      ctx.lineTo(touches[i].pageX, touches[i].pageY);
      ctx.fillRect(touches[i].pageX - 4, touches[i].pageY - 4, 8, 8); // and a square at the end
      ongoingTouches.splice(idx, 1); // remove it; we're done
    } else {
      console.log("can't figure out which touch to end");
    }
  }
}

function handleCancel(evt) {
  evt.preventDefault();
  console.log("touchcancel.");
  var touches = evt.changedTouches;

  for (var i = 0; i < touches.length; i++) {
    var idx = ongoingTouchIndexById(touches[i].identifier);
    ongoingTouches.splice(idx, 1); // remove it; we're done
  }
}
