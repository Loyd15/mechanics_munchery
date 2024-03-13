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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $selectedItemID = $_POST['selectedItemID'];
  $newItemName = $_POST['newItemName'];
  $newItemPrice = $_POST['newItemPrice'];
  $table = $_POST['table'];

  // Update the selected item's name and price
  $sql = "UPDATE $table SET itemName = '$newItemName', itemPrice = '$newItemPrice' WHERE itemID = '$selectedItemID'";
  
  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

// Close connection
$conn->close();
?>