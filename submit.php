<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password (empty)
$dbname = "test_db"; // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text_input = trim($_POST['text_input']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user_texts (text_content) VALUES (?)");
    $stmt->bind_param("s", $text_input);

    // Execute and check for success
    if ($stmt->execute()) {
        header("Location: display.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
