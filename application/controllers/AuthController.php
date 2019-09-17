<?php
	/**
	 * Created by PhpStorm.
	 * User: ibag
	 * Date: 7/13/2019
	 * Time: 2:02 PM
	 */

	class AuthController extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AuthModel');
		}
		
		/*
		 * login, register, logout
		 * autentikasi pengguna sales, adminSales, adminGudang dan Superadmin
		 *
		 * **/
		public function login()
		{
			if (parent::hasLogin()){
				if ($this->session->userdata('level') === 'sales'){
					redirect('sales/dashboard');
				}else{
					redirect(base_url());
				}
			}else{
				if (isset($_POST['login'])){
					$email = parent::post('email');
					$password = parent::post('password');
					
					$dataPengguna = parent::model('AuthModel')->get_pengguna($email,md5($password));
					
					if ($dataPengguna->num_rows() > 0){
						$pengguna = $dataPengguna->row_array();
						
						$sessionData = array(
							'user_id' => $pengguna['pengguna_id'],
							'username' => $pengguna['pengguna_username'],
							'name' => $pengguna['pengguna_fullname'],
							'email' => $pengguna['pengguna_email'],
							'level' => $pengguna['pengguna_level'],
							'login' => true
						);
						
						$this->session->set_userdata($sessionData);
						
						if ($pengguna['pengguna_level'] === 'sales'){
							parent::alert('alert','user-welcome');
							redirect('sales/dashboard');
						}else{
							parent::alert('alert','user-welcome');
							redirect(base_url());
						}
					}else{
						parent::alert('alert','error-login');
					}
				}
				
				$data['title'] = 'Masuk - Aplikasi Order Logistik';
				parent::authPage('auth/login',$data);
				
			}
		}
		
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}