<?php

require_once 'public/upload-photo/upload-image.php';
require_once 'public/generate-pdf/generatepdf.php';
require_once 'models/seguimientomodel.php';
require_once 'public/email/email.php';
require_once 'public/upload-photo/upload-image.php';

class Incidencias extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {

        
        $this->view->render('Incidencias/index');
    }

    public function obtainWorkerData()
    {

        $dni = $_POST['dni'];

        $getName = $this->model->getWorkerbyDni($dni);

        if ($getName) {
            $salidajson = array("id" => $getName['internal'],
                "dni" => $getName['dni'],
                "apellidos" => $getName['apellidos'],
                "nombres" => $getName['nombres'],
                "dcargo" => $getName['dcargo'],
                "sexo" => $getName['sexo'],
                "sangre" => $getName['sangre'],
                "gsangre" => $getName['gsangre'],
                "civil" => $getName['estado_civil'],
                "nacimiento" => $getName['fnacimiento'],
                "dsede" => $getName['dsede'],
                "edad" => $getName['edad'],
                "direccion" => $getName['direccion'],
                "depanacim" => $getName['depa_nacim'],
                "depadom" => $getName['depa_dom'],
                "provdom" => $getName['prov_dom'],
                "distdom" => $getName['dist_dom'],
                "domiclio" => $getName['direccion']);
            echo json_encode($salidajson, JSON_UNESCAPED_UNICODE);
        }
    }

    public function obtainWorkerDataMovil()
    {
        $dni = $_POST['dni'];

        $getName = $this->model->getWorkerbyDni($dni);

        if ($getName) {
            $salidajson = array("Id" => $getName['internal'],
                "Dni" => $getName['dni'],
                "Apellidos" => $getName['apellidos'],
                "Nombres" => $getName['nombres'],
                "Cargo" => $getName['dcargo'],
                "Sexo" => $getName['sexo'],
                "Civil" => $getName['estado_civil'],
                "Nacimiento" => $getName['fnacimiento'],
                "Sede" => $getName['dsede'],
                "Edad" => $getName['edad'],
                "Direccion" => $getName['direccion'],
                "Depanacim" => $getName['depa_nacim'],
                "Depadom" => $getName['depa_dom'],
                "Provdom" => $getName['prov_dom'],
                "Distdom" => $getName['dist_dom'],
                "Domicilio" => $getName['direccion'],
                "Resultado" => true);
            echo json_encode($salidajson, JSON_UNESCAPED_UNICODE);
        } else {
            $salidajson = array("Id" => '',
                "Dni" => '',
                "Apellidos" => '',
                "Nombres" => '',
                "Cargo" => '',
                "Sexo" => '',
                "Civil" => '',
                "Nacimiento" => '',
                "Sede" => '',
                "Edad" => 0,
                "Direccion" => '',
                "Depanacim" => '',
                "Depadom" => '',
                "Provdom" => '',
                "Distdom" => '',
                "Domiclio" => '',
                "Resultado" => false);
            echo json_encode($salidajson, JSON_UNESCAPED_UNICODE);
        }

    }

    public function grabarDocumento()
    {
        session_start();

        $iddoc = uniqid("pc_");
        $proyecto = str_pad($_POST['idProyecto'], 2, "0", STR_PAD_LEFT);
        $cliente = $_POST['cliente'];
        $materialmenor = isset($_POST['chktip01']) ? '1' : '0';
        $materialmayor = isset($_POST['chktip02']) ? '1' : '0';
        $derramemenor = isset($_POST['chktip03']) ? '1' : '0';
        $derramemayor = isset($_POST['chktip04']) ? '1' : '0';
        $conherido = isset($_POST['chktip05']) ? '1' : '0';
        $sinherido = isset($_POST['chktip06']) ? '1' : '0';
        $vehicularmenor = isset($_POST['chktip07']) ? '1' : '0';
        $vehicularmayor = isset($_POST['chktip08']) ? '1' : '0';
        $fac = isset($_POST['chktip09']) ? '1' : '0';
        $mto = isset($_POST['chktip10']) ? '1' : '0';
        $rwc = isset($_POST['chktip11']) ? '1' : '0';
        $lti = isset($_POST['chktip12']) ? '1' : '0';
        $ftl = isset($_POST['chktip13']) ? '1' : '0';
        $incidente = isset($_POST['chktip14']) ? '1' : '0';
        $eo = isset($_POST['chktip15']) ? '1' : '0';
        $lugar = $_POST['lugar'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $persona = isset($_POST['persona']) ? $_POST['persona'] : null;
        $documento = isset($_POST['documento']) ? $_POST['documento'] : null;
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
        $edad = isset($_POST['edad']) ? $_POST['edad'] : null;
        $nacimiento = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : null;
        $domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
        $civil = isset($_POST['civil']) ? $_POST['civil'] : null;
        $dpto = isset($_POST['dpto']) ? $_POST['dpto'] : null;
        $prov = isset($_POST['prov']) ? $_POST['prov'] : null;
        $dist = isset($_POST['dist']) ? $_POST['dist'] : null;
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;
        $instruccion = $_POST['instruccion'];
        $descripcion = $_POST['descripcion'];
        $acciones = $_POST['acciones'];
        $elaborado = $_POST['elaborado'];
        $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
        $foto = $_POST['ruta_foto'];

        $ubicacion = $_POST['ubicacion'];
        $idAreaObservada = $_POST['idAreaObservada'];
        $seguro = isset($_POST['seguro']) ? $_POST['seguro'] : '';

        $data = $this->model->insert(['iddoc' => $iddoc,
            'proyecto' => $proyecto,
            'cliente' => $cliente,
            'materialmenor' => $materialmenor,
            'materialmayor' => $materialmayor,
            'derramemenor' => $derramemenor,
            'derramemayor' => $derramemayor,
            'conherido' => $conherido,
            'sinherido' => $sinherido,
            'vehicularmenor' => $vehicularmenor,
            'vehicularmayor' => $vehicularmayor,
            'fac' => $fac,
            'mto' => $mto,
            'rwc' => $rwc,
            'lti' => $lti,
            'ftl' => $ftl,
            'incidente' => $incidente,
            'eo' => $eo,
            'lugar' => $lugar,
            'fecha' => $fecha,
            'hora' => $hora,
            'persona' => $persona,
            'documento' => $documento,
            'sexo' => $sexo,
            'edad' => $edad,
            'nacimiento' => $nacimiento,
            'domicilio' => $domicilio,
            'civil' => $civil,
            'dpto' => $dpto,
            'prov' => $prov,
            'dist' => $dist,
            'cargo' => $cargo,
            'instruccion' => $instruccion,
            'descripcion' => $descripcion,
            'acciones' => $acciones,
            'elaborado' => $elaborado,
            'usuario' => $usuario,
            'foto' => $foto,
            'ubicacion' => $ubicacion,
            'idAreaObservada' => $idAreaObservada,
            'seguro' => $seguro,
        ]);

        $this->elaborarCorreo($iddoc,$proyecto,$persona,$descripcion,$_POST['dni_propietario']);
    }

    public function grabarDocumentoMovil()
    {

        $return["state"] = true;
        $return["message"] = "Envio exitoso";

        $iddoc = uniqid("mo_");
        $proyecto = str_pad($_POST['proyecto'], 2, "0", STR_PAD_LEFT);
        $cliente = $_POST['cliente'];
        $materialmenor = $_POST['chktip01'];
        $materialmayor = $_POST['chktip02'];
        $derramemenor = $_POST['chktip03'];
        $derramemayor = $_POST['chktip04'];
        $conherido = $_POST['chktip05'];
        $sinherido = $_POST['chktip06'];
        $vehicularmenor = $_POST['chktip07'];
        $vehicularmayor = $_POST['chktip08'];
        $fac = $_POST['chktip09'];
        $mto = $_POST['chktip10'];
        $rwc = $_POST['chktip11'];
        $lti = $_POST['chktip12'];
        $ftl = $_POST['chktip13'];
        $incidente = $_POST['chktip14'];
        $eo = $_POST['chktip15'];
        $lugar = $_POST['lugar'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $persona = $_POST['persona'];
        $documento = $_POST['documento'];
        $sexo = $_POST['sexo'];
        $edad = $_POST['edad'];
        $nacimiento = $_POST['nacimiento'];
        $domicilio = $_POST['domicilio'];
        $civil = $_POST['civil'];
        $dpto = $_POST['dpto'];
        $prov = $_POST['prov'];
        $dist = $_POST['dist'];
        $cargo = $_POST['cargo'];
        $instruccion = $_POST['instruccion'];
        $descripcion = $_POST['descripcion'];
        $acciones = $_POST['acciones'];
        $elaborado = $_POST['elaborado'];
        $usuario = $_POST['usuario'];
        $ubicacion = $_POST['ubicacion'];
        $idAreaObservada = $_POST['idAreaObservada'];
        $seguro = isset($_POST['seguro']) ? $_POST['seguro'] : '';

        // URL FOTO Y NOMBRE

        $image = $_POST['image'];
        $image_name = $_POST['image_name'];

        //SUBIMOS LA IMAGEN AL SERVIDOR
        $photo_upload = new UploadImage();

        $outputfile = $photo_upload->uploadImageApp($image, $image_name);

        $insert = $this->model->insert(['iddoc' => $iddoc,
            'proyecto' => $proyecto,
            'cliente' => $cliente,
            'materialmenor' => $materialmenor,
            'materialmayor' => $materialmayor,
            'derramemenor' => $derramemenor,
            'derramemayor' => $derramemayor,
            'conherido' => $conherido,
            'sinherido' => $sinherido,
            'vehicularmenor' => $vehicularmenor,
            'vehicularmayor' => $vehicularmayor,
            'fac' => $fac,
            'mto' => $mto,
            'rwc' => $rwc,
            'lti' => $lti,
            'ftl' => $ftl,
            'incidente' => $incidente,
            'eo' => $eo,
            'lugar' => $lugar,
            'fecha' => $fecha,
            'hora' => $hora,
            'persona' => $persona,
            'documento' => $documento,
            'sexo' => $sexo,
            'edad' => $edad,
            'nacimiento' => $nacimiento,
            'domicilio' => $domicilio,
            'civil' => $civil,
            'dpto' => $dpto,
            'prov' => $prov,
            'dist' => $dist,
            'cargo' => $cargo,
            'instruccion' => $instruccion,
            'descripcion' => $descripcion,
            'acciones' => $acciones,
            'elaborado' => $elaborado,
            'usuario' => $usuario,
            'foto' => $outputfile,
            'ubicacion' => $ubicacion,
            'idAreaObservada' => $idAreaObservada,
            'seguro' => $seguro,

        ]);

        $this->elaborarCorreo($iddoc,$proyecto,$persona,$descripcion,$_POST['dni_propietario']);


        if (!$insert) {
            // echo "Guardado desde Celular";
            $return["state"] = false;
            $return["message"] = "Problemas en nuestros servicios";
        }

        header('Content-Type: application/json');
        // tell browser that its a json data
        echo json_encode($return);
        //converting array to JSON string

    }

    public function uploadImg()
    {

        $photo_upload = new UploadImage();

        echo $photo_upload->uploadImageWeb($_FILES);

    }

    public function deleteImg()
    {
        $img = $_POST['img'];

        $file = 'public/photos/' . $img;

        if (file_exists($file)) {unlink($file);}
    }



    public function getNombreProyecto($idProyecto)
    {
        $data = '[{"id":"01","nombre":"WHCP 21","detalle":""},{"id":"03","nombre":"Pucallpa","detalle":""},{"id":"04","nombre":"Lurin","detalle":""},{"id":"05","nombre":"Lima","detalle":""},{"id":"06","nombre":"20PP03 L. Relaves Este / 00679","detalle":""},{"id":"07","nombre":"FULL FLOW FLARE - SHUT DOW","detalle":""},{"id":"08","nombre":"SISTEMA CONTRA INCENDIOS","detalle":""}]';
        $json = json_decode($data, true);

        $name = "";

        foreach ($json as $value) {
            if ($value['id'] == $idProyecto) {
                $name = $value['nombre'];
            }
        }

        return $name;
    }

    
    public function elaborarCorreo($id,$proyecto,$persona,$descripcion,$dniPropietario)
    {

        $idTipoDocumento = 3;
        $nombreDocumento = 'Reporte de incidencias';
        $resultado = $this->model->getIncidenciaById($id);

        $generatePdf = new GeneratePDF();
        $urlPdf = $generatePdf->generateIncidenciaPdf($resultado);
        $urlOficialPdf = $generatePdf->generateIncidenciaOficialPdf($resultado);


        $this->model->actualizarUrlPdf($id, $urlOficialPdf);

        if(strlen($dniPropietario) > 0){
        
            $seguimientoModel = new SeguimientoModel;
            $seguimientoModel->insertarSeguimientoGeneral($id, $dniPropietario, $urlPdf, $idTipoDocumento, $nombreDocumento);
    
        }


        $nombreProyecto=$this->getNombreProyecto($proyecto);
        $email = new Email;
        $email->enviarMailIncidencia($descripcion, $persona, $proyecto,$nombreProyecto,$urlPdf);
    }

    function sendEmailFail(){
        
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $persona = $_POST['persona'];
        $proyecto = $_POST['proyecto'];
        $nombreProyecto = $_POST['nombreProyecto'];
        
        
        $resultado = $this->model->getIncidenciaById($id);
        $generatePdf = new GeneratePDF();
        $urlPdf = $generatePdf->generateIncidenciaPdf($resultado);

        $email = new Email;
        $email->enviarMailIncidencia($descripcion, $persona, $proyecto,$nombreProyecto,$urlPdf);
    }


    function generatePDF(){
        
        $resultado = $this->model->getIncidenciaById("pc_621569d5c6aa2");
        $generatePdf = new GeneratePDF();
        $urlPdf = $generatePdf->generateIncidenciaPdf($resultado);

        echo json_encode(array("data" => $urlPdf));

    }

    public function grabarDocumentoNew()
    {

        $uploadImage = new UploadImage;
        $listaEvidencia = $uploadImage->uploadImageGeneral($_FILES["files"]);

        $iddoc = uniqid("pc_");
        $proyecto = str_pad($_POST['proyecto'], 2, "0", STR_PAD_LEFT);
        $cliente = $_POST['cliente'];
        $materialmenor = isset($_POST['chktip01']) ? '1' : '0';
        $materialmayor = isset($_POST['chktip02']) ? '1' : '0';
        $derramemenor = isset($_POST['chktip03']) ? '1' : '0';
        $derramemayor = isset($_POST['chktip04']) ? '1' : '0';
        $conherido = isset($_POST['chktip05']) ? '1' : '0';
        $sinherido = isset($_POST['chktip06']) ? '1' : '0';
        $vehicularmenor = isset($_POST['chktip07']) ? '1' : '0';
        $vehicularmayor = isset($_POST['chktip08']) ? '1' : '0';
        $fac = isset($_POST['chktip09']) ? '1' : '0';
        $mto = isset($_POST['chktip10']) ? '1' : '0';
        $rwc = isset($_POST['chktip11']) ? '1' : '0';
        $lti = isset($_POST['chktip12']) ? '1' : '0';
        $ftl = isset($_POST['chktip13']) ? '1' : '0';
        $incidente = isset($_POST['chktip14']) ? '1' : '0';
        $eo = isset($_POST['chktip15']) ? '1' : '0';
        $lugar = $_POST['lugar'];
        $fecha = $_POST['fecha_incidente'];
        $hora = $_POST['hora_incidente'];
        $persona = isset($_POST['persona']) ? $_POST['persona'] : null;
        $documento = isset($_POST['documento']) ? $_POST['documento'] : null;
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
        $edad = isset($_POST['edad']) ? $_POST['edad'] : null;
        $nacimiento = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : null;
        $domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
        $civil = isset($_POST['civil']) ? $_POST['civil'] : null;
        $dpto = isset($_POST['dpto']) ? $_POST['dpto'] : null;
        $prov = isset($_POST['prov']) ? $_POST['prov'] : null;
        $dist = isset($_POST['dist']) ? $_POST['dist'] : null;
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;
        $instruccion = $_POST['instruccion'];
        $descripcion = $_POST['descripcion'];
        $acciones = $_POST['acciones'];
        $elaborado = $_POST['elaborado'];
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
        $foto = $listaEvidencia;

        $ubicacion = $_POST['ubicacion'];
        $idAreaObservada = $_POST['area'];
        $seguro = isset($_POST['seguro']) ? $_POST['seguro'] : '';
        $responsable = '77100151';

        $data = $this->model->insert(['iddoc' => $iddoc,
            'proyecto' => $proyecto,
            'cliente' => $cliente,
            'materialmenor' => $materialmenor,
            'materialmayor' => $materialmayor,
            'derramemenor' => $derramemenor,
            'derramemayor' => $derramemayor,
            'conherido' => $conherido,
            'sinherido' => $sinherido,
            'vehicularmenor' => $vehicularmenor,
            'vehicularmayor' => $vehicularmayor,
            'fac' => $fac,
            'mto' => $mto,
            'rwc' => $rwc,
            'lti' => $lti,
            'ftl' => $ftl,
            'incidente' => $incidente,
            'eo' => $eo,
            'lugar' => $lugar,
            'fecha' => $fecha,
            'hora' => $hora,
            'persona' => $persona,
            'documento' => $documento,
            'sexo' => $sexo,
            'edad' => $edad,
            'nacimiento' => $nacimiento,
            'domicilio' => $domicilio,
            'civil' => $civil,
            'dpto' => $dpto,
            'prov' => $prov,
            'dist' => $dist,
            'cargo' => $cargo,
            'instruccion' => $instruccion,
            'descripcion' => $descripcion,
            'acciones' => $acciones,
            'elaborado' => $elaborado,
            'usuario' => $usuario,
            'foto' => $foto,
            'ubicacion' => $ubicacion,
            'idAreaObservada' => $idAreaObservada,
            'seguro' => $seguro,
        ]);

        
        $this->elaborarCorreo($iddoc,$proyecto,$persona,$descripcion,$responsable);
    }


}
