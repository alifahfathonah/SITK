<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Model {

	var $table = 'pembayaran';
	var $column_search = array('id_bayar','tgl_bayar','status');
	var $column_order = array('id_bayar','tgl_bayar','status',null); //set column field database for datatable orderable
	var $order = array('id_bayar' => 'desc');

	public function __construct()
    {
		parent::__construct();
	}

	private function _get_datatables_query()
    {         
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
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

	//kode Pembayaran
	public function getKodePembayaran()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(id_bayar,7)) as kd_max from pembayaran");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%07s",$tmp);
        	}
    	} else {
         $kd = "0000001";
    	}
       	return "BYR".$kd;
    }

    //validasi
    public function validasi($id_bayar)
    {
        $jenis = $this->db->query("
                SELECT * FROM pembayaran 
                    JOIN detail_bayar ON pembayaran.id_bayar = detail_bayar.id_bayar 
                    JOIN jenis_pembayaran ON jenis_pembayaran.id_jenis = detail_bayar.id_jenis
                WHERE nm_jenis = 'Lunas' AND pembayaran.id_bayar = '$id_bayar'");
        return $jenis->result();
    }

}