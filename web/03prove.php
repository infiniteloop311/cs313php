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
    <button onclick="<?php echo 'Clicked!'?>">Add session variable.</button><br/>
    <?php
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
    ?>
</body>
</html>