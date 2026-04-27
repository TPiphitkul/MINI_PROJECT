-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2026 at 06:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `amount`, `create_date`) VALUES
(1, 'การพัฒนาเว็บไซต์ Web Development Basics', 350, '2026-04-01 10:00:00'),
(2, 'โครงสร้างข้อมูล Data Structures', 420, '2026-04-01 10:15:00'),
(3, 'ฐานข้อมูล Database System', 390, '2026-04-01 10:30:00'),
(4, 'การเขียนโปรแกรม Programming Fundamentals', 320, '2026-04-01 10:45:00'),
(5, 'ระบบปฏิบัติการ Operating Systems', 450, '2026-04-02 09:00:00'),
(6, 'ความปลอดภัยไซเบอร์ Cyber Security', 520, '2026-04-02 09:15:00'),
(7, 'เครือข่ายคอมพิวเตอร์ Computer Networks', 480, '2026-04-02 09:30:00'),
(8, 'การวิเคราะห์ระบบ System Analysis', 410, '2026-04-02 09:45:00'),
(9, 'ซอฟต์แวร์เอ็นจิเนียริ่ง Software Engineering', 460, '2026-04-02 10:00:00'),
(10, 'การทดสอบระบบ Software Testing', 300, '2026-04-02 10:15:00'),
(11, 'ปัญญาประดิษฐ์ Artificial Intelligence', 680, '2026-04-03 11:00:00'),
(12, 'การเรียนรู้ของเครื่อง Machine Learning', 720, '2026-04-03 11:15:00'),
(13, 'การวิเคราะห์ข้อมูล Data Analytics', 590, '2026-04-03 11:30:00'),
(14, 'วิทยาการข้อมูล Data Science', 750, '2026-04-03 11:45:00'),
(15, 'คลาวด์คอมพิวติ้ง Cloud Computing', 640, '2026-04-03 12:00:00'),
(16, 'การบริหารโครงการ IT Project Management', 420, '2026-04-04 13:00:00'),
(17, 'การตลาดดิจิทัล Digital Marketing', 380, '2026-04-04 13:15:00'),
(18, 'ธุรกิจออนไลน์ E-Business', 360, '2026-04-04 13:30:00'),
(19, 'การเงินส่วนบุคคล Personal Finance', 320, '2026-04-04 13:45:00'),
(20, 'การพัฒนาตนเอง Self Development', 280, '2026-04-04 14:00:00'),
(21, 'นิยายแรงบันดาลใจ Inspiration Novel', 250, '2026-04-05 15:00:00'),
(22, 'เทคโนโลยีเพื่อสังคม Technology for Society', 340, '2026-04-05 15:15:00'),
(23, 'สตาร์ทอัพ Startup Business', 410, '2026-04-05 15:30:00'),
(24, 'การออกแบบ UX/UI Design', 390, '2026-04-05 15:45:00'),
(25, 'ระบบสารสนเทศ Information Systems', 430, '2026-04-05 16:00:00'),
(26, 'Cyber Security & System Analysis', 500, '2026-04-27 22:30:00'),
(27, 'การทดสอบระบบ Security', 350, '2026-04-25 23:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin', '2026-04-27 22:03:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
