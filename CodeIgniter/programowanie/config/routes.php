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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'log_c';
$route['wyloguj'] = 'log_c/logout';
$route['logowanie'] = 'logowanie_c';
$route['glowna'] = 'welcome';

$route['projekt'] = 'projekt_c';
$route['projekt_add'] = 'projekt_add_c';
$route['projekt_add_action'] = 'projekt_add_c/dodaj';
$route['projekt_edit'] = 'projekt_edit_c/index/';
$route['projekt_edit/(:any)'] = 'projekt_edit_c/index/$1';
$route['projekt_edit_action'] = 'projekt_edit_c/edycja';
$route['projekt_look'] = 'projekt_look_c';
$route['projekt_del'] = 'projekt_del_c';
$route['projekt_del_action'] = 'projekt_del_c/usun';

$route['zadanie'] = 'zadanie_c/index/';
$route['zadanie/(:any)'] = 'zadanie_c/index/$1';
$route['zadanie_add'] = 'zadanie_add_c';
$route['zadanie_add_action'] = 'zadanie_add_c/dodaj';
$route['zadanie_del'] = 'zadanie_del_c';
$route['zadanie_del_action'] = 'zadanie_del_c/usun';
$route['zadanie_edit'] = 'zadanie_edit_c/index/';
$route['zadanie_edit/(:any)'] = 'zadanie_edit_c/index/$1';
$route['zadanie_edit_action'] = 'zadanie_edit_c/edycja';

$route['zadaniek'] = 'zadaniek_c/index/';
$route['zadaniek/(:any)'] = 'zadaniek_c/index/$1';

$route['sprint'] = 'sprint_c/index/';
$route['sprint/(:any)'] = 'sprint_c/index/$1';
$route['sprint_add'] = 'sprint_add_c';
$route['sprint_add_action'] = 'sprint_add_c/dodaj';
$route['sprint_del'] = 'sprint_del_c';
$route['sprint_del_action'] = 'sprint_del_c/usun';
$route['sprint_edit'] = 'sprint_edit_c/index/';
$route['sprint_edit/(:any)'] = 'sprint_edit_c/index/$1';
$route['sprint_edit_action'] = 'sprint_edit_c/edycja';


$route['sprintk'] = 'sprintk_c/index/';
$route['sprintk/(:any)'] = 'sprintk_c/index/$1';

#$route['404_override'] = '';
#$route['translate_uri_dashes'] = FALSE;
