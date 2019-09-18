<?php

class SimpananController extends GLOBAL_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function simpananAmanah()
    {
        $data['title'] = 'Simpanan Amanah';

        parent::template('simpanan/amanah',$data);
    }

}