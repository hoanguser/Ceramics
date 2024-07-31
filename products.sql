-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 12:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `tendm` varchar(50) NOT NULL,
  `uutien` int(4) NOT NULL DEFAULT 0,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`, `uutien`, `hienthi`) VALUES
(49, 'Tượng đá vip', 0, 1),
(50, 'Tượng thạch đẹp', 0, 1),
(51, 'Đồ trang trí', 0, 1),
(52, 'hoangggs', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(5) NOT NULL,
  `tensp` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `dongia` int(12) NOT NULL,
  `iddm` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `img`, `dongia`, `iddm`) VALUES
(69, 'Tượng Phật Đá', '../upload/pr1.jpg', 3000000, 49),
(70, 'Tượng Thiên Thần', '../upload/pr2.jpg', 4000000, 49),
(71, 'Bình Gốm Đốm', '../upload/binhoacalory.jpg', 3500000, 49),
(76, 'Tượng Để Bàn', '../upload/pr15.jpg', 500000, 50),
(77, 'Bình Cổ Nhỏ', '../upload/pr17.jpg', 1000000, 51),
(79, 'Cốc Nghệ Thuật', '../upload/pr20.jpg', 4000000, 51),
(80, 'Bình Hoa Sen', '../upload/pr18.jpg', 30000000, 51),
(91, 'Bình Hoa Sen', '../upload/1c91ae3cc5ee6233af9269646295dcb0 (1).jpg', 300000, 49);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` tinyint(1) DEFAULT 0,
  `img` varchar(250) DEFAULT '../upload/avt.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `role`, `img`) VALUES
(91, 'adminhoang123', 'adminhoang@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, ''),
(92, 'Thiên Hương', 'lonylona49@gmail.com', '123', 0, ''),
(93, 'Thiên Hương', 'lonylona49@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
(94, 'Hoang123', 'hoang.25102k4@gmail.com', '123', 1, ''),
(96, 'hoang', 'hoang.konami.2k4@gmail.com', '1234', 0, '../upload/IMG_2154.jpg'),
(99, 'NguyenHoang', 'hoang.25102k45555@gmail.com', '123', 0, '../upload/39920e2de676a939128138da990d5204.jpg'),
(100, 'HoangThiYenNhi', 'yennhihk2022@gmail.com', '123', 0, '../upload/b3cec59355ac8ef2d7bd.jpg'),
(101, 'hoangnv2510', 'hoang3333@gmail.com', '827ccb0eea8a706c4c34', 1, '../upload/'),
(102, 'hoangg', 'hoang33333@gmail.com', '827ccb0eea8a706c4c34', 0, '../upload/'),
(103, 'hoanggg', 'hoang33343@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '../upload/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_dm` (`iddm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
