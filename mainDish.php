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
  height: 100vh;
}

.sidebar {
  background-color: red;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center; 
}

.sidebar a {
  width: 100px; 
  height: 100px; 
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px;
  color: white;
  text-decoration: none;
  border-radius: 10px; 
}

.sidebar a.active {
  background-color: darkred;
}

</style>
</head>
<html>
<body>
<div class="container">
<div class="container">
    <div class="sidebar">
      <a href="#" class="active">Main</a>
      <a href="sideDish.php">Side</a>
      <a href="drinks.php">Drinks</a>
    </div>
  </div>
</body>
</html>

