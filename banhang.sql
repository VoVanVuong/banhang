-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2020 lúc 02:35 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `idsach` int(10) NOT NULL,
  `tennguoidung` varchar(40) NOT NULL,
  `noidung` varchar(100) NOT NULL,
  `traloibinhluan` varchar(1000) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `idsach`, `tennguoidung`, `noidung`, `traloibinhluan`, `iduser`) VALUES
(5, 1, '', 'khong tot', '', 0),
(6, 1, '', 'tam tam', '', 0),
(7, 1, '', 'tot tot', '', 0),
(20, 59, '', 'tot', '', 0),
(21, 59, '', 'khong tot', '', 0),
(25, 66, '', 'khong te', '', 0),
(26, 58, '', 'Tốt', '', 0),
(27, 60, '', 'ggg', '', 0),
(28, 60, '', 'ggg', '', 0),
(105, 57, 'qqq', 'vuong tot', 'vuong tot', 0),
(107, 57, 'admin', 'khong tot lam', '', 0),
(110, 57, 'qqq', 'tot tot tot tot', '', 0),
(111, 57, 'qqq', 'tạm tạm', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`) VALUES
(1, 'PHP Can Ban', 'Kendy', 115),
(2, 'PHP Nang Cao', 'Kendy', 150),
(3, 'PHP Framework', 'Kendy', 300),
(4, 'Jooml cab Ban', 'Kendy', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(6, 'HP'),
(11, 'Dell'),
(12, 'Asus'),
(13, 'Macbook'),
(14, 'Microsoft');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(10) NOT NULL,
  `tensach` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `tensach`, `gia`, `soluong`) VALUES
(1, 'sgk', 3, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guianh`
--

CREATE TABLE `guianh` (
  `id` int(10) NOT NULL,
  `image` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(10) NOT NULL,
  `tenmathang` varchar(100) NOT NULL,
  `iddanhmuc` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `gioithieu` varchar(10000) NOT NULL,
  `hinhanh` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`id`, `tenmathang`, `iddanhmuc`, `soluong`, `dongia`, `gioithieu`, `hinhanh`) VALUES
(57, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 12, 56, 84, '', 'asus570.jpg'),
(58, 'Laptop Dell XPS 9360 I7 7600U/ RAM 8GB/ SSD 256GB', 11, 10, 19, '', 'dell1.jpg'),
(60, 'HP 15-DA1030TX', 6, 5, 5, 'Laptop HP 15-da1030TX 5NM13PA là sự kết hợp hoàn hảo giữa thiết kế và hiệu năng. Với vẻ ngoài mỏng nhẹ, bộ vi xử lý thế hệ 8, bộ nhớ Ram 8GB, HDD 1TB cùng với card đồ họa rời Laptop HP 15-da1030TX 5NM13PA là sự lựa chọn đúng đắn dành cho bạn.', 'hp1.jpg'),
(61, 'DELL PRECISION 5530', 11, 10, 35, 'CPUIntel Core i7-8850H, Six Core 2.60GHz, 4.30GHz Turbo, 9MB 45W RAM16GB DDR4-2666MHz Ổ cứng512 GB M2 PCIe VGANvidia Quadro P1000 w/4GB GDDDR5 Màn hình15.6 UltraSharp FHD IGZO4, 1920x1080, AG, NT, w/Prem Panel Guar 72% Color Gamut Kết nốiQualcomm QCA61x4A 802.11ac Dual Band 2x2 Wireless Adapter + Bluetooth 5.0 HĐHwindows 10 pro for workstations Pin/Adapter6Cell 97Wh/Adapter 130w', 'dell3.jpeg'),
(62, 'Laptop Dell V5468 I7-7500U/ RAM 8GB/ HDD 1TB', 11, 55, 12, 'Màn hình Laptop Dell Vostro 5468 sở hữu màn hình kích thước nhỏ gọn 14”. Kết hợp với độ phân giải HD (1366x768).BÀN PHÍM, TOUCHPAD, LOA Bàn phím của Dell Vostro 5468 vẫn giữ nguyên thiết kế truyền thống của Dell. Các phím cách nhau một khoảng hợp lí không quá rộng tạo cảm giác gõ phím nhanh và êm. Máy không hỗ trợ khu vực phím số để phù hợp cho một sản phẩm 14”, nhưng bù lại nó hỗ trợ đèn bàn phím giúp người dùng làm việc tốt hơn dưới môi trường không có ánh sáng hoặc ánh sáng yếu. Tuy nhiên bàn phím được thiết kế đúc sẵn vào bề mặt của máy nên nếu bạn muốn thay bàn phím sẽ phải tháo toàn bộ máy khá là vất vả.', 'dells11.jpg'),
(63, 'macbook', 13, 30, 50, 'MVVJ2 – MacBook Pro 16 inch 2019 New – (Space Gray/i7/16GB/512GB) Tình trạng: Mới, Nguyên Seal, Active Online Màu: Xám (Space Gray) CPU: 2.6GHz 6-core i7-9750H (12MB cache, Turbo 4.5GHz) RAM: 16GB 2666MHz DDR4 memory Storage: 512GB On-board SSD Màn hình: 16-inch Retina with True Tone (2880×1800) VGA: AMD Radeon Pro 5300M with 4GB GDDR6 memory Interface: Four Thunderbolt 3 ports (USB-Type C) Touch Bar & Touch ID Trọng lượng: 2.0Kg', 'macbook1.jpg'),
(65, 'Dell - Inspiron 17.3', 11, 40, 47, 'Processor Model: If you change your selection, the current page will be refreshed.  Intel 10th Generation Core i7  Why is the processor important? System Memory (RAM): If you change your selection, the current page will be refreshed.  16GB  How much RAM do I need? Screen Size: If you change your selection, the current page will be refreshed.  17.3\"  What’s the right screen size for me? Screen Resolution: If you change your selection, the current page will be refreshed.  1920 x 1080 (Full HD)  Compare screen resolutions Graphics: If you change your selection, the current page will be refreshed.  NVIDIA GeForce MX250', 'dell4.jpg'),
(66, 'Surface Pro 4 ( i5/8GB/256GB )', 14, 30, 15, '- CPU	 Intel Core i5 6300U - Card đồ họa	 Intel HD graphics 520 - Bộ nhớ trong	 256 GB SSD - RAM	 8 GB - Kích thước màn hình	12.3 ich - Độ phân giải	2736 x 1824 pixels - Trọng lượng	 0.78 kg', 'Surface1.jpg'),
(67, 'Surface Laptop 3 13.5', 14, 50, 23, 'Tích hợp cổng USB-C, cho phép cắm nhiều loại phụ kiện, dock, và sạc bằng các cục sạc USB-C thay vì cổng sạc độc quyền của Microsoft Sử dụng vi xử lý AMD, cụ thể là chip “Ryzen Surface Edition”- vi xử lý nhanh nhất từng có trên bất kỳ laptop nào cùng mức giá hiện nay”. Có một chip đồ họa tích hợp bổ sung trên con chip Ryzen tiêu chuẩn. Bàn phím vải Alcantara vốn là truyền thống trên Surface Laptop nay không còn là một tiêu chuẩn nữa. Bàn phím vải này đã bị loại bỏ, thay vào đó là bàn phím bằng nhôm khắc bằng máy khá đơn giản.', 'Surface2.jpg'),
(68, 'Surface Laptop 3 (13,5-inch) | Core i7 ', 14, 60, 68, '- CPU	 Intel® Core™ i7-1065G7 - Card đồ họa	 Intel® Iris™ Plus Graphics - Bộ nhớ trong	 1 TB SSD - RAM	 16 GB - Kích thước màn hình	13.5-inch - Độ phân giải	 2256 x 1504 pixels (201 PPI) - Trọng lượng	 1.26 kg', 'Surface3.jpg'),
(69, 'Microsoft 15\" Multi-Touch Surface Laptop 3 (Platinum)', 14, 50, 38, 'Các tính năng chính AMD Ryzen 5 3580U 16GB DDR4 | SSD 256GB Màn hình cảm ứng PixelSense 15 \"2496 x 1664 Đồ họa AMD Radeon Vega 9 Cho xem nhiều hơn Máy tính xách tay Microsoft 15 \"Multi-Touch Surface 3 màu bạch kim có thiết kế di động, nhẹ với bộ xử lý AMD Ryzen độc quyền, Bluetooth 5.0, bàn di chuột lớn và cổng USB Type-C.', 'sss.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `musanpham`
--

CREATE TABLE `musanpham` (
  `id` int(10) NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `nhapemail` varchar(40) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `gia` int(100) NOT NULL,
  `xacnhan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `musanpham`
--

INSERT INTO `musanpham` (`id`, `sodienthoai`, `nhapemail`, `diachi`, `soluong`, `dongia`, `tensanpham`, `gia`, `xacnhan`) VALUES
(81, 394958482, 'vuong@gmail.com', 'Quang Ngai', 0, 0, 'HP 15-DA1030TX', 5, ''),
(82, 394958482, 'vuong@gmail.com', 'da nang', 0, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(83, 394958482, 'vuong@gmail.com', 'Quang Ngai', 0, 0, 'Surface Laptop 3 13.5', 23, ''),
(86, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(87, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(88, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(89, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(90, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(91, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(92, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(93, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(94, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 8, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(116, 394958482, 'mmmm@gmail.com', 'Binh son,quang ngai', 4, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, ''),
(163, 394958482, '', 'Binh son,quang ngai', 6, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, 'Xác Nhận'),
(164, 394958482, '', 'Binh son,quang ngai', 5, 0, ' Asus X550LB I7-4500U/ RAM 4GB/ HDD 500GB/ GT 740M/ 15.6 INCH', 84, 'Chưa xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `star`
--

CREATE TABLE `star` (
  `id` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uploadanh`
--

CREATE TABLE `uploadanh` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `uploadanh`
--

INSERT INTO `uploadanh` (`id`, `name`) VALUES
(72, '2020-09-24.png'),
(73, '2020-10-12 (1).png'),
(74, '2020-10-12 (4).png'),
(75, '2020-10-12 (5).png'),
(76, '2020-10-12 (6).png'),
(77, '2020-10-12 (7).png'),
(78, '2020-10-12 (8).png'),
(79, '2020-10-12.png'),
(80, '2020-10-17 (1).png'),
(81, '2020-10-19 (1).png'),
(82, '2020-10-19 (2).png'),
(83, '2020-10-19 (3).png'),
(84, '2020-10-19 (4).png'),
(85, '2020-10-19 (5).png'),
(86, '2020-10-19 (6).png'),
(87, '2020-10-19 (6).png'),
(88, '2020-10-19 (6).png'),
(89, ''),
(90, '2020-08-24 (10).png'),
(91, ''),
(92, ''),
(93, '2020-10-12 (7).png'),
(94, ''),
(95, '2020-10-19 (4).png'),
(96, '2020-10-19 (4).png'),
(97, ''),
(98, '2020-10-19 (4).png'),
(99, '2020-10-19 (4).png'),
(100, '2020-10-19 (2).png'),
(101, '2020-10-19 (2).png'),
(102, '2020-10-19 (2).png'),
(103, ''),
(104, '2020-10-19 (2).png'),
(105, ''),
(106, ''),
(107, '2020-10-19 (1).png'),
(108, '2020-09-03.png'),
(109, '2020-09-03.png'),
(110, '2020-10-19 (5).png'),
(111, '2020-10-19 (6).png'),
(112, '2020-09-05 (4).png'),
(113, ''),
(114, '2020-09-05.png'),
(115, '2020-09-05.png'),
(116, '2020-09-05 (5).png'),
(117, ''),
(118, ''),
(119, '2020-09-24.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `tendangnhap` varchar(100) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `tendangnhap`, `username`, `password`, `role`) VALUES
(1, '', 'hhghghghgg', '4693fbb215b8ca15a6900f0cfa164cdc', 'khach'),
(2, '', 'viduplieuen', '1b54f8c7ba24c51e49910e7b7c67da91', 'khach'),
(3, '', 'vvv', '47b6ed0b6b6824c8dc892e2e48b462f9', 'khach'),
(4, '', 'hhghg', '82819567b9ad4e8c5212f49f67743616', 'khach'),
(5, '', 'vo van vuon', 'd41d8cd98f00b204e9800998ecf8427e', 'khach'),
(6, '', 'vuogn', '289dff07669d7a23de0ef88d2f7129e7', 'khach'),
(7, '', 'vuong123', '202cb962ac59075b964b07152d234b70', 'khach'),
(8, '', 'vuogn11', '698d51a19d8a121ce581499d7b701668', 'khach'),
(9, '', 'qqq', 'b2ca678b4c936f905fb82f2733f5297f', 'khach'),
(10, '', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(11, '', 'vuong@gmail', 'd41d8cd98f00b204e9800998ecf8427e', 'khach'),
(12, '', 'VVVuong@gma', '827ccb0eea8a706c4c34a16891f84e7b', 'khach'),
(13, '', 'vuong', '4a21c331d71ed79af44193d19667b924', 'khach');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `guianh`
--
ALTER TABLE `guianh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `musanpham`
--
ALTER TABLE `musanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `uploadanh`
--
ALTER TABLE `uploadanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `guianh`
--
ALTER TABLE `guianh`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `musanpham`
--
ALTER TABLE `musanpham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT cho bảng `star`
--
ALTER TABLE `star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `uploadanh`
--
ALTER TABLE `uploadanh`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
