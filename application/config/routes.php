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
$route['detail-profile'] = 'member/detailProfile';
$route['update-profile'] = 'member/updateProfile'; //$1

$route['create-portofolio'] = 'member/createPortofolio';
$route['detail-portofolio/(:any)'] = 'member/detailPortofolio/$1';
$route['edit-portofolio/(:any)'] = 'member/updatePortofolio/$1';
$route['delete-portofolio/(:any)'] = 'member/deletePortofolio/$1';

$route['update-keahlian'] = 'keahlian/updateKeahlian'; //$1

$route['sertifikat'] = 'member/getAllSertifikat'; //$1
$route['create-sertifikat'] = 'member/createSertifikat'; //$1
$route['update-sertifikat'] = 'member/updateSertifikat'; //$1
$route['delete-sertifikat/(:any)'] = 'member/deleteSertifikat/$1'; //$1

$route['pendidikan'] = 'member/getAllPendidikan'; //$1
$route['create-pendidikan'] = 'member/createPendidikan'; //$1
$route['update-pendidikan'] = 'member/updatePendidikan'; //$1
$route['delete-pendidikan/(:any)'] = 'member/deletePendidikan/$1'; //$1


$route['pengalaman-kerja'] = 'member/getAllPengalamanKerja'; //$1
$route['create-pengalaman-kerja'] = 'member/createPengalamanKerja'; //$1
$route['update-pengalaman-kerja'] = 'member/updatePengalamanKerja'; //$1
$route['delete-pengalaman-kerja/(:any)'] = 'member/deletePengalamanKerja/$1'; //$1

//COMPANY

