<?php

require_once 'public/PHPMailer/PHPMailerAutoload.php';
require_once 'config/config.php';

class Email
{


  /**
   * Enviar email con una notificación de que sucdio un TOP
   * @param string $mensaje El mensaje de lo que ocurrio en el top
   * @param string $sede El identificdor unico de la sede
   * @param string $nombre El nombre de la sede
   * @param string $urlPdf Url del PDF con el reporte del TOP
   * @return array Contiene estados de ok or error en función de la situación
   */
  public function enviarMailTop($mensaje, $sede, $nombre_sede, $urlPdf)
  {

    $destino = "hminaya@sepcon.net";
    $contenido =  'Tarjeta Top - Potencial Alto';
    $mail = $this->settingEmail($destino);
    $mail = $this->selectUsersToSendEmail($mail, $sede);
    $mail = $this->customizeHeaderEmail($mail, $contenido);
    $mail->msgHTML(utf8_decode($this->contenidoEmail($mensaje, $nombre_sede)));
    $mail->SMTPDebug = 0;
    $mail->addAttachment($urlPdf);
    $mail->send();
    $mail->ClearAddresses();
  }

  public function settingEmail($destino)
  {
    $origen = "documentos_ssma@sepcon.net";
    $remitente = "fichas@sepcon.net";

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';
    $mail->Host = 'mail.sepcon.net';
    $mail->Port = 587;
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => true,
        'verify_depth' => 3,
        'allow_self_signed' => true,
        'peer_name' => 'mail.sepcon.net',
      ),
    );
    $mail->SMTPAuth = true;
    $mail->Username = constant('CORREO');
    $mail->Password = constant('CONTRASEÑA_CORREO');

    $mail->setFrom($origen, $remitente);
    $mail->addAddress($destino, $destino);

    return $mail;
  }

  public function selectUsersToSendEmail($mail, $sede)
  {

    if ($sede == "01") {

      $nombreSede = "WHCP 21";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_pv@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "03") {

      $nombreSede = "Pucallpa";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('pguzman@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jrobeiro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('drios@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepon.net', 'Tarjetas Top');
    } elseif ($sede == "04") {

      $nombreSede = "Lurin";


      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcuri@sepcon.net', 'Tarjetas Top');
      $mail->addCC('carroyo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "05") {

      $nombreSede = "Lima";



      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('mpilco@sepcon.net', 'Tarjeta Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjeta Top');
    } elseif ($sede == "06") {

      $nombreSede = "20PP03 L. Relaves Este / 00679";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('warhuis@sepcon.net', 'Tarjetas Top');
      $mail->addCC('LFalcon@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Acalderon@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jribeiro@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "07") {

      $nombreSede = "FULL FLOW FLARE - SHUT DOW";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jnovoa@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('kmontalvo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('sreyes@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "08") {

      $nombreSede = "SISTEMA CONTRA INCENDIOS";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('sreyes@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('lcatacora@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('kmontalvo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jnovoa@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "09") {

      $nombreSede = "Obras Electromecánicas Varias";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jribeiro@sepcon.net', 'Tarjetas Top');
    }


    return $mail;
  }

  public function contenidoEmail($mensaje, $nombre_sede)
  {

    $message = "<html><body>";
    $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
    $message .= "<tr><td>";
    $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    $message .= "<thead>
                <tr height='80'>
                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:red; font-size:34px;' >Tarjeta TOP</th>
                </tr></thead>";
    $message .= "<tbody><tr>
                    <td colspan='4' style='padding:15px;'>
                        <p style='font-size:20px;'>Estimado(a):</p>
                        <hr />
                        <p style='font-size:25px;'>Se envia este mensaje de registro de Tarjeta TOP con potencial alto - $nombre_sede</p>
                        <p style='font-size:25px;'>Detalle de la observación preventiva :</p>
                        <p style='font-size:25px;'>$mensaje</p>
                        <img src='public/img/mail.jpg' style='height:auto; width:100%; max-width:100%;'/>
                        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif; text-align: center; '>SSMMA - Registro Documentario</p>
                    </td>
                    </tr></tbody>";
    $message .= "</table>";
    $message .= "</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";

    return $message;
  }


  /**
   * Enviar email con una notificación de que fue asignado a una acción
   * @param string $correoReceptor El correo del jefe del área
   * @param string $nombresApellidos Datos completos del jefe del área
   * @param string $idDocumento Identificador unico del documento
   * @param string $nombreDocumento El nombre del documento TOP , IPERC ,SEGURIDAD PLANEADA ,etc.
   * @return array Contiene estados de ok or error en función de la situación
   */
  public function enviarNotificacionAsignado($correoReceptor, $nombresApellidos, $idDocumento, $nombreDocumento, $urlPdf)
  {

    $contenido =  utf8_decode('Acción');


    $mail = $this->settingEmail($correoReceptor);
    $mail = $this->customizeHeaderEmail($mail, $contenido);
    $mail->addAttachment($urlPdf);
    $mail->msgHTML(utf8_decode($this->contenidoNotificacion($nombresApellidos, $idDocumento, $nombreDocumento)));
    $mail->SMTPDebug = 0;
    $mail->send();
    $mail->ClearAddresses();
  }

  public function contenidoNotificacion($nombresApellidos, $idDocumento, $nombreDocumento)
  {

    $message =
      '<html>
            <body>
                <h3>Buenas ' . $nombresApellidos . '</h3>
                <p>Fue asignado a la siguiente acción - ' . $nombreDocumento . ' n° ' . $idDocumento . '</p>
                <p>link : http://ssma.sepcon.net/ssma/mainseguimiento</p>
            </body>
        </html>';

    return $message;
  }

  public function customizeHeaderEmail($mail, $contenido)
  {

    $mail->Subject = $contenido;

    return $mail;
  }

  /**
   * Enviar email con una notificación de que fue asignado a una acción
   * @param array $objeto contiene propietario,idSeguimiento,nombre de documento y la url pdf
   */
  public function enviarNotificacionAsignadoFactorizado($datos)
  {

    $contenido =  utf8_decode('Acción');

    $nombresApellidos = $datos['propietario']->nombres . ' ' . $datos['propietario']->apellidos;

    $mail = $this->settingEmail($datos['propietario']->correo);
    $mail = $this->customizeHeaderEmail($mail, $contenido);
    $mail->addAttachment($datos['urlPdf']);
    $mail->msgHTML(utf8_decode($this->contenidoNotificacion($nombresApellidos, $datos['idSeguimiento'], $datos['nombreDocumento'])));
    $mail->SMTPDebug = 0;
    $mail->send();
    $mail->ClearAddresses();
  }




  /**
   * Enviar un email de alerta de una TOP  de potencial ALTO
   * @param string $mensaje El contenido del correo
   * @param string $sede El id de la sede
   * @param string $urlPDF La url de la ubicación del PDF
   */

  public function enviarCorreoTop($mensaje, $sede, $urlPdf)
  {
    $nombreSede = '';

    $destino = "hminaya@sepcon.net";
    $origen = "documentos_ssma@sepcon.net";

    $remitente = "fichas@sepcon.net";

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';
    $mail->Host = 'mail.sepcon.net';
    $mail->Port = 587;
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => true,
        'verify_depth' => 3,
        'allow_self_signed' => true,
        'peer_name' => 'mail.sepcon.net',
      ),
    );
    $mail->SMTPAuth = true;
    $mail->Username = constant('CORREO');;
    $mail->Password = constant('CONTRASEÑA_CORREO');;

    $mail->setFrom($origen, $remitente);
    $mail->addAddress($destino, $destino);

    $mail->addCC('jcuri@sepcon.net', 'Tarjetas Top');
    $mail->addCC('carroyo@sepcon.net', 'Tarjetas Top');

    if ($sede == "01") {

      $nombreSede = "WHCP 21";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_pv@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "03") {

      $nombreSede = "Pucallpa";


      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('pguzman@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jrobeiro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('drios@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepon.net', 'Tarjetas Top');
    } elseif ($sede == "04") {

      $nombreSede = "Lurin";


      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcuri@sepcon.net', 'Tarjetas Top');
      $mail->addCC('carroyo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "05") {

      $nombreSede = "Lima";


      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('mpilco@sepcon.net', 'Tarjeta Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjeta Top');
    } elseif ($sede == "06") {

      $nombreSede = "20PP03 L. Relaves Este / 00679";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('warhuis@sepcon.net', 'Tarjetas Top');
      $mail->addCC('LFalcon@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Acalderon@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jribeiro@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "07") {

      $nombreSede = "FULL FLOW FLARE - SHUT DOW";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jnovoa@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('kmontalvo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('sreyes@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "08") {

      $nombreSede = "SISTEMA CONTRA INCENDIOS";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('sreyes@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('lcatacora@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('kmontalvo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jnovoa@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
    } elseif ($sede == "09") {

      $nombreSede = "Obras Electromecánicas Varias";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jribeiro@sepcon.net', 'Tarjetas Top');
    }





    $mail->Subject = 'Tarjeta Top - Potencial Alto';
    $message = "<html><body>";
    $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
    $message .= "<tr><td>";
    $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    $message .= "<thead>
                <tr height='80'>
                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:red; font-size:34px;' >Tarjeta TOP</th>
                </tr></thead>";
    $message .= "<tbody><tr>
                    <td colspan='4' style='padding:15px;'>
                        <p style='font-size:20px;'>Estimado(a):</p>
                        <hr />
                        <p style='font-size:25px;'>Se envia este mensaje de registro de Tarjeta TOP con potencial alto - $nombreSede</p>
                        <p style='font-size:25px;'>Detalle de la observación preventiva :</p>
                        <p style='font-size:25px;'>$mensaje</p>
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
    $mail->addAttachment($urlPdf);


    if ($mail->send()) {
      $salidajson = array("respuesta" => true);
    } else {
      $salidajson = array("respuesta" => false);
    }
    //echo json_encode($salidajson);
    $mail->ClearAddresses();
  }



  public function enviarMailIncidencia($mensaje, $personaInvolucrada, $idProyecto, $nombreProyecto, $urlPdf)
  {

    $destino = "hminaya@sepcon.net";
    $origen = "documentos_ssma@sepcon.net";

    $remitente = "fichas@sepcon.net";

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';
    $mail->Host = 'mail.sepcon.net';
    $mail->Port = 587;
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => true,
        'verify_depth' => 3,
        'allow_self_signed' => true,
        'peer_name' => 'mail.sepcon.net',
      ),
    );
    $mail->SMTPAuth = true;
    $mail->Username = constant('CORREO');;
    $mail->Password = constant('CONTRASEÑA_CORREO');
    $mail->setFrom($origen, $remitente);
    $mail->addAddress($destino, $destino);

    $mail->addCC('jcuri@sepcon.net', 'Reporte de Incidencias');
    $mail->addCC('carroyo@sepcon.net', 'Reporte de Incidencias');

    if ($idProyecto == "01") {

      $nombreSede = "WHCP 21";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_pv@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
    } elseif ($idProyecto == "03") {

      $nombreSede = "Pucallpa";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('pguzman@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jrobeiro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('drios@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepon.net', 'Tarjetas Top');
    } elseif ($idProyecto == "04") {

      $nombreSede = "Lurin";


      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcuri@sepcon.net', 'Tarjetas Top');
      $mail->addCC('carroyo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
    } elseif ($idProyecto == "05") {

      $nombreSede = "Lima";



      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('mpilco@sepcon.net', 'Tarjeta Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjeta Top');
    } elseif ($idProyecto == "06") {

      $nombreSede = "20PP03 L. Relaves Este / 00679";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('warhuis@sepcon.net', 'Tarjetas Top');
      $mail->addCC('LFalcon@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Acalderon@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jribeiro@sepcon.net', 'Tarjetas Top');
    } elseif ($idProyecto == "07") {

      $nombreSede = "FULL FLOW FLARE - SHUT DOW";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jnovoa@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('kmontalvo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('sreyes@sepcon.net', 'Tarjetas Top');
    } elseif ($idProyecto == "08") {

      $nombreSede = "SISTEMA CONTRA INCENDIOS";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('sreyes@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('lcatacora@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rchavez@sepcon.net', 'Tarjetas Top');
      $mail->addCC('gmontengro@sepcon.net', 'Tarjetas Top');
      $mail->addCC('kmontalvo@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jnovoa@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
    } elseif ($idProyecto == "09") {

      $nombreSede = "Obras Electromecánicas Varias";

      $mail->addCC('mgarcia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hminaya@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Svela@sepcon.net', 'Tarjetas Top');
      $mail->addCC('hguardia@sepcon.net', 'Tarjetas Top');
      $mail->addCC('ctomasello@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rcarbonell@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asalvador@sepcon.net', 'Tarjetas Top');
      $mail->addCC('asistente_ssma_whcp21@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jtaborga@sepcon.net', 'Tarjetas Top');
      $mail->addCC('Jopaniagua@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jzapata@sepcon.net', 'Tarjetas Top');
      $mail->addCC('rarce@sepcon.net', 'Tarjetas Top');
      $mail->addCC('alatorre@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jcossio@sepcon.net', 'Tarjetas Top');
      $mail->addCC('randrade@sepcon.net', 'Tarjetas Top');
      $mail->addCC('jribeiro@sepcon.net', 'Tarjetas Top');
    }


    $mail->Subject = 'Reporte de Incidencia';
    $message = "<html><body>";
    $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
    $message .= "<tr><td>";
    $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    $message .= "<thead>
                <tr height='80'>
                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:red; font-size:34px;' >Reporte de Incidencia</th>
                </tr></thead>";
    $message .= "<tbody><tr>
                    <td colspan='4' style='padding:15px;'>
                        <p style='font-size:16px;'>Estimado(a):</p>
                        <p style='font-size:16px;'>Persona Involucrada:$personaInvolucrada</p>
                        <p style='font-size:16px;'>Proyecto/Sede: $nombreProyecto</p>
                        <hr />
                        <p style='font-size:16px;'>DESCRIPCIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL</p>
                        <p style='font-size:16px;'>$mensaje</p>
                        <img src='public/img/mail.jpg' style='height:auto; width:100%; max-width:100%;'/>
                        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif; text-align: center; '>SSMMA - Reporte de Incidencias</p>
                    </td>
                    </tr></tbody>";
    $message .= "</table>";
    $message .= "</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";

    $mail->msgHTML(utf8_decode($message));
    $mail->SMTPDebug = 0;
    $mail->addAttachment($urlPdf);


    if ($mail->send()) {
      $salidajson = array("respuesta" => true);
    } else {
      $salidajson = array("respuesta" => false);
    }

    // echo json_encode($salidajson);
    $mail->ClearAddresses();
  }
}