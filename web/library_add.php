<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add to My Shelf</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="library_styles.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <div class="col-6">
                <h1>Add to Your BookShelf</h1>
            </div>
            <div class="col-6">
                <h4>
                    <?php
                    echo "Welcome, " . $_SESSION["first"] . " " . $_SESSION["last"] . " " . 
                        "<a href='library_logout.php'>Logout</a>";
                    ?>
                </h4>
            </div>
            <div class="col-12">
                <a href="library_shelf.php">Home</a><br/>
                <a href="library_search.php">Search</a><br/><br/>
            </div>
        </header>
        <main>
            <form method="post" action="library_add.php">
                <input type="text" name="title" placeholder="Enter Title"><br/>
                <textarea rows="5" cols="50" placeholder="Enter Description"></textarea>
                <input type="cover" name="cover" placeholder="Enter Filename for Cover"><br/>
                <input type="isbn" name="isbn" placeholder="Enter ISBN"><br/>
                <select>
                    <option value="other">Other</option>
                </select>
                <input type="submit" value="Add Book"><br/><br/>
            </form>
        </main>
    </body>
</html>