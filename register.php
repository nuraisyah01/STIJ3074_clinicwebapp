<?php
include 'dbconnect.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = $_POST['phone'];
    $address = $_POST['address'];

    if (!empty($name) && !empty($email) && !empty($password) && !empty($confirm_password) && !empty($phone_number) && !empty($address)) {
        if ($password === $confirm_password) {
            // Hash the password using sha1
            $hashed_password = sha1($password);

            try {
                // Prepare statement
                $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, address) VALUES (:name, :email, :password, :phone, :address)");

                // Bind parameters
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->bindParam(':phone', $phone_number);
                $stmt->bindParam(':address', $address);

                // Execute statement
                if ($stmt->execute()) {
                    $success = "Registration successful! Redirecting to login page...";
                    echo "<script>
                            alert('$success');
                            setTimeout(function() {
                                window.location.href = 'login.php';
                            }, 2000);
                          </script>";
                } else {
                    $error = "Error in registration.";
                }
            } catch (PDOException $e) {
                if ($e->getCode() === '23000') {
                    $error = "Email already registered.";
                } else {
                    $error = "Error: " . $e->getMessage();
                }
            }
        } else {
            $error = "Passwords do not match.";
        }
    } else {
        $error = "Please fill out all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="w3.css">
</head>

<body>
    <header class="w3-container w3-center w3-dark-grey w3-padding-32">
        <h1>Clinic Web Application</h1>
        <p>Clinic Registration</p>
    </header>
    <div class="w3-bar w3-dark-grey">
        <a href="index.html" class="w3-bar-item w3-button">Home</a>
    </div>
    <div style="min-height:100vh;overflow-y: auto;">
        <div class="w3-container w3-padding-64">
            <div class="w3-card w3-round" style="max-width:600px;margin:auto">
                <div class="w3-container w3-dark-grey">
                    <h4>Registration Form</h4>
                </div>
                <?php if (!empty($error)): ?>
                    <div class="w3-panel w3-red">
                        <p><?php echo $error; ?></p>
                    </div>
                <?php endif; ?>
                <?php if (!empty($success)): ?>
                    <div class="w3-panel w3-green">
                        <p><?php echo $success; ?></p>
                    </div>
                <?php endif; ?>
                <form class="w3-container" action="register.php" method="POST">
                    <p>
                        <label><b>Full Name</b></label>
                        <input class="w3-input w3-border w3-round" type="text" name="name" required>
                    </p>
                    <p>
                        <label><b>Email</b></label>
                        <input class="w3-input w3-border w3-round" type="email" name="email" required>
                    </p>
                    <p>
                        <label><b>Phone Number</b></label>
                        <input class="w3-input w3-border w3-round" type="text" name="phone" required>
                    </p>
                    <p>
                        <label><b>Address</b></label>
                        <input class="w3-input w3-border w3-round" type="text" name="address" required>
                    </p>
                    <p>
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border w3-round" type="password" name="password" required>
                    </p>
                    <p>
                        <label><b>Confirm Password</b></label>
                        <input class="w3-input w3-border w3-round" type="password" name="confirm_password" required>
                    </p>
                    <p>
                        <button class="w3-btn w3-round w3-blue w3-block" type="submit">Register</button>
                    </p>
                </form>
                <div class="w3-container w3-center">
                    <p>Already have an account? <a href="login.php" style="color:blue;">Login</a> here</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="w3-container w3-center w3-dark-grey">
        <p>&copy; 2024 Clinic Web App. All rights reserved.</p>
    </footer>
</body>

</html>
