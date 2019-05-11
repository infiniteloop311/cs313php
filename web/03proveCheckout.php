<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="03prove.css">
</head>
<body>
    <div id="main2">
        <h1>Checkout</h1>
        <form method="post" action="03proveConfirmation.php">
            <span>Street: </span>
            <input type="text" name="Street"><br/>
            <span>City: </span>
            <input type="text" name="City"><br/>
            <span>State: </span>
            <input type="text" name="State" maxlength="2" size="2"><br/>
            <span>Zipcode: </span>
            <input type="text" name="Zipcode" maxlength="5" size="5"><br/>
            <br/>
            <input type="submit" value="Confirm Purchase">
        </form>
        <br/>
        <br/>
        <a href="03proveCart.php">Back To Cart</a>
    </div>
</body>
</html>