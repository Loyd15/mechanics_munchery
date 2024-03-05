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
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.button {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 200px;
  height: 200px;
  background-color: red;
  color: white;
  text-decoration: none;
  font-size: 18px;
  border-radius: 5px;
}

.cancel-button {
  margin-top: 20px;
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
    <div class="grid">
      <a href="mainDish.php" class="button">Main</a>
      <a href="sideDish.php" class="button">Sides</a>
      <a href="drinks.php" class="button">Drinks</a>
    </div>
    <a href="startScreen.php" class="cancel-button">Cancel</a>
  </div>
</body>
</html>

