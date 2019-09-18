<?php

class AnggotaController extends GLOBAL_Controller
{
    public function __construct()
    {
        parent::__construct();
		$model = array('AnggotaModel');
		$this->load->model($model);
    }

    public function index()
    {
        $data['title'] = 'Daftar Anggota ';
        $data['anggota'] = parent::model('AnggotaModel')->lihat_semua();

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
    	if (isset($_POST['tambah'])){

    		$data = array(
				'anggota_nama' => parent::post('nama'),
				'anggota_tempat_lahir' => parent::post('tempat-lahir'),
				'anggota_tanggal_lahir' => parent::post('tanggal-lahir'),
				'anggota_nama_ibu' => parent::post('nama-ibu'),
				'anggota_pendidikan' => parent::post('pendidikan'),
				'anggota_pekerjaan' => parent::post('pekerjaan'),
				'anggota_pendapatan' => parent::post('pendapatan'),
				'anggota_jk' => parent::post('jenis-kelamin'),
				'anggota_status_kawin' => parent::post('status-kawin'),
				'anggota_agama' => parent::post('agama'),
				'anggota_nik' => parent::post('nik'),
				'anggota_nomor_hp' => parent::post('telepon'),
				'anggota_email' => parent::post('email'),
				'anggota_alamat' => parent::post('alamat')
			);

    		$simpan = parent::model('AnggotaModel')->tambah($data);

    		if ($simpan > 0 ){
    			parent::alert('alert','sukses_tambah');
    			redirect('anggota');
			} else {
				parent::alert('alert','gagal_tambah');
    			redirect('anggota');
			}
		} else {
			$data['title'] = 'tambah anggota koperasi baru';

			parent::template('anggota/tambah',$data);
		}
    }

    public function ubah($id)
    {
        if (isset($_POST['ubah'])){
			$data = array(
				'anggota_nama' => parent::post('nama'),
				'anggota_tempat_lahir' => parent::post('tempat-lahir'),
				'anggota_tanggal_lahir' => parent::post('tanggal-lahir'),
				'anggota_nama_ibu' => parent::post('nama-ibu'),
				'anggota_pendidikan' => parent::post('pendidikan'),
				'anggota_pekerjaan' => parent::post('pekerjaan'),
				'anggota_pendapatan' => parent::post('pendapatan'),
				'anggota_jk' => parent::post('jenis-kelamin'),
				'anggota_status_kawin' => parent::post('status-kawin'),
				'anggota_agama' => parent::post('agama'),
				'anggota_nik' => parent::post('nik'),
				'anggota_nomor_hp' => parent::post('telepon'),
				'anggota_email' => parent::post('email'),
				'anggota_alamat' => parent::post('alamat')
			);

			$simpan = parent::model('AnggotaModel')->ubah($id,$data);

			if ($simpan > 0 ){
				parent::alert('alert','sukses_ubah');
				redirect('anggota');
			} else {
				parent::alert('alert','gagal_ubah');
				redirect('anggota');
			}
        }else {
			$data['title'] = 'ubah data anggota koperasi ';
			$query = array(
				'anggota_id' => $id
			);
			$data['anggota'] = parent::model('AnggotaModel')->lihat_anggota($query);

			parent::template('anggota/ubah',$data);
		}
    }

    public function hapus($id){
		$query = array(
			'anggota_id' => $id
		);
		$hapus = parent::model('AnggotaModel')->hapus($query);
		if ($hapus > 0 ){
			parent::alert('alert','sukses_hapus');
			redirect('anggota');
		} else {
			parent::alert('alert','gagal_hapus');
			redirect('anggota');
		}
	}

}
