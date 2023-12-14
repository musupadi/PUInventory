-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 05:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mading`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(50) NOT NULL,
  `berita` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `berita`, `id_kategori`, `gambar`) VALUES
(1, 'Dirgahayu RI 75', 'Dirgahayu Republik Indonesia Ke- 75 Tahun. Indonesia Maju.  (Sumber Instagram @universitasharapanmedan)', 1, 'WhatsApp_Image_2020-08-18_at_08_58_10.jpeg'),
(2, 'Pendaftaran Mahasiswa Baru', 'Pendaftaran Mahasiswa Baru TA. 2020/2021 di perpanjang sampai tanggal 19 September 2020.  Ayoo tunggu apalagi segera daftarkan diri anda kuliah di UnHar Medan. Telah dibuka kelas karyawan, Biaya Kuliah bisa dicicil dan bebas Tes Masuk. Kuliah perdana 21 September 2020.  (Sumber Instagram @universitasharapanmedan)', 1, 'WhatsApp_Image_2020-08-18_at_09_00_37.jpeg'),
(3, 'MoU', 'Universitas Harapan Medan melakukan MoU dengan PT Ganda Seribu Utama. Semoga dapat menjalin kerjasama yang baik.  (Sumber Instagram @universitasharapanmedan)', 1, 'WhatsApp_Image_2020-08-18_at_09_00_45.jpeg'),
(5, 'Tahun Baru Islam', 'Universitas Harapan Medan Mengucapkan Selamat Tahun Baru Islam 1 Muharram 1442 H.', 1, 'WhatsApp_Image_2020-08-30_at_12_22_311.jpeg'),
(6, 'Pembagian Masker ke-III', 'Minggu ke-III Universitas Harapan Medan Membagi masker gratis di lapangan Merdeka. Kegiatan Ini Sebagai Bentuk UnHar peduli Covid19. Sampai dengan minggu ke-III ini UnHar sudah membagi lebih dari 600 pcs masker gratis. Ayo lawan Covid19 dengan menggunakan Masker.', 1, 'WhatsApp_Image_2020-08-30_at_12_26_491.jpeg'),
(7, 'Pembagian Masker ke-IV', 'Minggu ke IV , 30 Agustus 2020 dilapangan merdeka medan telah terlaksana. Terimakasih kepada semua pihak yang telah ikut berpartisipasi dalam kegiatan ini.  Tetap jaga kesehatan lindungi diri anda dengan menggunakan Masker.', 1, 'WhatsApp_Image_2020-08-31_at_12_49_551.jpeg'),
(8, 'Webinar Series', 'Buat kamu alumni Universitas Harapan Medan (STIE, STBA, STTH, AMIK harapan) mari bergabung pada webinar series-1 di selenggarakan oleh Lembaga karir dan Hubungan Alumni UnHar Medan. Dengan topik \"Tetap Berkarir di Era kebiasaan Baru\"\r\n31 Agustus 2020 Pukul 10.00 - 12.00 Wib', 1, 'WhatsApp_Image_2020-08-31_at_12_53_43.jpeg'),
(9, 'seminar', 'pada hari selasa dilaksanakan seminar tugas akhir di kampus universitas harapan medan', 1, 'WhatsApp_Image_2020-09-07_at_21_47_37.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`) VALUES
(1, 'Darul'),
(2, 'Agung'),
(3, 'Tedi'),
(4, 'Naima'),
(5, 'Arief'),
(6, 'Abdurrahman'),
(7, 'Ali'),
(8, 'Andre'),
(9, 'Febri'),
(10, 'Budi'),
(11, 'Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `feedback` varchar(40) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `feedback`, `tanggal`) VALUES
(1, 'test', '1994-01-15'),
(2, 'test', '2020-09-06'),
(3, 'ff', '2020-09-06'),
(4, 'hai', '2020-09-06'),
(5, 'hai kamu ', '2020-09-08'),
(6, 'aplikasi sangat bagus', '2020-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `mulai` varchar(20) NOT NULL,
  `akhir` varchar(20) NOT NULL,
  `sks` varchar(10) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal`, `hari`, `id_matkul`, `id_kelas`, `id_jurusan`, `id_dosen`, `mulai`, `akhir`, `sks`, `id_ruang`) VALUES
(1, 'Senin', 1, 1, 1, 2, '08:00', '10:00', '2', 8),
(2, 'Senin', 2, 1, 1, 1, '10:00', '12:00', '2', 1),
(3, 'Senin', 4, 1, 1, 6, '14:00', '16:00', '1', 11),
(4, 'Senin', 4, 2, 1, 8, '10:00', '12:00', '1', 11),
(5, 'Senin', 1, 2, 1, 4, '08:00', '10:00', '2', 5),
(6, 'Senin', 2, 2, 1, 10, '14:00', '16:00', '2', 9),
(7, 'Senin', 6, 17, 2, 4, '08:00', '10:00', '2', 1),
(8, 'Senin', 10, 17, 2, 9, '08:00', '10:00', '3', 2),
(9, 'Senin', 6, 18, 2, 7, '17:00', '18:30', '3', 15),
(10, 'Senin', 5, 18, 2, 1, '19:00', '20:00', '2', 14),
(11, 'Senin', 5, 19, 3, 5, '08:00', '10:00', '3', 15),
(12, 'Senin', 10, 19, 3, 1, '10:00', '12:00', '3', 13),
(13, 'Senin', 6, 21, 4, 10, '08:00', '10:00', '2', 7),
(14, 'Sabtu', 2, 1, 1, 3, '08:00', '10:00', '2', 11);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id_ujian` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` varchar(50) NOT NULL,
  `selesai` varchar(50) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `jenis_ujian` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id_ujian`, `id_matkul`, `id_jurusan`, `id_kelas`, `tanggal`, `mulai`, `selesai`, `id_dosen`, `id_ruang`, `jenis_ujian`, `status`, `sks`) VALUES
(1, 1, 1, 1, '2020-08-08', '08:00', '10:00', 1, 1, 'UAS', 'ACTIVE', '2'),
(2, 1, 1, 1, '2020-08-08', '09:00', '10:00', 1, 1, 'UAS', 'ACTIVE', '2'),
(3, 3, 1, 2, '2020-09-23', '08:00', '10:00', 6, 5, 'UAS', 'ACTIVE', '2'),
(9, 2, 1, 5, '2020-08-24', '08:00', '10:00', 4, 5, 'UAS', 'ACTIVE', '3'),
(10, 6, 2, 18, '2020-08-23', '17:00', '18:30', 1, 4, 'UAS', 'ACTIVE', '3'),
(11, 4, 1, 2, '2020-09-09', '08:00', '10:00', 4, 6, 'UAS', 'ACTIVE', '1'),
(12, 6, 2, 17, '2020-09-14', '10:00', '12:00', 8, 6, 'UTS', 'ACTIVE', '3');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Industri'),
(3, 'Teknik Mesin'),
(4, 'Teknik Sipil'),
(5, 'Teknik Elektro'),
(6, 'Sistem Informasi'),
(7, 'Manajemen Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori`, `kategori`) VALUES
(1, 'Instagram');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `program` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_jurusan`, `program`, `class`) VALUES
(1, '1', 1, 'Pagi', 'I'),
(2, '2', 1, 'Pagi', 'I'),
(4, '4', 1, 'Pagi', 'I'),
(5, '1', 1, 'Sore', 'I'),
(6, '2', 1, 'Sore', 'I'),
(7, '3', 1, 'Sore', 'I'),
(8, '4', 1, 'Sore', 'I'),
(9, '1', 1, 'Pagi', 'II'),
(10, '2', 1, 'Pagi', 'II'),
(11, '3', 1, 'Pagi', 'II'),
(12, '4', 1, 'Pagi', 'II'),
(13, '1', 1, 'Sore', 'II'),
(14, '2', 1, 'Sore', 'II'),
(15, '3', 1, 'Sore', 'II'),
(16, '4', 1, 'Sore', 'II'),
(17, '1', 2, 'Pagi', 'I'),
(18, '1', 2, 'Sore', 'I'),
(19, '1', 3, 'Pagi', 'I'),
(20, '1', 3, 'Sore', 'I'),
(21, '1', 4, 'Pagi', 'I'),
(22, '1', 4, 'Sore', 'I'),
(23, '1', 5, 'Pagi', 'I'),
(24, '1', 5, 'Sore', 'I'),
(25, '1', 6, 'Pagi', 'I'),
(26, '1', 6, 'Sore', 'I'),
(27, '1', 7, 'Pagi', 'I'),
(28, '1', 7, 'Sore', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `nama_matkul`) VALUES
(1, 'Kalkulus'),
(2, 'Logika Komputer'),
(3, 'Elektronika Digital'),
(4, 'Prak. Elektronika Digital'),
(5, 'Menggambar Teknik'),
(6, 'Geologi Teknik'),
(7, 'Sistem dan Teknologi Informasi'),
(8, 'Pangkalan Data'),
(9, 'Pendidikam Agama'),
(10, 'Fisika'),
(11, 'Etika Profesi'),
(12, 'Algoritma'),
(13, 'Matematika Diskrit'),
(14, 'Open Source');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(100) NOT NULL,
  `gambar_pengumuman` varchar(100) NOT NULL,
  `tanggal_pengumuman` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `gambar_pengumuman`, `tanggal_pengumuman`) VALUES
(3, 'Semester Antara', 'WhatsApp_Image_2020-08-10_at_11_21_353.jpeg', '2020-09-09'),
(4, 'Perpanjangan Seminar Ta', 'WhatsApp_Image_2020-08-18_at_12_15_421.jpeg', '2020-09-09'),
(5, 'Libur thn Baru Islam', 'WhatsApp_Image_2020-08-19_at_19_09_06.jpeg', '2020-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`) VALUES
(1, 'K01'),
(2, 'K02'),
(3, 'K03'),
(4, 'k04'),
(5, 'K05'),
(6, 'K06'),
(7, 'K07'),
(8, 'K08'),
(9, 'K09'),
(10, 'K10'),
(11, 'K11'),
(12, 'L201'),
(13, 'L202'),
(14, 'L203'),
(15, 'L204');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun`, `tahun`) VALUES
(1, '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `jenis_kelamin`, `password`, `kontak`, `level`, `photo`) VALUES
(1, 'Muhammad Supriyadi', 'musupadi@gmail.com', 'Pria', '202cb962ac59075b964b07152d234b70', '1321312', 'Admin', 'default.png'),
(2, 'Try Wahyu Permana', 'admin@gmail.com', 'Pria', '202cb962ac59075b964b07152d234b70', '1321312', 'Admin', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
