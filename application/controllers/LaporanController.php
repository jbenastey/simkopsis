<?php

class LaporanController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
		$model = array('AnggotaModel');
		$this->load->model($model);
    }

    public function anggota()
    {
        $data['title'] = 'Rekap Laporan Anggota Koperasi ';
        $data['anggota'] = parent::model('AnggotaModel')->lihat_semua();

        parent::template('laporan/anggota',$data);
    }


}
