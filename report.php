<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = mysqli_connect("localhost", "root", "", "mydb") or die ("Unable to connect!". mysqli_error($conn));

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Specify the date for the report
$date = "2024-03-10"; // Change this to the desired date

// Retrieve data for the specific date
$sql_main = "SELECT main.itemName, COUNT(transactions.itemID) AS num_sold
             FROM transactions 
             JOIN combos ON transactions.itemID = combos.comboID
             JOIN main ON combos.mainID = main.itemID
             WHERE transactionDate = ? AND transactions.itemType = 'M'
             GROUP BY main.itemName";
$stmt_main = $conn->prepare($sql_main);
$stmt_main->bind_param("s", $date);
$stmt_main->execute();
$result_main = $stmt_main->get_result();

$sql_sides = "SELECT sides.itemName, COUNT(transactions.itemID) AS num_sold
              FROM transactions 
              JOIN combos ON transactions.itemID = combos.comboID
              JOIN sides ON combos.sidesID = sides.itemID
              WHERE transactionDate = ? AND transactions.itemType = 'M'
              GROUP BY sides.itemName";
$stmt_sides = $conn->prepare($sql_sides);
$stmt_sides->bind_param("s", $date);
$stmt_sides->execute();
$result_sides = $stmt_sides->get_result();

$sql_drinks = "SELECT drinks.itemName, COUNT(transactions.itemID) AS num_sold
               FROM transactions 
               JOIN combos ON transactions.itemID = combos.comboID
               JOIN drinks ON combos.drinkID = drinks.itemID
               WHERE transactionDate = ? AND transactions.itemType = 'M'
               GROUP BY drinks.itemName";
$stmt_drinks = $conn->prepare($sql_drinks);
$stmt_drinks->bind_param("s", $date);
$stmt_drinks->execute();
$result_drinks = $stmt_drinks->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Main Dishes Sold for Date: <?php echo $date; ?></h2>
    <table>
        <tr>
            <th>Main Dish</th>
            <th>Number of Dishes Sold</th>
        </tr>
        <?php while ($row = $result_main->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['itemName']; ?></td>
                <td><?php echo $row['num_sold']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Side Dishes Sold</h2>
    <table>
        <tr>
            <th>Side Dish</th>
            <th>Number of Dishes Sold</th>
        </tr>
        <?php while ($row = $result_sides->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['itemName']; ?></td>
                <td><?php echo $row['num_sold']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Drinks Sold</h2>
    <table>
        <tr>
            <th>Drink</th>
            <th>Number of Drinks Sold</th>
        </tr>
        <?php while ($row = $result_drinks->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['itemName']; ?></td>
                <td><?php echo $row['num_sold']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Close statements and connection
$stmt_main->close();
$stmt_sides->close();
$stmt_drinks->close();
mysqli_close($conn);
?>
