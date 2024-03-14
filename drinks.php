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

// Retrieve main dish and side dish IDs from URL parameters if set
$mainID = $_GET['mainID'] ?? null;
$sideID = $_GET['sideID'] ?? null;

// Fetch drinks from the database
$sql = "SELECT * FROM drinks";
$result = $conn->query($sql);

$drinks = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $drinks[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Selection</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Times New Roman, sans-serif;
            background-color: #2E2E2E;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: #872529;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            width: 120px;
            height: 95%;
            margin: 20px;
        }

        .sidebar a {
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }

        .sidebar a.active {
            background-color: #491515;
        }

        .main-dish-selection {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-gap: 10px;
            justify-content: flex-start;
            align-items: center;
            margin-left: 20px;
        }

        .main-dish-item form {
            display: inline-block;
            width: 100%;
        }

        .main-dish-item button {
            background-color: #872529;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .main-dish-item button:hover {
            background-color: #491515;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <a href="mainDish.php">Main</a>
            <a href="sideDish.php">Side</a>
            <a href="#" class="active">Drinks</a>
        </div>

        <div class="main-dish-selection">
            <?php foreach ($drinks as $drink) : ?>
                <div class="main-dish-item">
                    <form action="payment.php" method="get">
                        <input type="hidden" name="mainID" value="<?php echo $mainID; ?>">
                        <input type="hidden" name="sideID" value="<?php echo $sideID; ?>">
                        <input type="hidden" name="drinkID" value="<?php echo $drink['itemID']; ?>">
                        <button type="submit" name="select_drink"><?php echo $drink['itemName'] . ' - ₱' . number_format($drink['itemPrice'], 2); ?></button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
