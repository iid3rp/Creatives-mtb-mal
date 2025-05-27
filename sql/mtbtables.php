<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mtbmaldb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// sql to create SCHOOL table
$sqlschool = "CREATE TABLE IF NOT EXISTS school (
    schoolRefNo INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    schoolName TINYTEXT NOT NULL,
    shortName VARCHAR(155) NOT NULL,
    schoolIdNo INT(6) UNSIGNED NOT NULL UNIQUE,
    emailAddress VARCHAR(50) NOT NULL UNIQUE,
    schoolType ENUM ('Public Integrated School', 'Private Integrated School', 'Private Elementary School', 'Public Elementary School'),
    contactNo VARCHAR(12) NOT NULL UNIQUE,
    locAddress VARCHAR(70) NOT NULL,
    region VARCHAR(30) NOT NULL,
    adminUserName VARCHAR(15) NOT NULL UNIQUE,
    regDateTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sqlschool) === TRUE) 
    echo "Table for Schools created successfully";
else
    echo "Error creating table: " . $conn->error;


// sql to create MTB USERS table <accRefNo to be shown after complete registration>
$sqlusers = "CREATE TABLE IF NOT EXISTS mtbmalusers (
    accRefNo INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    schoolRefNo INT(10) UNSIGNED NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    dob DATE NOT NULL,
    emailAddress VARCHAR(50) NOT NULL UNIQUE,
    contactNo VARCHAR(12) NOT NULL UNIQUE,
    username VARCHAR(15) NOT NULL UNIQUE,
    password VARCHAR(30) NOT NULL,
    accCreator INT(10) UNSIGNED NOT NULL,
    accType ENUM ('School Administrator', 'Educator', 'Student'),
    regDateTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (schoolRefNo) REFERENCES school(schoolRefNo) ON DELETE CASCADE
)";

if ($conn->query($sqlusers) === TRUE) 
    echo "<br>" . "Table for MTB-MAL Users created successfully.";
else
    echo "Error creating table: " . $conn->error;


// sql to create SCHOOL ADMINISTRATOR table
$sqladmin = "CREATE TABLE IF NOT EXISTS schooladministrator (
    adminId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    accRefNo INT(10) UNSIGNED NOT NULL,
    schoolIdNo INT(6) UNSIGNED NOT NULL,
    fullName VARCHAR(70) NOT NULL,
    FOREIGN KEY (accRefNo) REFERENCES mtbmalusers(accRefNo) ON DELETE RESTRICT,
    FOREIGN KEY (schoolIdNo) REFERENCES school(schoolIdNo) ON DELETE CASCADE    
)";

if ($conn->query($sqladmin) === TRUE) 
    echo "<br>" . "Table School Administrator created successfully";
else
    echo "Error creating table: " . $conn->error;


// sql to create EDUCATOR table
$sqleducator = "CREATE TABLE IF NOT EXISTS educator (
    educatorId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    accRefNo INT(10) UNSIGNED NOT NULL,
    schoolIdNo INT(6) UNSIGNED NOT NULL,
    fullName VARCHAR(70) NOT NULL, 
    FOREIGN KEY (accRefNo) REFERENCES mtbmalusers(accRefNo) ON DELETE RESTRICT,
    FOREIGN KEY (schoolIdNo) REFERENCES school(schoolIdNo) ON DELETE CASCADE
)";

if ($conn->query($sqleducator) === TRUE) 
    echo "<br>" . "Table for Educators created successfully.";
else
    echo "Error creating table: " . $conn->error;


// sql to create STUDENT table
$sqlstudent = "CREATE TABLE IF NOT EXISTS student (
    studentId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    accRefNo INT(10) UNSIGNED NOT NULL,
    schoolIdNo INT(6) UNSIGNED NOT NULL,
    fullName VARCHAR(70) NOT NULL, 
    parentGuardianName VARCHAR(70) NOT NULL,
    pgRStoStudent ENUM ('Father', 'Mother', 'Guardian', 'Sibling', 'Close Relative'),
    pgDOB DATE,
    pgMaritalStatus VARCHAR(15) NOT NULL,
    pgEmailAdd VARCHAR(30) NOT NULL, 
    pgContactNo VARCHAR(12) NOT NULL,
    FOREIGN KEY (accRefNo) REFERENCES mtbmalusers(accRefNo) ON DELETE RESTRICT,
    FOREIGN KEY (schoolIdNo) REFERENCES school(schoolIdNo) ON DELETE CASCADE
)";

if ($conn->query($sqlstudent) === TRUE) 
    echo "<br>" . "Table for Student created successfully.";
else
    echo "Error creating table: " . $conn->error;


// sql to create SUBJECT table
$sqlsubject = "CREATE TABLE IF NOT EXISTS subject (
    subjectRefNo INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    subjTitle VARCHAR(155) NOT NULL,
    subjDescription TEXT NOT NULL,
    mtLanguage VARCHAR(30) NOT NULL,
    adminCreator INT(6) UNSIGNED NOT NULL,
    assignedEducator INT(6) UNSIGNED NULL,
    schoolIdNo INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (adminCreator) REFERENCES schooladministrator(adminId) ON DELETE RESTRICT,
    FOREIGN KEY (assignedEducator) REFERENCES educator(educatorId) ON DELETE SET NULL,
    FOREIGN KEY (schoolIdNo) REFERENCES school(schoolIdNo) ON DELETE CASCADE 
)";

if ($conn->query($sqlsubject) === TRUE) 
    echo "<br>" . "Table for Subject created successfully.";
else
    echo "Error creating table: " . $conn->error;

// Close the database connection
$conn->close();
?>
