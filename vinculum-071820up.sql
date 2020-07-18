-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 12:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinculum`
--

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `cutoff_start` date NOT NULL,
  `cutoff_end` date NOT NULL,
  `emp_id` varchar(500) NOT NULL,
  `days_worked` decimal(18,2) NOT NULL,
  `hours_late` decimal(18,2) NOT NULL,
  `days_absent` decimal(18,2) NOT NULL,
  `cash_adv` decimal(18,2) NOT NULL,
  `others` decimal(18,2) NOT NULL,
  `ot_hrs` decimal(18,2) NOT NULL,
  `night_diff_hrs` decimal(18,2) NOT NULL,
  `wdo` decimal(18,2) NOT NULL,
  `reg_holiday` decimal(18,2) NOT NULL,
  `special_holiday` decimal(18,2) NOT NULL,
  `addback` decimal(18,2) NOT NULL,
  `incentives` decimal(18,2) NOT NULL,
  `commission` decimal(18,2) NOT NULL,
  `13th_month` decimal(18,2) NOT NULL,
  `vacation_leave` decimal(18,2) NOT NULL,
  `sick_leave` decimal(18,2) NOT NULL,
  `rest_day` decimal(18,2) NOT NULL,
  `awol` decimal(18,2) NOT NULL,
  `remarks` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `id` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `position` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `sss_number` varchar(50) NOT NULL,
  `tin_number` varchar(50) NOT NULL,
  `pagibig_number` varchar(50) NOT NULL,
  `phil_health_number` varchar(50) NOT NULL,
  `status` varchar(500) NOT NULL,
  `validity` date NOT NULL,
  `date_hired` date NOT NULL,
  `daily_rate` decimal(18,2) NOT NULL,
  `pag_ibig_rate` decimal(18,2) NOT NULL,
  `sss_rate` decimal(18,2) NOT NULL,
  `phil_health_rate` decimal(18,2) NOT NULL,
  `tax` decimal(18,2) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
