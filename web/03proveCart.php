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
    foreach ($_SESSION as $key => $value) {
        echo $key . " " . $value . "<br/>";
    }
    ?>
    <br/>
    <a href="03proveCart.php?item1=removed">Remove Item 1 from Cart</a><br/>
    <a href="03proveCart.php?item2=removed">Remove Item 2 from Cart</a><br/>
    <a href="03proveCart.php?item3=removed">Remove Item 3 from Cart</a><br/>
    <a href="03proveCart.php?item4=removed">Remove Item 4 from Cart</a><br/>
    <br/>
    <a href="03proveBrowse.php">Back to Browsing</a><br/>
    <a href="03proveCheckout.php">Checkout</a><br/>
</body>
</html>