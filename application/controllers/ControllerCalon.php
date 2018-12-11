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

        $query = $this->db->query("SELECT * FROM pendaftaran JOIN calon_siswa ON pendaftaran.id_calon_siswa = calon_siswa.id_calon_siswa ORDER BY pendaftaran.id_daftar DESC")->result();

		$data = [
			'title' => 'Calon Siswa',
            'calon' => $query,
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_siswa');
		$this->load->view('template/v_footer');
	}

    public function simpan_formulir()
    {
        $nm_penerima = $this->input->post('nm_penerima');
        $biaya = $this->input->post('biaya');
        $tgl_cetak = date('Y-m-d');

        $data = [
            'nm_penerima' => $nm_penerima,
            'biaya' => $biaya,
            'tgl_cetak' => $tgl_cetak,
        ];

        $result = $this->Model->simpan('formulir',$data);
    }

    public function cetak_formulir()
    {
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        
        // mencetak string
        $pdf->Cell(186,10,'TK ISLAM TUNAS HARAPAN',0,1,'C');
        $pdf->Cell(9,1,'',0,1);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(186,7,'Jl. Masjid Darul Fallah, RT.8/RW.2, Petukangan Utara, Pesanggrahan, Kota Jakarta Selatan, ',0,1,'C');
        $pdf->Cell(186,3,'Daerah Khusus Ibukota Jakarta 12260',0,1,'C');
        $pdf->Cell(186,5,'',0,1,'C');

        $pdf->Line(10, 42, 210-11, 42); 
        $pdf->SetLineWidth(0.5); 
        $pdf->Line(10, 42, 210-11, 42);
        $pdf->SetLineWidth(0);     
            
        $pdf->ln(6);        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,10,'Kwitansi Formulir',0,1,'C');
        
        $pdf->Cell(10,-1,'',0,1);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(10,5,'',0,1);

        $nm_penerima = $this->input->post('nm_penerima');
        $biaya = $this->input->post('biaya');

        $query = $this->db->query("SELECT id_formulir,nm_penerima,biaya FROM formulir ORDER BY id_formulir DESC")->row();

        $pdf->Cell(25,6,'Nomor Formulir',0,0,'L');
        $pdf->Cell(5,6,':',0,0,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(40,6,''.$query->id_formulir,0,1,'L');
        
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(25,21,'Penerima',0,0,'L');
        $pdf->Cell(5,21,':',0,0,'C');
        $pdf->Cell(40,21,' '.$query->nm_penerima,0,1,'L');

        $pdf->Cell(25,15,'Biaya',0,0,'L');
        $pdf->Cell(5,15,':',0,0,'C');
        $pdf->Cell(40,15,'Rp. '.number_format($query->biaya,0,',','.'),0,1,'L');

        $pdf->Cell(10,9,'',0,1); 
        $pdf->Line(40,61,155,61);
        $pdf->Rect(40,68,150,10);
        $pdf->Rect(40,85,150,10);

        $tahun = date('Y'); 
        $ajaran = date('Y')+1; 
        $tahun_ajaran = $tahun.'/'.$ajaran;

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(25,2,'Deskripsi',0,0,'L');
        $pdf->Cell(5,2,':',0,0,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(40,1,'Uang pendaftaran murid baru TK Islam / TPA Tunas Harapan Petukangan Utara Pesanggrahan',0,1,'L');

        $pdf->Cell(25,0,'',0,0,'L');
        $pdf->Cell(5,0,'',0,0,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(40,10,'Jakarta, tahun pelajaran : '.$tahun_ajaran,0,1,'L');

        $pdf->Cell(10,15,'',0,1);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,5,'Jakarta, '.date_indo(date("Y-m-d")),0,1,'C');
        $pdf->Cell(63,2,'',0,0,'C');
        $pdf->Cell(63,2,'',0,0,'C');
        $pdf->Cell(63,6,'Panitia PMB',0,1,'C');
        
        $pdf->Cell(10,20,'',0,1);

        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'( '.ucwords($this->session->nm_admin).' )',0,0,'C');

        $fileName = 'Kwitansi_Formulir_'.$query->id_formulir.'_.pdf';
        $pdf->Output('D',$fileName); 

        echo json_encode(array("status" => TRUE));
    }

    public function tambah_calon()
    {
        $data = [
            'title' => 'Tambah Calon Siswa',
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
            echo json_encode(array("status" => TRUE));
        }else{
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
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode(array("status" => FALSE));
        }
    }

    public function hapus($id)
    {
        $result1 = $this->Model->hapus('id_calon_siswa',$id,'pendaftaran');
        $result2 = $this->Model->hapus('id_calon_siswa',$id,'calon_siswa');
        if ($result1 && $result2){
            redirect('calon_siswa');
        }else{
            redirect('calon_siswa');
        }
    }

    public function cetak($id_calon_siswa)
    {
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        
        // mencetak string
        $pdf->Cell(186,10,'TK ISLAM TUNAS HARAPAN',0,1,'C');
        $pdf->Cell(9,1,'',0,1);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(186,7,'Jl. Masjid Darul Fallah, RT.8/RW.2, Petukangan Utara, Pesanggrahan, Kota Jakarta Selatan, ',0,1,'C');
        $pdf->Cell(186,3,'Daerah Khusus Ibukota Jakarta 12260',0,1,'C');
        $pdf->Cell(186,5,'',0,1,'C');

        $pdf->Line(10, 42, 210-11, 42); 
        $pdf->SetLineWidth(0.5); 
        $pdf->Line(10, 42, 210-11, 42);
        $pdf->SetLineWidth(0);     
            
        $pdf->ln(6);        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,1,'',0,1);
        $pdf->Cell(190,10,'Kwitansi Pendaftaran ',0,1,'C');
        
        $pdf->Cell(10,-1,'',0,1);

        $calon_siswa = $this->db->query("SELECT * FROM calon_siswa JOIN pendaftaran ON calon_siswa.id_calon_siswa = pendaftaran. id_calon_siswa WHERE calon_siswa.id_calon_siswa = '$id_calon_siswa' ")->row();

        $pdf->SetFont('Arial','',9);

        $pdf->Cell(25,6,'ID Pendaftaran',0,0,'L');
        $pdf->Cell(5,6,':',0,0,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(40,6,''.$calon_siswa->id_daftar,0,0,'L');
        
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(55,6,'',0,0,'C');
        $pdf->Cell(40,6,'',0,0,'L');
        $pdf->Cell(5,6,'',0,0,'C');
        $pdf->Cell(20,6,'',0,1,'L');

        $pdf->Cell(25,6,'Nama Siswa',0,0,'L');
        $pdf->Cell(5,6,':',0,0,'C');
        $pdf->Cell(40,6,''.$calon_siswa->nm_lengkap,0,0,'L');
        
        $pdf->Cell(55,6,'',0,0,'C');
        $pdf->Cell(40,6,'',0,0,'L');
        $pdf->Cell(5,6,'',0,0,'C');
        $pdf->Cell(20,6,'',0,1,'L');

        $pdf->Cell(25,6,'Tahun Ajaran',0,0,'L');
        $pdf->Cell(5,6,':',0,0,'C');
        $pdf->Cell(40,6,''.$calon_siswa->thn_ajar,0,1,'L');

        $pdf->Cell(190,5,' ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,6,'No.',1,0,'C');
        $pdf->Cell(175,6,'Pembayaran',1,1,'C');
        $pdf->SetFont('Arial','',8);

        $pdf->Cell(15,6,"1.",1,0,'C');
        $pdf->Cell(175,6,"Uang gedung",1,1);

        $pdf->Cell(15,6,"2.",1,0,'C');
        $pdf->Cell(175,6,"Seragam 5 stel",1,1);

        $pdf->Cell(15,6,"3.",1,0,'C');
        $pdf->Cell(175,6,"Buku dan alat-alat pendidikan",1,1);

        $pdf->Cell(15,6,"4.",1,0,'C');
        $pdf->Cell(175,6,"Administrasi",1,1);

        $pdf->Cell(15,6,"5.",1,0,'C');
        $pdf->Cell(175,6,"Buku raport",1,1);

        $pdf->Cell(15,6,"6.",1,0,'C');
        $pdf->Cell(175,6,"Pas foto",1,1);

        $pdf->Cell(15,6,"7.",1,0,'C');
        $pdf->Cell(175,6,"SPP bulan juli",1,1);

        $pdf->Cell(15,6,"8.",1,0,'C');
        $pdf->Cell(175,6,"Manasik haji",1,1);

        $pdf->Cell(15,6,"9.",1,0,'C');
        $pdf->Cell(175,6,"Tes IQ (kecerdasan)",1,1);

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(110,6,"Total",1,0,'C');
        $pdf->Cell(80,6,"Rp. 2.100.000",1,0,'C');

        $terbilang = "Dua Juta Seratus Ribu Rupiah";

        $pdf->Cell(1,20,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(18,0,'Terbilang : ',0,0);
        $pdf->SetFont('Arial','I',8);
        $pdf->Cell(1,0,''.$terbilang,0,1);

        $pdf->Cell(10,20,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'Hormat Kami',0,1,'C');

        $pdf->Cell(10,20,'',0,1);

        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'( '.ucwords($this->session->nm_admin).' )',0,0,'C');

        $fileName = 'Kwitansi_Pembayaran_'.$calon_siswa->id_daftar.'_.pdf';
        $pdf->Output('D',$fileName); 
    }
}
