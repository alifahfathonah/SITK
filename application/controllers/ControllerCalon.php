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
			'title' => 'Calon Siswa'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('v_calon_siswa');
		$this->load->view('template/v_footer');
	}

}
