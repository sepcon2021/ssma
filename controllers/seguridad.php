<?php

require_once 'public/upload-photo/upload-image.php';
require_once 'public/generate-pdf/generatepdf.php';
require_once 'models/seguimientomodel.php';

class Seguridad extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {

        $this->view->render('seguridad/index');
    }



    function grabarDocumentoWeb()
    {


        session_start();

        $reg  = isset($_POST['reg']) ? $_POST['reg'] : uniqid("se_");

        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
        $sede = str_pad($_POST['idProyecto'], 2, "0", STR_PAD_LEFT);
        //$luga = $_POST['lugar'];
        $luga = 'place';
        $fech = $_POST['fecha'];
        $insp = $_SESSION['nombres'];
        $fir1 = '';
        $resp = $_POST['responsable'];
        $fir2 = '';
        $obs0 = '';
        $obs1 = '';
        $obs2 = '';
        $foto = '';
        $lista_area = '1';
        $lista_ubicacion = '1';


        $idusuario = $_SESSION['internal'];
        $ubicacion = $_POST['ubicacion'];
        $idAreaObservada = $_POST['idArea'];

        $datos = compact(
            "reg",
            "tipo",
            "sede",
            "luga",
            "fech",
            "insp",
            "fir1",
            "resp",
            "fir2",
            "obs0",
            "obs1",
            "obs2",
            "foto",
            "lista_area",
            "lista_ubicacion",
            "idusuario",
            "ubicacion",
            "idAreaObservada"
        );

        $saveDoc = $this->model->insert($datos);

        if ($saveDoc) {
            echo $reg;
        }
        // $this->model->enviarmail($sede);
    }

    
    function grabarDetalles()
    {

        $idSeguridad = '';
        $dniPropietario = '';

        $data = json_decode($_POST['data']);



        for ($i = 0; $i < count($data); $i++) {

            $sid    = uniqid('se_');
            $idd    = $data[$i]->iddoc;
            $tipo   = $data[$i]->tipo;
            $condicion    = $data[$i]->Condicion;
            $clasificacion    = $data[$i]->Clasificacion;
            $accion_correctiva    = $data[$i]->Correctiva;
            $responsable    = $data[$i]->Responsable;
            $fecha_cumplimiento    = $data[$i]->Cumplimiento;
            $seguimiento    = $data[$i]->Seguimiento;
            $evidencia    = $data[$i]->Evidencia != "1" ?  $data[$i]->Evidencia : '';

            $datos = compact("sid", "idd", "tipo", "condicion", "clasificacion", "accion_correctiva", "responsable", "fecha_cumplimiento", "seguimiento", "evidencia");

            $idSeguridad = $idd;
            $dniPropietario = $data[$i]->dni;

            echo $this->model->insertDetails($datos);
            
            $this->elaborarCorreo($idSeguridad, $dniPropietario);
        }

    }

    
    function grabarDocumentoMovil()
    {

        $data = json_decode($_POST['data']);

        $return["state"] = true;
        $return["message"] = "Envio exitoso";



        $reg  = isset($_POST['reg']) ? $_POST['reg'] : uniqid("se_");
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
        $sede = str_pad($_POST['sede'], 2, "0", STR_PAD_LEFT);
        $luga = 'place';
        $fech = $_POST['fecha'];
        $insp = $_POST['inspeccionado'];
        $fir1 = $_POST['firma1'];
        $resp = $_POST['responsable'];
        $fir2 = $_POST['firma2'];
        $obs0 = '';
        $obs1 = '';
        $obs2 = '';
        $foto = '';
        $lista_area = $_POST['lista_area'];
        $lista_ubicacion = $_POST['lista_ubicacion'];
        $idusuario = $_POST['idusuario'];
        $ubicacion = $_POST['ubicacion'];
        $idAreaObservada = $_POST['idAreaObservada'];


        $datos = compact(
            "reg",
            "tipo",
            "sede",
            "luga",
            "fech",
            "insp",
            "fir1",
            "resp",
            "fir2",
            "obs0",
            "obs1",
            "obs2",
            "foto",
            "lista_area",
            "lista_ubicacion",
            "idusuario",
            "ubicacion",
            "idAreaObservada"
        );

        $insert = $this->model->insert($datos);


        if (!$insert) {
            // echo "Guardado desde Celular";
            $return["state"] = false;
            $return["message"] =  "Problemas en nuestros servicios";
        }

        $this->grabarDetallesMovil($data, $reg);

        header('Content-Type: application/json');
        // tell browser that its a json data
        echo json_encode($return);
        //converting array to JSON string
    }

    function grabarDetallesMovil($data, $id)
    {



        for ($i = 0; $i < count($data); $i++) {

            $fecha_image = new DateTime();
            $photo_upload = new UploadImage();
            $outputfile =  $photo_upload->uploadImageApp($data[$i]->Evidencia, $data[$i]->photo_name);


            $sid    = uniqid('se_');
            $idd    = $id;
            $tipo   = $data[$i]->Sedes;
            $condicion    = $data[$i]->Condicion;
            $clasificacion    = $data[$i]->Clasificacion;
            $accion_correctiva    = $data[$i]->Correctiva;
            $responsable    = $data[$i]->Responsable;
            $fecha_cumplimiento    = $data[$i]->Cumplimiento;
            $seguimiento    = $data[$i]->Seguimiento;
            $evidencia    = $outputfile;
            $dniPropietario    = $data[$i]->dniResponsable;

            $datos = compact("sid", "idd", "tipo", "condicion", "clasificacion", "accion_correctiva", "responsable", "fecha_cumplimiento", "seguimiento", "evidencia");

            $this->model->insertDetails($datos);

            $this->elaborarCorreo($idd, $dniPropietario);

        }
    }


    function uploadImg()
    {
        $temporal     = $_FILES['image_file']['tmp_name'];
        $nombre         = $_FILES['image_file']['name'];

        if ($_FILES['image_file']['type'] == 'image/jpeg' || $_FILES['image_file']['type'] == 'image/jpg') {
            $original     = imagecreatefromjpeg($temporal);
        } else {
            if ($_FILES['image_file']['type'] == 'image/png') {
                $original     = imagecreatefrompng($temporal);
            } else {
                die('Formato de archivo no valido');
            }
        }

        $ancho_original    = imagesx($original);
        $alto_original    = imagesy($original);

        //crear el lienzo vacio 520*400
        $ancho_nuevo     = 520;
        $alto_nuevo        = 400; //round($ancho_nuevo * $alto_original / $ancho_original);

        $copia = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);

        //copiar original -> copia
        imagecopyresampled($copia, $original, 0, 0, 0, 0, $ancho_nuevo, 400, $ancho_original, $alto_original);

        //exportar guardar imagen
        imagejpeg($copia, "public/photos/" . $nombre, 50);

        //elimina los datos temporales
        imagedestroy($original);
        imagedestroy($copia);

        echo  constant('URL') . "public/photos/" . $nombre;
    }



    function uploadImgPopup()
    {
        $photo_upload = new UploadImage();
        echo  $photo_upload->uploadImageWebPopUp($_FILES);
    }


    function listSecurityByDni($dni,$periodo){
        return $this->model->listSecurityByDni($dni,$periodo);
    }

    public function elaborarCorreo($id, $dniPropietario)
    {
        $idTipoDocumento = 2;
        $nombreDocumento = 'Inspección planeada de seguridad';
        $resultado = $this->model->buscarByIdSeguridad($id);

        $generatePdf = new GeneratePDF();
        $urlPdf = $generatePdf->generateSeguridadPdf($resultado);

        $this->model->actualizarUrlPdfSeguridad($id,$urlPdf);

        $seguimientoModel = new SeguimientoModel;
        $seguimientoModel->insertarSeguimientoGeneral($id, $dniPropietario, $urlPdf, $idTipoDocumento, $nombreDocumento);
    }


    function guardarArchivos()
    {

        $filesArr = $_FILES["files"];

        $listaEvidencia = array();

        $uploadDir = 'public/photos/';
        $allowTypes = array('pdf', 'doc', 'docx', 'xlsx', 'jpg', 'png', 'jpeg','xls');

        $fileNames = array_filter($filesArr['name']);

        // Upload file 
        $uploadedFile = '';
        if (!empty($fileNames)) {
            foreach ($filesArr['name'] as $key => $val) {
                // File upload path  
                $fileName =  str_replace(" ","",basename($filesArr['name'][$key]));
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

        echo  json_encode(array("lista" => $listaEvidencia));
    }




    function grabarDocumentoWebNew()
    {


        session_start();

        $reg  = isset($_POST['reg']) ? $_POST['reg'] : uniqid("se_");

        $tipo = isset($_POST['tipo']) ? $_POST['tipo_inspeccion'] : null;
        $sede = str_pad($_POST['proyecto'], 2, "0", STR_PAD_LEFT);
        //$luga = $_POST['lugar'];
        $luga = 'place';
        $fech = $_POST['fecha_registro'];
        $insp = $_POST['nombres'];
        $fir1 = '';
        $resp = $_POST['responsable_area'];
        $fir2 = '';
        $obs0 = '';
        $obs1 = '';
        $obs2 = '';
        $foto = '';
        $lista_area = '1';
        $lista_ubicacion = '1';


        $idusuario = $_POST['internal'];
        $ubicacion = $_POST['ubicacion'];
        $idAreaObservada = $_POST['area'];

        $datos = compact(
            "reg",
            "tipo",
            "sede",
            "luga",
            "fech",
            "insp",
            "fir1",
            "resp",
            "fir2",
            "obs0",
            "obs1",
            "obs2",
            "foto",
            "lista_area",
            "lista_ubicacion",
            "idusuario",
            "ubicacion",
            "idAreaObservada"
        );

        $saveDoc = $this->model->insert($datos);

        if ($saveDoc) {
            echo $reg;
        }
        // $this->model->enviarmail($sede);
    }

    
    function grabarDetallesNew()
    {

        $idSeguridad = '';
        $dniPropietario = '';

        $data = json_decode($_POST['data']);



        for ($i = 0; $i < count($data); $i++) {

            $sid    = uniqid('se_');
            $idd    = $data[$i]->iddoc;
            $tipo   = $data[$i]->tipo;
            $condicion    = $data[$i]->Condicion;
            $clasificacion    = $data[$i]->Clasificacion;
            $accion_correctiva    = $data[$i]->Correctiva;
            $responsable    = $data[$i]->Responsable;
            $fecha_cumplimiento    = $data[$i]->Cumplimiento;
            $seguimiento    = $data[$i]->Seguimiento;
            $evidencia    = $data[$i]->Evidencia != "1" ?  $data[$i]->Evidencia : '';

            $datos = compact("sid", "idd", "tipo", "condicion", "clasificacion", "accion_correctiva", "responsable", "fecha_cumplimiento", "seguimiento", "evidencia");

            $idSeguridad = $idd;
            $dniPropietario = $data[$i]->dni;

            echo $this->model->insertDetails($datos);
            
            $this->elaborarCorreo($idSeguridad, $dniPropietario);
        }

    }


}
