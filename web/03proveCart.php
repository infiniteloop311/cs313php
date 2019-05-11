<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    if (isset($_GET['item1'])) {
        unset($_SESSION["item1"]);
    }
    if (isset($_GET['item2'])) {
        unset($_SESSION["item2"]);
    }
    if (isset($_GET['item3'])) {
        unset($_SESSION["item3"]);
    }
    if (isset($_GET['item4'])) {
        unset($_SESSION["item4"]);
    }
    print_r($_SESSION);
    ?>
    <br/>
    <a href="03proveCart.php?item1=removed">Remove Item 1</a><br/>
    <a href="03proveCart.php?item2=removed">Item 2</a><br/>
    <a href="03proveCart.php?item3=removed">Item 3</a><br/>
    <a href="03proveCart.php?item4=removed">Item 4</a><br/>
    <br/>
    <a href="03proveBrowse.php">Back to Browsing</a><br/>
    <a href="03proveCheckout.php">Checkout</a><br/>
</body>
</html>