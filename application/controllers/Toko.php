<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('Toko_model','toko');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}

    public function index(){
        $data = array(
			'page_title'    => "List Toko Official",
            'description_page'  => ''
		);
		$this->load->view('include/header.php',$data);
		$this->load->view('toko/data-toko.php',$data);
		$this->load->view('include/footer.php',$data);
    }

    public function saveregister(){
        $response['status'] = false;
        $response['msg'] = 'Terjadi Kesalahan, silahkan ulangi kembali';
        $data = $this->input->post();
        if(!empty($data['id_user'])){
            $regis = $this->toko->register($data);
            if(!empty($regis)){
                if(is_array($regis)){
                    if($regis['status'] == true){
                        $response = array(
                            'status' => true,
                            'msg'   => $regis['message'],
                            'data'  => $regis['data']
                        );
                        $kodeqr = $response['data']['toko_code'];
                        if($kodeqr){
                            $filename = 'qrcode/'.$kodeqr;
                            if (!file_exists($filename)) { 
                                $this->load->library('ciqrcode');
                                $params['data'] = encr($kodeqr);
                                $params['level'] = 'H';
                                $params['size'] = 10;
                                $params['savename'] = FCPATH.'qrcode/'.$kodeqr.".png";
                                $this->ciqrcode->generate($params);
                            }
                        }
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
        }else{
            $response['status'] = false;
            $response['msg'] = 'Mohon Pilih Akun Toko!';
        }
        echo json_encode($response);
    }

    public function updateregister(){
        $response['status'] = false;
        $response['msg'] = 'Terjadi Kesalahan, silahkan ulangi kembali';
        $data = $this->input->post();
        $regis = $this->toko->registerupdate($data);
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

    public function hapustoko(){
        $id = $this->input->post('idtoko');
        $data = [
            'id' => $id
        ];
        $delete = $this->toko->deletetoko($data);
        $filePath = FCPATH.'qrcode/'.$this->input->post('tokocode').".png";
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        echo json_encode($delete);
    }

    public function listtoko(){
        $this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$param = $this->input->get();
		$response = $this->toko->getTokolist($token,$param,'user');
		echo json_encode($response);
    }

	
}
