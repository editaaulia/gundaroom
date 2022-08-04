-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 06:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gundaroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `username`, `password`) VALUES
(1, 'farhan', 'admin', 'admin'),
(3, 'pani', 'poni', 'admin'),
(4, 'edita', 'edita1', 'admin'),
(5, 'aurel', 'yasmin', 'admin'),
(6, 'urfat', 'acil', 'admin'),
(7, 'ivan', 'gunawan', 'admin'),
(8, 'salman', 'doni', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `topik_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `komentar` text NOT NULL,
  `tgl_komen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `topik_id`, `member_id`, `nama`, `komentar`, `tgl_komen`) VALUES
(6, 1, 3, 'Jajang Surajang', 'Mending dipake buat beli vga aja om, nanti vga nya bisa dipake mining. mining mania MANTAPPP!!!', '2022-01-21'),
(7, 1, 2, 'Nurjali Sudariyah', 'Duit nya dipake buat ternak lele aja om lumayan omset nya perhari bisa 100jt, kalo gak laku bisa jadi lauk om buat makan, lele mania MANTAPP!!!', '2022-01-21'),
(8, 3, 2, 'Nurjali Sudariyah', 'mau cerita apa tu om kok kagak dilanjutin nurjali jadi penasaran niii...', '2022-01-21'),
(9, 4, 1, 'Muhammad Farhan', 'halo ada apa jang', '2022-01-21'),
(10, 5, 3, 'Jajang Surajang', 'enak mas makan di warung mantap', '2022-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `judul` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `judul`, `deskripsi`, `gambar`) VALUES
(6, 'Internship Program BEM FIKTI', 'Halo, Sobat FIKTI!👋🏻\r\n\r\nAkhirnya yang ditunggu-tunggu datang juga.. Siapa nih yang nungguin Open Registration IP BEM FIKTI UG? angkat tangan🙋‍♀️\r\n\r\nRegistrasi untuk program magang di BEM FIKTI UG 2022 sudah resmi dibuka🎉\r\n\r\nKhusus untuk kamu Mahasiswa FIKTI Jurusan Sistem Informasi dan Sistem Komputer khusus angkatan 2021 yang ingin secara langsung mencoba untuk eksplor dan berkenalan dengan BEM FIKTI UG sekaligus belajar berorganisasi bisa langsung daftar melalui link berikut :\r\n\r\n( Link in bio ) :\r\nhttps://fikti.bem.gunadarma.ac.id/IP_BEMFIKTI\r\n\r\nWhat are you waiting for?\r\n\r\nYuk, segera daftarkan dirimu dan ajak teman-temanmu untuk ikut mendaftar di Internship Program BEM FIKTI UG.\r\n\r\nPeriode Pendaftaran :\r\n15 - 19 Januari 2022\r\n', 'fotoevent/event1.png'),
(7, 'Seminar Industri 4.0', 'Testing bla bla testing 1 2 3 testing', 'fotoevent/supaidaman.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `nama`, `angkatan`, `jurusan`, `password`, `foto`) VALUES
(3, 'jajangtampan', 'Jajang Surajang', '2008', 'SI', 'jajang', 'fotoprofil/supaidaman.jfif'),
(5, 'panada1000', 'Farhan', '2018', 'SI', 'rebelion1', 'fotoprofil/supaidaman.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `topik_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`topik_id`, `member_id`, `title`, `deskripsi`, `date`) VALUES
(3, 3, 'Cerita Bahagia saya selama di gundar', 'saya ingin cerita bahagia saya selama kuliah di gundar', '2022-01-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`topik_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `topik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
