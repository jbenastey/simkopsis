<?php
/**
 * Created by PhpStorm.
 * User: ibag
 * Date: 7/13/2019
 * Time: 2:02 PM
 */

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