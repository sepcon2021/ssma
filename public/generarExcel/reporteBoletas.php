<?php

require_once "public/PHPExcel/PHPExcel.php";

class ReporteBoletasExcel
{


    public function generateReportBoletaMensual($listBoletas, $listSede,$year)
    {

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Boletas"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("Boletas"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setTitle("Boletas"); // Titulo
        $objPHPExcel->getProperties()->setSubject("Reporte"); //Asunto
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

        
        $backgroundNoAplica = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFD966',
            ),
        );

        $backgroundCabecera = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '305496',
            )
        );

        $titleCabecera = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
                'color' => array('rgb' => 'ffffff'),
            )
        );

        $borderCabecera = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                )
            )
        );
        
        $titleCabeceraSede = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '538DD5',
            )
        );

        // Crea un nuevo objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        $day = date("Y-m-d");

        $objPHPExcel->getActiveSheet()->mergeCells('B2:S2');
        $objPHPExcel->getActiveSheet()->getStyle('B2:S2')->applyFromArray($TituloTabla);
        $objPHPExcel->getActiveSheet()->getStyle('B2:S2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B2', 'REPORTE DE BOLETAS  - REG. COMUN AL '.$day);


        $objPHPExcel->getActiveSheet()->mergeCells('I4:T4');
        $objPHPExcel->getActiveSheet()->getStyle('I4:T4')->applyFromArray($TituloTabla);
        $objPHPExcel->getActiveSheet()->getStyle('I4:T4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I4', 'BOLETAS DE  PAGO');


        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(8,5)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(8,4)->getFill()->applyFromArray($backgroundNoAplica);


        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(8,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(9,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(10,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(11,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(12,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(13,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(14,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(15,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(16,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(17,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(18,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(19,6)->getFill()->applyFromArray($backgroundNoAplica);

        
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('A5', 'N°');
        $objPHPExcel->getActiveSheet()->getStyle('A5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($titleCabecera);


        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'Apellidos y Nombres');
        $objPHPExcel->getActiveSheet()->getStyle('B5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($titleCabecera);


        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'DNI');
        $objPHPExcel->getActiveSheet()->getStyle('C5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'Fecha de ingreso');
        $objPHPExcel->getActiveSheet()->getStyle('D5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('D5')->applyFromArray($titleCabecera);


        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'Cargo');
        $objPHPExcel->getActiveSheet()->getStyle('E5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'Desc. C Costos');
        $objPHPExcel->getActiveSheet()->getStyle('F5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('F5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'OBSERVACION');
        $objPHPExcel->getActiveSheet()->getStyle('G5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('G5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'CESE');
        $objPHPExcel->getActiveSheet()->getStyle('H5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('H5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->mergeCells('I5:T5');
        $objPHPExcel->getActiveSheet()->getStyle('I5:T5')->applyFromArray($TituloTabla);
        $objPHPExcel->getActiveSheet()->getStyle('I5:T5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', $year);



        $objPHPExcel->getActiveSheet()->getStyle("I4:T6")->applyFromArray($borderCabecera);



        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);



        $objPHPExcel->setActiveSheetIndex()->setCellValue('I6', 'ENERO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J6', 'FEBRERO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K6', 'MARZO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L6', 'ABRIL');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M6', 'MAYO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N6', 'JUNIO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O6', 'JULIO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P6', 'AGOSTO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q6', 'SETIEMBRE');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R6', 'OCTUBRE');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S6', 'NOVIEMBRE');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('T6', 'DICIEMBRE');





        $row = 8;
        $count = 1;

        foreach( range(0,(count($listSede) - 1 )) as $index){

            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow( 1 , ($row - 2), 'SEDE:'.$listSede[$index]["nombreSede"]);
            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 2))->getFill()->applyFromArray($titleCabeceraSede);

            $data = $this->printRowByProyectMensualPrueba( $objPHPExcel , $row ,$count ,$listBoletas , $listSede[$index]['contenido'] ,$index);
            
            $row = $data["row"];
            $count = $data["count"];
            $objPHPExcel = $data["objPHPExcel"];

        }
    
        $objPHPExcel->setActiveSheetIndex()->removeColumn('G');

        $fecha = new DateTime();
        $fecha = $fecha->getTimestamp();


        $rutaExcel = 'public/reports/boletas' . $fecha . '.xlsx';

        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Registro de Notas');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($rutaExcel);
        return $rutaExcel;
    }


    function printRowByProyectMensual( $objPHPExcel , $row ,$count ,$listBoletas , $listAquarius,$index)
    {

        $COLUMN_DATA = 7;


        $titleCabeceraSede = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
                'color' => array('rgb' => '000000'),
            )
        );

        $backgroundOk = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFFFF',
            ),
        );

        $backgroundPendiente = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'F4B084',
            ),
        );
        
        $backgroundNoAplica = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFD966',
            ),
        );

        $backgroundCabecera = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'B8CCE4',
            ),
        );

        
        $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow( 1 , ($row - 1), 'Proyecto/Sede:'.$listAquarius[$index]["nombre"]);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 1))->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 1))->applyFromArray($titleCabeceraSede);

        foreach ($listAquarius[$index]["listAquarius"] as $usuario) {


            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(0, $row , $count);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(1, $row, $usuario['usuario']);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(2, $row, $usuario['dni']);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(3, $row, date("d/m/Y", strtotime($usuario['fechaIngreso'])));
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(4, $row, $usuario['descripcionCargo']);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(5, $row, $usuario['descripcionCostos']);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(7, $row, $usuario['estado']);


            $arrayMonth =  array_fill(0,12, 2);



            foreach ($listBoletas as  $boleta) {

                if ($boleta['dni'] == $usuario['dni'] && $boleta['periodo'] == 'ME') {

                    $arrayMonth[$boleta['mes'] - 1] = $boleta['estado'] == 1 ? 1 : 0 ;
                }
            }


            $cantidad = 1;
            $noAplica = 0;

            foreach ($arrayMonth as $month) {


                if ($month == 0) {
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA , $row , 'PENDIENTE');
                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($cantidad + $COLUMN_DATA, $row)->getFill()->applyFromArray($backgroundPendiente);
                }

                if ($month == 1) {
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA, $row, 'OK');
                }
                if ($month == 2) {
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA, $row , 'NO APLICA');
                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($cantidad + $COLUMN_DATA , $row)->getFill()->applyFromArray($backgroundNoAplica);
                    $noAplica++;
                }


                $cantidad++;
            }

            $count++;

            if($noAplica != 12 ){
                $row++;
            }
            if($noAplica == 12 ){

                foreach (range(0,19) as $item){
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($item, $row , '');

                }
                foreach (range(8,19) as $item){
                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($item, $row)->getFill()->applyFromArray($backgroundOk);

                }
            }
        }

        $row+=2;


        return array("objPHPExcel" => $objPHPExcel , "row" => $row , "count" => $count);

    }

    public function generateReportBoletaQuincenal($listBoletas, $listSede,$year){
        
        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Boletas"); // Nombre del autor
        $objPHPExcel->getProperties()->setLastModifiedBy("Boletas"); //Ultimo usuario que lo modificó
        $objPHPExcel->getProperties()->setTitle("Boletas"); // Titulo
        $objPHPExcel->getProperties()->setSubject("Reporte"); //Asunto
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

        
        $backgroundNoAplica = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFD966',
            ),
        );

        $backgroundCabecera = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '305496',
            )
        );

        $titleCabecera = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
                'color' => array('rgb' => 'ffffff'),
            )
        );

        $borderCabecera = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                )
            )
        );

        $titleCabeceraSede = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => '538DD5',
            )
        );
        
        // Crea un nuevo objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        $day = date("Y-m-d");


        $objPHPExcel->getActiveSheet()->mergeCells('B2:AE2');
        $objPHPExcel->getActiveSheet()->getStyle('B2:AE2')->applyFromArray($TituloTabla);
        $objPHPExcel->getActiveSheet()->getStyle('B2:AE2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B2', 'REPORTE DE BOLETAS  - REG. COMUN AL '.$day);


        $objPHPExcel->getActiveSheet()->mergeCells('I4:AF4');
        $objPHPExcel->getActiveSheet()->getStyle('I4:AF4')->applyFromArray($TituloTabla);
        $objPHPExcel->getActiveSheet()->getStyle('I4:AF4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I4', 'BOLETAS DE  PAGO');


        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(8,5)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(8,4)->getFill()->applyFromArray($backgroundNoAplica);


        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(8,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(9,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(10,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(11,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(12,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(13,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(14,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(15,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(16,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(17,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(18,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(19,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(20,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(21,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(22,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(23,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(24,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(25,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(26,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(27,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(28,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(29,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(30,6)->getFill()->applyFromArray($backgroundNoAplica);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(31,6)->getFill()->applyFromArray($backgroundNoAplica);

        
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('A5', 'N°');
        $objPHPExcel->getActiveSheet()->getStyle('A5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($titleCabecera);


        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'Apellidos y Nombres');
        $objPHPExcel->getActiveSheet()->getStyle('B5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($titleCabecera);


        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'DNI');
        $objPHPExcel->getActiveSheet()->getStyle('C5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'Fecha de ingreso');
        $objPHPExcel->getActiveSheet()->getStyle('D5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('D5')->applyFromArray($titleCabecera);


        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'Cargo');
        $objPHPExcel->getActiveSheet()->getStyle('E5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'Desc. C Costos');
        $objPHPExcel->getActiveSheet()->getStyle('F5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('F5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'OBSERVACION');
        $objPHPExcel->getActiveSheet()->getStyle('G5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('G5')->applyFromArray($titleCabecera);


        
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(50);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'CESE');
        $objPHPExcel->getActiveSheet()->getStyle('H5')->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyle('H5')->applyFromArray($titleCabecera);

        $objPHPExcel->getActiveSheet()->mergeCells('I5:AF5');
        $objPHPExcel->getActiveSheet()->getStyle('I5:AF5')->applyFromArray($TituloTabla);
        $objPHPExcel->getActiveSheet()->getStyle('I5:AF5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', $year);

        $objPHPExcel->getActiveSheet()->getStyle("I4:AF6")->applyFromArray($borderCabecera);


        //ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(30);


        $objPHPExcel->setActiveSheetIndex()->setCellValue('I6', '1Q ENERO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J6', '2Q ENERO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('K6', '1Q FEBRERO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L6', '2Q FEBRERO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M6', '1Q MARZO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N6', '2Q MARZO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O6', '1Q ABRIL');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P6', '2Q ABRIL');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q6', '1Q MAYO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R6', '2Q MAYO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S6', '1Q JUNIO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('T6', '2Q JUNIO');


        $objPHPExcel->setActiveSheetIndex()->setCellValue('U6', '1Q JULIO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('V6', '2Q JULIO');       
        $objPHPExcel->setActiveSheetIndex()->setCellValue('W6', '1Q AGOSTO');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('X6', '2Q AGOSTO');  
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Y6', '1Q SETIEMBRE');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Z6', '2Q SETIEMBRE');  
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AA6', '1Q OCTUBRE');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AB6', '2Q OCTUBRE');  
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AC6', '1Q NOVIEMBRE');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AD6', '2Q NOVIEMBRE');  
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AE6', '1Q DICIEMBRE');
        $objPHPExcel->setActiveSheetIndex()->setCellValue('AF6', '2Q DICIEMBRE');  



        $row = 8;
        $count = 1;

        foreach( range(0,(count($listSede) - 1 )) as $index){

            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow( 1 , ($row - 2), 'SEDE:'.$listSede[$index]["nombreSede"]);
            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 2))->getFill()->applyFromArray($titleCabeceraSede);

            $data = $this->printRowByProyectQuincenalPrueba( $objPHPExcel , $row ,$count ,$listBoletas , $listSede[$index]['contenido'] ,$index);
            
            $row = $data["row"];
            $count = $data["count"];
            $objPHPExcel = $data["objPHPExcel"];

        }
    
        $objPHPExcel->setActiveSheetIndex()->removeColumn('G');

        $fecha = new DateTime();
        $fecha = $fecha->getTimestamp();


        $rutaExcel = 'public/reports/boletas' . $fecha . '.xlsx';

        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Registro de Notas');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($rutaExcel);
        return $rutaExcel;
    }

    function printRowByProyectQuincenal( $objPHPExcel , $row ,$count ,$listBoletas , $listAquarius,$index)
    {

        $COLUMN_DATA = 7 ; 

        $backgroundOk = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFFFF',
            ),
        );

        $titleCabeceraSede = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
                'color' => array('rgb' => '000000'),
            )
        );

        $backgroundPendiente = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'F4B084',
            ),
        );
        
        $backgroundNoAplica = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFD966',
            ),
        );

        $backgroundCabecera = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'B8CCE4',
            ),
        );

        
        $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow( 1 , ($row - 1), 'Sede:'.$listAquarius[$index]["nombre"]);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 1))->getFill()->applyFromArray($backgroundCabecera);
        $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 1))->applyFromArray($titleCabeceraSede);


        foreach ($listAquarius[$index]["listAquarius"] as $usuario) {

            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(0, $row , $count);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(1, $row, $usuario['usuario']);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(2, $row, $usuario['dni']);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(3, $row, date("d/m/Y", strtotime($usuario['fechaIngreso'])));
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(4, $row, $usuario['descripcionCargo']);
            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(5, $row, $usuario['descripcionCostos']);

            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(7, $row, $usuario['estado']);

            $arrayMonth =  array_fill(0,24, 2);


            foreach ($listBoletas as  $boleta) {

                if ($boleta['dni'] == $usuario['dni'] && $boleta['periodo'] == '1Q' ) {

                    $arrayMonth[$boleta['mes'] - 1] = $boleta['estado'] == 1 ? 1 : 0 ;
                }

                if ($boleta['dni'] == $usuario['dni'] && $boleta['periodo'] == '2Q' ) {

                    $arrayMonth[$boleta['mes']] = $boleta['estado'] == 1 ? 1 : 0 ;
                }

            }


            $cantidad = 1;
            $noAplica = 0;

            foreach ($arrayMonth as $month) {


                if ($month == 0) {
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA , $row , 'PENDIENTE');
                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($cantidad + $COLUMN_DATA, $row)->getFill()->applyFromArray($backgroundPendiente);
                }

                if ($month == 1) {
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA, $row, 'OK');
                }
                if ($month == 2) {
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA, $row , 'NO APLICA');
                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($cantidad + $COLUMN_DATA , $row)->getFill()->applyFromArray($backgroundNoAplica);
                    $noAplica++;
                }


                $cantidad++;
            }

            //echo $noAplica;

            $count++;

            if($noAplica != 24){
                $row++;
            }
            if($noAplica == 24 ){

                foreach (range(0,33) as $item){
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($item, $row , '');

                }
                foreach (range(8,33) as $item){
                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($item, $row)->getFill()->applyFromArray($backgroundOk);

                }
            }
        }

        $row+=2;


        return array("objPHPExcel" => $objPHPExcel , "row" => $row , "count" => $count);

    }



    function printRowByProyectMensualPrueba( $objPHPExcel , $row ,$count ,$listBoletas , $listProyecto ,$index)
    {

        $COLUMN_DATA = 7;


        $titleCabeceraSede = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
                'color' => array('rgb' => '000000'),
            )
        );

        $backgroundOk = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFFFF',
            ),
        );

        $backgroundPendiente = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'F4B084',
            ),
        );
        
        $backgroundNoAplica = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFD966',
            ),
        );

        $backgroundCabecera = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'B8CCE4',
            ),
        );


        foreach($listProyecto as $proyecto){

            if( count($proyecto['contenidoProyecto']) > 0){
        
                $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow( 1 , ($row - 1), 'PROYECTO:'.$proyecto["nombreProyecto"]);
                $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 1))->getFill()->applyFromArray($backgroundCabecera);
                $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 1))->applyFromArray($titleCabeceraSede);
        
                foreach ($proyecto['contenidoProyecto'] as $usuario) {
                
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(0, $row , $count);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(1, $row, $usuario['usuario']);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(2, $row, $usuario['dni']);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(3, $row, date("d/m/Y", strtotime($usuario['fechaIngreso'])));
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(4, $row, $usuario['descripcionCargo']);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(5, $row, $usuario['descripcionCostos']);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(7, $row, $usuario['estado']);
        
        
                    $arrayMonth =  array_fill(0,12, 2);
        
        
        
                    foreach ($listBoletas as  $boleta) {
        
                        if ($boleta['dni'] == $usuario['dni'] && $boleta['periodo'] == 'ME') {
        
                            $arrayMonth[$boleta['mes'] - 1] = $boleta['estado'] == 1 ? 1 : 0 ;
                        }
                    }
        
        
                    $cantidad = 1;
                    $noAplica = 0;
        
                    foreach ($arrayMonth as $month) {
        
        
                        if ($month == 0) {
                            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA , $row , 'PENDIENTE');
                            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($cantidad + $COLUMN_DATA, $row)->getFill()->applyFromArray($backgroundPendiente);
                        }
        
                        if ($month == 1) {
                            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA, $row, 'OK');
                        }
                        if ($month == 2) {
                            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA, $row , 'NO APLICA');
                            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($cantidad + $COLUMN_DATA , $row)->getFill()->applyFromArray($backgroundNoAplica);
                            $noAplica++;
                        }
        
        
                        $cantidad++;
                    }
        
                    $count++;
        
                    if($noAplica != 12 ){
                        $row++;
                    }
                    if($noAplica == 12 ){
        
                        foreach (range(0,19) as $item){
                            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($item, $row , '');
        
                        }
                        foreach (range(8,19) as $item){
                            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($item, $row)->getFill()->applyFromArray($backgroundOk);
        
                        }
                    }
                }
        
                $row+=2;
        
            }

        }

        return array("objPHPExcel" => $objPHPExcel , "row" => $row , "count" => $count);

    }


    function printRowByProyectQuincenalPrueba( $objPHPExcel , $row ,$count ,$listBoletas , $listProyecto)
    {

        $COLUMN_DATA = 7 ; 

        $backgroundOk = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFFFFF',
            ),
        );

        $titleCabeceraSede = array(
            'font' => array(
                'bold' => true,
                'size' => 9,
                'name' => 'Arial',
                'color' => array('rgb' => '000000'),
            )
        );

        $backgroundPendiente = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'F4B084',
            ),
        );
        
        $backgroundNoAplica = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'FFD966',
            ),
        );

        $backgroundCabecera = array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                'rgb' => 'B8CCE4',
            ),
        );


        
        foreach($listProyecto as $proyecto){

            if( count($proyecto['contenidoProyecto']) > 0){
               
                $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow( 1 , ($row - 1), 'Sede:'.$proyecto["nombreProyecto"]);
                $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 1))->getFill()->applyFromArray($backgroundCabecera);
                $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(1 , ($row - 1))->applyFromArray($titleCabeceraSede);
        
        
                foreach ($proyecto['contenidoProyecto']  as $usuario) {
        
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(0, $row , $count);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(1, $row, $usuario['usuario']);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(2, $row, $usuario['dni']);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(3, $row, date("d/m/Y", strtotime($usuario['fechaIngreso'])));
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(4, $row, $usuario['descripcionCargo']);
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(5, $row, $usuario['descripcionCostos']);
        
                    $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow(7, $row, $usuario['estado']);
        
                    $arrayMonth =  array_fill(0,24, 2);
        
        
                    foreach ($listBoletas as  $boleta) {
        
                        if ($boleta['dni'] == $usuario['dni'] && $boleta['periodo'] == '1Q' ) {
        
                            $arrayMonth[$boleta['mes'] - 1] = $boleta['estado'] == 1 ? 1 : 0 ;
                        }
        
                        if ($boleta['dni'] == $usuario['dni'] && $boleta['periodo'] == '2Q' ) {
        
                            $arrayMonth[$boleta['mes']] = $boleta['estado'] == 1 ? 1 : 0 ;
                        }
        
                    }
        
        
                    $cantidad = 1;
                    $noAplica = 0;
        
                    foreach ($arrayMonth as $month) {
        
        
                        if ($month == 0) {
                            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA , $row , 'PENDIENTE');
                            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($cantidad + $COLUMN_DATA, $row)->getFill()->applyFromArray($backgroundPendiente);
                        }
        
                        if ($month == 1) {
                            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA, $row, 'OK');
                        }
                        if ($month == 2) {
                            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($cantidad + $COLUMN_DATA, $row , 'NO APLICA');
                            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($cantidad + $COLUMN_DATA , $row)->getFill()->applyFromArray($backgroundNoAplica);
                            $noAplica++;
                        }
        
        
                        $cantidad++;
                    }
        
                    //echo $noAplica;
        
                    $count++;
        
                    if($noAplica != 24){
                        $row++;
                    }
                    if($noAplica == 24 ){
        
                        foreach (range(0,33) as $item){
                            $objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($item, $row , '');
        
                        }
                        foreach (range(8,33) as $item){
                            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($item, $row)->getFill()->applyFromArray($backgroundOk);
        
                        }
                    }
                }
        
                $row+=2;
            }
        
        }

        



        return array("objPHPExcel" => $objPHPExcel , "row" => $row , "count" => $count);

    }

}
