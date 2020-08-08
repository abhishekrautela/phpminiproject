-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2019 at 07:03 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs_spot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'abhishek', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_table`
--

CREATE TABLE `blogs_table` (
  `id` int(11) NOT NULL,
  `did` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs_table`
--

INSERT INTO `blogs_table` (`id`, `did`, `name`, `profession`, `category`, `title`, `image`, `description`) VALUES
(1, '1 ', 'Abhishek', 'Professional', 'Entertainment', 'Sample Blog', '../../assets/blogs/Entertainment-1538293676-flat,1000x1000,075,f.jpg', 'This is a sample Blog.'),
(3, '2 ', 'Kavi', 'Free-lancer', 'News', 'dasdasd', '../../assets/blogs/News-1545716391-410119501Website-Design-Background.jpg', 'asdda');

-- --------------------------------------------------------

--
-- Table structure for table `query_table`
--

CREATE TABLE `query_table` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `photo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `email`, `password`, `dob`, `gender`, `profession`, `contact`, `address`, `photo`) VALUES
(1, 'hgjkj', 'cvhj@gmail', 'fghj', '2018-12-14', 'male', 'Professional', '856323', 'hjkl;', '../assets/upload/User_1545569929-4k-wallpaper-architecture-background-1308624.jpg'),
(2, 'Kavi', 'kavi@gmail.com', 'kavi', '2018-12-08', 'male', 'Free-lancer', '9999999999', 'Dehradun', '../assets/upload/User_1545716270-4k-wallpaper-architecture-background-1308624.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_table`
--
ALTER TABLE `blogs_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query_table`
--
ALTER TABLE `query_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs_table`
--
ALTER TABLE `blogs_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query_table`
--
ALTER TABLE `query_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
