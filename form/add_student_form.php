<?php
// For populating the school dropdown
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL password
$dbname = "mtbmaldb";

$schools = [];
$school_fetch_error = null;

$conn_form = new mysqli($servername, $username, $password, $dbname);
if ($conn_form->connect_error) {
    $school_fetch_error = "Error connecting to database to fetch schools: " . $conn_form->connect_error;
} else {
    $sql_schools = "SELECT schoolRefNo, schoolIdNo, schoolName FROM school ORDER BY schoolName ASC";
    $result_schools = $conn_form->query($sql_schools);
    if ($result_schools && $result_schools->num_rows > 0) {
        while ($row = $result_schools->fetch_assoc()) {
            $schools[] = $row;
        }
    } elseif (!$result_schools) {
        $school_fetch_error = "Error fetching schools: " . $conn_form->error;
    }
    $conn_form->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll New Student</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2, h3 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"], input[type="date"], input[type="tel"], input[type="number"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px; /* Reduced margin for error message placement */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745; /* Green */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .message { padding: 10px; margin-bottom: 20px; border-radius: 4px; border: 1px solid transparent; }
        .success { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
        .form-section { border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px; }
        .form-section:last-child { border-bottom: none; }
        .form-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Enroll New Student</h2>

    <?php
    // Display success or error messages if redirected back with them
    if (isset($_GET['status'])) {
        $messageText = htmlspecialchars($_GET['message'] ?? '');
        if ($_GET['status'] == 'success_student') {
            echo '<p class="message success">Student enrolled successfully!</p>';
        } elseif ($_GET['status'] == 'error_student') {
            echo '<p class="message error">Error enrolling student: ' . $messageText . '</p>';
        }
    }
    ?>

    <form action="process_add_student.php" method="POST">

        <div class="form-section">
            <h3>School Information</h3>
            <div class="form-group">
                <label for="school">School:</label>
                <select id="school" name="school" required>
                    <option value="">-- Select School --</option>
                    <?php if (!empty($schools)): ?>
                        <?php foreach ($schools as $school): ?>
                            <option value="<?php echo htmlspecialchars($school['schoolRefNo'] . '|' . $school['schoolIdNo']); ?>">
                                <?php echo htmlspecialchars($school['schoolName'] . " (ID: " . $school['schoolIdNo'] . ")"); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php elseif ($school_fetch_error): ?>
                        <option value="" disabled><?php echo htmlspecialchars($school_fetch_error); ?></option>
                    <?php else: ?>
                        <option value="" disabled>No schools found. Please add a school first.</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <div class="form-section">
            <h3>Student's Personal Information</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" required maxlength="30">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" required maxlength="30">
                </div>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label for="emailAddress">Student's Email Address:</label>
                    <input type="email" id="emailAddress" name="emailAddress" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="contactNo">Student's Contact No (e.g., 09123456789):</label>
                    <input type="tel" id="contactNo" name="contactNo" required maxlength="12" pattern="[0-9]{11,12}">
                </div>
            </div>
        </div>

        <div class="form-section">
            <h3>Student's Account Credentials</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required maxlength="15">
                </div>
                <div class="form-group">
                    <label for="accCreator">Creator Account Ref No (Admin's accRefNo):</label>
                    <input type="number" id="accCreator" name="accCreator" required placeholder="Enter Admin User Ref No">
                    <!-- In a real system, this would be auto-filled from session -->
                </div>
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required maxlength="30" minlength="8">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required maxlength="30" minlength="8">
                </div>
            </div>
        </div>

        <div class="form-section">
            <h3>Parent/Guardian Information</h3>
            <div class="form-group">
                <label for="parentGuardianName">Parent/Guardian Full Name:</label>
                <input type="text" id="parentGuardianName" name="parentGuardianName" required maxlength="70">
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label for="pgRStoStudent">Relationship to Student:</label>
                    <select id="pgRStoStudent" name="pgRStoStudent" required>
                        <option value="">-- Select Relationship --</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Guardian">Guardian</option>
                        <option value="Sibling">Sibling</option>
                        <option value="Close Relative">Close Relative</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pgMaritalStatus">Parent/Guardian Marital Status:</label>
                    <input type="text" id="pgMaritalStatus" name="pgMaritalStatus" required maxlength="15">
                </div>
            </div>
            <div class="form-group">
                <label for="pgDOB">Parent/Guardian Date of Birth (Optional):</label>
                <input type="date" id="pgDOB" name="pgDOB">
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label for="pgEmailAdd">Parent/Guardian Email Address:</label>
                    <input type="email" id="pgEmailAdd" name="pgEmailAdd" required maxlength="30">
                </div>
                <div class="form-group">
                    <label for="pgContactNo">Parent/Guardian Contact No (e.g., 09123456789):</label>
                    <input type="tel" id="pgContactNo" name="pgContactNo" required maxlength="12" pattern="[0-9]{11,12}">
                </div>
            </div>
        </div>

        <input type="submit" value="Enroll Student">
    </form>
</div>

<script>
    // Basic client-side password confirmation
    const password = document.getElementById("password");
    const confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value !== confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    if (password && confirm_password) {
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    }
</script>

</body>
</html>