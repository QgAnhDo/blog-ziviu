-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 03:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_hotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_name`, `adm_loginname`, `adm_email`, `adm_password`, `adm_avatar`, `adm_phone`, `adm_active`) VALUES
(1, 'Đỗ Quang Anh', 'admin', 'qad2207@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0379428138', 1),
(2, 'Phùng Quang Vinh', 'admin2', NULL, 'c33367701511b4f6020ec61ded352059', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
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
-- Dumping data for table `categories`
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
(9, 'So sánh giá', 'so-sanh-gia', NULL, NULL, 0, 0, 1, '2020-01-14 04:30:02', '2020-01-14 08:40:48'),
(10, 'Công nghệ', 'cong-nghe', NULL, NULL, 0, 0, 1, '2020-01-16 02:52:15', '2020-01-16 02:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
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
-- Table structure for table `menu`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pos_id` int(11) NOT NULL,
  `pos_title` varchar(255) NOT NULL,
  `pos_slug` varchar(255) DEFAULT NULL,
  `pos_description` varchar(255) DEFAULT NULL,
  `pos_content` text DEFAULT NULL,
  `pos_image` varchar(255) DEFAULT NULL,
  `pos_meta` varchar(255) DEFAULT NULL,
  `pos_cat_id` int(11) DEFAULT NULL,
  `pos_admin_id` int(11) DEFAULT NULL,
  `pos_crawl_status` int(11) DEFAULT NULL,
  `pos_hot` int(11) DEFAULT NULL,
  `pos_status` int(11) DEFAULT NULL,
  `pos_rating` int(11) DEFAULT NULL,
  `pos_website` varchar(255) DEFAULT NULL,
  `pos_view` int(11) DEFAULT NULL,
  `pos_created_at` int(11) DEFAULT NULL,
  `pos_updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pos_id`, `pos_title`, `pos_slug`, `pos_description`, `pos_content`, `pos_image`, `pos_meta`, `pos_cat_id`, `pos_admin_id`, `pos_crawl_status`, `pos_hot`, `pos_status`, `pos_rating`, `pos_website`, `pos_view`, `pos_created_at`, `pos_updated_at`) VALUES
(1, 'Bài 07: Hàm preg_match_all trong php', 'abc-def', NULL, 'Mục đích của ta chỉ lấy đoạn text bên trong cặp nháy kép, nhưng nó trả về dài quá :D. Lý do là nó duyệt từ dấu nháy đầu chuỗi cho đến cuối chuỗi nên kết quả mới như vậy, đây gọi là hiện tượng Greedy mà chúng ta đã học ở bài các quy tắc Regular Expression căn bản. Vậy để lấy đoạn text trong cặp dấu nháy thứ nhất thì ta phải thêm dấu ? đằng sâu dấu + của chuỗi partern trên, có ý nghĩa là lấy kết quả match đầu tiên (chống greedy).', NULL, NULL, 1, 1, 1, 1, 1, 1, 'abc.com', 11233, NULL, NULL),
(2, 'Bùi Tiến Dũng: \'Tôi vẫn sống cuộc đời của mình. Luôn cố gắng vì những điều tốt đẹp\'', 'acf-jsdfnvj-sdad', 'Bùi Tiến Dũng: \'Tôi vẫn sống cuộc đời của mình. Luôn cố gắng vì những điều tốt đẹp\'', 'Mục đích của ta chỉ lấy đoạn text bên trong cặp nháy kép, nhưng nó trả về dài quá :D. Lý do là nó duyệt từ dấu nháy đầu chuỗi cho đến cuối chuỗi nên kết quả mới như vậy, đây gọi là hiện tượng Greedy mà chúng ta đã học ở bài các quy tắc Regular Expression căn bản. Vậy để lấy đoạn text trong cặp dấu nháy thứ nhất thì ta phải thêm dấu ? đằng sâu dấu + của chuỗi partern trên, có ý nghĩa là lấy kết quả match đầu tiên (chống greedy).', NULL, NULL, 1, 1, 1, 1, 1, 1, 'abc.com', 11233, NULL, NULL),
(3, 'Quang Hải lên tiếng trấn an đồng đội sau thất bại', 'acf-jsdfnvj-sdad', 'Đội trưởng Nguyễn Quang Hải vừa dành những lời động viên tới thủ thành Bùi Tiến Dũng sau sai lầm anh gặp phải ở lượt trận cuối VCK U23 châu Á.', 'Thầy trò HLV Park Hang-seo khép lại hành trình tại VCK U23 châu Á 2020 sau thất bại 1-2 trước U23 Triều Tiên. Một trong những điểm nhấn lớn nhất của trận đấu nằm ở phút thứ 27, khi thủ môn Bùi Tiến Dũng có tình huống cản phá không tốt, dẫn đến bàn thua đầu tiên của U23 Việt Nam.\r\n\r\nNói về sự cố của người đồng đội, Quang Hải khẳng định, đây là điều khó tránh khỏi, và sẽ là bài học lớn để Bùi Tiến Dũng hoàn thiện bản thân hơn.\r\n\r\n\"Lúc này, toàn đội cảm thấy khá tiếc nuối với kết quả. Song, U23 Việt Nam đã thi đấu với một tinh thần quả cảm dù kết quả không được tốt. Trong bóng đá, sai lầm là không thể tránh khỏi. Đây sẽ là bài học để Bùi Tiến Dũng hoàn thiện bản thân hơn nữa.\" - cầu thủ 22 phát biểu.', NULL, NULL, 1, 1, 1, 1, 1, 1, 'abc.com', 11233, NULL, NULL),
(4, 'Tiết lộ chế độ sinh hoạt ở tuổi 34 của Ronaldo', 'acf-jsdfnvj-sdad', 'Tiết lộ chế độ sinh hoạt ở tuổi 34 của Ronaldo', 'Thầy trò HLV Park Hang-seo khép lại hành trình tại VCK U23 châu Á 2020 sau thất bại 1-2 trước U23 Triều Tiên. Một trong những điểm nhấn lớn nhất của trận đấu nằm ở phút thứ 27, khi thủ môn Bùi Tiến Dũng có tình huống cản phá không tốt, dẫn đến bàn thua đầu tiên của U23 Việt Nam.\r\n\r\nNói về sự cố của người đồng đội, Quang Hải khẳng định, đây là điều khó tránh khỏi, và sẽ là bài học lớn để Bùi Tiến Dũng hoàn thiện bản thân hơn.\r\n\r\n\"Lúc này, toàn đội cảm thấy khá tiếc nuối với kết quả. Song, U23 Việt Nam đã thi đấu với một tinh thần quả cảm dù kết quả không được tốt. Trong bóng đá, sai lầm là không thể tránh khỏi. Đây sẽ là bài học để Bùi Tiến Dũng hoàn thiện bản thân hơn nữa.\" - cầu thủ 22 phát biểu.', NULL, NULL, 2, 1, 1, 1, 1, 1, 'abc.com', 11233, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
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
-- Table structure for table `post_tags`
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
-- Table structure for table `tags`
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
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `tag_slug`, `tag_meta`, `tag_description`, `tag_active`, `tag_created_at`, `tag_updated_at`) VALUES
(1, 'món ngon mỗi ngày', 'mon-ngon-moi-ngay', NULL, NULL, 1, '2020-01-10 08:40:38', '2020-01-10 08:40:38'),
(2, 'món ăn ngon', 'mon-an-ngon', NULL, NULL, 1, '2020-01-10 08:40:48', '2020-01-10 08:40:58'),
(3, 'các món ăn ngon', 'cac-mon-an-ngon', NULL, NULL, 1, '2020-01-10 08:41:12', '2020-01-10 08:41:12'),
(4, 'quán ăn ngon', 'quan-an-ngon', NULL, NULL, 0, '2020-01-10 08:41:28', '2020-01-10 08:41:28'),
(5, 'món ngon', 'mon-ngon', NULL, NULL, 0, '2020-01-10 08:41:40', '2020-01-10 08:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`use_id`, `use_name`, `use_loginname`, `use_email`, `use_password`, `use_avatar`, `use_phone`, `use_facebook_id`, `use_token`, `use_active`, `use_created_at`) VALUES
(1, 'Lương Văn Công', 'luongvancong', 'cong.itsoft@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'https://scontent.xx.fbcdn.net/v/l/t1.0-1/p200x200/14095825_1275048022546778_3452256029825377524_n.jpg?oh=39def2686f6784c94f3a254c63a1af3d&oe=591F2F6A', '+84901452368', '100001247771720', NULL, 1, '2020-01-10 07:43:51'),
(2, 'Hà Phạm Thái', 'haphamthai', 'cong.itsoft@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'https://scontent.xx.fbcdn.net/hprofile-xaf1/v/t1.0-1/p200x200/482889_102346626623522_214089315_n.jpg?oh=65d21ed1a60afa92c54a1e7c9dc60e36&oe=571F7A95', NULL, '422628697928645', NULL, 1, '2020-01-10 07:51:53'),
(3, 'Long nguyễn', 'Long nguyễn', 'thanhlong09041995@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '1894090500704867', NULL, 1, '2020-01-10 07:56:33'),
(4, 'Kyle C', 'Kyle C', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2020-01-10 07:59:53'),
(5, 'Maps672143', 'Maps672143', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2020-01-10 08:00:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_parent_id` (`cat_parent_id`) USING BTREE,
  ADD KEY `cat_hot` (`cat_hot`) USING BTREE;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `com_user_id` (`com_user_id`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`mnu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pos_id`),
  ADD KEY `pos_cat_id` (`pos_cat_id`) USING BTREE,
  ADD KEY `pos_admin_id` (`pos_admin_id`) USING BTREE;

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`pco_id`),
  ADD KEY `pco_pos_id` (`pco_pos_id`) USING BTREE,
  ADD KEY `pco_com_id` (`pco_com_id`) USING BTREE;

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`pota_id`),
  ADD KEY `pota_post_id` (`pota_post_id`) USING BTREE,
  ADD KEY `pota_tag_id` (`pota_tag_id`) USING BTREE;

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`use_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `mnu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `pco_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `pota_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
