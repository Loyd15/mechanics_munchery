<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Times New Roman, sans-serif;
      background-color: #161616; /* Dark gray background color */
    }

    .container {
      position: relative;
      width: 100%;
      min-height: 100vh; /* Use min-height instead of height */
      background: linear-gradient(to top right, #161616, #525252);
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      padding-top: 50px;
    }

    .logo {
      margin-bottom: 30px;
      max-width: 80%;
    }

    .store-logo {
      width: 100%; 
      max-width: 500px;
    }

    /* Table styles */
    table {
      margin-top: 20px; /* Adjusted margin top */
      border-collapse: collapse;
      width: 80%;
      color: white;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #333;
    }

    .total-row {
      font-weight: bold;
      background-color: #222;
    }

    h2 {
      color: white;
    }

    form {
      margin-bottom: 20px;
    }

    label {
      color: white;
      margin-right: 10px;
    }

    input[type="date"] {
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    button[type="submit"] {
      padding: 8px 16px;
      background-color: red;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
      background-color: #491515;
    }
  </style>
</head>
<body>

<div class="container">
  <img src="Store Logo.png" alt="Logo" class="logo store-logo">

  <h2>Generate Summary Report</h2>
  
  <!-- Date input field -->
  <form method="get" action="">
    <label for="reportDate">Choose a date:</label>
    <input type="date" id="reportDate" name="reportDate">
    <button type="submit">Generate Report</button>
  </form>

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

  // Fetch data and generate report if date is submitted
  if (isset($_GET['reportDate'])) {
      $date = $_GET['reportDate'];

      // Retrieve data for the specific date

      // Query to get the number of main dishes sold
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

      // Query to get the total amount earned
      $sql_total_amount = "SELECT SUM(main.itemPrice) AS total_amount
                           FROM transactions
                           JOIN combos ON transactions.itemID = combos.comboID
                           JOIN main ON combos.mainID = main.itemID
                           WHERE transactionDate = ? AND transactions.itemType = 'M'";
      $stmt_total_amount = $conn->prepare($sql_total_amount);
      $stmt_total_amount->bind_param("s", $date);
      $stmt_total_amount->execute();
      $result_total_amount = $stmt_total_amount->get_result();
      $row_total_amount = $result_total_amount->fetch_assoc();
      $total_amount = $row_total_amount['total_amount'];

      // Query to get the total discounts given
      $sql_total_discounts = "SELECT SUM(discountPrice) AS total_discounts
                              FROM combos
                              JOIN transactions ON combos.comboID = transactions.itemID
                              WHERE transactions.transactionDate = ?";
      $stmt_total_discounts = $conn->prepare($sql_total_discounts);
      $stmt_total_discounts->bind_param("s", $date);
      $stmt_total_discounts->execute();
      $result_total_discounts = $stmt_total_discounts->get_result();
      $row_total_discounts = $result_total_discounts->fetch_assoc();
      $total_discounts = $row_total_discounts['total_discounts'];
  ?>
  
  <!-- Table for number of dishes sold -->
  <table>
    <tr>
      <th>Dish Type</th>
      <th>Number Sold</th>
    </tr>
    <?php while ($row = $result_main->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['itemName']; ?></td>
        <td><?php echo $row['num_sold']; ?></td>
      </tr>
    <?php endwhile; ?>
  </table>

  <!-- Table for total amount earned -->
  <h2>Total Amount Earned</h2>
  <table>
    <tr>
      <th>Date</th>
      <th>Total Amount</th>
    </tr>
    <tr>
      <td><?php echo $date; ?></td>
      <td><?php echo $total_amount; ?></td>
    </tr>
  </table>

  <!-- Table for total discounts given -->
  <h2>Total Discounts Given</h2>
  <table>
    <tr>
      <th>Date</th>
      <th>Total Discounts</th>
    </tr>
    <tr>
      <td><?php echo $date; ?></td>
      <td><?php echo $total_discounts; ?></td>
    </tr>
  </table>

  <?php
  // Close statements and connection
  $stmt_main->close();
  $stmt_total_amount->close();
  $stmt_total_discounts->close();
  mysqli_close($conn);
  }
  ?>

</div>

</body>
</html>
