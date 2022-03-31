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


    $pdf->Image('public/img/logo.png', 11, 12, 22);
    $pdf->Cell(35, 15, '', 1, 0, 'C');


    $pdf->MultiCell(105, 15, utf8_decode('EVALUACIÓN DE COMPETENCIAS SSMA'), 1, 'C', false);
    $pdf->SetFont('Helvetica', '', 8);


    $pdf->SetXY(150, 10);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->MultiCell(45, 3.75, utf8_decode('PSPC-100-X-PR-010-FR-001
Revisión: 0
Emisión: 09/03/2022
Página: 1 de 1'), 1, 'L', false);


    $pdf->SetXY(150, 28);
    $pdf->SetFont('Helvetica', '', 6);
    $pdf->SetFillColor(201, 223, 242); //Fondo verde de celda
    $pdf->Cell(22.5, 2.5, utf8_decode('Excelente'),  1, 0, 'L', true);
    $pdf->Cell(22.5, 2.5, utf8_decode('3'),  1, 0, 'C', true);

    $pdf->SetXY(150, 30.5);
    $pdf->Cell(22.5, 2.5, utf8_decode('Bueno'),  1, 0, 'L', true);
    $pdf->Cell(22.5, 2.5, utf8_decode('2'),  1, 0, 'C', true);

    $pdf->SetXY(150, 33);
    $pdf->Cell(22.5, 2.5, utf8_decode('Deficiente'),  1, 0, 'L', true);
    $pdf->Cell(22.5, 2.5, utf8_decode('1'),  1, 0, 'C', true);


    $pdf->SetXY(150, 35.5);
    $pdf->Cell(22.5, 2.5, utf8_decode('No cumple'),  1, 0, 'L', true);
    $pdf->Cell(22.5, 2.5, utf8_decode('0'),  1, 0, 'C', true);


    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda

    $pdf->SetXY(11, 36);
    $pdf->SetFont('Helvetica', 'B', 6);
    $pdf->Cell(50, 5, utf8_decode('DATOS DEL EVALUADO'),  0, 0, 'L', true);

    // bordes

    $pdf->Line(10, 15, 10, 70);
    $pdf->Line(195, 15, 195, 70);

    // Datos personales del trabajador


    $pdf->SetFont('Helvetica', '', 6);

    $pdf->Line(10, 40, 195, 40);

    $pdf->SetXY(12, 42);
    $pdf->Cell(35, 5, utf8_decode('Nombres y apellidos : '),  0, 0, 'L', true);
    $pdf->Cell(50, 5, utf8_decode($data[0]["usuarioEvaluado"]),  0, 0, 'L', true);

    //85

    $pdf->Cell(15, 5, utf8_decode('Cargo : '),  0, 0, 'L', true);
    $pdf->Cell(60, 5, utf8_decode($data[0]["descripcionCargoEvaluado"]),  0, 0, 'L', true);


    $pdf->Cell(10, 5, utf8_decode('DNI : '),  0, 0, 'L', true);
    $pdf->Cell(12, 5, utf8_decode($data[0]["dniEvaluado"]),  0, 0, 'L', true);

    $pdf->SetXY(12, 47);
    $pdf->Cell(35, 5, utf8_decode('Firma : '),  0, 0, 'L', true);
    $data[0]["firmaEvaluado"] != "" ?
      $pdf->Image('firmas/' . $data[0]["firmaEvaluado"], 45, 42, 25, 20)  :
      $pdf->Cell(1, 1, "",  0, 0, 'C', true);

    //Cabecera de las casillas de evaluación

    //+15

    $pdf->SetXY(10, 60);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->SetFillColor(31, 76, 115); //Fondo verde de celda
    $pdf->SetTextColor(255, 255, 255); //Color del texto: Negro
    $pdf->Cell(140, 5, utf8_decode('ASPECTO A EVALUAR'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Peso'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Calificación'),  1, 0, 'C', true);



    /**
     * NIVEL DE COMPROMISO
     */


    $pdf->SetXY(10, 65);
    $pdf->SetFont('Helvetica', 'B', 6);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
    $pdf->Cell(35, 30, utf8_decode('NIVEL DE COMPROMISO'),  1, 0, 'C', true);





    $pdf->SetXY(45, 65);
    $pdf->SetFont('Helvetica', '', 6);
    $pdf->MultiCell(105, 5, utf8_decode('Finaliza oportunamente las tareas asignadas, sin necesidad de reprocesos.'), 1, 'L', false);

    $pdf->SetXY(45, 70);
    $pdf->MultiCell(105, 5, utf8_decode('Se autodirige, es decir, no es necesario recordarle continuamente lo que se debe hacer.'), 1, 'L', false);

    $pdf->SetXY(45, 75);
    $pdf->MultiCell(105, 5, utf8_decode('Realiza recomendaciones apropiadas o acertadas.'), 1, 'L', false);

    $pdf->SetXY(45, 80);
    $pdf->MultiCell(105, 5, utf8_decode('Pone su conocimiento y experiencia de format total al servicio  de la empresa.'), 1, 'L', false);

    $pdf->SetXY(45, 85);
    $pdf->MultiCell(105, 5, utf8_decode('Se enfoca en solucionar los problemas en lugar de buscar culpables.'), 1, 'L', false);

    $pdf->SetXY(45, 90);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    //$pdf->MultiCell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'), 1, 'L', false);
    $pdf->Cell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'),  1, 0, 'C', true);

    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetXY(150, 65);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 70);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 75);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 80);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 85);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 90);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode('100%'),  1, 0, 'C', true);


    $listCompromiso = [$data[0]["compromiso1"], $data[0]["compromiso2"], $data[0]["compromiso3"], $data[0]["compromiso4"], $data[0]["compromiso5"]];

    $pdf->SetFillColor(201, 223, 242); //Fondo verde de celda
    $pdf->SetXY(172.5, 65);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso1"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 70);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso2"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 75);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso3"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 80);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso4"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 85);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["compromiso5"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 90);
    $pdf->SetFillColor(139, 180, 217); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode($this->averagePuntaje($listCompromiso)),  1, 0, 'C', true);



    /**
     * DESEMEÑO EN SEGURIDAD
     */


    $pdf->SetXY(10, 95);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->SetFillColor(31, 76, 115); //Fondo verde de celda
    $pdf->SetTextColor(255, 255, 255); //Color del texto: Negro
    $pdf->Cell(140, 5, utf8_decode('ASPECTO A EVALUAR'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Peso'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Calificación'),  1, 0, 'C', true);




    $pdf->SetXY(10, 100);
    $pdf->SetFont('Helvetica', 'B', 6);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
    $pdf->Cell(35, 31, utf8_decode('DESEMPEÑO EN SEGURIDAD'),  1, 0, 'C', true);



    $pdf->SetXY(45, 100);
    $pdf->SetFont('Helvetica', '', 6);
    $pdf->MultiCell(105, 5, utf8_decode('Se comunica de forma adecuada con todos sus compañeros.'), 1, 'L', false);

    $pdf->SetXY(45, 105);
    $pdf->MultiCell(105, 5, utf8_decode('Fomenta y practica el respeto hacia todos los trabajadores de la empresa.'), 1, 'L', false);

    $pdf->SetXY(45, 110);
    $pdf->MultiCell(105, 5, utf8_decode('Capacidad para interceder en los conflictos que existen dentro de su equipo de trabajo.'), 1, 'L', false);

    $pdf->SetXY(45, 115);
    $pdf->MultiCell(105, 5, utf8_decode('Implementa o fomenta prácticas de trabajo seguro en su area de trabajo.'), 1, 'L', false);

    $pdf->SetXY(45, 120);
    $pdf->MultiCell(105, 3, utf8_decode('Realiza observaciones de comportamientos riesgosos e informa oportunamente a la empresa 
acerca de los peligros y riesgos latentes en su lugar de trabajo.'), 1, 'L', true);

    $pdf->SetXY(45, 126);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    //$pdf->MultiCell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'), 1, 'L', false);
    $pdf->Cell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'),  1, 0, 'C', true);


    $listSeguridad = [$data[0]["seguridad1"], $data[0]["seguridad2"], $data[0]["seguridad3"], $data[0]["seguridad4"], $data[0]["seguridad5"]];


    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetXY(150, 100);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 105);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 110);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 115);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 120);
    $pdf->Cell(22.5, 6, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 126);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode('100%'),  1, 0, 'C', true);


    $pdf->SetFillColor(201, 223, 242); //Fondo verde de celda
    $pdf->SetXY(172.5, 100);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["seguridad1"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 105);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["seguridad2"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 110);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["seguridad3"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 115);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["seguridad4"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 120);
    $pdf->Cell(22.5, 6, utf8_decode($data[0]["seguridad5"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 126);
    $pdf->SetFillColor(139, 180, 217); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode($this->averagePuntaje($listSeguridad)),  1, 0, 'C', true);




    /**
     * TOLERANCIA AL ESTRES
     */




    $pdf->SetXY(10, 131);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->SetFillColor(31, 76, 115); //Fondo verde de celda
    $pdf->SetTextColor(255, 255, 255); //Color del texto: Negro
    $pdf->Cell(140, 5, utf8_decode('ASPECTO A EVALUAR'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Peso'),  1, 0, 'C', true);
    $pdf->Cell(22.5, 5, utf8_decode('Calificación'),  1, 0, 'C', true);



    $pdf->SetXY(10, 136);
    $pdf->SetFont('Helvetica', 'B', 6);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
    $pdf->Cell(35, 31, utf8_decode('TOLERANCIA AL ESTRÉS'),  1, 0, 'C', true);



    $pdf->SetXY(45, 136);
    $pdf->SetFont('Helvetica', '', 6);
    $pdf->MultiCell(105, 5, utf8_decode('Se comunica de forma adecuada con todos sus compañeros.'), 1, 'L', false);

    $pdf->SetXY(45, 141);
    $pdf->MultiCell(105, 5, utf8_decode('Fomenta y practica el respeto hacia todos los trabajadores de la empresa.'), 1, 'L', false);

    $pdf->SetXY(45, 146);
    $pdf->MultiCell(105, 5, utf8_decode('Capacidad para interceder en los conflictos que existen dentro de su equipo de trabajo.'), 1, 'L', false);

    $pdf->SetXY(45, 151);
    $pdf->MultiCell(105, 3.5, utf8_decode('Sabe trabajar en equipo, integrándose y participando positivamente para alcanzar los objetivos 
y metas comunes.'), 1, 'L', false);

    $pdf->SetXY(45, 156);
    $pdf->MultiCell(105, 3.5, utf8_decode('Capacidad de desempeñarse eficientemente en situaciones estresantes y poder sobrellevar 
las complicaciones que surgan de éstas.'), 1, 'L', true);

    $pdf->SetXY(45, 162);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    $pdf->Cell(105, 5, utf8_decode('DESEMPEÑO PROMEDIO'),  1, 0, 'C', true);


    $listEstres = [$data[0]["estres1"], $data[0]["estres2"], $data[0]["estres3"], $data[0]["estres4"], $data[0]["estres5"]];

    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->SetXY(150, 136);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 141);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 146);
    $pdf->Cell(22.5, 5, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 151);
    $pdf->Cell(22.5, 6, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 156);
    $pdf->Cell(22.5, 6, utf8_decode('20%'),  1, 0, 'C', true);
    $pdf->SetXY(150, 162);
    $pdf->SetFillColor(255, 252, 187); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode('100%'),  1, 0, 'C', true);


    $pdf->SetFillColor(201, 223, 242); //Fondo verde de celda
    $pdf->SetXY(172.5, 136);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["estres1"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 141);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["estres2"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 146);
    $pdf->Cell(22.5, 5, utf8_decode($data[0]["estres3"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 151);
    $pdf->Cell(22.5, 6, utf8_decode($data[0]["estres4"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 156);
    $pdf->Cell(22.5, 6, utf8_decode($data[0]["estres5"]),  1, 0, 'C', true);
    $pdf->SetXY(172.5, 162);
    $pdf->SetFillColor(139, 180, 217); //Fondo verde de celda
    $pdf->Cell(22.5, 5, utf8_decode($this->averagePuntaje($listEstres)),  1, 0, 'C', true);



    $pdf->SetXY(10, 167);
    $pdf->SetFillColor(255, 255, 255); //Fondo verde de celda
    $pdf->MultiCell(185, 10, utf8_decode('OPORTUNIDAD DE MEJORA:
' . $data[0]["oportunidadMejora"]), 0, 'L', true);



    $pdf->SetXY(10, 150);

    $pdf->Line(10, 150, 10, 230);
    $pdf->Line(195, 150, 195, 230);

    $pdf->Line(10, 200, 195, 200);
    $pdf->Line(10, 230, 195, 230);


    $pdf->SetXY(15, 220);
    $pdf->Cell(25, 5, utf8_decode('Nombres del evaluador : '),  0, 0, 'L', true);
    $pdf->Cell(50, 5, utf8_decode($data[0]["usuarioEvaluador"]),  0, 0, 'L', true);

    $pdf->Cell(20, 5, utf8_decode('fecha de evaluación : '),  0, 0, 'L', true);
    $pdf->Cell(25, 5, utf8_decode($data[0]["registro"]),  0, 0, 'L', true);

    $pdf->Cell(10, 5, utf8_decode('Firma : '),  0, 0, 'L', true);
    $data[0]["firmaEvaluado"] != "" ?
      $pdf->Image('firmas/' . $data[0]["firmaEvaluador"], 155, 200, 35, 35)  :
      $pdf->Cell(1, 1, "",  0, 0, 'C', true);

    /*

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
DIRECCIÓN DEL PROYECTO PARA LOS FINES QUE CONSIDERE CONVENIENTE.'), 1, 'C', true);*/



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