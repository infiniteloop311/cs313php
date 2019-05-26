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
        <header>
            <a href="library_shelf.php">Home</a><br/><br/>
        </header>
        <form method="post" action="library_search.php">
            <input type="text" name="searchbar" placeholder="Search by Title or Author">
            <button>Search</button>
        </form>
        <?php	
        if (isset($_POST['searchbar']))
        {
            $searchstring = $_POST['searchbar'];
            echo $searchstring;
        }
        ?>
    </body>
</html>