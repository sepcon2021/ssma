<?php
require_once 'controllers/exception.php';
require_once 'public/email/email.php';

require_once 'models/topmodel.php';
require_once 'models/incidenciasmodel.php';
require_once 'models/seguridadmodel.php';
require_once 'models/optmodel.php';
require_once 'models/ipercNuevomodel.php';
require_once 'models/riesgosmodel.php';
require_once 'public/upload-photo/upload-image.php';
require_once 'public/generarExcel/reporteSeguimiento.php';

require_once 'controllers/respuesta.php';

class Seguimiento extends Controller
{

    public $exception;
    const TOP = 1;
    const SEGURIDAD = 2;
    const INCIDENCIA = 3;
    const OPT = 4;
    const IPERC = 5;
    const RIESGO = 6;


    function __construct()
    {
        parent::__construct();
        $this->exception = new CustomizeException();
    }

    function render()
    {
        session_start();
        $this->view->render('seguimiento/index');
    }

    
    function renderAsignado()
    {

        session_start();
        $this->view->render('seguimiento/asignado');
    }



    function listaAccionesPorEstado()
    {
        $idEstado = $_POST['idEstado'];
        $dni =  $_POST['dni'];

        $respuesta = $this->model->listaAccionesPorEstado($idEstado, $dni);
        echo $this->exception->responseMessageContenido($respuesta);
    }

    function listaAccionesPorEstadoProceso()
    {
        $dni =  $_POST['dni'];

        $respuesta = $this->model->listaAccionesPorEstadoProceso($dni);
        echo $this->exception->responseMessageContenido($respuesta);
    }


    function detalleAccionPorDocumento()
    {

        $idAccion = $_POST['idAccion'];

        $detalleSeguimiento = $this->model->detalleSeguimiento($idAccion);
        $respuesta = $this->tipoDocumento($detalleSeguimiento->iddocumento, $detalleSeguimiento->idtipodocumento);
        $listaEvidencia = $this->model->listaEvidencia($idAccion);
        $listaEstados = $this->model->listaEstadoDocumento($idAccion);

        $data = array(
            "detalleSeguimiento" =>  $detalleSeguimiento,
            "documento" => $respuesta,
            "listaEvidencia" => $listaEvidencia,
            "listaEstados" =>  $listaEstados
        );

        echo $this->exception->responseMessageObjeto($data);
    }

    function tipoDocumento($idDocumento, $idTipoDocumento)
    {
        $resultado = null;

        if ($idTipoDocumento == self::TOP ) {
            $top = new Topmodel;
            $resultado = $top->getUrlPdf($idDocumento);

        } else if ($idTipoDocumento == self::SEGURIDAD ) {
            $seguridad = new SeguridadModel;
            $resultado = $seguridad->getUrlPdf($idDocumento);

        } else if ($idTipoDocumento == self::INCIDENCIA) {
            $incidencia = new IncidenciasModel;
            $resultado = $incidencia->getUrlPdf($idDocumento);

        } else if ($idTipoDocumento == self::OPT) {
            $opt = new OptModel;
            $resultado = $opt->getUrlPdf($idDocumento);

        } else if ($idTipoDocumento == self::IPERC) {
            $iperc = new IpercNuevoModel;
            $resultado = $iperc->getUrlPdf($idDocumento);
        } else if ($idTipoDocumento == self::RIESGO) {
            $riesgo = new RiesgosModel;
            $resultado = $riesgo->getUrlPdf($idDocumento);
        }
        return $resultado;
    }

    function actualizarEstadoDocumento()
    {
        $idEstado = $_POST['idEstado'];
        $idSeguimiento = $_POST['idSeguimiento'];
        $dni = $_POST['dni'];

        $respuesta = $this->model->actualizarEstadoDocumento($idEstado, $idSeguimiento,$dni);
        echo $this->exception->responseMessage($respuesta);
    }

    function listaJefes()
    {
        $respuesta = $this->model->listaJefes();
        echo $this->exception->responseMessageContenido($respuesta);
    }

    function reasignarSeguimiento()
    {
        //Extraemos las variables que vienen del front
        $dniPropietario = $_POST['dniPropietario'];
        $idSeguimiento = $_POST['idSeguimiento'];

        //Extraer los datos de reasignación , seguimiento y jefeDetalle
        $respuesta = $this->model->reasignarSeguimiento($dniPropietario, $idSeguimiento);
        $detalleSeguimiento = $this->model->detallesAccion($idSeguimiento);
        $propietario = $this->model->jefeDetalle($dniPropietario);

        //Escogemos el formato del pdf que vamos a generar y despues generamos el pdf
        $urlPDF = $this->tipoDocumento($detalleSeguimiento->idDocumento, $detalleSeguimiento->idTipoDocumento);

        //Enviar correo de reasignación de acción
        $email = new Email;
        $nombresApellidos = $propietario->nombres . ' ' . $propietario->apellidos;
        $email->enviarNotificacionAsignado($propietario->correo, $nombresApellidos, $detalleSeguimiento->idDocumento, $detalleSeguimiento->nombreDocumento,$urlPDF['url_pdf']);

        echo $this->exception->responseMessage($respuesta);
    }

    function uploadFile()
    {
        $uploadImage = new UploadImage;
        $listaEvidencia = $uploadImage->uploadImageGeneral($_FILES["files"]);

        $idSeguimiento = $_POST['idaccion'];
        $comentario = $_POST['comentarios'];

        //Inserta la lista de Evidencia

        $this->model->actualizarComentario($idSeguimiento,$comentario);

        $data = array(
            "comentario" => $comentario,
            "listaEvidencia" => []
        );

        $this->model->insertarEvidencia($listaEvidencia, $idSeguimiento);

        $data = array(
            "comentario" => $comentario,
            "listaEvidencia" => $listaEvidencia
        );

        echo $this->exception->responseMessageContenido($data);

    }

    function actualizarFechaSeguimiento()
    {
        $fechaCumpliento = $_POST['fecha'];
        $idSeguimiento = $_POST['idaccion'];
        $accion_propuesta = $_POST['accion_propuesta'];
        $dni = $_POST['dni'];

        //Actualizar tabla seguimiento

        $this->model->actualizarFechaSeguimiento($fechaCumpliento,$accion_propuesta, $idSeguimiento,$dni);

        $data = array(
            "fechaCumplimiento" => $fechaCumpliento,
            "accionPropuesta" => $accion_propuesta
        );

        echo $this->exception->responseMessageObjeto($data);
    }

    function listaEvidencia()
    {
        $idAccion = $_POST['idAccion'];
        $listaEvidencia = $this->model->listaEvidencia($idAccion);
        echo $this->exception->responseMessageContenido($listaEvidencia);
    }

    function listaAccionDetalle()
    {

        $tipoDocumento  = $_POST['tipo_documento'];
        $proyecto = $_POST['proyecto'];
        $listaEvidencia = array();

        if($tipoDocumento == self::TOP){
            $listaEvidencia = $this->model->dashboardAccionesTop($proyecto);

        }else if ($tipoDocumento == self::SEGURIDAD){
            $listaEvidencia = $this->model->dashboardAccionesSeguridad($proyecto);

        }

        echo $this->exception->responseMessageContenido($listaEvidencia);
    }

    function downloadReport(){
        $respuesta = new Respuesta;
        $reporteSeguimiento = new  ReporteSeguimiento;

        $tipoDocumento  = $_POST['tipo_documento'];
        $proyecto = $_POST['proyecto'];

        if($tipoDocumento == self::TOP){

            $listEvidencia = $this->model->dashboardAccionesTop($proyecto);
            $result = $reporteSeguimiento->generateReporteNotas($listEvidencia);

        }else if ($tipoDocumento == self::SEGURIDAD){

            $listEvidencia = $this->model->dashboardAccionesTop($proyecto);
            $result = $reporteSeguimiento->generateReporteNotas($listEvidencia);
        }

        echo $respuesta->enviarRespuestaExcel($result);
    }

    function listaAccionDetalleById()
    {
        $idSeguimiento = $_POST['idseguimiento'];
        $listaEvidencia = $this->model->dashboardAccionesByIdSeguimiento($idSeguimiento);
        echo $this->exception->responseMessageContenido($listaEvidencia);
    }

    function pruebaListSeguimiento(){
        echo json_encode( $this->model->dashboardAccionesTop(5));
    }
}
