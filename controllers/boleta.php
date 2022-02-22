<?php

require_once 'public/generarExcel/reporteBoletas.php';


class Boleta extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        
    public function render()
    {
        
        $this->view->render('boleta/index');
    }


        function reportBoleta()
        {
    
            $MENSUAL = 1;
            $QUINCENAL = 2;
            
            $documentType = $_POST["documentType"];
            $year = $_POST["year"];
    
            
            $listBoletas = $this->model->listBoletas($year);
            $listProyecto = $this->model->listProyecto();
            $listAquariusGroup = array();
    
            foreach ($listProyecto as $proyecto) {
                $listAquarius = $this->model->listAquarius($proyecto['codigo']);
                $list = array("nombre" => $proyecto['nombre'], "listAquarius" => $listAquarius);
                array_push($listAquariusGroup, $list);
            }
    
            $reporte = new ReporteBoletasExcel;
    
            if ($documentType == $MENSUAL) {
                $data = $reporte->generateReportBoletaMensual($listBoletas, $listAquariusGroup,$year);
            } else if($documentType == $QUINCENAL) {
                $data = $reporte->generateReportBoletaQuincenal($listBoletas, $listAquariusGroup,$year);
            }
    
    
    
            echo json_encode(array("url" => $data));
        }

        function getListRRHH(){


            $MENSUAL = 1;
            $QUINCENAL = 2;
            
            $documentType = $_POST["documentType"];
            $year = $_POST["year"];

            $listSede = $this->model->listSede();
            $listProyecto = $this->model->listProyecto();
            $listBoletas = $this->model->listBoletas($year);

            $listGeneral = array();
    
            foreach ($listSede as $sede) {

                $tempSede = array();

                foreach($listProyecto as $proyecto){

                    $list = $this->model->listAquariusPrueba($sede['csede'],$proyecto['codigo']);

                    $tempProyecto = array(
                        "nombreProyecto" => $proyecto['nombre'],
                        "contenidoProyecto" => $list
                    );

                    array_push($tempSede,$tempProyecto);
                    
                }

                $contentSede = array(
                    "nombreSede" => $sede['dsede'],
                    "contenido" => $tempSede
                );

                array_push($listGeneral,$contentSede);
            }

        
            $reporte = new ReporteBoletasExcel;

                
            if ($documentType == $MENSUAL) {
                $data = $reporte->generateReportBoletaMensual($listBoletas, $listGeneral,$year);
            } else if($documentType == $QUINCENAL) {
                $data = $reporte->generateReportBoletaQuincenal($listBoletas, $listGeneral,$year);
            }
    
            echo json_encode(array("url" => $data));        }

    }
