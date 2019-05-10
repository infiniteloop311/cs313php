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
    <a href="03prove.php?item1=1">Click me.</a><br/>
    <?php
    if (isset($_GET['item1'])) {
        $_SESSION["item"] = "bought";
    }
    //print_r($_SESSION);
    ?>
</body>
</html>