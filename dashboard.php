<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1500-Word Input Form</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100vw;
        }
        h2 {
            text-align: center;
        }
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .btn{
            position: fixed;
            top: 10px;
            right: 20px;
        }
        .btn2{
            position: fixed;
            top: 60px;
            right: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Post New News</h2>
        <form action="submit.php" method="post" >
            <textarea name="text_input" rows="20" maxlength="1500" placeholder="Enter your text here..." required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class=btn>
        <button onclick="gotoDashBorad();">
            show list
        </button>
    </div>
    <div class=btn2>
        <button onclick="gotoEmailSubmit();">
            email submission
        </button>
    </div>
    <script>
        function gotoDashBorad(){
            window.location.href = "display.php";
        }
        function gotoEmailSubmit(){
            window.location.href = "display_students.php";
        }
    </script>

</body>
</html>
