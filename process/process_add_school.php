<?php
$servername = "localhost";
$username = "root";
$password = "";       // Your MySQL password, if any
$dbname = "mtbmaldb"; // The database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // In a real application, log this error and show a user-friendly message
    die("Connection failed: " . $conn->connect_error);
}

// --- Form Submission Handling ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Retrieve data from POST superglobal
    //    Apply basic sanitization (trim whitespace)
    $schoolName    = trim($_POST['schoolName']);
    $shortName     = trim($_POST['shortName']);
    $schoolIdNo    = trim($_POST['schoolIdNo']);
    $emailAddress  = trim($_POST['emailAddress']);
    $schoolType    = trim($_POST['schoolType']);
    $contactNo     = trim($_POST['contactNo']);
    $locAddress    = trim($_POST['locAddress']);
    $region        = trim($_POST['region']);
    $adminUserName = trim($_POST['adminUserName']);

    // 2. Validate Data (Server-Side Validation is CRITICAL)
    $errors = [];
    if (empty($schoolName)) {
        $errors[] = "School Name is required.";
    }
    if (empty($shortName)) {
        $errors[] = "Short Name is required.";
    }
    if (empty($schoolIdNo) || !filter_var($schoolIdNo, FILTER_VALIDATE_INT) || strlen($schoolIdNo) != 6) {
        $errors[] = "School ID No must be a 6-digit number.";
    }
    if (empty($emailAddress) || !filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid Email Address is required.";
    }
    $validSchoolTypes = ['Public Integrated School', 'Private Integrated School', 'Private Elementary School', 'Public Elementary School'];
    if (empty($schoolType) || !in_array($schoolType, $validSchoolTypes)) {
        $errors[] = "Invalid School Type selected.";
    }
    if (empty($contactNo) || !preg_match('/^[0-9]{11,12}$/', $contactNo)) {
        $errors[] = "Contact No must be 11 or 12 digits.";
    }
    if (empty($locAddress)) {
        $errors[] = "Location Address is required.";
    }
    if (empty($region)) {
        $errors[] = "Region is required.";
    }
    if (empty($adminUserName)) {
        $errors[] = "Administrator Username is required.";
    }
    // You should also check for uniqueness for fields like emailAddress, schoolIdNo, adminUserName
    // by querying the database before attempting to insert. This is more complex.
    // For now, we'll rely on DB constraints, but ideally, you'd check first.

    if (!empty($errors)) {
        // If there are errors, redirect back to the form with error messages
        // (or display them on this page)
        $errorString = implode("<br>", $errors);
        header("Location: add_school_form.php?status=error&message=" . urlencode($errorString));
        exit();
    }

    // 3. Prepare SQL Statement (Using Prepared Statements to prevent SQL Injection)
    $sql = "INSERT INTO school (schoolName, shortName, schoolIdNo, emailAddress, schoolType, contactNo, locAddress, region, adminUserName)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Handle prepare error
        // In production, log $conn->error and show a generic message
        header("Location: add_school_form.php?status=error&message=" . urlencode("Database prepare error: " . $conn->error));
        exit();
    }

    // 4. Bind parameters
    // 'ssissssss' defines the types of the parameters:
    // s - string
    // i - integer
    // d - double
    // b - blob
    $stmt->bind_param("ssissssss",
        $schoolName,
        $shortName,
        $schoolIdNo,    // This will be cast to int by bind_param if it's a numeric string
        $emailAddress,
        $schoolType,
        $contactNo,
        $locAddress,
        $region,
        $adminUserName
    );

    // 5. Execute the statement
    if ($stmt->execute()) {
        // Success! Redirect to the form page with a success message
        header("Location: add_school_form.php?status=success");
        exit();
    } else {
        // Error during execution
        // Check for specific errors, e.g., duplicate entry
        $errorMessage = "Error inserting record: " . $stmt->error;
        if ($conn->errno == 1062) { // Error code for duplicate entry
            $errorMessage = "Error: Duplicate entry. School ID, Email, Contact No, or Admin Username might already exist.";
        }
        header("Location: add_school_form.php?status=error&message=" . urlencode($errorMessage));
        exit();
    }

    // 6. Close statement
    $stmt->close();

} else {
    // Not a POST request, redirect to form or show an error
    header("Location: add_school_form.php");
    exit();
}

// 7. Close connection
$conn->close();
?>