-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 03, 2020 lúc 11:41 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dkd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblgiangvien`
--

CREATE TABLE `tblgiangvien` (
  `id` int(10) NOT NULL,
  `user` varchar(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `pass` varchar(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tblgiangvien`
--

INSERT INTO `tblgiangvien` (`id`, `user`, `pass`, `ten`, `mail`) VALUES
(1, '1', '1', 'test', 'test'),
(2, '2 ', '2 ', 't', 't'),
(3, 'admin', '12345', '2', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbllophocphan`
--

CREATE TABLE `tbllophocphan` (
  `id` int(10) NOT NULL,
  `maLHP` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `nhomLHP` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `thu` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tietBD` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `soTiet` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phong` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tuan` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `idMonHoc` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbllophocphan`
--

INSERT INTO `tbllophocphan` (`id`, `maLHP`, `nhomLHP`, `thu`, `tietBD`, `soTiet`, `phong`, `tuan`, `idMonHoc`) VALUES
(1, 'D16-044', '01', 'Bảy', '1', '2', '1131751', '--345-7890', 1),
(2, 'D16-045', '02', 'Bảy', '3', '2', '1131751', '--345-7890', 1),
(3, 'D16-048', '01', 'Hai', '7', '2', '1131446', '-234567890123456', 2),
(4, 'D16-049', '03', 'Hai', '9', '2', '1131446', '-234567890123456', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblmonhoc`
--

CREATE TABLE `tblmonhoc` (
  `id` int(10) NOT NULL,
  `tenMonHoc` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `maMH` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `soTinChi` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tblmonhoc`
--

INSERT INTO `tblmonhoc` (`id`, `tenMonHoc`, `maMH`, `soTinChi`) VALUES
(1, 'Chuyên đề công nghệ phần mềm', 'INT1408', 1),
(2, 'Đảm bảo chất lượng phần mềm', 'INT1416', 3),
(3, 'Kiến trúc và thiết kế phần mềm', 'INT1427', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblviecdangkyday`
--

CREATE TABLE `tblviecdangkyday` (
  `id` int(10) NOT NULL,
  `idLopHocPhan` int(10) DEFAULT NULL,
  `idGiangVien` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tblviecdangkyday`
--

INSERT INTO `tblviecdangkyday` (`id`, `idLopHocPhan`, `idGiangVien`) VALUES
(1, 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblgiangvien`
--
ALTER TABLE `tblgiangvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbllophocphan`
--
ALTER TABLE `tbllophocphan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMonHoc` (`idMonHoc`);

--
-- Chỉ mục cho bảng `tblmonhoc`
--
ALTER TABLE `tblmonhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblviecdangkyday`
--
ALTER TABLE `tblviecdangkyday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLopHocPhan` (`idLopHocPhan`),
  ADD KEY `idGiangVien` (`idGiangVien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblgiangvien`
--
ALTER TABLE `tblgiangvien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbllophocphan`
--
ALTER TABLE `tbllophocphan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tblmonhoc`
--
ALTER TABLE `tblmonhoc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tblviecdangkyday`
--
ALTER TABLE `tblviecdangkyday`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbllophocphan`
--
ALTER TABLE `tbllophocphan`
  ADD CONSTRAINT `tbllophocphan_ibfk_1` FOREIGN KEY (`idMonHoc`) REFERENCES `tblmonhoc` (`id`);

--
-- Các ràng buộc cho bảng `tblviecdangkyday`
--
ALTER TABLE `tblviecdangkyday`
  ADD CONSTRAINT `tblviecdangkyday_ibfk_2` FOREIGN KEY (`idLopHocPhan`) REFERENCES `tbllophocphan` (`id`),
  ADD CONSTRAINT `tblviecdangkyday_ibfk_3` FOREIGN KEY (`idGiangVien`) REFERENCES `tblgiangvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
