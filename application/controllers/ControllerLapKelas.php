<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLapKelas extends CI_Controller {

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
			'title' => 'Laporan Data Kelas',
            'kelas' => $this->Model->getAll('kelas'),
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('laporan/v_lap_kelas');
		$this->load->view('template/v_footer');
	}

	public function cetak()
	{
		$thn_ajar1 = $this->input->post('thn_ajar1');
		$thn_ajar2 = $this->input->post('thn_ajar2');
        $kelas = $this->input->post('kelas');

		$tahun_ajaran = $thn_ajar1."/".$thn_ajar2;

		$query = $this->db->query("
            SELECT nm_siswa,calon_siswa.jenis_kelamin,status_siswa, calon_siswa.tgl_lahir as tgl_lahir FROM calon_siswa
                JOIN pendaftaran ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa
                JOIN siswa ON siswa.id_daftar = pendaftaran.id_daftar
                JOIN kelas ON kelas.id_kelas = siswa.id_kelas
                JOIN guru on guru.id_guru = siswa.id_guru
            WHERE kelas.id_kelas = '$kelas' AND pendaftaran.thn_ajar = '$tahun_ajaran'
            ")->result();

		if($query == null){
			$this->session->set_flashdata('pesanGagal','<strong>Gagal !</strong> Data Tidak Ditemukan.');
			redirect('laporan_pmb');
		}

        $nama_kelas = $this->db->query("SELECT nm_kelas FROM kelas WHERE id_kelas = '$kelas'")->row();

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
        $pdf->Cell(190,10,'Laporan Data '.ucwords($nama_kelas->nm_kelas).' Tahun Ajaran '.$tahun_ajaran,0,1,'C');
        
        $pdf->Cell(10,-1,'',0,1);

        $pdf->SetFont('Arial','',9);

        $pdf->Cell(190,5,' ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,6,'No.',1,0,'C');
        $pdf->Cell(70,6,'Nama',1,0,'C');
        $pdf->Cell(45,6,'Jenis Kelamin',1,0,'C');
        $pdf->Cell(30,6,'Umur',1,0,'C');
        $pdf->Cell(30,6,'Status',1,1,'C');
        
        $pdf->SetFont('Arial','',8);

        $no = 1;
        foreach($query as $data){
            $pdf->Cell(15,6,$no++.".",1,0,'C');
            $pdf->Cell(70,6,$data->nm_siswa,1,0);
            $tanggal_lahir = date('Y')-substr($data->tgl_lahir, 0,4);
            $pdf->Cell(45,6,$data->jenis_kelamin,1,0,'C');
            $pdf->Cell(30,6,$tanggal_lahir.' Tahun',1,0,'C');
            if($data->status_siswa = '0'){
                $pdf->Cell(30,6,'Tidak Aktif',1,1,'C');
            } else {
                $pdf->Cell(30,6,'Aktif',1,1,'C');
            }
        }

        $data = $this->db->query("SELECT nm_guru FROM guru JOIN siswa ON siswa.id_guru = guru.id_guru AND siswa.id_kelas = '$kelas' group by nm_guru")->row();

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,15,'Guru',0,0,'L');
        $pdf->Cell(3,15,':',0,0,'C');
        $pdf->Cell(40,15,''.$data->nm_guru,0,1,'L');

        $pdf->Cell(10,15,'',0,1);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,5,'Jakarta, '.date_indo(date("Y-m-d")),0,1,'C');
        $pdf->Cell(63,2,'',0,0,'C');
        $pdf->Cell(63,2,'',0,0,'C');
        $pdf->Cell(63,6,'Hormat Kami',0,1,'C');
        
        $pdf->Cell(10,20,'',0,1);

        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'( '.ucwords($this->session->nm_admin).' )',0,0,'C');

        $fileName = 'LAPORAN_DATA_'.strtoupper($nama_kelas->nm_kelas).'_'.$tahun_ajaran.'.pdf';
        $pdf->Output('D',$fileName);
	}
}
