<?php

require_once 'controllers/exception.php';
require_once 'status/repuestas.php';
require_once 'public/upload-photo/upload-image.php';

class LeccionesAprendidas extends Controller{

        function __construct()
        {
            parent::__construct();
        }

        function render(){
            $this->view->render('leccionesAprendidas/index');
        }

        function renderGeneral(){
            $this->view->render('leccionesAprendidas/leccionGeneral');
        }

        function insertLeccion(){

            $uploadImage = new UploadImage;
            $answer = new CustomizeException();

            $listaEvidencia = $uploadImage->guardarArchivosGeneral($_FILES["files"]);

            $nombre = $_POST['nombre'];
            $urlPdf = $listaEvidencia ;
            $usuario = $_POST['usuario'];

            $data = compact('nombre','urlPdf','usuario');
            $result = $this->model->insert($data);
            echo $answer->responseMessageObjeto($result);

        }

        function getListLecciones(){

            $answer = new CustomizeException();
            $result = $this->model->listLecciones();
            echo $answer->responseMessageContenido($result);
        }

        function deleteLeccion(){

            $answer = new CustomizeException();
            
            $id = $_POST['id'];

            $result = $this->model->delete(compact('id'));
            echo $answer->responseMessage($result);
        }

    }
