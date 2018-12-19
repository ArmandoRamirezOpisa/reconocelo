<?php
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('Europe/London');

    if (PHP_SAPI == 'cli'){
        die('This example should only be run from a Web Browser');
    }

    require_once(APPPATH.'/libraries/Classes/PHPExcel.php');

    $objPHPExcel = new PHPExcel();

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("Developero")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");

    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(10);

    $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'COD-PARTICIPANTE')
    ->setCellValue('B1', 'NOMBRE')
    ->setCellValue('C1', 'TELEFONO')
    ->setCellValue('D1', 'CORREO-ELECTRONICO')
    ->setCellValue('E1', 'SALDO');

    $i = 2;

    foreach ($participante as $row){

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", $row["codParticipante"])
            ->setCellValue("B$i", $row["PrimerNombre"])
            ->setCellValue("C$i", $row["Telefono"])
            ->setCellValue("D$i", $row["eMail"])
            ->setCellValue("D$i", $row["SaldoActual"]);

        $i++;
    }

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

    $objPHPExcel->getActiveSheet()->setTitle('Informe de participantes');

    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="01simple.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
        
?>