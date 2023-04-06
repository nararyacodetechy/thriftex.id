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
?>