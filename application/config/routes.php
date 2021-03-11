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
$route['default_controller'] = 'index';
$route['404_override'] = 'error_page';
$route['translate_uri_dashes'] = FALSE;

/**
     *  Frontend
*/
$route['nrc/(:any)']     = 'index/cms_nrc/$1';
$route['nrc/(:any)']     = 'index/cms_nrc/$1';


$route['timeline']     = 'index/timeline';


$route['legal/(:any)']     = 'index/cms_legal/$1';

$route['hate/(:any)']     = 'index/cms_hate/$1';

$route['other/(:any)']     = 'index/cms_other/$1';

$route['article']           = 'index/cms_article';
$route['news']           = 'index/cms_news';
$route['video']             = 'index/cms_video';

$route['details/(:any)/(:any)'] = 'index/details/$1/$2';


/*-----------------CMS--------------------*/ 
$route['cms/(:any)']    = 'index/cms_page/$1';

/*--- For article or video ----*/ 
$route['video/(:any)']   = 'index/video_details/$1';
$route['article/(:any)']   = 'index/article_details/$1';
$route['news/(:any)']   = 'index/news_details/$1';


$route['list/(:any)'] = 'index/state_wise_list/$1';


$route['gallery']   = 'index/gallery';
/**
 * Admin backend section
*/
$route['login']                     = 'index/login';
$route['login-success']             = 'index/loginSuccess';
$route['logout']                    = 'index/logout';

$route['admin']                     = 'admin/index';

/**------------Admin profile settings------------- */
$route['admin/admin-profile']      = 'admin/dashboard/adminProfile';

/**
 * NRC
*/

$route['admin/nrc/category']        = 'admin/nrc/category';
$route['admin/nrc/add-news']        = 'admin/nrc/news/add';
$route['admin/nrc/edit-news/(:any)']        = 'admin/nrc/news/edit/$1';
$route['admin/nrc/news-list']        = 'admin/nrc/news';

/**
 * LEGAL
*/

$route['admin/legal/category']        = 'admin/legal/category';
$route['admin/legal/add-news']        = 'admin/legal/news/add';
$route['admin/legal/edit-news/(:any)']        = 'admin/legal/news/edit/$1';
$route['admin/legal/news-list']        = 'admin/legal/news';

/**
 * Timeline
*/
$route['admin/timeline']        = 'admin/timeline/index';
/**
 * Article
*/
$route['admin/article']        = 'admin/article/index';
/**
 * Video
*/
$route['admin/video']        = 'admin/video/index';

$route['admin/cms/state']   = 'admin/cms/state';

/**
 * HEAT
*/

$route['admin/hate/category']        = 'admin/hate/category';
$route['admin/hate/add-news']        = 'admin/hate/news/add';
$route['admin/hate/edit-news/(:any)']        = 'admin/hate/news/edit/$1';
$route['admin/hate/news-list']        = 'admin/hate/news';

/**
 * Others / Genocide
*/

$route['admin/other/category']        = 'admin/other/category';
$route['admin/other/add-news']        = 'admin/other/news/add';
$route['admin/other/edit-news/(:any)']        = 'admin/other/news/edit/$1';
$route['admin/other/news-list']        = 'admin/other/news';

/**
 * Gallery
*/

$route['admin/gallery/category']        = 'admin/gallery/category';
$route['admin/gallery/index']           = 'admin/gallery/gallery/add';
$route['admin/gallery/edit-gallery/(:any)']        = 'admin/gallery/gallery/edit/$1';
$route['admin/gallery/gallery-list']        = 'admin/gallery/gallery';




/** Admin Profile */
$route['admin/user/edit']        = 'admin/adminuser/edit';
$route['admin/user/usersave']        = 'admin/adminuser/usersave';
$route['admin/user/changepassword']        = 'admin/adminuser/changepassword';
$route['admin/user/setting']        = 'admin/adminuser/setting';
$route['admin/user/update_setting']        = 'admin/adminuser/update_setting';

$route['admin/user/forgot-password']        = 'admin/adminuser/forgetpassword';

$route['admin/user/new-password']        = 'admin/adminuser/new_password';
$route['admin/user/send-password']        = 'admin/adminuser/send_password';


/** Category management */
$route['admin/category']            = 'admin/category';
$route['admin/category/add']        = 'admin/category/add';
$route['admin/category/edit/(:any)']        = 'admin/category/add/$1';
$route['admin/category/save']        = 'admin/category/categorySave'; // Save and update perform in a same function
$route['admin/category/get']        = 'admin/category/get';

/** Materials management */
$route['admin/material']            = 'admin/material';
$route['admin/material/add']        = 'admin/material/add';
$route['admin/material/edit/(:any)']        = 'admin/material/add/$1';
$route['admin/material/save']        = 'admin/material/materialSave'; // Save and update perform in a same function
$route['admin/material/get']        = 'admin/material/get';

/** Pillow style management */
$route['admin/attribute-style']            = 'admin/attributeStyle';
$route['admin/attribute-style/add']        = 'admin/attributeStyle/add';
$route['admin/attribute-style/edit/(:any)']        = 'admin/attributeStyle/add/$1';
$route['admin/attribute-style/save']        = 'admin/attributeStyle/styleSave'; // Save and update perform in a same function
$route['admin/attribute-style/get']        = 'admin/attributeStyle/get';


/** Materials management */
$route['admin/attribute-size']            = 'admin/attributeSize';
$route['admin/attribute-size/add']        = 'admin/attributeSize/add';
$route['admin/attribute-size/edit/(:any)']        = 'admin/attributeSize/add/$1';
$route['admin/attribute-size/save']        = 'admin/attributeSize/sizeSave'; // Save and update perform in a same function
$route['admin/attribute-size/get']        = 'admin/attributeSize/get';

/** Products management */
$route['admin/product']            = 'admin/product';
$route['admin/product/add']        = 'admin/product/add';
$route['admin/product/edit/(:any)']        = 'admin/product/add/$1';
$route['admin/product/save']        = 'admin/product/productSave'; // Save and update perform in a same function
$route['admin/product/get']        = 'admin/product/get';
$route['admin/product/csv-upload']        = 'admin/product/csvUpload';

/** Products management */
// $route['admin/cms']            = 'admin/cms';
// $route['admin/cms/add']        = 'admin/cms/add';
// $route['admin/cms/edit/(:any)']        = 'admin/cms/add/$1';
// $route['admin/cms/save']        = 'admin/cms/cmsSave'; // Save and update perform in a same function
// $route['admin/cms/get']        = 'admin/cms/get';


/*Common routes*/
$route['admin/change-status']       = 'admin/index/changeStatus';