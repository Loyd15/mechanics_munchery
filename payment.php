<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store selected item IDs
$mainID = $_GET['mainID'] ?? null;
$sideID = $_GET['sideID'] ?? null;
$drinkID = $_GET['drinkID'] ?? null;

// Fetch selected items from the database
$mainPrice = 0;
$sidePrice = 0;
$drinkPrice = 0;

if ($mainID) {
    $sql = "SELECT * FROM main WHERE itemID = $mainID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mainPrice = $row['itemPrice'];
    }
}

if ($sideID) {
    $sql = "SELECT * FROM sides WHERE itemID = $sideID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sidePrice = $row['itemPrice'];
    }
}

if ($drinkID) {
    $sql = "SELECT * FROM drinks WHERE itemID = $drinkID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $drinkPrice = $row['itemPrice'];
    }
}

// Calculate total amount
$totalAmount = $mainPrice + $sidePrice + $drinkPrice;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            background-color: #2E2E2E;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #872529;
            margin: 20px auto;
            padding: 30px;
            text-align: left;
            border-radius: 10px;
            width: 60%;
            max-width: 800px;
        }

        .title {
            color: white;
            font-size: 30px;
            margin: 0;
            margin-bottom: 20px;
        }

        .total-section {
            text-align: left;
            padding: 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .total-text {
            font-size: 18px;
        }

        .total-amount {
            font-size: 18px;
        }

        .underline {
            border-bottom: 1px solid white;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .input-section {
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 10px;
        }

        .input-label {
            color: white;
            font-size: 18px;
            text-align: left;
            width: 40%;
        }

        .input-field {
            color: #333;
            font-size: 18px;
            border: none;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
            width: 55%;
        }

        .input-field::placeholder {
            color: #999;
        }

        .cancel-button {
            padding: 10px 20px;
            background-color: #D51B23;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cancel-button:hover {
            background-color: #872529;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="title">Payment:</h1>

        <div class="total-section">
            <div class="total-text">Order Total</div>
            <div class="total-amount">₱ <?php echo number_format($totalAmount, 2); ?></div>
        </div>
        <div class="underline"></div>

        <div class="input-section">
            <div class="input-row">
                <label class="input-label" for="name">Full Name:</label>
                <input type="text" id="name" class="input-field" placeholder="Enter your full name">
            </div>
            <div class="input-row">
                <label class="input-label" for="date">Date:</label>
                <input type="text" id="date" class="input-field" placeholder="Enter the date">
            </div>
            <div class="input-row">
                <label class="input-label" for="payment-amount">Payment amount:</label>
                <input type="text" id="payment-amount" class="input-field" placeholder="₱ Enter payment amount">
            </div>
            <div class="input-row">
                <span class="input-label">Change:</span>
                <span class="input-field">₱ 0.00</span>
            </div>
        </div>

        <a href="Receipt.php" class="cancel-button">Done</a>
    </div>

</body>
</html>
