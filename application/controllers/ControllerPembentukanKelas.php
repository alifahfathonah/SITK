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

	function add_to_cart(){ //fungsi Add To Cart

		$id_calon_siswa = $this->input->post('id_calon_siswa');

		$jasa = $this->Model->getByID('jasa','kd_jasa',$kd_jasa);

		$data = [
	        'id' => $jasa->kd_jasa, 
	        'name' => $jasa->nm_jasa, 
	        'price' => $jasa->harga, 
	        'qty' => $this->input->post('qty'), 
	    ];

        $tes = $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }
 
    function show_cart(){ //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {

            $no++;
            $output .='
                <tr>
                	<td align="center">'.$no.".".'</td>
                    <td align="center">'.$items['id'].'</td>
                    <td>'.$items['name'].'</td>
                    <td align="center">'.number_format($items['price'],0,',','.').'</td>
                    <td align="center">'.$items['qty'].'</td> 
                    <td align="right">'.number_format($items['subtotal'],0,',','.').'</td>
                    <td align="center"><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-md"><i class="glyphicon glyphicon-trash"></i></button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="4"><center>TOTAL</center></th>
                <th colspan="2"> <div class="text-right">'.'Rp '.number_format($this->cart->total(),0,',','.').'</div></th>
                <th></th>
            </tr>
        ';
        return $output;
    }
 
    function load_cart(){ //load data cart
        echo $this->show_cart();
    }

    function load_detail(){ 
        foreach ($this->cart->contents() as $items) {
            $data[] = [
            	'id'=> $items['id'],
            	'name' =>$items['name'],
            	'price' =>$items['subtotal'],
            	'qty' =>$items['qty']
            ];      
        }
        echo json_encode($data);
    }
 
    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
}
