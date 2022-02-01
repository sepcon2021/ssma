<?php

class SeguridadModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO seguridad (IDDOC,TIPO,SEDE,LUGAR,
                                                                            FECHA,INSPECCIONADO,RESPONSABLE,OBSER01,OBSER02,
                                                                            OBSER03,FOTO,IDAREA,IDUBICACION,IDUSUARIO,UBICACION,IDAREAOBSERVADA)
                                                     VALUES (:doc,:tip,:sed,:lug,:fec,:ins,:res,:ob1,:ob2,:ob3,:fot,:idarea,:idubicacion,
                                                     :idusuario,:ubicacion,:idAreaObservada)');
            $query->execute([
                'doc' => $datos['reg'],
                'tip' => $datos['tipo'],
                'sed' => $datos['sede'],
                'lug' => $datos['luga'],
                'fec' => $datos['fech'],
                'ins' => $datos['insp'],
                'res' => $datos['resp'],
                'ob1' => $datos['obs0'],
                'ob2' => $datos['obs1'],
                'ob3' => $datos['obs2'],
                'fot' => $datos['foto'],
                'idarea' => $datos['lista_area'],
                'idubicacion' => $datos['lista_ubicacion'],

                'idusuario' => $datos['idusuario'],
                'ubicacion' => $datos['ubicacion'],
                'idAreaObservada' => $datos['idAreaObservada']

            ]);
            return true;
        } catch (PDOException $e) {
            //
            echo $e->getMessage();
            return false;
        }
    }

    public function insertDetails($datos)
    {


        try {
            $query = $this->db->connect()->prepare('INSERT INTO detseguridad (IDREG,IDDOC,CONDICION,CLASIFICACION,ACCION,RESPONSABLE,FECHA,SEGUIMIENTO,TIPO,EVIDENCIA,DETALLE)
                                                        VALUES(:reg,:doc,:con,:cla,:acc,:res,:fec,:seg,:tipo,:evidencia,:detalle)');

            $query->execute([
                'reg' => $datos['sid'],
                'doc' => $datos['idd'],
                'con' => $datos['condicion'],
                'detalle' => $datos['detalle'],
                'cla' => $datos['clasificacion'],
                'acc' => $datos['accion_correctiva'],
                'res' => $datos['responsable'],
                'fec' => $datos['fecha_cumplimiento'],
                'seg' => $datos['seguimiento'],
                'tipo' => $datos['tipo'],
                'evidencia' => $datos['evidencia']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function buscarByIdSeguridad($idSeguridad)
    {

        $rowSeguridad = array();

        $query = $this->db->connect()->prepare("SELECT
                                                    seguridad.iddoc,
                                                    proyectos.nombre AS proyecto ,
                                                    seguridad.ubicacion,
                                                    area_general.nombre AS area_nombre,
                                                    seguridad.tipo,
                                                    seguridad.lugar,
                                                    seguridad.fecha AS fechaInspeccion,
                                                    seguridad.obser01,
                                                    seguridad.obser02,
                                                    seguridad.obser03,
                                                    seguridad.reg,
                                                    seguridad.inspeccionado

                                                FROM
                                                    seguridad
                                                    INNER JOIN general AS proyectos ON seguridad.sede = proyectos.cod 
                                                    INNER JOIN area_general ON seguridad.idAreaObservada= area_general.id

                                                WHERE
                                                    seguridad.iddoc = '$idSeguridad' AND 
                                                    proyectos.clase = '00' ");
        try {

            $query->execute();

            while ($row = $query->fetch()) {
                $rowSeguridad = array(
                    "seguridad" => $row,
                    "detalleSeguridad" => $this->buscarByIdDetalleSeguridad($idSeguridad)
                );
            }

            return $rowSeguridad;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function buscarByIdDetalleSeguridad($idSeguridad)
    {

        $rowSeguridad = array();

        $query = $this->db->connect()->prepare("SELECT
        detseguridad.idreg,
        detseguridad.iddoc,
        tipo_observacion.nombre AS  tipo_observacion,
        detseguridad.condicion,
        detseguridad.clasificacion,
        detseguridad.accion,
        detseguridad.responsable,
        detseguridad.fecha,
        detseguridad.seguimiento,
        detseguridad.evidencia



    FROM
        detseguridad
        INNER JOIN seguridad ON detseguridad.iddoc = seguridad.iddoc
        INNER JOIN tipo_observacion ON detseguridad.tipo = tipo_observacion.id

    WHERE
        detseguridad.iddoc = '$idSeguridad'");
        try {

            $query->execute();

            while ($row = $query->fetch()) {
                array_push($rowSeguridad, $row);
            }

            return $rowSeguridad;
        } catch (PDOException $e) {
            return [];
        }
    }

    function listSecurityByDni($dni,$periodo){
        
        $periodo = $this->periodoTiempo($periodo);

        $listaTops = array();

        $query = $this->db->connect()->prepare("SELECT 
        ssma.seguridad.iddoc,
        ssma.seguridad_tipo_inspeccion.nombre AS tipo,
        ssma.seguridad.fecha,
        ssma.seguridad.reg

        FROM ssma.seguridad INNER JOIN rrhh.tabla_aquarius ON ssma.seguridad.idusuario  = rrhh.tabla_aquarius.internal
                            INNER JOIN ssma.seguridad_tipo_inspeccion ON ssma.seguridad.tipo = ssma.seguridad_tipo_inspeccion.id
        WHERE rrhh.tabla_aquarius.dni = :dni  $periodo ORDER BY ssma.seguridad.reg DESC");


        $query->execute(['dni' => $dni ]);

        try {

            while ($rs = $query->fetch()) {

                $registroModel = new RegistroModel;

                $registroModel->id =  $rs['iddoc'];
                $registroModel->fecha =$rs['fecha']  ;
                $registroModel->registro = $rs['reg'];
                $registroModel->observacion = $rs['tipo'];

                array_push($listaTops, $registroModel);
            }

            return $listaTops;
        } catch (PDOException $e) {
            return [];
        }
    }

    function periodoTiempo($periodo)
    {

        if ($periodo == 1) {
            $sql = 'AND CAST(ssma.seguridad.reg AS DATE) = CAST(now() AS DATE) ';
        }
        if ($periodo == 2) {
            $sql = 'AND CAST(ssma.seguridad.reg AS DATE) BETWEEN  DATE_SUB(NOW(),INTERVAL 7 DAY) AND CAST(now() AS DATE) ';
        }
        if ($periodo == 3) {
            $sql = 'AND CAST(ssma.seguridad.reg AS DATE) BETWEEN  DATE_SUB(NOW(),INTERVAL 30 DAY) AND CAST(now() AS DATE) ';
        }
        if ($periodo == 4) {
            $sql = '';
        }
        return $sql;
    }

    public function actualizarUrlPdfSeguridad($id, $urlPdf)
    {

        $query = $this->db->connect()->prepare("UPDATE seguridad SET url_pdf = :url_pdf WHERE iddoc = :id ");

        try {

            $query->execute(['url_pdf'  => $urlPdf, 'id' => $id]);

            return true;
        } catch (PDOException $e) {
            return $e->intl_get_error_message;
        }
    }

    public function getUrlPdf($id)
    {
        $url_foto = [];

        $query = $this->db->connect()->prepare('SELECT url_pdf FROM seguridad WHERE iddoc = :id ');

        $query->execute(['id' => $id]);

        try {

            while ($rs = $query->fetch()) {

                $url_foto = $rs;
            }

            return $url_foto;

        } catch (PDOException $e) {
            return [];
        }
    }

    public function enviarMail($sede)
    {
        require_once 'public/PHPMailer/PHPMailerAutoload.php';


        $destino = "hminaya@sepcon.net";
        $origen = "ssma@sepcon.net";

        $remitente = "fichas@sepcon.net";

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'mail.sepcon.net';
        $mail->Port = 587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer'  => true,
                'verify_depth' => 3,
                'allow_self_signed' => true,
                'peer_name' => 'mail.sepcon.net',
            )
        );
        $mail->SMTPAuth = true;
        $mail->Username = "documentos_sistema@sepcon.net";
        $mail->Password = "c9Hz8Nz4Zj5Or7x";
        $mail->setFrom($origen, $remitente);
        $mail->addAddress($destino, $destino);

        $mail->addCC('mgarcia@sepcon.net', 'Inspeccion Planedad de Seguridad');
        $mail->addCC('svela@sepcon.net', 'Inspeccion Planedad de Seguridad');
        $mail->addCC('lramirez@sepcon.net', 'Inspeccion Planedad de Seguridad');


        $mail->addCC('jcuri@sepcon.net', utf8_decode('Inspección Planeda de Seguridad'));
        $mail->addCC('carroyo@sepcon.net', utf8_decode('Inspección Planeda de Seguridad'));

        if ($sede == "01") {

            $mail->addCC('dponte@sepcon.net', 'Inspeccion de Seguridad');
            $mail->addCC('asalvador@sepcon.net', 'Inspeccion de Seguridad');
            $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Inspeccion de Seguridad');
            $mail->addCC('hguardia@sepcon.net', 'Inspeccion de Seguridad');
            $mail->addCC('ctomasello@sepcon.net', 'Inspeccion de Seguridad');
            $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
        } elseif ($sede == "03") {

            $mail->addCC('pguzman@sepcon.net', utf8_decode('Inspección Planeda de Seguridad'));
            $mail->addCC('jrobeiro@sepcon.net', utf8_decode('Inspección Planeda de Seguridad'));
            $mail->addCC('drios@sepcon.net', utf8_decode('Inspección Planeda de Seguridad'));
        }


        $mail->Subject = utf8_decode('Inspección Planeda de Seguridad');
        $nombre_documento = utf8_decode('Inspección Planeda de Seguridad');
        $message  = "<html><body>";
        $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
        $message .= "<tr><td>";
        $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
        $message .= "<thead>
                <tr height='80'>
                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:red; font-size:34px;' >$nombre_documento</th>
                </tr></thead>";
        $message .= "<tbody><tr>
                    <td colspan='4' style='padding:15px;'>
                        <p style='font-size:20px;'>Estimado(a):</p>
                        <hr />
                        <p style='font-size:25px;'>Se envia este mensaje de registro de inspeccion planeada de seguridad realizada</p>
                        <p style='font-size:25px;'>Detalle de la inspeccion de seguridad :</p>
                        <img src='public/img/mail.jpg' style='height:auto; width:100%; max-width:100%;'/>
                        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif; text-align: center; '>SSMMA - Registro Documentario</p>
                    </td>
                    </tr></tbody>";
        $message .= "</table>";
        $message .= "</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";

        $mail->msgHTML(utf8_decode($message));
        $mail->SMTPDebug = 0;

        if ($mail->send()) {
            $salidajson = array("respuesta" => true);
        } else {
            $salidajson = array("respuesta" => false);
        }
        //echo json_encode($salidajson);
        $mail->ClearAddresses();
    }
}
