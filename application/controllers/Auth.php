<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model','user');
        date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
    }

    public function viewlogin(){
        $this->load->view('login.php');
    }

	public function login()
	{
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data_login = [
            'email' => $email,
            'password'  => $password
        ];
		$cek_login = $this->user->cek_login($data_login);
        if($cek_login['status'] == true){
            $data_login = array(
                'login' => true,
                'uid'   => $cek_login['uid'],
                'token' => $cek_login['token']
            );
            $this->session->set_userdata($data_login);
            $response = array(
                'status' => true,
                'redirect_url'  => base_url('profile')
            );
        }else{
            $response = array(
                'status' => $cek_login['status'],
                'msg'   => $cek_login['message']
            );
        }
        echo json_encode($response);
	}

    public function register(){
        $response = array(
            'status' => false,
            'msg'   => 'Unknow error!'
        );
        $post = $this->input->post();
        $data_regis = [
            'nama'  => $post['nama'],
            'email'  => $post['email'],
            'password'  => $post['password'],
            'passconf'  => $post['passconf'],
        ];
        $regis = $this->user->register($data_regis);
        if($regis['status'] == true){
            $response = array(
                'status' => true,
                'msg'   => $regis['message']
            );
        }else{
            $response = array(
                'status' => $regis['status'],
                'msg'   => $regis['message'],
                'data'  => $regis['error_data']
            );
        }
        echo json_encode($response);
    }

    public function register_validator(){
        $response = array(
            'status' => false,
            'msg'   => 'Unknow error!'
        );
        $post = $this->input->post();
        $data_regis = [
            'nama'  => $post['nama'],
            'email'  => $post['email'],
            'password'  => $post['password'],
            'passconf'  => $post['passconf'],
            'role'      => 'validator',
            'validator_brand_id'    => $post['validator_brand_id']
        ];
        $regis = $this->user->register($data_regis);
        // var_dump($regis);
        if($regis['status'] == true){
            $response = array(
                'status' => true,
                'msg'   => $regis['message'],
                'redirect_url' => base_url('profile')
            );
        }else{
            $response = array(
                'status' => $regis['status'],
                'msg'   => $regis['message'],
                'data'  => $regis['error_data']
            );
        }
        echo json_encode($response);
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect(base_url());
    }

    public function validator_register(){
        $this->load->view('register_validator.php');
    }

}
