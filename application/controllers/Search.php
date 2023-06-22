<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('Legit_model','legit');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}
	
	public function index(){
        $post = $this->input->post();
        $this->site->is_logged_in();
		$token = $this->session->userdata('token');
        $data = array(
            'query'  => $post['query'],
        );
        $response = $this->legit->searchlegit($token,$data);
        echo json_encode($response);
    }
	
	
}
