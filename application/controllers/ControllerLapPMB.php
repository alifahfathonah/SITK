<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLapPMB extends CI_Controller {

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
			'title' => 'Laporan Penerimaan Murid Baru'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('laporan/v_pmb');
		$this->load->view('template/v_footer');
	}

	public function cetak()
	{
		$thn_ajar1 = $this->input->post('thn_ajar1');
		$thn_ajar2 = $this->input->post('thn_ajar2');

		$tahun_ajaran = $thn_ajar1."/".$thn_ajar2;

		$query = $this->db->query("
            SELECT * FROM calon_siswa 
                JOIN pendaftaran ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa 
                JOIN pembayaran ON pembayaran.id_daftar = pendaftaran.id_daftar
            WHERE thn_ajar =  '$tahun_ajaran' AND status = 'Lunas'")->result();

		if($query == null){
			$this->session->set_flashdata('pesanGagal','<strong>Gagal !</strong> Data Tidak Ditemukan.');
			redirect('laporan_pmb');
		}

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
        $pdf->Cell(190,10,'Data Murid Baru Tahun Ajaran '.$tahun_ajaran,0,1,'C');
        
        $pdf->Cell(10,-1,'',0,1);

        $pdf->SetFont('Arial','',9);

        $pdf->Cell(190,5,' ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,6,'No.',1,0,'C');
        $pdf->Cell(70,6,'Nama',1,0,'C');
        $pdf->Cell(50,6,'Tanggal Lahir',1,0,'C');
        $pdf->Cell(55,6,'Jenis Kelamin',1,1,'C');
        
        $pdf->SetFont('Arial','',8);

        $no = 1;
        foreach($query as $data){
            $pdf->Cell(15,6,$no++.".",1,0,'C');
            $pdf->Cell(70,6,$data->nm_lengkap,1,0);
            $pdf->Cell(50,6,$data->tgl_lahir,1,0,'C');
            $pdf->Cell(55,6,$data->jenis_kelamin,1,1,'C');
        }

        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(63,6,'Kepala Sekolah',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(64,6,'Hormat Kami',0,1,'C');

        $pdf->Cell(10,20,'',0,1);

        $pdf->Cell(63,6,'( ..................................... )',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(64,6,'( '.ucwords($this->session->nm_admin).' )',0,0,'C');

        $fileName = 'LAPORAN_PMB_'.$tahun_ajaran.'.pdf';
        $pdf->Output('D',$fileName);
	}
}
