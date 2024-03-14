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

    .store-logo {
      width: 1000px; 
    }

    .home-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: red;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 18px;
      transition: background-color 0.3s;
    }

    .home-button:hover {
      background-color: #491515;
    }

    .thank-you-text {
      color: white;
      font-size: 24px;
      margin-bottom: 50px;
      font-weight: bold; 
    }

  </style>
</head>
<body>

<div class="container">
  <img src="Store Logo.png" alt="Logo" class="store-logo">
  <div class="thank-you-text">Thank you for dining with us!</div>
  <br>
  <a href="startScreen.php" class="home-button">Home</a>
</div>

</body>
</html>
