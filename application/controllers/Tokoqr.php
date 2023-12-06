<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tokoqr extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('Toko_model','toko');
		$this->load->model('Barcode_model','barcode');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}

    public function index($url_toko,$kode_qr){
        // echo 'asdsa';
        // $cek_toko = $this->barcode->cek_url_toko($url_toko);
        // var_dump($cek_toko);
        $code = $kode_qr;
        $cek_url_toko = $this->barcode->barcode_profile_cek_url($url_toko,$code);
        // var_dump($cek_url_toko);
        // die;
        if(isset($cek_url_toko['status']) && $cek_url_toko['status'] == true){
            $data = array(
                'page_title'    => $cek_url_toko['data']['profile']['nama_brand'],
                'page_data'     => $cek_url_toko['data'],
                'page_full_url' => base_url($url_toko.'/'.$kode_qr),
                'is_home'       => true,
                'description_page'  => ''
            );
            $this->load->view('include/header_qr.php',$data);
            $this->load->view('tokoqr/index_qr.php',$data);
            $this->load->view('include/footer_qr.php',$data);
        }else{
            $this->load->view('404');
        }
    }


    public function akun(){
        $data = array(
			'page_title'    => "List Akun Brand",
            'description_page'  => ''
		);
		$this->load->view('include/header.php',$data);
		$this->load->view('tokoqr/data-toko.php',$data);
		$this->load->view('include/footer.php',$data);
    }

    public function listtoko_brand(){
        $this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$param = $this->input->get();
		$response = $this->barcode->getTokolist($token,$param);
		echo json_encode($response);
    }

    public function saveregister(){
        $response['status'] = false;
        $response['msg'] = 'Terjadi Kesalahan, silahkan ulangi kembali';
        $data = $this->input->post();
        if(!empty($data['id_user'])){
            $regis = $this->barcode->register($data);
            if(!empty($regis)){
                if(is_array($regis)){
                    if($regis['status'] == true){
                        $response = array(
                            'status' => true,
                            'msg'   => $regis['message'],
                            // 'data'  => $regis['data']
                        );
                    }else{
                        $response = array(
                            'status' => $regis['status'],
                            'msg'   => $regis['message'],
                            // 'data'  => $regis['error_data']
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
                            // 'data'  => $regis->error_data
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

    public function produk_detail($url_toko,$kode_qr){
        // echo 'asdsa';
        // $cek_toko = $this->barcode->cek_url_toko($url_toko);
        // var_dump($cek_toko);
        $code = $kode_qr;
        $cek_url_toko = $this->barcode->barcode_profile_cek_url($url_toko,$code);
        // var_dump($cek_url_toko);
        // die;
        if(isset($cek_url_toko['status']) && $cek_url_toko['status'] == true){
            $data = array(
                'page_title'    => $cek_url_toko['data']['profile']['nama_brand'],
                'page_data'     => $cek_url_toko['data'],
                'page_full_url' => base_url($url_toko.'/'.$kode_qr),
                'is_home'       => false,
                'description_page'  => ''
            );
            // echo '<pre>';
            // var_dump($data['page_data']['barcode_info']);
            // echo '</pre>';
            // die;
            $this->load->view('include/header_qr.php',$data);
            $this->load->view('tokoqr/detail-produk.php',$data);
            $this->load->view('include/footer_qr.php',$data);
        }else{
            $this->load->view('404');
        }
    }

    public function produk_certificate($url_toko,$kode_qr){
        $code = $kode_qr;
        $cek_url_toko = $this->barcode->barcode_profile_cek_url($url_toko,$code);
        if(isset($cek_url_toko['status']) && $cek_url_toko['status'] == true){
            $data = array(
                'page_title'    => $cek_url_toko['data']['profile']['nama_brand'],
                'page_data'     => $cek_url_toko['data'],
                'page_full_url' => base_url($url_toko.'/'.$kode_qr),
                'is_home'       => false,
                'description_page'  => '',
                'kode_qr'   => $kode_qr
            );
            // echo '<pre>';
            // var_dump($data['page_data']);
            // echo '</pre>';
            // die;
            $this->load->view('include/header_qr.php',$data);
            $this->load->view('tokoqr/certificate-produk.php',$data);
            $this->load->view('include/footer_qr.php',$data);
        }else{
            $this->load->view('404');
        }
    }
    public function produk_lookbook($url_toko,$kode_qr){
        $code = $kode_qr;
        $cek_url_toko = $this->barcode->barcode_profile_cek_url($url_toko,$code);
        if(isset($cek_url_toko['status']) && $cek_url_toko['status'] == true){
            $data = array(
                'page_title'    => $cek_url_toko['data']['profile']['nama_brand'],
                'page_data'     => $cek_url_toko['data'],
                'page_full_url' => base_url($url_toko.'/'.$kode_qr),
                'is_home'       => false,
                'description_page'  => '',
                'kode_qr'   => $kode_qr
            );
            // echo '<pre>';
            // var_dump($data['page_data']);
            // echo '</pre>';
            // die;
            $this->load->view('include/header_qr.php',$data);
            $this->load->view('tokoqr/lookbook-produk.php',$data);
            $this->load->view('include/footer_qr.php',$data);
        }else{
            $this->load->view('404');
        }
    }

	
}
