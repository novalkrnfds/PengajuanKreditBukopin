-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2017 pada 17.22
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukopin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailkredit`
--

CREATE TABLE `tb_detailkredit` (
  `id_detailkredit` int(5) NOT NULL,
  `id_nasabah` int(5) NOT NULL,
  `id_kredit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumen` int(5) NOT NULL,
  `id_kredit` int(5) NOT NULL,
  `foto_identitas` text NOT NULL,
  `foto_kk` text NOT NULL,
  `foto_suratnikah` text NOT NULL,
  `sk_karyawan` text NOT NULL,
  `npwp` text NOT NULL,
  `rekening_tabungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kredit`
--

CREATE TABLE `tb_kredit` (
  `id_kredit` int(5) NOT NULL,
  `id_nasabah` int(5) NOT NULL,
  `id_marketing` int(5) NOT NULL,
  `permohonan` int(12) NOT NULL,
  `jangka_waktu` varchar(15) NOT NULL,
  `bunga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_marketing`
--

CREATE TABLE `tb_marketing` (
  `id_marketing` int(5) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nasabah`
--

CREATE TABLE `tb_nasabah` (
  `id_nasabah` int(5) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `tmp_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Khatolik','Protestan','Hindu','Budha','Lainnya') DEFAULT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `no_npwp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `lama_menetap` varchar(10) DEFAULT NULL,
  `no_telprumah` varchar(10) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `status_perkawinan` enum('Menikah','Belum Menikah','Janda/Duda') DEFAULT NULL,
  `pendidikan` varchar(5) DEFAULT NULL,
  `nama_ibukandung` varchar(40) DEFAULT NULL,
  `jml_tanggungan` varchar(5) DEFAULT NULL,
  `alamat_korespondensi` text,
  `kepemilikan_rumah` enum('Sendiri','Sewa/Kontrak','Orang tua','Dinas','Lainnya') DEFAULT NULL,
  `createddate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nasabah`
--

INSERT INTO `tb_nasabah` (`id_nasabah`, `nama`, `tmp_lahir`, `tgl_lahir`, `agama`, `no_identitas`, `no_npwp`, `alamat`, `lama_menetap`, `no_telprumah`, `no_hp`, `status_perkawinan`, `pendidikan`, `nama_ibukandung`, `jml_tanggungan`, `alamat_korespondensi`, `kepemilikan_rumah`, `createddate`) VALUES
(1, 'Nouval Kurnia Firdaus', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(2, 'Nouval Kurnia Firdaus', 'Tangerang', '1994-11-18', 'Islam', '3674031811940005', '18293213982123211', 'Pondok Aren, Tangerang Selatan', '25 Tahun', '0218182121', '08981231212', 'Menikah', 'SD', 'Asdfghj', '12', 'Pondok Aren Tangerang Selatan', 'Orang tua', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(5) NOT NULL,
  `id_nasabah` int(5) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `telp_perusahaan` varchar(12) NOT NULL,
  `fax_perusahaan` varchar(16) NOT NULL,
  `jenis_usaha` varchar(20) NOT NULL,
  `bidang_pekerjaan` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` enum('Tetap','Kontrak') NOT NULL,
  `masa_kerja` varchar(15) NOT NULL,
  `nm_atasan` varchar(40) NOT NULL,
  `telp_atasan` varchar(16) NOT NULL,
  `nm_kep_personalia` varchar(40) NOT NULL,
  `telp_personalia` varchar(16) NOT NULL,
  `nm_company_before` varchar(40) NOT NULL,
  `masa_kerja_before` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `id_nasabah`, `nama_perusahaan`, `alamat_perusahaan`, `telp_perusahaan`, `fax_perusahaan`, `jenis_usaha`, `bidang_pekerjaan`, `jabatan`, `status`, `masa_kerja`, `nm_atasan`, `telp_atasan`, `nm_kep_personalia`, `telp_personalia`, `nm_company_before`, `masa_kerja_before`) VALUES
(1, 2, 'PT. Integra Media Dinamika', 'Asd', '0218218912', '0218218912', 'Infomation Technolog', 'Lainnya', 'Front End Developer', 'Kontrak', '6 bulan', 'Didik Syahrial', '0821217212911', 'Fahmi Idris', '0812712312981', 'PT. Jari Solusi International', '6 Bulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penghasilan`
--

CREATE TABLE `tb_penghasilan` (
  `id_penghasilan` int(5) NOT NULL,
  `id_nasabah` int(5) NOT NULL,
  `pendapatan_pokok` int(12) NOT NULL,
  `tunjangan` int(12) NOT NULL,
  `penghasilan` int(12) NOT NULL,
  `total_penghasilan` int(12) NOT NULL,
  `biaya_rutin` int(12) NOT NULL,
  `angsuran_lain` int(12) NOT NULL,
  `biaya_lain` int(12) NOT NULL,
  `total_pengeluaran` int(12) NOT NULL,
  `netto_penghasilan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penghasilan`
--

INSERT INTO `tb_penghasilan` (`id_penghasilan`, `id_nasabah`, `pendapatan_pokok`, `tunjangan`, `penghasilan`, `total_penghasilan`, `biaya_rutin`, `angsuran_lain`, `biaya_lain`, `total_pengeluaran`, `netto_penghasilan`) VALUES
(1, 2, 5000000, 5000000, 5000000, 15000000, 5000000, 5000000, 5000000, 15000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_validasi`
--

CREATE TABLE `tb_status_validasi` (
  `id_status` int(5) NOT NULL,
  `id_kredit` int(5) NOT NULL,
  `id_marketing` int(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `id` int(3) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `id_nasabah` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `email`, `password`, `level`, `id_nasabah`) VALUES
(1, 'Nouval Kurnia Firdaus', 'admin@mail.com', 'e9e5038ade01c005d6d3e2ac2223bb4d', 1, NULL),
(2, 'Nasabah 1', 'nasabah1@mail.com', 'c7dcc69ffc075e8615d70e5be34bd29c', 3, NULL),
(4, 'Nouval', 'novalkrnfds@mail.com', '68b8c66a8cf9446fbde46b19ac4fff5f', 3, '1'),
(5, 'Nouval Kurnia Firdaus', 'novalkrnfds@gmail.com', '68b8c66a8cf9446fbde46b19ac4fff5f', 3, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detailkredit`
--
ALTER TABLE `tb_detailkredit`
  ADD PRIMARY KEY (`id_detailkredit`),
  ADD KEY `NASABAH` (`id_nasabah`),
  ADD KEY `KREDIT` (`id_kredit`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `INDEX` (`id_kredit`);

--
-- Indexes for table `tb_kredit`
--
ALTER TABLE `tb_kredit`
  ADD PRIMARY KEY (`id_kredit`),
  ADD KEY `NASABAH` (`id_nasabah`),
  ADD KEY `MARKETING` (`id_marketing`);

--
-- Indexes for table `tb_marketing`
--
ALTER TABLE `tb_marketing`
  ADD PRIMARY KEY (`id_marketing`);

--
-- Indexes for table `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `INDEX` (`id_nasabah`);

--
-- Indexes for table `tb_penghasilan`
--
ALTER TABLE `tb_penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`),
  ADD KEY `INDEX` (`id_nasabah`);

--
-- Indexes for table `tb_status_validasi`
--
ALTER TABLE `tb_status_validasi`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `INDEX` (`id_kredit`),
  ADD KEY `INDEX MARKETING` (`id_marketing`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detailkredit`
--
ALTER TABLE `tb_detailkredit`
  MODIFY `id_detailkredit` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id_dokumen` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_kredit`
--
ALTER TABLE `tb_kredit`
  MODIFY `id_kredit` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_marketing`
--
ALTER TABLE `tb_marketing`
  MODIFY `id_marketing` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  MODIFY `id_nasabah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_penghasilan`
--
ALTER TABLE `tb_penghasilan`
  MODIFY `id_penghasilan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_status_validasi`
--
ALTER TABLE `tb_status_validasi`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detailkredit`
--
ALTER TABLE `tb_detailkredit`
  ADD CONSTRAINT `tb_detailkredit_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detailkredit_ibfk_2` FOREIGN KEY (`id_kredit`) REFERENCES `tb_kredit` (`id_kredit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kredit`
--
ALTER TABLE `tb_kredit`
  ADD CONSTRAINT `tb_kredit_ibfk_1` FOREIGN KEY (`id_marketing`) REFERENCES `tb_marketing` (`id_marketing`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kredit_ibfk_2` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD CONSTRAINT `tb_pekerjaan_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penghasilan`
--
ALTER TABLE `tb_penghasilan`
  ADD CONSTRAINT `tb_penghasilan_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_status_validasi`
--
ALTER TABLE `tb_status_validasi`
  ADD CONSTRAINT `tb_status_validasi_ibfk_1` FOREIGN KEY (`id_marketing`) REFERENCES `tb_marketing` (`id_marketing`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_status_validasi_ibfk_2` FOREIGN KEY (`id_kredit`) REFERENCES `tb_kredit` (`id_kredit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
