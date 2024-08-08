-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 08, 2024 at 11:38 AM
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
-- Database: `dice_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `created_at`) VALUES
(1, 'Lê Văn Hiệu', 'admin', '$2y$10$/wz2n74.iDH30RzWXpu6ouEgv6WlpxMTeMTfhYOb7zj4IUjtX8.6m', '2024-08-01 10:25:18'),
(3, 'Hieue lel', 'admin2', 'admin2', '2024-08-03 10:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `className` varchar(255) DEFAULT NULL,
  `question_group` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `startday` date DEFAULT NULL,
  `endday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `className`, `question_group`, `created_at`, `startday`, `endday`) VALUES
(1, 'WD19320', 1, '2024-08-06', '2024-08-08', '2024-08-10'),
(2, 'WD19321', 2, '2024-08-01', '2024-08-08', '2024-08-10'),
(5, 'WD19323', 1, '2024-08-08', '2024-08-08', '2024-08-09'),
(6, 'WD19324', 1, '2024-08-08', '2024-08-08', '2024-08-09');

--
-- Triggers `classes`
--
DELIMITER $$
CREATE TRIGGER `update_classes_question_groups_after_classes` AFTER UPDATE ON `classes` FOR EACH ROW BEGIN
                UPDATE classes_question_groups
                SET classes_question_groups.question_groups_id = NEW.question_group
                WHERE classes_question_groups.classes_question_group = NEW.id;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `classes_question_groups`
--

CREATE TABLE `classes_question_groups` (
  `classes_question_group` int(11) NOT NULL,
  `question_groups_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes_question_groups`
--

INSERT INTO `classes_question_groups` (`classes_question_group`, `question_groups_id`) VALUES
(1, 1),
(2, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `limit` int(11) DEFAULT NULL,
  `Totalscore` int(2) NOT NULL,
  `rate1` int(11) DEFAULT NULL,
  `rate2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `limit`, `Totalscore`, `rate1`, `rate2`) VALUES
(1, 4, 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `question_groups` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `number`, `question`, `answer`, `question_groups`, `created_at`) VALUES
(2, 1, 'Trình bày khái niệm DNS, DNS Server và cho ví dụ về nguyên tắc làm việc của DNS Server', 'DNS là viết tắt của Domain Name System - một hệ thống phân giải tên miền thành địa chỉ IP và ngược lạiDNS Server làm nhiệm vụ chuyển đổi giữa 2 loại địa chỉ : domain name và địa chỉ IP1. Khi bạn gõ trong browser: www.fpt.vn, máy của bạn sẽ chạy đi hỏi DNS Server: Địa chỉ IP của www.fpt.vn là gì? 					2. Dns Server sẽ trả về địa chỉ IP tương ứng.					3. Trình duyệt sẽ chạy đến máy có địa chỉ IP vừa biết để lấy trang web	', 1, '2024-08-08 05:51:52'),
(3, 2, 'Hãy mở gói Hosting của bạn, sau đó thực hiện thao tác upload dữ liệu lên hosting bằng 1 FTP software mà bạn biết?', 'My name is hieu', 1, '2024-08-04 10:50:46'),
(4, 3, 'Qua số liệu thống kê và phân tích cho thấy, website mà bạn quản trị có lượng traffic tương đối ổn định, bỗng dưng hôm qua lượng traffic này tăng đột biến gấp 1000 lần thông thường. Hãy lý giải các nguyên nhân gây nên số liệu này?', '', 1, '2024-08-04 06:50:47'),
(5, 4, 'Hãy mở gói Hosting của bạn đang dùng, hãy cho biết dung lượng dữ liệu bạn đã lưu trữ trên gói Hosting đó?', '', 1, '2024-08-04 06:50:47'),
(6, 5, 'Hãy cho biết Bandwidth (băng thông) là gì? Mở gói Hosting bạn đang dùng, cho biết băng thông tối đa mà bạn được sử dụng?', '', 1, '2024-08-04 06:50:47'),
(7, 6, 'Khi khách hàng truy cập vào website của bạn và nhận được thông báo lỗi 503, hãy cho biết nguyên nhân và cách khắc phục?', '', 1, '2024-08-04 06:50:47'),
(8, 7, 'Hãy mở gói Hosting của bạn, cho biết số FPT account có thể sử dụng trên đó? FPT account dùng để làm gì?', '', 1, '2024-08-04 06:50:47'),
(9, 8, 'Khi khách hàng truy cập vào website của bạn và nhận được thông báo lỗi 500, hãy cho biết nguyên nhân và cách khắc phục?', '', 1, '2024-08-04 06:50:47'),
(10, 9, 'Khi khách hàng truy cập vào website của bạn và nhận được thông báo lỗi 404, hãy cho biết nguyên nhân và cách khắc phục?', '', 1, '2024-08-04 06:50:47'),
(11, 10, 'Trên website có nhiều bình luận tục tĩu, sai sự thật, bôi nhọ danh dự của website và đơn vị sở hữu? Là người quản trị website, bạn sẽ làm gì?', '', 1, '2024-08-04 06:50:47'),
(12, 11, 'Phân biệt Add-on Domain và Parked-Domain?', '', 1, '2024-08-04 06:50:47'),
(13, 12, 'Khi muốn 1 website có thể truy cập bằng 2 hoặc nhiều tên miền khác nhau làm thế nào?', '', 1, '2024-08-04 06:50:47'),
(14, 13, 'So sánh VPS – Hosting với Web shared?', '', 1, '2024-08-04 06:50:47'),
(15, 14, 'Làm một quản trị website, bạn có cần phải biết đến các kỹ thuật SEO không? Những kỹ thuật SEO bài viết cơ bản?', '', 1, '2024-08-04 06:50:47'),
(16, 15, 'Vào 1 ngày đẹp trời, sếp khiển trách bạn vì “SẾP THẤY CÓ NGƯỜI PHẢN ÁNH, WEBSITE CỦA CÔNG TY TRUY CẬP CHẬM QUÁ!?” là người quản trị website, bạn giải thích thế nào?', '', 1, '2024-08-04 06:50:47'),
(17, 16, 'Trình bày các bước để Backup các file trong Website?', '', 1, '2024-08-04 06:50:47'),
(18, 17, 'Dấu hiệu nào cho biết website của bạn đang bị tấn công DDoS?', '', 1, '2024-08-04 06:50:47'),
(19, 18, 'Khi khách hàng truy cập vào website của bạn thì tự động redirect vào 1 trang khác? Hãy cho biết nguyên nhân và cách khắc phục?', '', 1, '2024-08-04 06:50:47'),
(20, 19, 'Sau 1 bữa nhậu say sỉn trong bữa tiệc liên hoan tại công ty, khi tỉnh dậy bạn bỗng quên mật khẩu Admin của website mà mình quản trị, có cách nào để lấy lại mật khẩu Admin?', '', 1, '2024-08-04 06:50:47'),
(21, 20, 'Hosting là gì? Kể tên ít nhất 5 nhà cung cấp dịch vụ Hosting?', '', 1, '2024-08-04 06:50:47'),
(22, 21, 'Mở tài khoản Google Analytic đang theo dõi website của bạn, hãy cho biết những người truy cập website của bạn đến từ thành phố nào?', '', 1, '2024-08-04 06:50:47'),
(23, 22, 'Mở tài khoản Google Analytic đang theo dõi website của bạn, hãy cho biết những người truy cập website của bạn đang sử dụng trình duyệt gì để vào website?', '', 1, '2024-08-04 06:50:47'),
(24, 23, 'Trình bày các bước để đăng ký 1 tên miền (Domain) cho website?', '', 1, '2024-08-04 06:50:47'),
(25, 24, 'Khi chưa hết tháng đã hết băng thông, thì người dùng nhận được thông báo có mã bao nhiêu?', '', 1, '2024-08-04 06:50:47'),
(26, 25, 'Mở Hosting của bạn, Thực hiện Backup Database dữ liệu website của bạn hiện tại?', '', 1, '2024-08-04 06:50:47'),
(27, 26, 'Trong Google Analytic có số phiên (Session) và số người truy cập (Users). Nêu sự khác nhau của 2 thông số này?', '', 1, '2024-08-04 06:50:47'),
(28, 27, 'Hãy mở dịch vụ Hosting mà bạn đang dùng, cho biết số lượng băng thông mà bạn đã dùng trong tháng này?', '', 1, '2024-08-04 06:50:47'),
(29, 28, 'Trình bày các bước để trỏ tên miền vào Hosting bằng cách tạo bản ghi?', '', 1, '2024-08-04 06:50:47'),
(30, 29, 'Trình bày các bước để trỏ tên miền vào Hosting bằng tên Name Server?', '', 1, '2024-08-04 06:50:47'),
(31, 30, 'Sự khác nhau của bản ghi A Record và AAAA record?', '', 1, '2024-08-04 06:50:47'),
(32, 31, 'Đặc điểm nhận diện 1 địa chỉ Ipv4 và Ipv6?', '', 1, '2024-08-04 06:50:47'),
(33, 32, 'Sự khác nhau của VPS Hosting và Dedicated Server?', '', 1, '2024-08-04 06:50:47'),
(34, 33, 'Trình bày các bước để đăng ký 1 tên miền?', '', 1, '2024-08-04 06:50:47'),
(35, 34, 'Kể tên các thông số cần quan tâm khi đăng ký 1 gói hosting?', '', 1, '2024-08-04 06:50:47'),
(36, 35, 'Tại sao cần upload/download dữ liệu lên Hosting bằng tài khoàn FPT account thay vì upload/download trực tiếp từ hosting?', '', 1, '2024-08-04 06:50:47'),
(37, 36, 'Khi đăng 1 bài viết lên website, những tiêu chuẩn nào giúp bài viết của mình đạt chuẩn SEO?', '', 1, '2024-08-04 06:50:47'),
(38, 37, 'Tại sao cần theo dõi lưu lượng người truy cập website của mình thường xuyên?', '', 1, '2024-08-04 06:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `question_groups`
--

CREATE TABLE `question_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_groups`
--

INSERT INTO `question_groups` (`id`, `name`) VALUES
(1, 'ListQuestions2024'),
(2, 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `student_code` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `result_1` int(11) DEFAULT NULL,
  `result_2` int(11) DEFAULT NULL,
  `result_3` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `current_turn` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `username`, `student_code`, `password`, `class`, `result_1`, `result_2`, `result_3`, `score`, `created_at`, `current_turn`) VALUES
(10, 'Hoàng Ngọc Lĩnh', 'hoangngoclinh', 'PH53070', '$2y$10$SsubfST.GK5UPmCw2IndG.vg1bxceN9UWQ7tBQYbNtgpdwrKwunAi', 'WD19321', 12, 1, 9, 8, NULL, 4),
(25, 'Vũ Văn Mạnh', 'vuvanmanh', 'PH53085', 'mno567', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(26, 'Nguyễn Văn Tuấn', 'nguyenvantuan', 'PH53086', 'pqr890', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(27, 'Lê Văn Đức', 'levanduc', 'PH53087', 'stu123', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(28, 'Phạm Thị Hồng', 'phamthihong', 'PH53088', 'vwx456', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(29, 'Trần Văn Long', 'tranvanlong', 'PH53089', 'yz7890', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(30, 'Nguyễn Thị Tuyết', 'nguyenthituyet', 'PH53090', 'abc678', 'WD19320', NULL, NULL, NULL, 8, '2024-08-01 15:39:27', 0),
(31, 'Lê Văn Minh', 'levanminh', 'PH53091', 'def901', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(32, 'Phạm Quang Vinh', 'phamquangvinh', 'PH53092', 'ghi234', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(33, 'Nguyễn Văn Hoàng', 'nguyenvanhoang', 'PH53093', 'jkl567', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(34, 'Lê Văn Tùng', 'levantung', 'PH53094', 'mno890', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(35, 'Phạm Thị Lan', 'phamthilan', 'PH53095', 'pqr123', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(36, 'Nguyễn Thị Thanh', 'nguyenthithanh', 'PH53096', 'stu456', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(37, 'Lê Hoàng Anh', 'lehoanganh', 'PH53097', 'vwx789', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(38, 'Phạm Minh Khang', 'phamminhkhang', 'PH53098', 'yz0123', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(40, 'Vũ Văn Huy', 'vuvanhuy', 'PH53100', 'def789', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(42, 'Trần Văn An', 'tranvanan', 'PH53102', 'jkl345', 'WD19320', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(43, 'Nguyễn Văn Bình', 'nguyenvanbinh', 'PH53103', '$2y$10$BBDpo4QVfUwIrsmeoTUFW.ESKyxLo2yzTkMv6ret1VP4.gvWdrv1i', 'WD19323', 0, 0, 0, 2, NULL, 0),
(44, 'Trần Thị Hương', 'tranthihuong', 'PH53104', 'def789', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(45, 'Lê Văn Quang', 'levanquang', 'PH53105', 'ghi012', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(46, 'Phạm Thị Hoa', 'phamthihoa', 'PH53106', 'jkl345', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(47, 'Đỗ Văn Hùng', 'dovanhung', 'PH53107', 'mno678', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(48, 'Vũ Thị Lan', 'vuthilan', 'PH53108', 'pqr901', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(49, 'Nguyễn Thị Tâm', 'nguyenthitam', 'PH53109', 'stu234', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(50, 'Trần Văn Thắng', 'tranvanthang', 'PH53110', 'vwx567', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(51, 'Lê Thị Bích', 'lethibich', 'PH53111', 'yz0123', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(52, 'Nguyễn Thị Phương', 'nguyenthiphuong', 'PH53112', '$2y$10$1gNHsLd53SiRuFo8inmAJODDMXbEAeiJiwvXvyH1WFd8a3eH13flu', 'WD19323', 0, 0, 0, 0, NULL, 0),
(53, 'Phạm Văn Kiên', 'phamvankien', 'PH53113', 'def456', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(54, 'Trần Minh Sơn', 'tranminhson', 'PH53114', 'ghi789', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(55, 'Nguyễn Thị Lệ', 'nguyenthile', 'PH53115', 'jkl012', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(56, 'Lê Minh Phương', 'leminhphuong', 'PH53116', 'mno345', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(57, 'Phạm Thị Hằng', 'phamthihang', 'PH53117', 'pqr678', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(58, 'Trần Văn Khôi', 'tranvankhoi', 'PH53118', 'stu901', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(59, 'Nguyễn Minh Hải', 'nguyenminhhai', 'PH53119', 'vwx234', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(60, 'Lê Thị Ánh', 'lethianh', 'PH53120', 'yz5678', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(61, 'Phạm Văn An', 'phamvanan', 'PH53121', 'abc345', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(62, 'Trần Thị Vân', 'tranthivan', 'PH53122', 'def678', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(63, 'Vũ Thị Hiền', 'vuthihien', 'PH53123', 'ghi901', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(64, 'Nguyễn Văn Dũng', 'nguyenvandung', 'PH53124', 'jkl234', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(65, 'Phạm Thị Liên', 'phamthilien', 'PH53125', 'mno567', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(66, 'Trần Văn Minh', 'tranvanminh', 'PH53126', 'pqr890', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(67, 'Lê Văn Hùng', 'levanhung', 'PH53127', 'stu123', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(68, 'Nguyễn Thị Hạnh', 'nguyenthihanh', 'PH53128', 'vwx456', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(69, 'Phạm Văn Quân', 'phamvanquan', 'PH53129', 'yz7890', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(70, 'Trần Thị Hoa', 'tranthihoa', 'PH53130', 'abc678', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(71, 'Nguyễn Minh Tuấn', 'nguyenminhtuan', 'PH53131', 'def901', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(72, 'Lê Thị Mai', 'lethimai', 'PH53132', 'ghi234', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(73, 'Phạm Quang Hưng', 'phamquanghung', 'PH53133', 'jkl567', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(74, 'Trần Văn Sơn', 'tranvanson', 'PH53134', 'mno890', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(75, 'Nguyễn Văn Lâm', 'nguyenvanlam', 'PH53135', 'pqr123', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(76, 'Lê Minh Quân', 'leminhquan', 'PH53136', 'stu456', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(77, 'Phạm Văn Khoa', 'phamvankhoa', 'PH53137', 'vwx789', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(78, 'Trần Thị Ngọc', 'tranthingoc', 'PH53138', 'yz0123', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(79, 'Nguyễn Văn Hải', 'nguyenvanhai', 'PH53139', 'abc456', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(80, 'Lê Văn Phúc', 'levanphuc', 'PH53140', 'def789', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(81, 'Phạm Minh Phú', 'phamminhphu', 'PH53141', 'ghi012', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(82, 'Trần Thị Yến', 'tranthiyen', 'PH53142', 'jkl345', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 15:39:27', 0),
(83, 'Lê Văn Trừ', 'levanhieu897', 'PH53143', '123123', 'WD19321', NULL, NULL, NULL, NULL, '2024-08-01 17:24:03', 0),
(84, 'Lê Văn Hiệu', 'levanhieu', 'PH53067', '$2y$10$xnfWH21sz6JFzpgUpDFsQ.zOFy.BwvDiLDPaq38qXx3Vu4Q88zmDS', 'WD19320', 17, 16, 5, 0, NULL, 4),
(85, 'admin', 'admin2', 'PH00000', '$2y$10$.mvf7Q3Ijza2o53YRHSs2.tOAmF121yCgO3cdnr5a3N3u4434wiQe', 'WD19320', 2, 36, 19, 0, NULL, 0),
(86, 'Vũ Thị Hưởng', 'test1', 'PH0002', '$2y$10$WrWfRjDrgZsFhHUcOXETz.Ft3iiwiI9EpUaAkrS/wATwhaaN7DIo6', 'WD19320', NULL, NULL, NULL, NULL, NULL, 0),
(87, 'Đào Ngọc Hào', 'daongochao', 'PH00009', '$2y$10$tgeNGGmo/SVK24VL3f6c5.bcYxbBNJ2X4e8PsZIBi26V.YoE8Ps0u', 'WD19320', 0, 0, 0, 0, NULL, 0),
(88, 'Lê Văn Duẩn', 'levanduan', 'PH00006', '$2y$10$j52URLogLyvKgMcw/Fq98u8TsfE6NuYqYkAFegHUfkTM34lHX1hy2', 'WD19320', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `student_class` int(11) NOT NULL,
  `classes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`student_class`, `classes_id`) VALUES
(10, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(40, 1),
(42, 1),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes_question_groups`
--
ALTER TABLE `classes_question_groups`
  ADD PRIMARY KEY (`classes_question_group`,`question_groups_id`),
  ADD KEY `question_groups_id` (`question_groups_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_groups` (`question_groups`);

--
-- Indexes for table `question_groups`
--
ALTER TABLE `question_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_code` (`student_code`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`student_class`,`classes_id`),
  ADD KEY `classes_id` (`classes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `question_groups`
--
ALTER TABLE `question_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes_question_groups`
--
ALTER TABLE `classes_question_groups`
  ADD CONSTRAINT `classes_question_groups_ibfk_1` FOREIGN KEY (`classes_question_group`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `classes_question_groups_ibfk_2` FOREIGN KEY (`question_groups_id`) REFERENCES `question_groups` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`question_groups`) REFERENCES `question_groups` (`id`);

--
-- Constraints for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD CONSTRAINT `student_classes_ibfk_1` FOREIGN KEY (`student_class`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `student_classes_ibfk_2` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
