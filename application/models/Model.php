<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	//count
	public function jumlah($table)
  	{
    	$query = $this->db->get($table);
    	return $query->num_rows();
  	}

	//untuk login
	public function auth($username,$password)
	{
   		$query = "SELECT * FROM admin WHERE UPPER(username)=".$this->db->escape(strtoupper(stripslashes(strip_tags(htmlspecialchars($username,ENT_QUOTES)))))." AND password=".$this->db->escape(stripslashes(strip_tags(htmlspecialchars($password,ENT_QUOTES))));
   		$result = $this->db->query($query);
   		return $result->row();
	}

	//ambil semua data
	public function getAll($table)
	{
		$result = $this->db->get($table);
		return $result->result();
	}

	//join 2 table
	public function get2Join($table1,$table2,$fk)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2, $fk);
		$query = $this->db->get();
		return $query->result();
	}

	//get 2 join berdasarkan id
	public function get2Join_cari($table1,$table2,$fk,$pk,$id)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2, $fk);
		$this->db->where($pk,$id);
		$query = $this->db->get();
		return $query->row();
	}

	//get berdasarkan id
	public function get_by_id($pk,$id,$table)
	{
		$this->db->from($table);
		$this->db->where($pk,$id);
		$query = $this->db->get();

		return $query->row();
	}

	//simpan
	public function simpan($table,$data)
	{
		$checkinsert = false;
		try{
			$this->db->insert($table,$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	//update
	public function update($pk,$id,$data,$table)
	{
		$checkupdate = false;
		try{
			$this->db->where($pk,$id);
			$this->db->update($table,$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//hapus
	public function hapus($pk,$id,$table)
	{
		$checkdelete = false;
		try{
			$this->db->where($pk,$id);
			$this->db->delete($table);
			$checkdelete = true;
		}catch (Exception $ex) {
			$checkdelete = false;
		}
		return $checkdelete;
	}

	//kode Calon
	public function getKodeCalon()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(id_calon_siswa,7)) as kd_max from calon_siswa");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%07s",$tmp);
        	}
    	} else {
         $kd = "0000001";
    	}
       	return "CLS".$kd;
    }

    public function getKodePendaftar()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(id_daftar,7)) as kd_max from pendaftaran");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%07s",$tmp);
        	}
    	} else {
         $kd = "0000001";
    	}
       	return "PTR".$kd;
    }

}
