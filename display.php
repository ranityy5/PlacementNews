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

// Fetch data
$sql = "SELECT id, text_content, submitted_at FROM user_texts ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display All Entries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #5cb85c;
            color: white;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .delete-button {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>All Text Entries</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Text Content</th><th>Submitted At</th><th>Actions</th></tr>";
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . htmlspecialchars($row["text_content"]) . "</td><td>" . $row["submitted_at"] . "</td>";
                echo "<td><a class='delete-button' href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this entry?\")'>Delete</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No entries found.</p>";
        }
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
