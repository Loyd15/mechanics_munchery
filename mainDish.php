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

// Fetch main dishes from the database
$sql = "SELECT * FROM main";
$result = $conn->query($sql);

$mainDishes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $mainDishes[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Dish Selection</title>
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
            background-color: #872529;
            border: none;
            cursor: pointer;
        }

        .sidebar a.active {
            background-color: #491515;
        }

        .main-dish-selection {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 columns */
            grid-gap: 10px; /* Gap between grid items */
            justify-content: flex-start;
            align-items: center;
            margin-left: 20px; /* Add margin to separate from the sidebar */
        }

        .main-dish-item form {
            display: inline-block;
            width: 100%; /* Ensure the form takes full width of its container */
        }

        .main-dish-item button {
            background-color: #872529;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%; /* Make buttons fill their container */
        }

        .main-dish-item button:hover {
            background-color: #491515;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <a href="#" class="active">Main</a>
            <a href="sideDish.php">Side</a>
            <a href="drinks.php">Drinks</a>
        </div>

        <div class="main-dish-selection">
            <?php foreach ($mainDishes as $mainDish) : ?>
                <div class="main-dish-item">
                    <form action="sidedish.php" method="get">
                        <input type="hidden" name="mainID" value="<?php echo $mainDish['itemID']; ?>">
                        <button type="submit" name="select_main"><?php echo $mainDish['itemName'] . ' - ₱' . number_format($mainDish['itemPrice'], 2); ?></button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
