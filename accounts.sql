-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 06:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `lastname`, `firstname`, `middlename`, `class`) VALUES
(1, 'admin', 'passwordsss', 'Administrator', 'Master', '', 0),
(2, 'yungga', 'yunggabells', 'Jardin', 'Reynan', 'Gallardo', 0),
(3, 'veronica1982', 'veronica01', 'Veronica', 'Sembrano', '', 0),
(4, 'IGSerrano', 'vinculum', 'Serrano', 'Irish Gale', '', 0),
(5, 'inventory', 'Maejoy08', 'Nobleza', 'Joy Mae', '', 0),
(6, 'HRAD', 'HRVinculum', 'Gaceta', 'Jenina', '', 0),
(7, 'engr1', 'gingineer', 'Ones', 'Jhon Patrick', '', 0),
(8, 'engr2', 'gingineer', 'Donato', 'Edrei', '', 0),
(9, 'rndengr', 'gingineer', 'Garzon', 'Gilord', '', 0),
(10, 'vinlucas', 'vinculum', 'Lucas', 'Vin', '', 0),
(11, 'ninogarzon', 'vinculum', 'Garzon', 'Ginelou Niño', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
