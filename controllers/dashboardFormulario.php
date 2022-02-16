<?php

class DashboardFormulario extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('dashboardFormulario/index');
    }


  
    //LISTA EXAMEN BY FECHA
    public function listaExamenByFecha()
    {

        $codigoproyecto = $_POST['codigoproyecto'];

        $respuesta = $this->model->listaExamenByFecha($codigoproyecto);

        echo $this->responseMessageContenido($respuesta);
    }



    public function responseMessage($value)
    {
        if ($value) {
            $return["status"] = 200;
            $return["contenido"] = "ok";

        } else {

            $return["status"] = 404;
            $return["contenido"] = "Problemas en nuestros servicios";

        }

        header('Content-Type: application/json');
        return json_encode($return);
    }

    public function responseMessageContenido($value)
    {
        if ($value != null) {
            $return["status"] = 200;
            $return["contenido"] = $value;

        } else {

            $return["status"] = 404;
            $return["contenido"] = "Problemas en nuestros servicios";

        }

        header('Content-Type: application/json');
        return json_encode($return);
    }

}
