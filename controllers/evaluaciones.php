<?php

require_once 'public/generate-pdf/evaluacionPdf.php';

require_once 'models/formulariomodel.php';

require_once 'public/generarExcel/reporteNotas.php';


class Evaluaciones extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('evaluaciones/index');
    }



    public function generatePDFByIdExamen()
    {

        $respuestaJson=array();


        $idExamen = $_POST['idExamen'];

        $evaluacion = $this->model->getExamenDetalleById($idExamen);

        if($evaluacion!= null){

            // Generamos PDF
            
            $urlPDF=$this->generatePdf($evaluacion);


            $respuestaJson = array(
                "status" =>200,
                "contenido" => $urlPDF,
            );

        }else{

            $respuestaJson = array(
                "status" =>404,
                "contenido" => "No encontramos registros del mes",
            );
        }

        echo json_encode($respuestaJson, JSON_UNESCAPED_UNICODE);


    }

    
    public function generatePdf($evaluacion){

        $pdf=new EvaluacionPDF();

        return $pdf->generateAsistenciaPdf($evaluacion);
    }




    public function generateExcel()
    {

        $respuestaJson=array();


        $idExamen = $_POST['idExamen'];



        $pregunta = $this->model->getExamenPreguntasDetalleById($idExamen);

        $evaluacion = $this->model->getListaRegistroByIdExamen($idExamen);

        



        if($pregunta != null){

            $respuestaJson = array(
                "status" =>200,
                "contenido" => $pregunta,
            );

        }else{

            $respuestaJson = array(
                "status" =>404,
                "contenido" => "No encontramos registros del mes",
            );
        }

        echo json_encode($respuestaJson, JSON_UNESCAPED_UNICODE);


    }

    public function listaNotas(){

        $idExamen = $_POST['idExamen'];
        $codigoProyecto = $_POST['codigoProyecto'];

        $listaExamenesNotas = $this->model->listaNotas($idExamen,$this->convertCodigoProyecto($codigoProyecto));
        $excel =  new ReporteNotasExcel;
        $ruta =  $excel->generateReporteNotas($listaExamenesNotas);

        if(count($listaExamenesNotas)>0){

            $respuestaJson = array(
                "status" =>200,
                "contenido" => $ruta,
            );

        }else{

            $respuestaJson = array(
                "status" =>404,
                "contenido" => "No encontramos registros del mes",
            );
        }

        echo json_encode($respuestaJson, JSON_UNESCAPED_UNICODE);

    }


    public function convertCodigoProyecto($codigo){
        $codigoProyecto = '';

        if($codigo == 1){
            $codigoProyecto = '280000';
        }else if($codigo == 2){
            $codigoProyecto = '283000';
        }else if($codigo == 3){
            $codigoProyecto = '300000';
        }
        return $codigoProyecto;
    }

 
     public function prueba(){
        
        $listaExamenesNotas = $this->model->listaNotasSGI(202);

        echo json_encode($listaExamenesNotas, JSON_UNESCAPED_UNICODE);

    }


    function reportBoleta(){
        $listAquarius = $this->model->listAquarius();
        $listBoletas = $this->model->listBoletas();

        $reporte = new ReporteNotasExcel;
        $data = $reporte->generateReportBoleta($listBoletas,$listAquarius);

        echo json_encode(array("data" => $data));

    }


}
