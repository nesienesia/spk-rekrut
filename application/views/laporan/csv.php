include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';
			$csv = new PHPExcel();
			
			
			$csv->getProperties()->setCreator('FSCM')
						 ->setLastModifiedBy('FSCM')
						 ->setTitle("Permohonan Training")
						 ->setSubject("Training")
						 ->setDescription("Laporan Permohonan Training yang Terealisasi")
						 ->setKeywords("Permohonan Training");
						 
						 $index_pos = 0;
						 for($i = 0; $i < $index_pos; $i++){
							 $csv->getColumnDimensionByColumn(2+$i, 2)->setWidth(10);
						 }			 

			$csv->setActiveSheetIndex(0)->setCellValue('A1', "No Permohonan","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('B1', "NRP","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('C1', "Nama Karyawan","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('D1', "Department","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('E1', "Seksi","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('F1', "Golongan","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('G1', "Jabatan","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('H1', "Judul Training","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('I1', "Penyelenggara","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('J1', "Tempat","\n");
			$csv->setActiveSheetIndex(0)->setCellValue('K1', "Waktu","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('L1', "Biaya","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('M1', "Tujuan","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('N1', "Tanggal Permohonan","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('O1', "Mengetahui","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('P1', "Lembaga Penyelenggara","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('Q1', "Tanggal Training" ,"\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('R1', "Keterangan","\n"); 
			$csv->setActiveSheetIndex(0)->setCellValue('S1', "Penanggung Jawab","\n");
			
			
			$v_laporan = $this->Mcrud->get_data_laporan();
			$no = 1; 
			$numrow = 2; 
			foreach ($v_laporan->result() as $data){ 
			  $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->no_permohonan);
			  $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nrp);
			  $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nm_karyawan);
			  $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->dept);
			  $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->seksi);
			  $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->gol);
			  $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jab);
			  $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->judul_training);
			  $csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->penyelenggara);
			  $csv->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->tempat);
			  $csv->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->waktu);
			  $csv->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->biaya);
			  $csv->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->tujuan);
			  $csv->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->tgl_permohonan);
			  $csv->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->mengetahui);
			  $csv->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->lembaga_penyelenggara);
			  $csv->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->tgl_training);
			  $csv->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->keterangan);
			  $csv->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->penanggung_jawab);

			  $no++; 
			  $numrow++; 
			}
			

			$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
			$csv->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
			$csv->setActiveSheetIndex(0);
		
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Laporan Permohonan Training.csv"');
			header('Cache-Control: max-age=0');
			$write = new PHPExcel_Writer_CSV($csv);
			$write->save('php://output');