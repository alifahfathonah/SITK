-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2018 pada 04.06
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `nm_admin`, `email`, `password`) VALUES
(1, 'admin', 'Zacky Burhani Hotib', 'zackyburhani99@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

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
  `no_telp_ibu` varchar(15) DEFAULT NULL,
  `id_daftar` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calon_siswa`
--

INSERT INTO `calon_siswa` (`id_calon_siswa`, `nm_lengkap`, `nm_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `anak_ke`, `jml_saudara`, `status_kandung`, `warga_negara`, `agama`, `nm_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `agama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `alamat_ayah`, `kantor_ayah`, `no_telp_ayah`, `nm_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `agama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_ibu`, `kantor_ibu`, `no_telp_ibu`, `id_daftar`) VALUES
('CLS0000001', 'Zacky Burhani Hotib', 'zacky', 'Laki-Laki', 'Jakarta', '2013-09-13', 'Jl. Pondok Kacang Timur Rt 03 Rw 03 No. 1', '083891778014', 2, 2, 'Kandung', 'Indonesia', 'Islam', 'Abdul Hotib', 'Jakarta', '1965-09-09', 'Islam', 'MA', 'Karyawan', '> 3.000.000 - 5.000.000', 'Jl. Pondok Kacang Timur Rt 03 Rw 03 No. 1', 'Graha Raya No. 1', '081310877944', 'Fatmawati', 'Jakarta', '1965-08-09', 'Islam', 'MA', 'Ibu Rumah Tangga', '> 2.000.000 - 3.000.000', 'Jl. Pondok Kacang Timur Rt 03 Rw 03 No. 1', '', '081580348532', 'PTR0000001'),
('CLS0000002', 'Fachri Maulana Khotibs', 'ai', 'Laki-Laki', 'Jakarta', '2013-08-09', 'Jl. Pondok Kacang Timur Rt 03 Rw 03 No. 1', '081782773781', 1, 2, 'Kandung', 'Indonesia', 'Islam', 'Abdul Hotib', 'Jakarta', '1965-09-09', 'Islam', 'MA', 'Karyawan', '> 3.000.000 - 5.000.000', 'Jl. Pondok Kacang Timur Rt 03 Rw 03 No. 1', 'graha kiwi', '081310877944', 'Fatmawati', 'Jakarta', '1965-09-07', 'Islam', 'MA', 'Ibu Rumah Tangga', '1.000.000 - 2.000.000', 'Jl. Pondok Kacang Timur Rt 03 Rw 03 No. 1', '', '08147288371', 'PTR0000002'),
('CLS0000003', 'Sasa Nabila', 'kubil', 'Perempuan', 'Jakarta', '2013-07-05', 'KH. Dewantara Ciputat', '083891778014', 2, 3, 'Kandung', 'Indonesia', 'Islam', 'Amin', 'Jakarta', '1978-08-07', 'Islam', 'SMA', 'Karyawan', '> 5.000.000', 'KH. Dewantara Ciputat', 'Ciputat', '081310877944', 'Bumil', 'Jakarta', '1988-08-09', 'Islam', 'SMA', 'Wiraswasta', '> 3.000.000 - 5.000.000', 'KH. Dewantara Ciputat', 'Bintaro Sektor 3A', '081580348532', 'PTR0000003'),
('CLS0000004', 'Tiara Rizkia Harda', 'Ara', 'Perempuan', 'Jakarta', '2014-09-08', 'Peninggilan', '083891778014', 1, 3, 'Kandung', 'Indonesia', 'Islam', 'Rahadian', 'Jakarta', '1978-08-07', 'Islam', 'S1', 'PNS', '> 5.000.000', 'Peninggilan', 'Bintaro', '', 'Siti Badriah', 'Bengkulu', '1991-09-08', 'Islam', 'SMA', 'Swasta', '> 3.000.000 - 5.000.000', 'Peninggilan', 'Ciputat', '081580348532', 'PTR0000004'),
('CLS0000005', 'Novia Indriani', 'Mpi', 'Perempuan', 'Jakarta', '2014-08-07', 'Komplek Setia Negara', '083891778014', 2, 2, 'Kandung', 'Indonesia', 'Islam', 'Budiman', 'Jakarta', '1975-08-07', 'Islam', 'S1', 'PNS', '> 5.000.000', 'Komplek Setia Negara', 'Jakarta Timur', '083918228123', 'Muharamil', 'Jakarta', '1977-08-07', 'Islam', 'S1', 'PNS', '> 3.000.000 - 5.000.000', 'Komplek Setia Negara', 'Pondok Laka', '087392883813', 'PTR0000005'),
('CLS0000006', 'Muhammad Faiz Alviansyah', 'Faiz', 'Laki-Laki', 'Jakarta', '2014-08-07', 'Kuningan', '0839182813', 1, 3, 'Kandung', 'Indonesia', 'Islam', 'Parman', 'Kuningan', '1963-08-08', 'Islam', 'S1', 'Karyawan', '> 3.000.000 - 5.000.000', 'Kuningan', 'Jakarta Pusat', '081310877944', 'Fatimah', 'Kuningan', '1965-08-07', 'Islam', 'S2', 'Wiraswasta', '> 3.000.000 - 5.000.000', 'Kuningan', 'Pondok Kopi', '081580348532', 'PTR0000006'),
('CLS0000007', 'Muhammad Rinaldy', 'Mbew', 'Laki-Laki', 'Jakarta', '2015-08-09', 'Palmerah', '083718273812', 1, 2, 'Kandung', 'Indonesia', 'Islam', 'Sutarjo', 'Yogyakarta', '1961-08-07', 'Islam', 'SMA', 'PNS', '> 3.000.000 - 5.000.000', 'Palmerah', 'Palmerah', '081310877944', 'Ningsih', 'Bengkulu', '1964-07-07', 'Islam', 'SMA', 'Ibu Rumah Tangga', '', 'Palmerah', '', '081580348532', 'PTR0000007'),
('CLS0000008', 'Muhammad Zein Hanafi', 'Zen', 'Laki-Laki', 'Karawang', '2015-07-08', 'Pondok Kopi', '083891778014', 2, 2, 'Kandung', 'Indonesia', 'Islam', 'Ahmad', 'Karawang', '1960-07-08', 'Islam', 'S1', 'PNS', '> 5.000.000', 'Pondok Kopi', 'pondok laka', '081310877944', 'Badriah', 'Bandung', '1978-07-06', 'Islam', 'SMA', 'Ibu Rumah Tangga', '> 3.000.000 - 5.000.000', 'Pondok Kopi', '', '081580348532', 'PTR0000008'),
('CLS0000009', 'Andy Chahyono', 'Ndy', 'Laki-Laki', 'Tangerang', '2015-08-09', 'Taman Asri', '083891778014', 1, 3, 'Kandung', 'Indonesia', 'Islam', 'Basuki', 'Wonogiri', '1988-07-08', 'Islam', 'S1', 'Karyawan', '> 3.000.000 - 5.000.000', 'Taman Asri', 'Taman Asri', '081310877944', '', 'Jakarta', '1990-08-07', 'Islam', 'SMA', 'Ibu Rumah Tangga', '> 2.000.000 - 3.000.000', 'Taman Asri', '', '081580348532', 'PTR0000009');

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
('BYR0000001', 'JNS01', '2018-11-25', 1000000),
('BYR0000002', 'JNS01', '2018-11-25', 1000000),
('BYR0000003', 'JNS01', '2018-11-25', 1000000),
('BYR0000004', 'JNS01', '2018-11-25', 1000000),
('BYR0000005', 'JNS02', '2018-11-25', 2100000),
('BYR0000006', 'JNS02', '2018-11-25', 2100000),
('BYR0000007', 'JNS02', '2018-11-25', 2100000),
('BYR0000008', 'JNS02', '2018-11-25', 2100000),
('BYR0000009', 'JNS02', '2018-11-25', 2100000),
('BYR0000004', 'JNS02', '2018-11-25', 1100000),
('BYR0000003', 'JNS02', '2018-11-25', 1100000),
('BYR0000002', 'JNS02', '2018-11-25', 1100000),
('BYR0000001', 'JNS02', '2018-11-25', 1100000);

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
(157, 'ASDASDA', 250000, '2018-12-04'),
(158, 'ASDASDA', 250000, '2018-12-04'),
(159, 'halo', 250000, '2018-12-04'),
(160, 'halo', 250000, '2018-12-04'),
(161, 'sasa nabila', 250000, '2018-12-04'),
(162, 'zacky', 250000, '2018-12-04'),
(163, 'zacky', 250000, '2018-12-04');

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
  `status_guru` enum('0','1') DEFAULT NULL COMMENT '0 = tidak mengajar, 1 = mengajar',
  `id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nm_guru`, `tgl_lahir`, `jenis_kelamin`, `no_telp`, `alamat`, `status_guru`, `id`) VALUES
('GRU0000001', 'Ita Novita, S.Kom, M.T.I', '1988-08-07', 'Perempuan', '083891778014', 'Ciledug', '1', 1),
('GRU0000002', 'Hendri Irawan, S.Kom, M.T.I', '1976-06-07', 'Laki-Laki', '08389177823', 'Ciputat', '1', 1),
('GRU0000003', 'Dr. Wendi Usino Soelaiman, M.Sc', '1960-07-08', 'Laki-Laki', '081562553512', 'Belinyu', '0', 1);

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
('KLS003', 'Kelas C', '0');

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
('BYR0000003', 'Lunas', 2100000, 'PTR0000004'),
('BYR0000004', 'Lunas', 2100000, 'PTR0000003'),
('BYR0000005', 'Lunas', 2100000, 'PTR0000005'),
('BYR0000006', 'Lunas', 2100000, 'PTR0000006'),
('BYR0000007', 'Lunas', 2100000, 'PTR0000007'),
('BYR0000008', 'Lunas', 2100000, 'PTR0000008'),
('BYR0000009', 'Lunas', 2100000, 'PTR0000009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` char(10) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `thn_ajar` varchar(9) DEFAULT NULL,
  `id_formulir` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_daftar`, `tgl_daftar`, `thn_ajar`, `id_formulir`) VALUES
('PTR0000001', '2018-11-25', '2018/2019', NULL),
('PTR0000002', '2018-11-25', '2018/2019', NULL),
('PTR0000003', '2018-11-25', '2018/2019', NULL),
('PTR0000004', '2018-11-25', '2018/2019', NULL),
('PTR0000005', '2018-11-25', '2018/2019', NULL),
('PTR0000006', '2018-11-25', '2018/2019', NULL),
('PTR0000007', '2018-11-25', '2018/2019', NULL),
('PTR0000008', '2018-11-25', '2018/2019', NULL),
('PTR0000009', '2018-11-25', '2018/2019', NULL);

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
('180001', 'Zacky Burhani Hotib', '1', 'GRU0000001', 'KLS001', 'PTR0000001'),
('180002', 'Fachri Maulana Khotibs', '1', 'GRU0000001', 'KLS001', 'PTR0000002'),
('180003', 'Sasa Nabila', '1', 'GRU0000001', 'KLS001', 'PTR0000003'),
('180004', 'Tiara Rizkia Harda', '1', 'GRU0000002', 'KLS002', 'PTR0000004'),
('180005', 'Novia Indriani', '1', 'GRU0000002', 'KLS002', 'PTR0000005'),
('180006', 'Muhammad Faiz Alviansyah', '1', 'GRU0000002', 'KLS002', 'PTR0000006');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id_calon_siswa`),
  ADD KEY `id_daftar` (`id_daftar`);

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
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id` (`id`);

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
  ADD PRIMARY KEY (`id_daftar`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_formulir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD CONSTRAINT `calon_siswa_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `pendaftaran` (`id_daftar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_bayar`
--
ALTER TABLE `detail_bayar`
  ADD CONSTRAINT `detail_bayar_ibfk_1` FOREIGN KEY (`id_bayar`) REFERENCES `pembayaran` (`id_bayar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_bayar_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pembayaran` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `pendaftaran` (`id_daftar`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
