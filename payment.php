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

        .done-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .another-button{
            padding: 10px 20px;
            background-color: #red;
            color: black;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .done-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="title">Payment:</h1>

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
        $comboID = $_GET['comboID'];
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
        if ($comboID) {
            $sql = "SELECT discountPrice FROM combos WHERE comboID = $comboID";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalAmount = $row['discountPrice'];
            }
        } else {
        $totalAmount = $mainPrice + $sidePrice + $drinkPrice;
        }

        if (!$comboID){
            $insertSql = "INSERT INTO mCombo (mainID, drinkID, sideID, totalPrice) VALUES ($mainID, $drinkID, $sideID, $totalAmount)";
            if ($conn->query($insertSql) === TRUE) {
                echo "<p>Data inserted into mCombo table successfully.</p>";
            } else {
                echo "Error: " . $insertSql . "<br>" . $conn->error;
            }
        }
        echo "<div class='total-section'>
        <div class='total-text'>Order Total</div>
        <div class='total-amount'>₱ " . number_format($totalAmount, 2) . "</div>
      </div>
      <div class='underline'></div>
      <div class='input-section'>
        <form action='' method='POST'>
            <div class='input-row'>
                <label class='input-label' for='name'>Full Name:</label>
                <input type='text' id='name' class='input-field' placeholder='Enter your full name' name='fullName' required>
            </div>
            <div class='input-row'>
                <label class='input-label' for='date'>Date:</label>
                <input type='date' id='date' class='input-field' name='transactionDate' required>
            </div>
            <div class='input-row'>
                <input type='hidden' name='totalAmount' value='$totalAmount'>
            </div>
            <button type='submit' class='done-button'>Done</button>
        </form>
        <br>
        <form action='startScreen.php' method='POST'>
            <button type='submit' class='another-button'>main menu</button>
        </form>
      </div>";
       

        // Insert data into transactions table
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $fullName = $_POST['fullName'];
            $transactionDate = $_POST['transactionDate'];
        
            if ($comboID) {
                $insertTransactionSql = "INSERT INTO transactions (transactionID, itemType, itemID, transactionDate) VALUES (NULL, 'C', '$comboID', '$transactionDate')";
            } else {
                $getLastComboIDSql = "SELECT MAX(comboID) AS lastComboID FROM mCombo";
                $result = $conn->query($getLastComboIDSql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $comboID = $row['lastComboID'];
                    echo "$comboID";
                    $insertTransactionSql = "INSERT INTO transactions (transactionID, itemType, itemID, transactionDate) VALUES (NULL, 'M', '$comboID', '$transactionDate')";
                } else {
                    echo "Error: No comboID found.";
                }
            }
        
            if ($conn->query($insertTransactionSql) === TRUE) {
                // Display a confirmation message
                echo "Transaction recorded successfully.";
            } else {
                // Provide an error message
                echo "Error: Unable to record transaction.";
            }
        }
        

        $conn->close();
        ?>

    </div>

</body>
</html>
