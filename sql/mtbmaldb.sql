-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2025 at 02:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

drop database if exists mtbmaldb;
create database if not exists mtbmaldb;
use mtbmaldb;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtbmaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
                              `assessmentId` int(6) UNSIGNED NOT NULL,
                              `assessmentNo` int(2) UNSIGNED NOT NULL,
                              `learningMaterialRefNo` int(10) UNSIGNED NOT NULL,
                              `title` varchar(155) NOT NULL,
                              `description` text NOT NULL,
                              `instruction` text DEFAULT NULL,
                              `scoringRubric` text DEFAULT NULL,
                              `sample` text DEFAULT NULL,
                              `schoolIdNo` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessmentitems`
--

CREATE TABLE `assessmentitems` (
                                   `gameTempNo` int(3) UNSIGNED NOT NULL,
                                   `tempRefNo` int(2) UNSIGNED NOT NULL,
                                   `assessmentId` int(6) UNSIGNED NOT NULL,
                                   `useby` int(10) UNSIGNED DEFAULT NULL,
                                   `assessmentNo` int(2) UNSIGNED NOT NULL,
                                   `itemNo` int(2) NOT NULL,
                                   `iQuestion` text NOT NULL,
                                   `correctAnswer` varchar(255) NOT NULL,
                                   `uploadDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educator`
--

CREATE TABLE `educator` (
                            `educatorNo` int(6) UNSIGNED NOT NULL,
                            `accRefNo` int(10) UNSIGNED NOT NULL,
                            `schoolIdNo` int(6) UNSIGNED NOT NULL,
                            `fullName` varchar(70) NOT NULL,
                            `edEmpIdNo` int(7) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educator`
--

INSERT INTO `educator` (`educatorNo`, `accRefNo`, `schoolIdNo`, `fullName`, `edEmpIdNo`) VALUES
                                                                                             (2, 3, 555555, 'New Educator', 5555552),
                                                                                             (3, 4, 555555, 'Session Cookies', 5555553),
                                                                                             (4, 5, 555555, 'Second Educator', 5555554),
                                                                                             (5, 7, 555555, 'Third Educator', 5555555),
                                                                                             (6, 13, 555555, 'Educator New', 5555559),
                                                                                             (7, 14, 555555, 'Sixth Educator', 5555599),
                                                                                             (8, 15, 555555, 'Sven Educa', 5489874),
                                                                                             (9, 23, 555555, 'welcome home', 5050502);

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_students`
--

CREATE TABLE `enrolled_students` (
                                     `enrollmentNo` int(10) UNSIGNED NOT NULL,
                                     `subjectRefNo` int(10) UNSIGNED NOT NULL,
                                     `assignedEducator` int(10) UNSIGNED NOT NULL,
                                     `studentAccRefNo` int(10) UNSIGNED NOT NULL,
                                     `status` enum('Enrolled','Removed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled_students`
--

INSERT INTO `enrolled_students` (`enrollmentNo`, `subjectRefNo`, `assignedEducator`, `studentAccRefNo`, `status`) VALUES
                                                                                                                      (1, 3, 4, 21, 'Removed'),
                                                                                                                      (2, 5, 4, 25, 'Enrolled'),
                                                                                                                      (3, 3, 4, 25, 'Enrolled'),
                                                                                                                      (4, 3, 4, 26, 'Enrolled'),
                                                                                                                      (5, 3, 4, 21, 'Removed'),
                                                                                                                      (6, 6, 4, 20, 'Enrolled'),
                                                                                                                      (7, 6, 4, 21, 'Enrolled'),
                                                                                                                      (8, 7, 4, 21, 'Enrolled'),
                                                                                                                      (9, 7, 4, 20, 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `learningcontent`
--

CREATE TABLE `learningcontent` (
                                   `modTempNo` int(3) UNSIGNED NOT NULL,
                                   `tempRefNo` int(2) UNSIGNED NOT NULL,
                                   `topicNo` int(2) NOT NULL,
                                   `useby` int(10) UNSIGNED DEFAULT NULL,
                                   `topic` varchar(155) NOT NULL,
                                   `contentText` text NOT NULL,
                                   `moduleId` int(6) UNSIGNED NOT NULL,
                                   `lessonNo` int(2) UNSIGNED NOT NULL,
                                   `uploadDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learningmaterial`
--

CREATE TABLE `learningmaterial` (
                                    `learningMaterialRefNo` int(10) UNSIGNED NOT NULL,
                                    `subjectRefNo` int(10) UNSIGNED NOT NULL,
                                    `chapterNo` int(2) UNSIGNED NOT NULL,
                                    `title` varchar(155) NOT NULL,
                                    `description` text NOT NULL,
                                    `lmNo` int(3) UNSIGNED NOT NULL,
                                    `lmType` enum('Learning Module','Learning Assessment') DEFAULT NULL,
                                    `diffLevel` enum('Easy','Intermediate','Hard') DEFAULT NULL,
                                    `schoolIdNo` int(6) UNSIGNED NOT NULL,
                                    `sourceRef` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learningmaterial`
--

INSERT INTO `learningmaterial` (`learningMaterialRefNo`, `subjectRefNo`, `chapterNo`, `title`, `description`, `lmNo`, `lmType`, `diffLevel`, `schoolIdNo`, `sourceRef`) VALUES
                                                                                                                                                                            (7, 3, 1, 'Text and Media', 'Text and Media: Add up to 4 image files and text for each lesson.', 1, 'Learning Module', 'Easy', 555555, NULL),
                                                                                                                                                                            (8, 5, 2, 'Image Only', 'Image Only: Title and upload a single image file.', 2, 'Learning Module', 'Easy', 555555, NULL),
                                                                                                                                                                            (9, 3, 3, 'PDF Upload', 'Upload a PDF file: A single PDF for the lesson.', 3, 'Learning Module', 'Intermediate', 555555, NULL),
                                                                                                                                                                            (10, 6, 1, 'Quest to Learn', 'Quest to Learn: Gamified, story-driven questions for knowledge checks.', 1, 'Learning Assessment', 'Intermediate', 555555, NULL),
                                                                                                                                                                            (11, 7, 2, 'Flip and Match', 'Flip and Match: Pair up images, perfect for vocabulary/identification.', 2, 'Learning Assessment', 'Hard', 555555, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
                          `moduleId` int(6) UNSIGNED NOT NULL,
                          `lessonNo` int(2) UNSIGNED NOT NULL,
                          `learningMaterialRefNo` int(10) UNSIGNED NOT NULL,
                          `title` varchar(155) NOT NULL,
                          `description` text NOT NULL,
                          `schoolIdNo` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mtbmalusers`
--

CREATE TABLE `mtbmalusers` (
                               `accRefNo` int(10) UNSIGNED NOT NULL,
                               `schoolRefNo` int(10) UNSIGNED NOT NULL,
                               `schoolIdNo` int(6) UNSIGNED NOT NULL,
                               `firstName` varchar(30) NOT NULL,
                               `lastName` varchar(30) NOT NULL,
                               `dob` date NOT NULL,
                               `emailAddress` varchar(50) NOT NULL,
                               `contactNo` varchar(12) NOT NULL,
                               `username` varchar(15) NOT NULL,
                               `password` varchar(60) NOT NULL,
                               `accCreator` int(10) UNSIGNED NOT NULL,
                               `accType` enum('School Administrator','Educator','Student') DEFAULT NULL,
                               `regDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mtbmalusers`
--

INSERT INTO `mtbmalusers` (`accRefNo`, `schoolRefNo`, `schoolIdNo`, `firstName`, `lastName`, `dob`, `emailAddress`, `contactNo`, `username`, `password`, `accCreator`, `accType`, `regDateTime`) VALUES
                                                                                                                                                                                                     (1, 1, 555555, 'Kyla', 'Maniscan', '2003-11-04', 'kjvmaniscan00221@usep.edu.ph', '09111111112', 'admin0', '$2y$10$zzBOKEEqyiviFaJBQQ8CwuyhBsW4nsWViXt2/YTmoS.zHAtA34mUq', 0, 'School Administrator', '2025-06-04 02:28:04'),
                                                                                                                                                                                                     (3, 1, 555555, 'New', 'Educator', '2000-08-11', 'educator0@scres.edu.ph', '09000000001', 'educator0', '$2y$10$tzKs3V18LEwmhkQZONcAUuvsn8vyI86bKxizPC5jYHy6KdV3iU7LO', 1, 'Educator', '2025-06-04 09:20:22'),
                                                                                                                                                                                                     (4, 1, 555555, 'Session', 'Cookies', '1999-08-04', 'educator1@srces.edu.ph', '09000000002', 'educator1', '$2y$10$h.Yy3ODSH/g/SC9kpDwEW.dIvkIgOwoIcNJPef4ee1e2WRlfn/WcS', 1, 'Educator', '2025-06-04 09:24:16'),
                                                                                                                                                                                                     (5, 1, 555555, 'Second', 'Educator', '2000-05-09', 'educator2@srces.edu.ph', '09000000003', 'educator2', '$2y$10$R.X7M3f2vYEVCrpBJlwe3uJtGVW3HJ/c1myYDBH0LjX8IMzaw3.c.', 1, 'Educator', '2025-06-04 09:27:31'),
                                                                                                                                                                                                     (7, 1, 555555, 'Third', 'Educator', '2003-05-06', 'educator3@srces.edu.ph', '09000000006', 'educator3', '$2y$10$V92Q.DNhFqM9WwsFR624fe7r9lbdJYpf/SsyXX32e0XO90c7LDTXS', 1, 'Educator', '2025-06-04 09:44:30'),
                                                                                                                                                                                                     (13, 1, 555555, 'Educator', 'New', '1985-08-09', 'new@educa.tor', '09000000017', 'neweduc1', '$2y$10$CF/wwouoZsfwxSkFZHDu.euVTwQpYoU3uGl07mA7s9Ahju/KVzAqW', 1, 'Educator', '2025-06-04 11:23:00'),
                                                                                                                                                                                                     (14, 1, 555555, 'Sixth', 'Educator', '1995-05-09', 'ne998@educa.tor', '09085499111', 'neweduc2', '$2y$10$iE8VxZ22QiMSq5KiQymbUOWKpxOP9ReknVN6R4U871UBM4/ZGxwP.', 1, 'Educator', '2025-06-04 11:32:29'),
                                                                                                                                                                                                     (15, 1, 555555, 'Sven', 'Educa', '1994-07-08', 'new9@educa.tor', '09085465333', 'neweduc3', '$2y$10$gTTicsNpY2h3zar/rszqnuQvgnjoXaq/uWy1wUp.vIyOQJWWYsc5y', 1, 'Educator', '2025-06-04 11:34:50'),
                                                                                                                                                                                                     (20, 1, 555555, 'Jane', 'Doe', '2021-09-08', 'ilove@davao.com', '09458795462', 'secret', '$2y$10$2dzODcVwjRrkvRxo54zwTes9XkhmjM65r3nbFlMa/o/cjFkL6bVGu', 1, 'Student', '2025-06-04 14:19:46'),
                                                                                                                                                                                                     (21, 1, 555555, 'Jennie', 'Kim', '2020-05-09', 'everthing@is.good', '09456787954', 'flyaway', '$2y$10$J2kAKKgRgyzZnZaZ9Ucr7uQpBJM8J13xcro75ZRNHAwu6SjPU3Loy', 1, 'Student', '2025-06-04 14:24:49'),
                                                                                                                                                                                                     (22, 1, 555555, 'Little', 'Mermaid', '2020-08-07', 'for@real.ph', '09456879999', 'worthyof', '$2y$10$o8TImvCcZZXdaQs3uk3H/Oip/.EzYrz9KytSKX9ZkW1/f1..VuTrG', 1, 'Student', '2025-06-04 14:31:41'),
                                                                                                                                                                                                     (23, 1, 555555, 'welcome', 'home', '1989-09-08', 'wel@com.ee', '09085648795', 'im@finally.home', '$2y$10$Jbn0opnIXDYTPf.YvRb2A.1J56/rJvGG6rQq0xL9ZrGLxdbFcqjNi', 1, 'Educator', '2025-06-04 14:33:34'),
                                                                                                                                                                                                     (24, 1, 555555, 'Eto Na', 'HAHAHAHAHA', '1986-08-07', 'inmy@gm.yo', '09874562315', 'bagonadmin', '$2y$10$aQOKBhiJnk7zS7Aqc31BdeQVXCBumypgGt3T57JHo1Wq8vtCkKAmu', 1, 'School Administrator', '2025-06-04 14:44:27'),
                                                                                                                                                                                                     (25, 1, 555555, 'Caleb', 'Klaus', '2020-05-07', 'caleb@klaus.edu', '09787878787', 'student9', '$2y$10$L9C.sVioKwpiNDBAcMrSeevD72vlCSpRPxBdYkB9qsV99JVTheV.S', 1, 'Student', '2025-06-05 13:38:27'),
                                                                                                                                                                                                     (26, 1, 555555, 'Ez', 'Mil', '2021-09-09', 'student5@scres.edu.ph', '09084554666', 'student8', '$2y$10$osq0disu8OUuFQIW8ufEou1OhoEZGYM4CE9VMUZaiZO8GqLakFwoy', 1, 'Student', '2025-06-05 13:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
                          `schoolRefNo` int(10) UNSIGNED NOT NULL,
                          `schoolName` tinytext NOT NULL,
                          `shortName` varchar(155) NOT NULL,
                          `schoolIdNo` int(6) UNSIGNED NOT NULL,
                          `emailAddress` varchar(50) NOT NULL,
                          `schoolType` enum('Public Integrated School','Private Integrated School','Private Elementary School','Public Elementary School') DEFAULT NULL,
                          `contactNo` varchar(12) NOT NULL,
                          `locAddress` varchar(70) NOT NULL,
                          `region` varchar(30) NOT NULL,
                          `adminUserName` varchar(15) NOT NULL,
                          `regDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolRefNo`, `schoolName`, `shortName`, `schoolIdNo`, `emailAddress`, `schoolType`, `contactNo`, `locAddress`, `region`, `adminUserName`, `regDateTime`) VALUES
    (1, 'San Roque Central Elementary School', 'SRCES', 555555, 'official@srces.edu.ph', 'Public Elementary School', '09111111111', 'Bo. Obrero, Lacson St, Poblacion District, Davao City, 8000 Davao del ', 'Region XI', 'admin0', '2025-06-04 02:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `schooladministrator`
--

CREATE TABLE `schooladministrator` (
                                       `adminNo` int(6) UNSIGNED NOT NULL,
                                       `accRefNo` int(10) UNSIGNED NOT NULL,
                                       `schoolIdNo` int(6) UNSIGNED NOT NULL,
                                       `fullName` varchar(70) NOT NULL,
                                       `adEmpIdNo` int(7) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schooladministrator`
--

INSERT INTO `schooladministrator` (`adminNo`, `accRefNo`, `schoolIdNo`, `fullName`, `adEmpIdNo`) VALUES
                                                                                                     (1, 1, 555555, 'Kyla Maniscan', 5555551),
                                                                                                     (2, 24, 555555, 'Eto Na HAHAHAHAHA', 4562315);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
                           `studentNo` int(6) UNSIGNED NOT NULL,
                           `accRefNo` int(10) UNSIGNED NOT NULL,
                           `schoolIdNo` int(6) UNSIGNED NOT NULL,
                           `lrn` varchar(12) NOT NULL,
                           `fullName` varchar(70) NOT NULL,
                           `parentGuardianName` varchar(70) NOT NULL,
                           `pgRStoStudent` enum('Father','Mother','Guardian','Sibling','Close Relative') DEFAULT NULL,
                           `pgDOB` date NOT NULL,
                           `pgMaritalStatus` varchar(15) NOT NULL,
                           `pgEmailAdd` varchar(30) NOT NULL,
                           `pgContactNo` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentNo`, `accRefNo`, `schoolIdNo`, `lrn`, `fullName`, `parentGuardianName`, `pgRStoStudent`, `pgDOB`, `pgMaritalStatus`, `pgEmailAdd`, `pgContactNo`) VALUES
                                                                                                                                                                                     (8, 20, 555555, '654321654321', 'Jane Doe', 'Jisoo Ka', 'Mother', '1994-08-07', 'Widowed', 'widow@ako.haha', '09184563214'),
                                                                                                                                                                                     (9, 21, 555555, '789789789789', 'Jennie Kim', 'WHy ANo', 'Guardian', '1999-08-05', 'Married', 'married@guardian.wow', '09088754621'),
                                                                                                                                                                                     (10, 22, 555555, '123456123456', 'Little Mermaid', 'skrrrrraaaaaa panda', 'Close Relative', '1997-08-07', 'Guardian Angel', 'angel@gua.rd', '09458574879'),
                                                                                                                                                                                     (11, 25, 555555, '987987987852', 'Caleb Klaus', 'Ice Cream', 'Guardian', '1999-08-09', 'Married', 'married@guard.an', '09085468521'),
                                                                                                                                                                                     (12, 26, 555555, '987753357789', 'Ez Mil', 'Parente Namo', 'Mother', '1995-05-05', 'Single', 'single@mom.ph', '09085465423');

-- --------------------------------------------------------

--
-- Table structure for table `student_assessment_answers`
--

CREATE TABLE `student_assessment_answers` (
                                              `answerId` int(10) UNSIGNED NOT NULL,
                                              `stLRN` varchar(12) NOT NULL,
                                              `assessmentId` int(6) UNSIGNED NOT NULL,
                                              `assessmentItemId` int(3) UNSIGNED NOT NULL,
                                              `studentAnswer` varchar(255) NOT NULL,
                                              `isCorrect` tinyint(1) DEFAULT NULL,
                                              `reviewedBy` int(10) UNSIGNED DEFAULT NULL,
                                              `reviewDateTime` timestamp NULL DEFAULT NULL,
                                              `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_assessment_result`
--

CREATE TABLE `student_assessment_result` (
                                             `resultId` int(10) UNSIGNED NOT NULL,
                                             `stLRN` varchar(12) NOT NULL,
                                             `assessmentId` int(6) UNSIGNED NOT NULL,
                                             `totalItems` int(10) UNSIGNED NOT NULL,
                                             `correctAnswers` int(10) UNSIGNED NOT NULL,
                                             `rawScore` decimal(5,2) GENERATED ALWAYS AS (`correctAnswers` / `totalItems` * 100) STORED,
                                             `remarks` text DEFAULT NULL,
                                             `finalizedBy` int(10) UNSIGNED DEFAULT NULL,
                                             `finalDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
                           `subjectRefNo` int(10) UNSIGNED NOT NULL,
                           `subjectIdNo` int(7) UNSIGNED NOT NULL,
                           `subjTitle` varchar(155) NOT NULL,
                           `subjDescription` text NOT NULL,
                           `mtLanguage` varchar(30) NOT NULL,
                           `adminCreator` int(6) UNSIGNED NOT NULL,
                           `assignedEducator` int(10) UNSIGNED DEFAULT NULL,
                           `schoolIdNo` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectRefNo`, `subjectIdNo`, `subjTitle`, `subjDescription`, `mtLanguage`, `adminCreator`, `assignedEducator`, `schoolIdNo`) VALUES
                                                                                                                                                          (3, 7894524, 'K1 - Real Subject Ito', 'eme eme ra diay hahahaha usab tayo edit chada na kaayooooo kase angas naman nito diba diba diaba ahaaaak', 'slay', 1, 4, 555555),
                                                                                                                                                          (5, 7897891, 'GR1 - Pulong sa Lihok', 'Pagtudlo sa mga bata kung unsa ang pulong sa lihok ug giunsa kini paggamit sa hugpong sa mga pulong.', 'Cebuano', 1, 4, 555555),
                                                                                                                                                          (6, 7897892, 'GR2 - Paghisunod sa mga Panghitabo', 'Pagtudlo sa mga estudyante kung giunsa ang pagsunod-sunod sa mga panghitabo aron mas masabtan ang usa ka istorya o proseso.', 'Bisaya', 1, 4, 555555),
                                                                                                                                                          (7, 7897893, 'GR3 - Matematika', 'Pagtudlo sa mga estudyante sa yano nga konsepto sa pagdugang gamit ang simbolo nga \"+\" ug \"=\", ug pagsulbad sa yano nga problema sa pagdugang.', 'Cebuano', 1, 4, 555555);

-- --------------------------------------------------------

--
-- Table structure for table `supportingmedia`
--

CREATE TABLE `supportingmedia` (
                                   `fileNo` int(4) UNSIGNED NOT NULL,
                                   `learningMaterialRefNo` int(10) UNSIGNED NOT NULL,
                                   `gameTempNo` int(3) UNSIGNED DEFAULT NULL,
                                   `modTempNo` int(3) UNSIGNED DEFAULT NULL,
                                   `accRefNo` int(10) UNSIGNED NOT NULL,
                                   `filename` varchar(255) DEFAULT NULL,
                                   `filedata` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
                            `tempRefNo` int(2) UNSIGNED NOT NULL,
                            `tempName` varchar(70) NOT NULL,
                            `tempDescription` text NOT NULL,
                            `tempType` enum('Learning Module','Learning Assessment') DEFAULT NULL,
                            `diffLevel` enum('Easy','Intermediate','Hard') DEFAULT NULL,
                            `learningMaterialRefNo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`tempRefNo`, `tempName`, `tempDescription`, `tempType`, `diffLevel`, `learningMaterialRefNo`) VALUES
                                                                                                                          (11, 'Module - 01', 'Text and Media: Add up to 4 image files and text for each lesson.', 'Learning Module', 'Easy', 7),
                                                                                                                          (12, 'Module - 02', 'Image Only: Title and upload a single image file.', 'Learning Module', 'Easy', 8),
                                                                                                                          (13, 'Module - 03', 'Upload a PDF file: A single PDF for the lesson.', 'Learning Module', 'Intermediate', 9),
                                                                                                                          (14, 'Assessment - 01', 'Quest to Learn: Gamified, story-driven questions for knowledge checks.', 'Learning Assessment', 'Intermediate', 10),
                                                                                                                          (15, 'Assessment - 02', 'Flip and Match: Pair up images, perfect for vocabulary/identification.', 'Learning Assessment', 'Hard', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
    ADD PRIMARY KEY (`assessmentId`),
    ADD KEY `schoolIdNo` (`schoolIdNo`),
    ADD KEY `learningMaterialRefNo` (`learningMaterialRefNo`);

--
-- Indexes for table `assessmentitems`
--
ALTER TABLE `assessmentitems`
    ADD PRIMARY KEY (`gameTempNo`),
    ADD KEY `tempRefNo` (`tempRefNo`),
    ADD KEY `assessmentId` (`assessmentId`),
    ADD KEY `useby` (`useby`);

--
-- Indexes for table `educator`
--
ALTER TABLE `educator`
    ADD PRIMARY KEY (`educatorNo`),
    ADD UNIQUE KEY `edEmpIdNo` (`edEmpIdNo`),
    ADD KEY `accRefNo` (`accRefNo`),
    ADD KEY `schoolIdNo` (`schoolIdNo`);

--
-- Indexes for table `enrolled_students`
--
ALTER TABLE `enrolled_students`
    ADD PRIMARY KEY (`enrollmentNo`),
    ADD KEY `subjectRefNo` (`subjectRefNo`),
    ADD KEY `assignedEducator` (`assignedEducator`),
    ADD KEY `studentAccRefNo` (`studentAccRefNo`);

--
-- Indexes for table `learningcontent`
--
ALTER TABLE `learningcontent`
    ADD PRIMARY KEY (`modTempNo`),
    ADD KEY `tempRefNo` (`tempRefNo`),
    ADD KEY `moduleId` (`moduleId`),
    ADD KEY `useby` (`useby`);

--
-- Indexes for table `learningmaterial`
--
ALTER TABLE `learningmaterial`
    ADD PRIMARY KEY (`learningMaterialRefNo`),
    ADD KEY `schoolIdNo` (`schoolIdNo`),
    ADD KEY `subjectRefNo` (`subjectRefNo`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
    ADD PRIMARY KEY (`moduleId`),
    ADD KEY `schoolIdNo` (`schoolIdNo`),
    ADD KEY `learningMaterialRefNo` (`learningMaterialRefNo`);

--
-- Indexes for table `mtbmalusers`
--
ALTER TABLE `mtbmalusers`
    ADD PRIMARY KEY (`accRefNo`),
    ADD UNIQUE KEY `emailAddress` (`emailAddress`),
    ADD UNIQUE KEY `contactNo` (`contactNo`),
    ADD UNIQUE KEY `username` (`username`),
    ADD KEY `schoolRefNo` (`schoolRefNo`),
    ADD KEY `schoolIdNo` (`schoolIdNo`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
    ADD PRIMARY KEY (`schoolRefNo`),
    ADD UNIQUE KEY `schoolIdNo` (`schoolIdNo`),
    ADD UNIQUE KEY `emailAddress` (`emailAddress`),
    ADD UNIQUE KEY `contactNo` (`contactNo`),
    ADD UNIQUE KEY `adminUserName` (`adminUserName`);

--
-- Indexes for table `schooladministrator`
--
ALTER TABLE `schooladministrator`
    ADD PRIMARY KEY (`adminNo`),
    ADD UNIQUE KEY `adEmpIdNo` (`adEmpIdNo`),
    ADD KEY `accRefNo` (`accRefNo`),
    ADD KEY `schoolIdNo` (`schoolIdNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
    ADD PRIMARY KEY (`studentNo`),
    ADD UNIQUE KEY `lrn` (`lrn`),
    ADD KEY `accRefNo` (`accRefNo`),
    ADD KEY `schoolIdNo` (`schoolIdNo`);

--
-- Indexes for table `student_assessment_answers`
--
ALTER TABLE `student_assessment_answers`
    ADD PRIMARY KEY (`answerId`),
    ADD KEY `assessmentId` (`assessmentId`),
    ADD KEY `assessmentItemId` (`assessmentItemId`),
    ADD KEY `reviewedBy` (`reviewedBy`),
    ADD KEY `student_assessment_answers_ibfk_1` (`stLRN`);

--
-- Indexes for table `student_assessment_result`
--
ALTER TABLE `student_assessment_result`
    ADD PRIMARY KEY (`resultId`),
    ADD KEY `assessmentId` (`assessmentId`),
    ADD KEY `finalizedBy` (`finalizedBy`),
    ADD KEY `student_assessment_result_ibfk_1` (`stLRN`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
    ADD PRIMARY KEY (`subjectRefNo`),
    ADD KEY `adminCreator` (`adminCreator`),
    ADD KEY `assignedEducator` (`assignedEducator`),
    ADD KEY `schoolIdNo` (`schoolIdNo`);

--
-- Indexes for table `supportingmedia`
--
ALTER TABLE `supportingmedia`
    ADD PRIMARY KEY (`fileNo`),
    ADD KEY `learningMaterialRefNo` (`learningMaterialRefNo`),
    ADD KEY `gameTempNo` (`gameTempNo`),
    ADD KEY `modTempNo` (`modTempNo`),
    ADD KEY `accRefNo` (`accRefNo`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
    ADD PRIMARY KEY (`tempRefNo`),
    ADD KEY `learningMaterialRefNo` (`learningMaterialRefNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
    MODIFY `assessmentId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessmentitems`
--
ALTER TABLE `assessmentitems`
    MODIFY `gameTempNo` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educator`
--
ALTER TABLE `educator`
    MODIFY `educatorNo` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enrolled_students`
--
ALTER TABLE `enrolled_students`
    MODIFY `enrollmentNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `learningcontent`
--
ALTER TABLE `learningcontent`
    MODIFY `modTempNo` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learningmaterial`
--
ALTER TABLE `learningmaterial`
    MODIFY `learningMaterialRefNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
    MODIFY `moduleId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mtbmalusers`
--
ALTER TABLE `mtbmalusers`
    MODIFY `accRefNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
    MODIFY `schoolRefNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schooladministrator`
--
ALTER TABLE `schooladministrator`
    MODIFY `adminNo` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
    MODIFY `studentNo` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_assessment_answers`
--
ALTER TABLE `student_assessment_answers`
    MODIFY `answerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_assessment_result`
--
ALTER TABLE `student_assessment_result`
    MODIFY `resultId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
    MODIFY `subjectRefNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supportingmedia`
--
ALTER TABLE `supportingmedia`
    MODIFY `fileNo` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
    MODIFY `tempRefNo` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
    ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE,
    ADD CONSTRAINT `assessment_ibfk_2` FOREIGN KEY (`learningMaterialRefNo`) REFERENCES `learningmaterial` (`learningMaterialRefNo`) ON DELETE CASCADE;

--
-- Constraints for table `assessmentitems`
--
ALTER TABLE `assessmentitems`
    ADD CONSTRAINT `assessmentitems_ibfk_1` FOREIGN KEY (`tempRefNo`) REFERENCES `template` (`tempRefNo`),
    ADD CONSTRAINT `assessmentitems_ibfk_2` FOREIGN KEY (`assessmentId`) REFERENCES `assessment` (`assessmentId`) ON DELETE CASCADE,
    ADD CONSTRAINT `assessmentitems_ibfk_3` FOREIGN KEY (`useby`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL;

--
-- Constraints for table `educator`
--
ALTER TABLE `educator`
    ADD CONSTRAINT `educator_ibfk_1` FOREIGN KEY (`accRefNo`) REFERENCES `mtbmalusers` (`accRefNo`),
    ADD CONSTRAINT `educator_ibfk_2` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE;

--
-- Constraints for table `enrolled_students`
--
ALTER TABLE `enrolled_students`
    ADD CONSTRAINT `enrolled_students_ibfk_1` FOREIGN KEY (`subjectRefNo`) REFERENCES `subject` (`subjectRefNo`) ON DELETE CASCADE,
    ADD CONSTRAINT `enrolled_students_ibfk_2` FOREIGN KEY (`assignedEducator`) REFERENCES `mtbmalusers` (`accRefNo`),
    ADD CONSTRAINT `enrolled_students_ibfk_3` FOREIGN KEY (`studentAccRefNo`) REFERENCES `mtbmalusers` (`accRefNo`);

--
-- Constraints for table `learningcontent`
--
ALTER TABLE `learningcontent`
    ADD CONSTRAINT `learningcontent_ibfk_1` FOREIGN KEY (`tempRefNo`) REFERENCES `template` (`tempRefNo`),
    ADD CONSTRAINT `learningcontent_ibfk_2` FOREIGN KEY (`moduleId`) REFERENCES `module` (`moduleId`) ON DELETE CASCADE,
    ADD CONSTRAINT `learningcontent_ibfk_3` FOREIGN KEY (`useby`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL;

--
-- Constraints for table `learningmaterial`
--
ALTER TABLE `learningmaterial`
    ADD CONSTRAINT `learningmaterial_ibfk_1` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE,
    ADD CONSTRAINT `learningmaterial_ibfk_2` FOREIGN KEY (`subjectRefNo`) REFERENCES `subject` (`subjectRefNo`) ON DELETE CASCADE;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
    ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE,
    ADD CONSTRAINT `module_ibfk_2` FOREIGN KEY (`learningMaterialRefNo`) REFERENCES `learningmaterial` (`learningMaterialRefNo`) ON DELETE CASCADE;

--
-- Constraints for table `mtbmalusers`
--
ALTER TABLE `mtbmalusers`
    ADD CONSTRAINT `mtbmalusers_ibfk_1` FOREIGN KEY (`schoolRefNo`) REFERENCES `school` (`schoolRefNo`) ON DELETE CASCADE,
    ADD CONSTRAINT `mtbmalusers_ibfk_2` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE;

--
-- Constraints for table `schooladministrator`
--
ALTER TABLE `schooladministrator`
    ADD CONSTRAINT `schooladministrator_ibfk_1` FOREIGN KEY (`accRefNo`) REFERENCES `mtbmalusers` (`accRefNo`),
    ADD CONSTRAINT `schooladministrator_ibfk_2` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
    ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`accRefNo`) REFERENCES `mtbmalusers` (`accRefNo`),
    ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE;

--
-- Constraints for table `student_assessment_answers`
--
ALTER TABLE `student_assessment_answers`
    ADD CONSTRAINT `student_assessment_answers_ibfk_1` FOREIGN KEY (`stLRN`) REFERENCES `student` (`lrn`) ON DELETE CASCADE,
    ADD CONSTRAINT `student_assessment_answers_ibfk_2` FOREIGN KEY (`assessmentId`) REFERENCES `assessment` (`assessmentId`) ON DELETE CASCADE,
    ADD CONSTRAINT `student_assessment_answers_ibfk_3` FOREIGN KEY (`assessmentItemId`) REFERENCES `assessmentitems` (`gameTempNo`) ON DELETE CASCADE,
    ADD CONSTRAINT `student_assessment_answers_ibfk_4` FOREIGN KEY (`reviewedBy`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL;

--
-- Constraints for table `student_assessment_result`
--
ALTER TABLE `student_assessment_result`
    ADD CONSTRAINT `student_assessment_result_ibfk_1` FOREIGN KEY (`stLRN`) REFERENCES `student` (`lrn`) ON DELETE CASCADE,
    ADD CONSTRAINT `student_assessment_result_ibfk_2` FOREIGN KEY (`assessmentId`) REFERENCES `assessment` (`assessmentId`) ON DELETE CASCADE,
    ADD CONSTRAINT `student_assessment_result_ibfk_3` FOREIGN KEY (`finalizedBy`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
    ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`adminCreator`) REFERENCES `mtbmalusers` (`accRefNo`),
    ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`assignedEducator`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL,
    ADD CONSTRAINT `subject_ibfk_3` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE;

--
-- Constraints for table `supportingmedia`
--
ALTER TABLE `supportingmedia`
    ADD CONSTRAINT `supportingmedia_ibfk_1` FOREIGN KEY (`learningMaterialRefNo`) REFERENCES `learningmaterial` (`learningMaterialRefNo`),
    ADD CONSTRAINT `supportingmedia_ibfk_2` FOREIGN KEY (`gameTempNo`) REFERENCES `assessmentitems` (`gameTempNo`) ON DELETE SET NULL,
    ADD CONSTRAINT `supportingmedia_ibfk_3` FOREIGN KEY (`modTempNo`) REFERENCES `learningcontent` (`modTempNo`) ON DELETE SET NULL,
    ADD CONSTRAINT `supportingmedia_ibfk_4` FOREIGN KEY (`accRefNo`) REFERENCES `mtbmalusers` (`accRefNo`);

--
-- Constraints for table `template`
--
ALTER TABLE `template`
    ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`learningMaterialRefNo`) REFERENCES `learningmaterial` (`learningMaterialRefNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;