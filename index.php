<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Times New Roman, sans-serif;
    }

    .container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to top right, #161616, #525252);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .logo {
      margin-bottom: 30px;
    }

    .admin-logo {
      width: 50px;
      position: absolute;
      top: 10px;
      left: 10px;
    }

    .store-logo {
      width: 1000px;
    }

    .order-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: red;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 18px;
      transition: background-color 0.3s;
    }

    .order-button:hover {
      background-color: #491515;
    }
  </style>
</head>

<body>

  <div class="container">
    <a href="./admin/Login.php">
      <img src="./img/Admin Login Logo.png" alt="Admin Logo" class="logo admin-logo">
    </a>
    <img src="./img/Store Logo.png" alt="Logo" class="logo store-logo">
    <br>
    <a href="./extras/comboMeals.php" class="order-button">Click here to Order</a>
  </div>

</body>

</html>