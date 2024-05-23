<?php
session_start();
include 'dbconnect.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, email, phone, address FROM users WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="w3.css">
    <title>User Profile</title>
</head>
<body>
    <header class="w3-container w3-center w3-dark-grey w3-padding-32">
        <h1>Clinic Web Application</h1>
        <p>Profile Page</p>
    </header>
    <div class="w3-bar w3-dark-grey">
        <a href="index.html" class="w3-bar-item w3-button">Home</a>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>
    <div style="min-height:100vh;overflow-y: auto;">
        <div class="w3-container w3-padding-64">
            <div class="w3-card w3-round" style="max-width:600px;margin:auto">
                <div class="w3-container w3-dark-grey">
                    <h4>Profile Information</h4>
                </div>
                <div class="w3-container">
                    <p><b>Name:</b> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p><b>Email:</b> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p><b>Phone:</b> <?php echo htmlspecialchars($user['phone']); ?></p>
                    <p><b>Address:</b> <?php echo htmlspecialchars($user['address']); ?></p>
                </div>
            </div>
        </div>
    </div>
    <footer class="w3-container w3-center w3-dark-grey">
        <p>&copy; 2024 Clinic Web App. All rights reserved.</p>
    </footer>
</body>
</html>
