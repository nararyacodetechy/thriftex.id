<?php

use Google\Service\HangoutsChat\GoogleAppsCardV1Column;

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('User_model','user');
		$this->load->model('Legit_model','legit');
		$this->load->model('Validator_model','validator');
		$this->load->model('Sertif_model','sertif');
		$this->load->model('Barcode_model','barcode');
		$this->load->model('Toko_model','toko');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}
	
	public function profile()
	{
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$checkuser = $this->user->checkuser($token)['data'];
		// $validator_data_summary = $this->validator->summaryData($token,$checkuser['validator_brand_id']);
        $legit_list1 = $this->legit->validator_do($token,'');
        $legit_list2 = $this->legit->validator_do($token,'processing');
        $legit_list3 = $this->legit->validator_do($token,'complete');
		$validator_data_summary = array(
			'total_baru'	=> (!empty($legit_list1['data'])) ? count($legit_list1['data']) : 0,
			'total_proses'	=> (!empty($legit_list2['data'])) ? count($legit_list2['data']) : 0,
			'total_selesai'	=> (!empty($legit_list3['data'])) ? count($legit_list3['data']) : 0,
		);
		$dataAdmin = [];

		if($checkuser['role'] == 'admin'){
			$data_summary_admin = $this->legit->get_summary_admin($token)['data'];
			$dataAdmin['total_user'] = $data_summary_admin['total_user'];
			$dataAdmin['total_validator'] = $data_summary_admin['total_validator'];
			// $dataAdmin['total_legit_success'] = $data_summary_admin['total_legit_success'];

        	$total_legit = $this->legit->get_total_legit($token);
			$dataAdmin['total_legit_success'] = $total_legit['total'];
		}

		$data = array(
			'nama' => $checkuser['nama'],
			'username' => $checkuser['username'],
			'role'	=> $checkuser['role'],
			'usercode'	=> $checkuser['user_code'],
			'validator_brand_id' => $checkuser['validator_brand_id'],
			'validator_summary_count' => $validator_data_summary,
			'dataAdmin' => $dataAdmin,
			'total_req_sertif' => (!empty($this->sertif->total_pending($token)['total'])) ? $this->sertif->total_pending($token)['total'] : '0',
			'total_req_qrcode' => (!empty($this->barcode->total_pending($token)['total'])) ? $this->barcode->total_pending($token)['total'] : '0',
			'page_title'    => "Halaman Profile Pengguna",
            'description_page'  => 'Halaman Profile Pengguna - Thriftex.id - Legit Check & Authentic'
		);
		$this->load->view('profile.php',$data);
	}
	

	public function qrcodecheck(){
		$this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $data = array(
			'page_title'    => "Sertifikat Saya",
            'description_page'  => ''
        );
		$this->load->view('include/header.php',$data);
		$this->load->view('qrcode-admin/qrcode-check.php',$data);
		$this->load->view('include/footer.php',$data);
	}
	public function list_qrcode_new(){
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$param = $this->input->get();
		$response = $this->barcode->getQrcodeListAdmin($token,$param,'pending');
		echo json_encode($response);
	}
	public function konfirmasiqrcode(){
		$data = $this->input->post();
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$status = [
			'id_barcode' => $data['bID'],
			'payment_status' => $data['aksi'],
		];
		$response = $this->barcode->updatestatus($token,$status);
		echo json_encode($response);
	}

	public function profile_legit(){
		$this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $legit_list = $this->legit->getLegitList($token);
        $data = array(
            'list_legit'    => $legit_list,
			'page_title'    => "Legit Check Saya",
            'description_page'  => 'Halaman Profile Pengguna - Thriftex.id - Legit Check & Authentic'
        );
		$this->load->view('profile_legit.php',$data);
	}

	public function sertifikat(){
		$this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $legit_list = $this->sertif->getSertifList($token);
        $data = array(
            'list_sertif'    => $legit_list,
			'page_title'    => "Sertifikat Saya",
            'description_page'  => ''
        );
		$this->load->view('profile_sertifikat.php',$data);
	}

	public function sertifcheck(){
		$this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $data = array(
			'page_title'    => "Sertifikat Saya",
            'description_page'  => ''
        );
		$this->load->view('include/header.php',$data);
		$this->load->view('sertif-admin/sertif-check.php',$data);
		$this->load->view('include/footer.php',$data);
	}

	public function list_sretif_new(){
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$param = $this->input->get();
		$response = $this->sertif->getSertifListAdmin($token,$param,'new');
		echo json_encode($response);
	}
	public function validatedsave(){
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$response['status'] = false;
        $response['msg'] = 'Terjadi Kesalahan, silahkan ulangi kembali';
        $data = $this->input->post();
        $regis = $this->sertif->sertifupdate($data,$token);
		// var_dump($regis);
        if(!empty($regis)){
            if(is_array($regis)){
                if($regis['status'] == true){
                    $response = array(
                        'status' => true,
                        'msg'   => $regis['message'],
                        'data'  => $regis['data']
                    );
                }else{
                    $response = array(
                        'status' => $regis['status'],
                        'msg'   => $regis['message'],
                        'data'  => $regis['error_data']
                    );
                }
            }else{
                if($regis->status == true){
                    $response = array(
                        'status' => true,
                        'msg'   => $regis->message
                    );
                }else{
                    $response = array(
                        'status' => $regis->status,
                        'msg'   => $regis->message,
                        'data'  => $regis->error_data
                    );
                }
            }
        }else{
            $response = array(
                'status' => false,
                'msg'   => 'Register gagal,terjadi kesalahan sistem'
            );
        }
        echo json_encode($response);
	}

	public function data_sertifikat(){
		$this->site->is_logged_in();
        $token = $this->session->userdata('token');
		$param = $this->input->get();
		$response = $this->toko->getTokoPublic($token,$param,'user');
		$list_toko = $response['list_toko'];
        $data = array(
			'page_title'    => "Sertifikat Saya",
            'description_page'  => '',
			'data_toko' => $list_toko
        );
		$this->load->view('include/header.php',$data);
		$this->load->view('sertif-admin/sertif-list.php',$data);
		$this->load->view('include/footer.php',$data);
	}

	public function edit(){
		$this->site->is_logged_in();
        $token = $this->session->userdata('token');
		$checkuser = $this->user->checkuser($token)['data'];
        $data = array(
			'data_user' => $checkuser,
			'page_title'    => "Edit Profile",
            'description_page'  => '',
        );
		$this->load->view('profile_edit.php',$data);
	}
	public function checkusername(){
		$this->site->is_logged_in();
		$data = $this->input->post();
		$token = $this->session->userdata('token');
		$checkuser = $this->user->checkusername($token,$data);
		echo json_encode($checkuser);
	}
	public function saveeditprofile(){
		$this->site->is_logged_in();
		$data = $this->input->post();
		$token = $this->session->userdata('token');
		$send = $this->user->saveProfile($token,$data);
		if($send['status'] == true){
			redirect(base_url('profile/edit'));
		}
	}


}
