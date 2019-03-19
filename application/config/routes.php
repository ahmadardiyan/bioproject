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

//COMPANY

