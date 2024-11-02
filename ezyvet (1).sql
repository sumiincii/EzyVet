-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 06:47 PM
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
-- Database: `ezyvet`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `appointment_for` varchar(50) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `owner_id`, `pet_id`, `appointment_date`, `appointment_time`, `status`, `appointment_for`, `comments`) VALUES
(98, 99, 99, '2024-11-15', '11:00:00', 'Pending', 'Grooming', ''),
(99, 100, 100, '2024-11-15', '12:00:00', 'Pending', 'Check-up', ''),
(100, 101, 101, '2024-11-15', '01:00:00', 'Pending', 'Vaccination', ''),
(101, 102, 102, '2024-11-15', '01:00:00', 'Pending', 'Vaccination', ''),
(102, 103, 103, '2024-11-15', '04:00:00', 'Pending', 'Check-up', ''),
(104, 105, 105, '2024-11-15', '08:30:00', 'Pending', 'Vaccination', ''),
(105, 106, 106, '2024-11-15', '12:30:00', 'Pending', 'Vaccination', ''),
(106, 107, 107, '2024-11-15', '01:00:00', 'Pending', 'Vaccination', ''),
(108, 109, 109, '2024-11-15', '16:30:00', 'Pending', 'Vaccination', ''),
(110, 111, 111, '2024-11-15', '16:00:00', 'Pending', 'Vaccination', ''),
(111, 112, 112, '2024-11-15', '14:00:00', 'Pending', 'Grooming', ''),
(112, 113, 113, '2024-11-14', '08:00:00', 'Pending', 'Check-up', ''),
(115, 116, 116, '2024-11-14', '16:00:00', 'Pending', 'Grooming', ''),
(116, 117, 117, '2024-11-02', '08:00:00', 'Pending', 'Grooming', '');

-- --------------------------------------------------------

--
-- Table structure for table `archived_appointments`
--

CREATE TABLE `archived_appointments` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `appointment_for` varchar(50) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archived_appointments`
--

INSERT INTO `archived_appointments` (`id`, `owner_id`, `pet_id`, `appointment_date`, `appointment_time`, `status`, `appointment_for`, `comments`) VALUES
(80, 81, 81, '2024-11-15', '01:30:00', 'Pending', 'Vaccination', ''),
(82, 83, 83, '2024-11-15', '01:00:00', 'accept', 'Check-up', ''),
(84, 85, 85, '2024-11-15', '02:00:00', 'decline', 'Check-up', ''),
(85, 86, 86, '2024-11-15', '01:00:00', 'decline', 'Check-up', ''),
(86, 87, 87, '2024-11-15', '09:00:00', 'decline', 'Check-up', ''),
(87, 88, 88, '2024-11-15', '01:00:00', 'decline', 'Check-up', ''),
(88, 89, 89, '2024-11-15', '01:00:00', 'accept', 'Grooming', ''),
(89, 90, 90, '2024-11-15', '02:00:00', 'decline', 'Vaccination', ''),
(90, 91, 91, '2024-11-15', '01:00:00', 'Pending', 'Check-up', ''),
(91, 92, 92, '2024-11-15', '09:00:00', 'Pending', 'Check-up', ''),
(92, 93, 93, '2024-11-15', '01:00:00', 'accept', 'Check-up', ''),
(93, 94, 94, '2024-11-15', '08:00:00', 'accept', 'Check-up', ''),
(94, 95, 95, '2024-11-15', '01:00:00', 'decline', 'Grooming', ''),
(95, 96, 96, '2024-11-15', '04:00:00', 'accept', 'Grooming', ''),
(96, 97, 97, '2024-11-15', '03:00:00', 'decline', 'Vaccination', ''),
(97, 98, 98, '2024-11-15', '10:00:00', 'accept', 'Grooming', ''),
(103, 104, 104, '2024-11-15', '04:00:00', 'decline', 'Vaccination', 'lll'),
(107, 108, 108, '2024-11-15', '13:00:00', 'accept', 'Grooming', ''),
(109, 110, 110, '2024-11-15', '15:00:00', 'decline', 'Vaccination', ''),
(113, 114, 114, '2024-11-15', '09:30:00', 'decline', 'Vaccination', 'baka ezyvet yan'),
(114, 115, 115, '2024-11-18', '13:00:00', 'decline', 'Vaccination', ''),
(117, 118, 118, '2024-11-02', '09:00:00', 'decline', 'Grooming', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'sumi', 'asd@gmail.com', 'ashdfbty', '2024-10-08 10:29:09'),
(2, 'mano', 'asdasdhiuh@gmail.com', 'eawn ko sayo', '2024-10-08 10:30:52'),
(3, 'ashjdg', 'crossXGT99@gmail.com', 'ayusdbgasidjm', '2024-10-08 10:36:32'),
(4, 'qwertyui', 'qwerty@gmail.com', 'yastbdftyes', '2024-10-08 10:47:44'),
(5, 'asdasdas', 'asdsadas@gmail.com', 'jbdnytwgeyt', '2024-10-25 18:06:16'),
(6, 'vince', 'vince@gmail.com', 'good', '2024-10-27 16:19:46'),
(7, 'vince', 'vince@gmail.com', 'good', '2024-10-27 16:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `fullname`, `email`, `phone`) VALUES
(18, 'vincent', 'sumi@gmail.com', '09628262821'),
(19, '', '', ''),
(20, '', '', ''),
(21, '', '', ''),
(22, 'vincent', 'sumi@gmail.com', '123865234'),
(23, 'asd', '', ''),
(24, 'manows', 'oas@gmail.com', '2134'),
(25, '', '', ''),
(26, 'vincent', 'crossxgt99@gmail.com', '09628262821'),
(27, '', 'crossxgt99@gmail.com', ''),
(28, 'mano', 'crossxgt99@gmail.com', ''),
(29, 'intet', 'crossxgt99@gmail.com', ''),
(30, 'beyns', 'crossxgt99@gmail.com', ''),
(31, 'yui', 'crossxgt99@gmail.com', ''),
(32, 'hjk', 'crossxgt99@gmail.com', ''),
(33, 'vincent', 'santosvincentj@gmail.com', '182361273'),
(34, 'sumi', 'santosvincentj@gmail.com', '512367152361'),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, 'vincent', 'erichansc@gmail.com', ''),
(40, 'sumi', 'erichansc@gmail.com', ''),
(41, '', 'crossXGT99@gmail.com', ''),
(42, 'sumi', '', ''),
(43, 'vincent santos', 'crossXGT99@gmail.com', '11134546678'),
(44, 'vincent', 'crossxgt99@gmail.com', ''),
(45, 'Eric Hans Carillo', 'crossxgt99@gmail.com', ''),
(46, 'kiana briane', 'kiana@gmail.com', '0962862821'),
(47, '', '', ''),
(48, '', '', ''),
(49, '', '', ''),
(50, '', '', ''),
(51, '', '', ''),
(52, '', '', ''),
(53, '', '', ''),
(54, 'lesley', '', ''),
(55, 'lesley', '', ''),
(56, 'vincent', '', ''),
(57, '', '', ''),
(58, '', '', ''),
(59, '', '', ''),
(60, '', '', ''),
(61, 'asd', '', ''),
(62, 'testing nga', 'sumiincii@icloud.com', ''),
(63, 'tumesting ka', 'sumiincii@icloud.com', ''),
(64, 'faramis', 'sumiincii@icloud.com', ''),
(65, '', 'santosvincentj@gmail.com', ''),
(66, '', 'santosvincentj@gmail.com', ''),
(67, '', '', ''),
(68, '', 'santosvincentj@gmail.com', ''),
(69, '', 'santosvincentj@gmail.com', ''),
(70, '', 'santosvincentj@gmail.com', ''),
(71, '', 'santosvincentj@gmail.com', ''),
(72, '', 'santosvincentj@gmail.com', ''),
(73, '', 'santosvincentj@gmail.com', ''),
(74, '', 'santosvincentj@gmail.com', ''),
(75, '', 'santosvincentj@gmail.com', ''),
(76, '', 'santosvincentj@gmail.com', ''),
(77, '', 'santosvincentj@gmail.com', ''),
(78, '', 'santosvincentj@gmail.com', ''),
(79, '', '', ''),
(80, '', 'santosvincentj@gmail.com', ''),
(81, '', 'santosvincentj@gmail.com', ''),
(82, '', 'santosvincentj@gmail.com', ''),
(83, '', 'santosvincentj@gmail.com', ''),
(84, '', 'santosvincentj@gmail.com', ''),
(85, '', 'santosvincentj@gmail.com', ''),
(86, '', 'santosvincentj@gmail.com', ''),
(87, 'asdasd', 'santosvincentj@gmail.com', ''),
(88, '', 'santosvincentj@gmail.com', ''),
(89, '', 'santosvincentj@gmail.com', ''),
(90, 'qweqdasdfaf', 'santosvincentj@gmail.com', ''),
(91, 'dsgdfgh', 'santosvincentj@gmail.com', '45673'),
(92, '', '', ''),
(93, '', 'santosvincentj@gmail.com', ''),
(94, '', 'santosvincentj@gmai.com', ''),
(95, '', 'santosvincentj@gmai.com', ''),
(96, '', '', ''),
(97, '', '', ''),
(98, '', '', ''),
(99, '', '', ''),
(100, '', '', ''),
(101, '', '', ''),
(102, '', '', ''),
(103, '', '', ''),
(104, 'barak', 'santosvincentj@gmail.com', '341234'),
(105, '', '', ''),
(106, '', '', ''),
(107, '', '', ''),
(108, 'vincent', 'santosvincentj@gmail.com', '091283654'),
(109, '12321', 'santosvincent@gmail.com', '234563464356'),
(110, 'asdfsed', 'santosvincentj@gmail.com', '0981263123'),
(111, 'ASD', 'asd@gmail.com', '67896789'),
(112, 'asdasd', 'santosvincent@gmail.com', 'asdfdfgas'),
(113, 'vincent', 'santosvincent@gmail.com', '235345'),
(114, 'manocheng', 'erichansc@gmail.com', '124567'),
(115, 'manocheng', 'erichansc@gmail.com', '12343425'),
(116, 'vincent', 'santosvincent@gmail.com', '1242543'),
(117, 'vincent', 'santosvincentj@gmail.com', '1234567'),
(118, 'monows', 'erichansc@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE `password_recovery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_recovery`
--

INSERT INTO `password_recovery` (`id`, `user_id`, `token`) VALUES
(5, 2, 'c8b6ee8159d38ad656e862bbff8a6400'),
(6, 3, '774e917177222a5921ce9554c72b48c2'),
(7, 3, '1696ea3544e0b824380488a1b57aecaa'),
(8, 3, 'a03c867756e3ddb047db698697a0ea7b');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `species` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `owner_id`, `name`, `breed`, `species`, `color`, `sex`, `age`) VALUES
(18, 18, 'yuna', 'mix', 'Cat', 'white', 'Female', 2),
(19, 19, '', '', '', '', '', 0),
(20, 20, '', '', '', '', '', 0),
(21, 21, '', '', '', '', '', 0),
(22, 22, 'qyweyasd', 'ewan', 'Cat', 'red', 'Male', 2),
(23, 23, '', '', '', '', '', 0),
(24, 24, 'latong', 'alien', 'Other', 'nigga', 'Male', 2),
(25, 25, '', '', '', '', '', 0),
(26, 26, 'yuna', 'mix', 'Cat', 'white', 'Male', 2),
(27, 27, '', '', '', '', '', 0),
(28, 28, '', '', '', '', '', 0),
(29, 29, '', '', '', '', '', 0),
(30, 30, '', '', '', '', '', 0),
(31, 31, '', '', '', '', '', 0),
(32, 32, '', '', '', '', '', 0),
(33, 33, 'nala', 'persian', 'Cat', 'white', 'Female', 2),
(34, 34, 'yuna', 'persian', 'Cat', 'white', 'Female', 2),
(35, 35, '', '', '', '', '', 0),
(36, 36, '', '', '', '', '', 0),
(37, 37, '', '', '', '', '', 0),
(38, 38, '', '', '', '', '', 0),
(39, 39, '', '', '', '', '', 0),
(40, 40, '', '', '', '', '', 0),
(41, 41, '', '', '', '', '', 0),
(42, 42, 'oas', 'asd', '', '', '', 0),
(43, 43, 'yuna', 'persian', 'Cat', 'white', 'Female', 2),
(44, 44, 'yuna', 'persian', 'Cat', 'black', 'Female', 2),
(45, 45, 'zoey', 'persian x siamese ', 'Cat', 'tabby', 'Male', 2),
(46, 46, 'shadow', 'persian', 'Cat', 'black', 'Male', 6),
(47, 47, '', '', '', '', '', 0),
(48, 48, '', '', '', '', '', 0),
(49, 49, '', '', '', '', '', 0),
(50, 50, '', '', '', '', '', 0),
(51, 51, '', '', '', '', '', 0),
(52, 52, '', '', '', '', '', 0),
(53, 53, '', '', '', '', '', 0),
(54, 54, '', '', '', '', '', 0),
(55, 55, '', '', '', '', '', 0),
(56, 56, '', '', '', '', '', 0),
(58, 58, '', '', '', '', '', 0),
(59, 59, '', '', '', '', '', 0),
(60, 60, '', '', '', '', '', 0),
(61, 61, '', '', '', '', '', 0),
(62, 62, '', '', '', '', '', 0),
(63, 63, 'yuna', '', '', '', '', 0),
(64, 64, 'lesley', '', '', '', '', 0),
(65, 65, '', '', '', '', '', 0),
(66, 66, '', '', '', '', '', 0),
(67, 67, '', '', '', '', '', 0),
(68, 68, '', '', '', '', '', 0),
(69, 69, '', '', '', '', '', 0),
(70, 70, '', '', '', '', '', 0),
(71, 71, '', '', '', '', '', 0),
(72, 72, '', '', '', '', '', 0),
(73, 73, '', '', '', '', '', 0),
(74, 74, '', '', '', '', '', 0),
(75, 75, '', '', '', '', '', 0),
(76, 76, '', '', '', '', '', 0),
(77, 77, '', '', '', '', '', 0),
(78, 78, '', '', '', '', '', 0),
(79, 79, '', '', '', '', '', 0),
(80, 80, '', '', '', '', '', 0),
(81, 81, '', '', '', '', '', 0),
(82, 82, '', '', '', '', '', 0),
(83, 83, '', '', '', '', '', 0),
(84, 84, '', '', '', '', '', 0),
(85, 85, '', '', '', '', '', 0),
(86, 86, '', '', '', '', '', 0),
(87, 87, '', '', 'Cat', '', '', 0),
(88, 88, '', '', '', '', '', 0),
(89, 89, '', '', '', '', '', 0),
(90, 90, '', '', 'Cat', '', '', 0),
(91, 91, 'asdasd', 'hjghk', 'Cat', 'ghjkuyi', '', 467),
(92, 92, '', '', '', '', '', 0),
(93, 93, '', '', '', '', '', 0),
(94, 94, '', '', '', '', '', 0),
(95, 95, '', '', '', '', '', 0),
(96, 96, '', '', '', '', '', 0),
(97, 97, '', '', '', '', '', 0),
(98, 98, '', '', '', '', '', 0),
(99, 99, '', '', '', '', '', 0),
(100, 100, '', '', '', '', '', 0),
(101, 101, '', '', '', '', '', 0),
(102, 102, '', '', '', '', '', 0),
(103, 103, '', '', '', '', '', 0),
(104, 104, 'gfdfhg', 'fghdfgh', 'Other', 'fdghrt', 'Male', 123),
(105, 105, '', '', '', '', '', 0),
(106, 106, '', '', '', '', '', 0),
(107, 107, '', '', '', '', '', 0),
(108, 108, 'weqwe', 'asd', 'Dog', '213', 'Male', 12),
(109, 109, 'sfg5', 'asd', 'Dog', 'asd', 'Female', 123),
(110, 110, 'asdfsadf', 'sdfsd', 'Cat', 'asdf', 'Male', 123),
(111, 111, 'asdasd ', 'asd asd', 'Cat', 'asdwq3e', 'Male', 232),
(112, 112, 'asdas', 'asdasd', 'Cat', 'awasdf', 'Male', 123),
(113, 113, 'yuna', 'hello', 'Cat', 'asdghj', 'Male', 12),
(114, 114, 'kuloykoy', 'oas', 'Dog', 'kulay mink', 'Male', 3),
(115, 115, 'popol', 'oas', 'Dog', 'asd', 'Male', 12),
(116, 116, 'kupa', 'asghdf', 'Cat', 'asd', 'Male', 12),
(117, 117, 'asdfgh', 'qwer', 'Cat', 'asdffghjgjk', 'Male', 12),
(118, 118, 'sdf', 'sdf', 'Cat', 'sdf', 'Male', 12);

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_appointments`
--
-- Error reading structure for table ezyvet.scheduled_appointments: #1932 - Table &#039;ezyvet.scheduled_appointments&#039; doesn&#039;t exist in engine
-- Error reading data for table ezyvet.scheduled_appointments: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `ezyvet`.`scheduled_appointments`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(2, 'ezyvet.neust.sumacab@gmail.com', '$2y$10$LPy0dnyGm35QKZ0beyQJ3uWh/jmOkNkmPy5ilMsaByJE..sxeIXQy'),
(3, 'CrossXGT99@gmail.com', '$2y$10$IJafE3owSzfT7rcHb4uLvO73rQQ7JDoQj/7eK4JYAyqAOk9h3dAKm'),
(4, 'ezyvetneust@gmail.com', '$2y$10$tsAbDN4iK5hl9yD7kCkFZuxbG3xBOX5Iuv8ABSzZx3xwrAqKnePGm'),
(5, 'ezyvetneust', '$2y$10$XVCqOxXOLXoeiLDXiXIXiOnMY8Cp45kstJg5b2QQkwSYqxot4aIDW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `archived_appointments`
--
ALTER TABLE `archived_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `archived_appointments`
--
ALTER TABLE `archived_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `password_recovery`
--
ALTER TABLE `password_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`);

--
-- Constraints for table `archived_appointments`
--
ALTER TABLE `archived_appointments`
  ADD CONSTRAINT `archived_appointments_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`),
  ADD CONSTRAINT `archived_appointments_ibfk_2` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`);

--
-- Constraints for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD CONSTRAINT `password_recovery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
