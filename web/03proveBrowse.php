<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Browse Items</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <a href="03proveBrowse.php?item1=bought">Add Item 1 to Cart</a><br/>
    <a href="03proveBrowse.php?item2=bought">Add Item 2 to Cart</a><br/>
    <a href="03proveBrowse.php?item3=bought">Add Item 3 to Cart</a><br/>
    <a href="03proveBrowse.php?item4=bought">Add Item 4 to Cart</a><br/>
    <?php
    if (isset($_GET['item1'])) {
        $_SESSION["item1"] = "bought";
    }
    if (isset($_GET['item2'])) {
        $_SESSION["item2"] = "bought";
    }
    if (isset($_GET['item3'])) {
        $_SESSION["item3"] = "bought";
    }
    if (isset($_GET['item4'])) {
        $_SESSION["item4"] = "bought";
    }
    print_r($_SESSION);
    ?>
    <br/>
    <a href="03proveCart.php">View Cart</a>
</body>
</html>