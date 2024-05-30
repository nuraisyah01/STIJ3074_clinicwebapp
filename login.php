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
                echo "<script>alert('Login Successful')</script>";
            } else {
                echo "<script>alert('Login Failed')</script>";
            }
        } else {
            echo "<script>alert('No account found with that email')</script>";
        }
    } else {
        echo "Please fill out all fields.";
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
    <style>  

    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 1px;
        height:90vh;
        background-image: url('img4.png');
        background-size: cover;
        background-position: center;
        
    }

    .grid-left {
        grid-column: 1;
    }

    .grid-right {
        grid-column: 2;
        padding: 20px;
    }

    @media only screen and (max-width: 768px) {
       .grid-container {
            grid-template-columns: 1fr;

            
        }
       .grid-left {
            display: none;
        }
       .grid-right {
            grid-column: 1;
            padding: 20px;
            width: 100%;
        }
    }

    
</style>

</head>
<body onload="loadCookies()">
    <header class="w3-container w3-center w3-dark-grey w3-padding-32">
        <h1>Clinic Web</h1>
        <p class=w3-xlarge>Clinic Login</p>
    </header>
    <div class="w3-bar w3-dark-grey">
        <a href="index.html" class="w3-bar-item w3-button">Home</a>
    </div>
    <div class="grid-container">
        <div class="grid-left"></div>
        <div class="grid-right">
            <div class="w3-card w3-round" style="max-width:600px;margin:auto">
                <div class="w3-container w3-dark-grey w3-margin-top">
                    <h4>Login Form</h4>
                </div>
                <form name="loginForm" class="w3-container w3-white " action="login.php" method="post">
                <div class="imgcontainer" style="text-align: center;">
                    <img src="img2.png" alt="Avatar" class="avatar w3-margin-top" style="width: 150px; height: 150px; border-radius: 50%; ">
                </div>
                    <p>
                        <label><b>Email</b></label>
                        <input class="w3-input w3-border w3-round" name="username" placeholder="Enter email" type="text" id="username"required>
                    </p>
                    <p>
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border w3-round" name="password" placeholder="Enter password" type="password" id="password" required>
                    </p>
                    
                    <p>
                        <input class="w3-check" type="checkbox" id="idremember" onclick="rememberMe()">
                        <label>Remember Me</label>
                    </p>
                    <p>
                        <button class="w3-btn w3-round w3-blue w3-block" name="submit" value="submit">Login</button>
                    </p>
                </form>
                <div class="w3-container w3-center w3-white w3-margin-bottom">
                    <p>Don't have an account? <a href="register.php" style="color:blue;">Register</a> here</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="w3-container w3-center w3-dark-grey">
        <p>&copy; 2024 Clinic Web. All rights reserved.</p>
    </footer>
</body>
</html>

