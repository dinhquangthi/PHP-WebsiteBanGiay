-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2019 at 09:42 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitebangiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `level` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productName` varchar(100) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productSize` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinytext DEFAULT '',
  `status` tinytext DEFAULT '1',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Giày Bóng Đá', 'giay-bong-da', NULL, NULL, '', '1', '2019-08-28 08:31:51', '2019-08-28 08:31:51'),
(2, 'Giày Bóng Rổ', 'giay-bong-ro', NULL, NULL, '', '1', '2019-08-28 08:31:54', '2019-08-28 08:31:54'),
(3, 'Giày Chạy Bộ', 'giay-chay-bo', NULL, NULL, '', '1', '2019-08-28 08:31:57', '2019-08-28 08:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8 DEFAULT NULL,
  `content2` longtext CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `content`, `content2`, `image`, `created_at`) VALUES
(9, 'TOP NHỮNG PHỤ KIỆN GIÚP OUTFIT CỦA BẠN BỚT “NHẠT NHẼO” KHI RA ĐƯỜNG', 'top-nhung-phu-kien-giup-outfit-cua-ban-bot-nhat-nheo-khi-ra-duong', 'Bất cứ tín đồ thời trang nào cũng nắm rõ một quy tắc, bất cứ bộ outfit nào cũng không thể thiếu phụ kiện. Những bộ trang phục tưởng chừng vô cùng đơn giản như áo thun, jeans hay shorts sẽ bắt mắt hơn nhiều nếu bạn kết hợp chúng với một loại phụ kiện nào đó. Từ nón, thắt lưng, ví, túi xách… tất cả đều sẽ là những điểm nhấn giúp bạn ấn tượng hơn trong mắt người đối diện. Và chắc chắn những món đồ mà shop giày thể thao Fandy sắp giới thiệu bên dưới đây sẽ khiến bận phải cân nhắc sở hữu.', 'điểm nhấn giúp bạn ấn tượng hơn trong mắt người đối diện. Và chắc chắn những món đồ mà shop giày thể thao Fandy sắp giới thiệu bên dưới đây sẽ khiến bận phải cân nhắc sở hữu.', 'YToxOntpOjA7czozMToicGh1LWtpZW4tY2hhdC1jaG8tb3V0Zml0LTAxLmpwZyI7fQ==', '2019-10-21 05:55:56'),
(10, 'CHÀO MỪNG NGÀY PHỤ NỮ VIỆT NAM 20/10 – TẶNG NỬA GIÁ CHO NỬA THỂ GIỚI', 'chao-mung-ngay-phu-nu-viet-nam-2010-tang-nua-gia-cho-nua-the-gioi', 'Nhân dịp 20/10 tập thể Fandy xin kính chúc các bà, các mẹ, các chị và em gái luôn luôn vui vẻ, xinh đẹp, tràn ngập niềm vui và hạnh phúc. Phụ nữ sinh ra là được để yêu thương – Hãy cùng Fandy gửi những lời chúc ngập tràn tình yêu thương đến những người phụ nữ của chúng ta.\r\n\r\nĐể dành những tình yêu thương đó hệ thống cửa hàng thời trang thể thao cao cấp Fandy dành chương trình đặc biệt : “TẶNG NỬA GIÁ CHO NỬA THẾ GIỚI”', 'Nội dung chương trình:\r\nGiảm 50% cho đôi giày thứ 2 cùng với rất nhiều những quà tặng khác.\r\n\r\nĐối tượng áp dụng:\r\n– Dành cho các bạn nữ đến mua giày\r\n– Dành cho các bạn nam đến mua giày tặng mẹ, chị, em gái, người yêu.\r\n\r\nThời gian: Trong 3 ngày 18/10/2019 – 20/10/2019\r\n\r\nChương trình áp dụng tại tất cả cửa hàng thuộc hệ thống cửa hàng của Fandy:\r\n– Fandy 409 Lê Duẩn, Đà Nẵng\r\n– Fandy Tam kỳ, Quảng Nam\r\n\r\nVới phương châm đặt chữ Tín và Chất Lượng lên hàng đầu. Fandy luôn tự hào nâng niu từng bước chân của bạn. “ Một đôi giày có thể thay đổi cả cuộc đời bạn!” – Lọ Lem. Hãy trở nên thật tự tin nhé những người phụ nữ của chúng tôi!', 'YToxOntpOjA7czozNjoiZmFuZHktY2h1b25nLXRyaW5oLTIwLjEwLTgwMHgzMTMuanBnIjt9', '2019-10-21 05:56:53'),
(11, 'CỨ DU HÍ KHẮP NƠI VỚI ĐÔI SNEAKER YÊU THÍCH ĐI VÌ ĐÃ CÓ BÍ KÍP VỆ SINH SIÊU ĐỈNH NÀY', 'cu-du-hi-khap-noi-voi-doi-sneaker-yeu-thich-di-vi-da-co-bi-kip-ve-sinh-sieu-dinh-nay', '1. Sử dụng đúng dụng cụ vệ sinh, bộ vệ sinh chuyên dụng <br>\r\n2. Tẩy ố đế giày bằng kem đánh răng<br>\r\n3. Tuyệt đối không dùng máy sấy và tránh ánh nắng mặt trời.<br>', 'Để làm sạch các đôi sneaker thì việc lựa chọn loại bàn chải, dung dịch tẩy rửa nên được chú ý. Bên cạnh đó bạn cũng có thể mua những bộ sản phẩm chuyên dụng như Crep Protect Cure tại các shop bán giày thể thao ở Đà Nẵng để thuận tiện hơn mỗi lần vệ sinh cho giày.', 'YToxOntpOjA7czoxNzoiMXVZdEUxaS1JbWd1ci5qcGciO30=', '2019-10-21 05:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_order_user` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantityOrder` tinyint(4) DEFAULT NULL,
  `priceOrder` int(11) DEFAULT NULL,
  `sizeOrder` varchar(100) DEFAULT NULL,
  `productOrder` varchar(100) DEFAULT 'NULL',
  `addOrder` varchar(100) DEFAULT 'NULL',
  `noteOrder` varchar(100) DEFAULT 'NULL',
  `status` tinyint(4) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_order_user`, `users_id`, `product_id`, `quantityOrder`, `priceOrder`, `sizeOrder`, `productOrder`, `addOrder`, `noteOrder`, `status`, `updated_at`, `created_at`) VALUES
(376, 1570462457, 77, 145, 1, 1030000, '39', 'NIKE MAGISTA OPUS II SG -PRO ANTI CLOG TRATION', 'ádasd, phường Tân Yên, quận Hàm Yên, thành phố Tuyên Quang', 'ádasdasd', NULL, '2019-10-07 15:34:17', '2019-10-07 15:34:17'),
(377, 1570462670, 77, 141, 2, 1930000, '41', 'OLIVIER GIRUOD PUMA RED', 'ádasd, phường Đông Phú, quận Châu Thành, thành phố Hậu Giang', 'bfgbfg', NULL, '2019-10-07 15:37:50', '2019-10-07 15:37:50'),
(378, 1571456475, 77, 169, 2, 2530000, '39', 'GIÀY ADIDAS ULTRA 2019 BLACK MULTI', 'Ha Noi, phường Núi Voi, quận Tịnh Biên, thành phố An Giang', 'Giao tan nơi', NULL, '2019-10-19 03:41:15', '2019-10-19 03:41:15'),
(379, 1571456644, 79, 160, 2, 4495000, '40', 'GIÀY NIKE KYRIE 4 REMEMBER THE 90’S', 'Ha Tinh, phường Bảy Ngàn, quận Châu Thành A, thành phố Hậu Giang', 'ádf', NULL, '2019-10-19 03:44:04', '2019-10-19 03:44:04'),
(380, 1571456644, 79, 166, 1, 4495000, '39', 'GIÀY NIKE AIR JORDAN 1 MID WHITE/COOL GREY', 'Ha Tinh, phường Bảy Ngàn, quận Châu Thành A, thành phố Hậu Giang', 'ádf', NULL, '2019-10-19 03:44:04', '2019-10-19 03:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `number` int(11) DEFAULT 0,
  `head` int(11) DEFAULT 0,
  `hot` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `size` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `image`, `category_id`, `content`, `number`, `head`, `hot`, `created_at`, `update_at`, `size`) VALUES
(140, 'ADIDAS MESSI 16+ PUREAGILITY BLUE/ ORANGE', 'adidas-messi-16-pureagility-blue-orange', 1100000, 0, 'YTo0OntpOjA7czoxMToibWVzc2ktNC5qcGciO2k6MTtzOjExOiJtZXNzaS0zLmpwZyI7aToyO3M6MTE6Im1lc3NpLTIuanBnIjtpOjM7czoxMToibWVzc2ktMS5qcGciO30=', 1, '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Tiếp tục đến với những bài trên tay chi tiết các sản phẩm, các phát hành mới nhất hiện đã được cập nhật tại Fandy cửa hàng giày thể thao ở đà nẵng. Hãy cùng tìm hiểu phân khúc giày chuyên dụng dành riêng cho các bộ môn thể thao như bóng đá, bóng rổ hay training.\r\n\r\nNhư đã biết, ở bài viết trước, chúng ta đã tìm hiểu về Series Mecurial cùng Hypervenom với nhiều loại chất liệu khá mới lạ, tính ứng dụng, trải nghiệm cũng cải thiện nhiều hơn. Và ngay dưới đây, chúng ta sẽ lại “trên tay” chất liệu mới, một biến thể của Flyknit trên dòng sản phẩm MESSI 16+ PUREAGILITY FIRM GROUND CLEATS thuộc Series PUREAGILITY', 30, 0, 0, '2019-09-27 02:06:37', '2019-09-27 02:06:37', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(141, 'OLIVIER GIRUOD PUMA RED', 'olivier-giruod-puma-red', 950000, 0, 'YTo0OntpOjA7czoxMjoiZ2lyb3VkLTUuanBnIjtpOjE7czoxMjoiZ2lyb3VkLTQuanBnIjtpOjI7czoxMjoiZ2lyb3VkLTIuanBnIjtpOjM7czoxMjoiZ2lyb3VkLTEuanBnIjt9', 1, '                            Nếu đã từng xem qua bài review về đôi giày đá bóng dành riêng cho danh thủ LIONEL MESSI với đường nét thiết kế cũng như hiệu năng hỗ trợ tối đa từng động tác, tình huống xử lý từ cầu thủ này. Và trong bài viết ngày hôm nay, tiếp tục là một phát hành tương tự, nhưng chúng ta sẽ cần phải đặt chân đến nước Anh – Nơi có giải Ngoại Hạng tầm cỡ thế giới cùng Arsenal – Một trong những đội bóng giàu truyền thống bậc nhất nơi đây. Phiên bản Collab cùng thương hiệu “báo nhảy” PUMA với tên gọi gắn liền cùng tiền đạo Giroud – PUMA EVOPOWER VIGOR GIROUD DF', 25, 0, 0, '2019-09-26 07:53:57', '2019-09-26 07:53:57', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(142, 'OLIVIER GIROUND PUMA GREEN', 'olivier-giround-puma-green', 950000, 0, 'YTo0OntpOjA7czoxMToiZ3JlZW4tMS5qcGciO2k6MTtzOjExOiJncmVlbi0yLmpwZyI7aToyO3M6MTE6ImdyZWVuLTMuanBnIjtpOjM7czoxMToiZ3JlZW4tNC5qcGciO30=', 1, 'Nếu đã từng xem qua bài review về đôi giày đá bóng dành riêng cho danh thủ LIONEL MESSI với đường nét thiết kế cũng như hiệu năng hỗ trợ tối đa từng động tác, tình huống xử lý từ cầu thủ này. Và trong bài viết ngày hôm nay, tiếp tục là một phát hành tương tự, nhưng chúng ta sẽ cần phải đặt chân đến nước Anh – Nơi có giải Ngoại Hạng tầm cỡ thế giới cùng Arsenal – Một trong những đội bóng giàu truyền thống bậc nhất nơi đây. Phiên bản Collab cùng thương hiệu “báo nhảy” PUMA với tên gọi gắn liền cùng tiền đạo Giroud – PUMA EVOPOWER VIGOR GIROUD DF', 10, 0, 0, '2019-09-04 08:51:28', '2019-09-04 08:51:28', 'a:1:{i:0;s:2:\"40\";}'),
(143, 'NIKE MECURIAL VAPOR XI FG', 'nike-mecurial-vapor-xi-fg', 1000000, 0, 'YTo0OntpOjA7czoxNDoibWVjdXJpYWwtMS5qcGciO2k6MTtzOjE0OiJtZWN1cmlhbC0yLmpwZyI7aToyO3M6MTQ6Im1lY3VyaWFsLTMuanBnIjtpOjM7czoxNDoibWVjdXJpYWwtNC5qcGciO30=', 1, 'Bài viết tiếp theo trong chuỗi review những dòng sản phẩm giày thể thao hỗ trợ chuyên dụng, cụ thể là bộ môn bóng đá, chúng ta hãy cùng nhau tìm hiểu rõ hơn về chất liệu, thiết kế, công nghệ được áp dụng đằng sau một phát hành giày đá bóng hiện đang được đón nhận bởi đông đảo bạn trẻ lẫn các cầu thủ nghiệp dư, bán chuyên, xuất hiện tại nhiều trận đấu phủi, 5vs5, 7vs7 – Series Mercurial và NIKE MERCURIAL VAPOR XI FG', 7, 0, 0, '2019-09-09 03:56:33', '2019-09-09 03:56:33', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(144, 'NIKE MECURIAL VAPOR XI FG', 'nike-mecurial-vapor-xi-fg', 1000000, 0, 'YTo0OntpOjA7czoxMToidmFwb3ItNC5qcGciO2k6MTtzOjExOiJ2YXBvci0zLmpwZyI7aToyO3M6MTE6InZhcG9yLTIuanBnIjtpOjM7czoxMToidmFwb3ItMS5qcGciO30=', 1, 'Bài viết tiếp theo trong chuỗi review những dòng sản phẩm giày thể thao hỗ trợ chuyên dụng, cụ thể là bộ môn bóng đá, chúng ta hãy cùng nhau tìm hiểu rõ hơn về chất liệu, thiết kế, công nghệ được áp dụng đằng sau một phát hành giày đá bóng hiện đang được đón nhận bởi đông đảo bạn trẻ lẫn các cầu thủ nghiệp dư, bán chuyên, xuất hiện tại nhiều trận đấu phủi, 5vs5, 7vs7 – Series Mercurial và NIKE MERCURIAL VAPOR XI FG', 12, 0, 0, '2019-09-04 08:54:49', '2019-09-04 08:54:49', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(145, 'NIKE MAGISTA OPUS II SG -PRO ANTI CLOG TRATION', 'nike-magista-opus-ii-sg--pro-anti-clog-tration', 1000000, 0, 'YTo0OntpOjA7czoxMzoibWFnaXN0YS00LmpwZyI7aToxO3M6MTM6Im1hZ2lzdGEtMy5qcGciO2k6MjtzOjEzOiJtYWdpc3RhLTIuanBnIjtpOjM7czoxMzoibWFnaXN0YS0xLmpwZyI7fQ==', 1, 'Mang đậm tính lịch sử, đột phá, sáng tạo trong lĩnh vực thiết kế. sáng tạo dòng sản phẩm thể thao, đôi giày thể thao gần như hội tụ đủ mọi tiêu chuẩn lúc bấy giờ, từ tính thẫm mỹ lẫn hiệu năng trải nghiệm, tạo cảm giác bóng tốt nhất nhất.\r\n\r\nUpper sử dụng chất liệu Da thuộc không còn lạ lẫm mấy đối với phần đông tín đồ “trái bóng tròn”, từng thấy trên khá nhiều sản phẩm chuyên dụng cả ở bộ môn bóng rổ lẫn tennis.\r\n\r\nPhủ bên ngoài da thuộc còn tích hợp thêm công nghệ Flyknit linh hoạt, tùy biến chuyển động cầu thủ. Ưu điểm từ Flyknit được minh chứng qua khá nhiều sản phẩm, nhiều series khoảng vài năm trở lại đây.', 25, 0, 0, '2019-09-04 08:55:58', '2019-09-04 08:55:58', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(146, 'NIKE HYPERVENOM 3 PHELON FG', 'nike-hypervenom-3-phelon-fg', 950000, 0, 'YTo0OntpOjA7czoxMzoicGhlbG9uZS00LmpwZyI7aToxO3M6MTM6InBoZWxvbmUtMy5qcGciO2k6MjtzOjEzOiJwaGVsb25lLTIuanBnIjtpOjM7czoxMzoicGhlbG9uZS0xLmpwZyI7fQ==', 1, 'Hẳn bạn đã quá quen thuộc với những đôi giày Sneakers được review bởi Fandy shop giày thể thao đẹp ở đà nẵng rồi phải không? Và để đáp ứng nhiều hơn nữa nhu cầu, mục đích sử dụng của người dùng, chúng tôi đã đang và luôn nỗ lực từng ngày, cập nhật liên tục các phát hành mới, phối màu mới mang đến nhiều lựa chọn hơn cho các bạn.\r\n\r\nNgoài footwear thời trang, chúng tôi còn đi đôi với việc mở rộng ra nhiều phân khúc luyện tập, thể thao chuyên dụng như bóng rổ, bóng đá hay cầu lông, cùng hàng tá mẫu giày cực đa dạng đồng loạt cập bến tại Fandy Store. Và Nike Hypervenom Phelon 3 FG – Đại diện thuộc phân khúc giày đá bóng sẽ là sản phẩm được giới thiệu đầu tiên trong toàn bộ series này! Cùng theo dõi nhé!', 29, 0, 0, '2019-10-07 15:31:56', '2019-10-07 15:31:56', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(147, 'NIKE HYPERVENOM 3 PHELON FG BLUE LOW', 'nike-hypervenom-3-phelon-fg-blue-low', 950000, 0, 'YTo0OntpOjA7czo5OiJsb3ctNC5qcGciO2k6MTtzOjk6Imxvdy0zLmpwZyI7aToyO3M6OToibG93LTIuanBnIjtpOjM7czo5OiJsb3ctMS5qcGciO30=', 1, 'Hẳn bạn đã quá quen thuộc với những đôi giày Sneakers được review bởi Fandy shop giày thể thao đường lê duẩn đà nẵng rồi phải không? Và để đáp ứng nhiều hơn nữa nhu cầu, mục đích sử dụng của người dùng, chúng tôi đã đang và luôn nỗ lực từng ngày, cập nhật liên tục các phát hành mới, phối màu mới mang đến nhiều lựa chọn hơn cho các bạn.\r\n\r\nNgoài footwear thời trang, chúng tôi còn đi đôi với việc mở rộng ra nhiều phân khúc luyện tập, thể thao chuyên dụng như bóng rổ, bóng đá hay cầu lông, cùng hàng tá mẫu giày thể thao cực đa dạng đồng loạt cập bến tại Fandy Store. Và Nike Hypervenom Phelon 3 FG – Đại diện thuộc phân khúc giày đá bóng sẽ là sản phẩm được giới thiệu đầu tiên trong toàn bộ series này! Cùng theo dõi nhé!', 20, 0, 0, '2019-09-04 08:58:52', '2019-09-04 08:58:52', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(148, 'NIKE HYPERVENOM 3 PHANTOM DF FG', 'nike-hypervenom-3-phantom-df-fg', 1250000, 0, 'YTo0OntpOjA7czoxMzoicGhhbnRvbS0xLmpwZyI7aToxO3M6MTM6InBoYW50b20tMi5qcGciO2k6MjtzOjEzOiJwaGFudG9tLTMuanBnIjtpOjM7czoxMzoicGhhbnRvbS00LmpwZyI7fQ==', 1, 'Hẳn bạn đã quá quen thuộc với những đôi giày Sneakers được review bởi Fandy giày thể thao đẹp đà nẵng rồi phải không? Và để đáp ứng nhiều hơn nữa nhu cầu, mục đích sử dụng của người dùng, chúng tôi đã đang và luôn nỗ lực từng ngày, cập nhật liên tục các phát hành mới, phối màu mới mang đến nhiều lựa chọn hơn cho các bạn.\r\n\r\nNgoài footwear thời trang, chúng tôi còn đi đôi với việc mở rộng ra nhiều phân khúc luyện tập, thể thao chuyên dụng như bóng rổ, bóng đá hay cầu lông, cùng hàng tá mẫu giày cực đa dạng đồng loạt cập bến tại Fandy Store shop giày thể thao nam đà nẵng .  Và Nike Hypervenom Phantom 3 DF – Đại diện thuộc phân khúc giày đá bóng sẽ là sản phẩm được giới thiệu đầu tiên trong toàn bộ series này! Cùng theo dõi nhé!', 28, 0, 0, '2019-09-04 09:00:41', '2019-09-04 09:00:41', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(149, 'NIKE HYPERVENOM 3 PHANTOM DF FG RED/WHITE', 'nike-hypervenom-3-phantom-df-fg-redwhite', 1250000, 0, 'YTo0OntpOjA7czoxMToidmVub20tMS5qcGciO2k6MTtzOjExOiJ2ZW5vbS0yLmpwZyI7aToyO3M6MTE6InZlbm9tLTMuanBnIjtpOjM7czoxMToidmVub20tNC5qcGciO30=', 1, 'Hẳn bạn đã quá quen thuộc với những đôi giày Sneakers được review bởi Fandy bán giày thể thao đà nẵng rồi phải không? Và để đáp ứng nhiều hơn nữa nhu cầu, mục đích sử dụng của người dùng, chúng tôi đã đang và luôn nỗ lực từng ngày, cập nhật liên tục các phát hành mới, phối màu mới mang đến nhiều lựa chọn hơn cho các bạn.\r\n\r\nNgoài footwear thời trang, chúng tôi còn đi đôi với việc mở rộng ra nhiều phân khúc luyện tập, thể thao chuyên dụng như bóng rổ, bóng đá hay cầu lông, cùng hàng tá mẫu giày cực đa dạng đồng loạt cập bến tại Fandy Store. Và Nike Hypervenom Phantom 3 DF – Đại diện thuộc phân khúc giày đá bóng sẽ là sản phẩm được giới thiệu đầu tiên trong toàn bộ series này! Cùng theo dõi nhé!', 26, 0, 0, '2019-09-04 09:02:01', '2019-09-04 09:02:01', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(150, 'NIKE HYPERVENOM PHANTOM 3 DF FG BLUE', 'nike-hypervenom-phantom-3-df-fg-blue', 1250000, 0, 'YTo0OntpOjA7czo4OiJkZi0xLmpwZyI7aToxO3M6ODoiZGYtMi5qcGciO2k6MjtzOjg6ImRmLTMuanBnIjtpOjM7czo4OiJkZi00LmpwZyI7fQ==', 1, 'Thân giày sử dụng chất liệu Flyknit linh hoạt, tùy biến, đồng thời độ bền đáng kinh ngạc giúp đôi giày vượt qua nhiều bài kiểm tra chất lượng, va chạm nặng, mang đến cảm giác thoái mái nhất nhưng vẫn rất an toàn khi tham gia tập luyện, thi đấu trên sân.\r\n\r\nHệ thống cố định dây giày Flywire chắc chắn, giảm thiểu tối đa trường hợp tuột giày khó chịu khi kết hợp cùng phần cổ Socklike ở phiên bản cổ cao.\r\n\r\nSử dụng kết cấu Hyperreactive Plate tạo nên điểm nhấn riêng biệt trong từng thiết kế lẫn phối màu.', 14, 0, 0, '2019-09-04 09:03:38', '2019-09-04 09:03:38', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(151, 'NIKE HYPERVENOM PHATOM 2 FLOODLIGHT', 'nike-hypervenom-phatom-2-floodlight', 1350000, 0, 'YTo0OntpOjA7czoxMToiZmxvb2QtMS5qcGciO2k6MTtzOjExOiJmbG9vZC0yLmpwZyI7aToyO3M6MTE6ImZsb29kLTMuanBnIjtpOjM7czoxMToiZmxvb2QtNC5qcGciO30=', 1, 'Hẳn bạn đã quá quen thuộc với những đôi giày Sneakers được review bởi Fandy shop giày thể thao nam ở đà nẵng rồi phải không? Và để đáp ứng nhiều hơn nữa nhu cầu, mục đích sử dụng của người dùng, chúng tôi đã đang và luôn nỗ lực từng ngày, cập nhật liên tục các phát hành mới, phối màu mới mang đến nhiều lựa chọn hơn cho các bạn.\r\n\r\nNgoài footwear thời trang, chúng tôi còn đi đôi với việc mở rộng ra nhiều phân khúc luyện tập, thể thao chuyên dụng như bóng rổ, bóng đá hay cầu lông, cùng hàng tá mẫu giày thể thao cực đa dạng đồng loạt cập bến tại Fandy Store. Và Nike Hypervenom Phantom 2 DF – Đại diện thuộc phân khúc giày đá bóng sẽ là sản phẩm được giới thiệu đầu tiên trong toàn bộ series này! Cùng theo dõi nhé!', 18, 0, 0, '2019-09-04 09:05:13', '2019-09-04 09:05:13', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(152, 'NIKE TIEMPO LEGACY II', 'nike-tiempo-legacy-ii', 900000, 0, 'YTo0OntpOjA7czoxMjoidGllbXBvLTEuanBnIjtpOjE7czoxMjoidGllbXBvLTIuanBnIjtpOjI7czoxMjoidGllbXBvLTMuanBnIjtpOjM7czoxMjoidGllbXBvLTQuanBnIjt9', 1, 'Sản phẩm chuyên dụng thuộc bộ môn bóng đá mà ngày hôm nay chúng tôi muốn review, là một đại diện tiêu biểu nằm trong phân khúc giá rẻ, tuy nhiên, chất lượng cũng như hiệu năng, tính ứng dụng của nó khi trải nghiệm thi đấu và luyện tập thực tế được đánh giá rất cao. Series Nike Tiempo cùng phát hành – Nike Tiempo Legacy II.', 14, 0, 0, '2019-09-04 09:06:18', '2019-09-04 09:06:18', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(153, 'NIKE MAGISTA OPUS SG BLUE', 'nike-magista-opus-sg-blue', 950000, 0, 'YTo0OntpOjA7czoxMDoib3B1cy0xLmpwZyI7aToxO3M6MTA6Im9wdXMtMi5qcGciO2k6MjtzOjEwOiJvcHVzLTMuanBnIjtpOjM7czoxMDoib3B1cy00LmpwZyI7fQ==', 1, 'Tiếp tục đến với những bài trên tay chi tiết các sản phẩm, các phát hành mới nhất hiện đã được cập nhật tại Fandy shop giày thể thao nam ở đà nẵng. Hãy cùng tìm hiểu phân khúc giày chuyên dụng dành riêng cho các bộ môn thể thao như bóng đá, bóng rổ hay training.\r\n\r\nNhư đã biết, ở bài viết trước, chúng ta đã tìm hiểu về Series Mecurial cùng Hypervenom với nhiều loại chất liệu khá mới lạ, tính ứng dụng, trải nghiệm cũng cải thiện nhiều hơn. Và ngay dưới đây, chúng ta sẽ lại “trên tay” chất liệu cũ, nhưng mới đối với giày thể thao series ACE này – ACE 17+ Purecontrol Firm Ground Cleats Green', 12, 0, 0, '2019-09-04 09:08:17', '2019-09-04 09:08:17', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(154, 'GIÀY NIKE JORDAN 1 MID ALL “OVER-PRINT LOGOS”', 'giay-nike-jordan-1-mid-all-over-print-logos', 1800000, 10, 'YTo0OntpOjA7czo4OiJici0xLmpwZyI7aToxO3M6ODoiYnItMi5qcGciO2k6MjtzOjg6ImJyLTMuanBnIjtpOjM7czo4OiJici00LmpwZyI7fQ==', 2, 'Giày Nike Jordan 1 Mid All “Over-Print Logos” – Chúng ta hẳn đã chẳng còn lạ lẫm gì về giải đấu bóng rổ NBA danh giá nhất hành tinh. Nơi hội tụ của không chỉ những đội bóng, những tuyển thủ lẫy lừng hàng đầu mà còn của một loạt phát hành Sneaker với ngôn ngữ thiết kế mạnh mẽ và những câu chuyện mang ý nghĩa rất riêng ẩn sau đó.\r\n\r\nLấy ví dụ điển hình là series Air Jordan từ thương hiệu cùng tên, cũng như sản phẩm đầu tiên họ tạo ra – Nike Air Jordan. Theo đó, Air Jordan 1 Mid All “Over-Print Logos” chính là sản phẩm Fandy muốn giới thiệu lần này. Dành vài phút tham khảo qua bài review bên dưới nếu bạn đang tìm kiếm hoặc có ý định sở hữu cho mình một đôi giày thể thao nike đà nẵng!', 40, 0, 0, '2019-09-17 06:15:53', '2019-09-17 06:15:53', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(155, 'GIÀY BAPE X NIKE KYRIE 5 PE “CAMO GREEN WHITE”', 'giay-bape-x-nike-kyrie-5-pe-camo-green-white', 1650000, 0, 'YTo0OntpOjA7czo4OiJici01LmpwZyI7aToxO3M6ODoiYnItNi5qcGciO2k6MjtzOjg6ImJyLTcuanBnIjtpOjM7czo4OiJici04LmpwZyI7fQ==', 2, 'Giày Bape X Nike Kyrie 5 PE “Camo Green White” – Những đôi giày bóng rổ gắn mác “the Swoosh” – Nike không chỉ chiếm lấy cảm tình của đại bộ phận giới trẻ có niềm yêu thích “trái bóng cam” mà các tuyển thủ lẫy lừng tại giải đấu bóng rổ NBA trứ danh cũng rất ưa chuộng chúng. Điển hình là Nike Kyrie, một dòng giày mà Fandy dám chắc bạn sẽ khó lòng có thể bỏ qua. Vừa sở hữu các công nghệ, chất liệu hỗ trợ tốt cho quá trình luyện tập lẫn thi đấu bóng rổ; vừa mang thiết kế phù hợp khi mix / match một Outfit chất lừ xuống phố.\r\n\r\nNếu bạn muốn hiểu thêm về nó hay đang ấp ủ ý định sở hữu cho mình một đôi giày thể thao cực chất. Hãy cùng Fandy ngâm cứu qua bài review sản phẩm giày Nike Kyrie thế hệ thứ 5 trong phối màu Camo Green White dưới đây nhé!', 20, 0, 0, '2019-09-17 06:16:43', '2019-09-17 06:16:43', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(156, 'GIÀY NIKE KYRIE 4 “HALLOWEEN”', 'giay-nike-kyrie-4-halloween', 1650000, 0, 'YTo0OntpOjA7czo4OiJici05LmpwZyI7aToxO3M6OToiYnItMTAuanBnIjtpOjI7czo5OiJici0xMS5qcGciO2k6MztzOjk6ImJyLTEyLmpwZyI7fQ==', 2, 'Giày Nike Kyrie 4 “Halloween” – Những đôi giày bóng rổ gắn mác “the Swoosh” – Nike không chỉ chiếm lấy cảm tình của đại bộ phận giới trẻ có niềm yêu thích “trái bóng cam” mà các tuyển thủ lẫy lừng tại giải đấu bóng rổ NBA trứ danh cũng rất ưa chuộng chúng. Điển hình là Nike Kyrie, một dòng giày mà Fandy dám chắc bạn sẽ khó lòng có thể bỏ qua. Vừa sở hữu các công nghệ, chất liệu hỗ trợ tốt cho quá trình luyện tập lẫn thi đấu bóng rổ; vừa mang thiết kế phù hợp khi mix / match một Outfit chất lừ xuống phố.\r\n\r\nNếu bạn muốn hiểu thêm về nó hay đang ấp ủ ý định sở hữu cho mình một đôi giày thể thao cực chất. Hãy cùng Fandy ngâm cứu qua bài review sản phẩm giày Nike Kyrie thế hệ thứ 4 trong phối màu Halloween dưới đây nhé!', 10, 0, 0, '2019-09-17 06:17:27', '2019-09-17 06:17:27', 'a:1:{i:0;s:2:\"40\";}'),
(157, 'GIÀY NIKE KYRIE 4 70S YELLOW', 'giay-nike-kyrie-4-70s-yellow', 1650000, 20, 'YTo0OntpOjA7czo5OiJici0xMy5qcGciO2k6MTtzOjk6ImJyLTE0LmpwZyI7aToyO3M6OToiYnItMTUuanBnIjtpOjM7czo5OiJici0xNi5qcGciO30=', 2, 'Giày Nike Kyrie 4 70s Yellow – Những đôi giày bóng rổ gắn mác “the Swoosh” – Nike không chỉ chiếm lấy cảm tình của đại bộ phận giới trẻ có niềm yêu thích “trái bóng cam” mà các tuyển thủ lẫy lừng tại giải đấu bóng rổ NBA trứ danh cũng rất ưa chuộng chúng. Điển hình là Nike Kyrie, một dòng giày mà Fandy dám chắc bạn sẽ khó lòng có thể bỏ qua. Vừa sở hữu các công nghệ, chất liệu hỗ trợ tốt cho quá trình luyện tập lẫn thi đấu bóng rổ; vừa mang thiết kế phù hợp khi mix / match một Outfit chất lừ xuống phố.\r\n\r\nNếu bạn muốn hiểu thêm về nó hay đang ấp ủ ý định sở hữu cho mình một đôi giày thể thao đà nẵngcực chất. Hãy cùng Fandy ngâm cứu qua bài review sản phẩm giày Nike Kyrie thế hệ thứ 4 trong phối màu 70s Yellow dưới đây nhé!', 44, 0, 0, '2019-09-27 02:39:59', '2019-09-27 02:39:59', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(158, 'GIÀY NIKE KYRIE 4 NCAA', 'giay-nike-kyrie-4-ncaa', 1650000, 0, 'YTo0OntpOjA7czo5OiJici0xNy5qcGciO2k6MTtzOjk6ImJyLTE4LmpwZyI7aToyO3M6OToiYnItMTkuanBnIjtpOjM7czo5OiJici0yMC5qcGciO30=', 2, 'Giày Nike Kyrie 4 NCAA – Những đôi giày bóng rổ gắn mác “the Swoosh” – Nike không chỉ chiếm lấy cảm tình của đại bộ phận giới trẻ có niềm yêu thích “trái bóng cam” mà các tuyển thủ lẫy lừng tại giải đấu bóng rổ NBA trứ danh cũng rất ưa chuộng chúng. Điển hình là Nike Kyrie, một dòng giày mà Fandy dám chắc bạn sẽ khó lòng có thể bỏ qua. Vừa sở hữu các công nghệ, chất liệu hỗ trợ tốt cho quá trình luyện tập lẫn thi đấu bóng rổ; vừa mang thiết kế phù hợp khi mix / match một Outfit chất lừ xuống phố.\r\n\r\nNếu bạn muốn hiểu thêm về nó hay đang ấp ủ ý định sở hữu cho mình một đôi giày thể thao đẹp ở đà nẵng chất. Hãy cùng Fandy ngâm cứu qua bài review sản phẩm giày Nike Kyrie thế hệ thứ 4 trong phối màu NCAA dưới đây nhé!', 30, 0, 0, '2019-09-17 06:18:57', '2019-09-17 06:18:57', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(159, 'GIÀY NIKE JORDAN 1S REACT ELEMENT 87', 'giay-nike-jordan-1s-react-element-87', 1850000, 0, 'YTo0OntpOjA7czo5OiJici0yMS5qcGciO2k6MTtzOjk6ImJyLTIyLmpwZyI7aToyO3M6OToiYnItMjMuanBnIjtpOjM7czo5OiJici0yNC5qcGciO30=', 2, 'Giày Nike Jordan 1s React Element 87 – Chúng ta hẳn đã chẳng còn lạ lẫm gì về giải đấu bóng rổ NBA danh giá nhất hành tinh. Nơi hội tụ của không chỉ những đội bóng, những tuyển thủ lẫy lừng hàng đầu mà còn của một loạt phát hành Sneaker với ngôn ngữ thiết kế mạnh mẽ và những câu chuyện mang ý nghĩa rất riêng ẩn sau đó.\r\n\r\nLấy ví dụ điển hình là series Air Jordan từ thương hiệu cùng tên, cũng như sản phẩm đầu tiên họ tạo ra – Nike Air Jordan. Theo đó, Air Jordan 1 React Element 87 chính là sản phẩm Fandy muốn giới thiệu lần này. Dành vài phút tham khảo qua bài review bên dưới nếu bạn đang tìm kiếm hoặc có ý định sở hữu cho mình một đôi giày thể thao tại đà nẵng!', 35, 0, 0, '2019-09-17 06:19:47', '2019-09-17 06:19:47', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(160, 'GIÀY NIKE KYRIE 4 REMEMBER THE 90’S', 'giay-nike-kyrie-4-remember-the-90s', 1500000, 0, 'YTo0OntpOjA7czo5OiJici0yNS5qcGciO2k6MTtzOjk6ImJyLTI2LmpwZyI7aToyO3M6OToiYnItMjcuanBnIjtpOjM7czo5OiJici0yOC5qcGciO30=', 2, 'Giày Nike Kyrie 4 Remember The 90’s – Những đôi giày bóng rổ gắn mác “the Swoosh” – Nike không chỉ chiếm lấy cảm tình của đại bộ phận giới trẻ có niềm yêu thích “trái bóng cam” mà các tuyển thủ lẫy lừng tại giải đấu bóng rổ NBA trứ danh cũng rất ưa chuộng chúng. Điển hình là Nike Kyrie, một dòng giày mà Fandy dám chắc bạn sẽ khó lòng có thể bỏ qua. Vừa sở hữu các công nghệ, chất liệu hỗ trợ tốt cho quá trình luyện tập lẫn thi đấu bóng rổ; vừa mang thiết kế phù hợp khi mix / match một Outfit chất lừ xuống phố.\r\n\r\nNếu bạn muốn hiểu thêm về nó hay đang ấp ủ ý định sở hữu cho mình một đôi giày thể thao nike đà nẵng cực chất. Hãy cùng Fandy ngâm cứu qua bài review sản phẩm giày Nike Kyrie thế hệ thứ 4 trong phối màu Remember the 90s dưới đây nhé!', 14, 0, 0, '2019-09-17 06:21:44', '2019-09-17 06:21:44', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(161, 'GIÀY NIKE JORDAN 1 CLAY GREEN', 'giay-nike-jordan-1-clay-green', 1700000, 25, 'YTo0OntpOjA7czo5OiJici0yOS5qcGciO2k6MTtzOjk6ImJyLTMwLmpwZyI7aToyO3M6OToiYnItMzEuanBnIjtpOjM7czo5OiJici0zMi5qcGciO30=', 2, 'Giày Nike Jordan 1 Clay Green – Chúng ta hẳn đã chẳng còn lạ lẫm gì về giải đấu bóng rổ NBA danh giá nhất hành tinh. Nơi hội tụ của không chỉ những đội bóng, những tuyển thủ lẫy lừng hàng đầu mà còn của một loạt phát hành Sneaker với ngôn ngữ thiết kế mạnh mẽ và những câu chuyện mang ý nghĩa rất riêng ẩn sau đó.\r\n\r\nLấy ví dụ điển hình là series Air Jordan từ thương hiệu cùng tên, cũng như sản phẩm đầu tiên họ tạo ra – Nike Air Jordan. Theo đó, Air Jordan 1 Clay Green chính là sản phẩm Fandy muốn giới thiệu lần này. Dành vài phút tham khảo qua bài review bên dưới nếu bạn đang tìm kiếm hoặc có ý định sở hữu cho mình một đôi giày thể thao nike đà nẵng!', 26, 0, 0, '2019-09-17 06:22:42', '2019-09-17 06:22:42', 'a:3:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";}'),
(162, 'GIÀY NIKE AIR JORDAN 1 TRAVIS SCOTT', 'giay-nike-air-jordan-1-travis-scott', 1700000, 0, 'YTo0OntpOjA7czo5OiJici0zMy5qcGciO2k6MTtzOjk6ImJyLTM0LmpwZyI7aToyO3M6OToiYnItMzUuanBnIjtpOjM7czo5OiJici0zNi5qcGciO30=', 2, 'Giày Nike Air Jordan 1 Travis Scott – Chúng ta hẳn đã chẳng còn lạ lẫm gì về giải đấu bóng rổ NBA danh giá nhất hành tinh. Nơi hội tụ của không chỉ những đội bóng, những tuyển thủ lẫy lừng hàng đầu mà còn của một loạt phát hành Sneaker với ngôn ngữ thiết kế mạnh mẽ và những câu chuyện mang ý nghĩa rất riêng ẩn sau đó.\r\n\r\nLấy ví dụ điển hình là series Air Jordan từ thương hiệu cùng tên, cũng như sản phẩm đầu tiên họ tạo ra – Nike Air Jordan 1. Phát hành Collab đặc biệt cùng Travis Scott chính là sản phẩm Fandy muốn giới thiệu lần này. Dành vài phút tham khảo qua bài review bên dưới nếu bạn đang tìm kiếm hoặc có ý định sở hữu cho mình một đôi giày thể thao đà nẵng!', 27, 0, 0, '2019-09-17 06:23:30', '2019-09-17 06:23:30', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(163, 'GIÀY NIKE KYRIE 5 UNIVERSITY RED BLACK', 'giay-nike-kyrie-5-university-red-black', 1500000, 10, 'YTo0OntpOjA7czo5OiJici0zNy5qcGciO2k6MTtzOjk6ImJyLTM4LmpwZyI7aToyO3M6OToiYnItMzkuanBnIjtpOjM7czo5OiJici00MC5qcGciO30=', 2, 'Giày Nike Kyrie 5 University Red Black – Những đôi giày bóng rổ gắn mác “the Swoosh” – Nike không chỉ chiếm lấy cảm tình của đại bộ phận giới trẻ có niềm yêu thích “trái bóng cam” mà các tuyển thủ lẫy lừng tại giải đấu bóng rổ NBA trứ danh cũng rất ưa chuộng chúng. Điển hình là Nike Kyrie, một dòng giày mà Fandy dám chắc bạn sẽ khó lòng có thể bỏ qua. Vừa sở hữu các công nghệ, chất liệu hỗ trợ tốt cho quá trình luyện tập lẫn thi đấu bóng rổ; vừa mang thiết kế phù hợp khi mix / match một Outfit chất lừ xuống phố.', 27, 0, 0, '2019-09-17 06:25:28', '2019-09-17 06:25:28', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(164, 'GIÀY UNION X AIR JORDAN 1 RETRO HIGH OG NRG WHITE', 'giay-union-x-air-jordan-1-retro-high-og-nrg-white', 1600000, 0, 'YTo0OntpOjA7czo5OiJici00MS5qcGciO2k6MTtzOjk6ImJyLTQyLmpwZyI7aToyO3M6OToiYnItNDMuanBnIjtpOjM7czo5OiJici00NC5qcGciO30=', 2, 'Giày Union x Air Jordan 1 Retro High OG NRG White – Chúng ta hẳn đã chẳng còn lạ lẫm gì về giải đấu bóng rổ NBA danh giá nhất hành tinh. Nơi hội tụ của không chỉ những đội bóng, những tuyển thủ lẫy lừng hàng đầu mà còn của một loạt phát hành Sneaker với ngôn ngữ thiết kế mạnh mẽ và những câu chuyện mang ý nghĩa rất riêng ẩn sau đó.\r\n\r\nLấy ví dụ điển hình là series Air Jordan từ thương hiệu cùng tên, cũng như sản phẩm đầu tiên họ tạo ra – Nike Air Jordan 1. Phát hành Collab đặc biệt cùng Union với phối màu OG White chính là sản phẩm Fandy muốn giới thiệu lần này. Dành vài phút tham khảo qua bài review bên dưới nếu bạn đang tìm kiếm hoặc có ý định sở hữu cho mình một đôi giày thể thao nam đà nẵng!', 25, 0, 0, '2019-09-17 06:26:18', '2019-09-17 06:26:18', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(165, 'GIÀY NIKE AIR JORDAN 1 RETRO HIGH OG PINE GREEN', 'giay-nike-air-jordan-1-retro-high-og-pine-green', 1400000, 20, 'YTo0OntpOjA7czo5OiJici00NS5qcGciO2k6MTtzOjk6ImJyLTQ2LmpwZyI7aToyO3M6OToiYnItNDcuanBnIjtpOjM7czo5OiJici00OC5qcGciO30=', 2, 'Giày Nike Air Jordan 1 Retro High OG Pine Green – Chúng ta hẳn đã chẳng còn lạ lẫm gì về giải đấu bóng rổ NBA danh giá nhất hành tinh. Nơi hội tụ của không chỉ những đội bóng, những tuyển thủ lẫy lừng hàng đầu mà còn của một loạt phát hành Sneaker với ngôn ngữ thiết kế mạnh mẽ và những câu chuyện mang ý nghĩa rất riêng ẩn sau đó.\r\n\r\nLấy ví dụ điển hình là series Air Jordan từ thương hiệu cùng tên, cũng như sản phẩm đầu tiên họ tạo ra – Nike Air Jordan 1. Phát hành đặc biệt Pine Green dựa theo cảm hứng của phối màu OG gạo cội chính là sản phẩm Fandy shop bán giày thể thao đẹp ở đà nẵng muốn giới thiệu lần này. Dành vài phút tham khảo qua bài review bên dưới nếu bạn đang tìm kiếm hoặc có ý định sở hữu cho mình một đôi nhé!', 18, 0, 0, '2019-09-17 06:27:52', '2019-09-17 06:27:52', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(166, 'GIÀY NIKE AIR JORDAN 1 MID WHITE/COOL GREY', 'giay-nike-air-jordan-1-mid-whitecool-grey', 1700000, 0, 'YTo0OntpOjA7czo5OiJici00OS5qcGciO2k6MTtzOjk6ImJyLTUwLmpwZyI7aToyO3M6OToiYnItNTEuanBnIjtpOjM7czo5OiJici01Mi5qcGciO30=', 2, 'Giày Nike Air Jordan 1 Mid White/Cool Grey – Chúng ta hẳn đã chẳng còn lạ lẫm gì về giải đấu bóng rổ NBA danh giá nhất hành tinh. Nơi hội tụ của không chỉ những đội bóng, những tuyển thủ lẫy lừng hàng đầu mà còn của một loạt phát hành Sneaker với ngôn ngữ thiết kế mạnh mẽ và những câu chuyện mang ý nghĩa rất riêng ẩn sau đó.\r\n\r\nLấy ví dụ điển hình là series Air Jordan từ thương hiệu cùng tên, cũng như sản phẩm đầu tiên họ tạo ra – Nike Air Jordan 1. Phát hành Air Jordan 1 Mid White/Cool Grey với tone Trắng toát chủ đạo chính là sản phẩm Fandy- shop giày thể thao nam đà nẵng  muốn giới thiệu lần này. Dành vài phút tham khảo qua bài review bên dưới nếu bạn đang tìm kiếm hoặc có ý định sở hữu cho mình một đôi nhé!', 30, 0, 0, '2019-09-17 06:30:02', '2019-09-17 06:30:02', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(167, 'GIÀY NIKE AIR JORDAN 1 OG NRG NOT FOR RESALE', 'giay-nike-air-jordan-1-og-nrg-not-for-resale', 1800000, 30, 'YTo0OntpOjA7czo5OiJici01My5qcGciO2k6MTtzOjk6ImJyLTU0LmpwZyI7aToyO3M6OToiYnItNTUuanBnIjtpOjM7czo5OiJici01Ni5qcGciO30=', 2, 'Giày Nike Air Jordan 1 OG NRG Not For Resale – Chúng ta hẳn đã chẳng còn lạ lẫm gì về giải đấu bóng rổ NBA danh giá nhất hành tinh. Nơi hội tụ của không chỉ những đội bóng, những tuyển thủ lẫy lừng hàng đầu mà còn của một loạt phát hành Sneaker với ngôn ngữ thiết kế mạnh mẽ và những câu chuyện mang ý nghĩa rất riêng ẩn sau đó.\r\n\r\nLấy ví dụ điển hình là series Air Jordan từ thương hiệu cùng tên, cũng như sản phẩm đầu tiên họ tạo ra – Nike Air Jordan 1. Phát hành đặc biệt “Not for resale” (Mang nghĩa: “không dành để bán lại”) dựa theo cảm hứng của phối màu OG gạo cội chính là sản phẩm Fandy muốn giới thiệu lần này. Dành vài phút tham khảo qua bài review bên dưới nếu bạn đang tìm kiếm hoặc có ý định sở hữu cho mình một đôi giày thể thao nhé!', 26, 0, 0, '2019-09-17 06:30:49', '2019-09-17 06:30:49', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(168, 'GIÀY ADIDAS ULTRABOOST 4.0 “ASH SILVER”', 'giay-adidas-ultraboost-40-ash-silver', 850000, 10, 'YTo0OntpOjA7czo4OiJjYi0xLmpwZyI7aToxO3M6ODoiY2ItMi5qcGciO2k6MjtzOjg6ImNiLTMuanBnIjtpOjM7czo4OiJjYi00LmpwZyI7fQ==', 3, 'Giày Adidas Ultraboost 4.0 “Ash Silver” – Series Ultraboost nổi tiếng không chỉ bởi thiết kế thời thượng, tinh giản mà còn bởi sự hỗ trợ tuyệt vời trong những hoạt động thể thao. Truyền thống này được tiếp nối và hoàn thiện dần qua từng thế hệ, từng phiên bản về sau. Ultraboost 4.0 cũng không ngoại lệ. Một mẫu giày thể thao adidas đà nẵng vừa cập bến tại Fandy dành riêng cho các tín đồ chạy bộ\r\n\r\nDĩ nhiên nó thừa hưởng tất cả những “đặc sản” vốn có từ thế hệ Ultraboost đầu tiên. Đôi giày có gì nổi bật? Nó đáng để sở hữu chứ? Hãy cùng shop giày thể thao ở đà nẵng Fandy tìm kiếm tất tần tật các câu trả lời qua bài viết dưới đây hoặc tham khảo nếu bạn cũng đang mang ý định sở hữu cho mình một sản phẩm tương tự nhé.', 20, 0, 0, '2019-09-24 02:08:00', '2019-09-24 02:08:00', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(169, 'GIÀY ADIDAS ULTRA 2019 BLACK MULTI', 'giay-adidas-ultra-2019-black-multi', 1250000, 0, 'YTo0OntpOjA7czo4OiJjYi01LmpwZyI7aToxO3M6ODoiY2ItNi5qcGciO2k6MjtzOjg6ImNiLTcuanBnIjtpOjM7czo4OiJjYi04LmpwZyI7fQ==', 3, 'Giày Adidas Ultra 2019 Black Multi – Series Ultraboost nổi tiếng không chỉ bởi thiết kế thời thượng, tinh giản mà còn bởi sự hỗ trợ tuyệt vời trong những hoạt động thể thao. Truyền thống này được tiếp nối và hoàn thiện dần qua từng thế hệ, từng phiên bản về sau. Ultraboost 19′ mới nhất cũng không ngoại lệ. Một mẫu giày thể thao adidas đà nẵng vừa cập bến tại Fandy dành riêng cho các tín đồ chạy bộ.\r\n\r\nDĩ nhiên nó thừa hưởng tất cả những “đặc sản” vốn có từ thế hệ Ultraboost đầu tiên. Đôi giày có gì nổi bật? Nó đáng để sở hữu chứ? Hãy cùng shop giày thể thao Fandy tìm kiếm tất tần tật các câu trả lời qua bài viết dưới đây hoặc tham khảo nếu bạn cũng đang mang ý định sở hữu cho mình một sản phẩm tương tự nhé.', 20, 0, 0, '2019-09-24 02:08:50', '2019-09-24 02:08:50', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(170, 'GIÀY ADIDAS ALPHABOUNCE BEYOND 2M BLACK OLIVE ORANGE', 'giay-adidas-alphabounce-beyond-2m-black-olive-orange', 1250000, 10, 'YTo0OntpOjA7czo4OiJjYi05LmpwZyI7aToxO3M6OToiY2ItMTAuanBnIjtpOjI7czo5OiJjYi0xMS5qcGciO2k6MztzOjk6ImNiLTEyLmpwZyI7fQ==', 3, 'Giày Adidas Alphabounce Beyond 2M Black Olive Orange – Adidas là một nhãn hàng đã chẳng còn xa lạ mấy với giới trẻ Việt hiện nay. Đa dạng về sản phẩm, liên tục cập nhật theo xu hướng đang thịnh hành. Bạn có thể dễ dàng tìm thấy chiếc áo, chiếc quần hay đôi giày giá bình dân để phục vụ nhu cầu thường ngày; hoặc những phát hành Collab có thiết kế cực chất. Và giày Adidas Alphabounce Beyond Black Orange dĩ nhiên cũng chẳng hề ngoại lệ. Một phiên bản giày thể thao rất đáng để sở hữu tại Fandy Xuân – Hè năm nay.\r\n\r\nThoát ra khỏi một lớp áo quen thuộc, xưa cũ, Alphabounce đem đến người dùng một diện mạo lẫn những trải nghiệm hoàn toàn khác biệt. Ngay bây giờ, hãy cùng Fandy giày thể thao nữ tại đà nẵng tìm hiểu chi tiết hơn về đôi giày này. Tham khảo bài viết nếu bạn cũng đang mang ý định sở hữu cho mình một đôi nhé!', 30, 0, 0, '2019-09-24 02:09:43', '2019-09-24 02:09:43', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(171, 'GIÀY ADIDAS ULTRA BOOST 4.0 BEIJING BLACK/RED', 'giay-adidas-ultra-boost-40-beijing-blackred', 900000, 0, 'YTo0OntpOjA7czo5OiJjYi0xMy5qcGciO2k6MTtzOjk6ImNiLTE0LmpwZyI7aToyO3M6OToiY2ItMTUuanBnIjtpOjM7czo5OiJjYi0xNi5qcGciO30=', 3, 'Giày Adidas Ultra Boost 4.0 Beijing Black/Red – Series Ultraboost nổi tiếng không chỉ bởi thiết kế thời thượng, tinh giản mà còn bởi sự hỗ trợ tuyệt vời trong những hoạt động thể thao. Truyền thống này được tiếp nối và hoàn thiện dần qua từng thế hệ, từng phiên bản về sau. Ultraboost 4.0 cũng không hề ngoại lệ trong số đó. Một mẫu giày thể thao adidas đà nẵng vừa cập bến tại Fandy, dành riêng cho giai đoạn Thu – Đông năm nay.\r\n\r\nDĩ nhiên nó thừa hưởng tất cả những “đặc sản” vốn có từ thế hệ Ultraboost đầu tiên. Đôi giày có gì nổi bật? Nó đáng để sở hữu chứ? Hãy cùng Fandy tìm kiếm tất tần tật các câu trả lời qua bài viết dưới dây hoặc tham khảo nếu bạn cũng đang mang ý định sở hữu cho mình một sản phẩm tương tự nhé.', 35, 0, 0, '2019-09-24 02:10:44', '2019-09-24 02:10:44', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(172, 'GIÀY NEW BALANCE 247 V2 TRITIUM PACK', 'giay-new-balance-247-v2-tritium-pack', 1100000, 0, 'YTo0OntpOjA7czo5OiJjYi0xNy5qcGciO2k6MTtzOjk6ImNiLTE4LmpwZyI7aToyO3M6OToiY2ItMTkuanBnIjtpOjM7czo5OiJjYi0yMC5qcGciO30=', 3, 'Giày New Balance MRL 247 V2 Tritium Pack – Thoát ra khỏi định nghĩa giày chạy bộ thông thường. Những giá trị, cũng như những đôi giày mà “Sự cân bằng mới” tạo ra luôn thật khác biệt so với phần còn lại. New Balance đi con đường của riêng mình bất chấp nền văn hóa sát mặt đất đang vận động chìm nổi thế nào chăng nữa.\r\n\r\nNhờ vậy mà có lẽ người ta chú ý hơn, yêu mến và lựa chọn gắn bó cùng New Balance. Ngôn ngữ thiết kế mang đậm dấu vết hoài cổ với mỗi series giày luôn đính kèm một con số, thường phủ lên mình gam màu tối, trầm như nâu, xám, tan,… thay vì chọn khoác lên tấm áo sặc sỡ, nổi bật để gây ấn tượng.\r\n\r\nTruyền thống tiếp tục duy trì ở phiên bản New Balance MLR 247 Version 2 mới nhất. Nếu yêu thích các giá trị xưa cũ hay muốn đưa vào tủ giày sự khác lạ thì hãy cùng Fandy cửa hàng giày thể thao ở đà nẵng tìm hiểu thật tường tận phiên bản này qua bài viết dưới đây nhé!', 35, 0, 0, '2019-09-24 02:11:32', '2019-09-24 02:11:32', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(173, 'GIÀY ADIDAS YEEZY RUNING III GREY', 'giay-adidas-yeezy-runing-iii-grey', 900000, 15, 'YTo0OntpOjA7czo5OiJjYi0yNC5qcGciO2k6MTtzOjk6ImNiLTIzLmpwZyI7aToyO3M6OToiY2ItMjIuanBnIjtpOjM7czo5OiJjYi0yMS5qcGciO30=', 3, 'Giày Adidas Yeezy Runing III Grey – Yeezy vẫn luôn là cái tên “đắt giá” trong cộng đồng người yêu giày ở thời điểm hiện tại. Họ dễ dàng tạo nên những cơn sốt mỗi lần phát hành sản phẩm hay trình làng phối màu Yeezy mới.  “Truyền thống” này tiếp tục xuất hiện trên phiên bản giày Adidas Yeezy Runing III. Màn kết hợp với thiết kế khá đơn giản từ Kayne West cùng “3 sọc”.\r\n\r\nNgay bây giờ, hãy để Fandy  shop giày thể thao ở đà nẵng đưa bạn khám phá kỹ hơn về nó qua bài viết dưới đây nhé! Sẽ không phí vài phút của bạn đâu bởi nó thực sự rất đáng để dốc túi rước về tủ giày của mình đấy.', 25, 0, 0, '2019-09-24 02:12:32', '2019-09-24 02:12:32', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(174, 'GIÀY ADIDAS PUREBOOST GO NEW VERSION', 'giay-adidas-pureboost-go-new-version', 900000, 0, 'YTo0OntpOjA7czo5OiJjYi0yOC5qcGciO2k6MTtzOjk6ImNiLTI3LmpwZyI7aToyO3M6OToiY2ItMjYuanBnIjtpOjM7czo5OiJjYi0yNS5qcGciO30=', 3, 'Giày Adidas Pureboost Go New Version – Nếu bạn đang tìm một mẫu giày thể thao êm ái, có thiết kế đơn giản cùng giá thành rẻ. Adidas Pureboost 2019 sẽ là lựa chọn rất đáng để lưu tâm. Hãy cùng Fandy tìm hiểu kỹ hơn về phiên bản này. Bạn cần giày thể thao adidas đà nẵng? Đừng bỏ qua bài viết nhé!', 15, 0, 0, '2019-09-24 02:13:24', '2019-09-24 02:13:24', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(175, 'GIÀY ADIDAS YEEZY BOOST 700 INERTIA', 'giay-adidas-yeezy-boost-700-inertia', 1050000, 0, 'YTo0OntpOjA7czo5OiJjYi0zMi5qcGciO2k6MTtzOjk6ImNiLTMxLmpwZyI7aToyO3M6OToiY2ItMzAuanBnIjtpOjM7czo5OiJjYi0yOS5qcGciO30=', 3, 'Giày Adidas Yeezy Boost 700 Inertia – Là một trong những sản phẩm giày thể thao thời trang hot nhất, không quá khó hiểu khi mỗi lần ra mắt các phát hành mới, Yeezy lại khiến người hâm mộ lẫn mọi tín đồ streetwear đều háo hức, rạo rực và mang trong mình khao khát sở hữu vô cùng mãnh liệt. “Truyền thống” này tiếp tục xuất hiện trên phiên bản Yeezy 700 Inertia. Một thiết kế thể hiện đúng chất độc dị của riêng Mr.Kayne.\r\n\r\nSau phát hành đầu tiên gây không ít tranh cãi trong cộng đồng Sneakerheads lẫn người hâm mộ, vừa mới đây, Kayne West cùng các đồng sự lại tiếp tục trình làng bản phối mới với một tông Xám Xanh phủ lên toàn bộ đôi giày.\r\n\r\nNó trông sẽ như thế nào? Liệu có đáng để sở hữu hay không? Hãy cùng Fandy khám phá thật tường tận về nó qua bài viết dưới đây nhé!', 25, 0, 0, '2019-09-24 02:14:39', '2019-09-24 02:14:39', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(176, 'GIÀY ADIDAS ALPHABOUNCE BEYOND CREAM', 'giay-adidas-alphabounce-beyond-cream', 950000, 0, 'YTo0OntpOjA7czo5OiJjYi0zNi5qcGciO2k6MTtzOjk6ImNiLTM1LmpwZyI7aToyO3M6OToiY2ItMzQuanBnIjtpOjM7czo5OiJjYi0zMy5qcGciO30=', 3, 'Giày Adidas Alphabounce Beyond Cream – Adidas là một nhãn hàng đã chẳng còn xa lạ mấy với giới trẻ Việt hiện nay. Đa dạng về sản phẩm, liên tục cập nhật theo xu hướng đang thịnh hành. Bạn có thể dễ dàng tìm thấy chiếc áo, chiếc quần hay đôi giày giá bình dân để phục vụ nhu cầu thường ngày; hoặc những phát hành Collab có thiết kế cực chất. Và giày Adidas Alphabounce Beyond Blue dĩ nhiên cũng chẳng hề ngoại lệ. Một phiên bản giày thể thao rất đáng để sở hữu tại Fandy Xuân – Hè năm nay.\r\n\r\nThoát ra khỏi một lớp áo quen thuộc, xưa cũ, Alphabounce đem đến người dùng một diện mạo lẫn những trải nghiệm hoàn toàn khác biệt. Ngay bây giờ, hãy cùng Fandy giày thể thao nữ tại đà nẵng tìm hiểu chi tiết hơn về đôi giày này. Tham khảo bài viết nếu bạn cũng đang mang ý định sở hữu cho mình một đôi nhé!', 26, 0, 0, '2019-09-24 02:15:25', '2019-09-24 02:15:25', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}'),
(177, 'GIÀY DRAGON BALL Z X ADIDAS ZX 500 RM ‘SON GOKU’', 'giay-dragon-ball-z-x-adidas-zx-500-rm-son-goku', 1100000, 0, 'YTo0OntpOjA7czo5OiJjYi00MC5qcGciO2k6MTtzOjk6ImNiLTM5LmpwZyI7aToyO3M6OToiY2ItMzguanBnIjtpOjM7czo5OiJjYi0zNy5qcGciO30=', 3, 'Giày Adidas Zx 500 RM Son Goku – Adidas là một nhãn hàng đã chẳng còn xa lạ mấy với giới trẻ Việt hiện nay. Đa dạng về sản phẩm, liên tục cập nhật theo xu hướng đang thịnh hành. Bạn có thể dễ dàng tìm thấy chiếc áo, chiếc quần hay đôi giày giá bình dân để phục vụ nhu cầu thường ngày; hoặc những phát hành Collab có thiết kế cực chất. Giày Adidas Zx 500 RM Son Goku Orange cũng chẳng ngoại lệ trong số đó. Thuộc dự án kết hợp cùng bộ truyện tranh Dragon Ball Z kinh điển. Adidas Zx 500 RM được khoác lên thiết kế và một phối màu đậm chất “khỉ con” Son Goku. Thể hiện qua tone Cam quen thuộc từ bộ quần áo cho đến các biểu tượng gắn liền hình ảnh nhân vật.\r\n\r\nNgay bây giờ, hãy cùng Fandy các shop giày thể thao nữ ở đà nẵng tìm hiểu chi tiết hơn về đôi giày này. Tham khảo bài viết nếu bạn cũng đang mang ý định sở hữu cho mình một đôi nhé!', 28, 0, 0, '2019-09-24 02:16:14', '2019-09-24 02:16:14', 'a:4:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` char(32) DEFAULT 'NULL',
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `permission` int(11) NOT NULL DEFAULT 0,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `permission`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(77, 'thi195', '202cb962ac59075b964b07152d234b70', 'quang thi', 'ququq@gmail.com', 0, '92934', 'adada', 1, '2019-09-07 09:11:40', NULL),
(79, 'nam123', '202cb962ac59075b964b07152d234b70', 'Nguyễn Nam', 'nam@gmail.com', 0, '0192392', 'VIêttj Nam', 1, '2019-10-19 03:42:50', NULL),
(81, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 1, '1234566789', 'Việt Nam', 1, '2019-10-19 10:33:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
