<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Checkout</h1>
    <form method="post" action="03proveConfirmation.php">
        <span>Street: </span>
        <input type="text" name="Street"><br/>
        <span>City: </span>
        <input type="text" name="City"><br/>
        <span>State: </span>
        <input type="text" name="State"><br/>
        <span>Zipcode: </span>
        <input type="text" name="Zipcode"><br/>
        <input type="submit" value="Submit">
    </form>
    <br/>
    <br/>
    <a href="03proveCart.php">Back To Cart</a>
    <a href="03proveConfirmation.php">Confirm Purchase</a>
</body>
</html>