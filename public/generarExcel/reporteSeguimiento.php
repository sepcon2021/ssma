<?php

require_once "public/PHPExcel/PHPExcel.php";
require_once "config/config.php";

class ReporteSeguimiento{


    public function generateReporteNotas($list)
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
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(80);


        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'Item');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'Foto');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'Peligro riesgo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'Hallazgo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'Acción propuesta');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'Responsable');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'Fecha de inicio');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', 'Fecha de compromiso');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J5', 'Fecha de cumplimieto');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K5', 'plazo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L5', 'Frente de trabajo');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M5', 'Estado');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N5', 'Comentario');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O5', 'Avance / Evidencia');

        $row = 6;

        foreach ($list as $seguimiento) {

            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(1, $row, $seguimiento->id);
            
            $evidencia = explode(",", $seguimiento->foto);
            $cantidad = 1;

            foreach ($evidencia as $elemento) {

                if (strlen($elemento) > 0) {

                    if (strpos($elemento, '.jpg') > 0 || strpos($elemento, '.png') > 0) {

                        $foto = "public/photos/" . $elemento;

                        if ($elemento != '' && file_exists($foto)) {
                            $objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(100);
                            $objDrawing = new PHPExcel_Worksheet_Drawing();
                            $objDrawing->setOffsetX(1);
                            $objDrawing->setOffsetY($cantidad);
                            $objDrawing->setCoordinates('C' . $row);
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


            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(3, $row, $seguimiento->peligroRiesgo);
            
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(4, $row,'link PDF');
            $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$row)->getHyperlink()->setUrl(constant('URL').$seguimiento->hallazgo);

            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(5, $row, $seguimiento->accionPropuesta);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(6, $row, $seguimiento->responsable);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(7, $row, $seguimiento->fechaInicio);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(8, $row, $seguimiento->fechaCompromiso);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(9, $row, $seguimiento->fechaCumplimiento);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(10, $row, $seguimiento->plazo);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(11, $row, $seguimiento->frenteTrabajo);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(12, $row, $seguimiento->estado);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(13, $row, $seguimiento->comentario);


            foreach ($seguimiento->evidencia as $elemento) {

                if (strlen($elemento['nombre']) > 0) {

                    if (strpos($elemento['nombre'], '.jpg') > 0 || strpos($elemento['nombre'], '.png') > 0) {

                        $foto = "public/photos/" . $elemento['nombre'];

                        if ($elemento['nombre'] != '' && file_exists($foto)) {
                            $objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(100);
                            $objDrawing = new PHPExcel_Worksheet_Drawing();
                            $objDrawing->setOffsetX(1);
                            $objDrawing->setOffsetY($cantidad);
                            $objDrawing->setCoordinates('O' . $row);
                            $objDrawing->setName($elemento['nombre']);
                            $objDrawing->setDescription(constant("URL") . "photos/" . $elemento['nombre']);
                            $objDrawing->setPath("public/photos/" . $elemento['nombre']);
                            $objDrawing->setHeight(50);
                            $objDrawing->setHeight(50);
                            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
                        }
                    }
                }
                $cantidad += 50;
            }


            $row++;

        }
        

        $fecha = new DateTime();
        $fecha = $fecha->getTimestamp();

        $rutaExcel = 'public/reports/seguimientoTops' . $fecha . '.xlsx';

        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Seguimiento');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($rutaExcel);
        return $rutaExcel;
    }
}