<?php
global $conn;

/**
 * =================================================================
 *  DATABASE SEEDING SCRIPT (V2)
 * =================================================================
 *  - Populates core tables: school, users, roles, subjects, etc.
 *  - Excludes: module, learningcontent, assessment, and related tables.
 *  - Reads CSV data defined directly in this file.
 *  - Uses functions from dataentry.php.
 *  - Runs everything in a single transaction for safety.
 *
 *  INSTRUCTIONS:
 *  1. Fill in the CSV data blocks below.
 *  2. The first line of each CSV block is a header for reference and is SKIPPED.
 *  3. The order of columns MUST match the function arguments in dataentry.php.
 *  4. Run this script ONCE, then DELETE IT.
 * =================================================================
 */

// Turn on error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Use the functions and database connection from your existing file
require_once 'dataentry.php';

echo "<style>body { font-family: monospace, sans-serif; line-height: 1.6; } h1, h2 { color: #0056b3; } .ok { color: green; } .error { color: red; font-weight: bold; border: 1px solid red; padding: 10px; } .info { color: blue; } .warn { font-weight: bold; color: #856404; background-color: #fff3cd; border: 1px solid #ffeeba; padding: 15px; margin-top: 20px; } </style>";
echo "<h1>Database Population Script</h1>";

// =================================================================
// 1. DEFINE YOUR CSV DATA HERE
// =================================================================

$schoolCsv = <<<CSV
schoolName,shortName,schoolIdNo,emailAddress,schoolType,contactNo,locAddress,region,adminUserName
"San Roque Central Elementary School","SRCES",555555,"official@srces.edu.ph","Public Elementary School","09111111111","Bo. Obrero, Lacson St, Davao","Region XI","admin0"
"Davao City National High School","DCNHS",123456,"official@dcnhs.edu.ph","Public Integrated School","09222222222","F. Torres St, Davao","Region XI","cityhigh_admin"
CSV;

// Special Columns for Lookup:
// - schoolIdNo: Used to find the school's auto-generated RefNo.
// - accCreatorUsername: The username of the user who created this account. 'system' means no creator.
$usersCsv = <<<CSV
schoolIdNo,firstName,lastName,dob,emailAddress,contactNo,username,rawPassword,accCreatorUsername,accType
555555,"Kyla","Maniscan","2003-11-04","kjvmaniscan00221@usep.edu.ph","09111111112","admin0","password123","system","School Administrator"
123456,"Juan","Dela Cruz","1980-01-01","admin@dcnhs.ph","09333333333","cityhigh_admin","password123","system","School Administrator"
555555,"Session","Cookies","1999-08-04","educator1@srces.edu.ph","09000000002","educator1","password123","admin0","Educator"
555555,"Jennie","Kim","2020-05-09","jennie.kim@student.ph","09456787954","student_jennie","password123","admin0","Student"
555555,"Caleb","Klaus","2020-05-07","caleb.klaus@student.ph","09787878787","student_caleb","password123","admin0","Student"
CSV;

// Special Column for Lookup:
// - username: Used to find the user's auto-generated AccRefNo.
$schoolAdminsCsv = <<<CSV
username,schoolIdNo,fullName,adEmpIdNo
admin0,555555,"Kyla Maniscan",5555551
cityhigh_admin,123456,"Juan Dela Cruz",1234561
CSV;

$educatorsCsv = <<<CSV
username,schoolIdNo,fullName,edEmpIdNo
educator1,555555,"Session Cookies",5555553
CSV;

$studentsCsv = <<<CSV
username,schoolIdNo,lrn,fullName,parentGuardianName,pgRStoStudent,pgDOB,pgMaritalStatus,pgEmailAdd,pgContactNo
student_jennie,555555,"789789789789","Jennie Kim","Why Ano","Guardian","1999-08-05","Married","married@guardian.wow","09088754621"
student_caleb,555555,"987987987852","Caleb Klaus","Ice Cream","Guardian","1999-08-09","Married","married@guard.an","09085468521"
CSV;

// Special Columns for Lookup:
// - adminCreatorUsername / assignedEducatorUsername: Usernames used to find the AccRefNo.
// - schoolIdNo: Used to find the School ID.
$subjectsCsv = <<<CSV
subjectIdNo,subjTitle,subjDescription,mtLanguage,adminCreatorUsername,assignedEducatorUsername,schoolIdNo
7897891,"GR1 - Pulong sa Lihok","Pagtudlo sa mga bata.","Cebuano","admin0","educator1",555555
7897892,"GR2 - Paghisunod sa mga Panghitabo","Pagtudlo sa mga estudyante.","Bisaya","admin0","educator1",555555
CSV;

// Special Columns for Lookup:
// - subjectIdNo: Used to find the Subject's auto-generated RefNo.
$learningMaterialsCsv = <<<CSV
subjectIdNo,chapterNo,title,description,lmNo,lmType,diffLevel,schoolIdNo,sourceRef
7897891,1,"Text and Media","Add up to 4 image files and text for each lesson.",1,"Learning Module","Easy",555555,""
7897892,2,"Quest to Learn","Gamified, story-driven questions for knowledge checks.",1,"Learning Assessment","Intermediate",555555,""
CSV;

// Special Columns for Lookup:
// - schoolIdNo, lmNo: A unique combination to identify the Learning Material and find its RefNo.
$templatesCsv = <<<CSV
schoolIdNo,lmNo,tempName,tempDescription,tempType,diffLevel
555555,1,"Module - 01","Text and Media: Add up to 4 image files and text for each lesson.","Learning Module","Easy"
555555,1,"Assessment - 01","Quest to Learn: Gamified, story-driven questions for knowledge checks.","Learning Assessment","Intermediate"
CSV;

// Special Columns for Lookup:
// - subjectIdNo: Used to find the Subject's RefNo.
// - assignedEducatorUsername: Used to find the Educator's AccRefNo.
// - studentUsername: Used to find the Student's AccRefNo.
$enrollmentsCsv = <<<CSV
subjectIdNo,assignedEducatorUsername,studentUsername
7897891,"educator1","student_jennie"
7897891,"educator1","student_caleb"
7897892,"educator1","student_jennie"
CSV;


// =================================================================
// 2. SCRIPT LOGIC (DO NOT EDIT BELOW)
// =================================================================

function parseCsvString(string $csvString): array {
    $lines = explode("\n", trim($csvString));
    array_shift($lines); // Remove header
    return array_filter($lines);
}

// Maps for tracking newly created database IDs
$schoolIdToRefNoMap = [];
$usernameToAccRefNoMap = ['system' => 0]; // Special case for system-generated items
$subjectIdToRefNoMap = [];
$lmIdentifierToRefNoMap = []; // Key: "schoolId-lmNo", Value: lmRefNo
$lmIdentifierToTemplateRefNoMap = []; // Key: "schoolId-lmNo", Value: tempRefNo

// -------- START THE TRANSACTION --------
$conn->begin_transaction();
echo "<h2><span class='info'>Starting Database Seeding...</span></h2>";

try {
    // --- 1. Process Schools ---
    echo "<b>Processing Schools...</b><br>";
    foreach (parseCsvString($schoolCsv) as $line) {
        $data = str_getcsv($line);
        $schoolIdNo = $data[2];
        $newSchoolRefNo = addEducationalInstitution($conn, ...$data);
        if ($newSchoolRefNo === false) throw new Exception("Failed to add school: " . $data[0]);
        $schoolIdToRefNoMap[$schoolIdNo] = $newSchoolRefNo;
    }
    echo "<span class='ok'>✔ Schools processed.</span><br><br>";

    // --- 2. Process Users ---
    echo "<b>Processing Users...</b><br>";
    foreach (parseCsvString($usersCsv) as $line) {
        $data = str_getcsv($line);
        [$schoolIdNo, $firstName, $lastName, $dob, $emailAddress, $contactNo, $username, $rawPassword, $accCreatorUsername, $accType] = $data;

        // Look up the real database IDs
        $schoolRefNo = $schoolIdToRefNoMap[$schoolIdNo] ?? null;
        $accCreatorAccRefNo = $usernameToAccRefNoMap[$accCreatorUsername] ?? null;
        if ($schoolRefNo === null) throw new Exception("School ID $schoolIdNo not found for user $username");
        if ($accCreatorAccRefNo === null) throw new Exception("Creator username $accCreatorUsername not found for user $username");

        $newAccRefNo = addUser($conn, $schoolRefNo, $firstName, $lastName, $dob, $emailAddress, $contactNo, $username, $rawPassword, $accCreatorAccRefNo, $accType);
        if ($newAccRefNo === false) throw new Exception("Failed to add user: $username");
        $usernameToAccRefNoMap[$username] = $newAccRefNo;
    }
    echo "<span class='ok'>✔ Users processed.</span><br><br>";

    // --- 3. Process Roles (Admins, Educators, Students) ---
    echo "<b>Processing Roles...</b><br>";
    foreach (parseCsvString($schoolAdminsCsv) as $line) {
        $data = str_getcsv($line);
        [$username, $schoolIdNo, $fullName, $adEmpIdNo] = $data;
        $accRefNo = $usernameToAccRefNoMap[$username] ?? null;
        if ($accRefNo === null) throw new Exception("User $username not found for Admin role.");
        if (addSchoolAdministrator($conn, $accRefNo, $schoolIdNo, $fullName, $adEmpIdNo) === false) throw new Exception("Failed to add admin role for $username.");
    }
    foreach (parseCsvString($educatorsCsv) as $line) {
        $data = str_getcsv($line);
        [$username, $schoolIdNo, $fullName, $edEmpIdNo] = $data;
        $accRefNo = $usernameToAccRefNoMap[$username] ?? null;
        if ($accRefNo === null) throw new Exception("User $username not found for Educator role.");
        if (addEducator($conn, $accRefNo, $schoolIdNo, $fullName, $edEmpIdNo) === false) throw new Exception("Failed to add educator role for $username.");
    }
    foreach (parseCsvString($studentsCsv) as $line) {
        $data = str_getcsv($line);
        $username = $data[0];
        $accRefNo = $usernameToAccRefNoMap[$username] ?? null;
        if ($accRefNo === null) throw new Exception("User $username not found for Student role.");
        array_splice($data, 0, 1, [$accRefNo]); // Replace username with accRefNo
        if (addStudent($conn, ...$data) === false) throw new Exception("Failed to add student role for $username.");
    }
    echo "<span class='ok'>✔ Roles processed.</span><br><br>";

    // --- 4. Process Subjects ---
    echo "<b>Processing Subjects...</b><br>";
    foreach(parseCsvString($subjectsCsv) as $line) {
        $data = str_getcsv($line);
        [$subjectIdNo, $subjTitle, $subjDescription, $mtLanguage, $adminCreatorUsername, $assignedEducatorUsername, $schoolIdNo] = $data;
        $adminCreatorAccRefNo = $usernameToAccRefNoMap[$adminCreatorUsername] ?? null;
        $assignedEducatorAccRefNo = $usernameToAccRefNoMap[$assignedEducatorUsername] ?? null;

        if ($adminCreatorAccRefNo === null) throw new Exception("Admin creator $adminCreatorUsername not found for subject $subjTitle.");

        $newSubjectRefNo = addSubject($conn, $subjectIdNo, $subjTitle, $subjDescription, $mtLanguage, $adminCreatorAccRefNo, $assignedEducatorAccRefNo, $schoolIdNo);
        if ($newSubjectRefNo === false) throw new Exception("Failed to add subject: $subjTitle");
        $subjectIdToRefNoMap[$subjectIdNo] = $newSubjectRefNo;
    }
    echo "<span class='ok'>✔ Subjects processed.</span><br><br>";

    // --- 5. Process Learning Materials ---
    echo "<b>Processing Learning Materials...</b><br>";
    foreach(parseCsvString($learningMaterialsCsv) as $line) {
        $data = str_getcsv($line);
        $subjectIdNo = $data[0];
        $schoolIdNo = $data[7];
        $lmNo = $data[4];

        $subjectRefNo = $subjectIdToRefNoMap[$subjectIdNo] ?? null;
        if ($subjectRefNo === null) throw new Exception("Subject ID $subjectIdNo not found for Learning Material.");

        array_splice($data, 0, 1, [$subjectRefNo]); // Replace subjectIdNo with subjectRefNo
        $newLmRefNo = addLearningMaterial($conn, ...$data);
        if ($newLmRefNo === false) throw new Exception("Failed to add Learning Material: " . $data[2]); // Title
        $lmIdentifierToRefNoMap["{$schoolIdNo}-{$lmNo}"] = $newLmRefNo;
    }
    echo "<span class='ok'>✔ Learning Materials processed.</span><br><br>";

    // --- 6. Process Templates ---
    echo "<b>Processing Templates...</b><br>";
    foreach(parseCsvString($templatesCsv) as $line) {
        $data = str_getcsv($line);
        $schoolIdNo = $data[0];
        $lmNo = $data[1];

        $lmIdentifier = "{$schoolIdNo}-{$lmNo}";
        $learningMaterialRefNo = $lmIdentifierToRefNoMap[$lmIdentifier] ?? null;
        if ($learningMaterialRefNo === null) throw new Exception("Learning Material ID $lmIdentifier not found for Template.");

        array_splice($data, 0, 2, []); // Remove schoolIdNo and lmNo from data array
        array_push($data, $learningMaterialRefNo); // Add the real learningMaterialRefNo to the end

        $newTempRefNo = createTemplateForLearningMaterial($conn, ...$data);
        if ($newTempRefNo === false) throw new Exception("Failed to add Template: " . $data[0]); // Temp Name
        $lmIdentifierToTemplateRefNoMap[$lmIdentifier] = $newTempRefNo;
    }
    echo "<span class='ok'>✔ Templates processed.</span><br><br>";

    // --- 7. Process Enrollments ---
    echo "<b>Processing Enrollments...</b><br>";
    foreach (parseCsvString($enrollmentsCsv) as $line) {
        $data = str_getcsv($line);
        [$subjectIdNo, $assignedEducatorUsername, $studentUsername] = $data;

        $subjectRefNo = $subjectIdToRefNoMap[$subjectIdNo] ?? null;
        $educatorAccRefNo = $usernameToAccRefNoMap[$assignedEducatorUsername] ?? null;
        $studentAccRefNo = $usernameToAccRefNoMap[$studentUsername] ?? null;

        if ($subjectRefNo === null) throw new Exception("Subject ID $subjectIdNo not found for enrollment.");
        if ($educatorAccRefNo === null) throw new Exception("Educator $assignedEducatorUsername not found for enrollment.");
        if ($studentAccRefNo === null) throw new Exception("Student $studentUsername not found for enrollment.");

        if (enrollStudentInSubject($conn, $subjectRefNo, $educatorAccRefNo, $studentAccRefNo) === false) {
            throw new Exception("Failed to enroll student $studentUsername in subject $subjectIdNo.");
        }
    }
    echo "<span class='ok'>✔ Enrollments processed.</span><br><br>";


    // -------- COMMIT THE TRANSACTION --------
    $conn->commit();
    echo "<h2><span class='ok'>✔✔✔ ALL DATA POPULATED SUCCESSFULLY! ✔✔✔</span></h2>";
    echo "<div class='warn'>CRITICAL: Please delete this script (<code>" . htmlspecialchars(basename(__FILE__)) . "</code>) from your server NOW.</div>";

} catch (Exception $e) {
    // -------- ROLLBACK ON FAILURE --------
    $conn->rollback();
    echo "<div class='error'>AN ERROR OCCURRED: " . $e->getMessage() . "<br>TRANSACTION ROLLED BACK. No data was saved to the database.</div>";
}

?>