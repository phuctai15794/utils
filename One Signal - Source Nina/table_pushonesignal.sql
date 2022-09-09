-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 25, 2018 lúc 08:54 AM
-- Phiên bản máy phục vụ: 5.5.31
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sofaquocdu_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_pushonesignal`
--

CREATE TABLE `table_pushonesignal` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(5) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  `date` varchar(11) NOT NULL,
  `times` int(11) NOT NULL,
  `time_star` int(11) NOT NULL,
  `gio` int(11) NOT NULL,
  `phut` int(11) NOT NULL,
  `solancon` int(11) NOT NULL,
  `timegannhat` int(11) NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_pushonesignal`
--

INSERT INTO `table_pushonesignal` (`id`, `number`, `name`, `link`, `photo`, `thumb`, `description`, `status`, `date`, `times`, `time_star`, `gio`, `phut`, `solancon`, `timegannhat`, `test`) VALUES
(2, 100, 'Sofa Quốc Dương', '', '318273933181884.png', '318273933181884_200x200.png', '105 đường liên khu 1-6, P.Bình Trị Đông, Q.Bình Tân,  TPHCM', 1, '1537808401', 15, 0, 10, 55, 0, 1533700500, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_pushonesignal`
--
ALTER TABLE `table_pushonesignal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `table_pushonesignal`
--
ALTER TABLE `table_pushonesignal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
