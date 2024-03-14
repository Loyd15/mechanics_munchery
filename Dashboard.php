<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dish Management System</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #292929;
    }
    
    #container {
        display: flex;
        height: 100vh;
    }

    #red-section {
        background-color: red;
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    #bottom {
        flex: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .button {
        background-color: white;
        color: black;
        padding: 15px 30px;
        border-radius: 10px;
        text-align: center;
        text-decoration: none;
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
        font-size: 1.2em;
    }

    .button:hover {
        background-color: #ccc;
    }
</style>
</head>
<body>
<div id="container">
    <div id="red-section">
        <a href="startScreen.php" class="button">Logout</a>
    </div>
    <div id="bottom">
        <div class="button"><a href="createDish.php" style="color: black; text-decoration: none;">Create Dish</a></div>
        <div class="button"><a href="modifyDish.php" style="color: black; text-decoration: none;">Modify Dish</a></div>
        <div class="button"><a href="deleteDish.php" style="color: black; text-decoration: none;">Delete Dish</a></div>
    </div>
</div>
</body>
</html>