-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 02:21 PM
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
-- Database: `video_lectures`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL,
  `board_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `board_name`) VALUES
(1, 'hsc'),
(2, 'cbse');

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `admin_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `encrypted_password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`admin_id`, `unique_id`, `email`, `encrypted_password`, `salt`) VALUES
(1, '5c7f7971f2d4e4.51948704', 'admin@pe.com', 'GHI1z22wRqk7NxdZJFsTSvp29bM3ZGNlZmQ4NTU0', '7dcefd8554');

-- --------------------------------------------------------

--
-- Table structure for table `master_chapter`
--

CREATE TABLE `master_chapter` (
  `chapter_id` int(11) NOT NULL,
  `board_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `chapter_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_chapter`
--

INSERT INTO `master_chapter` (`chapter_id`, `board_id`, `class_id`, `subject_id`, `chapter_title`) VALUES
(1, '1', '1', '1', 'Measurements'),
(2, '1', '1', '1', 'Scalars and Vectors'),
(3, '1', '1', '1', 'Projectile Motion'),
(4, '1', '1', '1', 'Force'),
(5, '1', '1', '1', 'Friction in Solids and Liquids'),
(6, '1', '1', '1', 'Sound Waves'),
(7, '1', '1', '1', 'Thermal Properties of Matter'),
(8, '1', '1', '1', 'Refraction of Light'),
(9, '1', '1', '1', 'Ray Optics'),
(10, '1', '1', '1', 'Electrostatics'),
(11, '1', '1', '1', 'Current Electricity'),
(12, '1', '1', '1', 'Magnetic Effects of Electric Current'),
(13, '1', '1', '1', 'Magnetism'),
(14, '1', '1', '1', 'Electromagnetic Waves'),
(15, '1', '2', '1', 'Circular motion'),
(16, '1', '2', '1', 'Gravitation'),
(17, '1', '2', '1', 'Rotational motion'),
(18, '1', '2', '1', 'Oscillations'),
(19, '1', '2', '1', 'Elasticity'),
(20, '1', '2', '1', 'Surface tension'),
(21, '1', '2', '1', 'Wave motion'),
(22, '1', '2', '1', 'Stationary waves'),
(23, '1', '2', '1', 'Kinetic theory'),
(24, '1', '2', '1', 'Wave theory'),
(25, '1', '2', '1', 'Interference and diffraction'),
(26, '1', '2', '1', 'Electrostatics'),
(27, '1', '2', '1', 'Current electricity'),
(28, '1', '2', '1', 'Magnetic effects of electric current'),
(29, '1', '2', '1', 'Magnetism'),
(30, '1', '2', '1', 'Electromagnetic inductions'),
(31, '1', '2', '1', 'Electrons and photons'),
(32, '1', '2', '1', 'Atoms, Molecules and Nuclei'),
(33, '1', '2', '1', 'Semiconductors'),
(34, '1', '2', '1', 'Communication systems');

-- --------------------------------------------------------

--
-- Table structure for table `master_student`
--

CREATE TABLE `master_student` (
  `student_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `board_id` varchar(255) NOT NULL,
  `standard` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `encrypted_password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_student`
--

INSERT INTO `master_student` (`student_id`, `unique_id`, `board_id`, `standard`, `firstname`, `lastname`, `email`, `encrypted_password`, `salt`, `status`) VALUES
(1, '5c80f30514b9d1.97978349', '1', '1', 'James', 'Walker', 'james@gmail.com', 'Cy4tXzQPTIaTdLe0xgz3VC0gYnU2MGUwZjQ3MWQ0', '60e0f471d4', 1),
(2, '5c80f3051cba49.51310057', '1', '1', 'Velma', 'Clemons', 'velma@gmail.com', 'Cpp0X+6J5/uPFwDz7lAbV/QUncFmYjZhNzIwZmU3', 'fb6a720fe7', 1),
(3, '5c80f30524f294.52850162', '1', '1', 'Kibo', 'Underwood', 'kibo@gmail.com', '/HUWfy0QvmTMiyMFZz0sxbZZJQRmNWIzNGIxMWQx', 'f5b34b11d1', 1),
(4, '5c80f3052d1db0.22760609', '1', '1', 'Louis', 'Mcgee', 'louis@gmail.com', 'Hsvy/6yqfOJEZSQl9LIboUxbn4ZjMDkxNzU3MjY5', 'c091757269', 1),
(5, '5c80f305395d43.39205716', '1', '1', 'Phyllis', 'Paul', 'phyllis@gmail.com', 'MvW0qATr4QAXtcPI2wDndiY8insyOTZkMTM4ZmM5', '296d138fc9', 1),
(6, '5c80f305437819.23968571', '1', '1', 'Zenaida ', 'Decker', 'zenaida@gmail.com', 'U6QBPMPBlWyTQjh38GzCBnrlnao3M2Y3MGEyMWY4', '73f70a21f8', 1),
(7, '5c80f30549a1e9.62832633', '1', '1', 'Gillian ', 'Tillman', 'gillian@gmail.com', 'aF6MSc3cB6V8p1JlnDooMY+IlyE0NDVlMDBkNTQ3', '445e00d547', 1),
(8, '5c80f3054fb914.82108082', '1', '1', 'Constance ', 'Boone', 'constance@gmail.com', 'Bvkx5U+qU/WfTGtlL+/g6NtLeEIyNTU5NDNlNTMz', '255943e533', 1),
(9, '5c80f30555dc55.20274114', '1', '1', 'Giselle ', 'Lancaster', 'giselle@gmail.com', '+gGl9uFsomDAEAk6CnxbdvDiJH03NTg4MjkxOWJl', '75882919be', 1),
(10, '5c80f3055be946.40062061', '1', '1', 'Kirsten ', 'Mcdowell', 'kirsten@gmail.com', 'Ifbnbq+RX149N20dZxKsFForoUdkZGZmZDdkNTc2', 'ddffd7d576', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_video`
--

CREATE TABLE `master_video` (
  `video_id` int(11) NOT NULL,
  `board_id` varchar(255) NOT NULL,
  `standard_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `chapter_id` varchar(255) NOT NULL,
  `video_title` text NOT NULL,
  `video_url` text NOT NULL,
  `video_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_video`
--

INSERT INTO `master_video` (`video_id`, `board_id`, `standard_id`, `subject_id`, `chapter_id`, `video_title`, `video_url`, `video_status`) VALUES
(1, '1', '1', '1', '1', 'This is first video', 'aHR0cHM6Ly9wbGF5ZXIudmltZW8uY29tL3ZpZGVvLzMxOTkzNDc3Ng==', 1),
(2, '1', '1', '1', '1', 'This is first video', 'aHR0cHM6Ly9wbGF5ZXIudmltZW8uY29tL3ZpZGVvLzMxOTIwMDM1Mw==', 1);

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE `standard` (
  `standard_id` int(11) NOT NULL,
  `standard_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`standard_id`, `standard_title`) VALUES
(1, 'xi'),
(2, 'xii');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `subject_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `subject_title`) VALUES
(1, 'physics'),
(2, 'chemistry'),
(3, 'mathematics'),
(4, 'biology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD KEY `email` (`email`),
  ADD KEY `unique_id_2` (`unique_id`);

--
-- Indexes for table `master_chapter`
--
ALTER TABLE `master_chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `master_student`
--
ALTER TABLE `master_student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `email` (`email`),
  ADD KEY `unique_id` (`unique_id`);

--
-- Indexes for table `master_video`
--
ALTER TABLE `master_video`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`standard_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_chapter`
--
ALTER TABLE `master_chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `master_student`
--
ALTER TABLE `master_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master_video`
--
ALTER TABLE `master_video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `standard`
--
ALTER TABLE `standard`
  MODIFY `standard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
