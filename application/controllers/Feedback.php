<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

    private $token;
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('Site'));
        $this->token = $this->session->userdata('token');
        $this->load->model('Feedback_model','feedback');
        date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
    }

    public function index(){
        $post = $this->input->post();
        $this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$checkuser = $this->user->checkuser($token)['data'];
        $data_feedback = array(
            'nama'  => $checkuser['nama'],
            'email' => $checkuser['email'],
            'subjek'  => 'Pesan Masukan Baru',
            'isi_pesan'  => $post['feedback_txt'],
        );
        // $response = array(
        //     'status'	=> true,
        //     'msg'	=> 'Email berhasil dikirim'
        // );
        $response = $this->feedback->feedbacksend($token,$data_feedback);
        echo json_encode($response);
    }


}