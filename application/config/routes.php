<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//HOME
$route['default_controller'] = 'home/index'; //home/homepage

//SEARCH
$route['cari-kerja'] = 'search/cariKerja'; //home/homepage

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

//PORTOFOLIO
$route['create-portofolio'] = 'portofolio/createPortofolio';
$route['detail-portofolio/(:any)'] = 'portofolio/getPortofolio/$1';
$route['edit-portofolio/(:any)'] = 'portofolio/updatePortofolio/$1';
$route['delete-portofolio/(:any)'] = 'portofolio/deletePortofolio/$1';

$route['update-keahlian'] = 'keahlian/updateKeahlian'; //$1

//SERTIFIKAT
$route['sertifikat'] = 'sertifikat/getAllSertifikat'; //$1
$route['create-sertifikat'] = 'sertifikat/createSertifikat'; //$1
$route['update-sertifikat'] = 'sertifikat/updateSertifikat'; //$1
$route['delete-sertifikat/(:any)'] = 'sertifikat/deleteSertifikat/$1'; //$1

//PENDIDIKAN
$route['pendidikan'] = 'pendidikan/getAllPendidikan'; //$1
$route['create-pendidikan'] = 'pendidikan/createPendidikan'; //$1
$route['update-pendidikan'] = 'pendidikan/updatePendidikan'; //$1
$route['delete-pendidikan/(:any)'] = 'pendidikan/deletePendidikan/$1'; //$1

// PENGALAMAN KERJA
$route['pengalaman-kerja'] = 'Pengalaman_kerja/getAllPengalamanKerja'; //$1
$route['create-pengalaman-kerja'] = 'Pengalaman_kerja/createPengalamanKerja'; //$1
$route['update-pengalaman-kerja'] = 'Pengalaman_kerja/updatePengalamanKerja'; //$1
$route['delete-pengalaman-kerja/(:any)'] = 'Pengalaman_kerja/deletePengalamanKerja/$1'; //$1

//COMPANY
$route['company'] = 'company/index';

$route['create-lowongan-kerja'] = 'company/createLowonganKerja';
$route['detail-lowongan-kerja/(:any)'] = 'company/detailLowonganKerja/$1';
