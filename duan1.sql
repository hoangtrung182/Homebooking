-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 06:18 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `ma_bl` int(10) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_tk` int(10) NOT NULL,
  `ma_phong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`ma_bl`, `noi_dung`, `thoi_gian`, `ma_tk`, `ma_phong`) VALUES
(33, '', '22:01:48 - 2023-04-05', 8, 18),
(34, 'dsdsd', '22:01:52 - 2023-04-05', 8, 18),
(35, 'dsdsd', '22:41:34 - 2023-04-05', 8, 16),
(36, 'dsd', '22:47:16 - 2023-04-05', 8, 15),
(37, 'dsd', '22:58:43 - 2023-04-05', 8, 15),
(38, 'Phòng đẹp lắm\r\n', '23:44:03 - 2023-04-05', 8, 5),
(39, 'Hay lắm\r\n', '23:49:52 - 2023-04-05', 8, 6),
(40, 'Cũng đẹp lắm lun', '15:20:13 - 2023-04-06', 8, 16),
(41, '', '15:25:46 - 2023-04-06', 9, 16),
(42, 'abc', '15:29:15 - 2023-04-06', 9, 6),
(43, 'dsd', '15:29:38 - 2023/04/06', 9, 6),
(44, 'sấ', '10:11:33 - 2023/04/08', 8, 6),
(45, 'dsdsd', '10:27:18 - 2023/04/08', 8, 5),
(46, 'Phòng vip', '14:15:52 - 2023/04/10', 8, 14),
(47, 'dsd', '09:56:42 - 2023/04/11', 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `datphong`
--

CREATE TABLE `datphong` (
  `ma_dp` int(10) NOT NULL,
  `ten_kh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_dat` datetime DEFAULT NULL,
  `ngay_den` datetime DEFAULT NULL,
  `ngay_ve` datetime DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 0,
  `thanh_tien` int(100) DEFAULT NULL,
  `ma_tk` int(10) DEFAULT NULL,
  `ma_km` int(10) DEFAULT NULL,
  `ma_phong` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datphong`
--

INSERT INTO `datphong` (`ma_dp`, `ten_kh`, `phone`, `dia_chi`, `ngay_dat`, `ngay_den`, `ngay_ve`, `trang_thai`, `thanh_tien`, `ma_tk`, `ma_km`, `ma_phong`) VALUES
(372, 'vuquynhh', 33633782, 'Hà Nội', '2023-04-11 21:09:28', '2023-04-13 14:00:00', '2023-04-15 12:00:00', 0, 3700000, 8, 2, 6),
(373, 'vuquynhh', 33633782, 'Hà Nội', '2023-04-11 21:09:41', '2023-04-17 14:00:00', '2023-04-19 12:00:00', 0, 3700000, 8, 2, 6),
(377, 'vuquynhh', 33633782, 'Hà Nội', '2023-04-11 21:22:59', '2023-04-20 14:00:00', '2023-04-21 12:00:00', 0, 1700000, 8, 2, 6),
(378, 'vuquynhh', 33633782, 'Hà Nội', '2023-04-11 21:24:12', '2023-04-23 14:00:00', '2023-04-25 12:00:00', 0, 3700000, 8, 2, 6),
(379, 'vuquynhh', 33633782, 'Hà Nội', '2023-04-11 21:28:18', '2023-04-13 14:00:00', '2023-04-16 12:00:00', 0, 3300000, 8, 2, 13),
(380, 'vuquynhh', 33633782, 'Hà Nội', '2023-04-11 21:29:32', '2023-04-16 14:00:00', '2023-04-19 12:00:00', 0, 3300000, 8, 2, 13),
(381, 'vuquynhh', 33633782, 'Hà Nội', '2023-04-11 21:32:12', '2023-04-21 14:00:00', '2023-04-23 12:00:00', 3, 2100000, 8, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `hotro`
--

CREATE TABLE `hotro` (
  `ma_ht` int(10) NOT NULL,
  `ten_ht` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_tk` int(10) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotro`
--

INSERT INTO `hotro` (`ma_ht`, `ten_ht`, `ma_tk`, `noi_dung`, `email`, `phone`) VALUES
(1, 'Hoang Thuong', 6, 'Tui muon giup do~', 'hoangtrung1@gmail.com', 3434343);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `ma_km` int(10) NOT NULL,
  `ten_km` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale-tv` int(10) NOT NULL,
  `ngay_batdau` date DEFAULT NULL,
  `ngay_ketthuc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`ma_km`, `ten_km`, `sale-tv`, `ngay_batdau`, `ngay_ketthuc`) VALUES
(1, 'Giảm 100.000vnđ/1 lần đặt cho thành viên!', 100000, NULL, NULL),
(2, 'Khách hàng thường xuyên!', 300000, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong`
--

CREATE TABLE `loaiphong` (
  `ma_lp` int(10) NOT NULL,
  `ten_lp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaiphong`
--

INSERT INTO `loaiphong` (`ma_lp`, `ten_lp`) VALUES
(1, 'Phòng Đơn '),
(4, 'Phòng đôi'),
(5, 'Phòng cao cấp'),
(7, 'Gia đình');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `ma_phong` int(10) NOT NULL,
  `ten_phong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `giam_gia` double NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_lp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`ma_phong`, `ten_phong`, `avatar`, `gia`, `giam_gia`, `mo_ta`, `ma_lp`) VALUES
(5, 'Phòng Đơn 1', '../img/6423d87443afaks10.jpg', 1500000, 0, '', 1),
(6, 'Phòng Đơn 2', '../img/6423d87dad8fdks5.jpg', 2000000, 0, '', 1),
(8, 'Phòng Đôi 1', '../img/6423d89ca9247ks9.jpg', 3500000, 0, '', 1),
(11, 'Phòng Cao Cấp 1', '../img/6423d8a4c0051ks8.jpg', 5000000, 0, '', 1),
(12, 'Phòng Cao Cấp 2', '../img/6423d8acd8f88ks2.jpg', 4500000, 0, '', 1),
(13, 'P201', '../img/6424594c751cd641c1e6647a11ks1.jpg', 1200000, 0, 'Sang trọng', 7),
(14, 'P202', '../img/64245967aa2f8641c1ea9a2331ks3.jpg', 600000, 0, 'Phòng đôi mát mẻ', 4),
(15, 'P303', '../img/642459814e7ff641c1ebe88751ks4.jpeg', 450000, 0, '', 1),
(16, 'P301', '../img/642459a545895641c1ed883928ks5.jpg', 700000, 0, 'Premium room for customer', 5),
(17, 'P303', '../img/642459cec3042641c1eec379f8ks6.jpg', 900000, 0, 'Đầy đủ tiện nghi, TV', 4),
(18, 'P304', '../img/642459e42e2b3641c1f1f90941ks8.jpg', 340000, 0, '', 7),
(19, 'P401', '../img/64245a036c120641c1f3b96046ks9.jpg', 550000, 0, '', 1),
(20, 'Căn hộ gia đình', '../img/642a6fe2f3b07ks5.jpg', 560000, 0, '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ma_tk` int(10) NOT NULL,
  `ten_tk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vai_tro` tinyint(4) NOT NULL DEFAULT 0,
  `ma_km` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`ma_tk`, `ten_tk`, `ho_ten`, `email`, `pass`, `phone`, `dia_chi`, `avatar`, `vai_tro`, `ma_km`) VALUES
(8, 'vuquynhh', 'Hoàng Viết Trung', 'vuquynh1213@gmail.com', 'anhtrung', 33633782, 'Hà Nội', './img/642cdf49d68a3TrungMelodyyy.jpg', 0, 2),
(9, 'hoangtrung', 'Hoang Viet Trung', 'hoangtrung99@gmail.com', 'anhtrung', 33644892, 'NĐ', './img/642687e0c3e70c7a78ebfe89333cd6a82.jpg', 0, 1),
(10, 'anhtrung1', 'Trung admin1', 'anhtrung100@gmail.com', 'anhtrung', 336338911, 'VN', '../img/64268e818a75fc7a78ebfe89333cd6a82.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `ma_tin` int(10) NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dang` date NOT NULL,
  `ma_tk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`ma_tin`, `tieu_de`, `hinh_anh`, `mo_ta`, `noi_dung`, `ngay_dang`, `ma_tk`) VALUES
(3, 'Lễ đón chính thức Chủ tịch nước Võ Văn Thưởng thăm CHDCND Lào', '', 'Ngay sau lễ đón chính thức, Chủ tịch nước Võ Văn Thưởng cùng Tổng Bí thư, Chủ tịch nước Lào Thongloun Sisoulith dẫn đầu đoàn đại biểu cấp cao hai nước tiến hành hội đàm.', 'Theo đặc phái viên TTXVN, vào khoảng 9h50 phút sáng 10/4 theo giờ địa phương, lễ đón chính thức Chủ tịch nước Võ Văn Thưởng cùng đoàn đại biểu cấp cao Việt Nam thăm chính thức Cộng hòa Dân chủ Nhân dân Lào đã diễn ra trọng thể tại Phủ Chủ tịch nước Lào, t', '2023-04-10', 10),
(4, 'Cách \"tổ chức\" chuyến bay giải cứu của cựu Đại sứ Việt Nam tại Malaysia', '', '(Dân trí) - Kết luận điều tra của Bộ Công an nêu, các bị can tại ĐSQ Việt Nam tại Malaysia đã kết nối chủ ghe, chủ tàu, chủ lao động, người nhà của người mãn hạn tù để yêu cầu nộp chi phí đưa người về nước.', 'Trong kết luận điều tra vụ \"chuyến bay giải cứu\", Cơ quan An ninh điều tra Bộ Công an đề nghị truy tố 4 cán bộ tại Đại sứ quán Việt Nam tại Malaysia, một trong số đó là ông Trần Việt Thái, nguyên Đại sứ.', '2023-04-10', 10),
(5, 'Doanh nghiệp có phải thưởng cho người lao động dịp 30/4 và 1/5?', '', '(Dân trí) - Bên cạnh số ngày nghỉ có thể kéo dài 5 ngày, người lao động còn quan tâm có được thưởng dịp 30/4 và 1/5 hay không?', 'Theo quy định của Bộ luật Lao động năm 2019, thưởng là số tiền hoặc tài sản hoặc bằng các hình thức khác mà người sử dụng lao động thưởng cho người lao động căn cứ vào kết quả sản xuất, kinh doanh, mức độ hoàn thành công việc của người đó.', '2023-04-10', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `lk_taikhoan_binhluan` (`ma_tk`),
  ADD KEY `lk_phong_binhluan` (`ma_phong`);

--
-- Indexes for table `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`ma_dp`),
  ADD KEY `lk_taikhoan_datphong` (`ma_tk`),
  ADD KEY `lk_khuyenmai_datphong` (`ma_km`),
  ADD KEY `lk_datphong_phong` (`ma_phong`);

--
-- Indexes for table `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`ma_ht`),
  ADD KEY `lk_taikhoan_hotro` (`ma_tk`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`ma_km`);

--
-- Indexes for table `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`ma_lp`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`ma_phong`),
  ADD KEY `lk_phong_loaiphong` (`ma_lp`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ma_tk`),
  ADD KEY `lk_khuyemmai_taikhoan` (`ma_km`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`ma_tin`),
  ADD KEY `lk_tintuc_taikhoan` (`ma_tk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ma_bl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `datphong`
--
ALTER TABLE `datphong`
  MODIFY `ma_dp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT for table `hotro`
--
ALTER TABLE `hotro`
  MODIFY `ma_ht` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `ma_km` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `ma_lp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `ma_phong` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ma_tk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `ma_tin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_phong_binhluan` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`),
  ADD CONSTRAINT `lk_taikhoan_binhluan` FOREIGN KEY (`ma_tk`) REFERENCES `taikhoan` (`ma_tk`);

--
-- Constraints for table `datphong`
--
ALTER TABLE `datphong`
  ADD CONSTRAINT `lk_datphong_phong` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`),
  ADD CONSTRAINT `lk_khuyenmai_datphong` FOREIGN KEY (`ma_km`) REFERENCES `khuyenmai` (`ma_km`),
  ADD CONSTRAINT `lk_taikhoan_datphong` FOREIGN KEY (`ma_tk`) REFERENCES `taikhoan` (`ma_tk`);

--
-- Constraints for table `hotro`
--
ALTER TABLE `hotro`
  ADD CONSTRAINT `lk_taikhoan_hotro` FOREIGN KEY (`ma_tk`) REFERENCES `taikhoan` (`ma_tk`);

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `lk_phong_loaiphong` FOREIGN KEY (`ma_lp`) REFERENCES `loaiphong` (`ma_lp`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `lk_khuyemmai_taikhoan` FOREIGN KEY (`ma_km`) REFERENCES `khuyenmai` (`ma_km`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `lk_tintuc_taikhoan` FOREIGN KEY (`ma_tk`) REFERENCES `taikhoan` (`ma_tk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
