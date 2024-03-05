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
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
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
        <a href="comboMeals.php" class="order-button">Click here to Order</a>
    </div>

</body>
</html>

