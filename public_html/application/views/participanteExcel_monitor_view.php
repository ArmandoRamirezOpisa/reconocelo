<?php
    /*$data = [
        ["firstname" => "Mary", "lastname" => "Johnson", "age" => 25],
        ["firstname" => "Amanda", "lastname" => "Miller", "age" => 18],
        ["firstname" => "James", "lastname" => "Brown", "age" => 31],
        ["firstname" => "Patricia", "lastname" => "Williams", "age" => 7],
        ["firstname" => "Michael", "lastname" => "Davis", "age" => 43],
        ["firstname" => "Sarah", "lastname" => "Miller", "age" => 24],
        ["firstname" => "Patrick", "lastname" => "Miller", "age" => 27]
      ];

    function cleanData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    // filename for download
    $filename = "website_data_" . date('Ymd') . ".xls";

    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    foreach($data as $row) {
        if(!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }
        array_walk($row, __NAMESPACE__ . '\cleanData');
        echo implode("\t", array_values($row)) . "\r\n";
    }
  exit;*/

    /*

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

    */

    /*
    //Libreria para la clase de PHPExcel
    //require '../libraries/Classes/PHPExcel.php';
    require_once(APPPATH.'libraries/Classes/PHPExcel.php');

    //Objeto de PHPExcel
    $objPHPExcel  = new PHPExcel();

    //Propiedades de Documento
    $objPHPExcel->getProperties()->setCreator("Armando Ramirez")->setDescription("Reporte de Participantes");
    
    //Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("Productos");
    
    $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
    $objDrawing->setDescription('Logotipo');
    $objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
    
    $estiloTituloReporte = array(
        'font' => array(
        'name'      => 'Arial',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>13
        ),
        'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_NONE
        )
        ),
        'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    );

    $estiloTituloColumnas = array(
        'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'size' =>10,
        'color' => array(
        'rgb' => 'FFFFFF'
        )
        ),
        'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '538DD5')
        ),
        'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN
        )
        ),
        'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    );

    $estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
    ));
    
    $objPHPExcel->getActiveSheet()->getStyle('A1:E4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:E6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE PARTICIPANTES');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'COD-PARTICIPANTE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NOMBRE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'TELEFONO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(80);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'CORREO-ELECTRONICO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('E6', 'SALDO');

    $fila = 7;

    foreach ($participante as $row) {

        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row["codParticipante"]);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row["PrimerNombre"]);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row["Telefono"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row["eMail"]);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $row["SaldoActual"]);

        $fila++; //Sumamos 1 para pasar a la siguiente fila
        
    }

    $fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:E".$fila);
	
    $filaGrafica = $fila+2;
    
    // definir origen de los valores
    
    #$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Productos!$D$7:$D$'.$fila);
	
	// definir origen de los rotulos
	#$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Productos!$B$7:$B$'.$fila);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	//$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Participantes.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
    */

    // NOMBRE DEL ARCHIVO Y CHARSET
	/*header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename="Participantes.csv"');
    
    // SALIDA DEL ARCHIVO
    $salida=fopen('php://output', 'w');
    
    // ENCABEZADOS
    fputcsv($salida, array('Codigo participante', 'Nombre', 'Telefono', 'Correo Electronico', 'Saldo'));
    
    */

    /*while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($salida, array($filaR['id_alumno'], 
								$filaR['nombre'],
								$filaR['carrera'],
								$filaR['grupo'],
								$filaR['fecha_ingreso']));*/

    /*

    foreach ($participante as $row){
        fputcsv($salida, array($row["codParticipante"], 
                                $row["PrimerNombre"],
								$row["Telefono"],
								$row["eMail"],
								$row["SaldoActual"]));
    }

    //echo 'Excel realizado con exito';
    
    */

?>