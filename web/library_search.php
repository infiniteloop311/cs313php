<?php
require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Shelf</title>
        <style>
            img {
                width: 15%;
            }
        </style>
    </head>
    <body>
        <form>
            <input type="text" name="searchbar" placeholder="Search by Title or Author">
        </form>
    </body>
</html>