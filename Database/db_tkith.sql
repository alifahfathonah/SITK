-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2018 pada 16.02
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
-- Database: `db_tkith`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id_calon_siswa` char(10) NOT NULL,
  `nm_lengkap` varchar(50) DEFAULT NULL,
  `nm_panggilan` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(15) DEFAULT NULL,
  `anak_ke` int(5) DEFAULT NULL,
  `jml_saudara` int(5) DEFAULT NULL,
  `status_kandung` varchar(15) DEFAULT NULL,
  `warga_negara` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `nm_ayah` varchar(50) DEFAULT NULL,
  `tempat_lahir_ayah` text,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `agama_ayah` varchar(20) DEFAULT NULL,
  `pendidikan_ayah` varchar(10) DEFAULT NULL,
  `pekerjaan_ayah` varchar(20) DEFAULT NULL,
  `penghasilan_ayah` varchar(25) DEFAULT NULL,
  `alamat_ayah` text,
  `kantor_ayah` text,
  `no_telp_ayah` varchar(15) DEFAULT NULL,
  `nm_ibu` varchar(50) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(50) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `agama_ibu` varchar(20) DEFAULT NULL,
  `pendidikan_ibu` varchar(10) DEFAULT NULL,
  `pekerjaan_ibu` varchar(20) DEFAULT NULL,
  `penghasilan_ibu` varchar(25) DEFAULT NULL,
  `alamat_ibu` text,
  `kantor_ibu` text,
  `no_telp_ibu` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calon_siswa`
--

INSERT INTO `calon_siswa` (`id_calon_siswa`, `nm_lengkap`, `nm_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `anak_ke`, `jml_saudara`, `status_kandung`, `warga_negara`, `agama`, `nm_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `agama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `alamat_ayah`, `kantor_ayah`, `no_telp_ayah`, `nm_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `agama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_ibu`, `kantor_ibu`, `no_telp_ibu`) VALUES
('CLS0000001', 'Ivan Fadhilah', 'Ipan', 'Laki-Laki', 'Jakarta', '2015-12-25', 'jalan petukangan raya no. 1', '083891778999', 1, 1, 'Kandung', 'Indonesia', 'Islam', 'Djaetun katanya', 'Jakartat', '1977-07-07', 'Islam', 'MTS', 'PNS', '> 5.000.000', 'jalan pondok laka', 'pondok kiwis', '08389177999', 'Fatmawati', 'Jakarta', '1980-08-08', 'Islam', ' MTS', 'Ibu Rumah Tangga', '1.000.000 - 2.000.000', '', '', '08378188322'),
('CLS0000002', 'Zacky Burhani Hotib', 'Zacky', 'Laki-Laki', 'Jakarta', '2015-12-09', 'Cilangka', '083891778014', 2, 2, 'Kandung', 'Indonesia', 'Islam', 'Jaka', 'Jakarta', '1965-08-08', 'Islam', 'SMA', 'Wiraswasta', '> 3.000.000 - 5.000.000', 'Cilangka', 'Pondok Kacang', '083891778014', 'Fatmawati', 'Jakarta', '1997-08-08', 'Islam', 'SMA', 'Swasta', '> 2.000.000 - 3.000.000', 'Islam', '', '083891778014'),
('CLS0000003', 'Muhammad Zein Hanafi', 'Jen', '', 'Karawang', '2015-08-08', 'Karawang', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('CLS0000004', 'Muhammad Faiz Alviansyah', 'Pais', '', 'Kuningan', '2014-08-08', 'Bintaro', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('CLS0000005', 'Andy Chahyono', 'Ndy', '', 'Jakarta', '2014-08-08', 'Ciledug', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('CLS0000006', 'Novia Indriani', 'mpi', '', 'Jakarta', '2014-08-08', 'Jakarta', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('CLS0000007', 'Sasa Nabila', 'Kubil', '', 'Jakarta', '2013-07-07', 'Ciputata', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('CLS0000008', 'Rifki Maulana', 'kiki', '', 'Jakarta', '2013-08-08', 'Cilangka', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('CLS0000009', 'Abdul Fariz', 'Fariz', '', 'Jakarta', '2013-08-08', 'Jakarta', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('CLS0000010', 'tes123123', 'tes123123', '', '', '2015-12-13', '', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bayar`
--

CREATE TABLE `detail_bayar` (
  `id_bayar` char(10) DEFAULT NULL,
  `id_jenis` char(5) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jml_bayar` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_bayar`
--

INSERT INTO `detail_bayar` (`id_bayar`, `id_jenis`, `tgl_bayar`, `jml_bayar`) VALUES
('BYR0000001', 'JNS01', '2018-12-25', 1000000),
('BYR0000002', 'JNS01', '2018-12-25', 1000000),
('BYR0000003', 'JNS02', '2018-12-25', 2100000),
('BYR0000004', 'JNS01', '2018-12-25', 1000000),
('BYR0000006', 'JNS02', '2018-12-25', 2100000),
('BYR0000007', 'JNS02', '2018-12-25', 2100000),
('BYR0000008', 'JNS01', '2018-12-25', 1000000),
('BYR0000008', 'JNS02', '2018-12-25', 1100000),
('BYR0000009', 'JNS01', '2018-12-25', 1000000),
('BYR0000004', 'JNS02', '2018-12-25', 1100000),
('BYR0000002', 'JNS02', '2018-12-25', 1100000),
('BYR0000001', 'JNS02', '2018-12-25', 1100000),
('BYR0000009', 'JNS02', '2018-12-25', 1100000),
('BYR0000010', 'JNS02', '2018-12-25', 2100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulir`
--

CREATE TABLE `formulir` (
  `id_formulir` int(10) NOT NULL,
  `nm_penerima` varchar(50) DEFAULT NULL,
  `biaya` int(10) DEFAULT NULL,
  `tgl_cetak` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `formulir`
--

INSERT INTO `formulir` (`id_formulir`, `nm_penerima`, `biaya`, `tgl_cetak`) VALUES
(174, 'ivan fadhilah', 250000, '2018-12-25'),
(175, 'zacky', 250000, '2018-12-25'),
(176, 'basuki', 250000, '2018-12-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` char(10) NOT NULL,
  `nm_guru` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `status_guru` enum('0','1') DEFAULT NULL COMMENT '0 = tidak mengajar, 1 = mengajar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nm_guru`, `tgl_lahir`, `jenis_kelamin`, `no_telp`, `alamat`, `status_guru`) VALUES
('GRU0000001', 'Ita Novita S.Kom, M.T.I', '1978-08-08', 'Perempuan', '083891778014', 'Ciledug', '1'),
('GRU0000002', 'Dr. Wendy Usino Sulaiman, M.Sc', '1980-07-07', 'Laki-Laki', '083891778999', 'Belinyu', '1'),
('GRU0000003', 'Hendri Irawan, S.Kom, M.T.I', '1970-07-06', 'Laki-Laki', '083891778014', 'Jakarta', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis` char(5) NOT NULL,
  `nm_jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis`, `nm_jenis`) VALUES
('JNS01', 'Cicilan'),
('JNS02', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` char(6) NOT NULL,
  `nm_kelas` varchar(50) DEFAULT NULL,
  `status_kelas` enum('0','1') DEFAULT NULL COMMENT '0 = kosong, 1 = terisi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nm_kelas`, `status_kelas`) VALUES
('KLS001', 'Kelas A', '1'),
('KLS002', 'Kelas B', '1'),
('KLS003', 'Kelas C', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` char(10) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `nominal_bayar` int(10) DEFAULT NULL,
  `id_daftar` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `status`, `nominal_bayar`, `id_daftar`) VALUES
('BYR0000001', 'Lunas', 2100000, 'PTR0000001'),
('BYR0000002', 'Lunas', 2100000, 'PTR0000002'),
('BYR0000003', 'Lunas', 2100000, 'PTR0000003'),
('BYR0000004', 'Lunas', 2100000, 'PTR0000004'),
('BYR0000006', 'Lunas', 2100000, 'PTR0000006'),
('BYR0000007', 'Lunas', 2100000, 'PTR0000008'),
('BYR0000008', 'Lunas', 2100000, 'PTR0000009'),
('BYR0000009', 'Lunas', 2100000, 'PTR0000005'),
('BYR0000010', 'Lunas', 2100000, 'PTR0000007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` char(10) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `thn_ajar` varchar(9) DEFAULT NULL,
  `id_calon_siswa` char(10) DEFAULT NULL,
  `id_formulir` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_daftar`, `tgl_daftar`, `thn_ajar`, `id_calon_siswa`, `id_formulir`) VALUES
('PTR0000001', '2018-12-25', '2018/2019', 'CLS0000001', 174),
('PTR0000002', '2018-12-25', '2018/2019', 'CLS0000002', NULL),
('PTR0000003', '2018-12-25', '2018/2019', 'CLS0000003', 176),
('PTR0000004', '2018-12-25', '2018/2019', 'CLS0000004', NULL),
('PTR0000005', '2018-12-25', '2018/2019', 'CLS0000005', NULL),
('PTR0000006', '2018-12-25', '2018/2019', 'CLS0000006', NULL),
('PTR0000007', '2018-12-25', '2018/2019', 'CLS0000007', NULL),
('PTR0000008', '2018-12-25', '2018/2019', 'CLS0000008', NULL),
('PTR0000009', '2018-12-25', '2018/2019', 'CLS0000009', NULL),
('PTR0000010', '2018-12-25', '2018/2019', 'CLS0000010', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunduran_diri`
--

CREATE TABLE `pengunduran_diri` (
  `id_undur_diri` char(6) NOT NULL,
  `tgl_undur_diri` date DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `no_induk` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunduran_diri`
--

INSERT INTO `pengunduran_diri` (`id_undur_diri`, `tgl_undur_diri`, `alasan`, `no_induk`) VALUES
('UD0001', '2018-12-25', 'Males', '180003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `no_induk` char(6) NOT NULL,
  `nm_siswa` varchar(50) DEFAULT NULL,
  `status_siswa` enum('0','1') DEFAULT NULL COMMENT '0 = tidak aktif, 1 = aktif',
  `id_guru` char(10) DEFAULT NULL,
  `id_kelas` char(10) DEFAULT NULL,
  `id_daftar` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`no_induk`, `nm_siswa`, `status_siswa`, `id_guru`, `id_kelas`, `id_daftar`) VALUES
('180001', 'Sasa Nabila', '1', 'GRU0000001', 'KLS001', 'PTR0000007'),
('180002', 'Rifki Maulana', '1', 'GRU0000001', 'KLS001', 'PTR0000008'),
('180003', 'Abdul Fariz', '0', 'GRU0000001', 'KLS001', 'PTR0000009'),
('180004', 'Muhammad Faiz Alviansyah', '1', 'GRU0000002', 'KLS002', 'PTR0000004'),
('180005', 'Andy Chahyono', '1', 'GRU0000002', 'KLS002', 'PTR0000005'),
('180006', 'Novia Indriani', '1', 'GRU0000002', 'KLS002', 'PTR0000006'),
('180007', 'Ivan Fadhilah', '1', 'GRU0000003', 'KLS003', 'PTR0000001'),
('180008', 'Zacky Burhani Hotib', '1', 'GRU0000003', 'KLS003', 'PTR0000002'),
('180009', 'Muhammad Zein Hanafi', '1', 'GRU0000003', 'KLS003', 'PTR0000003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_guru` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nm_user`, `email`, `password`, `id_guru`) VALUES
(6, 'kompor', 'kompor gas ', 'kompor@gmail.com', '4297f44b13955235245b2497399d7a93', NULL),
(7, 'admincolo', 'admin', 'kopitiam@gmail.coms', '4297f44b13955235245b2497399d7a93', NULL),
(8, 'admin', 'Zacky Burhani Hotib', 'zackyburhani99@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id_calon_siswa`);

--
-- Indeks untuk tabel `detail_bayar`
--
ALTER TABLE `detail_bayar`
  ADD KEY `id_bayar` (`id_bayar`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id_formulir`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_formulir` (`id_formulir`),
  ADD KEY `id_calon_siswa` (`id_calon_siswa`);

--
-- Indeks untuk tabel `pengunduran_diri`
--
ALTER TABLE `pengunduran_diri`
  ADD PRIMARY KEY (`id_undur_diri`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`no_induk`),
  ADD KEY `id_daftar` (`id_daftar`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_formulir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_bayar`
--
ALTER TABLE `detail_bayar`
  ADD CONSTRAINT `detail_bayar_ibfk_1` FOREIGN KEY (`id_bayar`) REFERENCES `pembayaran` (`id_bayar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_bayar_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pembayaran` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `pendaftaran` (`id_daftar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_formulir`) REFERENCES `formulir` (`id_formulir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_calon_siswa`) REFERENCES `calon_siswa` (`id_calon_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengunduran_diri`
--
ALTER TABLE `pengunduran_diri`
  ADD CONSTRAINT `pengunduran_diri_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `pendaftaran` (`id_daftar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
