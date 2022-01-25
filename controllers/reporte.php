<?php

require_once 'controllers/respuesta.php';
require_once 'public/excel/generateExcel.php';

class Reporte extends Controller{

    const TOP = 1;
    const SEGURIDAD = 2;
    const INCIDENCIA = 3;
    const OPT = 4;
    const IPERC = 5;
    const RIESGO = 6;



    function __construct()
    {
        parent::__construct();
    }

    function render(){

        $this->view->render('reporte/index');
    }

    function getReportGeneral(){

        $respuesta = new Respuesta;

        $tipoDocumento = $_POST['tipo_documento'];
        $proyecto = $_POST['proyecto'];
        $fechaInicio = $_POST['fecha_inicio'];
        $fechaFin = $_POST['fecha_fin'];

        $listReport = $this->typeDocument($tipoDocumento,$proyecto, $fechaInicio, $fechaFin);

        echo $respuesta->enviarRespuestaLista($listReport);

    }

    function typeDocument($typeDocument,$proyecto, $fechaInicio, $fechaFin){

        $result = array();
        
        if($typeDocument == self::TOP){
           $result =  $this->model->topsReport($proyecto, $fechaInicio, $fechaFin);
        }
        if($typeDocument == self::SEGURIDAD){

        }
        if($typeDocument == self::INCIDENCIA){

        }
        if($typeDocument == self::IPERC){

        }
        if($typeDocument == self::OPT){

        }
        if($typeDocument == self::RIESGO){

        }


        return $result;

    }


    
    function getReportGeneralExcel(){

        $respuesta = new Respuesta;

        $tipoDocumento = $_POST['tipo_documento'];
        $proyecto = $_POST['proyecto'];
        $fechaInicio = $_POST['fecha_inicio'];
        $fechaFin = $_POST['fecha_fin'];
        $formatoReporte = $_POST['formato_reporte'];

        $listReport = $this->typeDocumentExcel($tipoDocumento,$proyecto, $fechaInicio, $fechaFin,$formatoReporte);

        echo $respuesta->enviarRespuestaExcel($listReport);

    }

    function typeDocumentExcel($typeDocument,$proyecto, $fechaInicio, $fechaFin,$formatoReporte){
        $reportExcel = new GenerateExcel;
        $result = array();
        $listReport = array();
        
        if($typeDocument == self::TOP){
            $listReport =  $this->model->topsReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->typeFormaTops($formatoReporte,$listReport);
        }
        if($typeDocument == self::SEGURIDAD){

        }
        if($typeDocument == self::INCIDENCIA){

        }
        if($typeDocument == self::IPERC){

        }
        if($typeDocument == self::OPT){

        }
        if($typeDocument == self::RIESGO){

        }

        return $result;

    }

}