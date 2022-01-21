<?php

class Checklist extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render(){
       // session_start();

        //$this->view->nombres = $_SESSION['nombres'];
        //$this->view->usuario = $_SESSION['usuario'];
        $this->view->render('checklist/index');
    }

    function grabarDocumento(){


        $iddoc                  = uniqid();
        $fecha                  = $_POST['fecha'];
        $placa                  = $_POST['placa'];
        $marca                  = $_POST['marca'];
        $year                   =$_POST['year'];
        $modelo                  =$_POST['modelo'];
        $hora                   =$_POST['hora'];
        $clase                   =$_POST['clase'];
        $color                   =$_POST['color'];
        $vencimiento                   =$_POST['vencimiento'];
        $vencimiento_inspeccion_vehiculo                  =$_POST['vencimiento_inspeccion_vehiculo'];
        $propietario                  =$_POST['propietario'];
        $fecha_vencimiento_poliza                  =$_POST['fecha_vencimiento_poliza'];
        $otros                  =$_POST['otros'];
        $conductor                   =$_POST['conductor'];
        $brevete                   =$_POST['brevete'];
        $chkpt_lic_inter                  =$_POST['chkpt_lic_inter'];
        $chkpt_relacion                  =$_POST['chkpt_relacion'];
        $nombre_empresa                   =$_POST['nombre_empresa'];
        
        $chkpt_motivo                  =$_POST['chkpt_motivo'];
        $chkpt01                   =$_POST['chkpt01'];
        $observacion01                   =$_POST['observacion01'];
        $chkpt02                   =$_POST['chkpt02'];
        $observacion02                   =$_POST['observacion02'];
        $chkpt03                   =$_POST['chkpt03'];
        $observacion03                   =$_POST['observacion03'];
        $chkpt04                   =$_POST['chkpt04'];
        $observacion04                   =$_POST['observacion04'];
        $chkpt05                   =$_POST['chkpt05'];
        $observacion05                   =$_POST['observacion05'];
        $chkpt06                   =$_POST['chkpt06'];
        $observacion06                   =$_POST['observacion06'];
        $chkpt07                   =$_POST['chkpt07'];
        $observacion08                   =$_POST['observacion08'];


        $obervaciones_generales                   =$_POST['obervaciones_generales'];
        $km_inicio                   =$_POST['km_inicio'];
        $km_final                   =$_POST['km_final'];
        
        
        echo "We are going tom return new data " . $iddoc . " - "  . $fecha . " - " .  $placa . " - " .$marca . " / Add checks " . $chkpt01  . "  -  " . $observacion01   ;
    }

    }

?>