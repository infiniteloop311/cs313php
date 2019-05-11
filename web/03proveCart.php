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
    <div id="main">
        <h1>View Cart</h1>
        <?php
        if (isset($_GET['AC_Milan_Home_Jersey'])) {
            unset($_SESSION["AC_Milan_Home_Jersey"]);
        }
        if (isset($_GET['AS_Roma_Home_Jersey'])) {
            unset($_SESSION["AS_Roma_Home_Jersey"]);
        }
        if (isset($_GET['Inter_Milan_Home_Jersey'])) {
            unset($_SESSION["Inter_Milan_Home_Jersey"]);
        }
        if (isset($_GET['Lazio_Home_Jersey'])) {
            unset($_SESSION["Lazio_Home_Jersey"]);
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
    </div>
</body>
</html>