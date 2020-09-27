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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '/home/not_found';
$route['translate_uri_dashes'] = TRUE;

//$route['/admin'] = '/admin/dashboard';
//$route['admin/(:any)'] = 'admin/$1';
$route['richfilemanager/(:any)'] = 'admin/richfilemanager/\$1';

$route['media/(:any)'] = 'media/resize/$1';

//Clear Cache
$route['^(\w{2})/clearcache'] = 'home/clearcache';

/*
$route['^(\w{2})/(.*)'] = function($language, $link) use ($controllers_methods)
{
	if(array_key_exists($language,$controllers_methods))
	{
		foreach($controllers_methods[$language] as $key => $sym_link)
		{
			if(strrpos($link, $key,0) !== FALSE)
			{
				$new_link = ltrim($link,$key);
				$new_link = $sym_link.$new_link;
				break;
			}
		}
		return $new_link;
	}
	return $link;
};
*/
$route['^(\w{2})/admin'] = '/admin/dashboard';

$route['^(\w{2})$'] = $route['default_controller'];

//route example: http://domain.tld/en/controller => http://domain.tld/controller
$route['^(\w{2})/(contact|lien-he)'] = '/pages/contact';
$route['^(\w{2})/(pages|page)/request_call'] = '/pages/request_call';
//$route['^(\w{2})/lien-he'] = '/pages/contact';

$route['^(\w{2})/(specialists|chuyen-khoa)'] = '/specialists';
$route['^(\w{2})/(specialists|chuyen-khoa)/(:any)'] = '/specialists/index/$3';

/*Service or Dich-vu*/
$route['^(\w{2})/(service|dich-vu)'] = '/services';
$route['^(\w{2})/(service|dich-vu|services)/(:any)'] = '/services/index/$3';


/*Artice*/
$route['^(\w{2})/(articles|article|tin-tuc)/(:any)/(:any)-chi-tiet'] = '/articles/detail/$3/$4';
$route['^(\w{2})/(articles|article|tin-tuc)/(.+)'] = '/articles/index/$3';



/*Pages or page*/
$route['^(\w{2})/(page|pages|gioi-thieu)/(:any)'] = '/pages/index/$3';


$route['^(\w{2})/assets^(.*)'] = '/assets$2';
$route['^(\w{2})/api/^(.*)'] = '/api/$2';
$route['^(\w{2})/filenamager/^(.*)'] = '/filemanager/$2';

$route['^(\w{2})/(.*)'] = '$2';

/*for modules*/
