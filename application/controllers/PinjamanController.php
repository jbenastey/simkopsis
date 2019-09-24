<?php

class PinjamanController extends GLOBAL_Controller{

    public function __construct()
    {
        parent::__construct();
        $model = array('PinjamanModel');
		$this->load->model($model);
    }

    public function pinjamanMudharabah()
    {
        $data['title'] = 'Simpanan Amanah';
		$data['mudharabah'] = parent::model('PinjamanModel')->lihat_semua()->result_array();

        parent::template('pinjaman/mudharabah',$data);
    }

    public function tambahMudharabah()
    {
    	if (isset($_POST['tambah'])){
			$data = array(
				'pinjaman_anggota_id' => parent::post('anggota'),
				'pinjaman_jenis' => 'mudharobah',
				'pinjaman_total' => parent::post('total-pinjam'),
				'pinjaman_tenggat' => parent::post('tenggat-pinjam'),
				'pinjaman_keterangan' => 'PINJAMAN MUDHARABAH : Mudharobah adalah akad kerjasama usaha antara pemilik dana sebagai pihak yang menyediakan modal dengan pihak pengelola modal (koperasi), untuk diusahakan dengan bagi hasil (nisbah) sesuai dengan kesepakatan dimuka dari kedua belah pihak. Dalam hal ini Koperasi akan memberikan 100% permodalan kepada pengusaha yang telah memiliki tenaga kerja dan keterampilan tetapi belum memiliki modal sama sekali.'
			);

			$simpan = parent::model('PinjamanModel')->tambah($data);

			if ($simpan > 0 ){
				parent::alert('alert','sukses_tambah');
				redirect('pinjaman-mudharabah');
			} else {
				parent::alert('alert','gagal_tambah');
				redirect('pinjaman-mudharabah');
			}

		} else {
			$data['title'] = 'Tambah data pinjaman mudharabah';

			parent::template('pinjaman/tambahMudharabah',$data);
		}
    }

}
