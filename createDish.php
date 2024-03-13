<?php
$servername = "localhost";
$username = "root";
$password = "password";
$database = "muncherydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $itemName = $_POST['itemName'];
  $itemPrice = $_POST['itemPrice'];
  $table = $_POST['table'];

  // Get the count of existing entries
  $countQuery = "SELECT COUNT(*) AS count FROM $table";
  $result = $conn->query($countQuery);
  
  if ($result && $row = $result->fetch_assoc()) {
    // Increment the count by 1 to generate the new itemID
    $itemID = $row['count'] + 1;
  }  

  // Insert the data into the chosen table
  $sql = "INSERT INTO $table (itemID,itemName, itemPrice) VALUES ('$itemID','$itemName', '$itemPrice')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Item</title>
  <style>
    body {
      background-color: #292929; /* Light gray background */
    }

    .container {
      width: 400px; /* Adjust width as needed */
      margin: 0 auto; /* Center the container horizontally */
      background-color: #fff; /* White background */
      padding: 20px; /* Add some padding */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
    }

    h2 {
      text-align: center;
    }

    form {
      text-align: center;
    }

    input[type="text"], select {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      background-color: red; 
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: darkred;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Add Item</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Item Name: <input type="text" name="itemName"><br><br>
    Item Price: <input type="text" name="itemPrice"><br><br>
    Choose Table:
    <select name="table">
      <option value="drinks">Drinks</option>
      <option value="main">Main</option>
      <option value="sides">Sides</option>
    </select>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>