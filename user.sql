-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 09:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokeritas_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ketunaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `jk`, `tgl_lahir`, `ketunaan`) VALUES
(12, 'Budi Handuk', 'budiku@gmail.com', '$2y$10$gpiknW7xNWCulnbRXakTfuLwh6HDpEHKTTW5IDKBCM2kz5hDbx7xm', 'Pria', '2020-03-19', 'Tuna Daksa,'),
(13, 'Herman Sinaga', 'herman56@gmail.com', '$2y$10$Q0mkB5Y/jVciWLThqkYYQOnbjMk8HRvjlJcjrhwOli2qK7YRIH/MS', 'Pria', '2020-03-17', 'Tuna Daksa,'),
(14, 'Yongki Babi', 'yongki@gmail.com', '$2y$10$u9gyYFZ18U8FvKugswnbK.szc7/zYf/iEpqzpQjw5v3JK3WGG3YY6', 'Wanita', '2020-03-20', 'Tuna Daksa,Tuna Netra,'),
(15, 'Alfon Babi', 'alfon@gmail.com', '$2y$10$lO4PcPu78G5.R8YFbV6HguUQRa97rR8Ps8953iKkGsQsRfOKyDoQy', 'Wanita', '2020-03-12', 'Tuna Daksa,Tuna Wicara,'),
(16, 'yongki hutagalung', 'contact@yongki.co', '$2y$10$zKs0ldNFaYU1rcxipdq.juc/smT3rcxDEZFIpLq4.U0DXQgWW2gGi', 'Pria', '2020-04-29', 'Tuna Daksa,Tuna Grahita,'),
(17, 'mantap asu', 'babs@kasa.com', '$2y$10$fhp62PAkhn8ixwMKOx2UJ.3hSfL2irdpMURaWe8L6RT7/ExzIR.zG', 'Pria', '2020-04-22', 'Tuna Runggu,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
