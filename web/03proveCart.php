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
    print_r($_SESSION);
    ?>
    <a href="03proveBrowse.php">Back to Browsing</a><br/>
    <a href="">Checkout</a><br/>
</body>
</html>