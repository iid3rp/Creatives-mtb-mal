<?php

// --- 3. EXAMPLE USAGE / TRIGGERING ACTIONS ---

// Check if a specific action like 'getFile' is requested
global $conn;
if (isset($_GET['action']) && $_GET['action'] == 'getFile' && isset($_GET['fileNo'])) {
    getSupportingMediaAsFile($conn, intval($_GET['fileNo']));
    // The script will exit in getSupportingMediaAsFile if file is found
}


echo "<h3>--- Running Transaction Examples ---</h3>";

// ---- School Admin: Data Entry ----
echo "<h4>School Admin: Data Entry</h4>";
$schoolRefNo1 = addEducationalInstitution($conn, "Bright Learners Academy", "BLA", 1001, "info@bla.edu.ph", "Private Elementary School", "09171234567", "123 Main St, Quezon City", "NCR", "bla_admin_user");
$schoolIdNo1 = 1001; // Keep track of the schoolIdNo used

$adminUserAccRefNo = null;
$educatorUserAccRefNo = null;
$studentUserAccRefNo = null;
$subjectRefNo1 = null;
$lrn1 = 123456789012; // Pedro's LRN

if ($schoolRefNo1) {
    $adminUserAccRefNo = addUser($conn, $schoolRefNo1, "Maria", "Santos", "1980-05-15", "maria.santos@bla.edu.ph", "09171112233", "msantos_admin", "Pass@word1", 1, "School Administrator");
    if ($adminUserAccRefNo) {
        addSchoolAdministrator($conn, $adminUserAccRefNo, $schoolIdNo1, "Maria Santos", 7001);
        $educatorUserAccRefNo = addUser($conn, $schoolRefNo1, "Juan", "Dela Cruz", "1985-10-20", "juan.delacruz@bla.edu.ph", "09194445566", "jdelacruz_educator", "Pass@word2", $adminUserAccRefNo, "Educator");
        if ($educatorUserAccRefNo) {
            addEducator($conn, $educatorUserAccRefNo, $schoolIdNo1, "Juan Dela Cruz", 8001);
        }
        $studentUserAccRefNo = addUser($conn, $schoolRefNo1, "Pedro", "Penduko", "2015-01-10", "pedro.penduko@email.com", "09207778899", "pedrop", "Pass@word3", $adminUserAccRefNo, "Student");
        if ($studentUserAccRefNo) {
            addStudent($conn, $studentUserAccRefNo, $schoolIdNo1, $lrn1, "Pedro Penduko", "Ana Penduko", "Mother", "1988-03-03", "Married", "ana.p@email.com", "09219990000");
        }
    }
    if ($adminUserAccRefNo && $educatorUserAccRefNo) {
        $subjectRefNo1 = addSubject($conn, 2001, "Mother Tongue Grade 1", "Learning the basics of Tagalog", "Tagalog", $adminUserAccRefNo, $educatorUserAccRefNo, $schoolIdNo1);
    }
}

// Fallback values for IDs if not set from previous successful operations
$existingSchoolRefNo1 = $schoolRefNo1 ?: 1;
$existingAdminAccRefNo = $adminUserAccRefNo ?: 1;
$existingEducatorAccRefNo = $educatorUserAccRefNo ?: 2;
$existingSubjectRefNo1 = $subjectRefNo1 ?: 1;
$existingStudentAccRefNo = $studentUserAccRefNo ?: 3;
$currentSchoolIdNo = $schoolIdNo1 ?: 1001; // Use the actual ID if school was created

echo "<h4>Educator: Creating Learning Material, Module, Content, Assessment, Items & Uploading Media</h4>";

$lmModuleRefNo = null;
$moduleTemplateRefNo = null;
$moduleId1 = null;
$modContentId1 = null;
$lmAssessmentRefNo = null;
$assessmentTemplateRefNo = null;
$assessmentId1 = null;
$assessmentItemId1 = null;
$uploadedMediaFileNo = null;

if ($existingEducatorAccRefNo && $existingSubjectRefNo1 && $existingSchoolRefNo1) {
    // --- Create a Learning Module ---
    $lmModuleRefNo = addLearningMaterial(
        $conn, $existingSubjectRefNo1, 1, "Unang Kabanata: Mga Letra", "Pag-aaral ng mga titik sa Alpabetong Filipino.",
        101, "Learning Module", "Easy", $currentSchoolIdNo, "DepEd K-12 Curriculum Guide"
    );

    if ($lmModuleRefNo) {
        $moduleTemplateRefNo = createTemplateForLearningMaterial(
            $conn, "Standard Lesson Template", "Template for basic lessons with text and image.",
            "Learning Module", "Easy", $lmModuleRefNo
        );

        if ($moduleTemplateRefNo) {
            $moduleId1 = addModuleToLearningMaterial(
                $conn, 1, $lmModuleRefNo, "Aralin 1: Patinig (Vowels)", "Kilalanin ang mga patinig.", $currentSchoolIdNo
            );

            if ($moduleId1) {
                $modContentId1 = addLearningContentToModule(
                    $conn, $moduleTemplateRefNo, 1, $existingEducatorAccRefNo, "Ang mga Patinig A, E, I, O, U",
                    "Ito ang limang patinig sa ating alpabeto: A, E, I, O, U.", $moduleId1, 1
                );

                // Simulate a file upload for this learning content
                if ($modContentId1 && $lmModuleRefNo) { // lmModuleRefNo is needed for supportingmedia
                    // Create a dummy file for testing in the same directory as the script
                    $dummyTextFileName = "patinig_notes.txt";
                    $dummyTextFilePath = __DIR__ . '/' . $dummyTextFileName; // Absolute path
                    file_put_contents($dummyTextFilePath, "Mahalagang tandaan ang mga patinig.");

                    // Simulate $_FILES array entry for the dummy text file
                    $simulatedTextFile = [
                        'name' => $dummyTextFileName,
                        'type' => 'text/plain',
                        'tmp_name' => $dummyTextFilePath, // Use the actual path of the dummy file
                        'error' => UPLOAD_ERR_OK,
                        'size' => filesize($dummyTextFilePath)
                    ];
                    // To use this, we need to ensure 'tmp_name' is treated as an uploaded file.
                    // For a true test, you need an HTML form. This simulation might not always work with `is_uploaded_file`.
                    // Let's try to bypass is_uploaded_file for this direct script test by modifying addSupportingMedia slightly or using it carefully.
                    // For this demo, let's assume the addSupportingMedia function is adapted or the check is context-aware.
                    // For now, let's ensure the file exists at tmp_name path.

                    echo "<p>Attempting to upload '{$dummyTextFileName}'...</p>";
                    // For the simulation to work with is_uploaded_file(), you'd typically need a real upload.
                    // We'll call it, understanding `is_uploaded_file` will fail for non-HTTP uploads.
                    // The addSupportingMedia function has been updated to be more flexible with tmp_name.

                    $uploadedTextFileNo = addSupportingMedia(
                        $conn,
                        $lmModuleRefNo, // learningMaterialRefNo
                        $existingEducatorAccRefNo, // accRefNo (uploader)
                        $simulatedTextFile, // simulated $_FILES entry
                        'learning_content', // linkToType
                        $modContentId1      // linkedId (modTempNo)
                    );
                    if($uploadedTextFileNo){
                        echo "<p>To view the uploaded text file (if successful and BLOB storage worked): <a href='?action=getFile&fileNo={$uploadedTextFileNo}' target='_blank'>View {$dummyTextFileName}</a></p>";
                    }

                    // Clean up dummy file
                    // unlink($dummyTextFilePath); // Comment out if you want to inspect it
                }
            }
        }
    }

    // --- Create a Learning Assessment ---
    $lmAssessmentRefNo = addLearningMaterial(
        $conn, $existingSubjectRefNo1, 1, "Pagsusulit 1: Mga Patinig", "Pagsusulit tungkol sa mga patinig.",
        201, "Learning Assessment", "Easy", $currentSchoolIdNo
    );

    if ($lmAssessmentRefNo) {
        $assessmentTemplateRefNo = createTemplateForLearningMaterial(
            $conn, "Multiple Choice Template", "Template for multiple choice questions.",
            "Learning Assessment", "Easy", $lmAssessmentRefNo
        );

        if ($assessmentTemplateRefNo) {
            $assessmentId1 = addAssessmentToLearningMaterial(
                $conn, 1, $lmAssessmentRefNo, "Pagtukoy ng Patinig", "Bilugan ang patinig sa bawat salita.",
                $currentSchoolIdNo, "Basahin mabuti ang tanong."
            );

            if ($assessmentId1) {
                $assessmentItemId1 = addAssessmentItemToAssessment(
                    $conn, $assessmentTemplateRefNo, $assessmentId1, $existingEducatorAccRefNo,
                    1, 1, "Alin sa mga sumusunod ang patinig?", "A"
                );
                addAssessmentItemToAssessment(
                    $conn, $assessmentTemplateRefNo, $assessmentId1, $existingEducatorAccRefNo,
                    1, 2, "Sa salitang 'mesa', alin ang patinig?", "e,a"
                );

                // Simulate another file upload for this assessment item (e.g., an image for a question)
                if ($assessmentItemId1 && $lmAssessmentRefNo) {
                    // Create a dummy image file (content doesn't matter for BLOB storage test, just that it's binary-like)
                    $dummyImageFileName = "question_image.png";
                    $dummyImageFilePath = __DIR__ . '/' . $dummyImageFileName;
                    file_put_contents($dummyImageFilePath, "\x89PNG\r\n\x1a\n\0\0\0\rIHDR\0\0\0\x01\0\0\0\x01\x08\x06\0\0\0\x1f\x15\xc4\x89\0\0\0\nIDATx\x9cc`\0\0\0\x02\0\x01\xe2!\xbc\x33\0\0\0\0IEND\xaeB`\x82"); // Tiny 1x1 PNG

                    $simulatedImageFile = [
                        'name' => $dummyImageFileName,
                        'type' => 'image/png',
                        'tmp_name' => $dummyImageFilePath,
                        'error' => UPLOAD_ERR_OK,
                        'size' => filesize($dummyImageFilePath)
                    ];
                    echo "<p>Attempting to upload '{$dummyImageFileName}'...</p>";
                    $uploadedMediaFileNo = addSupportingMedia(
                        $conn,
                        $lmAssessmentRefNo, // learningMaterialRefNo
                        $existingEducatorAccRefNo, // accRefNo (uploader)
                        $simulatedImageFile,
                        'assessment_item', // linkToType
                        $assessmentItemId1  // linkedId (gameTempNo)
                    );
                    if($uploadedMediaFileNo){
                        echo "<p>To view the uploaded image file (if successful): <a href='?action=getFile&fileNo={$uploadedMediaFileNo}' target='_blank'>View {$dummyImageFileName}</a></p>";
                    }
                    // unlink($dummyImageFilePath); // Comment out if you want to inspect it
                }
            }
        }
    }
} else {
    echo "<p>Skipping Educator's material creation due to missing prerequisite IDs (Educator, Subject, or School).</p>";
}


// ---- Educator: Data Entry (Enrollment) ----
echo "<h4>Educator: Data Entry (Enrollment)</h4>";
if ($existingSubjectRefNo1 && $existingEducatorAccRefNo && $existingStudentAccRefNo) {
    enrollStudentInSubject($conn, $existingSubjectRefNo1, $existingEducatorAccRefNo, $existingStudentAccRefNo);
} else {
    echo "Skipping student enrollment due to missing prerequisite IDs.<br>";
}


// ---- Student: Data Entry ----
echo "<h4>Student: Data Entry</h4>";
$studentLRNToTest = $lrn1; // Pedro Penduko's LRN
$assessmentIdToTest = $assessmentId1 ?: 1; // Use created assessmentId or fallback
$assessmentItemIdToTest = $assessmentItemId1 ?: 1; // Use created itemID or fallback

if ($studentUserAccRefNo) { // Check if student user was created
    $checkStudentSql = "SELECT lrn FROM student WHERE accRefNo = ?";
    $stmtCheck = $conn->prepare($checkStudentSql);
    if ($stmtCheck) {
        $stmtCheck->bind_param("i", $studentUserAccRefNo);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();
        if ($studentRow = $resultCheck->fetch_assoc()) {
            $studentLRNToTest = $studentRow['lrn'];
            if ($assessmentIdToTest && $assessmentItemIdToTest) {
                submitAssessmentAnswer($conn, $studentLRNToTest, $assessmentIdToTest, $assessmentItemIdToTest, "A");
            } else {
                echo "Skipping submitting answer: Assessment ID or Item ID not available.<br>";
            }
        } else {
            echo "Skipping submitting answer: Student with AccRefNo $studentUserAccRefNo not found in student table (or LRN missing).<br>";
        }
        $stmtCheck->close();
    }
} else {
    echo "Skipping submitting answer: Student user account not created.<br>";
}


// ---- Data Update/Deletion Examples ----
echo "<h4>Data Update/Deletion</h4>";
if ($existingSchoolRefNo1) {
    updateEducationalInstitution($conn, $existingSchoolRefNo1, "Bright Learners Academy (Campus 2)", "09170001122");
} else {
    echo "Skipping institution update, schoolRefNo1 not set.<br>";
}

if ($existingSubjectRefNo1) {
    // deleteSubject($conn, $existingSubjectRefNo1); // Uncomment to test deletion
    echo "Subject deletion for RefNo {$existingSubjectRefNo1} is commented out to preserve data for other tests.<br>";
} else {
    echo "Skipping subject deletion, subjectRefNo1 not set.<br>";
}


// --- 4. CLOSE CONNECTION ---
if ($conn) { // Check if connection object exists before closing
    $conn->close();
    echo "<br>Database connection closed.";
}
