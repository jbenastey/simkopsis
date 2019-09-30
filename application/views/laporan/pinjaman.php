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
                                daftar pinjaman anggota koperasi
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
                                        <th class="laporan">Pinjaman Mudharabah</th>
                                        <th class="laporan">Pinjaman Murabhahah</th>
                                        <th class="laporan">Pinjaman Musyarakah</th>
                                        <th class="laporan">Pinjaman Ijarah</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    $no = 1;
                                    $mudharabahTotal = 0;
                                    $murabahahTotal = 0;
                                    $musyarakahTotal = 0;
                                    $ijarahTotal = 0;
                                    foreach ($anggota as $key=>$value):
                                        $mudharabah = $model->get_total_pinjaman_by_jenis($value['anggota_id'],'mudharobah');
                                        $murabahah = $model->get_total_pinjaman_by_jenis($value['anggota_id'],'murabahah');
                                        $musyarakah = $model->get_total_pinjaman_by_jenis($value['anggota_id'],'musyarakah');
                                        $ijarah = $model->get_total_pinjaman_by_jenis($value['anggota_id'],'ijarah');
                                ?>
                                    <tr>
                                        <td class="laporan"><?= $no?></td>
                                        <td class="laporan"><?= $value['anggota_nama']?></td>
                                        <td class="laporan">Rp <?= number_format($mudharabah['SUM(pinjaman_total)'],2,",",".")?></td>
                                        <td class="laporan">Rp <?= number_format($murabahah['SUM(pinjaman_total)'],2,",",".")?></td>
                                        <td class="laporan">Rp <?= number_format($musyarakah['SUM(pinjaman_total)'],2,",",".")?></td>
                                        <td class="laporan">Rp <?= number_format($ijarah['SUM(pinjaman_total)'],2,",",".")?></td>
                                    </tr>
                                <?php
                                    $mudharabahTotal += (int)$mudharabah['SUM(pinjaman_total)'];
                                    $murabahahTotal += (int)$murabahah['SUM(pinjaman_total)'];
                                    $musyarakahTotal += (int)$musyarakah['SUM(pinjaman_total)'];
                                    $ijarahTotal += (int)$ijarah['SUM(pinjaman_total)'];
                                    $no++;
                                    endforeach;
                                ?>
                                    <tr>
                                        <td colspan="2" class="laporan">Total</td>
                                        <td class="laporan">Rp <?= number_format($mudharabahTotal,2,',','.')?></td>
                                        <td class="laporan">Rp <?= number_format($murabahahTotal,2,',','.')?></td>
                                        <td class="laporan">Rp <?= number_format($musyarakahTotal,2,',','.')?></td>
                                        <td class="laporan">Rp <?= number_format($ijarahTotal,2,',','.')?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <br>
                        <div class="col m12 l12" style="width: 100%;display: block">
                            <div class="row" style="margin-top: 40px">
                                <div class="col m6 l6">
                                    <h6 class="cardbox-text">Pekanbaru, <?= date('d/m/Y',time());?></h6>
                                </div>
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



