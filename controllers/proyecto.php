<?php

    class Proyecto extends Controller {

        function __construct()
        {
            parent::__construct();
        }

        function getListaProyecto(){
           $lista_proyectos= $this->model->getProyectos();
           echo json_encode($lista_proyectos,JSON_UNESCAPED_UNICODE);

        }

        function getListaProyectobbdd(){
            $lista_proyectos= $this->model->getProyectosbbdd();
            echo json_encode($lista_proyectos,JSON_UNESCAPED_UNICODE);
 
         }
    }

?>