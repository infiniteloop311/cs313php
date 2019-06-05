<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Author Bio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="library_styles.css">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
    </head>
    <body>
        <header>
            <div class="col-6" style="text-align: left">
                <h1>Author Info</h1>
            </div>
            <div class="col-6" style="text-align: right">
                <h4>
                    <?php
                    echo "Welcome, " . $_SESSION["first"] . " " . $_SESSION["last"] . " " . 
                        "<a href='library_logout.php'>Logout</a>";
                    ?>
                </h4>
                <a href="library_add.php">Add Book to Shelf</a>
            </div>
            <div class="col-12">
                <a href="library_shelf.php">Home</a><br/>
                <a href="library_search.php">Search</a><br/><br/>
            </div>
        </header>
        <main>
            <?php
            if (isset($_SESSION['user'])) {
                $id = $_SESSION["userid"];
                $username = $_SESSION['user'];
            } else {
                header("Location: library_login.php");
                die();
            }
            
            if (isset($_GET['author_id']))
            {
                $id = $_GET['author_id'];

                foreach ($db->query("SELECT * FROM authorsinfo WHERE id='$id'") as $row)
                {
                    $portrait = $row['portrait'];
                    echo "<img src=\"$portrait\" alt=$portrait><br/>" . $row['name'] . 
                        "<br/><br/>" . $row['bio'];
                }
            }
            ?>
        </main>
    </body>
</html>