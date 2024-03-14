<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            background-color: #313131;
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
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .total-text,
        .total-amount {
            color: white;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .underline {
            border-bottom: 1px solid white;
            width: 50%;
            margin-top: 5px;
        }

        .input-section {
            text-align: center; /* Centering the input section */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-row {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%; /* Adjust width as needed */
            margin: 0 auto; /* Centering the input row */
        }

        .input-label,
        .input-field {
            color: white;
            font-size: 18px;
            margin-bottom: 10px;
            text-align: center;
        }

        .input-field {
            border: none;
            background-color: transparent;
            outline: none;
            border-bottom: 1px solid white;
            width: 100%; /* Adjust width as needed */
            padding: 5px;
            color: white;
        }

        .button-section {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .rounded-button {
            background-color: #D51B23;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="title">Payment:</h1>
    </div>

    <div class="total-section">
        <div class="total-text">
            Your Total is:
        </div>
        <div class="total-amount">₱0.00</div>
        <div class="underline"></div>
    </div>

    <div class="input-section">
        <div class="input-row">
            <label class="input-label" for="name">Enter a Name:</label>
            <input type="text" id="name" class="input-field" placeholder="Name">
        </div>
        <div class="input-row">
            <label class="input-label" for="date">Enter a Date:</label>
            <input type="text" id="date" class="input-field" placeholder="Date">
        </div>
        <div class="input-row">
            <label class="input-label" for="payment-amount">Enter Payment Amount:</label>
            <input type="text" id="payment-amount" class="input-field" placeholder="Payment">
        </div>
        <div class="input-row">
            <label class="input-label" for="change">Change:</label>
            <span class="input-field">₱0.00</span>
        </div>
    </div>

    <div class="button-section">
        <button class="rounded-button">DONE</button>
    </div>

</body>
</html>
