<?php

	class AdminController extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if (!parent::hasLogin()) {
				$this->session->set_flashdata('alert', 'belum_login');
				redirect(base_url('login'));
			}
		}
		

		public function index()
		{
			$data['title'] = 'Dashboard Admin';

			parent::template('admin/dashboard',$data);
		}
		
        public function profil()
        {
            $data['title'] = 'Profil Admin Koperasi';
            $data['admin'] = $this->session->userdata();

            parent::template('admin/profil',$data);
        }

        public function bantuan()
        {
            $data['title'] = 'Bantuan Penggunaan Sistem';
            $data['admin'] = $this->session->userdata();

            parent::template('admin/bantuan',$data);
        }

        public function pengaturan()
        {
            $data['title'] = 'Pengaturan Sistem';
            $data['admin'] = $this->session->userdata();

            parent::template('admin/pengaturan',$data);
        }
	}
