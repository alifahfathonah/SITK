<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model','Pembayaran']);
        $username = $this->session->username;
        if($username == null)
        {
            redirect('');
        }
	} 

	public function index()
	{
		$data = [
            'jenis_pembayaran' => $this->Model->getAll('jenis_pembayaran'),
			'title' => 'Pembayaran'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_pembayaran');
		$this->load->view('template/v_footer');
	}

	function getKode()
	{
		$kode = $this->Pembayaran->getKodePembayaran();
		$data = [
			'id_bayar' => $kode
		];
		echo json_encode($data);
	}

	//pembayaran list
	public function pembayaran_list()
    {
        
        $list = $this->Pembayaran->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pembayaran) {
            $no++;
            $row = array();
            $row[] = '<center>'.$pembayaran->id_bayar.'</center>';
            $row[] = '<center>'.$pembayaran->status.'</center>';

            if($pembayaran->status == "Lunas"){
                //add html for action
                $row[] = '
                    <center>
                        <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail" onclick="detail_pembayaran('."'".$pembayaran->id_bayar."'".')"><i class="glyphicon glyphicon glyphicon-folder-open"></i> Detail</a>
                        <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Cetak" onclick="cetak_pembayaran('."'".$pembayaran->id_bayar."'".')"><i class="glyphicon glyphicon glyphicon-print"></i> Cetak</a>
                    </center>';
            } else {
                //add html for action
                $row[] = '
                    <center>
                        <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail" onclick="detail_pembayaran('."'".$pembayaran->id_bayar."'".')"><i class="glyphicon glyphicon glyphicon-folder-open"></i> Detail</a>
                        <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="ubah_pembayaran('."'".$pembayaran->id_bayar."'".')" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                        <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Cetak" onclick="cetak_pembayaran('."'".$pembayaran->id_bayar."'".')"><i class="glyphicon glyphicon glyphicon-print"></i> Cetak</a>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_pembayaran('."'".$pembayaran->id_bayar."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                    </center>';
            }
         
            $data[] = $row;
        }
 
        $output = [
           	"draw" => $_POST['draw'],
            "recordsTotal" => $this->Pembayaran->count_all(),
            "recordsFiltered" => $this->Pembayaran->count_filtered(),
            "data" => $data,
        ];
        echo json_encode($output);
    }

    public function simpan()
    {	

        $jenis_pembayaran = $this->input->post('jenis_pembayaran');

        $jenis = $this->Model->get_by_id('id_jenis',$jenis_pembayaran,'jenis_pembayaran');

    	$data = [
            'id_bayar' => $this->input->post('id_bayar'),
            'status' => $jenis->nm_jenis,
            'id_daftar' => $this->input->post('id_daftar'),
        ];

        $data_detail = [
            'id_bayar' => $this->input->post('id_bayar'),
            'id_jenis' => $this->input->post('jenis_pembayaran'),
            'tgl_bayar' => date('Y-m-d'),
            'jml_bayar' => $this->input->post('nominal_bayar'),
        ];

    	$this->Model->simpan('pembayaran',$data);
        $this->Model->simpan('detail_bayar',$data_detail);
    	echo json_encode(array("status" => TRUE));
    }

    public function edit($id)
	{

        $data = $this->db->query("
            SELECT pendaftaran.id_daftar,jenis_pembayaran.id_jenis,nm_lengkap,nm_ayah,nm_ibu,thn_ajar,nm_jenis,jml_bayar 
                FROM calon_siswa 
                    JOIN pendaftaran ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa 
                    JOIN pembayaran ON pendaftaran.id_daftar = pembayaran.id_daftar 
                    JOIN detail_bayar ON pembayaran.id_bayar = detail_bayar.id_bayar 
                    JOIN jenis_pembayaran ON jenis_pembayaran.id_jenis = detail_bayar.id_jenis 
                WHERE pembayaran.id_bayar = '$id'")->row();

        echo json_encode($data);
	}

    public function id_daftar()
    {
        $id = $this->input->post('id_daftar');
        $data = $this->db->query("SELECT nm_lengkap,thn_ajar,nm_ayah,nm_ibu FROM calon_siswa JOIN pendaftaran ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa WHERE id_daftar = '$id'")->row();
        echo json_encode($data);
    }

	public function ubah()
    {	
    	$id_bayar = $this->input->post('id_bayar');

        $jenis_pembayaran = $this->input->post('jenis_pembayaran');

        $jenis = $this->Model->get_by_id('id_jenis',$jenis_pembayaran,'jenis_pembayaran');

    	$data = [
            'status' => $jenis->nm_jenis,
            'id_daftar' => $this->input->post('id_daftar_edit'),
        ];

        $data_detail = [
            'id_bayar' => $this->input->post('id_bayar'),
            'id_jenis' => $this->input->post('jenis_pembayaran'),
            'tgl_bayar' => date('Y-m-d'),
            'jml_bayar' => $this->input->post('nominal_bayar'),
        ];

    	$this->Model->update('id_bayar',$id_bayar,$data,'pembayaran');
        $this->Model->simpan('detail_bayar',$data_detail);
    	echo json_encode(array("status" => TRUE));
    }

    public function hapus($id)
	{
		$this->Model->hapus('id_bayar',$id,'pembayaran');
		echo json_encode(array("status" => TRUE));
	}

    public function detail($id)
    {
        $query = $this->db->query("
            SELECT calon_siswa.id_calon_siswa,nm_lengkap,status,thn_ajar,pembayaran.id_bayar,status,pendaftaran.id_daftar,id_jenis,tgl_bayar,jml_bayar,
                (SELECT SUM(jml_bayar) as total FROM pembayaran JOIN detail_bayar ON pembayaran.id_bayar = detail_bayar.id_bayar WHERE pembayaran.id_bayar = '$id') as total
            FROM pembayaran 
                JOIN detail_bayar ON pembayaran.id_bayar = detail_bayar.id_bayar 
                JOIN pendaftaran ON pendaftaran.id_daftar = pembayaran.id_daftar
                JOIN calon_siswa ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa
            WHERE pembayaran.id_bayar = '$id'")->result();
        echo json_encode($query);
    }

    public function cetak()
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
        $pdf->Cell(190,10,'Kwitansi Pembayaran',0,1,'C');
        
        $pdf->Cell(10,-1,'',0,1);

        // $jasa = $this->Model->lapJasa($awal,$akhir);

        // if($jasa == null) {
        //     $this->session->set_flashdata('pesanGagal','Data Tidak Ditemukan');
        //     redirect('laporan_jasa');
        // }

        $id_bayar = $this->input->post('id_bayar');

        $query = $this->db->query("
            SELECT calon_siswa.id_calon_siswa,nm_lengkap,thn_ajar,status,pembayaran.id_bayar,status,pendaftaran.id_daftar as id_dftr,id_jenis,tgl_bayar,jml_bayar,
                (SELECT SUM(jml_bayar) as total FROM pembayaran JOIN detail_bayar ON pembayaran.id_bayar = detail_bayar.id_bayar WHERE pembayaran.id_bayar = '$id_bayar') as total
            FROM pembayaran 
                JOIN detail_bayar ON pembayaran.id_bayar = detail_bayar.id_bayar 
                JOIN pendaftaran ON pendaftaran.id_daftar = pembayaran.id_daftar
                JOIN calon_siswa ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa
            WHERE pembayaran.id_bayar = '$id_bayar'")->row();

        $kwitansi = $this->db->query("
            SELECT calon_siswa.id_calon_siswa,nm_lengkap,thn_ajar,status,pembayaran.id_bayar,status,pendaftaran.id_daftar as id_dftr,id_jenis,tgl_bayar,jml_bayar,
                (SELECT SUM(jml_bayar) as total FROM pembayaran JOIN detail_bayar ON pembayaran.id_bayar = detail_bayar.id_bayar WHERE pembayaran.id_bayar = '$id_bayar') as total
            FROM pembayaran 
                JOIN detail_bayar ON pembayaran.id_bayar = detail_bayar.id_bayar 
                JOIN pendaftaran ON pendaftaran.id_daftar = pembayaran.id_daftar
                JOIN calon_siswa ON calon_siswa.id_calon_siswa = pendaftaran.id_calon_siswa
            WHERE pembayaran.id_bayar = '$id_bayar'")->result();

        $pdf->SetFont('Arial','',9);

        $pdf->Cell(25,6,'ID Pendaftaran',0,0,'L');
        $pdf->Cell(5,6,':',0,0,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(40,6,''.$query->id_dftr,0,0,'L');
        
        $pdf->SetFont('Arial','',9);        
        $pdf->Cell(55,6,'',0,0,'C');
        $pdf->Cell(40,6,'',0,0,'L');
        $pdf->Cell(5,6,'',0,0,'C');
        $pdf->Cell(20,6,'',0,1,'L');

        $pdf->Cell(25,6,'Nama Siswa',0,0,'L');
        $pdf->Cell(5,6,':',0,0,'C');
        $pdf->Cell(40,6,''.$query->nm_lengkap,0,0,'L');
            
        $pdf->Cell(55,6,'',0,0,'C');
        $pdf->Cell(40,6,'',0,0,'L');
        $pdf->Cell(5,6,'',0,0,'C');
        $pdf->Cell(20,6,'',0,1,'L');

        $pdf->Cell(25,6,'Tahun Ajaran',0,0,'L');
        $pdf->Cell(5,6,':',0,0,'C');
        $pdf->Cell(40,6,''.$query->thn_ajar,0,1,'L');

        $pdf->Cell(25,6,'Status',0,0,'L');
        $pdf->Cell(5,6,':',0,0,'C');
        $pdf->Cell(40,6,''.$query->status,0,1,'L');

        $pdf->Cell(190,5,' ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,6,'No.',1,0,'C');
        $pdf->Cell(80,6,'Tanggal Bayar',1,0,'C');
        $pdf->Cell(95,6,'Jumlah Bayar',1,1,'C');
        
        $pdf->SetFont('Arial','',8);

        $tampung = array();
        $no = 1;
        foreach($kwitansi as $data){
            $pdf->Cell(15,6,$no++.".",1,0,'C');
            $pdf->Cell(80,6,$data->tgl_bayar,1,0,'C');
            $pdf->Cell(95,6,number_format($data->jml_bayar,0,',','.'),1,1,'C');
            $tampung[] = $data->jml_bayar;
        }

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(95,6,'Total',1,0,'C');
        $pdf->Cell(95,6,''.number_format(array_sum($tampung),0,',','.'),1,1,'C');
        $pdf->SetFont('Arial','',8);

        $pdf->Cell(10,20,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'Hormat Kami',0,1,'C');

        $pdf->Cell(10,20,'',0,1);

        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'',0,0,'C');
        $pdf->Cell(63,6,'( '.ucwords($this->session->nm_admin).' )',0,0,'C');

        $fileName = 'Kwitansi_Pembayaran_'.$id_bayar.'_.pdf';
        $pdf->Output('D',$fileName);
    }
}
