<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

	public function index()
	{
		//var_dump($this->session->userdata());
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['users']  			  = $this->Mcrud->get_data('tbl_user');
			$data['karyawan']  		= $this->Mcrud->get_data('tbl_karyawan');
		
			$data['v_permintaan']   = $this->Mcrud->get_data('tbl_permintaan');
			$data['v_realisasiptk']		= $this->Mcrud->get_data_realisasiptk('');
		
			$data['v_penilaian']	= $this->Mcrud->get_data('tbl_penilaian');
			
			$this->load->view('header', $data);
			$this->load->view('beranda', $data);
			$this->load->view('footer');
		}
	}

	
	public function login()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (isset($ceks)) {
			redirect('');
		} else {
			$this->load->view('web/header');
			$this->load->view('web/login');
			$this->load->view('web/footer');

			if (isset($_POST['btnlogin'])) {
				$username = htmlentities(strip_tags($_POST['username']));
				$pass	   = htmlentities(strip_tags(md5($_POST['password'])));
				$query  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $username);
				$cek    = $query->row();
				$cekun  = $cek->username;
				$sess_data = $cek;
				$jumlah = $query->num_rows();
				if ($jumlah == 0) {
					$this->session->set_flashdata(
						'msg',
						'
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Maaf "' . $username . '"</strong>tidak memiliki hak akses.
									 </div>'
					);
					redirect('web/login');
				} else {
					$row = $query->row();
					$cekpass = $row->password;
					if ($cekpass <> $pass) {
						$this->session->set_flashdata(
							'msg',
							'<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times; &nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
						);
						redirect('web/login');
					} else {
						$this->session->set_userdata('kamar@2017', $cekun);
						$this->session->set_userdata('login_data', $sess_data);
						redirect('web');
					}
				}
			}
		}
	}


	public function logout()
	{
		if ($this->session->has_userdata('kamar@2017')) {
			$this->session->sess_destroy();
			redirect('');
		}
		redirect('');
	}

	function error_not_found()
	{
		$this->load->view('404_content');
	}

	public function test_prof()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where("username !='" . $this->session->userdata('kamar@2017') . "'");
		echo json_encode($this->db->get()->result());
	}

	public function profile()
	{

		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);

			$this->load->view('header', $data);
			$this->load->view('profile', $data);
			$this->load->view('footer');

			if (isset($_POST['btnupdate'])) {
				$username 	= htmlentities(strip_tags($this->input->post('username')));
				$password 	= htmlentities(strip_tags($this->input->post('password')));

				$cek_data = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $username);
				if ($cek_data->num_rows() == 0) {
					$status = "update";
				} else {
					if ($username == $ceks) {
						$status = "update";
					} else {
						$status = "";
					}
				}

				if ($status == "update") {
					$data = array(
						'username'	=> $username,
						'password'	=> md5($password)
					);
					$this->Mcrud->update_data('tbl_user', array('username' => $ceks), $data);
					$this->session->has_userdata('kamar@2017');
					$this->session->set_userdata('kamar@2017', "$username");
					$this->session->set_flashdata(
						'msg',
						'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
					);
				} else {
					$this->session->set_flashdata(
						'msg',
						'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Username ' . $username . ' sudah ada.
									</div>'
					);
				}

				redirect('web/profile');
			}
		}
	}



	public function karyawan()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_karyawan']   = $this->Mcrud->get_data('tbl_karyawan');
			$data['v_dept']   = $this->Mcrud->get_data('tbl_department');

			$this->load->view('header', $data);
			$this->load->view('dephead/karyawan', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$nrp 			= htmlentities(strip_tags($_POST['nrp']));
				$nm_karyawan 	= htmlentities(strip_tags($_POST['nm_karyawan']));
				$dept 			= htmlentities(strip_tags($_POST['dept']));
				$seksi 			= htmlentities(strip_tags($_POST['seksi']));
				$gol 			= htmlentities(strip_tags($_POST['gol']));
				$subgol 		= htmlentities(strip_tags($_POST['subgol']));
				$jab 			= htmlentities(strip_tags($_POST['jab']));
				$pendidikan 	= htmlentities(strip_tags($_POST['pendidikan']));
				$pengalaman 	= htmlentities(strip_tags($_POST['pengalaman']));
				$status 		= htmlentities(strip_tags($_POST['status']));
				$usia			= htmlentities(strip_tags($_POST['usia']));
				$jk 			= htmlentities(strip_tags($_POST['jk']));
				

				$cek_kd = $this->Mcrud->get_data_by_pk('tbl_karyawan', 'nrp', $nrp);
				if ($cek_kd->num_rows() == 0) {
					$status = "simpan";
				} else {
					$status = "";
				}

				if ($status == "simpan") {
					$data = array(
						'nrp'			=> $nrp,
						'nm_karyawan'	=> $nm_karyawan,
						'dept'			=> $dept,
						'seksi'			=> $seksi,
						'gol'			=> $gol,
						'subgol'		=> $subgol,
						'jab'			=> $jab,
						'pendidikan'	=> $pendidikan,
						'pengalaman'	=> $pengalaman,
						'status'		=> $status,
						'usia'			=> $usia,
						'jk'			=> $jk
					);
					$this->Mcrud->save_data('tbl_karyawan', $data);

					$this->session->set_flashdata(
						'msg',
						'
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> karyawan berhasil ditambahkan.
										 </div>'
					);
				} else {
					$this->session->set_flashdata(
						'msg',
						'
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> NRP ' . strtoupper($nrp) . ' sudah ada.
										 </div>'
					);
				}

				redirect('web/karyawan');
			}
		}
	}

	public function karyawan_edit($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_karyawan']   = $this->Mcrud->get_data_by_pk('tbl_karyawan', 'nrp', $id);
			$data['v_dept']   = $this->Mcrud->get_data('tbl_department');

			if ($data['v_karyawan']->num_rows() == 0) {
				redirect('web/karyawan');
			} else {
				$data['v_karyawan'] = $data['v_karyawan']->row();
			}

			$this->load->view('header', $data);
			$this->load->view('dephead/karyawan_edit', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$nrp 			= htmlentities(strip_tags($_POST['nrp']));
				$nm_karyawan 	= htmlentities(strip_tags($_POST['nm_karyawan']));
				$dept 			= htmlentities(strip_tags($_POST['dept']));
				$seksi 			= htmlentities(strip_tags($_POST['seksi']));
				$gol 			= htmlentities(strip_tags($_POST['gol']));
				$subgol 		= htmlentities(strip_tags($_POST['subgol']));
				$jab 			= htmlentities(strip_tags($_POST['jab']));
				$pendidikan 	= htmlentities(strip_tags($_POST['pendidikan']));
				$pengalaman 	= htmlentities(strip_tags($_POST['pengalaman']));
				$status 		= htmlentities(strip_tags($_POST['status']));
				$usia			= htmlentities(strip_tags($_POST['usia']));
				$jk 			= htmlentities(strip_tags($_POST['jk']));

				$data = array(
					'nrp'			=> $nrp,
						'nm_karyawan'	=> $nm_karyawan,
						'dept'			=> $dept,
						'seksi'			=> $seksi,
						'gol'			=> $gol,
						'subgol'		=> $subgol,
						'jab'			=> $jab,
						'pendidikan'	=> $pendidikan,
						'pengalaman'	=> $pengalaman,
						'status'		=> $status,
						'usia'			=> $usia,
						'jk'			=> $jk
				);
				$this->Mcrud->update_data('tbl_karyawan', array('nrp' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> karyawan berhasil diubah.
									 </div>'
				);
				redirect('web/karyawan');
			}
		}
	}

	public function karyawan_hapus($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$this->Mcrud->delete_data_by_pk('tbl_karyawan', 'nrp', $id);

			$this->session->set_flashdata(
				'msg',
				'
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> karyawan berhasil dihapus.
						 </div>'
			);
			redirect('web/karyawan');
		}
	}

	

	// ini permintaan_tk
	public function permintaan_tk()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$dept = $this->session->userdata('login_data')->dept;
			$data['v_permintaan'] = $this->Mcrud->get_data_permintaan($dept);
			$data['v_dept']   = $this->Mcrud->get_data('tbl_department');
			$this->load->view('header', $data);
			$this->load->view('dephead/permintaan_tk', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$divisi 			= htmlentities(strip_tags($_POST['divisi']));
				$department 		= htmlentities(strip_tags($_POST['department']));
				$seksi 				= htmlentities(strip_tags($_POST['seksi']));
				$jabatan			= htmlentities(strip_tags($_POST['jabatan']));
				$golongan 			= htmlentities(strip_tags($_POST['golongan']));
				$jumlah 			= htmlentities(strip_tags($_POST['jumlah']));
				$sumber_tenaga 		= htmlentities(strip_tags($_POST['sumber_tenaga']));
				$due_date			= htmlentities(strip_tags($_POST['due_date']));
				$tujuan 			= htmlentities(strip_tags($_POST['tujuan']));
				$an					= htmlentities(strip_tags($_POST['an']));
				$alasan				= htmlentities(strip_tags($_POST['alasan']));
				$pendidikan 		= htmlentities(strip_tags($_POST['pendidikan']));
				$jurusan 			= htmlentities(strip_tags($_POST['jurusan']));
				$pengalaman 		= htmlentities(strip_tags($_POST['pengalaman']));
				$lama_pengalaman 	= htmlentities(strip_tags($_POST['lama_pengalaman']));
				$bidang_pengalaman 	= htmlentities(strip_tags($_POST['bidang_pengalaman']));
				$status 			= htmlentities(strip_tags($_POST['status']));
				$status_kontrak		= htmlentities(strip_tags($_POST['status_kontrak']));
				$batas_usia			= htmlentities(strip_tags($_POST['batas_usia']));
				$jk 				= htmlentities(strip_tags($_POST['jk']));
				$skill				= htmlentities(strip_tags($_POST['skill']));
				$nrp_pemohon_ptk	= htmlentities(strip_tags($_POST['nrp_pemohon_ptk']));
				$pemohon_ptk		= htmlentities(strip_tags($_POST['pemohon_ptk']));
				$dept_pemohon_ptk	= htmlentities(strip_tags($_POST['dept_pemohon_ptk']));
				$kota				= htmlentities(strip_tags($_POST['kota']));
				$tgl_permintaan		= htmlentities(strip_tags($_POST['tgl_permintaan']));

				$data = array(
					'divisi'			=> $divisi,
					'department'		=> $department,
					'seksi'				=> $seksi,
					'jabatan'			=> $jabatan,
					'golongan'			=> $golongan,
					'jumlah'			=> $jumlah,
					'sumber_tenaga'		=> $sumber_tenaga,
					'due_date'			=> $due_date,
					'tujuan'			=> $tujuan,
					'an'				=> $an,
					'alasan'			=> $alasan,
					'pendidikan'		=> $pendidikan,
					'jurusan'			=> $jurusan,
					'pengalaman '		=> $pengalaman,
					'lama_pengalaman'	=> $lama_pengalaman,
					'bidang_pengalaman'	=> $bidang_pengalaman,
					'status'			=> $status,
					'status_kontrak	 '	=> $status_kontrak,
					'batas_usia'		=> $batas_usia,
					'jk'				=> $jk,
					'skill'				=> $skill,
					'nrp_pemohon_ptk'	=> $nrp_pemohon_ptk,
					'pemohon_ptk'		=> $pemohon_ptk,
					'dept_pemohon_ptk'	=> $dept_pemohon_ptk,
					'kota'				=> $kota,
					'tgl_permintaan'	=> $tgl_permintaan
				);
				$this->Mcrud->save_data('tbl_permintaan', $data);

				$this->session->set_flashdata(
					'msg',
					'
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Permintaan Tenaga Kerja berhasil ditambahkan.
									 </div>'
				);

				redirect('web/permintaan_tk');
			}
		}
	}


	public function permintaan_tk_edit($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_permintaan']    = $this->Mcrud->get_data_by_pk('tbl_permintaan', 'id_permintaan', $id);
			$data['v_dept']   = $this->Mcrud->get_data('tbl_department');


			if ($data['v_permintaan']->num_rows() == 0) {
				redirect('web/permintaan_tk');
			} else {
				$data['v_permintaan'] = $data['v_permintaan']->row();
			}
			$this->load->view('header', $data);
			$this->load->view('dephead/permintaan_tk_edit', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$divisi 			= htmlentities(strip_tags($_POST['divisi']));
				$department 		= htmlentities(strip_tags($_POST['department']));
				$seksi 				= htmlentities(strip_tags($_POST['seksi']));
				$jabatan			= htmlentities(strip_tags($_POST['jabatan']));
				$golongan 			= htmlentities(strip_tags($_POST['golongan']));
				$jumlah 			= htmlentities(strip_tags($_POST['jumlah']));
				$sumber_tenaga 		= htmlentities(strip_tags($_POST['sumber_tenaga']));
				$due_date			= htmlentities(strip_tags($_POST['due_date']));
				$tujuan 			= htmlentities(strip_tags($_POST['tujuan']));
				$an					= htmlentities(strip_tags($_POST['an']));
				$alasan				= htmlentities(strip_tags($_POST['alasan']));
				$pendidikan 		= htmlentities(strip_tags($_POST['pendidikan']));
				$jurusan 			= htmlentities(strip_tags($_POST['jurusan']));
				$pengalaman 		= htmlentities(strip_tags($_POST['pengalaman']));
				$lama_pengalaman 	= htmlentities(strip_tags($_POST['lama_pengalaman']));
				$bidang_pengalaman 	= htmlentities(strip_tags($_POST['bidang_pengalaman']));
				$status 			= htmlentities(strip_tags($_POST['status']));
				$status_kontrak		= htmlentities(strip_tags($_POST['status_kontrak']));
				$batas_usia			= htmlentities(strip_tags($_POST['batas_usia']));
				$jk 				= htmlentities(strip_tags($_POST['jk']));
				$skill				= htmlentities(strip_tags($_POST['skill']));
				$nrp_pemohon_ptk	= htmlentities(strip_tags($_POST['nrp_pemohon_ptk']));
				$pemohon_ptk		= htmlentities(strip_tags($_POST['pemohon_ptk']));
				$dept_pemohon_ptk	= htmlentities(strip_tags($_POST['dept_pemohon_ptk']));
				$kota				= htmlentities(strip_tags($_POST['kota']));
				$tgl_permintaan		= htmlentities(strip_tags($_POST['tgl_permintaan']));

				$data = array(
					'divisi'			=> $divisi,
					'department'		=> $department,
					'seksi'				=> $seksi,
					'jabatan'			=> $jabatan,
					'golongan'			=> $golongan,
					'jumlah'			=> $jumlah,
					'sumber_tenaga'		=> $sumber_tenaga,
					'due_date'			=> $due_date,
					'tujuan'			=> $tujuan,
					'an'				=> $an,
					'alasan'			=> $alasan,
					'pendidikan'		=> $pendidikan,
					'jurusan'			=> $jurusan,
					'pengalaman '		=> $pengalaman,
					'lama_pengalaman'	=> $lama_pengalaman,
					'bidang_pengalaman'	=> $bidang_pengalaman,
					'status'			=> $status,
					'status_kontrak	 '	=> $status_kontrak,
					'batas_usia'		=> $batas_usia,
					'jk'				=> $jk,
					'skill'				=> $skill,
					'nrp_pemohon_ptk'	=> $nrp_pemohon_ptk,
					'pemohon_ptk'		=> $pemohon_ptk,
					'dept_pemohon_ptk'	=> $dept_pemohon_ptk,
					'kota'				=> $kota,
					'tgl_permintaan'	=> $tgl_permintaan
				);
				$this->Mcrud->update_data('tbl_permintaan', array('id_permintaan' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
								 <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times; &nbsp;</span>
										</button>
										<strong>Sukses!</strong> Permintaan Tenaga Kerja berhasil diubah.
								 </div>'
				);
				redirect('web/permintaan_tk');
			}
		}
	}

	public function permintaan_tk_hapus($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$this->Mcrud->delete_data_by_pk('tbl_permintaan', 'id_permintaan', $id);

			$this->session->set_flashdata(
				'msg',
				'
					 <div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Permintaan Tenaga Kerja berhasil dihapus.
					 </div>'
			);
			redirect('web/permintaan_tk');
		}
	}

	//ini laporanpermintaan
	public function laporanpermintaan()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user'] 		= $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$dept = $this->session->userdata('login_data')->dept;
			$data['v_laporanpermintaan'] = $this->Mcrud->get_data_permintaann();
			$this->load->view('header', $data);
			$this->load->view('laporan/laporanpermintaan', $data);
			$this->load->view('footer');
		}
	}

	public function laporanpermintaan_pdf($id = '')
	{

		$data['v_laporanpermintaan']   = $this->Mcrud->get_data_by_pk_permintaan('tbl_permintaan.id_permintaan', $id);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-permintaan_tk.pdf";
		$this->pdf->load_view('laporan/laporanpermintaan_pdf', $data);
	}

	//ctr+a - format - autofit column width
	public function permintaan_tk_csv()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			include APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
			$objPHPExcel = new PHPExcel();
			$sheet = $objPHPExcel->getActiveSheet();
			$index_pos = 0;
			for ($i = 1; $i < $index_pos; $i++) {
				$sheet->getColumnDimensionByColumn(2 + $i, 2)->setWidth(10);
			}


			$sheet->setCellValue('A1', 'No Permintaan');
			$sheet->setCellValue('B1', 'Divisi');
			$sheet->setCellValue('C1', 'Jumlah');
			$sheet->setCellValue('D1', 'Sumber Tenaga');
			$sheet->setCellValue('E1', 'Due Date');
			$sheet->setCellValue('F1', 'Tujuan');
			$sheet->setCellValue('G1', 'Atas Nama Penggantian');
			$sheet->setCellValue('H1', 'Alasan Penambahan');
			$sheet->setCellValue('I1', 'Pendidikan');
			$sheet->setCellValue('J1', 'Pengalaman');
			$sheet->setCellValue('K1', 'Lama Pengalaman');
			$sheet->setCellValue('L1', 'Bidang Pengalaman');
			$sheet->setCellValue('M1', 'Status');
			$sheet->setCellValue('N1', 'Lama Kontrak');
			$sheet->setCellValue('O1', 'Jenis Kelamin');
			$sheet->setCellValue('P1', 'Batas Usia');
			$sheet->setCellValue('Q1', 'Skill');
			$sheet->setCellValue('R1', 'Bertanggung Jawab');
			$sheet->setCellValue('S1', 'Bawahan');
			$sheet->setCellValue('T1', 'Jumlah Bawahan');
			$sheet->setCellValue('U1', 'Tugas Pokok');
			$sheet->setCellValue('V1', 'Persetujuan');
			$sheet->setCellValue('W1', 'Keterangan Persetujuan');
			$sheet->setCellValue('X1', 'PIC Persetujuan');
			$sheet->setCellValue('Y1', 'Kota');
			$sheet->setCellValue('Z1', 'Tanggal Permintaan');




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
			$sheet->getStyle('T1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$sheet->getStyle('U1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$sheet->getStyle('V1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$sheet->getStyle('W1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$sheet->getStyle('X1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$sheet->getStyle('Y1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$sheet->getStyle('Z1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
		
			$default_border = array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('rgb' => '1006A3')
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
					'color' => array('rgb' => 'E1E0F7'),
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

			$sheet->getStyle('A1')->applyFromArray($style_header);
			$sheet->getStyle('B1')->applyFromArray($style_header);
			$sheet->getStyle('C1')->applyFromArray($style_header);
			$sheet->getStyle('D1')->applyFromArray($style_header);
			$sheet->getStyle('E1')->applyFromArray($style_header);
			$sheet->getStyle('F1')->applyFromArray($style_header);
			$sheet->getStyle('G1')->applyFromArray($style_header);
			$sheet->getStyle('H1')->applyFromArray($style_header);
			$sheet->getStyle('I1')->applyFromArray($style_header);
			$sheet->getStyle('J1')->applyFromArray($style_header);
			$sheet->getStyle('K1')->applyFromArray($style_header);
			$sheet->getStyle('L1')->applyFromArray($style_header);
			$sheet->getStyle('M1')->applyFromArray($style_header);
			$sheet->getStyle('N1')->applyFromArray($style_header);
			$sheet->getStyle('O1')->applyFromArray($style_header);
			$sheet->getStyle('P1')->applyFromArray($style_header);
			$sheet->getStyle('Q1')->applyFromArray($style_header);
			$sheet->getStyle('R1')->applyFromArray($style_header);
			$sheet->getStyle('S1')->applyFromArray($style_header);
			$sheet->getStyle('T1')->applyFromArray($style_header);
			$sheet->getStyle('U1')->applyFromArray($style_header);
			$sheet->getStyle('V1')->applyFromArray($style_header);
			$sheet->getStyle('W1')->applyFromArray($style_header);
			$sheet->getStyle('X1')->applyFromArray($style_header);
			$sheet->getStyle('Y1')->applyFromArray($style_header);
			$sheet->getStyle('Z1')->applyFromArray($style_header);


			$v_laporanpermintaan = $this->Mcrud->get_data_permintaan();
			$no = 1;
			$numrow = 2;
			foreach ($v_laporanpermintaan->result() as $data) {


				$sheet->setCellValue('A' . $numrow, $data->id_permintaan);
				$sheet->setCellValue('B' . $numrow, $data->divisi);
				$sheet->setCellValue('C' . $numrow, $data->jumlah);
				$sheet->setCellValue('D' . $numrow, $data->sumber_tenaga);
				$sheet->setCellValue('E' . $numrow, $data->due_date);
				$sheet->setCellValue('F' . $numrow, $data->tujuan);
				$sheet->setCellValue('G' . $numrow, $data->an);
				$sheet->setCellValue('H' . $numrow, $data->alasan);
				$sheet->setCellValue('I' . $numrow, $data->pendidikan);
				$sheet->setCellValue('J' . $numrow, $data->pengalaman);
				$sheet->setCellValue('K' . $numrow, $data->lama_pengalaman);
				$sheet->setCellValue('L' . $numrow, $data->bidang_pengalaman);
				$sheet->setCellValue('M' . $numrow, $data->status);
				$sheet->setCellValue('N' . $numrow, $data->status_kontrak);
				$sheet->setCellValue('O' . $numrow, $data->jk);
				$sheet->setCellValue('P' . $numrow, $data->batas_usia);
				$sheet->setCellValue('Q' . $numrow, $data->skill);
				$sheet->setCellValue('R' . $numrow, $data->bertanggungjawab);
				$sheet->setCellValue('S' . $numrow, $data->bawahan);
				$sheet->setCellValue('T' . $numrow, $data->jml_bawahan);
				$sheet->setCellValue('U' . $numrow, $data->tgs_pokok);
				$sheet->setCellValue('V' . $numrow, $data->persetujuan_ptk);
				$sheet->setCellValue('W' . $numrow, $data->pic_ptk);
				$sheet->setCellValue('X' . $numrow, $data->ket_stj_ptk);
				$sheet->setCellValue('Y' . $numrow, $data->kota);
				$sheet->setCellValue('Z' . $numrow, $data->tgl_permintaan);


				$sheet->getStyle('A' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('B' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('C' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('D' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('E' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('F' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('G' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('H' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('I' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('J' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('K' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('L' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('M' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('N' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('O' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('P' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('Q' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('R' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('S' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('T' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('U' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('V' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('W' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('X' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('Y' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('Z' .  $numrow)->applyFromArray($style_body_content);

				$no++;
				$numrow++;
			}


			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Laporan_Permintaan_Tenaga_Kerja.xls"');
			header('Cache-Control: max-age=0');

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
		}
	}


	
	// ini penilaian
	public function penilaian()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			//$data['v_penilaian']  		= $this->Mcrud->get_data_penilaian();
			$dept = $this->session->userdata('login_data')->dept;
			$data['v_penilaian'] = $this->Mcrud->get_data_penilaian($dept);
			$data['v_dept']   = $this->Mcrud->get_data('tbl_department');


			$this->load->view('header', $data);
			$this->load->view('dephead/penilaian', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {

				$nrp			= htmlentities(strip_tags($_POST['nrp']));
				$kualitas		= htmlentities(strip_tags($_POST['kualitas']));
				$kuantitas	= htmlentities(strip_tags($_POST['kuantitas']));
				$kerjasama		= htmlentities(strip_tags($_POST['kerjasama']));
				$kepemimpinan		= htmlentities(strip_tags($_POST['kepemimpinan']));
				$kemandirian		= htmlentities(strip_tags($_POST['kemandirian']));
				$qcc	= htmlentities(strip_tags($_POST['qcc']));
				$sumbang_saran		= htmlentities(strip_tags($_POST['sumbang_saran']));
				$tanggung_jawab		= htmlentities(strip_tags($_POST['tanggung_jawab']));
				$absensi		= htmlentities(strip_tags($_POST['absensi']));
				$waktu_kerja	= htmlentities(strip_tags($_POST['waktu_kerja']));
				$pelaksanaan_peraturan		= htmlentities(strip_tags($_POST['pelaksanaan_peraturan']));
				$kehadiran		= htmlentities(strip_tags($_POST['kehadiran']));
				$score		= (0.12 * $kualitas) + (0.11 * $kuantitas) + 
				(0.12 * $kerjasama) + (0.11 * $kepemimpinan) + (0.06 * $kemandirian) 
				+ (0.08 * $qcc) + (0.08 * $sumbang_saran) + 
				(0.08 * $tanggung_jawab)  +
				 (0.10 * $absensi) + (0.05 * $waktu_kerja) + (0.05 * $pelaksanaan_peraturan) + (0.05 * $kehadiran);
				if ($score >= 80) {
					$rekomendasi = "Baik Sekali";
				} elseif ($score >= 70) {
					$rekomendasi = "Baik";
				} elseif ($score >= 60) {
					$rekomendasi = "Cukup";
				} elseif ($score >= 50) {
					$rekomendasi = "Kurang";
				} else {
					$rekomendasi = "Kurang Sekali";
				}
				$pj_dephead		= htmlentities(strip_tags($_POST['pj_dephead']));
				$dept		= htmlentities(strip_tags($_POST['dept']));
				$tgl_pengisian		= htmlentities(strip_tags($_POST['tgl_pengisian']));
				$catatan		= htmlentities(strip_tags($_POST['catatan']));

				$data = array(
					'nrp'		=> $nrp,
					'kualitas'		=> $kualitas,
					'kuantitas'			=> $kuantitas,
					'kerjasama'		=> $kerjasama,
					'kepemimpinan'		=> $kepemimpinan,
					'kemandirian'		=> $kemandirian,
					'qcc'			=> $qcc,
					'sumbang_saran'		=> $sumbang_saran,
					'tanggung_jawab'		=> $tanggung_jawab,
					'absensi'		=> $absensi,
					'waktu_kerja'			=> $waktu_kerja,
					'pelaksanaan_peraturan'		=> $pelaksanaan_peraturan,
					'kehadiran'		=> $kehadiran,
					'score'		=> $score,
					'rekomendasi'		=> $rekomendasi,
					'pj_dephead'		=> $pj_dephead,
					'dept'		=> $dept,
					'tgl_pengisian'		=> $tgl_pengisian,
					'catatan'		=> $catatan


				);
				$this->Mcrud->save_data('tbl_penilaian', $data);

				$this->session->set_flashdata(
					'msg',
					'
								 <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times; &nbsp;</span>
										</button>
										<strong>Sukses!</strong> penilaian Training berhasil ditambahkan.
								 </div>'
				);

				redirect('web/penilaian');
			}
		}
	}


	public function penilaian_edit($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_penilaian']    = $this->Mcrud->get_data_by_pk('tbl_penilaian', 'id_penilaian', $id);
			$data['v_realisasi']		= $this->Mcrud->get_data_realisasi('');
			$data['v_dept']   = $this->Mcrud->get_data('tbl_department');

			if ($data['v_penilaian']->num_rows() == 0) {
				redirect('web/penilaian');
			} else {
				$data['v_penilaian'] = $data['v_penilaian']->row();
			}
			$this->load->view('header', $data);
			$this->load->view('dephead/penilaian_edit', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {

				$nrp			= htmlentities(strip_tags($_POST['nrp']));
				$kualitas		= htmlentities(strip_tags($_POST['kualitas']));
				$kuantitas	= htmlentities(strip_tags($_POST['kuantitas']));
				$kerjasama		= htmlentities(strip_tags($_POST['kerjasama']));
				$kepemimpinan		= htmlentities(strip_tags($_POST['kepemimpinan']));
				$kemandirian		= htmlentities(strip_tags($_POST['kemandirian']));
				$qcc	= htmlentities(strip_tags($_POST['qcc']));
				$sumbang_saran		= htmlentities(strip_tags($_POST['sumbang_saran']));
				$tanggung_jawab		= htmlentities(strip_tags($_POST['tanggung_jawab']));
				$absensi		= htmlentities(strip_tags($_POST['absensi']));
				$waktu_kerja	= htmlentities(strip_tags($_POST['waktu_kerja']));
				$pelaksanaan_peraturan		= htmlentities(strip_tags($_POST['pelaksanaan_peraturan']));
				$kehadiran		= htmlentities(strip_tags($_POST['kehadiran']));
				$score		= ((0.12 * $kualitas) + (0.11 * $kuantitas)) + ((0.12 * $kerjasama) + (0.11 * $kepemimpinan)) + ((0.6 * $kemandirian) 
				+ (0.8 * $qcc) + (0.8 * $sumbang_saran)) + (0.8 * $tanggung_jawab)+ ((0.10 * $absensi) 
				+ (0.5 * $waktu_kerja) + (0.5 * $pelaksanaan_peraturan) + (0.5 * $kehadiran));
				if ($score >= 80) {
					$rekomendasi = "Baik Sekali";
				} elseif ($score >= 70) {
					$rekomendasi = "Baik";
				} elseif ($score >= 60) {
					$rekomendasi = "Cukup";
				} elseif ($score >= 50) {
					$rekomendasi = "Kurang";
				} else {
					$rekomendasi = "Kurang Sekali";
				}
				$pj_dephead		= htmlentities(strip_tags($_POST['pj_dephead']));
				$dept		= htmlentities(strip_tags($_POST['dept']));
				$tgl_pengisian		= htmlentities(strip_tags($_POST['tgl_pengisian']));
				$catatan		= htmlentities(strip_tags($_POST['catatan']));

				$data = array(
					'nrp'		=> $nrp,
					'kualitas'		=> $kualitas,
					'kuantitas'			=> $kuantitas,
					'kerjasama'		=> $kerjasama,
					'kepemimpinan'		=> $kepemimpinan,
					'kemandirian'		=> $kemandirian,
					'qcc'			=> $qcc,
					'sumbang_saran'		=> $sumbang_saran,
					'tanggung_jawab'		=> $tanggung_jawab,
					'absensi'		=> $absensi,
					'waktu_kerja'			=> $waktu_kerja,
					'pelaksanaan_peraturan'		=> $pelaksanaan_peraturan,
					'kehadiran'		=> $kehadiran,
					'score'		=> $score,
					'rekomendasi'		=> $rekomendasi,
					'pj_dephead'		=> $pj_dephead,
					'dept'		=> $dept,
					'tgl_pengisian'		=> $tgl_pengisian,
					'catatan'		=> $catatan

				);
				$this->Mcrud->update_data('tbl_penilaian', array('id_penilaian' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
							 <div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> penilaian Training berhasil diubah.
							 </div>'
				);
				redirect('web/penilaian');
			}
		}
	}

	public function penilaian_hapus($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$this->Mcrud->delete_data_by_pk('tbl_penilaian', 'id_penilaian', $id);

			$this->session->set_flashdata(
				'msg',
				'
				 <div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times; &nbsp;</span>
						</button>
						<strong>Sukses!</strong> penilaian Training berhasil dihapus.
				 </div>'
			);
			redirect('web/penilaian');
		}
	}

	
	//ini laporan penilaian
	public function laporanpenilaian()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user'] 		= $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$dept = $this->session->userdata('login_data')->dept;
			$data['v_laporanpenilaian'] = $this->Mcrud->get_data_penilaian($dept);
			$this->load->view('header', $data);
			$this->load->view('laporan/laporanpenilaian', $data);
			$this->load->view('footer');
		}
	}

	public function laporanpenilaian_pdf($id = '')
	{

		$data['v_laporanpenilaian']   = $this->Mcrud->get_data_by_pk_penilaian('tbl_penilaian.id_penilaian', $id);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-penilaian.pdf";
		$this->pdf->load_view('laporan/laporanpenilaian_pdf', $data);
	}

	//ctr+a - format - autofit column width
	public function penilaian_csv()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			include APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
			$objPHPExcel = new PHPExcel();
			$sheet = $objPHPExcel->getActiveSheet();
			$index_pos = 0;
			for ($i = 1; $i < $index_pos; $i++) {
				$sheet->getColumnDimensionByColumn(2 + $i, 2)->setWidth(10);
			}


			$sheet->setCellValue('A1', 'No penilaian');
			$sheet->setCellValue('B1', 'NRP');
			$sheet->setCellValue('C1', 'Nama Karyawan');
			$sheet->setCellValue('D1', 'Department');
			$sheet->setCellValue('E1', 'Seksi');
			$sheet->setCellValue('F1', 'Judul Training');
			$sheet->setCellValue('G1', 'Penyelenggara');
			$sheet->setCellValue('H1', 'Tanggal Training');
			$sheet->setCellValue('I1', 'Aspek Perlaku');
			$sheet->setCellValue('J1', 'Aspek A');
			$sheet->setCellValue('K1', 'Aspek B');
			$sheet->setCellValue('L1', 'Aspek C');
			$sheet->setCellValue('M1', 'Penanggung Jawab Department');
			$sheet->setCellValue('N1', 'Tanggal Pengisian');
			$sheet->setCellValue('O1', 'Score');
			$sheet->setCellValue('P1', 'Rekomendasi');
			$sheet->setCellValue('Q1', 'Penanggung Jawab HRD');
			$sheet->setCellValue('R1', 'Tanggal penilaian');





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

			$default_border = array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('rgb' => '1006A3')
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
					'color' => array('rgb' => 'E1E0F7'),
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

			$sheet->getStyle('A1')->applyFromArray($style_header);
			$sheet->getStyle('B1')->applyFromArray($style_header);
			$sheet->getStyle('C1')->applyFromArray($style_header);
			$sheet->getStyle('D1')->applyFromArray($style_header);
			$sheet->getStyle('E1')->applyFromArray($style_header);
			$sheet->getStyle('F1')->applyFromArray($style_header);
			$sheet->getStyle('G1')->applyFromArray($style_header);
			$sheet->getStyle('H1')->applyFromArray($style_header);
			$sheet->getStyle('I1')->applyFromArray($style_header);
			$sheet->getStyle('J1')->applyFromArray($style_header);
			$sheet->getStyle('K1')->applyFromArray($style_header);
			$sheet->getStyle('L1')->applyFromArray($style_header);
			$sheet->getStyle('M1')->applyFromArray($style_header);
			$sheet->getStyle('N1')->applyFromArray($style_header);
			$sheet->getStyle('O1')->applyFromArray($style_header);
			$sheet->getStyle('P1')->applyFromArray($style_header);
			$sheet->getStyle('Q1')->applyFromArray($style_header);
			$sheet->getStyle('R1')->applyFromArray($style_header);


			$v_laporanpenilaian = $this->Mcrud->get_data_penilaian();
			$no = 1;
			$numrow = 2;
			foreach ($v_laporanpenilaian->result() as $data) {


				$sheet->setCellValue('A' . $numrow, $data->id_penilaian);
				$sheet->setCellValue('B' . $numrow, $data->nm_karyawan);
				$sheet->setCellValue('C' . $numrow, $data->dept);
				$sheet->setCellValue('D' . $numrow, $data->seksi);
				$sheet->setCellValue('E' . $numrow, $data->judul_training);
				$sheet->setCellValue('F' . $numrow, $data->lembaga_penyelenggara);
				$sheet->setCellValue('G' . $numrow, $data->nrp);
				$sheet->setCellValue('H' . $numrow, $data->tgl_training);
				$sheet->setCellValue('I' . $numrow, $data->aspek_perilaku);
				$sheet->setCellValue('J' . $numrow, $data->aspek_a);
				$sheet->setCellValue('K' . $numrow, $data->aspek_b);
				$sheet->setCellValue('L' . $numrow, $data->aspek_c);
				$sheet->setCellValue('M' . $numrow, $data->pj_dephead);
				$sheet->setCellValue('N' . $numrow, $data->tgl_dephead);
				$sheet->setCellValue('O' . $numrow, $data->score);
				$sheet->setCellValue('P' . $numrow, $data->rekomendasi);
				$sheet->setCellValue('Q' . $numrow, $data->pj_hrd);
				$sheet->setCellValue('R' . $numrow, $data->tgl_eval);


				$sheet->getStyle('A' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('B' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('C' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('D' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('E' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('F' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('G' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('H' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('I' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('J' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('K' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('L' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('M' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('N' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('O' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('P' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('Q' .  $numrow)->applyFromArray($style_body_content);
				$sheet->getStyle('R' .  $numrow)->applyFromArray($style_body_content);

				$no++;
				$numrow++;
			}


			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Laporan_penilaian_Training.xls"');
			header('Cache-Control: max-age=0');

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
		}
	}

	// ini kriteria
	public function kriteria()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_kriteria']   = $this->Mcrud->get_data('tbl_kriteria');
			$this->load->view('header', $data);
			$this->load->view('dephead/kriteria', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$nama_kriteria 			= htmlentities(strip_tags($_POST['nama_kriteria']));
				$jenis_kriteria		= htmlentities(strip_tags($_POST['jenis_kriteria']));

				$data = array(
					'nama_kriteria'			=> $nama_kriteria,
					'jenis_kriteria'	=> $jenis_kriteria
				);
				$this->Mcrud->save_data('tbl_kriteria', $data);

				$this->session->set_flashdata(
					'msg',
					'
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Kriteria berhasil ditambahkan.
									 </div>'
				);

				redirect('web/kriteria');
			}
		}
	}


	public function kriteria_edit($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_kriteria']    = $this->Mcrud->get_data_by_pk('tbl_kriteria', 'id_kriteria', $id);


			if ($data['v_kriteria']->num_rows() == 0) {
				redirect('web/kriteria');
			} else {
				$data['v_kriteria'] = $data['v_kriteria']->row();
			}
			$this->load->view('header', $data);
			$this->load->view('dephead/kriteria_edit', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$nama_kriteria 			= htmlentities(strip_tags($_POST['nama_kriteria']));
				$jenis_kriteria		= htmlentities(strip_tags($_POST['jenis_kriteria']));

				$data = array(
					'nama_kriteria'			=> $nama_kriteria,
					'jenis_kriteria'	=> $jenis_kriteria
				);
				$this->Mcrud->update_data('tbl_kriteria', array('id_kriteria' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
								 <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times; &nbsp;</span>
										</button>
										<strong>Sukses!</strong> Kriteria berhasil diubah.
								 </div>'
				);
				redirect('web/kriteria');
			}
		}
	}

	public function kriteria_hapus($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$this->Mcrud->delete_data_by_pk('tbl_kriteria', 'id_kriteria', $id);

			$this->session->set_flashdata(
				'msg',
				'
					 <div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Kriteria berhasil dihapus.
					 </div>'
			);
			redirect('web/kriteria');
		}
	}

 // ini sub kriteria

 public function sub_kriteria()
 {
	 $ceks = $this->session->userdata('kamar@2017');
	 if (!isset($ceks)) {
		 redirect('web/login');
	 } else {
		 $data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
		 $data['v_sub_kriteria']   = $this->Mcrud->get_sub_kriteria('');
		 $data['v_kriteria']   = $this->Mcrud->get_data('tbl_kriteria');
		 $this->load->view('header', $data);
		 $this->load->view('dephead/sub_kriteria', $data);
		 $this->load->view('footer');

		 if (isset($_POST['btnsimpan'])) {
			 $nama_sub_kriteria 			= htmlentities(strip_tags($_POST['nama_sub_kriteria']));
			 $id_kriteria		= htmlentities(strip_tags($_POST['id_kriteria']));
			 $nilai_sub_kriteria		= htmlentities(strip_tags($_POST['nilai_sub_kriteria']));

			 $data = array(
				 'nama_sub_kriteria'			=> $nama_sub_kriteria,
				 'id_kriteria'	=> $id_kriteria,
				 'nilai_sub_kriteria'	=> $nilai_sub_kriteria
			 );
			 $this->Mcrud->save_data('tbl_sub_kriteria', $data);

			 $this->session->set_flashdata(
				 'msg',
				 '
								  <div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> sub_kriteria berhasil ditambahkan.
								  </div>'
			 );

			 redirect('web/sub_kriteria');
		 }
	 }
 }


 public function sub_kriteria_edit($id = '')
 {
	 $ceks = $this->session->userdata('kamar@2017');
	 if (!isset($ceks)) {
		 redirect('web/login');
	 } else {
		 $data['user']  			  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
		 $data['v_sub_kriteria']    = $this->Mcrud->get_data_by_pk('tbl_sub_kriteria', 'id_sub_kriteria', $id);
		 $data['v_kriteria']   = $this->Mcrud->get_data('tbl_kriteria');

		 if ($data['v_sub_kriteria']->num_rows() == 0) {
			 redirect('web/sub_kriteria');
		 } else {
			 $data['v_sub_kriteria'] = $data['v_sub_kriteria']->row();
		 }
		 $this->load->view('header', $data);
		 $this->load->view('dephead/sub_kriteria_edit', $data);
		 $this->load->view('footer');

		 if (isset($_POST['btnsimpan'])) {
			$nama_sub_kriteria 			= htmlentities(strip_tags($_POST['nama_sub_kriteria']));
			$id_kriteria		= htmlentities(strip_tags($_POST['id_kriteria']));
			$nilai_sub_kriteria		= htmlentities(strip_tags($_POST['nilai_sub_kriteria']));

			$data = array(
				'nama_sub_kriteria'			=> $nama_sub_kriteria,
				'id_kriteria'	=> $id_kriteria,
				'nilai_sub_kriteria'	=> $nilai_sub_kriteria
			 );
			 $this->Mcrud->update_data('tbl_sub_kriteria', array('id_sub_kriteria' => $id), $data);

			 $this->session->set_flashdata(
				 'msg',
				 '
							  <div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> sub_kriteria berhasil diubah.
							  </div>'
			 );
			 redirect('web/sub_kriteria');
		 }
	 }
 }

 public function sub_kriteria_hapus($id = '')
 {
	 $ceks = $this->session->userdata('kamar@2017');
	 if (!isset($ceks)) {
		 redirect('web/login');
	 } else {
		 $this->Mcrud->delete_data_by_pk('tbl_sub_kriteria', 'id_sub_kriteria', $id);

		 $this->session->set_flashdata(
			 'msg',
			 '
				  <div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times; &nbsp;</span>
						 </button>
						 <strong>Sukses!</strong> Sub Kriteria Berhasil Dihapus.
				  </div>'
		 );
		 redirect('web/sub_kriteria');
	 }
 }

 
 // ini nilai profil karyawan

 public function nilai_profil_karyawan()
 {
	 $ceks = $this->session->userdata('kamar@2017');
	 if (!isset($ceks)) {
		 redirect('web/login');
	 } else {
		 $data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
		 $data['v_nilai_profil_karyawan']   = $this->Mcrud->get_nilai_profil_karyawan('');
		 $data['v_kriteria']   = $this->Mcrud->get_data('tbl_kriteria');
		 $data['v_sub_kriteria']   = $this->Mcrud->get_data('tbl_sub_kriteria');
		 $this->load->view('header', $data);
		 $this->load->view('dephead/nilai_profil_karyawan', $data);
		 $this->load->view('footer');

		 if (isset($_POST['btnsimpan'])) {
			$nrp 			= htmlentities(strip_tags($_POST['nrp']));
			$id_sub_kriteria 			= htmlentities(strip_tags($_POST['id_sub_kriteria']));
			 $id_kriteria		= htmlentities(strip_tags($_POST['id_kriteria']));
			 $nilai_profil_karyawan		= htmlentities(strip_tags($_POST['nilai_profil_karyawan']));

			 $data = array(
				'nrp'			=> $nrp, 
				'id_sub_kriteria'			=> $id_sub_kriteria,
				 'id_kriteria'	=> $id_kriteria,
				 'nilai_profil_karyawan'	=> $nilai_profil_karyawan
			 );
			 $this->Mcrud->save_data('tbl_nilai_profil_karyawan', $data);

			 $this->session->set_flashdata(
				 'msg',
				 '
								  <div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Nilai Profil Berhasil Ditambahkan.
								  </div>'
			 );

			 redirect('web/nilai_profil_karyawan');
		 }
	 }
 }


 public function nilai_profil_karyawan_edit($id = '')
 {
	 $ceks = $this->session->userdata('kamar@2017');
	 if (!isset($ceks)) {
		 redirect('web/login');
	 } else {
		 $data['user']  			  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
		 $data['v_nilai_profil_karyawan']    = $this->Mcrud->get_data_by_pk('tbl_nilai_profil_karyawan', 'id_nilai_profil_karyawan', $id);
		 $data['v_kriteria']   = $this->Mcrud->get_data('tbl_kriteria');
		 $data['v_sub_kriteria']   = $this->Mcrud->get_sub_kriteria('');

		 


		 if ($data['v_nilai_profil_karyawan']->num_rows() == 0) {
			 redirect('web/nilai_profil_karyawan');
		 } else {
			 $data['v_nilai_profil_karyawan'] = $data['v_nilai_profil_karyawan']->row();
		 }
		 $this->load->view('header', $data);
		 $this->load->view('dephead/nilai_profil_karyawan_edit', $data);
		 $this->load->view('footer');

		 if (isset($_POST['btnsimpan'])) {
			$nrp 			= htmlentities(strip_tags($_POST['nrp']));
			$id_sub_kriteria 			= htmlentities(strip_tags($_POST['id_sub_kriteria']));
			 $id_kriteria		= htmlentities(strip_tags($_POST['id_kriteria']));
			 $nilai_profil_karyawan		= htmlentities(strip_tags($_POST['nilai_profil_karyawan']));

			 $data = array(
				'nrp'			=> $nrp, 
				'id_sub_kriteria'			=> $id_sub_kriteria,
				 'id_kriteria'	=> $id_kriteria,
				 'nilai_profil_karyawan'	=> $nilai_profil_karyawan
			 );
			 $this->Mcrud->update_data('tbl_nilai_profil_karyawan', array('id_nilai_profil_karyawan' => $id), $data);

			 $this->session->set_flashdata(
				 'msg',
				 '
							  <div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Nilai Profil Karyawan Berhasil Diubah.
							  </div>'
			 );
			 redirect('web/nilai_profil_karyawan');
		 }
	 }
 }

 public function nilai_profil_karyawan_hapus($id = '')
 {
	 $ceks = $this->session->userdata('kamar@2017');
	 if (!isset($ceks)) {
		 redirect('web/login');
	 } else {
		 $this->Mcrud->delete_data_by_pk('tbl_nilai_profil_karyawan', 'id_nilai_profil_karyawan', $id);

		 $this->session->set_flashdata(
			 'msg',
			 '
				  <div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times; &nbsp;</span>
						 </button>
						 <strong>Sukses!</strong> Nilai Profil Karyawan Berhasil Dihapus.
				  </div>'
		 );
		 redirect('web/nilai_profil_karyawan');
	 }
 }

	public function realisasiptk()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_permintaan']   = $this->Mcrud->get_data('tbl_permintaan');
			$data['v_realisasiptk']		= $this->Mcrud->get_data_realisasiptk('');
			$data['v_persetujuan']		= $this->Mcrud->get_data_persetujuanptk();

			$this->load->view('header', $data);
			$this->load->view('hrd/realisasiptk', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {

				$kd_persetujuanptk = htmlentities(strip_tags($_POST['kd_persetujuanptk']));
				$mengetahui_ptk = htmlentities(strip_tags($_POST['mengetahui_ptk']));
				$nama_ptk = htmlentities(strip_tags($_POST['nama_ptk']));
				$tgl_ptk = $_POST['tgl_ptk'];
				$ket_ptk = htmlentities(strip_tags($_POST['ket_ptk']));
				$pj_ptk = htmlentities(strip_tags($_POST['pj_ptk']));

				$data = array(

					'kd_persetujuanptk'					=> $kd_persetujuanptk,
					'mengetahui_ptk'				  => $mengetahui_ptk,
					'nama_ptk'				  => $nama_ptk,
					'tgl_ptk'				=> $tgl_ptk,
					'ket_ptk'			=> $ket_ptk,
					'pj_ptk'							=> $pj_ptk
				);
				$this->Mcrud->save_data('tbl_realisasiptk', $data);

				$this->session->set_flashdata(
					'msg',
					'
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Realisasi berhasil ditambahkan.
										 </div>'
				);

				redirect('web/realisasiptk');
			}
		}
	}


	public function realisasiptk_edit($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			   = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_permintaan']  = $this->Mcrud->get_data('tbl_permintaan');
			$data['v_realisasiptk']    = $this->Mcrud->get_data_by_pk('tbl_realisasiptk', 'id_realisasiptk', $id);

			if ($data['v_realisasiptk']->num_rows() == 0) {
				redirect('web/realisasiptk');
			} else {
				$data['v_realisasiptk'] = $data['v_realisasiptk']->row();
			}
			$this->load->view('header', $data);
			$this->load->view('hrd/realisasiptk_edit', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$kd_persetujuanptk = htmlentities(strip_tags($_POST['kd_persetujuanptk']));
				$mengetahui_ptk = htmlentities(strip_tags($_POST['mengetahui_ptk']));
				$nama_ptk = htmlentities(strip_tags($_POST['nama_ptk']));
				$tgl_ptk = $_POST['tgl_ptk'];
				$ket_ptk = htmlentities(strip_tags($_POST['ket_ptk']));
				$pj_ptk = htmlentities(strip_tags($_POST['pj_ptk']));

				$data = array(
					'kd_persetujuanptk'					=> $kd_persetujuanptk,
					'mengetahui_ptk'				  => $mengetahui_ptk,
					'nama_ptk'				  => $nama_ptk,
					'tgl_ptk'				=> $tgl_ptk,
					'ket_ptk'			=> $ket_ptk,
					'pj_ptk'							=> $pj_ptk
				);
				$this->Mcrud->update_data('tbl_realisasiptk', array('id_realisasiptk' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Realisasi berhasil diubah.
									 </div>'
				);
				redirect('web/realisasiptk');
			}
		}
	}

	public function realisasiptk_hapus($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$this->Mcrud->delete_data_by_pk('tbl_realisasiptk', 'id_realisasiptk', $id);

			$this->session->set_flashdata(
				'msg',
				'
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Realisasi berhasil dihapus.
						 </div>'
			);
			redirect('web/realisasiptk');
		}
	}


	public function upload()
	{

		require_once(APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php');
		//$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$objPHPExcel = new PHPExcel();

		$filename = time() . $_FILES['file']['name'];

		//$inputfileName = './assets/'.$this->upload->fileName;

		$config['upload_path'] = './assets/';
		$config['file_name'] = $filename;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size'] = 10000;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file'))
			$this->upload->display_errors();

		$this->load->helper('file');
		$inputFileName = './assets/' . $config['file_name'];
		delete_files($config['file_path'], TRUE);

		try {
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		for ($row = 2; $row <= $highestRow; $row++) {
			$rowData = $sheet->rangeToArray(
				'A' . $row . ':' . $highestColumn . $row,
				NULL,
				TRUE,
				FALSE
			);


			$data = array(
				"nrp" => $rowData[0][0],
				"nm_karyawan" => $rowData[0][1],
				"dept" => $rowData[0][2],
				"seksi" => $rowData[0][3],
				"gol" => $rowData[0][4],
				"subgol" => $rowData[0][5],
				"jab" => $rowData[0][6]
			);


			$insert = $this->db->insert("tbl_karyawan", $data);
			delete_files($media['file_path']);
		}
		$this->session->set_flashdata(
			'msg',
			'
							 <div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> data berhasil di import.
							 </div>'
		);
		redirect('web/karyawan');
	}



	//ini uraian jabatan
	public function uraian()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_uraian']   = $this->Mcrud->get_data('tbl_uraian');
			//$data['v_kebutuhan']   = $this->Mcrud->get_data('tbl_kebutuhan');
			$data['v_kualifikasi']   = $this->Mcrud->get_data_kualifikasi();


			$this->load->view('header', $data);
			$this->load->view('dephead/uraian', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$id_kualifikasi 	= htmlentities(strip_tags($_POST['id_kualifikasi']));
				$id_kebutuhan 	= htmlentities(strip_tags($_POST['id_kebutuhan']));
				$bertanggungjawab					= htmlentities(strip_tags($_POST['bertanggungjawab']));
				$bawahan				=
					htmlentities(strip_tags($_POST['bawahan']));
				$jml_bawahan		= htmlentities(strip_tags($_POST['jml_bawahan']));
				$tgs_pokok					=
					htmlentities(strip_tags($_POST['tgs_pokok']));
				$data = array(
					'id_kualifikasi'					=> $id_kualifikasi,
					'id_kebutuhan'		=> $id_kebutuhan,
					'bertanggungjawab'					=> $bertanggungjawab,
					'bawahan'		=> $bawahan,
					'jml_bawahan'		=> $jml_bawahan,
					'tgs_pokok'			=> $tgs_pokok
				);
				$this->Mcrud->save_data('tbl_uraian', $data);

				$this->session->set_flashdata(
					'msg',
					'
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Uraian Jabatan berhasil ditambahkan.
									 </div>'
				);

				redirect('web/uraian');
			}
		}
	}


	public function uraian_edit($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_uraian']    = $this->Mcrud->get_data_by_pk('tbl_uraian', 'id_uraian', $id);


			if ($data['v_uraian']->num_rows() == 0) {
				redirect('web/uraian');
			} else {
				$data['v_uraian'] = $data['v_uraian']->row();
			}
			$this->load->view('header', $data);
			$this->load->view('dephead/uraian_edit', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$id_kualifikasi 	= htmlentities(strip_tags($_POST['id_kualifikasi']));
				$id_kebutuhan 	= htmlentities(strip_tags($_POST['id_kebutuhan']));
				$bertanggungjawab					= htmlentities(strip_tags($_POST['bertanggungjawab']));
				$bawahan				=
					htmlentities(strip_tags($_POST['bawahan']));
				$jml_bawahan		= htmlentities(strip_tags($_POST['jml_bawahan']));
				$tgs_pokok					=
					htmlentities(strip_tags($_POST['tgs_pokok']));
				$data = array(
					'id_kualifikasi'					=> $id_kualifikasi,
					'id_kebutuhan'		=> $id_kebutuhan,
					'bertanggungjawab'					=> $bertanggungjawab,
					'bawahan'		=> $bawahan,
					'jml_bawahan'		=> $jml_bawahan,
					'tgs_pokok'			=> $tgs_pokok
				);
				$this->Mcrud->update_data('tbl_uraian', array('id_uraian' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
								 <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times; &nbsp;</span>
										</button>
										<strong>Sukses!</strong> uraian Tenaga Kerja berhasil diubah.
								 </div>'
				);
				redirect('web/uraian');
			}
		}
	}

	public function uraian_hapus($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$this->Mcrud->delete_data_by_pk('tbl_uraian', 'id_uraian', $id);

			$this->session->set_flashdata(
				'msg',
				'
					 <div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> uraian Tenaga Kerja berhasil dihapus.
					 </div>'
			);
			redirect('web/uraian');
		}
	}

	//ini user admin
	public function user()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_user']   = $this->Mcrud->get_data_user();

			$this->load->view('header', $data);
			$this->load->view('admin/user', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$username 		= htmlentities(strip_tags($_POST['username']));
				$password 		= htmlentities(strip_tags($_POST['password']));
				$level 	= htmlentities(strip_tags($_POST['level']));
				$dept = htmlentities(strip_tags($_POST['dept']));


				$cek_user = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $username);
				if ($cek_user->num_rows() == 0) {
					$status = "simpan";
				} else {
					$status = "";
				}

				if ($status == "simpan") {
					$data = array(
						'username'	=> $username,
						'password'	=> md5($password),
						'level'			=> $level,
						'dept'	=> $dept
					);
					$this->Mcrud->save_data('tbl_user', $data);

					$this->session->set_flashdata(
						'msg',
						'
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> User berhasil ditambahkan.
										 </div>'
					);
				} else {
					$this->session->set_flashdata(
						'msg',
						'
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> Username ' . strtoupper($username) . ' sudah ada.
										 </div>'
					);
				}

				redirect('web/user');
			}
		}
	}

	public function user_edit($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['v_user']   = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $id);

			if ($data['v_user']->num_rows() == 0) {
				redirect('web/user');
			} else {
				$data['v_user'] = $data['v_user']->row();
			}


			$this->load->view('header', $data);
			$this->load->view('admin/user_edit', $data);
			$this->load->view('footer');

			if (isset($_POST['btnsimpan'])) {
				$username 		= htmlentities(strip_tags($_POST['username']));
				$password 		= htmlentities(strip_tags($_POST['password']));

				$data = array(
					'username'	=> $username,
					'password'	=> md5($password),

				);
				$this->Mcrud->update_data('tbl_user', array('username' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> user berhasil diubah.
									 </div>'
				);
				redirect('web/user');
			}
		}
	}

	public function user_hapus($id = '')
	{
		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$this->Mcrud->delete_data_by_pk('tbl_user', 'username', $id);

			$this->session->set_flashdata(
				'msg',
				'
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> user berhasil dihapus.
						 </div>'
			);
			redirect('web/user');
		}
	}

	public function feedback()
	{

		$ceks = $this->session->userdata('kamar@2017');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks);
			$data['feedback']  			  = $this->Mcrud->get_data('tbl_feedback');

			$this->load->view('header', $data);
			$this->load->view('feedback', $data);
			$this->load->view('footer');

			if (isset($_POST['btnupdate'])) {
				$username					= htmlentities(strip_tags($_POST['username']));
				$nilai				=
					htmlentities(strip_tags($_POST['nilai']));
				$saran		= htmlentities(strip_tags($_POST['saran']));


				$data = array(
					'username'					=> $username,
					'nilai'		=> $nilai,
					'saran'		=> $saran


				);
				$this->Mcrud->save_data('tbl_feedback', $data);

				$this->session->set_flashdata(
					'msg',
					'
									 <div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Sukses!</strong> Feedback berhasil ditambahkan.
									 </div>'
				);
				redirect('web/feedback');
			}
		}
	}




	
}
