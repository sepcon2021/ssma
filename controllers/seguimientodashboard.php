<?php
require_once 'controllers/exception.php';
require_once 'public/email/email.php';

require_once 'models/topmodel.php';
require_once 'models/incidenciasmodel.php';
require_once 'models/seguridadmodel.php';
require_once 'models/optmodel.php';
require_once 'models/ipercmodel.php';
require_once 'models/riesgosmodel.php';

class SeguimientoDashboard extends Controller
{



    function __construct()
    {
        parent::__construct();
        $this->exception = new CustomizeException();
    }

    function render()
    {

        session_start();

        $this->view->render('seguimientodashboard/index');
    }

    
}
