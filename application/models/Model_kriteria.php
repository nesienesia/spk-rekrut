<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kriteria extends CI_Model {

	public function getdata($where=array(), $orderby='jenis_kriteria asc, id_kriteria asc')
	{
		$this->db->where($where);
		$this->db->order_by($orderby);
		return $this->db->get('tbl_kriteria')->result();
	}
	
	public function insertdata($data)
	{
		return $this->db->insert('kriteria', $data);
	}
	
	public function deletedata($id)
	{
		$this->db->where('id_kriteria', $id);
		return $this->db->delete('tbl_kriteria');
	}

	public function selectdata($id)
	{
		$this->db->where('id_kriteria', $id);
		return $this->db->get('tbl_kriteria')->row();
	}
	
	public function updatedata($data, $id)
	{
		$this->db->where('id_kriteria', $id);
		return $this->db->update('tbl_kriteria', $data);
	}

}
