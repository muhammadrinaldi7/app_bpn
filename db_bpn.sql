-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2023 pada 17.26
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `kode_alat` varchar(10) NOT NULL,
  `nama_alat` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id_alat`, `kode_alat`, `nama_alat`, `status`) VALUES
(1, 'TOL001', 'Disto Meter', 'Ada'),
(5, 'TOL002', 'Disto Meter', 'Ada'),
(6, 'TOL003', 'GPS Geotetik', 'Dipinjam'),
(7, 'TOL004', 'Meteran Manual', 'Dipinjam'),
(8, 'TOL005', 'Meteran Manual', 'Ada'),
(9, 'TOL006', 'Total Station', 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `kode_ukur` varchar(10) NOT NULL,
  `kode_hasil` varchar(15) NOT NULL,
  `panjang` double NOT NULL,
  `lebar` double NOT NULL,
  `nama_berkas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `kode_ukur`, `kode_hasil`, `panjang`, `lebar`, `nama_berkas`) VALUES
(24, 'ATR002', 'HSL001', 400, 600, 'ada71c2b1ef6ef388ea8f871bdcd7318.jpg'),
(25, 'ATR003', 'HSL002', 300, 500, '7b77f1d9d296bfb649b5cb753da4b1c8.png'),
(28, 'ATR001', 'HSL003', 600, 800, 'f22f3a5ee7c623fb0aac8a20d48334ff.jpg'),
(29, 'ATR004', 'HSL004', 800, 500, '381057d4df216fa30acf28d0c0865fe5.jpg'),
(30, 'ATR005', 'HSL005', 1200, 800, 'c93f2e875e8b9a8288c14e8d5679394f.jpg'),
(31, 'ATR006', 'HSL006', 2000, 1500, 'bfbcd8cb97ade4b7bd293040efa5a46e.jpg'),
(32, 'ATR007', 'HSL007', 13000, 900, 'b813e1c6e20f02da18d823523074ed14.jpeg'),
(33, 'ATR008', 'HSL008', 10000, 11000, '86f4753f4282627d475e8062f56a73b1.jpg'),
(34, 'ATR009', 'HSL009', 12000, 5000, '16a9373868e0a41d6dba71fac781e644.jpg'),
(35, 'ATR010', 'HSL010', 10000, 8700, '73bbfd35efd65eff633b22f2330179a4.jpg'),
(36, 'ATR011', 'HSL011', 700, 1500, '762ef7fa180c95c980fe237e348c88a2.jpeg'),
(37, 'ATR012', 'HSL012', 9000, 10000, '98287a4b8220bd933653b559a7109bd2.jpeg'),
(38, 'ATR013', 'HSL013', 6500, 9000, '22d2ddc30973872403b17a1728fccd30.jpg'),
(39, 'ATR014', 'HSL014', 10000, 8000, '04d3ae81669b2a71f2e157246cfba84c.jpg'),
(40, 'ATR015', 'HSL015', 12000, 9000, 'bf17376f39d0461b8c7813116fc69502.jpg'),
(41, 'ATR016', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `divisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nik`, `tgl_lahir`, `alamat`, `telp`, `divisi`) VALUES
(1, 'Rinaldi', '6372040508000001', '1990-12-04', 'Jl. Kelurahan Gg. Keruing 2 Banjarmasin', '081250302237', 'Petugas Pengukuran'),
(2, 'Saufi', '6372050807054654', '1999-12-02', 'Jl. Mutiara No.11 Banjarmasin', '087554139788', 'Petugas Pengukuran'),
(6, 'Fadim Ichsani', '6303040508000008', '1998-02-25', 'Jalan Gotong Royong 1 Guntung Paikat Banjarbaru', '089634562333', 'Petugas Pengukuran'),
(7, 'Dita Purnama Sari', '6305040508000022', '1995-07-26', 'Jalan Intansari 3 Banjarbaru', '089677231221', 'Petugas Pengukuran'),
(8, 'Aditya Kurnia', '6303040508000023', '1999-01-01', 'Jalan Mentri 4 Albasiah 2 Martapura', '085365562331', 'Petugas Pengukuran'),
(9, 'Setiawan', '6303040608000012', '1980-12-16', 'Gg hidayah 2 No.15 Sekumpul', '085377542312', 'Petugas Pengukuran'),
(10, 'Shinta Ariani', '6305040608000016', '1995-02-20', 'Jln Damai No.2 RT.03 RW.04 Sungai Ulin Banjarbaru', '081266548080', 'Petugas Kantor'),
(11, 'Ahmad Fauzi', '6305051208000012', '1984-03-14', 'Jalan Sukaramai Mentri 4 Keraton Martapura', '089533469857', ''),
(12, 'Irwansyah', '6303880508000010', '1988-04-12', 'Gg Pelita RT.05 RW.02 No.20', '082388563455', 'Petugas Pengukuran'),
(13, 'Gusti Rian', '6303040508000022', '1993-02-25', 'Jalan Keruing 3 Blok A Sungai Ulin Banjarbaru', '089635772387', 'Petugas Kantor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_alat` varchar(10) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `penanggung_jawab` varchar(25) NOT NULL,
  `jam_diambil` time NOT NULL,
  `jam_kembali` time NOT NULL,
  `tgl_dipinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_alat`, `id_pegawai`, `penanggung_jawab`, `jam_diambil`, `jam_kembali`, `tgl_dipinjam`, `tgl_kembali`) VALUES
(6, 'TOL001', 6, 'Shinta Ariani', '09:00:00', '15:30:00', '2023-01-03', '2023-01-03'),
(8, 'TOL005', 7, 'Shinta Ariani', '11:00:00', '16:00:00', '2023-01-05', '2023-01-05'),
(9, 'TOL001', 8, 'Shinta Ariani', '08:30:00', '14:30:00', '2023-01-06', '2023-01-06'),
(10, 'TOL004', 8, 'Shinta Ariani', '09:00:00', '14:00:00', '2023-01-09', '2023-01-09'),
(11, 'TOL004', 2, 'Shinta Ariani', '10:00:00', '16:00:00', '2023-01-11', '2023-01-11'),
(12, 'TOL001', 9, 'Shinta Ariani', '11:00:00', '18:00:00', '2023-01-16', '2023-01-16'),
(13, 'TOL006', 9, 'Shinta Ariani', '10:30:00', '14:40:00', '2023-01-19', '2023-01-19'),
(14, 'TOL004', 6, 'Shinta Ariani', '10:30:00', '15:00:00', '2023-01-20', '2023-01-20'),
(15, 'TOL001', 1, 'Shinta Ariani', '09:40:00', '16:30:00', '2023-01-23', '2023-01-23'),
(16, 'TOL005', 7, 'Shinta Ariani', '08:30:00', '15:00:00', '2023-01-26', '2023-01-26'),
(17, 'TOL006', 8, 'Shinta Ariani', '09:30:00', '14:00:00', '2023-02-01', '2023-02-08'),
(19, 'TOL004', 2, 'Shinta Ariani', '08:00:00', '16:00:00', '2023-02-03', '2023-02-03'),
(22, 'TOL002', 6, 'Shinta Ariani', '08:30:00', '15:30:00', '2023-02-13', '2023-02-13'),
(23, 'TOL005', 1, 'Shinta Ariani', '09:45:00', '16:00:00', '2023-02-06', '2023-02-06'),
(24, 'TOL006', 9, 'Shinta Ariani', '10:40:00', '17:00:00', '2023-02-08', '2023-02-08'),
(25, 'TOL002', 8, 'Shinta Ariani', '21:27:00', '21:40:00', '2023-02-22', '2023-02-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pemohon` varchar(35) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `nik`, `nama_pemohon`, `tgl_lahir`, `alamat`, `telp`) VALUES
(3, '6372040508000012', 'Restu', '2000-12-14', 'Jalan Purnawirawan No.10 Banjarbaru', '081266341234'),
(4, '6303040805990029', 'Nugroho', '1999-03-10', 'Jl. Komplek Permai 1 Sekumpul Martapura ', '086878881220'),
(5, '6305040508000001', 'Kamil', '2000-08-05', 'Jalan Dahlia No.10 RT.08 RW.02 Loktabat Utara Banj', '089644409888'),
(7, '6303050707770015', 'Imron Asikin', '1970-07-07', 'Gg Mahabbah 2 Sekumpul Martapura', '085377604553'),
(8, '6303055307770005', 'Samiati', '1980-08-20', 'Gg Mujahidin 3 RT.05 RW.03 Tanjung Rema Darat Mart', '085323273298'),
(9, '6303056612000011', 'Vitra Laili', '2000-12-26', 'Jalan Sampurna 4 No.15 Tanjung Rema Darat Martapur', '085386724595'),
(10, '6303050709170001', 'Imam Syairozi', '2002-07-09', 'Gg Puji Rahayu 4 Sekumpul Martapura', '089655002322'),
(11, '6303052808270001', 'Muhammad Rayyan', '2000-08-28', 'Gg Hijrah 2 No.8 Sekumpul Martapura', '082377453424'),
(12, '6303050707770077', 'Nofia Damayanti', '1992-09-20', 'Jalan Mentaos Komplek Perumahan Seribu Banjarbaru', '089644568080'),
(13, '6303052712000012', 'NorHidayah', '1999-10-26', 'Jalan Pangeran Hidayatullah No.10 Keraton Martapur', '085332252755'),
(14, '6305051207770001', 'Reza Rahmadi', '2000-01-07', 'Jalan Benua Anyar Banjarmasin', '081348771388'),
(15, '6305052812000002', 'Raihanah', '1998-08-02', 'Jalan Trikora RT.03 RW.09 Landasan Ulin Banjarbaru', '089634441220'),
(16, '6303051220000018', 'Yeyen Pratiwi', '1996-03-03', 'Jalan Mentri 4 Asrama Polisi Martapura', '083150880441'),
(17, '6305052028000009', 'Rizka Safitri', '1985-12-12', 'Jalan Takuti Mataraman No.18', '082366459098'),
(18, '6305051525000018', 'Muhammad Bakri', '1975-10-20', 'Gg Saadah 2 RT.04 RW.06 No.12 Keraton Martapura', '085344652020'),
(19, '6372040599000019', 'Raihan Sabana', '1992-02-20', 'Jalan Manggis No.10 RT.05 RW.02 Loktabat Utara Ban', '085366502987');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengukuran`
--

CREATE TABLE `pengukuran` (
  `id_pengukuran` int(11) NOT NULL,
  `kode_ukur` varchar(10) NOT NULL,
  `kode_permohonan` varchar(10) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_pengukuran` date NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengukuran`
--

INSERT INTO `pengukuran` (`id_pengukuran`, `kode_ukur`, `kode_permohonan`, `id_pemohon`, `id_pegawai`, `tgl_pengukuran`, `waktu`) VALUES
(25, 'ATR002', 'BPN010', 4, 7, '2023-02-05', ''),
(26, 'ATR003', 'BPN011', 5, 8, '2023-01-06', 'PAGI'),
(29, 'ATR001', 'BPN009', 3, 6, '2023-01-03', 'PAGI'),
(30, 'ATR004', 'BPN012', 7, 8, '2023-01-09', 'PAGI'),
(31, 'ATR005', 'BPN013', 8, 2, '2023-01-11', 'PAGI'),
(32, 'ATR006', 'BPN014', 9, 9, '2023-01-16', 'SIANG'),
(33, 'ATR007', 'BPN015', 10, 9, '2023-01-19', 'SIANG'),
(34, 'ATR008', 'BPN016', 11, 6, '2023-01-20', 'SIANG'),
(35, 'ATR009', 'BPN017', 12, 1, '2023-01-23', 'PAGI'),
(36, 'ATR010', 'BPN018', 13, 7, '2023-01-26', 'PAGI'),
(37, 'ATR011', 'BPN019', 14, 8, '2023-02-01', 'PAGI'),
(38, 'ATR012', 'BPN020', 15, 2, '2023-02-03', 'PAGI'),
(39, 'ATR013', 'BPN021', 16, 6, '2023-02-13', 'PAGI'),
(40, 'ATR014', 'BPN022', 17, 1, '2023-02-06', 'PAGI'),
(41, 'ATR015', 'BPN023', 18, 9, '2023-02-08', 'SIANG'),
(45, 'ATR016', 'BPN024', 19, 8, '2023-01-01', 'SIANG');

--
-- Trigger `pengukuran`
--
DELIMITER $$
CREATE TRIGGER `tambahkode` AFTER INSERT ON `pengukuran` FOR EACH ROW BEGIN
INSERT INTO hasil SET kode_ukur = NEW.kode_ukur ;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `kode_permohonan` varchar(10) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `tgl_permohonan` date NOT NULL,
  `tgl_pendaftaran` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id_permohonan`, `kode_permohonan`, `id_pemohon`, `alamat`, `kelurahan`, `kecamatan`, `telp`, `tgl_permohonan`, `tgl_pendaftaran`) VALUES
(12, 'BPN009', 3, 'Jalan Mentri 4 Gg Mufakat No.8 Martapura, Di sampi', 'Keraton', 'Martapura', '081266341234', '2023-01-03', NULL),
(13, 'BPN010', 4, 'Jln. Sampurna 5 Ujung Gg. Junjung Buih RT.08 RW.03', 'Tanjung Rema Darat', 'Martapura', '086878881220', '2023-01-05', NULL),
(14, 'BPN011', 5, 'Jalan Agung No.15 ', 'Lok Tamu', 'Mataraman', '089644409888', '2023-01-06', NULL),
(15, 'BPN012', 7, 'Jalan Sumberadi RT.02 RW.05, Disamping Toko \"Abdul', ' Desa Bawahan Pasar', 'Mataraman', '085377604553', '2023-01-09', NULL),
(16, 'BPN013', 8, 'Gg Hijrah 4 No.12 RT.03 RW.04', 'Sekumpul', 'Martapura', '085323273298', '2023-01-11', NULL),
(17, 'BPN014', 9, 'Jalan Imam Bonjol No.09, Di samping pertokoan Kayu', 'Tunggul Irang', 'Martapura', '085386724595	', '2023-01-16', NULL),
(18, 'BPN015', 10, 'Jalan Pendidikan No.15 RT.06 RW.08, Di belakang Ru', 'Desa Indrasari', 'Martapura', '089655002322', '2023-01-19', NULL),
(19, 'BPN016', 11, 'Jalan Margasari No.12 RT.05 RW.04', 'Desa Sungai Sipai', 'Martapura', '082377453424', '2023-01-20', NULL),
(20, 'BPN017', 12, 'Jalan Anggrek Gg Manggis 2 Sejahtera No.05', 'Gambut', 'Gambut', '089644568080', '2023-01-23', NULL),
(21, 'BPN018', 13, 'Jalan Danau Salak Gg Riam, Di belakang mesjid Al I', 'Desa Karang Intan', 'Karang Intan', '085332252755', '2023-01-26', NULL),
(22, 'BPN019', 14, 'Jalan Melati Gg Bersama No.12, Sebrang Toko Bangun', 'Desa Batu Balian', 'Simpang Empat', '081348771388', '2023-02-01', NULL),
(23, 'BPN020', 15, 'Jalan Kamboja 3 No.02 RT.04 RW.04, Disebelah Alkah', 'Desa Lok Tanah', 'Telaga Bauntung', '089634441220', '2023-02-03', NULL),
(24, 'BPN021', 16, 'Jalan Abadi Setya Komplek Permata 2 No.04', 'Bincau', 'Martapura', '083150880441', '2023-02-06', NULL),
(25, 'BPN022', 17, 'Jalan Nias, Di sebrang lapangan sepak bola Kodim', 'Abirau', 'Karang Intan', '082366459098	', '2023-02-08', NULL),
(26, 'BPN023', 18, 'Jalan Mandai 3 Gg Kasturi No.6 RT.02 RW.05', 'Martapura Barat', 'Teluk Selong', '085344652020', '2023-02-13', NULL),
(27, 'BPN024', 19, 'Jalan Darussalam Gg Pelita No.5 RT.08 RW.04', 'Tanjung Rema Darat', 'Martapura', '085366502987', '2023-02-17', NULL),
(28, 'BPN025', 7, 'Jl. Kemuning', 'Banjarbaru Selatan', 'Banjarbaru', '0835457653245', '2023-01-01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusdoc`
--

CREATE TABLE `statusdoc` (
  `kode` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `statusdoc`
--

INSERT INTO `statusdoc` (`kode`, `status`) VALUES
('ATR001', 'Mapping'),
('ATR002', ' Mapping'),
('ATR003', ' '),
('ATR004', ' '),
('ATR005', ' '),
('ATR006', ' '),
('ATR007', ' '),
('ATR008', ' '),
('ATR009', ' '),
('ATR010', ' '),
('ATR011', ' '),
('ATR012', ' '),
('ATR013', ' '),
('ATR014', ' '),
('ATR015', ' '),
('ATR016', ' '),
('BPN001', 'DITERIMA'),
('BPN002', 'DITERIMA'),
('BPN003', 'DITERIMA'),
('BPN004', 'DITERIMA'),
('BPN005', 'DITERIMA'),
('BPN006', 'DITERIMA'),
('BPN007', 'DITERIMA'),
('BPN008', 'MENUNGGU KONFIRMASI'),
('BPN009', 'DITERIMA'),
('BPN010', 'DITERIMA'),
('BPN011', 'DITERIMA'),
('BPN012', 'DITERIMA'),
('BPN013', 'DITERIMA'),
('BPN014', 'DITERIMA'),
('BPN015', 'DITERIMA'),
('BPN016', 'DITERIMA'),
('BPN017', 'DITERIMA'),
('BPN018', 'DITERIMA'),
('BPN019', 'DITERIMA'),
('BPN020', 'DITERIMA'),
('BPN021', 'DITERIMA'),
('BPN022', 'DITERIMA'),
('BPN023', 'DITERIMA'),
('BPN024', 'DITERIMA'),
('BPN025', 'MENUNGGU KONFIRMASI'),
('HSL001', 'Selesai'),
('HSL002', 'Selesai'),
('HSL003', 'Selesai'),
('HSL004', 'Selesai'),
('HSL005', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `username`, `password`, `hak_akses`) VALUES
(1, '6372040508000001', 'admin', 'admin', '1'),
(5, '6303050707770015', 'Imron', '888', '2'),
(6, '6303055307770005', 'Samiati', '228', '2'),
(7, '6303056612000011', 'Vitra', '262', '2'),
(8, '6303050709170001', 'Imam', '792', '2'),
(9, '6303052808270001', 'Rayyan', '828', '2'),
(10, '6303050707770077', 'Nofia', '929', '2'),
(11, '6303052712000012', 'Dayah', '126', '2'),
(12, '6305051207770001', 'Reza', '172', '2'),
(13, '6305052812000002', 'Raihanah', '829', '2'),
(14, '6303051220000018', 'Yeyen', '336', '2'),
(15, '6305052028000009', 'Rizka', '121', '2'),
(16, '6305051525000018', 'Bakri', '125', '2'),
(17, '6372040599000019', 'Raihan', '222', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `kode_alat` (`kode_alat`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `kode_ukur` (`kode_ukur`,`kode_hasil`),
  ADD KEY `kode_hasil` (`kode_hasil`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `kode_alat` (`kode_alat`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD PRIMARY KEY (`id_pengukuran`),
  ADD KEY `kode_permohonan` (`kode_permohonan`),
  ADD KEY `id_pemohon` (`id_pemohon`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `kode_ukur` (`kode_ukur`);

--
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `id_pemohon` (`id_pemohon`),
  ADD KEY `kode_permohonan` (`kode_permohonan`);

--
-- Indeks untuk tabel `statusdoc`
--
ALTER TABLE `statusdoc`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  MODIFY `id_pengukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD CONSTRAINT `pengukuran_ibfk_1` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id_pemohon`),
  ADD CONSTRAINT `pengukuran_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_ibfk_1` FOREIGN KEY (`kode_permohonan`) REFERENCES `statusdoc` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
