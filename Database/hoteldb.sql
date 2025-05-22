-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 01:03 AM
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
-- Database: `hoteldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `bd_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(120) DEFAULT NULL,
  `b_price` decimal(10,2) NOT NULL,
  `total_pay` decimal(10,2) NOT NULL,
  `room_no` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `booking_amont` decimal(10,2) DEFAULT NULL,
  `booking_status` enum('pending','booking','cancelled','payment failed','refunded') NOT NULL DEFAULT 'pending',
  `type_booking` varchar(50) DEFAULT NULL,
  `type_payment` varchar(50) DEFAULT NULL,
  `datet_booking` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `booking_amont`, `booking_status`, `type_booking`, `type_payment`, `datet_booking`) VALUES
(4, 1, 1, '2025-05-07', '2025-05-23', 4000.00, 'pending', NULL, NULL, '2025-05-23 01:03:00'),
(5, 2, 1, '2025-05-02', '2025-05-10', 806.40, 'pending', 'عائلي', 'مدفوع', '2025-05-23 01:12:41'),
(6, 1, 1, '2025-05-02', '2025-05-31', 2923.20, 'pending', 'فردي', 'مدفوع', '2025-05-23 01:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `f_id` int(11) NOT NULL,
  `f_icon` varchar(255) DEFAULT NULL,
  `f_name` varchar(120) NOT NULL,
  `f_description` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_area` varchar(50) NOT NULL,
  `r_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult_capacity` int(2) NOT NULL,
  `child_capacity` int(2) NOT NULL,
  `r_description` varchar(255) DEFAULT NULL,
  `r_imag` varchar(255) NOT NULL,
  `r_status` tinyint(1) NOT NULL DEFAULT 1,
  `r_removed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`r_id`, `r_name`, `r_area`, `r_price`, `quantity`, `adult_capacity`, `child_capacity`, `r_description`, `r_imag`, `r_status`, `r_removed`) VALUES
(1, 'room1', '3*4', 200.00, 10, 2, 3, 'hfgddgaoyrhagrfncd', '', 1, 0),
(2, 'room2', '4*4', 20000.00, 12, 2, 4, 'gdddhfdjgvmnvb', 'C:\\xampp\\htdocs\\hotel\\hotel_website\\assets\\images\\rooms\\1.jpg', 1, 0),
(3, 'room3', '4*4', 10000.00, 12, 2, 4, 'image ', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facility`
--

CREATE TABLE `room_facility` (
  `rf_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` date NOT NULL,
  `imag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `gender`, `created_at`, `date`, `imag`) VALUES
(1, 'ngam', 'njmfth2@gmail.com', '$2y$10$8tToOCU2SeROD6JZDrkW7.Xok3ZkWiqjH9xBgHkfhcRximMD0KrCW', 'male', '2025-05-19 00:21:14', '2025-05-27', 'user_682a4f4ac1c764.07128149-hhhh.png'),
(2, 'mhomed', 'male', '1234', '', '2025-05-22 03:56:16', '2025-05-01', 'C:\\xampp\\htdocs\\hotel\\hotel_website/uploads/user_682e76304bbc25.83722869-images (5).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `query_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `massage` varchar(255) NOT NULL,
  `send_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`query_id`, `subject`, `massage`, `send_at`, `user_id`) VALUES
(1, 'rooms', 'dhhdfgyrhfcbvhgdhd', '2025-05-22 04:01:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`bd_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `room_facility`
--
ALTER TABLE `room_facility`
  ADD PRIMARY KEY (`rf_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`query_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `bd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_facility`
--
ALTER TABLE `room_facility`
  MODIFY `rf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`r_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `room_facility`
--
ALTER TABLE `room_facility`
  ADD CONSTRAINT `room_facility_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `facilities` (`f_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_facility_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `rooms` (`r_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD CONSTRAINT `user_queries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
