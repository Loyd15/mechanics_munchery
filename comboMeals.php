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
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.logo {
  position: absolute; 
}

.logo-left {
  top: 0px; 
  left: 0px; 
  width: 500px; 
  height: auto; 
}

.logo-right {
  top: 0px; 
  right: 0px;
  width: 300px; 
  height: auto; 
}

.combo-container {
  display: flex;
  flex-direction: column; 
  align-items: center; 
  margin-bottom: 20px;
}

.top-items {
  margin-top: 200px;
  display: flex;
  justify-content: center;
}

.combo-item {
  width: 500px;
  height: 250px;
  background-color: #525252;
  border-radius: 25px;
  margin: 10px;
}

.combo-item img {
  width: 100%;
  height: 100%;
  border-radius: 25px;
}

.bottom-items {
  display: flex;
  justify-content: center;
}

.menu-button {
  display: inline-block;
  padding: 15px 30px;
  background-color: red;
  color: white;
  text-decoration: none;
  font-size: 18px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.menu-button:hover {
  background-color: #491515;
}

</style>
</head>
<html>
<body>
<div class="container">
    <img src="Combo Meals Logo.png" alt="Left Logo" class="logo logo-left">
    <img src="15 off Logo.png" alt="Right Logo" class="logo logo-right">
    <div class="combo-container">
      <div class="top-items">
        <a href="Combo1_Checkout.php" class="combo-item">
          <img src="Combo1.png" alt="Combo 1 Image">
        </a>
        <a href="Combo2_Checkout.php" class="combo-item">
          <img src="Combo2.png" alt="Combo 2 Image">
        </a>
      </div>
      <div class="bottom-items">
        <a href="Combo3_Checkout.php" class="combo-item">
          <img src="Combo3.png" alt="Combo 3 Image">
        </a>
        <a href="Combo4_Checkout.php" class="combo-item">
          <img src="Combo4.png" alt="Combo 4 Image">
        </a>
      </div>
    </div>
    <a href="mainMenu.php" class="menu-button">View Menu</a>
  </div>
</body>
</html>
