<?php
/**
 * Created by PhpStorm.
 * User: ibag
 * Date: 7/13/2019
 * Time: 2:02 PM
 */

	class Service extends GLOBAL_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AnggotaModel','anggota');
			$this->load->model('SimpananModel','simpanan');
		}


		/*
		 * get data service
		 * */
		// anggota
        public function anggota()
        {
            $anggotas = parent::model('anggota')->lihat_semua();

            if (!empty($anggotas)){
                echo json_encode(array(
                    'data' => $anggotas,
                    'status' => '200',
                    'message' => 'menampilkan semua data anggota'
                ));
            }else{
                echo json_encode(array(
                   'data' => null,
                   'status' => '500',
                   'message' => 'data anggota kosong'
                ));
            }
        }

        public function detailAnggota($id)
        {

			$query = array(
				'anggota_id' => $id
			);
            $anggotas = parent::model('anggota')->lihat_anggota($query);

            if (!empty($anggotas)){
                echo json_encode(array(
                    'data' => $anggotas,
                    'status' => '200',
                    'message' => 'menampilkan detail data anggota'
                ));
            }else{
                echo json_encode(array(
                   'data' => null,
                   'status' => '500',
                   'message' => 'data anggota kosong'
                ));
            }
        }

        public function pinjamanMudharabah($id){
			$queryPinjaman = array(
				'pinjaman_anggota_id' => $id,
				'pinjaman_jenis' => 'mudharobah'
			);
			$pinjaman = parent::model('anggota')->lihat_pinjaman($queryPinjaman)->row_array();
			if (!empty($pinjaman)){
				echo json_encode(array(
					'data' => $pinjaman,
					'status' => '200',
					'message' => 'menampilkan data pinjaman'
				));
			}else{
				echo json_encode(array(
					'data' => null,
					'status' => '500',
					'message' => 'data anggota kosong'
				));
			}
		}

        public function getSaldoAnggota(){

            $cekAnggotaExist = parent::model('simpanan')->cek_data_saldo_anggota_exists(parent::post('anggota_id'),parent::post('simpanan_jenis'));

            if ($cekAnggotaExist->row_array() !== null){
                echo json_encode(array(
                    'data' => $cekAnggotaExist->row_array(),
                    'status' => '200',
                    'message' => 'menampilkan data simpanan'
                ));
            }else{
                echo json_encode(array(
                    'data' => null,
                    'status' => '500',
                    'message' => 'data simpanan kosong'
                ));
            }

        }

        /*
         * end of get data service
         * */



	}
