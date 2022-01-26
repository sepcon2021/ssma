<?php


require_once 'public/upload-photo/upload-image.php';
require_once 'public/generate-pdf/generatepdf.php';
require_once 'models/seguimientomodel.php';

class Opt extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {

        $this->view->render('opt/index');
    }

    function saveDocumentOptMovil()
    {

        $return["state"] = true;
        $return["message"] = "Envio exitoso";


        $data_observacion = json_decode($_POST['data_observacion']);
        $data_recomendacion = json_decode($_POST['data_recomendacion']);
        $data_observadores = json_decode($_POST['data_observadores']);


        $idProyecto = $_POST['idProyecto'];
        $idArea = $_POST['idArea'];
        $idAreaObservada = $_POST['idAreaObservada'];
        $ubicacion = $_POST['ubicacion'];
        $nombre = $_POST['nombre'];
        $tiempo_proyecto = $_POST['tiempo_proyecto'];
        $tiempo_trabajo = $_POST['tiempo_trabajo'];
        //POSIBLEMENTE PUEDE SER COMENTADO
        $area = $_POST['area'];
        $guardia = $_POST['guardia'];
        $ocupacion = $_POST['ocupacion'];
        $tarea = $_POST['tarea'];
        $fecha = $_POST['fecha'];
        $razon_opt = $_POST['razon_opt'];
        $firma_gerente = $_POST['firma_gerente'];
        $idusuario = $_POST['idusuario'];
        $oportunidades = $_POST['oportunidades'];
        $responsable = $_POST['responsable'];
        $idRiesgoCritico = $_POST['idRiesgoCritico'];
        $idPetLog = $_POST['idPetLog'];


        $datos = compact(
            "nombre",
            "tiempo_proyecto",
            "tiempo_trabajo",
            "area",
            "guardia",
            "ocupacion",
            "tarea",
            "fecha",
            "razon_opt",
            "firma_gerente",
            "idusuario",
            "idProyecto",
            "idArea",
            "idAreaObservada",
            "ubicacion",
            "oportunidades",
            "responsable",
            "idRiesgoCritico",
            "idPetLog"
        );

        // EL INSERT NOS VA RETORNA EL ID DEL ROW SI FUE EXITOSO
        $idInsert = $this->model->insertopt($datos);

        //INSERTAMOS LA LISTA DE OBSERVACIONES 
        foreach ($data_observacion as &$valor) {

            $idOpt = $idInsert;
            $pasos = $valor->pasos;
            $observaciones = $valor->observaciones;

            $datos = compact("idOpt", "pasos", "observaciones");

            $this->model->insertOptObservacion($datos);
        }

        //INSERTAMOS LA LISTA DE RECOMENDACIONES REALIZADAS


        foreach ($data_recomendacion as &$valor) {

            $idOpt = $idInsert;
            $acciones = $valor->acciones;
            $fecha = $valor->fecha;

            $datos = compact("idOpt", "acciones", "fecha");

            $this->model->insertOptRecomendaciones($datos);
        }

        //INSERTAMOS LA LISTA DE OBSERVADORES


        foreach ($data_observadores as &$valor) {

            $idOpt = $idInsert;
            $nombre = $valor->nombre;


            $datos = compact("idOpt", "nombre");

            $this->model->insertOptObservadores($datos);
        }




        if ($idInsert == null) {

            // echo "Guardado desde Celular";
            $return["state"] = false;
            $return["message"] =  "Problemas en nuestros servicios";
        }

        $this->elaborarCorreo($idInsert , $responsable);


        header('Content-Type: application/json');
        // tell browser that its a json data
        echo json_encode($return);
        //converting array to JSON string

    }

    function saveDocumentOptWeb()
    {

        session_start();

        $data_observacion = json_decode($_POST['data_observacion']);
        $data_recomendacion = json_decode($_POST['data_recomendacion']);
        $data_observadores = json_decode($_POST['data_observadores']);

        $idProyecto = $_POST['idProyecto'];
        $idArea = isset($_POST['idArea']) ? $_POST['idArea'] : 1000;
        $idAreaObservada = $_POST['idAreaObservada'];
        $ubicacion = $_POST['ubicacion'];
        $nombre = $_POST['nombre_equipo_observador'];
        $tiempo_proyecto = $_POST['tiempo_proyecto'];
        $tiempo_trabajo = $_POST['tiempo_trabajo'];
        $dni_propietario = $_POST['dni_propietario'];
        $responsable = $_POST['dni_propietario'];
        $idRiesgoCritico = $_POST['idRiesgoCritico'];
        $idPetLog = $_POST['idPetLog'];
        $area = '';
        $guardia = $_POST['guardia'];
        $ocupacion = $_POST['ocupacion'];
        $tarea = $_POST['tarea'];
        $fecha = $_POST['fecha'];
        $razon_opt = $_POST['razon_opt'];
        $firma_gerente = '';
        $idusuario = $_SESSION['internal'];
        $oportunidades = $_POST['oportunidades'];

        $datos = compact(
            "nombre",
            "tiempo_proyecto",
            "tiempo_trabajo",
            "area",
            "guardia",
            "ocupacion",
            "tarea",
            "fecha",
            "razon_opt",
            "firma_gerente",
            "idusuario",
            "idProyecto",
            "idArea",
            "idAreaObservada",
            "ubicacion",
            "oportunidades",
            "responsable",
            "idRiesgoCritico",
            "idPetLog"
        );

        $idInsert = $this->model->insertopt($datos);

        //INSERTAMOS LA LISTA DE OBSERVACIONES 
        foreach ($data_observacion as &$valor) {

            $idOpt = $idInsert;
            $pasos = $valor->pasos;
            $observaciones = $valor->observaciones;

            $datos = compact("idOpt", "pasos", "observaciones");

            $this->model->insertOptObservacion($datos);
        }

        //INSERTAMOS LA LISTA DE RECOMENDACIONES REALIZADAS
        foreach ($data_recomendacion as &$valor) {

            $idOpt = $idInsert;
            $acciones = $valor->acciones;
            $fecha = $valor->fecha;

            $datos = compact("idOpt", "acciones","fecha");

            $this->model->insertOptRecomendaciones($datos);
        }

        //INSERTAMOS LA LISTA DE OBSERVADORES
        foreach ($data_observadores as &$valor) {

            $idOpt = $idInsert;
            $nombre = $valor->nombre;
            // $firma=$valor->firma;

            $datos = compact("idOpt", "nombre");

            $this->model->insertOptObservadores($datos);
        }


        $this->elaborarCorreo($idInsert , $dni_propietario);



        echo $idInsert;
    }


    public function elaborarCorreo($idOpt, $dniPropietario)
    {
        if(strlen($dniPropietario) > 0){

            $idTipoDocumento = 4;
            $nombreDocumento = 'Observación planeada de tarea (OPT)';
            $resultado = $this->model->buscarByIdOpt($idOpt);
    
            $generatePdf = new GeneratePDF();
            $urlPdf = $generatePdf->generateOptPdf($resultado);
    
            $this->model->actualizarUrlPdfOpt($idOpt, $urlPdf);
    
            $seguimientoModel = new SeguimientoModel;
            $seguimientoModel->insertarSeguimientoGeneral($idOpt, $dniPropietario, $urlPdf, $idTipoDocumento, $nombreDocumento);
        
        }

    }

    public function pruebaOPT1(){
        $resultado = $this->model->buscarByIdOpt("127");
        header('Content-Type: application/json');
        echo json_encode($resultado);

    }

    public function pruebaOPT(){
        
        $idOpt = $_POST['id'];

        $resultado = $this->model->buscarByIdOpt($idOpt);

        $generatePdf = new GeneratePDF();
        $urlPdf = $generatePdf->generateOptPdf($resultado);

        $this->model->actualizarUrlPdfOpt($idOpt, $urlPdf);

        echo $urlPdf;
    }



    function saveDocumentOptWebNew()
    {

        session_start();

        $data_observacion = json_decode($_POST['data_observacion']);
        $data_recomendacion = json_decode($_POST['data_recomendacion']);
        $data_observadores = json_decode($_POST['data_observadores']);

        $idProyecto = $_POST['proyecto'];
        $idArea = isset($_POST['area']) ? $_POST['area'] : 1000;
        $idAreaObservada = $_POST['fase'];
        $ubicacion = $_POST['ubicacion'];
        $nombre = $_POST['nombre_equipo_observado'];
        $tiempo_proyecto = $_POST['tiempo_trabajo'];
        $tiempo_trabajo = $_POST['tiempo_trabajo_actual'];
        $dni_propietario = $_POST['responsable_accion'];
        $responsable = $_POST['responsable_accion'];
        $idRiesgoCritico = $_POST['riesgo_critico'];
        $idPetLog = $_POST['pet'];
        $area = '';
        $guardia = $_POST['guardia'];
        $ocupacion = $_POST['ocupacion'];
        $tarea = $_POST['tarea'];
        $fecha = $_POST['fecha_incidente'];
        $razon_opt = $_POST['razon'];
        $firma_gerente = '';
        $idusuario = $_POST['internal'];
        $oportunidades = $_POST['oportunidades'];

        $datos = compact(
            "nombre",
            "tiempo_proyecto",
            "tiempo_trabajo",
            "area",
            "guardia",
            "ocupacion",
            "tarea",
            "fecha",
            "razon_opt",
            "firma_gerente",
            "idusuario",
            "idProyecto",
            "idArea",
            "idAreaObservada",
            "ubicacion",
            "oportunidades",
            "responsable",
            "idRiesgoCritico",
            "idPetLog"
        );

        $idInsert = $this->model->insertopt($datos);

        //INSERTAMOS LA LISTA DE OBSERVACIONES 
        foreach ($data_observacion as &$valor) {

            $idOpt = $idInsert;
            $pasos = $valor->pasos;
            $observaciones = $valor->observaciones;

            $datos = compact("idOpt", "pasos", "observaciones");

            $this->model->insertOptObservacion($datos);
        }

        //INSERTAMOS LA LISTA DE RECOMENDACIONES REALIZADAS
        foreach ($data_recomendacion as &$valor) {

            $idOpt = $idInsert;
            $acciones = $valor->acciones;
            $fecha = $valor->fecha;

            $datos = compact("idOpt", "acciones","fecha");

            $this->model->insertOptRecomendaciones($datos);
        }

        //INSERTAMOS LA LISTA DE OBSERVADORES
        foreach ($data_observadores as &$valor) {

            $idOpt = $idInsert;
            $nombre = $valor->nombre;
            // $firma=$valor->firma;

            $datos = compact("idOpt", "nombre");

            $this->model->insertOptObservadores($datos);
        }


        $this->elaborarCorreo($idInsert , $dni_propietario);



        echo $idInsert;
    }

    
}
