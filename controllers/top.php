    <?php

require_once 'public/upload-photo/upload-image.php';
require_once 'public/generate-pdf/generatepdf.php';
require_once 'models/seguimientomodel.php';
require_once 'public/email/email.php';
require_once 'controllers/respuesta.php';
require_once 'public/upload-photo/upload-image.php';

class Top extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {

        $this->view->render('top/index');
    }


    public function guardarMovil()
    {

        $respuesta = new Respuesta;

        $topid = uniqid('mo_');
        $sede = str_pad($_POST['sede'], 2, "0", STR_PAD_LEFT);
        $areaGeneral = $_POST['lista_area'];
        $ubicacionGeneral = $_POST['lista_ubicacion'];
        $lugar = $_POST['lugar'];
        $reportado = $_POST['reportado'];
        $fecha = $_POST['fecha'];
        $observacion = $_POST['observacion'];
        $acsues = $this->convertObservacionDetalle($_POST['acsues']) ?: '00';
        $cosues = $this->convertObservacionDetalle($_POST['cosues']) ?: '00';
        $actseg = $this->convertObservacionDetalle($_POST['actseg']) ?: '00';
        $otros = $_POST['otros'];
        $relacion = $_POST['relacion'] ?: '00';
        $tipepp = $_POST['tipepp'] ?: '00';
        $conepp = $_POST['conepp'] ?: '00';
        $preventiva = $_POST['preventiva'];
        $correctiva = $_POST['correctiva'];
        $perdida = isset($_POST['perdida']) ?  $_POST['perdida']: '00';
        $area = $_POST['sltArea'];
        $image = $_POST['image'];
        $image_name = $_POST['image_name'];
        $user = $_POST['usuario'];
        $observado_lugar = $_POST['observado_lugar'];
        $observado_puesto = $_POST['observado_puesto'];
        $idobservado_tiempo = $_POST['idobservado_tiempo'];
        $idobservado_hora = $_POST['idobservado_hora'];
        $idobservado_edad = $_POST['idobservado_edad'];
        $idobservado_lesion = $_POST['idobservado_lesion'];
        $idobservado_obstaculo = $_POST['idobservado_obstaculo'];
        $observado_cambio = $_POST['observado_cambio'];
        $observado_retroalimentacion = $_POST['observado_retroalimentacion'];
        $observado_reincidente = $_POST['observado_reincidente'];
        $observado_comentario = isset($_POST['observado_comentario']) ? $_POST['observado_comentario'] : '';
        $idproyectodetalle = $_POST['idproyectodetalle'];
        $idpuestoobservado = $_POST['idcargo'] ?  $_POST['idcargo'] : 151 ;
        $dniPropietario =  strlen($_POST['dni_propietario']) != 0 ? $_POST['dni_propietario'] : null;

        $relacion = $this->relacionado($relacion);

        $photo_upload = new UploadImage();
        $outputfile = $photo_upload->uploadImageApp($image, $image_name);

        
        $respuestaInsert = $this->model->insertMovil(
            ['idtop' => $topid,
                'sede' => $sede,
                'areaGeneral' => $areaGeneral,
                'ubicacionGeneral' => $ubicacionGeneral,
                'lugar' => $lugar,
                'reportado' => $reportado,
                'fecha' => $fecha,
                'observacion' => $observacion,
                'acsues' => $acsues,
                'cosues' => $cosues,
                'actseg' => $actseg,
                'otros' => $otros,
                'relacion' => $relacion,
                'tipepp' => $tipepp,
                'conepp' => $conepp,
                'preventiva' => $preventiva,
                'correctiva' => $correctiva,
                'perdida' => $perdida,
                'area' => $area,
                'foto' => $outputfile,
                'user' => $user,
                'observado_lugar' => $observado_lugar,
                'observado_puesto' => $observado_puesto,
                'idobservado_tiempo' => $idobservado_tiempo,
                'idobservado_hora' => $idobservado_hora,
                'idobservado_edad' => $idobservado_edad,
                'idobservado_lesion' => $idobservado_lesion,
                'idobservado_obstaculo' => $idobservado_obstaculo,
                'observado_cambio' => $observado_cambio,
                'observado_retroalimentacion' => $observado_retroalimentacion,
                'observado_reincidente' => $observado_reincidente,
                'observado_comentario' => $observado_comentario,
                'idproyectodetalle' => $idproyectodetalle,
                'idpuestoobservado' => $idpuestoobservado,

            ]);


      $this->elaborarCorreo($topid,$dniPropietario,$perdida,$sede,$preventiva);
       echo $respuesta->enviarRespuesta($respuestaInsert);

    }

    function relacionado($idRelacionado)
    {

        $relacionadoNumber = intval($idRelacionado) + 1;

        return $relacionadoNumber;
    }



    public function guardarWeb()
    {

        $respuesta = new Respuesta;

        session_start();

        $topid = uniqid('mo_');
        $sede = str_pad($_POST['idProyecto'], 2, "0", STR_PAD_LEFT);
        $areaGeneral = '1';
        $ubicacionGeneral = '1';
        $lugar = '';
        $reportado = $_SESSION['nombres'];
        $fecha = $_POST['txtFecha'];
        $observacion = $_POST['rbObser'];
        $acsues = isset($_POST['rbacsues']) ? $_POST['rbacsues'] : '00';
        $cosues = isset($_POST['rbcosues']) ? $_POST['rbcosues'] : '00';
        $actseg = isset($_POST['rbactseg']) ? $_POST['rbactseg'] : '00';
        $otros = $_POST['txtOtros'];
        $relacion = isset($_POST['rbrelac']) ? $_POST['rbrelac'] : '00';
        $tipepp = isset($_POST['rbtipepp']) ? $_POST['rbtipepp'] : '00';
        $conepp = isset($_POST['rbconepp']) ? $_POST['rbconepp'] : '00';
        $preventiva = $_POST['txtPreve'];
        $correctiva = $_POST['txtCorre'];
        $perdida = isset($_POST['rbPerdi']) ? $_POST['rbPerdi']: '00';
        $area = $_POST['idAreaObservada'];
        $foto = isset($_POST['ruta_foto']) ? $_POST['ruta_foto'] : '';
        $user = $_SESSION['usuario'];
        $idpuestoobservado = $_POST['idcargo'] ? $_POST['idcargo'] : 151;
        $observado_lugar = isset($_POST['observado_lugar']) ? $_POST['observado_lugar'] : '';
        $observado_puesto = isset($_POST['observado_puesto']) ? $_POST['observado_puesto'] : '';
        $idobservado_tiempo = $_POST['idobservado_tiempo'] != -1 ? $_POST['idobservado_tiempo'] : 1000;
        $idobservado_hora = $_POST['idobservado_hora'] != -1 ? $_POST['idobservado_hora'] : 1000;
        $idobservado_edad = $_POST['idobservado_edad'] != -1 ? $_POST['idobservado_edad'] : 1000;
        $idobservado_lesion = $_POST['idobservado_lesion'] != -1 ? $_POST['idobservado_lesion'] : 1000;
        $idobservado_obstaculo = $_POST['idobservado_obstaculo'] != -1 ? $_POST['idobservado_obstaculo'] : 1000;
        $observado_cambio = isset($_POST['observado_cambio']) ? $_POST['observado_cambio'] : 0;
        $observado_retroalimentacion = isset($_POST['observado_retroalimentacion']) ? $_POST['observado_retroalimentacion'] : 0;
        $observado_reincidente = isset($_POST['observado_reincidente']) ? $_POST['observado_reincidente'] : 0;
        $observado_comentario = isset($_POST['observado_comentario']) ? $_POST['observado_comentario'] : '';
        $idproyectodetalle = isset($_POST['idArea']) ? $_POST['idArea'] : 1000;
        $dniPropietario =  isset($_POST['dni_propietario']) ? $_POST['dni_propietario'] : null;

        $respuestaInsert = $this->model->insertMovil(
            ['idtop' => $topid,
                'sede' => $sede,
                'areaGeneral' => $areaGeneral,
                'ubicacionGeneral' => $ubicacionGeneral,
                'lugar' => $lugar,
                'reportado' => $reportado,
                'fecha' => $fecha,
                'observacion' => $observacion,
                'acsues' => $acsues,
                'cosues' => $cosues,
                'actseg' => $actseg,
                'otros' => $otros,
                'relacion' => $relacion,
                'tipepp' => $tipepp,
                'conepp' => $conepp,
                'preventiva' => $preventiva,
                'correctiva' => $correctiva,
                'perdida' => $perdida,
                'area' => $area,
                'foto' => $foto,
                'user' => $user,
                'observado_lugar' => $observado_lugar,
                'observado_puesto' => $observado_puesto,
                'idobservado_tiempo' => $idobservado_tiempo,
                'idobservado_hora' => $idobservado_hora,
                'idobservado_edad' => $idobservado_edad,
                'idobservado_lesion' => $idobservado_lesion,
                'idobservado_obstaculo' => $idobservado_obstaculo,
                'observado_cambio' => $observado_cambio,
                'observado_retroalimentacion' => $observado_retroalimentacion,
                'observado_reincidente' => $observado_reincidente,
                'observado_comentario' => $observado_comentario,
                'idproyectodetalle' => $idproyectodetalle,
                'idpuestoobservado' => $idpuestoobservado,

            ]);

        $this->elaborarCorreo($topid,$dniPropietario,$perdida,$sede,$preventiva);
        echo $respuesta->enviarRespuesta($respuestaInsert);


    }


    function listaTopByDni($dni,$periodo ){

        return $this->model->listaTopByDni($dni,$periodo);
    }

    public function enviarCorreoTop(){
        $id = 'mo_61ba5125aad37';
        $dniPropietario = '40273456';
        $perdida = '01';
        $sede = '06';
        $preventiva = 'el operador de la retro excavadora sr. jimmy Alcazar realizaba la activudad de excavacion de zanja de lenecesarioeo y sele solicito sus documentos operacionales y no contaba con iperc continuo, petar de xcavacion para la actividad';

        $this->elaborarCorreo($id,$dniPropietario,$perdida,$sede,$preventiva);
    }


    
    public function elaborarCorreo($id,$dniPropietario,$perdida,$sede,$preventiva)
    {
        $idTipoDocumento = 1 ;
        $nombreDocumento = 'Tops';
        $resultado = $this->model->getTopById($id);

        $generatePdf = new GeneratePDF();
        $urlPdf = $generatePdf->generateTopsPdf($resultado);

        $this->model->actualizarUrlPdf($id, $urlPdf);

        if($dniPropietario != null){

            $seguimientoModel = new SeguimientoModel;
            $seguimientoModel->insertarSeguimientoGeneral($id, $dniPropietario, $urlPdf, $idTipoDocumento, $nombreDocumento);    
        }

        $this->enviarEmailAlterta($perdida,$preventiva,$sede,$urlPdf);
    }

    public function enviarEmailAlterta($perdida,$preventiva, $sede, $urlPDF){

        $email = new Email;

        if ($perdida == '01') {

            $email->enviarCorreoTop($preventiva, $sede, $urlPDF);
            
        }
    }


    public function subirImagen()
    {
        $photo_upload = new UploadImage();
        echo $photo_upload->uploadImageWeb($_FILES);
    }



    public function convertObservacionDetalle($data)
    {

        if ($data == "19") {
            $data = "01";
        }
        if ($data == "20") {
            $data = "02";
        }

        if ($data == "21") {
            $data = "03";
        }
        if ($data == "22") {
            $data = "04";
        }

        if ($data == "23") {
            $data = "05";
        }
        if ($data == "24") {
            $data = "06";
        }

        if ($data == "25") {
            $data = "07";
        }
        if ($data == "26") {
            $data = "08";
        }

        if ($data == "27") {
            $data = "09";
        }
        if ($data == "28") {
            $data = "10";
        }

        if ($data == "29") {
            $data = "11";
        }
        if ($data == "30") {
            $data = "12";
        }

        if ($data == "31") {
            $data = "13";
        }

        if ($data == "32") {
            $data = "14";
        }
        if ($data == "33") {
            $data = "15";
        }
        if ($data == "34") {
            $data = "16";
        }
        if ($data == "35") {
            $data = "17";
        }
        if ($data == "36") {
            $data = "01";
        }

        if ($data == "37") {
            $data = "02";
        }
        if ($data == "38") {
            $data = "03";
        }
        if ($data == "39") {
            $data = "04";
        }
        if ($data == "40") {
            $data = "05";
        }
        if ($data == "41") {
            $data = "06";
        }
        if ($data == "42") {
            $data = "07";
        }
        if ($data == "43") {
            $data = "08";
        }

        return $data;
    }



    public function guardarWebNew()
    {

        $respuesta = new Respuesta;
        $uploadImage = new UploadImage;

        $listaEvidencia = $uploadImage->uploadImageGeneral($_FILES["files"]);

        $topid = uniqid('mo_');
        $reportado = $_POST['nombre'];
        $user = $_POST['usuario'];
        $proyecto = str_pad($_POST['proyecto'], 2, "0", STR_PAD_LEFT);
        $area = $_POST['area'] != null ? $_POST['area'] : 1000;
        $ubicacion = $_POST['ubicacion'];
        $fase = $_POST['fase'] != null ? $_POST['fase'] : 1000;
        $horario = $_POST['horario'] != null ? $_POST['horario'] : 1000;
        $fechaRegistro = $_POST['fecha_registro'];
        $observacion = $_POST['observacion'] != null ? $_POST['observacion'] : '00';
        $acsues = ($observacion == '01' ? $_POST['observacion_detalle'] : '00');
        $cosues = ($observacion == '02' ? $_POST['observacion_detalle'] : '00');
        $actseg = ($observacion == '03' ? $_POST['observacion_detalle'] : '00');        
        $otros = $_POST['otros'];
        $relacionado = isset($_POST['relacionado'] ) ? $_POST['relacionado'] : '00';
        $tipoEpp = isset($_POST['tipo_epp']) ? $_POST['tipo_epp'] : '00';
        $condicionEpp = isset($_POST['condicion_epp']) ? $_POST['condicion_epp'] : '00';
        $puestoObservado = $_POST['puesto_observado'];
        $tiempoTrabajo = isset($_POST['tiempo_trabajo']) ? $_POST['tiempo_trabajo'] : 1000;
        $edadObservada = isset($_POST['edad_observada']) ? $_POST['edad_observada'] : 1000;
        $lesion = isset($_POST['lesion']) ? $_POST['lesion'] : 1000;
        $obstaculo = isset($_POST['obstaculo']) ? $_POST['obstaculo'] : 1000;
        $retroalimentacion = isset($_POST['retroalimentacion']) ? $_POST['retroalimentacion'] : 3;
        $cambio = isset($_POST['cambio']) ? $_POST['cambio'] : 3;
        $reincidente = isset($_POST['reincidente']) ? $_POST['reincidente'] : 3;
        $breveDescripcion = $_POST['breve_descripcion'];
        $medidaCorrectiva = $_POST['medida_correctiva'];
        $perdida = isset($_POST['potencial'] ) ? $_POST['potencial'] : '00';
        $responsable = isset($_POST['responsable_accion']) ? $_POST['responsable_accion'] : '77100151';


        $respuestaInsert = $this->model->insertMovil(
            ['idtop' => $topid,
                'sede' => $proyecto,
                'areaGeneral' => 1,
                'ubicacionGeneral' => '',
                'lugar' => '',
                'reportado' => $reportado,
                'fecha' => $fechaRegistro,
                'observacion' => $observacion,
                'acsues' => $acsues,
                'cosues' => $cosues,
                'actseg' => $actseg,
                'otros' => $otros,
                'relacion' => $relacionado,
                'tipepp' => $tipoEpp,
                'conepp' => $condicionEpp,
                'preventiva' => $breveDescripcion,
                'correctiva' => $medidaCorrectiva,
                'perdida' => $perdida,
                'area' => $fase,
                'foto' => $listaEvidencia,
                'user' => $user,
                'observado_lugar' => $ubicacion,
                'observado_puesto' => $puestoObservado,
                'idobservado_tiempo' => $tiempoTrabajo,
                'idobservado_hora' => $horario,
                'idobservado_edad' => $edadObservada,
                'idobservado_lesion' => $lesion,
                'idobservado_obstaculo' => $obstaculo,
                'observado_cambio' => $cambio,
                'observado_retroalimentacion' => $retroalimentacion,
                'observado_reincidente' => $reincidente,
                'observado_comentario' => '',
                'idproyectodetalle' => $area,
                'idpuestoobservado' => 150,

            ]);

        $this->elaborarCorreo($topid,$responsable,$perdida,$proyecto,$breveDescripcion);
        echo $respuesta->enviarRespuesta($respuestaInsert);


    }


}
