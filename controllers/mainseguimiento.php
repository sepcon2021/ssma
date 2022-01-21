<?php

class MainSeguimiento extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {

        $this->view->render('mainseguimiento/index');
    }

    public function getTrabajadorByDni()
    {

        $respuesta=array();

        $dniTrabajador = $_POST['dniTrabajador'];

        $usuarioTrabajador = $this->model->getTrabajadorByDni($dniTrabajador);

        if ($usuarioTrabajador != null) {

            $salidajson = array(
                "dni" => $usuarioTrabajador['dni'],
                "apellidos" => $usuarioTrabajador['apellidos'],
                "nombres" => $usuarioTrabajador['nombres'],
                "dcargo" => $usuarioTrabajador['dcargo']
            );

            $respuesta=array(
                "status" => 200,
                "respuesta"=> $salidajson 
            );

        }else{
            
            $respuesta=array(
                "status" => 404,
                "respuesta"=> ""
            );
        }

        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);


    }


}
