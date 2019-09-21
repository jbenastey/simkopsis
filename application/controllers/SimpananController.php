<?php

class SimpananController extends GLOBAL_Controller{

    public function __construct()
    {
        parent::__construct();
        $model = array('SimpananModel');
		$this->load->model($model);
    }

    public function simpananAmanah()
    {
    	if (isset($_POST['simpan'])){
    		$data = array(
    			'simpanan_anggota_id' => parent::post('anggota'),
				'simpanan_jenis' => 'amanah',
				'simpanan_total' => parent::post('setoran'),
				'simpanan_keterangan' => 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.'
			);

			$simpan = parent::model('SimpananModel')->tambah($data);

			if ($simpan > 0 ){
				parent::alert('alert','sukses_tambah');
				redirect('simpanan-amanah');
			} else {
				parent::alert('alert','gagal_tambah');
				redirect('simpanan-amanah');
			}
		} else {
			$data['title'] = 'Simpanan Amanah';
			$data['amanah'] = parent::model('SimpananModel')->lihat_semua()->result_array();

			parent::template('simpanan/amanah',$data);
		}
    }

}
