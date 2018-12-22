-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 07:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codedoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id_ans` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `answer` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kodemateri` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `gambar` varchar(500) DEFAULT NULL,
  `isi` text,
  `jenis` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kodemateri`, `judul`, `gambar`, `isi`, `jenis`) VALUES
(9, 'Coba upload gambar', 'file_1512142574.jpg', 'Lalalalala', 'VideoVideo/Gambar/Text');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kodesoal` int(11) NOT NULL,
  `nilai` decimal(11,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_user`, `kodesoal`, `nilai`) VALUES
(1, 1, 1, '0'),
(2, 1, 1, '50'),
(3, 1, 1, '33'),
(4, 1, 1, '100'),
(5, 1, 1, '0'),
(6, 1, 1, '100');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `kodesoal` int(11) NOT NULL,
  `nomor` int(20) NOT NULL,
  `soal` text,
  `gambar` varchar(200) DEFAULT NULL,
  `jwb_benar` varchar(2) NOT NULL,
  `jwbA` varchar(100) NOT NULL,
  `jwbB` varchar(100) NOT NULL,
  `jwbC` varchar(100) NOT NULL,
  `jwbD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `kodesoal`, `nomor`, `soal`, `gambar`, `jwb_benar`, `jwbA`, `jwbB`, `jwbC`, `jwbD`) VALUES
(1, 1, 1, 'Apakah Pascal merupakan bahasa pemrograman', NULL, 'A', 'Ya', 'bukan', 'bukan', 'bukan'),
(2, 1, 2, 'Merupakan compiler pascal', NULL, 'D', 'Netbeans', 'Matlab', 'R', 'Turbo Pascal'),
(3, 1, 3, 'Bagaimana bubble sort bekerja', NULL, 'B', 'Gitu', 'Iya', 'Nah', 'Nope');

-- --------------------------------------------------------

--
-- Table structure for table `tambahsoal`
--

CREATE TABLE `tambahsoal` (
  `kodesoal` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `jmlsoal` int(11) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tambahsoal`
--

INSERT INTO `tambahsoal` (`kodesoal`, `judul`, `jmlsoal`, `level`) VALUES
(1, 'etd', 10, 1),
(2, 'coba lagi', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@codedoc.com', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_ans`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kodemateri`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tambahsoal`
--
ALTER TABLE `tambahsoal`
  ADD PRIMARY KEY (`kodesoal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id_ans` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `kodemateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tambahsoal`
--
ALTER TABLE `tambahsoal`
  MODIFY `kodesoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
