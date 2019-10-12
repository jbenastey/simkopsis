<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel" >
            <div class="row">
                <div class="col s12 m12 l12 ">
                    <button class="btn blue right waves-effect waves-light" id="btn-cetak-surat-keluar">
                        <i class="mdi-action-print"></i>
                    </button>
                </div>

                <div class="col l12 no-padding" id="surat-keluar-barang" style="padding: 12px;box-sizing: border-box">
                    <h4 class="divider" ></h4>
                    <div class="row">
                        <div class="col m6 l2" style="width: 20%; display: inline">
                            <img src="<?= base_url('assets/images/favicon/simkopsis-icon.png')?>" alt="" width="110px" height="110px">
                        </div>
                        <div class="col m10 l10" style="width: 80%; display: inline">
                            <h5 class="cardbox-text ">Koperasi Simpan pinjam syariah pengadilan agama pekanbaru klas 1a</h5>
                            <h6 class="light ">Jl. Datuk Setia Maharaja/Parit Indah, Tengkerang Labuai, Pekanbaru, Kota Pekanbaru, Riau 28289</h6>
                            <div class="row">
                                <div class="col m6 l6" style="width: 50%;display: inline;text-align: left">
                                    <h6 class="light margin"> Telepon : (0761) 572855</h6>
                                </div>
                                <div class="col m6 l6" style="width: 50%;display: inline;text-align: left">
                                    <h6 class="light margin"> Fax : 021-45854282</h6>
                                </div>
                            </div>
                            <h5 class="divider"></h5>
                        </div>

                        <div class="divider"></div>

                        <div class="col m12 l12 " style="width: 100%;display: block;text-align: center">
                            <h5 class="cardbox-text center">
                                daftar simpanan anggota koperasi
                            </h5>
                        </div>

                        <div class="col m12 l12 ">
                            <div class="row">
                                <div class="col m6 l6">
                                    <h6 class="cardbox-text">Tanggal : <?= date('d/m/Y',time());?></h6>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col m12 l12" style="display: block; width: 100%">
                            <table class="bordered">
                                <thead>
                                <tr>
                                    <th class="laporan">No</th>
                                    <th class="laporan">Nama </th>
                                    <th class="laporan">Simpanan Amanah</th>
                                    <th class="laporan">Simpanan Qurban/Aqikah</th>
                                    <th class="laporan">Simpanan Umrah/Haji</th>
                                    <th class="laporan">Simpanan Idul Fitri</th>
                                    <th class="laporan">Simpanan Wadi'ah</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                $totalAmanah = 0;
                                $totalKurban = 0;
                                $totalUmrah  = 0;
                                $totalIdulFitri = 0;
                                $totalWadiah = 0;
                                foreach ($anggota as $key=>$value):
                                    $amanah = $model->get_total_simpanan_by_jenis($value['anggota_id'],'amanah');
                                    $kurban = $model->get_total_simpanan_by_jenis($value['anggota_id'],'kurban');
                                    $umroh = $model->get_total_simpanan_by_jenis($value['anggota_id'],'umroh');
                                    $idulFitri = $model->get_total_simpanan_by_jenis($value['anggota_id'],'idul_fitri');
                                    $wadiah = $model->get_total_simpanan_by_jenis($value['anggota_id'],'wadiah');

                                ?>
                                <tr>
                                    <td class="laporan"><?= $no;?></td>
                                    <td class="laporan"><?= $value['anggota_nama']?></td>
                                    <td class="laporan">Rp <?= number_format($amanah['SUM(simpanan_total)'],2,",",".")?></td>
                                    <td class="laporan">Rp <?= number_format($kurban['SUM(simpanan_total)'],2,",",".")?></td>
                                    <td class="laporan">Rp <?= number_format($umroh['SUM(simpanan_total)'],2,",",".")?></td>
                                    <td class="laporan">Rp <?= number_format($idulFitri['SUM(simpanan_total)'],2,",",".")?></td>
                                    <td class="laporan">Rp <?= number_format($wadiah['SUM(simpanan_total)'],2,",",".")?></td>
                                </tr>
                                <?php
                                    $totalAmanah+= (int)$amanah['SUM(simpanan_total)'];
                                    $totalKurban+= (int)$kurban['SUM(simpanan_total)'];
                                    $totalUmrah+= (int)$umroh['SUM(simpanan_total)'];
                                    $totalIdulFitri+= (int)$idulFitri['SUM(simpanan_total)'];
                                    $totalWadiah+= (int)$wadiah['SUM(simpanan_total)'];
                                    $no++;
                                endforeach;
                                ?>

                                <tr>
                                    <td colspan="2" class="laporan">Total Jumlah</td>
                                    <td class="laporan">Rp <?= number_format($totalAmanah,2,",",".")?></td>
                                    <td class="laporan">Rp <?= number_format($totalKurban,2,",",".")?></td>
                                    <td class="laporan">Rp <?= number_format($totalUmrah,2,",",".")?></td>
                                    <td class="laporan">Rp <?= number_format($totalIdulFitri,2,",",".")?></td>
                                    <td class="laporan">Rp <?= number_format($totalWadiah,2,",",".")?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <br>
                        <div class="col m12 l12" style="width: 100%;display: block">
                            <div class="row" style="margin-top: 40px">
                                <div class="col m4 l4 right">
                                    <h6 class="cardbox-text margin center">Yang Mengeluarkan,</h6>
                                    <h6 class="cardbox-text margin center">Mengetahui</h6>
                                    <br>
                                    <br>
                                    <br>
                                    <h6 class=" center"><?= ucfirst($this->session->userdata('name'))?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



