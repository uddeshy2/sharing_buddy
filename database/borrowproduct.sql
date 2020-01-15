-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 11:04 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrowproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_data`
--

CREATE TABLE `account_data` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `name` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `logo` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_data`
--

INSERT INTO `account_data` (`id`, `url`, `name`, `contact`, `email`, `logo`, `address`) VALUES
(1, 'http://localhost/php/mohit_bhai/', 'Sharing with Friends', '9571246473', 'uddeshy2@gmail.com', '', 'Sardarpura Jodhpur');

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `a_id` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`a_id`, `pass`, `uname`, `email`) VALUES
(1, 'uddeshy2', 'uddeshya', 'uddeshy2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_status`
--

CREATE TABLE `borrow_status` (
  `s_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `r_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_data`
--

CREATE TABLE `enquiry_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_data`
--

INSERT INTO `enquiry_data` (`id`, `name`, `email`, `message`, `time`) VALUES
(5, 'manu', 'uddeshy@gmail.com', 'jkhsfjksfsa', '22 December 2019, 04:16:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_desc` text NOT NULL,
  `p_img` text NOT NULL,
  `p_qty` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`p_id`, `p_name`, `p_desc`, `p_img`, `p_qty`, `u_id`, `p_status`) VALUES
(2, 'sumer', 'This is the description of image\r\n', 'logo.jpg', 0, 5, 0),
(5, 'asdsd', 'asdas', '63648.jpg', 1, 5, 0),
(6, 'watch', 'thi is my belt', '61rfIrmEhdL._UX569_.jpg', 0, 5, 0),
(7, 'watvh mdd', 'fsdfdsf', 'New-Men-s-Watches-Fashion-Leather-Quartz-Watch-Men-Casual-Sports-Watch-Male-erkek-kol-saati-1.jpg', 0, 4, 0),
(8, 'watch 3', 'watchhhh', 'KADEMAN-Luxury-Brand-Men-Sport-Watch-Waterproof-Digital-LED-Military-Watch-New-Fashion-Step-Counter-Outdoor.jpg_640x640.jpg', 0, 4, 0),
(9, 'watchh', 'asdsda', 'Women-watches-Stainless-Steel-Round-SDL829188288-1-0f2b4.jpeg', 0, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_data`
--

CREATE TABLE `request_data` (
  `r_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `b_time` varchar(255) NOT NULL,
  `b_desc` text NOT NULL,
  `b_Date` varchar(255) NOT NULL,
  `b_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_data`
--

INSERT INTO `request_data` (`r_id`, `p_id`, `u_id`, `b_id`, `b_time`, `b_desc`, `b_Date`, `b_status`) VALUES
(1, 2, 5, 6, '28-12-2019', '9659sg', '2019-12-22', 1),
(2, 5, 5, 4, '25-12-2019', 'give me this', '2019-12-22', 1),
(5, 6, 5, 4, '29-12-2019', 'bro i want this watch for some days for some functions', '2019-12-22', 1),
(6, 7, 4, 5, '26-12-2019', 'i want this watch', '2019-12-22', 1),
(7, 7, 4, 5, '29-12-2019', 'wnt', '2019-12-22', 1),
(8, 7, 4, 5, '24-12-2019', 'wnt', '2019-12-22', 1),
(9, 7, 4, 5, '24-12-2019', 'wnt', '2019-12-22', 1),
(10, 6, 5, 4, '25-12-2019', 'borrow', '2019-12-22', 1),
(11, 6, 5, 4, '29-12-2019', 'i want this watch\r\n', '2019-12-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `u_email` text NOT NULL,
  `u_password` text NOT NULL,
  `u_profile` text NOT NULL,
  `u_address` text NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`u_id`, `u_name`, `u_phone`, `u_email`, `u_password`, `u_profile`, `u_address`, `u_status`) VALUES
(4, 'uddeshya', '9571246473', 'uddeshy2@gmail.com', '1234', 'Capture.gif', 'sardarpura jodhpur', 1),
(5, 'rahul', '7023185255', 'rahul@gmail.com', '123456', '599379.jpg', 'asf,df5g5df4g5df5g4df4g', 1),
(6, 'manu', '9571246473', 'uddeshy22@gmail.com', '12345', '63648.jpg', '154 sardarpura 2nd c road', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_data`
--
ALTER TABLE `account_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `borrow_status`
--
ALTER TABLE `borrow_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `enquiry_data`
--
ALTER TABLE `enquiry_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `request_data`
--
ALTER TABLE `request_data`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_data`
--
ALTER TABLE `account_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `borrow_status`
--
ALTER TABLE `borrow_status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry_data`
--
ALTER TABLE `enquiry_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_data`
--
ALTER TABLE `request_data`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
