<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tokoqr extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('Toko_model','toko');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}

    public function index($url_toko){
        if($url_toko == 'hermosa'){
            $data = array(
                'page_title'    => "Hermosa",
                'description_page'  => ''
            );
            $this->load->view('include/header_qr.php',$data);
            $this->load->view('tokoqr/index_qr.php',$data);
            $this->load->view('include/footer_qr.php',$data);
        }else{
            $this->load->view('404');
        }
    }

	
}
