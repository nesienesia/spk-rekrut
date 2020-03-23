<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mcrud extends CI_Model
{

	public function get_data($tbl)
	{
		$this->db->from($tbl);
		$query = $this->db->get();

		return $query;
	}

	public function get_data_by_pk($tbl, $where, $id)
	{
		$this->db->from($tbl);
		$this->db->where($where, $id);
		$query = $this->db->get();

		return $query;
	}


	public function save_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		return $this->db->insert_id();
	}

	public function update_data($tbl, $where, $data)
	{
		$this->db->update($tbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_data_by_pk($tbl, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->delete($tbl);
	}


	//$dept = null
	public function get_data_permintaan($dept = null)
	{
		$cekdept = $dept == 5 ? NULL : $dept;
		$where = $cekdept === NULL ? '1=1' : "tbl_department.id_dep=$cekdept";

		$this->db->select('*');
		$this->db->from('tbl_permintaan');
		$this->db->join('tbl_department ', 'tbl_department.nm_dep=tbl_permintaan.departemen');
		$this->db->where($where);
		$query = $this->db->get();
		//var_dump($this->db->last_query());

		return $query;
	}



	public function get_data_penilaian($dept = null)
	{
		$cekdept = $dept == 5 ? NULL : $dept;
		$where = $cekdept === NULL ? '1=1' : "u.dept=$cekdept";

		$this->db->select('*');
		$this->db->from('tbl_penilaian p');
		$this->db->join('tbl_karyawan k', 'k.nrp=p.nrp');
		$this->db->join('tbl_department d', 'k.dept=d.nm_dep');
		$this->db->join('tbl_user u', ' d.id_dep=u.dept');
		$this->db->where($where);
		$query = $this->db->get();
		//var_dump($this->db->last_query());

		return $query;
	}


	public function get_data_by_pk_penilaian($where, $id)
	{
		$this->db->select('*');
		$this->db->from('tbl_penilaian');
		$this->db->join('tbl_penilaian', 'tbl_penilaian.id_penilaian=tbl_penilaian.id_penilaian');
		$this->db->join('tbl_karyawan', 'tbl_karyawan.nrp=tbl_permohonan.nrp');
		$this->db->join('tbl_department d', 'tbl_penilaian.dept=d.nm_dep');
		$this->db->join('tbl_user u', ' d.id_dep=u.dept');
		$this->db->where($where, $id);
		$query = $this->db->get();
		return $query;
	}




	public function upload_file($filename)
	{
		$this->load->library('upload');
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('file')) {
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}


	public function insert_multiple($data)
	{
		$this->db->insert_batch('karyawan', $data);
	}

	public function get_data_user()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_department', 'tbl_user.dept=tbl_department.id_dep');
		$query = $this->db->get();
		return $query;
	}

	public function get_permintaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_permintaan');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_realisasiptk()
	{
		$this->db->select('*');
		$this->db->from('tbl_realisasi_ptk');
		$this->db->join('tbl_persetujuan_ptk', 'tbl_persetujuan_ptk.id_persetujuan=tbl_realisasi_ptk.id_persetujuan');
		$this->db->join('tbl_permintaan', 'tbl_permintaan.id_permintaan=tbl_persetujuan_ptk.id_permintaan');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_persetujuanptk()
	{
		$this->db->select('*');
		$this->db->from('tbl_persetujuan_ptk');
		$this->db->join('tbl_permintaan', 'tbl_permintaan.id_permintaan=tbl_persetujuan_ptk.id_permintaan');
		$query = $this->db->get();
		return $query;
	}

	public function get_penilaian()
	{
		$this->db->select('*');
		$this->db->from('tbl_penilaian p');
		$this->db->join('tbl_karyawan k', 'k.nrp=p.nrp');
		$this->db->join('tbl_department d', 'p.dept=d.nm_dep');
		$this->db->join('tbl_user u', ' d.id_dep=u.dept');
		$query = $this->db->get();
		return $query;
	}

	public function get_sub_kriteria()
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kriteria');
		$this->db->join('tbl_kriteria', 'tbl_kriteria.id_kriteria=tbl_sub_kriteria.id_kriteria', 'left');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_sub_kriteria($where, $id)
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kriteria');
		$this->db->join('tbl_kriteria', 'tbl_kriteria.id_kriteria=tbl_sub_kriteria.id_kriteria');
		$this->db->where($where, $id);
		$query = $this->db->get();
		return $query;
	}

	public function get_nilai_profil_karyawan()
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai_profil_karyawan');
		$this->db->join('tbl_karyawan', 'tbl_nilai_profil_karyawan.nrp=tbl_karyawan.nrp');
		$this->db->join('tbl_sub_kriteria', 'tbl_nilai_profil_karyawan.id_sub_kriteria=tbl_sub_kriteria.id_sub_kriteria');
		$this->db->join('tbl_kriteria', 'tbl_nilai_profil_karyawan.id_kriteria=tbl_kriteria.id_kriteria');
		//$this->db->join('tbl_penilaian', 'tbl_nilai_profil_karyawan.nrp=tbl_penilaian.nrp');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_permintaann()
	{

		$this->db->select('*');
		$this->db->from('tbl_permintaan');
		$this->db->join('tbl_department ', 'tbl_department.nm_dep=tbl_permintaan.departemen');

		$query = $this->db->get();
		return $query;
	}
}
