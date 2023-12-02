<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = 'E404';
$route['translate_uri_dashes'] = FALSE;

$route['index-components'] = 'welcome/page';

$route['profile'] = 'Profile/profile';
$route['profile/legitchcek'] = 'Profile/profile_legit';
$route['profile/sertifikat'] = 'Profile/sertifikat';
$route['profile/sertifikat/cencel/(:num)'] = 'Sertif/sertifikat_cencel/$1';
$route['profile/sertif-check'] = 'Profile/sertifcheck';
$route['sertif-list-newregis'] = 'Profile/list_sretif_new';
$route['sertif-check/validated'] = 'Profile/validatedsave';
$route['profile/data-sertifikat'] = 'Profile/data_sertifikat';
//qrcode
$route['profile/qrcode-check'] = 'Profile/qrcodecheck';
$route['qrcode-list-new'] = 'Profile/list_qrcode_new';
$route['konfirmasiqrcode'] = 'Profile/konfirmasiqrcode';


// $route['profile/sertifikat/detail/(:num)'] = 'Profile/sertifikat_detail/$1';
$route['profile/edit'] = 'Profile/edit';
$route['profile/saveedit'] = 'Profile/saveeditprofile';
$route['checkusername'] = 'Profile/checkusername';

$route['legit'] = 'Legitcheck/home';
$route['legitcheck'] = 'Legitcheck/index';
$route['legitcheck/success'] = 'welcome/legitchcek_send_success';
$route['legitsend'] = 'Legitcheck/sendlegit';

//Authentication
$route['login'] = 'Auth/viewlogin';
$route['authcheck'] = 'Auth/googleAuthCheck';
$route['authurl'] = 'Auth/getUrlGogelAuth';
$route['auth/login'] = 'Auth/login';
$route['auth/register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
$route['registervalidator'] = 'Auth/validator_register';
$route['updatevalidator'] = 'Auth/validator_update';
$route['hapusvalidator'] = 'Auth/validator_delete';
$route['auth/registervalidator'] = 'Auth/register_validator';

// Legit
$route['case/(:any)'] = 'Legitcheck/result/$1';

//validator
$route['legit/newlist'] = 'Legitcheck/newlist';
$route['legit/completelist'] = 'Legitcheck/completelist';
$route['legit/check/(:any)'] = 'Legitcheck/check/$1';
$route['legit/validation'] = 'Legitcheck/validation';
$route['legit/processlist'] = 'Legitcheck/processlist';

//feedback
$route['feedback'] = 'Feedback/index';

//search
$route['searchlegit'] = 'Search/index';

// user list
$route['user/list'] = 'User/list';
$route['user-list'] = 'User/listshow';
$route['user-list-select'] = 'User/listshowselect';
// $route['user-list-select-toko'] = 'User/listshowselecttoko';

//validator list
$route['validator/list'] = 'User/validatorlist';
$route['validator-list'] = 'User/listshowvalidator';


//page
$route['term-condition'] = 'Pages/Term_condition';
$route['privacy-policy'] = 'Pages/Privacy_policy';
$route['tentang-kami'] = 'Pages/About_us';
$route['faq'] = 'Pages/Faq';


// sertifikat check
$route['sertifikat-check'] = 'Sertif/index';
// $route['sertifikat-scan'] = 'Sertif/scan';
$route['sertifikat-register'] = 'Sertif/register';
$route['sertifikat-register/(:any)'] = 'Sertif/registersuccess';
$route['scan-check'] = 'Sertif/scancheck';
$route['sertif-send'] = 'Sertif/sertifSubmit';

// admin toko
$route['akuntoko'] = 'Toko/index';
$route['save-register-toko'] = 'Toko/saveregister';
$route['update-register-toko'] = 'Toko/updateregister';
$route['toko-list'] ='Toko/listtoko';
$route['hapus-toko'] ='Toko/hapustoko';

$route['akunbrand'] = 'Tokoqr/akun';
$route['save-register-brand'] = 'Tokoqr/saveregister';
$route['tokoqr-list'] ='Tokoqr/listtoko_brand';

$route['(:any)/(:any)'] = 'Tokoqr/index/$1/$2';