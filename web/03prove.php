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
    <a href="03prove.php?variable=1">Click me.</a><br/>
    <?php
    /*
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
    */
    if (isset($_GET['variable'])) {
        $_SESSION["item"] = "bought";
    }
    print_r($_SESSION);
    ?>
</body>
</html>