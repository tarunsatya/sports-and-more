-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 11:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `standalone`
--

-- --------------------------------------------------------

--
-- Table structure for table `leadership_board`
--

CREATE TABLE `leadership_board` (
  `id` int(11) NOT NULL,
  `for_otp` text NOT NULL,
  `for_survey_form` text NOT NULL,
  `for_firsttime_booking` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leadership_board`
--

INSERT INTO `leadership_board` (`id`, `for_otp`, `for_survey_form`, `for_firsttime_booking`, `date`, `status`) VALUES
(3, '500', '500', '500', '2022-03-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otp_validation`
--

CREATE TABLE `otp_validation` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `otp` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp_validation`
--

INSERT INTO `otp_validation` (`id`, `email`, `otp`, `status`, `created_date`) VALUES
(1, 'haridatta1513@gmail.com', '5083', 1, '12-03-22'),
(2, 'haridatta1513@gmail.com', '1208', 1, '12-03-22'),
(3, 'sanjay@g.com', '4162', 1, '12-03-22'),
(4, 'sa@g.com', '7619', 1, '12-03-22'),
(5, '1@g.com', '2603', 1, '12-03-22'),
(6, 's@g.com', '6353', 1, '12-03-22'),
(7, 'h@g.com', '1824', 1, '12-03-22'),
(8, 'sm@g.com', '1862', 1, '12-03-22'),
(9, 'test@g.com', '3295', 1, '12-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `sub_title` text NOT NULL,
  `image` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banners`
--

INSERT INTO `tbl_banners` (`id`, `title`, `sub_title`, `image`, `status`) VALUES
(6, 'Cricket', 'lorem ipsum dolor sit amet consecuter', '20220312534014.png', 1),
(7, 'Badminton', 'lorem ipsum dolor sit amet consecuter', '20220312342206.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_features`
--

CREATE TABLE `tbl_features` (
  `feature_id` int(11) NOT NULL,
  `feature_name` varchar(250) NOT NULL,
  `feature_status` tinyint(1) NOT NULL,
  `feature_addedby` int(11) NOT NULL,
  `feature_updatedby` int(11) NOT NULL,
  `feature_createddate` date NOT NULL,
  `feature_updateddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_friends`
--

CREATE TABLE `tbl_friends` (
  `friend_id` int(11) NOT NULL,
  `friend_userid` int(11) NOT NULL,
  `friend_friendslist` text NOT NULL,
  `friend_status` tinyint(1) NOT NULL,
  `friend_createddate` date NOT NULL,
  `friend_updateddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_game`
--

CREATE TABLE `tbl_game` (
  `id` int(11) NOT NULL,
  `game_name` text NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_game`
--

INSERT INTO `tbl_game` (`id`, `game_name`, `image`, `date`, `status`) VALUES
(6, 'Shuttle', '20220328946802.png', '2022-03-28', 1),
(7, 'Tennis', '20220328764038.png', '2022-03-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_games`
--

CREATE TABLE `tbl_games` (
  `game_id` int(11) NOT NULL,
  `game_stadiumid` int(11) NOT NULL,
  `game_sportid` int(11) NOT NULL,
  `game_mainhostid` int(11) NOT NULL,
  `game_subhostid` int(11) NOT NULL,
  `game_players` text NOT NULL,
  `game_fromtime` varchar(10) NOT NULL,
  `game_totime` varchar(10) NOT NULL,
  `game_date` date NOT NULL,
  `game_openmatch` tinyint(1) NOT NULL,
  `game_status` tinyint(1) NOT NULL,
  `game_createddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gendertype`
--

CREATE TABLE `tbl_gendertype` (
  `gendertype_id` int(11) NOT NULL,
  `gendertype_name` varchar(250) NOT NULL,
  `gendertype_status` tinyint(1) NOT NULL,
  `gendertype_createddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grounds`
--

CREATE TABLE `tbl_grounds` (
  `id` int(11) NOT NULL,
  `gname` text NOT NULL,
  `glocation` text NOT NULL,
  `gaddress` text NOT NULL,
  `grating` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `gicon` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_grounds`
--

INSERT INTO `tbl_grounds` (`id`, `gname`, `glocation`, `gaddress`, `grating`, `img1`, `img2`, `img3`, `gicon`, `date`, `status`) VALUES
(3, 'NN Grounds', 'Green City Town Ship', 'Example', '5', '20220330332412.jpg', '20220330944878.jpg', '20220330769687.jpg', '20220330821390.png', '2022-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_mail` text NOT NULL,
  `password` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_mail`, `password`, `date`, `status`) VALUES
(1, 'winner@gmail.com', 'winner@123', '2022-03-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sports`
--

CREATE TABLE `tbl_sports` (
  `sport_id` int(11) NOT NULL,
  `sport_name` varchar(250) NOT NULL,
  `sport_image` varchar(250) NOT NULL,
  `sport_status` tinyint(1) NOT NULL,
  `sport_addedby` int(11) NOT NULL,
  `sport_updatedby` int(11) NOT NULL,
  `sport_createddate` date NOT NULL,
  `sport_updateddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stadium`
--

CREATE TABLE `tbl_stadium` (
  `stadium_id` int(11) NOT NULL,
  `stadium_name` varchar(250) NOT NULL,
  `stadium_contact` varchar(15) NOT NULL,
  `stadium_email` varchar(250) NOT NULL,
  `stadium_longitude` varchar(250) NOT NULL,
  `stadium_latitude` varchar(250) NOT NULL,
  `stadium_games` text NOT NULL,
  `stadium_features` text NOT NULL,
  `stadium_upcomingfeatures` text NOT NULL,
  `stadium_status` tinyint(1) NOT NULL,
  `stadium_area` varchar(250) NOT NULL,
  `stadium_address` text NOT NULL,
  `stadium_city` int(11) NOT NULL,
  `stadium_district` int(11) NOT NULL,
  `stadium_state` int(11) NOT NULL,
  `stadium_country` int(11) NOT NULL,
  `stadium_addedby` int(11) NOT NULL,
  `stadium_updatedby` int(11) NOT NULL,
  `stadium_createddate` date NOT NULL,
  `stadium_updateddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stadiumfeatures`
--

CREATE TABLE `tbl_stadiumfeatures` (
  `stadiumfeature_id` int(11) NOT NULL,
  `stadiumfeature_featureid` int(11) NOT NULL,
  `stadiumfeature_capacity` int(11) NOT NULL,
  `stadiumfeature_stadiumid` int(11) NOT NULL,
  `stadiumfeature_morningtime` varchar(50) NOT NULL,
  `stadiumfeature_afternoontime` varchar(50) NOT NULL,
  `stadiumfeature_gendertypeid` int(11) NOT NULL,
  `stadiumfeature_status` tinyint(1) NOT NULL,
  `stadiumfeature_addedby` int(11) NOT NULL,
  `stadiumfeature_updatedby` int(11) NOT NULL,
  `stadiumfeature_createddate` date NOT NULL,
  `stadiumfeature_updateddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey1`
--

CREATE TABLE `tbl_survey1` (
  `id` int(11) NOT NULL,
  `users_name` text NOT NULL,
  `already_a_customer` text NOT NULL,
  `how_old_r_u` text NOT NULL,
  `gender` text NOT NULL,
  `sports_prtc` text NOT NULL,
  `prmtns_subscriptns` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_survey1`
--

INSERT INTO `tbl_survey1` (`id`, `users_name`, `already_a_customer`, `how_old_r_u`, `gender`, `sports_prtc`, `prmtns_subscriptns`, `date`, `status`) VALUES
(1, 'JOHN DOYS', 'No, i\'ve never been to your sports center', '15-25', 'male', 'Basket', 'Notify me', '2022-03-29', 1),
(2, 'jackob', 'no', '25', 'male', 'everyday', 'example', '2022-03-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey2`
--

CREATE TABLE `tbl_survey2` (
  `s_id` int(11) NOT NULL,
  `padel_ranking` text NOT NULL,
  `internet_ranking` text NOT NULL,
  `play_sprts_week` text NOT NULL,
  `fitnesstatus` text NOT NULL,
  `racket_sports` text NOT NULL,
  `gamesperweek` text NOT NULL,
  `pvt_lessons` text NOT NULL,
  `matching_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_survey2`
--

INSERT INTO `tbl_survey2` (`s_id`, `padel_ranking`, `internet_ranking`, `play_sprts_week`, `fitnesstatus`, `racket_sports`, `gamesperweek`, `pvt_lessons`, `matching_id`, `date`, `status`) VALUES
(1, 'yes', 'Beginner', '4+', 'medium', 'no', '2', 'no, never', 1, '2022-03-29', 1),
(2, 'example', 'example', 'example', 'example', 'example', 'example', 'example', 2, '2022-03-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_management`
--

CREATE TABLE `tbl_time_management` (
  `id` int(11) NOT NULL,
  `gname` text NOT NULL,
  `06AM_07AM` text NOT NULL,
  `07AM_08AM` text NOT NULL,
  `08AM_09AM` text NOT NULL,
  `09AM_10AM` text NOT NULL,
  `10AM_11AM` text NOT NULL,
  `11AM_12PM` text NOT NULL,
  `12PM_01PM` text NOT NULL,
  `01PM_02PM` text NOT NULL,
  `02PM_03PM` text NOT NULL,
  `03PM_04PM` text NOT NULL,
  `04PM_05PM` text NOT NULL,
  `05PM_06PM` text NOT NULL,
  `06PM_07PM` text NOT NULL,
  `07PM_08PM` text NOT NULL,
  `08PM_09PM` text NOT NULL,
  `09PM_10PM` text NOT NULL,
  `10PM_11PM` text NOT NULL,
  `11PM_12AM` text NOT NULL,
  `12AM_01AM` text NOT NULL,
  `01AM_02AM` text NOT NULL,
  `02AM_03AM` text NOT NULL,
  `03AM_04AM` text NOT NULL,
  `04AM_05AM` text NOT NULL,
  `05AM_06AM` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_time_management`
--

INSERT INTO `tbl_time_management` (`id`, `gname`, `06AM_07AM`, `07AM_08AM`, `08AM_09AM`, `09AM_10AM`, `10AM_11AM`, `11AM_12PM`, `12PM_01PM`, `01PM_02PM`, `02PM_03PM`, `03PM_04PM`, `04PM_05PM`, `05PM_06PM`, `06PM_07PM`, `07PM_08PM`, `08PM_09PM`, `09PM_10PM`, `10PM_11PM`, `11PM_12AM`, `12AM_01AM`, `01AM_02AM`, `02AM_03AM`, `03AM_04AM`, `04AM_05AM`, `05AM_06AM`, `date`, `status`) VALUES
(1, '3', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '2022-03-30', 1),
(2, '3', '1', '', '3', '', '5', '6', '7', '8', '9', '10', '11', '', '13', '14', '', '16', '17', '', '', '', '21', '', '23', '24', '2022-03-30', 1),
(3, '3', '', '2', '3', '', '5', '', '7', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-03-30', 1),
(4, '', '', '', '', '', '', '', '', '', '9', '', '', '', '', '14', '', '', '', '18', '', '', '', '', '', '', '2022-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_slot`
--

CREATE TABLE `tbl_time_slot` (
  `id` int(11) NOT NULL,
  `gname` text NOT NULL,
  `slot_time` int(11) NOT NULL,
  `date` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_time_slot`
--

INSERT INTO `tbl_time_slot` (`id`, `gname`, `slot_time`, `date`, `status`) VALUES
(1, '3', 14, '', 1),
(2, '3', 15, '2022-03-30', 1),
(3, '3', 10, '2022-03-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_mail` varchar(250) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_otp` varchar(10) NOT NULL,
  `user_image` varchar(250) NOT NULL,
  `user_stars` tinyint(2) NOT NULL,
  `user_favoritesports` text NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_createddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leadership_board`
--
ALTER TABLE `leadership_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_validation`
--
ALTER TABLE `otp_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `tbl_friends`
--
ALTER TABLE `tbl_friends`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `tbl_game`
--
ALTER TABLE `tbl_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_games`
--
ALTER TABLE `tbl_games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `tbl_gendertype`
--
ALTER TABLE `tbl_gendertype`
  ADD PRIMARY KEY (`gendertype_id`);

--
-- Indexes for table `tbl_grounds`
--
ALTER TABLE `tbl_grounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sports`
--
ALTER TABLE `tbl_sports`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `tbl_stadium`
--
ALTER TABLE `tbl_stadium`
  ADD PRIMARY KEY (`stadium_id`);

--
-- Indexes for table `tbl_stadiumfeatures`
--
ALTER TABLE `tbl_stadiumfeatures`
  ADD PRIMARY KEY (`stadiumfeature_id`);

--
-- Indexes for table `tbl_survey1`
--
ALTER TABLE `tbl_survey1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey2`
--
ALTER TABLE `tbl_survey2`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_time_management`
--
ALTER TABLE `tbl_time_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leadership_board`
--
ALTER TABLE `leadership_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `otp_validation`
--
ALTER TABLE `otp_validation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_features`
--
ALTER TABLE `tbl_features`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_friends`
--
ALTER TABLE `tbl_friends`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_game`
--
ALTER TABLE `tbl_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_games`
--
ALTER TABLE `tbl_games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gendertype`
--
ALTER TABLE `tbl_gendertype`
  MODIFY `gendertype_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_grounds`
--
ALTER TABLE `tbl_grounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sports`
--
ALTER TABLE `tbl_sports`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stadium`
--
ALTER TABLE `tbl_stadium`
  MODIFY `stadium_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stadiumfeatures`
--
ALTER TABLE `tbl_stadiumfeatures`
  MODIFY `stadiumfeature_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_survey1`
--
ALTER TABLE `tbl_survey1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_survey2`
--
ALTER TABLE `tbl_survey2`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_time_management`
--
ALTER TABLE `tbl_time_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
