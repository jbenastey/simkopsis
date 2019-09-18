<div class="row show-on-large hide-on-small-only" >
    <div class="col s12 ">
        <div class="card">
            <div class="card-content margin" style="margin: 12px;">
                <div class="row">
                    <div class="col s6 m6 l6">
                        <h4 class="cardbox-text light left margin">daftar anggota</h4>
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
                    <th >Kode</th>
                    <th >Nama</th>
                    <th >Alamat</th>
                    <th >Email</th>
                    <th >No HP</th>
                    <th >Pekerjaan</th>
                    <th >Pendapatan</th>
                    <th class="center">AKSI</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="grey-text text-darken-1">kambing</td>
                        <td class="teal-text text-darken-1">
                            <a href="<?= base_url('anggota/kode')?>" style="text-decoration: underline">
                                John Kamal
                            </a>
                        </td>
                        <td class="grey-text text-darken-1">
                            kambing
                        </td>
                        <td class="grey-text text-darken-1">kambing</td>
                        <td class="grey-text text-darken-1">
                            kambing
                        </td>
                        <td class="grey-text text-darken-1">kambing</td>
                        <td class="grey-text text-darken-1">kambing</td>
                        <td>
                            <div class="row">
                                <a href="#" class="btn-flat waves-effect waves-orange col l6 center" title="ubah data">
                                    <i class="mdi-content-create orange-text"></i>
                                </a>
                                <a href="#delete" class="btn-flat waves-effect waves-red col l6 modal-trigger center" title="hapus data">
                                    <i class="mdi-action-delete red-text text-darken-3"></i>
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
    <a class="btn-floating btn-large teal" href="<?= base_url('anggota/tambah')?>">
        <i class="mdi-av-playlist-add"></i>
    </a>
</div>
<!-- Floating Action Button -->
