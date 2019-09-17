<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	
	
	$route['login'] = 'AuthController/login';
	$route['logout'] = 'AuthController/logout';

	$route['default_controller'] = 'AdminController';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

