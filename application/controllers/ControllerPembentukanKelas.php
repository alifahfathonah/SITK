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
        $check = $this->db->query("SELECT thn_ajar FROM pendaftaran ORDER BY thn_ajar DESC")->row();
        $thn_ajar1 = date("Y");
        $thn_ajar2 = date("Y")+1;
        $thn_ajar = $thn_ajar1."/".$thn_ajar2;

        //update status guru dan kelas
        if($check->thn_ajar != $thn_ajar){
            $update_guru = $this->db->query("UPDATE guru set status_guru = '0'");
            $update_kelas = $this->db->query("UPDATE kelas set status_kelas = '0'");
        }

        $kelas = $this->db->query("
            SELECT nm_siswa,thn_ajar,kelas.id_kelas,nm_kelas,YEAR(CURDATE())-YEAR(tgl_lahir) as umur 
                FROM siswa 
                    JOIN pendaftaran On siswa.id_daftar = pendaftaran.id_daftar 
                    JOIN kelas ON kelas.id_kelas = siswa.id_kelas 
                    JOIN calon_siswa ON pendaftaran.id_calon_siswa = calon_siswa.id_calon_siswa 
                WHERE status_siswa = '1'
                group by kelas.id_kelas 
                order by thn_ajar")->result();

		$data = [
            'kelas' => $kelas,
			'title' => 'Pembentukan Kelas'
		];

		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_pembentukan_kelas');
		$this->load->view('template/v_footer');
	}

	public function tambah_kelas()
	{
        $thn_ajar1 = date("Y");
        $thn_ajar2 = date("Y")+1;
        $thn_ajar = $thn_ajar1."/".$thn_ajar2;

        $kelas = $this->db->query("SELECT * FROM kelas WHERE status_kelas = '0'")->result();
        $guru = $this->db->query("SELECT * FROM guru WHERE status_guru = '0'")->result();

		$data = [
            'thn_ajar1' => $thn_ajar1,
            'thn_ajar2' => $thn_ajar2,
            'guru' => $guru,
            'kelas' => $kelas,
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
            $noinduk = $this->Model->getNoInduk();
            $data = [
                'no_induk' => $noinduk,
                'nm_siswa' => $nm_siswa[$i],
                'id_kelas' => $kelas,
                'status_siswa' => '1',
                'id_guru' => $guru,
                'id_daftar' => $id_daftar[$i],
            ];

            $this->Model->update('id_kelas',$kelas,$data1 = ['status_kelas' => '1'],'kelas');
            $this->Model->update('id_guru',$guru,$data2 = ['status_guru' => '1'],'guru');
            $this->Model->simpan('siswa',$data);
        }

        echo json_encode(array("status" => TRUE));
    }
}
