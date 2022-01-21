<?php

require_once 'models/seguimientomodel.php';
require_once 'public/generate-pdf/generatepdf.php';

class IpercNuevo extends Controller {

        function __construct()
        {
            parent::__construct();
        }

        function render(){

            $this->view->render('ipercNuevo/index');
        }


        function saveDocumentIpercMovil(){


            $return["state"] = true;
            $return["message"] = "Envio exitoso";
            
            
            $idProyecto=	$_POST['idProyecto'];
            $idArea=	$_POST['idArea'];
            $ubicacion=$_POST['ubicacion'];
            $idAreaObservada=$_POST['idAreaObservada'];
            $nombre_tarea=$_POST['nombre_tarea'];
            $fecha=	$_POST['fecha'];
            $idusuario=	$_POST['idusuario'];
            $empresa=	$_POST['empresa'];
            $riesgo1=	$_POST['riesgo1'];
            $comentario1=	$_POST['comentario1'];
            $riesgo2= $_POST['riesgo2'];
            $comentario2=	$_POST['comentario2'];
            $riesgo3=	$_POST['riesgo3'];
            $comentario3=	$_POST['comentario3'];
            $riesgo4=	$_POST['riesgo4'];
            $comentario4=	$_POST['comentario4'];
            $riesgo5=	$_POST['riesgo5'];
            $comentario5=	$_POST['comentario5'];
            $riesgo6=	$_POST['riesgo6'];
            $comentario6=	$_POST['comentario6'];
            $riesgo7=	$_POST['riesgo7'];
            $comentario7=	$_POST['comentario7'];
            $riesgo8=	$_POST['riesgo8'];
            $comentario8=	$_POST['comentario8'];
            $riesgo9=	$_POST['riesgo9'];
            $comentario9=	$_POST['comentario9'];
            $riesgo10=	$_POST['riesgo10'];
            $comentario10=	$_POST['comentario10'];
            $riesgo11=	$_POST['riesgo11'];
            $comentario11=	$_POST['comentario11'];
            $riesgo12=	$_POST['riesgo12'];
            $comentario12=	$_POST['comentario12'];
            $riesgo13=	$_POST['riesgo13'];
            $comentario13=	$_POST['comentario13'];
            $riesgo14=	$_POST['riesgo14'];
            $comentario14=	$_POST['comentario14'];
            $riesgo15=	$_POST['riesgo15'];
            $comentario15=	$_POST['comentario15'];
            $riesgo16=	$_POST['riesgo16'];
            $comentario16=	$_POST['comentario16'];
            
            $riesgo_critico1 = isset($_POST['riesgo_critico1']) ? $_POST['riesgo_critico1'] : 4;
            $comentario_critico1 = isset($_POST['comentario_critico1']) ? $_POST['comentario_critico1'] : '' ;
            $riesgo_critico2 = isset($_POST['riesgo_critico2']) ? $_POST['riesgo_critico2'] : 4;
            $comentario_critico2 = isset($_POST['comentario_critico2']) ? $_POST['comentario_critico2'] : '' ;
            $riesgo_critico3 = isset($_POST['riesgo_critico3']) ? $_POST['riesgo_critico3'] : 4;
            $comentario_critico3 = isset($_POST['comentario_critico3']) ? $_POST['comentario_critico3'] : '' ;
            $riesgo_critico4 = isset($_POST['riesgo_critico4']) ? $_POST['riesgo_critico4'] : 4;
            $comentario_critico4 = isset($_POST['comentario_critico4']) ? $_POST['comentario_critico4'] : '' ;
            $riesgo_critico5 = isset($_POST['riesgo_critico5']) ? $_POST['riesgo_critico5'] : 4;
            $comentario_critico5 = isset($_POST['comentario_critico5']) ? $_POST['comentario_critico5'] : '' ;
            $riesgo_critico6 = isset($_POST['riesgo_critico6']) ? $_POST['riesgo_critico6'] : 4;
            $comentario_critico6 = isset($_POST['comentario_critico6']) ? $_POST['comentario_critico6'] : '' ;
            $riesgo_critico7 = isset($_POST['riesgo_critico7']) ? $_POST['riesgo_critico7'] : 4;
            $comentario_critico7 = isset($_POST['comentario_critico7']) ? $_POST['comentario_critico7'] : '' ;
            $riesgo_critico8 = isset($_POST['riesgo_critico8']) ? $_POST['riesgo_critico8'] : 4;
            $comentario_critico8 = isset($_POST['comentario_critico8']) ? $_POST['comentario_critico8'] : '' ;
            $riesgo_critico9 = isset($_POST['riesgo_critico9']) ? $_POST['riesgo_critico9'] : 4;
            $comentario_critico9 = isset($_POST['comentario_critico9']) ? $_POST['comentario_critico9'] : '' ;
            $riesgo_critico10 = isset($_POST['riesgo_critico10']) ? $_POST['riesgo_critico10'] : 4;
            $comentario_critico10 = isset($_POST['comentario_critico10']) ? $_POST['comentario_critico10'] : '' ;
            $riesgo_critico11 = isset($_POST['riesgo_critico11']) ? $_POST['riesgo_critico11'] : 4;
            $comentario_critico11 = isset($_POST['comentario_critico11']) ? $_POST['comentario_critico11'] : '' ;
            $riesgo_critico12 = isset($_POST['riesgo_critico12']) ? $_POST['riesgo_critico12'] : 4;
            $comentario_critico12 = isset($_POST['comentario_critico12']) ? $_POST['comentario_critico12'] : '' ;
            $riesgo_critico13 = isset($_POST['riesgo_critico13']) ? $_POST['riesgo_critico13'] : 4;
            $comentario_critico13 = isset($_POST['comentario_critico13']) ? $_POST['comentario_critico13'] : '' ;
            $riesgo_critico14 = isset($_POST['riesgo_critico14']) ? $_POST['riesgo_critico14'] : 4;
            $comentario_critico14 = isset($_POST['comentario_critico14']) ? $_POST['comentario_critico14'] : '' ;
            $riesgo_critico15 = isset($_POST['riesgo_critico15']) ? $_POST['riesgo_critico15'] : 4;
            $comentario_critico15 = isset($_POST['comentario_critico15']) ? $_POST['comentario_critico15'] : '' ;
            $riesgo_critico16 = isset($_POST['riesgo_critico16']) ? $_POST['riesgo_critico16'] : 4;
            $comentario_critico16 = isset($_POST['comentario_critico16']) ? $_POST['comentario_critico16'] : '' ;
            $riesgo_critico17 = isset($_POST['riesgo_critico17']) ? $_POST['riesgo_critico17'] : 4;
            $comentario_critico17 = isset($_POST['comentario_critico17']) ? $_POST['comentario_critico17'] : '' ;
            $riesgo_critico18 = isset($_POST['riesgo_critico18']) ? $_POST['riesgo_critico18'] : 4;
            $comentario_critico18 = isset($_POST['comentario_critico18']) ? $_POST['comentario_critico18'] : '' ;
            $riesgo_critico19 = isset($_POST['riesgo_critico19']) ? $_POST['riesgo_critico19'] : 4;
            $comentario_critico19 = isset($_POST['comentario_critico19']) ? $_POST['comentario_critico19'] : '' ;
            $riesgo_critico20 = isset($_POST['riesgo_critico20']) ? $_POST['riesgo_critico20'] : 4;
            $comentario_critico20 = isset($_POST['comentario_critico20']) ? $_POST['comentario_critico20'] : '' ;
            $riesgo_manos1=	$_POST['riesgo_manos1'];
            $riesgo_manos2=	$_POST['riesgo_manos2'];
            $riesgo_manos3=	$_POST['riesgo_manos3'];
            $riesgo_covid2=	$_POST['riesgo_covid2'];
            $riesgo_covid3=	$_POST['riesgo_covid3'];
            $riesgo_covid4=	$_POST['riesgo_covid4'];
            $riesgo_covid5=	$_POST['riesgo_covid5'];
            $riesgo_covid6=	$_POST['riesgo_covid6'];
            $riesgo_covid7=	$_POST['riesgo_covid7'];
            $idTipoRiesgo =	$_POST['idTipoRiesgo'];
            $dni_propietario = $_POST['dni_propietario'];



            $datos = compact("idProyecto","idArea","ubicacion","idAreaObservada","nombre_tarea","fecha","idusuario","empresa",
            "riesgo1","comentario1","riesgo2","comentario2","riesgo3","comentario3","riesgo4","comentario4","riesgo5","comentario5",
            "riesgo6","comentario6","riesgo7","comentario7","riesgo8","comentario8","riesgo9","comentario9","riesgo10","comentario10",
            "riesgo11","comentario11","riesgo12","comentario12","riesgo13","comentario13","riesgo14","comentario14","riesgo15","comentario15","riesgo16","comentario16",
            "riesgo_critico1","comentario_critico1", "riesgo_critico2","comentario_critico2", "riesgo_critico3","comentario_critico3", "riesgo_critico4","comentario_critico4", "riesgo_critico5","comentario_critico5", "riesgo_critico6","comentario_critico6", "riesgo_critico7","comentario_critico7", "riesgo_critico8","comentario_critico8", "riesgo_critico9","comentario_critico9", "riesgo_critico10","comentario_critico10", "riesgo_critico11","comentario_critico11", "riesgo_critico12","comentario_critico12", "riesgo_critico13","comentario_critico13", "riesgo_critico14","comentario_critico14", "riesgo_critico15","comentario_critico15", "riesgo_critico16","comentario_critico16", "riesgo_critico17","comentario_critico17", "riesgo_critico18","comentario_critico18", "riesgo_critico19","comentario_critico19", "riesgo_critico20","comentario_critico20",
            "riesgo_manos1","riesgo_manos2","riesgo_manos3",
            "riesgo_covid2","riesgo_covid3","riesgo_covid4","riesgo_covid5","riesgo_covid6","riesgo_covid7","idTipoRiesgo");

            $idInsert = $this->model->insertiperc($datos);                         
            $this->elaborarCorreo($idInsert, $dni_propietario);

            if($idInsert==null){
                 $return["state"] = false;
                 $return["message"] =  "Problemas en nuestros servicios";
             }
 
             header('Content-Type: application/json');
             echo json_encode($return);
        }


        function saveDocumentIpercWeb(){

            session_start();
          
            $idProyecto=	$_POST['idProyecto'];
            $idArea= isset($_POST['idArea']) ? $_POST['idArea'] : 1000 ;
            $ubicacion=$_POST['ubicacion'];
            $idAreaObservada=$_POST['idAreaObservada'];

            $nombre_tarea=$_POST['nombre_tarea'];
            $fecha=	$_POST['fecha'];
            $idusuario=	$_SESSION['internal'];
            $empresa=	$_POST['empresa'];

            $riesgo1=	$_POST['riesgo1'];
            $comentario1=	$_POST['comentario1'];
            $riesgo2= $_POST['riesgo2'];
            $comentario2=	$_POST['comentario2'];
            $riesgo3=	$_POST['riesgo3'];
            $comentario3=	$_POST['comentario3'];
            $riesgo4=	$_POST['riesgo4'];
            $comentario4=	$_POST['comentario4'];
            $riesgo5=	$_POST['riesgo5'];
            $comentario5=	$_POST['comentario5'];
            $riesgo6=	$_POST['riesgo6'];
            $comentario6=	$_POST['comentario6'];
            $riesgo7=	$_POST['riesgo7'];
            $comentario7=	$_POST['comentario7'];
            $riesgo8=	$_POST['riesgo8'];
            $comentario8=	$_POST['comentario8'];
            $riesgo9=	$_POST['riesgo9'];
            $comentario9=	$_POST['comentario9'];
            $riesgo10=	$_POST['riesgo10'];
            $comentario10=	$_POST['comentario10'];
            $riesgo11=	$_POST['riesgo11'];
            $comentario11=	$_POST['comentario11'];
            $riesgo12=	$_POST['riesgo12'];
            $comentario12=	$_POST['comentario12'];
            $riesgo13=	$_POST['riesgo13'];
            $comentario13=	$_POST['comentario13'];
            $riesgo14=	$_POST['riesgo14'];
            $comentario14=	$_POST['comentario14'];
            $riesgo15=	$_POST['riesgo15'];
            $comentario15=	$_POST['comentario15'];
            $riesgo16=	$_POST['riesgo16'];
            $comentario16=	$_POST['comentario16'];


            $riesgo_critico1 = isset($_POST['riesgo_critico1']) ? $_POST['riesgo_critico1'] : 4;
            $comentario_critico1 = isset($_POST['comentario_critico1']) ? $_POST['comentario_critico1'] : '' ;
            $riesgo_critico2 = isset($_POST['riesgo_critico2']) ? $_POST['riesgo_critico2'] : 4;
            $comentario_critico2 = isset($_POST['comentario_critico2']) ? $_POST['comentario_critico2'] : '' ;
            $riesgo_critico3 = isset($_POST['riesgo_critico3']) ? $_POST['riesgo_critico3'] : 4;
            $comentario_critico3 = isset($_POST['comentario_critico3']) ? $_POST['comentario_critico3'] : '' ;
            $riesgo_critico4 = isset($_POST['riesgo_critico4']) ? $_POST['riesgo_critico4'] : 4;
            $comentario_critico4 = isset($_POST['comentario_critico4']) ? $_POST['comentario_critico4'] : '' ;
            $riesgo_critico5 = isset($_POST['riesgo_critico5']) ? $_POST['riesgo_critico5'] : 4;
            $comentario_critico5 = isset($_POST['comentario_critico5']) ? $_POST['comentario_critico5'] : '' ;
            $riesgo_critico6 = isset($_POST['riesgo_critico6']) ? $_POST['riesgo_critico6'] : 4;
            $comentario_critico6 = isset($_POST['comentario_critico6']) ? $_POST['comentario_critico6'] : '' ;
            $riesgo_critico7 = isset($_POST['riesgo_critico7']) ? $_POST['riesgo_critico7'] : 4;
            $comentario_critico7 = isset($_POST['comentario_critico7']) ? $_POST['comentario_critico7'] : '' ;
            $riesgo_critico8 = isset($_POST['riesgo_critico8']) ? $_POST['riesgo_critico8'] : 4;
            $comentario_critico8 = isset($_POST['comentario_critico8']) ? $_POST['comentario_critico8'] : '' ;
            $riesgo_critico9 = isset($_POST['riesgo_critico9']) ? $_POST['riesgo_critico9'] : 4;
            $comentario_critico9 = isset($_POST['comentario_critico9']) ? $_POST['comentario_critico9'] : '' ;
            $riesgo_critico10 = isset($_POST['riesgo_critico10']) ? $_POST['riesgo_critico10'] : 4;
            $comentario_critico10 = isset($_POST['comentario_critico10']) ? $_POST['comentario_critico10'] : '' ;
            $riesgo_critico11 = isset($_POST['riesgo_critico11']) ? $_POST['riesgo_critico11'] : 4;
            $comentario_critico11 = isset($_POST['comentario_critico11']) ? $_POST['comentario_critico11'] : '' ;
            $riesgo_critico12 = isset($_POST['riesgo_critico12']) ? $_POST['riesgo_critico12'] : 4;
            $comentario_critico12 = isset($_POST['comentario_critico12']) ? $_POST['comentario_critico12'] : '' ;
            $riesgo_critico13 = isset($_POST['riesgo_critico13']) ? $_POST['riesgo_critico13'] : 4;
            $comentario_critico13 = isset($_POST['comentario_critico13']) ? $_POST['comentario_critico13'] : '' ;
            $riesgo_critico14 = isset($_POST['riesgo_critico14']) ? $_POST['riesgo_critico14'] : 4;
            $comentario_critico14 = isset($_POST['comentario_critico14']) ? $_POST['comentario_critico14'] : '' ;
            $riesgo_critico15 = isset($_POST['riesgo_critico15']) ? $_POST['riesgo_critico15'] : 4;
            $comentario_critico15 = isset($_POST['comentario_critico15']) ? $_POST['comentario_critico15'] : '' ;
            $riesgo_critico16 = isset($_POST['riesgo_critico16']) ? $_POST['riesgo_critico16'] : 4;
            $comentario_critico16 = isset($_POST['comentario_critico16']) ? $_POST['comentario_critico16'] : '' ;
            $riesgo_critico17 = isset($_POST['riesgo_critico17']) ? $_POST['riesgo_critico17'] : 4;
            $comentario_critico17 = isset($_POST['comentario_critico17']) ? $_POST['comentario_critico17'] : '' ;
            $riesgo_critico18 = isset($_POST['riesgo_critico18']) ? $_POST['riesgo_critico18'] : 4;
            $comentario_critico18 = isset($_POST['comentario_critico18']) ? $_POST['comentario_critico18'] : '' ;
            $riesgo_critico19 = isset($_POST['riesgo_critico19']) ? $_POST['riesgo_critico19'] : 4;
            $comentario_critico19 = isset($_POST['comentario_critico19']) ? $_POST['comentario_critico19'] : '' ;
            $riesgo_critico20 = isset($_POST['riesgo_critico20']) ? $_POST['riesgo_critico20'] : 4;
            $comentario_critico20 = isset($_POST['comentario_critico20']) ? $_POST['comentario_critico20'] : '' ;

            $riesgo_manos1=	$_POST['riesgo_manos1'];
            $riesgo_manos2=	$_POST['riesgo_manos2'];
            $riesgo_manos3=	$_POST['riesgo_manos3'];
            $riesgo_covid2=	$_POST['riesgo_covid2'];
            $riesgo_covid3=	$_POST['riesgo_covid3'];
            $riesgo_covid4=	$_POST['riesgo_covid4'];
            $riesgo_covid5=	$_POST['riesgo_covid5'];
            $riesgo_covid6=	$_POST['riesgo_covid6'];
            $riesgo_covid7=	$_POST['riesgo_covid7'];
            $dni_propietario = $_POST['dni_propietario'];
            $idTipoRiesgo =	$_POST['idTipoRiesgo'];

            $datos = compact("idProyecto","idArea","ubicacion","idAreaObservada","nombre_tarea","fecha","idusuario","empresa",
            "riesgo1","comentario1","riesgo2","comentario2","riesgo3","comentario3","riesgo4","comentario4","riesgo5","comentario5",
            "riesgo6","comentario6","riesgo7","comentario7","riesgo8","comentario8","riesgo9","comentario9","riesgo10","comentario10",
            "riesgo11","comentario11","riesgo12","comentario12","riesgo13","comentario13","riesgo14","comentario14","riesgo15","comentario15","riesgo16","comentario16",
            "riesgo_critico1","comentario_critico1", "riesgo_critico2","comentario_critico2", "riesgo_critico3","comentario_critico3", "riesgo_critico4","comentario_critico4", "riesgo_critico5","comentario_critico5", "riesgo_critico6","comentario_critico6", "riesgo_critico7","comentario_critico7", "riesgo_critico8","comentario_critico8", "riesgo_critico9","comentario_critico9", "riesgo_critico10","comentario_critico10", "riesgo_critico11","comentario_critico11", "riesgo_critico12","comentario_critico12", "riesgo_critico13","comentario_critico13", "riesgo_critico14","comentario_critico14", "riesgo_critico15","comentario_critico15", "riesgo_critico16","comentario_critico16", "riesgo_critico17","comentario_critico17", "riesgo_critico18","comentario_critico18", "riesgo_critico19","comentario_critico19", "riesgo_critico20","comentario_critico20",
            "riesgo_manos1","riesgo_manos2","riesgo_manos3",
            "riesgo_covid2","riesgo_covid3","riesgo_covid4","riesgo_covid5","riesgo_covid6","riesgo_covid7","idTipoRiesgo");

            $idIperc = $this->model->insertiperc($datos);                         
            $this->elaborarCorreo($idIperc, $dni_propietario);

            echo $idIperc;

        }


        function listQuestionByRisk(){
            
            $list = $this->model->listQuestionsByRisk();
            echo json_encode($list);

        }

        
        public function elaborarCorreo($idIperc, $dniPropietario)
        {
            $idTipoDocumento = 5;
            $nombreDocumento = 'Inspección de IPERC continuo';
            $iperc = $this->buscarIperc($idIperc);
            $urlPdf = $this-> generarPDF($iperc);
            $this->actualizarUrlPdf($iperc['id'],$urlPdf);
            $this->insertarSeguimiento($idIperc, $dniPropietario, $urlPdf, $idTipoDocumento, $nombreDocumento);            
        }


        function buscarIperc($idIperc){
            return  $this->model->findByIdIperc($idIperc);
        }

        function generarPDF($iperc){
            $generatePdf = new GeneratePDF();
            return  $generatePdf->generateIpercPdf($iperc);
        }

        function actualizarUrlPdf($idIperc ,$urlPdf){
            $this->model->actualizarUrlPdfIperc($idIperc, $urlPdf);
        }

        function insertarSeguimiento($idIperc, $dniPropietario, $urlPdf, $idTipoDocumento, $nombreDocumento){
            $seguimientoModel = new SeguimientoModel;
            $seguimientoModel->insertarSeguimientoGeneral($idIperc, $dniPropietario, $urlPdf, $idTipoDocumento, $nombreDocumento);
        }


        function saveDocumentIpercWebNew(){

            session_start();
          
            $idProyecto=	$_POST['proyecto'];
            $idArea= isset($_POST['area']) ? $_POST['area'] : 1000 ;
            $ubicacion=$_POST['ubicacion'];
            $idAreaObservada=$_POST['fase'];

            $nombre_tarea=$_POST['nombre_tarea'];
            $fecha=	$_POST['fecha_elaboracion'];
            $idusuario=	$_POST['internal'];
            $empresa=	$_POST['empresa'];

            $riesgo1=	$_POST['riesgo1'];
            $comentario1=	$_POST['comentario1'];
            $riesgo2= $_POST['riesgo2'];
            $comentario2=	$_POST['comentario2'];
            $riesgo3=	$_POST['riesgo3'];
            $comentario3=	$_POST['comentario3'];
            $riesgo4=	$_POST['riesgo4'];
            $comentario4=	$_POST['comentario4'];
            $riesgo5=	$_POST['riesgo5'];
            $comentario5=	$_POST['comentario5'];
            $riesgo6=	$_POST['riesgo6'];
            $comentario6=	$_POST['comentario6'];
            $riesgo7=	$_POST['riesgo7'];
            $comentario7=	$_POST['comentario7'];
            $riesgo8=	$_POST['riesgo8'];
            $comentario8=	$_POST['comentario8'];
            $riesgo9=	$_POST['riesgo9'];
            $comentario9=	$_POST['comentario9'];
            $riesgo10=	$_POST['riesgo10'];
            $comentario10=	$_POST['comentario10'];
            $riesgo11=	$_POST['riesgo11'];
            $comentario11=	$_POST['comentario11'];
            $riesgo12=	$_POST['riesgo12'];
            $comentario12=	$_POST['comentario12'];
            $riesgo13=	$_POST['riesgo13'];
            $comentario13=	$_POST['comentario13'];
            $riesgo14=	$_POST['riesgo14'];
            $comentario14=	$_POST['comentario14'];
            $riesgo15=	$_POST['riesgo15'];
            $comentario15=	$_POST['comentario15'];
            $riesgo16=	$_POST['riesgo16'];
            $comentario16=	$_POST['comentario16'];


            $riesgo_critico1 = isset($_POST['riesgo_critico1']) ? $_POST['riesgo_critico1'] : 4;
            $comentario_critico1 = isset($_POST['comentario_critico1']) ? $_POST['comentario_critico1'] : '' ;
            $riesgo_critico2 = isset($_POST['riesgo_critico2']) ? $_POST['riesgo_critico2'] : 4;
            $comentario_critico2 = isset($_POST['comentario_critico2']) ? $_POST['comentario_critico2'] : '' ;
            $riesgo_critico3 = isset($_POST['riesgo_critico3']) ? $_POST['riesgo_critico3'] : 4;
            $comentario_critico3 = isset($_POST['comentario_critico3']) ? $_POST['comentario_critico3'] : '' ;
            $riesgo_critico4 = isset($_POST['riesgo_critico4']) ? $_POST['riesgo_critico4'] : 4;
            $comentario_critico4 = isset($_POST['comentario_critico4']) ? $_POST['comentario_critico4'] : '' ;
            $riesgo_critico5 = isset($_POST['riesgo_critico5']) ? $_POST['riesgo_critico5'] : 4;
            $comentario_critico5 = isset($_POST['comentario_critico5']) ? $_POST['comentario_critico5'] : '' ;
            $riesgo_critico6 = isset($_POST['riesgo_critico6']) ? $_POST['riesgo_critico6'] : 4;
            $comentario_critico6 = isset($_POST['comentario_critico6']) ? $_POST['comentario_critico6'] : '' ;
            $riesgo_critico7 = isset($_POST['riesgo_critico7']) ? $_POST['riesgo_critico7'] : 4;
            $comentario_critico7 = isset($_POST['comentario_critico7']) ? $_POST['comentario_critico7'] : '' ;
            $riesgo_critico8 = isset($_POST['riesgo_critico8']) ? $_POST['riesgo_critico8'] : 4;
            $comentario_critico8 = isset($_POST['comentario_critico8']) ? $_POST['comentario_critico8'] : '' ;
            $riesgo_critico9 = isset($_POST['riesgo_critico9']) ? $_POST['riesgo_critico9'] : 4;
            $comentario_critico9 = isset($_POST['comentario_critico9']) ? $_POST['comentario_critico9'] : '' ;
            $riesgo_critico10 = isset($_POST['riesgo_critico10']) ? $_POST['riesgo_critico10'] : 4;
            $comentario_critico10 = isset($_POST['comentario_critico10']) ? $_POST['comentario_critico10'] : '' ;
            $riesgo_critico11 = isset($_POST['riesgo_critico11']) ? $_POST['riesgo_critico11'] : 4;
            $comentario_critico11 = isset($_POST['comentario_critico11']) ? $_POST['comentario_critico11'] : '' ;
            $riesgo_critico12 = isset($_POST['riesgo_critico12']) ? $_POST['riesgo_critico12'] : 4;
            $comentario_critico12 = isset($_POST['comentario_critico12']) ? $_POST['comentario_critico12'] : '' ;
            $riesgo_critico13 = isset($_POST['riesgo_critico13']) ? $_POST['riesgo_critico13'] : 4;
            $comentario_critico13 = isset($_POST['comentario_critico13']) ? $_POST['comentario_critico13'] : '' ;
            $riesgo_critico14 = isset($_POST['riesgo_critico14']) ? $_POST['riesgo_critico14'] : 4;
            $comentario_critico14 = isset($_POST['comentario_critico14']) ? $_POST['comentario_critico14'] : '' ;
            $riesgo_critico15 = isset($_POST['riesgo_critico15']) ? $_POST['riesgo_critico15'] : 4;
            $comentario_critico15 = isset($_POST['comentario_critico15']) ? $_POST['comentario_critico15'] : '' ;
            $riesgo_critico16 = isset($_POST['riesgo_critico16']) ? $_POST['riesgo_critico16'] : 4;
            $comentario_critico16 = isset($_POST['comentario_critico16']) ? $_POST['comentario_critico16'] : '' ;
            $riesgo_critico17 = isset($_POST['riesgo_critico17']) ? $_POST['riesgo_critico17'] : 4;
            $comentario_critico17 = isset($_POST['comentario_critico17']) ? $_POST['comentario_critico17'] : '' ;
            $riesgo_critico18 = isset($_POST['riesgo_critico18']) ? $_POST['riesgo_critico18'] : 4;
            $comentario_critico18 = isset($_POST['comentario_critico18']) ? $_POST['comentario_critico18'] : '' ;
            $riesgo_critico19 = isset($_POST['riesgo_critico19']) ? $_POST['riesgo_critico19'] : 4;
            $comentario_critico19 = isset($_POST['comentario_critico19']) ? $_POST['comentario_critico19'] : '' ;
            $riesgo_critico20 = isset($_POST['riesgo_critico20']) ? $_POST['riesgo_critico20'] : 4;
            $comentario_critico20 = isset($_POST['comentario_critico20']) ? $_POST['comentario_critico20'] : '' ;

            $riesgo_manos1=	$_POST['riesgo_manos1'];
            $riesgo_manos2=	$_POST['riesgo_manos2'];
            $riesgo_manos3=	$_POST['riesgo_manos3'];
            $riesgo_covid2=	$_POST['riesgo_covid2'];
            $riesgo_covid3=	$_POST['riesgo_covid3'];
            $riesgo_covid4=	$_POST['riesgo_covid4'];
            $riesgo_covid5=	$_POST['riesgo_covid5'];
            $riesgo_covid6=	$_POST['riesgo_covid6'];
            $riesgo_covid7=	$_POST['riesgo_covid7'];
            $dni_propietario = $_POST['responsable_accion'];
            $idTipoRiesgo =	$_POST['riesgo_critico'];
            $url_pdf = "";

            $datos = compact("idProyecto","idArea","ubicacion","idAreaObservada","nombre_tarea","fecha","idusuario","empresa",
            "riesgo1","comentario1","riesgo2","comentario2","riesgo3","comentario3","riesgo4","comentario4","riesgo5","comentario5",
            "riesgo6","comentario6","riesgo7","comentario7","riesgo8","comentario8","riesgo9","comentario9","riesgo10","comentario10",
            "riesgo11","comentario11","riesgo12","comentario12","riesgo13","comentario13","riesgo14","comentario14","riesgo15","comentario15","riesgo16","comentario16",
            "riesgo_critico1","comentario_critico1", "riesgo_critico2","comentario_critico2", "riesgo_critico3","comentario_critico3", "riesgo_critico4","comentario_critico4", "riesgo_critico5","comentario_critico5", "riesgo_critico6","comentario_critico6", "riesgo_critico7","comentario_critico7", "riesgo_critico8","comentario_critico8", "riesgo_critico9","comentario_critico9", "riesgo_critico10","comentario_critico10", "riesgo_critico11","comentario_critico11", "riesgo_critico12","comentario_critico12", "riesgo_critico13","comentario_critico13", "riesgo_critico14","comentario_critico14", "riesgo_critico15","comentario_critico15", "riesgo_critico16","comentario_critico16", "riesgo_critico17","comentario_critico17", "riesgo_critico18","comentario_critico18", "riesgo_critico19","comentario_critico19", "riesgo_critico20","comentario_critico20",
            "riesgo_manos1","riesgo_manos2","riesgo_manos3",
            "riesgo_covid2","riesgo_covid3","riesgo_covid4","riesgo_covid5","riesgo_covid6","riesgo_covid7","idTipoRiesgo","url_pdf");

            $idIperc = $this->model->insertiperc($datos);                         
            $this->elaborarCorreo($idIperc, $dni_propietario);

            echo $idIperc;

        }



}

?>

