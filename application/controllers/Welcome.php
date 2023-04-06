<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('User_model','user');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function page()
	{
		$this->load->view('index-components');
	}
	
	public function legitchcek_send_success()
	{
		$this->site->is_logged_in();
		if(!empty($this->input->get('caseid'))){
			$data = array(
				'case_id'	=> $this->input->get('caseid')
			);
			$this->load->view('legitchcek_send.php',$data);
		}else{
			$this->load->view('404.php');
		}
	}

}
