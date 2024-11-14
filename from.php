<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #50586C;
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        section {
            width: 50vw;
            background-color: #020202;
            border-radius: 10px;
            padding: 30px;
            padding-top: 0px;
            border: 3px solid black;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        h3 {
            color: #DCE2F0;
            font-size: 2em;
            font-weight: 700;
        }
        input[type="email"], .submit {
            width: 90%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            text-align: center;
        }
        .submit {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        .submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <section>
        <h3>Enter Mail Id</h3>

        <!-- Display message if it exists -->
        <?php
        if (isset($_GET['message'])) {
            echo "<p style='color: green; font-weight: bold;'>" . htmlspecialchars($_GET['message']) . "</p>";
        }
        ?>

<form action="store_email.php" method="post">
    <input type="email" name="email" placeholder="Email Id" required>
    <input type="submit" class="submit" value="Submit">
</form>
    </section>
</body>
</html>
