<?php

class PenarikanController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('PenarikanModel','penarikan');
        $this->load->model('SimpananModel','simpanan');

        if (!parent::hasLogin()) {
            $this->session->set_flashdata('alert', 'belum_login');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['title'] = 'Data Riwayat Penarikan';

        parent::template('admin/dashboard',$data);
    }

    /*
     * insert
     * */

    public function tambah()
    {
        if (isset($_POST['simpan'])){
            $url = parent::post('penarikan-url');
            $dataPenarikan = array(
              'anggota_id'  => parent::post('penarikan-anggota'),
                'simpanan_jenis' => parent::post('penarikan-jenis'),
                'penarikan_jumlah' => parent::post('penarikan')
            );

            $cekAnggotaExist = parent::model('simpanan')->cek_data_saldo_anggota_exists($dataPenarikan['anggota_id'],$dataPenarikan['simpanan_jenis']);

            if ($cekAnggotaExist->num_rows() > 0){
                $dataSaldoExists = $cekAnggotaExist->row_array();

                $idSaldo = $dataSaldoExists['saldo_id'];
                $totalSaldo = (int)$dataSaldoExists['saldo_total']-$dataPenarikan['penarikan_jumlah'];

                $updateStatus = parent::model('simpanan')->tambahJumlahSaldo($idSaldo,$totalSaldo);

                if ($updateStatus > 0){
                    $insertStatus = parent::model('penarikan')->insert($dataPenarikan);

                    if ($insertStatus > 0){
                        parent::alert('alert','sukses_tambah');
                        redirect($url);
                    }else{
                        parent::alert('alert','gagal_tambah');
                        redirect($url);
                    }
                }
            }
        }else{
            show_404();
        }
    }


}
