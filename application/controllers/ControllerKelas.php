<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerKelas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model','Kelas']);
	} 

	public function index()
	{
		$data = [
			'title' => 'Kelas'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_kelas');
		$this->load->view('template/v_footer');
	}

	function getKode()
	{
		$kode = $this->Kelas->getKodeKelas();
		$data = [
			'id_kelas' => $kode
		];
		echo json_encode($data);
	}

	//kelas list
	public function kelas_list()
    {
 
        $list = $this->Kelas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kelas) {
            $no++;
            $row = array();
            $row[] = '<center>'.$kelas->id_kelas.'</center>';
            $row[] = '<center>'.$kelas->nm_kelas.'</center>';
 
            //add html for action
            $row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="ubah_kelas('."'".$kelas->id_kelas."'".')" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_kelas('."'".$kelas->id_kelas."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a></center>';
         
            $data[] = $row;
        }
 
        $output = [
           	"draw" => $_POST['draw'],
            "recordsTotal" => $this->Kelas->count_all(),
            "recordsFiltered" => $this->Kelas->count_filtered(),
            "data" => $data,
        ];
        echo json_encode($output);
    }

    public function simpan()
    {	
    	$data = [
    		'id_kelas' => $this->input->post('id_kelas'),
    		'nm_kelas' => $this->input->post('nm_kelas'),
    	];

    	$this->Model->simpan('kelas',$data);
    	echo json_encode(array("status" => TRUE));
    }

    public function edit($id)
	{
		$data = $this->Model->get_by_id('id_kelas',$id,'kelas');
		echo json_encode($data);
	}

	public function ubah()
    {	
    	$id_kelas = $this->input->post('id_kelas');
    	$data = [
    		'nm_kelas' => $this->input->post('nm_kelas'),
    	];

    	$this->Model->update('id_kelas',$id_kelas,$data,'kelas');
    	echo json_encode(array("status" => TRUE));
    }

    public function hapus($id)
	{
		$this->Model->hapus('id_kelas',$id,'kelas');
		echo json_encode(array("status" => TRUE));
	}

}
