<?php

class PinjamanController extends GLOBAL_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function pinjamanMudharabah()
    {
        $data['title'] = 'Simpanan Amanah';

        parent::template('pinjaman/mudharabah',$data);
    }

    public function tambahMudharabah()
    {
        $data['title'] = 'Tambah data pinjaman mudharabah';

        parent::template('pinjaman/tambahMudharabah',$data);
    }

}