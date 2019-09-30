<?php

class SimpananModel extends GLOBAL_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function lihat_semua()
    {
        $sourceTable = array('name' => 'simkopsis_simpanan',
            array('simpanan_anggota_id'));//array unique or id source
        $destinationTable = array(
            'table' => array('simkopsis_anggota'), //array table
            'id' => array('anggota_id'));//array unique or id destination
        return parent::get_join_table($sourceTable, $destinationTable);
    }

    public function tambah($data)
    {
        return parent::insert_with_status('simkopsis_simpanan', $data);
    }

    /*
     * insert
     * */
    // insert saldo
    public function insertSaldo($insertDataSaldo)
    {
        return parent::insert_with_status('simkopsis_saldo',$insertDataSaldo);
    }


    /*
     * Modul Query Mengubah data
     * */

    public function tambahJumlahSaldo($idSaldo,$totalSaldo)
    {
        $query = array('saldo_total' => $totalSaldo);

        return parent::update_table_with_status('simkopsis_saldo','saldo_id',$idSaldo,$query);
    }

    /*
     * TYPE : Query Utilitas
     * return type : int
     * desc : mengembalikan nilai 1 jika pengguna telah memiliki data saldo, 0 jika tidak
     * */
    public function cek_data_saldo_anggota_exists($idAnggota, $jenis)
    {
        $query = array('anggota_id' => $idAnggota,'simpanan_jenis' => $jenis);
        $saldo = parent::get_object_of_row('simkopsis_saldo',$query);
        return $saldo;
    }
}
