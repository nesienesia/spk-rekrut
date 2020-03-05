<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sub_kriteria extends CI_Model {

	public function getdata($where=array(), $orderby="sub_kriteria.id_kriteria asc, id_sub_kriteria asc")
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kriteria sub_kriteria');
		$this->db->join('tbl_kriteria kriteria', 'kriteria.id_kriteria=sub_kriteria.id_kriteria', 'left');
		$this->db->where($where);
		$this->db->order_by($orderby);
		return $this->db->get()->result();
	}

	public function insertdata($data)
	{
		return $this->db->insert('sub_kriteria', $data);
	}
	
	public function deletedata($id)
	{
		$this->db->where('id_sub_kriteria', $id);
		return $this->db->delete('tbl_sub_kriteria');
	}

	public function selectdata($id)
	{
		$this->db->where('id_sub_kriteria', $id);
		return $this->db->get('tbl_sub_kriteria')->row();
	}
	
	public function updatedata($data, $id)
	{
		$this->db->where('id_sub_kriteria', $id);
		return $this->db->update('tbl_sub_kriteria', $data);
	}

}
