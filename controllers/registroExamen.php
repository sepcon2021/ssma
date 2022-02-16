<?php

require_once 'public/email/emailExamen.php';
require_once 'public/generate-pdf/generatepdfExamen.php';

class RegistroExamen extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('registro/index');
    }


    public function insertExamen()
    {

        $registro = json_decode($_POST['data'])[0];


        $idExamen = $registro->idexamen;
        $dni = $registro->dni;
        $idarea = $registro->idarea;
        //$respuestaTemperatura = $registro->respuestaTemperatura;
        //$respuestaTemperaturaHoy = $registro->respuestaTemperaturaHoy;

        $nota = $registro->nota;
        //$comentario = $registro->comentario;
        $firma = $registro->firma;
        $listaRespuestas = $registro->listaRespuestas;

        //$datos = compact("idExamen", "dni", "idarea","respuestaTemperatura","respuestaTemperaturaHoy", "nota", "comentario", "firma");
        $datos = compact("idExamen", "dni", "idarea", "nota", "firma");

        $idRegistro = $this->model->insertResgistro($datos);

        $respuesta=$this->model->insertRespuesta($listaRespuestas,$idRegistro);

        //Enviar el certificado del trabajador en caso apruebe el examen
        $this->enviarCertificado($idExamen,$dni);

        echo $this->responseMessage($respuesta);

    }


    public function enviarCertificado($idExamen,$dni){

        $curso = $this->model->findByIdCursoAndDni($idExamen,$dni);
        if($curso->enviarCorreo == 1){
            $urlPdf = $this->generarCertificado($curso);
            $this->updateRegistroUrlPDF($idExamen,$dni,$urlPdf);
            $this->enviarCorreo($curso,$urlPdf);
        }
    }

    public function enviarCorreo($curso,$urlPdf){

        $email = new EmailExamen;
        $email->enviarNotificacionAsignado($curso,$urlPdf);
    }


    public function generarCertificado($curso){

        $urlPdf = null;

        if($curso->notaExamen > $curso->notaAprobatoria){
            $pdf = new GeneratePDFExamen;
            $urlPdf = $pdf->generateCertificate($curso);

        }

        return $urlPdf;
    }

    public function updateRegistroUrlPDF($idExamen,$dni,$urlPdf){

        $idExamen = $idExamen;
        $dni = $dni;
        $urlPdf = $urlPdf;

        $datos = compact("idExamen","dni", "urlPdf");

        $this->model->updateRegistroUrlPDF($datos);

    }


    public function updateExamen()
    {

        $registro = json_decode($_POST['data'])[0];


        $idExamen = $registro->idexamen;
        $dni = $registro->dni;
        $idarea = $registro->idarea;
        //$respuestaTemperatura = $registro->respuestaTemperatura;
        //$respuestaTemperaturaHoy = $registro->respuestaTemperaturaHoy;
        $nota = $registro->nota;
        //$comentario = $registro->comentario;
        $firma = $registro->firma;
        $listaRespuestas = $registro->listaRespuestas;



        $datos = compact("idExamen", "dni", "idarea","nota","firma");
        $registro = $this->model->verificarRegistro($dni,$idExamen);


        $this->model->updateResgistro($datos);

        $respuesta = $this->model->updateRespuesta($listaRespuestas,$registro);

        //Enviar el certificado del trabajador en caso apruebe el examen
        $this->enviarCertificado($idExamen, $dni);

        echo $this->responseMessage($respuesta);
    }

    public function verificarRegistro()
    {

        $idExamen  = $_POST['idExamen'];

        $dniTrabajador  = $_POST['dniTrabajador'];
        
        $respuesta =  $this->model->verificarRegistro($dniTrabajador,$idExamen);

        echo $this->responseMessageContenido($respuesta);

    }

    public function responseMessage($value)
    {
        if ($value) {
            $return["status"] = 200;
            $return["contenido"] = "ok";

        } else {

            $return["status"] = 404;
            $return["contenido"] = "Problemas en nuestros servicios";

        }

        header('Content-Type: application/json');
        return json_encode($return);
    }

    public function responseMessageContenido($value)
    {
        if ($value == 0) {
            $return["status"] = 200;
            $return["contenido"] = "ok";

        } else {

            $return["status"] = 404;
            $return["contenido"] = "Problemas en nuestros servicios";

        }

        header('Content-Type: application/json');
        return json_encode($return);
    }

}
