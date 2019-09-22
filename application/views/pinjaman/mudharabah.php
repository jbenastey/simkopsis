<div class="row show-on-large hide-on-small-only" >
    <div class="col s12 ">
        <div class="card">
            <div class="card-content margin" style="margin: 12px;">
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h4 class="cardbox-text light left margin">daftar pinjaman mudharabah</h4>
                    </div>
                    <!--                    <div class="col s6 m6 l6">-->
                    <!--                        <a href="#tambah-kategori" class="btn-flat white-text blue right waves-effect waves-light modal-trigger">-->
                    <!--                            tambah kategori-->
                    <!--                        </a>-->
                    <!--                    </div>-->

                </div>
            </div>

            <br>
            <div class="divider"></div>
            <table class="bordered" id="barang-table">
                <thead>
                <tr>
                    <th >Kode Pengajuan</th>
                    <th >Nama Anggota</th>
                    <th >Pekerjaan</th>
                    <th >Tanggal Mengajukan</th>
                    <th >Total Pinjaman</th>
                    <th >Status Pengajuan Pinjaman</th>
                    <th class="center">AKSI</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="grey-text text-darken-1">
                        <a href="<?= base_url('anggota/kode')?>" style="text-decoration: underline">
                            2043
                        </a>
                    </td>
                    <td class="teal-text text-darken-1">
                        <a href="<?= base_url('anggota/kode')?>" style="text-decoration: underline">
                            John Kamal
                        </a>
                    </td>
                    <td class="grey-text text-darken-1">kambing</td>
                    <td class="grey-text text-darken-1">kambing</td>
                    <td class="grey-text text-darken-1">kambing</td>
                    <td class="grey-text text-darken-1"><span class="task-cat orange">menunggu</span></td>
                    <td>
                        <div class="row">
                            <a href="#" class="btn-flat waves-effect waves-red col l6 center" title="tolak pengajuan">
                                <i class="mdi-av-not-interested red-text"></i>
                            </a>
                            <a href="#" class="btn-flat waves-effect waves-green col l6 center" title="setujui pengajuan">
                                <i class="mdi-action-done green-text"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- Modal delete -->
                <div id="delete" class="modal">
                    <div class="modal-content">
                        <h4 class="red-text text-lighten-1">
                            <i class="mdi-action-info-outline"></i> Yakin ingin menghapus barang ?
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
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
    <a href="<?= base_url('pinjaman-mudharabah/tambah')?>" class="btn-floating btn-large teal modal-trigger" >
        <i class="mdi-av-playlist-add"></i>
    </a>
</div>
<!-- Floating Action Button -->

