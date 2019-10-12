-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Okt 2019 pada 01.17
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simkopsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `simkopsis_anggota`
--

CREATE TABLE `simkopsis_anggota` (
  `anggota_id` int(11) NOT NULL,
  `anggota_nama` varchar(100) NOT NULL,
  `anggota_jk` enum('L','P') NOT NULL,
  `anggota_tempat_lahir` varchar(50) NOT NULL,
  `anggota_tanggal_lahir` date NOT NULL,
  `anggota_nik` varchar(25) NOT NULL,
  `anggota_agama` enum('Islam','Kristen','Katolik','Buddha','Hindu','Konghuchu') NOT NULL,
  `anggota_nama_ibu` varchar(100) NOT NULL,
  `anggota_alamat` text NOT NULL,
  `anggota_pekerjaan` varchar(100) NOT NULL,
  `anggota_pendidikan` varchar(50) NOT NULL,
  `anggota_status_kawin` enum('lajang','menikah','janda','duda') NOT NULL,
  `anggota_nomor_hp` varchar(20) NOT NULL,
  `anggota_email` varchar(50) NOT NULL,
  `anggota_pendapatan` bigint(20) NOT NULL,
  `anggota_dokumen` text,
  `anggota_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simkopsis_anggota`
--

INSERT INTO `simkopsis_anggota` (`anggota_id`, `anggota_nama`, `anggota_jk`, `anggota_tempat_lahir`, `anggota_tanggal_lahir`, `anggota_nik`, `anggota_agama`, `anggota_nama_ibu`, `anggota_alamat`, `anggota_pekerjaan`, `anggota_pendidikan`, `anggota_status_kawin`, `anggota_nomor_hp`, `anggota_email`, `anggota_pendapatan`, `anggota_dokumen`, `anggota_date_created`) VALUES
(2, 'Rian Kurniawan', 'L', 'Jakarta', '1998-09-05', '117710903950', 'Islam', 'Suhartini', 'Jalan Kartama gg rukun', 'Mahasiswa', 'SMA', 'lajang', '081978786512', 'rian.kurniawan@gmail.com', 500000, '{\"ktp\":\"bear.png\",\"kk\":\"Digtive_Dita.PNG\",\"listrik\":\"bear1.png\",\"jaminan\":\"bear2.png\",\"kerja\":\"bear3.png\",\"gaji\":\"bear4.png\",\"rekening\":\"Digtive_Dita1.PNG\"}', '2019-09-19 00:17:21'),
(3, 'Bagas Adibaskara', 'L', 'Pekanbaru', '1996-02-06', '115514399274', 'Islam', 'Anindiya', 'Jl Paus gg ujung', 'Guru', 'SMA', 'menikah', '082174658990', 'bagas@gmail.com', 8000000, NULL, '2019-09-28 21:41:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simkopsis_angsuran`
--

CREATE TABLE `simkopsis_angsuran` (
  `angsuran_id` int(11) NOT NULL,
  `angsuran_pinjaman_id` int(11) NOT NULL,
  `angsuran_jumlah` double NOT NULL,
  `angsuran_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simkopsis_angsuran`
--

INSERT INTO `simkopsis_angsuran` (`angsuran_id`, `angsuran_pinjaman_id`, `angsuran_jumlah`, `angsuran_date_created`) VALUES
(2, 1, 230000, '2019-10-01 04:00:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simkopsis_penarikan`
--

CREATE TABLE `simkopsis_penarikan` (
  `penarikan_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `simpanan_jenis` enum('amanah','kurban','pendidikan','umroh','idul_fitri','wadiah') NOT NULL,
  `penarikan_jumlah` double NOT NULL,
  `pnerikan_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simkopsis_penarikan`
--

INSERT INTO `simkopsis_penarikan` (`penarikan_id`, `anggota_id`, `simpanan_jenis`, `penarikan_jumlah`, `pnerikan_tanggal`) VALUES
(2, 2, 'amanah', 20000, '2019-10-01 03:45:10'),
(3, 2, 'amanah', 50000, '2019-10-01 03:46:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simkopsis_pengguna`
--

CREATE TABLE `simkopsis_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(100) NOT NULL,
  `pengguna_password` varchar(100) NOT NULL,
  `pengguna_hak_akses` enum('pengurus','ketua') NOT NULL,
  `pengguna_nama` varchar(100) NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simkopsis_pengguna`
--

INSERT INTO `simkopsis_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_hak_akses`, `pengguna_nama`, `pengguna_date_created`) VALUES
(1, 'admin', '101d9fd14b31a93b06a10421f14dd023', 'pengurus', 'Toha', '2019-09-29 16:05:52'),
(2, 'ketua', 'd23044c33c7fc1274b3b49bd017355d1', 'ketua', 'Adam', '2019-09-29 16:14:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simkopsis_pinjaman`
--

CREATE TABLE `simkopsis_pinjaman` (
  `pinjaman_id` int(11) NOT NULL,
  `pinjaman_anggota_id` int(11) NOT NULL,
  `pinjaman_jenis` enum('mudharobah','murabahah','musyarakah','ijarah') NOT NULL,
  `pinjaman_total` double NOT NULL,
  `pinjaman_tenggat` int(11) NOT NULL,
  `pinjaman_keterangan` text NOT NULL,
  `pinjaman_status` enum('tolak','setuju','tunggu','') NOT NULL DEFAULT 'tunggu',
  `pinjaman_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simkopsis_pinjaman`
--

INSERT INTO `simkopsis_pinjaman` (`pinjaman_id`, `pinjaman_anggota_id`, `pinjaman_jenis`, `pinjaman_total`, `pinjaman_tenggat`, `pinjaman_keterangan`, `pinjaman_status`, `pinjaman_date_created`) VALUES
(1, 2, 'mudharobah', 0, 3, 'PINJAMAN MUDHARABAH : Mudharobah adalah akad kerjasama usaha antara pemilik dana sebagai pihak yang menyediakan modal dengan pihak pengelola modal (koperasi), untuk diusahakan dengan bagi hasil (nisbah) sesuai dengan kesepakatan dimuka dari kedua belah pihak. Dalam hal ini Koperasi akan memberikan 100% permodalan kepada pengusaha yang telah memiliki tenaga kerja dan keterampilan tetapi belum memiliki modal sama sekali.', 'setuju', '2019-09-25 15:14:34'),
(2, 2, 'mudharobah', 4000000, 45, 'PINJAMAN MUDHARABAH : Mudharobah adalah akad kerjasama usaha antara pemilik dana sebagai pihak yang menyediakan modal dengan pihak pengelola modal (koperasi), untuk diusahakan dengan bagi hasil (nisbah) sesuai dengan kesepakatan dimuka dari kedua belah pihak. Dalam hal ini Koperasi akan memberikan 100% permodalan kepada pengusaha yang telah memiliki tenaga kerja dan keterampilan tetapi belum memiliki modal sama sekali.', 'tunggu', '2019-10-01 04:41:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simkopsis_saldo`
--

CREATE TABLE `simkopsis_saldo` (
  `saldo_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `simpanan_jenis` enum('amanah','kurban','pendidikan','umroh','idul_fitri','wadiah') NOT NULL,
  `saldo_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simkopsis_saldo`
--

INSERT INTO `simkopsis_saldo` (`saldo_id`, `anggota_id`, `simpanan_jenis`, `saldo_total`) VALUES
(6, 2, 'amanah', 70000),
(7, 3, 'amanah', 100000),
(8, 2, 'kurban', 100000),
(9, 3, 'umroh', 1500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `simkopsis_simpanan`
--

CREATE TABLE `simkopsis_simpanan` (
  `simpanan_id` int(11) NOT NULL,
  `simpanan_anggota_id` int(11) NOT NULL,
  `simpanan_jenis` enum('amanah','kurban','pendidikan','umroh','idul_fitri','wadiah') NOT NULL,
  `simpanan_total` double NOT NULL,
  `simpanan_keterangan` text NOT NULL,
  `simpanan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simkopsis_simpanan`
--

INSERT INTO `simkopsis_simpanan` (`simpanan_id`, `simpanan_anggota_id`, `simpanan_jenis`, `simpanan_total`, `simpanan_keterangan`, `simpanan_date_created`) VALUES
(11, 2, 'amanah', 100000, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2019-10-01 02:22:16'),
(12, 2, 'amanah', 20000, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2019-10-01 02:23:37'),
(13, 3, 'amanah', 50000, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2019-10-01 02:24:05'),
(14, 3, 'amanah', 50000, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2019-10-01 02:24:19'),
(16, 2, 'kurban', 50000, 'SIMPANAN AQIQAH/QURBAN : Adalah simpanan yang dipersiapkan untuk membantu pembelian hewan kurban pada saat hari raya Idul Adha atau pembelian hewan untuk Aqiqoh. Simpanan dapat diambil 1 bulan sebelum hari raya Idul Adha atau untuk keperluan Aqiqoh simpanan dapat diambil sesuai keinginan. Setoran awal minimal Rp 100.000 selanjutnya minimal Rp 50.000.', '2019-10-01 02:26:57'),
(17, 2, 'kurban', 50000, 'SIMPANAN AQIQAH/QURBAN : Adalah simpanan yang dipersiapkan untuk membantu pembelian hewan kurban pada saat hari raya Idul Adha atau pembelian hewan untuk Aqiqoh. Simpanan dapat diambil 1 bulan sebelum hari raya Idul Adha atau untuk keperluan Aqiqoh simpanan dapat diambil sesuai keinginan. Setoran awal minimal Rp 100.000 selanjutnya minimal Rp 50.000.', '2019-10-01 02:27:25'),
(18, 3, 'umroh', 1000000, 'SIMPANAN UMRAH : Adalah jenis produk simpanan yang disediakan untuk persiapan melakukan ibadah umroh atau haji sebagai tambahan uang saku atau pelunasan pembayaran ongkos umroh atau haji. Waktu pengambilan simpanan dapat dilakukan 1 bulan sebelum keberangkatan. Setoran awal minimal sebesar Rp 500.000.', '2019-10-01 02:30:57'),
(19, 3, 'umroh', 500000, 'SIMPANAN UMRAH : Adalah jenis produk simpanan yang disediakan untuk persiapan melakukan ibadah umroh atau haji sebagai tambahan uang saku atau pelunasan pembayaran ongkos umroh atau haji. Waktu pengambilan simpanan dapat dilakukan 1 bulan sebelum keberangkatan. Setoran awal minimal sebesar Rp 500.000.', '2019-10-01 02:31:24'),
(20, 2, 'amanah', 20000, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2019-10-01 03:47:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `simkopsis_anggota`
--
ALTER TABLE `simkopsis_anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indeks untuk tabel `simkopsis_angsuran`
--
ALTER TABLE `simkopsis_angsuran`
  ADD PRIMARY KEY (`angsuran_id`);

--
-- Indeks untuk tabel `simkopsis_penarikan`
--
ALTER TABLE `simkopsis_penarikan`
  ADD PRIMARY KEY (`penarikan_id`);

--
-- Indeks untuk tabel `simkopsis_pengguna`
--
ALTER TABLE `simkopsis_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `simkopsis_pinjaman`
--
ALTER TABLE `simkopsis_pinjaman`
  ADD PRIMARY KEY (`pinjaman_id`);

--
-- Indeks untuk tabel `simkopsis_saldo`
--
ALTER TABLE `simkopsis_saldo`
  ADD PRIMARY KEY (`saldo_id`);

--
-- Indeks untuk tabel `simkopsis_simpanan`
--
ALTER TABLE `simkopsis_simpanan`
  ADD PRIMARY KEY (`simpanan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `simkopsis_anggota`
--
ALTER TABLE `simkopsis_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `simkopsis_angsuran`
--
ALTER TABLE `simkopsis_angsuran`
  MODIFY `angsuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `simkopsis_penarikan`
--
ALTER TABLE `simkopsis_penarikan`
  MODIFY `penarikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `simkopsis_pengguna`
--
ALTER TABLE `simkopsis_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `simkopsis_pinjaman`
--
ALTER TABLE `simkopsis_pinjaman`
  MODIFY `pinjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `simkopsis_saldo`
--
ALTER TABLE `simkopsis_saldo`
  MODIFY `saldo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `simkopsis_simpanan`
--
ALTER TABLE `simkopsis_simpanan`
  MODIFY `simpanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
