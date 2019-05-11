<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirmation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Purchase Confirmed</h1>
    <?php
    foreach ($_SESSION as $itemName => $quantity) {
        echo $itemName . " -> " . $quantity . "<br/>";
    }
    
    echo "Your items will be shipped to: <br/>";
    echo $_POST["Street"] . "<br/>" . 
        $_POST["City"] . ", " . $_POST["State"] . " " . $_POST["Zipcode"] . 
        "<br/><br/>";
    ?>
    <p>Thank you for your purchase!</p>
</body>
</html>