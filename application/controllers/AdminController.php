<?php

	class AdminController extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();

		}
		

		public function index()
		{
			$data['title'] = 'Dashboard Admin';

			parent::template('admin/dashboard',$data);
		}
		

	}