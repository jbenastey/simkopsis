<?php

class AngsuranController extends GLOBAL_Controller{

    public function __construct()
    {
        parent::__construct();
        $model = array('AngsuranModel','PinjamanModel');
		$this->load->model($model);
    }

    public function angsuranMudharabah()
    {
    	if (isset($_POST['simpan'])){
    		$pinjamanId = parent::post('pinjaman-id');
			$query = array(
				'pinjaman_id' => $pinjamanId
			);
    		$angsuran = parent::post('angsuran');
    		$totalPinjam = parent::model('PinjamanModel')->lihat($query)['pinjaman_total'];

    		$data = array(
    			'angsuran_pinjaman_id' => $pinjamanId,
    			'angsuran_jumlah' => $angsuran
			);

			$simpan = parent::model('AngsuranModel')->tambah($data);

			if ($simpan > 0 ){
				$pinjamanSekarang = $totalPinjam - $angsuran;
				$dataUpdate = array(
					'pinjaman_total' => $pinjamanSekarang
				);
				$update = parent::model('PinjamanModel')->ubah($pinjamanId,$dataUpdate);
				if ($update > 0 ){
					parent::alert('alert','sukses_tambah');
					redirect('angsuran-mudharabah');
				} else {
					parent::alert('alert','gagal_tambah');
					redirect('angsuran-mudharabah');
				}
			} else {
				parent::alert('alert','gagal_tambah');
				redirect('angsuran-mudharabah');
			}
		} else {
			$data['title'] = 'Data Angsuran Mudharabah';

			parent::template('angsuran/mudharabah',$data);
		}
    }
}
