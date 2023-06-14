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
$route['legit'] = 'Legitcheck/home';
$route['legitchcek'] = 'Legitcheck/index';
$route['legitchcek/success'] = 'welcome/legitchcek_send_success';
$route['legitsend'] = 'Legitcheck/sendlegit';

//Authentication
$route['login'] = 'Auth/viewlogin';
$route['authcheck'] = 'Auth/googleAuthCheck';
$route['authurl'] = 'Auth/getUrlGogelAuth';
$route['auth/login'] = 'Auth/login';
$route['auth/register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
$route['registervalidator'] = 'Auth/validator_register';
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


// user list
$route['user/list'] = 'User/list';
$route['user-list'] = 'User/listshow';


//page
$route['term-condition'] = 'Pages/Term_condition';
$route['privacy-policy'] = 'Pages/Privacy_policy';
$route['tentang-kami'] = 'Pages/About_us';
$route['faq'] = 'Pages/Faq';