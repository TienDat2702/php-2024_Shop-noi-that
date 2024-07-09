-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 09, 2024 lúc 05:26 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoptd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `hot` int DEFAULT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `description`, `hot`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Đèn ngủ - Đèn làm việc', 0, '1715572751.jpg', '<p>DECORD NHÀ HIỆN ĐẠI</p>', 1100, 1, '2024-05-12 20:59:11', '2024-05-28 00:17:31'),
(3, 'Ghế sofa và Ghế bành', 0, '1715572798.jpg', '<p>Ghế sofa và Ghế bành</p>', 900, 1, '2024-05-12 20:59:58', '2024-05-12 20:59:58'),
(4, 'Phòng bếp đồ dùng', 0, '1715572851.jpg', '<p>Phòng bếp đồ dùng</p>', 1000, 1, '2024-05-12 21:00:51', '2024-05-13 02:03:30'),
(5, 'Ghế & Ghế đẩu', 0, '1715572878.jpg', '<p>Ghế &amp; ghế đẩu</p>', 1000, 1, '2024-05-12 21:01:18', '2024-05-13 02:03:37'),
(6, 'Đèn decord', 0, '1715572902.jpg', '<p>Đèn decord</p>', 1000, 1, '2024-05-12 21:01:42', '2024-05-13 02:17:46'),
(33, 'Dat', 3, NULL, '<p>1</p>', NULL, 1, '2024-05-24 20:22:16', '2024-05-24 20:22:16'),
(34, 'Áo nam', 5, NULL, NULL, NULL, 1, '2024-05-24 20:22:22', '2024-05-24 20:22:22'),
(35, 'Sunning Submit', 2, NULL, NULL, NULL, 1, '2024-05-24 20:22:27', '2024-05-28 00:19:22'),
(37, 'ádsad', 4, NULL, NULL, NULL, 1, '2024-05-28 00:23:35', '2024-05-28 00:23:35'),
(38, 'Kim Ngan', 0, NULL, NULL, NULL, 1, '2024-05-28 00:24:01', '2024-05-28 00:24:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_12_151454_create_products_table', 2),
(5, '2024_05_12_152300_create_categories_table', 3),
(6, '2024_05_12_153641_create_categories_table', 4),
(7, '2024_05_13_005611_create_products_table', 5),
(8, '2024_05_13_010128_create_products_table', 6),
(9, '2024_05_13_010635_create_products_table', 7),
(10, '2024_05_13_012933_create_categories_table', 8),
(11, '2024_05_13_013634_create_products_table', 8),
(12, '2024_05_13_034257_update_table_categories', 9),
(13, '2024_05_13_034728_update_table_categories', 10),
(14, '2024_05_13_035525_create_categories_table', 11),
(15, '2024_05_13_035539_create_products_table', 11),
(16, '2024_05_17_051744_remove_thumbnails_from_products_table', 12),
(17, '2024_05_17_055507_create_thumbnails_table', 13),
(18, '2024_05_17_072340_add_content_to_products_table', 14),
(19, '2024_05_17_074826_update_price', 15),
(20, '2024_05_17_074912_update_price', 16),
(21, '2024_05_21_140013_update_price_sale', 17),
(22, '2024_05_21_142116_update_price_sale', 18),
(23, '2024_05_21_142229_update_price_sale', 19),
(24, '2024_05_26_130047_create_users_table', 20),
(25, '2024_05_26_130934_create_users_table', 21),
(26, '2024_05_27_144500_add_multiple_columns_to_users_table', 22),
(27, '2024_05_29_012045_create_favorites_table', 23),
(28, '2024_05_29_013956_create_favorites_table', 24),
(29, '2024_05_30_084529_create_favorites_table', 25),
(30, '2024_06_03_004528_add_roles_columns_to_users_table', 26),
(31, '2024_06_03_011514_edit__roles_columns_to_users_table', 27),
(32, '2024_06_07_071042_create_carts_table', 28),
(33, '2024_06_07_083912_up_carts_table', 29),
(34, '2024_06_07_092331_up_carts_table', 30),
(35, '2024_06_09_211637_create_orders_table', 31),
(36, '2024_06_09_213648_update_orders_table', 32),
(37, '2024_06_09_221419_update_orders_table', 33),
(38, '2024_06_09_222024_create_order_details_table', 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `user_id`, `created_at`, `updated_at`, `note`, `status`, `token`) VALUES
(1, 'Quý', 'Nguyễn', 'datttps32744@fpt.edu.vn', '0353397312', 'Lê đức thọ', 28, '2024-06-11 07:16:39', '2024-06-11 07:17:28', 'Giao hàng đúng địa chỉ', 4, NULL),
(2, 'Đạt', 'Trần', 'tiendat03533@gmail.com', '0353397312', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', 27, '2024-06-11 07:18:26', '2024-06-11 07:19:54', 'Giao đúng hẹn', 4, NULL),
(3, 'Đạt', 'Trần', 'tiendat03533@gmail.com', '0353397312', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', 27, '2024-06-11 07:18:50', '2024-06-11 07:19:45', NULL, 4, NULL),
(4, 'Quý', 'Nguyễn', 'datttps32744@fpt.edu.vn', '0353397312', '125/5 An Phú Đông quận 12', 28, '2024-06-11 07:19:10', '2024-06-11 07:19:22', NULL, 4, NULL),
(5, 'Ngân', 'Tạ', 'tiendat03533@gmail.com', '0353397312', 'Gò vấp', 27, '2024-06-11 07:20:41', '2024-06-11 07:50:45', NULL, 4, NULL),
(6, 'Đạt', 'Trần', 'tiendat03533@gmail.com', '0353397312', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', 27, '2024-06-11 09:25:08', '2024-06-11 09:30:43', NULL, 4, NULL),
(8, 'Hộ', 'Thầy', 'tiendat03533@gmail.com', '0353397312', 'công viên phần mềm', 27, '2024-06-11 17:53:17', '2024-06-11 17:53:37', 'giao tận tay', 1, NULL),
(9, 'Đạt', 'Trần', 'tiendat03533@gmail.com', '0353397312', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', 27, '2024-06-11 17:54:15', '2024-06-11 17:56:27', NULL, 1, NULL),
(10, 'Quý', 'Nguyễn', 'datttps32744@fpt.edu.vn', '0353397312', '125/5 An Phú Đông quận 12', 28, '2024-06-11 17:54:51', '2024-06-11 17:55:09', 'ádsad', 1, NULL),
(12, 'Quý', 'Nguyễn', 'datttps32744@fpt.edu.vn', '0353397312', '125/5 An Phú Đông quận 12', 28, '2024-06-11 17:55:25', '2024-06-11 17:55:41', NULL, 1, NULL),
(13, 'Đạt', 'Trần', 'tiendat03533@gmail.com', '0353397312', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', 27, '2024-06-11 17:58:18', '2024-06-11 17:58:18', NULL, 0, 'fT6ilPQV5Dx5YXyW2WqOgeELOZx7nkyS0CNjNoW0'),
(14, 'Đạt', 'Trần', 'tiendat03533@gmail.com', '0353397312', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', 27, '2024-06-11 18:06:35', '2024-06-11 18:06:35', NULL, 0, 'eMackv3NUIIScLPB5oYVXWi2xI0mYE76p9lRTzia'),
(15, 'Đạt', 'Trần', 'tiendat03533@gmail.com', '0353397312', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', 27, '2024-06-11 18:22:58', '2024-06-11 18:22:58', NULL, 0, 'y8mzhMkGNKDK9ad03Ld3nwEJvFlHxpkqVVIoOh5t'),
(16, 'Hộ', 'thầy', 'tiendat03533@gmail.com', '0353397312', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', 27, '2024-06-11 19:11:56', '2024-06-11 19:13:38', NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 212, 15, 989999.00, '2024-07-11 07:16:39', '2024-06-11 07:16:39'),
(1, 214, 1, 1200000.00, '2024-07-11 07:16:39', '2024-06-11 07:16:39'),
(1, 215, 2, 499999.00, '2024-07-11 07:16:39', '2024-06-11 07:16:39'),
(2, 203, 1, 2100000.00, '2024-06-11 07:18:26', '2024-06-11 07:18:26'),
(2, 204, 5, 1700000.00, '2024-06-11 07:18:26', '2024-06-11 07:18:26'),
(2, 205, 1, 3699000.00, '2024-06-11 07:18:26', '2024-06-11 07:18:26'),
(3, 204, 4, 1700000.00, '2024-06-11 07:18:50', '2024-06-11 07:18:50'),
(3, 214, 2, 1200000.00, '2024-06-11 07:18:50', '2024-06-11 07:18:50'),
(4, 209, 3, 1000000.00, '2024-08-11 07:19:10', '2024-06-11 07:19:10'),
(4, 213, 1, 2400000.00, '2024-08-11 07:19:10', '2024-06-11 07:19:10'),
(5, 213, 1, 2400000.00, '2024-06-11 07:20:41', '2024-06-11 07:20:41'),
(6, 214, 1, 1200000.00, '2024-06-11 09:25:08', '2024-06-11 09:25:08'),
(8, 206, 1, 2800000.00, '2024-06-11 17:53:17', '2024-06-11 17:53:17'),
(9, 212, 2, 989999.00, '2024-06-11 17:54:15', '2024-06-11 17:54:15'),
(9, 213, 1, 2400000.00, '2024-06-11 17:54:15', '2024-06-11 17:54:15'),
(10, 213, 1, 2400000.00, '2024-06-11 17:54:51', '2024-06-11 17:54:51'),
(12, 209, 1, 1000000.00, '2024-06-11 17:55:25', '2024-06-11 17:55:25'),
(13, 214, 1, 1200000.00, '2024-06-11 17:58:18', '2024-06-11 17:58:18'),
(14, 204, 1, 1700000.00, '2024-06-11 18:06:35', '2024-06-11 18:06:35'),
(15, 213, 3, 2400000.00, '2024-06-11 18:22:58', '2024-06-11 18:22:58'),
(15, 214, 1, 1200000.00, '2024-06-11 18:22:58', '2024-06-11 18:22:58'),
(16, 204, 1, 1700000.00, '2024-06-11 19:11:56', '2024-06-11 19:11:56'),
(16, 214, 2, 1200000.00, '2024-06-11 19:11:56', '2024-06-11 19:11:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$2sRiBSoJ7.UPsydc5JqzSumXAoEWyfTp8VoJFoZAIx8JIHOv1Gz9G', '2024-05-26 08:04:19'),
('tiendat03533@gmail.com', '$2y$12$gdwAcChh.zHhIWl52PZImO1dyor6qVMr/g87n9Eb0V8CRRXaBOBD.', '2024-06-04 02:34:08'),
('tiendat97312@gmail.com', '$2y$12$C2SYXR910iF57WGP2BPpPOrnBMtqIDs95FzeTfTD6VyPIlsmgzmWG', '2024-06-04 18:06:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_sale` decimal(10,2) DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `view` bigint UNSIGNED DEFAULT NULL,
  `quantity` bigint UNSIGNED NOT NULL DEFAULT '0',
  `sold` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `price_sale`, `category_id`, `view`, `quantity`, `sold`, `description`, `active`, `created_at`, `updated_at`, `content`) VALUES
(203, 'Đèn Lưới Sang Trọng', '1716301124.webp', 2300000.00, 2100000.00, 6, 98031, 15, 100, '<p>Điểm nổi bật\r\n\r\nMột thiết kế hiện đại giữa thế kỷ mang tính biểu tượng\r\nĐược thiết kế bởi nhà thiết kế người Đan Mạch nổi tiếng thế giới Verner Panton\r\nCó thể điều chỉnh độ sáng để thiết lập tâm trạng trong không gian của bạn\r\nCung cấp ánh sáng xung quanh khuếch tán nhẹ nhàng\r\nHãy gọi cho nhóm bán hàng của chúng tôi theo số 1-888-222-4410 để có thêm tùy chọn dây UL.\r\n\r\nThiết kế bởi\r\nVerner Panton\r\nCuộc họp\r\nYêu cầu lắp ráp\r\n\r\nCài đặt &amp; lắp ráp (PDF)\r\n\r\nHướng dẫn bảo quản\r\nLau bụi bằng vải khô mềm hoặc chỉ làm ẩm bằng nước và lau khô ngay lập tức\r\nLuôn tắt nguồn điện trước khi vệ sinh\r\nMã hàng\r\nSKU được chọn hiện tại:\r\n\r\nCác SKU hiện có khác: 133094A208, 133094A208, 133082A208, 133082A208, 133089A208 HIỂN THỊ THÊM\r\n\r\nID tham chiếu\r\n\"&amp;Đèn treo lọ hoa truyền thống\" (ID chứng khoán 6556613541933)\r\n\r\nLiên hệ với dịch vụ khách hàng\r\nBạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi.\r\n\r\nDự luật 65 - California</p>', 1, '2024-05-21 07:18:44', '2024-06-23 19:37:22', 'Lấy cảm hứng từ sự tự do, tình yêu và sự hòa hợp do kỷ nguyên điện hoa mang lại, nhà thiết kế Verner Panton đã tạo ra Đèn treo lọ hoa cho &truyền thống để nắm bắt tinh thần của một phong trào. Được xác định bởi hai quả cầu hình bán nguyệt quay mặt vào nhau, mặt dây chuyền này phù hợp để cung cấp ánh sáng phía trên khu vực ăn uống yêu thích hoặc ghép thành nhiều cụm phía trên mặt bàn đảo bếp.'),
(204, 'Đèn Mặt Trăng', '1716301396.webp', 1700000.00, NULL, 6, 12024, 68, 600, '<p>Điểm nổi bật Một thiết kế hiện đại giữa thế kỷ mang tính biểu tượng Được thiết kế bởi nhà thiết kế người Đan Mạch nổi tiếng thế giới Verner Panton Có thể điều chỉnh độ sáng để thiết lập tâm trạng trong không gian của bạn Cung cấp ánh sáng xung quanh khuếch tán nhẹ nhàng Hãy gọi cho nhóm bán hàng của chúng tôi theo số 1-888-222-4410 để có thêm tùy chọn dây UL. Thiết kế bởi Verner Panton Cuộc họp Yêu cầu lắp ráp Cài đặt &amp; lắp ráp (PDF) Hướng dẫn bảo quản Lau bụi bằng vải khô mềm hoặc chỉ làm ẩm bằng nước và lau khô ngay lập tức Luôn tắt nguồn điện trước khi vệ sinh Mã hàng SKU được chọn hiện tại: Các SKU hiện có khác: 133094A208, 133094A208, 133082A208, 133082A208, 133089A208 HIỂN THỊ THÊM ID tham chiếu \"&amp;Đèn treo lọ hoa truyền thống\" (ID chứng khoán 6556613541933) Liên hệ với dịch vụ khách hàng Bạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi. Dự luật 65 - California</p>', 1, '2024-05-21 07:23:16', '2024-06-11 07:18:37', '<p>Điểm nổi bật\r\n\r\nMột thiết kế hiện đại giữa thế kỷ mang tính biểu tượng\r\nĐược thiết kế bởi nhà thiết kế người Đan Mạch nổi tiếng thế giới Verner Panton\r\nCó thể điều chỉnh độ sáng để thiết lập tâm trạng trong không gian của bạn\r\nCung cấp ánh sáng xung quanh khuếch tán nhẹ nhàng\r\nHãy gọi cho nhóm bán hàng của chúng tôi theo số 1-888-222-4410 để có thêm tùy chọn dây UL.\r\n\r\nThiết kế bởi\r\nVerner Panton\r\nCuộc họp\r\nYêu cầu lắp ráp\r\n\r\nCài đặt &amp; lắp ráp (PDF)\r\n\r\nHướng dẫn bảo quản\r\nLau bụi bằng vải khô mềm hoặc chỉ làm ẩm bằng nước và lau khô ngay lập tức\r\nLuôn tắt nguồn điện trước khi vệ sinh\r\nMã hàng\r\nSKU được chọn hiện tại:\r\n\r\nCác SKU hiện có khác: 133094A208, 133094A208, 133082A208, 133082A208, 133089A208 HIỂN THỊ THÊM\r\n\r\nID tham chiếu\r\n\"&amp;Đèn treo lọ hoa truyền thống\" (ID chứng khoán 6556613541933)\r\n\r\nLiên hệ với dịch vụ khách hàng\r\nBạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi.\r\n\r\nDự luật 65 - California</p>'),
(205, 'Đèn Treo Terho', '1716301551.webp', 3700000.00, 3699000.00, 6, 32193, 203, 12000, '<p>Điểm nổi bật\r\n\r\nMột thiết kế hiện đại giữa thế kỷ mang tính biểu tượng\r\nĐược thiết kế bởi nhà thiết kế người Đan Mạch nổi tiếng thế giới Verner Panton\r\nCó thể điều chỉnh độ sáng để thiết lập tâm trạng trong không gian của bạn\r\nCung cấp ánh sáng xung quanh khuếch tán nhẹ nhàng\r\nHãy gọi cho nhóm bán hàng của chúng tôi theo số 1-888-222-4410 để có thêm tùy chọn dây UL.\r\n\r\nThiết kế bởi\r\nVerner Panton\r\nCuộc họp\r\nYêu cầu lắp ráp\r\n\r\nCài đặt &amp; lắp ráp (PDF)\r\n\r\nHướng dẫn bảo quản\r\nLau bụi bằng vải khô mềm hoặc chỉ làm ẩm bằng nước và lau khô ngay lập tức\r\nLuôn tắt nguồn điện trước khi vệ sinh\r\nMã hàng\r\nSKU được chọn hiện tại:\r\n\r\nCác SKU hiện có khác: 133094A208, 133094A208, 133082A208, 133082A208, 133089A208 HIỂN THỊ THÊM\r\n\r\nID tham chiếu\r\n\"&amp;Đèn treo lọ hoa truyền thống\" (ID chứng khoán 6556613541933)\r\n\r\nLiên hệ với dịch vụ khách hàng\r\nBạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi.\r\n\r\nDự luật 65 - California</p>', 1, '2024-05-21 07:25:51', '2024-06-09 10:28:17', 'Lấy cảm hứng từ sự tự do, tình yêu và sự hòa hợp do kỷ nguyên điện hoa mang lại, nhà thiết kế Verner Panton đã tạo ra Đèn treo lọ hoa cho &truyền thống để nắm bắt tinh thần của một phong trào. Được xác định bởi hai quả cầu hình bán nguyệt quay mặt vào nhau, mặt dây chuyền này phù hợp để cung cấp ánh sáng phía trên khu vực ăn uống yêu thích hoặc ghép thành nhiều cụm phía trên mặt bàn đảo bếp.'),
(206, 'Đèn Khung Gỗ', '1716301662.webp', 2800000.00, NULL, 6, 70, 20, NULL, '<p>Điểm nổi bật\r\n\r\nMột thiết kế hiện đại giữa thế kỷ mang tính biểu tượng\r\nĐược thiết kế bởi nhà thiết kế người Đan Mạch nổi tiếng thế giới Verner Panton\r\nCó thể điều chỉnh độ sáng để thiết lập tâm trạng trong không gian của bạn\r\nCung cấp ánh sáng xung quanh khuếch tán nhẹ nhàng\r\nHãy gọi cho nhóm bán hàng của chúng tôi theo số 1-888-222-4410 để có thêm tùy chọn dây UL.\r\n\r\nThiết kế bởi\r\nVerner Panton\r\nCuộc họp\r\nYêu cầu lắp ráp\r\n\r\nCài đặt &amp; lắp ráp (PDF)\r\n\r\nHướng dẫn bảo quản\r\nLau bụi bằng vải khô mềm hoặc chỉ làm ẩm bằng nước và lau khô ngay lập tức\r\nLuôn tắt nguồn điện trước khi vệ sinh\r\nMã hàng\r\nSKU được chọn hiện tại:\r\n\r\nCác SKU hiện có khác: 133094A208, 133094A208, 133082A208, 133082A208, 133089A208 HIỂN THỊ THÊM\r\n\r\nID tham chiếu\r\n\"&amp;Đèn treo lọ hoa truyền thống\" (ID chứng khoán 6556613541933)\r\n\r\nLiên hệ với dịch vụ khách hàng\r\nBạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi.\r\n\r\nDự luật 65 - California</p>', 1, '2024-05-21 07:27:42', '2024-05-21 07:27:42', 'Lấy cảm hứng từ sự tự do, tình yêu và sự hòa hợp do kỷ nguyên điện hoa mang lại, nhà thiết kế Verner Panton đã tạo ra Đèn treo lọ hoa cho &truyền thống để nắm bắt tinh thần của một phong trào. Được xác định bởi hai quả cầu hình bán nguyệt quay mặt vào nhau, mặt dây chuyền này phù hợp để cung cấp ánh sáng phía trên khu vực ăn uống yêu thích hoặc ghép thành nhiều cụm phía trên mặt bàn đảo bếp.'),
(207, 'Ghế ăn Bok', '1716301850.webp', 800000.00, 799999.00, 5, 5881, 123, NULL, '<p>miêu tả\r\n\r\nPhong cách và chắc chắn, được chế tác từ gỗ sồi nguyên khối, những đường nét duyên dáng của Ghế ăn Bok của Ethnicraft bổ sung cho nhiều loại nội thất hiện đại. Hiển thị những đường cong mềm mại, thoải mái, chiếc ghế ăn sáng sủa và thoáng mát này có đồ mộc truyền thống và nghề thủ công Scandi bền vững, đảm bảo ấn tượng lâu dài trong nhiều năm tới.\r\n\r\nĐiểm nổi bật\r\nĐược chế tác tinh xảo từ gỗ sồi nguyên khối\r\nĐồ mộc chi tiết tạo nên một thiết kế vượt thời gian, lâu dài\r\nLớp hoàn thiện bằng dầu sáp cứng giúp vân gỗ tự nhiên độc đáo tỏa sáng\r\nThiết kế bởi\r\nAlain van Havre\r\nHướng dẫn bảo quản\r\nChăm sóc bằng dầu: Nếu bị ố có thể xử lý cục bộ. Giấy nhám ngay chỗ có vết bẩn và bôi lại dầu\r\nĐể lau bụi thường xuyên, hãy sử dụng vải khô\r\nĐể làm sạch hoặc trong trường hợp bị tràn, hãy sử dụng vải ẩm và xà phòng tự nhiên\r\nLau khô bằng vải mềm sạch\r\nKhông sử dụng chất mài mòn khi vệ sinh\r\nMã hàng\r\nSKU được chọn hiện tại:\r\n\r\nCác mã hàng hiện có khác: 51490, 51491, 10156, 50073, 51550 XEM THÊM\r\n\r\nID tham chiếu\r\n\"Ghế ăn Ethnicraft Bok\" (ID chứng khoán 6536430190637)\r\n\r\nBảo hành sản phẩm\r\nĐược cung cấp bởi Ethnicraft:\r\nBảo hành 2 năm.\r\n\r\nLiên hệ với dịch vụ khách hàng\r\nBạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi.</p>', 1, '2024-05-21 07:30:50', '2024-06-08 04:12:47', 'Phong cách và chắc chắn, được chế tác từ gỗ sồi nguyên khối, những đường nét duyên dáng của Ghế ăn Bok của Ethnicraft bổ sung cho nhiều loại nội thất hiện đại. Hiển thị những đường cong mềm mại, thoải mái, chiếc ghế ăn sáng sủa và thoáng mát này có đồ mộc truyền thống và nghề thủ công Scandi bền vững, đảm bảo ấn tượng lâu dài trong nhiều năm tới.'),
(208, 'Ghế ăn ấm cúng', '1716301979.webp', 980000.00, 899999.00, 5, 12000, 200, NULL, '<p>miêu tả\r\n\r\nPhong cách và chắc chắn, được chế tác từ gỗ sồi nguyên khối, những đường nét duyên dáng của Ghế ăn Bok của Ethnicraft bổ sung cho nhiều loại nội thất hiện đại. Hiển thị những đường cong mềm mại, thoải mái, chiếc ghế ăn sáng sủa và thoáng mát này có đồ mộc truyền thống và nghề thủ công Scandi bền vững, đảm bảo ấn tượng lâu dài trong nhiều năm tới.\r\n\r\nĐiểm nổi bật\r\nĐược chế tác tinh xảo từ gỗ sồi nguyên khối\r\nĐồ mộc chi tiết tạo nên một thiết kế vượt thời gian, lâu dài\r\nLớp hoàn thiện bằng dầu sáp cứng giúp vân gỗ tự nhiên độc đáo tỏa sáng\r\nThiết kế bởi\r\nAlain van Havre\r\nHướng dẫn bảo quản\r\nChăm sóc bằng dầu: Nếu bị ố có thể xử lý cục bộ. Giấy nhám ngay chỗ có vết bẩn và bôi lại dầu\r\nĐể lau bụi thường xuyên, hãy sử dụng vải khô\r\nĐể làm sạch hoặc trong trường hợp bị tràn, hãy sử dụng vải ẩm và xà phòng tự nhiên\r\nLau khô bằng vải mềm sạch\r\nKhông sử dụng chất mài mòn khi vệ sinh\r\nMã hàng\r\nSKU được chọn hiện tại:\r\n\r\nCác mã hàng hiện có khác: 51490, 51491, 10156, 50073, 51550 XEM THÊM\r\n\r\nID tham chiếu\r\n\"Ghế ăn Ethnicraft Bok\" (ID chứng khoán 6536430190637)\r\n\r\nBảo hành sản phẩm\r\nĐược cung cấp bởi Ethnicraft:\r\nBảo hành 2 năm.\r\n\r\nLiên hệ với dịch vụ khách hàng\r\nBạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi.</p>', 1, '2024-05-21 07:32:59', '2024-05-21 07:32:59', 'Phong cách và chắc chắn, được chế tác từ gỗ sồi nguyên khối, những đường nét duyên dáng của Ghế ăn Bok của Ethnicraft bổ sung cho nhiều loại nội thất hiện đại. Hiển thị những đường cong mềm mại, thoải mái, chiếc ghế ăn sáng sủa và thoáng mát này có đồ mộc truyền thống và nghề thủ công Scandi bền vững, đảm bảo ấn tượng lâu dài trong nhiều năm tới.'),
(209, 'Ghế đan bên', '1716302090.webp', 1000000.00, NULL, 5, 29048, 60, 300, '<p>miêu tả\r\n\r\nPhong cách và chắc chắn, được chế tác từ gỗ sồi nguyên khối, những đường nét duyên dáng của Ghế ăn Bok của Ethnicraft bổ sung cho nhiều loại nội thất hiện đại. Hiển thị những đường cong mềm mại, thoải mái, chiếc ghế ăn sáng sủa và thoáng mát này có đồ mộc truyền thống và nghề thủ công Scandi bền vững, đảm bảo ấn tượng lâu dài trong nhiều năm tới.\r\n\r\nĐiểm nổi bật\r\nĐược chế tác tinh xảo từ gỗ sồi nguyên khối\r\nĐồ mộc chi tiết tạo nên một thiết kế vượt thời gian, lâu dài\r\nLớp hoàn thiện bằng dầu sáp cứng giúp vân gỗ tự nhiên độc đáo tỏa sáng\r\nThiết kế bởi\r\nAlain van Havre\r\nHướng dẫn bảo quản\r\nChăm sóc bằng dầu: Nếu bị ố có thể xử lý cục bộ. Giấy nhám ngay chỗ có vết bẩn và bôi lại dầu\r\nĐể lau bụi thường xuyên, hãy sử dụng vải khô\r\nĐể làm sạch hoặc trong trường hợp bị tràn, hãy sử dụng vải ẩm và xà phòng tự nhiên\r\nLau khô bằng vải mềm sạch\r\nKhông sử dụng chất mài mòn khi vệ sinh\r\nMã hàng\r\nSKU được chọn hiện tại:\r\n\r\nCác mã hàng hiện có khác: 51490, 51491, 10156, 50073, 51550 XEM THÊM\r\n\r\nID tham chiếu\r\n\"Ghế ăn Ethnicraft Bok\" (ID chứng khoán 6536430190637)\r\n\r\nBảo hành sản phẩm\r\nĐược cung cấp bởi Ethnicraft:\r\nBảo hành 2 năm.\r\n\r\nLiên hệ với dịch vụ khách hàng\r\nBạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi.</p>', 1, '2024-05-21 07:34:50', '2024-06-11 07:19:04', 'Phong cách và chắc chắn, được chế tác từ gỗ sồi nguyên khối, những đường nét duyên dáng của Ghế ăn Bok của Ethnicraft bổ sung cho nhiều loại nội thất hiện đại. Hiển thị những đường cong mềm mại, thoải mái, chiếc ghế ăn sáng sủa và thoáng mát này có đồ mộc truyền thống và nghề thủ công Scandi bền vững, đảm bảo ấn tượng lâu dài trong nhiều năm tới.'),
(210, 'Ghế Panton', '1716302217.webp', 2300000.00, NULL, 5, 7688, 60, NULL, '<p>miêu tả\r\n\r\nPhong cách và chắc chắn, được chế tác từ gỗ sồi nguyên khối, những đường nét duyên dáng của Ghế ăn Bok của Ethnicraft bổ sung cho nhiều loại nội thất hiện đại. Hiển thị những đường cong mềm mại, thoải mái, chiếc ghế ăn sáng sủa và thoáng mát này có đồ mộc truyền thống và nghề thủ công Scandi bền vững, đảm bảo ấn tượng lâu dài trong nhiều năm tới.\r\n\r\nĐiểm nổi bật\r\nĐược chế tác tinh xảo từ gỗ sồi nguyên khối\r\nĐồ mộc chi tiết tạo nên một thiết kế vượt thời gian, lâu dài\r\nLớp hoàn thiện bằng dầu sáp cứng giúp vân gỗ tự nhiên độc đáo tỏa sáng\r\nThiết kế bởi\r\nAlain van Havre\r\nHướng dẫn bảo quản\r\nChăm sóc bằng dầu: Nếu bị ố có thể xử lý cục bộ. Giấy nhám ngay chỗ có vết bẩn và bôi lại dầu\r\nĐể lau bụi thường xuyên, hãy sử dụng vải khô\r\nĐể làm sạch hoặc trong trường hợp bị tràn, hãy sử dụng vải ẩm và xà phòng tự nhiên\r\nLau khô bằng vải mềm sạch\r\nKhông sử dụng chất mài mòn khi vệ sinh\r\nMã hàng\r\nSKU được chọn hiện tại:\r\n\r\nCác mã hàng hiện có khác: 51490, 51491, 10156, 50073, 51550 XEM THÊM\r\n\r\nID tham chiếu\r\n\"Ghế ăn Ethnicraft Bok\" (ID chứng khoán 6536430190637)\r\n\r\nBảo hành sản phẩm\r\nĐược cung cấp bởi Ethnicraft:\r\nBảo hành 2 năm.\r\n\r\nLiên hệ với dịch vụ khách hàng\r\nBạn có câu hỏi nào về sản phẩm này không? Cần giúp đỡ tìm kiếm một cái gì đó? Đội ngũ Dịch vụ Khách hàng chuyên nghiệp của chúng tôi luôn sẵn sàng trợ giúp. Hãy gọi cho chúng tôi theo số (888) 222-4410 hoặc gửi email cho chúng tôi.</p>', 1, '2024-05-21 07:36:57', '2024-06-08 03:34:38', 'Phong cách và chắc chắn, được chế tác từ gỗ sồi nguyên khối, những đường nét duyên dáng của Ghế ăn Bok của Ethnicraft bổ sung cho nhiều loại nội thất hiện đại. Hiển thị những đường cong mềm mại, thoải mái, chiếc ghế ăn sáng sủa và thoáng mát này có đồ mộc truyền thống và nghề thủ công Scandi bền vững, đảm bảo ấn tượng lâu dài trong nhiều năm tới.'),
(212, 'Bộ dao kéo 5 món Arne Jacobsen', '1716302920.webp', 1100000.00, 989999.00, 4, 20192, 300, NULL, '<p>miêu tả\r\n\r\nTrông hiện đại một cách ấn tượng như ngày đầu tiên được tạo ra vào năm 1957, bộ dao kéo Arne Jacobsen thực sự là một phần của lịch sử. Mang tính cách mạng vào thời điểm đó, hình dáng tối giản và tinh gọn là sự khởi đầu hoàn toàn so với bộ đồ ăn cổ điển nhưng đã sớm xác định một phong trào quan trọng trong thiết kế Scandinavian giữa thế kỷ. Lớp hoàn thiện mờ của thép không gỉ làm tăng thêm cảm giác hiện đại cho bộ dao và nĩa để bàn, nĩa bắt đầu, thìa tráng miệng và thìa cà phê này.\r\n\r\nArne Jacobsen có lẽ là nhà thiết kế hiện đại nổi tiếng và nổi tiếng nhất Đan Mạch. Công việc của ông trải dài từ thiết kế sản phẩm đến kiến ​​trúc, dệt may đến đồ nội thất và đã ảnh hưởng đến nhiều thế hệ con người sáng tạo kể từ đó. Di sản của ông thực sự xứng đáng với từ mang tính biểu tượng.\r\n\r\nBộ năm chiếc dao kéo được làm từ thép không gỉ hoàn thiện mờ.</p>', 1, '2024-05-21 07:48:40', '2024-06-11 07:16:07', 'Trông hiện đại một cách ấn tượng như ngày đầu tiên được tạo ra vào năm 1957, bộ dao kéo Arne Jacobsen thực sự là một phần của lịch sử. Mang tính cách mạng vào thời điểm đó, hình dáng tối giản và tinh gọn là sự khởi đầu hoàn toàn so với bộ đồ ăn cổ điển nhưng đã sớm xác định một phong trào quan trọng trong thiết kế Scandinavian giữa thế kỷ. Lớp hoàn thiện mờ của thép không gỉ làm tăng thêm cảm giác hiện đại cho bộ dao và nĩa để bàn, nĩa bắt đầu, thìa tráng miệng và thìa cà phê này.'),
(213, 'Khay kẹp', '1716303043.webp', 2400000.00, NULL, 4, 150471, 51, 800, '<p>miêu tả\r\n\r\nTrông hiện đại một cách ấn tượng như ngày đầu tiên được tạo ra vào năm 1957, bộ dao kéo Arne Jacobsen thực sự là một phần của lịch sử. Mang tính cách mạng vào thời điểm đó, hình dáng tối giản và tinh gọn là sự khởi đầu hoàn toàn so với bộ đồ ăn cổ điển nhưng đã sớm xác định một phong trào quan trọng trong thiết kế Scandinavian giữa thế kỷ. Lớp hoàn thiện mờ của thép không gỉ làm tăng thêm cảm giác hiện đại cho bộ dao và nĩa để bàn, nĩa bắt đầu, thìa tráng miệng và thìa cà phê này.\r\n\r\nArne Jacobsen có lẽ là nhà thiết kế hiện đại nổi tiếng và nổi tiếng nhất Đan Mạch. Công việc của ông trải dài từ thiết kế sản phẩm đến kiến ​​trúc, dệt may đến đồ nội thất và đã ảnh hưởng đến nhiều thế hệ con người sáng tạo kể từ đó. Di sản của ông thực sự xứng đáng với từ mang tính biểu tượng.\r\n\r\nBộ năm chiếc dao kéo được làm từ thép không gỉ hoàn thiện mờ.</p>', 1, '2024-05-21 07:50:43', '2024-06-10 23:50:57', 'Trông hiện đại một cách ấn tượng như ngày đầu tiên được tạo ra vào năm 1957, bộ dao kéo Arne Jacobsen thực sự là một phần của lịch sử. Mang tính cách mạng vào thời điểm đó, hình dáng tối giản và tinh gọn là sự khởi đầu hoàn toàn so với bộ đồ ăn cổ điển nhưng đã sớm xác định một phong trào quan trọng trong thiết kế Scandinavian giữa thế kỷ. Lớp hoàn thiện mờ của thép không gỉ làm tăng thêm cảm giác hiện đại cho bộ dao và nĩa để bàn, nĩa bắt đầu, thìa tráng miệng và thìa cà phê này.'),
(214, 'Khay phục vụ ban công', '1716303147.webp', 1500000.00, 1200000.00, 4, 864592, 80, NULL, '<p>miêu tả Trông hiện đại một cách ấn tượng như ngày đầu tiên được tạo ra vào năm 1957, bộ dao kéo Arne Jacobsen thực sự là một phần của lịch sử. Mang tính cách mạng vào thời điểm đó, hình dáng tối giản và tinh gọn là sự khởi đầu hoàn toàn so với bộ đồ ăn cổ điển nhưng đã sớm xác định một phong trào quan trọng trong thiết kế Scandinavian giữa thế kỷ. Lớp hoàn thiện mờ của thép không gỉ làm tăng thêm cảm giác hiện đại cho bộ dao và nĩa để bàn, nĩa bắt đầu, thìa tráng miệng và thìa cà phê này. Arne Jacobsen có lẽ là nhà thiết kế hiện đại nổi tiếng và nổi tiếng nhất Đan Mạch. Công việc của ông trải dài từ thiết kế sản phẩm đến kiến ​​trúc, dệt may đến đồ nội thất và đã ảnh hưởng đến nhiều thế hệ con người sáng tạo kể từ đó. Di sản của ông thực sự xứng đáng với từ mang tính biểu tượng. Bộ năm chiếc dao kéo được làm từ thép không gỉ hoàn thiện mờ.</p>', 1, '2024-05-21 07:52:27', '2024-06-11 07:18:44', 'Trông hiện đại một cách ấn tượng như ngày đầu tiên được tạo ra vào năm 1957, bộ dao kéo Arne Jacobsen thực sự là một phần của lịch sử. Mang tính cách mạng vào thời điểm đó, hình dáng tối giản và tinh gọn là sự khởi đầu hoàn toàn so với bộ đồ ăn cổ điển nhưng đã sớm xác định một phong trào quan trọng trong thiết kế Scandinavian giữa thế kỷ. Lớp hoàn thiện mờ của thép không gỉ làm tăng thêm cảm giác hiện đại cho bộ dao và nĩa để bàn, nĩa bắt đầu, thìa tráng miệng và thìa cà phê này.'),
(215, 'Tấm lót bàn Basketweave', '1716303260.jpg', 500000.00, 499999.00, 4, 123785, 500, 90, '<p>miêu tả Trông hiện đại một cách ấn tượng như ngày đầu tiên được tạo ra vào năm 1957, bộ dao kéo Arne Jacobsen thực sự là một phần của lịch sử. Mang tính cách mạng vào thời điểm đó, hình dáng tối giản và tinh gọn là sự khởi đầu hoàn toàn so với bộ đồ ăn cổ điển nhưng đã sớm xác định một phong trào quan trọng trong thiết kế Scandinavian giữa thế kỷ. Lớp hoàn thiện mờ của thép không gỉ làm tăng thêm cảm giác hiện đại cho bộ dao và nĩa để bàn, nĩa bắt đầu, thìa tráng miệng và thìa cà phê này. Arne Jacobsen có lẽ là nhà thiết kế hiện đại nổi tiếng và nổi tiếng nhất Đan Mạch. Công việc của ông trải dài từ thiết kế sản phẩm đến kiến ​​trúc, dệt may đến đồ nội thất và đã ảnh hưởng đến nhiều thế hệ con người sáng tạo kể từ đó. Di sản của ông thực sự xứng đáng với từ mang tính biểu tượng. Bộ năm chiếc dao kéo được làm từ thép không gỉ hoàn thiện mờ.</p>', 1, '2024-05-21 07:54:20', '2024-06-23 19:47:55', 'Trông hiện đại một cách ấn tượng như ngày đầu tiên được tạo ra vào năm 1957, bộ dao kéo Arne Jacobsen thực sự là một phần của lịch sử. Mang tính cách mạng vào thời điểm đó, hình dáng tối giản và tinh gọn là sự khởi đầu hoàn toàn so với bộ đồ ăn cổ điển nhưng đã sớm xác định một phong trào quan trọng trong thiết kế Scandinavian giữa thế kỷ. Lớp hoàn thiện mờ của thép không gỉ làm tăng thêm cảm giác hiện đại cho bộ dao và nĩa để bàn, nĩa bắt đầu, thìa tráng miệng và thìa cà phê này.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dK8hQlJarAJ7ADWfJbJUYEbqRtdtlQ7oNl3HU7bF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYThvdUM2UExLWWdTM1FkSVc2UXNnMXp2cXdMVVFsdUxZcXZGMEhnciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719196517),
('Hi7UA9MQS3YLCsdP60VFB1SMhENnebTTaYCalXGt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGtJQjBTa2Y5RVBqR0pJYm4ySlV4SU5KTk92SmY0WmZpWnFQd2FZOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719197456);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(143, 203, 'uploads/thumbnails/1716301124_664cad44e4e13.webp', '2024-05-21 07:18:44', '2024-05-21 07:18:44'),
(144, 203, 'uploads/thumbnails/1716301124_664cad44e5664.webp', '2024-05-21 07:18:44', '2024-05-21 07:18:44'),
(145, 203, 'uploads/thumbnails/1716301124_664cad44e5c68.webp', '2024-05-21 07:18:44', '2024-05-21 07:18:44'),
(146, 203, 'uploads/thumbnails/1716301124_664cad44e6290.webp', '2024-05-21 07:18:44', '2024-05-21 07:18:44'),
(147, 204, 'uploads/thumbnails/1716301396_664cae54de06b.webp', '2024-05-21 07:23:16', '2024-05-21 07:23:16'),
(148, 204, 'uploads/thumbnails/1716301396_664cae54df337.webp', '2024-05-21 07:23:16', '2024-05-21 07:23:16'),
(149, 204, 'uploads/thumbnails/1716301396_664cae54df9bb.webp', '2024-05-21 07:23:16', '2024-05-21 07:23:16'),
(150, 204, 'uploads/thumbnails/1716301396_664cae54dfff4.webp', '2024-05-21 07:23:16', '2024-05-21 07:23:16'),
(151, 205, 'uploads/thumbnails/1716301551_664caeef49438.webp', '2024-05-21 07:25:51', '2024-05-21 07:25:51'),
(152, 205, 'uploads/thumbnails/1716301551_664caeef49d84.webp', '2024-05-21 07:25:51', '2024-05-21 07:25:51'),
(153, 205, 'uploads/thumbnails/1716301551_664caeef4a42f.webp', '2024-05-21 07:25:51', '2024-05-21 07:25:51'),
(154, 205, 'uploads/thumbnails/1716301551_664caeef4aad7.webp', '2024-05-21 07:25:51', '2024-05-21 07:25:51'),
(155, 206, 'uploads/thumbnails/1716301662_664caf5e3d188.webp', '2024-05-21 07:27:42', '2024-05-21 07:27:42'),
(156, 206, 'uploads/thumbnails/1716301662_664caf5e3da36.webp', '2024-05-21 07:27:42', '2024-05-21 07:27:42'),
(157, 206, 'uploads/thumbnails/1716301662_664caf5e3e091.webp', '2024-05-21 07:27:42', '2024-05-21 07:27:42'),
(158, 206, 'uploads/thumbnails/1716301662_664caf5e3e6d7.webp', '2024-05-21 07:27:42', '2024-05-21 07:27:42'),
(159, 207, 'uploads/thumbnails/1716301850_664cb01ae9e65.webp', '2024-05-21 07:30:50', '2024-05-21 07:30:50'),
(160, 207, 'uploads/thumbnails/1716301850_664cb01aea6d2.webp', '2024-05-21 07:30:50', '2024-05-21 07:30:50'),
(161, 207, 'uploads/thumbnails/1716301850_664cb01aead10.webp', '2024-05-21 07:30:50', '2024-05-21 07:30:50'),
(162, 207, 'uploads/thumbnails/1716301850_664cb01aeb357.webp', '2024-05-21 07:30:50', '2024-05-21 07:30:50'),
(163, 208, 'uploads/thumbnails/1716301979_664cb09bce6fe.webp', '2024-05-21 07:32:59', '2024-05-21 07:32:59'),
(164, 208, 'uploads/thumbnails/1716301979_664cb09bcf0df.webp', '2024-05-21 07:32:59', '2024-05-21 07:32:59'),
(165, 208, 'uploads/thumbnails/1716301979_664cb09bcf8c0.webp', '2024-05-21 07:32:59', '2024-05-21 07:32:59'),
(166, 208, 'uploads/thumbnails/1716301979_664cb09bcff0b.webp', '2024-05-21 07:32:59', '2024-05-21 07:32:59'),
(167, 209, 'uploads/thumbnails/1716302090_664cb10ae6587.webp', '2024-05-21 07:34:50', '2024-05-21 07:34:50'),
(168, 209, 'uploads/thumbnails/1716302090_664cb10ae6dc8.webp', '2024-05-21 07:34:50', '2024-05-21 07:34:50'),
(169, 209, 'uploads/thumbnails/1716302090_664cb10ae73f4.webp', '2024-05-21 07:34:50', '2024-05-21 07:34:50'),
(170, 209, 'uploads/thumbnails/1716302090_664cb10ae7a1a.webp', '2024-05-21 07:34:50', '2024-05-21 07:34:50'),
(171, 210, 'uploads/thumbnails/1716302217_664cb189e96a1.webp', '2024-05-21 07:36:57', '2024-05-21 07:36:57'),
(172, 210, 'uploads/thumbnails/1716302217_664cb189e9ea9.webp', '2024-05-21 07:36:57', '2024-05-21 07:36:57'),
(173, 210, 'uploads/thumbnails/1716302217_664cb189ea583.webp', '2024-05-21 07:36:57', '2024-05-21 07:36:57'),
(174, 210, 'uploads/thumbnails/1716302217_664cb189eac2b.webp', '2024-05-21 07:36:57', '2024-05-21 07:36:57'),
(179, 212, 'uploads/thumbnails/1716302920_664cb4484bc79.webp', '2024-05-21 07:48:40', '2024-05-21 07:48:40'),
(180, 212, 'uploads/thumbnails/1716302920_664cb4484c3d7.jpg', '2024-05-21 07:48:40', '2024-05-21 07:48:40'),
(181, 212, 'uploads/thumbnails/1716302920_664cb4484c9a1.webp', '2024-05-21 07:48:40', '2024-05-21 07:48:40'),
(182, 213, 'uploads/thumbnails/1716303043_664cb4c36a795.webp', '2024-05-21 07:50:43', '2024-05-21 07:50:43'),
(183, 213, 'uploads/thumbnails/1716303043_664cb4c36af47.webp', '2024-05-21 07:50:43', '2024-05-21 07:50:43'),
(184, 213, 'uploads/thumbnails/1716303043_664cb4c36b486.webp', '2024-05-21 07:50:43', '2024-05-21 07:50:43'),
(185, 213, 'uploads/thumbnails/1716303043_664cb4c36ba3a.webp', '2024-05-21 07:50:43', '2024-05-21 07:50:43'),
(186, 214, 'uploads/thumbnails/1716303147_664cb52bec79e.webp', '2024-05-21 07:52:27', '2024-05-21 07:52:27'),
(187, 214, 'uploads/thumbnails/1716303147_664cb52beceb9.webp', '2024-05-21 07:52:27', '2024-05-21 07:52:27'),
(188, 214, 'uploads/thumbnails/1716303147_664cb52bed4a8.webp', '2024-05-21 07:52:27', '2024-05-21 07:52:27'),
(189, 214, 'uploads/thumbnails/1716303147_664cb52beda56.webp', '2024-05-21 07:52:27', '2024-05-21 07:52:27'),
(190, 215, 'uploads/thumbnails/1716303260_664cb59c6bbb4.webp', '2024-05-21 07:54:20', '2024-05-21 07:54:20'),
(191, 215, 'uploads/thumbnails/1716303260_664cb59c6c396.webp', '2024-05-21 07:54:20', '2024-05-21 07:54:20'),
(192, 215, 'uploads/thumbnails/1716303260_664cb59c6c979.jpg', '2024-05-21 07:54:20', '2024-05-21 07:54:20'),
(193, 215, 'uploads/thumbnails/1716303260_664cb59c6cee7.jpg', '2024-05-21 07:54:20', '2024-05-21 07:54:20'),
(224, 214, 'uploads/thumbnails/1716525180_6650187c7f52b.jpg', '2024-05-23 21:33:00', '2024-05-23 21:33:00'),
(225, 214, 'uploads/thumbnails/1716525180_6650187c8028c.webp', '2024-05-23 21:33:00', '2024-05-23 21:33:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` bigint UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `first_name`, `address`, `phone`, `roles`, `image`) VALUES
(21, 'tiendat97312@gmail.com', '2024-06-06 10:27:33', '$2y$12$9i3Z96T4o1BSBV6HPC8AN.oXDs5UUaJe2tGKdMx7uMs/Th9nUjhke', NULL, '2024-06-06 10:27:08', '2024-06-06 10:27:33', 'Dat', 'Tran', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', '0353397312', 1, NULL),
(27, 'tiendat03533@gmail.com', '2024-06-06 10:34:51', '$2y$12$MJmLeBtTEWO12AYqYtjexOk05LixrMLD4XFNY84QO6C/FAjygsdBa', NULL, '2024-06-06 10:34:31', '2024-06-10 23:22:52', 'Trần', 'Đạt', '261 Sheffield Road, Birdwell, Barnsley, S70 5TN', '0353397312', 0, NULL),
(28, 'datttps32744@fpt.edu.vn', NULL, '$2y$12$wgtspIYZ/yeM1Vkz4nO2TeIwLMjyjSEHS72jzotCfcUrQPVrLjENO', NULL, '2024-06-11 07:14:23', '2024-06-11 07:14:23', 'Nguyễn', 'Quý', '125/5 An Phú Đông quận 12', '0353397312', 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thumbnails_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT cho bảng `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD CONSTRAINT `thumbnails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
