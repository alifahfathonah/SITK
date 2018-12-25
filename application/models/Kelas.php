<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Model {

	var $table = 'kelas';
	var $column_search = array('id_kelas','nm_kelas');
	var $column_order = array('id_kelas','nm_kelas',null); 
	var $order = array('id_kelas' => 'desc');

	public function __construct()
    {
		parent::__construct();
	}

	private function _get_datatables_query()
    {         
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	//kode Kelas
	public function getKodeKelas()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(id_kelas,3)) as kd_max from kelas");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%03s",$tmp);
        	}
    	} else {
         $kd = "001";
    	}
       	return "KLS".$kd;
    }

}