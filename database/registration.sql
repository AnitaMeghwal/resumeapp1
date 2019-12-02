-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 11:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE `certification` (
  `certid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `institute` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `startdate` varchar(11) NOT NULL,
  `enddate` varchar(11) NOT NULL,
  `description` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`certid`, `username`, `degree`, `institute`, `location`, `startdate`, `enddate`, `description`) VALUES
(4, 'anita', 'jkjl', 'qwert', 'bmn,m', 'iop', 'bnm,', 'fhjk'),
(5, 'anita', 'jkjl', 'qwert', 'bmn,m', 'iop', 'bnm,', 'fhjk');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `eduid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `institute` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `startdate` varchar(11) NOT NULL,
  `enddate` varchar(11) NOT NULL,
  `description` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`eduid`, `username`, `degree`, `institute`, `location`, `startdate`, `enddate`, `description`) VALUES
(4, 'anita', 'M tech', 'vnit', 'nagpur', '6-7-89', '5-8-11', 'asdfghjqwerty');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `institute` varchar(250) NOT NULL,
  `event` varchar(250) NOT NULL,
  `date` varchar(11) NOT NULL,
  `description` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `username`, `institute`, `event`, `date`, `description`) VALUES
(11, 'anita', 'qwert', 'qwert', 'qwert', 'qwert');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `exid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `startdate` varchar(20) NOT NULL,
  `enddate` varchar(20) NOT NULL,
  `location` varchar(250) NOT NULL,
  `description` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`exid`, `username`, `title`, `company`, `startdate`, `enddate`, `location`, `description`) VALUES
(22, 'anita', 'title1', 'company1', '11-04-2011', '12-04-2012', 'bangalore', 'hgfdusjrdfhsdbj'),
(23, 'anita', 'title1', 'company1', '11-04-2011', '12-04-2012', 'bangalore', 'hgfdusjrdfhsdbj'),
(24, 'anita', 'title1', 'company1', '11-04-2011', '12-04-2012', 'bangalore', 'hgfdusjrdfhsdbj');

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `hid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `skills` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highlights`
--

INSERT INTO `highlights` (`hid`, `username`, `skills`) VALUES
(10, 'anita', 'C, C++, Java'),
(11, 'Annu', 'c, c++, java');

-- --------------------------------------------------------

--
-- Table structure for table `profile_details`
--

CREATE TABLE `profile_details` (
  `profileid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_details`
--

INSERT INTO `profile_details` (`profileid`, `username`, `email`, `fullname`, `location`, `phone`) VALUES
(47, 'Annu', 'ani@gmail.com', 'Annu', 'Bangalore', '09460404191'),
(48, 'anita', 'annu@gmail.com', 'Anita Meghwal', 'Udaipur', '09460404191');

-- --------------------------------------------------------

--
-- Table structure for table `profile_overview`
--

CREATE TABLE `profile_overview` (
  `Overviewid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `overview` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_overview`
--

INSERT INTO `profile_overview` (`Overviewid`, `username`, `overview`) VALUES
(2, 'anita', '         M.Tech in CSE');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `skills` varchar(250) NOT NULL,
  `applink` varchar(250) NOT NULL,
  `startdate` varchar(11) NOT NULL,
  `enddate` varchar(11) NOT NULL,
  `description` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projid`, `username`, `title`, `skills`, `applink`, `startdate`, `enddate`, `description`) VALUES
(5, 'anita', 'proj1', 'C, C++, Java,', 'bhjkl', 'bnm,', 'hjkl', 'hjkl;\'');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'anita', 'anitameghwalcs@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f'),
(2, 'Annu', 'annu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`certid`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`eduid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD PRIMARY KEY (`profileid`);

--
-- Indexes for table `profile_overview`
--
ALTER TABLE `profile_overview`
  ADD PRIMARY KEY (`Overviewid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `certid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `eduid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `exid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile_details`
--
ALTER TABLE `profile_details`
  MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `profile_overview`
--
ALTER TABLE `profile_overview`
  MODIFY `Overviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
