<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E404 extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('Site'));
        $this->token = $this->session->userdata('token');
        date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
    }
	public function index()
	{
        $data = array(
            'page_title'    => '404 Halaman Tidak Ditemukan'
        );
		$this->load->view('404',$data);
	}

}
