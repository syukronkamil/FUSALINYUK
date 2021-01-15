-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 06:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `confirm_payment`
--

CREATE TABLE `confirm_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_pembayaran` varchar(200) NOT NULL,
  `jumlah_pembayaran` int(200) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_rekening` varchar(200) NOT NULL,
  `no_rekening` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm_payment`
--

INSERT INTO `confirm_payment` (`id`, `user_id`, `no_pembayaran`, `jumlah_pembayaran`, `tanggal`, `nama_rekening`, `no_rekening`) VALUES
(1, 25, 'FY000001', 200000, '2021-01-15', 'Fie Alkana', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `komentar` varchar(1000) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama`, `harga`, `image`, `alamat`) VALUES
(1, 'Glory Futsal', 200000, 'LAPANG.png', 'Jl. Terusan Buah Batu, Sukapura, Kec. Dayeuhkolot, Kota Bandung, Jawa Barat 40257'),
(9, 'Progresif Futsal ', 150000, 'PROGRESIF.jpg', 'Jl. Soekarno-Hatta No.785 A, Babakan Penghulu, Cinambo, Kota Bandung, Jawa Barat 40293'),
(10, 'Lapangan Persib', 110000, 'PERSIB.jpg', 'Jl. Supratman No.24, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114'),
(11, 'Queen Futsal', 90000, 'QUEEN.png', 'Jl.Brigjen Katamso No.66, Cicadas, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40122'),
(12, 'Rajawali Futsal', 120000, 'RAJAWALI.png', 'Rajawali Futsal 12 daerah Telkom University Jalan Sukabirus no 12, RT 01/08. Bandung'),
(13, 'Futsal 35', 100000, '35.png', 'Jl. International School No. 8 A, Cicaheum, Kec. Kiaracondong, Kota Bandung, Jawa Barat 40282');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `nama_tim` varchar(250) DEFAULT NULL,
  `no_pemesan` varchar(200) DEFAULT NULL,
  `nama_lapangan` varchar(255) DEFAULT NULL,
  `alamat_lapangan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_berakhir` time DEFAULT NULL,
  `carilawan` varchar(200) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `no_penantang` varchar(200) NOT NULL,
  `status_booking` varchar(200) NOT NULL,
  `no_pembayaran` varchar(100) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `nama_pemesan`, `nama_tim`, `no_pemesan`, `nama_lapangan`, `alamat_lapangan`, `tanggal`, `jam_mulai`, `jam_berakhir`, `carilawan`, `biaya`, `status`, `no_penantang`, `status_booking`, `no_pembayaran`, `status_pembayaran`) VALUES
(30, 25, 'Fie Alfain', 'TEGAL FC', '873829103', 'Futsal 35', 'Jl. International School No. 8 A, Cicaheum, Kec. Kiaracondong, Kota Bandung, Jawa Barat 40282', '2021-01-21', '11:00:00', '13:00:00', 'Tidak', 200000, '-', '-', 'Accept', 'FY000001', 'Lunas'),
(31, 28, 'Melina', 'Samalowa FC', '2147483647', 'Progresif Futsal ', 'Jl. Soekarno-Hatta No.785 A, Babakan Penghulu, Cinambo, Kota Bandung, Jawa Barat 40293', '2021-01-21', '11:00:00', '13:00:00', 'Ya', 300000, 'Belum di Apply', '', 'Accept', 'FY000003', 'Belum Lunas'),
(32, 29, 'Zein Malwi', 'TIM AING', '837382903', 'Futsal 35', 'Jl. International School No. 8 A, Cicaheum, Kec. Kiaracondong, Kota Bandung, Jawa Barat 40282', '2021-01-20', '15:00:00', '16:00:00', 'Ya', 100000, 'Apply', '082127580543', 'Accept', 'FY000002', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `penantang`
--

CREATE TABLE `penantang` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `nama_pemesan` varchar(200) NOT NULL,
  `nama_tim` varchar(200) NOT NULL,
  `nama_lapangan` varchar(200) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_berakhir` time DEFAULT NULL,
  `biaya` int(11) NOT NULL,
  `nama_penantang` varchar(200) NOT NULL,
  `nama_tim_penantang` varchar(200) NOT NULL,
  `no_penantang` varchar(200) NOT NULL,
  `alamat_penantang` varchar(255) NOT NULL,
  `status_apply` varchar(100) NOT NULL,
  `no_pemesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penantang`
--

INSERT INTO `penantang` (`id`, `user_id`, `nama_pemesan`, `nama_tim`, `nama_lapangan`, `tanggal`, `jam_mulai`, `jam_berakhir`, `biaya`, `nama_penantang`, `nama_tim_penantang`, `no_penantang`, `alamat_penantang`, `status_apply`, `no_pemesan`) VALUES
(13, 8, 'Melina', 'Samalowa FC', 'Progresif Futsal ', '2021-01-21', '11:00:00', '13:00:00', 300000, 'taufiq', 'PSI', '08472612823', 'Bandung', '', ''),
(14, 30, 'Zein Malwi', 'TIM AING', 'Futsal 35', '2021-01-20', '15:00:00', '16:00:00', 100000, 'Kamil', 'Kamil Mania', '082127580543', 'Bandung', 'Accept', '0837382903');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `type_user` varchar(10) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_hp`, `password`, `type_user`, `img`) VALUES
(7, 'admin', 'admin@futsalyuk.com', '3423432', '$2y$10$CKNP06AeyV7M/hi0ege9Ru3KlOTMBgySEIRv6LW/Pna5b7Gj/tQoW', 'admin', NULL),
(8, 'taufiq', 'taufiq@gmail.com', '08472612823', '$2y$10$14UvtpfZB8x205W1ojvXCuNo8ZNPoWWX1OqbLYtpWUdy0AJS8.Hui', 'member', NULL),
(22, 'Kamil', 'devenus8f@gmail.com', '82127580843', '$2y$10$iiCTh1VWrnp5NJ6qNKevw.bsecdoNjFer1AMGkgiQi0B.PHaSgQFS', 'member', NULL),
(25, 'Fie Alfain', 'fie@gmail.com', '0837285443', '$2y$10$5HOcemzd8t8aCx4TiACcN.Lo/3eqhvUjonEHGDaszwjqdQbEbrhPa', 'member', NULL),
(28, 'Melina', 'melina@gmail.com', '0384726372', '$2y$10$jTbv9oiIgjvBs8UR0QA5sOopGTsJaq5MP2QwceCDmVQaBqwarzo1.', 'member', ''),
(29, 'Zein Malwi', 'zein@gmail.com', '0837382903', '$2y$10$RZhowXZdD1jEZqLMeoi/OOWtTiO16vPD67bbBVvdf/0XZJb5Q3zdO', 'member', ''),
(30, 'Kamil', 'msyukronkamil20@gmail.com', '082127580543', '$2y$10$sT6WJWEQAl7gBIoI6H.PT.NICDICuy4VYQEfW/vgZGJCAA21DtDBS', 'member', ''),
(32, 'admin2', 'admin2@futsalyuk.com', '082127580543', '$2y$10$ank/HFYK4RBcEccL2jqjaO2It8KM2RQV1ZT3LNbBkrrAqY81StIGu', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `penantang`
--
ALTER TABLE `penantang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `penantang`
--
ALTER TABLE `penantang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
