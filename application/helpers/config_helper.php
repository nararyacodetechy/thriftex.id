<?php

function get_template_directory_asst($dir_file){
	global $SConfig;

	// $replace_path = str_replace('\\','/',$path);
	// $get_digit_doc_root = strlen($SConfig->_document_root);
	// $full_path = substr($replace_path,$get_digit_doc_root);
	return $SConfig->_site_url.$dir_file.'?v='.$SConfig->_app_version;
}
function app_version(){
	global $SConfig;
	return $SConfig->_app_version;
}

function api_url($sub){
	global $SConfig;
	$_this =& get_instance();
	return $SConfig->_api_url.$sub;
}

function createurl($url){
	global $SConfig;
	// if($SConfig->_app_mode == 'development'){
	// }else{
	// }
	return base_url($url);
	// return $url;
}

function encr($str){
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$encryption_iv = '1234567891011121';
	$encryption_key = "Thrif2023";
	
	$encryption = openssl_encrypt($str, $ciphering,
				$encryption_key, $options, $encryption_iv);
	return $encryption;
}
function decr($encryption){
	$ciphering = "AES-128-CTR";
	$options = 0;
	$decryption_iv = '1234567891011121';
	$decryption_key = "Thrif2023";
	$decryption=openssl_decrypt ($encryption, $ciphering,
			$decryption_key, $options, $decryption_iv);
	return $decryption;
}

?>