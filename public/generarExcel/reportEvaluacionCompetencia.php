<?php

class ReportEvaluacionCompetencia
{


  function generateEvaluacionCompetenciaById($list)
  {


    // Se crea el objeto PHPExcel
    $objPHPExcel = new PHPExcel();

    // Se asignan las propiedades del libro
    $objPHPExcel->getProperties()->setCreator("Registro Notas"); // Nombre del autor
    $objPHPExcel->getProperties()->setLastModifiedBy("Registro Notas"); //Ultimo usuario que lo modificó
    $objPHPExcel->getProperties()->setTitle("Registro Notas"); // Titulo
    $objPHPExcel->getProperties()->setSubject("Reporte Excel con PHP y MySQL"); //Asunto
    $objPHPExcel->getProperties()->setDescription("SEPCON"); //Descripción
    $objPHPExcel->getProperties()->setKeywords("SEPCON"); //Etiquetas
    $objPHPExcel->getProperties()->setCategory("SEPCON"); //Categorias


    $TituloTabla = array(
      'font' => array(
        'bold' => true,
        'size' => 9,
        'name' => 'Arial',
        'color' => array('rgb' => '000000'),
      )
    );



    // Crea un nuevo objeto PHPExcel
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getActiveSheet()->getStyle('B4:AZ4')->applyFromArray($TituloTabla);
    $objPHPExcel->getActiveSheet()->getStyle('B5:AZ5')->applyFromArray($TituloTabla);


    //alineacion
    $objPHPExcel->getActiveSheet()->getStyle('A1:Z3000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('A1:Z3000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(50);


    //ancho de columnas
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);

    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);


    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);


    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);

    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(80);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);

    $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(100);

    $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'Item');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'dni');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'Evaluador');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'dni');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'Evaluado');

    $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'Estado Evaluador');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'Estado Evaluado');

    //Nivel de compromiso

    $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', 'Finaliza oportunamente las tareas asignadas, sin necesidad de reprocesos.');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J5', 'Se autodirige, es decir, no es necesario recordarle continuamente lo que se debe hacer.');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('K5', 'Realiza recomendaciones apropiadas o acertadas.');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('L5', 'Pone su conocimiento y experiencia de format total al servicio de la empresa.');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M5', 'Se enfoca en solucionar los problemas en lugar de buscar culpables..	');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('N5', 'Desempeño promedio	');



    //DESEMPEÑO DE SEGURIDAD

    $objPHPExcel->setActiveSheetIndex()->setCellValue('O5', 'Cumple los procedimientos y usa los formatos que corresponden a la empresa	');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('P5', 'Demuestra su liderazgo visible en seguridad.	');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('Q5', 'Realiza adecuadamente la clasificación de residuos y vela porque los demás también lo hagan	');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('R5', 'Implementa o fomenta prácticas de trabajo seguro en su area de trabajo		');

    $objPHPExcel->setActiveSheetIndex()->setCellValue('S5', 'Realiza observaciones de comportamientos riesgosos e informa oportunamente a la empresa  acerca de  los peligros y riesgos latentes en su lugar de trabajo');

    $objPHPExcel->setActiveSheetIndex()->setCellValue('T5', 'Desempeño promedio	');

    // TOLERANCIA AL ESTRES

    $objPHPExcel->setActiveSheetIndex()->setCellValue('U5', 'Se comunica de forma adecuada con todos sus compañeros.');

    $objPHPExcel->setActiveSheetIndex()->setCellValue('V5', 'Fomenta y practica el respeto hacia todos los trabajadores de la empresa.');

    $objPHPExcel->setActiveSheetIndex()->setCellValue('W5', 'Capacidad para interceder en los conflictos que existen dentro de su equipo de trabajo');

    $objPHPExcel->setActiveSheetIndex()->setCellValue('X5', 'Sabe trabajar en equipo, integrándose y participando positivamente para alcanzar los objetivos y metas comunes');


    $objPHPExcel->setActiveSheetIndex()->setCellValue('Y5', 'Capacidad de desempeñarse eficientemente en situaciones estresantes y poder sobrellevar las complicaciones');

    $objPHPExcel->setActiveSheetIndex()->setCellValue('Z5', 'Desempeño promedio	');

    $objPHPExcel->setActiveSheetIndex()->setCellValue('AA5', 'Oportunidad de mejora	');

    $row = 6;
    $index = 1;

    foreach ($list as $seguimiento) {

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(1, $row, $index);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(2, $row, $seguimiento["dniEvaluador"]);

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(3, $row, $seguimiento["usuarioEvaluador"]);

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(4, $row, $seguimiento["dniEvaluado"]);

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(5, $row, $seguimiento["usuarioEvaluado"]);

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(6, $row, $seguimiento["firmaEvaluado"] == "" ? "Pendiente" : "Finalizado");

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(7, $row, $seguimiento["firmaEvaluador"] == "" ? "Pendiente" : "Finalizado");

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(8, $row, $seguimiento["compromiso1"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(9, $row, $seguimiento["compromiso2"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(10, $row, $seguimiento["compromiso3"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(11, $row, $seguimiento["compromiso4"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(12, $row, $seguimiento["compromiso5"]);

      $listCompromiso = [$seguimiento["compromiso1"], $seguimiento["compromiso2"], $seguimiento["compromiso3"], $seguimiento["compromiso4"], $seguimiento["compromiso5"]];

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(13, $row, $this->averagePuntaje($listCompromiso));


      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(14, $row, $seguimiento["seguridad1"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(15, $row, $seguimiento["seguridad2"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(16, $row, $seguimiento["seguridad3"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(17, $row, $seguimiento["seguridad4"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(18, $row, $seguimiento["seguridad5"]);

      $listSeguridad = [$seguimiento["seguridad1"], $seguimiento["seguridad2"], $seguimiento["seguridad3"], $seguimiento["seguridad4"], $seguimiento["seguridad5"]];

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(19, $row, $this->averagePuntaje($listSeguridad));


      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(20, $row, $seguimiento["estres1"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(21, $row, $seguimiento["estres2"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(22, $row, $seguimiento["estres3"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(23, $row, $seguimiento["estres4"]);
      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(24, $row, $seguimiento["estres5"]);

      $listestres = [$seguimiento["estres1"], $seguimiento["estres2"], $seguimiento["estres3"], $seguimiento["estres4"], $seguimiento["estres5"]];

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(25, $row, $this->averagePuntaje($listestres));

      $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(26, $row, $seguimiento["oportunidadMejora"]);


      $row++;
      $index++;
    }


    $fecha = new DateTime();
    $fecha = $fecha->getTimestamp();

    $rutaExcel = 'public/reports/evaluacion_competencia' . $fecha . '.xlsx';

    // Renombrar Hoja
    $objPHPExcel->getActiveSheet()->setTitle('Seguimiento');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($rutaExcel);
    return $rutaExcel;
  }

  function averagePuntaje($data)
  {

    $sumTotal = 0;

    foreach ($data as $variable) {
      $sumTotal += $variable;
    }

    $average = ($sumTotal * 20) / 15;

    return $average;
  }
}
