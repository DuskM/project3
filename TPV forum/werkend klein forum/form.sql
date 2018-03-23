-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 11:21 AM
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
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `gebruiker` text NOT NULL,
  `message` text NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `gebruiker`, `message`, `datum`) VALUES
(0, 'me', 'it works', '2018-03-23 10:46:26'),
(0, 'Todd Howard', 'It just works', '2018-03-23 10:46:38'),
(0, 'annoydeath', 'We made a 4chan board', '2018-03-23 11:06:56'),
(0, 'Dennis', 'HEYO! ', '2018-03-23 11:07:21'),
(0, 'I tried', '<form method=\"get\" action=\"form.php\">\r\n    <p>User:\r\n        <label for=\"gebruiker\"></label>\r\n        <input type=\"text\" name=\"gebruiker\" id=\"gebruiker\" />\r\n        <br />\r\n    </p>\r\n    <p>Message: <br />\r\n        <label for=\"message\"></label>\r\n        <textarea name=\"message\" id=\"message\" cols=\"45\" rows=\"5\"></textarea>\r\n    </p>\r\n    <p>\r\n        <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Post message\" />\r\n    </p>\r\n</form>', '2018-03-23 11:08:34'),
(0, 'I tried', 'does this work?', '2018-03-23 11:08:59'),
(0, 'me', '<form method=\"get\" action=\"form.php\">\r\n    <p>User:\r\n        <label for=\"gebruiker\"></label>\r\n        <input type=\"text\" name=\"gebruiker\" id=\"gebruiker\" />\r\n        <br />\r\n    </p>\r\n    <p>Message: <br />\r\n        <label for=\"message\"></label>\r\n        <textarea name=\"message\" id=\"message\" cols=\"45\" rows=\"5\"></textarea>\r\n    </p>\r\n    <p>\r\n        <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Post message\" />\r\n    </p>\r\n</form>', '2018-03-23 11:10:27'),
(0, '', '<style>\r\n#body {\r\nbackground-color: red;\r\n}\r\n</style>\r\n', '2018-03-23 11:11:26'),
(0, '', '<style>\r\n#body {\r\nbackground-color: red;\r\n}\r\n</style>\r\n', '2018-03-23 11:11:36'),
(0, 'me', '<form method=\"get\" action=\"form.php\">\r\n    <p>User:\r\n        <label for=\"gebruiker\"></label>\r\n        <input type=\"text\" name=\"gebruiker\" id=\"gebruiker\" />\r\n        <br />\r\n    </p>\r\n    <p>Message: <br />\r\n        <label for=\"message\"></label>\r\n        <textarea name=\"message\" id=\"message\" cols=\"45\" rows=\"5\"></textarea>\r\n    </p>\r\n    <p>\r\n        <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Post message\" />\r\n    </p>\r\n</form>', '2018-03-23 11:17:39'),
(0, '', '#body {\r\nbackground-color: #fff;\r\n}', '2018-03-23 11:19:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
