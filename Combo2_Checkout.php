<!DOCTYPE html>
<html>
<head>
<style>
body{
    margin: 0;
    background-color: #2E2E2E;
    color: white;
    font-family: Times New Roman, sans-serif;
}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  position: relative;
}

.logo {
  position: absolute; 
}

.logo-left {
  top: 0px; 
  left: 0px; 
  width: 300px; 
  height: auto; 
}

.combo2-image {
    width: 900px;
    height: 500px;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.payment-button {
  display: inline-block;
  padding: 15px 30px;
  background-color: red;
  color: white;
  text-decoration: none;
  font-size: 18px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
  position: absolute;
  bottom: 100px;
}

.payment-button:hover {
  background-color: #491515;
}

.cancel-button {
    position: absolute;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #636363;
    color: white;
    text-decoration: none;
    font-size: 16px;
    border-radius: 5px;
}

.cancel-button:hover {
    background-color: #525252; 
}

.text-container {
    text-align: center;
    position: absolute;
    bottom: 200px;
    width: 100%;
}

.subtotal,
.discounted-total {
    color: #636363;
    font-size: 25px;
    margin-bottom: 10px;
}

.discounted-total {
    color: #FFFFFF;
}
</style>
</head>
<body>
<div class="container">
    <img src="Combo Meals Logo.png" alt="Left Logo" class="logo logo-left">
    <img src="CM2 Checkout.png" alt="Center Image" class="combo2-image">
    <a href="payment.php" class="payment-button">Proceed payment</a>
    <a href="ComboMeals.php" class="cancel-button">Cancel</a>
    <div class="text-container">
      <div class="subtotal">Subtotal: ₱ 240.00</div>
      <div class="discounted-total">Discounted Total: ₱ 204.00</div>
    </div>
</div>
</body>
</html>
