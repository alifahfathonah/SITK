<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPengaturan extends CI_Controller {

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
			'title' => 'Pengaturan'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_pengaturan');
		$this->load->view('template/v_footer');
	}

    public function ubah()
    {
        $id = $this->input->post('id_admin');

        $password = $this->input->post('password');

        if($password == null){
            $data = [
                'username' => $this->input->post('username'),
                'nm_user' => $this->input->post('nm_admin'),
                'email' => $this->input->post('email'),
            ];    
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'nm_user' => $this->input->post('nm_admin'),
                'email' => $this->input->post('email'),
                'password' => md5($password),
            ];
        }

        $this->Model->update('id_user',$id,$data,'user');
        echo json_encode(array("status" => TRUE));
    }

}
