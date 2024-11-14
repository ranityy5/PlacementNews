<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert ID to an integer for security

    // Prepare and execute delete statement
    $stmt = $conn->prepare("DELETE FROM user_texts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to display.php after deletion
    header("Location: display.php");
    exit();
} else {
    echo "No ID specified for deletion.";
}
?>
