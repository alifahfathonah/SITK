<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model','Pembayaran']);
        $username = $this->session->username;
        if($username == null)
        {
            redirect('');
        }
	} 

	public function index()
	{
		$data = [
			'title' => 'Pembayaran'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_pembayaran');
		$this->load->view('template/v_footer');
	}

	function getKode()
	{
		$kode = $this->Pembayaran->getKodePembayaran();
		$data = [
			'id_pembayaran' => $kode
		];
		echo json_encode($data);
	}

	//pembayaran list
	public function pembayaran_list()
    {
 
        $list = $this->Pembayaran->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pembayaran) {
            $no++;
            $row = array();
            $row[] = '<center>'.$pembayaran->id_bayar.'</center>';
            $row[] = '<center>'.$pembayaran->tgl_bayar.'</center>';
            $row[] = '<center>'.$pembayaran->status.'</center>';
 
            //add html for action
            $row[] = '
                <center>
                    <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail" onclick="detail_pembayaran('."'".$pembayaran->id_bayar."'".')"><i class="glyphicon glyphicon glyphicon-folder-open"></i> Detail</a>
                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="ubah_pembayaran('."'".$pembayaran->id_bayar."'".')" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_pembayaran('."'".$pembayaran->id_bayar."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                </center>';
         
            $data[] = $row;
        }
 
        $output = [
           	"draw" => $_POST['draw'],
            "recordsTotal" => $this->Pembayaran->count_all(),
            "recordsFiltered" => $this->Pembayaran->count_filtered(),
            "data" => $data,
        ];
        echo json_encode($output);
    }

    public function simpan()
    {	
    	$data = [
    		'id_bayar' => $this->input->post('id_bayar'),
    		'tgl_bayar' => date('Y-m-d'),
            'nominal_bayar' => $this->input->post('nominal_bayar'),
            'status' => '0',
            'id_daftar' => $this->input->post('id_daftar'),
    	];

    	$this->Model->simpan('pembayaran',$data);
    	echo json_encode(array("status" => TRUE));
    }

    public function edit($id)
	{
		$data = $this->Model->get_by_id('id_bayar',$id,'pembayaran');
		echo json_encode($data);
	}

	public function ubah()
    {	
    	$id_bayar = $this->input->post('id_bayar');
    	$data = [
            'tgl_bayar' => date('Y-m-d'),
            'nominal_bayar' => $this->input->post('nominal_bayar'),
            'status' => '0',
            'id_daftar' => $this->input->post('id_daftar'),
        ];

    	$this->Model->update('id_bayar',$id_bayar,$data,'pembayaran');
    	echo json_encode(array("status" => TRUE));
    }

    public function hapus($id)
	{
		$this->Model->hapus('id_bayar',$id,'pembayaran');
		echo json_encode(array("status" => TRUE));
	}

}
