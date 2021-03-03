-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 10:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
-- Table structure for table `home_alarm_clients`
--

CREATE TABLE `home_alarm_clients` (
  `id` int(11) NOT NULL,
  `datetime_added` datetime NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `bdate` date NOT NULL,
  `email_address` varchar(500) NOT NULL,
  `nationality` varchar(500) NOT NULL,
  `residence_address` text NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `spouse_first_name` varchar(500) NOT NULL,
  `spouse_middle_name` varchar(500) NOT NULL,
  `spouse_last_name` varchar(500) NOT NULL,
  `spouse_bdate` date NOT NULL,
  `spouse_email_address` varchar(500) NOT NULL,
  `spouse_nationality` varchar(500) NOT NULL,
  `spouse_contact_no` varchar(100) NOT NULL,
  `household_count` int(11) NOT NULL,
  `house_floors` int(11) NOT NULL,
  `signal_strength` decimal(18,2) NOT NULL,
  `demo_kit_presentation` varchar(50) NOT NULL,
  `property_type` varchar(500) NOT NULL,
  `helpers_number` int(11) NOT NULL,
  `speed_test` decimal(18,2) NOT NULL,
  `gps_coordinate` varchar(500) NOT NULL,
  `pets_number` int(11) NOT NULL,
  `lot_area` decimal(18,2) NOT NULL,
  `isp` varchar(200) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home_alarm_pricing`
--

CREATE TABLE `home_alarm_pricing` (
  `id` int(11) NOT NULL,
  `device` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home_alarm_transactions`
--

CREATE TABLE `home_alarm_transactions` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `wireless_keypad` int(11) NOT NULL,
  `magnetic_contact` int(11) NOT NULL,
  `displacement_detector` int(11) NOT NULL,
  `indoor_motionsensor` int(11) NOT NULL,
  `water_leak_detector` int(11) NOT NULL,
  `indoor_siren` int(11) NOT NULL,
  `ic_card_tags` int(11) NOT NULL,
  `outdoor_motionsensor` int(11) NOT NULL,
  `alarm_output_expander` int(11) NOT NULL,
  `outdoor_siren` int(11) NOT NULL,
  `remote_keyfob` int(11) NOT NULL,
  `panic_button` int(11) NOT NULL,
  `host_panel` int(11) NOT NULL,
  `smoke_detector` int(11) NOT NULL,
  `wireless_repeater` int(11) NOT NULL,
  `cctv` int(11) NOT NULL,
  `final_remarks` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_alarm_clients`
--
ALTER TABLE `home_alarm_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_alarm_pricing`
--
ALTER TABLE `home_alarm_pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_alarm_transactions`
--
ALTER TABLE `home_alarm_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_alarm_clients`
--
ALTER TABLE `home_alarm_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_alarm_pricing`
--
ALTER TABLE `home_alarm_pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_alarm_transactions`
--
ALTER TABLE `home_alarm_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
