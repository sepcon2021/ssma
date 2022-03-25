<?php


require_once "public/fpdf/fpdf.php";


class GenerateEvaluacionCompetencia
{
  function generatePDF($data)
  {
    $pdf = new FPDF();


    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(0, 0, 0);


    $pdf->Image('public/img/logo.png', 11, 14, 22);
    $pdf->Cell(35, 20, '', 1, 0, 'C');


    $pdf->MultiCell(105, 20, utf8_decode('EVALUACIÓN DE COMPETENCIAS SSMA'), 1, 'C', false);
    $pdf->SetFont('Helvetica', '', 8);


    $pdf->SetXY(150, 10);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->MultiCell(45, 5, utf8_decode('PSPC-105-X-FR-0XX
Revisión: 0
Emisión: 
Página: 1 de 1'), 1, 'L', false);


    $pdf->SetXY(150, 32);
    $pdf->SetFont('Helvetica', '', 6);
    $pdf->SetFillColor(201, 223, 242); //Fondo verde de celda
    $pdf->Cell(22.5, 2.5, utf8_decode('Excelente'),  1, 0, 'L', true);
    $pdf->Cell(22.5, 2.5, utf8_decode('3'),  1, 0, 'C', true);

    $pdf->SetXY(150, 34.5);
    $pdf->Cell(22.5, 2.5, utf8_decode('Bueno'),  1, 0, 'L', true);
    $pdf->Cell(22.5, 2.5, utf8_decode('2'),  1, 0, 'C', true);

    $pdf->SetXY(150, 37);
    $pdf->Cell(22.5, 2.5, utf8_decode('Deficiente'),  1, 0, 'L', true);
    $pdf->Cell(22.5, 2.5, utf8_decode('1'),  1, 0, 'C', true);


    $pdf->SetXY(150, 39.5);
    $pdf->Cell(22.5, 2.5, utf8_decode('No cumple'),  1, 0, 'L', true);
    $pdf->Cell(22.5, 2.5, utf8_decode('0'),  1, 0, 'C', true);

    //Cabecera de las casillas de evaluación

    $pdf->SetXY(10, 45);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->SetFillColor(31, 76, 115); //Fondo verde de celda
    $pdf->SetTextColor(255, 255, 255); //Color del texto: Negro
    $pdf->Cell(140, 5, utf8_decode('ASPECTO A EVALUAR'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Peso'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Calificación'),  1, 0, 'C', true);



    /**
     * NIVEL DE COMPROMISO
     */


    $pdf->SetXY(10, 50);
    $pdf->SetFont('Helvetica', 'B', 6);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
    $pdf->Cell(35, 30, utf8_decode('NIVEL DE COMPROMISO'),  1, 0, 'C', true);





    $pdf->SetXY(45, 50);
    $pdf->SetFont('Helvetica', '', 6);
    $pdf->MultiCell(105, 5, utf8_decode('Finaliza oportunamente las tareas asignadas, sin necesidad de reprocesos.'), 1, 'L', false);

    $pdf->SetXY(45, 55);
    $pdf->MultiCell(105, 5, utf8_decode('Se autodirige, es decir, no es necesario recordarle continuamente lo que se debe hacer.'), 1, 'L', false);

    $pdf->SetXY(45, 60);
    $pdf->MultiCell(105, 5, utf8_decode('Realiza recomendaciones apropiadas o acertadas.'), 1, 'L', false);

    $pdf->SetXY(45, 65);
    $pdf->MultiCell(105, 5, utf8_decode('Pone su conocimiento y experiencia de format total al servicio  de la empresa.'), 1, 'L', false);

    $pdf->SetXY(45, 70);
    $pdf->MultiCell(105, 5, utf8_decode('Se enfoca en solucionar los problemas en lugar de buscar culpables.'), 1, 'L', false);

    $pdf->SetXY(45, 75);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    //$pdf->MultiCell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'), 1, 'L', false);
    $pdf->Cell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'),  1, 0, 'C', true);

    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetXY(150, 50);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 55);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 60);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 65);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 70);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 75);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode('100%'),  1, 0, 'C', true);


    $listCompromiso = [$data[0]["compromiso1"], $data[0]["compromiso2"], $data[0]["compromiso3"], $data[0]["compromiso4"], $data[0]["compromiso5"]];

    $pdf->SetFillColor(201, 223, 242); //Fondo verde de celda
    $pdf->SetXY(172.5, 50);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso1"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 55);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso2"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 60);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso3"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 65);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso4"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 70);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso5"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 75);
    $pdf->SetFillColor(139, 180, 217); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode($this->averagePuntaje($listCompromiso)),  1, 0, 'C', true);



    /**
     * TOLERANCIA AL ESTRES
     */


    $pdf->SetXY(10, 80);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->SetFillColor(31, 76, 115); //Fondo verde de celda
    $pdf->SetTextColor(255, 255, 255); //Color del texto: Negro
    $pdf->Cell(140, 5, utf8_decode('ASPECTO A EVALUAR'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Peso'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Calificación'),  1, 0, 'C', true);




    $pdf->SetXY(10, 85);
    $pdf->SetFont('Helvetica', 'B', 6);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
    $pdf->Cell(35, 31, utf8_decode('DESEMPEÑO EM SEGURIDAD'),  1, 0, 'C', true);



    $pdf->SetXY(45, 85);
    $pdf->SetFont('Helvetica', '', 6);
    $pdf->MultiCell(105, 5, utf8_decode('Se comunica de forma adecuada con todos sus compañeros.'), 1, 'L', false);

    $pdf->SetXY(45, 90);
    $pdf->MultiCell(105, 5, utf8_decode('Fomenta y practica el respeto hacia todos los trabajadores de la empresa.'), 1, 'L', false);

    $pdf->SetXY(45, 95);
    $pdf->MultiCell(105, 5, utf8_decode('Capacidad para interceder en los conflictos que existen dentro de su equipo de trabajo.'), 1, 'L', false);

    $pdf->SetXY(45, 100);
    $pdf->MultiCell(105, 5, utf8_decode('Implementa o fomenta prácticas de trabajo seguro en su area de trabajo.'), 1, 'L', false);

    $pdf->SetXY(45, 105);
    $pdf->MultiCell(105, 3, utf8_decode('Realiza observaciones de comportamientos riesgosos e informa oportunamente a la empresa 
acerca de los peligros y riesgos latentes en su lugar de trabajo.'), 1, 'L', true);

    $pdf->SetXY(45, 111);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    //$pdf->MultiCell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'), 1, 'L', false);
    $pdf->Cell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'),  1, 0, 'C', true);


    $listSeguridad = [$data[0]["seguridad1"], $data[0]["seguridad2"], $data[0]["seguridad3"], $data[0]["seguridad4"], $data[0]["seguridad5"]];


    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetXY(150, 85);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 90);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 95);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 100);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 105);
    $pdf->Cell(22.5, 6, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 111);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode('100%'),  1, 0, 'C', true);


    $pdf->SetFillColor(201, 223, 242); //Fondo verde de celda
    $pdf->SetXY(172.5, 85);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["seguridad1"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 90);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["seguridad2"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 95);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["seguridad3"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 100);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["seguridad4"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 105);
    $pdf->Cell(22.5, 6, utf8_decode($data[0]["seguridad5"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 111);
    $pdf->SetFillColor(139, 180, 217); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode($this->averagePuntaje($listSeguridad)),  1, 0, 'C', true);




    /**
     * TOLERANCIA AL ESTRES
     */




    $pdf->SetXY(10, 116);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->SetFillColor(31, 76, 115); //Fondo verde de celda
    $pdf->SetTextColor(255, 255, 255); //Color del texto: Negro
    $pdf->Cell(140, 5, utf8_decode('ASPECTO A EVALUAR'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Peso'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Calificación'),  1, 0, 'C', true);



    $pdf->SetXY(10, 121);
    $pdf->SetFont('Helvetica', 'B', 6);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
    $pdf->Cell(35, 32, utf8_decode('TOLERANCIA AL ESTRÉS'),  1, 0, 'C', true);



    $pdf->SetXY(45, 121);
    $pdf->SetFont('Helvetica', '', 6);
    $pdf->MultiCell(105, 5, utf8_decode('Se comunica de forma adecuada con todos sus compañeros.'), 1, 'L', false);

    $pdf->SetXY(45, 126);
    $pdf->MultiCell(105, 5, utf8_decode('Fomenta y practica el respeto hacia todos los trabajadores de la empresa.'), 1, 'L', false);

    $pdf->SetXY(45, 131);
    $pdf->MultiCell(105, 5, utf8_decode('Capacidad para interceder en los conflictos que existen dentro de su equipo de trabajo.'), 1, 'L', false);

    $pdf->SetXY(45, 136);
    $pdf->MultiCell(105, 3.5, utf8_decode('Sabe trabajar en equipo, integrándose y participando positivamente para alcanzar los objetivos 
y metas comunes.'), 1, 'L', false);

    $pdf->SetXY(45, 142);
    $pdf->MultiCell(105, 3.5, utf8_decode('Capacidad de desempeñarse eficientemente en situaciones estresantes y poder sobrellevar 
las complicaciones que surjan de éstas.'), 1, 'L', true);

    $pdf->SetXY(45, 148);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    $pdf->Cell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'),  1, 0, 'C', true);


    $listEstres = [$data[0]["estres1"], $data[0]["estres2"], $data[0]["estres3"], $data[0]["estres4"], $data[0]["estres5"]];

    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetXY(150, 121);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 126);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 131);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 136);
    $pdf->Cell(22.5, 6, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 142);
    $pdf->Cell(22.5, 6, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 148);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode('100%'),  1, 0, 'C', true);


    $pdf->SetFillColor(201, 223, 242); //Fondo verde de celda
    $pdf->SetXY(172.5, 121);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["estres1"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 126);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["estres2"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 131);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["estres3"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 136);
    $pdf->Cell(22.5, 6, utf8_decode($data[0]["estres4"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 142);
    $pdf->Cell(22.5, 6, utf8_decode($data[0]["estres5"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 148);
    $pdf->SetFillColor(139, 180, 217); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode($this->averagePuntaje($listEstres)),  1, 0, 'C', true);



    $pdf->SetXY(10, 153);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->MultiCell(185, 10, utf8_decode('OPORTUNIDAD DE MEJORA:
' . $data[0]["oportunidadMejora"]), 1, 'L', true);



    $pdf->SetXY(10, 150);

    $pdf->Line(10, 156, 10, 260);
    $pdf->Line(195, 156, 195, 260);
    $pdf->Line(10, 260, 195, 260);


    $data[0]["firmaEvaluador"] != "" ?
      $pdf->Image('firmas/' . $data[0]["firmaEvaluador"], 35, 200, 40, 40)  :
      $pdf->Cell(1, 1, "",  0, 0, 'C', true);

    //$pdf->Image('firmas/' . $data[0]["firmaEvaluador"], 35, 200, 40, 40);
    $pdf->Line(35, 240, 80, 240);
    $pdf->SetXY(40, 240);
    $pdf->Cell(50, 6, utf8_decode('DNI: ' . $data[0]["dniEvaluador"]));
    $pdf->SetXY(40, 243);
    $pdf->Cell(50, 6, utf8_decode($data[0]["usuarioEvaluador"]));
    $pdf->SetXY(40, 248);
    $pdf->Cell(50, 6, utf8_decode("Firma del Supervisor"));




    $data[0]["firmaEvaluado"] != "" ?
      $pdf->Image('firmas/' . $data[0]["firmaEvaluado"], 125, 200, 40, 40)  :
      $pdf->Cell(1, 1, "",  0, 0, 'C', true);

    // Signature
    //$pdf->Image('firmas/' . $data[0]["firmaEvaluado"], 125, 200, 40, 40);
    $pdf->Line(120, 240, 170, 240);
    $pdf->SetXY(135, 240);
    $pdf->Cell(50, 6, utf8_decode('DNI: ' . $data[0]["dniEvaluado"]));
    $pdf->SetXY(135, 243);
    $pdf->Cell(50, 6, utf8_decode($data[0]["usuarioEvaluado"]));
    $pdf->SetXY(135, 248);
    $pdf->Cell(50, 6, utf8_decode("Firma del trabajador"));




    $pdf->SetXY(10, 255);
    $pdf->SetFont('Helvetica', 'B', 6);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->MultiCell(185, 5, utf8_decode('MPORTANTE: AL FIRMAR ESTA FICHA, USTED ES RESPONSABLE DE LA EVALUACIONESY CON ELLO A SU CONTENIDO, EL CUAL SERÁ USADO POR LA 
DIRECCIÓN DEL PROYECTO PARA LOS FINES QUE CONSIDERE CONVENIENTE.'), 1, 'C', true);



    $fecha = new DateTime();
    $fecha = $fecha->getTimestamp();

    $filename = "public/reports/evaluacion_competencia" . $fecha . ".pdf";
    //$nombrePDF =  "certificado".$fecha.".pdf";

    if (file_exists($filename)) {
      unlink($filename);
    }

    $pdf->Output($filename, 'F');
    if (file_exists($filename)) {
      return $filename;
    } else {
      return 0;
    }
  }

  function averagePuntaje($data)
  {

    $sumTotal = 0;

    foreach ($data as $variable) {
      $sumTotal += $variable;
    }

    $average = ($sumTotal * 20) / 15;
    $average = round($average, 2);
    return $average;
  }
}