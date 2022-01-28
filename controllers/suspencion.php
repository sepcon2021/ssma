<?php
class Suspencion extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        session_start();

        $this->view->nombres = $_SESSION['nombres'];
        $this->view->render('suspencion/index');
    }

    function grabarDocumento()
    {
        session_start();

        $iddoc          = uniqid();
        $proyecto       = $_POST['sede'];
        $lugar          = $_POST['lugar'];
        $fase           = $_POST['frente'];
        $responsable    = $_POST['responsable'];
        $cargo          = $_POST['cargo'];
        $fecha          = $_POST['fecha'];
        $hora           = $_POST['hora'];
        $conduccion     = isset($_POST['chkOpt1']) ? '1' : '0';
        $ptar           = isset($_POST['chkOpt3']) ? '1' : '0';
        $confinados     = isset($_POST['chkOpt5']) ? '1' : '0';
        $energias       = isset($_POST['chkOpt7']) ? '1' : '0';
        $excavaciones   = isset($_POST['chkOpt2']) ? '1' : '0';
        $altura         = isset($_POST['chkOpt4']) ? '1' : '0';
        $caliente       = isset($_POST['chkOpt6']) ? '1' : '0';
        $izaje          = isset($_POST['chkOpt8']) ? '1' : '0';
        $otros          = $_POST['otros'];
        $descripcion    = $_POST['ocurrido'];
        $acciones       = $_POST['acciones'];
        $riesgo         = isset($_POST['riesgo']) ?: null;
        $duracion       = $_POST['duracion'];
        $jefe           = $_POST['jefe'];
        $nropersonas    = $_POST['personas'];
        $observaciones  = $_POST['observaciones'];
        $usuario        = isset($_SESSION['usuario']) ?  $_SESSION['usuario'] :  $_POST['usuario'];
        $ubicacion            =  $_POST['ubicacion'];
        $idAreaObservada            =  $_POST['idAreaObservada'];

        $this->model->insert([
            'iddoc' => $iddoc,
            'proyecto' => $proyecto,
            'lugar' => $lugar,
            'fase' => $fase,
            'responsable' => $responsable,
            'cargo' => $cargo,
            'fecha' => $fecha,
            'hora' => $hora,
            'conduccion' => $conduccion,
            'ptar' => $ptar,
            'confinados' => $confinados,
            'energias' => $energias,
            'excavaciones' => $excavaciones,
            'altura' => $altura,
            'caliente' => $caliente,
            'izaje' => $izaje,
            'otros' => $otros,
            'descripcion' => $descripcion,
            'acciones' => $acciones,
            'riesgo' => $riesgo,
            'duracion' => $duracion,
            'jefe' => $jefe,
            'nropersonas' => $nropersonas,
            'observaciones' => $observaciones,
            'usuario' => $usuario
        ]);
    }

    function grabarDocumentoMovil()
    {
        session_start();


        $return["state"] = true;
        $return["message"] = "Envio exitoso";


        $iddoc          = uniqid();
        $proyecto       = $_POST['sede'];
        $lugar          = $_POST['lugar'];
        $fase           = $_POST['frente'];
        $responsable    = $_POST['responsable'];
        $cargo          = $_POST['cargo'];
        $fecha          = $_POST['fecha'];
        $hora           = $_POST['hora'];
        $conduccion     = $_POST['chkOpt1'];
        $ptar           = $_POST['chkOpt3'];
        $confinados     = $_POST['chkOpt5'];
        $energias       = $_POST['chkOpt7'];
        $excavaciones   = $_POST['chkOpt2'];
        $altura         = $_POST['chkOpt4'];
        $caliente       = $_POST['chkOpt6'];
        $izaje          = $_POST['chkOpt8'];
        $otros          = $_POST['otros'];
        $descripcion    = $_POST['ocurrido'];
        $acciones       = $_POST['acciones'];
        $riesgo         = $_POST['riesgo'];
        $duracion       = $_POST['duracion'];
        $jefe           = $_POST['jefe'];
        $nropersonas    = $_POST['personas'];
        $observaciones  = $_POST['observaciones'];
        $usuario        = $_POST['usuario'];

        $idusuario        = $_POST['idusuario'];
        $ubicacion            =  $_POST['ubicacion'];
        $idAreaObservada            =  $_POST['idAreaObservada'];

        $insert = $this->model->insert([
            'iddoc' => $iddoc,
            'proyecto' => $proyecto,
            'lugar' => $lugar,
            'fase' => $fase,
            'responsable' => $responsable,
            'cargo' => $cargo,
            'fecha' => $fecha,
            'hora' => $hora,
            'conduccion' => $conduccion,
            'ptar' => $ptar,
            'confinados' => $confinados,
            'energias' => $energias,
            'excavaciones' => $excavaciones,
            'altura' => $altura,
            'caliente' => $caliente,
            'izaje' => $izaje,
            'otros' => $otros,
            'descripcion' => $descripcion,
            'acciones' => $acciones,
            'riesgo' => $riesgo,
            'duracion' => $duracion,
            'jefe' => $jefe,
            'nropersonas' => $nropersonas,
            'observaciones' => $observaciones,
            'usuario' => $usuario,

            'idusuario' => $idusuario,
            'ubicacion' => $ubicacion,
            'idAreaObservada' => $idAreaObservada
        ]);



        if (!$insert) {
            // echo "Guardado desde Celular";
            $return["state"] = false;
            $return["message"] =  "Problemas en nuestros servicios";
        }


        header('Content-Type: application/json');
        // tell browser that its a json data
        echo json_encode($return);
        //converting array to JSON string
    }


    function grabarDocumentoWebNew()
    {

        $return["state"] = false;
        $return["message"] =  "Problemas en nuestros servicios";



        $iddoc          = uniqid();
        $proyecto       = $_POST['proyecto'];
        $lugar          = $_POST['lugar'];
        $fase           = $_POST['frente_trabajo'];
        $responsable    = $_POST['responsable_trabajo'];
        $cargo          = $_POST['cargo_trabajo'];
        $fecha          = $_POST['fecha_trabajo'];
        $hora           = $_POST['hora_trabajo'];
        $conduccion     = isset($_POST['chkOpt1']) ? '1' : '0';
        $ptar           = isset($_POST['chkOpt3']) ? '1' : '0';
        $confinados     = isset($_POST['chkOpt5']) ? '1' : '0';
        $energias       = isset($_POST['chkOpt7']) ? '1' : '0';
        $excavaciones   = isset($_POST['chkOpt2']) ? '1' : '0';
        $altura         = isset($_POST['chkOpt4']) ? '1' : '0';
        $caliente       = isset($_POST['chkOpt6']) ? '1' : '0';
        $izaje          = isset($_POST['chkOpt8']) ? '1' : '0';
        $otros          = $_POST['otros_especificar'];
        $descripcion    = $_POST['ocurrido'];
        $acciones       = $_POST['acciones'];
        $riesgo         = isset($_POST['riesgo']) ?: null;
        $duracion       = $_POST['duracion'];
        $jefe           = $_POST['nombre_jefe'];
        $nropersonas    = $_POST['numero_personas'];
        $observaciones  = $_POST['observaciones'];
        $usuario        = $_POST['usuario'];

        $idusuario        = '';
        $ubicacion            =  '';
        $idAreaObservada            =  1;

        $insert = $this->model->insert([
            'iddoc' => $iddoc,
            'proyecto' => $proyecto,
            'lugar' => $lugar,
            'fase' => $fase,
            'responsable' => $responsable,
            'cargo' => $cargo,
            'fecha' => $fecha,
            'hora' => $hora,
            'conduccion' => $conduccion,
            'ptar' => $ptar,
            'confinados' => $confinados,
            'energias' => $energias,
            'excavaciones' => $excavaciones,
            'altura' => $altura,
            'caliente' => $caliente,
            'izaje' => $izaje,
            'otros' => $otros,
            'descripcion' => $descripcion,
            'acciones' => $acciones,
            'riesgo' => $riesgo,
            'duracion' => $duracion,
            'jefe' => $jefe,
            'nropersonas' => $nropersonas,
            'observaciones' => $observaciones,
            'usuario' => $usuario,

            'idusuario' => $idusuario,
            'ubicacion' => $ubicacion,
            'idAreaObservada' => $idAreaObservada
        ]);



        if ($insert) {

            $return["state"] = true;
            $return["message"] = "Envio exitoso";
        }

        header('Content-Type: application/json');
        // tell browser that its a json data
        echo json_encode($return);
        //converting array to JSON string
    }
}
