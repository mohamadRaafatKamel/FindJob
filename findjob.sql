-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 12:57 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8338111_findjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(11) NOT NULL,
  `cname` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `cname`) VALUES
(1, 'alex'),
(2, 'gda'),
(4, 'ccc2');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `fid` int(11) NOT NULL,
  `fname` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`fid`, `fname`) VALUES
(6, 'Technical support'),
(7, 'Development'),
(8, 'Marketing'),
(9, 'Accounts'),
(10, 'test'),
(11, 'Ø­Ø±Ø±Ø±Ø±Ø±');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jid` int(11) NOT NULL,
  `jname` varchar(51) NOT NULL,
  `jdetals` varchar(251) NOT NULL,
  `fid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `exper` varchar(51) NOT NULL,
  `no_avelable` int(3) NOT NULL,
  `qualif` varchar(51) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jid`, `jname`, `jdetals`, `fid`, `cid`, `exper`, `no_avelable`, `qualif`, `state`) VALUES
(1, 'job 1', 'job 1 job 1 job 1 job 1 job 1', 7, 1, 'More 10 year', 5, 'Bachelor', 1),
(2, 'job2', 'job2 job2 job2 job2 job2 v', 8, 2, 'More 10 year', 10, 'Diploma', 1);

-- --------------------------------------------------------

--
-- Table structure for table `joborder`
--

CREATE TABLE `joborder` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `jid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joborder`
--

INSERT INTO `joborder` (`oid`, `uid`, `jid`, `date`) VALUES
(1, 1, 1, '2020-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `uid_admin` int(11) NOT NULL,
  `uid_user` int(11) NOT NULL,
  `note` varchar(251) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `uid_admin`, `uid_user`, `note`, `seen`) VALUES
(1, 1, 1, 'test note', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(51) NOT NULL,
  `uemail` varchar(51) NOT NULL,
  `upass` varchar(51) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `gender` varchar(51) NOT NULL,
  `bday` date NOT NULL,
  `cid` int(11) NOT NULL,
  `exper` varchar(51) NOT NULL,
  `fid` int(11) NOT NULL,
  `img` varchar(51) NOT NULL,
  `qualif` varchar(51) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `state` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `upass`, `age`, `phone`, `gender`, `bday`, `cid`, `exper`, `fid`, `img`, `qualif`, `admin`, `state`) VALUES
(1, 'mohamad', 'aa@aa.aa', 'aa', 25, '01121426196', '0', '2020-04-11', 1, 'More 10 year', 7, 'imgUP/imguser10', 'Bachelor', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `fid` (`fid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `joborder`
--
ALTER TABLE `joborder`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `jid` (`jid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `uid_admin` (`uid_admin`),
  ADD KEY `uid_user` (`uid_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `in1` (`uemail`),
  ADD KEY `cid` (`cid`),
  ADD KEY `fid` (`fid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `joborder`
--
ALTER TABLE `joborder`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `field` (`fid`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `city` (`cid`);

--
-- Constraints for table `joborder`
--
ALTER TABLE `joborder`
  ADD CONSTRAINT `joborder_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `joborder_ibfk_2` FOREIGN KEY (`jid`) REFERENCES `job` (`jid`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`uid_admin`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`uid_user`) REFERENCES `user` (`uid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `field` (`fid`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `city` (`cid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
