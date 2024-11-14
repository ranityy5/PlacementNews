<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form id="loginForm">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="button" onclick="validateLogin()">Login</button>
            <p id="error-message" class="error-message"></p>
        </form>
    </div>

    <script>
        function validateLogin() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('error-message');

            // Static username and password
            const staticUsername = 'admin';
            const staticPassword = 'admin';

            if ((username === staticUsername && password === staticPassword)) {
                // Redirect to dashboard (or any other page)
                window.location.href = 'dashboard.php';
            } else {
                // Show error message
                errorMessage.textContent = 'Invalid username or password.';
                errorMessage.style.color = 'red';
            }
        }
    </script>
</body>
</html>
