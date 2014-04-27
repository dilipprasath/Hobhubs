<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
$route['default_controller'] = "home";
$route['404_override'] = '';

$route['admin/(:any)'] = 'admin/home';
$route['user/(:any)'] = 'user/account';
*/
$route['default_controller'] = "home";
$route['404_override'] = '';
$route['([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'home/index/$1';
$route['select_hobby'] = 'home/select_hobby';
$route['profile_photo'] = 'home/profile_photo';
$route['search_hobby'] = 'home/search_hobby';
$route['home/update_follow'] = 'home/update_follow';
$route['home/imgupload'] = 'home/imgupload';
$route['home/imgsave'] = 'home/imgsave';



$controller_exceptions = array('admin','user','migrations','login');
$route["^((?!\b".implode('\b|\b', $controller_exceptions)."\b).*)$"] = $route['default_controller'].'/$1';
$route['admin'] = 'admin/home';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
