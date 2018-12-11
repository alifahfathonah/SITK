<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPengunduranDiri extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model','Pengunduran']);
        $username = $this->session->username;
        if($username == null){
            redirect('');
        }
	} 

	public function index()
	{
		$data = [
			'id_undur_diri' => $this->Model->getKodeUndur(),
			'title' => 'Pengunduran Diri Murid'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_undur_diri');
		$this->load->view('template/v_footer');
	}

	public function no_induk()
    {
        $id = $this->input->post('no_induk');
        $data = $this->db->query("SELECT nm_siswa,no_induk FROM siswa WHERE no_induk = '$id'")->row();
        echo json_encode($data);
    }

    public function simpan()
    {	

    	$no_induk = $this->input->post('no_induk');
        $data = [
    		'id_undur_diri' => $this->Pengunduran->getKode(),
    		'tgl_undur_diri' => date("Y-m-d"),
            'alasan' => $this->input->post('alasan'),
            'no_induk' => $no_induk,
    	];

    	$data_siswa = [
    		'status_siswa' => '0'
    	];
    	$this->Model->update('no_induk',$no_induk,$data_siswa,'siswa');
    	$this->Model->simpan('pengunduran_diri',$data);
        echo json_encode(array("status" => TRUE));
    }

    public function detail($id)
	{
		$data = $this->db->query("
            SELECT siswa.no_induk as no_induk,nm_siswa,tgl_lahir,status_siswa, YEAR(CURDATE())-YEAR(tgl_lahir) as umur, jenis_kelamin, no_telp, alamat,alasan 
            FROM calon_siswa
                JOIN pendaftaran ON pendaftaran.id_calon_siswa = calon_siswa.id_calon_siswa
                JOIN siswa ON siswa.id_daftar = pendaftaran.id_daftar
                JOIN pengunduran_diri ON pengunduran_diri.no_induk = siswa.no_induk
            WHERE pengunduran_diri.no_induk = '$id'
        ")->row();

        $siswa = [
            'no_induk' => $data->no_induk,
            'nm_siswa' => $data->nm_siswa,
            'tgl_lahir' => shortdate_indo($data->tgl_lahir),
            'status_siswa' => $data->status_siswa,
            'umur' => $data->umur,
            'jenis_kelamin' => $data->jenis_kelamin,
            'no_telp' => $data->no_telp,
            'alamat' => $data->alamat,
            'alasan' => $data->alasan,
        ];

		echo json_encode($siswa);
	}

    //guru list
    public function undur_list()
    {
 
        $list = $this->Pengunduran->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $nomor = 1;
        foreach ($list as $siswa) {

            $query = $this->db->query("SELECT nm_siswa FROM siswa WHERE no_induk = '$siswa->no_induk'")->row();

            $no++;
            $row = array();
            $row[] = '<center>'.$nomor++.'.'.'</center>';
            $row[] = '<center>'.$siswa->no_induk.'</center>';
            $row[] = '<center>'.shortdate_indo($siswa->tgl_undur_diri).'</center>';
            $row[] = '<center>'.$query->nm_siswa.'</center>';
 
            //add html for action
            $row[] = '
                <center>
                    <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail" onclick="detail_siswa('."'".$siswa->no_induk."'".')"><i class="glyphicon glyphicon glyphicon-folder-open"></i> Detail</a>
                </center>';
         
            $data[] = $row;
        }
 
        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pengunduran->count_all(),
            "recordsFiltered" => $this->Pengunduran->count_filtered(),
            "data" => $data,
        ];
        echo json_encode($output);
    }
}
