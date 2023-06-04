-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 09:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kullanici_sifre`
--

-- --------------------------------------------------------

--
-- Table structure for table `duyurular`
--

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL,
  `kime` varchar(100) NOT NULL,
  `icerik` varchar(500) NOT NULL,
  `konu` varchar(150) NOT NULL,
  `kimden` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `duyurular`
--

INSERT INTO `duyurular` (`id`, `kime`, `icerik`, `konu`, `kimden`) VALUES
(1, '2110205571@ogrenci.karabuk.edu.tr', 'Neo klasik ekonomi düşüncesinden epistemolojik bir kopuşu temsil eden heteredoks yaklaşım günümüzde giderek ön plana çıkan davranışsal ekonomi ve nöro ekonomi ile daha fazla önem kazanmaktadır.', 'Epistemolojik kopuş hakkında', 'admin'),
(2, 'ykf20002@gmail.com', 'Ekonomi rakam işi, ekonomi temenni işi, ekonomi güven işi, ekonomi istikrar işi, beklenti işi Ekonomi gözlerdeki ışıltıdır.', 'Ekonomi gözlerdeki ışıltıdır', 'Nureddin Nebati'),
(3, 'ykf20002@gmail.com', 'Neo klasik ekonomi düşüncesinden epistemolojik bir kopuşu temsil eden heteredoks yaklaşım günümüzde giderek ön plana çıkan davranışsal ekonomi ve nöro ekonomi ile daha fazla önem kazanmaktadır.', 'Epistemolojik kopuş hakkında', 'Nureddin Nebati'),
(7, 'ykf20002@gmail.com', 'rtyrtyry', 'SADGHJKLŞİ,', 'ykf20002@gmail.com'),
(8, 'ykf20002@gmail.com', 'bilgi g\r\n', 'yöksis bilgi güncelleme', 'ykf20002@gmail.com'),
(9, 'erkam@gmail.com', 'dfsdfsdfsdf', 'SADGHJKLŞİ,', 'ykf20002@gmail.com'),
(10, 'erkam@gmail.com', 'asdasdasd', 'yöksis bilgi güncelleme', 'ykf20002@gmail.com'),
(11, 'ykf20002@gmail.com', 'wertwerwer', 'yöksis bilgi güncelleme', 'ykf20002@gmail.com'),
(12, 'ykf20002@gmail.com', 'eı4565685467567', 'yöksis bilgi güncelleme', 'erkam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kitapadi` varchar(100) NOT NULL,
  `yazaradi` varchar(100) NOT NULL,
  `basimyili` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitapadi`, `yazaradi`, `basimyili`) VALUES
(1, 'Harry Potter ve Felsefe Taşı', 'Joanne Kathleen Rowling', 1850),
(2, 'Harry Potter ve Sırlar Odası', 'Joanne Kathleen Rowling', 1851),
(3, 'Harry Potter ve Azkaban Tutsağı', 'Joanne Kathleen Rowling', 1852),
(4, 'Harry Potter ve Ateş Kadehi', 'Joanne Kathleen Rowling', 1853),
(5, 'Harry Potter ve Zümrüdüanka Yoldaşlığı', 'Joanne Kathleen Rowling', 1854),
(6, 'Harry Potter ve Melez Prens', 'Joanne Kathleen Rowling', 1855),
(7, 'Harry Potter ve Ölüm Yadigarları', 'Joanne Kathleen Rowling', 1856),
(11, 'hamza ', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kullaniciler`
--

CREATE TABLE `kullaniciler` (
  `id` int(11) NOT NULL,
  `isim` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kullaniciler`
--

INSERT INTO `kullaniciler` (`id`, `isim`, `email`, `sifre`) VALUES
(1, 'Yaman', 'ykf20002@gmail.com', 'yaman158'),
(10, 'erkam', 'erkam@gmail.com', 'erkam123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kullaniciler`
--
ALTER TABLE `kullaniciler`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kullaniciler`
--
ALTER TABLE `kullaniciler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
