<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Log</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #50586C;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: black;
            margin: 0;
            font-size: 2em;
            font-weight: 700;
            font-family: "Poppins", sans-serif;
        }
        p {
            color: white;
            font-weight: 400;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 90%;
            margin: 15px 0;
            padding: 20px;
            background-color:#FFFFFF66;
            border-radius: 10px;
            color: #fff;
        }
        .titleName {
            width: 100%;
            height: 10vh;
            position: fixed;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #50586C;
            z-index: 1;
            border-left: 1px solid #DCE2F0;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        }
        .content {
            width: 90vw;
            height: 90vh;
            margin-top: 11vh;
            margin-right: 25vw;
            padding: 10px;
            overflow-y: scroll;
            border-radius: 10px;
            background-color: #50586C;
            scrollbar-width: none;
            -ms-overflow-style: none;
            scroll-behavior: smooth;
            color: #fff;
        }
        .mail {
            display: block;
            position: fixed;
            top: 15vh;
            right: 10px;
            width: 10vw;
        }
        @media (max-width: 730px) {
            .mail {
                display: none;
            }
        }
        @media (max-width: 390px) {
            .titleName {
                height: 15vh;
            }
            .content {
                margin-top: 16vh;
            }
        }
        .admin{
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 11;
        }
    </style>
</head>
<body>
    <div class="titleName">
        <h1>Placement Update Logs</h1>
    </div>
    <div class="content">
        <?php
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test_db";

        // Create database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from user_texts table in descending order
        $sql = "SELECT text_content, submitted_at FROM user_texts ORDER BY submitted_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='container'>";
                echo "<p>" . htmlspecialchars($row["text_content"]) . "</p>";
                echo "<p><em>Submitted on: " . date("F j, Y, g:i a", strtotime($row["submitted_at"])) . "</em></p>";
                echo "</div>";
            }
        } else {
            echo "<div class='container'><p>No updates found.</p></div>";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
    <div class="mail">
        <a href="from.php">Get Update in Mail</a>
    </div>
    <button class="admin" onclick="login()">
        Admin Login
    </button>
    <script>
        function login(){
            window.location.href = "admin.php";
        }
    </script>
</body>
</html>
