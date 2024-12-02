-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2024 at 04:50 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `title`, `publisher`, `cover_image`, `status`, `created_at`) VALUES
(2, 1, 'Harry Potter', 'Yanto', 'uploads/Botol_pet_Aqua_beserta_tutup_1500ml_.jpeg', 1, '2024-09-25 16:22:24'),
(3, 3, 'Sains', 'Harry', 'uploads/imgbin-bear-logo-bear.jpg', 0, '2024-09-25 16:23:00'),
(8, 1, 'Hujan', 'Yanto', 'uploads/R.jpg', 1, '2024-09-26 16:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
--

CREATE TABLE `borrowings` (
  `id` int(11) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_code` varchar(100) DEFAULT NULL,
  `borrowed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `borrowings`
--

INSERT INTO `borrowings` (`id`, `nrp`, `book_id`, `borrow_code`, `borrowed_at`, `return_date`) VALUES
(1, '202429102', 2, '66f4391e68e3f', '2024-09-25 23:23:58', '2024-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Cerita', 1, '2024-09-25 16:18:47'),
(2, 'Music', 0, '2024-09-25 16:19:02'),
(3, 'Edukasi', 1, '2024-09-25 16:19:18'),
(4, 'Horor', 1, '2024-09-26 16:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `p_role`
--

CREATE TABLE `p_role` (
  `id_p_role` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `p_role`
--

INSERT INTO `p_role` (`id_p_role`, `nama_role`, `create_date`) VALUES
(1, 'admin', '2016-10-29 21:03:10'),
(2, 'anggota', '2016-10-29 21:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `t_account`
--

CREATE TABLE `t_account` (
  `id_t_account` int(11) NOT NULL,
  `id_p_role` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL COMMENT 'MD5 hash',
  `create_date` datetime NOT NULL,
  `create_by` varchar(20) NOT NULL COMMENT 'Username',
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(20) DEFAULT NULL COMMENT 'Username'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `t_account`
--

INSERT INTO `t_account` (`id_t_account`, `id_p_role`, `username`, `password`, `create_date`, `create_by`, `update_date`, `update_by`) VALUES
(11, 1, 'Yto', '202cb962ac59075b964b07152d234b70', '2024-09-25 00:00:00', 'adm', NULL, NULL),
(12, 3, 'Yono', 'bcb335a687392685c1d9014052ba1667', '2024-09-26 00:00:00', 'adm', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_role`
--
ALTER TABLE `p_role`
  ADD PRIMARY KEY (`id_p_role`);

--
-- Indexes for table `t_account`
--
ALTER TABLE `t_account`
  ADD PRIMARY KEY (`id_t_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `p_role`
--
ALTER TABLE `p_role`
  MODIFY `id_p_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_account`
--
ALTER TABLE `t_account`
  MODIFY `id_t_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `borrowing`.`categories` (`id`);

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `borrowing`.`books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
