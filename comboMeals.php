<!DOCTYPE html>
<head>
<style>
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #292929;
}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.combo-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-bottom: 20px;
}

.combo-item {
  width: 200px;
  height: 200px;
  background-color: #525252;
  margin: 10px;
  border-radius: 25px;
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
  background-color: darkred;
}

</style>
</head>
<html>
<body>
<h1 style="color:white">Combo Meals</h1>
<div class="container">
    <div class="combo-container">
      <div class="combo-item"></div>
      <div class="combo-item"></div>
      <div class="combo-item"></div>
      <div class="combo-item"></div>
    </div>
    <a href="mainMenu.php" class="menu-button">Menu</a>
  </div>
</body>
</html>
