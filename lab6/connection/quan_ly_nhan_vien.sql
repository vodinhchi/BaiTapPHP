-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 02:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quan_ly_nhan_vien`
--

-- --------------------------------------------------------

--
-- Table structure for table `loai_nv`
--

CREATE TABLE `loai_nv` (
  `ma_loai_nv` varchar(10) NOT NULL,
  `ten_loai_nv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_nv`
--

INSERT INTO `loai_nv` (`ma_loai_nv`, `ten_loai_nv`) VALUES
('BH', 'Bóc hàng'),
('GV', 'Giáo viên'),
('LC', 'Lao công'),
('TK', 'Thư kí'),
('TQ', 'Thủ quỷ');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nv` varchar(10) NOT NULL,
  `ho` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `dia_chi` varchar(225) NOT NULL,
  `anh` varchar(225) NOT NULL,
  `ma_loai_nv` varchar(10) NOT NULL,
  `ma_phong` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`ma_nv`, `ho`, `ten`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `anh`, `ma_loai_nv`, `ma_phong`) VALUES
('NV01', 'Nobi', 'Nobita', '2021-10-01', 1, 'Tokyo', 'nobita.jpg', 'TQ', 'KT'),
('NV02', 'Goda', 'Takeshi', '2011-10-17', 1, 'Diên Khánh', 'chaien.jpg', 'TK', 'KT'),
('NV03', 'Minamoto', 'Shizuka', '2000-04-19', 0, 'Diên Khánh', 'xuka.jpg', 'GV', 'HC'),
('NV04', 'Honekawa', 'Suneo', '2000-04-02', 1, 'Tokyo', 'xeko.jpg', 'TQ', 'GD'),
('NV05', 'DORA', 'DORAEMON', '2000-04-02', 1, 'Tokyo', 'dora.jpg', 'LC', 'BV');

-- --------------------------------------------------------

--
-- Table structure for table `phong_ban`
--

CREATE TABLE `phong_ban` (
  `ma_phong` varchar(10) NOT NULL,
  `ten_phong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phong_ban`
--

INSERT INTO `phong_ban` (`ma_phong`, `ten_phong`) VALUES
('BV', 'Phòng bảo vệ'),
('GD', 'Phòng giám đốc'),
('HC', 'Hành chính'),
('KT', 'Kế toán'),
('NS', 'Nhân sự');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
('U1', 'dinhchi', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loai_nv`
--
ALTER TABLE `loai_nv`
  ADD PRIMARY KEY (`ma_loai_nv`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nv`),
  ADD KEY `ma_loai_nv` (`ma_loai_nv`),
  ADD KEY `ma_phong` (`ma_phong`);

--
-- Indexes for table `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD PRIMARY KEY (`ma_phong`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`ma_loai_nv`) REFERENCES `loai_nv` (`ma_loai_nv`),
  ADD CONSTRAINT `nhan_vien_ibfk_2` FOREIGN KEY (`ma_phong`) REFERENCES `phong_ban` (`ma_phong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
