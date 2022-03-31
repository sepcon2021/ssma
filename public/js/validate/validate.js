const SELECT = 1;

export function validateCamposGeneral(listCampos) {
  let AMOUNT_EMPTY_CAMPOS = 0;

  listCampos.forEach((element) => {
    if (element.tipo == SELECT) {
      AMOUNT_EMPTY_CAMPOS += validateSelect(element.campo);
      changeClassErrorSelect(element.campo);
    }
  });

  if (isCanvasBlank()) {
    AMOUNT_EMPTY_CAMPOS += 1;
  }

  return AMOUNT_EMPTY_CAMPOS;
}

//Validate SELECT

function validateSelect(name) {
  let VACIO = null;
  let cantidad = 0;

  if ($(`#${name}`).val() == VACIO) {
    $(`#${name}_error`).text("Campo obligatorio");
    $(`#${name}`).addClass("item_format_select_error");

    cantidad = 1;
  }

  return cantidad;
}

function changeClassErrorSelect(name) {
  $(`#${name}`).on("click", function (event) {
    event.preventDefault();
    $(`#${name}`).removeClass("item_format_select_error");
    $(`#${name}_error`).text("");
  });
}

export function isCanvasBlank() {
  var canvas = document.getElementById("firma");

  const context = canvas.getContext("2d");

  const pixelBuffer = new Uint32Array(
    context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
  );

  var resultado = !pixelBuffer.some((color) => color !== 0);

  if (resultado) {
    document.getElementById("firmaMessage").innerHTML = "Ingresar firma";
    document.getElementById("firma").classList.add("firmaBordes_fail");
  }

  return resultado;
}
