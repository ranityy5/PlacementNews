<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set headers for download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=student_emails.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Print column headers
echo "Name\tEmail\tSubmitted At\n";

// Fetch data and output in tab-separated format for Excel
$sql = "SELECT name, email, submitted_at FROM student_emails ORDER BY submitted_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["name"] . "\t" . $row["email"] . "\t" . $row["submitted_at"] . "\n";
    }
} else {
    echo "No data available\n";
}

// Close the connection
$conn->close();
exit();
