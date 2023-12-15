-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2023 at 12:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `title_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_head` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours_of_support` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_hours` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `insta` text COLLATE utf8mb4_unicode_ci,
  `x` text COLLATE utf8mb4_unicode_ci,
  `linked_in` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title_head`, `body_head`, `photo_head`, `video_head`, `body_footer`, `video_footer`, `phone`, `address`, `email`, `hours_of_support`, `workers`, `opening_hours`, `facebook`, `insta`, `x`, `linked_in`, `created_at`, `updated_at`) VALUES
(1, 'Enjoy Your Healthy Delicious Food', 'Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.', '1702595944.png', '1702595289.mp4', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident', '1702595289.mp4', '+201013230248', 'El-Minya', 'generalal@gmail.com', '72', '25', 'Mon-Sat: 11AM - 23PM , Sunday: Closed', 'https://www.facebook.com/abdelrahman.algeneral/', 'https://www.facebook.com/abdelrahman.algeneral/', NULL, NULL, '2023-12-14 21:08:09', '2023-12-14 21:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `name`, `job`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Walter White', 'Master Chef', 'Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.', '1702598081chefs-1.jpg', '2023-12-14 21:54:41', '2023-12-14 21:54:41'),
(2, 'Sarah Jhonson', 'Patissier', 'Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.', '1702598300.chefs-3.jpg', '2023-12-14 21:55:00', '2023-12-14 21:58:20'),
(3, 'William Anderson', 'Cook', 'Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.', '1702598199chefs-2.jpg', '2023-12-14 21:56:39', '2023-12-14 21:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `photo`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'John Larson', '1702597706testimonials-4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit\r\n                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.', '2023-12-14 21:48:26', '2023-12-14 21:48:26'),
(2, 'Lara Jony', '1702597752testimonials-3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit\r\n                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.', '2023-12-14 21:49:12', '2023-12-14 21:49:12'),
(3, 'soly khan', '1702597797testimonials-1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit\r\n                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.', '2023-12-14 21:49:57', '2023-12-14 21:49:57'),
(4, 'loly mezta', '1702597830testimonials-2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit\r\n                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.', '2023-12-14 21:50:30', '2023-12-14 21:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `price`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Custom Parties', '170', 'Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere. Enim facilis veritatis id est rem repudiandae nulla expedita quas.', '1702597975events-2.jpg', '2023-12-14 21:52:55', '2023-12-14 21:52:55'),
(2, 'Private Parties', '820', 'Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere. Enim facilis veritatis id est rem repudiandae nulla expedita quas.', '1702597992events-3.jpg', '2023-12-14 21:53:12', '2023-12-14 21:53:12'),
(3, 'Birthday Parties', '70', 'Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere. Enim facilis veritatis id est rem repudiandae nulla expedita quas.', '1702598027events-2.jpg', '2023-12-14 21:53:47', '2023-12-14 21:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gallery`, `created_at`, `updated_at`) VALUES
(1, '1702598477gallery-1.jpg', '2023-12-14 22:01:17', '2023-12-14 22:01:17'),
(2, '1702598480gallery-2.jpg', '2023-12-14 22:01:20', '2023-12-14 22:01:20'),
(3, '1702598482gallery-3.jpg', '2023-12-14 22:01:22', '2023-12-14 22:01:22'),
(4, '1702598485gallery-4.jpg', '2023-12-14 22:01:25', '2023-12-14 22:01:25'),
(5, '1702598487gallery-5.jpg', '2023-12-14 22:01:27', '2023-12-14 22:01:27'),
(6, '1702598490gallery-4.jpg', '2023-12-14 22:01:30', '2023-12-14 22:01:30'),
(7, '1702598493gallery-6.jpg', '2023-12-14 22:01:33', '2023-12-14 22:01:33'),
(8, '1702598495gallery-7.jpg', '2023-12-14 22:01:35', '2023-12-14 22:01:35'),
(9, '1702598497gallery-8.jpg', '2023-12-14 22:01:37', '2023-12-14 22:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `components` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `components`, `price`, `photo`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'Magnam Tiste', 'Lorem, deren, trataro, filede, nerada', '5.95', '1702597433menu-item-1.png', 1, '2023-12-14 21:43:53', '2023-12-14 21:43:53'),
(2, 'Aut Luia', 'Lorem, deren, trataro, filede, nerada', '6.95', '1702597465menu-item-2.png', 1, '2023-12-14 21:44:25', '2023-12-14 21:44:25'),
(3, 'Est Eligendi', 'Lorem, deren, trataro, filede, nerada', '2.95', '1702597485menu-item-3.png', 1, '2023-12-14 21:44:45', '2023-12-14 21:44:45'),
(4, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597508menu-item-5.png', 2, '2023-12-14 21:45:08', '2023-12-14 21:45:08'),
(5, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597528menu-item-6.png', 3, '2023-12-14 21:45:28', '2023-12-14 21:45:28'),
(6, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597531menu-item-6.png', 3, '2023-12-14 21:45:31', '2023-12-14 21:45:31'),
(7, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597533menu-item-6.png', 3, '2023-12-14 21:45:33', '2023-12-14 21:45:33'),
(8, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597535menu-item-6.png', 3, '2023-12-14 21:45:35', '2023-12-14 21:45:35'),
(9, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597542menu-item-3.png', 2, '2023-12-14 21:45:42', '2023-12-14 21:45:42'),
(10, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597544menu-item-3.png', 2, '2023-12-14 21:45:44', '2023-12-14 21:45:44'),
(11, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597544menu-item-3.png', 2, '2023-12-14 21:45:44', '2023-12-14 21:45:44'),
(12, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597571menu-item-3.png', 15, '2023-12-14 21:46:11', '2023-12-14 21:46:11'),
(13, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597573menu-item-3.png', 15, '2023-12-14 21:46:13', '2023-12-14 21:46:13'),
(14, 'Eos Luibusdam', 'Lorem, deren, trataro, filede, nerada', '15.95', '1702597574menu-item-3.png', 15, '2023-12-14 21:46:14', '2023-12-14 21:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_28_025707_create_sections_table', 1),
(6, '2023_11_29_022626_create_abouts_table', 1),
(7, '2023_11_29_024909_create_meals_table', 1),
(8, '2023_11_29_134736_create_comments_table', 1),
(9, '2023_11_29_135056_create_events_table', 1),
(10, '2023_11_29_135308_create_chefs_table', 1),
(11, '2023_11_29_135435_create_galleries_table', 1),
(12, '2023_11_29_135559_create_orders_table', 1),
(13, '2023_11_29_135934_create_complaints_table', 1),
(14, '2023_12_06_201953_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0cfe6625-8f0e-45ca-8f55-aa26b82bfa38', 'App\\Notifications\\Customer', 'App\\Models\\User', 1, '{\"id\":1,\"value\":\"c-2\",\"msg\":\"New Comment By : John Larson\"}', NULL, '2023-12-14 21:48:26', '2023-12-14 21:48:26'),
('7a1f5366-9c29-4a04-a729-1f54ff366fe8', 'App\\Notifications\\Customer', 'App\\Models\\User', 1, '{\"id\":2,\"value\":\"c-2\",\"msg\":\"New Comment By : Lara Jony\"}', NULL, '2023-12-14 21:49:12', '2023-12-14 21:49:12'),
('9f4bf2e4-6c75-4672-9736-10ead47822b5', 'App\\Notifications\\Customer', 'App\\Models\\User', 1, '{\"id\":4,\"value\":\"c-2\",\"msg\":\"New Comment By : loly mezta\"}', NULL, '2023-12-14 21:50:30', '2023-12-14 21:50:30'),
('cd77eb2c-465d-4bc5-9d87-3a87fd5bcd0f', 'App\\Notifications\\Customer', 'App\\Models\\User', 1, '{\"id\":3,\"value\":\"c-2\",\"msg\":\"New Comment By : soly khan\"}', NULL, '2023-12-14 21:49:58', '2023-12-14 21:49:58'),
('def71289-2e3e-4dd2-a5ed-4049f99fcd77', 'App\\Notifications\\Customer', 'App\\Models\\User', 1, '{\"id\":1,\"value\":\"c-3\",\"msg\":\"New Request By : Abdelrahna\"}', NULL, '2023-12-14 22:00:39', '2023-12-14 22:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `date`, `time`, `number_people`, `message`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Abdelrahna', 'generalal@gmail.com', '01013230248', '2023-12-19', '20:08', '20', 'Thinks', NULL, '2023-12-14 22:00:39', '2023-12-14 22:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Starters', '2023-12-14 21:24:39', '2023-12-14 21:24:39'),
(2, 'Breakfast', '2023-12-14 21:24:50', '2023-12-14 21:24:50'),
(3, 'Lunch', '2023-12-14 21:24:58', '2023-12-14 21:24:58'),
(15, 'Dinner', '2023-12-14 21:42:53', '2023-12-14 21:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdeleahman', 'generalal700@gmail.com', NULL, '$2y$10$xcrhHMDJX60HTvNH4nJDzuc3SvgjK02JtVpwAnLCfpTNDpP8heWxW', '1', NULL, '2023-12-14 22:51:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meals_section_id_foreign` (`section_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
