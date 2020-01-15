-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2020 lúc 02:52 AM
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
-- Cơ sở dữ liệu: `blog_hotels`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_name` varchar(255) DEFAULT NULL,
  `adm_loginname` varchar(255) DEFAULT NULL,
  `adm_email` varchar(255) DEFAULT NULL,
  `adm_password` varchar(255) DEFAULT NULL,
  `adm_avatar` varchar(255) DEFAULT NULL,
  `adm_phone` varchar(255) DEFAULT NULL,
  `adm_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_name`, `adm_loginname`, `adm_email`, `adm_password`, `adm_avatar`, `adm_phone`, `adm_active`) VALUES
(1, 'Đỗ Quang Anh', 'admin', 'qad2207@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0379428138', 1),
(2, 'Phùng Quang Vinh', 'admin2', NULL, 'c33367701511b4f6020ec61ded352059', NULL, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_slug` varchar(255) DEFAULT NULL,
  `cat_meta` varchar(255) DEFAULT NULL,
  `cat_description` varchar(255) DEFAULT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `cat_hot` int(11) NOT NULL,
  `cat_active` int(11) NOT NULL,
  `cat_created_at` timestamp NULL DEFAULT current_timestamp(),
  `cat_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_slug`, `cat_meta`, `cat_description`, `cat_parent_id`, `cat_hot`, `cat_active`, `cat_created_at`, `cat_updated_at`) VALUES
(1, 'Nhà hàng', 'nha-hang', NULL, '', 0, 1, 1, '2020-01-10 08:09:53', '2020-01-14 07:18:44'),
(2, 'Khách sạn', 'khach-san', NULL, NULL, 0, 0, 1, '2020-01-10 08:11:03', '2020-01-10 08:11:06'),
(3, 'Địa điểm', 'dia-diem', NULL, NULL, 0, 0, 1, '2020-01-10 08:11:27', '2020-01-10 08:11:27'),
(4, 'Công thức nấu nướng', 'cong-thuc-nau-nuong', NULL, NULL, 1, 1, 1, '2020-01-10 08:14:15', '2020-01-14 09:25:41'),
(5, 'Tâm sự chuyện ăn kiêng', 'tam-su-chuyen-an-kieng', NULL, NULL, 1, 1, 1, '2020-01-10 08:15:18', '2020-01-10 08:15:18'),
(6, 'Ẩm thực & Đời Sống', 'am-thuc-doi-song', NULL, NULL, 1, 1, 1, '2020-01-10 08:15:46', '2020-01-14 07:24:31'),
(7, 'Du lịch từ A-Z', 'du-lich-tu-a-z', NULL, NULL, 2, 0, 1, '2020-01-10 08:16:31', '2020-01-14 08:14:39'),
(8, 'Mẹo du lịch', 'meo-du-lich', NULL, NULL, 2, 1, 1, '2020-01-10 08:18:05', '2020-01-14 08:40:50'),
(9, 'So sánh giá', 'so-sanh-gia', NULL, NULL, 0, 0, 1, '2020-01-14 04:30:02', '2020-01-14 08:40:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `com_user_id` int(11) DEFAULT NULL,
  `com_content` varchar(255) DEFAULT NULL,
  `com_active` int(11) NOT NULL,
  `com_created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `med_id` int(11) NOT NULL,
  `med_url` varchar(255) DEFAULT NULL,
  `med_active` int(11) NOT NULL,
  `med_created_at` timestamp NULL DEFAULT current_timestamp(),
  `med_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `mnu_id` int(11) NOT NULL,
  `mnu_name` varchar(255) DEFAULT NULL,
  `mnu_slug` varchar(255) DEFAULT NULL,
  `mnu_meta` varchar(255) DEFAULT NULL,
  `mnu_description` varchar(255) DEFAULT NULL,
  `mnu_active` int(11) NOT NULL,
  `mnu_created_at` timestamp NULL DEFAULT current_timestamp(),
  `mnu_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `pos_id` int(11) NOT NULL,
  `pos_title` varchar(255) DEFAULT NULL,
  `pos_slug` varchar(255) DEFAULT NULL,
  `pos_description` varchar(255) DEFAULT NULL,
  `pos_content` varchar(255) DEFAULT NULL,
  `pos_meta` varchar(255) DEFAULT NULL,
  `pos_cat_id` int(11) DEFAULT NULL,
  `pos_admin_id` int(11) DEFAULT NULL,
  `pos_hot` int(11) DEFAULT NULL,
  `pos_status` int(11) DEFAULT NULL,
  `pos_rating` int(11) DEFAULT NULL,
  `pos_created_at` timestamp NULL DEFAULT current_timestamp(),
  `pos_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`pos_id`, `pos_title`, `pos_slug`, `pos_description`, `pos_content`, `pos_meta`, `pos_cat_id`, `pos_admin_id`, `pos_hot`, `pos_status`, `pos_rating`, `pos_created_at`, `pos_updated_at`) VALUES
(1, 'Cách làm Gỏi bò bóp thấu siêu ngon', 'cong-thuc-lam-mon-goi-bo-bop-thau-sieu-ngon', 'Gỏi bò bóp thấu chắc chắn là ', '<div class=\"panel-group description\" id=\"accordionDirection\">\r\n                                                                <div class=\"panel panel-default clearfix\" id=\"step-234574\">\r\n                                                                   ', 'cong-thuc-lam-mon-goi-bo-bop-thau-sieu-ngon', 1, 1, 1, 1, NULL, '2020-01-13 01:56:21', '2020-01-13 01:57:41'),
(2, 'Cách làm Khoai mì nấu nước cốt dừa', 'cong-thuc-lam-mon-khoai-mi-nau-nuoc-cot-dua', 'Khoai Mì Nước Cốt Dừa - ', '<div class=\"panel-group description\" id=\"accordionDirection\">\r\n                                                                <div class=\"panel panel-default clearfix\" id=\"step-206979\">\r\n                                                                   ', 'cong-thuc-lam-mon-khoai-mi-nau-nuoc-cot-dua', 1, 1, 1, 1, NULL, '2020-01-13 01:57:36', '2020-01-13 02:05:53'),
(3, 'Cách làm Sâm bí đao giải nhiệt', 'cong-thuc-lam-mon-sam-bi-dao-giai-nhiet', 'Sâm Bí Đao Giải Nhiệt được xem là một trong những loại ', '<div class=\"panel-group description\" id=\"accordionDirection\">\r\n                                                                <div class=\"panel panel-default clearfix\" id=\"step-196007\">\r\n                                                                   ', 'cong-thuc-lam-mon-sam-bi-dao-giai-nhiet', 1, 1, 1, 1, NULL, '2020-01-13 02:05:52', '2020-01-14 03:48:58'),
(4, 'Cách làm Nem nướng thơm ngon', 'cong-thuc-lam-mon-nem-nuong-thom-ngon', 'Nem Nướng Thơm Ngon - ', 'Nem Nướng Thơm Ngon - ', 'cong-thuc-lam-mon-nem-nuong-thom-ngon', 1, 1, 0, 1, NULL, '2020-01-14 03:29:22', '2020-01-14 03:29:54'),
(5, 'Cách làm Cơm xay tôm rim cho bé', 'cong-thuc-lam-mon-com-xay-tom-rim-cho-be', 'Cơm Xay Tôm Rim Cho Bé - Món ngon từ tôm cho bé để ', '<div class=\"panel-group description\" id=\"accordionDirection\">', 'cong-thuc-lam-mon-com-xay-tom-rim-cho-be', 1, 1, 0, 1, NULL, '2020-01-14 03:30:33', '2020-01-14 03:32:05'),
(6, 'Cách làm Bánh dứa Đài Loan', 'cong-thuc-lam-mon-banh-dua-dai-loan', 'Bánh dứa Đài Loan (bánh thơm Đài Loan) là ', '<div class=\"panel-group description\" id=\"accordionDirection\">\r\n                                                                <div class=\"panel panel-default clearfix\" id=\"step-213130\">\r\n                                                                   ', 'cong-thuc-lam-mon-banh-dua-dai-loan', 1, 1, 0, 1, NULL, '2020-01-14 03:44:42', '2020-01-14 03:45:44'),
(7, 'Cách làm Thịt nạc kho tiêu', 'cong-thuc-lam-mon-thit-nac-kho-tieu', 'Thịt Nạc Kho Tiêu là món ăn ngon phổ biến trong ', '<div class=\"panel-group description\" id=\"accordionDirection\">\r\n                                                                <div class=\"panel panel-default clearfix\" id=\"step-194691\">\r\n                                                                   ', 'cong-thuc-lam-mon-thit-nac-kho-tieu', 4, 1, 0, 1, NULL, '2020-01-14 03:48:53', '2020-01-14 09:26:09'),
(8, 'Cách làm Canh khổ qua nhồi thịt', 'cong-thuc-lam-mon-canh-kho-qua-nhoi-thit', NULL, '<div class=\"panel-group description\" id=\"accordionDirection\">\r\n                                                                <div class=\"panel panel-default clearfix\" id=\"step-203897\">\r\n                                                                   ', 'cong-thuc-lam-mon-canh-kho-qua-nhoi-thit', 4, 1, 0, 1, NULL, '2020-01-14 03:49:22', '2020-01-14 09:26:05'),
(9, 'Cách làm Sườn cốt lết rim nước tương Maggi', 'cong-thuc-lam-mon-suon-cot-let-rim-nuoc-tuong-maggi', 'Từng miếng sườn được rim mềm phủ bên trên là nước sốt sánh mượt đậm đà, thơm dậy mùi nước tương và tỏi sả tuy hơi lạ miệng nhưng rất hài hoà. Tuy nguyên liệu đơn giản và cách chế biến nhanh chóng nhưng thành phẩm mang lại sẽ không làm bạn thất vọng đâu. N', '<div class=\"panel-group description\" id=\"accordionDirection\">\r\n                                                                <div class=\"panel panel-default clearfix\" id=\"step-227692\">\r\n                                                                   ', 'cong-thuc-lam-mon-suon-cot-let-rim-nuoc-tuong-maggi', 4, 1, 0, 1, NULL, '2020-01-14 03:51:01', '2020-01-14 09:26:01'),
(10, 'Cách làm Chân gà hấp bia', 'cong-thuc-lam-mon-chan-ga-hap-bia', 'Các món ăn từ gà luôn đem lại sự hấp dẫn khó cưỡng dù đơn giản hay phức tạp. Cuối tuần bên cạnh mâm cơm tất niên hay tân niên với bạn bè, hãy thử sáng tạo một chút với những chiếc chân gà. Bạn sẽ có 1 món mới thú vị và lạ miệng vô cùng.', '<div class=\"panel-group description\" id=\"accordionDirection\">\r\n                                                                <div class=\"panel panel-default clearfix\" id=\"step-224766\">\r\n                                                                   ', 'cong-thuc-lam-mon-chan-ga-hap-bia', 4, 1, 0, 1, NULL, '2020-01-14 03:52:41', '2020-01-14 09:25:59'),
(11, 'Đặc sản mắm mực nặng mùi của người Nhật', 'dac-san-mam-muc-nang-mui-cua-nguoi-nhat', 'Mắm mực luôn được xếp vào danh sách những món ăn kinh dị vì có mùi thối nồng đặc trưng. Thế nhưng, đây lại là thứ đặc sản nổi tiếng tại xứ sở hoa anh đào.', '<div class=\"the-article-body\">\n    <table class=\"picture\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"Dac san mam muc nang mui cua nguoi Nhat hinh anh 1 \" src=\"http://ziviu.com/uploads/news/default/2019/12/17/2019_12_', 'dac-san-mam-muc-nang-mui-cua-nguoi-nhat', 6, 1, 1, 1, NULL, '2020-01-14 04:02:21', '2020-01-14 04:02:21'),
(12, 'Những món tráng miệng không thể bỏ lỡ khi đến Philippines', 'nhung-mon-trang-mieng-khong-the-bo-lo-khi-den-philippines', 'Không chỉ nổi tiếng bởi nhiều thắng cảnh đẹp, Philippines còn được mệnh danh là thiên đường ăn vặt với nhiều món tráng miệng hấp dẫn mà du khách không nên bỏ lỡ.', '<div class=\"the-article-body\">\n    <table class=\"picture gallery\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"Nhung mon trang mieng khong the bo lo khi den Philippines hinh anh 1 \" src=\"http://ziviu.com/uploads/news/d', 'nhung-mon-trang-mieng-khong-the-bo-lo-khi-den-philippines', 6, 1, 1, 1, NULL, '2020-01-14 04:03:07', '2020-01-14 04:03:07'),
(13, 'Người Malaysia nấu cơm với cây ăn thịt', 'nguoi-malaysia-nau-com-voi-cay-an-thit', 'Cơm nếp nhồi cây ăn thịt là món đặc sản của người Malaysia, được nhiều thực khách ưa thích nhờ có hương vị hấp dẫn và cách chế biến độc đáo. ', '<div class=\"the-article-body\">\n    <table class=\"picture\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"Nguoi Malaysia nau com voi cay an thit hinh anh 1 \" src=\"http://ziviu.com/uploads/news/default/2019/12/17/2019_12_1', 'nguoi-malaysia-nau-com-voi-cay-an-thit', 6, 1, 0, 1, NULL, '2020-01-14 04:04:29', '2020-01-14 04:04:29'),
(14, '4 quán tráng miệng sang chảnh tại TP.HCM', '4-quan-trang-mieng-sang-chanh-tai-tp-hcm', 'Nếu bạn đang tìm kiếm nơi để thư giãn cùng bạn bè, hãy bỏ túi 4 điểm đến sau. Những quán này không chỉ có thức uống ngon mà các món tráng miệng cũng hấp dẫn. ', '<div class=\"the-article-body\">\n    <table class=\"picture gallery\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"4 quan trang mieng sang chanh tai TP.HCM hinh anh 1 \" src=\"http://ziviu.com/uploads/news/default/2019/12/17', '4-quan-trang-mieng-sang-chanh-tai-tp-hcm', 6, 1, 0, 1, NULL, '2020-01-14 04:06:43', '2020-01-14 04:06:45'),
(15, 'Các món ăn đặc trưng của nước chủ nhà SEA Games 30', 'cac-mon-an-dac-trung-cua-nuoc-chu-nha-sea-games-30', 'Với sự đa dạng của nền văn hóa, ẩm thực Philippines những năm gần đây đã nhận được sự đánh giá cao từ thực khách khắp nơi.', '<div class=\"the-article-body\">\n    <table class=\"picture gallery\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"Cac mon an dac trung cua nuoc chu nha SEA Games 30 hinh anh 1 \" src=\"http://ziviu.com/uploads/news/default/', 'cac-mon-an-dac-trung-cua-nuoc-chu-nha-sea-games-30', 6, 1, 0, 1, NULL, '2020-01-14 04:07:46', '2020-01-14 04:07:46'),
(16, 'Tiệm cà phê phong cách Hawaii mới mở ở Thái Lan', 'tiem-ca-phe-phong-cach-hawaii-moi-mo-o-thai-lan', 'Tropi Hoola, tiệm cà phê mới khai trương ở Bangkok (Thái Lan), nhanh chóng thu hút sự \"săn lùng\" của giới trẻ bởi phong cách đậm chất Hawaii. Đây là điểm check-in lý tưởng cho bạn.', '<div class=\"the-article-body\">\n    <table class=\"picture gallery\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"Tiem ca phe phong cach Hawaii moi mo o Thai Lan hinh anh 1 \" src=\"http://ziviu.com/uploads/news/default/201', 'tiem-ca-phe-phong-cach-hawaii-moi-mo-o-thai-lan', 6, 1, 0, 1, NULL, '2020-01-14 04:08:32', '2020-01-14 04:08:32'),
(17, 'Ám ảnh, tự sát vì ngôi sao Michelin', 'am-anh-tu-sat-vi-ngoi-sao-michelin', 'Ngôi sao Michelin danh giá trong giới ẩm thực đôi khi không phải niềm ao ước của mọi đầu bếp. Nhiều người đã trả lại phần thưởng này hay tự tử vì mất đi danh hiệu.', '<div class=\"the-article-body\">\n    <p>Chỉ chưa đầy một ngày trước, Sukiyabashi (Nhật Bản), nhà hàng sushi được đánh giá ngon nhất thế giới, chính thức bị tước 3 sao Michelin danh giá. Quyết định nghe có phần tàn nhẫn này không liên quan đến chất lượng món', 'am-anh-tu-sat-vi-ngoi-sao-michelin', 6, 1, 0, 1, NULL, '2020-01-14 04:09:28', '2020-01-14 04:09:28'),
(18, 'Thỏa mãn đam mê bít tết tại 4 nhà hàng hạng sang ở Hà Nội', 'thoa-man-dam-me-bit-tet-tai-4-nha-hang-hang-sang-o-ha-noi', 'Bò bít tết hảo hạng trong không gian lãng mạn, ấm cúng luôn phù hợp với những buổi hẹn hò, họp mặt gia đình. Dưới đây là gợi ý nhà hàng bít tết sang chảnh cho các cặp đôi.', '<div class=\"the-article-body\">\n    <table class=\"picture gallery\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"Thoa man dam me bit tet tai 4 nha hang hang sang o Ha Noi hinh anh 1 \" src=\"http://ziviu.com/uploads/news/d', 'thoa-man-dam-me-bit-tet-tai-4-nha-hang-hang-sang-o-ha-noi', 6, 1, 0, 1, NULL, '2020-01-14 04:10:07', '2020-01-14 04:10:07'),
(19, 'Sự thật về món kim cương đen trên bàn tiệc của giới siêu giàu', 'su-that-ve-mon-kim-cuong-den-tren-ban-tiec-cua-gioi-sieu-giau', 'Được mệnh danh là viên kim cương của nền ẩm thực, truffle có giá thành hàng nghìn USD, chỉ giới siêu giàu mới dám chi số tiền khủng để thưởng thức món ăn này.', '<div class=\"the-article-body\">\n    <table class=\"picture\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"Su that ve mon kim cuong den tren ban tiec cua gioi sieu giau hinh anh 1 \" src=\"http://ziviu.com/uploads/news/defau', 'su-that-ve-mon-kim-cuong-den-tren-ban-tiec-cua-gioi-sieu-giau', 6, 1, 0, 1, NULL, '2020-01-14 04:11:21', '2020-01-14 04:11:29'),
(20, 'Tung lò mò và những đặc sản trứ danh ở An Giang', 'tung-lo-mo-va-nhung-dac-san-tru-danh-o-an-giang', 'Là một trong những điểm du lịch với nhiều góc check-in nổi tiếng, An Giang còn thu hút du khách bởi danh sách các món ăn đặc sản hấp dẫn. ', '<div class=\"the-article-body\">\n    <table class=\"picture gallery\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\"><img alt=\"Tung lo mo va nhung dac san tru danh o An Giang hinh anh 1 \" src=\"http://ziviu.com/uploads/news/default/201', 'tung-lo-mo-va-nhung-dac-san-tru-danh-o-an-giang', 6, 1, 0, 1, NULL, '2020-01-14 04:12:15', '2020-01-14 04:12:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comments`
--

CREATE TABLE `post_comments` (
  `pco_id` int(11) NOT NULL,
  `pco_pos_id` int(11) DEFAULT NULL,
  `pco_com_id` int(11) DEFAULT NULL,
  `pco_created_at` timestamp NULL DEFAULT current_timestamp(),
  `pco_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_media`
--

CREATE TABLE `post_media` (
  `pme_id` int(11) NOT NULL,
  `pme_pos_id` int(11) DEFAULT NULL,
  `pme_med_id` int(11) DEFAULT NULL,
  `pme_created_at` timestamp NULL DEFAULT current_timestamp(),
  `pme_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tags`
--

CREATE TABLE `post_tags` (
  `pota_id` int(11) NOT NULL,
  `pota_post_id` int(11) DEFAULT NULL,
  `pota_tag_id` int(11) DEFAULT NULL,
  `pota_created_at` timestamp NULL DEFAULT current_timestamp(),
  `pota_updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) DEFAULT NULL,
  `tag_slug` varchar(255) DEFAULT NULL,
  `tag_meta` varchar(255) DEFAULT NULL,
  `tag_description` varchar(255) DEFAULT NULL,
  `tag_active` int(11) NOT NULL,
  `tag_created_at` timestamp NULL DEFAULT current_timestamp(),
  `tag_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `tag_slug`, `tag_meta`, `tag_description`, `tag_active`, `tag_created_at`, `tag_updated_at`) VALUES
(1, 'món ngon mỗi ngày', 'mon-ngon-moi-ngay', NULL, NULL, 1, '2020-01-10 08:40:38', '2020-01-10 08:40:38'),
(2, 'món ăn ngon', 'mon-an-ngon', NULL, NULL, 1, '2020-01-10 08:40:48', '2020-01-10 08:40:58'),
(3, 'các món ăn ngon', 'cac-mon-an-ngon', NULL, NULL, 1, '2020-01-10 08:41:12', '2020-01-10 08:41:12'),
(4, 'quán ăn ngon', 'quan-an-ngon', NULL, NULL, 0, '2020-01-10 08:41:28', '2020-01-10 08:41:28'),
(5, 'món ngon', 'mon-ngon', NULL, NULL, 0, '2020-01-10 08:41:40', '2020-01-10 08:41:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `use_id` int(11) NOT NULL,
  `use_name` varchar(255) DEFAULT NULL,
  `use_loginname` varchar(255) NOT NULL,
  `use_email` varchar(255) DEFAULT NULL,
  `use_password` varchar(255) DEFAULT NULL,
  `use_avatar` varchar(255) DEFAULT NULL,
  `use_phone` varchar(255) DEFAULT NULL,
  `use_facebook_id` varchar(255) DEFAULT NULL,
  `use_token` varchar(255) DEFAULT NULL,
  `use_active` int(11) NOT NULL,
  `use_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`use_id`, `use_name`, `use_loginname`, `use_email`, `use_password`, `use_avatar`, `use_phone`, `use_facebook_id`, `use_token`, `use_active`, `use_created_at`) VALUES
(1, 'Lương Văn Công', 'luongvancong', 'cong.itsoft@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'https://scontent.xx.fbcdn.net/v/l/t1.0-1/p200x200/14095825_1275048022546778_3452256029825377524_n.jpg?oh=39def2686f6784c94f3a254c63a1af3d&oe=591F2F6A', '+84901452368', '100001247771720', NULL, 1, '2020-01-10 07:43:51'),
(2, 'Hà Phạm Thái', 'haphamthai', 'cong.itsoft@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'https://scontent.xx.fbcdn.net/hprofile-xaf1/v/t1.0-1/p200x200/482889_102346626623522_214089315_n.jpg?oh=65d21ed1a60afa92c54a1e7c9dc60e36&oe=571F7A95', NULL, '422628697928645', NULL, 1, '2020-01-10 07:51:53'),
(3, 'Long nguyễn', 'Long nguyễn', 'thanhlong09041995@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '1894090500704867', NULL, 1, '2020-01-10 07:56:33'),
(4, 'Kyle C', 'Kyle C', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2020-01-10 07:59:53'),
(5, 'Maps672143', 'Maps672143', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2020-01-10 08:00:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_parent_id` (`cat_parent_id`) USING BTREE,
  ADD KEY `cat_hot` (`cat_hot`) USING BTREE;

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `com_user_id` (`com_user_id`) USING BTREE;

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`med_id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`mnu_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pos_id`),
  ADD KEY `pos_cat_id` (`pos_cat_id`) USING BTREE,
  ADD KEY `pos_admin_id` (`pos_admin_id`) USING BTREE;

--
-- Chỉ mục cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`pco_id`),
  ADD KEY `pco_pos_id` (`pco_pos_id`) USING BTREE,
  ADD KEY `pco_com_id` (`pco_com_id`) USING BTREE;

--
-- Chỉ mục cho bảng `post_media`
--
ALTER TABLE `post_media`
  ADD PRIMARY KEY (`pme_id`),
  ADD KEY `pme_pos_id` (`pme_pos_id`) USING BTREE,
  ADD KEY `pme_med_id` (`pme_med_id`) USING BTREE;

--
-- Chỉ mục cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`pota_id`),
  ADD KEY `pota_post_id` (`pota_post_id`) USING BTREE,
  ADD KEY `pota_tag_id` (`pota_tag_id`) USING BTREE;

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`use_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `mnu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `pco_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_media`
--
ALTER TABLE `post_media`
  MODIFY `pme_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `pota_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
