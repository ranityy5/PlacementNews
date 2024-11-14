<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Emails</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            font-weight: 600;
            color: #333;
            margin: 20px 0;
        }
        .table-container {
            width: 90%;
            max-width: 800px;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #50586C;
            color: #fff;
        }
        .delete-btn {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
        }
        .delete-btn:hover {
            background-color: #c0392b;
        }
        .download-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #50586C;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            font-weight: 500;
        }
        .download-btn:hover {
            background-color: #333;
        }
        .send_mails {
            width: auto;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            position: fixed;
            top:10px;
            right:10px;
        }
        .send_mails:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <h1>Student Email List</h1>
    <div class="table-container">
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

        // Delete record if delete button is clicked
        if (isset($_GET['delete_id'])) {
            $delete_id = intval($_GET['delete_id']);
            $conn->query("DELETE FROM student_emails WHERE id = $delete_id");
            header("Location: display_students.php");
            exit();
        }

        // Fetch data from student_emails table
        $sql = "SELECT id, email, submitted_at FROM student_emails ORDER BY submitted_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Email</th><th>Submitted At</th><th>Actions</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . date("F j, Y, g:i a", strtotime($row["submitted_at"])) . "</td>";
                echo "<td><a href='display_students.php?delete_id=" . $row["id"] . "' class='delete-btn'>Delete</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No students found.</p>";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
    <a href="download_excel.php" class="download-btn">Download as Excel</a>
    <!-- Button to send emails -->
</body>
</html>
