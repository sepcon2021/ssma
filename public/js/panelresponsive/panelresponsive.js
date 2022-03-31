import COMPONENT from "../constants/constants.js";
import EvaluacionAdmin, {
  createGroup,
  initEvaluacionAdmin,
} from "../evaluacion/evaluacionAdmin.js";
import EvaluacionEvento, {
  initEvaluacionEvento,
} from "../evaluacion/evaluacionEvento.js";
import EvaluadorMain, { initMainEvento } from "../evaluacion/evaluadorMain.js";
import EvaluacionUsuario, {
  initEvaluacionUsuario,
} from "../evaluacionUsuario/evaluacionUsuario.js";

$(function () {
  var dataJson = "";

  emptySession();

  function showSideBar() {
    let contentHTML = ``;
    let permiso = dataJson.result[0].permiso;

    if (permiso.length > 0) {
      contentHTML = `
            <div class="active">  <i class="fa-solid fa-file-lines fa-xs space-between "></i> Documentos</div>
            <div> <i class="fa-solid fa-hammer  fa-xs space-between"></i>Seguimiento </div>
            <div> <i class="fa-solid fa-hammer  fa-xs space-between"></i>Admin seguimiento </div>

            <div> <i class="fa-solid fa-table fa-xs space-between"></i>Reportes</div>
            <div> <i class="fa-solid fa-file-chart-column fa-xs space-between"></i></div>
             
            <div> <i class="fa-solid fa-book fa-xs space-between"></i>Formulario</div>
            <div> <i class="fa-solid fa-book fa-xs space-between"></i>Admin formulario</div>

            <div><i class="fa-solid fa-chalkboard-user fa-xs space-between"></i>Lecciones aprendidas</div>
            <div><i class="fa-solid fa-chalkboard-user fa-xs space-between"></i>Admin L. aprendidas</div>
            <div> <i class="fa-solid fa-graduation-cap fa-xs space-between"></i>Evaluación competencias</div>
            <div> <i class="fa-solid fa-graduation-cap fa-xs space-between"></i>Admin E. Competencias</div>
            `;
    } else {
      contentHTML = `
            <div class="active"> <i class="fa-solid fa-file-lines fa-xs space-between "></i> Documentos</div>
            <div><i class="fa-solid fa-hammer  fa-xs space-between"></i> Seguimiento</div>
            <div><i class="fa-solid fa-table fa-xs space-between"></i>Reportes</div>
            <div>Estadística</div>
            <div><i class="fa-solid fa-book fa-xs space-between"></i>Formulario</div>
            <div><i class="fa-solid fa-chalkboard-user fa-xs space-between"></i>Lecciones aprendidas</div>
            <div><i class="fa-solid fa-graduation-cap fa-xs space-between"></i>Evaluación competencias </div>
            `;
    }

    $(".sidebar__menu").html(contentHTML);
  }

  function emptySession() {
    if (sessionStorage.getItem("dataTrabajador") == null) {
      window.location.replace(RUTA);
    } else {
      dataJson = JSON.parse(sessionStorage.getItem("dataTrabajador"));

      var nombres = dataJson.result[0].nombres;
      var apellidos = dataJson.result[0].apellidos;
      var notificacion = dataJson.result[0].notificacion;
      var amountSeguimiento = dataJson.result[0].amountSeguimiento;
      showNotificacion(notificacion);

      $("#header_usuario_inicial").text(getFirstWordName(nombres, apellidos));
      $("#header_usuario_apellido").text(
        nombres.split(" ")[0] + " " + apellidos.split(" ")[0]
      );
      $("#header_usuario_cargo").text(dataJson.result[0].dcargo);

      showSideBar();

      if (amountSeguimiento > 0) {
        console.log(amountSeguimiento);
        $("#notification").addClass("notification");
        $("#notification").removeClass("notification-desactive");
        $(".amount_notification").text(amountSeguimiento);
      }
    }
  }

  $("#notification").on("click", function () {
    tabHeader.querySelector(".active").classList.remove("active");
    tabHeaders[1].classList.add("active");

    $.post(RUTA + "seguimiento/render", function (data, textStatus, xhr) {
      $(".mainpage").html(data);
    });
    removeClass();
  });

  function showNotificacion(notificacion) {
    if (notificacion) {
      $("#popup-2").addClass("active");
    }
  }

  $(".notificacion_button").on("click", function () {
    $(".notificacion_button").prop("disabled", true);

    let dni = dataJson.result[0].dni;

    $(".popup_content").hide();
    $(".popup_load").show();
    $(".popup_load").html(`
        <div class="wrap_load_container"><div class="loader"></div></div>
        <div class="wrap_load_message"><p>Espere unos segundos estamos enviando el documento</p></div>`);

    $.post(
      RUTA + "main/insertNotificacion",
      { dni: dni },
      function (data, textStatus, xhr) {
        dataJson.result[0].notificacion = false;
        sessionStorage.removeItem("dataTrabajador");
        sessionStorage.setItem("dataTrabajador", JSON.stringify(dataJson));

        $.post(
          RUTA + "leccionesAprendidas/renderGeneral",
          function (data, textStatus, xhr) {
            $(".mainpage").html(data);
            $("#popup-2").removeClass("active");
          }
        );
      }
    );

    removeClass();
  });

  $.post(RUTA + "documento/render", function (data, textStatus, xhr) {
    $(".mainpage").html(data);
  });

  let tabs = document.querySelector(".sidebar");
  let tabHeader = tabs.querySelector(".sidebar__menu");
  let tabHeaders = tabHeader.querySelectorAll("div");

  for (let i = 0; i < tabHeaders.length; i++) {
    tabHeaders[i].addEventListener("click", function () {
      tabHeader.querySelector(".active").classList.remove("active");
      tabHeaders[i].classList.add("active");

      if (dataJson.result[0].permiso.length > 0) {
        getContentHtmlAdministrador(i);
      } else {
        getContentHtmlUser(i);
      }
    });
  }

  $("#header_buscador_menu").on("click", function () {
    //var sidebar = document.getElementById("sidebar");
    var sidebar = document.getElementsByClassName("sidebar")[0];
    sidebar.classList.add("sidebar_responsive");
  });

  $("#sidebar_close").on("click", function () {
    //var sidebar = document.getElementById("sidebar");
    var sidebar = document.getElementsByClassName("sidebar")[0];
    sidebar.classList.remove("sidebar_responsive");
  });

  function getContentHtmlAdministrador(indexPage) {
    if (indexPage == COMPONENT.DOCUMENTOS) {
      $.post(RUTA + "documento/render", function (data, textStatus, xhr) {
        console.log(data);
        $(".mainpage").html(data);
      });
      removeClass();
    }
    if (indexPage == COMPONENT.SEGUIMIENTO) {
      $.post(RUTA + "seguimiento/render", function (data, textStatus, xhr) {
        $(".mainpage").html(data);
      });
      removeClass();
    }
    if (indexPage == COMPONENT.SEGUIMIENTODASHBOARD) {
      $.post(
        RUTA + "seguimientodashboard/render",
        function (data, textStatus, xhr) {
          $(".mainpage").html(data);
        }
      );
      removeClass();
    }

    if (indexPage == COMPONENT.REPORTES) {
      $.post(RUTA + "reporte/render", function (data, textStatus, xhr) {
        $(".mainpage").html(data);
      });
      removeClass();
    }
    if (indexPage == COMPONENT.ESTADISTICA) {
      $(".mainpage").html("");
      removeClass();
    }
    if (indexPage == COMPONENT.FORMULARIO) {
      $.post(
        RUTA + "administradorExamen/renderDashboardInicio",
        function (data, textStatus, xhr) {
          $(".mainpage").html(data);
        }
      );
      removeClass();
    }
    if (indexPage == COMPONENT.ADMINFORMULARIO) {
      $.post(RUTA + "capacitacion/render", function (data, textStatus, xhr) {
        $(".mainpage").html(data);
      });
      removeClass();
    }

    if (indexPage == COMPONENT.LECCIONES_APRENDIDAS) {
      $.post(
        RUTA + "leccionesAprendidas/render",
        function (data, textStatus, xhr) {
          $(".mainpage").html(data);
        }
      );
      removeClass();
    }

    if (indexPage == COMPONENT.LECCIONES_GENERAL) {
      $.post(
        RUTA + "leccionesAprendidas/renderGeneral",
        function (data, textStatus, xhr) {
          $(".mainpage").html(data);
        }
      );
      removeClass();
    }

    if (indexPage == COMPONENT.EVALUACION_COMPETENCIA) {
      document.querySelector(".mainpage").innerHTML = EvaluacionUsuario();
      initEvaluacionUsuario();
      removeClass();
    }
    if (indexPage == COMPONENT.ADMIN_EVALUACION_COMPETENCIA) {
      document.querySelector(".mainpage").innerHTML = EvaluadorMain();
      initMainEvento();
      removeClass();
    }
  }

  function getContentHtmlUser(indexPage) {
    if (indexPage == 0) {
      $.post(RUTA + "documento/render", function (data, textStatus, xhr) {
        $(".mainpage").html(data);
      });
      removeClass();
    }
    if (indexPage == 1) {
      $.post(RUTA + "seguimiento/render", function (data, textStatus, xhr) {
        $(".mainpage").html(data);
      });
      removeClass();
    }

    if (indexPage == 2) {
      $.post(RUTA + "reporte/render", function (data, textStatus, xhr) {
        $(".mainpage").html(data);
      });
      removeClass();
    }
    if (indexPage == 3) {
      $(".mainpage").load("views/dashboard/estadistica.html");
      removeClass();
    }
    if (indexPage == 4) {
      $.post(
        RUTA + "administradorExamen/renderDashboardInicio",
        function (data, textStatus, xhr) {
          $(".mainpage").html(data);
        }
      );
      removeClass();
    }
    if (indexPage == 5) {
      $.post(
        RUTA + "leccionesAprendidas/renderGeneral",
        function (data, textStatus, xhr) {
          $(".mainpage").html(data);
        }
      );
      removeClass();
    }
    if (indexPage == 6) {
      document.querySelector(".mainpage").innerHTML = EvaluacionUsuario();
      initEvaluacionUsuario();
      removeClass();
    }

    console.log("index");
    console.log(indexPage);
  }

  function getFirstWordName(name, apellido) {
    var wordName = name.charAt(0);
    var wordAddress = apellido.charAt(0);
    return wordName + wordAddress;
  }

  function removeClass() {
    var sidebar = document.getElementsByClassName("sidebar")[0];
    sidebar.classList.remove("sidebar_responsive");
  }

  $(".cerrar_sesion").on("click", function () {
    if (sessionStorage.removeItem("dataTrabajador") == null) {
      window.location.replace(RUTA);
    }
  });
});

let state = false;

document.getElementById("circle").onclick = function () {
  state = !state;

  if (state) {
    document.getElementById("header_cerrar_sesion").innerHTML = `
  <div><button id="logout">Cerrar sesión</button></div>
  `;
    document
      .getElementById("header_cerrar_sesion")
      .classList.add("header_cerrar_sesion");
    logout();
  } else {
    document.getElementById("header_cerrar_sesion").innerHTML = `
  `;
    document
      .getElementById("header_cerrar_sesion")
      .classList.remove("header_cerrar_sesion");
  }
};

function logout() {
  document.getElementById("logout").onclick = function () {
    sessionStorage.removeItem("dataTrabajador");
    window.location.replace(RUTA);
  };
}
