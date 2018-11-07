<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerGuru extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model','Guru']);
        $username = $this->session->username;
        if($username == null)
        {
            redirect('');
        }
	} 

	public function index()
	{
		$data = [
			'title' => 'Guru'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_guru');
		$this->load->view('template/v_footer');
	}

	function getKode()
	{
		$kode = $this->Guru->getKodeGuru();
		$data = [
			'id_guru' => $kode
		];
		echo json_encode($data);
	}

	//guru list
	public function guru_list()
    {
 
        $list = $this->Guru->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $guru) {
            $no++;
            $row = array();
            $row[] = '<center>'.$guru->id_guru.'</center>';
            $row[] = '<center>'.$guru->nm_guru.'</center>';
 
            //add html for action
            $row[] = '
                <center>
                    <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail" onclick="detail_guru('."'".$guru->id_guru."'".')"><i class="glyphicon glyphicon glyphicon-folder-open"></i> Detail</a>
                    <a class="btn btn-sm btn-primary ubah_guru" href="javascript:void(0)" onclick="ubah_guru('."'".$guru->id_guru."'".')" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_guru('."'".$guru->id_guru."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                </center>';
         
            $data[] = $row;
        }
 
        $output = [
           	"draw" => $_POST['draw'],
            "recordsTotal" => $this->Guru->count_all(),
            "recordsFiltered" => $this->Guru->count_filtered(),
            "data" => $data,
        ];
        echo json_encode($output);
    }

    public function simpan()
    {	
    	$data = [
    		'id_guru' => $this->input->post('id_guru'),
    		'nm_guru' => $this->input->post('nm_guru'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
    	];

    	$this->Model->simpan('guru',$data);
    	echo json_encode(array("status" => TRUE));
    }

    public function edit($id)
	{
		$data = $this->Model->get_by_id('id_guru',$id,'guru');
		echo json_encode($data);
	}

	public function ubah()
    {	
    	$id_guru = $this->input->post('id_guru');
    	$data = [
            'nm_guru' => $this->input->post('nm_guru'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
    	];

    	$this->Model->update('id_guru',$id_guru,$data,'guru');
    	echo json_encode(array("status" => TRUE));
    }

    public function hapus($id)
	{
		$this->Model->hapus('id_guru',$id,'guru');
		echo json_encode(array("status" => TRUE));
	}

}
