<?php

require_once 'public/PHPExcel/PHPExcel.php';

class GenerateExcel
{

    const FORMATO1 = 1;
    const FORMATO2 = 2;

    function typeFormaTops($type, $list)
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
}
