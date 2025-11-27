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
$route['default_controller'] = 'IndexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//home
$route['cat/(:any)']['GET'] = 'IndexController/category/$1';
$route['subcat/(:any)']['GET'] = 'IndexController/subcategory/$1';
$route['pro/(:any)']['GET'] = 'IndexController/product/$1';
$route['cart']['GET'] = 'IndexController/cart';
$route['add-to-cart']['POST']  = 'IndexController/add_to_cart';
$route['delete-all-cart']['GET'] = 'IndexController/delete_all_cart';
$route['delete-item/(:any)']['GET'] = 'IndexController/delete_item/$1';
$route['update-cart-item']['POST'] = 'IndexController/update_cart_item';
$route['user-login']['GET'] = 'IndexController/login';
$route['checkout']['GET'] = 'IndexController/checkout';
$route['confirm-checkout']['POST'] = 'IndexController/confirm_checkout';
$route['logout-customer']['GET'] = 'IndexController/logout_customer';
$route['thanks']['GET'] = 'IndexController/thanks';
$route['search']['GET'] = 'IndexController/search';
$route['admin-search']['GET'] = 'IndexController/admin_search';
$route['online-checkout']['POST'] = 'OnlineCheckoutController/online_checkout';

// pagination
$route['pagination/index/(:num)']['GET'] = 'IndexController/index/$1';
$route['pagination/index']['GET'] = 'IndexController/index/';
$route['cat/(:any)/(:any)']['GET'] = 'IndexController/category/$1';
$route['subcat/(:any)/(:any)']['GET'] = 'IndexController/subcategory/$1';
$route['search/(:num)']['GET'] = 'IndexController/search/$1';
$route['admin-search/(:num)']['GET'] = 'IndexController/admin_search/$1';

//login
$route['login']['GET'] = 'LoginController/index';
$route['login-user']['POST'] = 'LoginController/login';
$route['login-customer']['POST'] = 'IndexController/login_customer';
$route['register']['POST'] = 'IndexController/register';

//register admin
$route['register-admin']['GET'] = 'LoginController/register_admin';
$route['register-insert']['POST'] = 'LoginController/register_insert';

//dashboard
$route['dashboard']['GET'] = 'DashboardController/index';
$route['logout']['GET'] = 'DashboardController/logout';
$route['dashboard/changeStatus/(:num)'] = 'DashboardController/changeStatus/$1';
$route['dashboard/delete/(:any)'] = 'DashboardController/delete/$1';


//category
$route['category/create']['GET'] = 'CategoryController/create';
$route['category/list']['GET'] = 'CategoryController/index';
$route['category/edit/(:any)'] = 'CategoryController/edit/$1';
$route['category/update/(:any)'] = 'CategoryController/update/$1';
$route['category/delete/(:any)'] = 'CategoryController/delete/$1';
$route['category/store']['POST'] = 'CategoryController/store';

//sub Category
$route['subcategory/create']['GET'] = 'SubcategoryController/create';
$route['subcategory/list']['GET'] = 'SubcategoryController/index';
$route['subcategory/edit/(:any)'] = 'SubcategoryController/edit/$1';
$route['subcategory/update/(:any)'] = 'SubcategoryController/update/$1';
$route['subcategory/delete/(:any)'] = 'SubcategoryController/delete/$1';
$route['subcategory/store']['POST'] = 'SubcategoryController/store';

//product
$route['product/create']['GET'] = 'ProductController/create';
$route['product/list']['GET'] = 'ProductController/index';
$route['product/get_subcategories/(:any)'] = 'ProductController/getSubcategories/$1';
$route['product/edit/(:any)'] = 'ProductController/edit/$1';
$route['product/update/(:any)'] = 'ProductController/update/$1';
$route['product/delete/(:any)'] = 'ProductController/delete/$1';
$route['product/store']['POST'] = 'ProductController/store';

//user management
$route['user_management']['GET']  = 'UserManagementController/index';
$route['user_management/changeRole/(:num)'] = 'UserManagementController/changeRole/$1';
$route['user/delete/(:any)'] = 'UserManagementController/use_delete/$1';
$route['customer/delete/(:any)'] = 'UserManagementController/customer_delete/$1';

//review
$route['review/send']['POST']  = 'IndexController/review_send';

//user
$route['user']   = 'IndexController/user';
$route['update-user-info']['POST'] = 'IndexController/updateUserInfo';
