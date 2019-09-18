<?php

class AnggotaController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['title'] = 'Daftar Anggota ';

        parent::template('anggota/index',$data);
    }

    public function detail($kode)
    {
        $data['title'] = 'Data anggota '.$kode;
        $data['anggota'] = 'this value get detail anggota from db';

        parent::template('anggota/detail',$data);
    }

    /*
     * insert modul
     * */
    public function tambah()
    {
        $data['title'] = 'tambah anggota koperasi baru';

        parent::template('anggota/tambah',$data);
    }

    public function insert()
    {
        if (isset($_POST['tambah'])){

        }else{
            show_404();
        }
    }

}