-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 09:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promanage`
--
CREATE DATABASE IF NOT EXISTS `promanage` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `promanage`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `role` varchar(11) NOT NULL,
  `amount` float NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` int(11) NOT NULL,
  `admin_user` int(11) NOT NULL,
  `desig` int(11) NOT NULL,
  `incentive` int(11) NOT NULL,
  `salary` float NOT NULL,
  `leavess` int(30) NOT NULL,
  `jdate` date NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role_id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`, `image`, `created_on`, `role`, `amount`, `created_date_time`, `delete_status`, `admin_user`, `desig`, `incentive`, `salary`, `leavess`, `jdate`, `date`) VALUES
(1, 0, 'shafat21', 'shafat.mahtab@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Shafat', 'Alam', 'Male', '', '1759247047', 'Bangladesh                                                      ', 'shafat.png', '2018-04-30', 'admin', 168276, '2024-11-30 06:21:36', 0, 1, 0, 0, 0, 0, '2024-11-30', '2024-11-30'),
(71, 1, '', 'tanvirove007@gmail.com', '929408425ba3f124ffa07a7ae56d353e17578f45ad059f295db51d426a277c6a', 'Tanvir', 'Ove', '', '', '', '', '', '0000-00-00', 'admin', 0, '2024-11-30 07:22:52', 0, 0, 0, 0, 5000, 2, '2024-11-29', '2024-11-30'),
(72, 2, '', 'test@gmail.com', '278db4a24613a5359624f52ab4105f214522c69087ef2b2d4d66113e1a5787cf', 'Test', 'ASdasdjb', '', '', '', '', '', '0000-00-00', 'admin', 0, '2024-11-30 07:03:34', 0, 0, 0, 0, 5000, 2, '2024-11-06', '2024-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `emp` int(11) NOT NULL,
  `amount` float NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `delete_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `delete_status`) VALUES
(1, 'Leave Manager', 'Manages leaves', 0),
(2, 'Salary ', 'Salary Manager', 0),
(3, 'Admin', 'Controls everything', 0);

-- --------------------------------------------------------

--
-- Table structure for table `installement`
--

CREATE TABLE `installement` (
  `id` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `inv_no` varchar(200) NOT NULL,
  `insta_amt` int(100) NOT NULL,
  `due_total` int(11) NOT NULL,
  `ptype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `month` varchar(150) NOT NULL,
  `year` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=paid 2=unpaid',
  `total` int(50) NOT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user`, `month`, `year`, `date`, `type`, `total`, `status`, `remark`, `delete_status`) VALUES
(12, '71', 'November', '2024', '2024-11-30', 1, 2, 1, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manage_website`
--

CREATE TABLE `manage_website` (
  `id` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `short_title` varchar(600) NOT NULL,
  `logo` text NOT NULL,
  `footer` text NOT NULL,
  `currency_code` varchar(600) NOT NULL,
  `currency_symbol` varchar(600) NOT NULL,
  `login_logo` text NOT NULL,
  `invoice_logo` text NOT NULL,
  `background_login_image` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manage_website`
--

INSERT INTO `manage_website` (`id`, `title`, `short_title`, `logo`, `footer`, `currency_code`, `currency_symbol`, `login_logo`, `invoice_logo`, `background_login_image`, `status`) VALUES
(1, 'ProManage', 'Proman', 'PM-logo_d.svg', 'Shafat', 'bdt', 'BDT.', 'PM-logo_d.svg', '', 'Untitled6.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `month`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `operation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `operation`) VALUES
(25, 'Leaves', 'Leaves', 'Leaves'),
(26, 'Salary', 'Salary', 'Salary'),
(29, 'User', 'User', 'User'),
(30, 'Role', 'Role', 'Role'),
(32, 'Settings', 'Settings', 'Settings'),
(33, 'Author', 'Author', 'Author'),
(34, 'Backup Database', 'Backup Database', 'Backup Database');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(50) NOT NULL,
  `permission_id` int(50) NOT NULL,
  `group_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `group_id`) VALUES
(1, 25, 1),
(2, 25, 2),
(3, 31, 2),
(4, 24, 3),
(5, 25, 4),
(6, 26, 4),
(7, 29, 4),
(8, 30, 4),
(9, 32, 4),
(10, 33, 4),
(11, 34, 4);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `emp` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `leave` int(11) NOT NULL,
  `borrow` float NOT NULL,
  `actual` float NOT NULL,
  `final` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp`, `month`, `year`, `leave`, `borrow`, `actual`, `final`, `date`) VALUES
(8, '71', 'November', '2024', 0, 0, 5000, 150000, '2024-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alerts`
--

CREATE TABLE `tbl_alerts` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_alerts`
--

INSERT INTO `tbl_alerts` (`id`, `code`, `description`, `type`) VALUES
(1, '001', 'Invalid email or password', 'warning'),
(2, '002', 'Settings are updated', 'success'),
(3, '003', 'Record Added Successfully', 'success'),
(4, '004', 'Record Successfully Updated', 'success'),
(5, '005', 'Record Sudccessfully Deleted', 'success'),
(6, '006', 'Class has been registered', 'success'),
(7, '007', 'Class has been deleted', 'success'),
(8, '008', 'Class has been updated', 'success'),
(9, '009', 'Subject has been registered', 'success'),
(10, '010', 'Subject have been deleted', 'success'),
(11, '011', 'Subject has been updated', 'success'),
(12, '012', 'Email address is already registered', 'warning'),
(13, '013', 'Student have been registered', 'success'),
(14, '014', 'Student have been deleted', 'success'),
(15, '015', 'Student have been updated', 'success'),
(16, '016', 'School info has been updated', 'success'),
(17, '017', 'Logo image must be 400 X 400 Pixels', 'warning'),
(18, '018', 'Exam have been registered', 'success'),
(19, '019', 'Enroll number has been deleted', 'success'),
(20, '020', 'Exam has been updated', 'success'),
(21, '021', 'Question has been added', 'success'),
(22, '022', 'Profile have been updated', 'success'),
(23, '023', 'Password has been updated', 'success'),
(24, '024', 'Account was not found', 'danger'),
(25, '025', 'Open your email to continue', 'info'),
(26, '026', 'An error occurred while sending e-mail', 'warning'),
(27, '027', 'Assessment have been re-activated', 'success'),
(28, '028', 'All assessments have been re-acativate', 'success'),
(29, '029', 'Exam have been deleted', 'success'),
(30, '030', 'Notice have been pinned', 'success'),
(31, '031', 'Notice have been deleted', 'success'),
(32, '032', 'Please add some question before activating the exam', 'warning'),
(33, '033', 'Exam has been set active', 'success'),
(34, '034', 'Exam has been set inactive', 'success'),
(35, '035', 'Question has been deleted', 'success'),
(36, '036', 'Question has been updated', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deduct`
--

CREATE TABLE `tbl_deduct` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deduct_quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_deduct`
--

INSERT INTO `tbl_deduct` (`id`, `product_id`, `deduct_quantity`, `date`, `created_date_time`) VALUES
(1, 30, 1, '2024-09-30', '2024-09-30 12:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_config`
--

CREATE TABLE `tbl_email_config` (
  `id` int(21) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int(50) NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL,
  `approvestatus` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `status`, `delete_status`) VALUES
(1, 'ttttttttt', 'Deactive', 1),
(2, 'test', 'Active', 1),
(3, 'Set', 'Active', 0),
(4, 'Pair', 'Active', 0),
(5, 'Piece', 'Active', 0),
(6, 'Meter', 'Active', 0),
(7, '1 Meter', 'Active', 1),
(8, '10 Meter', 'Active', 1),
(9, 'XL', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `year`) VALUES
(1, '2020'),
(2, '2021'),
(3, '2022'),
(4, '2023'),
(5, '2024'),
(6, '2025'),
(7, '2026'),
(8, '2027'),
(9, '2028'),
(10, '2029'),
(11, '2030'),
(12, '2031'),
(13, '2032'),
(14, '2033'),
(15, '2034'),
(16, '2035'),
(17, '2036'),
(18, '2037'),
(19, '2038'),
(20, '2039'),
(21, '2040');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installement`
--
ALTER TABLE `installement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_website`
--
ALTER TABLE `manage_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_deduct`
--
ALTER TABLE `tbl_deduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `installement`
--
ALTER TABLE `installement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `manage_website`
--
ALTER TABLE `manage_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_deduct`
--
ALTER TABLE `tbl_deduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
