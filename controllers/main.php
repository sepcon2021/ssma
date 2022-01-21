<?php

require_once 'status/repuestas.php';

class Main extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            $this->view->render('main/index');
        }

        function loginUser(){
            $user   = $_POST['usuario'];
            $clave  = $_POST['clave'];

            $getUser = $this->model->getByUserPass($user, $clave);
            
            if ( $getUser->usuario ) {
                $this->view->mensaje   = $getUser->iniciales ;
                $this->view->nivel     = $getUser->ssma ;
                $this->view->sedes     = $this->model->getSedesTops();
                $this->view->valores   = $this->model->getValuesTops();
                $this->view->mes       = $this->model->getMonth();

                $this->view->render('panel/index');
            }
            else {
                $this->view->mensaje="Error en la clave o usuario";
                $this->view->render('errores/index');
            }
        }


        function loginUserWeb(){
            $dni     = $_POST['dni'];

            $getUser = $this->model->getUserByDniTrabajador($dni);
            
            if ( $getUser->usuario ) {
                $this->view->mensaje   = $getUser->iniciales ;
                $this->view->nivel     = $getUser->ssma ;
                $this->view->sedes     = $this->model->getSedesTops();
                $this->view->valores   = $this->model->getValuesTops();
                $this->view->mes       = $this->model->getMonth();
                $this->view->dni   = $_SESSION['dni'] ;


                $this->view->render('panel/index');
            }
            else {
                $this->view->mensaje="Error en la clave o usuario";
                $this->view->render('errores/index');
            }
        }

        


        // FUNCION PARA LOGEARSE EN EL SISTEMA DE SSMA

        function getUserMovil(){


            $_respuestas = new respuestas;

            $user  = $_POST['user'];
            $pass  = $_POST['pass'];

            $getUser = $this->model->getUserMovil($user,$pass);

            if($getUser)
            {

            $respuesta = $_respuestas->response;
            $respuesta["result"] = array($getUser);

            }else{
                
            $respuesta=$_respuestas->error_404();

            }

             //delvovemos una respuesta 
            header('Content-Type: application/json');
            if(isset($respuesta["result"]["error_id"])){
                $responseCode = $respuesta["result"]["error_id"];
                http_response_code($responseCode);
            }else{
                http_response_code(200);
            }
            echo json_encode($respuesta);

        }

                // FUNCION PARA LOGEARSE EN EL SISTEMA DE SSMA CON EL DNI

        function getUserByDni(){


            $_respuestas = new respuestas;

            $dni  = $_POST['dni'];

            $getUser = $this->model->getUserByDni($dni);

            if($getUser)
            {

            $respuesta = $_respuestas->response;
            $respuesta["result"] = array($getUser);

            }else{
                
            $respuesta=$_respuestas->error_404();

            }

             //delvovemos una respuesta 
            header('Content-Type: application/json');
            if(isset($respuesta["result"]["error_id"])){
                $responseCode = $respuesta["result"]["error_id"];
                http_response_code($responseCode);
            }else{
                http_response_code(200);
            }
            echo json_encode($respuesta);

        }
    }
?>