-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 06:15 AM
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
-- Database: `web2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `IDCTDH` int(11) NOT NULL,
  `maDonHang` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) NOT NULL,
  `sdtKH` int(11) NOT NULL,
  `ghiChuCuaKhachhang` varchar(255) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `soLuongSP` int(11) NOT NULL,
  `sizeSanPham` int(11) NOT NULL,
  `giaSanPham` int(11) NOT NULL,
  `mieuTaSP` varchar(255) NOT NULL,
  `hinhAnhSP` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`IDCTDH`, `maDonHang`, `tenNguoiNhan`, `sdtKH`, `ghiChuCuaKhachhang`, `maSanPham`, `tenSanPham`, `soLuongSP`, `sizeSanPham`, `giaSanPham`, `mieuTaSP`, `hinhAnhSP`, `diachi`) VALUES
(1, 1, 'Nhân', 359107774, 'ko co j', 5, 'Dép nam MWC - 7600 Dép Kẹp Nam Đế Đúc Nguyên Khối ', 1, 42, 175000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao,kiểu dáng basic, phối sọc thể thao thời trang.\r\n\r\nDép có độ dày quai vừa phải, chất liệu da PU cao cấp giúp đôi dép chắc chắn hơ', '1684033843.jpg', '402 an duong vuong phuong 3 quan 5'),
(104, 2, 'Nhân', 359107774, '', 1, 'Dép nam MWC - 7766 Dép Kẹp Nam', 2, 38, 150000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao quai dập vân nổi cách điệu.', '1684034795.jpg', 'trên trời '),
(105, 3, 'duy', 336883213, 'ddddd', 0, 'Dép nam MWC NADE- 7797 Dép Nam Quai Ngang Phối Chữ Phản Quang', 2, 41, 175000, 'Dép được thiết kế với quai ngang là cao su dẻo ,in chữ phản quang thời trang và năng động.', '1684035255.jpg', 'hcm'),
(106, 3, 'duy', 336883213, 'ddddd', 0, 'Dép nam MWC NADE- 7797 Dép Nam Quai Ngang Phối Chữ Phản Quang', 1, 41, 175000, 'Dép được thiết kế với quai ngang là cao su dẻo ,in chữ phản quang thời trang và năng động.', '1684035255.jpg', 'hcm'),
(107, 3, 'duy', 336883213, 'ddddd', 2, 'Dép nam MWC - 7567 Dép Kẹp Nam Đế Đúc Nguyên Khối', 1, 40, 179000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao kiểu dáng basic..\r\n\r\nDép sử dụng chất liệu cao cấp tạo cảm giác thoải mái cho bạn trong suốt quá trình vận động.', '1684033248.jpg', 'hcm'),
(108, 4, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(109, 5, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(113, 5, 'vo', 336883213, 'adadadas', 155, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095849.jpg', 'hcm'),
(114, 5, 'vo', 336883213, 'adadadas', 200, 'Inov8 F-Fly Training Shoes - AW24', 1, 41, 2100000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727097629.jpg', 'hcm'),
(115, 5, 'duy', 336883213, 'abc', 197, 'adidas Dropset 3 Training Shoes - AW24', 2, 41, 2000000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727097528.jpg', 'hcm'),
(116, 5, 'duy', 336883213, 'abc', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727097528.jpg', 'hcm'),
(117, 6, 'duy', 336883213, 'abc', 198, 'Inov8 F-Lite 260 V2 Training Shoes - SS24', 1, 41, 1900000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727097559.jpg', 'hcm'),
(118, 7, 'duy', 336883213, 'abc', 156, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW22', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095897.jpg', 'hcm'),
(119, 7, 'duy', 336883213, 'abc', 171, 'Nike Air Zoom Maxfly 2 Running Spikes - FA24', 1, 42, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727096397.jpg', 'hcm'),
(120, 8, 'duyvo', 336883213, 'giao tận cửa', 155, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095849.jpg', 'hồ chí minh'),
(121, 9, 'duy', 336883213, '', 155, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095849.jpg', 'hồ chí minh'),
(122, 10, 'duy', 336883213, '', 155, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095849.jpg', 'hồ chí minh'),
(123, 11, 'duyvo', 336883213, 'abc', 157, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW222', 1, 38, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095920.jpg', 'hồ chí minh'),
(124, 12, 'clone', 336883213, '', 155, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095849.jpg', 'hồ chí minh'),
(125, 13, 'duy', 336883213, '', 157, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW222', 1, 38, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095920.jpg', 'hồ chí minh'),
(126, 14, 'duy', 336883213, '', 158, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW241', 1, 39, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095938.jpg', 'hồ chí minh'),
(127, 15, 'duy', 336883213, '', 159, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW212', 1, 40, 1400000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095962.jpg', 'hồ chí minh'),
(128, 16, 'duy', 336883213, '', 158, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW241', 1, 39, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095938.jpg', 'hồ chí minh'),
(129, 17, 'duy', 336883213, '', 162, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW276', 1, 39, 1450000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727096034.jpg', 'hồ chí minh'),
(130, 18, 'duy', 336883213, '', 156, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW22', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095897.jpg', 'hồ chí minh'),
(131, 19, 'clone', 84, '', 157, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW222', 1, 38, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095920.jpg', 'hồ chí minh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitiethoadon`
--

CREATE TABLE `tbl_chitiethoadon` (
  `idHD` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) NOT NULL,
  `sdtKH` int(11) NOT NULL,
  `ghiChu` varchar(255) NOT NULL,
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `soLuongSP` int(11) NOT NULL,
  `sizeSP` int(11) NOT NULL,
  `giaSP` int(11) NOT NULL,
  `mieuTaSP` varchar(255) NOT NULL,
  `hinhAnhSP` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_chitiethoadon`
--

INSERT INTO `tbl_chitiethoadon` (`idHD`, `maHoaDon`, `tenNguoiNhan`, `sdtKH`, `ghiChu`, `maSP`, `tenSP`, `soLuongSP`, `sizeSP`, `giaSP`, `mieuTaSP`, `hinhAnhSP`, `diachi`) VALUES
(1, 1, 'Nhân', 359107774, 'ko co j', 5, 'Dép nam MWC - 7600 Dép Kẹp Nam Đế Đúc Nguyên Khối ', 1, 42, 175000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao,kiểu dáng basic, phối sọc thể thao thời trang.\r\n\r\nDép có độ dày quai vừa phải, chất liệu da PU cao cấp giúp đôi dép chắc chắn hơ', '1684033843.jpg', '402 an duong vuong phuong 3 quan 5'),
(77, 1, 'Nhân', 359107774, '', 1, 'Dép nam MWC - 7766 Dép Kẹp Nam', 2, 38, 150000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao quai dập vân nổi cách điệu.', '1684034795.jpg', 'trên trời '),
(78, 2, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(79, 3, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(80, 4, 'duy', 336883213, 'ddddd', 0, 'Dép nam MWC NADE- 7797 Dép Nam Quai Ngang Phối Chữ Phản Quang', 2, 41, 175000, 'Dép được thiết kế với quai ngang là cao su dẻo ,in chữ phản quang thời trang và năng động.', '1684035255.jpg', 'hcm'),
(81, 4, 'duy', 336883213, 'ddddd', 0, 'Dép nam MWC NADE- 7797 Dép Nam Quai Ngang Phối Chữ Phản Quang', 1, 41, 175000, 'Dép được thiết kế với quai ngang là cao su dẻo ,in chữ phản quang thời trang và năng động.', '1684035255.jpg', 'hcm'),
(82, 4, 'duy', 336883213, 'ddddd', 2, 'Dép nam MWC - 7567 Dép Kẹp Nam Đế Đúc Nguyên Khối', 1, 40, 179000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao kiểu dáng basic..\r\n\r\nDép sử dụng chất liệu cao cấp tạo cảm giác thoải mái cho bạn trong suốt quá trình vận động.', '1684033248.jpg', 'hcm'),
(83, 5, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(84, 6, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(85, 7, 'duy', 336883213, 'ddddd', 0, 'Dép nam MWC NADE- 7797 Dép Nam Quai Ngang Phối Chữ Phản Quang', 2, 41, 175000, 'Dép được thiết kế với quai ngang là cao su dẻo ,in chữ phản quang thời trang và năng động.', '1684035255.jpg', 'hcm'),
(86, 7, 'duy', 336883213, 'ddddd', 0, 'Dép nam MWC NADE- 7797 Dép Nam Quai Ngang Phối Chữ Phản Quang', 1, 41, 175000, 'Dép được thiết kế với quai ngang là cao su dẻo ,in chữ phản quang thời trang và năng động.', '1684035255.jpg', 'hcm'),
(87, 7, 'duy', 336883213, 'ddddd', 2, 'Dép nam MWC - 7567 Dép Kẹp Nam Đế Đúc Nguyên Khối', 1, 40, 179000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao kiểu dáng basic..\r\n\r\nDép sử dụng chất liệu cao cấp tạo cảm giác thoải mái cho bạn trong suốt quá trình vận động.', '1684033248.jpg', 'hcm'),
(88, 12, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(89, 13, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(90, 14, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(91, 15, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(92, 16, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(93, 17, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(94, 18, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(95, 19, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(96, 20, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(97, 21, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(98, 22, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(99, 23, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(100, 24, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(101, 25, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(102, 26, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(103, 27, 'clone', 336883213, 'ádads', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'Whether lifting, pushing or pulling, these shoes provide stable support for strength training. Experience the fusion of comfort and technology with the Dropset 3 training shoes, with a wide fit and made from textiles for brea', '1727097528.jpg', 'hcm'),
(104, 27, 'vo', 336883213, 'adadadas', 155, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095849.jpg', 'hcm'),
(105, 27, 'vo', 336883213, 'adadadas', 200, 'Inov8 F-Fly Training Shoes - AW24', 1, 41, 2100000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727097629.jpg', 'hcm'),
(106, 27, 'duy', 336883213, 'abc', 197, 'adidas Dropset 3 Training Shoes - AW24', 2, 41, 2000000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727097528.jpg', 'hcm'),
(107, 27, 'duy', 336883213, 'abc', 197, 'adidas Dropset 3 Training Shoes - AW24', 1, 41, 2000000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727097528.jpg', 'hcm'),
(108, 28, 'duy', 336883213, 'abc', 198, 'Inov8 F-Lite 260 V2 Training Shoes - SS24', 1, 41, 1900000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727097559.jpg', 'hcm'),
(109, 29, 'duy', 336883213, 'abc', 156, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW22', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095897.jpg', 'hcm'),
(110, 29, 'duy', 336883213, 'abc', 171, 'Nike Air Zoom Maxfly 2 Running Spikes - FA24', 1, 42, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727096397.jpg', 'hcm'),
(111, 30, 'duyvo', 336883213, 'giao tận cửa', 155, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095849.jpg', 'hồ chí minh'),
(112, 31, 'duy', 336883213, '', 155, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', 1, 37, 1500000, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1727095849.jpg', 'hồ chí minh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `maDonHang` int(10) NOT NULL,
  `maKhachHang` int(10) DEFAULT NULL,
  `ngayLapDH` date NOT NULL,
  `tongTienDH` int(10) NOT NULL,
  `trangThaiDH` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`maDonHang`, `maKhachHang`, `ngayLapDH`, `tongTienDH`, `trangThaiDH`) VALUES
(1, 26, '2023-05-17', 175000, 'Đã hoàn thành'),
(2, 26, '2023-05-17', 300000, 'Đã hoàn thành'),
(3, 26, '2024-09-23', 704000, 'Đã hoàn thành'),
(4, 26, '2024-09-23', 6500000, 'Đã hoàn thành'),
(5, 26, '2024-09-23', 6000000, 'Đã hoàn thành'),
(6, 26, '2024-09-23', 1900000, 'Đã hoàn thành'),
(7, 26, '2024-09-24', 3000000, 'Đã hoàn thành'),
(8, 28, '2024-10-04', 1500000, 'Đã hoàn thành'),
(9, 28, '2024-10-04', 1500000, 'Đã hoàn thành'),
(10, 30, '2024-11-09', 1500000, 'Chưa giao'),
(11, 30, '2024-11-12', 1500000, 'Chưa giao'),
(12, 26, '2024-11-24', 1500000, 'Chưa giao'),
(13, 26, '2024-11-24', 1500000, 'Chưa giao'),
(14, 26, '2024-11-24', 1500000, 'Chưa giao'),
(15, 26, '2024-11-24', 1400000, 'Chưa giao'),
(16, 30, '2024-11-25', 1500000, 'Chưa giao'),
(17, 26, '2024-11-28', 1450000, 'Chưa giao'),
(18, 26, '2024-11-28', 1500000, 'Chưa giao'),
(19, 26, '2024-12-03', 1500000, 'Chưa giao');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(10) NOT NULL,
  `maSanPham` int(20) NOT NULL,
  `soLuongSanPham` int(20) NOT NULL,
  `sessionID` varchar(225) NOT NULL,
  `maLoai` int(10) NOT NULL,
  `tenSanPham` varchar(225) NOT NULL,
  `sizeSanPham` int(10) NOT NULL,
  `mieuTaSanPham` varchar(225) NOT NULL,
  `giaSanPham` int(10) NOT NULL,
  `hinhAnhSanPham` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_giohang`, `maSanPham`, `soLuongSanPham`, `sessionID`, `maLoai`, `tenSanPham`, `sizeSanPham`, `mieuTaSanPham`, `giaSanPham`, `hinhAnhSanPham`) VALUES
(421, 156, 1, 'e6ngph2t5atd5mfinobfa794vj', 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW22', 37, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', 1500000, '1727095897.jpg'),
(454, 157, 1, '5jkfrvu5aa0csbd7o31t0gtj6s', 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW222', 38, 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', 1500000, '1727095920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `ngayDat` date NOT NULL,
  `giaTriHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`maHoaDon`, `maKhachHang`, `ngayDat`, `giaTriHD`) VALUES
(1, 26, '2024-09-23', 300000),
(2, 26, '2024-09-23', 6500000),
(3, 26, '2024-09-23', 6500000),
(4, 26, '2024-09-23', 704000),
(5, 26, '2024-09-23', 6500000),
(6, 26, '2024-09-23', 6500000),
(7, 26, '2024-09-23', 704000),
(8, 26, '2024-09-23', 1500000),
(9, 26, '2024-09-23', 1500000),
(10, 26, '2024-09-23', 1500000),
(11, 26, '2024-09-23', 1500000),
(12, 26, '2024-09-23', 3600000),
(13, 26, '2024-09-23', 3600000),
(14, 26, '2024-09-23', 3600000),
(15, 26, '2024-09-23', 3600000),
(16, 26, '2024-09-23', 3600000),
(17, 26, '2024-09-23', 3600000),
(18, 26, '2024-09-23', 3600000),
(19, 26, '2024-09-23', 3600000),
(20, 26, '2024-09-23', 3600000),
(21, 26, '2024-09-23', 3600000),
(22, 26, '2024-09-23', 3600000),
(23, 26, '2024-09-23', 3600000),
(24, 26, '2024-09-23', 3600000),
(25, 26, '2024-09-23', 3600000),
(26, 26, '2024-09-23', 6000000),
(27, 26, '2024-09-23', 6000000),
(28, 26, '2024-09-23', 1900000),
(29, 26, '2024-09-24', 3000000),
(30, 28, '2024-11-14', 1500000),
(31, 28, '2024-11-25', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `maKhachHang` int(11) NOT NULL,
  `tenDangNhap` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `hoTenKhachHang` varchar(255) NOT NULL,
  `thuDienTuKH` varchar(255) NOT NULL,
  `trangThai` varchar(255) NOT NULL DEFAULT 'Active',
  `ngaySinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`maKhachHang`, `tenDangNhap`, `matKhau`, `hoTenKhachHang`, `thuDienTuKH`, `trangThai`, `ngaySinh`) VALUES
(20, 'ducnam1234', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Đức Huy', 'leducnam22250820203@gmail.com', 'Active', '2023-05-12'),
(21, 'ducnam2', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Đức Nam', 'leducnam25028@gmail.com', 'Active', '2023-05-04'),
(22, 'vuong12', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Thanh Vương1', 'vuong@gmail.com', 'Active', '2023-05-11'),
(23, 'phu123', 'e10adc3949ba59abbe56e057f20f883e', 'Thiên Phú', 'phu@gmail.com', 'Active', '2023-05-04'),
(24, 'huy123', 'e10adc3949ba59abbe56e057f20f883e', 'Đức Huy', 'huy@gmail.com', 'Active', '2023-05-04'),
(25, 'ducnam3', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Đức Nam', 'leducnam22508@gmail.com', 'Active', '2003-08-25'),
(26, 'nhancktv123', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Trọng Nhân', 'letrongnhan@gmail.com', 'Active', '2003-02-27'),
(28, 'duy123', 'e10adc3949ba59abbe56e057f20f883e', 'user1234', 'accclone123@gmail.com', 'Active', '2002-02-22'),
(29, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'duyvo123', 'duyyduy123@gmail.com', 'Inactive', '2003-11-20'),
(30, 'duy1234', 'e10adc3949ba59abbe56e057f20f883e', 'vo quoc duy', 'duy@gmail.com', 'Active', '2003-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`maLoai`, `tenLoai`) VALUES
(1, 'ROAD RUNNING'),
(2, 'TRACK AND FIELD'),
(3, 'SANDALS'),
(21, 'GYM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quantri`
--

CREATE TABLE `tbl_quantri` (
  `tenDangNhap` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `tenNguoiQuanTri` varchar(255) NOT NULL,
  `thuDienTuQT` varchar(255) NOT NULL,
  `trangThai` varchar(255) NOT NULL DEFAULT 'Active',
  `maVaiTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_quantri`
--

INSERT INTO `tbl_quantri` (`tenDangNhap`, `matKhau`, `tenNguoiQuanTri`, `thuDienTuQT`, `trangThai`, `maVaiTro`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'Active', 1),
('duy123', 'e10adc3949ba59abbe56e057f20f883e', 'duy', 'duy@gmail.com', 'Active', 1),
('existingUser', '482c811da5d5b4bc6d497ffa98491e38', 'Admin User', 'admin@example.com', 'Active', 1),
('newUser', '482c811da5d5b4bc6d497ffa98491e38', 'Admin User', 'admin@example.com', 'Active', 1),
('nhancktv123', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Trọng Nhân', 'letrongnhan@gmail.com', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `maSanPham` int(11) NOT NULL,
  `maLoai` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `sizeSanPham` varchar(255) NOT NULL,
  `soLuongSanPham` varchar(255) NOT NULL,
  `mieuTaSanPham` mediumtext NOT NULL,
  `giaSanPham` varchar(255) NOT NULL,
  `trangThaiSanPham` varchar(255) NOT NULL DEFAULT '1',
  `hinhAnhSanPham` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`maSanPham`, `maLoai`, `tenSanPham`, `sizeSanPham`, `soLuongSanPham`, `mieuTaSanPham`, `giaSanPham`, `trangThaiSanPham`, `hinhAnhSanPham`) VALUES
(155, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW23', '37', '0', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727095849.jpg'),
(156, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW22', '37', '3', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727095897.jpg'),
(157, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW222', '38', '2', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727095920.jpg'),
(158, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW241', '39', '3', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727095938.jpg'),
(159, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW212', '40', '4', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1400000', '1', '1727095962.jpg'),
(160, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW235', '39', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like you\'re landing on clouds.The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1400000', '1', '1727095984.jpg'),
(161, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW288', '38', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1400000', '1', '1727096002.jpg'),
(162, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW276', '39', '4', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1450000', '1', '1727096034.jpg'),
(163, 1, 'Asics Gel-Nimbus 26 Paris Running Shoes - AW276', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1450000', '1', '1727096053.jpg'),
(164, 1, 'Nike ZoomX Vaporfly Next% 3 Running Shoes - FA24', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2000000', '1', '1727096127.jpg'),
(165, 1, 'Nike ZoomX Vaporfly Next% 3 Running Shoes - FA242', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2000000', '1', '1727096150.jpg'),
(166, 1, 'Hoka Mach X 2 Running Shoes - AW24', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727096211.jpg'),
(167, 1, 'Hoka Mach X 2 Running Shoes - AW241', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727096230.jpg'),
(168, 1, 'Hoka Mach X 2 Running Shoes - AW243', '39', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727096283.jpg'),
(169, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA24', '40', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727096353.jpg'),
(170, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA242', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727096374.jpg'),
(171, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA24', '42', '4', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727096397.jpg'),
(172, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA231', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727096423.jpg'),
(173, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA232', '40', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2000000', '1', '1727096449.jpg'),
(174, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA253', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2000000', '1', '1727096468.jpg'),
(175, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA24', '42', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2100000', '1', '1727096496.jpg'),
(176, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA24', '40', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2100000', '1', '1727096520.jpg'),
(177, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA24', '41', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727096553.jpg'),
(178, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA22', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2100000', '1', '1727096575.jpg'),
(179, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA2441', '41', '1', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2100000', '1', '1727096592.jpg'),
(180, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA231', '39', '1', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727096613.jpg'),
(181, 2, 'Nike Air Zoom Maxfly 2 Running Spikes - FA211', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727096649.jpg'),
(182, 2, 'didas Adizero Distancestar Running Spikes - AW24', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1200000', '1', '1727096696.jpg'),
(183, 2, 'adidas Adizero Distancestar Running Spikes - AW24', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727096716.jpg'),
(184, 2, 'adidas Adizero Distancestar Running Spikes - AW24', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727096736.jpg'),
(185, 3, 'Teva ReFlip Sandals - SS24', '39', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1000000', '1', '1727097041.jpg'),
(186, 3, 'Hi-Tec Cove Sport Sandals - SS24', '40', '1', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '570000', '1', '1727097077.jpg'),
(187, 3, 'Hoka Ora Recovery Slide 3 - AW24', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '720000', '1', '1727097108.jpg'),
(188, 3, 'Hoka Ora Recovery Flip Flop - SS24', '41', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '650000', '1', '1727097147.jpg'),
(189, 3, 'Hoka Ora Recovery Flip Flop - SS24', '41', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '650000', '1', '1727097181.jpg'),
(190, 3, 'Hoka Hopara 2 Walking Sandals - AW24', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1200000', '1', '1727097217.jpg'),
(191, 3, 'Lizard Ibrido II Walking Sandals', '42', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '470000', '1', '1727097267.jpg'),
(192, 3, 'Scarpa Tegu Flip Flop', '41', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '500000', '1', '1727097300.jpg'),
(193, 3, 'Skechers Tresmen - Garo Walking Sandals - SS24', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '720000', '1', '1727097353.jpg'),
(194, 3, 'kechers Tresmen - Garo Walking Sandals - SS2422', '40', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '600000', '1', '1727097381.jpg'),
(195, 3, 'Teva ReFlip Sandals - SS24', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '400000', '1', '1727097411.jpg'),
(196, 3, 'Teva Hurricane XLT2 Walking Sandals - SS24', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '750000', '1', '1727097464.jpg'),
(197, 21, 'adidas Dropset 3 Training Shoes - AW24', '41', '0', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2000000', '1', '1727097528.jpg'),
(198, 21, 'Inov8 F-Lite 260 V2 Training Shoes - SS24', '41', '4', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1900000', '1', '1727097559.jpg'),
(199, 21, 'Inov8 F-Fly Training Shoes - AW24', '41', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2100000', '1', '1727097599.jpg'),
(200, 21, 'Inov8 F-Fly Training Shoes - AW24', '41', '4', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2100000', '1', '1727097629.jpg'),
(201, 21, 'New Balance FuelCell Shift v2 Training Shoes - SS24', '41', '10', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1200000', '1', '1727097937.jpg'),
(202, 21, 'Nike Air Zoom TR1 Training Shoes - SP24', '39', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1100000', '1', '1727097980.jpg'),
(203, 21, 'Nike Air Zoom TR1 Training Shoes - SP24', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1300000', '1', '1727098034.jpg'),
(204, 21, 'Nike Air Zoom TR1 Training Shoes - SP24123', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727098065.jpg'),
(205, 21, 'Nike Air Zoom TR1 Training Shoes - SP24123', '41', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '1500000', '1', '1727098084.jpg'),
(206, 21, 'Nike Air Zoom TR1 Training Shoes - SP24', '40', '5', 'The Gel-Nimbus 26 PARIS soft cushioning properties help you feel like youre landing on clouds. ', '2000000', '1', '1727098209.jpg'),
(207, 24, 'dep1', '37', '10', 'đasada', '1', '1', '1732524081.png'),
(208, 25, 'dep1', '40', '10', 'sdzsdas', '100000', '1', '1732524123.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thongtingiaohang1`
--

CREATE TABLE `tbl_thongtingiaohang1` (
  `IDTTGH` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) NOT NULL,
  `soDienThoai` int(11) NOT NULL,
  `ghiChuKH` varchar(255) NOT NULL,
  `sessionID` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_thongtingiaohang1`
--

INSERT INTO `tbl_thongtingiaohang1` (`IDTTGH`, `maKhachHang`, `tenNguoiNhan`, `soDienThoai`, `ghiChuKH`, `sessionID`, `diachi`) VALUES
(85, 26, 'Nhân', 359107774, 'ko co j', 'ebra8g4nk2imoaquhn86u37e3q', '402 an duong vuong phuong 3 quan 5'),
(88, 26, 'Nhân', 359107774, '', 'ebra8g4nk2imoaquhn86u37e3q', '402 an duong vuong phuong 3 quan 5'),
(89, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(90, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(91, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(92, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(93, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(94, 26, '', 0, '1', 'ebra8g4nk2imoaquhn86u37e3q', '1'),
(95, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(96, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(97, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(98, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(99, 26, 'Nhân', 359107774, '', 'ebra8g4nk2imoaquhn86u37e3q', 'trên trời '),
(100, 26, 'duy', 336883213, 'ddddd', 'a8clg5pgvisfo7h5q5vm5311ef', 'hcm'),
(101, 26, 'clone', 336883213, 'ádads', 'a8clg5pgvisfo7h5q5vm5311ef', 'hcm'),
(102, 26, 'vo', 336883213, 'ádasdads', 'a8clg5pgvisfo7h5q5vm5311ef', 'hcm'),
(103, 26, 'vo', 336883213, 'adadadas', 'a8clg5pgvisfo7h5q5vm5311ef', 'hcm'),
(104, 26, 'duy', 336883213, 'abc', 'a8clg5pgvisfo7h5q5vm5311ef', 'hcm'),
(105, 26, 'duy', 336883213, 'abc', 'a8clg5pgvisfo7h5q5vm5311ef', 'hcm'),
(106, 26, 'duy', 336883213, 'abc', 'n6hjbi6g0f1gt6tfqhcm266qmp', 'hcm'),
(107, 28, 'duyvo', 336883213, 'giao tận cửa', 'e6ngph2t5atd5mfinobfa794vj', 'hồ chí minh'),
(108, 28, 'duy', 336883213, '', 'e6ngph2t5atd5mfinobfa794vj', 'hồ chí minh'),
(109, 28, 'duy', 336883213, '', 'e6ngph2t5atd5mfinobfa794vj', 'hồ chí minh'),
(110, 30, 'duy', 336883213, '', '31u3kd0lgidldpanl60gcr9n5e', 'hồ chí minh'),
(111, 30, 'duyvo', 336883213, 'abc', 'j6bhb4t2elt2k0tanf4a89u9pf', 'hồ chí minh'),
(112, 26, 'clone', 336883213, '', 'rt2i16ltilloi54q5ucestoofj', 'hồ chí minh'),
(113, 26, 'duy', 336883213, '', 'rt2i16ltilloi54q5ucestoofj', 'hồ chí minh'),
(114, 26, 'duy', 336883213, '', 'rt2i16ltilloi54q5ucestoofj', 'hồ chí minh'),
(115, 26, 'duy', 336883213, '', 'rt2i16ltilloi54q5ucestoofj', 'hồ chí minh'),
(116, 30, 'duy', 336883213, '', '4lbfm048k4idjsfo9m0s236atc', 'hồ chí minh'),
(117, 26, 'duy', 336883213, '', '5jkfrvu5aa0csbd7o31t0gtj6s', 'hồ chí minh'),
(118, 26, 'duy', 336883213, '', '5jkfrvu5aa0csbd7o31t0gtj6s', 'hồ chí minh'),
(119, 26, 'duy', 336883213, '', '5jkfrvu5aa0csbd7o31t0gtj6s', 'hồ chí minh'),
(120, 26, 'duy', 111, '', '5jkfrvu5aa0csbd7o31t0gtj6s', 'hồ chí minh'),
(121, 26, 'clone', 84, '', 'e1plu2l41n80rr4egvvk6eoekl', 'hồ chí minh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaitro`
--

CREATE TABLE `tbl_vaitro` (
  `maVaiTro` int(11) NOT NULL,
  `tenVaiTro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vaitro`
--

INSERT INTO `tbl_vaitro` (`maVaiTro`, `tenVaiTro`) VALUES
(1, 'admin'),
(2, 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`IDCTDH`);

--
-- Indexes for table `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD PRIMARY KEY (`idHD`),
  ADD KEY `maHoaDon` (`maHoaDon`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `maKhachHang` (`maKhachHang`);

--
-- Indexes for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `maSanPham` (`maSanPham`);

--
-- Indexes for table `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `maKhachHang` (`maKhachHang`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`maKhachHang`);

--
-- Indexes for table `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`maLoai`);

--
-- Indexes for table `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD PRIMARY KEY (`tenDangNhap`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `maSanPham` (`maSanPham`),
  ADD KEY `maSanPham_2` (`maSanPham`),
  ADD KEY `maSanPham_3` (`maSanPham`);

--
-- Indexes for table `tbl_thongtingiaohang1`
--
ALTER TABLE `tbl_thongtingiaohang1`
  ADD PRIMARY KEY (`IDTTGH`);

--
-- Indexes for table `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  ADD PRIMARY KEY (`maVaiTro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `IDCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  MODIFY `idHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `maDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;

--
-- AUTO_INCREMENT for table `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `maKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `tbl_thongtingiaohang1`
--
ALTER TABLE `tbl_thongtingiaohang1`
  MODIFY `IDTTGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  MODIFY `maVaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `tbl_donhang_ibfk_1` FOREIGN KEY (`maKhachHang`) REFERENCES `tbl_khachhang` (`maKhachHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
