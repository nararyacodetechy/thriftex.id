<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legitcheck extends CI_Controller {

    private $token;
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('Site'));
        $this->load->model('User_model','user');
        $this->load->model('Legit_model','legit');
        $this->load->model('Validator_model','validator');
        $this->token = $this->session->userdata('token');
        date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
    }
    public function home()
	{
		// $this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $total_legit = $this->legit->get_total_legit($token);
        $data_legit = $this->legit->get_legit_publish($token);
        $data = array(
            'total_legit'   => $total_legit['total'],
            'data_legit'    => $data_legit,
            'page_title'    => "Legit Check",
            'description_page'  => 'Temukan keaslian produk kami disini sekarang juga.'
        );
		$this->load->view('legit_home.php',$data);
	}
    public function index()
	{
		$this->site->is_logged_in();
        $data = array(
            'page_title'    => "Legit Checker",
            'description_page'  => 'Temukan keaslian produkmi disini sekarang juga.'
        );
		$this->load->view('legitchcek.php',$data);
	}

    function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
    
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
    
        return $file_ary;
    }

	public function sendlegit()
	{
        $this->site->is_logged_in();
        $response = array(
            'status'	=> false,
            'msg'		=> 'Terjadi kesalahan'
        );
        $post = $this->input->post();
        $kategori = $post['kategori'];
        $brand = $post['brand'];
        $nama_item = $post['nama_item'];
        $nama_toko = $post['nama_toko'];
        $kondisi_barang = $post['kondisi_barang'];
        $catatan = $post['catatan'];

        //file upload destination
        $config['upload_path'] = './media/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp|image/jpeg|PNG|JPEG|JPG';
		$config['overwrite']     = FALSE;
		$config['max_size'] = '8000';
		$config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $data_foto = array();
        for($i = 0; $i < count(array_filter($_FILES['legitimage']['name']));$i++)
        {
            if(!empty($_FILES['legitimage']['name'][$i])){

                $_FILES['file']['name'] = $_FILES['legitimage']['name'][$i];
                $_FILES['file']['type'] = $_FILES['legitimage']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['legitimage']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['legitimage']['error'][$i];
                $_FILES['file']['size'] = $_FILES['legitimage']['size'][$i];
            
                if($this->upload->do_upload('file')){
                    
                    $uploadData = $this->upload->data();
                    $nama_foto = $uploadData['file_name'];
                    $data_foto[] = array(
                        'nama_foto' => $nama_foto
                    );
                }else{
                    $error = array('error' => $this->upload->display_errors());
                    $response = array(
                        'status'	=> false,
                        'msg'		=> 'Foto Gagal di Upload!',
                        // 'eror'  => $error
                    );
                    echo json_encode($response);
                    die;
                }
            }
        }
        if(count($data_foto) > 0){
            $data_legit = array(
                'user_id'   => $this->session->userdata('uid'),
                'kategori'  => $kategori,
                'brand'     => $brand,
                'nama_item' => $nama_item,
                'nama_toko' => $nama_toko,
                'kondisi_barang' => $kondisi_barang,
                'data_foto' => $data_foto,
                'catatan'   => $catatan,
            );
            // var_dump($data_legit);
            // die;
            $kirim = $this->legit->savelegit($data_legit,$this->token);
            // var_dump($kirim);
            if($kirim['status'] == true){
                redirect(base_url('legitcheck/success?caseid='.$kirim['case_id']));
            }
        }else{
            $response = array(
                'status'	=> false,
                'msg'		=> 'Foto Kosong!',
            );
            echo json_encode($response);
        }
        
	}
    // public function token_check($response){
    //     if($response['status'] == false && $response['message'] == 'Wrong number of segments'){
    //         return false;
    //         redirect(base_url('login'));
    //     }
    // }
    public function result($case_code){
        $this->site->is_logged_in();
        if(!empty($case_code)){
            $token = $this->session->userdata('token');
            $legit_list = $this->legit->legitDetail($token,$case_code);
            if(isset($legit_list['status']) && $legit_list['status'] == false && $legit_list['message'] == 'Wrong number of segments'){
                redirect(base_url('login'));
            }else{
                $data = array(
                    'legit_data'    => $legit_list['data'],
                    'page_title'    => "Hasil Legit Check",
                    // 'description_page'  => 'Halaman Profile Pengguna - Thriftex.id - Legit Check & Authentic'
                );
                $this->load->view('legit_status.php',$data);
            }
        }else{
            $this->load->view('404.php');
        }
    }

    public function newlist(){
        $this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $legit_list = $this->legit->validator_do($token,'');
        $data = array(
            'title' => 'New Legit Check',
            'list_legit'    => $legit_list['data']
        );
        $this->load->view('validator_task_list.php',$data);
    }

    public function processlist(){
        $this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $legit_list = $this->legit->validator_do($token,'processing');
        $data = array(
            'title' => 'New Legit Check',
            'list_legit'    => $legit_list['data']
        );
        $this->load->view('validator_task_list.php',$data);
    }

    public function check($case_code){
        $this->site->is_logged_in();
        if(!empty($case_code)){
            $token = $this->session->userdata('token');
            $legit_list = $this->legit->validatorData($token,$case_code);
            if(isset($legit_list['status']) && $legit_list['status'] == false){
                redirect(base_url('login'));
            }else{
                $data = array(
                    'legit_data'    => $legit_list['data']
                );
                $this->load->view('legitcheck_validate.php',$data);
            }
        }else{
            $this->load->view('404.php');
        }
    }


    public function validation(){
        $this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $response = array(
            'status' => false,
            'msg'   => 'Unknow error!'
        );
        $post = $this->input->post();
        $processing_status='none';
        if($post['legit_status']=='processing'){
            $processing_status=$post['processing_mode'];
        }
        $validation_data = [
            'legit_id'  => $post['legit_id'],
            'check_result'  => $post['legit_status'],
            'processing_status' => $processing_status,
            'check_note'  => $post['message_validation'],
            'validator_user_id' => $this->session->userdata('uid'),
        ];
        $regis = $this->legit->validation_save($token,$validation_data);
        if($regis['status'] == true){
            $response = array(
                'status' => true,
                'msg'   => $regis['message'],
                'redirect_url'  => base_url('legit/newlist')
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

    public function completelist(){
        $this->site->is_logged_in();
        $token = $this->session->userdata('token');
        $legit_list = $this->legit->validator_do($token,'complete');
        $data = array(
            'title' => 'Complete Legit Check',
            'list_legit'    => $legit_list['data']
        );
        $this->load->view('validator_task_list.php',$data);
    }

}