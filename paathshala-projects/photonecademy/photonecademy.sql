-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 06:14 AM
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
-- Database: `photonecademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_type`
--

CREATE TABLE `category_type` (
  `cat_id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level_type`
--

CREATE TABLE `level_type` (
  `level_id` int(11) NOT NULL,
  `level_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_chapter`
--

CREATE TABLE `master_chapter` (
  `chapter_id` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `subcourseid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `chapter_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_course`
--

CREATE TABLE `master_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_exams`
--

CREATE TABLE `master_exams` (
  `exam_id` int(11) NOT NULL,
  `exam_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_interns`
--

CREATE TABLE `master_interns` (
  `intern_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `intern_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_package`
--

CREATE TABLE `master_package` (
  `pkg_id` int(11) NOT NULL,
  `pkg_name` text NOT NULL,
  `pkg_img` varchar(255) NOT NULL,
  `pkg_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_student`
--

CREATE TABLE `master_student` (
  `student_id` int(11) NOT NULL,
  `fn` text NOT NULL,
  `ln` text NOT NULL,
  `username` text NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `student_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_subject`
--

CREATE TABLE `master_subject` (
  `sub_id` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `subcourseid` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_topics`
--

CREATE TABLE `master_topics` (
  `topic_id` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `subcourseid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `chapterid` int(11) NOT NULL,
  `topic_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_post`
--

CREATE TABLE `pdf_post` (
  `pdfpost_id` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `subcourseid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `chapterid` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `versionid` int(11) NOT NULL,
  `pdf_title` text NOT NULL,
  `pdf_attachment` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `student_id` int(11) NOT NULL,
  `std_fname` varchar(255) NOT NULL,
  `std_lname` varchar(255) NOT NULL,
  `profile_pic` text NOT NULL,
  `exams` text NOT NULL,
  `marks` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_course`
--

CREATE TABLE `sub_course` (
  `subcourse_id` int(11) NOT NULL,
  `mcid` int(11) NOT NULL,
  `subcourse_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_package`
--

CREATE TABLE `sub_package` (
  `subpkg_id` int(11) NOT NULL,
  `masterpkgid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `subcourseid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `chapterid` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `versionid` int(11) NOT NULL,
  `postid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `version_type`
--

CREATE TABLE `version_type` (
  `version_id` int(11) NOT NULL,
  `version_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_post`
--

CREATE TABLE `video_post` (
  `post_id` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `subcourseid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `chapterid` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `versionid` int(11) NOT NULL,
  `video_title` text NOT NULL,
  `video_url` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `level_type`
--
ALTER TABLE `level_type`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `master_chapter`
--
ALTER TABLE `master_chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `master_course`
--
ALTER TABLE `master_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `master_exams`
--
ALTER TABLE `master_exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `master_interns`
--
ALTER TABLE `master_interns`
  ADD PRIMARY KEY (`intern_id`);

--
-- Indexes for table `master_package`
--
ALTER TABLE `master_package`
  ADD PRIMARY KEY (`pkg_id`);

--
-- Indexes for table `master_student`
--
ALTER TABLE `master_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `master_subject`
--
ALTER TABLE `master_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `master_topics`
--
ALTER TABLE `master_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `pdf_post`
--
ALTER TABLE `pdf_post`
  ADD PRIMARY KEY (`pdfpost_id`);

--
-- Indexes for table `student_result`
--
ALTER TABLE `student_result`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `sub_course`
--
ALTER TABLE `sub_course`
  ADD PRIMARY KEY (`subcourse_id`);

--
-- Indexes for table `sub_package`
--
ALTER TABLE `sub_package`
  ADD PRIMARY KEY (`subpkg_id`);

--
-- Indexes for table `version_type`
--
ALTER TABLE `version_type`
  ADD PRIMARY KEY (`version_id`);

--
-- Indexes for table `video_post`
--
ALTER TABLE `video_post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_type`
--
ALTER TABLE `category_type`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_type`
--
ALTER TABLE `level_type`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_chapter`
--
ALTER TABLE `master_chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_course`
--
ALTER TABLE `master_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_exams`
--
ALTER TABLE `master_exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_interns`
--
ALTER TABLE `master_interns`
  MODIFY `intern_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_package`
--
ALTER TABLE `master_package`
  MODIFY `pkg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_student`
--
ALTER TABLE `master_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_subject`
--
ALTER TABLE `master_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_topics`
--
ALTER TABLE `master_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdf_post`
--
ALTER TABLE `pdf_post`
  MODIFY `pdfpost_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_result`
--
ALTER TABLE `student_result`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_course`
--
ALTER TABLE `sub_course`
  MODIFY `subcourse_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_package`
--
ALTER TABLE `sub_package`
  MODIFY `subpkg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `version_type`
--
ALTER TABLE `version_type`
  MODIFY `version_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_post`
--
ALTER TABLE `video_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
