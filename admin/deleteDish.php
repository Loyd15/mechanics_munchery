<!DOCTYPE html>
<html>

<head>
  <title>Delete Dish</title>
  <style>
    body {
      background-color: #292929;
      /* Light gray background */
    }

    .container {
      width: 400px;
      /* Adjust width as needed */
      margin: 0 auto;
      /* Center the container horizontally */
      background-color: #fff;
      /* White background */
      padding: 20px;
      /* Add some padding */
      border-radius: 10px;
      /* Rounded corners */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Add shadow */
    }

    h2 {
      text-align: center;
    }

    form {
      text-align: center;
    }

    select {
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
    <h2>Delete Dish</h2>
    <form method="post" action="delete_dish_process.php">
      Choose Table:
      <select name="table" id="tableSelect">
        <option value="drinks">Drinks</option>
        <option value="main">Main</option>
        <option value="sides">Sides</option>
      </select>
      <br><br>
      Choose Dish:
      <select name="selectedItemID" id="dishSelect">
        <!-- Options will be populated dynamically based on the selected table -->
      </select>
      <br><br>
      <input type="submit" value="Delete">
    </form>
  </div>

  <script>
    document.getElementById('tableSelect').addEventListener('change', function() {
      var selectedTable = this.value;
      var dishSelect = document.getElementById('dishSelect');
      dishSelect.innerHTML = ''; // Clear existing options

      // Fetch dishes for the selected table and populate the dropdown menu
      fetch('getDishes.php?table=' + selectedTable)
        .then(response => response.json())
        .then(data => {
          data.forEach(dish => {
            var option = document.createElement('option');
            option.value = dish.itemID;
            option.textContent = dish.itemName;
            dishSelect.appendChild(option);
          });
        })
        .catch(error => console.error('Error fetching dishes:', error));
    });
  </script>

</body>

</html>