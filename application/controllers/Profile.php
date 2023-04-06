<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
	
	public function profile()
	{
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$checkuser = $this->user->checkuser($token)['data'];
		// $validator_data_summary = $this->validator->summaryData($token,$checkuser['validator_brand_id']);

		$token = $this->session->userdata('token');
        $legit_list1 = $this->legit->validator_do($token,'');
        $legit_list3 = $this->legit->validator_do($token,'complete');
		$validator_data_summary = array(
			'total_baru'	=> count($legit_list1['data']),
			'total_proses'	=> 0,
			'total_selesai'	=> count($legit_list3['data']),
		);
		$dataAdmin = [];

		if($checkuser['role'] == 'admin'){
			$data_summary_admin = $this->legit->get_summary_admin($token)['data'];
			$dataAdmin['total_user'] = $data_summary_admin['total_user'];
			$dataAdmin['total_validator'] = $data_summary_admin['total_validator'];
			$dataAdmin['total_legit_success'] = $data_summary_admin['total_legit_success'];
		}


		$data = array(
			'nama' => $checkuser['nama'],
			'username' => $checkuser['username'],
			'role'	=> $checkuser['role'],
			'usercode'	=> $checkuser['user_code'],
			'validator_brand_id' => $checkuser['validator_brand_id'],
			'validator_summary_count' => $validator_data_summary,
			'dataAdmin' => $dataAdmin
		);
		$this->load->view('profile.php',$data);
	}
	

	public function profile_legit(){
        $token = $this->session->userdata('token');
        $legit_list = $this->legit->getLegitList($token);
        $data = array(
            'list_legit'    => $legit_list
        );
		$this->load->view('profile_legit.php',$data);
	}
}
