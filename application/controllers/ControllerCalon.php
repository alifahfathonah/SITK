<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerCalon extends CI_Controller {

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
			'title' => 'Calon Siswa',
            'calon' => $this->Model->get2Join('pendaftaran','calon_siswa','pendaftaran.id_calon_siswa = calon_siswa.id_calon_siswa'),
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_siswa');
		$this->load->view('template/v_footer');
	}

    public function tambah_calon()
    {
        $data = [
            'title' => 'Tambah Calon Siswa'
        ];
        $this->load->view('template/v_header',$data);
        $this->load->view('template/v_sidebar');
        $this->load->view('v_calon_siswa');
        $this->load->view('template/v_footer');
    }

    
    public function simpan()
    {
        $id_calon_siswa = $this->Model->getKodeCalon();
        $thn_ajar1 = $this->input->post('thn_ajar1');
        $thn_ajar2 = $this->input->post('thn_ajar2');
        $no_induk = $this->input->post('no_induk');

        $thn_ajar = $thn_ajar1."/".$thn_ajar2;

        $data_pendaftaran = [
            'id_daftar' => $this->Model->getKodePendaftar(),
            'tgl_daftar' => date('Y-m-d'),
            'thn_ajar' => $thn_ajar,
            'no_induk' => $no_induk,
            'id_calon_siswa' => $id_calon_siswa,
        ];

        $data_calon_siswa = [
            'id_calon_siswa' => $id_calon_siswa,
            'nm_lengkap' => $this->input->post('nm_lengkap'),
            'nm_panggilan' => $this->input->post('nm_panggilan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'anak_ke' => $this->input->post('anak_ke'),
            'jml_saudara' => $this->input->post('jml_saudara'),
            'status_kandung' => $this->input->post('status_kandung'),
            'warga_negara' => $this->input->post('warga_negara'),
            'agama' => $this->input->post('agama'),
            'nm_ayah' => $this->input->post('nm_ayah'),
            'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah'),
            'tgl_lahir_ayah' => $this->input->post('tgl_lahir_ayah'),
            'agama_ayah' => $this->input->post('agama_ayah'),
            'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'penghasilan_ayah' => $this->input->post('penghasilan_ayah'),
            'alamat_ayah' => $this->input->post('alamat_ayah'),
            'kantor_ayah' => $this->input->post('kantor_ayah'),
            'no_telp_ayah' => $this->input->post('no_telp_ayah'),
            'nm_ibu' => $this->input->post('nm_ibu'),
            'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu'),
            'tgl_lahir_ibu' => $this->input->post('tgl_lahir_ibu'),
            'agama_ibu' => $this->input->post('agama_ibu'),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'penghasilan_ibu' => $this->input->post('penghasilan_ibu'),
            'alamat_ibu' => $this->input->post('alamat_ibu'),
            'kantor_ibu' => $this->input->post('kantor_ibu'),
            'no_telp_ibu' => $this->input->post('no_telp_ibu'),
        ];

        $result1 = $this->Model->simpan('calon_siswa',$data_calon_siswa);
        $result2 = $this->Model->simpan('pendaftaran',$data_pendaftaran);
        if ($result1 && $result2){
            $this->session->set_flashdata('pesan','<strong>Success!</strong> Data Berhasil Disimpan.');
            echo json_encode(array("status" => TRUE));
        }else{
            $this->session->set_flashdata('pesanGagal','<strong>Fail!</strong> Data Tidak Berhasil Disimpan.');
            echo json_encode(array("status" => FALSE));
        }
    }

    public function no_induk()
    {
        $id = $this->input->post('no_induk');
        $cari = $this->Model->get_by_id('no_induk',$id,'pendaftaran');
        if($cari == null){
            echo json_encode(array("status" => TRUE,$cari));
        } else {
            echo json_encode(array("status" => FALSE,$cari));
        }
    }

    public function edit($id)
    {
        $siswa = $this->Model->get2Join_cari('pendaftaran','calon_siswa','pendaftaran.id_calon_siswa = calon_siswa.id_calon_siswa','calon_siswa.id_calon_siswa',$id);

        $thn_ajar1 = substr($siswa->thn_ajar, 0,4);
        $thn_ajar2 = substr($siswa->thn_ajar, 5,4);

        $data = [
            'thn_ajar1' => $thn_ajar1,
            'thn_ajar2' => $thn_ajar2,
            'title' => 'Ubah Calon Siswa',
            'siswa' => $siswa,
        ];

        if($siswa == ""){
            redirect('not_found');
        }

        $this->load->view('template/v_header',$data);
        $this->load->view('template/v_sidebar');
        $this->load->view('v_edit_siswa');
        $this->load->view('template/v_footer');
    }

    public function not_found()
    {
        $this->load->view('template/not_found');
    }

    public function ubah()
    {
        $id = $this->input->post('id_calon_siswa');
        $id_daftar = $this->input->post('id_daftar');

        $thn_ajar1 = $this->input->post('thn_ajar1');
        $thn_ajar2 = $this->input->post('thn_ajar2');
        $no_induk = $this->input->post('no_induk');

        $thn_ajar = $thn_ajar1."/".$thn_ajar2;

        $data_pendaftaran = [
            'tgl_daftar' => date('Y-m-d'),
            'thn_ajar' => $thn_ajar,
            'no_induk' => $no_induk,
            'id_calon_siswa' => $id,
        ];

        $data_calon_siswa = [
            'nm_lengkap' => $this->input->post('nm_lengkap'),
            'nm_panggilan' => $this->input->post('nm_panggilan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'anak_ke' => $this->input->post('anak_ke'),
            'jml_saudara' => $this->input->post('jml_saudara'),
            'status_kandung' => $this->input->post('status_kandung'),
            'warga_negara' => $this->input->post('warga_negara'),
            'agama' => $this->input->post('agama'),
            'nm_ayah' => $this->input->post('nm_ayah'),
            'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah'),
            'tgl_lahir_ayah' => $this->input->post('tgl_lahir_ayah'),
            'agama_ayah' => $this->input->post('agama_ayah'),
            'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'penghasilan_ayah' => $this->input->post('penghasilan_ayah'),
            'alamat_ayah' => $this->input->post('alamat_ayah'),
            'kantor_ayah' => $this->input->post('kantor_ayah'),
            'no_telp_ayah' => $this->input->post('no_telp_ayah'),
            'nm_ibu' => $this->input->post('nm_ibu'),
            'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu'),
            'tgl_lahir_ibu' => $this->input->post('tgl_lahir_ibu'),
            'agama_ibu' => $this->input->post('agama_ibu'),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'penghasilan_ibu' => $this->input->post('penghasilan_ibu'),
            'alamat_ibu' => $this->input->post('alamat_ibu'),
            'kantor_ibu' => $this->input->post('kantor_ibu'),
            'no_telp_ibu' => $this->input->post('no_telp_ibu'),
        ];

        $result1 = $this->Model->update('id_calon_siswa',$id,$data_calon_siswa,'calon_siswa');
        $result2 = $this->Model->update('id_daftar',$id_daftar,$data_pendaftaran,'pendaftaran');
        if ($result1 && $result2){
            $this->session->set_flashdata('pesan','<strong>Success!</strong> Data Berhasil Disimpan.');
            echo json_encode(array("status" => TRUE));
        }else{
            $this->session->set_flashdata('pesanGagal','<strong>Fail!</strong> Data Tidak Berhasil Disimpan.');
            echo json_encode(array("status" => FALSE));
        }
    }

    public function hapus($id)
    {
        $result1 = $this->Model->hapus('id_calon_siswa',$id,'pendaftaran');
        $result2 = $this->Model->hapus('id_calon_siswa',$id,'calon_siswa');
        if ($result1 && $result2){
            $this->session->set_flashdata('pesan','<strong>Success!</strong> Data Berhasil Dihapus.');
            redirect('calon_siswa');
        }else{
            $this->session->set_flashdata('pesanGagal','<strong>Fail!</strong> Data Tidak Berhasil Dihapus.');
            redirect('calon_siswa');
        }
    }
}
