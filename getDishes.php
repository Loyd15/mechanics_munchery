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

$table = $_GET['table'];

// Fetch dishes for the selected table
$sql = "SELECT itemID, itemName FROM $table";
$result = $conn->query($sql);
$dishes = array();

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $dishes[] = $row;
  }
}

// Close connection
$conn->close();

// Return dishes as JSON
header('Content-Type: application/json');
echo json_encode($dishes);
?>