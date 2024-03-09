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
  width: 120px;
  height: 95%;
  margin: 20px;
}

.sidebar a {
  width: 100%;
  height: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 20px;
  color: white;
  text-decoration: none;
  border-radius: 10px; 
}

.sidebar a.active {
  background-color: #491515;
}

</style>
</head>
<html>
<body>
<div class="container">
  <div class="sidebar">
    <a href="#" class="active">Main</a>
    <a href="sideDish.php">Side</a>
    <a href="drinks.php">Drinks</a>
   
  </div>
</div>
</body>
</html>