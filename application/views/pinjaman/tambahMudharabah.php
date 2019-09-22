<div id="sales-top-home-page">
    <div class="row">
        <div class="col s12 m12">
            <div class="card-panel">
                <h5 class="more-text center grey-text">tambah data pinjaman mudharabah</h5>

                <form action="<?= base_url('anggota/tambah')?>" method="post" autocomplete="off">

                    <div class="row margin">
                        <div class="col s12 m1">
                            <h3 class="grey-text">
                                <i class="mdi-action-perm-identity"></i>
                            </h3>
                        </div>
                        <div class="input-field col s12 m11">
                            <input id="search-anggota" type="text" class="validate custom-box-search" name="anggota-form" required placeholder="ketikkan nama anggota">
                            <input type="text" name="anggota" id="id-anggota" hidden>
                            <!--set jenis simpanan directly-->
                            <input type="text" name="jenis" value="amanah" hidden>
                        </div>

                        <div class="input-field col s12 m12">
                            <i class="mdi-action-account-balance-wallet prefix grey-text text-lighten-1"></i>
                            <input id="pinjaman" type="text" class="validate rupiah-input" name="total-pinjam" required>
                            <label for="pinjaman">Total Pinjam</label>
                        </div>

                        <div class="input-field col s12 m12 " style="margin-bottom: 30px">
                            <i class="mdi-device-access-time prefix grey-text text-lighten-1"></i>
                            <input id="tenggat" type="text" class="validate rupiah-input" name="tenggat-pinjam" required>
                            <label for="tenggat">Tenggat Waktu Peminjaman</label>
                        </div>

                        <h6 class="more-text">Dokumen Syarat Peminjaman</h6>

                        <div class="file-field input-field col s6 m6">
                            <div class="btn">
                                <span><i class="mdi-file-attachment"></i></span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="fotocopy KTP">
                            </div>
                        </div>
                        <div class="file-field input-field col s6 m6">
                            <div class="btn">
                                <span><i class="mdi-file-attachment"></i></span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="fotocopy KK">
                            </div>
                        </div>
                        <div class="file-field input-field col s6 m6">
                            <div class="btn">
                                <span><i class="mdi-file-attachment"></i></span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="fotocopy Tagihan Listrik">
                            </div>
                        </div>
                        <div class="file-field input-field col s6 m6">
                            <div class="btn">
                                <span><i class="mdi-file-attachment"></i></span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="fotocopy Jaminan (BPKB/STNK dll)">
                            </div>
                        </div>
                        <div class="file-field input-field col s6 m6">
                            <div class="btn">
                                <span><i class="mdi-file-attachment"></i></span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Surat Keterangan Bekerja (Karyawan)">
                            </div>
                        </div>
                        <div class="file-field input-field col s6 m6">
                            <div class="btn">
                                <span><i class="mdi-file-attachment"></i></span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Slip Gaji Karyawan">
                            </div>
                        </div>
                        <div class="file-field input-field col s12 m12">
                            <div class="btn">
                                <span><i class="mdi-file-attachment"></i></span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="fotocopy Tagihan Listrik">
                            </div>
                        </div>



                        <div class="col s12 m12 ">
                            <div id="simpanan-alert" class="card green lighten-5 z-depth-1">
                                <div class="card-content green-text ">
                                    <p>PINJAMAN MUDHARABAH : Mudharobah adalah akad kerjasama usaha antara pemilik dana sebagai pihak yang menyediakan modal dengan pihak pengelola modal (koperasi), untuk diusahakan dengan bagi hasil (nisbah) sesuai dengan kesepakatan dimuka dari kedua belah pihak. Dalam hal ini Koperasi akan memberikan 100% permodalan kepada pengusaha yang telah memiliki tenaga kerja dan keterampilan tetapi belum memiliki modal sama sekali.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6">
                            <a href="<?= base_url('anggota')?>" class="btn waves-effect col s12 z-depth-0 grey lighten-4 black-text">batalkan</a>
                        </div>
                        <div class="input-field col s12 m6">
                            <button type="submit" name="tambah" class="btn waves-effect waves-light col s12 blue">tambahkan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>