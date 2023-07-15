<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('User_model','user');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}

    public function index(){
        $data = array(
			'page_title'    => "Sertifikat Check",
            'description_page'  => 'Cek sekarang dan dapatkan sertifikat untuk produk yang Anda beli di toko partner kami - Thriftex.id - Legit Check & Authentic'
		);
		$this->load->view('sertifikat-check.php',$data);
    }

	public function register(){
		$data = array(
			'page_title'    => "Upload Bukti Nota",
            'description_page'  => 'Upload Nota belanja Anda dari Toko partner kami dan dapatkan akses sertifikat resmi dari kami - Thriftex.id - Legit Check & Authentic'
		);
		$this->load->view('sertifikat-register.php',$data);
	}	
	
}
