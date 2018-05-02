DROP DATABASE IF EXISTS tnp_cell;
CREATE DATABASE tnp_cell;
USE tnp_cell;



-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2018 at 08:52 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnp_cell`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `person_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`person_id`, `email`, `password`, `role`) VALUES
(21, 'sud@iitrpr.ac.in', 'sameer2', 'faculty'),
(31, '2016csb1058@iitrpr.ac.in', 'sameer2', 'student'),
(32, 'shreyanshushekhar007@gmail.com', 'Shekhar123', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `cv_id` int(10) UNSIGNED NOT NULL,
  `time_updated` datetime NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `share_option` tinyint(1) DEFAULT NULL,
  `file_link` varchar(100) NOT NULL,
  `department` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` text,
  `load_file` varchar(100) DEFAULT NULL,
  `css_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`cv_id`, `time_updated`, `person_id`, `share_option`, `file_link`, `department`, `type`, `title`, `image`, `load_file`, `css_file`) VALUES
(35, '2018-04-30 11:21:58', 31, 1, './uploads/Sameer31/cv/Readme.docx', 'CSE', 'Docx', 'Readme.docx', './uploads/Sameer31/cv/Readme.jpeg', './uploads/Sameer31/cv/Readme.html', './uploads/Sameer31/cv/Readme.css'),
(36, '2018-04-30 15:10:43', 31, NULL, './uploads/Sameer31/cv/afsddfs.zip', 'CSE', 'Latex', 'problems.pdf', './uploads/Sameer31/cv/problems.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cv_letter`
--

CREATE TABLE `cv_letter` (
  `cv_letter_id` int(10) UNSIGNED NOT NULL,
  `time_updated` datetime NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `share_option` tinyint(1) DEFAULT NULL,
  `file_link` varchar(100) NOT NULL,
  `department` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` text,
  `load_file` varchar(100) DEFAULT NULL,
  `css_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_letter`
--

INSERT INTO `cv_letter` (`cv_letter_id`, `time_updated`, `person_id`, `share_option`, `file_link`, `department`, `type`, `title`, `image`, `load_file`, `css_file`) VALUES
(37, '2018-04-30 14:24:58', 31, NULL, './uploads/Sameer31/cv_letter/Readme.docx', 'CSE', 'Docx', 'Readme.docx', './uploads/Sameer31/cv_letter/Readme.jpeg', './uploads/Sameer31/cv_letter/Readme.html', './uploads/Sameer31/cv_letter/Readme.css');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `reasearch_area` text,
  `post` varchar(20) NOT NULL,
  `phone_number` bigint(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `name`, `department`, `reasearch_area`, `post`, `phone_number`, `person_id`) VALUES
(2, 'Sudar', 'CSE', 'Crypto', 'Associate Professor', 9999999999, 21);

-- --------------------------------------------------------

--
-- Table structure for table `internshipTable`
--

CREATE TABLE `internshipTable` (
  `isAbroad` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `place` varchar(100) DEFAULT NULL,
  `time` int(11) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internshipTable`
--

INSERT INTO `internshipTable` (`isAbroad`, `name`, `duration`, `department`, `year`, `place`, `time`, `website`) VALUES
(1, 'a', 2, 'cse', 1, 'silicon valley', 1, 'www.google.com'),
(0, 'b', 1, 'ee', 1, 'gurgaon', 0, 'www.yahoo.com'),
(0, 'c', 2, 'ce', 2, 'gurgaon2', 0, 'www.yahoo2.com'),
(1, 'd', 2, 'ce', 2, 'new york', 1, 'www.facebook.com'),
(1, 'e', 2, 'ce', 2, 'amsterdam', 0, 'www.oracle.com'),
(1, 'f', 3, 'cse', 2, 'chicago', 1, 'www.amazon.com'),
(1, 'g', 1, 'cse', 3, 'new jersey', 1, 'www.microsoft.com'),
(1, 'h', 1, 'cse', 2, 'london', 0, 'www.sherlock.com'),
(0, 'i', 1, 'cse', 3, 'bombay', 1, 'www.tandt.com'),
(0, 'j', 1, 'me', 2, 'noida', 0, 'www.hotmail.com'),
(0, 'k', 3, 'me', 3, 'delhi', 1, 'www.tisco.com'),
(0, 'l', 3, 'me', 2, 'hyderabad', 0, 'www.flipcart.com'),
(0, 'm', 2, 'me', 2, 'bangalore', 1, 'www.infosys.com'),
(0, 'n', 2, 'ee', 3, 'chennai', 0, 'www.yahoo3.com'),
(0, 'o', 2, 'ee', 2, 'chandigarh', 0, 'www.yahoo4.com'),
(0, 'p', 2, 'ee', 2, 'patna', 1, 'www.yahoo5.com');

-- --------------------------------------------------------

--
-- Table structure for table `lom`
--

CREATE TABLE `lom` (
  `lom_id` int(10) UNSIGNED NOT NULL,
  `time_updated` datetime NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `share_option` tinyint(1) DEFAULT NULL,
  `file_link` varchar(100) NOT NULL,
  `department` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` text,
  `load_file` varchar(100) DEFAULT NULL,
  `css_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lom`
--

INSERT INTO `lom` (`lom_id`, `time_updated`, `person_id`, `share_option`, `file_link`, `department`, `type`, `title`, `image`, `load_file`, `css_file`) VALUES
(37, '2018-04-30 16:30:27', 31, 1, './uploads/Sameer31/lom/Readme.docx', 'CSE', 'Docx', 'Readme.docx', './uploads/Sameer31/lom/Readme.jpeg', './uploads/Sameer31/lom/Readme.html', './uploads/Sameer31/lom/Readme.css');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED DEFAULT NULL,
  `lom_id` int(10) UNSIGNED DEFAULT NULL,
  `cv_id` int(10) UNSIGNED DEFAULT NULL,
  `cv_letter_id` int(10) UNSIGNED DEFAULT NULL,
  `cv_rate` int(11) DEFAULT NULL,
  `cover_rate` int(11) DEFAULT NULL,
  `lom_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `person_id`, `lom_id`, `cv_id`, `cv_letter_id`, `cv_rate`, `cover_rate`, `lom_rate`) VALUES
(12, 31, 37, NULL, NULL, NULL, NULL, 4),
(13, 31, NULL, 35, NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` tinyint(3) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `department`, `year`, `person_id`) VALUES
(21, 'Sameer', 'CSE', 2, 31),
(22, 'shreyanshu', 'CSE', 1, 32);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_name`
--
CREATE TABLE `student_name` (
`name` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `student_name`
--
DROP TABLE IF EXISTS `student_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_name`  AS  select `student`.`name` AS `name` from (`auth` join `student` on((`student`.`person_id` = `auth`.`person_id`))) where ((`auth`.`email` like '2016csb1058@iitrpr.ac.in') and (`auth`.`password` like 'sameer435')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `cv_letter`
--
ALTER TABLE `cv_letter`
  ADD PRIMARY KEY (`cv_letter_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `lom`
--
ALTER TABLE `lom`
  ADD PRIMARY KEY (`lom_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `ratings_ibfk_4` (`cv_letter_id`),
  ADD KEY `ratings_ibfk_2` (`lom_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `person_id` (`person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `person_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `cv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `cv_letter`
--
ALTER TABLE `cv_letter`
  MODIFY `cv_letter_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lom`
--
ALTER TABLE `lom`
  MODIFY `lom_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `auth` (`person_id`);

--
-- Constraints for table `cv_letter`
--
ALTER TABLE `cv_letter`
  ADD CONSTRAINT `cv_letter_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `auth` (`person_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `auth` (`person_id`);

--
-- Constraints for table `lom`
--
ALTER TABLE `lom`
  ADD CONSTRAINT `lom_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `auth` (`person_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `auth` (`person_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`lom_id`) REFERENCES `lom` (`lom_id`),
  ADD CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`cv_id`),
  ADD CONSTRAINT `ratings_ibfk_4` FOREIGN KEY (`cv_letter_id`) REFERENCES `cv_letter` (`cv_letter_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `auth` (`person_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;







-- store the details of post --
CREATE TABLE posts (
	post_id	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	person_id INT UNSIGNED NOT NULL,
	subject TEXT NOT NULL,
	link VARCHAR(400),
	body TEXT NOT NULL,
	date_time TIMESTAMP,
	FOREIGN KEY (person_id) REFERENCES auth(person_id) ON DELETE CASCADE,
	PRIMARY KEY (post_id)
);

-- store the details of followed posts --
CREATE TABLE followed_posts (
	follow_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	post_id INT UNSIGNED NOT NULL,
	person_id INT UNSIGNED NOT NULL,
	FOREIGN KEY (post_id) REFERENCES posts(post_id) ON DELETE CASCADE,
	FOREIGN KEY (person_id) REFERENCES auth(person_id) ON DELETE CASCADE,
	PRIMARY KEY (follow_id)
);

CREATE TABLE feedbacks (
	feedback_id	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(45),
	email VARCHAR(45),
	content TEXT NOT NULL,
	PRIMARY KEY (feedback_id)
);

CREATE TABLE company (
	company_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	company_name VARCHAR(50),
	company_link TEXT,
	apply_date DATE,
	interview_date DATE,
	branch VARCHAR(100),
	message TEXT,
	PRIMARY key (company_id)
);

CREATE TABLE placementTable (
	isAbroad INT NOT NULL,  	#1 for abroad internship
	name VARCHAR(100) NOT NULL,
	department VARCHAR(100),
	place VARCHAR(100),
	website VARCHAR(100) NOT NULL
);



CREATE TABLE `alumni` (
  #`Alumni_id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Year` int(11) NOT NULL,
  `Email` varchar(69) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Post` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone Number` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


delete from internshipTable;
insert into internshipTable values(1,'a',2,'cse',1,'silicon valley',1,'www.google.com');
insert into internshipTable values(0,'b',1,'ee',1,'gurgaon',0,'www.yahoo.com');
insert into internshipTable values(0,'c',2,'ce',2,'gurgaon2',0,'www.yahoo2.com');
insert into internshipTable values(1,'d',2,'ce',2,'new york',1,'www.facebook.com');
insert into internshipTable values(1,'e',2,'ce',2,'amsterdam',0,'www.oracle.com');
insert into internshipTable values(1,'f',3,'cse',2,'chicago',1,'www.amazon.com');
insert into internshipTable values(1,'g',1,'cse',3,'new jersey',1,'www.microsoft.com');
insert into internshipTable values(1,'h',1,'cse',2,'london',0,'www.sherlock.com');
insert into internshipTable values(0,'i',1,'cse',3,'bombay',1,'www.tandt.com');
insert into internshipTable values(0,'j',1,'me',2,'noida',0,'www.hotmail.com');
insert into internshipTable values(0,'k',3,'me',3,'delhi',1,'www.tisco.com');
insert into internshipTable values(0,'l',3,'me',2,'hyderabad',0,'www.flipcart.com');
insert into internshipTable values(0,'m',2,'me',2,'bangalore',1,'www.infosys.com');
insert into internshipTable values(0,'n',2,'ee',3,'chennai',0,'www.yahoo3.com');
insert into internshipTable values(0,'o',2,'ee',2,'chandigarh',0,'www.yahoo4.com');
insert into internshipTable values(0,'p',2,'ee',2,'patna',1,'www.yahoo5.com');

delete from placementTable;
insert into placementTable values(1,'campus-1','cse','silicon valley','www.google.com');
insert into placementTable values(1,'campus-2','ee','california','www.yahoo.com');
insert into placementTable values(1,'campus-3','ce','valley','www.eetpathar.com');
insert into placementTable values(1,'campus-4','me','london','www.falone.com');
insert into placementTable values(0,'campus-5','cse','silicon valley','www.google2.com');
insert into placementTable values(0,'campus-6','ee','silicon valley','www.google.com');
insert into placementTable values(0,'campus-7','ce','silicon valley','www.google.com');
insert into placementTable values(0,'campus-8','me','silicon valley','www.google.com');
insert into placementTable values(1,'campus-9','cse','silicon valley','www.google.com');
