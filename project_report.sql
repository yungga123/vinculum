-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 01:05 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `project_report`
--

CREATE TABLE `project_report` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_requested` date NOT NULL,
  `date_implemented` date NOT NULL,
  `date_finished` date NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_report_assigned_it`
--

CREATE TABLE `project_report_assigned_it` (
  `id` int(11) NOT NULL,
  `assigned_it` varchar(1000) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_report_assigned_tech`
--

CREATE TABLE `project_report_assigned_tech` (
  `id` int(11) NOT NULL,
  `assigned_tech` varchar(1000) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_report_direct_item`
--

CREATE TABLE `project_report_direct_item` (
  `id` int(11) NOT NULL,
  `direct_item` varchar(1000) NOT NULL,
  `qty` decimal(18,2) NOT NULL,
  `amt` decimal(18,2) NOT NULL,
  `consumed` decimal(18,2) NOT NULL,
  `returns` decimal(18,2) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_report_indirect_item`
--

CREATE TABLE `project_report_indirect_item` (
  `id` int(11) NOT NULL,
  `indirect_item` varchar(1000) NOT NULL,
  `qty` decimal(18,2) NOT NULL,
  `amt` decimal(18,2) NOT NULL,
  `consumed` decimal(18,2) NOT NULL,
  `returns` decimal(18,2) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_report_pettycash`
--

CREATE TABLE `project_report_pettycash` (
  `id` int(11) NOT NULL,
  `petty_cash` decimal(18,2) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_report_tools_rqstd`
--

CREATE TABLE `project_report_tools_rqstd` (
  `id` int(11) NOT NULL,
  `tool_rqstd` varchar(1000) NOT NULL,
  `qty` decimal(18,2) NOT NULL,
  `returns` decimal(18,2) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_report_transpo`
--

CREATE TABLE `project_report_transpo` (
  `id` int(11) NOT NULL,
  `transpo` decimal(18,2) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_report`
--
ALTER TABLE `project_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_report_assigned_it`
--
ALTER TABLE `project_report_assigned_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_report_assigned_tech`
--
ALTER TABLE `project_report_assigned_tech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_report_direct_item`
--
ALTER TABLE `project_report_direct_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_report_indirect_item`
--
ALTER TABLE `project_report_indirect_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_report_pettycash`
--
ALTER TABLE `project_report_pettycash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_report_tools_rqstd`
--
ALTER TABLE `project_report_tools_rqstd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_report_transpo`
--
ALTER TABLE `project_report_transpo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_report`
--
ALTER TABLE `project_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report_assigned_it`
--
ALTER TABLE `project_report_assigned_it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report_assigned_tech`
--
ALTER TABLE `project_report_assigned_tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report_direct_item`
--
ALTER TABLE `project_report_direct_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report_indirect_item`
--
ALTER TABLE `project_report_indirect_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report_pettycash`
--
ALTER TABLE `project_report_pettycash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report_tools_rqstd`
--
ALTER TABLE `project_report_tools_rqstd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report_transpo`
--
ALTER TABLE `project_report_transpo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
