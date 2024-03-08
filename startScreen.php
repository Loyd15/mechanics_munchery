<!DOCTYPE html>
<head>
<style>
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.container {
  position: fixed;
  top: 0; 
  left: 0; 
  width: 100%; 
  height: 100%; 
  background: linear-gradient(to top right, #161616, #525252); /* Gray gradient from lower left to upper right */
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.logo {
  margin-bottom: 100px; 
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
  background-color: darkred;
}
</style>
</head>
<html>
<body>

    <div class="container">
        <img src="Store Logo.png" alt="Logo" class="logo">
        <br> 
        <a href="comboMeals.php" class="order-button">Click here to Order</a>
    </div>

</body>
</html>
