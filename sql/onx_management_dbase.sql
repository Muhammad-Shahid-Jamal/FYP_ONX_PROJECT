-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2017 at 09:33 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onx_management_dbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `_id` int(11) NOT NULL,
  `_categ` varchar(50) CHARACTER SET utf8 NOT NULL,
  `_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `_price` int(11) NOT NULL,
  `_discription` text CHARACTER SET utf8 NOT NULL,
  `_mainpic` text CHARACTER SET utf8 NOT NULL,
  `_img2` text CHARACTER SET utf8,
  `_img3` text CHARACTER SET utf8,
  `_img4` text CHARACTER SET utf8,
  `_img5` text CHARACTER SET utf8,
  `_img6` text CHARACTER SET utf8,
  `_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `_phone` varchar(40) NOT NULL,
  `_provence` varchar(25) NOT NULL,
  `_city` varchar(25) NOT NULL,
  `_date_and_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`_id`, `_categ`, `_title`, `_price`, `_discription`, `_mainpic`, `_img2`, `_img3`, `_img4`, `_img5`, `_img6`, `_name`, `_phone`, `_provence`, `_city`, `_date_and_time`) VALUES
(1, 'mobiles', 'Nokia 3330 230 China kit', 4000, 'good condition slightly used with box.\r\nwith original cover.\r\nhands free +.\r\ncharger .\r\nBox .', 'images/userupload/mobiles/imgone.jpg', 'images/userupload/mobiles/imgtwo.jpg', 'images/userupload/mobiles/imgfour.jpg', 'images/userupload/mobiles/imgwithbox.jpg', 'images/userupload/mobiles/imgthre.jpg', '', 'Umar Mahmood', '1234567891', 'Sindh', 'Karachi', '2017-05-10 21:13:22'),
(2, 'mobiles', 'Nokia mobile', 3000, 'lsajdlkasjdkasjld', 'images/userupload/mobiles/iphonefivefive.jpg', 'images/userupload/mobiles/iphonefivefour.jpg', '', '', '', '', 'shahid', '2342342423', 'Sindh', 'Karachi', '2017-05-11 04:37:11'),
(3, 'mobiles', 'shahid jamal', 1000, 'gfgfg', 'images/userupload/mobiles/iphonefivetwo.jpg', 'images/userupload/mobiles/iphonefour.jpg', '', '', '', '', 'Abdullah', '3432408649', 'Sindh', 'Karachi', '2017-05-11 06:01:44'),
(4, 'cars', 'shahid jamal', 20000, 'sdkfjlsdjfklsjf lsjlf skljlkfvjlfjslkvj  vklj', 'images/userupload/mobiles/aquafive.jpg', 'images/userupload/mobiles/aquafour.jpg', '', '', '', '', 'sdfsdfsdf', '453534534534', 'Sindh', 'Karachi', '2017-05-14 11:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `userfeed`
--

CREATE TABLE `userfeed` (
  `_id` int(11) NOT NULL COMMENT 'User _id',
  `_name` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT 'User _name',
  `_email` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'User _email',
  `_msg` varchar(150) CHARACTER SET utf8 NOT NULL COMMENT 'User _massage',
  `dateNtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for User feedback Records';

--
-- Dumping data for table `userfeed`
--

INSERT INTO `userfeed` (`_id`, `_name`, `_email`, `_msg`, `dateNtime`) VALUES
(1, 'shahid', 'shahidjamal@gm.com', 'good brn', '2017-04-10 06:38:04'),
(2, 'shahid', 'shahidjamal@gm.com', 'good brn', '2017-04-10 06:38:29'),
(3, 'shahid', 'abc@abc.com', 'hadjaskdjasdjaskld askdjasld', '2017-05-11 04:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `_id` int(11) NOT NULL,
  `_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `_user_email` varchar(70) CHARACTER SET utf8 NOT NULL,
  `_pass` varchar(20) CHARACTER SET utf8 NOT NULL,
  `_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table for maintain users id password.';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `_name`, `_user_email`, `_pass`, `_type`) VALUES
(1, 'Shahid', 'shahid.jamal@gmail.com', 'abc123', 1),
(2, 'Shahid_Jamal', 'shahid@gmail.com', 'abc123', 2),
(3, 'Muneeb', 'muneeb@gmail.com', 'abc1234', 2),
(4, 'bilal', 'bilal@gmail.com', 'abcd1234', 2),
(5, 'Mahnoor', 'mahnoor@gmail.com', 'abc123', 2),
(6, 'Mahboob', 'mahboob@gmail.com', 'abc123', 2),
(7, 'Taha', 'taha@gmail.com', 'abc123', 2),
(8, 'sami', 'sami123@gmail.com', 'abc123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `userfeed`
--
ALTER TABLE `userfeed`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_user_email` (`_user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userfeed`
--
ALTER TABLE `userfeed`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User _id', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
