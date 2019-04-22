-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 08:37 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `android_telecall`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_entry_operator`
--

CREATE TABLE `data_entry_operator` (
  `de_id` int(11) NOT NULL,
  `de_fn` varchar(255) NOT NULL,
  `de_ln` varchar(255) NOT NULL,
  `de_un` varchar(255) NOT NULL,
  `de_pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_entry_operator`
--

INSERT INTO `data_entry_operator` (`de_id`, `de_fn`, `de_ln`, `de_un`, `de_pw`) VALUES
(1, 'santosh', 'amin', 'sunny', '202cb962ac59075b964b07152d234b70'),
(2, 'hfj', 'jf', 'j', '42b7db761c6b6884d910e158517ecf3f'),
(3, 'hccxhh', 'xh', 'ydhf', '7f7782ba1bd77146df7f0b0ecb597d53');

-- --------------------------------------------------------

--
-- Table structure for table `lead_feedabck`
--

CREATE TABLE `lead_feedabck` (
  `feedback_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `telecaller_id` text NOT NULL COMMENT 'This column is used to save telecaller id',
  `last_call_date` text NOT NULL,
  `call_back_date` text NOT NULL COMMENT 'Set call back date',
  `call_back_time` text NOT NULL COMMENT 'Set call back time',
  `add_to_list` text NOT NULL COMMENT 'This column is used to check the main status of lead',
  `temp_feedback` text NOT NULL,
  `call_status` text NOT NULL,
  `comment` text NOT NULL,
  `call_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_feedabck`
--

INSERT INTO `lead_feedabck` (`feedback_id`, `lead_id`, `telecaller_id`, `last_call_date`, `call_back_date`, `call_back_time`, `add_to_list`, `temp_feedback`, `call_status`, `comment`, `call_file`) VALUES
(1, 1, '1', '21/2/2019', '22/2/2019', '12:00', 'positive', 'positive', 'call me later', 'this is test comment', ''),
(2, 2, '1', '21/2/2019', '22/2/2019', '12:00', 'positive', 'positive', 'call me later', 'this is test comment', ''),
(3, 2, '1', '21-02-2019', '21-2-2019', '00:59 pm', 'stop-calling', 'very interested,interested n callback,', 'positive', 'ufg', ''),
(4, 2, '1', '21-02-2019', '21-2-2019', '03:47 pm', 'ffcs', 'very interested,', 'positive', 'ffcs', ''),
(5, 2, '1', '21-02-2019', '21-2-2019', '07:03 pm', 'callback', 'interested n enrolled,interested n callback,', 'positive', 'yyy', ''),
(6, 1, '1', '22-02-2019', '22-2-2019', '11:48 am', 'ffa', 'interested n callback,', 'positive', 'tt', ''),
(7, 1, '1', '22-02-2019', '22-2-2019', '01:25 pm', 'callback', 'very interested,', 'positive', 'uu', ''),
(8, 1, '1', '27-2-2019', '28-2-2019', '2:00', 'positive', 'positive', 'call me later', 'dkasajnajdajn', '1551246162_'),
(9, 1, '1', '27-2-2019', '28-2-2019', '2:00', 'positive', 'positive', 'call me later', 'dkasajnajdajn', 'upload/');

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `admin_id` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `email` varchar(100) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`admin_id`, `unique_id`, `email`, `encrypted_password`, `salt`) VALUES
(1, '5c7e1962e61700.39738276', 'admin@pe.com', 'rEHGihxAheHmX+qPH9Z2h41kT54yNWQ0ZGYwYTVl', '25d4df0a5e');

-- --------------------------------------------------------

--
-- Table structure for table `master_school`
--

CREATE TABLE `master_school` (
  `school_id` int(11) NOT NULL,
  `school_name` text NOT NULL,
  `school_address` text NOT NULL,
  `telecaller_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_school`
--

INSERT INTO `master_school` (`school_id`, `school_name`, `school_address`, `telecaller_id`) VALUES
(1, 'd.a.v. public school', 'thane', '1'),
(2, 'podar international school', 'thane', '2'),
(3, 'smt. sulochanadevi singhania school', 'thane', '2'),
(4, 'a. k. joshi english medium school', 'thane', '2'),
(5, 'orchids international school', 'thane', '2'),
(6, 'ram ratna vidya mandir', 'thane', '2'),
(7, 'c.p. goenka international school', 'thane', '2'),
(8, 'hiranandani foundation school', 'thane', '2'),
(9, 'st. johns baptist high School and junior college', 'thane', '2'),
(10, 'n. l. dalmia high school', 'thane', '2');

-- --------------------------------------------------------

--
-- Table structure for table `master_student`
--

CREATE TABLE `master_student` (
  `student_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `std_name` text NOT NULL COMMENT 'column contain student''s first name',
  `std_fname` text NOT NULL COMMENT 'column contain student''s father name',
  `std_mname` text NOT NULL COMMENT 'column contain student''s mother name',
  `std_lname` text NOT NULL COMMENT 'column contain student''s last name',
  `std_area` text NOT NULL,
  `mob_num_one` varchar(10) NOT NULL,
  `mob_num_two` varchar(10) NOT NULL,
  `mob_num_three` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_student`
--

INSERT INTO `master_student` (`student_id`, `school_id`, `std_name`, `std_fname`, `std_mname`, `std_lname`, `std_area`, `mob_num_one`, `mob_num_two`, `mob_num_three`) VALUES
(1, 1, 'nisha', 'prakash', 'kalpna', 'daithankar', 'chembur', '8828707089', '8828707089', '8828707089'),
(2, 1, 'hritik', 'rakesh', 'jcjc', 'roshan', 'mumbai', '8989898', '9868689', '6868886'),
(3, 1, 'ttt', 'kgjj', 'hfj', 'jfj', 'ufj', '686', '656', '6568'),
(4, 2, 'ganesh', 'rajendra', 'aai', 'kulkarni', 'dhule', '78587857', '78587857', '78578578'),
(5, 2, 'yfzhfs', 'hfzyfzhfz', 'hfzjfz', 'hffh', 'hfzfh', '56798898', '657565', '555455'),
(6, 2, 'vaibhav', 'h', 'k', 'shinde', 'pune', '56798898', '657565', '555455'),
(7, 2, 'akshay', 'h', 'k', 'vaykar', 'pune', '56798898', '657565', '555455'),
(8, 2, 'leena', 'h', 'k', 'mane', 'pune', '56798898', '657565', '555455'),
(9, 2, 'sonali', 'h', 'k', 'kamble', 'pune', '56798898', '657565', '555455'),
(10, 2, 'aakash', 'h', 'k', 'hiwale', 'pune', '56798898', '657565', '555455');

-- --------------------------------------------------------

--
-- Table structure for table `tele_caller_operator`
--

CREATE TABLE `tele_caller_operator` (
  `tc_id` int(11) NOT NULL,
  `tc_fn` text NOT NULL,
  `tc_ln` text NOT NULL,
  `tc_un` text NOT NULL,
  `tc_pw` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tele_caller_operator`
--

INSERT INTO `tele_caller_operator` (`tc_id`, `tc_fn`, `tc_ln`, `tc_un`, `tc_pw`) VALUES
(1, 'hemant', 'redkar', 'johnty', '202cb962ac59075b964b07152d234b70'),
(2, 'kumar', 'dhage', 'kd', '202cb962ac59075b964b07152d234b70'),
(3, 'manoj', 'vyas', 'mv', '202cb962ac59075b964b07152d234b70'),
(4, 'rupesh', 'patil', 'rp', '202cb962ac59075b964b07152d234b70'),
(5, 'rohit', 'gaikwad', 'rg', '202cb962ac59075b964b07152d234b70'),
(6, 'mandar', 'attarde', 'ma', '202cb962ac59075b964b07152d234b70'),
(7, 'gaurav', 'mahale', 'gm', '202cb962ac59075b964b07152d234b70'),
(8, 'vivek', 'patil', 'vp', '202cb962ac59075b964b07152d234b70'),
(9, 'rahul', 'jadhav', 'rj', '202cb962ac59075b964b07152d234b70'),
(10, 'vaibhav', 'pagare', 'vp', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_entry_operator`
--
ALTER TABLE `data_entry_operator`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `lead_feedabck`
--
ALTER TABLE `lead_feedabck`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `master_school`
--
ALTER TABLE `master_school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `master_student`
--
ALTER TABLE `master_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tele_caller_operator`
--
ALTER TABLE `tele_caller_operator`
  ADD PRIMARY KEY (`tc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_entry_operator`
--
ALTER TABLE `data_entry_operator`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lead_feedabck`
--
ALTER TABLE `lead_feedabck`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_school`
--
ALTER TABLE `master_school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master_student`
--
ALTER TABLE `master_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tele_caller_operator`
--
ALTER TABLE `tele_caller_operator`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
