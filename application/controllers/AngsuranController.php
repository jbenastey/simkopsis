<?php

class AngsuranController extends GLOBAL_Controller{

    public function __construct()
    {
        parent::__construct();
        $model = array('PinjamanModel');
		$this->load->model($model);
    }

    public function angsuranMudharabah()
    {
        $data['title'] = 'Data Angsuran Mudharabah';

        parent::template('angsuran/mudharabah',$data);
    }
}
