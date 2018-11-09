-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 12:25 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic1`
--

CREATE TABLE `topic1` (
  `ID` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `username` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic2`
--

CREATE TABLE `topic2` (
  `ID` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `username` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic3`
--

CREATE TABLE `topic3` (
  `ID` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `username` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_type` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `user_type`, `image`) VALUES
(1, 'marvinkoning@live.nl', 'Marvin', '$2y$10$gVL7z.cFZ4mW9bqNpVX5jeFbqAM8VnBXDa8rLnpRU7SWVm7YbU7Eq', '2018-11-01 12:42:54', '', ''),
(2, 'marvinkoning@hotmail.nl', 'Henk', '$2y$10$nI9sMS3aS7FOAoAlzQNtkeFk0K.n7ZTXhvqL2.P2fkt2X5sSHPFtG', '2018-11-01 13:13:01', '', ''),
(11, 'mrvnknng@gmail.com', 'Wah', '$2y$10$wKKN6wsldWNMI0DEqHqIReFnfzZY4HMupY5ndRnYYur4HSLkn840K', '2018-11-01 14:50:56', '', 'doot.png'),
(16, 'derpol@live.com', 'derp', '$2y$10$nvyV2V9Jt1HQPi65XhGQJOO1KYXZH2LHbj4fHq5p3DC1oZy8o7N42', '2018-11-01 15:23:11', '', '1541082191fire.jpg'),
(17, 'marvinkoning@hotmail.com', 'xD', '$2y$10$n0Xm7jYLp6zRUlD.Rxx/r.jwUw3SQuOBgJMVBpfJ7xQFkVQfVNAyu', '2018-11-01 15:24:06', '', '1541082246fire.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic1`
--
ALTER TABLE `topic1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `topic2`
--
ALTER TABLE `topic2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `topic3`
--
ALTER TABLE `topic3`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topic1`
--
ALTER TABLE `topic1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topic2`
--
ALTER TABLE `topic2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topic3`
--
ALTER TABLE `topic3`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
