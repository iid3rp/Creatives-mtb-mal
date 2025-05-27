<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New School</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="email"], input[type="number"], input[type="tel"], select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message { padding: 10px; margin-bottom:15px; border-radius: 4px;}
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;}
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;}
    </style>
</head>
<body>

    <h2>Add New School</h2>

    <?php
    // Display success or error messages if redirected back with them
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo '<p class="message success">School added successfully!</p>';
        } elseif ($_GET['status'] == 'error') {
            echo '<p class="message error">Error adding school: ' . htmlspecialchars($_GET['message'] ?? 'Unknown error') . '</p>';
        }
    }
    ?>

    <form action="../process/process_add_school.php" method="POST">
        <div class="form-group">
            <label for="schoolName">School Name:</label>
            <input type="text" id="schoolName" name="schoolName" required>
        </div>

        <div class="form-group">
            <label for="shortName">Short Name:</label>
            <input type="text" id="shortName" name="shortName" required maxlength="155">
        </div>

        <div class="form-group">
            <label for="schoolIdNo">School ID No (6 digits):</label>
            <input type="number" id="schoolIdNo" name="schoolIdNo" required min="100000" max="999999">
        </div>

        <div class="form-group">
            <label for="emailAddress">Email Address:</label>
            <input type="email" id="emailAddress" name="emailAddress" required maxlength="50">
        </div>

        <div class="form-group">
            <label for="schoolType">School Type:</label>
            <select id="schoolType" name="schoolType" required>
                <option value="">-- Select Type --</option>
                <option value="Public Integrated School">Public Integrated School</option>
                <option value="Private Integrated School">Private Integrated School</option>
                <option value="Private Elementary School">Private Elementary School</option>
                <option value="Public Elementary School">Public Elementary School</option>
            </select>
        </div>

        <div class="form-group">
            <label for="contactNo">Contact No (e.g., 09123456789):</label>
            <input type="tel" id="contactNo" name="contactNo" required maxlength="12" pattern="[0-9]{11,12}">
        </div>

        <div class="form-group">
            <label for="locAddress">Location Address:</label>
            <textarea id="locAddress" name="locAddress" rows="3" required maxlength="70"></textarea>
        </div>

        <div class="form-group">
            <label for="region">Region:</label>
            <input type="text" id="region" name="region" required maxlength="30">
        </div>

        <div class="form-group">
            <label for="adminUserName">Administrator Username:</label>
            <input type="text" id="adminUserName" name="adminUserName" required maxlength="15">
        </div>

        <input type="submit" value="Add School">
    </form>

</body>
</html>