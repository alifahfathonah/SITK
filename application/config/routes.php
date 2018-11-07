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
$route['default_controller'] = 'controllerfrontend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
$route['login'] = 'ControllerLogin';
$route['login/auth'] = 'ControllerLogin/auth'; 
$route['login/logout'] = 'ControllerLogin/logout'; 

//admin
$route['dashboard'] = 'ControllerDashboard';

//kelas
$route['kelas'] = 'ControllerKelas';
$route['kelas/getKode'] = 'ControllerKelas/getKode';
$route['kelas/simpan'] = 'ControllerKelas/simpan';
$route['kelas/kelas_list'] = 'ControllerKelas/kelas_list';
$route['kelas/hapus/(:any)'] = 'ControllerKelas/hapus/$1';
$route['kelas/edit/(:any)'] = 'ControllerKelas/edit/$1';
$route['kelas/ubah'] = 'ControllerKelas/ubah';

//guru
$route['guru'] = 'ControllerGuru';
$route['guru/getKode'] = 'ControllerGuru/getKode';
$route['guru/simpan'] = 'ControllerGuru/simpan';
$route['guru/guru_list'] = 'ControllerGuru/guru_list';
$route['guru/hapus/(:any)'] = 'ControllerGuru/hapus/$1';
$route['guru/edit/(:any)'] = 'ControllerGuru/edit/$1';
$route['guru/ubah'] = 'ControllerGuru/ubah';

//jenis
$route['jenis_pembayaran'] = 'ControllerJenisPembayaran';
$route['jenis_pembayaran/getKode'] = 'ControllerJenisPembayaran/getKode';
$route['jenis_pembayaran/simpan'] = 'ControllerJenisPembayaran/simpan';
$route['jenis_pembayaran/jenis_list'] = 'ControllerJenisPembayaran/jenis_list';
$route['jenis_pembayaran/hapus/(:any)'] = 'ControllerJenisPembayaran/hapus/$1';
$route['jenis_pembayaran/edit/(:any)'] = 'ControllerJenisPembayaran/edit/$1';
$route['jenis_pembayaran/ubah'] = 'ControllerJenisPembayaran/ubah';

//pengaturan
$route['pengaturan'] = 'ControllerPengaturan';
$route['pengaturan/ubah'] = 'ControllerPengaturan/ubah';
