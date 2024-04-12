-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2024 at 06:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ieee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `full_name`, `username`, `email`, `password`) VALUES
(1, 'Kizito David', 'taitai', 'taitai@gmail.com', '123'),
(2, 'Rubanga Kene', 'solo', 'solo@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `title`, `content`, `image`) VALUES
(4, 'membership of ieee', 'thre are three categories of ieee coomunity nameil\r\ngold\r\nbronzre\r\nold', 'event-images/img-3.jpeg'),
(5, 'membership of ieee', 'thre are three categories of ieee coomunity nameil\r\ngold\r\nbronzre\r\nold', 'article-images/img-1.jpeg'),
(6, 'Expansion test', 'This is an expansion test that is aimed \r\nat making sure that everything works out well as desired so that the reader can have a sweet experience on the system plus all it wonderful benefits\r\nThis is an expansion test that is aimed \r\nat making sure that everything works out well as desired so that the reader can have a sweet experience on the system plus all it wonderful benefits\r\nThis is an expansion test that is aimed \r\nat making sure that everything works out well as desired so that the reader can have a sweet experience on the system plus all it wonderful benefits', 'event-images/img-2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `event_id`, `title`, `venue`, `date`, `username`) VALUES
(18, 1, 'Trial 1', 'Busitema', '2024-04-14', 'Queen'),
(19, 2, 'All is well now', 'Nagongera Campus', '2024-04-08', 'Queen'),
(20, 1, 'Very Ready for Tuesday', 'Nagongera Campus', '2024-04-14', 'simon');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `content`, `image`, `venue`, `date`, `time`) VALUES
(1, 'Very Ready for Tuesday', 'There is light at the end of the tunnel', 'event-images/img-3.jpeg', 'Nagongera Campus', '2024-04-14', '02:53:00'),
(4, 'Extremely excited about Tuesday', 'Extremely excited about Tuesday\r\nExtremely excited about Tuesday\r\nExtremely excited about Tuesday', 'event-images/img-3.jpeg', 'Upper Labs', '2024-04-09', '09:00:00'),
(5, 'After Party', 'We shall celebrate after the presentations on Tuesday', 'event-images/img-1.jpeg', 'Tororo', '2024-04-09', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(200) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `campus` varchar(50) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `full_name`, `username`, `email`, `campus`, `programme`, `password`) VALUES
(1, 'Odong Simon', 'simon', 'simon@gmail.com', 'Nagongera', 'Information Technology', '123'),
(2, 'wd', 'dw', 'admin@example.com', 'dw', 'wdw', 'dw'),
(3, 'wd', 'dw', 'admin@example.com', 'dw', 'wdw', 'dw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
