-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 09, 2024 at 03:43 AM
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
(6, 'WD19324', 1, '2024-08-08', '2024-08-08', '2024-08-09'),
(7, 'WD19325', 1, '2024-08-08', '2024-08-08', '2024-08-10'),
(8, 'WD19326', 1, '2024-08-08', '2024-08-08', '2024-08-10'),
(9, 'SA19304', 1, '2024-08-09', '2024-08-09', '2024-08-10');

--
-- Triggers `classes`
--
DELIMITER $$
CREATE TRIGGER `insert_classes_question_groups_after_classes` AFTER INSERT ON `classes` FOR EACH ROW BEGIN
                    INSERT INTO classes_question_groups (classes_question_group, question_groups_id)
                    VALUES (NEW.id, NEW.question_group);
                END
$$
DELIMITER ;
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
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1);

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
(2, 6, 'Trình bày vệ hệ thống DNS? (chức năng, cách hoạt động)? ', '- Hệ thống DNS (Domain Name System): Hệ thống phân giải tên miền thành địa chỉ IP và ngược lại. Bởi vì địa chỉ IP khó nhớ hơn tên miền, tên miền dễ nhớ và dễ dùng hơn. - Cách hoạt động của DNS:  + Tất cả các nhà cung cấp hosting thì đều có các DNS Server. Các máy chủ DNs Server thì chứa dữ liệu bao gồm: tên miền - địa chỉ IP tương ứng. Khi 1 tên miền được trỏ vào 1 hosting thì DNS Server của nhà cung cấp đó sẽ gửi thông tin này tới toàn bộ các DNS Server trên toàn cầu. + Khi người dùng truy cập vào 1 tên miền thì máy chủ DNS gần nhất sẽ tìm ra IP của hosting đang lưu trữ website đó. Và máy tính của người dùng sẽ truy cập vào Server với IP tương ứng.', 1, '2024-08-09 01:36:31'),
(3, 1, 'Hãy mở gói Hosting của bạn, sau đó thực hiện thao tác upload dữ liệu lên hosting bằng 1 FTP software mà bạn biết?', '- Tích cực:  + Marketing tốt + Website chứa từ khóa hoặc sản phẩm vào hot trend. - Tiêu cực:  + Website bị tấn công Ddos( Tấn công từ chối dịch vụ) + Dấu hiệu: Traffic tăng lên đột biến, người dùng thật không truy cập được. Có thể kiểm tra bằng: xem tương tác của người dùng trên website hoặc kiểm tra dải IP của những truy cập đó.', 1, '2024-08-09 01:35:39'),
(4, 2, 'Qua số liệu thống kê và phân tích cho thấy, website mà bạn quản trị có lượng traffic tương đối ổn định, bỗng dưng hôm qua lượng traffic này tăng đột biến gấp 1000 lần thông thường. Hãy lý giải các nguyên nhân gây nên số liệu này?', '- Tích cực:  + Marketing tốt + Website chứa từ khóa hoặc sản phẩm vào hot trend. - Tiêu cực:  + Website bị tấn công Ddos( Tấn công từ chối dịch vụ) + Dấu hiệu: Traffic tăng lên đột biến, người dùng thật không truy cập được. Có thể kiểm tra bằng: xem tương tác của người dùng trên website hoặc kiểm tra dải IP của những truy cập đó.', 1, '2024-08-09 01:35:06'),
(5, 3, 'Hãy mở gói Hosting của bạn đang dùng, hãy cho biết dung lượng dữ liệu bạn đã lưu trữ trên gói Hosting đó?', 'Thực hành', 1, '2024-08-09 01:35:53'),
(6, 4, 'Hãy cho biết Bandwidth (băng thông) là gì? Mở gói Hosting bạn đang dùng, cho biết băng thông tối đa mà bạn được sử dụng?', '- Băng thông: là tổng dung lượng người dùng tải về từ hosting trong 1 tháng, đơn vị của băng thông là GB, MB,...', 1, '2024-08-09 01:36:03'),
(7, 5, 'Khi khách hàng truy cập vào website của bạn và nhận được thông báo lỗi 503, hãy cho biết nguyên nhân và cách khắc phục?', '- Có nhiều nguyên nhân:  + Hệ thống đang bảo trì (đang upload dữ liệu lên hosting) + Server không đáp ứng được + Người quản trị web upload sai hoặc thiếu dữ liệu. - Khắc phục:  + Nếu bạn là người dùng thì ko có cách khắc phục + Nếu bạn là quản trị web: liên hệ với nhà cung cấp Hosting, kiểm tra xem dữ liệu mình upload lên hosting đúng và đủ chưa.', 1, '2024-08-09 01:36:19'),
(8, 7, 'Hãy mở gói Hosting của bạn, cho biết số FPT account có thể sử dụng trên đó? FPT account dùng để làm gì?', '- Mở Hosting - FTP account: là tài khoản để truy cập vào hosting giúp người quản trị có thể upload/download dữ liệu từ hosting', 1, '2024-08-09 01:25:33'),
(9, 8, 'Khi khách hàng truy cập vào website của bạn và nhận được thông báo lỗi 500, hãy cho biết nguyên nhân và cách khắc phục?', '- Nguyên nhân: Do quá tải người dùng. - Khắc phục: tăng hosting: + Mua thêm băng thông + Tăng thêm dung lượng lưu trữ trên hosting + Kiểm tra xem server lưu ở đâu? Nó có gần với đa số người dùng không?', 1, '2024-08-09 01:25:45'),
(10, 9, 'Khi khách hàng truy cập vào website của bạn và nhận được thông báo lỗi 404, hãy cho biết nguyên nhân và cách khắc phục?', '- Nguyên nhân:  + Lỗi người dùng: User phải kiểm tra xem tên miền (URL) gõ ở địa chỉ trình duyệt đúng hay chưa? -> Khắc phục: Xóa lịch sử truy cập, Cookies trên trình duyệt, Update lại trình duyệt. + Lỗi người quản trị: Người quản trị Update file sai vị trí, không có file index.html, đường dẫn trong thư mục sai,.. 	-> Khắc phục: Người quản trị phải update file đúng vị trí, kiểm tra xem file có đủ không? Đường dẫn các thư mục có chính xác hay không?', 1, '2024-08-09 01:26:03'),
(11, 10, 'Trên website có nhiều bình luận tục tĩu, sai sự thật, bôi nhọ danh dự của website và đơn vị sở hữu? Là người quản trị website, bạn sẽ làm gì?', '- Đầu tiên: Mình đặt chế độ kiểm duyệt bình luận, Lọc bình luận, Khóa bình luận - Nếu bình luận đó lên website rồi thì: + Đăng bài đính chính + Cố gắng liên hệ với người bình luận để xác thực thông tin + Nếu người dùng là đối thủ: Block người dùng đó, chặn IP,..', 1, '2024-08-09 01:26:17'),
(12, 11, 'Phân biệt Add-on Domain và Parked-Domain?', '- Add-on Doamin: là tên miền chính. - Parked Domain: là tên miền phụ trỏ vào một tên miền chính, dùng cho trường hợp 1 website có nhiều tên miền', 1, '2024-08-09 01:26:31'),
(13, 12, 'Khi muốn 1 website có thể truy cập bằng 2 hoặc nhiều tên miền khác nhau làm thế nào?', '- Thì mình khai báo thêm tên miền Parked Domain', 1, '2024-08-09 01:26:44'),
(14, 13, 'So sánh VPS – Hosting với Web shared?', '- Giống: Cùng cho nhiều người dùng chung trên cùng 1 server vật lý. - Khác:  + Web shared: Người dùng chỉ khác nhau ở thư mục lưu trữ SSD riêng (hệ điều hành, các chính sách bảo mật, IP có thể giống nhau) + VPS – Hosting: Người dùng sử dụng các VPS riêng (có IP riêng, hệ điều hành, RAM riêng, SSD riêng) -> bảo mật tốt hơn, chi phí các hơn, người quản trị cần có thêm các kiến thức về server.', 1, '2024-08-09 01:26:56'),
(15, 14, 'Làm một quản trị website, bạn có cần phải biết đến các kỹ thuật SEO không? Những kỹ thuật SEO bài viết cơ bản?', '- Có - Những kỹ thuật SEO cơ bản: + Bài viết phải tập trung vào keyword, keyword phải lặp lại số lần phủ hợp + Số lượng bài viết tối thiểu 300 từ + Bài viết phải có title, description, phải chứ keyword  + URL thân thiện + Ảnh phải chứa giá trị ALT + Bài viết nên kết hợp ảnh và text + Bài viết phải có Internal link và External link.', 1, '2024-08-09 01:27:15'),
(16, 15, 'Vào 1 ngày đẹp trời, sếp khiển trách bạn vì “SẾP THẤY CÓ NGƯỜI PHẢN ÁNH, WEBSITE CỦA CÔNG TY TRUY CẬP CHẬM QUÁ!?” là người quản trị website, bạn giải thích thế nào?', '- Bạn phải kiểm tra nguyên nhân khiến cho website của công ty chậm - Nếu do Hosting: Nếu người dùng truy cập nhiều thì cần nâng cấp Hosting (băng thông, dung lượng, chuyển server nếu server đặt xa người dùng) - Nếu website bị tấn công: Liên hệ với nhà cung cấp dịch vụ hosting để tăng cường bảo mật, đồng thời phải backup dữ liệu  - Source code, tài nguyên ảnh không được tối ưu: yêu cầu tối ưu lại source code.', 1, '2024-08-09 01:27:28'),
(17, 16, 'Trình bày các bước để Backup các file trong Website?', '- Vào File Manager trong Hosting, Nén thư mục tên miền, dùng FTP account tải file về.', 1, '2024-08-09 01:27:56'),
(18, 17, 'Dấu hiệu nào cho biết website của bạn đang bị tấn công DDoS?', '- Tích cực:  + Marketing tốt + Website chứa từ khóa hoặc sản phẩm vào hot trend. - Tiêu cực:  + Website bị tấn công Ddos( Tấn công từ chối dịch vụ) + Dấu hiệu: Traffic tăng lên đột biến, người dùng thật không truy cập được. Có thể kiểm tra bằng: xem tương tác của người dùng trên website hoặc kiểm tra dải IP của những truy cập đó.', 1, '2024-08-09 01:28:38'),
(19, 18, 'Khi khách hàng truy cập vào website của bạn thì tự động redirect vào 1 trang khác? Hãy cho biết nguyên nhân và cách khắc phục?', '- Kiểm tra tính năng Redirect Domain trên Hostting - Nếu có thì xóa bỏ.', 1, '2024-08-09 01:29:16'),
(20, 19, 'Sau 1 bữa nhậu say sỉn trong bữa tiệc liên hoan tại công ty, khi tỉnh dậy bạn bỗng quên mật khẩu Admin của website mà mình quản trị, có cách nào để lấy lại mật khẩu Admin?', '- Vào Database trên Hosting, PHPadmin, tìm đến bảng User và đổi pass', 1, '2024-08-09 01:29:28'),
(21, 20, 'Hosting là gì? Kể tên ít nhất 5 nhà cung cấp dịch vụ Hosting?', '- Hosting là nơi lưu trữ website trên mạng Internet - 5 nhà cung cấp dịch vụ hosting: iNET, 123Host, Interdata, HostVN, TenTen, Hostinger,... ', 1, '2024-08-09 01:29:41'),
(22, 21, 'Mở tài khoản Google Analytic đang theo dõi website của bạn, hãy cho biết những người truy cập website của bạn đến từ thành phố nào?', '', 1, '2024-08-04 06:50:47'),
(23, 22, 'Mở tài khoản Google Analytic đang theo dõi website của bạn, hãy cho biết những người truy cập website của bạn đang sử dụng trình duyệt gì để vào website?', '', 1, '2024-08-04 06:50:47'),
(24, 23, 'Trình bày các bước để đăng ký 1 tên miền (Domain) cho website?', '- Tìm 1 nhà cung cấp - Kiểm tra tính khả dụng của tên miền xem tên miền đó đã được sử dụng chưa - Thêm vào giỏ hàng và thực hiện thanh toán.', 1, '2024-08-09 01:29:53'),
(25, 24, 'Khi chưa hết tháng đã hết băng thông, thì người dùng nhận được thông báo có mã bao nhiêu?', '509', 1, '2024-08-09 01:30:07'),
(26, 25, 'Mở Hosting của bạn, Thực hiện Backup Database dữ liệu website của bạn hiện tại?', '', 1, '2024-08-04 06:50:47'),
(27, 26, 'Trong Google Analytic có số phiên (Session) và số người truy cập (Users). Nêu sự khác nhau của 2 thông số này?', '- User: là tài khoản đăng nhập vào website - Session: Là số phiên đăng nhập vào website trong 1 khoảng thời gian nhất định', 1, '2024-08-09 01:30:20'),
(28, 27, 'Hãy mở dịch vụ Hosting mà bạn đang dùng, cho biết số lượng băng thông mà bạn đã dùng trong tháng này?', '', 1, '2024-08-04 06:50:47'),
(29, 28, 'Trình bày các bước để trỏ tên miền vào Hosting bằng cách tạo bản ghi?', '', 1, '2024-08-04 06:50:47'),
(30, 29, 'Trình bày các bước để trỏ tên miền vào Hosting bằng tên Name Server?', '', 1, '2024-08-04 06:50:47'),
(31, 30, 'Sự khác nhau của bản ghi A Record và AAAA record?', '- Bản ghi A record dùng cho trường hợp server sử dụng IP V4 - Bản ghi AAA record dùng cho trường hợp Hosting sử dụng IP V6', 1, '2024-08-09 01:30:42'),
(32, 31, 'Đặc điểm nhận diện 1 địa chỉ Ipv4 và Ipv6?', '- IPV4: gồm 4 số (0-255), các số cách nhau bởi dấu (.) - IPV6: gồm 8 số (gồm cả chữ A-F, 0-9), các số cách nhau bởi dấu ( : )', 1, '2024-08-09 01:30:52'),
(33, 32, 'Sự khác nhau của VPS Hosting và Dedicated Server?', '- VPS Hosting: nhiều người dùng chung trên 1 server - Dedicated Server: 1 người dùng riêng 1 server', 1, '2024-08-09 01:31:03'),
(34, 33, 'Trình bày các bước để đăng ký 1 tên miền?', '', 1, '2024-08-04 06:50:47'),
(35, 34, 'Kể tên các thông số cần quan tâm khi đăng ký 1 gói hosting?', '- FTP account - Database - Băng thông - Dung lượng - Chi phí - Chính sách bảo mật - Chính sách chăm sóc khách hàng - Các ưu đãi khác', 1, '2024-08-09 01:31:24'),
(36, 35, 'Tại sao cần upload/download dữ liệu lên Hosting bằng tài khoàn FPT account thay vì upload/download trực tiếp từ hosting?', '- FTP account có dung lượng lớn - FPT account bảo mật và an toàn hơn vì người dùng có thể nhìn rõ được trạng thái', 1, '2024-08-09 01:31:34'),
(37, 36, 'Khi đăng 1 bài viết lên website, những tiêu chuẩn nào giúp bài viết của mình đạt chuẩn SEO?', '- Những kỹ thuật SEO cơ bản: + Bài viết phải tập trung vào keyword, keyword phải lặp lại số lần phủ hợp + Số lượng bài viết tối thiểu 300 từ + Bài viết phải có title, description, phải chứ keyword  + URL thân thiện + Ảnh phải chứa giá trị ALT + Bài viết nên kết hợp ảnh và text + Bài viết phải có Internal link và External link.', 1, '2024-08-09 01:31:51'),
(38, 37, 'Tại sao cần theo dõi lưu lượng người truy cập website của mình thường xuyên?', '- Kiểm soát được lưu lượng khách truy cập để có các chính sách phù hợp - Kiểm soát hay phòng ngừa khi bị tấn công - Nếu lượng người truy cập thấp thì cần Marketing, SEO web tốt hơn - Hiểu rõ về người dùng, công nghệ mà họ sử dụng để cải tiến, đặt quảng cáo, tiếp thị liên kết với các mặt hàng khác để tăng doanh thu hoặc các hiệu ứng,...', 1, '2024-08-09 01:32:11'),
(43, 38, 'Tầm quan trọng của việc tăng tốc WEBSITE? Các nguyên nhân làm website chậm, cách khắc phục? ', '- Cải thiện trải nghiệm người dùng\r\n- Nguyên nhân: \r\n+ Source code chưa tối ưu\r\n+ Tài nguyên ảnh, video, media,..chưa tối ưu\r\n+ Nhiều người vào\r\n+ Bị tấn công\r\n+ Hosting yếu (băng thông ít, dung lượng nhỏ)\r\n+ ...\r\n', 1, '2024-08-09 01:32:45'),
(44, 39, 'Trình bày các bước để theo dõi và phân tích website bằng Google Analytic? ', 'Chỉ cần đăng ký một lần để sử dụng. \r\nThực hiện như sau: \r\n✓ B1: Vào https://analytics.google.com , Sau đó đăng nhập bằng tài khoản Gmail của bạn \r\n✓ B2: Nhắp nút Bắt đầu đo lường \r\n✓ B3: Nhập tên tài khoản (tuỳ ý) rồi nhắp Tiếp theo \r\n✓ B4: Nhập tên thuộc tính (tuỳ ý, thường nhập tên website), chọn múi giờ, loại tiền tệ. Xong nhắp Tiếp theo \r\n✓ B5: Chọn tuỳ ý: danh mục của website, quy mô, mong muốn đo lường gì. Xong nhắp nút Tạo và chấp nhận các điều khoản quy định của Google.\r\n', 1, '2024-08-09 01:33:04'),
(45, 40, 'Trình bày các bước để theo dõi và phân tích website bằng Google Search Console?', '✓ B1: Vào search.google.com/search-console ➔ Bắt đầu ngay bây giờ ➔ Đăng nhập tài khoản gmail của bạn \r\n✓ B2: Chọn 1 trong 2 cách xác minh website: tên miền hoặc URL của website. Dùng URL tiện hơn. Bạn nhập địa chỉ đầy đủ của website và nhắp Tiếp tục \r\n✓ B3: Nhắp tên file trong mục Tải tệp xuống để download file do google phát sinh. \r\n✓ Tiếp theo là Upload file vừa tải lên hosting (Xem slide sau) rồi nhắp nút Xác minh \r\n✓ B4: Upload file vừa tải lên hosting của bạn, trong folder gốc htdocs hoặc public_html. Có thể dùng FileZilla Client hoặc Web tuỳ bạn \r\n✓ B5: Trở lại màn hình ở B3 và nhắp nút Xác Minh \r\nNếu thành công sẽ thông báo Đã xác minh quyền sở hữu Nhắp nút Chuyển đến sản phẩm\r\n', 1, '2024-08-09 01:33:26');

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
(89, 'Nguyễn Tiến Trung', 'PH41273', 'PH41273', '$2y$10$FJNqroxSzdXqvvnYwYdPguBRtmrduHwhCNh/FZ6ZavLeRDxYUow7K', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(90, 'Nguyễn Quốc An', 'PH48883', 'PH48883', '$2y$10$.v4nWUMk5IffGux8DakUfuS7rPwFlz73nxzqszDN9DLASvboC3eLy', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(91, 'Nguyễn Trung Hiếu', 'PH48938', 'PH48938', '$2y$10$YxiI/UkT6o126bRgIYT5g.jxXJ38DhEiGQRPNT.dliL5A3X2RIyhO', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(92, 'Nguyễn Thanh Bình', 'PH51300', 'PH51300', '$2y$10$8kk8ynn3aruZgZnTisJuVOg6lhOVh2s4l34wEDeBQkdSI9.ct106O', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(93, 'Nguyễn Quang Minh', 'PH52121', 'PH52121', '$2y$10$LeQOeR0TNDSOqL.fsCGaAuOhoBsVC9V2UODRHvbJ5/RlNyQSeRoLy', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(94, 'Hoàng Tiến Mạnh', 'PH52145', 'PH52145', '$2y$10$wG/mSkik/uz96DVoSLY/0uaqJwiZPhYqTvXzQTYiVUZykeBpAn78u', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(95, 'Đặng Ngọc Bảo', 'PH52739', 'PH52739', '$2y$10$fKqImQdZmNyT1FNSrFEtpeFHrnklHIjz2ScbU9o1aCpbFB6wKEayu', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(96, 'Nguyễn Duy Bắc', 'PH52811', 'PH52811', '$2y$10$tTbHNLbUIxHi3JM2LMrGYOlBv7WomshNUIgQPVgwVbS7ByKRWbPgO', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(97, 'Phạm Vinh Quang', 'PH52822', 'PH52822', '$2y$10$7rWUxlhaW5mUZGidDNAjNe8LsTKc0B6oOTeYMA1Ro1l9PSqAOTQ9.', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(98, 'Đỗ Đình Việt', 'PH52830', 'PH52830', '$2y$10$vHSh5dehps5tzMeVI7rULuyrCX4w4RXk0li.1Z3jfpiSuM14/3SR2', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(99, 'Quách Hữu Bằng', 'PH52912', 'PH52912', '$2y$10$3tdGm/p460iYeyhdxIw6ouf251nP5UrjFk2m7iHtnjK0h4uSysp7S', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(100, 'Nguyễn Đức Mạnh', 'PH52693', 'PH52693', '$2y$10$GzgR6h3V.e2Ekl.BTM2NuevSuhKgZ7S8taAZ.RJbQz8xeVXu0X.8y', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(101, 'Hoàng Anh Tuấn', 'PH52913', 'PH52913', '$2y$10$Sge.C8GeC0PudhQVZI.EFOdTfbL9GqsH0EDHx.FWZIjFyhyjNXRT2', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(102, 'Lê Duy Linh', 'PH52923', 'PH52923', '$2y$10$NADhRqVeiJSI20jdnUhKD.J/epWw6c6Gba5HjTqZM9aFLT6d6OXze', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(103, 'Đào Tuấn Thành', 'PH52989', 'PH52989', '$2y$10$r7wdi85TiRR6SbRdYPvTA.FE26sV5KUTtqRWRXHL4WXCQH.rx2x.a', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(104, 'Bùi Mạnh Vũ', 'PH53017', 'PH53017', '$2y$10$9wZgJDT9nDpc98/AMKRUpOtfM5J5auslnaJ34Nqyd5p.3SXLoO9/C', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(105, 'Lê Đình Duy', 'PH53075', 'PH53075', '$2y$10$ThkRIEq0HwpjZG8upaZjYu6Ebjz6JvkHnTNrmIqo6A3x5ZWsyROfW', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(106, 'Nguyễn Mạnh Tường', 'PH53087', 'PH53087', '$2y$10$LVomq.AMvNy5FQlHdwzkPOcmGoplyjuTSkVp9f/QMgkES6syfXsli', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(107, 'Phùng Khắc Kiên', 'PH53092', 'PH53092', '$2y$10$CxYi/fAiDdTlyTKAUNKI8eoUrudhUlw/HjH6J4AF382x5x5QGZdha', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(108, 'Hoàng Việt Hà', 'PH53184', 'PH53184', '$2y$10$FCVDFZMyi52klPVvWRFfSuflvTVV3eNDy86tswwQDrTlTyo8gI2ba', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(109, 'Phạm Đình Tú', 'PH53265', 'PH53265', '$2y$10$NRl6LKQxHj9YjvdSDbpdXeHlZFHfMVfodR.LGHSWEdKknAchc7sDK', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(110, 'Lê Quang Dũng', 'PH53314', 'PH53314', '$2y$10$nwtZsdetYyo1muRKao5HkOawaM7A5mZ6Ps.uB/SJAf/q.Lp8Uq.Hy', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(111, 'Nguyễn Thuý Hồng', 'PH53433', 'PH53433', '$2y$10$0uPV657FLBgSK9b4E3MT2O6jJwgkH96Rbr.Yf/W2xivNtF8MLPTw2', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(112, 'Lại Bảo Quốc', 'PH53446', 'PH53446', '$2y$10$upyCu0Z0/8dWsUBwgrLDUeoeTLudGeE0Fq8OhvDVBjA6Lr9Pu4kHO', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(113, 'Nguyễn Văn Vinh', 'PH53470', 'PH53470', '$2y$10$c3qzm4SxYCjoQPKWMwwUCO/azUSd3/wZHdHnWi6PujnyEOoFlNfp.', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(114, 'Phạm Anh Quân', 'PH53475', 'PH53475', '$2y$10$BQqV8DiPDVIDsgbCNPztH.MkC.GNHK/SnXlSrTYeeb87fWoaZpsSq', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(115, 'Nguyễn Nam Hải', 'PH53489', 'PH53489', '$2y$10$tM5T.3hu5TZHJYLjB4lJneF1d4UrxEZ2Z.X3.oaoSKdFFfF3r9dJ2', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(116, 'Nguyễn Tiến Khởi', 'PH53509', 'PH53509', '$2y$10$WAhBYaj7PEFUV0AzNr5oee0mCYIYq6sgVF8lIlXGoB/HA6jrfgjxm', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(117, 'Nguyễn Tiến Anh', 'PH53511', 'PH53511', '$2y$10$Q1RC8s3kdQdqpXXRSfyQxevcnMqHZgv02GkeYpeJ1EweDm/ZWxH3S', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(118, 'Nguyễn Thành Duy', 'PH53539', 'PH53539', '$2y$10$5yUrVctg8SxjU/QEo9nGluOphCMt9Rn3vE4hx0XC1sv0tM9GuGhoe', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(119, 'Nguyễn Văn Đức', 'PH53712', 'PH53712', '$2y$10$pGZnpyHmL/TEvNDk7Zjouu5YuaKHSK0mAdZu3TNiiPKC9dxnP8fHu', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(120, 'Trương Ngọc Hà', 'PH54477', 'PH54477', '$2y$10$jFyuQufXChjdORVOPDh0rO.qqNYWZxL3VpDyYpQGEkog8Bm4AzyUG', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(121, 'Vương Xuân Hiếu', 'PH54527', 'PH54527', '$2y$10$WmJeNhoLecBWF0sgvkFo4OkcKiZLCgjNzdZL0R5h31/jbYKZDCHpS', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(122, 'Ngô Thế Vũ', 'PH54667', 'PH54667', '$2y$10$WgLGsHoih5NkvRMHqLjEKuhpRWXaC3E.U7h8HCaajB0IiEKT1Yguy', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(123, 'Mai Thành Tiến Lộc', 'PH54699', 'PH54699', '$2y$10$MscxzzC0T7IOuGGo595uhu9ldFCXCv5XeG9TQIPf6FQ4h9pPUtbvS', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(124, 'Nguyễn Minh Quân', 'PH54900', 'PH54900', '$2y$10$EbnOVwf95C3oKrcTAOqo4e05Ia4lOiA8zGpeqwiFy3b9in9VLHpQW', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(125, 'Bùi Thị Trang', 'PH56349', 'PH56349', '$2y$10$fqXpQohSuW3a5GrY4iLKze1i3sYeozpPihs0HE9g.MP40G38qy5Fq', 'SA19304', NULL, NULL, NULL, NULL, NULL, 0),
(126, 'Lê Văn Hiệu', 'levanhieu', 'PH53062', '$2y$10$bGnWB/4RMNRNn1hHgQuuaukUYm/ZvQIyGq48PnBpKlIDN3kVeYgiy', 'WD19320', 15, 38, 1, NULL, NULL, 6);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `question_groups`
--
ALTER TABLE `question_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

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
