<!DOCTYPE html>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if a file is uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['importFile']) && $_FILES['importFile']['error'] == UPLOAD_ERR_OK) {
  $xmlFile = simplexml_load_file($_FILES['importFile']['tmp_name']);

  if ($xmlFile !== false) {
    foreach ($xmlFile->item as $item) {
      $category = $item->category;
      $productName = $item->productName;
      $price = $item->price;

      // Insert data into the corresponding table based on the category
      $sql = "INSERT INTO $category (itemName, itemPrice) VALUES ('$productName', '$price')";

      if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit(); // Exit to prevent further processing in case of an error
      }
    }

    echo "Items imported successfully";
  } else {
    echo "Error loading XML file. Please check the file format.";
  }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_FILES['importFile'])) {
  // Get data from the POST request
  $category = $_POST['category'];
  $productName = $_POST['productName'];
  $price = $_POST['price'];

  // Insert data into the corresponding table based on the category
  $sql = "INSERT INTO $category (itemName, itemPrice) VALUES ('$productName', '$price')";

  if ($conn->query($sql) === TRUE) {
    echo "Item added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
  exit(); // Exit to prevent rendering HTML content after processing form submission
}
?>

<head>
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
      position: relative;
      justify-content: center;
      align-items: center;
    }

    .add-item-form {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .add-item-form label {
      display: block;
      margin-bottom: 10px;
    }

    .add-item-form input {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    .add-item-form button {
      background-color: #525252;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .add-item-form button:hover {
      background-color: #636363;
    }

    .cancel-button {
      position: absolute;
      bottom: 20px;
      right: 20px;
      padding: 10px 20px;
      background-color: #525252;
      color: white;
      text-decoration: none;
      font-size: 16px;
      border-radius: 5px;
    }

    .cancel-button:hover {
      background-color: #636363;
    }
  </style>
</head>

<body>
  <div class="container">
    <a href="Dashboard.php" class="cancel-button">< Back</a>
    <form class="add-item-form" method="POST" enctype="multipart/form-data">
      <label for="category">Category:</label>
      <select id="category" name="category">
        <option value="main">Main Dishes</option>
        <option value="sides">Side Dishes</option>
        <option value="drinks">Drinks</option>
      </select>
      <br><br>

      <label for="productName">Name of the Product:</label>
      <input type="text" id="productName" name="productName">

      <label for="price">Price:</label>
      <input type="text" id="price" name="price">

      <label for="importFile">Import XML File:</label>
      <input type="file" id="importFile" name="importFile">

      <button type="button" onclick="addItem()">Add Item</button>
      <button type="button" onclick="importXML()">Import XML</button>
    </form>
  </div>


  <script>
    function addItem() {
      var category = document.getElementById('category').value;
      var productName = document.getElementById('productName').value;
      var price = document.getElementById('price').value;

      // AJAX request to send data to the server
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Handle the server response if needed
          console.log(xhr.responseText);
        }
      };

      xhr.open("POST", "createDish.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("category=" + category + "&productName=" + productName + "&price=" + price);
    }

    function importXML() {
      var fileInput = document.getElementById('importFile');
      var file = fileInput.files[0];

      if (file) {
        var formData = new FormData();
        formData.append('importFile', file);

        // AJAX request to send the XML file to the server
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the server response if needed
            console.log(xhr.responseText);
          }
        };

        xhr.open("POST", "createDish.php", true);
        xhr.send(formData);
      }
    }
  </script>
</body>

</html>