<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('User_model','user');
		$this->load->model('Legit_model','legit');
		$this->load->model('Validator_model','validator');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}
	
	public function list(){
        $this->site->is_logged_in();
		$token = $this->session->userdata('token');
        $this->load->view('userlist.php');
    }
	
	public function listshow(){
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$param = $this->input->get();
		$response = $this->user->getUserList($token,$param,'user');
		echo json_encode($response);
	}
}
