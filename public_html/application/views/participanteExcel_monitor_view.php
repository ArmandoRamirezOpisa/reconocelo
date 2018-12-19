<?php
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
	header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename="Participantes.csv"');
    
    // SALIDA DEL ARCHIVO
    $salida=fopen('php://output', 'w');
    
    // ENCABEZADOS
    fputcsv($salida, array('Codigo participante', 'Nombre', 'Telefono', 'Correo Electronico', 'Saldo'));
    
    /*while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($salida, array($filaR['id_alumno'], 
								$filaR['nombre'],
								$filaR['carrera'],
								$filaR['grupo'],
								$filaR['fecha_ingreso']));*/

    foreach ($participante as $row){
        fputcsv($salida, array($row["codParticipante"], 
                                $row["PrimerNombre"],
								$row["Telefono"],
								$row["eMail"],
								$row["SaldoActual"]));
    }

    //echo 'Excel realizado con exito';

?>