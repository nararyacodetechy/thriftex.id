<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model','user');
        date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('config'));
        $this->load->library(array('Site'));
    }

    public function viewlogin(){
        $login_button = '';
        if($this->session->userdata('login') == false){
            // $login_button = $google_client->createAuthUrl();
		    $data['login_button'] = $login_button;
            $data['google_code_auth'] = '';
            if(!empty($this->input->get('code'))){
                $data['google_code_auth'] = $this->input->get('code');
            }
            $data['page_title'] = 'Login';
            $data['description_page']   = '';
            $this->load->view('login.php',$data);
        }else{
            redirect(base_url('profile'));
        }
    }

    public function getUrlGogelAuth(){
        $google_client = new Google_Client();
        $google_client->setClientId('110276130330-7tiasjh4bcpmr34g490q497mp48cd1h7.apps.googleusercontent.com'); //masukkan ClientID anda 
        $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
        $google_client->setRedirectUri(base_url().'login'); //Masukkan Redirect Uri anda
        $google_client->addScope('email');
        $google_client->addScope('profile');
        $login_button = $google_client->createAuthUrl();
        echo json_encode(array('url'=>$login_button));
    }

    public function googleAuthCheck(){
        $data_code = $this->input->post('code');
        if(!empty($data_code)){
            $google_client = new Google_Client();
            $google_client->setClientId('110276130330-7tiasjh4bcpmr34g490q497mp48cd1h7.apps.googleusercontent.com'); //masukkan ClientID anda 
            $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
            $google_client->setRedirectUri(base_url().'login'); //Masukkan Redirect Uri anda
            $google_client->addScope('email');
            $google_client->addScope('profile');
            $google_client->addScope('ref');
            
            $token = $google_client->fetchAccessTokenWithAuthCode($data_code);
            // var_dump($token);
            if(!isset($token["error"])){
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                // var_dump($data);
                $user_data = array(
                    'first_name' => $data['given_name'],
                    'last_name'  => $data['family_name'],
                    'full_name' => $data['name'],
                    'email_address' => $data['email'],
                    'profile_picture'=> $data['picture'],
                    'gid'       => $data['id']
                );
                // kirim datanya 
                $cek_login = $this->user->googleauth($user_data);
                if($cek_login['status'] == true){
                    $data_login = array(
                        'login' => true,
                        'uid'   => $cek_login['uid'],
                        'token' => $cek_login['token']
                    );
                    $this->session->set_userdata($data_login);
                    $checkuser = $this->user->checkuser($cek_login['token']);
                    if($checkuser['data']['role'] == 'toko'){
                        $cookie = array(
                            'name'   => '_ath',
                            'value'  => $cek_login['token'],
                            'expire' =>  7200,
                            'secure' => false
                        );
                        $this->input->set_cookie($cookie); 
                    }
                    $response = array(
                        'status'    => true,
                        'msg'       => 'Berhasil, mohon tunggu...',
                        'redirect_url'  => base_url('profile')
                    );
                }else{
                    $response = array(
                        'status'    => false,
                        'msg'       => 'Terjadi kesalahan, silahkan coba kembali',
                    );
                    // var_dump($cek_login);
                }
                // var_dump($send);
                // $this->session->set_userdata('user_data', $data);
            }else{
                $response = array(
                    'status'    => false,
                    'error'     => $token["error"],
                    'error_description'       => $token["error_description"],
                    'msg'       => 'Gagal Login, silahakn coba kembali'
                );
            }
            // var_dump($token);
        }	
        echo json_encode($response);
        // array(2) { ["error"]=> string(13) "invalid_grant" ["error_description"]=> string(11) "Bad Request" }
    }

	public function login()
	{
        if($this->session->userdata('login') == true){
            redirect(base_url('profile'));
        }
        $response = array(
            'status' => false,
            'msg'   => 'Server Error'
        );
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        if ($this->form_validation->run() == FALSE){
            $response = array(
                'status'   => false,
                'msg' => form_error('email').' '.form_error('password')
            );
        }else{
            $data_login = [
                'email' => $email,
                'password'  => $password
            ];
            $cek_login = $this->user->cek_login($data_login);
            if(!empty($cek_login)){
                if($cek_login['status'] == true){
                    $data_login = array(
                        'login' => true,
                        'uid'   => $cek_login['uid'],
                        'token' => $cek_login['token']
                    );
                    $this->session->set_userdata($data_login);
                    $checkuser = $this->user->checkuser($cek_login['token']);
                    if($checkuser['data']['role'] == 'toko'){
                        $cookie = array(
                            'name'   => '_ath',
                            'value'  => $cek_login['token'],
                            'expire' =>  7200,
                            'secure' => false
                        );
                        $this->input->set_cookie($cookie); 
                    }
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
            }else{
                $response = array(
                    'status' => false,
                    'msg'   => 'Server Error!'
                );
            }
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
        if(!empty($regis)){
            if(is_array($regis)){
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

    public function register_validator(){
        $this->site->is_logged_in();
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
            'validator_brand_id'    => $post['validator_brand_id'],
            // 'validator_kategori_id'    => $post['validator_kategori_id']
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
        delete_cookie('_ath');
		redirect(base_url());
    }

    public function validator_register(){
        $this->site->is_logged_in();
        $data = array(
            'page_title'    => "Tambah Data Validator",
            // 'description_page'  => ''
        );
        $this->load->view('register_validator.php',$data);
    }

    public function validator_update(){
        $this->site->is_logged_in();
		$data = $this->input->post();
		$token = $this->session->userdata('token');
		$send = $this->user->saveValidatoredit($token,$data);
		if($send['status'] == true){
			redirect(base_url('validator/list'));
		}
    }

    public function validator_delete(){
        $this->site->is_logged_in();
		$data = $this->input->post();
		$token = $this->session->userdata('token');
		$send = $this->user->deleteValidator($token,$data);
		echo json_encode($send);
    }


}
