<div class="row show-on-large hide-on-small-only" >
    <div class="col s12 ">
        <div class="card">
            <div class="card-content margin" style="margin: 12px;">
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h4 class="cardbox-text light left margin">daftar simpanan amanah</h4>
                    </div>
                    <div class="col s6 m6 l6">
                        <a href="#pengambilan" class="btn-flat white-text blue right waves-effect waves-light modal-trigger">
                            <i class="mdi-action-account-balance-wallet"></i> penarikan
                        </a>
                    </div>

                </div>
            </div>
            <!-- Modal pengambilan -->
            <div id="pengambilan" class="modal">
                <form action="<?= base_url('PenarikanController/tambah')?>" class="" method="post">
                    <div class="modal-content ">
                        <h4 class="center">
                            <span class="cardbox-text">input jumlah penarikan</span>
                        </h4>
                        <div class="modal-content">
                            <div class="row">
                                <div class="col s12 m1">
                                    <h3 class="grey-text">
                                        <i class="mdi-action-perm-identity"></i>
                                    </h3>
                                </div>
                                <div class="input-field col s12 m11">
                                    <input id="penarikan-anggota-search" type="text" class="validate custom-box-search" name="anggota-form" required placeholder="ketikkan nama anggota">
                                    <input type="text" name="penarikan-anggota" id="penarikan-id-anggota" hidden>
                                    <input type="text" name="penarikan-jenis" id="penarikan-jenis" hidden value="amanah">
                                    <input type="text" name="penarikan-url"  hidden value="simpanan-amanah">
                                </div>

                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-balance-wallet prefix grey-text text-lighten-1"></i>
                                    <input id="penarikan" type="number" name="penarikan" required class="penarikan-input" data-jenis="amanah" data-saldo="0">
                                    <label for="penarikan">Jumlah Penarikan</label>
                                </div>
                                <div id="penarikan-alert" class="card red lighten-5 col s12 m12  ">
                                    <div class="card-content red-text">
                                        <p>PERINGATAN : jumlah penarikan melebihi saldo yang ada</p>
                                    </div>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="mdi-editor-attach-money prefix grey-text text-lighten-1"></i>
                                    <input id="saldo" type="text" class="validate" name="saldo" required value="total pinjaman tersisa" readonly disabled data-jenis="amanah" >
                                    <label for="saldo">Saldo Amanah</label>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="waves-effect waves-red btn-flat" id="penarikan-save-btn" name="simpan">lanjutkan</button>
                        <a href="#!" class="waves-effect btn-flat modal-action modal-close">Batalkan</a>
                    </div>
                </form>
            </div>
            <br>
            <div class="divider"></div>
            <table class="bordered" id="barang-table">
                <thead>
                <tr>
                    <th >No</th>
                    <th >Kode ID Anggota</th>
                    <th >Nama Anggota</th>
                    <th >Pekerjaan</th>
                    <th >Tanggal Simpan</th>
                    <th >Total Setoran</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$no  = 1;
				foreach ($amanah as $key=>$value):
                    if ($value['simpanan_jenis'] === 'amanah'):
                ?>
                <tr>
                    <td class="grey-text text-darken-1"><?=$no?></td>
                    <td class="grey-text text-darken-1"><?=$value['anggota_id']?></td>
                    <td class="teal-text text-darken-1">
                        <a href="<?= base_url('anggota/'.$value['anggota_id'])?>" style="text-decoration: underline">
							<?=$value['anggota_nama']?>
                        </a>
                    </td>
                    <td class="grey-text text-darken-1"><?=$value['anggota_pekerjaan']?></td>
                    <td class="grey-text text-darken-1">
						<?=$value['simpanan_date_created']?>
                    </td>
                    <td class="grey-text text-darken-1"> Rp <?= number_format($value['simpanan_total'],2,",",".")?></td>

                </tr>

                <!-- Modal delete -->
                <div id="delete" class="modal">
                    <div class="modal-content">
                        <h4 class="red-text text-lighten-1">
                            <i class="mdi-action-info-outline"></i> Yakin ingin menghapus item ?
                        </h4>
                        <div class="modal-content">
                            <h4>
                                item yang anda hapus akan tersimpan ke data arsip
                            </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="waves-effect waves-red btn-flat modal-action modal-close">lanjutkan</a>
                        <a href="#!" class="waves-effect btn-flat modal-action modal-close">Batalkan</a>
                    </div>
                </div>
				<?php
                        $no++;
				    endif;
				endforeach;
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
    <a href="#modal-tambah" class="btn-floating btn-large teal modal-trigger" >
        <i class="mdi-av-playlist-add"></i>
    </a>
</div>
<!-- Floating Action Button -->

<!-- Modal delete -->
<div id="modal-tambah" class="modal">
    <?=form_open('simpanan-amanah')?>
        <div class="modal-content center">
            <div class="row">
                <div class="col s12 m12 center">
                    <h5 class="more-text">tambah data simpanan amanah</h5>
                    <h5 class="divider"></h5>
                </div>

                <div class="col s12 m1">
                    <h3 class="grey-text">
                        <i class="mdi-action-perm-identity"></i>
                    </h3>
                </div>
                <div class="input-field col s12 m11">
                    <input id="search-anggota" type="text" class="validate custom-box-search" name="anggota-form" required placeholder="ketikkan nama anggota">
                    <input type="text" name="anggota" id="id-anggota" hidden>
                </div>

                <div class="input-field col s12 m12">
                    <i class="mdi-action-account-balance-wallet prefix grey-text text-lighten-1"></i>
                    <input id="setoran" type="number" name="setoran" required class="simpanan-input" data-minimal="10000">
                    <label for="setoran">Jumlah Setoran</label>
                </div>

                <div class="col s12 m12 ">
                    <div id="simpanan-alert" class="card green lighten-5 z-depth-1">
                        <div class="card-content green-text ">
                            <p>SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="simpan" class="waves-effect waves-red btn-flat " id="simpanan-simpan-button">simpan</button>
            <a href="#!" class="waves-effect btn-flat modal-action modal-close">Batalkan</a>
        </div>
    <?=form_close()?>
</div>
