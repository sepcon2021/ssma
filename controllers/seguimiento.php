<?php
require_once 'controllers/exception.php';
require_once 'public/email/email.php';

require_once 'models/topmodel.php';
require_once 'models/incidenciasmodel.php';
require_once 'models/seguridadmodel.php';
require_once 'models/optmodel.php';
require_once 'models/ipercNuevomodel.php';
require_once 'models/riesgosmodel.php';

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

        //$this->view->nombres = $_SESSION['nombres'];
        //$this->view->dni = $_SESSION['dni'];
        $this->view->render('seguimiento/index');
    }

    
    function renderAsignado()
    {

        session_start();
        $this->view->render('seguimiento/asignado');
    }



    function listaAccionesPorEstado()
    {

        session_start();

        $idEstado = $_POST['idEstado'];
        $dni =  $_POST['dni'];

        $respuesta = $this->model->listaAccionesPorEstado($idEstado, $dni);

        echo $this->exception->responseMessageContenido($respuesta);
    }

    function listaAccionesPorEstadoProceso()
    {

        session_start();

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

    public function escogerTipoDocumentoPDF($detalleSeguimiento)
    {

        $urlPDF = '';

        if ($detalleSeguimiento->idtipodocumento == $this->TOP) {

            $tops = new Top;
            //$urlPDF = $tops->generarPDF($detalleSeguimiento->iddocumento);
        }

        return $urlPDF;
    }

    function uploadFilePrueba()
    {

        $listaEvidencia = $this->guardarArchivosPrueba($_FILES["files"]);

        echo $this->exception->responseMessageContenido($listaEvidencia);

    }


    function uploadFile()
    {

        $listaEvidencia = $this->guardarArchivos($_FILES["files"]);

        $idSeguimiento = $_POST['idaccion'];

        $comentario = $_POST['comentarios'];

        //Inserta la lista de Evidencia

        $this->model->actualizarComentario($idSeguimiento,$comentario);

        $data = array(
            "comentario" => $comentario,
            "listaEvidencia" => []
        );

        if(count($listaEvidencia) > 0){

            $this->model->insertarEvidencia($listaEvidencia, $idSeguimiento);

            $data = array(
                "comentario" => $comentario,
                "listaEvidencia" => $listaEvidencia
            );

        }

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


    function guardarArchivos($filesArr)
    {

        $listaEvidencia = array();

        $uploadDir = 'public/file/';
        $allowTypes = array('pdf', 'doc', 'docx', 'xlsx', 'jpg', 'png', 'jpeg');

        $fileNames = array_filter($filesArr['name']);

        // Upload file 
        $uploadedFile = '';
        if (!empty($fileNames)) {
            foreach ($filesArr['name'] as $key => $val) {
                // File upload path  
                $fileName = basename($filesArr['name'][$key]);
                $targetFilePath = $uploadDir . $fileName;

                // Check whether file type is valid  
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server  
                    if (move_uploaded_file($filesArr["tmp_name"][$key], $targetFilePath)) {
                        $uploadedFile .= $fileName . ',';

                        array_push($listaEvidencia, $fileName);
                    } else {
                        echo  'Sorry, there was an error uploading your file.';
                    }
                } else {
                    echo 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
                }
            }
        }

        return $listaEvidencia;
    }



    
    function guardarArchivosPrueba($filesArr)
    {

        $listaEvidencia = '' ;


        $uploadDir = 'public/file/';
        $allowTypes = array('pdf', 'doc', 'docx', 'xlsx', 'jpg', 'png', 'jpeg');

        $fileNames = array_filter($filesArr['name']);

        // Upload file 
        $uploadedFile = '';
        if (!empty($fileNames)) {
            foreach ($filesArr['name'] as $key => $val) {
                // File upload path  
                $fecha_image = new DateTime();

                $fileName = basename($filesArr['name'][$key]);
                $fileName = $fecha_image->getTimestamp().$this->getExtensionPhoto($fileName);

                $targetFilePath = $uploadDir . $fecha_image->getTimestamp().$this->getExtensionPhoto($fileName);
                
                // Check whether file type is valid  
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server  
                    if (move_uploaded_file($filesArr["tmp_name"][$key], $targetFilePath)) {
                        $uploadedFile .= $fileName . ',';

                        $listaEvidencia .= ($fileName.',');
                    } else {
                        echo  'Sorry, there was an error uploading your file.';
                    }
                } else {
                    echo 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
                }
            }
        }

        return $listaEvidencia;
    }

    function getExtensionPhoto($data)
    {
        $extension = "";

        // Test if string contains the word 
        if (strpos($data, ".jpg") !== false) {
            $extension = ".jpg";
        } 
        if (strpos($data, ".png") !== false) {
            $extension = ".png";
        } 
        if (strpos($data, ".jpeg") !== false) {
            $extension = ".jpeg";
        }
        return $extension;
    }

    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }


    function listaEvidencia()
    {

        $idAccion = $_POST['idAccion'];

        $listaEvidencia = $this->model->listaEvidencia($idAccion);

        echo $this->exception->responseMessageContenido($listaEvidencia);
    }

    function listaAccionDetalle()
    {


        $listaEvidencia = $this->model->dashboardAcciones();

        echo $this->exception->responseMessageContenido($listaEvidencia);
    }

    //dashboardAccionesByIdSeguimiento($idSeguimiento)

    function listaAccionDetalleById()
    {
        $idSeguimiento = $_POST['idseguimiento'];

        $listaEvidencia = $this->model->dashboardAccionesByIdSeguimiento($idSeguimiento);

        echo $this->exception->responseMessageContenido($listaEvidencia);
    }
}
