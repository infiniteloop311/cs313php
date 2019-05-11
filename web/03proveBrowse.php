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
    <h1>Browse Items</h1>
    <img src="milanjersey.jpg" alt="Milan Jersey" width="20%"><br/>
    <a href="03proveBrowse.php?item1=bought">Add to Cart</a><br/>
    
    <img src="romajersey.jpg" alt="Roma Jersey"><br/>
    <a href="03proveBrowse.php?item2=bought">Add to Cart</a><br/>
    
    <img src="interjersey.jpg" alt="Inter Jersey"><br/>
    <a href="03proveBrowse.php?item3=bought">Add to Cart</a><br/>
    
    <img src="laziojersey.jpg" alt="Lazio Jersey"><br/>
    <a href="03proveBrowse.php?item4=bought">Add to Cart</a><br/>
    
    <?php
    if (isset($_GET['item1'])) {
        $_SESSION["AC_Milan_Home_Jersey"] = "1";
    }
    if (isset($_GET['item2'])) {
        $_SESSION["AS_Roma_Home_Jersey"] = "1";
    }
    if (isset($_GET['item3'])) {
        $_SESSION["Inter_Milan_Home_Jersey"] = "1";
    }
    if (isset($_GET['item4'])) {
        $_SESSION["Lazio_Home_Jersey"] = "1";
    }
    ?>
    <br/>
    <br/>
    <a href="03proveCart.php">View Cart</a>
</body>
</html>