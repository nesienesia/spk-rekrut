<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_matching extends CI_Controller {

	public function index()
	{
		if ($this->input->post('button') == '')
		{
			$this->load->model('model_kriteria');
			$tabelkriteria = $this->model_kriteria->getdata();
			$this->load->model('model_sub_kriteria');
			foreach($tabelkriteria as $rowkriteria) {
				$tabelsubkriteria[$rowkriteria->id_kriteria] = $this->model_sub_kriteria->getdata(array('sub_kriteria.id_kriteria'=>$rowkriteria->id_kriteria));
			}
			$data['tabelkriteria'] = $tabelkriteria;
			$data['tabelsubkriteria'] = $tabelsubkriteria;
			$data['content'] = 'view_profile_matching';
			$this->load->view('dephead/profile_matching', $data); 
		} else {
			$html = "";
			$nilai_profil_standar = array();
			$total_nilai = array();
			$nrp = array();
			$nm_karyawan = array();
			$jumlah_kriteria_core_factor = array();
			$jumlah_kriteria_secondary_factor = array();
			$total_nilai_gap_core_factor = array();
			$total_nilai_gap_secondary_factor = array();
			$rata2_nilai_gap_core_factor = array();
			$rata2_nilai_gap_secondary_factor = array();
			
			$this->load->model('model_individu');
			$this->load->model('model_kriteria');
			$this->load->model('model_sub_kriteria');
			$this->load->model('model_nilai_profil_individu');
			
			
			
			$tabelkriteria = $this->model_kriteria->getdata(array(), "jenis_kriteria asc, id_kriteria asc");
			$i=0;
			foreach($tabelkriteria as $rowkriteria) {
				$nilai_profil_standar[$i] = $this->input->post('nilai_profil'.$rowkriteria->id_kriteria);
				$i++;	
			}
			
			$tabelindividu = $this->model_individu->getdata();
			$i=0;
			foreach($tabelindividu as $rowindividu)
			{
				$nm_karyawan[$i] = $rowindividu->nm_karyawan;
				$nrp[$i] = $rowindividu->nrp;
				$total_nilai[$i]= 0;
				
				$jumlah_kriteria_core_factor[$i] = 0;
				$jumlah_kriteria_secondary_factor[$i] = 0;
				$total_nilai_gap_core_factor[$i] = 0;
				$total_nilai_gap_secondary_factor[$i] = 0;
				$rata2_nilai_gap_core_factor[$i] = 0;
				$rata2_nilai_gap_secondary_factor[$i] = 0;

				$j=0;		
				$jmlkriteria = count($tabelkriteria);
					
				foreach ($tabelkriteria as $rowkriteria)
				{	
					$jenis_kriteria = $rowkriteria->jenis_kriteria;
					
					$tabelnilaiprofilindividu = $this->model_nilai_profil_individu->getdata(array('nilai_profil_karyawan.nrp'=>$rowindividu->nrp, 'nilai_profil_karyawan.id_kriteria' => $rowkriteria->id_kriteria));
					
					$nilai_profil_individu = @$tabelnilaiprofilindividu[0]->nilai_profil_karyawan;
					$gap = $nilai_profil_individu - $nilai_profil_standar[$j];
					$nilai_gap= 0;
					if ($gap == 0)
					{
						$nilai_gap = 5;
					}
					else if ($gap == 1)
					{
						$nilai_gap = 4.5;
					}	
					else if ($gap == -1)
					{
						$nilai_gap = 4;
					}	
					else if ($gap == 2)
					{
						$nilai_gap = 3.5;
					}	
					else if ($gap == -2)
					{
						$nilai_gap = 3;
					}	
					else if ($gap == 3)
					{
						$nilai_gap = 2.5;
					}	
					else if ($gap == -3)
					{
						$nilai_gap = 2;
					}	
					else if ($gap == 4)
					{
						$nilai_gap = 1.5;
					}	
					else if ($gap == -4)
					{
						$nilai_gap = 1;
					}	
					if ($jenis_kriteria == 'Core Factor')
					{
						$total_nilai_gap_core_factor[$i] = $total_nilai_gap_core_factor[$i] + $nilai_gap;
						$jumlah_kriteria_core_factor[$i]++;
					}
					else 
					{
						$total_nilai_gap_secondary_factor[$i] = $total_nilai_gap_secondary_factor[$i] + $nilai_gap;
						$jumlah_kriteria_secondary_factor[$i]++;
					}
					$j++;
				}	
				if ($jumlah_kriteria_core_factor[$i] > 0) { $rata2_nilai_gap_core_factor[$i] = $total_nilai_gap_core_factor[$i] / $jumlah_kriteria_core_factor[$i]; }
				if ($jumlah_kriteria_secondary_factor[$i] > 0) { $rata2_nilai_gap_secondary_factor[$i] = $total_nilai_gap_secondary_factor[$i] / $jumlah_kriteria_secondary_factor[$i]; }
				$total_nilai[$i] = (0.6 * $rata2_nilai_gap_core_factor[$i]) + (0.4 * $rata2_nilai_gap_secondary_factor[$i]);	
				$i++;
			}		
			
			$html = $html."<table width=\"700\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" bgcolor=\"#000099\">";
				$html = $html."<tr>";
					$html = $html."<td bgcolor=\"#FFFFFF\">Nama Individu</td>";
					$html = $html."<td bgcolor=\"#FFFFFF\">Kriteria</td>";
					$html = $html."<td bgcolor=\"#FFFFFF\">Nilai<br/>Profil<br/>Individu</td>";
					$html = $html."<td bgcolor=\"#FFFFFF\">Nilai<br/>Profil<br/>Standar</td>";
					$html = $html."<td bgcolor=\"#FFFFFF\">Gap</td>";			
					$html = $html."<td bgcolor=\"#FFFFFF\">Nilai Gap</td>";			
					$html = $html."<td bgcolor=\"#FFFFFF\">Rata2</td>";			
					$html = $html."<td bgcolor=\"#FFFFFF\">Total Nilai</td>";			
				$html = $html."</tr>";

			$i=0;
			foreach ($tabelindividu as $rowindividu)
			{
				$jmlkriteria = count($tabelkriteria);
				
				$j=0;
				foreach ($tabelkriteria as $rowkriteria)
				{
					$html = $html."<tr>";
					if ($j==0) { $html = $html."<td bgcolor=\"#FFFFFF\" rowspan=".$jmlkriteria.">".$rowindividu->nm_karyawan."</td>"; }
					
					$html = $html."<td bgcolor=\"#FFFFFF\">".$rowkriteria->nama_kriteria." (".$rowkriteria->jenis_kriteria.")</td>";
					
					$jenis_kriteria = $rowkriteria->jenis_kriteria;
					$tabelnilaiprofilindividu = $this->model_nilai_profil_individu->getdata(array('nilai_profil_karyawan.nrp' => $rowindividu->nrp, 'nilai_profil_karyawan.id_kriteria' => $rowkriteria->id_kriteria));
					
					$nilai_profil_individu = $tabelnilaiprofilindividu[0]->nilai_profil_karyawan;
					$html = $html."<td bgcolor=\"#FFFFFF\">".$tabelnilaiprofilindividu[0]->nilai_profil_karyawan."</td>";

					$html = $html."<td bgcolor=\"#FFFFFF\">".$nilai_profil_standar[$j]."</td>";

					$gap = $nilai_profil_individu - $nilai_profil_standar[$j];
					$html = $html."<td bgcolor=\"#FFFFFF\">".$gap."</td>";			
					
					$nilai_gap= 0;
					if ($gap == 0)
					{
						$nilai_gap = 5;
					}
					else if ($gap == 1)
					{
						$nilai_gap = 4.5;
					}	
					else if ($gap == -1)
					{
						$nilai_gap = 4;
					}	
					else if ($gap == 2)
					{
						$nilai_gap = 3.5;
					}	
					else if ($gap == -2)
					{
						$nilai_gap = 3;
					}	
					else if ($gap == 3)
					{
						$nilai_gap = 2.5;
					}	
					else if ($gap == -3)
					{
						$nilai_gap = 2;
					}	
					else if ($gap == 4)
					{
						$nilai_gap = 1.5;
					}	
					else if ($gap == -4)
					{
						$nilai_gap = 1;
					}
					
					$html = $html."<td bgcolor=\"#FFFFFF\">".$nilai_gap."</td>";			

					if ($j == 0) {
						$html = $html."<td bgcolor=\"#FFFFFF\" rowspan=".$jumlah_kriteria_core_factor[$i].">".$rata2_nilai_gap_core_factor[$i]."</td>";			
					}
					else if ($j == $jumlah_kriteria_core_factor[$i])
					{
						$html = $html."<td bgcolor=\"#FFFFFF\" rowspan=".$jumlah_kriteria_secondary_factor[$i].">".$rata2_nilai_gap_secondary_factor[$i]."</td>";
					}
					
					if ($j==0) { $html = $html."<td bgcolor=\"#FFFFFF\" rowspan=".$jmlkriteria.">".$total_nilai[$i]."</td>"; }
					$html = $html."</tr>";	
					
					$j++;
				}	
				$i++;
			}		
			$html = $html."</table>";
			
			$nrp_rangking = array();
			$nm_karyawan_rangking = array();
			$total_nilai_rangking = array();
			
			for ($i=0;$i<count($nm_karyawan);$i++)
			{
				$nrp_rangking[$i] = $nrp[$i];
				$nm_karyawan_rangking[$i] = $nm_karyawan[$i];
				$total_nilai_rangking[$i] = $total_nilai[$i];
			}
			
			for ($i=0;$i<count($nm_karyawan);$i++)
			{
				for ($j=$i;$j<count($nm_karyawan);$j++)
				{
					if ($total_nilai_rangking[$j] > $total_nilai_rangking[$i])
					{
						$tmp_total_nilai = $total_nilai_rangking[$i];
						$tmp_nm_karyawan = $nm_karyawan_rangking[$i];
						$tmp_nrp = $nrp_rangking[$i];
						$total_nilai_rangking[$i] = $total_nilai_rangking[$j];
						$nm_karyawan_rangking[$i] = $nm_karyawan_rangking[$j];
						$nrp_rangking[$i] = $nrp_rangking[$j];
						$total_nilai_rangking[$j] = $tmp_total_nilai;
						$nm_karyawan_rangking[$j] = $tmp_nm_karyawan;
						$nrp_rangking[$j] = $tmp_nrp;
					}
				}
			}
			$data['html'] = $html;
			$data['nm_karyawan_rangking'] = $nm_karyawan_rangking;
			$data['total_nilai_rangking'] = $total_nilai_rangking;
			
			$data['content'] = 'view_profile_matching';
			$this->load->view('dephead/profile_matching', $data); 
		}		
	}
	
	
}