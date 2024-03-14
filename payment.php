<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            background-color: #2E2E2E;
            margin: 0;
            font-family: Times New Roman, sans-serif;
        }

        .container {
            background-color: #872529;
            margin: 20px;
            padding: 30px;
            text-align: left;
            border-radius: 10px;
        }

        .title {
            color: white;
            font-size: 30px;
            margin: 0;
        }

        .total-section {
            text-align: left;
            padding: 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 60%; /* Adjusted width */
        }

        .total-text{
            margin-top: 70px;
            font-size: 18px;
            margin-bottom: 10px;
            margin-left: 500px; /* Adjusted margin */
            justify-content: space-between;
            align-items: left;
        }
        
        .total-amount {
            margin-top: 70px;
            font-size: 18px;
            margin-bottom: 10px;
            margin-left: 235px;
            margin-right: auto; /* Center the element */
        }

        .underline {
            border-bottom: 1px solid white;
            width: 33%;
            margin-top: 5px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 50px;
        }

        .input-section {
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 10px;
        }


        .input-label{
            color: white;
            font-size: 18px;
            text-align: center;
            margin-left: 500px;
        }

        .input-field {
            color: white;
            font-size: 18px;
            text-align: center;
            border: none; /* Remove the border */
            background-color: #3E3E3E; /* Set background color */
            padding: 10px; /* Adjust padding */
            border-radius: 10px; /* Add rounded edges */
            width: 20%; /* Adjust width as needed */
            margin-right: 500px; /* Add some margin */
        }

        .cancel-button {
  position: absolute;
  bottom: 20px;
  right: 20px;
  padding: 10px 20px;
  background-color: #D51B23;
  color: white;
  text-decoration: none;
  font-size: 16px;
  border-radius: 5px;
}

.cancel-button:hover {
  background-color: #872529;
}

        
    </style>
</head>
<body>

    <div class="container">
        <h1 class="title">Payment:</h1>
    </div>

    <div class="total-section">
        <div class="total-text">
            Order Total
        </div>
        <div class="total-amount">₱ 0.00</div>
    </div>
    <div class="underline"></div>

    <div class="input-section">
        <div class="input-row">
            <label class="input-label" for="name">Full Name:</label>
            <input type="text" id="name" class="input-field" placeholder="Enter a Name">
        </div>
        <div class="input-row">
            <label class="input-label" for="date">Date:</label>
            <input type="text" id="date" class="input-field" placeholder="Enter a Date">
        </div>
        <div class="input-row">
            <label class="input-label" for="payment-amount">Payment amount:</label>
            <input type="text" id="payment-amount" class="input-field" placeholder="₱ Enter Payment">
        </div>
        <div class="input-row">
            <span class="input-label">Change:</span>
            <span class="input-field">₱ 0.00</span>
        </div>
    </div>

    <a href="Receipt.php" class="cancel-button">Done</a>
    </div>

</body>
</html>
