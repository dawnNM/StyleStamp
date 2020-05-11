<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| RESERVED ROUTES
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['view-products'] = 'welcome/viewproducts';
$route['authenticate'] = 'signin/verify_admin';
$route['signin'] = 'signin';
$route['forget-password'] = 'user';
$route['forget-password-verify'] = 'signin/check_email';
//category
$route['viewcategories'] = 'categorycontroller';
$route['addcategory'] = 'categorycontroller/addcategory';
$route['add-new-category'] = 'categorycontroller/add';
$route['category/edit/(:any)'] = 'categorycontroller/edit/$1';
$route['update-category/(:any)'] = 'categorycontroller/update/$1';
$route['category/delete/(:any)'] = 'categorycontroller/delete/$1';
//sub category
$route['viewsubcategories'] = 'subcategorycontroller';
$route['addsubcategory'] = 'subcategorycontroller/addSubSategory';
$route['add-new-subcategory'] = 'subcategorycontroller/add';
$route['subcategory/edit/(:any)'] = 'subcategorycontroller/edit/$1';
$route['update-subcategory/(:any)'] = 'subcategorycontroller/update/$1';
$route['subcategory/delete/(:any)'] = 'subcategorycontroller/delete/$1';
//product
$route['viewproducts'] = 'productcontroller';
$route['addproduct'] = 'productcontroller/addproduct';
$route['add-new-product'] = 'productcontroller/add';
$route['product/edit/(:any)'] = 'productcontroller/edit/$1';
$route['product/delete/(:any)'] = 'productcontroller/delete/$1';
//profile
$route['profile'] = 'profilecontroller';
$route['change-password'] = 'profilecontroller/update_password';
$route['update-profile'] = 'profilecontroller/edit';
//settings
$route['companysettings'] = 'settingscontroller';
$route['banner'] = 'settingscontroller/banner';
$route['socialmedia'] = 'settingscontroller/socialmedia';
$route['contactdetails'] = 'settingscontroller/contactdetails';
$route['privacypolicy'] = 'settingscontroller/privacypolicy';
$route['update-companysettings'] = 'settingscontroller/addproduct';
$route['update-banner'] = 'settingscontroller/add';
$route['update-socialmedia'] = 'settingscontroller/update_social_media';
$route['update-privacypolicy'] = 'settingscontroller/update_privacy_policy';
$route['update-contact-details'] = 'settingscontroller/update_contact_detail';
//settings
$route['vieworders'] = 'Ordercontroller';
//reports
$route['sales-report'] = 'Reportcontroller/salesreport';
$route['product-report'] = 'Reportcontroller';





/*=========================API ROUTES================================*/

//----------------------------------------------------------------

//http://localhost/Project/api/Getorderbyuser
//$route['createorder']['GET'] = 'createorder/index_get';//initial call to getorderbyuser index

//http://localhost/Project/api/Getorderbyuser/2
/** overrides the above **/
//$route['createorder/(:num)']['GET'] = 'createorder/index_get/$1';//Changing defaults index

//http://localhost/Project/api/Getorderbyuser/2/2
/** overrides the above **/
//$route['createorder/(:num)/(:any)']['GET'] = 'createorder/order/$1/$2';//Changing type,limit,offset

//All routes that are similar, like above that follow the previous, override the preceding one. 


/*//http://localhost/Project/api/Getorderbyuser/create

//overrides $route['players/(:any)']
$route['getorderbyuser/create'] = 'getorderbyuser/index_post';*/

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
