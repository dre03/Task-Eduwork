-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2024 at 06:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `title`, `description`, `price`, `picture`) VALUES
(8, 'Baju Kaos', 'Baju Kaos Premium original untuk laki-laki', 100000, '1380519620_ff4ff54d7b4222546bf55bcd85e81660.jpeg'),
(9, 'Gitar Yamaha', 'Gitar Yamaha Rekomdasi untuk anda', 2000000, '224269286_musik.jpeg'),
(10, 'Motor Metik', 'Motor Metik Honda Beat 2024 Terbaru', 300000000, '1325125934_motor.jpg'),
(11, 'Jam Tangan', 'Jam Tangan Arloji Asli untuk wanita atau pria', 3000000, '1811074620_1.jpg'),
(12, 'Alat Olahraga Lari', 'Alat Olahraga lari rumahan', 100000000, '224533004_1.jpg'),
(13, 'Sofa Premium ', 'Sofa Premium cocok untuk segala tempat', 15000000, '35396644_4.jpg'),
(14, 'Dorongan Bayi', 'Dorongan Bayi unutk anak anda agar lebih mudah dibawa', 700000, '1267984658_1.jpg'),
(15, 'Bola Basket', 'Bola Basket untuk anda yang hobi bermain basket', 2000000, '917186947_unnamed (8).jpg'),
(16, 'Kamera Lucu', 'Kamera Lucu buat anda yang hobi berfoto', 3000000, '935027552_unnamed (1).jpg'),
(17, 'Laptop Acer', 'Laptop Merek Acer cocok buat belajar dan bekerja ', 6000000, '1010945867_unnamed (2).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
