-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 06:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricket_league`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_match`
--

CREATE TABLE `tbl_match` (
  `match_id` int(11) NOT NULL,
  `team1` int(11) DEFAULT NULL,
  `team2` int(11) DEFAULT NULL,
  `match_date` date NOT NULL,
  `match_status` enum('0','1') DEFAULT NULL,
  `winner` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_match`
--

INSERT INTO `tbl_match` (`match_id`, `team1`, `team2`, `match_date`, `match_status`, `winner`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2018-06-01', '1', 1, 2, '2018-07-14 03:26:46', '2018-07-14 14:04:08'),
(2, 1, 2, '2018-06-09', '1', 2, 2, '2018-07-14 03:26:46', '2018-07-14 14:04:27'),
(3, 2, 1, '2018-06-17', '0', NULL, 1, '2018-07-14 03:27:58', '2018-07-15 14:23:04'),
(4, 3, 2, '2018-06-30', '1', 3, 2, '2018-07-14 03:27:58', '2018-07-15 14:24:44'),
(5, 1, 2, '2018-07-07', '1', 2, 2, '2018-07-14 03:29:46', '2018-07-14 14:05:19'),
(6, 4, 2, '2018-07-15', '1', 4, 2, '2018-07-14 03:29:46', '2018-07-15 14:24:52'),
(7, 1, 2, '2018-07-17', '1', 1, 2, '2018-07-14 03:31:34', '2018-07-14 14:05:37'),
(8, 1, 2, '2018-07-20', '1', 2, 2, '2018-07-14 03:31:34', '2018-07-14 14:05:43'),
(9, 2, 3, '2018-05-01', '1', 3, 2, '2018-07-14 05:22:45', '2018-07-15 14:23:28'),
(10, 1, 3, '2018-05-05', '1', 1, 2, '2018-07-14 05:22:45', '2018-07-14 14:06:22'),
(11, 1, 3, '2018-05-08', '0', NULL, 1, '2018-07-14 05:26:52', '2018-07-14 14:06:30'),
(12, 4, 3, '2018-05-14', '1', 4, 2, '2018-07-14 05:26:52', '2018-07-14 14:06:39'),
(13, 4, 3, '2018-05-19', '1', 3, 2, '2018-07-14 05:28:22', '2018-07-14 14:06:46'),
(14, 4, 3, '2018-07-14', '1', 4, 2, '2018-07-14 05:28:22', '2018-07-14 14:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_player`
--

CREATE TABLE `tbl_player` (
  `player_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `jersey_number` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_player`
--

INSERT INTO `tbl_player` (`player_id`, `team_id`, `first_name`, `last_name`, `image`, `jersey_number`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mahendra Singh ', 'Dhoni', 'dhoni.png', 7, 'India', '2018-07-14 08:40:26', '0000-00-00 00:00:00'),
(2, 2, 'David ', 'Miller', 'davMiller.png', 16, 'South Africa', '2018-07-14 10:52:23', '0000-00-00 00:00:00'),
(3, 3, 'Virat', 'Kohli', 'virKohli.png', 78, 'India', '2018-07-14 10:53:46', '0000-00-00 00:00:00'),
(4, 4, 'David', 'Warner', 'davWarner.png', 9, 'Australia', '2018-07-14 10:54:58', '0000-00-00 00:00:00'),
(5, 1, 'Shane', 'Watson', 'ShanWatson.png', 3, 'Australia', '2018-07-14 10:58:13', '0000-00-00 00:00:00'),
(6, 1, 'Suresh', 'Raina', 'SurRaina.png', 44, 'India', '2018-07-14 10:58:13', '0000-00-00 00:00:00'),
(7, 1, 'Mark', 'Wood', 'markWood.png', 1, 'England', '2018-07-14 10:58:13', '0000-00-00 00:00:00'),
(8, 1, 'Mark', 'Watson', 'markWood.png', 90, 'England', '2018-07-14 10:58:55', '2018-07-14 10:59:44'),
(9, 1, 'Mitchell ', 'Santner', 'mitSan.png', 76, 'New Zealand', '2018-07-14 11:01:58', '0000-00-00 00:00:00'),
(10, 1, 'KM ', 'Asif', 'kmAsif.png', 76, 'India', '2018-07-14 11:04:54', '0000-00-00 00:00:00'),
(11, 1, 'Kedar', 'Jadhav', 'kedJad.png', 11, 'India', '2018-07-14 11:04:54', '0000-00-00 00:00:00'),
(12, 1, 'Shardul ', 'Thakur', 'sharThakur.png', 12, 'India', '2018-07-14 11:04:54', '0000-00-00 00:00:00'),
(13, 1, 'Mitchell ', 'Santner', 'mitSan.png', 14, 'New Zealand', '2018-07-14 11:04:54', '0000-00-00 00:00:00'),
(14, 1, 'KM ', 'Asif', 'kmAsif.png', 15, 'India', '2018-07-14 11:05:21', '0000-00-00 00:00:00'),
(15, 1, 'Kedar', 'Jadhav', 'kedJad.png', 16, 'India', '2018-07-14 11:05:21', '0000-00-00 00:00:00'),
(16, 1, 'Shardul ', 'Thakur', 'sharThakur.png', 17, 'India', '2018-07-14 11:05:21', '0000-00-00 00:00:00'),
(17, 1, 'Mitchell ', 'Santner', 'mitSan.png', 18, 'New Zealand', '2018-07-14 11:05:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_player_history`
--

CREATE TABLE `tbl_player_history` (
  `player_history_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `matches_played` int(11) NOT NULL,
  `total_runs` int(11) NOT NULL,
  `highest_score` int(11) NOT NULL,
  `fifties` int(11) NOT NULL,
  `hundreds` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_player_history`
--

INSERT INTO `tbl_player_history` (`player_history_id`, `player_id`, `matches_played`, `total_runs`, `highest_score`, `fifties`, `hundreds`, `created_at`, `updated_at`) VALUES
(1, 1, 115, 3000, 120, 20, 6, '2018-07-15 14:15:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `team_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `club_state` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`team_id`, `name`, `logo`, `club_state`, `created_at`, `updated_at`) VALUES
(1, 'Chennai Super King', 'csk.png', 'Chennai', '2018-07-12 12:34:24', '0000-00-00 00:00:00'),
(2, 'Punjab King''s Eleven', 'pke.png', 'Punjab', '2018-07-12 13:29:39', '2018-07-12 13:30:53'),
(3, 'Bangalore Challengers', 'banC.png', 'Karnataka', '2018-07-14 10:47:34', '0000-00-00 00:00:00'),
(4, 'Sunrisers Hyderabad', 'sunH.png', 'Telangana', '2018-07-14 10:48:59', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_match`
--
ALTER TABLE `tbl_match`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `tbl_player`
--
ALTER TABLE `tbl_player`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `tbl_player_history`
--
ALTER TABLE `tbl_player_history`
  ADD PRIMARY KEY (`player_history_id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_player`
--
ALTER TABLE `tbl_player`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_player_history`
--
ALTER TABLE `tbl_player_history`
  MODIFY `player_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
