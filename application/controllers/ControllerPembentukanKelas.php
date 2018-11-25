<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPembentukanKelas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model']);
        $username = $this->session->username;
        if($username == null){
            redirect('');
        }
	} 

	public function index()
	{
		$data = [
			'title' => 'Pembentukan Kelas'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_pembentukan_kelas');
		$this->load->view('template/v_footer');
	}

	public function tambah_kelas()
	{
		$data = [
            'guru' => $this->Model->getAll('guru'),
            'kelas' => $this->Model->getAll('kelas'),
			'title' => 'Tambah Pembentukan Kelas'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_tambah_kelas');
		$this->load->view('template/v_footer');	
	}

    public function get_murid()
    {
        $thn_ajar1 = $this->input->post('thn_ajar1');
        $thn_ajar2 = $this->input->post('thn_ajar2');
        $guru = $this->input->post('guru');
        $kelas = $this->input->post('kelas');
        $umur = $this->input->post('umur');

        $tahun_ajaran = $thn_ajar1."/".$thn_ajar2;
        
        $query = $this->db->query("SELECT nm_lengkap FROM calon_siswa JOIN pendaftaran ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa WHERE thn_ajar = '$tahun_ajaran' AND YEAR(CURDATE())-YEAR(tgl_lahir) = '$umur'")->result();

        echo json_encode($query);
    }

    public function get_guru()
    {
        $id = $this->input->post('guru');
        $data = $this->Model->get_by_id('id_guru',$id,'guru');

        echo json_encode($data);
    }

    public function get_kelas()
    {
        $id = $this->input->post('kelas');
        $data = $this->Model->get_by_id('id_kelas',$id,'kelas');

        echo json_encode($data);
    }

    public function simpan()
    {
        $thn_ajar1 = $this->input->post('thn_ajar1');
        $thn_ajar2 = $this->input->post('thn_ajar2');
        $guru = $this->input->post('guru');
        $kelas = $this->input->post('kelas');
        $umur = $this->input->post('umur');

        $tahun_ajaran = $thn_ajar1."/".$thn_ajar2;
        
        $query = $this->db->query("SELECT pendaftaran.id_daftar as id_daftar,nm_lengkap FROM calon_siswa JOIN pendaftaran ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa WHERE thn_ajar = '$tahun_ajaran' AND YEAR(CURDATE())-YEAR(tgl_lahir) = '$umur'")->result();

        //nm_siswa
        $nm_siswa = array();
        foreach ($query as $key) {
            $nm_siswa[] = $key->nm_lengkap;
        }

        //id_daftar
        $id_daftar = array();
        foreach ($query as $kunci) {
            $id_daftar[] = $kunci->id_daftar;
        }

        for($i=0; $i<count($query); $i++){
            $data = [
                'no_induk' => $i,
                'nm_siswa' => $nm_siswa[$i],
                'id_kelas' => $kelas,
                'id_guru' => $guru,
                'id_daftar' => $id_daftar[$i],
            ];

            $this->Model->simpan('siswa',$data);
        }

        echo json_encode(array("status" => TRUE));
    }
}
