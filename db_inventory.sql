-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 07:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_announcement`
--

CREATE TABLE `m_announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_announcement`
--

INSERT INTO `m_announcement` (`id`, `title`, `id_category`, `description`, `id_status`, `created_at`, `created_by`, `update_at`, `update_by`) VALUES
(16, 'wywr', 2, '<p>wrywywry</p>', 0, '2024-02-28 13:14:10', 1, '2024-02-28 13:14:10', 1),
(17, 'tesss', 2, '<p>tesss</p>', 0, '2024-02-28 13:14:19', 1, '2024-02-28 13:14:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_brand`
--

CREATE TABLE `m_brand` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `id_origin` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_brand`
--

INSERT INTO `m_brand` (`id`, `label`, `id_origin`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Asus', '1', '2023-10-02 09:05:41', 1, '2023-10-02 09:05:41', 1),
(2, 'Acer', '1', '2023-10-25 11:37:11', 1, '2023-10-25 11:37:11', 1),
(4, 'Lenovo', '2', '2024-02-22 10:04:38', 1, '2024-02-22 10:04:38', 1),
(5, 'Logitech', '3', '2024-02-26 10:44:51', 1, '2024-02-26 10:44:51', 1),
(8, 'Hp', '1', '2024-02-27 14:03:56', 0, '2024-02-27 14:03:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_category`
--

CREATE TABLE `m_category` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_category`
--

INSERT INTO `m_category` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'Personal Komputer', '2024-02-23 14:12:03', 1, '2024-02-23 14:12:03', 1),
(6, 'Komputer Server', '2024-02-27 10:36:34', 0, '2024-02-27 10:36:34', 0),
(7, 'Notebook', '2024-02-27 10:36:34', 0, '2024-02-27 10:36:34', 0),
(13, '-', '2024-02-27 14:04:24', 0, '2024-02-27 14:04:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_category_announcement`
--

CREATE TABLE `m_category_announcement` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_category_announcement`
--

INSERT INTO `m_category_announcement` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'afagadgadgadgadgadg', '2024-02-28 11:37:23', 0, '2024-02-28 13:14:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_item`
--

CREATE TABLE `m_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `asset_no` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `warranty` varchar(255) NOT NULL,
  `serial_number` char(11) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_item`
--

INSERT INTO `m_item` (`id`, `name`, `id_category`, `asset_no`, `description`, `id_status`, `id_brand`, `id_vendor`, `warranty`, `serial_number`, `photo`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(203, 'Komputer', 3, '01/YPAP/IT/2023', 'RAM : 4 GB, SSD : 256GB', 1, 1, 3, '3 Tahun', 'SN202590', '65dea96f36569.jpg', '2024-02-26 10:42:21', 1, '2024-02-28 10:54:29', 1),
(204, 'Laptop', 3, '02/YPAP/IT/2023', 'RAM : 4 GB, SSD : 256GB', 1, 1, 2, '2 Tahun', 'SN806532', '65dd945c76769.jpg', '2024-02-26 10:48:12', 1, '2024-02-28 10:32:54', 1),
(205, 'Mouse', 3, '03/YPAP/IT/2023', 'Panjang Kabel : 10 cm', 1, 1, 2, '4 Tahun', 'SN232070', '65dea6db23aec.jpg', '2024-02-26 10:49:38', 1, '2024-02-28 10:22:03', 1),
(221, 'Laptop', 6, '32/135/5135', '---', 0, 2, 3, '--', '--', 'default.jpg', '2024-02-27 14:37:49', 1, '2024-02-27 14:37:49', 1),
(222, 'Mouse', 3, '32/135/5135', '', 0, 2, 2, '', '', 'default.jpg', '2024-02-27 14:42:22', 1, '2024-02-27 14:42:22', 1),
(225, 'tesss', 13, 'tetet', '', 0, 1, 3, '', '', 'default.jpg', '2024-02-28 10:43:17', 1, '2024-02-28 10:43:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_location`
--

CREATE TABLE `m_location` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `floor` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_location`
--

INSERT INTO `m_location` (`id`, `label`, `floor`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Lantai 5', 5, '2024-01-31 10:24:59', 1, '2024-01-31 10:24:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_log`
--

CREATE TABLE `m_log` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_warehouse` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `qty1` int(11) NOT NULL,
  `qty2` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_log`
--

INSERT INTO `m_log` (`id`, `id_item`, `id_warehouse`, `description`, `qty1`, `qty2`, `created_at`, `created_by`, `update_at`, `update_by`) VALUES
(1, 203, 2, 1, 20, 15, '2024-02-28 06:04:08', 0, '2024-02-28 13:04:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_origin`
--

CREATE TABLE `m_origin` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_origin`
--

INSERT INTO `m_origin` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'Indonesia', '2024-02-23 13:50:35', 0, '2024-02-23 13:50:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_role`
--

CREATE TABLE `m_role` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_role`
--

INSERT INTO `m_role` (`id`, `label`, `level`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Super Admin', 1, '2023-12-14 11:34:24', 1, '2023-12-14 11:34:24', 1),
(2, 'Admin', 2, '2023-12-14 13:55:32', 1, '2023-12-14 14:19:19', 1),
(3, 'Admin Warehouse', 3, '2024-01-22 13:29:18', 1, '2024-01-22 13:29:18', 1),
(4, 'User', 4, '2024-01-22 13:31:47', 1, '2024-01-22 13:31:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_stock`
--

CREATE TABLE `m_stock` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_warehouse` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id`, `name`, `username`, `password`, `email`, `id_role`, `photo`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Muhammad Supriyadi', 'musupadi', '202cb962ac59075b964b07152d234b70', 'musupadi159@gmail.com', 1, 'logo.jpg', '2023-12-14 11:35:12', 1, '2024-02-28 10:39:27', 1),
(3, 'Admin Warehouse', 'adminwarehouse', '202cb962ac59075b964b07152d234b70', 'admin', 3, 'logo.jpg', '2024-01-22 13:33:01', 1, '2024-01-22 13:33:37', 1),
(4, 'Rizky', '123', '202cb962ac59075b964b07152d234b70', 'tes@gmail.com', 1, 'Luxury_Disease4.jpg', '2024-02-07 09:16:00', 1, '2024-02-28 10:56:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_vendor`
--

CREATE TABLE `m_vendor` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_vendor`
--

INSERT INTO `m_vendor` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'PT. Lenovo Group', '2024-02-22 10:04:07', 1, '2024-02-22 10:04:07', 1),
(3, 'PT. Kreasi Utama Mandiri', '2024-02-26 10:44:14', 1, '2024-02-26 10:44:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_warehouse`
--

CREATE TABLE `m_warehouse` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_location` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_warehouse`
--

INSERT INTO `m_warehouse` (`id`, `id_user`, `name`, `description`, `id_location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Main Warehouse', 'Main Warehouse', 0, '2024-01-09 14:35:30', 1, '2024-01-22 09:41:38', 1),
(2, 2, 'Secondary Warehouse', 'Secondary Warehouse', 0, '2024-01-22 09:41:51', 1, '2024-01-22 09:41:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_item`
--

CREATE TABLE `tr_item` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_warehouse` int(11) NOT NULL,
  `status_handover` int(11) NOT NULL,
  `handover_date` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tr_item`
--

INSERT INTO `tr_item` (`id`, `id_user`, `id_item`, `id_warehouse`, `status_handover`, `handover_date`, `image`, `status`, `qty`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(12, 1, 203, 1, 1, '2024-02-27', '', 0, 5, '2024-02-27 10:57:39', 0, '2024-02-27 12:23:34', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_announcement`
--
ALTER TABLE `m_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_brand`
--
ALTER TABLE `m_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_category`
--
ALTER TABLE `m_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_category_announcement`
--
ALTER TABLE `m_category_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_category`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `m_location`
--
ALTER TABLE `m_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_log`
--
ALTER TABLE `m_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_origin`
--
ALTER TABLE `m_origin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_role`
--
ALTER TABLE `m_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_stock`
--
ALTER TABLE `m_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `m_vendor`
--
ALTER TABLE `m_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_warehouse`
--
ALTER TABLE `m_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_item`
--
ALTER TABLE `tr_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_announcement`
--
ALTER TABLE `m_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_brand`
--
ALTER TABLE `m_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_category`
--
ALTER TABLE `m_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_category_announcement`
--
ALTER TABLE `m_category_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_item`
--
ALTER TABLE `m_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `m_location`
--
ALTER TABLE `m_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_log`
--
ALTER TABLE `m_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_origin`
--
ALTER TABLE `m_origin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_role`
--
ALTER TABLE `m_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_stock`
--
ALTER TABLE `m_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_vendor`
--
ALTER TABLE `m_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_warehouse`
--
ALTER TABLE `m_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_item`
--
ALTER TABLE `tr_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
