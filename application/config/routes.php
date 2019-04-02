<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//HOME
$route['default_controller'] = 'home/index'; //home/homepage

// AUTH
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

//ADMIN
$route['admin'] = 'admin/dashboard';

//MEMBER
// $route['profile/$1'] = 'member/profile/$1';
$route['profile'] = 'member/profile';
$route['update-profile'] = 'member/updateProfile';
$route['create-portofolio'] = 'member/createPortofolio';
$route['detail-portofolio/(:any)'] = 'member/detailPortofolio/$1';
$route['edit-portofolio/(:any)'] = 'member/updatePortofolio/$1';
$route['delete-portofolio/(:any)'] = 'member/deletePortofolio/$1';

//COMPANY

