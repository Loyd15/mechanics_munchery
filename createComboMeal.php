<!DOCTYPE html>
<html>
<head>
  <title>New Combo Meal</title>
  <style>
     body {
      background-color: #292929; 
      margin: 0; 
      padding: 0; 
      height: 100vh; 
      position: relative; 
    }

    .container {
      width: 400px; 
      margin: 0 auto; 
      background-color: #f0f0f0; 
      padding: 20px; 
      border-radius: 5px; 
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
      text-align: center;
    }

    h2 {
      text-align: center;
    }

    form {
      text-align: center;
    }

    select, input[type="text"] {
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

   
    .notification {
      position: absolute; 
      bottom: 20px; 
      right: 20px; 
      background-color: #4CAF50; 
      color: white;
      padding: 40px 20px; 
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      font-size: 16px; 
    }

    .notification-error {
      position: absolute; 
      bottom: 20px; 
      right: 20px; 
      background-color: #FF204E; 
      color: white;
      padding: 40px 20px; 
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
      font-size: 16px; 
    }

  </style>
</head>
<body>

<div class="container">
  <h2>Creating New Combo Meal</h2>
  <form id="comboForm" method="post" action="createComboMeal.php">
    Choose Main:
    <select name="main" id="mainDish">
      <option value="">Select Main</option>
    </select>
    <br><br>
    Choose Sides:
    <select name="side" id="sideDish">
      <option value="">Select Side</option>
    </select>
    <br><br>
    Choose Drinks:
    <select name="drink" id="drinksDish">
      <option value="">Select Drink</option>
    </select>
    <br><br>
    Email: <input type="text" name="email"><br><br> 
    <input type="submit" value="Create">
  </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  
  // Function to fetch data and populate dropdown
  function populateDropdown(url, dropdownId) {
    fetch(url)
      .then(response => response.json())
      .then(data => {
        const dropdown = document.getElementById(dropdownId);
        dropdown.innerHTML = "<option value=''>Select " + dropdownId.replace("Dish", "") + "</option>";
        data.forEach(item => {
          const option = document.createElement('option');
          option.value = item.itemID;
          option.textContent = item.itemName;
          dropdown.appendChild(option);
        });
      })
      .catch(error => console.error('Error:', error));
  }

  // Populate Main dropdown
  populateDropdown('getDishes.php?table=main', 'mainDish');
  
  // Populate Sides dropdown
  populateDropdown('getDishes.php?table=sides', 'sideDish');
  
  // Populate Drinks dropdown
  populateDropdown('getDishes.php?table=drinks', 'drinksDish');
});
</script>
<?php
$servername = "localhost";
$username = "root";
$password = "";                   // Update with your database password if you have set one
$database = "mydb";               // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mainID = $_POST['main'];
  $sideID = $_POST['side'];
  $drinkID = $_POST['drink'];
  $email = isset($_POST['email']) ? $_POST['email'] : null; // Check if email is set

  // Retrieve item prices
  $sql = $sql = "SELECT SUM(itemPrice) AS total_price FROM (
    SELECT itemPrice FROM main WHERE itemID = '$mainID'
    UNION ALL
    SELECT itemPrice FROM sides WHERE itemID = '$sideID'
    UNION ALL
    SELECT itemPrice FROM drinks WHERE itemID = '$drinkID') AS prices";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $totalPrice = $row['total_price'];

  // Calculate discounted price (15% off)
  $discountedPrice = $totalPrice * 0.85; // 15% discount

  // Insert the data into the combos table
  $sql = "INSERT INTO combos (email, mainID, drinkID, sidesID, discountPrice) VALUES ('$email', '$mainID', '$drinkID', '$sideID', '$discountedPrice')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<div class='notification'>New combo meal created successfully. Discounted price: ₱" . number_format($discountedPrice, 2) . "</div>";
    
  } else {
    echo "<div class='container'>Error: " . $sql . "<br>" . $conn->error . "</div>";
  }
}

// Close connection
$conn->close();
?>

</body>
</html>