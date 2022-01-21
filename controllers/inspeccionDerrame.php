<?php

class InspeccionDerrame extends Controller {

    function __construct()
    {
        parent::__construct();
    }

    function render(){
        
        session_start();

        
                        
        $this->view->nombres = $_SESSION['nombres'];
        $this->view->usuario = $_SESSION['usuario'];
        $this->view->dni =  $_SESSION['dni'];
        
        $this->view->render('inspeccionDerrame/index');
    }

    
    function insert(){

        session_start();

        $sede = $_POST['sede'];
        $id_area = $_POST['id_area'];
        $dni_inspeccionado = $_SESSION['dni'];
        $dni_responsable = $_POST['dni_responsable'];
        $observacion = $_POST['observacion'];

        $equipo_otros_uno = isset($_POST['equipo_otros_uno']) ? $_POST['equipo_otros_uno'] : '';
        $cantidad_otros_uno =isset( $_POST['cantidad_otros_uno']) ?  $_POST['cantidad_otros_uno'] : '';

        $equipo_otros_dos = isset($_POST['equipo_otros_dos']) ? $_POST['equipo_otros_dos'] : '';
        $cantidad_otros_dos = isset( $_POST['cantidad_otros_dos']) ? $_POST['cantidad_otros_dos'] : '';

        $equipo_otros_tres = isset($_POST['equipo_otros_tres']) ?$_POST['equipo_otros_tres'] : '' ;
        $cantidad_otros_tres = isset($_POST['cantidad_otros_tres']) ? $_POST['cantidad_otros_tres'] :'';

        $equipo_otros_cuatro = isset($_POST['equipo_otros_cuatro']) ?$_POST['equipo_otros_cuatro'] : '' ;
        $cantidad_otros_cuatro = isset($_POST['cantidad_otros_cuatro']) ? $_POST['cantidad_otros_cuatro'] :'';

        $fecha = $_POST['fecha'];

        $listaInspecciones = $_POST['listaInspecciones'];

        $objeto = compact(
            "sede",
            "id_area",
            "dni_inspeccionado",
            "dni_responsable",
            "observacion",

            "equipo_otros_uno",
            "cantidad_otros_uno",

            "equipo_otros_dos",
            "cantidad_otros_dos",

            "equipo_otros_tres",
            "cantidad_otros_tres",

            "equipo_otros_cuatro",
            "cantidad_otros_cuatro",

            "fecha",

            "listaInspecciones"
        );

        $id = $this->model->insert($objeto);
        $this->model->insertDetalle($listaInspecciones,$id);
        
        echo $this->responseMessageContenido($id);

    }


    function insertMovil(){


        $sede = $_POST['sede'];
        $id_area = $_POST['id_area'];
        $dni_inspeccionado = $_POST['dni_inspeccionado'];
        $dni_responsable = $_POST['dni_responsable'];
        $observacion = $_POST['observacion'];

        $equipo_otros_uno = isset($_POST['equipo_otros_uno']) ? $_POST['equipo_otros_uno'] : '';
        $cantidad_otros_uno =isset( $_POST['cantidad_otros_uno']) ?  $_POST['cantidad_otros_uno'] : '';

        $equipo_otros_dos = isset($_POST['equipo_otros_dos']) ? $_POST['equipo_otros_dos'] : '';
        $cantidad_otros_dos = isset( $_POST['cantidad_otros_dos']) ? $_POST['cantidad_otros_dos'] : '';

        $equipo_otros_tres = isset($_POST['equipo_otros_tres']) ?$_POST['equipo_otros_tres'] : '' ;
        $cantidad_otros_tres = isset($_POST['cantidad_otros_tres']) ? $_POST['cantidad_otros_tres'] :'';

        $equipo_otros_cuatro = isset($_POST['equipo_otros_cuatro']) ?$_POST['equipo_otros_cuatro'] : '' ;
        $cantidad_otros_cuatro = isset($_POST['cantidad_otros_cuatro']) ? $_POST['cantidad_otros_cuatro'] :'';

        $fecha = $_POST['fecha'];

        $listaInspecciones = $_POST['listaInspecciones'];

        $objeto = compact(
            "sede",
            "id_area",
            "dni_inspeccionado",
            "dni_responsable",
            "observacion",

            "equipo_otros_uno",
            "cantidad_otros_uno",

            "equipo_otros_dos",
            "cantidad_otros_dos",

            "equipo_otros_tres",
            "cantidad_otros_tres",

            "equipo_otros_cuatro",
            "cantidad_otros_cuatro",

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