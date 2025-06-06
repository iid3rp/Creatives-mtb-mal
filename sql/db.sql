drop database if exists mtbmaldb;
create database if not exists mtbmaldb;
use mtbmaldb;



# enrolled_students
CREATE TABLE `enrolled_students` (
    `enrollmentNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `subjectRefNo` int(10) unsigned NOT NULL,
    `assignedEducator` int(10) unsigned NOT NULL,
    `studentAccRefNo` int(10) unsigned NOT NULL,
    `status` enum('Enrolled','Removed') DEFAULT NULL,
    PRIMARY KEY (`enrollmentNo`),
    KEY `subjectRefNo` (`subjectRefNo`),
    KEY `assignedEducator` (`assignedEducator`),
    KEY `studentAccRefNo` (`studentAccRefNo`),
    CONSTRAINT `enrolled_students_ibfk_1` FOREIGN KEY (`subjectRefNo`) REFERENCES `subject` (`subjectRefNo`) ON DELETE CASCADE,
    CONSTRAINT `enrolled_students_ibfk_2` FOREIGN KEY (`assignedEducator`) REFERENCES `mtbmalusers` (`accRefNo`),
    CONSTRAINT `enrolled_students_ibfk_3` FOREIGN KEY (`studentAccRefNo`) REFERENCES `mtbmalusers` (`accRefNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# learningcontent
CREATE TABLE `learningcontent` (
    `modTempNo` int(3) unsigned NOT NULL AUTO_INCREMENT,
    `tempRefNo` int(2) unsigned NOT NULL,
    `topicNo` int(2) NOT NULL,
    `useby` int(10) unsigned DEFAULT NULL,
    `topic` varchar(155) NOT NULL,
    `contentText` text NOT NULL,
    `moduleId` int(6) unsigned NOT NULL,
    `lessonNo` int(2) unsigned NOT NULL,
    `uploadDateTime` timestamp NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`modTempNo`),
    KEY `tempRefNo` (`tempRefNo`),
    KEY `moduleId` (`moduleId`),
    KEY `useby` (`useby`),
    CONSTRAINT `learningcontent_ibfk_1` FOREIGN KEY (`tempRefNo`) REFERENCES `template` (`tempRefNo`),
    CONSTRAINT `learningcontent_ibfk_2` FOREIGN KEY (`moduleId`) REFERENCES `module` (`moduleId`) ON DELETE CASCADE,
    CONSTRAINT `learningcontent_ibfk_3` FOREIGN KEY (`useby`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#learningmaterial
CREATE TABLE `learningmaterial` (
    `learningMaterialRefNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `subjectRefNo` int(10) unsigned NOT NULL,
    `chapterNo` int(2) unsigned NOT NULL,
    `title` varchar(155) NOT NULL,
    `description` text NOT NULL,
    `lmNo` int(3) unsigned NOT NULL,
    `lmType` enum('Learning Module','Learning Assessment') DEFAULT NULL,
    `diffLevel` enum('Easy','Intermediate','Hard') DEFAULT NULL,
    `schoolIdNo` int(6) unsigned NOT NULL,
    `sourceRef` text DEFAULT NULL,
    PRIMARY KEY (`learningMaterialRefNo`),
    KEY `schoolIdNo` (`schoolIdNo`),
    KEY `subjectRefNo` (`subjectRefNo`),
    CONSTRAINT `learningmaterial_ibfk_1` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE,
    CONSTRAINT `learningmaterial_ibfk_2` FOREIGN KEY (`subjectRefNo`) REFERENCES `subject` (`subjectRefNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# module
CREATE TABLE `module` (
    `moduleId` int(6) unsigned NOT NULL AUTO_INCREMENT,
    `lessonNo` int(2) unsigned NOT NULL,
    `learningMaterialRefNo` int(10) unsigned NOT NULL,
    `title` varchar(155) NOT NULL,
    `description` text NOT NULL,
    `schoolIdNo` int(6) unsigned NOT NULL,
    PRIMARY KEY (`moduleId`),
    KEY `schoolIdNo` (`schoolIdNo`),
    KEY `learningMaterialRefNo` (`learningMaterialRefNo`),
    CONSTRAINT `module_ibfk_1` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE,
    CONSTRAINT `module_ibfk_2` FOREIGN KEY (`learningMaterialRefNo`) REFERENCES `learningmaterial` (`learningMaterialRefNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# mtbmalusers
CREATE TABLE `mtbmalusers` (
    `accRefNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `schoolRefNo` int(10) unsigned NOT NULL,
    `firstName` varchar(30) NOT NULL,
    `lastName` varchar(30) NOT NULL,
    `dob` date NOT NULL,
    `emailAddress` varchar(50) NOT NULL,
    `contactNo` varchar(12) NOT NULL,
    `username` varchar(15) NOT NULL,
    `password` varchar(60) NOT NULL,
    `accCreator` int(10) unsigned NOT NULL,
    `accType` enum('School Administrator','Educator','Student') DEFAULT NULL,
    `regDateTime` timestamp NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`accRefNo`),
    UNIQUE KEY `emailAddress` (`emailAddress`),
    UNIQUE KEY `contactNo` (`contactNo`),
    UNIQUE KEY `username` (`username`),
    KEY `schoolRefNo` (`schoolRefNo`),
    CONSTRAINT `mtbmalusers_ibfk_1` FOREIGN KEY (`schoolRefNo`) REFERENCES `school` (`schoolRefNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# school
CREATE TABLE `school` (
    `schoolRefNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `schoolName` tinytext NOT NULL,
    `shortName` varchar(155) NOT NULL,
    `schoolIdNo` int(6) unsigned NOT NULL,
    `emailAddress` varchar(50) NOT NULL,
    `schoolType` enum('Public Integrated School','Private Integrated School','Private Elementary School','Public Elementary School') DEFAULT NULL,
    `contactNo` varchar(12) NOT NULL,
    `locAddress` varchar(70) NOT NULL,
    `region` varchar(30) NOT NULL,
    `adminUserName` varchar(15) NOT NULL,
    `regDateTime` timestamp NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`schoolRefNo`),
    UNIQUE KEY `schoolIdNo` (`schoolIdNo`),
    UNIQUE KEY `emailAddress` (`emailAddress`),
    UNIQUE KEY `contactNo` (`contactNo`),
    UNIQUE KEY `adminUserName` (`adminUserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#schooladministrator
CREATE TABLE `schooladministrator` (
    `adminNo` int(6) unsigned NOT NULL AUTO_INCREMENT,
    `accRefNo` int(10) unsigned NOT NULL,
    `schoolIdNo` int(6) unsigned NOT NULL,
    `fullName` varchar(70) NOT NULL,
    `adEmpIdNo` int(7) unsigned NOT NULL,
    PRIMARY KEY (`adminNo`),
    UNIQUE KEY `adEmpIdNo` (`adEmpIdNo`),
    KEY `accRefNo` (`accRefNo`),
    KEY `schoolIdNo` (`schoolIdNo`),
    CONSTRAINT `schooladministrator_ibfk_1` FOREIGN KEY (`accRefNo`) REFERENCES `mtbmalusers` (`accRefNo`),
    CONSTRAINT `schooladministrator_ibfk_2` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# student
CREATE TABLE `student` (
    `studentNo` int(6) unsigned NOT NULL AUTO_INCREMENT,
    `accRefNo` int(10) unsigned NOT NULL,
    `schoolIdNo` int(6) unsigned NOT NULL,
    `lrn` int(12) unsigned NOT NULL,
    `fullName` varchar(70) NOT NULL,
    `parentGuardianName` varchar(70) NOT NULL,
    `pgRStoStudent` enum('Father','Mother','Guardian','Sibling','Close Relative') DEFAULT NULL,
    `pgDOB` date NOT NULL,
    `pgMaritalStatus` varchar(15) NOT NULL,
    `pgEmailAdd` varchar(30) NOT NULL,
    `pgContactNo` varchar(12) NOT NULL,
    PRIMARY KEY (`studentNo`),
    UNIQUE KEY `lrn` (`lrn`),
    KEY `accRefNo` (`accRefNo`),
    KEY `schoolIdNo` (`schoolIdNo`),
    CONSTRAINT `student_ibfk_1` FOREIGN KEY (`accRefNo`) REFERENCES `mtbmalusers` (`accRefNo`),
    CONSTRAINT `student_ibfk_2` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# student_assessment_answers
CREATE TABLE `student_assessment_answers` (
    `answerId` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `stLRN` int(12) unsigned NOT NULL,
    `assessmentId` int(6) unsigned NOT NULL,
    `assessmentItemId` int(3) unsigned NOT NULL,
    `studentAnswer` varchar(255) NOT NULL,
    `isCorrect` tinyint(1) DEFAULT NULL,
    `reviewedBy` int(10) unsigned DEFAULT NULL,
    `reviewDateTime` timestamp NULL DEFAULT NULL,
    `remarks` text DEFAULT NULL,
    PRIMARY KEY (`answerId`),
    KEY `stLRN` (`stLRN`),
    KEY `assessmentId` (`assessmentId`),
    KEY `assessmentItemId` (`assessmentItemId`),
    KEY `reviewedBy` (`reviewedBy`),
    CONSTRAINT `student_assessment_answers_ibfk_1` FOREIGN KEY (`stLRN`) REFERENCES `student` (`lrn`) ON DELETE CASCADE,
    CONSTRAINT `student_assessment_answers_ibfk_2` FOREIGN KEY (`assessmentId`) REFERENCES `assessment` (`assessmentId`) ON DELETE CASCADE,
    CONSTRAINT `student_assessment_answers_ibfk_3` FOREIGN KEY (`assessmentItemId`) REFERENCES `assessmentitems` (`gameTempNo`) ON DELETE CASCADE,
    CONSTRAINT `student_assessment_answers_ibfk_4` FOREIGN KEY (`reviewedBy`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


# student_assessment_result
CREATE TABLE `student_assessment_result` (
    `resultId` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `stLRN` int(12) unsigned NOT NULL,
    `assessmentId` int(6) unsigned NOT NULL,
    `totalItems` int(10) unsigned NOT NULL,
    `correctAnswers` int(10) unsigned NOT NULL,
    `rawScore` decimal(5,2) GENERATED ALWAYS AS (`correctAnswers` / `totalItems` * 100) STORED,
    `remarks` text DEFAULT NULL,
    `finalizedBy` int(10) unsigned DEFAULT NULL,
    `finalDateTime` timestamp NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`resultId`),
    KEY `stLRN` (`stLRN`),
    KEY `assessmentId` (`assessmentId`),
    KEY `finalizedBy` (`finalizedBy`),
    CONSTRAINT `student_assessment_result_ibfk_1` FOREIGN KEY (`stLRN`) REFERENCES `student` (`lrn`) ON DELETE CASCADE,
    CONSTRAINT `student_assessment_result_ibfk_2` FOREIGN KEY (`assessmentId`) REFERENCES `assessment` (`assessmentId`) ON DELETE CASCADE,
    CONSTRAINT `student_assessment_result_ibfk_3` FOREIGN KEY (`finalizedBy`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#subject
CREATE TABLE `subject` (
    `subjectRefNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `subjectId` int(7) unsigned NOT NULL,
    `subjTitle` varchar(155) NOT NULL,
    `subjDescription` text NOT NULL,
    `mtLanguage` varchar(30) NOT NULL,
    `adminCreator` int(6) unsigned NOT NULL,
    `assignedEducator` int(10) unsigned DEFAULT NULL,
    `schoolIdNo` int(6) unsigned NOT NULL,
    PRIMARY KEY (`subjectRefNo`),
    UNIQUE KEY `subjectId` (`subjectId`),
    KEY `adminCreator` (`adminCreator`),
    KEY `assignedEducator` (`assignedEducator`),
    KEY `schoolIdNo` (`schoolIdNo`),
    CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`adminCreator`) REFERENCES `mtbmalusers` (`accRefNo`),
    CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`assignedEducator`) REFERENCES `mtbmalusers` (`accRefNo`) ON DELETE SET NULL,
    CONSTRAINT `subject_ibfk_3` FOREIGN KEY (`schoolIdNo`) REFERENCES `school` (`schoolIdNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# supportingmedia
CREATE TABLE `supportingmedia` (
    `fileNo` int(4) unsigned NOT NULL AUTO_INCREMENT,
    `learningMaterialRefNo` int(10) unsigned NOT NULL,
    `gameTempNo` int(3) unsigned DEFAULT NULL,
    `modTempNo` int(3) unsigned DEFAULT NULL,
    `accRefNo` int(10) unsigned NOT NULL,
    `filename` varchar(255) DEFAULT NULL,
    `filedata` blob DEFAULT NULL,
    PRIMARY KEY (`fileNo`),
    KEY `learningMaterialRefNo` (`learningMaterialRefNo`),
    KEY `gameTempNo` (`gameTempNo`),
    KEY `modTempNo` (`modTempNo`),
    KEY `accRefNo` (`accRefNo`),
    CONSTRAINT `supportingmedia_ibfk_1` FOREIGN KEY (`learningMaterialRefNo`) REFERENCES `learningmaterial` (`learningMaterialRefNo`),
    CONSTRAINT `supportingmedia_ibfk_2` FOREIGN KEY (`gameTempNo`) REFERENCES `assessmentitems` (`gameTempNo`) ON DELETE SET NULL,
    CONSTRAINT `supportingmedia_ibfk_3` FOREIGN KEY (`modTempNo`) REFERENCES `learningcontent` (`modTempNo`) ON DELETE SET NULL,
    CONSTRAINT `supportingmedia_ibfk_4` FOREIGN KEY (`accRefNo`) REFERENCES `mtbmalusers` (`accRefNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# template
CREATE TABLE `template` (
                                            `tempRefNo` int(2) unsigned NOT NULL AUTO_INCREMENT,
                                            `tempName` varchar(70) NOT NULL,
                                            `tempDescription` text NOT NULL,
                                            `tempType` enum('Learning Module','Learning Assessment') DEFAULT NULL,
                                            `diffLevel` enum('Easy','Intermediate','Hard') DEFAULT NULL,
                                            `learningMaterialRefNo` int(10) unsigned NOT NULL,
                                            PRIMARY KEY (`tempRefNo`),
                                            KEY `learningMaterialRefNo` (`learningMaterialRefNo`),
                                            CONSTRAINT `template_ibfk_1` FOREIGN KEY (`learningMaterialRefNo`) REFERENCES `learningmaterial` (`learningMaterialRefNo`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
