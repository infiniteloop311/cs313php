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
    <h1>View Cart</h1>
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
    
    foreach ($_SESSION as $itemName => $quantity) {
        echo $itemName . " -> " . $quantity . "<br/>" . 
            "<a href=\"03proveCart.php?" . $itemName . "=removed\">Remove " . 
            $itemName . " from Cart</a><br/><br/>";
    }
    ?>
    <br/>
    <br/>
    <a href="03proveBrowse.php">Back to Browsing</a><br/>
    <a href="03proveCheckout.php">Checkout</a><br/>
</body>
</html>