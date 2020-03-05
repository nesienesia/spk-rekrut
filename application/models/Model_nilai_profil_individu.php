<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nilai_profil_individu extends CI_Model {

	public function getdata($where=array(), $orderby='nilai_profil_karyawan.id_kriteria asc, nilai_profil_karyawan.nrp asc, id_nilai_profil_karyawan asc')
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai_profil_karyawan nilai_profil_karyawan');
		$this->db->join('tbl_karyawan karyawan', 'karyawan.nrp=nilai_profil_karyawan.nrp', 'left');
		$this->db->join('tbl_kriteria kriteria', 'kriteria.id_kriteria=nilai_profil_karyawan.id_kriteria', 'left');
		$this->db->join('tbl_sub_kriteria sub_kriteria', 'sub_kriteria.id_sub_kriteria=nilai_profil_karyawan.id_sub_kriteria', 'left');
		$this->db->where($where);
		$this->db->order_by($orderby);
		return $this->db->get()->result();
	}
	
	public function insertdata($data)
	{
		return $this->db->insert('tbl_nilai_profil_karyawan', $data);
	}
	
	public function deletedata($id)
	{
		$this->db->where('id_nilai_profil_karyawan', $id);
		return $this->db->delete('tbl_nilai_profil_karyawan');
	}

	public function selectdata($id)
	{
		$this->db->where('id_nilai_profil_karyawan', $id);
		return $this->db->get('tbl_nilai_profil_karyawan')->row();
	}

	public function select_nilai_profil_karyawan($nrp, $id_sub_kriteria)
	{
		$this->db->where('nrp', $nrp);
		$this->db->where('id_sub_kriteria', $id_sub_kriteria);
		return $this->db->get('tbl_nilai_profil_karyawan')->row();
	}
	
	public function updatedata($data, $id)
	{
		$this->db->where('id_nilai_profil_karyawan', $id);
		return $this->db->update('tbl_nilai_profil_karyawan', $data);
	}

}
