<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Site{


    
	public function is_logged_in(){
        $_this =& get_instance();
		$user_session = $_this->session->userdata;
        $_this->load->model('User_model','user');
        $token = @$user_session['token'];
		$cek_login = $_this->user->checkuser($token);
        if(!isset($user_session['login']) && $cek_login['status'] == false){
            $_this->session->();
            redirect(base_url('login'));
        }

	}

    function slug($text)
    {

        $text = trim($text);
        $find = array(' ', '/', '&', '\\', '\'', ',', '(', ')', '?', '!', ':');
        $replace = array('-', '-', 'and', '-', '-', '-', '', '', '', '', '');

        $slug = str_replace($find, $replace, strtolower($text));

        return $slug;
    }
}
