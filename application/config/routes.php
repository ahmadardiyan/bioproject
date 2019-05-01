<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//HOME
$route['default_controller'] = 'home/index'; //home/homepage

//AUTH
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

//ADMIN
$route['admin'] = 'admin/dashboard';

//MEMBER
$route['member'] = 'member/index';
$route['about'] = 'member/about';
$route['update-profile'] = 'member/updateProfile'; //$1

$route['create-portofolio'] = 'member/createPortofolio';
$route['detail-portofolio/(:any)'] = 'member/detailPortofolio/$1';
$route['edit-portofolio/(:any)'] = 'member/updatePortofolio/$1';
$route['delete-portofolio/(:any)'] = 'member/deletePortofolio/$1';

$route['update-keahlian'] = 'keahlian/updateKeahlian'; //$1

$route['sertifikat'] = 'member/getSertifikat'; //$1

$route['create-pengalaman-kerja'] = 'member/createPengalamanKerja'; //$1

//COMPANY

