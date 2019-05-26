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
        <a href="library_shelf.php">Home</a>
        <form>
            <input type="text" name="searchbar" placeholder="Search by Title or Author">
        </form>
    </body>
</html>