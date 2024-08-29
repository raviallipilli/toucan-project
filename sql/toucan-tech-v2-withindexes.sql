-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 29, 2024 at 12:58 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toucan-tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `UserRefID` int DEFAULT NULL,
  `emailID` int NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `Default` tinyint(1) NOT NULL,
  PRIMARY KEY (`emailID`),
  KEY `UserRefID` (`UserRefID`),
  KEY `emailaddress` (`emailaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`UserRefID`, `emailID`, `emailaddress`, `Default`) VALUES
(1001, 1, 'john.doe@example.com', 1),
(1001, 2, 'john.doe@anotherexample.com', 0),
(1002, 3, 'jane.smith@example.com', 1),
(1002, 4, 'jane.smith@anotherexample.com', 0),
(1003, 5, 'alice.johnson@example.com', 0),
(1004, 6, 'bob.brown@example.com', 1),
(1005, 7, 'charlie.davis@example.com', 1),
(1005, 8, 'charlie.davis@anotherexample.com', 0),
(100567, 678, 'j.smith@test.com', 1),
(100567, 679, 'john.smith@test.com', 0),
(100568, 680, 'jane.doe@test.com', 1),
(100568, 681, 'jane.doe@test.com', 0),
(100569, 682, 'alice.johnson@test.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `school_id`, `created_at`) VALUES
(1, 'John Doe', 'john.doe@example.com', 1, '2024-08-28 12:20:29'),
(2, 'Jane Smith', 'jane.smith@example.com', 2, '2024-08-28 12:20:29'),
(3, 'Alice Johnson', 'alice.johnson@example.com', NULL, '2024-08-28 12:20:29'),
(4, 'Bob Brown', 'bob.brown@example.com', 3, '2024-08-28 12:20:29'),
(5, 'Charlie Davis', 'charlie.davis@example.com', 4, '2024-08-28 12:20:29'),
(6, 'Ravi Kiran Allipilli', 'luckyravi17@gmail.com', 5, '2024-08-28 12:22:07'),
(7, 'RAVI K ALLIPILLI', 'luckyravi17@gmail.com5555', 2, '2024-08-28 13:36:36'),
(8, 'test1', 'test@mail.com', 1, '2024-08-28 19:10:05'),
(9, 'test2', 'test2@mail.com', 1, '2024-08-28 19:10:29'),
(10, 'test3', 'test3@mail.com', 1, '2024-08-28 19:10:51'),
(11, 'test4', 'test4@mail.com', 3, '2024-08-28 19:25:18'),
(12, 'test5', 'test5@mail.com', 2, '2024-08-28 21:56:20'),
(13, 'john', 'luckyravi17@gmail.co', 1, '2024-08-28 22:00:26'),
(14, 'test6', 'test6@mail.com', 4, '2024-08-29 10:50:31'),
(18, 'Ravi Kiran Allipilli', 'luckyravi17@gmail.com555', 4, '2024-08-29 10:56:16'),
(19, 'Ravi Kiran Allipilli', 'ravi.allipilli@ywrec.com', 3, '2024-08-29 10:59:38'),
(23, 'test7', 'test7@mail.com', 5, '2024-08-29 11:20:32'),
(24, 'test8', 'test8@mail.com', 3, '2024-08-29 11:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `UserRefID` int NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Deceased` tinyint(1) NOT NULL,
  PRIMARY KEY (`UserRefID`),
  KEY `Firstname` (`Firstname`),
  KEY `Surname` (`Surname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`UserRefID`, `Firstname`, `Surname`, `Deceased`) VALUES
(1001, 'John', 'Doe', 0),
(1002, 'Jane', 'Smith', 0),
(1003, 'Alice', 'Johnson', 1),
(1004, 'Bob', 'Brown', 0),
(1005, 'Charlie', 'Davis', 0),
(100567, 'John', 'Smith', 0),
(100568, 'Jane', 'Doe', 0),
(100569, 'Alice', 'Johnson', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` int NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`school_id`),
  UNIQUE KEY `school_name` (`school_name`) USING BTREE,
  KEY `school_name_2` (`school_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `country`, `created_at`) VALUES
(1, 'Greenwood High', 'USA', '2024-08-28 12:20:29'),
(2, 'Riverdale Academy', 'Canada', '2024-08-28 12:20:29'),
(3, 'Springfield College', 'USA', '2024-08-28 12:20:29'),
(4, 'Sunnydale School', 'UK', '2024-08-28 12:20:29'),
(5, 'Hill Valley High', 'USA', '2024-08-28 12:20:29');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`UserRefID`) REFERENCES `profiles` (`UserRefID`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
