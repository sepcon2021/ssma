$(function () {
  const SELECT = 1;
  const DATE = 2;
  const INPUT = 3;

  var data = JSON.parse(sessionStorage.getItem("dataTrabajador"));

  var nombres = data.result[0].nombres;
  var apellidos = data.result[0].apellidos;
  var usuario = data.result[0].internal;
  var dni = data.result[0].dni;

  $("#nombres").val(`${nombres} ${apellidos}`);
  $("#internal").val(usuario);

  $("#proyecto").on("change", function () {
    let proyecto = $("#proyecto").val();
    getListaArea(proyecto);
    loadResponsable(proyecto);
    changeBotiquinForm(proyecto);
  });

  function getListaArea(idProyecto) {
    var lista_selection =
      '<option value="" disabled selected hidden>Seleccionar área</option>';

    $.each(JSON.parse(LISTA_AREA2), function (indexInArray, valueOfElement) {
      if (valueOfElement.idProyecto == idProyecto) {
        lista_selection +=
          "<option value=" +
          valueOfElement.id +
          " idproyecto=" +
          valueOfElement.idProyecto +
          ">" +
          valueOfElement.nombre +
          "</option>";
      }
    });

    $("#area").html(lista_selection);
  }

  function loadResponsable(proyecto) {
    var htmlDesplegable = `<option value="" disabled="" selected="" hidden="">Seleccionar</option>`;
    $.post(
      RUTA + "responsable/listaReponsableByProyecto",
      { idProyecto: proyecto },
      function (data, textStatus, xhr) {
        data.forEach((responsable) => {
          htmlDesplegable += `<option value="${responsable.dni}">${responsable.nombres}</option>`;
        });
        $("#responsable_accion").html(htmlDesplegable);
      },
      "json"
    );
  }

  function changeBotiquinForm(idProyecto) {
    if (idProyecto == 5) {
      $("#contenidoCabecera").load(
        "views/inspeccionBotiquin/cabeceraLima.html"
      );
    } else {
      $("#contenidoCabecera").load(
        "views/inspeccionBotiquin/cabeceraOtros.html"
      );
    }
  }

  /*
    __________________________________________________
    |                                                 |
    |                   POP UP                        |
    |                                                 |
    |_________________________________________________|         

    */

  $("#addRowObs").on("click", function (event) {
    event.preventDefault();
    $("#popup-1").addClass("active");
    return false;
  });

  // 5. LUEGO DE LLENAR TODOS LOS CAMPOS VAMOS A AGREGAR LA OBSERVACION REALIZADA Y VA SER AÑADIDO A LA TABLA PRINCIPAL

  $("#popup_send_form").click(function (event) {
    event.preventDefault();

    /*if (answerValidateCamposPopUp()) {
            $("#formpopup").trigger('submit');
        }*/
    $("#formpopup").trigger("submit");

    return false;
  });

  // 7. Enviamos el formulario con la imagen en memoria para que sea almacenado en un directorio de imagenes

  $("#formpopup").on("submit", function (event) {
    event.preventDefault();
    var arrayFormulario = $("#formpopup").serializeArray();

    var nombreResponsable = "";
    $("#responsable_accion option:selected").each(function () {
      nombreResponsable += $(this).text() + " ";
    });

    $(".popup_content").hide();
    $(".popup_load").show();
    $(".popup_load").html(`
        <div class="wrap_load_container"><div class="loader"></div></div>
        <div class="wrap_load_message"><p>Espere unos segundos estamos enviando el documento</p></div>`);

    $.ajax({
      url: RUTA + "seguridad/guardarArchivos",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        $(".popup_load").hide();
        $(".popup_content").show();

        arrayFormulario.push({
          name: "listaArchivo",
          value: JSON.parse(data).lista,
        });
        arrayFormulario.push({
          name: "nombreResponsable",
          value: nombreResponsable,
        });

        console.log(arrayFormulario);

        var contenidoHtml = cadenaHtml(arrayFormulario);

        $("#tbody-data").append(contenidoHtml);
        $("#formpopup").trigger("reset");
        $("#popup-1").removeClass("active");
      },
    });

    return false;
  });

  // 8. Cerramos el popup
  $(".clickPopup-close").click(function (event) {
    event.preventDefault();
    $("#popup-1").removeClass("active");
    $("#formpopup").trigger("reset");
    return false;
  });

  // 9. Creamos el row de la tabla principal
  function cadenaHtml(arrayFormulario) {
    var ubicacion = arrayFormulario[0]["value"];
    var condicion = arrayFormulario[1]["value"];
    var clasificacion = arrayFormulario[2]["value"];
    var accionCorrectiva = arrayFormulario[3]["value"];
    var responsableAccion = arrayFormulario[4]["value"];
    var fechaCumplimiento = arrayFormulario[5]["value"];
    var seguimiento = arrayFormulario[6]["value"];
    var listaArchivo =
      arrayFormulario[7] == undefined ? "" : arrayFormulario[7]["value"];
    var nombreResponsable =
      arrayFormulario[8] == undefined ? "" : arrayFormulario[8]["value"];

    var cadena = `<tr> 
        <td> 
        <input type="text" class="ubicacion w100p"  value="${ubicacion}" readonly>
         </td> 

         <td> 
         <input type="text" class="condicion w100p"  value="${condicion}" readonly>
          </td>


        <td>
        <select  class="clasificacion w80p" id="clasificacion" class="w75p"> 
        <option value="-1" class="oculto">Seleccione Opción</option>
        <option value="1"  ${tipo(1, clasificacion)} >A</option>
        <option value="2"  ${tipo(2, clasificacion)} >B</option>
        <option value="3"  ${tipo(3, clasificacion)} >C</option>
        <option value="4"  ${tipo(4, clasificacion)} >NA</option>
        </select>
        </td>



         <td> 
          <input type="text" class="accion_correctiva w100p" value="${accionCorrectiva}" readonly>
         </td> 
         <td> 
          <input type="text" class="responsable w100p"  dniResponsable="${responsableAccion}" value="${nombreResponsable}" readonly>
         </td> 
        <td> 
           <input type="date" class="cumplimiento w100p"  value="${fechaCumplimiento}" readonly>
        </td> 
       <td> 
          <input type="text" class="seguimiento w100p"  value="${seguimiento}" readonly>
        </td> 
          <td> 
          <input type="text" class="archivos"   value="${listaArchivo}" readonly>
        </td> 

        </tr> `;

    return cadena;
  }

  function tipo(id, idTipo) {
    var selected = ``;

    if (id == idTipo) {
      selected = `selected`;
    }
    return selected;
  }

  /*
    __________________________________________________
    |                                                 |
    |                   PHOTO SECTION                 |
    |                                                 |
    |_________________________________________________|         

    */

  let fileInput = document.getElementById("file-input");
  let imageContainer = document.getElementById("images");

  $("#file-input").on("change", function () {
    console.log("prueba");
    preview();
  });

  function preview() {
    imageContainer.innerHTML = "";

    for (i of fileInput.files) {
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

  /*
    __________________________________________________
    |                                                 |
    |                   SEND DOCUMENT                 |
    |                                                 |
    |_________________________________________________|         

    */
  $("#button_send_form").on("click", function (event) {
    event.preventDefault();

    if (answerValidateCampos()) {
      $("#formDigital").trigger("submit");
    } else {
      alert("Es obligatorio llenar todos los campos");
    }
  });

  $("#formDigital").submit(function (e) {
    e.preventDefault();

    $(".wrap_document").hide();
    $(".wrap_load").html(`    
            <div class="wrap_load_container"><div class="loader"></div></div>
            <div class="wrap_load_message"><p>Espere unos segundos estamos enviando el documento</p></div>
        `);

    $(".wrap_load").show();

    var json = generarJson()[0];

    console.log("Data");
    console.log(json);

    $.post(
      RUTA + "inspeccionBotiquin/insert",
      json,
      function (data, textStatus, xhr) {
        if (data.status == 200) {
          $(".wrap_load").hide();
          $(".wrap_sucess").show();

          $(".wrap_sucess").html(`   <div class="wrap_document_detail">
                    <div class="item_format">
                        <h3>Documentos</h3>
                    </div>
                    <div class="item_format">
                        <a class="home_document" href="#">Inicio</a> <a href="#">/ Inspección planeada de seguridad</a>
                    </div>
                </div>
                <div class="wrap_sucess_content">
                    <div>
                        <img class="wrap_sucess_img" src="public/img/clapping.png" alt="">
                    </div>
                    <div>
                        <p class="wrap_sucess_message">Felicidades el documento 
                            fue enviado con éxito</p>
                    </div>
                    <div >
                        <button class="wrap_sucess_home home_document">Inicio</button>
                    </div>
                </div>`);

          $("#formDigital").trigger("reset");
        }
      },
      "json"
    );
  });

  goHome();

  function goHome() {
    $(".home_document").on("click", function () {
      var result = confirm("¿Quieres volver al inicio?");

      if (result) {
        $.post(RUTA + "documento/render", function (data, textStatus, xhr) {
          $(".mainpage").html(data);
        });
      }
    });
  }

  function generarJson() {
    var jsonGeneral = [];

    jsonGeneral.push({
      id_tipo_inspeccion: $("#tipo_inspeccion").val(),
      sede: $("#proyecto").val(),
      id_area: $("#area").val(),
      lugar_inspeccion: $("#lugar_inspeccion").val(),
      fecha: $("#fecha_registro").val(),
      dni_inspeccionado: dni,
      responsable_area: $("#responsable_area").val(),
      listaInspecciones: generarListaInspeccionesJson(),
    });

    return jsonGeneral;
  }

  function generarListaInspeccionesJson() {
    var json = [];

    $("#tbody-data tr").each(function (a, b) {
      var ubicacion = $(".ubicacion", b).val();
      var condicion = $(".condicion", b).val();
      var clasificacion = $(".clasificacion", b).val();
      var accion_correctiva = $(".accion_correctiva", b).val();
      var dni_responsable = $(".responsable", b).attr("dniResponsable");
      var fecha_cumplimiento = $(".cumplimiento", b).val();
      var seguimiento = $(".seguimiento", b).val();
      var archivos = $(".archivos", b).val();

      if (ubicacion != undefined) {
        if (ubicacion.length > 0) {
          json.push({
            ubicacion: ubicacion,
            condicion: condicion,
            clasificacion: clasificacion,
            accion_correctiva: accion_correctiva,
            dni_responsable: dni_responsable,
            fecha_cumplimiento: fecha_cumplimiento,
            seguimiento: seguimiento,
            archivos: archivos,
          });
        }
      }
    });

    return json;
  }

  /*
    __________________________________________________
    |                                                 |
    |                   VALIDATE CAMPOS               |
    |                                                 |
    |_________________________________________________|         

    */

  function answerValidateCamposPopUp() {
    let listCampos = [
      { campo: "ubicacion", tipo: INPUT },
      { campo: "condicion", tipo: INPUT },
      /*{ "campo": "clasificacion", "tipo": SELECT },
        { "campo": "accion_correctiva", "tipo": INPUT },
        { "campo": "responsable_accion", "tipo": SELECT },
        { "campo": "fecha_cumplimiento", "tipo": DATE },
        { "campo": "seguimiento", "tipo": INPUT },*/
    ];

    console.log("cantidad");
    console.log(validateCampos(listCampos));
    if (validateCampos(listCampos) > 0) {
      return false;
    } else {
      return true;
    }
  }

  function answerValidateCampos() {
    let listCampos = [
      { campo: "tipo_inspeccion", tipo: SELECT },
      { campo: "proyecto", tipo: SELECT },
      { campo: "area", tipo: SELECT },
      { campo: "lugar_inspeccion", tipo: INPUT },
      { campo: "fecha_registro", tipo: DATE },
      { campo: "responsable_area", tipo: INPUT },
    ];

    if (validateCampos(listCampos) > 0) {
      return false;
    } else {
      return true;
    }
  }

  function validateCampos(listCampos) {
    let AMOUNT_EMPTY_CAMPOS = 0;

    listCampos.forEach((element) => {
      if (element.tipo == SELECT) {
        AMOUNT_EMPTY_CAMPOS += validateSelect(element.campo);
        changeClassErrorSelect(element.campo);

        console.log(`${element.campo} - ${validateSelect(element.campo)}`);
      }
      if (element.tipo == DATE) {
        AMOUNT_EMPTY_CAMPOS += validateDate(element.campo);
        changeClassErrorDate(element.campo);
        console.log(`${element.campo} - ${validateSelect(element.campo)}`);
      }
      if (element.tipo == INPUT) {
        AMOUNT_EMPTY_CAMPOS += validateInput(element.campo);
        changeClassErrorInput(element.campo);
        console.log(`${element.campo} - ${validateSelect(element.campo)}`);
      }
    });

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

  // Validate DATE

  function validateDate(name) {
    let VACIO = "";
    let cantidad = 0;

    if ($(`#${name}`).val() == VACIO) {
      $(`#${name}_error`).text("Campo obligatorio");
      $(`#${name}`).addClass("item_format_select_error");
      cantidad = 1;
    }

    return cantidad;
  }

  function changeClassErrorDate(name) {
    $(`#${name}`).on("change", function (event) {
      event.preventDefault();
      $(`#${name}`).removeClass("item_format_select_error");
      $(`#${name}_error`).text("");
    });
  }

  // Validate  INPUT || TEXTAREA

  function validateInput(name) {
    let VACIO = "";
    let cantidad = 0;

    if ($(`#${name}`).val() == VACIO) {
      $(`#${name}_error`).text("Campo obligatorio");
      $(`#${name}`).addClass("item_format_select_error");
      cantidad = 1;
    }
    return cantidad;
  }

  function changeClassErrorInput(name) {
    $(`#${name}`).on("change", function (event) {
      event.preventDefault();
      $(`#${name}`).removeClass("item_format_select_error");
      $(`#${name}_error`).text("");
    });
  }
});
