<?php

class global_query extends CI_Model
{
    public function getList($table){
		$quer=$this->db->get($table);
		return $quer->result();
	}

	public function numRows($table){
		return $this->db->get($table)->num_rows();
	}

	public function getWhere($table, $data){
		$quer = $this->db->get_where($table, $data);
		return $quer->row();
		// return $quer->num_rows();
	}

	public function int($table, $data){
		$quer = $this->db->insert($table, $data);
		return $quer;
	}

	public function upd($table, $data, $where){
		$quer = $this->db->update($table, $data, $where);
		return $quer;
	}

	public function del($table, $where){
		$quer = $this->db->delete($table, $where);
		return $quer;
	}

	public function dt_limit($tb,$num,$from){
		return $this->db->get($tb,$num,$from)->result();
	}
	public function get_tb_lt($tb,$num){
		return $this->db->get($tb,$num);
	}

	public function auto_kdb(){
		return $this->db->query("SELECT kode_barang from barang order by kode_barang desc LIMIT 1")->row()->kode_barang;
	}
	public function auto_id(){
		return $this->db->query("SELECT id_pelanggan from pelanggan order by id_pelanggan desc LIMIT 1")->row()->id_pelanggan;
	}
	public function caribarang($where){
		return $this->db->query("SELECT * FROM barang natural JOIN merk WHERE nama_barang LIKE '%".$where."%'")->result();
	}
}

?>