-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2018 at 09:39 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `training_system_user_v01`
--
CREATE DATABASE IF NOT EXISTS `training_system_user_v01` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `training_system_user_v01`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastupdated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'Staff',
  `password` varchar(255) NOT NULL,
  `enabled_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `lastupdated_at`, `email`, `name`, `level`, `password`, `enabled_status`) VALUES
(1, '2018-10-07 20:56:18', NULL, 'admin@test.com', 'Tuan admin', 'Administrator', 'acca5d75986268636decd87dca18c23f', '1'),
(2, '2018-10-07 20:56:30', NULL, 'staff@test.com', 'Puan staff', 'Staff', 'f3808344ae99bfb8e26a9e5a08a5e63a', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `User email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3; 
