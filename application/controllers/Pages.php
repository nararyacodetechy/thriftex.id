<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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
	
	public function Term_condition()
	{
        $data = array(
            'page_title'    => "Syarat & Ketentuan",
            'description_page'  => 'Syarat & Ketentuan penggunaan layanan kami. Sebelum Anda menggunakan situs ini, harap baca dengan seksama syarat dan ketentuan penggunaan ini.'
        );
		$this->load->view('term_condition.php',$data);
	}

    public function Privacy_policy(){
        $data = array(
            'page_title'    => "Kebijakan Privasi",
            'description_page'  => 'Kebijakan Privasi layanan kami. Kami berkomitmen untuk melindungi privasi dan menjaga keamanan informasi pribadi Anda.'
        );
		$this->load->view('privacy_policy.php',$data); 
    }
    public function About_us(){
        $data = array(
            'page_title'    => "Tentang Kami",
            // 'description_page'  => 'Kebijakan Privasi layanan kami. Kami berkomitmen untuk melindungi privasi dan menjaga keamanan informasi pribadi Anda.'
        );
		$this->load->view('about_us.php',$data); 
    }

    public function Faq(){
        $data = array(
            'page_title'    => "Tentang Kami",
            // 'description_page'  => 'Kebijakan Privasi layanan kami. Kami berkomitmen untuk melindungi privasi dan menjaga keamanan informasi pribadi Anda.'
        );
		$this->load->view('faq.php',$data); 
    }
	

	
}
