<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 0;
    background-color: #2E2E2E;
    color: white;
    font-family: Times New Roman, sans-serif;
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    position: relative;
}

.logo {
    margin-right: 800px; 
    margin-bottom: 30px;
}

.store-logo {
    width: 900px; 
}

.line {
    height: 80vh; 
    width: 1px; 
    background-color: #CCCCCC; 
    position: absolute; 
    left: 50%; 
    transform: translateX(-50%); 
}

.login-form {
    position: absolute;
    left: 800px;
    top: 125px;
}

.login-form input[type="email"] {
    margin-top: 60px;
}

.login-form input[type="email"],
.login-form input[type="password"],
.login-form button {
    width: 550px;
    padding: 10px;
    border-radius: 20px;
    border: none;
    background-color: #872529;
    color: white;
    font-size: 16px;
    margin-bottom: 30px;
}

.login-form button {
    width: 570px;
    background-color: #491515;
    cursor: pointer;
}

.login-form button:hover {
    background-color: #3e1010;
}

.login-image {
    height: 30px;
    margin-right: -20px;
    vertical-align: middle;
}

</style>
</head>
<body>
<div class="container">
    <img src="Store Logo.png" alt="Logo" class="logo store-logo">
    <div class="line"></div>
    <div class="login-form">
        <h2>Login as Admin User</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="email" name="email" placeholder="Enter Email" required>
            <img src="User Logo.png" alt="User Logo" class="login-image">
            <br>
            <input type="password" name="password" placeholder="Enter Password" required>
            <img src="Pass Logo.png" alt="Password Logo" class="login-image">
            <br>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
<?php


// Database connection
$servername = "localhost";
$username = "root"; // Replace with actual MySQL username
$password = ""; // Replace with actual MySQL password
$dbname = "dbmuncheryv1";   // Replace with actual database name


// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute SQL query using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful, redirect to Dashboard.php
        header("Location: Dashboard.php");
        exit();
    } else {
        // Login failed, display error message
        echo "<script>alert('Invalid email or password');</script>";
    }
}

// Close connection
$conn->close();
?>

</body>
</html>
