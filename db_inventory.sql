-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 05:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.2.34

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_brand`
--

INSERT INTO `m_brand` (`id`, `label`, `id_origin`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Asus', '1', '2023-10-02 09:05:41', 1, '2023-10-02 09:05:41', 1),
(2, 'Acer', '1', '2023-10-25 11:37:11', 1, '2023-10-25 11:37:11', 1),
(3, 'Test', '', '2024-01-09 13:07:35', 1, '2024-01-09 13:07:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_item`
--

CREATE TABLE `m_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_type` int(11) NOT NULL,
  `asset_no` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `category` enum('Asset','Non Asset') NOT NULL DEFAULT 'Asset',
  `warranty` varchar(255) NOT NULL,
  `serial_number` char(11) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_item`
--

INSERT INTO `m_item` (`id`, `name`, `id_type`, `asset_no`, `description`, `id_status`, `id_brand`, `id_vendor`, `category`, `warranty`, `serial_number`, `photo`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(161, 'Komputer', 1, '01/YPAP/IT/PC/2015', 'Samsung', 1, 1, 1, 'Asset', '4 Tahun', '536HG25J', 'default.jpg', '2023-10-24 09:41:26', 0, '0000-00-00 00:00:00', 0),
(175, 'Handphone', 1, '2463YERGW37', 'Iphone', 1, 1, 1, 'Asset', '3 Years', '924502YUEU', '', '2023-10-25 11:38:18', 0, '0000-00-00 00:00:00', 0),
(176, 'Qrqer', 1, 'QETQET', 'Qetqet', 1, 1, 1, 'Asset', '5 Years', 'QEQET', '', '2023-10-26 09:10:56', 0, '0000-00-00 00:00:00', 0),
(177, 'Tes', 1, '2464gsr', 'aegaeg', 1, 1, 1, 'Asset', '5 ', '24twtsgs', '', '2023-10-26 09:36:57', 0, '2023-10-26 09:36:57', 0),
(178, 'Tes', 1, '2464gsr', 'aegaeg', 1, 1, 1, 'Asset', '5 ', '24twtsgs', '', '2023-10-26 09:36:59', 0, '2023-10-26 09:36:59', 0),
(179, 'Qeteqt', 1, 'QETEQT', 'Eqtqet', 1, 1, 1, 'Asset', '5 Years', 'QETQETQET', '', '2023-10-26 09:38:16', 0, '0000-00-00 00:00:00', 0),
(181, 'Sgsfg', 1, 'SFGSFG', 'Gsfgsfg', 1, 1, 1, 'Asset', '5 Years', 'SGSFG', '', '2023-10-28 20:41:18', 0, '0000-00-00 00:00:00', 0),
(182, 'Wrywrywry', 1, 'WRYWRYW', 'Wrywry', 1, 1, 1, 'Asset', '2 Years', 'WRYWRY', '', '2023-10-28 20:42:40', 0, '0000-00-00 00:00:00', 0),
(183, 'Sepeda', 1, '1308571035', 'BMX', 1, 1, 1, 'Asset', '3 Years', '816353', '', '2023-11-09 10:08:47', 0, '0000-00-00 00:00:00', 0),
(184, '12412412', 1, '21412', '412', 1, 0, 0, 'Asset', '124', '142142', '/default.jpg', '2024-01-12 10:19:27', 1, '2024-01-12 10:19:27', 1),
(185, '1', 1, '1', '1', 1, 1, 1, 'Asset', '1', '1', '65a0b4e524c76.png', '2024-01-12 10:41:25', 1, '2024-01-12 10:41:25', 1),
(186, '1', 1, '1', '1', 1, 1, 1, 'Asset', '1', '1', '65a0b513796d7.png', '2024-01-12 10:42:11', 1, '2024-01-12 10:42:11', 1),
(187, '1', 1, '1', '1', 1, 1, 1, 'Asset', '1', '1', '65a0b549de53f.png', '2024-01-12 10:43:05', 1, '2024-01-12 10:43:05', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_location`
--

INSERT INTO `m_location` (`id`, `label`, `floor`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Lantai 5', 5, '2024-01-31 10:24:59', 1, '2024-01-31 10:24:59', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_origin`
--

INSERT INTO `m_origin` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Origin 1', '2023-12-15 15:19:36', 1, '2023-12-15 15:19:36', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_role`
--

INSERT INTO `m_role` (`id`, `label`, `level`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Super Admin', 1, '2023-12-14 11:34:24', 1, '2023-12-14 11:34:24', 1),
(2, 'Admin', 2, '2023-12-14 13:55:32', 1, '2023-12-14 14:19:19', 1),
(5, 'Admin Warehouse', 3, '2024-01-22 13:29:18', 1, '2024-01-22 13:29:18', 1),
(6, 'User', 4, '2024-01-22 13:31:47', 1, '2024-01-22 13:31:47', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_stock`
--

INSERT INTO `m_stock` (`id`, `id_item`, `id_warehouse`, `qty`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 1, 10, '2024-01-22 10:03:12', '2024-01-22 10:03:12', '2024-01-22 10:03:12', '2024-01-22 10:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `m_type`
--

CREATE TABLE `m_type` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_type`
--

INSERT INTO `m_type` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Type 1', '2023-12-15 15:19:06', 1, '2023-12-15 15:19:06', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id`, `name`, `username`, `password`, `email`, `id_role`, `photo`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Muhammad Supriyadi', 'musupadi', '202cb962ac59075b964b07152d234b70', 'musupadi159@gmail.com', 1, 'logo.jpg', '2023-12-14 11:35:12', 1, '2023-12-14 17:03:28', 1),
(3, 'Admin Warehouse', 'adminwarehouse', '202cb962ac59075b964b07152d234b70', 'admin', 5, 'logo.jpg', '2024-01-22 13:33:01', 1, '2024-01-22 13:33:37', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_vendor`
--

INSERT INTO `m_vendor` (`id`, `label`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Ti', '2023-12-15 15:19:18', 1, '2023-12-15 15:19:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_warehouse`
--

CREATE TABLE `m_warehouse` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_warehouse`
--

INSERT INTO `m_warehouse` (`id`, `id_user`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Main Warehouse', 'Main Warehouse', '2024-01-09 14:35:30', 1, '2024-01-22 09:41:38', 1),
(2, 2, 'Secondary Warehouse', 'Secondary Warehouse', '2024-01-22 09:41:51', 1, '2024-01-22 09:41:51', 1);

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
  `id_location` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_item`
--

INSERT INTO `tr_item` (`id`, `id_user`, `id_item`, `id_warehouse`, `status_handover`, `handover_date`, `id_location`, `image`, `status`, `qty`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 161, 1, 0, '2024-02-06', 1, 'default.png', 2, 10, '2024-02-01 10:32:22', 0, '2024-02-06 10:16:15', 1),
(2, 1, 161, 1, 0, '2024-02-06', 1, 'default.png', 1, 10, '2024-02-06 10:21:06', 1, '2024-02-06 10:31:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_item_non`
--

CREATE TABLE `tr_item_non` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `status_handover` int(11) NOT NULL,
  `handover_date` datetime NOT NULL DEFAULT current_timestamp(),
  `id_location` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tr_remove`
--

CREATE TABLE `tr_remove` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `status_handover` int(11) NOT NULL,
  `handover_date` datetime NOT NULL DEFAULT current_timestamp(),
  `id_location` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tr_return`
--

CREATE TABLE `tr_return` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `status_handover` int(11) NOT NULL,
  `handover_date` datetime NOT NULL,
  `id_location` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_brand`
--
ALTER TABLE `m_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `m_location`
--
ALTER TABLE `m_location`
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
-- Indexes for table `m_type`
--
ALTER TABLE `m_type`
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
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_location` (`id_location`);

--
-- Indexes for table `tr_item_non`
--
ALTER TABLE `tr_item_non`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_location` (`id_location`);

--
-- Indexes for table `tr_remove`
--
ALTER TABLE `tr_remove`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_location` (`id_location`);

--
-- Indexes for table `tr_return`
--
ALTER TABLE `tr_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_location` (`id_location`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_brand`
--
ALTER TABLE `m_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_item`
--
ALTER TABLE `m_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `m_location`
--
ALTER TABLE `m_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_origin`
--
ALTER TABLE `m_origin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_role`
--
ALTER TABLE `m_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_stock`
--
ALTER TABLE `m_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_type`
--
ALTER TABLE `m_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_vendor`
--
ALTER TABLE `m_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_warehouse`
--
ALTER TABLE `m_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tr_item`
--
ALTER TABLE `tr_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tr_item_non`
--
ALTER TABLE `tr_item_non`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_remove`
--
ALTER TABLE `tr_remove`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_return`
--
ALTER TABLE `tr_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
