-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 08:06 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `batstat`
--

CREATE TABLE `batstat` (
  `playerID` varchar(15) NOT NULL,
  `innings` int(5) NOT NULL,
  `runs` int(5) NOT NULL,
  `balls` int(5) NOT NULL,
  `sixes` int(5) NOT NULL,
  `fours` int(5) NOT NULL,
  `fifties` int(5) NOT NULL,
  `hundred` int(5) NOT NULL,
  `notout` int(5) NOT NULL,
  `hs` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batstat`
--

INSERT INTO `batstat` (`playerID`, `innings`, `runs`, `balls`, `sixes`, `fours`, `fifties`, `hundred`, `notout`, `hs`) VALUES
('2018CSE32', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2018ECE12', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2018ECE59', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2018IT02', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2018IT13', 1, 16, 7, 0, 2, 0, 0, 1, 16),
('2018IT15', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2018IT53', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2020CSE26', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bowlstat`
--

CREATE TABLE `bowlstat` (
  `playerID` varchar(15) NOT NULL,
  `innings` int(5) NOT NULL,
  `wickets` int(5) NOT NULL,
  `runs` int(5) NOT NULL,
  `balls` int(5) NOT NULL,
  `dots` int(5) NOT NULL,
  `catches` int(4) NOT NULL,
  `runouts` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bowlstat`
--

INSERT INTO `bowlstat` (`playerID`, `innings`, `wickets`, `runs`, `balls`, `dots`, `catches`, `runouts`) VALUES
('2018CSE32', 0, 0, 0, 0, 0, 0, 0),
('2018ECE12', 0, 0, 0, 0, 0, 0, 0),
('2018ECE59', 0, 0, 0, 0, 0, 0, 0),
('2018IT02', 0, 0, 0, 0, 0, 0, 0),
('2018IT13', 0, 0, 0, 0, 0, 0, 0),
('2018IT15', 0, 0, 0, 0, 0, 0, 0),
('2018IT53', 0, 0, 0, 0, 0, 0, 0),
('2020CSE26', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `matchinfo`
--

CREATE TABLE `matchinfo` (
  `matchID` varchar(10) NOT NULL,
  `toss` varchar(10) NOT NULL,
  `bat` varchar(10) NOT NULL,
  `bowl` varchar(10) NOT NULL,
  `umpire1` varchar(20) NOT NULL,
  `umpire2` varchar(20) NOT NULL,
  `team1playing11` varchar(160) NOT NULL,
  `team2playing11` varchar(160) NOT NULL,
  `bowlCapt` varchar(10) NOT NULL,
  `bowlWk` varchar(10) NOT NULL,
  `batCapt` varchar(10) NOT NULL,
  `batWk` varchar(10) NOT NULL,
  `venue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matchinfo`
--

INSERT INTO `matchinfo` (`matchID`, `toss`, `bat`, `bowl`, `umpire1`, `umpire2`, `team1playing11`, `team2playing11`, `bowlCapt`, `bowlWk`, `batCapt`, `batWk`, `venue`) VALUES
('itcs01', 'cse54', 'IT1146', 'cse54', 'kk', 'bk', '2018CSE32,2020CSE26', '2018IT02,2018IT13,2018IT15,2018IT53', '2020CSE26', '2020CSE26', '2018IT13', '2018IT53', 'mm'),
('rr14', 'ECE27', 'IT1146', 'ECE27', 'kk', 'bk', '2018ECE12,2018ECE59', '2018IT02,2018IT13,2018IT15,2018IT53', '2018ECE12', '2018ECE12', '2018IT13', '2018IT53', 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `matchstatus`
--

CREATE TABLE `matchstatus` (
  `matchID` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `wonBy` varchar(10) NOT NULL,
  `runs` varchar(5) NOT NULL,
  `wickets` varchar(5) NOT NULL,
  `teamLost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playerprofile`
--

CREATE TABLE `playerprofile` (
  `playerID` varchar(15) NOT NULL,
  `name` text NOT NULL,
  `team` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `role` varchar(25) NOT NULL,
  `batstyle` varchar(25) DEFAULT NULL,
  `bowlstyle` varchar(25) DEFAULT NULL,
  `debutdate` date NOT NULL,
  `debutoppteam` varchar(20) NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerprofile`
--

INSERT INTO `playerprofile` (`playerID`, `name`, `team`, `dob`, `role`, `batstyle`, `bowlstyle`, `debutdate`, `debutoppteam`, `year`) VALUES
('2018CSE32', 'Aman Mishra', 'cse54', '1996-03-25', 'Bowling AllRounder', 'Left Handed Batsman', 'Right Arm Off Spin', '2016-01-22', 'IT1146', '4th'),
('2018ECE12', 'Arkadeep', 'ECE27', '1997-06-19', 'WK-Batsman', 'Right Handed Batsman', 'Right Arm Medium', '2016-02-03', 'IT1146', '4th'),
('2018ECE59', 'Anish Kumar Singh', 'ECE27', '1997-07-31', 'Bowler', 'Right Handed Batsman', 'Right Arm Off Spin', '2016-02-01', 'IT1146', '4th'),
('2018IT02', 'Aman Agarwal', 'IT1146', '1997-11-09', 'Batting AllRounder', 'Right Handed Batsman', 'Right Arm Off Spin', '2019-01-28', 'cse54', '4th'),
('2018IT13', 'Mrinal Chandra', 'IT1146', '1996-03-21', 'Batting AllRounder', 'Right Handed Batsman', 'Right Arm Off Spin', '2016-01-27', 'cse54', '4th'),
('2018IT15', 'Pranjal Jha', 'IT1146', '1997-03-15', 'Bowling AllRounder', 'Right Handed Batsman', 'Right Arm Medium Fast', '2016-01-22', 'cse54', '4th'),
('2018IT53', 'Ankit Singh', 'IT1146', '1995-11-02', 'Batting AllRounder', 'Left Handed Batsman', 'Right Arm Fast', '2016-01-22', 'cse54', '4th'),
('2020CSE26', 'Atif J. Khan', 'cse54', '1996-08-21', 'WK-Batsman', 'Right Handed Batsman', 'Right Arm Medium', '2016-01-27', 'IT1146', '4th');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled`
--

CREATE TABLE `scheduled` (
  `category` varchar(10) NOT NULL,
  `matchNumber` int(2) NOT NULL,
  `matchTime` time NOT NULL,
  `matchDate` date NOT NULL,
  `team1` varchar(10) NOT NULL,
  `team2` varchar(10) NOT NULL,
  `matchType` varchar(20) NOT NULL,
  `matchID` varchar(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheduled`
--

INSERT INTO `scheduled` (`category`, `matchNumber`, `matchTime`, `matchDate`, `team1`, `team2`, `matchType`, `matchID`, `uname`, `pass`) VALUES
('Boys ', 1, '14:00:00', '2019-02-12', 'cse54', 'IT1146', 'League', 'itcs01', 'Saloni', 'sal35'),
('Boys ', 2, '07:05:00', '2019-04-26', 'ECE27', 'IT1146', 'League', 'rr14', 'Rahul', 'rah49');

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE `scorecard` (
  `match_id` varchar(10) NOT NULL,
  `bat_team_id` varchar(10) NOT NULL,
  `balls_delivered` int(3) NOT NULL,
  `no_of_balls` int(3) NOT NULL,
  `ball_type` varchar(10) DEFAULT NULL,
  `runs` int(2) NOT NULL,
  `ball_struck` varchar(6) NOT NULL,
  `striker` varchar(10) NOT NULL,
  `non-striker` varchar(10) NOT NULL,
  `wicket` int(1) NOT NULL,
  `wicket_type` varchar(10) DEFAULT NULL,
  `bowler` varchar(10) NOT NULL,
  `fielder` varchar(10) NOT NULL,
  `player_dismissed` varchar(10) DEFAULT NULL,
  `server_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorecard`
--

INSERT INTO `scorecard` (`match_id`, `bat_team_id`, `balls_delivered`, `no_of_balls`, `ball_type`, `runs`, `ball_struck`, `striker`, `non-striker`, `wicket`, `wicket_type`, `bowler`, `fielder`, `player_dismissed`, `server_time`) VALUES
('itcs01', 'IT1146', 1, 1, 'Normal', 4, 'Bat', '2018IT13', '2018IT02', 0, 'None', '2018CSE32', 'None', 'None', '2019-04-18 02:00:05'),
('itcs01', 'IT1146', 2, 1, 'Normal', 1, 'Bat', '2018IT13', '2018IT02', 0, 'None', '2018CSE32', '2020CSE26', 'None', '2019-04-22 04:01:24'),
('itcs01', 'IT1146', 3, 1, 'Normal', 1, 'Bat', '2018IT02', '2018IT13', 0, 'None', '2018CSE32', '2018CSE32', 'None', '2019-04-22 04:01:56'),
('itcs01', 'IT1146', 4, 0, 'No Ball', 4, 'Bat', '2018IT13', '2018IT02', 0, 'None', '2018CSE32', '2020CSE26', 'None', '2019-04-22 04:02:48'),
('itcs01', 'IT1146', 5, 0, 'Wide', 3, 'Bat', '2018IT02', '2018IT13', 0, 'None', '2018CSE32', '2020CSE26', 'None', '2019-04-22 04:03:06'),
('itcs01', 'IT1146', 6, 1, 'Normal', 1, 'Bat', '2018IT02', '2018IT13', 0, 'None', '2018CSE32', '2018CSE32', 'None', '2019-04-22 04:03:26'),
('itcs01', 'IT1146', 7, 1, 'Normal', 2, 'Bat', '2018IT13', '2018IT02', 0, 'None', '2018CSE32', '2020CSE26', 'None', '2019-04-22 04:03:37'),
('itcs01', 'IT1146', 8, 1, 'Normal', 1, 'Bat', '2018IT13', '2018IT02', 0, 'None', '2018CSE32', '2020CSE26', 'None', '2019-04-22 04:05:15'),
('itcs01', 'IT1146', 9, 1, 'Normal', 1, 'Bat', '2018IT13', '2018IT02', 0, 'None', '2020CSE26', '2018CSE32', 'None', '2019-04-24 14:52:44'),
('itcs01', 'IT1146', 10, 1, 'Normal', 2, 'Bat', '2018IT02', '2018IT13', 0, 'None', '2020CSE26', '2018CSE32', 'None', '2019-04-24 14:53:57'),
('itcs01', 'IT1146', 11, 1, 'Normal', 1, 'Bat', '2018IT02', '2018IT13', 0, 'None', '2020CSE26', '2018CSE32', 'None', '2019-04-24 14:54:27'),
('itcs01', 'IT1146', 12, 1, 'Normal', 3, 'Bat', '2018IT13', '2018IT02', 0, 'None', '2020CSE26', '2018CSE32', 'None', '2019-04-24 14:54:40'),
('itcs01', 'IT1146', 13, 1, 'Normal', 4, 'Bat', '2018IT02', '2018IT13', 0, 'None', '2020CSE26', '2018CSE32', 'None', '2019-04-24 14:54:49'),
('itcs01', 'IT1146', 14, 1, 'Normal', 6, 'Bat', '2018IT02', '2018IT13', 0, 'None', '2020CSE26', 'None', 'None', '2019-04-24 14:55:02'),
('itcs01', 'IT1146', 15, 1, 'Normal', 1, 'Bat', '2018IT15', '2018IT53', 0, 'None', '2018CSE32', '2020CSE26', 'None', '2019-04-24 15:31:52'),
('itcs01', 'IT1146', 16, 1, 'Normal', 2, 'Bat', '2018IT53', '2018IT15', 0, 'None', '2018CSE32', 'None', 'None', '2019-04-24 15:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `studreg`
--

CREATE TABLE `studreg` (
  `id` varchar(9) NOT NULL,
  `sports` varchar(14) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `roll` varchar(3) NOT NULL,
  `year` varchar(2) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studreg`
--

INSERT INTO `studreg` (`id`, `sports`, `dept`, `name`, `roll`, `year`, `phone`, `mail`) VALUES
('02-4-2019', 'Cricket', 'IT', 'Aman Agarwal', '02', '4', '9836978468', 'amanagarwal0911@gmail.com'),
('02-4-2019', 'Table-Tennis', 'IT', 'Aman Agarwal', '02', '4', '9836978468', 'amanagarwal0911@gmail.com'),
('56-3-2019', 'Badminton', 'EE', 'Deepak Singh', '56', '3', '9777456231', 'deepaash@gmail.com'),
('56-3-2019', 'Football', 'EE', 'Deepak Singh', '56', '1', '9833364215', 'deepaash@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teaminfo`
--

CREATE TABLE `teaminfo` (
  `teamID` varchar(10) NOT NULL,
  `dept` varchar(4) NOT NULL,
  `deptFullName` varchar(35) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `deptColor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaminfo`
--

INSERT INTO `teaminfo` (`teamID`, `dept`, `deptFullName`, `logo`, `deptColor`) VALUES
('cse54', 'CSE', 'Computer Science', 'cslogo1.jpg', '#30cf54'),
('ECE27', 'ECE', 'Electronics Communication', 'ecelogo1.jpg', '#f2da29'),
('IT1146', 'IT', 'Information Technology', 'itlogo1.jpg', '#2a31b7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batstat`
--
ALTER TABLE `batstat`
  ADD PRIMARY KEY (`playerID`);

--
-- Indexes for table `bowlstat`
--
ALTER TABLE `bowlstat`
  ADD PRIMARY KEY (`playerID`);

--
-- Indexes for table `matchinfo`
--
ALTER TABLE `matchinfo`
  ADD PRIMARY KEY (`matchID`),
  ADD KEY `bat` (`bat`),
  ADD KEY `bowl` (`bowl`),
  ADD KEY `toss` (`toss`),
  ADD KEY `matchinfo_ibfk_5` (`batCapt`),
  ADD KEY `matchinfo_ibfk_6` (`batWk`),
  ADD KEY `matchinfo_ibfk_7` (`bowlCapt`),
  ADD KEY `matchinfo_ibfk_8` (`bowlWk`);

--
-- Indexes for table `matchstatus`
--
ALTER TABLE `matchstatus`
  ADD PRIMARY KEY (`matchID`);

--
-- Indexes for table `playerprofile`
--
ALTER TABLE `playerprofile`
  ADD PRIMARY KEY (`playerID`),
  ADD KEY `teamfk` (`team`),
  ADD KEY `teamoppfk` (`debutoppteam`);

--
-- Indexes for table `scheduled`
--
ALTER TABLE `scheduled`
  ADD PRIMARY KEY (`category`,`matchNumber`),
  ADD UNIQUE KEY `matchID` (`matchID`),
  ADD KEY `schedule_ibfk_1` (`team2`),
  ADD KEY `schedule_ibfk_2` (`team1`);

--
-- Indexes for table `scorecard`
--
ALTER TABLE `scorecard`
  ADD PRIMARY KEY (`match_id`,`bat_team_id`,`balls_delivered`);

--
-- Indexes for table `studreg`
--
ALTER TABLE `studreg`
  ADD PRIMARY KEY (`id`,`sports`,`dept`);

--
-- Indexes for table `teaminfo`
--
ALTER TABLE `teaminfo`
  ADD PRIMARY KEY (`teamID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batstat`
--
ALTER TABLE `batstat`
  ADD CONSTRAINT `fk102` FOREIGN KEY (`playerID`) REFERENCES `playerprofile` (`playerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bowlstat`
--
ALTER TABLE `bowlstat`
  ADD CONSTRAINT `fk103` FOREIGN KEY (`playerID`) REFERENCES `playerprofile` (`playerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matchinfo`
--
ALTER TABLE `matchinfo`
  ADD CONSTRAINT `matchinfo_ibfk_1` FOREIGN KEY (`bat`) REFERENCES `teaminfo` (`teamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `matchinfo_ibfk_2` FOREIGN KEY (`bowl`) REFERENCES `teaminfo` (`teamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `matchinfo_ibfk_3` FOREIGN KEY (`toss`) REFERENCES `teaminfo` (`teamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `matchinfo_ibfk_4` FOREIGN KEY (`matchID`) REFERENCES `scheduled` (`matchID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `matchinfo_ibfk_5` FOREIGN KEY (`batCapt`) REFERENCES `playerprofile` (`playerID`),
  ADD CONSTRAINT `matchinfo_ibfk_6` FOREIGN KEY (`batWk`) REFERENCES `playerprofile` (`playerID`),
  ADD CONSTRAINT `matchinfo_ibfk_7` FOREIGN KEY (`bowlCapt`) REFERENCES `playerprofile` (`playerID`),
  ADD CONSTRAINT `matchinfo_ibfk_8` FOREIGN KEY (`bowlWk`) REFERENCES `playerprofile` (`playerID`);

--
-- Constraints for table `matchstatus`
--
ALTER TABLE `matchstatus`
  ADD CONSTRAINT `fk101` FOREIGN KEY (`matchID`) REFERENCES `scheduled` (`matchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playerprofile`
--
ALTER TABLE `playerprofile`
  ADD CONSTRAINT `teamfk` FOREIGN KEY (`team`) REFERENCES `teaminfo` (`teamID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teamoppfk` FOREIGN KEY (`debutoppteam`) REFERENCES `teaminfo` (`teamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scheduled`
--
ALTER TABLE `scheduled`
  ADD CONSTRAINT `scheduled_ibfk_1` FOREIGN KEY (`team2`) REFERENCES `teaminfo` (`teamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduled_ibfk_2` FOREIGN KEY (`team1`) REFERENCES `teaminfo` (`teamID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
