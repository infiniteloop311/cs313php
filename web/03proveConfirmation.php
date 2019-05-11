<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirmation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="03prove.css">
</head>
<body>
    <div id="main">
        <h1>Purchase Confirmed</h1>
        <?php
        foreach ($_SESSION as $itemName => $quantity) {
            echo $itemName . " -> " . $quantity . "<br/><br/>";
        }

        echo "Your items will be shipped to: <br/>";
        echo htmlspecialchars($_POST["Street"]) . "<br/>" . 
            htmlspecialchars($_POST["City"]) . ", " . htmlspecialchars($_POST["State"]) . 
            " " . htmlspecialchars($_POST["Zipcode"]) . 
            "<br/><br/>";
        ?>
        <p>Thank you for your purchase!</p>
    </div>
</body>
</html>