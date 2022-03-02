<?php

require_once 'controllers/respuesta.php';
require_once 'public/excel/generateExcel.php';

class Reporte extends Controller{

    const TOP = 1;
    const SEGURIDAD = 2;
    const INCIDENCIA = 3;
    const OPT = 4;
    const IPERC = 5;
    const PTAR = 6;
    const GERENCIAL = 7;
    const SUSPENCION = 8;
    const INSPECCION_BOTIQUIN = 9;



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
            $result =  $this->model->seguridadReport($proyecto, $fechaInicio, $fechaFin);
        }
        if($typeDocument == self::INCIDENCIA){
            $result =  $this->model->incidenciaReport($proyecto, $fechaInicio, $fechaFin);
        }
        if($typeDocument == self::OPT){
            $result =  $this->model->optReport($proyecto, $fechaInicio, $fechaFin);
        }
        if($typeDocument == self::IPERC){
            $result =  $this->model->ipercReport($proyecto, $fechaInicio, $fechaFin);
        }
        if($typeDocument == self::PTAR){
            $result =  $this->model->ptarReport($proyecto, $fechaInicio, $fechaFin);
        }
        if($typeDocument == self::GERENCIAL){
            $result =  $this->model->gerencialReport($proyecto, $fechaInicio, $fechaFin);
        }
        if($typeDocument == self::SUSPENCION){
            $result =  $this->model->suspencionReport($proyecto, $fechaInicio, $fechaFin);
        }
        if($typeDocument == self::INSPECCION_BOTIQUIN){
            $result =  $this->model->inspeccionBotiquinReport($proyecto, $fechaInicio, $fechaFin);
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
        $result = '';
        $listReport = array();
        
        if($typeDocument == self::TOP){
            $listReport =  $this->model->topsReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->typeFormTops($formatoReporte,$listReport);
        }
        if($typeDocument == self::SEGURIDAD){
            $listReport =  $this->model->seguridadReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->typeFormSeguridad($formatoReporte,$listReport);
        }
        if($typeDocument == self::INCIDENCIA){
            $listReport =  $this->model->incidenciaReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->generateIncidenciaFormato1($listReport);
        }
        if($typeDocument == self::OPT){
            $listReport =  $this->model->optReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->generateOptFormato1($listReport);
        }
        if($typeDocument == self::IPERC){
            $listReport =  $this->model->ipercReport($proyecto, $fechaInicio, $fechaFin);
            $listRiesgoCritico =  $this->model->iperRiesgoCritico();
            $result = $reportExcel->generateIpercFormato1($listReport,$listRiesgoCritico);
        }
        if($typeDocument == self::PTAR){
            $listReport =  $this->model->ptarReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->generatePtarFormato1($listReport);
        }
        if($typeDocument == self::GERENCIAL){
            $listReport =  $this->model->gerencialReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->generateGerencialFormato1($listReport);
        }
        if($typeDocument == self::SUSPENCION){
            $listReport =  $this->model->suspencionReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->generateSuspencionFormato1($listReport);
        }
        if($typeDocument == self::INSPECCION_BOTIQUIN){
            $listReport =  $this->model->inspeccionBotiquinReport($proyecto, $fechaInicio, $fechaFin);
            $result = $reportExcel->generateBotiquinFormato1($listReport);
        }
        return $result;

    }

}


