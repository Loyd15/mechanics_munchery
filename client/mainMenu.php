<!DOCTYPE html>

<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Times New Roman, sans-serif;
      background-color: #2E2E2E;
    }

    .container {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    .header {
      position: absolute;
      top: 200px;
      color: white;
      font-size: 30px;
      font-weight: bold;
      font-family: "Times New Roman", Times, serif;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 100px;
    }

    .button {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 200px;
      height: 200px;
      background-color: #731111;
      color: white;
      text-decoration: none;
      font-size: 25px;
      border-radius: 20px;
    }

    .button:hover {
      background-color: #491515;
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
<html>

<body>
  <div class="container">
    <div class="header">Choose your...</div>
    <div class="grid">
      <a href="mainDish.php" class="button">Main</a>
      <a href="sideDish.php" class="button">Sides</a>
      <a href="drinks.php" class="button">Drinks</a>
    </div>
    <a href="../index.php" class="cancel-button">Cancel</a>
  </div>
</body>

</html>