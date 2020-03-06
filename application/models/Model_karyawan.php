<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_karyawan extends CI_Model {

	public function getdata()
	{
		return $this->db->get('tbl_karyawan')->result();
	}
	
	public function insertdata($data)
	{
		return $this->db->insert('tbl_karyawan', $data);
	}
	
	public function deletedata($id)
	{
		$this->db->where('nrp', $id);
		return $this->db->delete('tbl_karyawan');
	}

	public function selectdata($id)
	{
		$this->db->where('nrp', $id);
		return $this->db->get('tbl_karyawan')->row();
	}
	
	public function updatedata($data, $id)
	{
		$this->db->where('nrp', $id);
		return $this->db->update('tbl_karyawan', $data);
	}

}
