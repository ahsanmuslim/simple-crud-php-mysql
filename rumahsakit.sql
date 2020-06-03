-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2020 pada 07.40
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_obat`
--

CREATE TABLE `detail_obat` (
  `id_rm_obat` int(8) NOT NULL,
  `id_medis` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_obat`
--

INSERT INTO `detail_obat` (`id_rm_obat`, `id_medis`, `id_obat`) VALUES
(32, 'a3130804-8459-11ea-adbf-0216eb48238a', '859033b4-845a-11ea-a3d6-0216eb48238a'),
(33, '4b3e4e3e-845b-11ea-995d-0216eb48238a', '9b2fef00-843e-11ea-9cc3-0216eb48238a'),
(34, '647bc5c0-845b-11ea-b2c4-0216eb48238a', 'a75e3ba8-3fef-11ea-89a2-ccb0da7ace87'),
(35, '647bc5c0-845b-11ea-b2c4-0216eb48238a', '9b2fef00-843e-11ea-9cc3-0216eb48238a'),
(36, '647bc5c0-845b-11ea-b2c4-0216eb48238a', '859033b4-845a-11ea-a3d6-0216eb48238a'),
(40, '9ed84d4c-845b-11ea-b213-0216eb48238a', '3b984058-408f-11ea-9b8e-98e7f48a9bd0'),
(41, '9ed84d4c-845b-11ea-b213-0216eb48238a', '859033b4-845a-11ea-a3d6-0216eb48238a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `spesialis` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('0cc3b66a-4376-11ea-93f5-ccb0da7ace87', 'Bagas Katon', 'Urologi', 'Curug', '085717396839'),
('c86b0392-4375-11ea-a35b-ccb0da7ace87', 'Amira', 'Anak', 'Curug e', '0857173975412'),
('e08e44b6-4375-11ea-b3c5-ccb0da7ace87', 'Ahsan Mustaqim', 'Urologi', 'Tigaraksa', '085717396839'),
('ed4abf36-4375-11ea-ac5c-ccb0da7ace87', 'Ali Mustofa', 'Kulit', 'Curug', '02145893'),
('fdd59182-4375-11ea-b32b-ccb0da7ace87', 'Adnan', 'Umum', 'Kadu', '05846975');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medis`
--

CREATE TABLE `medis` (
  `id_medis` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `id_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `medis`
--

INSERT INTO `medis` (`id_medis`, `id_pasien`, `id_dokter`, `id_poli`, `tgl_periksa`, `keluhan`, `diagnosa`, `id_user`) VALUES
('4b3e4e3e-845b-11ea-995d-0216eb48238a', '2360ef84-437e-11ea-ba57-ccb0da7ace87', 'ed4abf36-4375-11ea-ac5c-ccb0da7ace87', 'e21cf854-41db-11ea-adda-98e7f48a9bd0', '2020-04-22', '<p>Sering keringetan</p>\r\n\r\n<p>Jantung berdebar</p>\r\n', 'Lemah jantung', NULL),
('647bc5c0-845b-11ea-b2c4-0216eb48238a', 'bd68e592-468e-11ea-b813-ccb0da7ace87', 'e08e44b6-4375-11ea-b3c5-ccb0da7ace87', 'e2107d68-41db-11ea-b20e-98e7f48a9bd0', '2020-04-22', '<p>Tenggorokan gatal</p>\r\n', 'Radang tenggorokan', NULL),
('9ed84d4c-845b-11ea-b213-0216eb48238a', 'bd68e358-468e-11ea-a683-ccb0da7ace87', '0cc3b66a-4376-11ea-93f5-ccb0da7ace87', 'c27bf612-41db-11ea-b361-98e7f48a9bd0', '2020-04-22', '<p>Pusing</p>\r\n\r\n<p>Demam</p>\r\n\r\n<p>Batuk</p>\r\n', 'Suspect corona', NULL),
('a3130804-8459-11ea-adbf-0216eb48238a', 'bd68e7ae-468e-11ea-8eff-ccb0da7ace87', 'fdd59182-4375-11ea-b32b-ccb0da7ace87', 'c27bf612-41db-11ea-b361-98e7f48a9bd0', '2020-04-22', '<p>Pusing</p>\r\n\r\n<p>Mual&nbsp;</p>\r\n\r\n<p>Cepat lelah</p>\r\n', 'Hamil', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('3b984058-408f-11ea-9b8e-98e7f48a9bd0', 'Paramex', 'Obat puyeng'),
('859033b4-845a-11ea-a3d6-0216eb48238a', 'Vit C', 'Vitamin'),
('925bbd64-843e-11ea-8701-0216eb48238a', 'Diapet', 'Obat Sakit Perut'),
('9b2fef00-843e-11ea-9cc3-0216eb48238a', 'Sangobion', 'Obat tambah darah'),
('a6ff68ce-843e-11ea-ab7f-0216eb48238a', 'Ambeven', 'Obat Ambien'),
('a75e3ba8-3fef-11ea-89a2-ccb0da7ace87', 'Bodrex plus', 'Obat sakit kepala'),
('b2287b16-3fef-11ea-aed0-ccb0da7ace87', 'Oralit plus', 'Obat mual & muntah'),
('b8ccfe7e-3fef-11ea-86ca-ccb0da7ace87', 'Betadine plus', 'Obat luka luar'),
('bea4c8d6-3fef-11ea-a7cd-ccb0da7ace87', 'Promage plus', 'Obat maag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `nomor_identitas` varchar(20) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `nomor_identitas`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('109d864e-4457-11ea-8a86-98e7f48a9bd0', 'Intan', '854785', 'P', 'Cepu', '08574136987'),
('133f6d62-4453-11ea-ad7a-98e7f48a9bd0', 'Suci Setiabudi', '568934', 'P', 'Puri', '085717963'),
('1abf7f5e-4580-11ea-ac52-ccb0da7ace87', 'Sigit Santosa', '963254', 'L', 'Ciledug', '085714253698'),
('2360ef84-437e-11ea-ba57-ccb0da7ace87', 'Amir', '23232323', 'L', 'Curug', '085717396839'),
('25371498-4453-11ea-85ce-98e7f48a9bd0', 'Desi', '9632541', 'P', 'Panongan', '021589314'),
('2fd83750-4580-11ea-b811-ccb0da7ace87', 'Syaiful Amri', '654123', 'L', 'Jatiuwung', '0859632145'),
('4cdac35a-4453-11ea-aac8-98e7f48a9bd0', 'Wulan', '321456', 'P', 'Kadu', '08571746398'),
('579ccd2e-4453-11ea-b6c1-98e7f48a9bd0', 'Dinda', '9654789', 'P', 'Curug', '085717396839'),
('6b1783da-4453-11ea-b21c-98e7f48a9bd0', 'Maria', '1234567', 'P', 'Bitung', '085717369'),
('bb00efb2-4453-11ea-b763-98e7f48a9bd0', 'Rahma', '5689', 'P', 'Klaten', '0857179325'),
('bd68deee-468e-11ea-aa9d-ccb0da7ace87', 'Nadia', '987634', 'L', 'Curug Kulon', '05781452369'),
('bd68e13c-468e-11ea-bf82-ccb0da7ace87', 'Karin', '987635', 'P', 'Bitung', '085717369'),
('bd68e25e-468e-11ea-9bf3-ccb0da7ace87', 'Kanan', '987636', 'L', 'Curug', '085717396839'),
('bd68e358-468e-11ea-a683-ccb0da7ace87', 'Ikhwan', '987637', 'L', 'Bojong Koneng', '08571423698'),
('bd68e470-468e-11ea-8baf-ccb0da7ace87', 'Sari', '987638', 'P', 'Kadu', '08571746398'),
('bd68e592-468e-11ea-b813-ccb0da7ace87', 'Jatmiko', '987639', 'L', 'Bonang', '085714963214'),
('bd68e696-468e-11ea-a132-ccb0da7ace87', 'Sesil', '987640', 'P', 'Klaten', '0857179325'),
('bd68e7ae-468e-11ea-8eff-ccb0da7ace87', 'Agata', '987641', 'P', 'Puri', '085717963'),
('bd68e8a8-468e-11ea-9966-ccb0da7ace87', 'Syarif', '987642', 'L', 'Cikoneng', '02165896'),
('bd68e998-468e-11ea-b00f-ccb0da7ace87', 'Randy', '987643', 'L', 'Jatiuwung', '0859632145'),
('f512bd70-457f-11ea-ac8f-ccb0da7ace87', 'Indra Pratama', '569874', 'L', 'Cikoneng', '02165896'),
('fae05326-4443-11ea-8cb0-98e7f48a9bd0', 'Samudin', '256387', 'L', 'Bojong Koneng', '08571423698'),
('ff409ea8-4452-11ea-a8e8-98e7f48a9bd0', 'Suratman', '456789', 'L', 'Bonang', '085714963214');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(20) NOT NULL,
  `gedung` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('95c771fa-41db-11ea-823b-98e7f48a9bd0', 'Poli gigi', 'Gedung 3 Lt. 1'),
('95d1e860-41db-11ea-9d12-98e7f48a9bd0', 'Poli anak', 'Gedung 3 Lt. 2'),
('c27bf612-41db-11ea-b361-98e7f48a9bd0', 'Poli umum', 'Gedung 2 Lt. 1'),
('e2107d68-41db-11ea-b20e-98e7f48a9bd0', 'Poli THT', 'Gedung 2 Lt. 3'),
('e21cf854-41db-11ea-adda-98e7f48a9bd0', 'Poli jantung', 'Gedung 3 Lt. 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `level`, `password`) VALUES
('0c9d6fc5-3ad8-11ea-bf25-f337376e844b', 'ahsan', 'Ahmad Susanto', 'user', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('b1404951-3ad7-11ea-bf25-f337376e844b', 'admin', 'Administrator', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`id_rm_obat`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_rm` (`id_medis`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `medis`
--
ALTER TABLE `medis`
  ADD PRIMARY KEY (`id_medis`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  MODIFY `id_rm_obat` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD CONSTRAINT `detail_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_obat_ibfk_2` FOREIGN KEY (`id_medis`) REFERENCES `medis` (`id_medis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `medis`
--
ALTER TABLE `medis`
  ADD CONSTRAINT `medis_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medis_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medis_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
