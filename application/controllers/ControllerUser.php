<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerUser extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model','User']);
        $username = $this->session->username;
        if($username == null){
            redirect('');
        }

        if($this->session->id_guru != null){
            redirect('dashboard');
        }
	} 

	public function index()
	{
		$data = [
			'title' => 'User',
            'guru' => $this->Model->getAll('guru'),
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_user');
		$this->load->view('template/v_footer');
	}

	function getKode()
	{
		$kode = "";
		$data = [
			'id_user' => $kode
		];
		echo json_encode($data);
	}

	//user list
	public function user_list()
    {
        $list = $this->User->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $nomor = 1;
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<center>'.$nomor++ .'.'.'</center>';
            $row[] = '<center>'.$user->username.'</center>';
            $row[] = '<center>'.ucwords($user->nm_user).'</center>';
            $row[] = '<center>'.$user->email.'</center>';
 
            //add html for action
            $row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="ubah_user('."'".$user->id_user."'".')" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_user('."'".$user->id_user."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a></center>';
         
            $data[] = $row;
        }
 
        $output = [
           	"draw" => $_POST['draw'],
            "recordsTotal" => $this->User->count_all(),
            "recordsFiltered" => $this->User->count_filtered(),
            "data" => $data,
        ];
        echo json_encode($output);
    }

    public function simpan()
    {	
        $id_guru = $this->input->post('id_guru');
    	
        if($id_guru == ""){
            $data = [
                'username' => $this->input->post('username'),
                'nm_user' => $this->input->post('nm_user'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
            ];
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'nm_user' => $this->input->post('nm_user'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'id_guru' => $id_guru,
            ];
        }

    	$this->Model->simpan('user',$data);
    	echo json_encode(array("status" => TRUE));
    }

    public function edit($id)
	{
		$data = $this->Model->get_by_id('id_user',$id,'user');
		echo json_encode($data);
	}

    public function cari()
    {
        $username = $this->input->post('username');
        $data = $this->db->query("SELECT nm_user,email,username,id_user FROM user WhERE username = '$username'")->row();

        echo json_encode($data);
    }

    public function cari_email()
    {
        $email = $this->input->post('email');
        $data = $this->db->query("SELECT nm_user,email,username,id_user FROM user WhERE email = '$email'")->row();

        echo json_encode($data);
    }

	public function ubah()
    {	
    	$id_user = $this->input->post('id_user_update');
        $password = $this->input->post('password_update');
        $id_guru = $this->input->post('id_guru_update');

        if($id_guru == ""){
            $id_guru = null;
        }

        if($password == null){
            $data = [
                'username' => $this->input->post('username_update'),
                'nm_user' => $this->input->post('nm_user_update'),
                'email' => $this->input->post('email_update'),
                'id_guru' => $id_guru,
            ];
        } else {
            $data = [
                'username' => $this->input->post('username_update'),
                'nm_user' => $this->input->post('nm_user_update'),
                'email' => $this->input->post('email_update'),
                'password' => md5($password),
                'id_guru' => $id_guru,
            ];
        }

    	$this->Model->update('id_user',$id_user,$data,'user');
    	echo json_encode(array("status" => TRUE));
    }

    public function hapus($id)
	{
		$this->Model->hapus('id_user',$id,'user');
		echo json_encode(array("status" => TRUE));
	}

}
