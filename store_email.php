<?php
// Database configuration
$servername = "localhost";
$username = "root";     // Default username for XAMPP
$password = "";         // Default password for XAMPP
$dbname = "student_db"; // Database name you created

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];

    // Prepare and execute statement
    $stmt = $conn->prepare("INSERT INTO student_emails (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        // Redirect to index.php with a success message
        header("Location: index.php?message=Email+saved+successfully");
    } else {
        // Check for duplicate entry error
        if ($conn->errno == 1062) { // MySQL error code for duplicate entry
            header("Location: index.php?message=Error:+Email+already+exists");
        } else {
            header("Location: index.php?message=Error:+Could+not+save+email");
        }
    }

    // Close the statement and connection
    $stmt->close();
}

// Close the connection
$conn->close();
?>
