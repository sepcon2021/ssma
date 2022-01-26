<?php

require_once 'public/PHPExcel/PHPExcel.php';

class GenerateExcel
{

    const FORMATO1 = 1;
    const FORMATO2 = 2;

    function typeFormTops($type, $list)
    {
        $url = '';
        switch ($type) {
            case self::FORMATO1:
                $url = $this->generateTopFormato1($list);
                break;
            case self::FORMATO2:
                $url = $this->generateTopFormato2($list);
                break;
        }

        return $url;
    }

    function generateTopFormato1($list)
    {

        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Helena Minaya"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("Helena Minaya"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setTitle("Matriz Tops"); // Titulo
        $objPHPExcel->getProperties()->setSubject("Reporte Excel con PHP y MySQL"); //Asunto
        $objPHPExcel->getProperties()->setDescription("Reporte de IPERC"); //Descripción
        $objPHPExcel->getProperties()->setKeywords("IPERC"); //Etiquetas
        $objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias

        $Titulo = array(
            'font' => array(
                'bold' => true,
                'size' => 22,
                'name' => 'Cambria',
            )
        );

        $subTitulo = array(
            'font' => array(
                'bold' => true,
                'size' => 12,
                'name' => 'Cambria',
                /* 'color' => array('rgb' => 'FF0000'),*/
            )
        );

        $TituloTabla = array(
            'font' => array(
                'bold' => true,
                'size' => 14,
                'name' => 'Cambria',
            )
        );

        $borderCellOutLine = array(
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellTop = array(
            'borders' => array(
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellBottom = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellRight = array(
            'borders' => array(
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellLeft = array(
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellAll = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $objPHPExcel->getActiveSheet()->getStyle('A1:AB100')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFFFF',
            ),
        ));

        //estilo de fuentes
        $objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($Titulo);
        $objPHPExcel->getActiveSheet()->getStyle('B12:AB12')->applyFromArray($TituloTabla);

        //Alineación de todos las celdas centradas
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()->getStyle('B2:AB2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B2:AB2000')->getAlignment()->setWrapText(true);

        //Alineación de la seccion de leyenda de acronimos
        $objPHPExcel->getActiveSheet()->getStyle('Z2:AB4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('Z2:AB4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        $objPHPExcel->getActiveSheet()->getStyle('Z2:AB4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('Z2:AB4')->getAlignment()->setWrapText(true);

        //Alineación de la seccion de leyenda de acronimos
        $objPHPExcel->getActiveSheet()->getStyle('J6:AB8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('J6:AB8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        $objPHPExcel->getActiveSheet()->getStyle('J6:AB8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('J6:AB8')->getAlignment()->setWrapText(true);



        // =====================================CABECERA 1  DEL EXCEL ===================================================

        $objPHPExcel->getActiveSheet()->getStyle('B2:AB4')->applyFromArray($borderCellAll);

        //LOGO DE LA EMPRESA
        $objPHPExcel->getActiveSheet()->mergeCells('B2:D4');
        $objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setCoordinates('B2');
        $objDrawing->setName('nueva imagen');
        $objDrawing->setDescription('imagen ');
        $objDrawing->setPath("public/img/logo.png");
        $objDrawing->setHeight(80);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        $objDrawing->setOffsetX(50);
        $objDrawing->setOffsetY(5);

        //TITULO DEL REPORTE
        $objPHPExcel->getActiveSheet()->mergeCells('E2:Y4');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E2', 'Control de Observaciones Preventivas');

        //FECHA Y REVISION DEL DOCUMENTO
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(60);
        $objPHPExcel->getActiveSheet()->mergeCells('Z2:AB4');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Z2', "PSPC-110-X-PR-002-FR-002 \n Revisión:1  \n Emisión:10/06/2021 \n Página: 1 de 1 ");

        // =====================================CABECERA 2 DEL EXCEL ===================================================

        $objPHPExcel->getActiveSheet()->getStyle('B6:I8')->applyFromArray($borderCellAll);

        $objPHPExcel->getActiveSheet()->mergeCells('B6:C6');
        $objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($subTitulo);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B6', 'Lugar/Obra:');
        $objPHPExcel->getActiveSheet()->mergeCells('D6:I6');

        $objPHPExcel->getActiveSheet()->mergeCells('B7:C7');
        $objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($subTitulo);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B7', 'Responsable SSMA:');
        $objPHPExcel->getActiveSheet()->mergeCells('D7:I7');

        $objPHPExcel->getActiveSheet()->mergeCells('B8:C8');
        $objPHPExcel->getActiveSheet()->getStyle('B8')->applyFromArray($subTitulo);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B8', 'Fecha / Período:');
        $objPHPExcel->getActiveSheet()->mergeCells('D8:I8');

        $objPHPExcel->getActiveSheet()->getStyle('J6:AB6')->applyFromArray($borderCellTop);
        $objPHPExcel->getActiveSheet()->mergeCells('J8:AB8');
        $objPHPExcel->getActiveSheet()->getStyle('J8:AB8')->applyFromArray($borderCellBottom);
        $objPHPExcel->getActiveSheet()->getStyle('AB6:AB8')->applyFromArray($borderCellRight);

        $objPHPExcel->getActiveSheet()->mergeCells('J6:M6');
        $objPHPExcel->getActiveSheet()->getStyle('J6')->applyFromArray($subTitulo);

        $objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(30);

        $objPHPExcel->setActiveSheetIndex()->setCellValue('J6', 'Tipo de Observación');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J7', 'A I   -  Acto Inseguro o Sub Estándar');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M7', 'C I  -  Condición Insegura o Sub Estándar');

        $objPHPExcel->getActiveSheet()->mergeCells('Y6:Y7');
        $objPHPExcel->getActiveSheet()->getStyle('Y6')->applyFromArray($subTitulo);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Y6', 'Nivel del  Riesgo:');
        $objPHPExcel->getActiveSheet()->mergeCells('Z6:Z7');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Z6', "A  -  Alto \nB  -  Medio \nC  -  Bajo");

        // =====================================CUERPO DEL EXCEL ===================================================

        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(100);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(20);

        //alto de la fila

        // Agregar Informacion

        $objPHPExcel->setActiveSheetIndex()->setCellValue('B12', 'ID');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C12', 'Reportado por');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D12', 'Proyecto');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E12', 'Área');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F12', 'Ubicación');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G12', 'Área observada');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H12', 'Puesto del observado');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I12', 'Tiempo en el proyecto');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J12', 'Horario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K12', 'Rango de edad');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L12', 'Fecha');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M12', 'Tipo de observación');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N12', 'Detalle del Tipo de Observación');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O12', 'Relacionado con');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P12', 'Otros');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q12', 'Tipo Epp');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R12', 'Condición del epp');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S12', 'Descripción de la Observación Acto o condición/Casi Accidente');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('T12', 'Acción Inmediata (correctiva)/Que medidas correctivas se tomaron para eliminar el acto o condición sub estandar');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('U12', 'Potencial del Riesgo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('V12', 'Evidencia de la observación/caso accidente encontrado(registro,imagen o foto,otros)');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('W12', 'Lesión / Obstaculo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('X12', '¿Se Realizó La Retro Alimentación?');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Y12', '¿Se  Logró El Cambio?');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Z12', '¿Personal Reincidente?');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AA12', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AB12', 'DNI');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AC12', 'Registro');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AD12', 'Responsable');

        //aca iran los datos de la tabla
        $fila = 13;
        $idRow = 1;


        foreach ($list as $item) {

            $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $fila, '');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $fila, $item["reportado"]);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $fila, $item["proyecto"]);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $fila, $item['area']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $fila, $item['observadoLugar']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $fila, $item['fase']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $fila, $item['puestoObservado']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $fila, $item['tiempoProyecto']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $fila, $item['horarioObservacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $fila, $item['rangoEdad']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $fila, $item['fecha']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $fila, $item['observacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $fila, $item['observacionDetalle']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $fila, $item['relacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $fila, $item['otros']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $fila, $item['tipoEpp']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('R' . $fila, $item['condicionEpp']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('S' . $fila, $item['descripcion']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('T' . $fila, $item['medidas']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('U' . $fila, $item['potencial']);


            $evidencia = explode(",", $item['fotos']);
            $cantidad = 1;

            foreach ($evidencia as $elemento) {

                if (strlen($elemento) > 0) {

                    if (strpos($elemento, '.jpg') > 0 || strpos($elemento, '.png') > 0) {

                        $foto = "public/photos/" . $elemento;

                        if ($elemento != '' && file_exists($foto)) {
                            $objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(200);
                            $objDrawing = new PHPExcel_Worksheet_Drawing();
                            $objDrawing->setOffsetX(1);
                            $objDrawing->setOffsetY($cantidad);
                            $objDrawing->setCoordinates('I' . $fila);
                            $objDrawing->setName($elemento);
                            $objDrawing->setDescription(constant("URL") . "photos/" . $elemento);
                            $objDrawing->setPath("public/photos/" . $elemento);
                            $objDrawing->setHeight(50);
                            $objDrawing->setHeight(50);
                            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
                        }
                    }
                }
                $cantidad += 50;
            }


            $objPHPExcel->setActiveSheetIndex()->setCellValue('W' . $fila, $item['lesion'] . " / " . $item['obstaculo']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('X' . $fila, $item['observadoCambio']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Y' . $fila, $item['observadoRetroalimentacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Z' . $fila, $item['observadoRetroalimentacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AA' . $fila, $item['observadoReincidente']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AB' . $fila, $item['observadoComentario']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AC' . $fila, $item['responsable']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AD' . $fila, $item['registro']);

            $idRow++;
            $fila++;
        }

        // Bordes para todos las celdas que contengan informacion acerca del reporte
        $objPHPExcel->getActiveSheet()->getStyle('B12:AB' . $fila)->applyFromArray($borderCellAll);

        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Matriz de Tops');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('public/reports/topsnuevo.xlsx');
        return "public/reports/topsnuevo.xlsx";
    }


    function generateTopFormato2($list)
    {

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("SEPCON"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("SEPCON"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setSubject("reporte"); //Asunto
        $objPHPExcel->getProperties()->setDescription("reporte"); //Descripción
        $objPHPExcel->getProperties()->setKeywords("ssma"); //Etiquetas
        $objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias

        $Titulo = array(
            'font' => array(
                'bold' => true,
                'size' => 14,
                'name' => 'Verdana',
            )
        );

        $subTitulo = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Verdana',
                'color' => array('rgb' => 'FF0000'),
            )
        );

        $TituloTabla = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
            )
        );

        $borderCellRight = array(
            'borders' => array(
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellLeft = array(
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellAll = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFFFF',
            ),
        ));

        $backgroundCellRed = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FF0000',
            ),
        );

        $backgroundCellYellowLight = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFF00',
            ),
        );

        $backgroundCellGreen = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '00DD00',
            ),
        );

        //estilo de fuentes
        $objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($Titulo);
        $objPHPExcel->getActiveSheet()->getStyle('B8:R8')->applyFromArray($TituloTabla);


        //Alineación de todos las celdas centradas
        $objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()->getStyle('B2:Z2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B2:Z2000')->getAlignment()->setWrapText(true);


        //Alineación de la seccion de leyenda de acronimos
        $objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        $objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setWrapText(true);




        // Bordes que faltaban completar a los costado del reporte
        $objPHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray($borderCellLeft);
        $objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($borderCellLeft);
        $objPHPExcel->getActiveSheet()->getStyle('R4:R7')->applyFromArray($borderCellRight);




        // =====================================CABECERA 1  DEL EXCEL ===================================================

        $objPHPExcel->getActiveSheet()->getStyle('B2:R3')->applyFromArray($borderCellAll);

        //LOGO DE LA EMPRESA
        $objPHPExcel->getActiveSheet()->mergeCells('B2:C3');
        $objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setCoordinates('B2');
        $objDrawing->setName('nueva imagen');
        $objDrawing->setDescription('imagen ');
        $objDrawing->setPath("public/img/logo.png");
        $objDrawing->setHeight(80);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        $objDrawing->setOffsetX(25);
        $objDrawing->setOffsetY(5);


        //TITULO DEL REPORTE
        $objPHPExcel->getActiveSheet()->mergeCells('D2:O3');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D2', "Control de Observaciones Preventivas  ( TOP's )");

        //FECHA Y REVISION DEL DOCUMENTO
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(60);
        $objPHPExcel->getActiveSheet()->mergeCells('P2:R3');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P2', "PSPC-110-X-PR-002-FR-002 \n Revisión : 0 \n Emisión: 31/05/2019 \n Pagina :1 de 1 ");


        // =====================================CABECERA 2 DEL EXCEL ===================================================


        $objPHPExcel->getActiveSheet()->getStyle('B4:G6')->applyFromArray($borderCellAll);



        $objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
        $objPHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray($TituloTabla);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B4', 'FECHA / PERIODO');

        $objPHPExcel->getActiveSheet()->mergeCells('D4:G4');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D4', '');


        $objPHPExcel->getActiveSheet()->mergeCells('B5:C5');
        $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($TituloTabla);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'SEDE/PROYECTO:');

        $objPHPExcel->getActiveSheet()->mergeCells('D5:G5');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'HUDBAY/PROYECTO 20PP03 - NUEVA LÍNEA DE RELAVES ESTE - TMF');

        $objPHPExcel->getActiveSheet()->mergeCells('B6:C6');
        $objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($TituloTabla);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B6', 'ELABORADO POR:');

        $objPHPExcel->getActiveSheet()->mergeCells('D6:G6');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D6', 'SSMA');

        $objPHPExcel->getActiveSheet()->getStyle('J4:J7')->applyFromArray($borderCellLeft);

        $objPHPExcel->getActiveSheet()->getStyle('J4')->applyFromArray($subTitulo);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J4', 'Tipo de Hallazgo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J5', 'A I     -  Acto Inseguro o Sub Estándar');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J6', 'C A P   -  Casi Accidente Personal');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J7', 'C A A   -  Casi Accidente Ambiental');

        $objPHPExcel->getActiveSheet()->getStyle('K4:K7')->applyFromArray($borderCellRight);

        $objPHPExcel->setActiveSheetIndex()->setCellValue('K5', 'C I  -  Condición Insegura o Sub Estándar');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K6', 'C A V   -  Casi Accidente Vehicular');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K7', 'Otros');

        $objPHPExcel->getActiveSheet()->getStyle('L4:L7')->applyFromArray($borderCellRight);

        $objPHPExcel->getActiveSheet()->getStyle('L4')->applyFromArray($subTitulo);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L4', 'Nivel del Riesgo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L5', 'A  -  Alto');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L6', 'B  -  Medio');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L7', 'C  -  Bajo');


        // =====================================CUERPO DEL EXCEL ===================================================


        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(50);


        // Cabecera del cuerpo
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B8', 'ITEM');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C8', "Código \n de la obra");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D8', 'Fecha');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E8', 'Reportado por:');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F8', 'Tipo de hallazgo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G8', "Descripción de la \n Observación / Casi Accidente");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H8', "Clasificación de observación");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I8', "Sub clasificación");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J8', "UBICACIÓN DEL \n HALLAZGO");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K8', "Evidencia de la \n observación \n (registro, imagen u otros)");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L8', "Nivel del Riesgo");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M8', "Acción correctiva");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N8', "Responsable");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O8', "DIAS DE IMPLEMENTACION");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P8', "Evidencia de la acción \n implementada \n (registro, imagen u otros)");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q8', "Fecha de levantamiento de la \n Observacion");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R8', "Estado de la observacion");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S8', "Registro");


        $fila = 9;
        $item = 1;

        foreach ($list as $item) {

            $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $fila, 1);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $fila, $item["proyecto"]);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $fila, $item['fecha']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $fila, $item["reportado"]);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $fila, $item['observacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $fila, $item['descripcion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $fila, $item['observacionDetalle']);

            if ($item['observacionDetalle'] == 'Desvío / Incumplimiento del procedimiento') {
                $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $fila, "No se cumple \n No se entiende \n No se conoce \n No existe");
            }

            $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $fila, $item['observadoLugar']);




            $evidencia = explode(",", $item['fotos']);
            $cantidad = 1;

            foreach ($evidencia as $elemento) {

                if (strlen($elemento) > 0) {

                    if (strpos($elemento, '.jpg') > 0 || strpos($elemento, '.png') > 0) {

                        $foto = "public/photos/" . $elemento;

                        if ($elemento != '' && file_exists($foto)) {
                            $objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(200);
                            $objDrawing = new PHPExcel_Worksheet_Drawing();
                            $objDrawing->setOffsetX(1);
                            $objDrawing->setOffsetY($cantidad);
                            $objDrawing->setCoordinates('K' . $fila);
                            $objDrawing->setName($elemento);
                            $objDrawing->setDescription(constant("URL") . "photos/" . $elemento);
                            $objDrawing->setPath("public/photos/" . $elemento);
                            $objDrawing->setHeight(50);
                            $objDrawing->setHeight(50);
                            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
                        }
                    }
                }
                $cantidad += 50;
            }

            $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $fila, $item['potencial']);


            if ($item['potencial'] == "POTENCIAL ALTO") {

                $objPHPExcel->getActiveSheet()->getStyle('L' . $fila)->getFill()->applyFromArray($backgroundCellRed);
            }
            if ($item['potencial'] == "POTENCIAL MEDIO") {
                $objPHPExcel->getActiveSheet()->getStyle('L' . $fila)->getFill()->applyFromArray($backgroundCellYellowLight);
            }

            if ($item['potencial'] == "POTENCIAL BAJO") {
                $objPHPExcel->getActiveSheet()->getStyle('L' . $fila)->getFill()->applyFromArray($backgroundCellGreen);
            }

            $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $fila, $item['medidas']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $fila, $item['responsable']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $fila, '');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $fila, '');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $fila, '');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('R' . $fila, '');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('S' . $fila, $item['registro']);


            $fila++;
            $item++;
        };





        // Bordes para todos las celdas que contengan informacion acerca del reporte
        $objPHPExcel->getActiveSheet()->getStyle('B8:R' . $fila)->applyFromArray($borderCellAll);



        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Matriz');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('public/reports/matriztops.xlsx');
        return "public/reports/matriztops.xlsx";
    }


    function typeFormSeguridad($type, $list)
    {
        $url = '';
        switch ($type) {
            case self::FORMATO1:
                $url = $this->generateSeguridadFormato1($list);
                break;
            case self::FORMATO2:
                $url = $this->generateSeguridadFormato2($list);
                break;
        }

        return $url;
    }


    function generateSeguridadFormato1($list)
    {

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Helena Minaya"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("Helena Minaya"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setTitle("Inspeccion de Seguridad"); // Titulo
        $objPHPExcel->getProperties()->setSubject("Reporte Excel con PHP y MySQL"); //Asunto
        $objPHPExcel->getProperties()->setDescription("Inspeccion Planeada de Seguridad"); //Descripción
        $objPHPExcel->getProperties()->setKeywords("Inspeccion Seguridad"); //Etiquetas
        $objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias

        $Titulo = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 14,
                'name'  => 'Verdana'
            )
        );

        $TituloTabla = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 9,
                'name'  => 'Arial'
            )
        );

        // Crea un nuevo objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        //combinar celdas
        $objPHPExcel->getActiveSheet()->mergeCells('A3:N3');

        //estilo de fuentes
        $objPHPExcel->getActiveSheet()->getStyle('A3')->applyFromArray($Titulo);
        $objPHPExcel->getActiveSheet()->getStyle('A5:W5')->applyFromArray($TituloTabla);

        //alineacion
        $objPHPExcel->getActiveSheet()->getStyle('A3:M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A5:Z5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //Titulo 
        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'INSPECCIÓN PLANEADA DE SEGURIDAD');
        $objPHPExcel->getActiveSheet()->getStyle('A5:Z2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $objPHPExcel->getActiveSheet()->getStyle('A5:Z2000')->getAlignment()->setWrapText(true);

        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);


        //alto de la fila
        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(50);

        // Agregar Informacion
        $objPHPExcel->setActiveSheetIndex()->setCellValue('A5', 'ITEM');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'PROYECTO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'AREA');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'UBICACIÓN');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'FECHA DE LA INSPECCIÓN');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'INSPECCIÓN REALIZADA POR');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'TIPO DE INSPECCIÓN');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'CONDICIÓN O ACTO SUBESTANDAR');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', 'EVIDENCIA DE LO ENCONTRADO (REGISTRO, IMAGEN O FOTO, OTROS)');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J5', 'ACCIÓN CORRECTIVA');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K5', 'CLASIFICACIÓN');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L5', 'DIAS DE IMPLEMENTACIÓN');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M5', 'FECHA DE IMPLEMENTACIÓN');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N5', 'RESPONSABLE DE LA EJECUCIÓN');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O5', 'EVIDENCIA DE LA ACCIÓN  CORRECTIVA IMPLEMENTADA (REGISTRO, IMAGEN O FOTO)');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P5', 'COMENTARIOS ADICIONALES');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q5', 'Registro');



        //aca iran los datos de la tabla
        $fila = 6;
        $item = 1;


        foreach ($list as $item) {

            $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $fila,);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $fila, $item['proyecto']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $fila, $item['areaNombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $fila, $item['ubicacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $fila, $item['fechaInspeccion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $fila, $item['inspeccionado']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $fila, $item['tipo']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $fila, $item['condicion']);

            $evidencia = explode(",", $item['fotos']);

            $cantidad = 1;

            foreach ($evidencia as $elemento) {

                if (strlen($elemento) > 0) {

                    if (strpos($elemento, '.jpg') > 0 || strpos($elemento, '.png') > 0) {

                        $foto = "public/photos/" . $elemento;

                        if ($elemento != '' && file_exists($foto)) {
                            $objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(200);
                            $objDrawing = new PHPExcel_Worksheet_Drawing();
                            $objDrawing->setOffsetX(1);
                            $objDrawing->setOffsetY($cantidad);
                            $objDrawing->setCoordinates('I' . $fila);
                            $objDrawing->setName($elemento);
                            $objDrawing->setDescription(constant("URL") . "photos/" . $elemento);
                            $objDrawing->setPath("public/photos/" . $elemento);
                            $objDrawing->setHeight(50);
                            $objDrawing->setHeight(50);
                            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
                        }
                    }
                }
                $cantidad += 50;
            }


            $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $fila, $item['accion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $fila, $item['clasificacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $fila, $item['diasImplementacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $fila, $item['fechaCumplimiento']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $fila, $item['responsable']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $fila, $item['registro']);

            $fila++;
            $item++;
        }
        // Renombrar Hoja
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('public/reports/seguridadFormato1.xlsx');
        return 'public/reports/seguridadFormato1.xlsx';
    }

    function generateSeguridadFormato2($list)
    {


        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("SEPCON"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("SEPCON"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setTitle("Matriz Reporte Inspecciones Planificadas SSMA"); // Titulo
        $objPHPExcel->getProperties()->setSubject("reporte"); //Asunto
        $objPHPExcel->getProperties()->setDescription("reporte"); //Descripción
        $objPHPExcel->getProperties()->setKeywords("ssma"); //Etiquetas
        $objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias

        $Titulo = array(
            'font' => array(
                'bold' => true,
                'size' => 14,
                'name' => 'Verdana',
            )
        );

        $subTitulo = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Verdana',
                'color' => array('rgb' => 'FF0000'),
            )
        );

        $TituloTabla = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
            )
        );

        $borderCellRight = array(
            'borders' => array(
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellLeft = array(
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $borderCellAll = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFFFF',
            ),
        ));


        $backgroundCellRed = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FF0000',
            ),
        );

        $backgroundCellYellowLight = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFF00',
            ),
        );

        $backgroundCellGreen = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '00DD00',
            ),
        );

        //estilo de fuentes
        $objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($Titulo);
        $objPHPExcel->getActiveSheet()->getStyle('B8:Q8')->applyFromArray($TituloTabla);


        //Alineación de todos las celdas centradas
        $objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()->getStyle('B2:Z2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B2:Z2000')->getAlignment()->setWrapText(true);


        //Alineación de la seccion de leyenda de acronimos
        $objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        $objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setWrapText(true);




        // Bordes que faltaban completar a los costado del reporte
        $objPHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray($borderCellLeft);
        $objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($borderCellLeft);
        $objPHPExcel->getActiveSheet()->getStyle('S4:S7')->applyFromArray($borderCellRight);




        // =====================================CABECERA 1  DEL EXCEL ===================================================

        $objPHPExcel->getActiveSheet()->getStyle('B2:S3')->applyFromArray($borderCellAll);

        //LOGO DE LA EMPRESA
        $objPHPExcel->getActiveSheet()->mergeCells('B2:C3');
        $objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setCoordinates('B2');
        $objDrawing->setName('nueva imagen');
        $objDrawing->setDescription('imagen ');
        $objDrawing->setPath("public/img/logo.png");
        $objDrawing->setHeight(80);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        $objDrawing->setOffsetX(25);
        $objDrawing->setOffsetY(5);


        //TITULO DEL REPORTE
        $objPHPExcel->getActiveSheet()->mergeCells('D2:O3');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D2', 'MATRIZ DE REPORTE INSPECCIONES PLANIFICADAS SSMA');

        //FECHA Y REVISION DEL DOCUMENTO
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(60);
        $objPHPExcel->getActiveSheet()->mergeCells('P2:S3');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P2', "Código: \n Revisión:0 \n Emisión:13/06/2021 \n Página: 1 de 1 ");


        // =====================================CABECERA 2 DEL EXCEL ===================================================


        $objPHPExcel->getActiveSheet()->getStyle('B5:G6')->applyFromArray($borderCellAll);

        $objPHPExcel->getActiveSheet()->mergeCells('B5:C5');
        $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($TituloTabla);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'SEDE/PROYECTO:');

        $objPHPExcel->getActiveSheet()->mergeCells('D5:G5');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'HUDBAY/PROYECTO 20PP03 - NUEVA LÍNEA DE RELAVES ESTE - TMF');

        $objPHPExcel->getActiveSheet()->mergeCells('B6:C6');
        $objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($TituloTabla);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B6', 'ELABORADO POR:');

        $objPHPExcel->getActiveSheet()->mergeCells('D6:G6');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D6', 'SSMA');

        // =====================================CUERPO DEL EXCEL ===================================================


        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(50);


        // Cabecera del cuerpo
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B8', 'item');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C8', "Proyecto");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D8', 'Fecha de la inspección');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E8', 'Área:');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F8', 'Ubicación');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G8', "Inspección realizada por");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H8', "Tipo de inspección");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I8', "Condición o Acto subestandar");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J8', "Descripción del acto u codición subestandra encontrado");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K8', "Evidencia de lo encontrado \n (Registro,imagen i foto,otros)");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L8', "Acción correctiva");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M8', "Clasificación");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N8', "Dias de implementación");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O8', "Fecha de implementación");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P8', "Responsable de la ejecución");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q8', "Evidencia de la acción correctiva implementada \n  (Registro,imagen i foto,otros)");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R8', "Estado de la correción");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S8', "Comentarios finales");
        $objPHPExcel->setActiveSheetIndex()->setCellValue('T8', "Registro");

        $fila = 9;

        foreach ($list as $item) {

            $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $fila, '');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $fila, $item['proyecto']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $fila, $item['fechaInspeccion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $fila, $item['areaNombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $fila, $item['ubicacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $fila, $item['inspeccionado']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $fila, $item['tipoObservacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $fila, $item['condicion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $fila, '');


            $evidencia = explode(",", $item['fotos']);
            $cantidad = 1;

            foreach ($evidencia as $elemento) {

                if (strlen($elemento) > 0) {

                    if (strpos($elemento, '.jpg') > 0 || strpos($elemento, '.png') > 0) {

                        $foto = "public/photos/" . $elemento;

                        if ($elemento != '' && file_exists($foto)) {
                            $objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(200);
                            $objDrawing = new PHPExcel_Worksheet_Drawing();
                            $objDrawing->setOffsetX(1);
                            $objDrawing->setOffsetY($cantidad);
                            $objDrawing->setCoordinates('K' . $fila);
                            $objDrawing->setName($elemento);
                            $objDrawing->setDescription(constant("URL") . "photos/" . $elemento);
                            $objDrawing->setPath("public/photos/" . $elemento);
                            $objDrawing->setHeight(50);
                            $objDrawing->setHeight(50);
                            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
                        }
                    }
                }
                $cantidad += 50;
            }

            $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $fila, $item['accion']);


            $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $fila, $item['clasificacion']);

            if ($item['clasificacion'] == "A") {
                $objPHPExcel->getActiveSheet()->getStyle('M' . $fila)->getFill()->applyFromArray($backgroundCellRed);
            }
            if ($item['clasificacion'] == "B") {
                $objPHPExcel->getActiveSheet()->getStyle('M' . $fila)->getFill()->applyFromArray($backgroundCellYellowLight);
            }

            if ($item['clasificacion'] == "C") {
                $objPHPExcel->getActiveSheet()->getStyle('M' . $fila)->getFill()->applyFromArray($backgroundCellGreen);
            }

            $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $fila, $item['diasImplementacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $fila, $item['fechaCumplimiento']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $fila, $item['responsable']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('T' . $fila, $item['registro']);



            $fila++;
            $item++;
        }

        // Bordes para todos las celdas que contengan informacion acerca del reporte
        $objPHPExcel->getActiveSheet()->getStyle('B8:S' . $fila)->applyFromArray($borderCellAll);

        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Matriz');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('public/reports/seguridadFormato2.xlsx');
        return 'public/reports/seguridadFormato2.xlsx';
    }

    function generateIncidenciaFormato1($list)
    {

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Helena Minaya"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("Helena Minaya"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setTitle("Reporte Incidencias"); // Titulo
        $objPHPExcel->getProperties()->setSubject("Reporte Excel con PHP y MySQL"); //Asunto
        $objPHPExcel->getProperties()->setDescription("Reporte de Incidencias"); //Descripción
        $objPHPExcel->getProperties()->setKeywords("reportes de incidencias"); //Etiquetas
        $objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias

        $Titulo = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 14,
                'name'  => 'Verdana'
            )
        );

        $TituloTabla = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 9,
                'name'  => 'Arial'
            )
        );

        // Crea un nuevo objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        //combinar celdas
        $objPHPExcel->getActiveSheet()->mergeCells('B3:U3');

        //estilo de fuentes
        $objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($Titulo);
        $objPHPExcel->getActiveSheet()->getStyle('B5:AM5')->applyFromArray($TituloTabla);

        //alineacion
        $objPHPExcel->getActiveSheet()->getStyle('B3:M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B5:AM5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //Titulo 
        $objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE INCIDENCIAS');

        $objPHPExcel->getActiveSheet()->getStyle('B5:Z2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $objPHPExcel->getActiveSheet()->getStyle('B5:Z2000')->getAlignment()->setWrapText(true);

        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(35);

        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(35);

        //alto de la fila
        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(50);

        // Agregar Informacion
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'Proyecto /Sede');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'Área');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'Cliente');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'Daño material < $500');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'Daño material > $500');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'Derrame de Hidrocarburos < 2 m3 ');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'Derrame de Hidrocarburos > 2 m3');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', 'Accidente Vehicular con Herido');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J5', 'Accidente Vehicular sin Herido');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K5', 'Accidente Vehicular < 500 $');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L5', 'Accidente Vehicular > 500 $');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M5', '(F.A.C) Caso de Primeros Auxilios');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N5', '(M.T.O) Accidente Con Tratamiento Médico');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O5', '(R.W.C) Accidente Con Trabajo Restringido');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P5', '(L.T.I) Accidente Con Pérdida de Jornada');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q5', '(F.T.L) Fatalidad');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R5', 'Incidente');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S5', '(E.O) Enfermedad Ocupacional');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('T5', 'Lugar');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('U5', 'Fecha');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('V5', 'hora');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('W5', 'Nombre de la persona involucrada');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('X5', 'DNI/CE');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Y5', 'Sexo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Z5', 'Edad');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AA5', 'Cuenta con seguro (SI/NO)');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AB5', 'Lugar y fecha de nacimiento');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AC5', 'domicilio');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AD5', 'estado civil');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AE5', 'departamento');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AF5', 'provincia');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AG5', 'cargo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AH5', 'instrucción');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AI5', 'DESCRIPCIÓN DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL (Incluyendo nombres y cargos de las personas involucradas)');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AJ5', 'ACCIONES INMEDIATAS DESPUES DEL ACCIDENTE/INCIDENTE/ENFERMEDAD OCUPACIONAL (Atención médica, evacuación, reparación de daños materiales, acciones correctivas, etc)');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AK5', 'Elaborado por ');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AL5', 'Evidencia');


        //aca iran los datos de la tabla
        $fila = 6;


        //salida de datos
        foreach ($list as $item) {

            $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $fila, $item['proyectoNombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $fila, $item['areaNombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $fila, $item['cliente']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $fila, $item['materialMenor'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $fila, $item['materialMayor'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $fila, $item['derrameMenor'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $fila, $item['derrameMayor'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $fila, $item['conHerido'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $fila, $item['sinHerido'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $fila, $item['vehicularMenor'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $fila, $item['vehicularMayor'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $fila, $item['fac'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $fila, $item['mto'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $fila, $item['rwc'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $fila, $item['lti'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $fila, $item['ftl'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('R' . $fila, $item['incidente'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('S' . $fila, $item['eo'] == "1" ? "x" : "");
            $objPHPExcel->setActiveSheetIndex()->setCellValue('T' . $fila, $item['lugar']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('U' . $fila, $item['fecha']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('V' . $fila, $item['hora']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('W' . $fila, $item['persona']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('X' . $fila, $item['documento']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Y' . $fila, $item['sexo'] = "MA" ? "MASCULINO" : "FEMENINO");

            $objPHPExcel->setActiveSheetIndex()->setCellValue('Z' . $fila, $item['edad']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AA' . $fila, $item['seguro']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AB' . $fila, $item['nacimiento']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AC' . $fila, $item['domicilio']);
            $estado_civil = '';
            switch ($item['civil']) {
                case 'CO':
                    $estado_civil = 'CONVIVIENTE';
                    break;
                case 'CA':
                    $estado_civil = 'CASADO';
                    break;
                case 'SO':
                    $estado_civil = 'SOLTERO';
                    break;
                case 'DI':
                    $estado_civil = 'DIVORCIADO';
                    break;
                case 'VI':
                    $estado_civil = 'VIUDO';
                    break;
                case 'OT':
                    $estado_civil = 'OT';
                    break;
            }

            $objPHPExcel->setActiveSheetIndex()->setCellValue('AD' . $fila, $estado_civil);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('AE' . $fila, $item['dpto']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AF' . $fila, $item['prov']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AG' . $fila, $item['cargo']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AH' . $fila, $item['instruccion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AI' . $fila, $item['descripcion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AJ' . $fila, $item['acciones']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AK' . $fila, $item['elaborado']);

            $fila++;
        }


        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Reportes de Incidencias');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('public/reports/incidencias.xlsx');
        return 'public/reports/incidencias.xlsx';
    }


    function generateOptFormato1($list)
    {

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Helena Minaya"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("Helena Minaya"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setTitle("Reporte OPT"); // Titulo
        $objPHPExcel->getProperties()->setSubject("Reporte Excel con PHP y MySQL"); //Asunto
        $objPHPExcel->getProperties()->setDescription("Reporte de OPT"); //Descripción
        $objPHPExcel->getProperties()->setKeywords("OPT"); //Etiquetas
        $objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias

        $Titulo = array(
            'font' => array(
                'bold' => true,
                'size' => 14,
                'name' => 'Verdana',
            )
        );

        $TituloTabla = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
            )
        );

        // Crea un nuevo objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        //combinar celdas
        $objPHPExcel->getActiveSheet()->mergeCells('B3:U3');

        //estilo de fuentes
        $objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($Titulo);
        $objPHPExcel->getActiveSheet()->getStyle('B5:BK5')->applyFromArray($TituloTabla);

        $objPHPExcel->getActiveSheet()->getStyle('B6:BK6')->applyFromArray($TituloTabla);

        //$objPHPExcel->getActiveSheet()->getStyle('B5:BK5')->applyFromArray( array( 'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FF0000') ) ) );

        //alineacion
        $objPHPExcel->getActiveSheet()->getStyle('B3:M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B5:Z5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B6:Z6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //Titulo
        $objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE OPT');

        $objPHPExcel->getActiveSheet()->getStyle('B5:Z2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $objPHPExcel->getActiveSheet()->getStyle('B5:Z2000')->getAlignment()->setWrapText(true);

        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(50);

        //alto de la fila
        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(50);

        // Agregar Informacion


        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'N°');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'Elaborado por');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'Proyecto');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'Área');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'Ubicación');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'Área observada');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'Nombre del equipo observado');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', 'Tiempo en el trabajo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J5', 'Tiempo en el trabajo actual');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K5', 'Guardia');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L5', 'Ocupación');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M5', 'Tarea');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N5', 'Fecha de elaboración');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O5', 'Razón para la OPT');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N5', 'responsable');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O5', 'Riesgo crítico');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P5', 'Pet Log');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q5', 'Fecha de elaboración');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R5', 'Razón para la OPT');
        $objPHPExcel->getActiveSheet()->mergeCells('S5:T5');
        $objPHPExcel->getActiveSheet()->setCellValue('S5', 'Observación de la Tarea');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S6', 'Pasos');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('T6', 'Observaciones');
        $objPHPExcel->getActiveSheet()->setCellValue('U5', 'Observación planeada de tarea de resultados');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('U6', 'Fortalezas - Oportunidades para felicitar');
        $objPHPExcel->getActiveSheet()->mergeCells('V5:W5');
        $objPHPExcel->getActiveSheet()->setCellValue('V5', 'Recomendaciones');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('V6', 'Acciones');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('W6', 'Fecha');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('X5', 'Nombre de los observadores');

        $fila = 7;

        foreach ($list as $item) {


            // PRIMERO VAMOS A TRAER TODAS LAS OBSREVACIONES , OBSERVADORES Y RECOMENDACIONES QUE ESTEN RELACIONADOS A UN DOCUMENTO

            $data_observacion = "";
            $data2_observacion = "";

            //OBSERVACION
            $contador = 1;
            foreach ($item["optObservacion"] as $item_observacion) {

                $data_observacion .= ($contador . ". " . $item_observacion['pasos'] . " \n \n \n");
                $data2_observacion .= ($contador . ". " . $item_observacion['observaciones'] . "  \n \n \n");
                $contador++;
            }


            $objPHPExcel->setActiveSheetIndex()->setCellValue('S' . $fila, $data_observacion);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('T' . $fila,  $data2_observacion);

            //FORTALEZS
            $objPHPExcel->setActiveSheetIndex()->setCellValue('U' . $fila, $item["opt"]['oportunidades']);

            //RECOMENDACIONES

            $data_recomendacion = "";
            $data1_recomendacion = "";
            $data2_recomendacion = "";

            $contador = 1;

            foreach ($item["optRecomendaciones"]  as $item_recomendaciones) {

                $data_recomendacion .= ($contador . ". " . $item_recomendaciones['acciones'] . " \n \n \n");
                $data2_recomendacion .= ($contador . ". " . $item_recomendaciones['fecha'] . "  \n \n \n");

                $contador++;
            }

            $objPHPExcel->setActiveSheetIndex()->setCellValue('V' . $fila, $data_recomendacion);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('W' . $fila, $data2_recomendacion);



            //OBSERVADORES

            $data_observadores = "";
            $contador = 1;

            foreach ($item["optObservadores"] as $item_osbervadores) {

                $data_observadores .= ($contador . ". " .  $item_osbervadores['nombre'] . "  \n \n \n");

                $contador++;
            }

            $objPHPExcel->setActiveSheetIndex()->setCellValue('X' . $fila, $data_observadores);

            // VAMOS HACER UN MERGE CELDA DE LA CANTIDAD MAYOR DE LOS CONTADORES ANTERIORES
            $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $fila, '');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $fila, $item["opt"]['usuario_nombres'] . " " . $item["opt"]['usuario_apellidos']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $fila,  $item["opt"]['proyecto_nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $fila,  $item["opt"]['area_nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $fila,  $item["opt"]['ubicacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $fila,  $item["opt"]['area_observada_nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $fila, $item["opt"]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $fila, $item["opt"]['tiempo_proyecto']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $fila,  $item["opt"]['tiempo_trabajo']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $fila,  $item["opt"]['guardia']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $fila, $item["opt"]['ocupacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $fila,  $item["opt"]['tarea']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $fila,  $item["opt"]['responsable']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $fila,  $item["opt"]['riesgoCritico']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $fila,  $item["opt"]['petLog']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $fila, $item["opt"]['registro']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('R' . $fila,  $item["opt"]['razon_opt']);


            $fila++;
        }


        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Reportes de OPT');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('public/reports/opt.xlsx');
        return 'public/reports/opt.xlsx';
    }

    function generateIpercFormato1($list,$listRiesgoCritico)
    {



        define('RIESGO_1', '¿He realizado este trabajo anteriormente?');
        define('RIESGO_2', '¿Poseo las habilidades, los conocimientos o los permisos requeridos?');
        define('RIESGO_3', '¿Puedo cumplir con las Reglas por la Vida?');
        define('RIESGO_4', '¿Existe alguna evaluación de RIESGOS_CRITICOS o instrucción de trabajo para esta tarea?');
        define('RIESGO_5', '¿Se requiere algún permiso para realizar este trabajo?');
        define('RIESGO_6', '¿Este trabajo requiere “aislamiento”?');
        define('RIESGO_7', '¿Se trata de un espacio confinado?');
        define('RIESGO_8', '¿Estoy trabajando en alturas?');
        define('RIESGO_9', '¿Estoy realizando una excavación?');
        define('RIESGO_10', '¿He identificado algún impacto ambiental?');
        define('RIESGO_11', '¿Existe algún riesgo de lesión en las manos en este trabajo?');
        define('RIESGO_12', '¿Se utilizarán productos químicos');
        define('RIESGO_13', '¿El área de trabajo se encuentra ordenada y libre de obstáculos?');
        define('RIESGO_14', '¿He verificado si podría afectar u obstaculizar a los demás?');
        define('RIESGO_15', '¿Tengo las herramientas adecuadas para este trabajo?');
        define('RIESGO_16', '¿Poseo el Equipo de Protección Personal adecuado? ¿Estoy capacitado para utilizarlo?');

        define('RIESGO_CRITICO1', '¿El trabajo cuenta con el ICA respectivo aprobado y este se encuentra en el área de trabajo?');
        define('RIESGO_CRITICO2', '¿Requiere un permiso de trabajo de alto riesgo para la labor que realizará?: espacio confinado, trabajo en caliente, excavaciones, armado de andamios, riesgo de caída, excavaciones entre otros');
        define('RIESGO_CRITICO3', '¿El personal realizará labores dentro del radio de trabajo o en áreas de tránsito de equipos pesados?');
        define('RIESGO_CRITICO4', '¿El trabajo se realizara cerca o al borde de: un talud, presa de relaves, cuerpos de agua con más de 1.50 m. de profundidad?');
        define('RIESGO_CRITICO5', '¿El trabajo contempla la posibilidad que el personal tenga contacto con sustancia química, inflamable o explosiva? ¿Existe la posibilidad de una descarga no controlada?');
        define('RIESGO_CRITICO6', '¿El trabajo requiere retirar la guarda de algún equipo mientras este se encuentre en funcionamiento?');
        define('RIESGO_CRITICO7', '¿Realizará excavaciones o perforaciones de más de 0.30 m. cerca o en plantas, instalaciones o líneas eléctricas?');
        define('RIESGO_CRITICO8', '¿El personal realizara trabajos en plataformas o alturas de 1.50 metros o mayores, que no estén protegidas con barandas?');
        define('RIESGO_CRITICO9', '¿Realizará maniobras de izaje de estructuras?');


        define('RIESGO_MANO1', '¿La tarea conlleva a exponer las manos a la línea de fuego (golpeado por objetos en movimiento ej.golpear con martillo)?');
        define('RIESGO_MANO2', '¿La tarea conlleva a exponer las manos en puntos de atricción y/o atrapamiento (atrapado entre, ej. colocar mano entre marco y la puerta)?');
        define('RIESGO_MANO3', '¿La tarea conlleva a exponer las manos a bordes filosos y/o cortantes: La tarea conlleva a manipular cuchillas y/o herramientas punzocortantes?');


        define('RIESGO_COVID1', '¿Se utilizan protector Facial para trabajos a menos de 1 m?');
        define('RIESGO_COVID2', '¿Se mantiene distanciamiento 2 m como mínimo?');
        define('RIESGO_COVID3', '¿Se utiliza la protección respiratoria (mascarilla KN95)?');
        define('RIESGO_COVID4', '¿Se lavan/desinfectan las manos de manera frecuente?');
        define('RIESGO_COVID5', '¿Se limpia/desinfectan las herramientas y equipos?');
        define('RIESGO_COVID6', '¿Se limpió/desinfectó el vehículo/Equipo?');
        define('RIESGO_COVID7', '¿Se respeta el aforo del vehículo/Equipo?');

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Helena Minaya"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("Helena Minaya"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setTitle("Reporte IPER"); // Titulo
        $objPHPExcel->getProperties()->setSubject("Reporte Excel con PHP y MySQL"); //Asunto
        $objPHPExcel->getProperties()->setDescription("Reporte de IPERC"); //Descripción
        $objPHPExcel->getProperties()->setKeywords("IPERC"); //Etiquetas
        $objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias

        $Titulo = array(
            'font' => array(
                'bold' => true,
                'size' => 14,
                'name' => 'Verdana',
                'wrap' => true
            )
        );

        $TituloTabla = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
                'wrap' => true
            )
        );

        // Crea un nuevo objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        //combinar celdas
        $objPHPExcel->getActiveSheet()->mergeCells('B3:U3');

        //estilo de fuentes
        $objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($Titulo);
        $objPHPExcel->getActiveSheet()->getStyle('B5:BK5')->applyFromArray($TituloTabla);

        //$objPHPExcel->getActiveSheet()->getStyle('B5:BK5')->applyFromArray( array( 'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FF0000') ) ) );

        //alineacion
        $objPHPExcel->getActiveSheet()->getStyle('B3:M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B5:CX5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //Titulo
        $objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE IPERC game');

        $objPHPExcel->getActiveSheet()->getStyle('B5:CX2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $objPHPExcel->getActiveSheet()->getStyle('B5:CX000')->getAlignment()->setWrapText(true);

        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);

        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setWidth(35);

        $objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BC')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BD')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BE')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BF')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BG')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BH')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BI')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BJ')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BK')->setWidth(35);

        $objPHPExcel->getActiveSheet()->getColumnDimension('BL')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BM')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BN')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BO')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BP')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BQ')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BR')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BS')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BT')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BU')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BV')->setWidth(35);

        $objPHPExcel->getActiveSheet()->getColumnDimension('BW')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BX')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BY')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BZ')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CA')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CB')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CC')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CD')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CE')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CF')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CG')->setWidth(35);

        $objPHPExcel->getActiveSheet()->getColumnDimension('CH')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CI')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CJ')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CK')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CL')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CM')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CN')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CO')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CP')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CQ')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CR')->setWidth(35);

        $objPHPExcel->getActiveSheet()->getColumnDimension('CS')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CT')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CU')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CV')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CW')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('CX')->setWidth(35);


        //alto de la fila
        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(50);

        // Agregar Informacion

        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'Orden');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'Elaborado por');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'Proyecto');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'Área');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'Ubicación');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'Área observada');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'Tarea');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', 'Empresa');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J5', 'Riesgo crítico');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K5', 'Fecha');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L5', 'Registro');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('M5', constant('RIESGO_1'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O5', constant('RIESGO_2'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q5', constant('RIESGO_3'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S5', constant('RIESGO_4'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('T5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('U5', constant('RIESGO_5'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('V5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('W5', constant('RIESGO_6'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('X5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Y5', constant('RIESGO_7'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Z5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AA5', constant('RIESGO_8'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AB5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AC5', constant('RIESGO_9'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AD5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AE5', constant('RIESGO_10'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AF5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AG5', constant('RIESGO_11'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AH5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AI5', constant('RIESGO_12'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AJ5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AK5', constant('RIESGO_13'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AL5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AM5', constant('RIESGO_14'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AN5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AO5', constant('RIESGO_15'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AP5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AQ5', constant('RIESGO_16'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AR5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('AS5', constant('RIESGO_MANO1'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AT5', constant('RIESGO_MANO2'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AU5', constant('RIESGO_MANO3'));

        $objPHPExcel->setActiveSheetIndex()->setCellValue('AV5', constant('RIESGO_COVID1'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AW5', constant('RIESGO_COVID2'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AX5', constant('RIESGO_COVID3'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AY5', constant('RIESGO_COVID4'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AZ5', constant('RIESGO_COVID5'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BA5', constant('RIESGO_COVID6'));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BB5', constant('RIESGO_COVID7'));




        $objPHPExcel->setActiveSheetIndex()->setCellValue('BC5', 'Pregunta 1');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BD5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BE5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('BF5', 'Pregunta 2');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BG5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BH5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('BI5', 'Pregunta 3');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BJ5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BK5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('BL5', 'Pregunta 4');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BM5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BN5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('BO5', 'Pregunta 5');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BP5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BQ5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('BR5', 'Pregunta 6');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BS5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BT5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('BU5', 'Pregunta 7');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BV5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BW5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('BX5', 'Pregunta 8');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BY5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('BZ5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('CA5', 'Pregunta 9');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CB5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CC5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('CD5', 'Pregunta 10');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CE5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CF5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('CG5', 'Pregunta 11');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CH5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CI5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('CJ5', 'Pregunta 12');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CK5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CL5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('CM5', 'Pregunta 13');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CN5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CO5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('CP5', 'Pregunta 14');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CQ5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CR5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('CS5', 'Pregunta 15');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CT5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CU5', 'Comentario');

        $objPHPExcel->setActiveSheetIndex()->setCellValue('CV5', 'Pregunta 16');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CW5', 'respuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('CX5', 'Comentario');


        //aca iran los datos de la tabla
        $fila = 6;


        foreach ($list as $item) {

            $listaRiesgos = $this->listaRiesgosCriticosById($listRiesgoCritico, $item['idTipoRiesgo']);


            $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $fila, $item['id']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $fila, $item['nombres_usuario'] . ' ' . $item['apellidos_usuario']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $fila, $item['nombre_proyecto']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $fila, $item['nombre_area']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $fila, $item['ubicacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $fila, $item['area_observada']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $fila, $item['nombre_tarea']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $fila, $item['empresa']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $fila, $item['tipoRiesgo']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $fila, $item['fecha']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $fila, $item['registro']);


            $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $fila, $item['riesgo1'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $fila, $item['comentario1']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $fila, $item['riesgo2'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $fila, $item['comentario2']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $fila, $item['riesgo3'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('R' . $fila, $item['comentario3']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('S' . $fila, $item['riesgo4'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('T' . $fila, $item['comentario4']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('U' . $fila, $item['riesgo5'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('V' . $fila, $item['comentario5']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('W' . $fila, $item['riesgo6'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('X' . $fila, $item['comentario6']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Y' . $fila, $item['riesgo7'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Z' . $fila, $item['comentario7']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AA' . $fila, $item['riesgo8'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AB' . $fila, $item['comentario8']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AC' . $fila, $item['riesgo9'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AD' . $fila, $item['comentario9']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AE' . $fila, $item['riesgo10'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AF' . $fila, $item['comentario10']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AG' . $fila, $item['riesgo11'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AH' . $fila, $item['comentario11']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AI' . $fila, $item['riesgo12'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AJ' . $fila, $item['comentario12']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('AK' . $fila, $item['riesgo13'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AL' . $fila, $item['comentario13']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AM' . $fila, $item['riesgo14'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AN' . $fila, $item['comentario14']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AO' . $fila, $item['riesgo15'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AP' . $fila, $item['comentario15']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AQ' . $fila, $item['riesgo16'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AR' . $fila, $item['comentario16']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('AS' . $fila, $item['riesgo_manos1'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AT' . $fila, $item['riesgo_manos2'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AU' . $fila, $item['riesgo_manos3'] == '1' ? 'Si' : 'No');

            $objPHPExcel->setActiveSheetIndex()->setCellValue('AV' . $fila, '');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AW' . $fila, $item['riesgo_covid2'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AX' . $fila, $item['riesgo_covid3'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AY' . $fila, $item['riesgo_covid4'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AZ' . $fila, $item['riesgo_covid5'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BA' . $fila, $item['riesgo_covid6'] == '1' ? 'Si' : 'No');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BB' . $fila, $item['riesgo_covid7'] == '1' ? 'Si' : 'No');





            $objPHPExcel->setActiveSheetIndex()->setCellValue('BC' . $fila,  $listaRiesgos[0]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BD' . $fila,  $this->convertirRespuesta($item['riesgo_critico1']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BE' . $fila,  $item['comentario_critico1']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('BF' . $fila,  $listaRiesgos[1]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BG' . $fila,   $this->convertirRespuesta($item['riesgo_critico2']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BH' . $fila,  $item['comentario_critico2']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('BI' . $fila,  $listaRiesgos[2]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BJ' . $fila,   $this->convertirRespuesta($item['riesgo_critico3']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BK' . $fila,  $item['comentario_critico3']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('BL' . $fila,  $listaRiesgos[3]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BM' . $fila,   $this->convertirRespuesta($item['riesgo_critico4']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BN' . $fila,  $item['comentario_critico4']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('BO' . $fila,  $listaRiesgos[4]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BP' . $fila,   $this->convertirRespuesta($item['riesgo_critico5']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BQ' . $fila,  $item['comentario_critico5']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('BR' . $fila,  $listaRiesgos[5]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BS' . $fila,   $this->convertirRespuesta($item['riesgo_critico6']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BT' . $fila,  $item['comentario_critico6']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('BU' . $fila,  $listaRiesgos[6]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BV' . $fila,   $this->convertirRespuesta($item['riesgo_critico7']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BW' . $fila,  $item['comentario_critico7']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('BX' . $fila,  $listaRiesgos[7]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BY' . $fila,   $this->convertirRespuesta($item['riesgo_critico8']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('BZ' . $fila,  $item['comentario_critico8']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('CA' . $fila,  $listaRiesgos[8]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CB' . $fila,   $this->convertirRespuesta($item['riesgo_critico9']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CC' . $fila,  $item['comentario_critico9']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('CD' . $fila,  $listaRiesgos[9]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CE' . $fila,   $this->convertirRespuesta($item['riesgo_critico10']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CF' . $fila,  $item['comentario_critico10']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('CG' . $fila,  $listaRiesgos[10]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CH' . $fila,   $this->convertirRespuesta($item['riesgo_critico11']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CI' . $fila,  $item['comentario_critico11']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('CJ' . $fila,  $listaRiesgos[11]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CK' . $fila,   $this->convertirRespuesta($item['riesgo_critico12']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CL' . $fila,  $item['comentario_critico12']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('CM' . $fila,  $listaRiesgos[12]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CN' . $fila,   $this->convertirRespuesta($item['riesgo_critico13']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CO' . $fila,  $item['comentario_critico13']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('CP' . $fila,  $listaRiesgos[13]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CQ' . $fila,   $this->convertirRespuesta($item['riesgo_critico14']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CR' . $fila,  $item['comentario_critico14']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('CS' . $fila,  $listaRiesgos[14]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CT' . $fila,   $this->convertirRespuesta($item['riesgo_critico15']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CU' . $fila,  $item['comentario_critico15']);

            /*$objPHPExcel->setActiveSheetIndex()->setCellValue('CV' . $fila,  $listaRiesgos[15]['nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CW' . $fila,   $this->convertirRespuesta($item['riesgo_critico16']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('CX' . $fila,  $item['comentario_critico16']);*/

            $fila++;
        };
        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Reportes de IPERC');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('public/reports/ipercNuevo.xlsx');
        return 'public/reports/ipercNuevo.xlsx';
    }

    function listaRiesgosCriticosById($lista , $idRiesgoCritico){

        $listaRiesgos = [];

        foreach($lista as $elemento){

                if($elemento['id_riesgo_critico'] == $idRiesgoCritico){
                        array_push($listaRiesgos,$elemento);
                }
        }


        $cantidad = 16 - count($listaRiesgos);

        for($index = 1 ; $index < $cantidad ; $index++){
                $elemento =  [ "id_riesgo_critico" => 14, "nombre" => ""];
                array_push($listaRiesgos,$elemento);
        }

        return $listaRiesgos;


    }

    function convertirRespuesta($alternativa){

        $respuesta = '';

        if($alternativa == 1){
            $respuesta= 'Si';
        }
        if($alternativa == 2){
            $respuesta= 'No';
        }
        if($alternativa == 3){
            $respuesta= 'NA';
        }

        return $respuesta;
    }
}
