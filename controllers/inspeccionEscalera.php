<?php

class InspeccionEscalera extends Controller {

    function __construct()
    {
        parent::__construct();
    }

    function render(){
        
        session_start();
        
        $this->view->nombres = $_SESSION['nombres'];
        $this->view->usuario = $_SESSION['usuario'];
        $this->view->dni =  $_SESSION['dni'];

        $this->view->render('inspeccionEscalera/index');
    }

    function insert(){

        session_start();

        $sede = $_POST['sede'];
        $id_area = $_POST['id_area'];
        $dni_supervisor = $_POST['dni_responsable'];
        $empresa = $_POST['empresa'];
        $dni_inspeccionado =  $_SESSION['dni'];
        $fecha = $_POST['fecha'];
        $listaInspecciones = $_POST['listaInspecciones'];

        $objeto = compact(
            "sede",
            "id_area",
            "dni_supervisor",
            "empresa",
            "dni_inspeccionado",
            "fecha",
            "listaInspecciones"
        );

        $id = $this->model->insert($objeto);
        $this->model->insertDetalle($listaInspecciones,$id);

        
        echo $this->responseMessageContenido($id);

    }


    function insertMovil(){

        session_start();

        $sede = $_POST['sede'];
        $id_area = $_POST['id_area'];
        $dni_supervisor = $_POST['dni_responsable'];
        $empresa = $_POST['empresa'];
        $dni_inspeccionado =  $_POST['dni_inspeccionado'];
        $fecha = $_POST['fecha'];
        $listaInspecciones = $_POST['listaInspecciones'];

        $objeto = compact(
            "sede",
            "id_area",
            "dni_supervisor",
            "empresa",
            "dni_inspeccionado",
            "fecha",
            "listaInspecciones"
        );

        $id = $this->model->insert($objeto);
        $this->model->insertDetalleMovil($listaInspecciones,$id);

        
        echo $this->responseMessageContenido($id);

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