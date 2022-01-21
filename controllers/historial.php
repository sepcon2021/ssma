<?php

require_once 'models/topmodel.php';
require_once 'models/seguridadmodel.php';
require_once 'controllers/respuesta.php';

class Historial extends Controller
{
    const TOPS = 1 ;
    const SEGURIDAD = 5;

    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        session_start();

        $this->view->nombres = $_SESSION['nombres'];
        $this->view->usuario = $_SESSION['usuario'];
        $this->view->render('top/index');
    }

    function listRecordByIdDocumentAndPeriod(){
        
        $respuesta = new Respuesta;

        $idDocument = $_POST['idDocument'];
        $dni = $_POST['dni'];
        $periodo = $_POST['period'];

        if($idDocument == self::TOPS){
            $top = new Topmodel;
            $lista = $top->listaTopByDni($dni,$periodo );
        }
        if($idDocument == self::SEGURIDAD){
            $seguridad =  new SeguridadModel;
            $lista =  $seguridad->listSecurityByDni($dni,$periodo);
        }

        echo $respuesta->enviarRespuestaLista($lista);

    }


}
