<?php

// Turn on error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// =================================================================
// 1. CONFIGURATION
// =================================================================

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';

$sqlFileToExecute = 'mtbmaldb.sql';
$databaseName     = 'mtbmaldb';
$keyTable         = 'mtbmalusers'; // A key table to confirm successful installation

// =================================================================
// SCRIPT LOGIC (No need to edit below this line)
// =================================================================

// --- HTML Styling ---
echo "
<style>
    body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; padding: 20px; background-color: #f8f9fa; color: #212529; }
    .container { max-width: 800px; margin: auto; background-color: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); }
    h1 { color: #0056b3; border-bottom: 2px solid #0056b3; padding-bottom: 10px; }
    .success { color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px; border-radius: 4px; font-weight: bold; }
    .error { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; font-weight: bold; }
    .info { color: #0c5460; background-color: #d1ecf1; border: 1px solid #bee5eb; padding: 10px; border-radius: 4px; }
    .status { color: #004085; background-color: #cce5ff; border: 1px solid #b8daff; padding: 15px; border-radius: 4px; margin-top: 20px; }
    .warning { color: #856404; background-color: #fff3cd; border: 1px solid #ffeeba; padding: 15px; margin-top: 20px; border-radius: 4px; font-weight: bold; }
    code { background-color: #e9ecef; padding: 2px 5px; border-radius: 3px; font-family: 'SFMono-Regular', Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace; }
</style>
<div class='container'>
<h1>Database Setup Script</h1>";

// --- Check if the SQL file exists ---
if (!file_exists($sqlFileToExecute)) {
    die("<div class='error'>Fatal Error: The SQL file <code>" . htmlspecialchars($sqlFileToExecute) . "</code> was not found.</div></div>");
}

// =================================================================
// 2. CONNECT AND CHECK FOR EXISTING INSTALLATION (ROBUST METHOD)
// =================================================================

echo "<p class='info'>Step 1: Connecting to MySQL server...</p>";

$conn = new mysqli($dbHost, $dbUser, $dbPass);
if ($conn->connect_error) {
    die("<div class='error'>Connection Failed: " . $conn->connect_error . "</div></div>");
}
echo "<p class='success'>✔ Connection successful!</p>";


echo "<p class='info'>Step 2: Checking for existing database installation...</p>";

// Use INFORMATION_SCHEMA to check if the database exists without generating a warning.
$dbCheckQuery = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
$stmt = $conn->prepare($dbCheckQuery);
$stmt->bind_param("s", $databaseName);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // The database exists. Now we must select it to check for the key table.
    $conn->select_db($databaseName);
    $tableCheckResult = $conn->query("SHOW TABLES LIKE '" . $keyTable . "'");

    if ($tableCheckResult && $tableCheckResult->num_rows > 0) {
        // The database AND the key table exist. The installation is complete.
        $stmt->close();
        $conn->close();
        echo "<div class='status'>
            <strong>Already Installed!</strong><br>
            The database <code>" . htmlspecialchars($databaseName) . "</code> and a key table were found.<br>
            No action was taken to prevent data loss.
          </div>";
        echo "<hr><div class='warning'><strong>IMPORTANT:</strong> For security, please delete this script (<code>" . htmlspecialchars(basename(__FILE__)) . "</code>) now.</div></div>";
        exit(); // Stop script execution
    }
}
// If we reach here, it means the database or the key table doesn't exist. We can proceed.
$stmt->close();
echo "<p class='success'>✔ System is not installed. Proceeding with setup...</p>";


// =================================================================
// 3. EXECUTE THE SQL FILE
// =================================================================

echo "<p class='info'>Step 3: Reading and executing <code>" . htmlspecialchars($sqlFileToExecute) . "</code>...</p>";

$sqlCommands = file_get_contents($sqlFileToExecute);
if ($sqlCommands === false) {
    $conn->close();
    die("<div class='error'>Error: Could not read the SQL file.</div></div>");
}

// Execute the multi-query
if ($conn->multi_query($sqlCommands)) {
    // Clear out the results from the buffer to ensure all queries were executed
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());

    if ($conn->error) {
        echo "<div class='error'>An error occurred during SQL execution: " . $conn->error . "</div>";
    } else {
        echo "<h2><div class='success'>✔ Database Setup Complete!</div></h2>";
        echo "<p>All commands from <code>" . htmlspecialchars($sqlFileToExecute) . "</code> were executed successfully.</p>";
    }
} else {
    echo "<div class='error'>Error executing SQL commands: " . $conn->error . "</div>";
}

// =================================================================
// 4. CLEANUP
// =================================================================

$conn->close();

echo "<hr>";
echo "<div class='warning'>
    <strong>IMPORTANT SECURITY WARNING:</strong><br>
    Your database has been set up. For security reasons, you must now <strong>DELETE THIS SCRIPT</strong> (<code>" . htmlspecialchars(basename(__FILE__)) . "</code>) from your server immediately.
</div>";
echo "</div>"; // Close container

?>