-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 10:08 AM
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
-- Database: `pustakawan_ip`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `tersedia` tinyint(1) DEFAULT 1,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `rating` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `tahun_terbit`, `stok`, `tersedia`, `gambar`, `deskripsi`, `rating`) VALUES
(1, 'PULANG ', 'TereLiye', '2015', 4, 1, '1753030657_6e1bb4bd35e0a0954b8b.jpg', ' \"Aku tahu sekarang, lebih banyak luka di hati bapakku dibanding di tubuhnya. Juga mamakku, lebih banyak tangis di hati Mamak dibanding di matanya.\"Sebuah kisah tentang perjalanan pulang, melalui pertarungan demi pertarungan, untuk memeluk erat semua kebencian dan rasa sakit.\"', 0),
(2, 'PERGI', 'TereLiye', '2018', 6, 1, '1753031065_822ced03452d8daec79c.jpg', '\"Sebuah kisah tentang menemukan tujuan, ke mana hendak pergi, melalui kenangan demi kenangan masa lalu\"', 0),
(4, 'BUMI', 'TereLiye', '2014', 4, 1, '1753083779_6d20a3d4bdd22d0e7256.jpg', 'Buku ke-1 Petualangan Raib, Ali dan Seli.**Novel ini adalah naskah awal (asli) dari penulis; tanpa sentuhan editing, layout serta cover dari penerbit, dengan demikian, naskah ini berbeda dengan versi cetak, pun memiliki kelebihan dan kelemahan masing-masing.**', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('booking','dipinjam','dikembalikan','dibatalkan') DEFAULT 'booking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `user_id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(21, 5, 2, '2025-07-21', '2025-07-21', 'dikembalikan'),
(22, 6, 1, '2025-07-21', '2025-07-21', 'dibatalkan'),
(23, 6, 4, '2025-07-21', '2025-07-21', 'dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `role` enum('admin','petugas','pengunjung') DEFAULT 'pengunjung',
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `tanggal_lahir`, `role`, `created_at`, `deleted_at`) VALUES
(1, 'Muhammad Farhan', 'farhan@gmail.com', '$2y$10$WjZCnw.g4Fde2BdkjeJNv./CPmgZueta8s4uJN1RkHchtrN0B1Gbq', '2004-10-04', 'admin', '2025-07-14 00:02:08', NULL),
(2, 'Nara Aleshya', 'nara@gmail.com', '$2y$10$GYF7YW2QA7appQoJyD7WmOOpVXsGqn.jGumFpylwdXp0wLQ4P2mVW', '2015-10-04', 'petugas', '2025-07-14 00:24:28', NULL),
(3, 'asep pramat', 'asep@gmail.com', '$2y$10$uFZBK8by.Rix24rJIGpy3.glJ4v2LKrFjInTux4/JILFKFBFIsxJa', '2018-07-04', 'pengunjung', '2025-07-14 00:25:12', NULL),
(4, 'Setiya Nugroho, S.T., M.Eng', 'setiya@gmail.com', '$2y$10$WtDFgE0X9o/BpTo14/WqSeJtFifxnzggpOcGTq3I/M9zRrmLs1nG.', '1993-09-12', 'admin', '2025-07-13 22:48:04', NULL),
(5, 'Ramadani', 'ramadani@gmail.com', '$2y$10$4NCPXwRUK3u9kV8h9IcK1.2NN1kSQoQWivdssgGv5JtJ1wYmHH/f2', '2025-07-03', 'pengunjung', '2025-07-13 23:03:43', NULL),
(6, 'akhmad', 'akhmad@gmail.com', '$2y$10$nR/fWSlbtjwqh.qP.CkL9OMgphsgqYHxT.Qeh4a.yNOe6duTIqtCa', '2025-07-21', 'pengunjung', '2025-07-21 07:40:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
