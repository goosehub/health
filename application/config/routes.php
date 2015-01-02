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
*/

$route['404_override'] = '';
$route['default_controller'] = 'pages/view';
$route['login'] = 'pages/view/login';
$route['dashboard'] = 'dashboard';
$route['about'] = 'pages/view/about';
$route['join'] = 'join';
$route['start'] = 'join/start';
$route['dashboard/profile'] = 'dashboard/profile_form';
$route['dashboard/password'] = 'dashboard/set_password';
$route['dashboard/progress/new'] = 'progress/progress_form';
$route['search'] = 'pages/search';
$route['dashboard/conversations'] = 'conversation';
$route['dashboard/conversations/(:any)'] = 'conversation/view/$1';
$route['dashboard/requirements'] = 'dashboard/requirements';
$route['dashboard/picture'] = 'dashboard/picture';
$route['users/(:any)/progress'] = 'progress/progress_list/$1';
$route['users/(:any)'] = 'profile/view/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */