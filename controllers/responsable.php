<?php

class Responsable extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    function listaReponsableByProyectoByFase(){

        $idProyecto = $_POST['idProyecto'];
        $idFase = str_pad($_POST['idFase'], 2, "0", STR_PAD_LEFT);
        

        $lista_proyectos= $this->model->listaResponsableByProyectoByFase($idProyecto,$idFase);
        echo json_encode($lista_proyectos,JSON_UNESCAPED_UNICODE);
    }

    function listaReponsableByProyecto(){

        $idProyecto = $_POST['idProyecto'];

        $lista_proyectos= $this->model->listaResponsableByProyecto($idProyecto);
        echo json_encode($lista_proyectos,JSON_UNESCAPED_UNICODE);
    }

}