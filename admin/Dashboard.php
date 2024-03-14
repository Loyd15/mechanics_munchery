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
      display: flex;
      height: 100vh;
    }

    .sidebar {
      background-color: #872529;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
      width: 300px;
      height: 95%;
      margin: 20px;
    }

    .logo {
      margin-right: 10px;
      margin-bottom: 30px;
      position: absolute;
      left: 11%;
      transform: translateX(-50%);

    }

    .store-logo {
      width: 400px;
    }

    .logout-button {
      position: absolute;
      bottom: 40px;
      right: 1320px;
      padding: 10px 20px;
      background-color: #525252;
      color: white;
      text-decoration: none;
      font-size: 16px;
      border-radius: 20px;
    }

    .logout-button:hover {
      background-color: #636363;
    }

    .header {
      position: absolute;
      left: 350px;
      top: 20px;
      color: white;
      font-size: 40px;
      font-weight: bold;
      font-family: "Times New Roman", Times, serif;
    }

    .underline {
      position: absolute;
      top: 70px;
      border-bottom: 2px solid gray;
      width: 25%;
      margin-left: 745px;
    }

    .option-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-right: -1500px;
    }

    .top-items {
      margin-top: 30px;
      display: flex;
      justify-content: center;
    }

    .option-item {
      width: 500px;
      height: 250px;
      border-radius: 25px;
      margin: 20px;
      display: flex;
      justify-content: center;
      /* Centering the content horizontally */
      align-items: center;
      /* Centering the content vertically */
      flex-direction: column;
      /* Stack text below the image */
    }

    .option-item img {
      max-width: 100%;
      /* Ensure image does not exceed container width */
      max-height: 100%;
      /* Ensure image does not exceed container height */
      border-radius: 25px;
    }

    .bottom-items {
      margin-top: 50px;
      display: flex;
      justify-content: center;
    }

    .option-text {
      color: white;
      font-size: 20px;
      margin-top: 10px;
    }
  </style>
</head>
<html>

<body>
  <div class="container">
    <div class="sidebar">

      <img src="../img/Store Logo.png" alt="Logo" class="logo store-logo">
      <div class="header">DASHBOARD</div>
      <div class="underline"></div>

      <div class="option-container">
        <div class="top-items">
          <div class="option-item">
            <a href="createDish.php">
              <img src="../img/Add Items Logo.png" alt="Add Image">
            </a>
            <div class="option-text">Add Menu Items</div>
          </div>
          <div class="option-item">
            <a href="getDishes.php">
              <img src="../img/Update Items Logo.png" alt="Update Image">
            </a>
            <div class="option-text">Update Menu Items</div>
          </div>
        </div>
        <div class="bottom-items">
          <div class="option-item">
            <a href="modifyDish.php">
              <img src="../img/Modify Items Logo.png" alt="Modify Image">
            </a>
            <div class="option-text">Modify Menu Items</div>
          </div>
          <div class="option-item">
            <a href="deleteDish.php">
              <img src="../img/Delete Items Logo.png" alt="Delete Image">
            </a>
            <div class="option-text">Delete Menu Items</div>
          </div>
        </div>


      </div>
      <a href="../index.php" class="logout-button">Logout</a>
    </div>
</body>

</html>