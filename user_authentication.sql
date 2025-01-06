-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 04:02 PM
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
-- Database: `user_authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `temp_password` varchar(255) DEFAULT NULL,
  `temp_password_used` tinyint(1) NOT NULL DEFAULT 0,
  `failed_attempts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `phone`, `password`, `temp_password`, `temp_password_used`, `failed_attempts`) VALUES
(6, 'rthg', 'fdgdf', 'dfg', 'khader.jeryes@gmail.com', 56156, '$2y$10$4SyGKq3OV3s/PYetA5RDGeqbYL4cc/VY0kb9EBUc2sFxg6tSgw0yK', NULL, 0, 0),
(9, 'test', 'kha', 'fdg', 'khader.jeryes1@gmail.com', 919512, '$2y$10$FFQCPs7AqmYNsUwr6BZ/Au0PiyioXJp6vP/.jrl4UB9GTYpoeG4ZK', NULL, 0, 0),
(10, 'test2', 'tete', 'toto', 'aliahwc@gmail.com', 132301203, '$2y$10$K4x7hQjskyHWUS4xoxNJTOQrTcPoww.Fb9llanHdUkDMupZNvpLVq', NULL, 0, 0),
(11, 'chen', 'bvcds', 'vds', 'che!@bccx.xc', 987659432, '$2y$10$sCq3ISF0UJnD0FV7LnfuVenIzr9wp8l88470SZeKJ.3sBR7xttJ7q', NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
