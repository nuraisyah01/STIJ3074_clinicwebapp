<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);


    if (!empty($email) && !empty($password)) {
        // Prepare and bind
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if the user exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $hashed_password = $row['password'];
            $hashed_input_password = sha1($password);

            if ($hashed_input_password === $hashed_password) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_email'] = $email;

                if ($remember) {
                    setcookie('username', $email, time() + (86400 * 30), "/"); // 30 days
                    setcookie('password', $password, time() + (86400 * 30), "/");
                } else {
                    if (isset($_COOKIE['username'])) {
                        setcookie('username', '', time() - 3600, "/");
                    }
                    if (isset($_COOKIE['password'])) {
                        setcookie('password', '', time() - 3600, "/");
                    }
                }

            // Verify the password
            if ($hashed_input_password === $hashed_password) {

                echo "<script>alert('Login Successful')</script>";
            } else {
                echo "<script>alert('Login Failed')</script>";
            }
        } else {
            echo "No account found with that email.";
        }
    } else {
        echo "Please fill out all fields.";
    }
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="w3.css">
    <title>Clinic Web App</title>
    <script src="scripts.js"></script>

</head>
<body onload="loadCookies()">
    <header class="w3-container w3-center w3-dark-grey w3-padding-32">
        <h1>Clinic Web Application</h1>
        <p>Clinic Login</p>
    </header>
    <div class="w3-bar w3-dark-grey">
        <a href="index.html" class="w3-bar-item w3-button">Home</a>
    </div>
    <div style="min-height:100vh;overflow-y: auto;">
        <div class="w3-container w3-padding-64">
            <div class="w3-card w3-round" style="max-width:600px;margin:auto">
                <div class="w3-container w3-dark-grey">
                    <h4>Login Form</h4>
                </div>
                <form name="loginForm" class="w3-container" action="login.php" method="post">
                    <p>
                        <label><b>Email</b></label>
                        <input class="w3-input w3-border w3-round" name="username" type="text" id="username"required>
                    </p>
                    <p>
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border w3-round" name="password" type="password" id="password" required>
                    </p>
                    
                    <p>
                        <input class="w3-check" type="checkbox" id="idremember" onclick="rememberMe()">
                        <label>Remember Me</label>
                    </p>
                    <p>
                        <button class="w3-btn w3-round w3-blue w3-block" name="submit" value="submit">Login</button>
                    </p>
                </form>
                <div class="w3-container w3-center">
                    <p>Don't have an account? <a href="register.php" style="color:blue;">Register</a> here</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="w3-container w3-center w3-dark-grey">
        <p>&copy; 2024 Clinic Web App. All rights reserved.</p>
    </footer>
</body>
</html>
