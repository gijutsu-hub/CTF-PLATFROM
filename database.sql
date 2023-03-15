-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 09:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `achivment`
--

CREATE TABLE `achivment` (
  `userid` varchar(225) NOT NULL,
  `achivement` varchar(225) NOT NULL,
  `achivementdesc` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `link` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(225) NOT NULL,
  `Pass` varchar(225) NOT NULL,
  `IP` varchar(400) DEFAULT NULL,
  `Code` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `messageid` varchar(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `ctfname` varchar(225) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `descrip` varchar(1000) NOT NULL,
  `reply` varchar(1000) DEFAULT NULL,
  `solved` varchar(20) NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ctfch`
--

CREATE TABLE `ctfch` (
  `challengeid` varchar(225) NOT NULL,
  `ctfname` varchar(225) NOT NULL,
  `createdby` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `point` int(10) NOT NULL,
  `description` varchar(225) NOT NULL,
  `solve` int(10) NOT NULL DEFAULT 0,
  `flag` varchar(225) NOT NULL,
  `verified` varchar(225) NOT NULL DEFAULT 'FALSE',
  `resource` varchar(225) NOT NULL,
  `scorning` varchar(20) NOT NULL DEFAULT 'FALSE',
  `thrpoint` varchar(10) DEFAULT '0',
  `minpt` int(20) NOT NULL DEFAULT 10,
  `jwt` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evedetails`
--

CREATE TABLE `evedetails` (
  `ctfname` varchar(225) NOT NULL,
  `ctfdesc` varchar(1000) NOT NULL,
  `orgnizer` varchar(225) NOT NULL,
  `orgnizerdeta` varchar(2250) NOT NULL,
  `teamsz` int(2) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grand`
--

CREATE TABLE `grand` (
  `awards` varchar(225) NOT NULL,
  `badge` varchar(225) NOT NULL,
  `badgelink` varchar(225) NOT NULL,
  `id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Name` varchar(300) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `point` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solve`
--

CREATE TABLE `solve` (
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(225) NOT NULL,
  `challengeid` varchar(225) NOT NULL,
  `challengetype` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `start`
--

CREATE TABLE `start` (
  `time` timestamp NULL DEFAULT current_timestamp(),
  `value` varchar(20) NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `tname` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `userid` varchar(225) NOT NULL,
  `tlogo` varchar(225) NOT NULL,
  `tdesc` varchar(255) NOT NULL,
  `tpoint` int(10) NOT NULL DEFAULT 0,
  `ban` varchar(20) NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tpoints`
--

CREATE TABLE `tpoints` (
  `tid` varchar(225) NOT NULL,
  `tname` varchar(225) NOT NULL,
  `tpoints` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tsolve`
--

CREATE TABLE `tsolve` (
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `tid` varchar(225) NOT NULL,
  `cid` varchar(225) NOT NULL,
  `userid` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usdetails`
--

CREATE TABLE `usdetails` (
  `userid` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `country` varchar(10) NOT NULL,
  `proflink` varchar(700) NOT NULL DEFAULT 'https://static.vecteezy.com/system/resources/previews/006/487/912/original/hacker-avatar-ilustration-free-vector.jpg',
  `sociallink` varchar(225) NOT NULL,
  `Admin` varchar(225) DEFAULT 'FALSE',
  `ban` varchar(225) NOT NULL DEFAULT 'FLASE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `veri` varchar(225) NOT NULL,
  `verified` varchar(22) NOT NULL DEFAULT 'notverified',
  `passveri` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usrctf`
--

CREATE TABLE `usrctf` (
  `username` varchar(225) NOT NULL,
  `solved` int(10) NOT NULL DEFAULT 0,
  `awards` int(10) NOT NULL DEFAULT 0,
  `position` varchar(225) NOT NULL DEFAULT 'Kidde',
  `point` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `veriemails`
--

CREATE TABLE `veriemails` (
  `domains` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `IP` (`IP`,`Code`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `ctfch`
--
ALTER TABLE `ctfch`
  ADD PRIMARY KEY (`challengeid`);

--
-- Indexes for table `grand`
--
ALTER TABLE `grand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `awards` (`awards`,`badge`,`badgelink`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tpoints`
--
ALTER TABLE `tpoints`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `usdetails`
--
ALTER TABLE `usdetails`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `usrctf`
--
ALTER TABLE `usrctf`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
