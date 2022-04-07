<?php

class InspeccionBotiquin extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function render()
  {


    $this->view->render('inspeccionBotiquin/index');
  }


  function insert()
  {

    session_start();

    $id_tipo_inspeccion = $_POST['id_tipo_inspeccion'];
    $sede = $_POST['sede'];
    $id_area = $_POST['id_area'];
    $lugar_inspeccion = $_POST['lugar_inspeccion'];
    $dni_inspeccionado =  $_POST['dni_inspeccionado'];
    $dni_responsable = isset($_POST['responsable_area']) ? $_POST['responsable_area'] : '77100151';
    $observacion_uno = '';
    $observacion_dos = '';
    $observacion_tres = '';
    $fecha = $_POST['fecha'];
    $listaInspecciones = $_POST['listaInspecciones'];

    $objeto = compact(
      "id_tipo_inspeccion",
      "sede",
      "id_area",
      "lugar_inspeccion",
      "dni_inspeccionado",
      "dni_responsable",
      "observacion_uno",
      "observacion_dos",
      "observacion_tres",
      "fecha",
      "listaInspecciones"
    );

    $id = $this->model->insert($objeto);
    $this->model->insertDetalle($listaInspecciones, $id);


    echo $this->responseMessageContenido($id);
  }


  function insertMovil()
  {

    $id_tipo_inspeccion = $_POST['id_tipo_inspeccion'];
    $sede = $_POST['sede'];
    $id_area = $_POST['id_area'];
    $lugar_inspeccion = $_POST['lugar_inspeccion'];
    $dni_inspeccionado =  $_POST['dni_inspeccionado'];
    $dni_responsable = $_POST['dni_responsable'];
    $observacion_uno = $_POST['observacion_uno'];
    $observacion_dos = $_POST['observacion_dos'];
    $observacion_tres = $_POST['observacion_tres'];
    $fecha = $_POST['fecha'];
    $listaInspecciones = $_POST['listaInspecciones'];

    $objeto = compact(
      "id_tipo_inspeccion",
      "sede",
      "id_area",
      "lugar_inspeccion",
      "dni_inspeccionado",
      "dni_responsable",
      "observacion_uno",
      "observacion_dos",
      "observacion_tres",
      "fecha",
      "listaInspecciones"
    );

    $id = $this->model->insert($objeto);
    $this->model->insertDetallesMovil($listaInspecciones, $id);


    echo $this->responseMessageContenidoMovil($id);
  }


  public function responseMessageContenido($value)
  {
    if ($value !=  0) {
      $return["status"] = 200;
      $return["contenido"] = $value;
    } else {

      $return["status"] = 404;
      $return["contenido"] = "Problemas en nuestros servicios";
    }

    header('Content-Type: application/json');
    return json_encode($return);
  }



  public function responseMessageContenidoMovil($value)
  {

    $return["state"] = false;
    $return["message"] =  "Problemas en nuestros servicios";

    if ($value !=  0) {

      $return["state"] = true;
      $return["message"] = "Envio exitoso";
    }

    header('Content-Type: application/json');
    return json_encode($return);
  }
}