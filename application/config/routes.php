<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	
	
	$route['login'] = 'AuthController/login';
	$route['logout'] = 'AuthController/logout';

	/*
	 * pinjaman routes modul
	 * */
	$route['pinjaman-mudharabah'] = 'PinjamanController/pinjamanMudharabah';
	$route['pinjaman-mudharabah/tambah'] = 'PinjamanController/tambahMudharabah';

	/*
	 * simpanan routes modul
	 * */
	$route['simpanan-amanah'] = 'SimpananController/simpananAmanah';

	/*
	 * anggota modul routes
	 * */
	$route['anggota'] = 'AnggotaController';
	$route['anggota/tambah'] = 'AnggotaController/tambah';
	$route['anggota/ubah/(:any)'] = 'AnggotaController/ubah/$1';
	$route['anggota/hapus/(:any)'] = 'AnggotaController/hapus/$1';
	$route['anggota/(:any)'] = 'AnggotaController/detail/$1';

	$route['default_controller'] = 'AdminController';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

