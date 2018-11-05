<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerDashboard extends CI_Controller {

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
			'title' => 'Dashboard'
		];
		$this->load->view('template/v_header',$data);
		$this->load->view('template/v_sidebar');
		$this->load->view('template/index');
		$this->load->view('template/v_footer');
	}
}
