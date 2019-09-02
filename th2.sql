-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2019 at 06:27 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `th2`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `deskripsi`, `tgl_upload`) VALUES
(1, 'Tersenyumlah!', '<i>oke lah kalu begitu uuu</>\r\n', '2019-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_pesan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `balasan` text NOT NULL,
  `pengirim` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_pesan`, `tgl`, `balasan`, `pengirim`, `foto`) VALUES
(22, '2019-08-01', 'Semua pertanyaan yang ditanyakan langsung kepada guru akan dijawa di forum ini', 'bb', '2.jpeg'),
(23, '2019-08-01', 'Berkomentarlah dengan sopan', 'nisa', '4.jpeg'),
(25, '2019-08-01', 'oke', 'agus', '7.jpeg'),
(26, '2019-08-01', 'Bagaimana cara untuk upload tugas ?', 'agus', '7.jpeg'),
(27, '2019-08-01', 'silahkan pilh menu upload tugas yang ada di beranda sistem', 'bb', '2.jpeg'),
(29, '2019-08-01', 'Terimakasih Pak', 'nisa', '4.jpeg'),
(30, '2019-08-01', 'oke', 'nisa', '4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `materi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul`, `materi`) VALUES
(2, 'aa', 'tkp.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `kode_upload` varchar(26) NOT NULL,
  `nilai` int(30) NOT NULL,
  `saran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `kode_upload`, `nilai`, `saran`) VALUES
(6, '11', 89, 'jan pamaleh jo lai\r\n'),
(7, '12', 100, 'semuanya bagus');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_santri` varchar(25) NOT NULL,
  `id_guru` varchar(25) NOT NULL,
  `subyek_pesan` text NOT NULL,
  `tgl` date NOT NULL,
  `id_balas_guru` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_santri`, `id_guru`, `subyek_pesan`, `tgl`, `id_balas_guru`) VALUES
(1, '0821', '10', 'Tugas saya tidak bisa di upload, bagaimana solusinya?', '2019-07-13', 0),
(2, '0821', '10', 'bagaimana cara upload tugas?', '2019-07-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` varchar(30) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `nama_ortu` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `nama`, `tmp_lahir`, `tgl_lahir`, `jekel`, `kelas`, `nama_ortu`, `alamat`, `no_hp`, `email`, `pass`, `foto`) VALUES
(1, 'nisa', 'solok', '2018-06-30', 'perempuan', 'IV', 'amid amid', 'Jl.Kaki', 0, 'udinsamasae@gmail.co', '$2y$10$errttNNhPkHTfreC2pdHTueUMg8/RrT3vZoAD032fvFFecYyKIRAm', '4.jpeg'),
(2, 'agus', 'papa', '2018-07-31', 'laki-laki', 'IV', 'lala', 'Jl.Surang', 2147483647, 'udinsama10@gmail.com', '$2y$10$A7e8is8iNLolB96laWSGYeeqYKU71GNFsKmz0s.EBq5mhEA/9p6ki', '7.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(30) NOT NULL,
  `ket` enum('on','off') NOT NULL,
  `sembunyi_data` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `ket`, `sembunyi_data`) VALUES
(3, 'belajar lagi', 'off', 'T'),
(4, 'tajwid', 'on', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL,
  `pass` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `level`, `pass`, `foto`) VALUES
(9, 'aa', 'aa', 'admin', '$2y$10$lByXzZurmCD0Q6u9z.iLaef/wGNOs5e0ZktUh4cbTSohRk0Y241T2', '1.jpeg'),
(11, 'bb', 'bb', 'guru', '$2y$10$LvWrrp3atxxkh7bxOdHMu.0LHs0wvO8Xv4qnbDBKnF.Mm9W/TLDK.', '2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `u_tugas`
--

CREATE TABLE `u_tugas` (
  `kode_upload` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_santri` varchar(20) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `audio` varchar(50) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_tugas`
--

INSERT INTO `u_tugas` (`kode_upload`, `id_tugas`, `id_santri`, `nama_santri`, `audio`, `status`) VALUES
(11, 4, '1', 'nisa', 'darkside.mp3', 'diperiksa'),
(12, 4, '2', 'agus', 'Cinematic - and.mp3', 'diperiksa');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `tgl_upload` date NOT NULL,
  `video` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `judul`, `tgl_upload`, `video`) VALUES
(6, '', '2019-07-31', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0hvYMJBQVB4\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>'),
(7, 'zzzz', '2019-07-31', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ExDR1VjfyA\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `u_tugas`
--
ALTER TABLE `u_tugas`
  ADD PRIMARY KEY (`kode_upload`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `u_tugas`
--
ALTER TABLE `u_tugas`
  MODIFY `kode_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
