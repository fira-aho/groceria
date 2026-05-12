-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2026 at 04:08 AM
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
-- Database: `groceria`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `price`, `qty`, `subtotal`, `image`) VALUES
(11, 'Bayam Organik Lokal', 12500, 3, 37500, 'bayam.jpg'),
(12, 'Susu Almond Murni', 45000, 1, 45000, 'susu.jpg'),
(13, 'Wortel Organik', 18000, 1, 18000, 'wortel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `nama_lengkap`, `no_telepon`, `alamat`, `created_at`) VALUES
(2, 'Rafi Adhiya', '123456', 'Bekasi ', '2026-05-07 03:01:45'),
(3, '', '', '', '2026-05-10 13:13:33'),
(4, '', '', '', '2026-05-10 13:17:25'),
(5, 'Rafi Adhiya', '082213652370', 'Bekasi', '2026-05-10 13:18:00'),
(6, 'Rafi Adhiya', '082213652370', 'Bumi Sani Permai Blok A5 No.31', '2026-05-10 13:30:38'),
(7, 'Rafi Adhiya', '082213652370', 'Bumi Sani Permai Blok A5 No.31', '2026-05-10 13:31:06'),
(8, 'Rafi Adhiya', '082213652370', 'Bumi Sani Permai Blok A5 No.31', '2026-05-10 13:34:55'),
(9, 'Rafi Adhiya', '082213652370', 'Bekasi', '2026-05-10 13:37:01'),
(10, 'Rafi Adhiya', '082213652370', 'Bekasi', '2026-05-10 13:37:11'),
(11, 'Rafi Adhiya', '082213652370', 'Bekasi', '2026-05-10 13:41:40'),
(12, 'Rafi Adriyan Ramadhan', '888888888888', 'bekasiii', '2026-05-10 23:52:35'),
(13, 'Rafi Adriyan Ramadhan', '888888888888', 'bekasiii', '2026-05-10 23:52:54'),
(14, 'Rafi Adriyan Ramadhan', '888888888888', 'bekasiii', '2026-05-10 23:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `products_recomendations`
--

CREATE TABLE `products_recomendations` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `badge` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_recomendations`
--

INSERT INTO `products_recomendations` (`id`, `nama_produk`, `harga`, `gambar`, `badge`) VALUES
(1, 'Alpukat', 24500, 'Avocado.jpg', 'HEMAT'),
(2, 'Susu', 18900, 'Milk.jpg', ''),
(3, 'Green Tea', 45000, 'Green Tea.jpg', 'TERLARIS'),
(4, 'Madu', 82000, 'Honey.jpg', ''),
(5, 'Salad', 32000, 'salads.jpg', 'BARU');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Rafi Adriyan Ramadhan', 'raffiadriyan@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `products_recomendations`
--
ALTER TABLE `products_recomendations`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products_recomendations`
--
ALTER TABLE `products_recomendations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
