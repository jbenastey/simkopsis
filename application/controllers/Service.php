<?php
/**
 * Created by PhpStorm.
 * User: ibag
 * Date: 7/13/2019
 * Time: 2:02 PM
 */

	class Service extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if (!parent::hasLogin()){
				redirect('login');
			}else{

			}
		}
		


	}