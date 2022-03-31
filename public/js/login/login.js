$(function () {
  $("#inicio_sesion_button_enviar").on("click", function () {
    var dniValue = $("#inicio_sesion_dni").val();
    var passwordValue = $("#inicio_sesion_password").val();

    $.post(
      RUTA + "main/getUserByDni",
      { dni: dniValue, password: passwordValue },
      function (data, textStatus, xhr) {
        if (data.status == "ok") {
          saveLogin(data);
          //window.location.href = "dashboard"
          window.location.replace(RUTA + "dashboard");
        } else {
          console.log(data.result);
          //$("#inicio_sesion_box_error").append("DNI incorrecto , vuelva a intentarlo");
          document.getElementById("inicio_sesion_box_error").innerHTML =
            "DNI incorrecto , vuelva a intentarlo";
        }

        $("#inicio_sesion_dni").val("");
      },
      "json"
    );
  });

  $("#inicio_sesion_dni").on("click", function () {
    console.log("click in");
    $("#inicio_sesion_box_error").empty();
  });

  function saveLogin(data) {
    console.log(data.result);
    sessionStorage.setItem("dataTrabajador", JSON.stringify(data));
  }
});
