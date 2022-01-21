<?php

class InspeccionEstacionEmergencia extends Controller {

    function __construct()
    {
        parent::__construct();
    }

    function render(){
        
        session_start();
        
        $this->view->nombres = $_SESSION['nombres'];
        $this->view->usuario = $_SESSION['usuario'];
        $this->view->dni =  $_SESSION['dni'];

        $this->view->render('inspeccionEstacionEmergencia/index');
    }


    function insert(){

        session_start();

        $id_tipo_inspeccion = $_POST['id_tipo_inspeccion'];
        $sede = $_POST['sede'];
        $id_area = $_POST['id_area'];
        $lugar_inspeccion = $_POST['lugar_inspeccion'];
        $estacion = $_POST['estacion'];
        $dni_inspeccionado =  $_SESSION['dni'];
        $dni_responsable = $_POST['dni_responsable'];
        $observacion = $_POST['observacion'];
        $fecha = $_POST['fecha'];
        $listaInspecciones = $_POST['listaInspecciones'];

        $objeto = compact(
            "id_tipo_inspeccion",
            "sede",
            "id_area",
            "lugar_inspeccion",
            "estacion",
            "dni_inspeccionado",
            "dni_responsable",
            "observacion",
            "fecha",
            "listaInspecciones"
        );

        $id = $this->model->insert($objeto);
        $this->model->insertDetalle($listaInspecciones,$id);
        
        echo $this->responseMessageContenido($id);

    }

    function insertMovil(){

        session_start();

        $id_tipo_inspeccion = $_POST['id_tipo_inspeccion'];
        $sede = $_POST['sede'];
        $id_area = $_POST['id_area'];
        $lugar_inspeccion = $_POST['lugar_inspeccion'];
        $estacion = $_POST['estacion'];
        $dni_inspeccionado =  $_POST['dni_inspeccionado'];
        $dni_responsable = $_POST['dni_responsable'];
        $observacion = $_POST['observacion'];
        $fecha = $_POST['fecha'];
        $listaInspecciones = $_POST['listaInspecciones'];

        $objeto = compact(
            "id_tipo_inspeccion",
            "sede",
            "id_area",
            "lugar_inspeccion",
            "estacion",
            "dni_inspeccionado",
            "dni_responsable",
            "observacion",
            "fecha",
            "listaInspecciones"
        );

        $id = $this->model->insert($objeto);
        $this->model->insertDetalleMovil($listaInspecciones,$id);
        
        echo $this->responseMessageContenidoMovil($id);

    }


    public function responseMessageContenido($value)
    {
        if ($value !=  0) {
            $return["status"] = 200;
            $return["contenido"] = $value;

        } else {

            $return["status"] = 404;
            $return["contenido"] = "Problemas en nuestros servicios";

        }

        header('Content-Type: application/json');
        return json_encode($return);
    }


    
    public function responseMessageContenidoMovil($value)
    {

        $return["state"] = false;
        $return["message"] =  "Problemas en nuestros servicios";

        if ($value !=  0) {
        
            $return["state"] = true;
            $return["message"] = "Envio exitoso";
            
        } 

        header('Content-Type: application/json');
        return json_encode($return);
    }
}