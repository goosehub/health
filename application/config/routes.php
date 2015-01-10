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

$route['404_override'] = 'pages/view';
$route['default_controller'] = 'pages/view';
$route['login'] = 'pages/view/login';
$route['about'] = 'pages/view/about';
$route['join'] = 'join';
$route['help'] = 'pages/view/help';
$route['start'] = 'join/start';
$route['browse'] = 'pages/browse';

$route['dashboard'] = 'dashboard';
$route['dashboard/progress'] = 'progress';
$route['dashboard/progress/new'] = 'progress/progress_form';
$route['users/(:any)/progress'] = 'progress/progress_list/$1';
$route['users/(:any)/progress/(:any)(:any)'] = 'progress/compare/$1/$2/$3';
$route['users/(:any)/progress/(:any)'] = 'progress/point/$1/$2';

$route['dashboard/meals'] = 'meals';
$route['dashboard/meals/new'] = 'meals/meals_new';
$route['users/(:any)/meals'] = 'meals/meals_list';

$route['dashboard/routines'] = 'routines';
$route['dashboard/routines/new'] = 'routines/routines_new';
$route['users/(:any)/routines'] = 'routines/routines_list';

$route['dashboard/conversations'] = 'conversation';
$route['dashboard/conversations/(:any)'] = 'conversation/view/$1';

$route['dashboard/profile'] = 'dashboard/profile_form';
$route['dashboard/password'] = 'dashboard/set_password';
$route['dashboard/requirements'] = 'dashboard/requirements';
$route['dashboard/picture'] = 'dashboard/picture';

$route['users/(:any)/friends'] = 'profile/friends/$1';
$route['users/(:any)'] = 'profile/view/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */