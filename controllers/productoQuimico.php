<?php

class ProductoQuimico extends Controller {

    function __construct()
    {
        parent::__construct();
    }

    function render(){
        
        session_start();

        
                        
        $this->view->nombres = $_SESSION['nombres'];
        $this->view->usuario = $_SESSION['usuario'];
        $this->view->dni =  $_SESSION['dni'];
        
        $this->view->render('productoQuimico/index');
    }

    
    function insert(){

        session_start();

        $sede = $_POST['sede'];
        $id_area = $_POST['id_area'];
        $lugar = $_POST['lugar'];
        $fecha = $_POST['fecha'];
        $dni_usuario = $_SESSION['dni'];
        $dni_responsable = $_POST['dni_responsable'];
        $listaInspecciones = $_POST['listaInspecciones'];

        $objeto = compact(
            "sede",
            "id_area",
            "lugar",
            "fecha",
            "dni_usuario",
            "dni_responsable",
            "listaInspecciones"
        );

        //Agregamos en la tabla inspeccion_oficina
        $id = $this->model->insert($objeto);

        //Luego agregamos dentro de la tabla inspeccion_oficina_detalle
        $this->model->insertDetalle($listaInspecciones,$id);

        
        echo $this->responseMessageContenido($id);

    }


    function insertMovil(){


        $sede = $_POST['sede'];
        $id_area = $_POST['id_area'];
        $lugar = $_POST['lugar'];
        $fecha = $_POST['fecha'];
        $dni_usuario = $_POST['dni_usuario'];
        $dni_responsable = $_POST['dni_responsable'];
        $listaInspecciones = $_POST['listaInspecciones'];

        $objeto = compact(
            "sede",
            "id_area",
            "lugar",
            "fecha",
            "dni_usuario",
            "dni_responsable",
            "listaInspecciones"
        );

        //Agregamos en la tabla inspeccion_oficina
        $id = $this->model->insert($objeto);

        //Luego agregamos dentro de la tabla inspeccion_oficina_detalle
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