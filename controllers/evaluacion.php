<?php

require_once 'entity/evaluacionEntity.php';
require_once 'status/repuestas.php';
require_once 'public/PHPExcel/PHPExcel.php';
require_once 'public/upload-photo/upload-image.php';
require_once 'public/generarExcel/reportEvaluacionCompetencia.php';
require_once 'public/generate-pdf/GenerateEvaluacionCompetencia.php';

class Evaluacion extends Controller
{

  const EVALUADOR = 1;
  const EVALUADO = 2;
  const ESTADO_CREADO = 0;
  const ESTADO_FINALIZADO = 1;

  public function __construct()
  {
    parent::__construct();
  }

  public function renderAdminDetail()
  {
    $this->view->render("evaluacion/AdminDetail");
  }

  public function renderUsuarioDetail()
  {
    $this->view->render("evaluacion/UsuarioDetail");
  }

  public function createGroup()
  {

    $respuesta =  new respuestas();

    $idGroup = 0;
    $idUsuario = $_POST["idUsuario"];
    $nombre = $_POST["nombre"];
    $descripcion = isset($_POST["descripcion"]) ?  $_POST["descripcion"] : '';
    $puestoEvaluador = isset($_POST["puestoEvaluador"]) ? $_POST["puestoEvaluador"] :
      '';
    $puestoEvaluado = isset($_POST["puestoEvaluado"]) ? $_POST["puestoEvaluado"] :
      '';

    $evaluacionEntity =
      compact('idGroup,idUsuario,nombre,descripcion, puestoEvaluador, puestoEvaluado');
    //new EvaluacionEntity(0, $idUsuario, $nombre, $descripcion, $puestoEvaluador, $puestoEvaluado);

    $result = $this->model->createGroup($evaluacionEntity);
    echo json_encode($respuesta->success_200($result));
  }

  public function getListGroup()
  {
    $respuesta =  new respuestas();
    $result = $this->model->getListGroup();
    echo json_encode($respuesta->success_200($result));
  }

  public function updateGroup()
  {
    $respuesta =  new respuestas();

    $idGroup = $_POST["idGroup"];
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
    $descripcion = isset($_POST["descripcion"]) ?  $_POST["descripcion"] : '';
    $puestoEvaluador = isset($_POST["puestoEvaluador"]) ? $_POST["puestoEvaluador"] :
      '';
    $puestoEvaluado = isset($_POST["puestoEvaluado"]) ? $_POST["puestoEvaluado"] :
      '';


    $evaluacionEntity =
      compact('idGroup', 'idUsuario', 'nombre', '', 'puestoEvaluador', 'puestoEvaluado');
    //new EvaluacionEntity($idGroup, '', $nombre, $descripcion, $puestoEvaluador, $puestoEvaluado);


    $result = $this->model->updateGroup($evaluacionEntity);

    echo json_encode($respuesta->success_200($result));
  }



  public function insertBulkUsuario()
  {

    $respuesta =  new respuestas();

    $idGroup = $_POST["idGroup"];
    $uploadImage = new UploadImage;

    $listaEvidencia = $uploadImage->saveFileExcel($_FILES["files"]);

    $resultExcel = $this->loadExcelUsuario($listaEvidencia[0], $idGroup);

    $this->model->insertBulkUsuario($resultExcel["evaluador"], $resultExcel["evaluado"], $idGroup);

    $listUsuario = $this->model->getListEvaluadoAndEvaluador($idGroup);


    echo json_encode($respuesta->success_200($listUsuario));
  }

  public function loadExcelUsuario($path)
  {

    $listEvaluador = array();
    $listEvaluado = array();

    $path = "public/file/$path";
    $reader = PHPExcel_IOFactory::createReaderForFile($path);
    //echo json_encode($reader);
    $excel_Obj = $reader->load($path);

    //Get the first sheet in excel
    $worksheet = $excel_Obj->getSheet('0');

    $lastRow = $worksheet->getHighestRow();
    $colomncount = $worksheet->getHighestDataColumn();
    $colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);


    for ($row = 2; $row <= $lastRow; $row++) {
      for ($col = 0; $col < $colomncount_number; $col++) {
        $dni = $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue();
        if ($col == 0 && $dni != null) {

          array_push($listEvaluador, $dni);
        }
        if ($col == 1 && $dni != null) {
          array_push($listEvaluado, $dni);
        }
      }
    }

    return array("evaluador" => $listEvaluador, "evaluado" => $listEvaluado);
  }

  public function listCargaUsuario()
  {

    $respuesta =  new respuestas();
    $idGroup = $_POST["idGroup"];

    $listUsuario = $this->model->getListEvaluadoAndEvaluador($idGroup);

    echo json_encode($respuesta->success_200($listUsuario));
  }

  public function getListSeguimientoEvaluacion()
  {

    $respuesta =  new respuestas();
    $idGroup = $_POST["idGroup"];

    $listUsuario = $this->model->getListSeguimientoEvaluacion($idGroup);

    echo json_encode($respuesta->success_200($listUsuario));
  }

  public function createSeguimiento()
  {

    $respuesta =  new respuestas();
    $idGroup = $_POST["idGroup"];

    $listEvaluador = $this->model->getListUsuario(self::EVALUADOR, $idGroup);
    $listEvaluado = $this->model->getListUsuario(self::EVALUADO, $idGroup);

    // Update estado competencia_evaluado
    $this->model->updateListUsuario($idGroup);
    $this->model->insertBulkSeguimiento($idGroup, $listEvaluado, $listEvaluador);

    $listUsuario = $this->model->getListSeguimientoEvaluacion($idGroup);

    echo json_encode($respuesta->success_200($listUsuario));
  }


  public function getListSeguimientoByEvaluador()
  {

    $respuesta =  new respuestas();
    $dniEvaluador = $_POST["dni"];
    $estado = $_POST["estado"];

    $listUsuario = $this->model->getListSeguimientoByEvaluador($dniEvaluador, $estado);

    echo json_encode($respuesta->success_200($listUsuario));
  }

  public function getListSeguimientoByEvaluado()
  {

    $respuesta =  new respuestas();
    $dniEvaluado = $_POST["dni"];
    $estado = $_POST["estado"];

    $listUsuario = $this->model->getListSeguimientoByEvaluado($dniEvaluado, $estado);

    echo json_encode($respuesta->success_200($listUsuario));
  }

  public function updateEvaluador()
  {

    $respuesta =  new respuestas();

    $firmaEvaluador = $_POST["firmaEvaluador"];

    $idCompetenciaEvaluacion = $_POST["idCompetenciaEvaluacion"];
    $dniEvaluador = $_POST["dniEvaluador"];


    $compromiso1 = isset($_POST["compromiso_1"]) ?  $_POST["compromiso_1"] : null;
    $compromiso2 = isset($_POST["compromiso_2"]) ?  $_POST["compromiso_2"] : null;
    $compromiso3 = isset($_POST["compromiso_3"]) ?  $_POST["compromiso_3"] : null;
    $compromiso4 = isset($_POST["compromiso_4"]) ?  $_POST["compromiso_4"] : null;
    $compromiso5 = isset($_POST["compromiso_5"]) ?  $_POST["compromiso_5"] : null;

    $seguridad1 = isset($_POST["seguridad_1"]) ?  $_POST["seguridad_1"] : null;
    $seguridad2 = isset($_POST["seguridad_2"]) ?  $_POST["seguridad_2"] : null;
    $seguridad3 = isset($_POST["seguridad_3"]) ?  $_POST["seguridad_3"] : null;
    $seguridad4 = isset($_POST["seguridad_4"]) ?  $_POST["seguridad_4"] : null;
    $seguridad5 = isset($_POST["seguridad_5"]) ?  $_POST["seguridad_5"] : null;

    $estres1 = isset($_POST["estres_1"]) ?  $_POST["estres_1"] : null;
    $estres2 = isset($_POST["estres_2"]) ?  $_POST["estres_1"] : null;
    $estres3 = isset($_POST["estres_3"]) ?  $_POST["estres_1"] : null;
    $estres4 = isset($_POST["estres_4"]) ?  $_POST["estres_1"] : null;
    $estres5 = isset($_POST["estres_5"]) ?  $_POST["estres_1"] : null;

    $oportunidadMejora = isset($_POST["oportunidadMejora"]) ? $_POST["oportunidadMejora"] : null;

    $data = compact(
      "firmaEvaluador",
      "idCompetenciaEvaluacion",
      "dniEvaluador",
      "compromiso1",
      "compromiso2",
      "compromiso3",
      "compromiso4",
      "compromiso5",

      "seguridad1",
      "seguridad2",
      "seguridad3",
      "seguridad4",
      "seguridad5",

      "estres1",
      "estres2",
      "estres3",
      "estres4",
      "estres5",

      "oportunidadMejora"


    );

    $result = $this->model->updateEvaluador($data);

    echo json_encode($respuesta->success_200($result));
  }


  public function updateEvaluado()
  {

    $respuesta =  new respuestas();

    $firmaEvaluado = $_POST["firmaEvaluado"];
    $idCompetenciaEvaluacion = $_POST["idCompetenciaEvaluacion"];
    $estado = $_POST["estado"];

    $data = compact(
      "estado",
      "idCompetenciaEvaluacion",
      "firmaEvaluado"
    );

    $result = $this->model->updateEvaluado($data);

    echo json_encode($respuesta->success_200($result));
  }

  public function downloadReporte()
  {
    $respuesta =  new respuestas();

    $idGroup = $_POST["idGroup"];
    $listUsuario = $this->model->getListSeguimientoEvaluacion($idGroup);
    $evaluacionCompetencia =  new ReportEvaluacionCompetencia();
    $url = $evaluacionCompetencia->generateEvaluacionCompetenciaById($listUsuario);

    echo json_encode($respuesta->success_200($url));
  }

  public function downloadPdfReport()
  {

    $respuesta =  new respuestas();

    $id = $_POST["id"];
    $data = $this->model->getSeguimientoById($id);
    $generateEvaluacion =  new GenerateEvaluacionCompetencia();
    $url = $generateEvaluacion->generatePDF($data);
    echo json_encode($respuesta->success_200($url));
  }

  public function updateSeguimiento()
  {

    $respuesta =  new respuestas();

    $idGroup = $_POST['idGroup'];

    $listEvaluado =
      $this->model->getListGroupByIdAndEstadoCreado((int)$idGroup, self::ESTADO_CREADO, self::EVALUADO);
    $listEvaluador =
      $this->model->getListGroupByIdAndEstadoCreado((int)$idGroup, self::ESTADO_CREADO, self::EVALUADOR);

    if (count($listEvaluador) == 0 && count($listEvaluado) > 0) {
      $this->updateJustEvaluado($listEvaluado, $idGroup);
    }
    if (count($listEvaluador) > 0 && count($listEvaluado) == 0) {
      $this->updateJustEvaluador($listEvaluador, $idGroup);
    }
    if (count($listEvaluador) > 0 && count($listEvaluado) > 0) {
      $this->model->updateAllEvaluacion($idGroup);
    }

    $listResult = $this->model->getListSeguimientoEvaluacion($idGroup);

    echo json_encode($respuesta->success_200($listResult));
  }

  function updateAllEvaluacion($idGroup)
  {

    // Primera caso de actualizar los evaluados
    $listEvaluadores  =  $this->model->getListGroupByIdAndEstadoCreado((int)$idGroup, self::ESTADO_CREADO, self::EVALUADOR);
    $listEvaluadoTemp =
      $this->model->getListGroupById((int)$idGroup, self::EVALUADO);
    $this->model->insertBulkSeguimiento($idGroup, $listEvaluadoTemp, $listEvaluadores);
    $this->model->updateCompetenciaUsuarioByIdUsuario($idGroup, self::EVALUADOR);

    // Segundo caso de actualizar los evaluadores
    // En listTemp extraemos los evaluadores que aun no realizaron el cruce con los demas evaluados
    $listTemp = array();
    $listEvaluadorTemp = $this->model->getListGroupById((int)$idGroup, self::EVALUADOR);

    foreach ($listEvaluadorTemp as $evaluadorTemp) {
      $state = false;
      foreach ($listEvaluadores as $evaluador) {
        if ($evaluadorTemp["dni"] == $evaluador["dni"]) {
          $state = true;
        }
      }

      if (!$state) {
        array_push($listTemp, $evaluadorTemp);
      }
    }


    $listEvaluados  =  $this->model->getListGroupByIdAndEstadoCreado((int)$idGroup, self::ESTADO_CREADO, self::EVALUADO);


    $this->model->insertBulkSeguimiento($idGroup, $listEvaluados, $listTemp);
    $this->model->updateCompetenciaUsuarioByIdUsuario($idGroup, self::EVALUADO);
  }

  function updateJustEvaluador($listEvaluador, $idGroup)
  {
    $listEvaluado = $this->model->getListGroupById($idGroup, self::EVALUADO);

    $this->model->insertBulkSeguimiento($idGroup, $listEvaluado, $listEvaluador);
    $this->model->updateCompetenciaUsuarioByIdUsuario($idGroup, self::EVALUADOR);
  }

  function updateJustEvaluado($listEvaluado, $idGroup)
  {
    $listEvaluador = $this->model->getListGroupById($idGroup, self::EVALUADOR);

    $this->model->insertBulkSeguimiento($idGroup, $listEvaluado, $listEvaluador);
    $this->model->updateCompetenciaUsuarioByIdUsuario($idGroup, self::EVALUADO);
  }
}