<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertif extends CI_Controller {

	private $token;
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Site'));
		$this->load->model('Sertif_model','sertif');
		$this->load->model('Toko_model','toko');
		$this->token = $this->session->userdata('token');
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
	}

    public function index(){
		$this->site->is_logged_in();
        $data = array(
			'page_title'    => "Sertifikat Check",
            'description_page'  => 'Cek sekarang dan dapatkan sertifikat untuk produk yang Anda beli di toko partner kami - Thriftex.id - Legit Check & Authentic'
		);
		$this->load->view('sertifikat-check.php',$data);
    }

	public function register(){
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$scancode = $this->input->get('id');
		$result = $this->toko->checkcode($token,$scancode);
		if(!empty($this->input->get('id')) && $result['status'] == true){
			$data = array(
				'page_title'    => "Upload Bukti Nota",
				'toko_id'	=> '',
				'description_page'  => 'Upload Nota belanja Anda dari Toko partner kami dan dapatkan akses sertifikat resmi dari kami - Thriftex.id - Legit Check & Authentic'
			);
			$this->load->view('sertifikat-register.php',$data);
		}
	}	
	public function registersuccess(){
		$this->site->is_logged_in();
		$data = array(
			'page_title'    => "Berhasil Register Sertifikat",
			'description_page'  => ''
		);
		$this->load->view('sertifikat-register-success.php',$data);
	}
	public function sertifSubmit(){
		$this->site->is_logged_in();
        $response = array(
            'status'	=> false,
            'msg'		=> 'Terjadi kesalahan'
        );
        $post = $this->input->post();

        //file upload destination
        $config['upload_path'] = './media/sertif';
        $config['allowed_types'] = 'jpg|jpeg|png|webp|image/jpeg|PNG|JPEG|JPG';
		$config['overwrite']     = FALSE;
		$config['max_size'] = '8000';
		$config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $data_foto = array();
        for($i = 0; $i < count(array_filter($_FILES['sertifregis']['name']));$i++)
        {
            if(!empty($_FILES['sertifregis']['name'][$i])){

                $_FILES['file']['name'] = $_FILES['sertifregis']['name'][$i];
                $_FILES['file']['type'] = $_FILES['sertifregis']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['sertifregis']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['sertifregis']['error'][$i];
                $_FILES['file']['size'] = $_FILES['sertifregis']['size'][$i];
            
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
                        'eror'  => strip_tags($error['error'])
                    );
					// hapus foto yang lolos
					if(count($data_foto)){
						foreach ($data_foto as $key => $value) {
							$filePath = FCPATH.'media/sertif/'.$value['nama_foto'];
							if (file_exists($filePath)) {
								unlink($filePath);
							}
						}
					}
                    echo json_encode($response);
                    die;
                }
            }
        }
        $data_sertif = array(
			'user_id'   => $this->session->userdata('uid'),
            'id_toko'   => $post['idtoko'],
            'data_foto' => $data_foto,
        );
        // var_dump($data_legit);
        $kirim = $this->sertif->register($data_sertif,$this->token);
        echo json_encode($kirim);
        // if($kirim['status'] == true){
		//     redirect(base_url('legitchcek/success?caseid='.$kirim['case_id']));
        // }
	}

	public function scancheck(){
		//chcek code qr
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$scancode = decr($this->input->post('resultcode'));
		$result = $this->toko->checkcode($token,$scancode);
		echo json_encode($result);
	}

	public function sertifikat_cencel($id){
		$this->site->is_logged_in();
		$token = $this->session->userdata('token');
		$data = [
			'id' => $id
		];
		$result = $this->sertif->cencel($token,$data);
		$data_foto = $result['data']['img_list'];
		if(count($data_foto)){
			foreach ($data_foto as $key => $value) {
				$filePath = FCPATH.'media/sertif/'.$value['file_path'];
				echo $filePath;
				if (file_exists($filePath)) {
					unlink($filePath);
				}
			}
		}
		redirect(base_url('profile/sertifikat'));
	}

	
}
