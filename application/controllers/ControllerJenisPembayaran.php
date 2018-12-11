<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerJenisPembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model','Jenis']);
        $username = $this->session->username;
        if($username == null)
        {
            redirect('');
        }
	} 

	public function index()
	{
		$data = [
			'title' => 'Jenis Pembayaran'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_jenis_pembayaran');
		$this->load->view('template/v_footer');
	}

	function getKode()
	{
		$kode = $this->Jenis->getJenisPembayaran();
		$data = [
			'id_jenis' => $kode
		];
		echo json_encode($data);
	}

	//jenis list
	public function jenis_list()
    {
 
        $list = $this->Jenis->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $nomor = 1;
        foreach ($list as $jenis) {
            $no++;
            $row = array();
            $row[] = '<center>'.$nomor++ .'.'.'</center>';
            $row[] = '<center>'.$jenis->id_jenis.'</center>';
            $row[] = '<center>'.$jenis->nm_jenis.'</center>';
 
            //add html for action
            $row[] = '
                <center>
                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="ubah_jenis('."'".$jenis->id_jenis."'".')" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_jenis('."'".$jenis->id_jenis."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                </center>';
         
            $data[] = $row;
        }
 
        $output = [
           	"draw" => $_POST['draw'],
            "recordsTotal" => $this->Jenis->count_all(),
            "recordsFiltered" => $this->Jenis->count_filtered(),
            "data" => $data,
        ];
        echo json_encode($output);
    }

    public function simpan()
    {	
    	$data = [
    		'id_jenis' => $this->input->post('id_jenis'),
    		'nm_jenis' => $this->input->post('nm_jenis'),
    	];

    	$this->Model->simpan('jenis_pembayaran',$data);
    	echo json_encode(array("status" => TRUE));
    }

    public function edit($id)
	{
		$data = $this->Model->get_by_id('id_jenis',$id,'jenis_pembayaran');
		echo json_encode($data);
	}

	public function ubah()
    {	
    	$id_jenis = $this->input->post('id_jenis');
    	$data = [
            'nm_jenis' => $this->input->post('nm_jenis'),
        ];

    	$this->Model->update('id_jenis',$id_jenis,$data,'jenis_pembayaran');
    	echo json_encode(array("status" => TRUE));
    }

    public function hapus($id)
	{
		$this->Model->hapus('id_jenis',$id,'jenis_pembayaran');
		echo json_encode(array("status" => TRUE));
	}

}
