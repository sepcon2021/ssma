<?php
require_once "public/fpdf/fpdf.php";

class GeneratePDF
{

    public function generateIncidenciaPdf($documento)
    {

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Image('public/img/logo.png', 11, 11, 18);
        $pdf->Cell(20, 20, '', 1, 0, 'C');
        $pdf->MultiCell(130, 10, 'REPORTE PRELIMINAR DE ACCIDENTE, INCIDENTE
            Y ENFERMEDAD OCUPACIONAL', 1, 'C', false);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetXY(160, 10);
        $pdf->MultiCell(35, 5, utf8_decode('PSPC-100-X-PR-006-FR-001 Revisión: 0
        Emisión: 30/05/19
        Página: 1 de 1'), 1, 'L', false);

        $pdf->SetFont('Helvetica', '', 7);

        $pdf->Cell(30, 6, 'Proyecto / Sede : ', 1);
        $pdf->Cell(30, 6, utf8_decode($documento['nombre']), 1);
        $pdf->Cell(30, 6, utf8_decode('Área : '), 1);
        $pdf->Cell(35, 6, utf8_decode($documento['area_nombre']), 1);

        $pdf->Cell(10, 6, 'Cliente', 1);
        $pdf->Cell(50, 6, utf8_decode($documento['cliente']), 1, 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(185, 7, utf8_decode('TIPIFICACIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL'), 0, 1, 'C');
        $pdf->SetFont('Helvetica', '', 7);

        $pdf->Rect(10, 44, 185, 70);

        $pdf->SetXY(15, 48);
        $pdf->Cell(4, 4, $documento['materialmenor'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(35, 47);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Daño Material < 500 $"));

        $pdf->SetXY(15, 56);
        $pdf->Cell(4, 4, $documento['materialmayor'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(35, 55);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Daño Material > 500 $"));

        $pdf->SetXY(15, 64);
        $pdf->Cell(4, 4, $documento['derramemenor'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(35, 63);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Derrame de Hidrocarburos < 2 m3"));

        $pdf->SetXY(15, 72);
        $pdf->Cell(4, 4, $documento['derramemayor'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(35, 71);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Derrame de Hidrocarburos > 2 m3"));

        $pdf->SetXY(15, 80);
        $pdf->Cell(4, 4, $documento['conherido'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(35, 79);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Accidente Vehicular con Herido"));

        $pdf->SetXY(15, 88);
        $pdf->Cell(4, 4, $documento['sinherido'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(35, 87);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Accidente Vehicular sin Herido"));

        $pdf->SetXY(15, 96);
        $pdf->Cell(4, 4, $documento['vehicularmenor'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(35, 95);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Accidente Vehicular < 500 $"));

        $pdf->SetXY(15, 104);
        $pdf->Cell(4, 4, $documento['vehicularmayor'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(35, 103);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Accidente Vehicular > 500 $"));

        $pdf->SetXY(105, 48);
        $pdf->Cell(4, 4, $documento['fac'] == "1" ? utf8_decode("X") : "", 1, 1, "C");
        $pdf->SetXY(135, 47);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("(F.A.C) Caso de Primeros Auxilios"));

        $pdf->SetXY(105, 56);
        $pdf->Cell(4, 4, $documento['mto'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(135, 55);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("(M.T.O) Accidente Con Tratamiento Médico"));

        $pdf->SetXY(105, 64);
        $pdf->Cell(4, 4, $documento['rwc'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(135, 63);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("(R.W.C) Accidente Con Trabajo Restringido"));

        $pdf->SetXY(105, 72);
        $pdf->Cell(4, 4, $documento['lti'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(135, 71);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("(L.T.I) Accidente Con Pérdida de Jornada"));

        $pdf->SetXY(105, 80);
        $pdf->Cell(4, 4, $documento['ftl'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(135, 79);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("(F.T.L) Fatalidad"));

        $pdf->SetXY(105, 88);
        $pdf->Cell(4, 4, $documento['incidente'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(135, 87);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("Incidente"));

        $pdf->SetXY(105, 96);
        $pdf->Cell(4, 4, $documento['eo'] == "1" ? utf8_decode("X") : "", 1, 0, "C");
        $pdf->SetXY(135, 95);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode("(E.O) Enfermedad Ocupacional"));

        $pdf->SetXY(10, 114);

        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(180, 6, utf8_decode("DESCRIPCIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL"), 0, 1, 'L');
        $pdf->Cell(180, 6, "(Incluyendo nombres y cargos de las personas involucradas)", 0, 1, 'L');

        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Multicell(185, 6, utf8_decode($documento['descripcion']), 1, 1, false);

        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(180, 6, utf8_decode("ACCIONES INMEDIATAS DESPUES DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL"), 0, 1, 'L');
        $pdf->Cell(180, 3, utf8_decode("(Atención médica, evacuación, reparación de daños materiales, acciones correctivas, etc)"), 0, 1, 'L');

        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Multicell(185, 6, utf8_decode($documento['acciones']), 1, 1, false);

        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(25, 6, 'ELABORADO POR:', 0);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(50, 6, utf8_decode($documento['elaborado']), 0, 1);

        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(25, 6, 'EVIDENCIA FOTOGRAFICA:', 0, 1);

        /*$image = 'public/photos/' . $documento['foto'];

        if ($this->isfile($image)) {
            $pdf->Image($image, 50, 180, 100);
            
        }*/


        $photos = explode(",",$documento['foto']);

        foreach ($photos as $item) {
            if (strlen($item) > 0) {

                $convert = $this->getExtensionPhoto($item);
                $image = 'public/photos/' . $convert;
                if ($this->isfile($image)) {
                    $pdf->Image($image, 50, 180, 100);
                }
            }
        }



        $filename = "public/reports/" . $documento['iddoc'] . ".pdf";

        if (file_exists($filename)) {
            unlink($filename);
        }

        $pdf->Output($filename, 'F');
        //$pdf->Output();
        if (file_exists($filename)) {
            return $filename;
        } else {
            return "fail documento";
        }
    }

    public function isFile($file)
    {
        $f = pathinfo($file, PATHINFO_EXTENSION);
        return (strlen($f) > 0) ? true : false;
    }

    public function generateTopsPdf($documento)
    {

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);

        $pdf->Image('public/img/logo.png', 11, 11, 18);
        $pdf->Cell(20, 20, '', 1, 0, 'C');

        $pdf->MultiCell(130, 20, utf8_decode('Tarjeta de Observación Preventiva'), 1, 'C', false);
        $pdf->SetFont('Helvetica', '', 8);

        $pdf->SetXY(160, 10);
        $pdf->MultiCell(35, 5, utf8_decode('PSPC-100-X-PR-006-FR-001 Revisión: 2
        Emisión: 30/05/2021
        Página: 1 de 1'), 1, 'L', false);
        $pdf->SetFont('Helvetica', '', 7);



        $pdf->SetXY(10, 30);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, 'Proyecto / Sede ', 1);
        $pdf->Cell(120, 5, utf8_decode($documento->sede), 1);

        $pdf->SetXY(10, 35);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Área  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->area_nombre), 1);

        $pdf->SetXY(10, 40);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Ubicación '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->observado_lugar), 1);


        $pdf->SetXY(10, 45);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Reportado por  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->reportado), 1);


        $pdf->SetXY(10, 50);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Área Observada '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->area_text), 1);


        $pdf->SetXY(10, 55);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Hora que fue realizada la observación  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->horario_observacion), 1);

        $pdf->SetXY(10, 60);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Fecha  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->fecha), 1);

        $pdf->SetXY(10, 65);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Observación  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->observacion), 1);

        $pdf->SetXY(10, 70);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Detalle del tipo observación   '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->observacion_detalle), 1);


        $pdf->SetXY(10, 75);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Relacionado con   '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->rel), 1);


        $pdf->SetXY(10, 80);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Otros  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->otros), 1);

        $pdf->SetXY(10, 85);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Tipo de EPP  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->tip), 1);


        $pdf->SetXY(10, 90);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Condición de EPP  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->con), 1);


        $pdf->SetXY(10, 95);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Puesto del observado '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->observado_puesto), 1);

        $pdf->SetXY(10, 100);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Tiempo en el proyecto de la persona observada'), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->tiempo_proyecto), 1);


        $pdf->SetXY(10, 105);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Edad de la persona observada '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->rango_edad), 1);

        $pdf->SetXY(10, 110);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Partes de cuerpo expuestas a lesión  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->lesion), 1);

        $pdf->SetXY(10, 115);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Obstáculos /Barreras  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->obstaculo), 1);

        $pdf->SetXY(10, 120);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('¿Se realizó la retroalimentación?  '), 1);
        $pdf->Cell(120, 5, utf8_decode(($documento->observado_retroalimentacion)), 1);

        $pdf->SetXY(10, 125);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('¿Se logró el cambio?  '), 1);
        $pdf->Cell(120, 5, utf8_decode(($documento->observado_cambio)), 1);

        $pdf->SetXY(10, 130);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('¿Personal reincidente?  '), 1);
        $pdf->Cell(120, 5, utf8_decode(($documento->observado_reincidente)), 1);

        $pdf->SetXY(10, 135);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(65, 5, utf8_decode('Potencial  '), 1);
        $pdf->Cell(120, 5, utf8_decode($documento->pot), 1);

        $pdf->SetXY(10, 140);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(60, 5, utf8_decode('Descripción de la observación preventiva '), 0);

        $pdf->SetXY(10, 145);
        $pdf->Multicell(185, 5, utf8_decode($documento->descripcion), 1, 1, false);

        $pdf->SetFont('Helvetica', '', 9);

        $pdf->SetXY(10, 161);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Cell(60, 5, utf8_decode('Medidas correctivas que se tomarón  '), 0);


        $pdf->SetXY(10, 166);
        $pdf->Multicell(185, 5, utf8_decode($documento->medidas), 1, 1, false);

        $photos = explode(",",$documento->foto);

        foreach ($photos as $item) {
            if (strlen($item) > 0) {

                $convert = $this->getExtensionPhoto($item);
                $image = 'public/photos/' . $convert;
                if ($this->isfile($image)) {
                    $pdf->Image($image, 80, 200, 70);
                }
            }
        }




        $filename = "public/reports/" . $documento->id . ".pdf";

        if (file_exists($filename)) {
            unlink($filename);
        }

        $pdf->Output($filename, 'F');
        if (file_exists($filename)) {
            return $filename;
        } else {
            return "fail documento";
        }
    }



    public function generateSeguridadPdf($documento)
    {

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Image('public/img/logo.png', 11, 11, 18);
        $pdf->Cell(20, 20, '', 1, 0, 'C');
        $pdf->MultiCell(130, 20, utf8_decode('Inspección planeada de seguridad'), 1, 'C', false);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetXY(160, 10);
        $pdf->MultiCell(35, 5, utf8_decode('PSPC-110-X-PR-001-FR-007 Revisión: 0
Emisión: 17/05/19
Página: 1 de 1'), 1, 'L', false);

        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(30, 6, 'Proyecto / Sede : ', 1);
        $pdf->Cell(30, 6, utf8_decode($documento['seguridad']['proyecto']), 1);
        $pdf->Cell(10, 6, utf8_decode('Área : '), 1);
        $pdf->Cell(50, 6, utf8_decode($documento['seguridad']['area_nombre']), 1);
        $pdf->Cell(20, 6, utf8_decode('Ubicación'), 1);
        $pdf->Cell(45, 6, utf8_decode($documento['seguridad']['ubicacion']), 1, 1);


        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(30, 6, utf8_decode('Tipo de inspección: '), 1);
        $pdf->Cell(30, 6, utf8_decode($documento['seguridad']['tipo']  == 1 ? 'Informal' : 'Planeada'), 1);
        $pdf->Cell(10, 6, utf8_decode('Fecha : '), 1);
        $pdf->Cell(50, 6, utf8_decode($documento['seguridad']['fechaInspeccion']), 1);
        $pdf->Cell(20, 6, utf8_decode('Inspeccionado'), 1);
        $pdf->Cell(45, 6, utf8_decode($documento['seguridad']['inspeccionado']), 1, 1);
        $pdf->MultiCell(185, 10, '', 0, 'C', false);



        foreach ($documento['detalleSeguridad'] as $detalleSeguridad) {
            $pdf->MultiCell(185, 5, utf8_decode('Tipo : ' . $detalleSeguridad['tipo_observacion'] . '
Condición o practica subestandar : ' . $detalleSeguridad['condicion'] . '
Clasificación : ' . $this->nombreClasificacion($detalleSeguridad['clasificacion']) . '
Acción correctiva : ' . $detalleSeguridad['accion'] . '
Responsable : ' . $detalleSeguridad['responsable'] . '
Fecha de cumplimiento : ' . $detalleSeguridad['fecha'] . '
Seguimiento : ' . $detalleSeguridad['seguimiento'] . ''), 1, 'L', false);
            //$detalleSeguridad['evidencia'] != '' ? $pdf->Cell(185, 50, $pdf->Image('public/photos/' . $detalleSeguridad['evidencia'], $pdf->GetX(), $pdf->GetY(), 40, 40), 1, 1, 'C', false) :  $pdf->Cell(0, 0, '', 0, 1, 'C', false); // Fourth column of row 1 
//extraerDocumento($data)

$pdf->Cell(185, 50,$this->extraerDocumento($detalleSeguridad['evidencia']) , 1, 1, 'C', false);
        }


        $pdf->MultiCell(185, 10, '', 0, 'C', false);
        $pdf->MultiCell(185, 5, utf8_decode('Clasificación de las condiciones sub estándar:	'), 1, 'C', false);
        $pdf->MultiCell(185, 5, utf8_decode('(A) Mayor: Se considera que el peligro encontrado, podría ocasionar daños mayores, o tiene un potencial de pérdida alto, por lo tanto existe un plazo máximo de levantamiento de la observación de 24 horas'), 1, 'L', false);
        $pdf->MultiCell(185, 5, utf8_decode('Observación : ' . $documento['seguridad']['obser01']), 1, 'L', false);

        $pdf->MultiCell(185, 5, utf8_decode('(B) Serio: Se considera que el peligro encontrado, podría ocasionar daños regulares, o tiene un potencial de pérdida medio, por lo tanto existe un plazo máximo de levantamiento de la observación encontrada de 72 horas o 3 días.'), 1, 'L', false);
        $pdf->MultiCell(185, 5, utf8_decode('Observación : ' . $documento['seguridad']['obser02']), 1, 'L', false);

        $pdf->MultiCell(185, 5, utf8_decode('(C) Menor: Se considera que el peligro encontrado, podría ocasionar daños menores, o tiene un potencial de pérdida bajo, por lo tanto existe un plazo máximo de levantamiento de la observación encontrada de 14 días.'), 1, 'L', false);
        $pdf->MultiCell(185, 5, utf8_decode('Observación : ' . $documento['seguridad']['obser03']), 1, 'L', false);

        $fecha = new DateTime();
        $fecha = $fecha->getTimestamp();

        $filename = "public/reports/".$fecha.".pdf";

        if (file_exists($filename)) {
            unlink($filename);
        }

        $pdf->Output($filename, 'F');
        //$pdf->Output();
        if (file_exists($filename)) {
            return $filename;
        } else {
            return "fail documento";
        }
    }

    
 
    public function generateOptPdf($documento)
    {

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Image('public/img/logo.png', 11, 11, 18);
        $pdf->Cell(20, 20, '', 1, 0, 'C');
        $pdf->MultiCell(130, 20, utf8_decode('Observación planeada de tarea (OPT)'), 1, 'C', false);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetXY(160, 10);
        $pdf->MultiCell(35, 5, utf8_decode('PSPC- 
Revisión: 0
Emisión: 
Página: 1 de 1'), 1, 'L', false);



        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 6, 'Proyecto / Sede : ', 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode($documento['opt']['proyecto_nombre']), 1);
       
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(15, 6, utf8_decode('Área : '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode($documento['opt']['area_nombre']), 1);
       
        /*$pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(20, 6, utf8_decode('Ubicación'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(45, 6, utf8_decode($documento['opt']['ubicacion']), 1, 1);*/

        $pdf->SetXY(10, 36);

        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 6, utf8_decode('Área observada : '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(30, 6, utf8_decode($documento['opt']['area_observada_nombre']), 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(40, 6, utf8_decode('Nombre del equipo observado: '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(85, 6, utf8_decode($documento['opt']['nombre']), 1);


        $pdf->SetXY(10,42);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 6, utf8_decode('Tiempo proyecto'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(30, 6, utf8_decode($documento['opt']['tiempo_proyecto']), 1, 1);
        $pdf->SetXY(70,42);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 6, utf8_decode('Tiempo en el trabajo'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(45, 6, utf8_decode($documento['opt']['tiempo_trabajo']), 1, 1);
        $pdf->SetXY(145,42);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(20, 6, utf8_decode('Fecha'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(30, 6, utf8_decode($documento['opt']['fecha']), 1, 1);


        

        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 6, utf8_decode('Guardia'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(70, 6, utf8_decode($documento['opt']['guardia']), 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(20, 6, utf8_decode('Ocupación'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(65, 6, utf8_decode($documento['opt']['ocupacion']), 1);


        $pdf->SetXY(10,54);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 6, utf8_decode('Tarea'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 6, utf8_decode($documento['opt']['tarea']), 1);
        $pdf->SetXY(10,60);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 6, utf8_decode('Razón de la OPT'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 6, utf8_decode($documento['opt']['razon_opt']), 1);

        $pdf->SetXY(10,66);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 4, utf8_decode('Elaborado por'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 4, utf8_decode($documento['opt']['usuario_nombres'].' '.$documento['opt']['usuario_apellidos']), 1);


        $pdf->SetXY(10,70);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 4, utf8_decode('Responsable'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 4, utf8_decode($documento['opt']['responsable']), 1);

        $pdf->SetXY(10,74);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 4, utf8_decode('Riesgo crítico'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 4, utf8_decode($documento['opt']['riesgoCritico']), 1);


        $pdf->SetXY(10,78);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 4, utf8_decode('PET'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 4, utf8_decode($documento['opt']['petLog']), 1);


        $pdf->SetXY(10,82);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 4, utf8_decode('Ubicación'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 4, utf8_decode($documento['opt']['ubicacion']), 1);


        $pdf->SetXY(10,86);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Observación de la Tarea'),  1, 0, 'C', true);

        $pdf->SetXY(10,90);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(90, 5, utf8_decode('Pasos'),  1, 0, 'C', true);

        $pdf->SetXY(100,90);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(95, 5, utf8_decode('Observaciones'),  1, 0, 'C', true);

        $posicionY = 90;
        foreach ($documento['optObservacion'] as $observacion){

            $pdf->SetXY(10,$posicionY);
            $pdf->SetFont('Helvetica', '', 7);
            $pdf->MultiCell(90, 3, utf8_decode('
            
            
            '), 1, 'L', false);
            $pdf->SetXY(10,$posicionY);
            $pdf->MultiCell(90, 3, utf8_decode($observacion['pasos']), 0, 'L', false);
            
            $pdf->SetXY(100,$posicionY);
            $pdf->MultiCell(95, 3, utf8_decode('
            
            
            '), 1, 'L', false);
            $pdf->SetXY(100,$posicionY);
            $pdf->MultiCell(95, 3, utf8_decode($observacion['observaciones']), 0, 'L', false);

            $posicionY +=12;
        }

        $pdf->SetXY(10,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Observación planeada de resultados'),  1, 0, 'C', true);
        $pdf->SetXY(10,$posicionY+=5);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Fortalezas - Oportunidad para felicitar'),  1, 0, 'C', true);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetXY(10,$posicionY+=5);
        $pdf->MultiCell(185, 3, utf8_decode($documento['opt']['oportunidades']), 0, 'L', false);

        $pdf->SetXY(10,$posicionY);
        $pdf->MultiCell(185, 3, utf8_decode('
            
            
        '), 1, 'L', false);


        $pdf->SetXY(10,$posicionY+=12);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 3, utf8_decode('Recomendaciones'),  1, 0, 'C', true);
        
        $pdf->SetXY(10,$posicionY+=3);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(160, 5, utf8_decode('Acciones'),  1, 0, 'C', true);

        /*$pdf->SetXY(110,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(60, 5, utf8_decode('Responsable'),  1, 0, 'C', true);*/

        $pdf->SetXY(170,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(25, 5, utf8_decode('Fecha'),  1, 0, 'C', true);


        $posicionY +=5;


        foreach ($documento['optRecomendaciones'] as $recomendacion){

            $pdf->SetFont('Helvetica', '', 7);

            $pdf->SetXY(10,$posicionY);
            $pdf->MultiCell(160, 3, utf8_decode('
            
            
            '), 1, 'L', false);

            $pdf->SetXY(10,$posicionY);
            $pdf->SetFillColor(240,179,105); //Fondo verde de celda
            $pdf->MultiCell(160, 3,utf8_decode( $recomendacion['acciones']), 0, 'L', false);
    

            /*$pdf->SetXY(110,$posicionY);
            $pdf->MultiCell(60, 3, utf8_decode('
            
            
            '), 1, 'L', false);
            $pdf->SetXY(110,$posicionY);
            $pdf->SetFillColor(31,192,245); //Fondo verde de celda*/
            //$pdf->MultiCell(60, 3,utf8_decode( $recomendacion['responsable']), 0, 'L', false);


            $pdf->SetXY(170,$posicionY);
            $pdf->MultiCell(25, 3, utf8_decode('
            
            
            '), 1, 'L', false);

            $pdf->SetXY(170,$posicionY);
            $pdf->SetFillColor(255,255,255); //Fondo verde de celda
            $pdf->MultiCell(25, 3,utf8_decode( $recomendacion['fecha']), 0, 'L', false);

            $posicionY +=12;

        }


        $pdf->SetXY(10,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Nombre de los observadores'),  1, 0, 'C', true);

        $posicionY +=5;

        
        foreach ($documento['optObservadores'] as $observador){



            $pdf->SetXY(10,$posicionY);
            $pdf->SetFont('Helvetica', '', 8);
            $pdf->SetFillColor(255,255,255); //Fondo verde de celda
            $pdf->MultiCell(185, 5, utf8_decode($observador['nombre']), 1, 'L', false);

            $posicionY +=5;

        }

        
        $fecha = new DateTime();
        $fecha = $fecha->getTimestamp();

        $filename = "public/reports/".$fecha.".pdf";

        if (file_exists($filename)) {
            unlink($filename);
        }

        $pdf->Output($filename, 'F');
        //$pdf->Output();
        if (file_exists($filename)) {
            return $filename;
        } else {
            return "fail documento";
        }
    }



    public function generateIpercPdf($documento)
    {

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Image('public/img/logo.png', 11, 11, 18);
        $pdf->Cell(20, 20, '', 1, 0, 'C');
        $pdf->MultiCell(130, 20, utf8_decode('INSPECCIÓN DE IPERC CONTINUO'), 1, 'C', false);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetXY(160, 10);
        $pdf->MultiCell(35, 5, utf8_decode('PSPC- 
Revisión: 0
Emisión: 
Página: 1 de 1'), 1, 'L', false);



        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 5, 'Proyecto / Sede : ', 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(30, 5, utf8_decode($documento['nombre_proyecto']), 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(10, 5, utf8_decode('Área : '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(50, 5, utf8_decode($documento['nombre_area']), 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(20, 5, utf8_decode('Ubicación'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(45, 5, utf8_decode($documento['ubicacion']), 1, 1);


        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 5, utf8_decode('Área observada : '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(60, 5, utf8_decode($documento['area_observada']), 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 5, utf8_decode('Empresa '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(65, 5, utf8_decode($documento['empresa']), 1);


        $pdf->SetXY(10, 40);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(40, 5, utf8_decode('Nombre de la tarea o trabajo'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(120, 5, utf8_decode($documento['nombre_tarea']), 1, 1);
        $pdf->SetXY(170, 40);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(10, 5, utf8_decode('Fecha'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(15, 5, utf8_decode($documento['fecha']), 1, 1);


        $pdf->SetXY(10,45);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Observación de la Tarea'),  1, 0, 'C', true);

        $pdf->SetXY(10,50);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Si responde No a las primeras tres preguntas, NO INICIE EL TRABAJO'),  1, 0, 'C', true);


                
        $pdf->SetXY(10,55);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(100, 5, utf8_decode('Generales'),  1, 0, 'C', true);

        $pdf->SetXY(110,55);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(20, 5, utf8_decode('Respuesta'),  1, 0, 'C', true);

        $pdf->SetXY(130,55);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(65, 5, utf8_decode('Medida de Control'),  1, 0, 'C', true);




        $posicionY = 60;
        $contador = 1;

        foreach($this->listaRiesgos() as $riesgo){

            $pdf->SetFont('Helvetica', '', 7);

            $pdf->SetXY(10,$posicionY);
            $pdf->MultiCell(100, 3, utf8_decode('
            
            
            '), 1, 'L', false);

            $pdf->SetXY(10,$posicionY);
            $pdf->SetFillColor(240,179,105); //Fondo verde de celda
            $pdf->MultiCell(100, 3,utf8_decode($riesgo), 0, 'L', false);
    

            $pdf->SetXY(110,$posicionY);
            $pdf->MultiCell(20, 3, utf8_decode('
            
            
            '), 1, 'L', false);
            $pdf->SetXY(110,$posicionY);
            $pdf->SetFillColor(31,192,245); //Fondo verde de celda
            $pdf->MultiCell(20, 3,utf8_decode($documento['riesgo'.$contador] == 1 ? 'Si' : 'No'), 0, 'C', false);


            $pdf->SetXY(130,$posicionY);
            $pdf->MultiCell(65, 3, utf8_decode('
            
            
            '), 1, 'L', false);

            $pdf->SetXY(130,$posicionY);
            $pdf->SetFillColor(255,255,255); //Fondo verde de celda
            $pdf->MultiCell(65, 3,utf8_decode($documento['comentario'.$contador]), 0, 'L', false);

            $contador++;
            $posicionY +=12;
    
        }

        $pdf->SetXY(10,$posicionY+=30);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('2. CONTROL DE RIESGOS CRITICOS'),  1, 0, 'C', true);

        $posicionY =15;


        $pdf->SetXY(10,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(150, 5, utf8_decode('2.1 RIESGOS CRITICOS'),  1, 0, 'C', true);

        $pdf->SetXY(160,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(35, 5, utf8_decode('Respuesta'),  1, 0, 'C', true);



        $contador = 1;
        $posicionY += 5;

        foreach($this->listaRiesgosCriticos() as $riesgoCriticos){

            $pdf->SetFont('Helvetica', '', 7);

            $pdf->SetXY(10,$posicionY);
            $pdf->MultiCell(150, 3, utf8_decode('
            '), 1, 'L', false);

            $pdf->SetXY(10,$posicionY);
            $pdf->SetFillColor(240,179,105); //Fondo verde de celda
            $pdf->MultiCell(150,3,utf8_decode($riesgoCriticos), 0, 'L', false);
    


            
            $pdf->SetXY(160,$posicionY);
            $pdf->MultiCell(35, 3, utf8_decode('
            '), 1, 'L', false);

            $pdf->SetXY(160,$posicionY);
            $pdf->SetFillColor(31,192,245); //Fondo verde de celda
            $pdf->MultiCell(35,3,utf8_decode($documento['riesgo_critico'.$contador] == 1 ? 'Si' : 'No'), 0, 'C', false);


            $posicionY +=6;
            $contador++;

        }

        $pdf->SetXY(10,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(150, 5, utf8_decode('2.2 CONTROL DE RIESGOS PARA MANOS'),  1, 0, 'C', true);

        $pdf->SetXY(160,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(35, 5, utf8_decode('Respuesta'),  1, 0, 'C', true);



        $contador = 1;
        $posicionY += 5;

        foreach($this->listaRiesgosManos() as $riesgoManos){

            $pdf->SetFont('Helvetica', '', 7);

            $pdf->SetXY(10,$posicionY);
            $pdf->MultiCell(150, 3, utf8_decode('
            '), 1, 'L', false);

            $pdf->SetXY(10,$posicionY);
            $pdf->SetFillColor(240,179,105); //Fondo verde de celda
            $pdf->MultiCell(150,3,utf8_decode($riesgoManos), 0, 'L', false);
    


            
            $pdf->SetXY(160,$posicionY);
            $pdf->MultiCell(35, 3, utf8_decode('
            '), 1, 'L', false);

            $pdf->SetXY(160,$posicionY);
            $pdf->SetFillColor(31,192,245); //Fondo verde de celda
            $pdf->MultiCell(35,3,utf8_decode($documento['riesgo_manos'.$contador] == 1 ? 'Si' : 'No'), 0, 'C', false);


            $posicionY +=6;
            $contador++;

        }



        $pdf->SetXY(10,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(150, 5, utf8_decode('2.3 CONTROLES COVID 19'),  1, 0, 'C', true);

        $pdf->SetXY(160,$posicionY);
        $pdf->SetFont('Helvetica', 'B', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(35, 5, utf8_decode('Respuesta'),  1, 0, 'C', true);



        $contador = 2;
        $posicionY += 5;

        foreach($this->listaRiesgoCovid() as $riesgoCovid){

            $pdf->SetFont('Helvetica', '', 7);

            $pdf->SetXY(10,$posicionY);
            $pdf->MultiCell(150, 3, utf8_decode('
            '), 1, 'L', false);

            $pdf->SetXY(10,$posicionY);
            $pdf->SetFillColor(240,179,105); //Fondo verde de celda
            $pdf->MultiCell(150,3,utf8_decode($riesgoCovid), 0, 'L', false);
    


            
            $pdf->SetXY(160,$posicionY);
            $pdf->MultiCell(35, 3, utf8_decode('
            '), 1, 'L', false);

            $pdf->SetXY(160,$posicionY);
            $pdf->SetFillColor(31,192,245); //Fondo verde de celda
            $pdf->MultiCell(35,3,utf8_decode($documento['riesgo_covid'.$contador] == 1 ? 'Si' : 'No'), 0, 'C', false);


            $posicionY +=6;
            $contador++;

        }
       
        $fecha = new DateTime();
        $fecha = $fecha->getTimestamp();

        $filename = "public/reports/".$fecha.".pdf";

        if (file_exists($filename)) {
            unlink($filename);
        }

        $pdf->Output($filename, 'F');
        //$pdf->Output();
        if (file_exists($filename)) {
            return $filename;
        } else {
            return "fail documento";
        }
    }


    public function generateRiesgoPdf($documento)
    {

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Image('public/img/logo.png', 11, 11, 18);
        $pdf->Cell(20, 20, '', 1, 0, 'C');
        $pdf->MultiCell(130, 20, utf8_decode('Riesgos Críticos'), 1, 'C', false);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetXY(160, 10);
        $pdf->MultiCell(35, 5, utf8_decode('PSPC- 
Revisión: 0
Emisión: 
Página: 1 de 1'), 1, 'L', false);



        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(25, 5, 'Proyecto / Sede : ', 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(50, 5, utf8_decode($documento['proyecto_nombre']), 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(10, 5, utf8_decode('Área : '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(50, 5, utf8_decode($documento['area_nombre']), 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(15, 5, utf8_decode('Ubicación'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(35, 5, utf8_decode($documento['ubicacion']), 1, 1);


        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(25, 5, utf8_decode('Área observada : '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(65, 5, utf8_decode($documento['area_observada_nombre']), 1);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 5, utf8_decode('Empresa '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(65, 5, utf8_decode($documento['empresa']), 1);


        $pdf->SetXY(10, 40);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(40, 5, utf8_decode('Descripción de la tarea auditada'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(145, 5, utf8_decode($documento['tarea_auditada']), 1, 1);
        $pdf->SetXY(10, 45);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(40, 5, utf8_decode('Líder de la auditoría'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(145, 5, utf8_decode($documento['lider_auditoria']), 1, 1);

        $pdf->SetXY(10, 50);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(40, 5, utf8_decode('Participantes'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(145, 5, utf8_decode($documento['participantes']), 1, 1);


        $pdf->SetXY(10, 55);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 5, utf8_decode('Elaborado por : '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(100, 5, utf8_decode($documento['usuario_nombres'].' '.$documento['usuario_apellidos']), 1);
        
        $pdf->SetXY(140, 55);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 5, utf8_decode('fecha '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(25, 5, utf8_decode($documento['empresa']), 1);

        $array1=array("title" => "1.- Aislamiento, bloqueo y etiquetado de Energías","lastIndex" => 7);
        $array2=array("title" => "2.- Trabajo en Espacios Confinados","lastIndex" => 8);
        $array3=array("title" => "3.- Trabajo con izaje o cargas suspendidas","lastIndex" => 9);
        $array4=array("title" => "4.- Trabajo en Altura o desnivel o cargas suspendidas","lastIndex" => 12 );
        $array5=array("title" => "5.- Controles Covid19 (Nueva Normalidad)","lastIndex" => 7);
        $array6=array("title" => "6.- Trabajo en excavaciones y zanjas","lastIndex" => 12);
        $array7=array("title" => "7.- Trabajos en caliente","lastIndex" => 11);
        $array8=array("title" => "8.- Herramientas manuales, eléctricas y Equipos Estacionarios ","lastIndex" => 10);
        $array9=array("title" => "9.- Operación con Equipo pesado, liviano móvil","lastIndex" => 9);
        $array10=array("title" => "10.- Trabajo con/cerca de energía y partes móviles","lastIndex" => 5);
        $array11=array("title" => "11.- Trabajo con Tuberías de HDPE","lastIndex" => 8);
        $array12=array("title" => "12.- Trabajos en circuitos energizados","lastIndex" => 5);
        $array13=array("title" => "13.- Trabajos con cerca con sustancias Químicas","lastIndex" => 8);
        $array14=array("title" => "14.- Ingreso a áreas restringidas sin Autorización ","lastIndex" => 7);


                
        $pdf->SetXY(10,60);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Sección 1 Identificación y Controles Críticos'),  1, 0, 'C', true);
        



        $array = array($array1, $array2,$array3);
        $index_uno=1;
        $index_dos=1;
        $index_total = 1;

        $posicionY = 65;
        
        foreach ($array as $value) {


            $pdf->SetXY(10,$posicionY);
            $pdf->SetFont('Helvetica', '', 8);
            $pdf->SetFillColor(194,194,194); //Fondo verde de celda
            $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
            $pdf->Cell(185, 5, utf8_decode( $value['title']),  1, 0, 'C', true);

            $posicionY +=5;
                        
            $index_dos=1;
        
                for ($j = 1; $j <= $value['lastIndex']; $j++) {


                    $pdf->SetFont('Helvetica', '', 7);

                    $pdf->SetXY(10,$posicionY);
                    $pdf->MultiCell(100, 2.5, utf8_decode('
                    
                    '), 1, 'L', false);
        
                    $pdf->SetXY(10,$posicionY);
                    $pdf->SetFillColor(240,179,105); //Fondo verde de celda
                    $pdf->MultiCell(100, 2.5,utf8_decode($this->listaCriticos()[$index_total]), 0, 'L', false);
            
        
                    $pdf->SetXY(110,$posicionY);
                    $pdf->MultiCell(20,  2.5, utf8_decode(' 
                    
                    '), 1, 'L', false);
                    $pdf->SetXY(110,$posicionY);
                    $pdf->SetFillColor(31,192,245); //Fondo verde de celda
                    $pdf->MultiCell(20,  2.5,utf8_decode($documento['riesgo'.($index_uno.$index_dos)] == 1 ? 'Si' : 'No'), 0, 'C', false);
        
        
                    $pdf->SetXY(130,$posicionY);
                    $pdf->MultiCell(65,  2.5, utf8_decode('
                    
                    '), 1, 'L', false);
        
                    $pdf->SetXY(130,$posicionY);
                    $pdf->SetFillColor(255,255,255); //Fondo verde de celda
                    $pdf->MultiCell(65,  2.5,utf8_decode($documento['riesgo'.($index_uno.$index_dos).'_comments']), 0, 'L', false);
        


                    $posicionY +=7.5;
                    $index_dos++;
                    $index_total++;

                }

            $index_uno++;
        }

        $pdf->SetXY(110,$posicionY+=30);
        $pdf->MultiCell(20,  2.5, utf8_decode(''), 0, 'L', false);




        $array = array($array4, $array5,$array6);
        $index_dos=1;
        $posicionY = 10;
        
        foreach ($array as $value) {


            $pdf->SetXY(10,$posicionY);
            $pdf->SetFont('Helvetica', '', 8);
            $pdf->SetFillColor(194,194,194); //Fondo verde de celda
            $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
            $pdf->Cell(185, 5, utf8_decode( $value['title']),  1, 0, 'C', true);

            $posicionY +=5;
                        
            $index_dos=1;
        
                for ($j = 1; $j <= $value['lastIndex']; $j++) {


                    $pdf->SetFont('Helvetica', '', 7);

                    $pdf->SetXY(10,$posicionY);
                    $pdf->MultiCell(100, 2.5, utf8_decode('
                    
                    '), 1, 'L', false);
        
                    $pdf->SetXY(10,$posicionY);
                    $pdf->SetFillColor(240,179,105); //Fondo verde de celda
                    $pdf->MultiCell(100, 2.5,utf8_decode($this->listaCriticos()[$index_total]), 0, 'L', false);
            
        
                    $pdf->SetXY(110,$posicionY);
                    $pdf->MultiCell(20,  2.5, utf8_decode(' 
                    
                    '), 1, 'L', false);
                    $pdf->SetXY(110,$posicionY);
                    $pdf->SetFillColor(31,192,245); //Fondo verde de celda
                    $pdf->MultiCell(20,  2.5,utf8_decode($documento['riesgo'.($index_uno.$index_dos)] == 1 ? 'Si' : 'No'), 0, 'C', false);
        
        
                    $pdf->SetXY(130,$posicionY);
                    $pdf->MultiCell(65,  2.5, utf8_decode('
                    
                    '), 1, 'L', false);
        
                    $pdf->SetXY(130,$posicionY);
                    $pdf->SetFillColor(255,255,255); //Fondo verde de celda
                    $pdf->MultiCell(65,  2.5,utf8_decode($documento['riesgo'.($index_uno.$index_dos).'_comments']), 0, 'L', false);
        


                    $posicionY +=7.5;
                    $index_dos++;
                    $index_total++;

                }

            $index_uno++;
        }




        
        $pdf->SetXY(110,$posicionY+=30);
        $pdf->MultiCell(20,  2.5, utf8_decode(''), 0, 'L', false);




        $array = array($array7, $array8,$array9);
        $index_dos=1;
        $posicionY = 10;
        
        foreach ($array as $value) {


            $pdf->SetXY(10,$posicionY);
            $pdf->SetFont('Helvetica', '', 8);
            $pdf->SetFillColor(194,194,194); //Fondo verde de celda
            $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
            $pdf->Cell(185, 5, utf8_decode( $value['title']),  1, 0, 'C', true);

            $posicionY +=5;
                        
            $index_dos=1;
        
                for ($j = 1; $j <= $value['lastIndex']; $j++) {


                    $pdf->SetFont('Helvetica', '', 7);

                    $pdf->SetXY(10,$posicionY);
                    $pdf->MultiCell(100, 2.5, utf8_decode('
                    
                    '), 1, 'L', false);
        
                    $pdf->SetXY(10,$posicionY);
                    $pdf->SetFillColor(240,179,105); //Fondo verde de celda
                    $pdf->MultiCell(100, 2.5,utf8_decode($this->listaCriticos()[$index_total]), 0, 'L', false);
            
        
                    $pdf->SetXY(110,$posicionY);
                    $pdf->MultiCell(20,  2.5, utf8_decode(' 
                    
                    '), 1, 'L', false);
                    $pdf->SetXY(110,$posicionY);
                    $pdf->SetFillColor(31,192,245); //Fondo verde de celda
                    $pdf->MultiCell(20,  2.5,utf8_decode($documento['riesgo'.($index_uno.$index_dos)] == 1 ? 'Si' : 'No'), 0, 'C', false);
        
        
                    $pdf->SetXY(130,$posicionY);
                    $pdf->MultiCell(65,  2.5, utf8_decode('
                    
                    '), 1, 'L', false);
        
                    $pdf->SetXY(130,$posicionY);
                    $pdf->SetFillColor(255,255,255); //Fondo verde de celda
                    $pdf->MultiCell(65,  2.5,utf8_decode($documento['riesgo'.($index_uno.$index_dos).'_comments']), 0, 'L', false);
        


                    $posicionY +=7.5;
                    $index_dos++;
                    $index_total++;

                }

            $index_uno++;
        }



        
        
        $pdf->SetXY(110,$posicionY+=30);
        $pdf->MultiCell(20,  2.5, utf8_decode(''), 0, 'L', false);
        $array = array($array10, $array11,$array12,$array13,$array14);
        $index_dos=1;
        $posicionY = 10;
        
        foreach ($array as $value) {


            $pdf->SetXY(10,$posicionY);
            $pdf->SetFont('Helvetica', '', 8);
            $pdf->SetFillColor(194,194,194); //Fondo verde de celda
            $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
            $pdf->Cell(185, 5, utf8_decode( $value['title']),  1, 0, 'C', true);

            $posicionY +=5;
                        
            $index_dos=1;
        
                for ($j = 1; $j <= $value['lastIndex']; $j++) {


                    $pdf->SetFont('Helvetica', '', 7);

                    $pdf->SetXY(10,$posicionY);
                    $pdf->MultiCell(100, 2.2, utf8_decode('

                    '), 1, 'L', false);
        
                    $pdf->SetXY(10,$posicionY);
                    $pdf->SetFillColor(240,179,105); //Fondo verde de celda
                    $pdf->MultiCell(100, 2.2,utf8_decode($this->listaCriticos()[$index_total]), 0, 'L', false);
            
        
                    $pdf->SetXY(110,$posicionY);
                    $pdf->MultiCell(20,  2.2, utf8_decode(' 

                    '), 1, 'L', false);
                    $pdf->SetXY(110,$posicionY);
                    $pdf->SetFillColor(31,192,245); //Fondo verde de celda
                    $pdf->MultiCell(20,  2.2,utf8_decode($documento['riesgo'.($index_uno.$index_dos)] == 1 ? 'Si' : 'No'), 0, 'C', false);
        
        
                    $pdf->SetXY(130,$posicionY);
                    $pdf->MultiCell(65,  2.2, utf8_decode('

                    '), 1, 'L', false);
        
                    $pdf->SetXY(130,$posicionY);
                    $pdf->SetFillColor(255,255,255); //Fondo verde de celda
                    $pdf->MultiCell(65,  2.2,utf8_decode($documento['riesgo'.($index_uno.$index_dos).'_comments']), 0, 'L', false);
        


                    $posicionY +=6.6;
                    $index_dos++;
                    $index_total++;

                }

            $index_uno++;
        }

        $pdf->SetXY(110,$posicionY+=30);
        $pdf->MultiCell(20,  2.5, utf8_decode('hola'), 0, 'L', false);
        $posicionY = 10;


        
        $pdf->SetXY(10,$posicionY);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Sección 3 Evaluación de Riesgos y Controles Críticos'),  1, 0, 'C', true);
        
        $pdf->SetXY(10,$posicionY+=5);
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->SetFillColor(194,194,194); //Fondo verde de celda
        $pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
        $pdf->Cell(185, 5, utf8_decode('Descripción de los Hallazgos (asociado a la tarea observada)'),  1, 0, 'C', true);

        
        $pdf->SetXY(10,$posicionY+=5);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->SetFillColor(255,255,255); //Fondo verde de celda
        $pdf->Cell(30, 5, utf8_decode('Fortalezas y acciones : '), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 5, utf8_decode($documento['fortalezas_acciones']), 1);
        

        $pdf->SetXY(10, $posicionY+=5);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 5, utf8_decode('Fecha de cumplimiento'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 5, utf8_decode($documento['fecha_cumplimiento']), 1);

        $pdf->SetXY(10, $posicionY+=5);
        $pdf->SetFont('Helvetica', 'B', 7);
        $pdf->Cell(30, 5, utf8_decode('Responsable'), 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(155, 5, utf8_decode($documento['responsable']), 1);


        $fecha = new DateTime();
        $fecha = $fecha->getTimestamp();

        $filename = "public/reports/".$fecha.".pdf";

        if (file_exists($filename)) {
            unlink($filename);
        }

        $pdf->Output($filename, 'F');
        //$pdf->Output();
        if (file_exists($filename)) {
            return $filename;
        } else {
            return "fail documento";
        }
    }

    function nombreClasificacion($idClasificacion)
    {

        $clasificacion = '';
        $CLASIFICACION_A = 1;
        $CLASIFICACION_B = 2;
        $CLASIFICACION_C = 3;

        if ($idClasificacion == $CLASIFICACION_A) {
            $clasificacion = 'A';
        }
        if ($idClasificacion == $CLASIFICACION_B) {
            $clasificacion = 'B';
        }
        if ($idClasificacion == $CLASIFICACION_C) {
            $clasificacion = 'C';
        }

        return $clasificacion;
    }

    
    function getExtensionPhoto($data)
    {
        $result = $data;

        if (strpos($data, ".png") !== false) {
            $result = str_replace(".png",".jpg",$data);
        }
        return $result;
    }


    function listaRiesgos(){
        return 
        array('¿He realizado este trabajo anteriormente?',
        '¿Poseo las habilidades, los conocimientos o los permisos requeridos?',
        '¿Puedo cumplir con las Reglas por la Vida?',
        '¿Existe alguna evaluación de RIESGOS_CRITICOS o instrucción de trabajo para esta tarea?',
        '¿Se requiere algún permiso para realizar este trabajo?',
        '¿Este trabajo requiere “aislamiento”?',
        '¿Se trata de un espacio confinado?',
        '¿Estoy trabajando en alturas?',
        '¿Estoy realizando una excavación?',
         '¿He identificado algún impacto ambiental?',
         '¿Existe algún riesgo de lesión en las manos en este trabajo?',
         '¿Se utilizarán productos químicos',
         '¿El área de trabajo se encuentra ordenada y libre de obstáculos?',
         '¿He verificado si podría afectar u obstaculizar a los demás?',
         '¿Tengo las herramientas adecuadas para este trabajo?',
         '¿Poseo el Equipo de Protección Personal adecuado? ¿Estoy capacitado para utilizarlo?');
    }

    function listaRiesgosCriticos(){
        return     array('¿El trabajo cuenta con el ICA respectivo aprobado y este se encuentra en el área de trabajo?',
        '¿Requiere un permiso de trabajo de alto riesgo para la labor que realizará?: espacio confinado, trabajo en caliente, excavaciones, armado de andamios, riesgo de caída, excavaciones entre otros',
        '¿El personal realizará labores dentro del radio de trabajo o en áreas de tránsito de equipos pesados?',
        '¿El trabajo se realizara cerca o al borde de: un talud, presa de relaves, cuerpos de agua con más de 1.50 m. de profundidad?',
        '¿El trabajo contempla la posibilidad que el personal tenga contacto con sustancia química, inflamable o explosiva? ¿Existe la posibilidad de una descarga no controlada?',
        '¿El trabajo requiere retirar la guarda de algún equipo mientras este se encuentre en funcionamiento?',
        '¿Realizará excavaciones o perforaciones de más de 0.30 m. cerca o en plantas, instalaciones o líneas eléctricas?',
        '¿El personal realizara trabajos en plataformas o alturas de 1.50 metros o mayores, que no estén protegidas con barandas?',
        '¿Realizará maniobras de izaje de estructuras?');
    }

    function listaRiesgosManos(){
        return     array('¿La tarea conlleva a exponer las manos a la línea de fuego (golpeado por objetos en movimiento ej.golpear con martillo)?',
        '¿La tarea conlleva a exponer las manos en puntos de atricción y/o atrapamiento (atrapado entre, ej. colocar mano entre marco y la puerta)?',
        '¿La tarea conlleva a exponer las manos a bordes filosos y/o cortantes: La tarea conlleva a manipular cuchillas y/o herramientas punzocortantes?');    
    }

    function listaRiesgoCovid(){
        return 
        array (
         '¿Se mantiene distanciamiento 2 m como mínimo?',
         '¿Se utiliza la protección respiratoria (mascarilla KN95)?',
         '¿Se lavan/desinfectan las manos de manera frecuente?',
         '¿Se limpia/desinfectan las herramientas y equipos?',
         '¿Se limpió/desinfectó el vehículo/Equipo?',
         '¿Se respeta el aforo del vehículo/Equipo?');
    }

    function listaCriticos(){
        return array(
'1.1 Personal calificado, autorizado y acreditado ',
'1.2 Identificación de toda las fuentes de energía (aguas arriba y aguas abajo) de los equipos o circuitos a intervenor ',
'1.3 Comunicar y obtener los permisos para el bloqueo de los circuitos o equipos a intervenir ',
'1.4 Aislar y bloquear la fuente de energía principal de los equipos o circuitos a intervenir ',
'1.5 Realizar la prueba de arranque verificando la ausencia de energía ',
'1.6 Colocar tarjetas y candados de bloqueo personal ',
'1.7 Eliminar o drenar las energía acumuladas de ser necesario ',
'2.1 Identificar. Purgar, aislar y bloquear todas la fuentes de energía de ingreso y salida del espacio confinado. LOTO ',
'2.2 Demarcar el espacio confinado ',
'2.3 Monitorear la atmosfera antes y durante la realización de la tarea, considerando las mediciones en diferentes niveles ',
'2.4 Asegurar comunicación entre el personal que se encuentra dentro del espacio confinado, supervisor, respuesta a emergencia y vigía. ',
'2.5 Personal acreditado y vigía calificado ',
'2.6 Registro de control de ingreso y salida del espacio confinado ',
'2.7 En las tuberías que ingresan a un espacio confinado que lleve gas, líquido u otros materiales deben ser cerradas, clausuradas o desconectadas, si la condición no lo permite se debe usar doble bloqueo y purgar',
'2.8 Elaborar el permiso escrito para trabajos de alto riesgo (PETAR) ',
'3.1 Operador acreditado para el tipo de equipo a utilizar ',
'3.2 Personal alejado del área de influencia de la carga suspendida ',
'3.3 Maniobrista o rigger certificado ',
'3.4 Inspección Pre-Uso del equipo, accesorios y elementos de izaje ',
'3.5 Inspección del área de trabajo ',
'3.6 Área de maniobra demarcada ',
'3.7 Verificar la tabla de carga del equipo de izaje ',
'3.8 Plan de izaje y/o Permiso de izaje crítico (cuando corresponda) ',
'3.9 Comunicación efectiva entre operador y rigger ',
'3.10 Limites de seguridad de las grúas ',
'4.1 Sistemas de protección certificado contra caídas, inspeccionadas y adecuadamente instaladas ',
'4.2 Demarcación e inspección de niveles inferiores y superiores según aplique aplique ',
'4.3 Plataformas normadas y andamios normados e inspeccionados ',
'4.4 Escaleras portátiles con registro de inspección y mantenimiento adecuadamente aseguradas ',
'4.5 Personal calificado y acreditado ',
'4.6 Permiso Escrito de Trabajo de Alto Riesgo (PETAR) ',
'4.7 Sistema de protección certificados contra caídas, inspeccionados y adecuadamente instalados. ',
'4.8 Barreras rígidas señalizadas ',
'4.9 Plataformas y pisos de trabajo asegurados, barabdas removidas aseguradas. ',
'4.10 Vigía de "Open Hole" (permanente mientras se implementan barreras rigidas) ',
'4.11 Establecer rutas de evacuación ',
'4.12 Personal calificado ',
'5.1 Se utilizan barreras físicas para trabajos a menos de 1 m ',
'5.2 Se mantiene distanciamiento 2m como mínimo. ',
'5.3 Se utiliza la protección respiratoria (mascarilla Kn95) ',
'5.4 Se lavan/desinfectan las manos de manera frecuente ',
'5.5 Se limpia/desinfectan las herramientas y equipos ',
'5.6 Se limpió/desinfectó el vehículo ',
'5.7 Se respeta el aforo del vehículo ',
'6.1 Líneas de servicio enterradas o empotradas identificadas ',
'6.2 El diseño del sistema de contención de tierra, esta realizado por el ingeniero especilista (Geotecnía) ',
'6.3 El Material producto de la excavación esta apilado a una distancia equivalga a la mitad de la profundidad de la excavación o mayor seun corresponda',
'6.4 Para trabajos en taludes o cerca de excavaciones mayores o iguales a 1.2 m de profundidad se usa sistema de prevencion y detención de caídas ',
'6.5 Todos los días y cada vez que las condiciones cambien, el Supervisor realiza una inpección documentada a todas las excavaciones ',
'6.6 Evaluar la cercanía a las instalaciones eléctricas ',
'6.7 Durante las excavaciones eliminar los objetos que puedan caer ',
'6.8 Están las excavaciones y zanjas apropiadamente identificadas con señales, advertencias y barreras Están las barreras flexibles a 6 pies (1,8 m) de los bordes de las zanjas y excavaciones ',
'6.9 Se asegura el proyecto de que ningún empleado tenga permitido transitar bajo cargas que están siendo manejadas por equipos de izaje o excavación ',
'6.10 Durante las operaciones de limpieza y desbroce ¿Consideró el proyecto y se aseguró de cumplir con todos requisitos legales medioambientales tales como mallas para la retención de sedimentos, protección contra derrames o control del polvo? ',
'6.11 Antes de comenzar la excavación ¿Se aseguró el Supervisor Responsable y la Persona Competente de que se hayan tomado las medidas de seguridad requeridas? ',
'6.12 Si se produce un hallazgo arqueológico de interés inesperado ¿Asegura el procedimiento del proyecto la suspensión de los trabajos hasta que un individuo calificado pueda evaluar su importancia? ',
'7.1 Inspección previa del área de trabajo y lugares adyacentes ',
'7.2 Personal calificado y acreditado ',
'7.3 Permiso Escrito de Trabajo de Alto Riesgo (PETAR) ',
'7.4 Inspeccionar los equipos de soldadura y oxicorte ',
'7.5 Demarcar el área de trabajo y según sea necesario arriba y abajo ',
'7.6 Monitoreo de atmosfera en tanques, estanques, recipientes o Sistemas de tuberías que contengan o hayancontenido líquidos o gases inflamables ',
'7.7 Equipos aterrados ',
'7.8 Cables de puesta a tierra (masa) ',
'7.9 EPP especifico para trabajos en caliente ',
'7.10 Extintores mínimo de 9 Kg polivalente según el tipo de material combustible ',
'7.11 Vigía para trabajos en caliente y permanecer en el área 30 min despues de haber concluido el trabajo ',
'8.1 Están implementados los seguros del fabricante en las herramientas eléctricas manuales (pulidoras, sierras, etc.) ',
'8.2 Están implementados los seguros del fabricante en las herramientas eléctricas estacionarias (esmeriladora de banco, sierras de mesa) ',
'8.3. Están las manillas en su lugar en las herramientas manuales ',
'8.4. Funcionan adecuadamente los interruptores de presión on/off Seguro Hombre Muerto ',
'8.5. Funciona adecuadamente el dispositivo GFCI ',
'8.6. Están implementados los seguros del fabricante para proteger a los empleados de las partes rotatorias de los equipos estacionarios ',
'8.7. Vuelven a su posición segura las herramientas eléctricas estacionarias con hojas o brocas operadas manualmente si se sueltan accidentalmente? ',
'8.8. ¿Se mantienen en buena condición los generadores y transformadores para soldadura ',
'8.9. Se protegen todos los componentes rotatorios ',
'8.10. Prohíbe el proyecto el empalme de cables (es decir, se extenderán o repararán los cables usando los accesorios correctos)? ',
'9.1 Personal acreditado ',
'9.2 Verificación pre operacional de operadores/ vehículos y equipos moviles ',
'9.3 Uso de cinturón de seguridad de todos los ocupantes ',
'9.4 El conductor/ operador debe estar en condiciones apropiadas para operar el equipo y cumplir con la politica de manejo de fatiga ',
'9.5 Sistema de comunicación y/o autorización con el operador de equipo/ personal de la zona cercana ',
'9.6 Control de acceso al área de trabajo ',
'9.7 Realizar LOTO en los equipo cuando están en labores de mantenimiento. Aplicación de cierre perimetral al equipo. ',
'9.8 Al parquearse el vehículo o equipo aplicar sistema de freno parqueo/ cuñas (tacos) cuando se requiera. ',
'9.9 Las vías son mantenidas y la altura del muro de seguridad no deberá ser menor a 3/4 partes del diámetro del neumático del vehículo más grande que circule por la vía ',
'10.1 Identificar puntos de atrapamiento, corte, abrasión o proyección ',
'10.2 Identificar todas las potenciales fuentes de energía ',
'10.3 Guardas de protección implementadas y en buen estados alrededor de las piezas móviles y fuentes de energía potencialmente peligrosas ',
'10.4 Señalizar para identificar las fuentes de energía ',
'10.5 Dispositivos de enclavamiento o paradas de emergencia ',
'11.1 Los equipos, elementos, herramientas y/o accesorios aprobados para el traslado / manipulación ',
'11.2 Personal calificado y acreditado ',
'11.3 Permiso Escrito de Trabajo de alto Riesgo (PETAR) y formatos del estándar según apliquen ',
'11.4 Demarcar y colocar barreras a las zonas de "línea de fuego" ',
'11.5 Vigía de seguridad permanente y función especifica ',
'11.6 Altura máxima de apilamiento de tuberías de HDPE ',
'11.7 Establecer zonas de seguridad para la descarga y manipulación de tuberias ',
'11.8 Asegurar comunicación ',
'12.1 Personal electricista calificado y con acreditación vigente. ',
'12.2 EPP en buen estado de acuerdo a nivel de tensión y categoría indicado en los estudios de arco eléctrico. ',
'12.3 Asistencia de 2 personas para todo trabajo de diagnostico a mas de 250V hasta 600V ',
'12.4 Uso de herramientas aisladas ',
'12.5 Completar toda la documentación ',
'13.1 Ficha de datos de Seguridad (FDS) aprobada por HBP ',
'13.2 Etiquetado y rotulado del producto ',
'13.3 Manipulación, transporte de acuerdo a la FDS ',
'13.4 Uso de EPP de acuerdo a la FDS ',
'13.5 Consideraciones de compatibilidad para el almacenamiento ',
'13.6 Asegurar la implementación de sensores de gases fijos y/o detectores portátiles ',
'13.7 Conocimiento del personal para la manipulación y transporte de la sustancia química ',
'13.8 Respuesta a Emergencias de acuerdo a la FDS ',
'14.1 Evaluar el área a demarcar: condiciones generadas por el trabajo, áreas afectadas, etc ',
'14.2 Visibilidad de la demarcación ',
'14.3 Autorización de ingreso a áreas demarcadas ',
'14.4 Control de ingreso y salida de área restringidas demarcadas y señalizadas ',
'14.5 Inspección regular del área demarcada y señalizada ',
'14.6 Retiro de demarcación al final del trabajo ',
'14.7 Dentro de las área restringidas temporales se prohíbe el uso de celular '
        
        );
    }

    function extraerDocumento($data)
    {
        $array = explode(",", $data);
        $listaDocumentos = "";

        foreach ($array as $elemento) {
            $listaDocumentos .= (" http://localhost/ssmaprueba/public/photos/".$elemento);
        }
        return $listaDocumentos;
    }


}
