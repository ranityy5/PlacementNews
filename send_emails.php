<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all email addresses from student_emails table
$email_query = "SELECT email FROM student_emails";
$result = $conn->query($email_query);

if ($result->num_rows > 0) {
    // Email settings
    $subject = "Important Notification";
    $message = "<html><body>";
    $message .= "<h3>Important Update for All Students</h3>";
    $message .= "<p>This is an important notification sent to all students.</p>";
    $message .= "</body></html>";
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Loop through each email and send the message
    while ($row = $result->fetch_assoc()) {
        $to = $row['email'];

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            // Success message
            echo "Email sent to " . $to . "<br>";
        } else {
            // Error message if sending fails
            echo "Failed to send email to " . $to . "<br>";
        }
    }
} else {
    echo "No students found.";
}

// Close the connection
$conn->close();
?>
