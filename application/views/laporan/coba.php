require_once dirname(__FILE__) . '/PHPExcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$sheet = $objPHPExcel->getActiveSheet();

$sheet->setCellValue('A1', 'No Permohonan');
$sheet->setCellValue('B1', 'NRP');
$sheet->setCellValue('C1', 'Nama Karyawan');
$sheet->setCellValue('D1', 'Department');
$sheet->setCellValue('E1', 'Seksi');
$sheet->setCellValue('F1', 'Golongan');
$sheet->setCellValue('G1', 'Jabatan');
$sheet->setCellValue('H1', 'Judul Training');
$sheet->setCellValue('I1', 'Penyelenggara');
$sheet->setCellValue('J1', 'Tempat');
$sheet->setCellValue('K1', 'Waktu');
$sheet->setCellValue('L1', 'Biaya');
$sheet->setCellValue('M1', 'Tujuan');
$sheet->setCellValue('N1', 'Tanggal Permohonan');
$sheet->setCellValue('O1', 'Mengetahui');
$sheet->setCellValue('P1', 'Lembaga Penyelenggara');
$sheet->setCellValue('Q1', 'Tanggal Training');
$sheet->setCellValue('R1', 'Keterangan');
$sheet->setCellValue('S1', 'Penanggung Jawab');

$index_pos = 0;
for($i = 0; $i < $index_pos; $i++){ 
    $sheet->getColumnDimensionByColumn(2+$i, 2)->setWidth(10);
    }

    $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('N1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('P1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('Q1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('R1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $sheet->getStyle('S1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    
    
    
    
    
    
    $rowcounter = 2;
    foreach($array_data_user as $k1=>$v1){
    $rowcounter++;
    list($uid, $uname) = explode("|", $k1);
    $sheet->setCellValue('A' . $rowcounter, $uid);
    $sheet->setCellValue('B' . $rowcounter, $uname);
    $starting_pos = ord('C');
    $index_pos = 0;
    foreach($array_distict_date as $date){
    $vdate = isset($v1[$date]) ? $v1[$date] : '-';
    $sheet->setCellValue(chr($starting_pos+$index_pos) . $rowcounter, $vdate);
    $index_pos++;
    }
    }


    $default_border = array(
    'style' => PHPExcel_Style_Border::BORDER_THIN,
    'color' => array('rgb'=>'1006A3')
    );
    $style_header = array(
    'borders' => array(
    'bottom' => $default_border,
    'left' => $default_border,
    'top' => $default_border,
    'right' => $default_border,
    ),
    'fill' => array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb'=>'E1E0F7'),
    ),
    'font' => array(
    'bold' => true,
    )
    );

    $style_body_content = array(
    'borders' => array(
    'bottom' => $default_border,
    'left' => $default_border,
    'top' => $default_border,
    'right' => $default_border,
    ),
    );

    $sheet->getStyle('A1:A2')->applyFromArray( $style_header );
    $sheet->getStyle('B1:B2')->applyFromArray( $style_header );
    $sheet->getStyle('C1:C2')->applyFromArray( $style_header );
    $sheet->getStyle('D1:D2')->applyFromArray( $style_header );
    $sheet->getStyle('E1:E2')->applyFromArray( $style_header );
    $sheet->getStyle('F1:F2')->applyFromArray( $style_header );
    $sheet->getStyle('G1:G2')->applyFromArray( $style_header );
    $sheet->getStyle('H1:H2')->applyFromArray( $style_header );
    $sheet->getStyle('I1:I2')->applyFromArray( $style_header );
    $sheet->getStyle('J1:J2')->applyFromArray( $style_header );
    $sheet->getStyle('K1:K2')->applyFromArray( $style_header );
    $sheet->getStyle('L1:L2')->applyFromArray( $style_header );
    $sheet->getStyle('M1:M2')->applyFromArray( $style_header );
    $sheet->getStyle('N1:N2')->applyFromArray( $style_header );
    $sheet->getStyle('O1:O2')->applyFromArray( $style_header );
    $sheet->getStyle('P1:P2')->applyFromArray( $style_header );
    $sheet->getStyle('Q1:Q2')->applyFromArray( $style_header );
    $sheet->getStyle('R1:R2')->applyFromArray( $style_header );
    $sheet->getStyle('S1:S2')->applyFromArray( $style_header );
    

        $rowcounter = 2;
        $starting_pos = ord('C');
        foreach($array_data_user as $k1=>$v1){
        $rowcounter++;
        list($uid, $uname) = explode("|", $k1);
        $sheet->setCellValue('A' . $rowcounter, $uid);
        $sheet->setCellValue('B' . $rowcounter, $uname);

        $sheet->getStyle('A' . $rowcounter)->applyFromArray( $style_body_content );
        $sheet->getStyle('B' . $rowcounter)->applyFromArray( $style_body_content );

        $index_pos = 0;
        foreach($array_distict_date as $date){
        $vdate = isset($v1[$date]) ? $v1[$date] : '-';
        $sheet->setCellValue(chr($starting_pos+$index_pos) . $rowcounter, $vdate);
        $sheet->getStyle(chr($starting_pos+$index_pos) . $rowcounter)->applyFromArray( $style_body_content );
        $index_pos++;
        }
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="coba.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');