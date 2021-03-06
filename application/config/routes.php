<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//HOME
$route['default_controller'] = 'home/index'; //home/homepage

//SEARCH
$route['cari-kerja'] = 'search/cariKerja'; //home/homepage

//AUTH
$route['registrasi']                    = 'auth/registrasi';
$route['logout']                        = 'auth/logout';
$route['login']                         = 'auth/login';
$route['verify_register/(:any)/(:any)'] = 'auth/verify_register/$1/$2';
$route['forgotPassword']                = 'auth/forgotPassword';
$route['newPassword/(:any)/(:any)']     = 'auth/newPassword/$1/$2';

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
$route['update-profile-company'] = 'company/updateProfileCompany'; //$1
$route['detail-profile-company'] = 'company/detailProfileCompany'; //$1

$route['create-lowongan-kerja'] = 'company/createLowonganKerja';
$route['update-lowongan-kerja/(:any)'] = 'company/updateLowonganKerja/$1';
$route['detail-lowongan-kerja/(:any)'] = 'company/detailLowonganKerja/$1';
